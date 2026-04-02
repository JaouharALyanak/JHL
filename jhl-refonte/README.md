# 🚀 JHL.ma — Site Web Refondu

Refonte complète du site web de **JHL Solutions**, agence digitale marocaine spécialisée en création de sites web, SEO, marketing digital et solutions ERP.

---

## 📋 Table des Matières

- [Aperçu](#aperçu)
- [Caractéristiques](#caractéristiques)
- [Technologies](#technologies)
- [Structure du Projet](#structure-du-projet)
- [Installation](#installation)
- [Configuration](#configuration)
- [Performance & SEO](#performance--seo)
- [Animations](#animations)
- [Formulaire de Contact](#formulaire-de-contact)
- [Assets Requis](#assets-requis)
- [Optimisations](#optimisations)
- [Déploiement](#déploiement)

---

## 🎯 Aperçu

Site vitrine **dark mode** avec une direction artistique moderne, des animations soignées et une optimisation SEO poussée pour le marché marocain.

### Sections Principales

1. **Hero** — Intro percutante avec mesh animé et social proof
2. **Services** — 4 services principaux (Création Web, Marketing, SEO, Maintenance)
3. **Solutions** — 6 solutions logicielles métier (ERP, RH, Stock, CRM, POS, E-commerce)
4. **À Propos** — Histoire de JHL + compteurs animés
5. **Projets** — Portfolio de 3 réalisations
6. **Contact** — Formulaire avec validation + offres spéciales

---

## ✨ Caractéristiques

### Design

- 🌑 **Dark mode** par défaut avec palette rouge-noir
- 💎 **Glassmorphism** sur les cartes de services
- 🎨 **Gradient mesh** animé en background
- ✨ **Particules connectées** sur le hero (Canvas)
- 🎯 **Typography** : Syne (display) + DM Sans (body) + Space Mono (accents)

### Expérience Utilisateur

- 📱 **100% Responsive** — Mobile-first design
- ⚡ **Performance optimisée** — Core Web Vitals
- ♿ **Accessible** — ARIA labels, contraste, navigation clavier
- 🎬 **Animations fluides** — Intersection Observer, reveal au scroll
- 🔄 **Smooth scroll** — Navigation fluide entre sections

### SEO

- 🔍 **Meta tags complets** — Title, description, keywords, OG, Twitter Card
- 📊 **Schema.org JSON-LD** — ProfessionalService
- 🖼️ **Images optimisées** — Alt text, lazy loading, dimensions
- 🌐 **Canonical URL** — Pour éviter duplicate content
- 🇲🇦 **Ciblage Maroc** — Locale fr_MA, mots-clés locaux

---

## 🛠️ Technologies

| Catégorie      | Technologies                                     |
| -------------- | ------------------------------------------------ |
| **Frontend**   | HTML5, CSS3, JavaScript (Vanilla)                |
| **Fonts**      | Google Fonts (Syne, DM Sans, Space Mono)         |
| **Animations** | CSS Keyframes, Intersection Observer API, Canvas |
| **SEO**        | Schema.org, Open Graph, Twitter Cards            |
| **Backend**    | Laravel (optionnel pour le formulaire)           |

---

## 📁 Structure du Projet

```
jhl-refonte/
├── index.html                  # Page principale
├── PROGRESS.md                 # Suivi d'avancement
├── SEO-CHECKLIST.md            # Checklist SEO complète
├── README.md                   # Documentation (ce fichier)
│
├── assets/
│   ├── images/                 # Assets visuels
│   │   ├── logo.svg
│   │   ├── erp-solution.svg
│   │   ├── hr-solution.svg
│   │   ├── inventory-solution.svg
│   │   ├── crm-solution.svg
│   │   ├── pos-solution.svg
│   │   ├── ecommerce-solution.svg
│   │   └── jhl-og-image.jpg    # Image Open Graph 1200x630
│   │
│   ├── css/
│   │   ├── main.css            # Variables, reset, typo
│   │   ├── animations.css      # Keyframes & transitions
│   │   ├── components.css      # Boutons, cartes, forms
│   │   └── sections.css        # Styles par section
│   │
│   └── js/
│       ├── main.js             # Init, observers, compteurs
│       ├── animations.js       # Animations avancées
│       └── form.js             # Validation formulaire
```

---

## 🚀 Installation

### 1. Cloner ou Télécharger

Si le projet est dans un repo Git :

```bash
git clone [URL_DU_REPO]
cd jhl-refonte
```

### 2. Télécharger les Assets

Récupérer les images SVG depuis le site actuel :

```
https://jhl.ma/assets/images/logo.svg
https://jhl.ma/assets/images/erp-solution.svg
https://jhl.ma/assets/images/hr-solution.svg
https://jhl.ma/assets/images/inventory-solution.svg
https://jhl.ma/assets/images/crm-solution.svg
https://jhl.ma/assets/images/pos-solution.svg
https://jhl.ma/assets/images/ecommerce-solution.svg
```

Les placer dans `assets/images/`

### 3. Ouvrir le Site

**Option A : Directement dans le navigateur**

```
Ouvrir index.html dans Chrome/Firefox/Edge
```

**Option B : Serveur local (recommandé)**

```bash
# Python 3
python -m http.server 8000

# PHP
php -S localhost:8000

# Node.js (http-server)
npx http-server -p 8000
```

Puis ouvrir : `http://localhost:8000`

---

## ⚙️ Configuration

### Google Fonts

Les fonts sont chargées automatiquement depuis Google Fonts via le CSS :

```css
@import url("https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@400;500;700&family=Space+Mono:wght@400;700&display=swap");
```

### Palette de Couleurs

Modifiable dans `assets/css/main.css` (variables CSS) :

```css
:root {
    --color-primary: #ffffff; /* Fond blanc */
    --color-secondary: #f8f9fa; /* Gris clair */
    --color-accent: #1e40af; /* Bleu JHL */
    --color-accent-soft: #3b82f6; /* Bleu clair */
    --color-text: #1f2937; /* Texte foncé */
    --color-text-muted: #6b7280; /* Texte secondaire */
    /* ... */
}
```

### Animations Optionnelles

Dans `assets/js/animations.js`, décommenter les animations avancées :

```javascript
// Décommenter pour activer :
initCardTilt(); // Effet 3D au survol des cartes
initMagneticButtons(); // Boutons magnétiques
initParallaxScroll(); // Parallax au scroll
initGradientFollower(); // Gradient suit la souris
initPreloader(); // Écran de chargement
```

---

## 📊 Performance & SEO

### Checklist Performance

- ✅ **CSS/JS minifiés** (à faire avant production)
- ✅ **Images lazy loading** (attribut `loading="lazy"`)
- ✅ **Fonts preload** (Google Fonts avec preconnect)
- ✅ **Animations optimisées** (GPU-accelerated)
- ✅ **Intersection Observer** (au lieu de scroll events)
- ✅ **Canvas pour mesh** (plus performant que CSS complexe)

### Test Performance

```bash
# Lighthouse CLI
npm install -g lighthouse
lighthouse http://localhost:8000 --view

# Ou utiliser Chrome DevTools > Lighthouse
```

**Objectifs** :

- Performance : > 90
- Accessibility : > 95
- Best Practices : > 95
- SEO : > 95

### SEO Best Practices

✅ Utiliser [SEO-CHECKLIST.md](SEO-CHECKLIST.md) pour valider tous les points

**Points clés** :

- Meta title unique (50-60 caractères)
- Meta description engageante (150-160 caractères)
- H1 unique par page avec mots-clés principaux
- Hiérarchie Hn respectée (H1 > H2 > H3)
- Images avec alt text descriptif
- Schema.org JSON-LD implémenté
- URLs canoniques
- Open Graph pour réseaux sociaux

---

## 🎬 Animations

### Animations Principales

| Animation          | Déclencheur                    | Description                                |
| ------------------ | ------------------------------ | ------------------------------------------ |
| **Reveal**         | Scroll (Intersection Observer) | Éléments apparaissent de bas en haut       |
| **Stagger**        | Scroll                         | Enfants apparaissent avec délai progressif |
| **Split Text**     | Page load                      | Titre hero se révèle ligne par ligne       |
| **Compteurs**      | Scroll vers section About      | Chiffres s'animent de 0 à valeur finale    |
| **Mesh Particles** | Page load                      | Particules connectées sur canvas           |
| **Badge Pulse**    | Loop                           | Point rouge pulse continuellement          |

### Personnaliser les Animations

**Durée d'animation** (`animations.css`) :

```css
.reveal {
    transition:
        opacity 0.7s var(--easing-smooth),
        transform 0.7s var(--easing-smooth);
}
```

**Délai stagger** (`animations.css`) :

```css
.stagger-children .reveal:nth-child(2) {
    transition-delay: 100ms; /* Modifier ici */
}
```

**Préférence mouvement réduit** :
Le site respecte automatiquement `prefers-reduced-motion` pour l'accessibilité.

---

## 📧 Formulaire de Contact

### Validation Côté Client

Le formulaire valide en temps réel :

- **Nom** : min 2 caractères
- **Email** : format email valide
- **Téléphone** : format international (+212...)
- **Service** : sélection obligatoire
- **Message** : min 10 caractères

### Soumission

**Option 1 : Laravel (recommandé)**

Créer une route dans `routes/web.php` :

```php
Route::post('/contact', [ContactController::class, 'submit']);
```

Créer `ContactController` :

```php
public function submit(Request $request) {
    $validated = $request->validate([
        'name' => 'required|min:2',
        'email' => 'required|email',
        'phone' => 'required',
        'service' => 'required',
        'message' => 'required|min:10'
    ]);

    // Envoyer email via Mail facade
    Mail::to('contact@jhl.ma')->send(new ContactMail($validated));

    return response()->json(['success' => true]);
}
```

**Option 2 : Mailto (fallback)**

Si pas de backend, le formulaire peut ouvrir le client email :

```javascript
// Déjà implémenté dans form.js
submitViaEmail(data);
```

**Option 3 : API externe**

Modifier `submitForm()` dans `form.js` pour appeler une API externe (FormSpree, EmailJS, etc.)

---

## 🖼️ Assets Requis

### Images SVG à Télécharger

| Fichier                  | Source                                              | Dimensions | Usage         |
| ------------------------ | --------------------------------------------------- | ---------- | ------------- |
| `logo.svg`               | https://jhl.ma/assets/images/logo.svg               | Variable   | Header/Footer |
| `erp-solution.svg`       | https://jhl.ma/assets/images/erp-solution.svg       | 80x80      | Solutions     |
| `hr-solution.svg`        | https://jhl.ma/assets/images/hr-solution.svg        | 80x80      | Solutions     |
| `inventory-solution.svg` | https://jhl.ma/assets/images/inventory-solution.svg | 80x80      | Solutions     |
| `crm-solution.svg`       | https://jhl.ma/assets/images/crm-solution.svg       | 80x80      | Solutions     |
| `pos-solution.svg`       | https://jhl.ma/assets/images/pos-solution.svg       | 80x80      | Solutions     |
| `ecommerce-solution.svg` | https://jhl.ma/assets/images/ecommerce-solution.svg | 80x80      | Solutions     |

### Créer l'Image Open Graph

**`jhl-og-image.jpg`** (1200x630px)

- Design en accord avec la charte graphique
- Inclure logo JHL + slogan
- Fond dark avec accents rouges
- Texte lisible et contrasté
- Format : JPG optimisé (<200 KB)

Outils recommandés :

- [Canva](https://www.canva.com/) — Templates OG
- [Figma](https://www.figma.com/) — Design libre
- [Adobe Express](https://www.adobe.com/express/) — Rapide

---

## ⚡ Optimisations

### Avant Production

**1. Minifier CSS/JS**

```bash
# CSS
npx clean-css-cli -o assets/css/main.min.css assets/css/main.css

# JavaScript
npx terser assets/js/main.js -o assets/js/main.min.js
```

Puis mettre à jour les liens dans `index.html`

**2. Compresser Images**

```bash
# SVG (SVGO)
npx svgo -f assets/images

# JPG/PNG (ImageOptim, TinyPNG, ou Squoosh)
```

**3. Activer Gzip/Brotli**

Sur Apache (`.htaccess`) :

```apache
<IfModule mod_deflate.c>
  AddOutputFilterByType DEFLATE text/html text/css application/javascript
</IfModule>
```

Sur Nginx (`nginx.conf`) :

```nginx
gzip on;
gzip_types text/css application/javascript;
```

**4. Lazy Load Iframes**

Si vous ajoutez une Google Map :

```html
<iframe src="..." loading="lazy"></iframe>
```

---

## 🌍 Déploiement

### Hébergement Web Classique

1. Uploader tous les fichiers via FTP/SFTP
2. Vérifier que `index.html` est à la racine
3. Configurer le domaine (DNS A record vers IP serveur)
4. Activer HTTPS (Let's Encrypt)

### Netlify (Gratuit et Rapide)

```bash
# Installer Netlify CLI
npm install -g netlify-cli

# Déployer
cd jhl-refonte
netlify deploy --prod
```

Ou via l'interface :

1. Glisser-déposer le dossier sur [Netlify Drop](https://app.netlify.com/drop)
2. Configurer le domaine custom

### Vercel

```bash
# Installer Vercel CLI
npm install -g vercel

# Déployer
vercel --prod
```

### Laravel (Intégration)

Si vous intégrez au projet Laravel existant :

1. Copier le HTML dans `resources/views/index.blade.php`
2. Déplacer CSS/JS dans `public/assets/`
3. Utiliser les helpers Laravel : `{{ asset('assets/css/main.css') }}`
4. Créer les routes et controllers pour le formulaire

---

## 📞 Contact & Support

**JHL Solutions**

- 🌐 Site : [https://jhl.ma](https://jhl.ma)
- 📧 Email : contact@jhl.ma
- 📱 WhatsApp : +212 667-246440
- ☎️ Téléphone : +212 613-602276
- 📍 Localisation : Casablanca, Maroc

---

## 📄 Licence

Copyright © 2026 JHL Solutions — Tous droits réservés

---

## 🙏 Remerciements

- **Google Fonts** pour Syne, DM Sans et Space Mono
- **Heroicons** pour l'inspiration des icônes SVG
- **MDN Web Docs** pour les APIs JavaScript modernes

---

**🎉 Site développé avec ❤️ par Copilot Agent pour JHL Solutions**
