<!DOCTYPE html>
<html lang="en">

<head>
  <title>Stripe Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->
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
                                        <li>Phone: +99 (0) 101 0000 888</li>

                                        <li>Email: noreply@yourdomain.com</li>
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
                                                        <li><a href="elements.html">Element</a></li>
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

                                <!-- d??but du Modal -->

                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                <script defer src="https://maps.googleapis.com/maps/api/js?libraries=places&language=en&key=AIzaSyCAb1UA5bvaHAPMhM-B1jAGeh0z5AiD27g" type="text/javascript"></script>

                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Faites votre devis rapidement en 2 click !</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="getMiles">
                                                @csrf
                                                    <div class="form-group">
                                                        <label>Adresse de d??part:</label>
                                                        <input class="form-control" id="from_places" style="z-index:-1">
                                                        <input id="origin" name="origin" required="" type="hidden" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Adresse d'arriv??e:</label>
                                                        <input class="form-control" id="to_places" style="z-index:-1" />
                                                        <input id="destination" name="destination" required="" type="hidden" />
                                                    </div>
                                                    <div class="form-group">
                                                        <h5 for="packs_id">Selectionn??e votre packs de prix</h5>
                                                        <select class="form-control" name="packs_id" id="packs_id">
                                                            <option value="1">Economique</option>
                                                            <option value="2">Standard</option>
                                                            <option value="3">V.I.P</option>
                                                        </select>
                                                    </div>
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
  <div class="container">
    <div class='row'>
      <div class='col-md-4'></div>
      <div class='col-md-4'>

        @php
        $stripe_key = 'pk_test_51JVKzoItbSqJZhHFXRRSMg1EpUQjwsRYx0tfNUgBa9JYv1PAJqWFC1ciN3Kk7apQH8aeu1Iy2KAeFLztkp7WCdwu00Y58HbEOq';
        @endphp
        <form action="{{route('checkout.succes')}}" method="post" id="payment-form">
          @csrf
          <div class='form-row'>
            <div class='col-xs-12 form-group required'>

            </div>
            <div class='form-row'>
              <div class='col-xs-12 form-group card required'>

              </div>
              <div class="limiter">
                <div class="container-login100">
                  <div class="wrap-login100">
                    <div class="card">
                      <div class="card__front card__part">
                        <img class="card__front-square card__square" src="/img/camion.jpg">
                        <img class="card__front-logo card__logo" src="/img/visa.png">
                        <p class="card_numer">**** **** **** 6258</p>
                        <div class="card__space-75">
                          <span class="card__label">Card holder</span>
                          <p class="card__info">Carl Tfe</p>
                        </div>
                        <div class="card__space-25">
                          <span class="card__label">Expires</span>
                          <p class="card__info">10/25</p>
                        </div>
                      </div>

                      <div class="card__back card__part">
                        <div class="card__black-line"></div>
                        <div class="card__back-content">
                          <div class="card__secret">
                            <p class="card__secret--last">420</p>
                          </div>
                          <img class="card__back-square card__square" src="/img/camion.jpg">
                          <!--<img class="card__back-logo card__logo" src="camion.jpg">-->

                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
              </div>
              <!-- Used to display form errors. -->
              <div id="card-errors" role="alert"></div>
              <input type="hidden" name="plan" value="" />
            </div>
          </div>
          <div class='form-row'>
            <div class='col-md-12'>
              <div class='form-control total btn btn-info' id='btotal'>


                Total:
                <span class='amount'> </span>

              </div>
            </div>
          </div>
          <div class='form-row'>
            <div class='col-md-12 form-group'>
              <button class='form-control btn btn-primary submit-button' id="card-button" type='submit' data-secret="{{ $intent }}">Pay ??</button>
            </div>

          </div>
        </form>
        <!-- SCRIPT -->
        <script src="https://js.stripe.com/v3/"></script>
        <script>
          // Custom styling can be passed to options when creating an Element.
          // (Note that this demo uses a wider set of styles than the guide below.)

          var style = {
            base: {
              color: '#32325d',
              lineHeight: '18px',
              fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
              fontSmoothing: 'antialiased',
              fontSize: '16px',
              '::placeholder': {
                color: '#aab7c4'
              }
            },
            invalid: {
              color: '#fa755a',
              iconColor: '#fa755a'
            }
          };

          const stripe = Stripe('{{ $stripe_key }}', {
            locale: 'en'
          }); // Create a Stripe client.
          const elements = stripe.elements(); // Create an instance of Elements.
          const cardElement = elements.create('card', {
            style: style
          }); // Create an instance of the card Element.
          const cardButton = document.getElementById('card-button');
          const clientSecret = cardButton.dataset.secret;

          cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

          // Handle real-time validation errors from the card Element.
          cardElement.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
              displayError.textContent = event.error.message;
            } else {
              displayError.textContent = '';
            }
          });

          // Handle form submission.
          var form = document.getElementById('payment-form');

          form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.handleCardPayment(clientSecret, cardElement, {
                payment_method_data: {
                  //billing_details: { name: cardHolderName.value }
                }
              })
              .then(function(result) {
                console.log(result);
                if (result.error) {
                  // Inform the user if there was an error.
                  var errorElement = document.getElementById('card-errors');
                  errorElement.textContent = result.error.message;
                } else {
                  console.log(result);
                  form.submit();
                }
              });
          });
        </script>
        <style>
          #btotal {
            background-color: #FE8638;
          }

          .submit-button {
            margin-top: 10px;
            background-color: #FE8638;
          }

          .container {
            box-shadow: 0px 0px 2px #FE8638;
            width: 1050px;

            height: 400px;
          }

          @import url('https://fonts.googleapis.com/css?family=Space+Mono:400,400i,700,700i');

          * {
            box-sizing: border-box;
            font-family: 'Space Mono', monospace;
          }

          body,
          html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
          }

          body {
            display: flex;
            justify-content: center;
            align-items: center;
            display: -webkit-flex;
            -webkit-align-items: center;
            -webkit-justify-content: center;

            flex-direction: column;
            -webkit-flex-direction: column;
          }

          .title {
            margin-bottom: 30px;
            color: #162969;
          }


          .card {
            width: 320px;
            height: 190px;
            -webkit-perspective: 600px;
            -moz-perspective: 600px;
            perspective: 600px;

          }

          .card__part {
            box-shadow: 1px 1px #aaa3a3;
            top: 0;
            position: absolute;
            z-index: 1000;
            left: 0;
            display: inline-block;
            width: 320px;
            height: 190px;
            background-image: url('https://image.ibb.co/bVnMrc/g3095.png'), linear-gradient(to right bottom, #FE7438, #FE7438, #FE7438, #FE8638, #FE8638);
            /*linear-gradient(to right bottom, #fd8369, #fc7870, #f96e78, #f56581, #ee5d8a)*/
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border-radius: 8px;

            -webkit-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            -moz-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            -ms-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            -o-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transform-style:hidden ;
            -webkit-transform-style: preserve-3d;
            -moz-transform-style: preserve-3d;
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
            -moz-backface-visibility: hidden;
          }

          .card__front {
            padding: 18px;
            transform: hidden;
            -webkit-transform: rotateY(0);
            -moz-transform: rotateY(0);
          }

          .card__back {
            padding: 18px 0;
            transform: hidden;
            -webkit-transform: rotateY(-180deg);
            -moz-transform: rotateY(-180deg);
          }

          .card__black-line {
            margin-top: 5px;
            height: 38px;
            background-color: #303030;
          }

          .card__logo {
            height: 16px;
          }

          .card__front-logo {
            position: absolute;
            top: 18px;
            right: 18px;
          }

          .card__square {
            border-radius: 5px;
            height: 30px;
          }

          .card_numer {
            display: block;
            width: 100%;
            word-spacing: 4px;
            font-size: 20px;
            letter-spacing: 2px;
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
            margin-top: 20px;
          }

          .card__space-75 {
            width: 75%;
            float: left;
          }

          .card__space-25 {
            width: 25%;
            float: left;
          }

          .card__label {
            font-size: 10px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.8);
            letter-spacing: 1px;
          }

          .card__info {
            margin-bottom: 0;
            margin-top: 5px;
            font-size: 16px;
            line-height: 18px;
            color: #fff;
            letter-spacing: 1px;
            text-transform: uppercase;
          }

          .card__back-content {
            padding: 15px 15px 0;
          }

          .card__secret--last {
            color: #303030;
            text-align: right;
            margin: 0;
            font-size: 14px;
          }

          .card__secret {
            padding: 5px 12px;
            background-color: #fff;
            position: relative;
          }

          .card__secret:before {
            content: '';
            position: absolute;
            top: -3px;
            left: -3px;
            height: calc(100% + 6px);
            width: calc(100% - 42px);
            border-radius: 4px;
            background: repeating-linear-gradient(45deg, #ededed, #ededed 5px, #f9f9f9 5px, #f9f9f9 10px);
          }

          .card__back-logo {
            position: absolute;
            bottom: 15px;
            right: 15px;
          }

          .card__back-square {
            position: absolute;
            bottom: 15px;
            left: 15px;
          }

          .card:hover .card__front {
            transform: hidden;
            -webkit-transform: rotateY(180deg);
            -moz-transform: rotateY(180deg);

          }

          .card:hover .card__back {
            transform: hidden;
            -webkit-transform: rotateY(0deg);
            -moz-transform: rotateY(0deg);
          }
        </style>

</body>

</html>