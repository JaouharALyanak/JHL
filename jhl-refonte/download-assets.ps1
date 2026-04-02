# Script PowerShell pour telecharger les assets JHL.ma
# A executer dans le dossier jhl-refonte/

Write-Host "========================================" -ForegroundColor Cyan
Write-Host "  Telechargement Assets JHL.ma" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

# Creer le dossier images s'il n'existe pas
$imagesPath = "assets/images"
if (-not (Test-Path $imagesPath)) {
    New-Item -ItemType Directory -Force -Path $imagesPath | Out-Null
    Write-Host "OK - Dossier $imagesPath cree" -ForegroundColor Green
} else {
    Write-Host "OK - Dossier $imagesPath existe deja" -ForegroundColor Yellow
}

Write-Host ""

# URL de base et liste des fichiers
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

# Compteurs
$success = 0
$failed = 0

# Telecharger chaque fichier
foreach ($file in $files) {
    $url = "$baseUrl/$file"
    $output = "$imagesPath/$file"
    
    Write-Host "Telechargement de $file..." -NoNewline
    
    try {
        Invoke-WebRequest -Uri $url -OutFile $output -ErrorAction Stop
        Write-Host " OK" -ForegroundColor Green
        $success++
    }
    catch {
        Write-Host " ERREUR" -ForegroundColor Red
        Write-Host "  Raison: $($_.Exception.Message)" -ForegroundColor Red
        $failed++
    }
}

Write-Host ""
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "  Resume" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "Fichiers telecharges: $success" -ForegroundColor Green
Write-Host "Echecs: $failed" -ForegroundColor $(if ($failed -eq 0) { "Green" } else { "Red" })
Write-Host ""

if ($success -eq $files.Count) {
    Write-Host "SUCCESS - Tous les assets ont ete telecharges!" -ForegroundColor Green
} else {
    Write-Host "ATTENTION - Certains fichiers n'ont pas pu etre telecharges." -ForegroundColor Yellow
    Write-Host "   Veuillez les telecharger manuellement depuis:" -ForegroundColor Yellow
    Write-Host "   $baseUrl" -ForegroundColor Cyan
}

Write-Host ""
Write-Host "NOTE - N'oubliez pas de creer l'image Open Graph:" -ForegroundColor Yellow
Write-Host "   $imagesPath/jhl-og-image.jpg (1200x630px)" -ForegroundColor Yellow
Write-Host ""

# Pause pour lire les resultats
Read-Host "Appuyez sur Entree pour fermer"
