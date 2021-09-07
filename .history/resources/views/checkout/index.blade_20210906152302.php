<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>test</title>
</head>
<body>
<form action="{{ route('devis.index') }}" id="form" method="post" class="my-4">
                @csrf

                <x-input type="hidden" name="payment_method" id="payment_method" />
                <!-- Stripe Elements Placeholder -->
                <div id="card-element"></div>

                <button class="mt-3" id="submit-button">payer</button>
            </form>
        </div>
    </section>

</body>
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
            const cardButton = document.getElementById('submit-button');
            cardButton.addEventListener('click', async(e) => {
                e.preventDefault();
                const { paymentMethod, error } = await stripe.createPaymentMethod(
                    'card', cardElement
                );
                if (error) {
                    alert(error)
                } else {
                    document.getElementById('payment_method').value = paymentMethod.id;
                }
                document.getElementById('form').submit();
            });
        </script>

</html>


       