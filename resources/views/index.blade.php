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
    <meta property="og:description" content="Agence création site web au Maroc meilleur rapport qualité prix, Création Site Web Maroc, Référencement et Conception Graphique  au Maroc, Création de site Web Design Unique , Entretient Gratuit ,  Création Site eCommerce, Création de Site Web eCommerce au Maroc Meilleur Qualité et Prix " />
    <meta property="og:url" content="https://www.jhl.ma/" />
    <meta property="og:site_name" content="Création Site Web Maroc, Création Site eCommerce et Marketing" />
    <meta property="article:publisher" content="https://www.facebook.com/jhl.solution" />
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
                <a class="navbar-brand" href="#">
                    <img class="img-fluid" src="{{asset('assets/images/logo.svg') }}" alt="">
                </a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#pageMenu" aria-controls="pageMenu"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="pageMenu">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item"> <a class="nav-link" href="#"> JHL</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="#"> Services </a> </li>
                        <li class="nav-item"> <a class="nav-link" href="#"> Projects </a> </li>
                        <li class="nav-item"> <a class="nav-link" href="#"> Contact </a> </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main id="mainContent">

        <section class="mainslider">
            <div class="container">
                <div class="col-md-10 mx-auto px-0">
                    <div class="row">
                        <div class="col-md-8 mb-md-0 mb-5">
                            <div class="bnr-caption">
                                <span id="typpedCaption"></span>
                            </div>
                            <button type="button" class="btn btn-primary btn-cta" data-bs-toggle="modal" data-bs-target="#modalId">
                                Meeting Gratuit
                            </button>

                            <!-- Modal Body-->
                            <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                Add rows here
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="col-md-4">
                            <div class="promo-card col-md-10 ms-auto pt-md-4">
                                <span class="badge"> Our deals </span>
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

        <section class="services-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="services-slider">
                            <div class="slides-wrapper ps-md-4 py-4">
                                <span class="pseudo-start">
                                    <img class="pseudo-ball" src="{{asset('assets/images/ball.png') }}" alt="">
                                </span>
                                <div class="slides-carousel">
                                    <div>
                                        <div class="row mx-auto">
                                            <div class="col-md-4">
                                                <img class="img-fluid cover lazyload" loading="lazy" width="223" height="272" data-lazy="{{asset('assets/images/web-design.jpg') }}" alt="">
                                            </div>
                                            <div class="col-md-8 content py-4 ps-md-5">
                                                <h2 class="service-title"> Web Design </h2>
                                                <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="row mx-auto">
                                            <div class="col-md-4">
                                                <img class="img-fluid cover lazyload" loading="lazy" width="223" height="272" data-lazy="{{asset('assets/images/graphic-design.jpg') }}" alt="">
                                            </div>
                                            <div class="col-md-8 content py-4 ps-md-5">
                                                <h2 class="service-title"> Graphic design </h2>
                                                <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. </p>
                                                <ul class="nav mt-5">
                                                    <li class="nav-item pe-4"> <img class="w-60 img-fluid" src="{{asset('assets/images/illustrator.png') }}" alt=""> </li>
                                                    <li class="nav-item pe-4"> <img class="w-60 img-fluid" src="{{asset('assets/images/photoshop.png') }}" alt=""> </li>
                                                    <li class="nav-item pe-4"> <img class="w-60 img-fluid" src="{{asset('assets/images/xd.png') }}" alt=""> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="row mx-auto">
                                            <div class="col-md-4">
                                                <img class="img-fluid cover lazyload" loading="lazy" width="223" height="272" data-lazy="{{asset('assets/images/marketing.jpg') }}" alt="">
                                            </div>
                                            <div class="col-md-8 content py-4 ps-md-5">
                                                <h2 class="service-title"> Marketing </h2>
                                                <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. </p>
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
                                    <a class="nav-link active" data-index="0" href="#"> Web design </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-index="1" href="#"> Graphic design </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-index="2" href="#"> Marketing </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-style-1">
                            <div class="content">
                                <h2 class="counter"> 4 years </h2> of magic
                            </div>
                            <img class="img-br lazyload" loading="lazy" width="180" height="280" data-src="{{asset('assets/images/thumbs-up.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="aboutus sp-1 bg-shadow-1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 cms-block order-md-1 order-2">
                        <h2 class="title"> Who we are ?</h2>
                        <div class="cms-content">
                            <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat hic alias nihil sint impedit molestias rerum perferendis sit facere,</p>
                            <p> autem beatae delectus quis illo voluptatum sed in porro accusantium unde? </p>
                            <button class="btn btn-primary"> View more </button>
                        </div>
                    </div>
                    <div class="col-md-5 ms-auto order-md-2 order-1 mb-md-0 mb-4">
                        <img class="img-fluid lazyload" loading="lazy" width="500" height="460" data-src="{{asset('assets/images/working.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section class="projects sp-1 bg-shadow-1">
            <div class="container">
                <div class="row">
                    <div class="col-auto mx-auto mb-5">
                        <h2 class="sec-title text-center"> Our Last Projects </h2>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6 cms-block order-md-1 order-2">
                        <h2 class="title"> Jibna, delivery platform</h2>
                        <div class="cms-content">
                            <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat hic alias nihil sint impedit molestias rerum perferendis sit facere,</p>
                            <p> autem beatae delectus quis illo voluptatum sed in porro accusantium unde? </p>
                            <button class="btn btn-primary"> View more </button>
                        </div>
                    </div>
                    <div class="col-md-5 ms-auto order-md-2 order-1">
                        <div class="titris-image">
                            <div class="level1 a-scroll">
                                <img class="lazyload" loading="lazy" width="270" height="290" data-src="{{asset('assets/images/jibna.jpg') }}" alt="">
                            </div>
                            <div class="level2 a-scroll speed-100">
                                <img class="lazyload" loading="lazy" width="170" height="270" data-src="{{asset('assets/images/jibna_mobile.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center mt-5">
                    <div class="col-md-5 me-auto">
                        <div class="titris-image">
                            <div class="level1 a-scroll">
                                <img class="lazyload" loading="lazy" width="270" height="290" data-src="{{asset('assets/images/methc.jpg') }}" alt="">
                            </div>
                            <div class="level2 a-scroll speed-100">
                                <img class="lazyload" loading="lazy" width="170" height="270" data-src="{{asset('assets/images/methc_mobile.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 cms-block">
                        <h2 class="title"> Methc, Medical Equipment & Technology of HealthCare</h2>
                        <div class="cms-content">
                            <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat hic alias nihil sint impedit molestias rerum perferendis sit facere,</p>
                            <p> autem beatae delectus quis illo voluptatum sed in porro accusantium unde? </p>
                            <button class="btn btn-primary"> View more </button>
                        </div>
                    </div>
                </div>


                <div class="row align-items-center mt-5">
                    <div class="col-md-6 cms-block order-md-1 order-2">
                        <h2 class="title"> Awman productions</h2>
                        <div class="cms-content">
                            <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat hic alias nihil sint impedit molestias rerum perferendis sit facere,</p>
                            <p> autem beatae delectus quis illo voluptatum sed in porro accusantium unde? </p>
                            <button class="btn btn-primary"> View more </button>
                        </div>
                    </div>
                    <div class="col-md-5 ms-auto order-md-2 order-1">
                        <div class="titris-image">
                            <div class="level1 a-scroll">
                                <img class="lazyload" loading="lazy" width="270" height="290" data-src="{{asset('assets/images/awmanpro.jpg')}}" alt="">
                            </div>
                            <div class="level2 a-scroll speed-100">
                                <img class="lazyload" loading="lazy" width="170" height="270" data-src="{{asset('assets/images/awmanpro_mobile.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <section class="contactus sp-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 cms-block offset-md-1 mb-md-0 mb-5">
                        <span class="badge">Contact</span>
                        <h2 class="title mt-4 mb-md-5 mb-4">
                            Any quastions ? <br>
                            Write or call us. <br>
                            We will write back within 12h
                        </h2>
                        <div class="cms-content">
                            <a class="text-reset me-3" href="tel:0652544556"> (+212) 652 54 45 56</a> .
                            <a class="text-reset ms-md-3 ms-sm-0" href="mailto:contact@jhl.com"> Contact@jhl.com </a>
                        </div>
                        <nav class="nav mt-4">
                            <a class="nav-link btn btn-icon bg-white rounded-circle py-1 px-2" href="#">Fb</a>
                        </nav>
                    </div>
                    <div class="col-md-4 offset-md-1">
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
                                    <input type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" id="inputName" placeholder="">
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
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer class="footer">
        <div class="container text-center">
            <p class="py-3 m-0"> All Right reserved 2023</p>
        </div>
    </footer>

    {{-- <script src="{{ asset('assets/js/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/gradientbgmv.js') }}"></script>
    <script src="{{ asset('assets/js/typed.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script> --}}

    @if ($errors->any())
    <script>
        $(document).ready(function () {
            $(window).scrollTop( $('#formContact').offset().top - 40);
        })
    </script>
    @endif

</body>
</html>
