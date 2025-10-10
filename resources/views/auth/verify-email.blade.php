<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Email Verification - LinksCircle</title>
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
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-bottom: 30px;
        }

        .verification-card {
            background: white;
            border-radius: 20px;
            padding: 50px 40px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
        }

        .logo {
            margin-bottom: 30px;
        }

        .logo-img {
            max-width: 200px;
            height: auto;
        }

        .verification-icon {
            margin: 30px 0;
        }

        .icon-wrapper {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark-color) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            color: white;
            font-size: 2.5rem;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(123, 54, 181, 0.4);
            }
            70% {
                transform: scale(1.05);
                box-shadow: 0 0 0 15px rgba(123, 54, 181, 0);
            }
            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(123, 54, 181, 0);
            }
        }

        .verification-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 20px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .verification-message {
            font-size: 1.1rem;
            color: #6c757d;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .alert-success {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 12px;
            padding: 15px 20px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideIn 0.3s ease-out;
        }

        .alert-success i {
            color: var(--success-color);
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .alert-content p {
            margin: 0;
            color: #155724;
            font-weight: 500;
        }

        .verification-form {
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

        .btn-light {
            padding: 10px 20px;
            background: #f8f9fa;
            color: var(--dark-color);
            border: 1px solid #e9ecef;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-light:hover {
            background: #e9ecef;
            transform: translateY(-1px);
            text-decoration: none;
            color: var(--dark-color);
        }

        .mr-10 {
            margin-right: 10px;
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

            .verification-card {
                padding: 30px 20px;
                margin: 20px;
            }

            .verification-title {
                font-size: 1.8rem;
            }

            .verification-message {
                font-size: 1rem;
            }

            .icon-wrapper {
                width: 80px;
                height: 80px;
                font-size: 2rem;
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

            .verification-card {
                padding: 25px 15px;
            }

            .verification-title {
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
                    <!-- Header with Logout -->
                    <div class="signUp-topbar">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                <i class="ri-logout-box-r-line mr-10"></i>{{ __('Log Out') }}
                            </button>
                        </form>
                    </div><!-- End: .signUp-topbar  -->

                    <!-- Main Content -->
                    <div class="verification-card">
                        <div class="verification-header text-center">
                            <div class="logo">
                                <a href="/">
                                    <img src="https://www.linkscircle.com/images/logo.png" alt="LinksCircle" class="logo-img">
                                </a>
                            </div>

                            <div class="verification-icon">
                                <div class="icon-wrapper">
                                    <i class="ri-mail-send-line"></i>
                                </div>
                            </div>

                            <h1 class="verification-title">Email Verification Required</h1>
                        </div>

                        <div class="verification-body">
                            <p class="verification-message">
                                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                            </p>

                            @if (session('status') == 'verification-link-sent')
                                <div class="alert-success">
                                    <div class="alert-content">
                                        <i class="ri-checkbox-circle-line"></i>
                                        <p>{{ __('A new verification link has been sent to the email address you provided during registration.') }}</p>
                                    </div>
                                </div>
                            @endif

                            <form class="verification-form" method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <button type="submit" class="btn-login">
                                    <i class="ri-mail-send-line mr-10"></i>
                                    {{ __('Resend Verification Email') }}
                                </button>
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

        // Interactive button effects
        document.addEventListener('DOMContentLoaded', function() {
            const resendBtn = document.querySelector('.btn-login');

            if (resendBtn) {
                resendBtn.addEventListener('click', function() {
                    // Add loading state
                    const originalText = this.innerHTML;
                    this.innerHTML = '<i class="ri-loader-4-line animate-spin mr-10"></i>Sending...';
                    this.disabled = true;

                    // Revert after 2 seconds (simulate API call)
                    setTimeout(() => {
                        this.innerHTML = originalText;
                        this.disabled = false;
                    }, 2000);
                });
            }
        });

        // Add CSS for loading animation
        const style = document.createElement('style');
        style.textContent = `
            .animate-spin {
                animation: spin 1s linear infinite;
            }

            @keyframes spin {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }
        `;
        document.head.appendChild(style);
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