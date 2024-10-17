<!doctype html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Mobiplay</title>
  <link href="https://api.fontshare.com/v2/css?f[]=satoshi@300,301,400,401,500,501,700,701,900,901,1,2&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/stylesheet.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
</head>

<body class="inner-page">
  <div id="wrapper">

    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}" class="desk-logo"><img src="{{ asset('assets/images/logo.svg') }}"></a>
        <a href="{{ route('dashboard') }}" class="mobile-logo"><img src="{{ asset('assets/images/logo.svg') }}"></a>
      </div>
      <ul class="sidebar-nav">
        <li class="active">
          <a href="{{ route('dashboard') }}"><img src="{{ asset('assets/images/dashboard-icon.svg') }}"> <span>Tablero</span></a>
        </li>
        <li>
          <a href="{{ route('analytics') }}"><img src="{{ asset('assets/images/analytics-icons.svg') }}"> <span>Analítica</span></a>
        </li>
        <li>
          <a href="campaign.html"><img src="{{ asset('assets/images/campaign-icon.svg') }}"> <span>Campañas</span></a>
        </li>
        <li>
          <a href="{{ route('profile') }}"><img src="{{ asset('assets/images/profile-icon.svg') }}"> <span>Perfil</span></a>
        </li>
      </ul>
      <a href="#" class="help-link"><img src="{{ asset('assets/images/help.svg') }}"> <span>Centro de Ayuda</span></a>
    </aside>

    <div id="navbar-wrapper">
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a href="#" class="navbar-brand nav-desk-brand" id="sidebar-toggle"><i class="fa fa-bars"></i></a>
            <div class="right-nav">
              <a href="#" class="notification-link"><img src="{{ asset('assets/images/notification.svg') }}"></a>
              <div class="lang-menu">
                <a href="#" class="active"><img src="{{ asset('assets/images/us.svg') }}"> EN</a>
                <a href="#" class=""><img src="{{ asset('assets/images/spain.svg') }}"> ES</a>
              </div>
              <a href="#" class="profile-name">
                <span>{{ Auth::user()->name }}</span>
                <img src="{{ asset('assets/images/dash-profile.png') }}">
              </a>
              <!-- Logout Button -->
              <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="margin-left: 10px; margin: right 10px;" class="btn btn-secondary">Logout</button>
              </form>
            </div>
          </div>
        </div>
      </nav>
    </div>

    <section id="content-wrapper" class="mt-3">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="row align-items-center mb-4">
            <div class="col-xl-4 col-lg-4">
              <div class="page-title">
                <h1 class="mb-lg-0">Panel de Control</h1>
              </div>
            </div>
            <div class="col-xl-8 col-lg-8">
              <div class="row justify-content-lg-end">
                <div class="col-lg-7">
                  <div class="form-group mb-3">
                    <select class="form-select campagin-select w-100">
                      <option>Seleccionar Campaña</option>
                    </select>
                    <span class="form-icon"><img src="assets/images/campaign.svg"></span>
                  </div>
                </div>
                <div class="col-lg-5">
                  <div class="form-group mb-3">
                    <div class="date-custom form-control" id="reportrange">
                      <i class="fa-solid fa-calendar-day"></i>&nbsp;
                      <span></span> <i class="fa-solid fa-chevron-down"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
              <div class="create-campaign-box">
                <div class="campaign-img">
                  <img class="img-fluid" src="assets/images/create-capaign.svg">
                </div>
                <div class="campaign-details">
                  <h2>Create your first campaign</h2>
                  <p>Launch your first campaign to begin reaching new audiences</p>
                  <a href="{{ route('campaign-wizard') }}" class="btn btn-primary" ><i class="fa-solid fa-plus"></i> Create</a>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="create-campaign-box offer-box">
                <div class="campaign-img">
                  <img class="img-fluid" src="assets/images/add_money.svg">
                </div>
                <div class="campaign-details">
                  <h2>Limited time Offer</h2>
                  <p>Limited Time Offer Current Offer: <span>Get $3,000</span> in bonus ad credits with your first <span>$3,000 deposit.</span></p>
                  <form action="{{ route('payment.make') }}" method="GET">
                    <button type="submit" class="btn btn-primary">Añadir Balance</button>
                  </form>
                </div>
              </div>
            </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="total-box">
                <div class="total-header">
                  <div class="total-left">
                    <h2>$0.00</h2>
                    <span>Saldo Total</span>
                  </div>
                  <div class="total-right">
                    <img src="assets/images/money-bag.png" style="height: 40px; width: 40px;" alt="Ícono de Saldo Total">
                  </div>
                </div>
                <div class="total-body">
                  <p>Gestiona tu saldo total y lleva un control de tus gastos.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="total-box" style="color: gray" >
                <div class="total-header">
                  <div class="total-left">
                    <h2>0</h2>
                    <span>Total de Impresiones</span>
                  </div>
                  <div class="total-right">
                    <img src="assets/images/imp.svg">
                  </div>
                </div>
                <div class="total-body">
                  <p>Explorar, incluso las impresiones más pequeñas cuentan.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="total-box"style="color: gray"  >
                <div class="total-header">
                  <div class="total-left">
                    <h2>$0.00</h2>
                    <span>Total Gastado</span>
                  </div>
                  <div class="total-right">
                    <img src="assets/images/imp1.svg">
                  </div>
                </div>
                <div class="total-body">
                  <p>¡Enhorabuena! ¡No has gastado nada este mes!</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="total-box"style="color: gray"  >
                <div class="total-header">
                  <div class="total-left">
                    <h2>0</h2>
                    <span>Campañas Activas</span>
                  </div>
                  <div class="total-right">
                    <img src="assets/images/imp2.svg">
                  </div>
                </div>
                <div class="total-body">
                  <p>Crea campañas ahora y compite con la competencia.</p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

  </div>

  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script type="text/javascript">
    $(function() {
      var start = moment().subtract(29, 'days');
      var end = moment();

      function cb(start, end) {
        $('#reportrange span').html(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
      }
      $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
          'Hoy': [moment(), moment()],
          'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Últimos 7 Días': [moment().subtract(6, 'days'), moment()],
          'Últimos 30 Días': [moment().subtract(29, 'days'), moment()],
          'Este Mes': [moment().startOf('month'), moment().endOf('month')],
          'Mes Pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, cb);
      cb(start, end);
    });
  </script>
  <script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>