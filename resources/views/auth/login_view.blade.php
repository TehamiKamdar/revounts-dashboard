<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="verify-admitad" content="67b8b56253">
    <link rel="icon" type="image/png" href="{{ \App\Helper\Static\Methods::staticAsset('img/favicon.png') }}">

    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}

    <link rel="stylesheet"
        href="{{ \App\Helper\Static\Methods::staticAsset('vendor_assets/css/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset('vendor_assets/css/fontawesome.css') }}">
    <link rel="stylesheet"
        href="{{ \App\Helper\Static\Methods::staticAsset('vendor_assets/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset('vendor_assets/css/style.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,300;1,9..40,400;1,9..40,500;1,9..40,600;1,9..40,700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary-light: #eddfff;
            --primary: #7b36b5;
            --primary-dark: #3c1a55;
            --secondary: #1f0031;
            --dark: #1c1c1c;
            --light: #f9f9fc;
            --white: #ffffff;
            --gray: #6c757d;
            --font-family: "DM Sans", sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: var(--font-family);
        }

        body {
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--light) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: var(--dark);
            overflow-x: hidden;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .logo {
            margin-bottom: 40px;
            text-align: center;
        }

        .logo img {
            max-width: 220px;
            height: auto;
        }

        .main-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .welcome-section {
            text-align: center;
            margin-bottom: 50px;
            max-width: 600px;
        }

        .welcome-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .welcome-section p {
            font-size: 1.2rem;
            color: var(--gray);
            line-height: 1.6;
        }

        .account-cards {
            display: flex;
            gap: 30px;
            width: 100%;
            max-width: 900px;
            margin-bottom: 40px;
        }

        .account-card {
            flex: 1;
            background: var(--white);
            border-radius: 20px;
            padding: 40px 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            text-align: center;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .account-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--primary-dark) 100%);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .account-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(123, 54, 181, 0.15);
            text-decoration: none;
            color: inherit;
        }

        .account-card:hover::before {
            transform: scaleX(1);
        }

        .card-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            background: var(--primary-light);
            color: var(--primary);
            font-size: 2rem;
            transition: all 0.4s ease;
        }

        .account-card:hover .card-icon {
            background: var(--primary);
            color: var(--white);
            transform: scale(1.1);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--secondary);
        }

        .card-description {
            color: var(--gray);
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .card-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 12px 25px;
            background: transparent;
            border: 2px solid var(--primary-light);
            border-radius: 50px;
            color: var(--primary);
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .account-card:hover .card-button {
            background: var(--primary);
            color: var(--white);
            border-color: var(--primary);
        }

        .login-section {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .login-section p {
            margin-bottom: 20px;
            color: var(--gray);
        }

        .login-button {
            display: inline-block;
            padding: 14px 40px;
            background: var(--primary);
            color: var(--white);
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(123, 54, 181, 0.3);
        }

        .login-button:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(123, 54, 181, 0.4);
            color: var(--white);
            text-decoration: none;
        }

        .floating-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(123, 54, 181, 0.05);
            animation: float 20s infinite linear;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 70%;
            left: 80%;
            animation-delay: -5s;
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            top: 20%;
            left: 85%;
            animation-delay: -10s;
        }

        .shape:nth-child(4) {
            width: 100px;
            height: 100px;
            top: 80%;
            left: 15%;
            animation-delay: -15s;
        }

        @keyframes float {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }

            25% {
                transform: translate(20px, 20px) rotate(90deg);
            }

            50% {
                transform: translate(0, 40px) rotate(180deg);
            }

            75% {
                transform: translate(-20px, 20px) rotate(270deg);
            }

            100% {
                transform: translate(0, 0) rotate(360deg);
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
            background-color: var(--primary);
            animation: spin-dot 1.4s ease-in-out infinite both;
        }

        .spin-dot:nth-child(1) {
            animation-delay: -0.32s;
        }

        .spin-dot:nth-child(2) {
            animation-delay: -0.16s;
        }

        @keyframes spin-dot {

            0%,
            80%,
            100% {
                transform: scale(0);
            }

            40% {
                transform: scale(1);
            }
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .account-cards {
                flex-direction: column;
                gap: 20px;
            }

            .welcome-section h1 {
                font-size: 2rem;
            }

            .welcome-section p {
                font-size: 1.1rem;
            }

            .account-card {
                padding: 30px 20px;
            }
        }

        /* Animation for page load */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-in {
            animation: fadeInUp 0.6s ease forwards;
        }

        .delay-1 {
            animation-delay: 0.2s;
            opacity: 0;
        }

        .delay-2 {
            animation-delay: 0.4s;
            opacity: 0;
        }

        .delay-3 {
            animation-delay: 0.6s;
            opacity: 0;
        }

        body.loaded #overlayer {
            display: none;
        }
    </style>
</head>

<body>
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

    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="container">
        <div class="logo animate-in">
            <a href="https://www.linkscircle.com/">
                <img src="{{ \App\Helper\Static\Methods::staticAsset('img/logo.png') }}"
                    alt="LinksCircle Affiliate Network" class="img-fluid">
            </a>
        </div>

        <div class="main-content">
            <div class="welcome-section animate-in delay-1">
                <h1>Let's Get Started!</h1>
                <p>Select the account type that best fits your role and join our growing network of publishers and
                    advertisers.</p>
            </div>

            <div class="account-cards">
                <a class="account-card animate-in delay-2" href="{{ route('login', ['type' => 'publisher']) }}">
                    <div class="card-icon">
                        <i class="fas fa-globe-americas"></i>
                    </div>
                    <h3 class="card-title">Publisher</h3>
                    <p class="card-description">I have a website, blog, or social media presence and want to monetize it
                        by promoting relevant brands and products.</p>
                    <div class="card-button">
                        <span>Get Started</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>



                <a class="account-card animate-in delay-3" href="{{ route('login', ['type' => 'advertiser']) }}">
                    <div class="card-icon">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <h3 class="card-title">Advertiser</h3>
                    <p class="card-description">I want to grow my business by partnering with top publishers who can
                        promote my brand to their audiences.</p>
                    <div class="card-button">
                        <span>Get Started</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Original Scripts -->
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

        // Additional interactive effects
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.account-card');

            cards.forEach(card => {
                card.addEventListener('mouseenter', function () {
                    this.style.transform = 'translateY(-10px)';
                });

                card.addEventListener('mouseleave', function () {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>

    @if(env("APP_ENV") == "production" && empty(request()->search))
        <!-- Hotjar Tracking Code for https://app.linkscircle.com/ -->
        <script>
            (function (h, o, t, j, a, r) {
                h.hj = h.hj || function () { (h.hj.q = h.hj.q || []).push(arguments) };
                h._hjSettings = { hjid: 3451709, hjsv: 6 };
                a = o.getElementsByTagName('head')[0];
                r = o.createElement('script'); r.async = 1;
                r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
                a.appendChild(r);
            })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
        </script>
    @endif
</body>

</html>