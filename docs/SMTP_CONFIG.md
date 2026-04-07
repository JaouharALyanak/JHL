# 📧 Configuration SMTP Hostinger Titan - JHL Solutions

## ✅ Configuration Actuelle

### Serveur SMTP Hostinger Titan

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.titan.email
MAIL_PORT=465
MAIL_USERNAME=smtp@jhl.ma
MAIL_PASSWORD=8i*BV1ZxjI
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=contact@jhl.ma
MAIL_FROM_NAME=JHL
```

### Serveur IMAP (réception)

- **Host:** imap.titan.email
- **Port:** 993
- **Encryption:** SSL/TLS

---

## 🧪 Tester la Configuration

### Commande de test rapide

```bash
php artisan email:test
```

### Envoyer un test à une autre adresse

```bash
php artisan email:test votre.email@example.com
```

---

## 📬 Emails Utilisés

| Type        | Email          | Utilisation                            |
| ----------- | -------------- | -------------------------------------- |
| **Contact** | contact@jhl.ma | Réception formulaires contact site web |
| **SMTP**    | smtp@jhl.ma    | Compte d'envoi SMTP (authentification) |

---

## 🔧 Résolution de Problèmes

### Erreur "Connection refused" ou "Connection timed out"

- ✅ Vérifier que le port **465** est ouvert sur votre serveur
- ✅ Vérifier que l'extension PHP `openssl` est activée

```bash
php -m | grep openssl
```

### Erreur "Authentication failed"

- ✅ Vérifier les credentials dans `.env`
- ✅ Vérifier que le compte `smtp@jhl.ma` est actif sur Hostinger Titan
- ✅ Vérifier le mot de passe : `8i*BV1ZxjI`

### Emails non reçus

- ✅ Vérifier le dossier SPAM/Courrier indésirable
- ✅ Vérifier les logs Laravel : `storage/logs/laravel.log`
- ✅ Tester avec `php artisan email:test`

### Vérifier la configuration actuelle

```bash
php artisan tinker
>>> config('mail.mailers.smtp')
>>> config('mail.from')
```

---

## 📑 Fichiers de Mail

### ContactMail.php

Formulaire de contact du site web

- **Template:** `resources/views/mails/contact.blade.php`
- **To:** contact@jhl.ma
- **Subject:** JHL - Contact Form

### ClientMeetMail.php

Demande de rendez-vous client

- **Template:** `resources/views/mails/meet.blade.php`
- **To:** contact@jhl.ma
- **Subject:** JHL - Client Meet

---

## 🚀 Déploiement Production

### 1. Mettre à jour .env sur le serveur

```bash
MAIL_MAILER=smtp
MAIL_HOST=smtp.titan.email
MAIL_PORT=465
MAIL_USERNAME=smtp@jhl.ma
MAIL_PASSWORD="8i*BV1ZxjI"
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=contact@jhl.ma
MAIL_FROM_NAME="JHL Solutions"
```

### 2. Clear cache config

```bash
php artisan config:clear
php artisan cache:clear
```

### 3. Tester l'envoi

```bash
php artisan email:test contact@jhl.ma
```

### 4. Vérifier les logs

```bash
tail -f storage/logs/laravel.log
```

---

## 📞 Support Hostinger Titan

- **Panel:** https://titan.email/
- **Documentation:** https://www.hostinger.com/tutorials/how-to-use-titan-email
- **Support:** Via panel Hostinger

---

## 🔒 Sécurité

⚠️ **Important :**

- Ne jamais commit le fichier `.env` sur Git
- `.env` est déjà dans `.gitignore`
- Les credentials SMTP sont sensibles

---

**Dernière mise à jour :** 6 avril 2026  
**Testé avec :** Laravel 10.x + PHP 8.x
