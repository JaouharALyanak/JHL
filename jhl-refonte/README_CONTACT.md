# 📧 FORMULAIRE DE CONTACT - SITE HTML STATIQUE

## ✅ FICHIERS CRÉÉS

1. **contact.php** - Handler PHP pour envoyer les emails
2. **assets/js/form.js** - JavaScript validation + envoi AJAX
3. **contact/index.html** - Page de contact avec formulaire

---

## 🚀 COMMENT TESTER

### Option 1: Serveur PHP Built-in (RECOMMANDÉ)

```bash
cd C:\Users\Soufiane\Desktop\Soufiane\Projects\JHL\jhl-refonte
php -S localhost:8080
```

Puis ouvrir: **http://localhost:8080/contact/**

### Option 2: XAMPP/WAMP/MAMP

1. Copier le dossier `jhl-refonte` dans `htdocs/` (XAMPP) ou `www/` (WAMP)
2. Démarrer Apache
3. Ouvrir: **http://localhost/jhl-refonte/contact/**

### Option 3: Hostinger (Production)

1. Uploader tout le dossier `jhl-refonte` dans `public_html`
2. Vérifier que PHP est activé
3. Tester: **https://jhl.ma/contact/**

---

## 📋 CONFIGURATION EMAIL

Le fichier **contact.php** utilise 2 méthodes :

### Méthode 1: SMTP Hostinger (Recommandé)

```php
Host: smtp.hostinger.com
Port: 465 (SSL)
Username: smtp@jhl.ma
Password: 8i*BV1ZxjI
```

### Méthode 2: mail() natif PHP (Fallback)

Si SMTP échoue, utilise la fonction mail() de PHP.

---

## ✅ TEST RAPIDE

1. Démarrer serveur PHP:

```bash
cd jhl-refonte
php -S localhost:8080
```

2. Ouvrir: http://localhost:8080/contact/

3. Remplir le formulaire:
    - Nom: Test Client
    - Email: test@example.com
    - Téléphone: +212 600 000 000
    - Service: Site Vitrine
    - Message: Ceci est un test

4. Cliquer "Envoyer la demande"

5. Vérifier:
    - ✅ Message de succès vert
    - ✅ Email reçu dans contact@jhl.ma

---

## 🐛 RÉSOLUTION DE PROBLÈMES

### Erreur CORS

Si erreur `Access-Control-Allow-Origin`, vérifier que le fichier est servi par un serveur web (pas file://).

### Email non reçu

1. Vérifier logs PHP: `tail -f /var/log/apache2/error.log`
2. Vérifier que port 465 est ouvert
3. Tester avec mail() natif si SMTP ne fonctionne pas

### 404 sur contact.php

Vérifier que le chemin dans form.js est correct :

```javascript
const response = await fetch('../contact.php', {
```

Si contact.php est dans un autre dossier, ajuster le chemin.

---

## 📁 STRUCTURE FICHIERS

```
jhl-refonte/
├── contact.php              ← Handler email (NOUVEAU)
├── .htaccess                ← URL rewriting
├── contact/
│   └── index.html           ← Formulaire de contact
└── assets/
    └── js/
        └── form.js          ← Validation + AJAX (MODIFIÉ)
```

---

## 🎨 VALIDATION

Le formulaire valide :

- ✅ Nom: min 2 caractères
- ✅ Email: format valide
- ✅ Téléphone: requis
- ✅ Service: selection requise
- ✅ Message: min 10 caractères
- ✅ Budget: optionnel

---

## 📧 EMAIL REÇU

L'email envoyé à **contact@jhl.ma** contient:

```
📧 Nouvelle Demande de Contact
JHL Solutions Maroc

👤 Nom complet: [nom]
📧 Email: [email] (lien mailto)
📞 Téléphone: [tel] (lien tel)
🛠️ Service: [service]
💰 Budget: [budget] (si renseigné)
💬 Message: [message]

[Bouton: Répondre au client]
```

---

## 🚀 DÉPLOIEMENT PRODUCTION

1. Uploader via FTP:
    - jhl-refonte/ → public_html/
2. Vérifier permissions:

    ```bash
    chmod 644 contact.php
    chmod 755 contact/
    ```

3. Tester sur https://jhl.ma/contact/

4. Vérifier email dans contact@jhl.ma

---

**Dernière mise à jour:** 6 avril 2026  
**Testé avec:** PHP 8.x + Hostinger SMTP
