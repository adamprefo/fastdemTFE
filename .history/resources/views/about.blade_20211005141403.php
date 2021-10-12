<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Transportation HTML-5 Template </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

		<!-- CSS here -->
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="assets/css/slicknav.css">
            <link rel="stylesheet" href="assets/css/flaticon.css">
            <link rel="stylesheet" href="assets/css/animate.min.css">
            <link rel="stylesheet" href="assets/css/magnific-popup.css">
            <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="assets/css/themify-icons.css">
            <link rel="stylesheet" href="assets/css/slick.css">
            <link rel="stylesheet" href="assets/css/nice-select.css">
            <link rel="stylesheet" href="assets/css/style.css">
   </head>

   <body>
    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">
                <div class="header-top d-none d-lg-block">
                    <div class="container">
                        <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                    <ul>
                                        <li>Phone: 02.655.45.55</li>

                                        <li>Email: fastdeminfo@gmail.com</li>
                                    </ul>
                                </div>
                                <div class="header-info-right">
                                    <ul class="header-social">
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li> <a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom  header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="{{ route('home') }}"><img src="assets/img/logo/logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper  d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">
                                                <li><a href="{{ route('home') }}">Home</a></li>
                                                <li><a href="{{ route('about') }}">About</a></li>
                                                <li><a href="{{ route('services') }}">Services</a></li>
                                                <li class="text-white" >Packs de prix</a>
                                                
                                                    <ul class="submenu">
                                                        <li><a href="{{ route('packs') }}">Nos packs</a></li>
                                                         
                                                        <li><a href="{{ route('packsPromo') }}">Packs en promotion</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="{{ route('contact') }}">Contact</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <!-- Header-btn -->

                                    <div class="header-right-btn d-none d-lg-block ml-20">
                                        @guest
                                        <a href="{{ route('login') }}" class="btn header-btn">Login</a>
                                        @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn header-btn">register</a>
                                        @endif
                                        @else
                                        <a href="{{ route('login') }}" class="btn header-btn">{{ Auth::user()->name }}</a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                            Devis
                                        </button>

                                        <!-- début du Modal -->

                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                        <script defer src="https://maps.googleapis.com/maps/api/js?libraries=places&language=en&key=AIzaSyCAb1UA5bvaHAPMhM-B1jAGeh0z5AiD27g" type="text/javascript"></script>

                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Faites votre devis rapidement en 2 cliques !</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="getMiles">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label>Adresse de départ:</label>
                                                                <input class="form-control" id="from_places" required style="z-index:-1">
                                                                <input id="origin" name="origin" type="hidden" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Adresse d'arrivée:</label>
                                                                <input class="form-control" id="to_places" required style="z-index:-1" />
                                                                <input id="destination" name="destination" required="" type="hidden" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="start">Date du déménagement:</label>

                                                                <input type="date" name="startDate" required class="form-control datepicker" id="startDate" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" max="2023-01-01">
                                                               
                                                            </div>
                                                            <span>Heure de départ: </span>
                                                            <div class="form-group">


                                                                <select name="starTime" required id="starTime">
                                                                    <option value="08:00">08:00</option>
                                                                    <option value="09:00">09:00</option>
                                                                    <option value="10:00">10:00</option>
                                                                    <option value="11:00">11:00</option>
                                                                    <option value="12:00">12:00</option>
                                                                    <option value="13:00">13:00</option>
                                                                    <option value="14:00">14:00</option>
                                                                    <option value="15:00">15:00</option>
                                                                    <option value="16:00">16:00</option>
                                                                    <option value="17:00">17:00</option>
                                                                    <option value="18:00">18:00</option>
                                                                </select>
                                                            </div>
                                                            <br></br>

                                                           
                                                            <div class="form-group">
                                                                <h5 for="packs_id">Selectionnée votre packs de prix</h5>
                                                                
                                                                <select name="packs_id" id="packs_id">
                                                                    <option value="1">Economique</option>
                                                                    <option value="2">Standard</option>
                                                                    <option value="3">V.I.P</option>
                                                                </select>
                                                            </div>
                                                            <a href="{{ route('packs') }}"><small><p  class="text-primary sm">Nos packs?</small></p></a>
                                                            <div class="modal-footer">
                                                                
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Mon devis!</button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- fin du Modal -->
                                    <script>
                                        $(function() {
                                            // add input listeners
                                            google.maps.event.addDomListener(window, 'load', function() {
                                                var from_places = new google.maps.places.Autocomplete(document.getElementById('from_places'));
                                                var to_places = new google.maps.places.Autocomplete(document.getElementById('to_places'));

                                                google.maps.event.addListener(from_places, 'place_changed', function() {
                                                    var from_place = from_places.getPlace();
                                                    var from_address = from_place.formatted_address;
                                                    $('#origin').val(from_address);
                                                });

                                                google.maps.event.addListener(to_places, 'place_changed', function() {
                                                    var to_place = to_places.getPlace();
                                                    var to_address = to_place.formatted_address;
                                                    $('#destination').val(to_address);
                                                });

                                            });

                                        });
                                    </script>
                                    <style>
                                        .modal-backdrop {
                                            z-index: -1;

                                        }
                                    </style>
                                    @endguest
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Header End -->
    </header>
    <main>
        <!--? slider Area Start-->
        <div class="slider-area ">
            <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap">
                                <h2>About us</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">About</a></li> 
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!--? About Area Start -->
        <div class="about-low-area section-padding30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-caption mb-50">
                            <!-- Section Tittle -->
                            <div class="section-tittle mb-35">
                         <!-- Section Tittle -->
                         <div class="section-tittle mb-35">
                                <span>Notre compagnie</span>

                                <h2>Fastdem societé de déménagement rapide & safe ! </h2>
                            </div>
                            <p></p>
                            <p>Faire appel à un déménageur professionnel apparaît comme la meilleure alternative pour assurer le sérieux de son déménagement et la sécurité des biens transportés.
                            Véritable professionnel du déménagement de particuliers, et d’entreprise, Fastdem prend en charge votre déménagement complet : de la prise en charge de vos effets jusqu’à la livraison en passant par l’accompagnement pour la réalisation des formalités administratives.
                            </p>
                            <a href="{{ route('about') }}" class="btn">Plus sur nous +</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <!-- about-img -->
                        <div class="about-img ">
                            <div class="about-font-img">
                                <img src="assets/img/gallery/about2.png" alt="">
                            </div>
                            <div class="about-back-img d-none d-lg-block">
                                <img src="assets/img/gallery/about1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Area End -->
     
        
       
    </main>
    <footer>
     <!--? Footer Start-->
     <div class="footer-area footer-bg">
            <div class="container">
                <div class="footer-top footer-padding">
                    <!-- footer Heading -->
                    <div class="footer-heading">
                        <div class="row justify-content-between">
                            <div class="col-xl-6 col-lg-8 col-md-8">
                                <div class="wantToWork-caption wantToWork-caption2">
                                    <h2>Fastdem Speed & Safe !</h2>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4">
                                <span class="contact-number f-right">02.655.45.55</span>
                                <span class="contact-number f-right">fastdeminfo@gmail.com</span>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Menu -->
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>COMPANY</h4>
                                    <ul>
                                        <li><a href="{{ route('about') }}">About Us</a></li>
                                        <li><a href="{{ route('services') }}">Services</a></li>
                                        <li><a href="{{ route('packs') }}"> Packs de prix</a></li>
                                        <li><a href="{{ route('packsPromo') }}">Promotion pack</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Ouvert</h4>
                                    <ul>
                                        <li> Lundi 11h00-17h00</a></li>
                                        <li> Mardi-vendredi 11h00-18h00</a></li>
                                        <li> Samedi 10h00-18h00</a></li>
                                        <li> Dimanche 11h00-18h00</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Adresse:</h4>
                                    <ul>
                                        <li>Rue de l'optimisme 55, Bruxelles 1000</li>
                                        <li><a href="{{ route('contact') }}">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p class="info1">Fastdem war currently ensuing between te Belgium and europe, most fiercely with.</p>
                                    </div>
                                </div>
                                          <!-- Footer Social -->
                                          <div class="footer-social ">
                                    <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fas fa-globe"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->
		<!-- All JS Custom Plugins Link Here here -->
        <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="./assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/slick.min.js"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="./assets/js/wow.min.js"></script>
		<script src="./assets/js/animated.headline.js"></script>
        <script src="./assets/js/jquery.magnific-popup.js"></script>

		<!-- Nice-select, sticky -->
        <script src="./assets/js/jquery.nice-select.min.js"></script>
		<script src="./assets/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="./assets/js/contact.js"></script>
        <script src="./assets/js/jquery.form.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/mail-script.js"></script>
        <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="./assets/js/plugins.js"></script>
        <script src="./assets/js/main.js"></script>
        
    </body>
</html>