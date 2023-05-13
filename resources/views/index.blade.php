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

    @vite([ 'resources/css/app.css', 'resources/js/app.js' ])
</head>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YJ800BDB1W"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YJ800BDB1W');
</script>

<body>
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
                                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
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
                            <a class="text-reset me-3" href="tel:+212 667-246440"> (+212) 667-246440</a> .
                            <a class="text-reset ms-md-3 ms-sm-0" href="mailto:contact@jhl.com"> Contact@jhl.ma </a>
                        </div>
                        <nav class="nav mt-4">
                            <a class="nav-link btn btn-icon bg-white rounded-circle py-1 px-2" href="#">Fb</a>
                        </nav>
                    </div>
                    <div class="col-xl-4 col-md-6 offset-xl-1">
                        <form id="formContact" action="{{route('contact.send')}}" method="post"> @csrf
                            <div class="form-group">
                                <label for="inputName" class="form-label"> Name</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="inputName" placeholder="">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="form-label"> Phone</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" id="inputName" placeholder=""
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
                                <label for="inputName" class="form-label"> Email</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="inputName" placeholder="">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="form-label"> Subject</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="inputName" placeholder="">
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

    </main>

    <footer class="footer">
        <div class="container text-center">
            <p class="py-3 m-0"> All Right reserved {{date('Y')}}</p>
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
