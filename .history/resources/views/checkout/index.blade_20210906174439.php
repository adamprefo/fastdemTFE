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
  <style>body {
    background: #ddd;
    min-height: 100vh;
    vertical-align: middle;
    display: flex
}

.card {
    margin: auto;
    width: 600px;
    padding: 3rem 3.5rem;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19)
}

.mt-50 {
    margin-top: 50px
}

.mb-50 {
    margin-bottom: 50px
}

@media(max-width:767px) {
    .card {
        width: 90%;
        padding: 1.5rem
    }
}

@media(height:1366px) {
    .card {
        width: 90%;
        padding: 8vh
    }
}

.card-title {
    font-weight: 700;
    font-size: 2.5em
}

.nav {
    display: flex
}

.nav ul {
    list-style-type: none;
    display: flex;
    padding-inline-start: unset;
    margin-bottom: 6vh
}

.nav li {
    padding: 1rem
}

.nav li a {
    color: black;
    text-decoration: none
}

.active {
    border-bottom: 2px solid black;
    font-weight: bold
}

input {
    border: none;
    outline: none;
    font-size: 1rem;
    font-weight: 600;
    color: #000;
    width: 100%;
    min-width: unset;
    background-color: transparent;
    border-color: transparent;
    margin: 0
}

form a {
    color: grey;
    text-decoration: none;
    font-size: 0.87rem;
    font-weight: bold
}

form a:hover {
    color: grey;
    text-decoration: none
}

form .row {
    margin: 0;
    overflow: hidden
}

form .row-1 {
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 0.5rem;
    outline: none;
    width: 100%;
    min-width: unset;
    border-radius: 5px;
    background-color: rgba(221, 228, 236, 0.301);
    border-color: rgba(221, 228, 236, 0.459);
    margin: 2vh 0;
    overflow: hidden
}

form .row-2 {
    border: none;
    outline: none;
    background-color: transparent;
    margin: 0;
    padding: 0 0.8rem
}

form .row .row-2 {
    border: none;
    outline: none;
    background-color: transparent;
    margin: 0;
    padding: 0 0.8rem
}

form .row .col-2,
.col-7,
.col-3 {
    display: flex;
    align-items: center;
    text-align: center;
    padding: 0 1vh
}

form .row .col-2 {
    padding-right: 0
}

#card-header {
    font-weight: bold;
    font-size: 0.9rem
}

#card-inner {
    font-size: 0.7rem;
    color: gray
}

.three .col-7 {
    padding-left: 0
}

.three {
    overflow: hidden;
    justify-content: space-between
}

.three .col-2 {
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 0.5rem;
    outline: none;
    width: 100%;
    min-width: unset;
    border-radius: 5px;
    background-color: rgba(221, 228, 236, 0.301);
    border-color: rgba(221, 228, 236, 0.459);
    margin: 2vh 0;
    width: fit-content;
    overflow: hidden
}

.three .col-2 input {
    font-size: 0.7rem;
    margin-left: 1vh
}

.btn {
    width: 100%;
    background-color: rgb(65, 202, 127);
    border-color: rgb(65, 202, 127);
    color: white;
    justify-content: center;
    padding: 2vh 0;
    margin-top: 3vh
}

.btn:focus {
    box-shadow: none;
    outline: none;
    box-shadow: none;
    color: white;
    -webkit-box-shadow: none;
    -webkit-user-select: none;
    transition: none
}

.btn:hover {
    color: white
}

input:focus::-webkit-input-placeholder {
    color: transparent
}

input:focus:-moz-placeholder {
    color: transparent
}

input:focus::-moz-placeholder {
    color: transparent
}

input:focus:-ms-input-placeholder {
    color: transparent
}</style>



<div class="card mt-50 mb-50">
    <div class="card-title mx-auto"> Settings </div>
    <div class="nav">
        <ul class="mx-auto">
            <li><a href="#">Account</a></li>
            <li class="active"><a href="#">Payment</a></li>
        </ul>
    </div>
    <form action="{{route('checkout.succes')}}"  method="post" id="payment-form"><span id="card-header">Saved cards:</span>
      @csrf  
        <div class="row row-1">
            <div class="col-2" id="card-element"><img class="img-fluid" src="https://img.icons8.com/color/48/000000/mastercard-logo.png" /></div>
            <div id="card-errors" role="alert"></div>
            <div class="col-7"> <input type="text" placeholder="**** **** **** 3193"> </div>
            <input type="hidden" name="plan" value="" />
        </div>
      
        </div> <button class="btn d-flex mx-auto" data-secret="{{ $intent }}"  type="submit" id="card-button"><b>Add card</b></button>
    </form>
</div>

    @php
        $stripe_key = 'pk_test_51JVKzoItbSqJZhHFXRRSMg1EpUQjwsRYx0tfNUgBa9JYv1PAJqWFC1ciN3Kk7apQH8aeu1Iy2KAeFLztkp7WCdwu00Y58HbEOq';
    @endphp

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