<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="description" content="Agence création site web au Maroc , Création Site Web Maroc, Référencement et Conception Graphique au Maroc, Création de site Web Design Unique , Entretient Gratuit ,  Création Site eCommerce, Création de Site Web eCommerce au Maroc Meilleur Qualité et Prix " />
	<link rel="canonical" href="https://www.jhl.ma/" />
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Création Site Web Maroc, Création Site eCommerce et Marketing" />
    <meta property="og:description" content="Jhl Solution Agence création site web au Maroc meilleur rapport qualité prix, Création Site Web Maroc, Référencement et Conception Graphique  au Maroc, Création de site Web Design Unique , Entretient Gratuit ,  Création Site eCommerce, Création de Site Web eCommerce au Maroc Meilleur Qualité et Prix " />
    <meta property="og:url" content="https://www.jhl.ma/" />
    <meta property="og:site_name" content="Jhl Solution Création Site Web Au Maroc" />
    <meta property="article:publisher" content="https://www.facebook.com/jhl.solution" />
    <meta property="og:image" content="{{ asset('assets/images/favicon.png') }}">
    <meta property="og:image:secure_url" content="{{ asset('assets/images/favicon.png') }}">
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="Création Site Web Maroc, Création Site eCommerce et Marketing" />
	<meta name="twitter:description" content="Agence création site web au Maroc meilleur rapport qualité prix, Création Site Web Maroc, Référencement et Conception Graphique  au Maroc, Création de site Web Design Unique , Entretient Gratuit ,  Création Site eCommerce, Création de Site Web eCommerce au Maroc Meilleur Qualité et Prix " />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">
    <title>Création site web au Maroc - Meilleur rapport qualité prix</title>
    @vite([ 'resources/css/app.css', 'resources/js/app.js' ])
</head>
<body class="d-flex flex-column" style="min-height: 100vh;">
    <div id="metodoviral-gradient">
        <canvas id="gradient-canvas" data-js-darken-top data-transition-in></canvas>
    </div>


    <header class="mainheader">
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img class="img-fluid" src="{{asset('assets/images/logo.svg') }}" alt="">
                </a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#pageMenu" aria-controls="pageMenu"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="pageMenu">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item"> <a class="nav-link" href="#aboutus"> JHL</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="#services"> Services </a> </li>
                        <li class="nav-item"> <a class="nav-link" href="#projects"> Projects </a> </li>
                        <li class="nav-item"> <a class="nav-link" href="#contact"> Contact </a> </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-fill" style="background-image: none;" id="mainContent">

        <section class="aboutus sp-1 bg-shadow-1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 cms-block order-md-1 order-2">
                        <h2 class="title"> Nous vous remercions d'avoir pris contact avec JHL Solution</h2>
                        <div class="cms-content">
                            <p>
                                Notre équipe a bien reçu votre message et nous sommes en train d'examiner les détails que vous avez fournis. Nous comprenons l'importance de votre demande et nous nous engageons à vous répondre dans les plus brefs délais.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-5 ms-auto order-md-2 order-1 mb-md-0 mb-4">
                        <img class="img-fluid lazyload" loading="lazy" width="500" height="460" data-src="{{asset('assets/images/thanks.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer class="footer">
        <div class="container text-center">
            <p class="py-3 m-0"> All Right reserved {{date('Y')}}</p>
        </div>
    </footer>

</body>
</html>
