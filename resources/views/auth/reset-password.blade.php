<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Reset Password - LinksCircle</title>
    <link rel="icon" type="image/png" href="{{ \App\Helper\Static\Methods::staticAsset('img/favicon.png') }}">

    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset('vendor_assets/css/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset('vendor_assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset('vendor_assets/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset('vendor_assets/css/style.css') }}">

    <style>
        :root {
            --primary-light-color: #eddfff;
            --primary-color: #7b36b5;
            --primary-dark-color: #3c1a55;
            --secondary-color: #1f0031;
            --dark-color: #1c1c1c;
            --light-color: #f6f6fb;
            --success-color: #28a745;
            --error-color: #dc3545;
            --warning-color: #ffc107;
            --info-color: #17a2b8;
            --font-family: "DM Sans", sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: var(--font-family);
        }

        body {
            background: linear-gradient(135deg, var(--primary-light-color) 0%, var(--light-color) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: var(--dark-color);
        }

        .signUP-admin {
            width: 100%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container-fluid {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .col-xl-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }

        .signUp-topbar {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo-img {
            max-width: 200px;
            height: auto;
        }

        .reset-password-card {
            background: white;
            border-radius: 20px;
            padding: 50px 40px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .reset-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .reset-icon {
            margin-bottom: 25px;
        }

        .icon-wrapper {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark-color) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            color: white;
            font-size: 2rem;
        }

        .reset-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 10px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .reset-subtitle {
            font-size: 1.1rem;
            color: #6c757d;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--dark-color);
            display: block;
        }

        .input-group {
            position: relative;
        }

        .form-control {
            width: 100%;
            padding: 14px 15px;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f9f9fc;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(123, 54, 181, 0.1);
            background: white;
            outline: none;
        }

        .form-control[readonly] {
            background-color: #f8f9fa;
            opacity: 0.8;
        }

        .password-field {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #6c757d;
            cursor: pointer;
            font-size: 1.2rem;
            z-index: 2;
        }

        .button-group {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .btn-login {
            padding: 16px 40px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-login:hover {
            background: var(--primary-dark-color);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(123, 54, 181, 0.3);
        }

        /* Alert Styles */
        .alert {
            border-radius: 12px;
            padding: 15px 20px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideIn 0.3s ease-out;
        }

        .alert-success {
            background: #d4edda;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
        }

        .alert i {
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .alert-success i {
            color: var(--success-color);
        }

        .alert-danger i {
            color: var(--error-color);
        }

        .alert-content p {
            margin: 0;
            font-weight: 500;
        }

        .alert-success .alert-content p {
            color: #155724;
        }

        .alert-danger .alert-content p {
            color: #721c24;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Preloader Styles */
        #overlayer {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: white;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .loader-overlay {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .atbd-spin-dots {
            display: flex;
            gap: 8px;
        }

        .spin-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: var(--primary-color);
            animation: spin-dot 1.4s ease-in-out infinite both;
        }

        .spin-dot:nth-child(1) { animation-delay: -0.32s; }
        .spin-dot:nth-child(2) { animation-delay: -0.16s; }

        @keyframes spin-dot {
            0%, 80%, 100% {
                transform: scale(0);
            }
            40% {
                transform: scale(1);
            }
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .col-xl-6 {
                flex: 0 0 66.666667%;
                max-width: 66.666667%;
            }
        }

        @media (max-width: 992px) {
            .col-xl-6 {
                flex: 0 0 83.333333%;
                max-width: 83.333333%;
            }
        }

        @media (max-width: 768px) {
            .col-xl-6 {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .reset-password-card {
                padding: 30px 20px;
                margin: 20px;
            }

            .reset-title {
                font-size: 1.8rem;
            }

            .reset-subtitle {
                font-size: 1rem;
            }

            .icon-wrapper {
                width: 70px;
                height: 70px;
                font-size: 1.8rem;
            }

            .btn-login {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            body {
                padding: 10px;
            }

            .reset-password-card {
                padding: 25px 15px;
            }

            .reset-title {
                font-size: 1.5rem;
            }

            .logo-img {
                max-width: 150px;
            }

            .btn-login {
                padding: 14px 20px;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="signUP-admin">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <!-- Header with Logo -->
                    <div class="signUp-topbar">
                        <div class="logo-div">
                            <a href="https://www.linkscircle.com/">
                                <img src="{{ \App\Helper\Static\Methods::staticAsset('img/logo.png') }}" alt="LinksCircle Affiliate Network" class="logo-img">
                            </a>
                        </div>
                    </div>

                    <!-- Main Content -->
                    <div class="reset-password-card">
                        <div class="reset-header">
                            <div class="reset-icon">
                                <div class="icon-wrapper">
                                    <i class="ri-lock-password-line"></i>
                                </div>
                            </div>
                            <h1 class="reset-title">Reset Your Password</h1>
                            <p class="reset-subtitle">Create a new password for your account</p>
                        </div>

                        <!-- Alert Messages -->
                        @if(session('status'))
                            <div class="alert alert-success">
                                <i class="ri-checkbox-circle-line"></i>
                                <div class="alert-content">
                                    <p>{{ session('status') }}</p>
                                </div>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <i class="ri-error-warning-line"></i>
                                <div class="alert-content">
                                    @foreach($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="reset-body">
                            <form method="POST" action="{{ route('password.store') }}">
                                @csrf

                                <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <div class="form-group">
                                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                    <div class="input-group">
                                        <input id="email" class="form-control" type="email" name="email"
                                               value="{{ old('email', $request->email) }}" required readonly
                                               placeholder="Your email address">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="form-label">New Password</label>
                                    <div class="input-group password-field">
                                        <input id="password" class="form-control"
                                               type="password"
                                               name="password"
                                               required autocomplete="new-password" autofocus
                                               placeholder="Enter new password">
                                        <button type="button" class="password-toggle" id="togglePassword1">
                                            <i class="ri-eye-close-line"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <div class="input-group password-field">
                                        <input id="password_confirmation" class="form-control"
                                               type="password"
                                               name="password_confirmation"
                                               required autocomplete="new-password"
                                               placeholder="Confirm new password">
                                        <button type="button" class="password-toggle" id="togglePassword2">
                                            <i class="ri-eye-close-line"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="button-group">
                                    <button type="submit" class="btn-login">
                                        <i class="ri-lock-unlock-line mr-10"></i>
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- End: .col-xl-6  -->
            </div>
        </div>
    </div><!-- End: .signUP-admin  -->

    <!-- Preloader -->
    <div id="overlayer">
        <span class="loader-overlay">
            <div class="atbd-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </span>
    </div>

    <script src="{{ \App\Helper\Static\Methods::staticAsset('vendor_assets/js/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset('vendor_assets/js/jquery/jquery-ui.js') }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset('vendor_assets/js/bootstrap/popper.js') }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset('vendor_assets/js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset('vendor_assets/js/feather.min.js') }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset('vendor_assets/js/jquery.validate.min.js') }}"></script>

    <script>
        // Preloader
        window.addEventListener('load', function () {
            $(".loader-overlay").delay(500).fadeOut("slow");
            $("#overlayer").fadeOut(500, function () {
                $('body').removeClass('overlayScroll');
            });

            document.querySelector('body').classList.add("loaded")

            /* feather icon */
            feather.replace();
        });

        // Password toggle functionality
        document.getElementById('togglePassword1').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('ri-eye-close-line');
                icon.classList.add('ri-eye-line');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('ri-eye-line');
                icon.classList.add('ri-eye-close-line');
            }
        });

        document.getElementById('togglePassword2').addEventListener('click', function() {
            const passwordInput = document.getElementById('password_confirmation');
            const icon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('ri-eye-close-line');
                icon.classList.add('ri-eye-line');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('ri-eye-line');
                icon.classList.add('ri-eye-close-line');
            }
        });

        // Form validation
        $(document).ready(function() {
            $('form').validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 8
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "#password"
                    }
                },
                messages: {
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        required: "Please enter a password",
                        minlength: "Password must be at least 8 characters long"
                    },
                    password_confirmation: {
                        required: "Please confirm your password",
                        equalTo: "Passwords do not match"
                    }
                },
                submitHandler: function(form) {
                    // You can add loading state here if needed
                    form.submit();
                }
            });
        });
    </script>

    @if(env("APP_ENV") == "production" && empty(request()->search))
        <!-- Hotjar Tracking Code for https://app.linkscircle.com/ -->
        <script>
            (function(h,o,t,j,a,r){
                h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                h._hjSettings={hjid:3451709,hjsv:6};
                a=o.getElementsByTagName('head')[0];
                r=o.createElement('script');r.async=1;
                r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                a.appendChild(r);
            })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
        </script>
    @endif
</body>
</html>