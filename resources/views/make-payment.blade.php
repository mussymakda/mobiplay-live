<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>Mobiplay</title>
  <link href="https://api.fontshare.com/v2/css?f[]=satoshi@300,301,400,401,500,501,700,701,900,901,1,2&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/ion.rangeSlider.css">
  <link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css">
  <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

  <!-- PayPal SDK -->
  <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}"></script>
</head>

<body>
  <div id="navbar-wrapper" class="campaginstep-header">
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a href="#" class="step-logo"><img src="assets/images/logo.svg" alt="Logo"></a>
          <div class="right-nav">
            <a href="#" class="notification-link"><img src="assets/images/darknotification.svg" alt="Notification"></a>
            <div class="lang-menu">
              <a href="#" class="active"><img src="assets/images/us.svg" alt="EN"> EN</a>
              <a href="#" class=""><img src="assets/images/spain.svg" alt="ES"> ES</a>
            </div>
            <a href="#" class="profile-name"><span>{{ Auth::user()->name }}</span><img src="assets/images/dark-dash-profile.png" alt="Profile"></a>
          </div>
        </div>
      </div>
    </nav>
  </div>
  <div class="step-line">
    <a href="goal.html" class="step-close">Close <img src="assets/images/close.svg" alt="Close"></a>
  </div>
  <section id="content-wrapper">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10 g-lg-0">
          <div class="choose-campgain">
            <h2 class="text-start">Review</h2>
            <p class="text-start">Review your campaign before publishing.</p>
          </div>
          <div class="row justify-content-between">
            <div class="col-lg-7">
              <div class="summary-box">
                <h3>Summary</h3>
                <div class="summary-details">
                  <div class="summary-d">
                    <div class="summary-inside">
                      <label>Amount</label>
                      <span id="summary-amount">$0.00</span>
                    </div>
                  </div>
                  <div class="summary-d">
                    <div class="summary-inside">
                      <label>Tax (16%)</label>
                      <span id="summary-tax">$0.00</span>
                    </div>
                  </div>
                  <div class="summary-d">
                    <div class="summary-inside">
                      <label>Bonus</label>
                      <span id="summary-bonus">$0.00</span>
                    </div>
                  </div>
                  <div class="summary-d">
                    <div class="summary-inside">
                      <label>Total Credits</label>
                      <span id="summary-total">$0.00</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="payment-form">
                <div class="payment-details">
                  <div class="row gx-3">
                    <div class="col-lg-12">
                      <div class="form-group mb-3">
                        <label>Enter Amount<sup>*</sup></label>
                        <input type="number" id="amount" name="amount" class="form-control" oninput="updateSummary()">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div id="paypal-button-container"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-7"></div>
            <div class="col-lg-5">
              <div class="camp-grp-btn pb-0">
                <a href="ad-spend.html" class="btn btn-secondary">Back</a>
                <!-- <a href="{{ route('paypal') }}" class="btn btn-primary">Pay with PayPal</a> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- JavaScript dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script src="assets/js/ion.rangeSlider.js"></script>
  <script src="assets/js/script.js"></script>
  <script>
    function updateSummary() {
      const amount = parseFloat(document.getElementById('amount').value) || 0;
      const taxRate = 0.16;
      const bonusThreshold = 3000;
      const bonusAmount = 3000;

      const tax = amount * taxRate;
      const bonus = amount >= bonusThreshold ? bonusAmount : 0;
      const total = amount + tax + bonus;

      document.getElementById('summary-amount').textContent = `$${amount.toFixed(2)}`;
      document.getElementById('summary-tax').textContent = `$${tax.toFixed(2)}`;
      document.getElementById('summary-bonus').textContent = `$${bonus.toFixed(2)}`;
      document.getElementById('summary-total').textContent = `$${total.toFixed(2)}`;
    }

    $(document).ready(function() {
      paypal.Buttons({
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: document.getElementById('amount').value || '0'
              }
            }]
          });
        },
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            window.location.href = '{{ route("payment.success") }}'; // Redirect to success page
          });
        },
        onError: function(err) {
          console.error('Error: ', err);
          alert('An error occurred during payment. Please try again.');
        }
      }).render('#paypal-button-container');
    });
  </script>
</body>

</html>