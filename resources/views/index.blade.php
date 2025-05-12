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
    <meta property="og:image" content="{{ asset('assets/images/cover-jhl.jpg') }}">
    <meta property="og:image:secure_url" content="{{ asset('assets/images/cover-jhl.jpg') }}">
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="Création Site Web Maroc, Création Site eCommerce et Marketing" />
	<meta name="twitter:description" content="Agence création site web au Maroc meilleur rapport qualité prix, Création Site Web Maroc, Référencement et Conception Graphique  au Maroc, Création de site Web Design Unique , Entretient Gratuit ,  Création Site eCommerce, Création de Site Web eCommerce au Maroc Meilleur Qualité et Prix " />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">
    <title>Création site web au Maroc - Meilleur rapport qualité prix</title>

    <style>
        .solutions-block {
            padding: 80px 0;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.05) 0%, rgba(139, 92, 246, 0.05) 100%);
        }
        .solution-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
            margin-bottom: 30px;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        .solution-card:hover {
            transform: translateY(-10px);
            border-color: rgba(99, 102, 241, 0.2);
        }
        .card-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100px;
            height: 100px;
            margin: 0 auto 20px;
            background: rgba(99, 102, 241, 0.05);
            border-radius: 50%;
        }
        .card-icon img {
            width: 60px;
            height: 60px;
            transition: transform 0.3s ease;
        }
        .solution-card:hover .card-icon img {
            transform: scale(1.1);
        }
        .contact-links a {
            color: #fff;
            text-decoration: none;
            transition: opacity 0.3s ease;
        }
        .contact-links a:hover {
            opacity: 0.8;
        }
        .contact-links img {
            filter: brightness(0) invert(1);
        }
    </style>
    @vite([ 'resources/css/app.css', 'resources/js/app.js' ])
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YJ800BDB1W"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-YJ800BDB1W');
    </script>

</head>
<body>
    <div id="metodoviral-gradient">
        <canvas id="gradient-canvas" data-js-darken-top data-transition-in></canvas>
    </div>


    <header class="mainheader">
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}" title="{{config('app.name')}}">
                    <img class="img-fluid" src="{{asset('assets/images/logo.svg') }}" alt="{{config('app.name')}}">
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

    <main id="mainContent">

        <section class="mainslider">
            <div class="container">
                <div class="col-lg-10 mx-auto px-0">
                    <div class="row">
                        <div class="col-lg-8 mb-md-0 mb-5">
                            <div class="bnr-caption">
                                <span id="typpedCaption"></span>
                            </div>
                            <button type="button" class="btn btn-primary btn-cta" data-bs-toggle="modal" data-bs-target="#modalId">
                                Meeting <strong>GRATUIT</strong>
                            </button>
                            @if ($errors->any() && ($errors->has('name1') || $errors->has('email1') || $errors->has('tel1') ) )
                                <div class="alert alert-danger alert-dismissible fade show col-lg-6 mt-2" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    @foreach ($errors->all() as $message)
                                    <li>{{$message}}</li>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Modal Body-->
                            <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close" id="btnClose"></button>
                                            <div class="w-100 text-center my-4 px-md-4">
                                                <h2 class="h5"> Remplissez le formulaire pour organiser une rencontre </h2>
                                            </div>
                                            <div class="container-fluid">
                                                <div class="container">
                                                    <form action="{{route('contact.sendmeet')}}" method="post" > @csrf
                                                        <div class="form-group row mb-3">
                                                            <label for="fullname" class="col-sm-1-12 col-form-label">Nom Prenom</label>
                                                            <div class="col-sm-1-12">
                                                                <input type="text" class="form-control" name="name1" id="fullname" placeholder="" required="required">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label for="email1" class="col-sm-1-12 col-form-label">Email</label>
                                                            <div class="col-sm-1-12">
                                                                <input type="text" class="form-control" name="email1" id="email1" placeholder="" required="required" >
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label for="phone1" class="col-sm-1-12 col-form-label">Telephone</label>
                                                            <div class="col-sm-1-12">
                                                                <input type="text" class="form-control" name="tel1" id="phone1" placeholder=""
                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')"
                                                                    onkeypress='if( event.keyCode == 46 || event.keyCode == 8 || this.value.length < 20 ) return true; else return false;' >
                                                            </div>
                                                        </div>

                                                        <div class="form-group my-4 pt-3 text-end">
                                                            <button type="submit" class="btn btn-primary px-md-5 px-3">Envoyez</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="promo-card col-lg-11 ms-auto pt-md-4">
                                <span class="badge"> Offres </span>
                                <div id="typed-strings" class="d-none">
                                    <p>Entretien  <strong>GRATUIT</strong></p>
                                    <p>Première année d&#39;hébergement <strong>GRATUIT</strong></p>
                                    <p>Maintenance 6 mois <strong>GRATUIT</strong></p>
                                </div>
                                <div class="promo-content">
                                    <span id="typed"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="services-block" id="services">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="services-slider">
                            <div class="slides-wrapper ps-md-4 py-4">
                                <span class="pseudo-start">
                                    <img class="pseudo-ball" src="{{asset('assets/images/ball.png') }}" alt="">
                                </span>
                                <div class="slides-carousel">
                                    <div>
                                        <div class="row mx-auto">
                                            <div class="col-md-4">
                                                <img class="img-fluid cover lazyload" loading="lazy" width="223" height="272" data-lazy="{{asset('assets/images/web-design.webp') }}" alt="">
                                            </div>
                                            <div class="col-md-8 content py-4 ps-md-5">
                                                <h2 class="service-title"> Creation site web </h2>
                                                <p>Creation de sites web professionnels et attrayants, avec des fonctionnalités telles que la compatibilité mobile, la sécurité, l'accessibilité, l'expérience utilisateur </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="row mx-auto">
                                            <div class="col-md-4">
                                                <img class="img-fluid cover lazyload" loading="lazy" width="223" height="272" data-lazy="{{asset('assets/images/graphic-design.webp') }}" alt="">
                                            </div>
                                            <div class="col-md-8 content py-4 ps-md-5">
                                                <h2 class="service-title"> Marketing </h2>
                                                <p>Stratégies de marketing pour atteindre le public cible de l'entreprise, telles que la publicité en ligne, les médias sociaux, le marketing par e-mail . </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="row mx-auto">
                                            <div class="col-md-4">
                                                <img class="img-fluid cover lazyload" loading="lazy" width="223" height="272" data-lazy="{{asset('assets/images/marketing.webp') }}" alt="">
                                            </div>
                                            <div class="col-md-8 content py-4 ps-md-5">
                                                <h2 class="service-title"> Référencement (SEO) </h2>
                                                <p>Optimisation des sites web pour les moteurs de recherche afin d'améliorer leur visibilité et leur classement dans les résultats de recherche. </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="row mx-auto">
                                            <div class="col-md-4">
                                                <img class="img-fluid cover lazyload" loading="lazy" width="223" height="272" data-lazy="{{asset('assets/images/marketing.webp') }}" alt="">
                                            </div>
                                            <div class="col-md-8 content py-4 ps-md-5">
                                                <h2 class="service-title"> Maintenance </h2>
                                                <p>Services de maintenance pour garantir que les sites web restent à jour et fonctionnent correctement, avec des mises à jour régulières des logiciels, des correctifs de sécurité </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="pseudo-end"></span>
                        </div>
                        <div class="thumb-slider p-md-4 p-2">
                            <ul class="nav" id="thumbSlider">
                                <li class="nav-item">
                                    <a class="nav-link active" data-index="0" href="#">Creation site web</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-index="1" href="#"> Marketing </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-index="2" href="#"> SEO </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-index="3" href="#"> Maintenance </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 mt-ld-0 mt-md-4">
                        <div class="card-style-1">
                            <div class="content">
                                <h2 class="counter">+4 <strong>ANS</strong> </h2> <strong>D'EXPERIENCE</strong>
                            </div>
                            <img class="img-br lazyload" loading="lazy" width="180" height="280" data-src="{{asset('assets/images/thumbs-up.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="solutions-block sp-1" id="solutions">
            <div class="container">
                <div class="row">
                    <div class="col-auto mx-auto mb-5">
                        <h2 class="sec-title text-center">Nos Solutions d'Entreprise</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="solution-card h-100">
                            <div class="card-icon mb-4">
                                <img src="{{asset('assets/images/erp-solution.svg')}}" alt="Solution ERP" width="60" height="60">
                            </div>
                            <h3 class="h4 mb-3">Solution ERP</h3>
                            <p>Un système de gestion d'entreprise intégré qui optimise vos processus métier, de la comptabilité aux ventes en passant par les achats et la production.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="solution-card h-100">
                            <div class="card-icon mb-4">
                                <img src="{{asset('assets/images/hr-solution.svg')}}" alt="Système RH & Paie" width="60" height="60">
                            </div>
                            <h3 class="h4 mb-3">Système RH & Paie</h3>
                            <p>Gérez efficacement vos ressources humaines avec notre solution complète incluant la gestion des employés, la paie, les congés et les performances.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="solution-card h-100">
                            <div class="card-icon mb-4">
                                <img src="{{asset('assets/images/inventory-solution.svg')}}" alt="Gestion de Stock" width="60" height="60">
                            </div>
                            <h3 class="h4 mb-3">Gestion de Stock</h3>
                            <p>Optimisez votre inventaire avec notre solution de gestion de stock qui permet un suivi en temps réel, des alertes de réapprovisionnement et des rapports détaillés.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="solution-card h-100">
                            <div class="card-icon mb-4">
                                <img src="{{asset('assets/images/crm-solution.svg')}}" alt="Solution CRM" width="80" height="80">
                            </div>
                            <h3 class="h4 mb-3">Solution CRM</h3>
                            <p>Gérez efficacement vos relations clients avec notre solution CRM complète incluant le suivi des contacts, la gestion des opportunités, et l'analyse des données clients.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="solution-card h-100">
                            <div class="card-icon mb-4">
                                <img src="{{asset('assets/images/pos-solution.svg')}}" alt="Solution Point de Vente" width="80" height="80">
                            </div>
                            <h3 class="h4 mb-3">Solution Point de Vente</h3>
                            <p>Optimisez vos opérations de vente avec notre système de point de vente intégré, incluant la gestion des transactions, le suivi des stocks en temps réel et les rapports détaillés.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="solution-card h-100">
                            <div class="card-icon mb-4">
                                <img src="{{asset('assets/images/ecommerce-solution.svg')}}" alt="Solution E-commerce" width="80" height="80">
                            </div>
                            <h3 class="h4 mb-3">Solution E-commerce</h3>
                            <p>Lancez votre boutique en ligne avec notre solution e-commerce complète, incluant la gestion des produits, le panier d'achat, et les paiements sécurisés.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="aboutus sp-1 bg-shadow-1" id="aboutus">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 cms-block order-md-1 order-2">
                        <h2 class="title"> Qui sommes nous ?</h2>
                        <div class="cms-content">
                            <p> JHL Solutions a été créée avec la vision de proposer des solutions web personnalisées et innovantes pour nos clients. Nous avons été inspirés par les opportunités offertes par la technologie pour aider les entreprises à transformer leurs activités et à améliorer leur efficacité.</p>
                            <p>Depuis notre création, nous avons travaillé avec de nombreuses entreprises pour les aider à créer des sites web professionnels et performants, à développer des logiciels sur mesure et à gérer des projets complexes.</p>
                            <a class="btn btn-primary" href="#projects"> Projects </a>
                        </div>
                    </div>
                    <div class="col-md-5 ms-auto order-md-2 order-1 mb-md-0 mb-4">
                        <img class="img-fluid lazyload" loading="lazy" width="500" height="460" data-src="{{asset('assets/images/working.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section class="projects sp-1 bg-shadow-1" id="projects">
            <div class="container">
                <div class="row">
                    <div class="col-auto mx-auto mb-5">
                        <h2 class="sec-title text-center"> Nos derniers projets</h2>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6 cms-block order-md-1 order-2">
                        <h2 class="title"><strong>Jibna</strong> , Plateforme de livraison</h2>
                        <div class="cms-content">
                            <p> Une Plateforme ser a gérer les commandes des restauts et les livreurs avec une application mobile des livreurs , </p>
                            <p> Une gestion complete des paiements avec un tracking des livreurs </p>
                            {{-- <button class="btn btn-primary"> View more </button> --}}
                        </div>
                    </div>
                    <div class="col-md-5 ms-auto order-md-2 order-1 text-center">
                        <div class="titris-image">
                            <div class="level1 a-scroll">
                                <img class="lazyload" loading="lazy" width="270" height="290"
                                data-src="{{asset('assets/images/jibna.webp') }}" alt="">
                            </div>
                            <div class="level2 a-scroll speed-100">
                                <img class="lazyload" loading="lazy" width="170" height="270"
                                data-src="{{asset('assets/images/jibna_mobile.webp') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center mt-5">
                    <div class="col-md-5 me-auto">
                        <div class="titris-image text-center">
                            <div class="level1 a-scroll">
                                <img class="lazyload" loading="lazy" width="270" height="290"
                                data-src="{{asset('assets/images/methc.webp') }}" alt="">
                            </div>
                            <div class="level2 a-scroll speed-100">
                                <img class="lazyload" loading="lazy" width="170" height="270"
                                 data-src="{{asset('assets/images/methc_mobile.webp') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 cms-block">
                        <h2 class="title"> <strong>Methc</strong>, Équipement médical et technologie des soins de santé</h2>
                        <div class="cms-content">
                            <p> Une entreprise innovante spécialisée dans la vente, distribution, importation et exportation du matériel médico-technique. Elle compte parmi ses fournisseurs partenaires des leaders mondiaux du secteur, elle propose à ses clients une gamme très large, constituée de produits certifiés apportant toutes les garanties de qualité et de fiabilité, une notion de service (disponibilité, réactivité, rapidité), une grande connaissance des acteurs de fabrication et une forte compétence technique ainsi que le respect de la réglementation et des normes marocaines et internationales en vigueur.</p>
                            <a class="btn btn-primary" href="https://www.methc.ma/" target="_blank">Visit Methc</a>
                        </div>
                    </div>
                </div>


                <div class="row align-items-center mt-5">
                    <div class="col-md-6 cms-block order-md-1 order-2">
                        <h2 class="title"> <strong>Awman</strong> productions</h2>
                        <div class="cms-content">
                            <p> AWMAN PRODUCTIONS est une société marocaine dont l’activité principale est la production indépendante de courts et longs métrages, fiction et documentaire, pour le cinéma et la télévision. Située à Casablanca, la société accompagne les projets de leur initiation à la diffusion.</p>
                            <a class="btn btn-primary" href="https://awman-productions.com/fr" target="_blank">Visit AWMAN</a>
                        </div>
                    </div>
                    <div class="col-md-5 ms-auto order-md-2 order-1 text-center">
                        <div class="titris-image">
                            <div class="level1 a-scroll">
                                <img class="lazyload" loading="lazy" width="270" height="290"
                                data-src="{{asset('assets/images/awmanpro.webp')}}" alt="">
                            </div>
                            <div class="level2 a-scroll speed-100">
                                <img class="lazyload" loading="lazy" width="170" height="270"
                                data-src="{{asset('assets/images/awmanpro_mobile.webp')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <section class="contactus sp-1" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 cms-block offset-xl-1 mb-md-0 mb-5">
                        <span class="badge">Contact</span>
                        <h2 class="title mt-4 mb-md-5 mb-4">
                            OBTENIR  <br>
                            UNE CONSULTATION <br>
                            GRATUITE
                        </h2>
                        <div class="cms-content">
                            <div class="contact-links mb-3">
                                <a class="d-flex align-items-center mb-2" href="https://wa.me/212667246440">
                                    <img src="{{asset('assets/images/whatsapp-icon.svg')}}" alt="WhatsApp" width="24" height="24" class="me-2">
                                    <span>(+212) 667-246440</span>
                                </a>
                                <a class="d-flex align-items-center mb-2" href="tel:+212613602276">
                                    <img src="{{asset('assets/images/phone-icon.svg')}}" alt="Téléphone" width="24" height="24" class="me-2">
                                    <span>(+212) 613-602276</span>
                                </a>
                                <a class="d-flex align-items-center mb-2" href="tel:+212677074093" onclick="window.location.href='tel:+2120677074093';window.open('https://wa.me/2120677074093', '_blank');">
                                    <img src="{{asset('assets/images/contact-combined-icon.svg')}}" alt="Contact" width="48" height="24" class="me-2">
                                    <span>(+212) 677-074093</span>
                                </a>
                                <a class="d-flex align-items-center" href="mailto:contact@jhl.ma">
                                    <span>Contact@jhl.ma</span>
                                </a>
                            </div>
                        </div>
                        <ul class="nav mt-4 social-media">
                            <li class="nav-item"> <a rel="nofollow" class="nav-link" target='_blank' href="https://www.facebook.com/jhl.solution/">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5Z"/></svg> </a> </li>
                            {{-- <li class="nav-item"> <a rel="nofollow" class="nav-link" target='_blank' href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 384 488"><path fill="currentColor" d="M325 339h-25v-15q0-12 12-12h1q12 0 12 12v15zm-95-32q-12 0-12 10v71q0 10 12 10t12-10v-71q0-10-12-10zm154-40v136q0 25-18.5 42T321 462H63q-26 0-44.5-17T0 403V267q0-24 18.5-41.5T63 208h258q26 0 44.5 17.5T384 267zM80 418V275h32v-21l-85-1v21h26v144h27zm96-122h-27v95q-2 5-7 6.5t-8-5.5v-19l-1-77h-26v100q2 17 7 20q9 6 22.5.5T155 402v16h21V296zm85 88v-64q0-19-12-26t-30 7v-47h-27v163h22l2-11q21 18 33.5 10t11.5-32zm84-9h-20v14q0 11-11 11h-4q-11 0-11-11v-29h46v-17q0-26-1-33q-3-16-21.5-20t-30.5 5q-8 7-11 15q-3 10-3 27v38q0 37 28 43q24 5 35-16q7-11 4-27zM242 169q2 5 7 8q4 3 11 3q6 0 10-3t7-9v10h30V51h-24v99q0 10-10 10q-9 0-9-10V51h-25v86q0 18 1 22q0 4 2 10zm-90-71q0-18 3-29q3-9 11-16q8-6 20-6q11 0 18 4q7 3 11 10q4 5 6 13q1 5 1 21v32q0 20-1 26q-1 7-6 15q-3 5-11 11q-8 3-16 3q-10 0-18-3q-7-3-11-9q-4-8-5-14q-2-10-2-25V98zm23 50q0 5 3.5 9t8.5 4q12 0 12-13V81q0-13-12-13t-12 13v67zm-82 34h28V85l33-83h-30l-18 62L88 2H58l35 83v97z"/></svg> </a>
                            </li> --}}
                            <li class="nav-item"> <a rel="nofollow" class="nav-link" target='_blank' href="https://www.instagram.com/jhlsolution/">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" d="M14.5 0h-13C.675 0 0 .675 0 1.5v13c0 .825.675 1.5 1.5 1.5h13c.825 0 1.5-.675 1.5-1.5v-13c0-.825-.675-1.5-1.5-1.5zM11 2.5c0-.275.225-.5.5-.5h2c.275 0 .5.225.5.5v2c0 .275-.225.5-.5.5h-2a.501.501 0 0 1-.5-.5v-2zM8 5a3.001 3.001 0 0 1 0 6a3.001 3.001 0 0 1 0-6zm6 8.5c0 .275-.225.5-.5.5h-11a.501.501 0 0 1-.5-.5V7h1.1A4.999 4.999 0 0 0 8 13a4.999 4.999 0 0 0 4.9-6H14v6.5z"/></svg> </a>
                            </li>
                            <li class="nav-item"> <a rel="nofollow" class="nav-link" target='_blank' href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M4.75 1.875a2.125 2.125 0 1 0 0 4.25a2.125 2.125 0 0 0 0-4.25Zm-2 6A.125.125 0 0 0 2.625 8v13c0 .069.056.125.125.125h4A.125.125 0 0 0 6.875 21V8a.125.125 0 0 0-.125-.125h-4Zm6.5 0A.125.125 0 0 0 9.125 8v13c0 .069.056.125.125.125h4a.125.125 0 0 0 .125-.125v-7a1.875 1.875 0 1 1 3.75 0v7c0 .069.056.125.125.125h4a.125.125 0 0 0 .125-.125v-8.62c0-2.427-2.11-4.325-4.525-4.106a7.168 7.168 0 0 0-2.169.548l-1.306.56V8a.125.125 0 0 0-.125-.125h-4Z"/></svg> </a>
                            </li>
                            </ul>
                    </div>
                    <div class="col-xl-4 col-md-6 offset-xl-1">
                        <form id="formContact" action="{{route('contact.send')}}" method="post"> @csrf
                            <div class="form-group">
                                <label for="name" class="form-label"> Name</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tel" class="form-label"> Phone</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" id="tel" placeholder=""
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')"
                                        onkeypress='if( event.keyCode == 46 || event.keyCode == 8 || this.value.length < 20 ) return true; else return false;' >
                                    @error('tel')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label"> Email</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message" class="form-label"> Subject</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="message" placeholder="">
                                    @error('subject')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cmessage" class="form-label">Message</label>
                                <div class="mb-3">
                                    <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="cmessage" rows="3"></textarea>
                                    @error('message')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-primary">Envoyez</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


                <div id="bkgOverlay" class="backgroundOverlay"></div>
        
        <div id="delayedPopup" class="delayedPopupWindow">
        <!-- This is the close button -->
        <a href="#" id="btnClose" title="Click here to close this deal box.">[ X ]</a>
        <!-- This is the left side of the popup for the description -->
        <div class="formDescription">
            <h2>Sign Up and <span style="color: #40c348; font-weight: bold;">Save $25!</span></h2>
            <p>Sign up for our Deal Alerts and save
            $25 Off of your first order of $50 or more!</p>
        </div>
        <!-- Begin MailChimp Signup Form -->
        <div id="mc_embed_signup">
            <form action="" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="">
            <div class="mc-field-group">
                <label for="mce-FNAME">First Name
                <span class="asterisk">*</span>
                </label>
                <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
            </div>
            <div class="mc-field-group">
                <label for="mce-LNAME">Last Name
                <span class="asterisk">*</span>
                </label>
                <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
            </div>
            <div class="mc-field-group">
                <label for="mce-EMAIL">Email Address
                <span class="asterisk">*</span>
                </label>
                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
            </div>

            <div id="mce-responses" class="clear">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none"></div>
            </div>
            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;">
                <input type="text" name="b_2aabb98e55b83ba9d3bd551f5_e6c08b53b4" value="">
            </div>
            <div class="clear">
                <input type="submit" value="Save Money!" name="subscribe" id="mc-embedded-subscribe" class="button">
            </div>
            </form>
        </div>
        <!-- End MailChimp Signup Form -->
        </div>




    </main>

    <footer class="footer">
        <div class="container text-center">
            <p class="py-3 m-0">   Copyright © <strong>JHL</strong> All Right reserved {{date('Y')}}</p>
        </div>
    </footer>

    @if ($errors->any() && !($errors->has('name1') || $errors->has('email1') || $errors->has('tel1') ) )
    <script>
        document.getElementById('formContact').scrollIntoView({
            behavior: "smooth"
        });
    </script>
    @endif

</body>
</html>
