<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <link rel="icon" type="image/png" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("img/favicon.png")); ?>">

    <?php echo SEOMeta::generate(); ?>

    <?php echo OpenGraph::generate(); ?>

    <?php echo Twitter::generate(); ?>

    <?php echo JsonLd::generate(); ?>

    <title>Publisher Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        :root {
            /* Colors */
            --primary-light-color: #eddfff;
            --primary-color: #7b36b5;
            --primary-dark-color: #3c1a55;
            --secondary-color: #1f0031;
            --dark-color: #1c1c1c;
            --light-color: #dadada;
            --success-color: #28a745;
            --error-color: #dc3545;
            --warning-color: #ffc107;
            --info-color: #17a2b8;
            /* Font Families */
            --primary-font-family: "DM Sans", sans-serif;
            --secondary-font-family: "Arial", sans-serif;
            /* Buttons */
            --btn-primary-background-color: #7b36b5;
            --btn-primary-border-color: #7b36b5;
            --btn-primary-color: #eddfff;
            --btn-primary-outline-color: #7b36b5;
            --btn-primary-outline-border: #7b36b5;
            --btn-primary-outline-background: transparent;
        }

        body {
            font-family: var(--primary-font-family);
            background-color: var(--primary-light-color);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            display: flex;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 900px; /* Reduced max-width for a simpler form */
            margin: 20px;
            overflow: hidden;
        }

        .sidebar {
            background-color: var(--primary-color);
            color: #fff;
            padding: 40px;
            width: 40%; /* Adjusted width */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .sidebar h2 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .sidebar p {
            margin-bottom: 30px;
            color: var(--primary-light-color);
        }

        .main-content {
            padding: 40px;
            width: 60%; /* Adjusted width */
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-section {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-title {
            font-size: 2rem;
            color: var(--secondary-color);
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            color: var(--dark-color);
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            padding: 12px;
            border: 1px solid var(--light-color);
            border-radius: 8px;
            font-size: 1rem;
            width: 100%;
            box-sizing: border-box;
            background-color: #f9f9f9;
        }

        input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px var(--primary-light-color);
        }

        .form-buttons {
            display: flex;
            justify-content: center; /* Center the button */
            margin-top: 20px;
        }

        .btn {
            padding: 12px 25px;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            text-decoration: none;
            text-align: center;
            width: 100%; /* Make button full width */
            box-sizing: border-box;
        }

        .btn-primary {
            background-color: var(--btn-primary-background-color);
            border: 1px solid var(--btn-primary-border-color);
            color: var(--btn-primary-color);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark-color);
            border-color: var(--primary-dark-color);
        }

        .login-links {
            text-align: center;
            margin-top: 15px;
        }

        .login-links a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: bold;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                width: 100%;
                margin: 0;
                border-radius: 0;
            }

            .sidebar {
                width: 95%;
                padding: 20px;
            }

            .main-content {
                width: 90%;
                padding: 20px;
            }

            .form-buttons {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>Welcome Back!</h2>
            <p>To keep connected with us, please login with your personal information.</p>
        </div>

        <div class="main-content">
            <?php echo $__env->yieldContent("content"); ?>
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
        <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/jquery/jquery-3.5.1.min.js")); ?>"></script>
        <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/jquery/jquery-ui.js")); ?>"></script>
        <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/bootstrap/popper.js")); ?>"></script>
        <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/bootstrap/bootstrap.min.js")); ?>"></script>
        <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/feather.min.js")); ?>"></script>
        <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/jquery.validate.min.js")); ?>"></script>

        <?php echo $__env->yieldPushContent('scripts'); ?>

        <script>
            function showPassword(id)
            {
                let password = "password", text = "text";

                if($(`#${id}`).attr("type") == password)
                {
                    $(`#${id}`).attr('type', text);
                    $(`#${id}-icon`).removeClass('ri-eye-close-line');
                    $(`#${id}-icon`).addClass('ri-eye-line');
                }
                else if($(`#${id}`).attr("type") == text)
                {
                    $(`#${id}`).attr('type', password);
                    $(`#${id}-icon`).removeClass('ri-eye-line');
                    $(`#${id}-icon`).addClass('ri-eye-close-line');
                }
            }

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
<?php /**PATH C:\Users\Tehami\Desktop\revounts-dashboard\resources\views/layouts/panel_guest.blade.php ENDPATH**/ ?>