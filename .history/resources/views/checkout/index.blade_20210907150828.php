<!DOCTYPE html>
<html lang="en">
<head>
  <title>Stripe Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1><a href="http://blog.stackfindover.com/" rel="dofollow">Stackfindover</a></h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">Sign in to your account</span>
              <form id="stripe-login">
                <div class="field padding-bottom--24">
                  <label for="email">Email</label>
                  <input type="email" name="email">
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="password">Password</label>
                    <div class="reset-pass">
                      <a href="#">Forgot your password?</a>
                    </div>
                  </div>
                  <input type="password" name="password">
                </div>
                <div class="field field-checkbox padding-bottom--24 flex-flex align-center">
                  <label for="checkbox">
                    <input type="checkbox" name="checkbox"> Stay signed in for a week
                  </label>
                </div>
                <div class="field padding-bottom--24">
                  <input type="submit" name="submit" value="Continue">
                </div>
                <div class="field">
                  <a class="ssolink" href="#">Use single sign-on (Google) instead</a>
                </div>
              </form>
            </div>
          </div>
    @php
        $stripe_key = 'pk_test_51JVKzoItbSqJZhHFXRRSMg1EpUQjwsRYx0tfNUgBa9JYv1PAJqWFC1ciN3Kk7apQH8aeu1Iy2KAeFLztkp7WCdwu00Y58HbEOq';
    @endphp
    
 
                    <form action="{{route('checkout.succes')}}"  method="post" id="payment-form">
                        @csrf                    
                  
                            <div class="card-body">
                                <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                                <input type="hidden" name="plan" value="" />
                            </div>
                        </div>
                       
                          <button
                          id="card-button"
                          class="btn btn-dark"
                          type="submit"
                          data-secret="{{ $intent }}"
                        > Pay </button>
                        
                    </form>

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
    
        const stripe = Stripe('{{ $stripe_key }}', { locale: 'en' }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', { style: style }); // Create an instance of the card Element.
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
	@import url('https://fonts.googleapis.com/css?family=Space+Mono:400,400i,700,700i');

*{
  box-sizing:border-box;
  font-family: 'Space Mono', monospace;
}

body, html{
  margin:0;
  padding:0;
  height: 100%;
  width: 100%;
}
body{
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


.card{
width: 320px;
height: 190px;
  -webkit-perspective: 600px;
  -moz-perspective: 600px;
  perspective:600px;
  
}

.card__part{
  box-shadow: 1px 1px #aaa3a3;
    top: 0;
  position: absolute;
z-index: 1000;
  left: 0;
  display: inline-block;
    width: 320px;
    height: 190px;
    background-image: url('https://image.ibb.co/bVnMrc/g3095.png'), linear-gradient(to right bottom, #c7e083, #fa616e, #f65871, #f15075, #ec4879); /*linear-gradient(to right bottom, #fd8369, #fc7870, #f96e78, #f56581, #ee5d8a)*/
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    border-radius: 8px;
   
    -webkit-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -moz-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -ms-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -o-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
}

.card__front{
  padding: 18px;
-webkit-transform: rotateY(0);
-moz-transform: rotateY(0);
}

.card__back {
  padding: 18px 0;
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

.card__front-logo{
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
    color: rgba(255,255,255,0.8);
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
    position:relative;
}

.card__secret:before{
  content:'';
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
    -webkit-transform: rotateY(180deg);
    -moz-transform: rotateY(180deg);

}

.card:hover .card__back {
    -webkit-transform: rotateY(0deg);
    -moz-transform: rotateY(0deg);
}


* {
  padding: 0;
  margin: 0;
  color: #1a1f36;
  box-sizing: border-box;
  word-wrap: break-word;
  font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif;
}
body {
    min-height: 100%;
    background-color: #ffffff;
}
h1 {
    letter-spacing: -1px;
}
a {
  color: #5469d4;
  text-decoration: unset;
}
.login-root {
    background: #fff;
    display: flex;
    width: 100%;
    min-height: 100vh;
    overflow: hidden;
}
.loginbackground {
    min-height: 692px;
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    top: 0;
    z-index: 0;
    overflow: hidden;
}
.flex-flex {
    display: flex;
}
.align-center {
  align-items: center; 
}
.center-center {
  align-items: center;
  justify-content: center;
}
.box-root {
    box-sizing: border-box;
}
.flex-direction--column {
    -ms-flex-direction: column;
    flex-direction: column;
}

.box-divider--light-all-2 {
    box-shadow: inset 0 0 0 2px #e3e8ee;
}
.box-background--blue {
    background-color: #5469d4;
}
.box-background--white {
  background-color: #ffffff; 
}
.box-background--blue800 {
    background-color: #212d63;
}
.box-background--gray100 {
    background-color: #e3e8ee;
}
.box-background--cyan200 {
    background-color: #7fd3ed;
}
.padding-top--64 {
  padding-top: 64px;
}
.padding-top--24 {
  padding-top: 24px;
}
.padding-top--48 {
  padding-top: 48px;
}
.padding-bottom--24 {
  padding-bottom: 24px;
}
.padding-horizontal--48 {
  padding: 48px;
}
.padding-bottom--15 {
  padding-bottom: 15px;
}


.flex-justifyContent--center {
  -ms-flex-pack: center;
  justify-content: center;
}

.formbg {
    margin: 0px auto;
    width: 100%;
    max-width: 448px;
    background: white;
    border-radius: 4px;
    box-shadow: rgba(60, 66, 87, 0.12) 0px 7px 14px 0px, rgba(0, 0, 0, 0.12) 0px 3px 6px 0px;
}
span {
    display: block;
    font-size: 20px;
    line-height: 28px;
    color: #1a1f36;
}
label {
    margin-bottom: 10px;
}
.reset-pass a,label {
    font-size: 14px;
    font-weight: 600;
    display: block;
}
.reset-pass > a {
    text-align: right;
    margin-bottom: 10px;
}
.grid--50-50 {
    display: grid;
    grid-template-columns: 50% 50%;
    align-items: center;
}

.field input {
    font-size: 16px;
    line-height: 28px;
    padding: 8px 16px;
    width: 100%;
    min-height: 44px;
    border: unset;
    border-radius: 4px;
    outline-color: rgb(84 105 212 / 0.5);
    background-color: rgb(255, 255, 255);
    box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(60, 66, 87, 0.16) 0px 0px 0px 1px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px;
}

input[type="submit"] {
    background-color: rgb(84, 105, 212);
    box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0.12) 0px 1px 1px 0px, 
                rgb(84, 105, 212) 0px 0px 0px 1px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                rgba(60, 66, 87, 0.08) 0px 2px 5px 0px;
    color: #fff;
    font-weight: 600;
    cursor: pointer;
}
.field-checkbox input {
    width: 20px;
    height: 15px;
    margin-right: 5px; 
    box-shadow: unset;
    min-height: unset;
}
.field-checkbox label {
    display: flex;
    align-items: center;
    margin: 0;
}
a.ssolink {
    display: block;
    text-align: center;
    font-weight: 600;
}
.footer-link span {
    font-size: 14px;
    text-align: center;
}
.listing a {
    color: #697386;
    font-weight: 600;
    margin: 0 10px;
}

.animationRightLeft {
  animation: animationRightLeft 2s ease-in-out infinite;
}
.animationLeftRight {
  animation: animationLeftRight 2s ease-in-out infinite;
}
.tans3s {
  animation: animationLeftRight 3s ease-in-out infinite;
}
.tans4s {
  animation: animationLeftRight 4s ease-in-out infinite;
}

@keyframes animationLeftRight {
  0% {
    transform: translateX(0px);
  }
  50% {
    transform: translateX(1000px);
  }
  100% {
    transform: translateX(0px);
  }
} 

@keyframes animationRightLeft {
  0% {
    transform: translateX(0px);
  }
  50% {
    transform: translateX(-1000px);
  }
  100% {
    transform: translateX(0px);
  }
} 
 </style>

</body>
</html>