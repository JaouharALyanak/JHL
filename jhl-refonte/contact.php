<?php

/**
 * JHL.ma - Contact Form Handler
 * Gestion du formulaire de contact HTML statique
 */

// Headers pour permettre les requêtes AJAX
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Vérifier que c'est une requête POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
    exit;
}

// Récupérer les données JSON
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Valider les données
$errors = [];

if (empty($data['name']) || strlen($data['name']) < 2) {
    $errors['name'] = 'Le nom doit contenir au moins 2 caractères';
}

if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Veuillez entrer une adresse email valide';
}

if (empty($data['phone'])) {
    $errors['phone'] = 'Veuillez entrer un numéro de téléphone';
}

if (empty($data['service'])) {
    $errors['service'] = 'Veuillez sélectionner un service';
}

if (empty($data['message']) || strlen($data['message']) < 10) {
    $errors['message'] = 'Le message doit contenir au moins 10 caractères';
}

// Si erreurs, retourner
if (!empty($errors)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
}

// Préparer l'email
$to = 'contact@jhl.ma';
$subject = 'JHL.ma - Nouvelle demande de contact';

// Message HTML
$htmlMessage = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #1E40AF 0%, #3B82F6 100%); color: white; padding: 20px; border-radius: 8px 8px 0 0; }
        .content { background: #f9f9f9; padding: 20px; border-radius: 0 0 8px 8px; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #1E40AF; }
        .value { margin-top: 5px; }
        .button { display: inline-block; padding: 12px 24px; background: #1E40AF; color: white; text-decoration: none; border-radius: 5px; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2 style="margin:0;">📧 Nouvelle Demande de Contact</h2>
            <p style="margin:5px 0 0 0; opacity:0.9;">JHL Solutions Maroc</p>
        </div>
        <div class="content">
            <div class="field">
                <div class="label">👤 Nom complet</div>
                <div class="value">' . htmlspecialchars($data['name']) . '</div>
            </div>
            
            <div class="field">
                <div class="label">📧 Email</div>
                <div class="value"><a href="mailto:' . htmlspecialchars($data['email']) . '">' . htmlspecialchars($data['email']) . '</a></div>
            </div>
            
            <div class="field">
                <div class="label">📞 Téléphone</div>
                <div class="value"><a href="tel:' . htmlspecialchars($data['phone']) . '">' . htmlspecialchars($data['phone']) . '</a></div>
            </div>
            
            <div class="field">
                <div class="label">🛠️ Service demandé</div>
                <div class="value">' . htmlspecialchars($data['service']) . '</div>
            </div>
            
            ' . (!empty($data['budget']) ? '
            <div class="field">
                <div class="label">💰 Budget estimé</div>
                <div class="value">' . htmlspecialchars($data['budget']) . ' DH</div>
            </div>
            ' : '') . '
            
            <div class="field">
                <div class="label">💬 Message</div>
                <div class="value" style="white-space: pre-wrap;">' . nl2br(htmlspecialchars($data['message'])) . '</div>
            </div>
            
            <a href="mailto:' . htmlspecialchars($data['email']) . '" class="button">Répondre au client</a>
        </div>
    </div>
</body>
</html>
';

// Message texte alternatif
$textMessage = "=== NOUVELLE DEMANDE DE CONTACT - JHL.ma ===\n\n";
$textMessage .= "Nom complet: " . $data['name'] . "\n";
$textMessage .= "Email: " . $data['email'] . "\n";
$textMessage .= "Téléphone: " . $data['phone'] . "\n";
$textMessage .= "Service demandé: " . $data['service'] . "\n";
if (!empty($data['budget'])) {
    $textMessage .= "Budget estimé: " . $data['budget'] . " DH\n";
}
$textMessage .= "\nMessage:\n" . $data['message'] . "\n";
$textMessage .= "\n---\nEnvoyé depuis jhl.ma";

// Headers email
$headers = [];
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-Type: text/html; charset=UTF-8';
$headers[] = 'From: JHL Contact Form <contact@jhl.ma>';
$headers[] = 'Reply-To: ' . $data['email'];
$headers[] = 'X-Mailer: PHP/' . phpversion();

// ============================================
// SAUVEGARDE DANS UN FICHIER JSON (backup)
// ============================================
$contactsFile = __DIR__ . '/contacts.json';
$contacts = [];

if (file_exists($contactsFile)) {
    $contacts = json_decode(file_get_contents($contactsFile), true) ?: [];
}

$newContact = [
    'id' => uniqid(),
    'date' => date('Y-m-d H:i:s'),
    'name' => $data['name'],
    'email' => $data['email'],
    'phone' => $data['phone'],
    'service' => $data['service'],
    'budget' => $data['budget'] ?? 'Non spécifié',
    'message' => $data['message'],
    'ip' => $_SERVER['REMOTE_ADDR'] ?? 'Unknown'
];

$contacts[] = $newContact;
file_put_contents($contactsFile, json_encode($contacts, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// ============================================
// ENVOI EMAIL VIA SMTP
// ============================================
$emailSent = false;
$smtpDebug = [];

try {
    // Configuration SMTP Hostinger
    $smtp_host = 'smtp.hostinger.com';
    $smtp_port = 465;
    $smtp_username = 'smtp@jhl.ma';  // ✅ MÊME CONFIG QUE LARAVEL .env
    $smtp_password = '8i*BV1ZxjI';
    $smtp_from = 'smtp@jhl.ma';
    $smtp_from_name = 'JHL Contact Form';
    $smtp_to = 'contact@jhl.ma';

    // Créer la connexion SSL
    $context = stream_context_create([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        ]
    ]);

    $smtp = stream_socket_client(  // Removed @ to see errors
        "ssl://{$smtp_host}:{$smtp_port}",
        $errno,
        $errstr,
        30,
        STREAM_CLIENT_CONNECT,
        $context
    );

    if (!$smtp) {
        $smtpDebug[] = "Connection failed: {$errstr} ({$errno})";
        throw new Exception("Impossible de connecter au serveur SMTP");
    }

    $smtpDebug[] = "Connected to {$smtp_host}:{$smtp_port}";

    // Lire le banner
    $response = fgets($smtp, 512);
    $smtpDebug[] = "Banner: " . trim($response);

    // Fonction pour envoyer et recevoir
    $smtpSend = function ($command, $expectedCode = 250) use ($smtp, &$smtpDebug) {
        fwrite($smtp, $command . "\r\n");
        $smtpDebug[] = "Sent: {$command}";

        // Lire TOUTES les lignes de réponse (multi-lignes)
        $fullResponse = '';
        do {
            $line = fgets($smtp, 512);
            $fullResponse .= $line;
            $smtpDebug[] = "Received: " . trim($line);
            // Continuer si la ligne commence par "XXX-" (réponse multi-lignes)
        } while (isset($line[3]) && $line[3] === '-');

        return $fullResponse;
    };

    // SMTP Handshake
    $smtpSend("EHLO jhl.ma");
    $smtpSend("AUTH LOGIN");
    $smtpSend(base64_encode($smtp_username));
    $smtpSend(base64_encode($smtp_password));
    $smtpSend("MAIL FROM: <{$smtp_from}>");
    $smtpSend("RCPT TO: <{$smtp_to}>");
    $smtpSend("DATA", 354);

    // Headers email
    $email = "From: {$smtp_from_name} <{$smtp_to}>\r\n";  // FROM = TO pour éviter SPAM
    $email .= "To: <{$smtp_to}>\r\n";
    $email .= "Reply-To: {$data['email']}\r\n";
    $email .= "Subject: {$subject}\r\n";
    $email .= "MIME-Version: 1.0\r\n";
    $email .= "Content-Type: text/html; charset=UTF-8\r\n";
    $email .= "X-Priority: 1\r\n";
    $email .= "X-MSMail-Priority: High\r\n";
    $email .= "\r\n";
    $email .= $htmlMessage;
    $email .= "\r\n.\r\n";

    fwrite($smtp, $email);
    $smtpDebug[] = "Sent: [EMAIL DATA]";
    $response = fgets($smtp, 512);
    $smtpDebug[] = "Received: " . trim($response);

    $smtpSend("QUIT");
    fclose($smtp);

    $emailSent = true;
    $smtpDebug[] = "Email sent successfully!";
} catch (Exception $e) {
    error_log('SMTP Error: ' . $e->getMessage());
    $smtpDebug[] = "Error: " . $e->getMessage();
    $emailSent = false;
}

// ============================================
// RÉPONSE (toujours succès car sauvegardé)
// ============================================
$response = [
    'success' => true,
    'message' => 'Votre message a été enregistré avec succès. Nous vous contacterons dans les plus brefs délais.',
    'email_sent' => $emailSent,
    'saved_to_file' => true,
    'contact_id' => $newContact['id']
];

// Debug SMTP (décommenter pour diagnostic uniquement)
// $response['smtp_debug'] = $smtpDebug;

echo json_encode($response);
