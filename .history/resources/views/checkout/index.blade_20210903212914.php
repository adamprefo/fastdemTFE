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

  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container wow fadeIn">

      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Checkout form</h2>

      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-md-8 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <form class="card-body" method="get" id="form">
                @csrf

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--firstName-->
                  <div class="md-form ">
                    <input type="text" id="firstName" class="form-control">
                    <label for="firstName" class="">First name</label>
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--lastName-->
                  <div class="md-form">
                    <input type="text" id="lastName" class="form-control">
                    <label for="lastName" class="">Last name</label>
                  </div>

                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->

              <!--Username-->
              <div class="md-form input-group pl-0 mb-5">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="text" class="form-control py-0" placeholder="Username" aria-describedby="basic-addon1">
              </div>

              <!--email-->
              <div class="md-form mb-5">
                <input type="text" id="email" class="form-control" placeholder="youremail@example.com">
                <label for="email" class="">Email (optional)</label>
              </div>

              <!--address-->
              <div class="md-form mb-5">
                <input type="text" id="address" class="form-control" placeholder="1234 Main St">
                <label for="address" class="">Address</label>
              </div>

              <!--address-2-->
              <div class="md-form mb-5">
                <input type="text" id="address-2" class="form-control" placeholder="Apartment or suite">
                <label for="address-2" class="">Address 2 (optional)</label>
              </div>

              <!--Grid row-->
              <div class="row">

               
                <!--Grid column-->

              </div>
              <!--Grid row-->
                <!-- carte -->
                <h6 class="my-0">Entrer votre carte de crédit</h6>
              <div id="card-element"></div>
              <input name="payment_method" type="hidden" id="payment_method" value="" />
              
              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit" id="card-button"> Process Payment</button>

            </form>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
     

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
                    <span>entrer une carte valide</span>
                } else {
                    document.getElementById('payment_method').value = paymentMethod.id;
                }
                document.getElementById('form').submit();
            });
</script>

  