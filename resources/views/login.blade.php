<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Mobiplay</title>
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@300,301,400,401,500,501,700,701,900,901,1,2&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
</head>

<body>
    <section class="auth-section">
        <div class="container-fluid p-0 h-100">
            <div class="row g-0 align-items-center h-100">
                <div class="col-lg-6 logo-auth-desk h-100">
                    <div class="logo-auth h-100">
                        <img src="assets/images/logo.svg" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 p-relative h-100 align-content-center">
                    <div class="auth-form">
                        <h2>Sign in</h2>
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ url('/login') }}">
                            @csrf <!-- This is important for CSRF protection -->
                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                                <span class="form-icon"><img src="assets/images/eye.png" alt="Show Password"></span>
                            </div>
                            <div class="form-group mb-3">
                                <a href="forgot.html" class="forgot-link">Forgot password?</a>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rememberMe" name="remember">
                                    <label class="form-check-label" for="rememberMe">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="form-group mb-5">
                                <button type="submit" class="btn btn-primary w-100">Sign In</button>
                            </div>
                            <div class="form-group">
                                <p>Don’t have an account? <a href="{{ route('signup') }}">Sign up</a></p>
                            </div>
                        </form>

                    </div>
                    <div class="auth-footer">
                        <p>By proceeding, you agree to the Terms and Conditions and Privacy Policy</p>
                        <div class="auth-link">
                            <a href="#">Help</a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#privacyModal">Privacy</a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Terms-Modal -->
    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog terms-modal">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close close-circle" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="terms-privacy">
                        <h2>Terms and Conditions</h2>
                        <p>These terms and conditions govern your use of our services. Please read them carefully. By
                            using our services, you agree to these terms.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Privacy-Modal -->
    <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
        <div class="modal-dialog terms-modal">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close close-circle" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="terms-privacy">
                        <h2>Privacy Policy</h2>
                        <p>Your privacy is important to us. This policy explains how we collect, use, and protect your
                            personal information. Please review it carefully.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
