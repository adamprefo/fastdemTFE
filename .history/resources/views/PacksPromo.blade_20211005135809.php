<!doctype html>
<html class="no-js" lang="zxx">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>Transportation HTML-5 Template </title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

  <!-- CSS here -->
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
      <link rel="stylesheet" href="assets/css/slicknav.css">
      <link rel="stylesheet" href="assets/css/animate.min.css">
      <link rel="stylesheet" href="assets/css/magnific-popup.css">
      <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/slick.css">
      <link rel="stylesheet" href="assets/css/nice-select.css">
      <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
   <!-- Preloader Start -->
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
   <!-- Preloader Start-->
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
                             <h2>Blog Details</h2>
                             <nav aria-label="breadcrumb">
                                 <ol class="breadcrumb">
                                     <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                     <li class="breadcrumb-item"><a href="#">Blog Details</a></li> 
                                 </ol>
                             </nav>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- slider Area End-->
      <!--================Blog Area =================-->
      <section class="blog_area single-post-area section-padding">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 posts-list">
                  <div class="single-post">
                     <div class="feature-img">
                        <img class="img-fluid" src="assets/img/blog/single_blog_1.png" alt="">
                     </div>
                     <div class="blog_details">
                        <h2>Second divided from form fish beast made every of seas
                           all gathered us saying he our
                        </h2>
                        <ul class="blog-info-link mt-3 mb-4">
                           <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                           <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                        </ul>
                        <p class="excert">
                           MCSE boot camps have its supporters and its detractors. Some people do not understand why you
                           should have to spend money on boot camp when you can get the MCSE study materials yourself at a
                           fraction of the camp price. However, who has the willpower
                        </p>
                        <p>
                           MCSE boot camps have its supporters and its detractors. Some people do not understand why you
                           should have to spend money on boot camp when you can get the MCSE study materials yourself at a
                           fraction of the camp price. However, who has the willpower to actually sit through a
                           self-imposed MCSE training. who has the willpower to actually
                        </p>
                        <div class="quote-wrapper">
                           <div class="quotes">
                              MCSE boot camps have its supporters and its detractors. Some people do not understand why you
                              should have to spend money on boot camp when you can get the MCSE study materials yourself at
                              a fraction of the camp price. However, who has the willpower to actually sit through a
                              self-imposed MCSE training.
                           </div>
                        </div>
                        <p>
                           MCSE boot camps have its supporters and its detractors. Some people do not understand why you
                           should have to spend money on boot camp when you can get the MCSE study materials yourself at a
                           fraction of the camp price. However, who has the willpower
                        </p>
                        <p>
                           MCSE boot camps have its supporters and its detractors. Some people do not understand why you
                           should have to spend money on boot camp when you can get the MCSE study materials yourself at a
                           fraction of the camp price. However, who has the willpower to actually sit through a
                           self-imposed MCSE training. who has the willpower to actually
                        </p>
                     </div>
                  </div>
                  <div class="navigation-top">
                     <div class="d-sm-flex justify-content-between text-center">
                        <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
                           people like this</p>
                        <div class="col-sm-4 text-center my-2 my-sm-0">
                           <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                        </div>
                        <ul class="social-icons">
                           <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                           <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                           <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                           <li><a href="#"><i class="fab fa-behance"></i></a></li>
                        </ul>
                     </div>
                     <div class="navigation-area">
                        <div class="row">
                           <div
                              class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                              <div class="thumb">
                                 <a href="#">
                                    <img class="img-fluid" src="assets/img/post/preview.png" alt="">
                                 </a>
                              </div>
                              <div class="arrow">
                                 <a href="#">
                                    <span class="lnr text-white ti-arrow-left"></span>
                                 </a>
                              </div>
                              <div class="detials">
                                 <p>Prev Post</p>
                                 <a href="#">
                                    <h4>Space The Final Frontier</h4>
                                 </a>
                              </div>
                           </div>
                           <div
                              class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                              <div class="detials">
                                 <p>Next Post</p>
                                 <a href="#">
                                    <h4>Telescopes 101</h4>
                                 </a>
                              </div>
                              <div class="arrow">
                                 <a href="#">
                                    <span class="lnr text-white ti-arrow-right"></span>
                                 </a>
                              </div>
                              <div class="thumb">
                                 <a href="#">
                                    <img class="img-fluid" src="assets/img/post/next.png" alt="">
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="blog-author">
                     <div class="media align-items-center">
                        <img src="assets/img/blog/author.png" alt="">
                        <div class="media-body">
                           <a href="#">
                              <h4>Harvard milan</h4>
                           </a>
                           <p>Second divided from form fish beast made. Every of seas all gathered use saying you're, he
                              our dominion twon Second divided from</p>
                        </div>
                     </div>
                  </div>
                  <div class="comments-area">
                     <h4>05 Comments</h4>
                     <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                           <div class="user justify-content-between d-flex">
                              <div class="thumb">
                                 <img src="assets/img/comment/comment_1.png" alt="">
                              </div>
                              <div class="desc">
                                 <p class="comment">
                                    Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                    Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                                 </p>
                                 <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                       <h5>
                                          <a href="#">Emilly Blunt</a>
                                       </h5>
                                       <p class="date">December 4, 2017 at 3:12 pm </p>
                                    </div>
                                    <div class="reply-btn">
                                       <a href="#" class="btn-reply text-uppercase">reply</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                           <div class="user justify-content-between d-flex">
                              <div class="thumb">
                                 <img src="assets/img/comment/comment_2.png" alt="">
                              </div>
                              <div class="desc">
                                 <p class="comment">
                                    Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                    Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                                 </p>
                                 <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                       <h5>
                                          <a href="#">Emilly Blunt</a>
                                       </h5>
                                       <p class="date">December 4, 2017 at 3:12 pm </p>
                                    </div>
                                    <div class="reply-btn">
                                       <a href="#" class="btn-reply text-uppercase">reply</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                           <div class="user justify-content-between d-flex">
                              <div class="thumb">
                                 <img src="assets/img/comment/comment_3.png" alt="">
                              </div>
                              <div class="desc">
                                 <p class="comment">
                                    Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                    Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                                 </p>
                                 <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                       <h5>
                                          <a href="#">Emilly Blunt</a>
                                       </h5>
                                       <p class="date">December 4, 2017 at 3:12 pm </p>
                                    </div>
                                    <div class="reply-btn">
                                       <a href="#" class="btn-reply text-uppercase">reply</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="comment-form">
                     <h4>Leave a Reply</h4>
                     <form class="form-contact comment_form" action="#" id="commentForm">
                        <div class="row">
                           <div class="col-12">
                              <div class="form-group">
                                 <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                    placeholder="Write Comment"></textarea>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                              </div>
                           </div>
                           <div class="col-12">
                              <div class="form-group">
                                 <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="blog_right_sidebar">
                     <aside class="single_sidebar_widget search_widget">
                        <form action="#">
                           <div class="form-group">
                              <div class="input-group mb-3">
                                 <input type="text" class="form-control" placeholder='Search Keyword'
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                 <div class="input-group-append">
                                    <button class="btns" type="button"><i class="ti-search"></i></button>
                                 </div>
                              </div>
                           </div>
                           <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                              type="submit">Search</button>
                        </form>
                     </aside>
                     <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Category</h4>
                        <ul class="list cat-list">
                           <li>
                              <a href="#" class="d-flex">
                                 <p>Resaurant food</p>
                                 <p>(37)</p>
                              </a>
                           </li>
                           <li>
                              <a href="#" class="d-flex">
                                 <p>Travel news</p>
                                 <p>(10)</p>
                              </a>
                           </li>
                           <li>
                              <a href="#" class="d-flex">
                                 <p>Modern technology</p>
                                 <p>(03)</p>
                              </a>
                           </li>
                           <li>
                              <a href="#" class="d-flex">
                                 <p>Product</p>
                                 <p>(11)</p>
                              </a>
                           </li>
                           <li>
                              <a href="#" class="d-flex">
                                 <p>Inspiration</p>
                                 <p>(21)</p>
                              </a>
                           </li>
                           <li>
                              <a href="#" class="d-flex">
                                 <p>Health Care</p>
                                 <p>(21)</p>
                              </a>
                           </li>
                        </ul>
                     </aside>
                     <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Recent Post</h3>
                        <div class="media post_item">
                           <img src="assets/img/post/post_1.png" alt="post">
                           <div class="media-body">
                              <a href="blog_details.html">
                                 <h3>From life was you fish...</h3>
                              </a>
                              <p>January 12, 2019</p>
                           </div>
                        </div>
                        <div class="media post_item">
                           <img src="assets/img/post/post_2.png" alt="post">
                           <div class="media-body">
                              <a href="blog_details.html">
                                 <h3>The Amazing Hubble</h3>
                              </a>
                              <p>02 Hours ago</p>
                           </div>
                        </div>
                        <div class="media post_item">
                           <img src="assets/img/post/post_3.png" alt="post">
                           <div class="media-body">
                              <a href="blog_details.html">
                                 <h3>Astronomy Or Astrology</h3>
                              </a>
                              <p>03 Hours ago</p>
                           </div>
                        </div>
                        <div class="media post_item">
                           <img src="assets/img/post/post_4.png" alt="post">
                           <div class="media-body">
                              <a href="blog_details.html">
                                 <h3>Asteroids telescope</h3>
                              </a>
                              <p>01 Hours ago</p>
                           </div>
                        </div>
                     </aside>
                     <aside class="single_sidebar_widget tag_cloud_widget">
                        <h4 class="widget_title">Tag Clouds</h4>
                        <ul class="list">
                           <li>
                              <a href="#">project</a>
                           </li>
                           <li>
                              <a href="#">love</a>
                           </li>
                           <li>
                              <a href="#">technology</a>
                           </li>
                           <li>
                              <a href="#">travel</a>
                           </li>
                           <li>
                              <a href="#">restaurant</a>
                           </li>
                           <li>
                              <a href="#">life style</a>
                           </li>
                           <li>
                              <a href="#">design</a>
                           </li>
                           <li>
                              <a href="#">illustration</a>
                           </li>
                        </ul>
                     </aside>
                     <aside class="single_sidebar_widget instagram_feeds">
                        <h4 class="widget_title">Instagram Feeds</h4>
                        <ul class="instagram_row flex-wrap">
                           <li>
                              <a href="#">
                                 <img class="img-fluid" src="assets/img/post/post_5.png" alt="">
                              </a>
                           </li>
                           <li>
                              <a href="#">
                                 <img class="img-fluid" src="assets/img/post/post_6.png" alt="">
                              </a>
                           </li>
                           <li>
                              <a href="#">
                                 <img class="img-fluid" src="assets/img/post/post_7.png" alt="">
                              </a>
                           </li>
                           <li>
                              <a href="#">
                                 <img class="img-fluid" src="assets/img/post/post_8.png" alt="">
                              </a>
                           </li>
                           <li>
                              <a href="#">
                                 <img class="img-fluid" src="assets/img/post/post_9.png" alt="">
                              </a>
                           </li>
                           <li>
                              <a href="#">
                                 <img class="img-fluid" src="assets/img/post/post_10.png" alt="">
                              </a>
                           </li>
                        </ul>
                     </aside>
                     <aside class="single_sidebar_widget newsletter_widget">
                        <h4 class="widget_title">Newsletter</h4>
                        <form action="#">
                           <div class="form-group">
                              <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                 onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                           </div>
                           <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                              type="submit">Subscribe</button>
                        </form>
                     </aside>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--================ Blog Area end =================-->

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
              <!-- Footer Bottom -->
              <div class="footer-bottom">
                  <div class="row d-flex align-items-center">
                      <div class="col-lg-12">
                          <div class="footer-copy-right text-center">
                              <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                          </div>
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