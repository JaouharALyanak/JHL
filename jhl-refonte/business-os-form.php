<?php

/**
 * JHL Business OS — Formulaire de participation au programme de test
 * Réutilise la configuration SMTP Hostinger de contact.php
 */

// Headers CORS / JSON
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Accept');

// OPTIONS preflight
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Vérifier méthode POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
    exit;
}

// ============================================
// RÉCUPÉRATION DES DONNÉES
// Supporte multipart/form-data (FormData) ET application/json
// ============================================
$contentType = $_SERVER['CONTENT_TYPE'] ?? '';

if (strpos($contentType, 'application/json') !== false) {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true) ?: [];
} else {
    // FormData (multipart ou application/x-www-form-urlencoded)
    $data = $_POST;
}

// ============================================
// PROTECTION ANTI-SPAM (honeypot)
// ============================================
if (!empty($data['_hp_business_os'])) {
    // Faux succès pour les bots
    http_response_code(200);
    echo json_encode(['success' => true, 'message' => 'Demande enregistrée.']);
    exit;
}

// ============================================
// VALIDATION CÔTÉ SERVEUR
// ============================================
$errors = [];

// Nom et prénom
$nom = trim($data['bos_nom'] ?? '');
if (strlen($nom) < 2) {
    $errors['bos_nom'] = 'Veuillez indiquer votre nom et prénom.';
}

// Email
$email = trim($data['bos_email'] ?? '');
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['bos_email'] = 'Veuillez entrer une adresse e-mail valide.';
}

// Ville
$ville = trim($data['bos_ville'] ?? '');
if (empty($ville)) {
    $errors['bos_ville'] = 'Veuillez indiquer votre ville.';
}

// Secteur
$secteur = trim($data['bos_secteur'] ?? '');
if (empty($secteur)) {
    $errors['bos_secteur'] = 'Veuillez sélectionner votre secteur d\'activité.';
}

// Volume mensuel
$volumeMensuel = trim($data['bos_volume_mensuel'] ?? '');
if (empty($volumeMensuel)) {
    $errors['bos_volume_mensuel'] = 'Veuillez indiquer un volume approximatif.';
}

// Volume IA
$volumeIa = trim($data['bos_volume_ia'] ?? '');
if (empty($volumeIa)) {
    $errors['bos_volume_ia'] = 'Veuillez indiquer un volume approximatif.';
}

// Difficulté
$difficulte = trim($data['bos_difficulte'] ?? '');
if (strlen($difficulte) < 5) {
    $errors['bos_difficulte'] = 'Veuillez décrire brièvement votre principale difficulté.';
}

// Participation
$participation = trim($data['bos_participation'] ?? '');
if (empty($participation)) {
    $errors['bos_participation'] = 'Veuillez choisir votre type de participation.';
}

// Consentement
$consentement = trim($data['bos_consentement'] ?? '');
if ($consentement !== 'oui') {
    $errors['bos_consentement'] = 'Votre consentement est requis.';
}

// Retourner les erreurs s'il y en a
if (!empty($errors)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
}

// ============================================
// DONNÉES OPTIONNELLES
// ============================================
$entreprise  = trim($data['bos_entreprise'] ?? 'Non indiqué');
$whatsapp    = trim($data['bos_whatsapp']   ?? 'Non indiqué');
$plateformes = trim($data['bos_plateformes'] ?? 'Non indiqué');
$budget      = trim($data['bos_budget']      ?? 'Non indiqué');

// ============================================
// SAUVEGARDE JSON (backup fiable)
// ============================================
$leadsFile = __DIR__ . '/business-os-leads.json';
$leads = [];

if (file_exists($leadsFile)) {
    $existing = file_get_contents($leadsFile);
    $leads = json_decode($existing, true) ?: [];
}

$newLead = [
    'id'              => uniqid('bos_', true),
    'date'            => date('Y-m-d H:i:s'),
    'nom'             => $nom,
    'entreprise'      => $entreprise,
    'email'           => $email,
    'whatsapp'        => $whatsapp,
    'ville'           => $ville,
    'secteur'         => $secteur,
    'volume_mensuel'  => $volumeMensuel,
    'plateformes'     => $plateformes,
    'volume_ia'       => $volumeIa,
    'difficulte'      => $difficulte,
    'budget'          => $budget,
    'participation'   => $participation,
    'ip'              => $_SERVER['REMOTE_ADDR'] ?? 'Unknown',
    'user_agent'      => substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 150)
];

$leads[] = $newLead;
file_put_contents($leadsFile, json_encode($leads, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// ============================================
// EMAIL HTML (même SMTP que contact.php)
// ============================================
$subject = '🚀 JHL Business OS — Nouvelle demande de test : ' . $nom;

$htmlMessage = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #1F2937; background: #f5f5f5; margin: 0; padding: 20px; }
        .container { max-width: 640px; margin: 0 auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        .header { background: linear-gradient(135deg, #1E40AF 0%, #3B82F6 100%); color: white; padding: 28px 32px; }
        .header h2 { margin: 0; font-size: 20px; }
        .header p { margin: 6px 0 0; opacity: 0.85; font-size: 14px; }
        .badge { display: inline-block; background: rgba(255,255,255,0.2); padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: bold; margin-bottom: 10px; }
        .content { padding: 28px 32px; }
        .section { margin-bottom: 24px; }
        .section-title { font-size: 13px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.06em; color: #6B7280; margin-bottom: 12px; border-bottom: 1px solid #E5E7EB; padding-bottom: 6px; }
        .field { display: flex; gap: 12px; margin-bottom: 10px; }
        .field-label { font-weight: bold; color: #1E40AF; min-width: 180px; font-size: 14px; }
        .field-value { color: #374151; font-size: 14px; flex: 1; }
        .difficulte-box { background: #F0F9FF; border-left: 4px solid #3B82F6; padding: 14px 16px; border-radius: 0 8px 8px 0; margin-top: 6px; font-size: 14px; color: #374151; white-space: pre-wrap; }
        .btn { display: inline-block; padding: 12px 24px; background: linear-gradient(135deg, #1E40AF, #3B82F6); color: white; text-decoration: none; border-radius: 8px; margin-top: 8px; font-size: 14px; font-weight: bold; }
        .footer { background: #F9FAFB; padding: 16px 32px; font-size: 12px; color: #9CA3AF; border-top: 1px solid #E5E7EB; }
        .participation-badge { display: inline-block; padding: 5px 14px; background: #DBEAFE; color: #1E40AF; border-radius: 20px; font-weight: bold; font-size: 13px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="badge">🚀 Nouveau prospect</div>
            <h2>JHL Business OS — Demande de test</h2>
            <p>Reçue le ' . date('d/m/Y à H:i') . ' • ID : ' . $newLead['id'] . '</p>
        </div>
        <div class="content">

            <!-- Coordonnées -->
            <div class="section">
                <div class="section-title">👤 Coordonnées</div>
                <div class="field"><span class="field-label">Nom et prénom</span><span class="field-value"><strong>' . htmlspecialchars($nom) . '</strong></span></div>
                <div class="field"><span class="field-label">Entreprise</span><span class="field-value">' . htmlspecialchars($entreprise) . '</span></div>
                <div class="field"><span class="field-label">E-mail</span><span class="field-value"><a href="mailto:' . htmlspecialchars($email) . '">' . htmlspecialchars($email) . '</a></span></div>
                <div class="field"><span class="field-label">WhatsApp</span><span class="field-value">' . htmlspecialchars($whatsapp) . '</span></div>
                <div class="field"><span class="field-label">Ville</span><span class="field-value">' . htmlspecialchars($ville) . '</span></div>
            </div>

            <!-- Activité -->
            <div class="section">
                <div class="section-title">🏢 Activité</div>
                <div class="field"><span class="field-label">Secteur</span><span class="field-value">' . htmlspecialchars($secteur) . '</span></div>
                <div class="field"><span class="field-label">Demandes / mois</span><span class="field-value">' . htmlspecialchars($volumeMensuel) . '</span></div>
                <div class="field"><span class="field-label">Volume IA souhaité</span><span class="field-value">' . htmlspecialchars($volumeIa) . '</span></div>
                <div class="field"><span class="field-label">Plateformes souhaitées</span><span class="field-value">' . htmlspecialchars($plateformes) . '</span></div>
                <div class="field"><span class="field-label">Budget mensuel</span><span class="field-value">' . htmlspecialchars($budget) . '</span></div>
            </div>

            <!-- Difficulté -->
            <div class="section">
                <div class="section-title">💬 Principale difficulté</div>
                <div class="difficulte-box">' . nl2br(htmlspecialchars($difficulte)) . '</div>
            </div>

            <!-- Participation -->
            <div class="section">
                <div class="section-title">🎯 Type de participation</div>
                <span class="participation-badge">' . htmlspecialchars($participation) . '</span>
            </div>

            <a href="mailto:' . htmlspecialchars($email) . '?subject=RE: JHL Business OS - Votre demande de test" class="btn">
                ✉️ Répondre à ' . htmlspecialchars($nom) . '
            </a>
        </div>
        <div class="footer">
            Envoyé automatiquement depuis jhl.ma/business-os/ · IP: ' . htmlspecialchars($_SERVER['REMOTE_ADDR'] ?? 'N/A') . '
        </div>
    </div>
</body>
</html>
';

// ============================================
// ENVOI SMTP (même config que contact.php)
// ============================================
$emailSent = false;
$smtpDebug = [];

try {
    $smtp_host     = 'smtp.hostinger.com';
    $smtp_port     = 465;
    $smtp_username = 'smtp@jhl.ma';
    $smtp_password = '8i*BV1ZxjI';
    $smtp_from     = 'smtp@jhl.ma';
    $smtp_from_name = 'JHL Business OS';
    $smtp_to       = 'contact@jhl.ma';

    $context = stream_context_create([
        'ssl' => [
            'verify_peer'       => false,
            'verify_peer_name'  => false,
            'allow_self_signed' => true
        ]
    ]);

    $smtp = stream_socket_client(
        "ssl://{$smtp_host}:{$smtp_port}",
        $errno,
        $errstr,
        30,
        STREAM_CLIENT_CONNECT,
        $context
    );

    if (!$smtp) {
        throw new Exception("Connexion SMTP impossible : {$errstr} ({$errno})");
    }

    // Lire banner
    fgets($smtp, 512);

    // Helper SMTP
    $smtpSend = function ($command) use ($smtp, &$smtpDebug) {
        fwrite($smtp, $command . "\r\n");
        $fullResponse = '';
        do {
            $line = fgets($smtp, 512);
            $fullResponse .= $line;
            $smtpDebug[] = 'R: ' . trim($line);
        } while (isset($line[3]) && $line[3] === '-');
        return $fullResponse;
    };

    $smtpSend("EHLO jhl.ma");
    $smtpSend("AUTH LOGIN");
    $smtpSend(base64_encode($smtp_username));
    $smtpSend(base64_encode($smtp_password));
    $smtpSend("MAIL FROM: <{$smtp_from}>");
    $smtpSend("RCPT TO: <{$smtp_to}>");
    $smtpSend("DATA");

    $mail  = "From: {$smtp_from_name} <{$smtp_to}>\r\n";
    $mail .= "To: <{$smtp_to}>\r\n";
    $mail .= "Reply-To: {$email}\r\n";
    $mail .= "Subject: {$subject}\r\n";
    $mail .= "MIME-Version: 1.0\r\n";
    $mail .= "Content-Type: text/html; charset=UTF-8\r\n";
    $mail .= "X-Priority: 1\r\n";
    $mail .= "\r\n";
    $mail .= $htmlMessage;
    $mail .= "\r\n.\r\n";

    fwrite($smtp, $mail);
    fgets($smtp, 512);
    $smtpSend("QUIT");
    fclose($smtp);

    $emailSent = true;

} catch (Exception $e) {
    error_log('BOS SMTP Error: ' . $e->getMessage());
    $emailSent = false;
}

// ============================================
// RÉPONSE — toujours succès (données sauvegardées)
// ============================================
echo json_encode([
    'success'    => true,
    'message'    => 'Votre demande a bien été enregistrée. Nous vous contacterons prochainement.',
    'email_sent' => $emailSent,
    'saved'      => true,
    'id'         => $newLead['id']
]);
