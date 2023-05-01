<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>landing page</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/imgs/favicon.png" rel="icon">
    <link href="assets/imgs/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/landing.css" rel="stylesheet">


</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <img src="assets/imgs/logo.png" alt="">
                <span>Vala Administration</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    @guest
                        <li><a class="getstarted scrollto" href="{{ route('login') }}">Se connecter</a></li>
                    @else
                        <li><a class="nav-link scrollto" href="{{ route('login') }}">Dashboard</a></li>
                        <li>
                            <form id="log_out" method="POST" action="{{ route('logout') }}">
                                @csrf
                            </form>
                            <a class="getstarted scrollto" onclick="document.getElementById('log_out').submit()"
                                href="#">LogOut</a>
                        </li>
                    @endguest
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    <br>
    <br>


    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Connectez-vous maintenant pour voir votre dashboard </h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Suivez vos absences et congés très simplement vous devez
                        seulement connecter</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="{{route("login")}}"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            @guest

                                <span>Se connecter</span>
                                @else
                                <span>acceder a tableau de board</span>
                                @endguest

                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="assets/imgs/hero-img.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->



    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">



        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-8 col-md-12 footer-info">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <img src="assets/img/logo.png" alt="">
                            <span>Vala</span>
                        </a>
                        <p>Vala Bleu est une société privée forte de plus de 15 ans d'expérience dans l'enregistrement
                            des noms de domaine, le déploiement et la gestion des plates-formes d'hébergement web de
                            pointe.
                            <br>
                            Notre entreprise est en pleine expansion et ne fait appel qu'aux experts les plus compétents
                            pour assurer aux clients un service de qualité inégalée et une meilleure présence sur le
                            web.
                        </p>


                    </div>





                    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                        <h4>Contact-nous</h4>
                        <p>
                            2ème étage N°6, Immeuble Safwa, <br>
                            Boulevard, Avenue Hassan 1er، <br>
                            Agadir 80000<br><br>
                            <strong>Phone:</strong> 05282-13045<br>
                        </p>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Vala</span></strong>. All Rights Reserved
            </div>

        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->

    <!-- Template Main JS File -->

</body>

</html>
