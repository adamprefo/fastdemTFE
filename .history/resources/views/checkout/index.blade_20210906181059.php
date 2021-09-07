<!DOCTYPE html>
<html lang="en">
<head>
  <title>Stripe Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <style> *,
*::before,
*::after {
  box-sizing: border-box;
}
html,
body {
  min-height: 100%;
  font-family: 'Open Sans', sans-serif;
}
body {
  background: linear-gradient(50deg, #f3c680, hsla(179,54%,76%,1));
}


/*--------------------
Buttons
--------------------*/
.btn {
  display: block;
  background: hsl(86, 76%, 71%);
  color: hsl(0, 0, 100);
  text-decoration: none;
  margin: 20px 0;
  padding: 15px 15px;
  border-radius: 5px;
  position: relative;

  &::after {
    content: '';
    position: absolute;
    z-index: 1;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    transition: all .2s ease-in-out;
    box-shadow: inset 0 3px 0 hsla(0, 0, 0, 0), 0 3px 3px hsla(0, 0, 0, .2);
    border-radius: 5px;
  }

  &:hover::after {
    background: hsla(0, 0, 0, 0.1);
    box-shadow: inset 0 3px 0 hsla(0, 0, 0, 0.2);
  }

}

/*--------------------
Form
--------------------*/
.form {

  fieldset {
    border: none;
    padding: 0;
    padding: 10px 0;
    position: relative;
    clear: both;

    &.fieldset-expiration {
      float: left;
      width: 60%;

      & .select {
        width: 84px;
        margin-right: 12px;
        float: left;
      }
    }

    &.fieldset-ccv {
      clear: none;
      float: right;
      width: 86px;
    }

    label {
      display: block;
      text-transform: uppercase;
      font-size: 11px;
      color: hsla(0, 0, 0, .6);
      margin-bottom: 5px;
      font-weight: bold;
      font-family: Inconsolata;
    }

    input,
    .select {
      width: 100%;
      height: 38px;
      color: hsl(0, 0, 20);
      padding: 10px;
      border-radius: 5px;
      font-size: 15px;
      outline: none!important;
      border: 1px solid hsla(0, 0, 0, 0.3);
      box-shadow: inset 0 1px 4px hsla(0, 0, 0, 0.2);

      &.input-cart-number {
        width: 82px;
        display: inline-block;
        margin-right: 8px;

        &:last-child {
          margin-right: 0;
        }
      }
    }

    .select {
      position: relative;

      &::after {
        content: '';
        border-top: 8px solid #222;
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        position: absolute;
        z-index: 2;
        top: 14px;
        right: 10px;
        pointer-events: none;
      }

      select {
        appearance: none;
        position: absolute;
        padding: 0;
        border: none;
        width: 100%;
        outline: none!important;
        top: 6px;
        left: 6px;
        background: none;

        :-moz-focusring {
          color: transparent;
          text-shadow: 0 0 0 #000;
        }

      }
    }


  }

  button {
    width: 100%;
    outline: none!important;
    background: linear-gradient(180deg, #49a09b, #3d8291);
    text-transform: uppercase;
    font-weight: bold;
    border: none;
    box-shadow: none;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    margin-top: 90px;

    & .fa {
      margin-right: 6px;
    }
  }

}

/*--------------------
Checkout
--------------------*/
.checkout {
  margin: 150px auto 30px;
  position: relative;
  width: 460px;
  background: white;
  border-radius: 15px;
  padding: 160px 45px 30px;
  box-shadow: 0 10px 40px hsla(0, 0, 0, .1);
}

/*--------------------
Credit Card
--------------------*/
.credit-card-box {
  perspective: 1000;
  width: 400px;
  height: 280px;
  position: absolute;
  top: -112px;
  left: 50%;
  transform: translateX(-50%);

  &:hover .flip,
  &.hover .flip {
    transform: rotateY(180deg);
  }

  .front,
  .back {
    width: 400px;
    height: 250px;
    border-radius: 15px;
    backface-visibility: hidden;
    background: linear-gradient(135deg, #bd6772, #53223f);
    position: absolute;
    color: #fff;
    font-family: Inconsolata;
    top: 0;
    left: 0;
    text-shadow: 0 1px 1px hsla(0, 0, 0, 0.3);
    box-shadow: 0 1px 6px hsla(0, 0, 0, 0.3);

    &::before {
      content: '';
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      background: url('http://cdn.flaticon.com/svg/44/44386.svg') no-repeat center;
      background-size: cover;
      opacity: .05;
    }
  }

  .flip {
    transition: 0.6s;
    transform-style: preserve-3d;
    position: relative;
  }

  .logo {
    position: absolute;
    top: 9px;
    right: 20px;
    width: 60px;

    svg {
      width: 100%;
      height: auto;
      fill: #fff;
    }
  }

  .front {
    z-index: 2;
    transform: rotateY(0deg);
  }

  .back {
    transform: rotateY(180deg);

    .logo {
      top: 185px;
    }

  }

  .chip {
    position: absolute;
    width: 60px;
    height: 45px;
    top: 20px;
    left: 20px;
    background: linear-gradient(135deg, hsl(269,54%,87%) 0%,hsl(200,64%,89%) 44%,hsl(18,55%,94%) 100%);;
    border-radius: 8px;

    &::before {
      content: '';
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      margin: auto;
      border: 4px solid hsla(0, 0, 50, .1);
      width: 80%;
      height: 70%;
      border-radius: 5px;
    }
  }

  .strip {
    background: linear-gradient(135deg, hsl(0, 0, 25%), hsl(0, 0, 10%));
    position: absolute;
    width: 100%;
    height: 50px;
    top: 30px;
    left: 0;
  }

  .number {
    position: absolute;
    margin: 0 auto;
    top: 103px;
    left: 19px;
    font-size: 38px;
  }

  label {
    font-size: 10px;
    letter-spacing: 1px;
    text-shadow: none;
    text-transform: uppercase;
    font-weight: normal;
    opacity: 0.5;
    display: block;
    margin-bottom: 3px;
  }

  .card-holder,
  .card-expiration-date {
    position: absolute;
    margin: 0 auto;
    top: 180px;
    left: 19px;
    font-size: 22px;
    text-transform: capitalize;
  }

  .card-expiration-date {
    text-align: right;
    left: auto;
    right: 20px;
  }

  .ccv {
    height: 36px;
    background: #fff;
    width: 91%;
    border-radius: 5px;
    top: 110px;
    left: 0;
    right: 0;
    position: absolute;
    margin: 0 auto;
    color: #000;
    text-align: right;
    padding: 10px;

    label {
      margin: -25px 0 14px;
      color: #fff;
    }
  }


}


.the-most {
  position: fixed;
  z-index: 1;
  bottom: 0;
  left: 0;
  width: 50vw;
  max-width: 200px;
  padding: 10px;
  
  img {
    max-width: 100%;
  }
}</style>

<div class="checkout">
  <div class="credit-card-box">
    <div class="flip">
      <div class="front">
        <div class="chip"></div>
        <div class="logo">
          <svg version="1.1" id="visa" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
               width="47.834px" height="47.834px" viewBox="0 0 47.834 47.834" style="enable-background:new 0 0 47.834 47.834;">
            <g>
              <g>
                <path d="M44.688,16.814h-3.004c-0.933,0-1.627,0.254-2.037,1.184l-5.773,13.074h4.083c0,0,0.666-1.758,0.817-2.143
                         c0.447,0,4.414,0.006,4.979,0.006c0.116,0.498,0.474,2.137,0.474,2.137h3.607L44.688,16.814z M39.893,26.01
                         c0.32-0.819,1.549-3.987,1.549-3.987c-0.021,0.039,0.317-0.825,0.518-1.362l0.262,1.23c0,0,0.745,3.406,0.901,4.119H39.893z
                         M34.146,26.404c-0.028,2.963-2.684,4.875-6.771,4.875c-1.743-0.018-3.422-0.361-4.332-0.76l0.547-3.193l0.501,0.228
                         c1.277,0.532,2.104,0.747,3.661,0.747c1.117,0,2.313-0.438,2.325-1.393c0.007-0.625-0.501-1.07-2.016-1.77
                         c-1.476-0.683-3.43-1.827-3.405-3.876c0.021-2.773,2.729-4.708,6.571-4.708c1.506,0,2.713,0.31,3.483,0.599l-0.526,3.092
                         l-0.351-0.165c-0.716-0.288-1.638-0.566-2.91-0.546c-1.522,0-2.228,0.634-2.228,1.227c-0.008,0.668,0.824,1.108,2.184,1.77
                         C33.126,23.546,34.163,24.783,34.146,26.404z M0,16.962l0.05-0.286h6.028c0.813,0.031,1.468,0.29,1.694,1.159l1.311,6.304
                         C7.795,20.842,4.691,18.099,0,16.962z M17.581,16.812l-6.123,14.239l-4.114,0.007L3.862,19.161
                         c2.503,1.602,4.635,4.144,5.386,5.914l0.406,1.469l3.808-9.729L17.581,16.812L17.581,16.812z M19.153,16.8h3.89L20.61,31.066
                         h-3.888L19.153,16.8z"/>
              </g>
            </g>
          </svg>
        </div>
        <div class="number"></div>
        <div class="card-holder">
          <label>Card holder</label>
          <div></div>
        </div>
        <div class="card-expiration-date">
          <label>Expires</label>
          <div></div>
        </div>
      </div>
      <div class="back">
        <div class="strip"></div>
        <div class="logo">
          <svg version="1.1" id="visa" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
               width="47.834px" height="47.834px" viewBox="0 0 47.834 47.834" style="enable-background:new 0 0 47.834 47.834;">
            <g>
              <g>
                <path d="M44.688,16.814h-3.004c-0.933,0-1.627,0.254-2.037,1.184l-5.773,13.074h4.083c0,0,0.666-1.758,0.817-2.143
                         c0.447,0,4.414,0.006,4.979,0.006c0.116,0.498,0.474,2.137,0.474,2.137h3.607L44.688,16.814z M39.893,26.01
                         c0.32-0.819,1.549-3.987,1.549-3.987c-0.021,0.039,0.317-0.825,0.518-1.362l0.262,1.23c0,0,0.745,3.406,0.901,4.119H39.893z
                         M34.146,26.404c-0.028,2.963-2.684,4.875-6.771,4.875c-1.743-0.018-3.422-0.361-4.332-0.76l0.547-3.193l0.501,0.228
                         c1.277,0.532,2.104,0.747,3.661,0.747c1.117,0,2.313-0.438,2.325-1.393c0.007-0.625-0.501-1.07-2.016-1.77
                         c-1.476-0.683-3.43-1.827-3.405-3.876c0.021-2.773,2.729-4.708,6.571-4.708c1.506,0,2.713,0.31,3.483,0.599l-0.526,3.092
                         l-0.351-0.165c-0.716-0.288-1.638-0.566-2.91-0.546c-1.522,0-2.228,0.634-2.228,1.227c-0.008,0.668,0.824,1.108,2.184,1.77
                         C33.126,23.546,34.163,24.783,34.146,26.404z M0,16.962l0.05-0.286h6.028c0.813,0.031,1.468,0.29,1.694,1.159l1.311,6.304
                         C7.795,20.842,4.691,18.099,0,16.962z M17.581,16.812l-6.123,14.239l-4.114,0.007L3.862,19.161
                         c2.503,1.602,4.635,4.144,5.386,5.914l0.406,1.469l3.808-9.729L17.581,16.812L17.581,16.812z M19.153,16.8h3.89L20.61,31.066
                         h-3.888L19.153,16.8z"/>
              </g>
            </g>
          </svg>

        </div>







    @php
        $stripe_key = 'pk_test_51JVKzoItbSqJZhHFXRRSMg1EpUQjwsRYx0tfNUgBa9JYv1PAJqWFC1ciN3Kk7apQH8aeu1Iy2KAeFLztkp7WCdwu00Y58HbEOq';
    @endphp
    <div class="container" style="margin-top:10%;margin-bottom:10% ">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="">
                </div>
                <div class="card">
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
                </div>
            </div>
        </div>
    </div>
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
</body>
</html>