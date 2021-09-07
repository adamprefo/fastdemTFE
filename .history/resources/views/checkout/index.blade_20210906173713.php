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

<div class="card mt-50 mb-50">
    <div class="card-title mx-auto"> Settings </div>
    <div class="nav">
        <ul class="mx-auto">
            <li><a href="#">Account</a></li>
            <li class="active"><a href="#">Payment</a></li>
        </ul>
    </div>
    <form> <span id="card-header">Saved cards:</span>
        <div class="row row-1">
            <div class="col-2"><img class="img-fluid" src="https://img.icons8.com/color/48/000000/mastercard-logo.png" /></div>
            <div class="col-7"> <input type="text" placeholder="**** **** **** 3193"> </div>
            <div class="col-3 d-flex justify-content-center"> <a href="#">Remove card</a> </div>
        </div>
        <div class="row row-1">
            <div class="col-2"><img class="img-fluid" src="https://img.icons8.com/color/48/000000/visa.png" /></div>
            <div class="col-7"> <input type="text" placeholder="**** **** **** 4296"> </div>
            <div class="col-3 d-flex justify-content-center"> <a href="#">Remove card</a> </div>
        </div> <span id="card-header">Add new card:</span>
        <div class="row-1">
            <div class="row row-2"> <span id="card-inner">Card holder name</span> </div>
            <div class="row row-2"> <input type="text" placeholder="Bojan Viner"> </div>
        </div>
        <div class="row three">
            <div class="col-7">
                <div class="row-1">
                    <div class="row row-2"> <span id="card-inner">Card number</span> </div>
                    <div class="row row-2"> <input type="text" placeholder="5134-5264-4"> </div>
                </div>
            </div>
            <div class="col-2"> <input type="text" placeholder="Exp. date"> </div>
            <div class="col-2"> <input type="text" placeholder="CVV"> </div>
        </div> <button class="btn d-flex mx-auto"><b>Add card</b></button>
    </form>
</div>
  
    @php
        $stripe_key = 'pk_test_51JVKzoItbSqJZhHFXRRSMg1EpUQjwsRYx0tfNUgBa9JYv1PAJqWFC1ciN3Kk7apQH8aeu1Iy2KAeFLztkp7WCdwu00Y58HbEOq';
    @endphp
    <div class="container" style="margin-top:10%;margin-bottom:10% ">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="">
                    <p>You will be charged rs 100</p>
                </div>
                <div class="card">
                    <form action="{{route('checkout.succes')}}"  method="post" id="payment-form">
                        @csrf                    
                        <div class="form-group">
                            <div class="card-header">
                                <label for="card-element">
                                    Enter your credit card information
                                </label>
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
                        <div class="card-footer">
                          <button
                          id="card-button"
                          class="btn btn-dark"
                          type="submit"
                          data-secret="{{ $intent }}"
                        > Pay </button>
                        </div>
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