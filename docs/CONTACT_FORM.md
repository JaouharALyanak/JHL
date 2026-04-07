# 📧 Formulaire de Contact - Configuration Complète

## ✅ Configuration Actuelle

### Backend Laravel

- **Route API:** `POST /api/contact` (sans CSRF pour HTML statique)
- **Route Web:** `POST /contact` (avec CSRF pour Blade)
- **Controller:** `App\Http\Controllers\ContactController@send`
- **Email:** Envoi via `App\Mail\ContactMail` vers `contact@jhl.ma`
- **SMTP:** Hostinger Titan (`smtp.hostinger.com:465`)

### Frontend

- **Page:** `jhl-refonte/contact/index.html`
- **JavaScript:** `jhl-refonte/assets/js/form.js`
- **Validation:** Client-side + Server-side Laravel

---

## 📋 Champs du Formulaire

| Champ     | Type     | Requis | Validation          |
| --------- | -------- | ------ | ------------------- |
| `name`    | text     | Oui    | Min 2 caractères    |
| `email`   | email    | Oui    | Format email valide |
| `phone`   | tel      | Oui    | Format téléphone    |
| `service` | select   | Oui    | Valeur non vide     |
| `budget`  | select   | Non    | Optionnel           |
| `message` | textarea | Oui    | Min 10 caractères   |

---

## 🚀 Démarrage Rapide

### 1. Démarrer le serveur Laravel

```bash
cd C:\Users\Soufiane\Desktop\Soufiane\Projects\JHL
php artisan serve
```

### 2. Ouvrir la page de contact

```
http://localhost:8000/jhl-refonte/contact/index.html
```

### 3. Tester le formulaire

- Remplir tous les champs requis (\*)
- Cliquer sur "Envoyer la demande"
- Vérifier l'email dans `contact@jhl.ma`

---

## 🔧 Structure des Fichiers

### Backend Laravel

```
app/
├── Http/
│   └── Controllers/
│       └── ContactController.php    # Gestion du formulaire
├── Mail/
│   ├── ContactMail.php             # Classe email contact
│   └── ClientMeetMail.php          # Classe email rendez-vous
└── Rules/
    └── Recaptcha.php               # Validation reCAPTCHA (désactivée)

resources/views/mails/
├── contact.blade.php               # Template email contact
└── meet.blade.php                  # Template email rendez-vous

routes/
├── web.php                         # Route POST /contact (CSRF)
└── api.php                         # Route POST /api/contact (sans CSRF)
```

### Frontend Statique

```
jhl-refonte/
├── contact/
│   └── index.html                  # Page de contact
└── assets/
    ├── css/
    │   ├── components.css          # Styles formulaire + .form-error
    │   └── animations.css          # .spinner (loading)
    └── js/
        └── form.js                 # Validation + Envoi AJAX
```

---

## 📦 Flux d'Envoi

```mermaid
graph TD
    A[Utilisateur remplit formulaire] --> B[Validation JavaScript]
    B -->|Erreur| C[Affichage erreurs rouges]
    B -->|Valide| D[POST /api/contact]
    D --> E[ContactController@send]
    E --> F[Validation Laravel]
    F -->|Erreur| G[Retour JSON errors]
    F -->|Valide| H[Mail::send ContactMail]
    H --> I[SMTP Hostinger Titan]
    I --> J[Email reçu: contact@jhl.ma]
    J --> K[Retour JSON success]
    K --> L[Affichage message succès]
```

---

## 🎨 Fonctionnalités UI

### Validation en Temps Réel

- ✅ Validation champ par champ au `blur`
- ✅ Effacement erreur à la saisie (`input` event)
- ✅ Bordure rouge sur champs invalides

### Formatage Automatique

- ✅ Téléphone: `+212 6XX-XXXXXX` (auto-formaté)

### États du Bouton

```javascript
// Normal
"Envoyer la demande";

// Pendant l'envoi (disabled)
"🔄 Envoi en cours...";

// Succès → Message vert 5s
"✅ Message envoyé avec succès !";

// Erreur → Message orange 5s
"⚠️ Une erreur est survenue...";
```

---

## 📧 Template Email

L'email envoyé à `contact@jhl.ma` contient :

```
📧 Nouvelle demande de contact - JHL.ma

👤 Informations du client
━━━━━━━━━━━━━━━━━━━━━━

Nom complet: [nom]
Email: [email]
Téléphone: [+212 XXX XXX XXX]
Service demandé: [Site Vitrine | E-commerce | SEO | etc.]
Budget estimé: [5000-10000 DH] (si renseigné)

💬 Message
━━━━━━━━━━━━━━━━━━━━━━

[Message du client]

━━━━━━━━━━━━━━━━━━━━━━

[Bouton: Répondre au client]

Cordialement,
JHL Solutions
```

---

## 🧪 Tests

### Test validation frontend

```javascript
// Dans la console navigateur
const form = document.getElementById("contactForm");
const formData = new FormData(form);
const data = Object.fromEntries(formData);
validateForm(data); // Retourne objet erreurs
```

### Test envoi manuel

```bash
curl -X POST http://localhost:8000/api/contact \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
    "name": "Test Client",
    "email": "test@example.com",
    "phone": "+212 600 000 000",
    "service": "site-vitrine",
    "budget": "10000-20000",
    "message": "Ceci est un test du formulaire de contact JHL"
  }'
```

### Test avec Postman

- **Method:** POST
- **URL:** `http://localhost:8000/api/contact`
- **Headers:**
    - `Content-Type: application/json`
    - `Accept: application/json`
- **Body:** JSON (voir exemple ci-dessus)

---

## 🔒 Sécurité

### Protection CSRF

- **Route API** (`/api/contact`): Pas de CSRF (pour HTML statique)
- **Route Web** (`/contact`): CSRF requis (pour Blade views)

### Validation Laravel

```php
'name' => 'required|string|min:2',
'phone' => 'required|string',
'email' => 'required|email',
'service' => 'required|string',
'message' => 'required|string|min:10',
'budget' => 'nullable|string'
```

### reCAPTCHA (Optionnel)

Actuellement **désactivé**. Pour activer :

1. Obtenir clés sur https://www.google.com/recaptcha
2. Ajouter dans `.env`:
    ```env
    RECAPTCHA_SITE_KEY=votre_site_key
    RECAPTCHA_SECRET_KEY=votre_secret_key
    ```
3. Décommenter dans `ContactController.php`:
    ```php
    'recap2secure' => [ 'required', new Recaptcha ]
    ```

---

## 🐛 Résolution de Problèmes

### Erreur 419 (CSRF Token Mismatch)

✅ **Solution:** Utilisez `/api/contact` (pas `/contact`)

### Erreur 500 (Server Error)

1. Vérifier que Laravel est démarré: `php artisan serve`
2. Vérifier les logs: `storage/logs/laravel.log`
3. Tester SMTP: `php artisan email:test`

### Email non reçu

1. Vérifier logs Laravel
2. Tester SMTP: `php artisan email:test contact@jhl.ma`
3. Vérifier dossier SPAM

### Formulaire ne s'envoie pas

1. Ouvrir Console navigateur (F12)
2. Vérifier erreurs JavaScript
3. Vérifier Network tab:
    - Request URL: `http://localhost:8000/api/contact`
    - Status: 200 (success) ou 422 (validation error)
    - Response: JSON avec `success: true/false`

### Validation échoue toujours

Vérifier dans Console :

```javascript
// Doit afficher les données avant envoi
console.log("Données du formulaire:", data);
```

---

## 📱 Responsive Design

Le formulaire est entièrement responsive :

- **Desktop:** 2 colonnes (formulaire + infos)
- **Tablet:** 2 colonnes (s'adapte)
- **Mobile:** 1 colonne (stack vertical)

---

## 🎁 Fonctionnalités Supplémentaires

### Auto-complétion Email

Les champs email suggèrent les domaines courants :

- `@gmail.com`
- `@outlook.com`
- `@hotmail.com`
- `@yahoo.com`

### Sauvegarde Brouillon (à implémenter)

```javascript
// localStorage pour sauvegarder le formulaire
localStorage.setItem("contactDraft", JSON.stringify(formData));
```

### Notification Push (à implémenter)

Slack/Discord webhook pour notification instantanée nouveau contact.

---

## 📊 Analytics (à implémenter)

Tracker les événements :

- Formulaire prévisualisé
- Champs remplis (conversion partielle)
- Formulaire soumis (conversion complète)
- Erreurs de validation (abandon)

```javascript
// Google Analytics 4
gtag("event", "form_submit", {
    event_category: "Contact",
    event_label: "Contact Form",
    value: formData.service,
});
```

---

**Dernière mise à jour:** 6 avril 2026  
**Testé avec:** Laravel 10.x + PHP 8.x + Hostinger Titan SMTP
