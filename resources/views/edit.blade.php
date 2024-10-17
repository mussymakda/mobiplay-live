<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Mobiplay</title>
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@300,301,400,401,500,501,700,701,900,901,1,2&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
</head>

<body class="inner-page">
    <div id="wrapper">

        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="{{ route('dashboard') }}" class="desk-logo"><img
                        src="{{ asset('assets/images/logo.svg') }}"></a>
                <a href="{{ route('dashboard') }}" class="mobile-logo"><img
                        src="{{ asset('assets/images/logo.svg') }}"></a>
            </div>
            <ul class="sidebar-nav">
                <li class="active">
                    <a href="{{ route('dashboard') }}"><img src="{{ asset('assets/images/dashboard-icon.svg') }}">
                        <span>Tablero</span></a>
                </li>
                <li>
                    <a href="{{ route('analytics') }}"><img src="{{ asset('assets/images/analytics-icons.svg') }}">
                        <span>Analítica</span></a>
                </li>
                <li>
                    <a href="campaign.html"><img src="{{ asset('assets/images/campaign-icon.svg') }}">
                        <span>Campañas</span></a>
                </li>
                <li>
                    <a href="{{ route('profile') }}"><img src="{{ asset('assets/images/profile-icon.svg') }}">
                        <span>Perfil</span></a>
                </li>
            </ul>
            <a href="#" class="help-link"><img src="{{ asset('assets/images/help.svg') }}"> <span>Centro de
                    Ayuda</span></a>
        </aside>

        <div id="navbar-wrapper">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a href="#" class="navbar-brand" id="sidebar-toggle"><i class="fa fa-bars"></i></a>
                        <div class="right-nav">
                            <a href="#" class="notification-link"><img src="assets/images/notification.svg"></a>
                            <div class="lang-menu">
                                <a href="#" class="active"><img src="assets/images/us.svg"> EN</a>
                                <a href="#" class=""><img src="assets/images/spain.svg"> ES</a>
                            </div>
                            <a href="#" class="profile-name"><span>James Mark</span> <img
                                    src="assets/images/dash-profile.png"></a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <section id="content-wrapper" class="mt-3">
            <div class="container">
                <div class="row justify-content-center g-0">
                    <div class="col-lg-10">
                        <div class="row align-items-center mb-4">
                            <div class="col-xl-12">
                                <div class="page-title">
                                    <h1 class="mb-lg-0">Profile</h1>
                                    <div class="profile-drop-link"><i class="fa fa-bars"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-2 col-lg-3">
                                <div class="profile-link">
                                    <a href="{{ route('profile') }}" class="active">Account Settings</a>
                                    <a href="{{ url('/payments') }}">Payment History</a>
                                    <a href="{{ url('/settings') }}">Settings</a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-9">
                                <div class="setting-box">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('profile.update') }}" method="POST">
                                        @csrf
                                        <div class="personal-info form-personal">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h4>Edit Profile</h4>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-3">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control" name="first_name"
                                                            value="{{ old('first_name', explode(' ', $name, 2)[0] ?? '') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-3">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control" name="last_name"
                                                            value="{{ old('last_name', explode(' ', $name, 2)[1] ?? '') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-3">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" name="email"
                                                            value="{{ old('email', $email) }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-3">
                                                        <label>Address</label>
                                                        <input type="text" class="form-control"
                                                            name="address_line1"
                                                            value="{{ old('address_line1', $address_line1) }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-3">
                                                        <label>Address Line 2</label>
                                                        <input type="text" class="form-control"
                                                            name="address_line2"
                                                            value="{{ old('address_line2', $address_line2) }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group mb-3">
                                                        <label>City</label>
                                                        <input type="text" class="form-control" name="city"
                                                            value="{{ old('city', $city) }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group mb-3">
                                                        <label>State/Province</label>
                                                        <input type="text" class="form-control"
                                                            name="state_province"
                                                            value="{{ old('state_province', $state_province) }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-3">
                                                        <label>ZIP/Postal Code</label>
                                                        <input type="text" class="form-control" name="postal_code"
                                                            value="{{ old('postal_code', $postal_code) }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-3">
                                                        <label>Country</label>
                                                        <input type="text" class="form-control" name="country"
                                                            value="{{ old('country', $country) }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label>Phone Number</label>
                                                    <input type="text" class="form-control" name="phone"
                                                        value="{{ old('phone_number', $phone_number) }}">
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group text-end mt-3">
                                                        <a href="#"
                                                            class="btn btn-outline-primary me-2">Cancel</a>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
</body>

</html>
