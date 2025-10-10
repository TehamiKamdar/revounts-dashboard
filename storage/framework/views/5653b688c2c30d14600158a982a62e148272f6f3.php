<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <link rel="icon" type="image/png" href="<?php echo e(asset('img/favicon.png')); ?>">

    <?php echo SEOMeta::generate(); ?>

    <?php echo OpenGraph::generate(); ?>

    <?php echo Twitter::generate(); ?>

    <?php echo JsonLd::generate(); ?>

    <title>Publisher Login - LinksCircle</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('vendor_assets/css/bootstrap/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor_assets/css/fontawesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor_assets/css/line-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor_assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor_assets/css/phone/intlTelInput.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor_assets/css/select2.min.css')); ?>">
    <style>

        :root {
            --primary-light-color: #eddfff;
            --primary-color: #7b36b5;
            --primary-dark-color: #3c1a55;
            --secondary-color: #1f0031;
            --dark-color: #1c1c1c;
            --light-color: #f6f6fb;
            --font-family: "DM Sans", sans-serif;
            --success-color: #28a745;
            --error-color: #dc3545;
            --warning-color: #ffc107;
            --info-color: #17a2b8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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

        h1,h2,h3,h4,h5,h6,article,span,code,kbd,a,button,input,label,textarea{
            font-family: var(--font-family) !important;
        }
         .checkout-progress div.step.current span:nth-of-type(1){
            background-color: var(--primary-color);q
         }

        .page-container {
            width: 100%;
            max-width: 1000px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            min-height: 600px;
        }

        .page-sidebar {
            flex: 1;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark-color) 100%);
            color: white;
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .page-sidebar::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(45deg);
        }

        .logo {
            margin-bottom: 30px;
            position: relative;
            z-index: 2;
        }

        .logo img {
            max-width: 180px;
            height: auto;
        }

        .sidebar-content {
            position: relative;
            z-index: 2;
        }

        .sidebar-content h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-light-color);
            margin-bottom: 15px;
        }

        .sidebar-content p {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.6;
            max-width: 300px;
        }

        .main-content {
            flex: 1.2;
            padding: 30px 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .page-header {
            text-align: center;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .page-header h1 {
            position: relative;
            display: inline-block; /* Ensure the line fits within the h1 width */
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 10px;
            border-bottom: 2px solid #feefef;
        }

        .page-header h1::after {
            content: ''; /* Add content for the pseudo-element */
            position: absolute;
            bottom: 0; /* Position at the bottom of the h1 */
            left: 50%; /* Start from the center */
            transform: translateX(-50%); /* Adjust so it's centered */
            border-bottom: 2px solid #feefef;
        }

        .page-header p {
            color: #6c757d;
            font-size: 1.1rem;
        }

        .login-form {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
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
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .remember-me input {
            accent-color: var(--primary-color);
        }

        .forgot-password {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .forgot-password:hover {
            color: var(--primary-dark-color);
            text-decoration: underline;
        }

        .btn-login {
            width: 55%;
            padding: 14px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 25px;
        }

        .btn-login:hover {
            background: var(--primary-dark-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(123, 54, 181, 0.3);
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
        }

        .register-link p {
            color: #6c757d;
            margin-bottom: 15px;
        }

        .btn-register {
            display: inline-block;
            padding: 12px 30px;
            background: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
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

        .notification-wrapper {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            max-width: 400px;
            width: 100%;
        }

        .atbd-notification-box {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            border-left: 4px solid;
            animation: slideInRight 0.3s ease-out;
            position: relative;
            overflow: hidden;
        }

        .atbd-notification-box.notification-success {
            border-left-color: var(--success-color);
        }

        .atbd-notification-box.notification-error {
            border-left-color: var(--error-color);
        }

        .atbd-notification-box.notification-warning {
            border-left-color: var(--warning-color);
        }

        .atbd-notification-box.notification-info {
            border-left-color: var(--info-color);
        }

        .atbd-notification-box__content {
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }

        .atbd-notification-box__icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .notification-success .atbd-notification-box__icon {
            background: var(--success-color);
            color: white;
        }

        .notification-error .atbd-notification-box__icon {
            background: var(--error-color);
            color: white;
        }

        .notification-warning .atbd-notification-box__icon {
            background: var(--warning-color);
            color: white;
        }

        .notification-info .atbd-notification-box__icon {
            background: var(--info-color);
            color: white;
        }

        .atbd-notification-box__text h6 {
            margin: 0 0 8px 0;
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
        }

        .atbd-notification-box__text {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.4;
        }

        .atbd-notification-box__close {
            position: absolute;
            top: 15px;
            right: 15px;
            color: #999;
            text-decoration: none;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            transition: all 0.2s ease;
        }

        .atbd-notification-box__close:hover {
            background: #f8f9fa;
            color: #666;
        }

        .notification-hide {
            animation: slideOutRight 0.3s ease-in forwards;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }

        /* Progress bar for auto-close */
        .notification-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            background: currentColor;
            opacity: 0.3;
            animation: progressBar 5s linear forwards;
        }

        @keyframes progressBar {
            from { width: 100%; }
            to { width: 0%; }
        }

        /* Demo buttons */
        .demo-buttons {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        @keyframes spin-dot {
            0%, 80%, 100% {
                transform: scale(0);
            }
            40% {
                transform: scale(1);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .page-container {
                flex-direction: column;
                max-width: 100%;
                margin: 0;
                border-radius: 0;
            }

            .page-sidebar {
                padding: 30px 20px;
                min-height: 200px;
            }

            .main-content {
                padding: 30px 20px;
            }

            .page-header h1 {
                font-size: 1.8rem;
            }

            .sidebar-content h2 {
                font-size: 1.8rem;
            }
        }

        /* Animation for form elements */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-in {
            animation: fadeInUp 0.6s ease forwards;
        }
    </style>
</head>
<body>
    <div class="page-container">
        <div class="page-sidebar">
            <div class="logo">
                <img src="<?php echo e(asset('img/logo.png')); ?>" alt="LinksCircle">
            </div>
            <div class="sidebar-content mb-5">
                <h1>Welcome<?php echo e(Route::is('login') ? ' Back' : ''); ?>!</h1>
                <p>To keep connected with us, please login with your personal information.</p>
            </div>
            <div>
                <?php if(request()->segment(1) === 'advertiser'): ?>
                    <img class="img-fluid svg" src="<?php echo e(asset('img/svg/signupillustration.svg')); ?>" alt="img" />
                <?php elseif(request()->segment(1) === 'publisher'): ?>
                    <img class="svg w-100" id="stepImage" src="<?php echo e(asset('img/svg/progress1.svg')); ?>" alt="img">
                <?php endif; ?>
            </div>
        </div>

        <div class="main-content" id="signUpForm">
            <div class="notification-wrapper top-right"></div>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

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

    <script src="<?php echo e(asset('vendor_assets/js/jquery/jquery-3.5.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor_assets/js/jquery/jquery-ui.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor_assets/js/bootstrap/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor_assets/js/bootstrap/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor_assets/js/feather.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor_assets/js/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor_assets/js/select2.full.min.js')); ?>"></script>
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

        // Add animation classes on load
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.animate-in');
            elements.forEach((element, index) => {
                element.style.animationDelay = `${index * 0.1}s`;
            });
        });
    </script>

    <?php if(env("APP_ENV") == "production" && empty(request()->search)): ?>
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
    <?php endif; ?>
</body>
</html>
<?php echo $__env->yieldPushContent('scripts'); ?><?php /**PATH C:\Users\lenovo\Downloads\revdb\resources\views/layouts/panel_guest.blade.php ENDPATH**/ ?>