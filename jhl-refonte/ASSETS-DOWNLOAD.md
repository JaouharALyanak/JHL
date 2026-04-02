# 📥 Guide de Téléchargement des Assets

Ce fichier contient tous les liens pour télécharger les assets nécessaires au site JHL.ma.

---

## 🖼️ Images SVG à Télécharger

Téléchargez les fichiers suivants depuis le site actuel et placez-les dans `assets/images/` :

### Logo

```
https://jhl.ma/assets/images/logo.svg
→ Sauvegarder sous: assets/images/logo.svg
```

### Solutions ERP

```
https://jhl.ma/assets/images/erp-solution.svg
→ Sauvegarder sous: assets/images/erp-solution.svg
```

### Système RH & Paie

```
https://jhl.ma/assets/images/hr-solution.svg
→ Sauvegarder sous: assets/images/hr-solution.svg
```

### Gestion de Stock

```
https://jhl.ma/assets/images/inventory-solution.svg
→ Sauvegarder sous: assets/images/inventory-solution.svg
```

### CRM

```
https://jhl.ma/assets/images/crm-solution.svg
→ Sauvegarder sous: assets/images/crm-solution.svg
```

### Point de Vente

```
https://jhl.ma/assets/images/pos-solution.svg
→ Sauvegarder sous: assets/images/pos-solution.svg
```

### E-commerce

```
https://jhl.ma/assets/images/ecommerce-solution.svg
→ Sauvegarder sous: assets/images/ecommerce-solution.svg
```

---

## 🚀 Téléchargement Rapide (PowerShell)

Copiez et exécutez ce script PowerShell dans le dossier du projet :

```powershell
# Créer le dossier s'il n'existe pas
New-Item -ItemType Directory -Force -Path "assets/images"

# Télécharger tous les assets
$baseUrl = "https://jhl.ma/assets/images"
$files = @(
    "logo.svg",
    "erp-solution.svg",
    "hr-solution.svg",
    "inventory-solution.svg",
    "crm-solution.svg",
    "pos-solution.svg",
    "ecommerce-solution.svg"
)

foreach ($file in $files) {
    $url = "$baseUrl/$file"
    $output = "assets/images/$file"

    Write-Host "Téléchargement de $file..." -ForegroundColor Cyan

    try {
        Invoke-WebRequest -Uri $url -OutFile $output
        Write-Host "✓ $file téléchargé" -ForegroundColor Green
    }
    catch {
        Write-Host "✗ Erreur pour $file" -ForegroundColor Red
    }
}

Write-Host "`n🎉 Téléchargement terminé!" -ForegroundColor Green
```

**Comment exécuter** :

1. Ouvrir PowerShell dans le dossier `jhl-refonte/`
2. Copier-coller le script ci-dessus
3. Appuyer sur Entrée

---

## 🖼️ Image Open Graph à Créer

**Fichier requis** : `assets/images/jhl-og-image.jpg`

### Spécifications

- **Dimensions** : 1200 × 630 pixels (format Open Graph)
- **Format** : JPG optimisé
- **Poids** : < 200 KB
- **Contenu suggéré** :
    - Logo JHL en haut à gauche
    - Slogan : "Création Site Web au Maroc"
    - Fond light (#FFFFFF) avec accents bleus (#1E40AF)
    - Texte foncé (#1F2937) bien contrasté

### Outils pour créer l'image

- **Canva** : https://www.canva.com/ (Templates OG)
- **Figma** : https://www.figma.com/ (Design professionnel)
- **Adobe Express** : https://www.adobe.com/express/ (Rapide)
- **Photopea** : https://www.photopea.com/ (Photoshop gratuit en ligne)

### Template suggéré

```
┌─────────────────────────────────────────┐
│  [Logo JHL]                             │
│                                         │
│         Création Site Web               │
│              au Maroc                   │
│                                         │
│    Agence Digitale · SEO · Marketing    │
│                                         │
│                               jhl.ma    │
└─────────────────────────────────────────┘
```

---

## ✅ Vérification

Après téléchargement, vérifiez que tous les fichiers sont présents :

```
assets/images/
├── logo.svg                    ✓
├── erp-solution.svg            ✓
├── hr-solution.svg             ✓
├── inventory-solution.svg      ✓
├── crm-solution.svg            ✓
├── pos-solution.svg            ✓
├── ecommerce-solution.svg      ✓
└── jhl-og-image.jpg            ✓ (à créer)
```

---

## 🔍 Optimisation des SVG (Optionnel)

Pour optimiser la taille des SVG :

```bash
# Installer SVGO
npm install -g svgo

# Optimiser tous les SVG
svgo -f assets/images
```

Ou utiliser un outil en ligne :

- https://jakearchibald.github.io/svgomg/

---

## 📞 Besoin d'Aide ?

Si vous rencontrez des problèmes pour télécharger les assets :

- **Email** : contact@jhl.ma
- **WhatsApp** : +212 667-246440

---

**Dernière mise à jour** : 2 avril 2026
