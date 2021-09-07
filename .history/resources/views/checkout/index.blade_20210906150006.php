<form class="card-body" method="get" id="form">
                @csrf

           
                <!-- carte -->
                <h6 class="my-0">Entrer votre carte de crédit</h6>
              <div id="card-element"></div>
              <input name="payment_method" type="hidden" id="payment_method" value="" />
              
              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit" id="card-button"> Process Payment</button>

            </form>

    <!-- Script here-->
    <script src="https://js.stripe.com/v3/"></script>

    <script>
    const stripe = Stripe(" {{ env('STRIPE_KEY') }} ");
            const elements = stripe.elements();
            const cardElement = elements.create('card', {
                classes: {
                    base: 'StripeElement bg-white w-1/2 p-2 my-2 rounded-lg'
                }
            });


            cardElement.mount('#card-element');
            const cardButton = document.getElementById('card-button');

            cardButton.addEventListener('click', async(e) => {
                e.preventDefault();

                const { paymentMethod, error } = await stripe.createPaymentMethod(
                    'card', cardElement
                );

                if (error) {
                   
                } else {
                    document.getElementById('payment_method').value = paymentMethod.id;
                }
                document.getElementById('form').submit();
            });
</script>

  