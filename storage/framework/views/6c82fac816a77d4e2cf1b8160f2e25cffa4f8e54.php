<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <link rel="icon" type="image/png" href="<?php echo e(asset("new_assets/favicon.png")); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <?php echo SEOMeta::generate(); ?>

    <?php echo OpenGraph::generate(); ?>

    <?php echo Twitter::generate(); ?>

    <?php echo JsonLd::generate(); ?>


    <!-- inject:css-->
    
    

    <?php echo $__env->yieldPushContent('styles'); ?>
    <?php echo $__env->yieldPushContent('extended_styles'); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- RemixIcons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset("new_assets/css/style.css")); ?>">

    
</head>

<body>
    <?php echo $__env->make("partial.advertiser.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="dashboard-container">
        <main class="dashboard-main">
            <div class="notification-wrapper position-fixed top-0 end-0 p-3" style="z-index: 1080"></div>
            <?php echo $__env->yieldContent("content"); ?>
        </main>
    </div>
    <?php echo $__env->make("partial.advertiser.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/feather.min.js")); ?>"></script>

<?php echo $__env->yieldPushContent('scripts'); ?>

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

        /* sidebar collapse  */
        const sidebarToggle = document.querySelector(".sidebar-toggle");

        function sidebarCollapse() {
            $('.overlay-dark-sidebar').toggleClass('show');
            document.querySelector(".sidebar").classList.toggle("sidebar-collapse");
            document.querySelector(".sidebar").classList.toggle("collapsed");
            document.querySelector(".contents").classList.toggle("expanded");
        }

        if (sidebarToggle) {
            sidebarToggle.addEventListener("click", function (e) {
                e.preventDefault();
                sidebarCollapse();
            });
        }

        /* sidebar nav events */
        $(".sidebar_nav .has-child ul").hide();
        $(".sidebar_nav .has-child.open ul").show();
        $(".sidebar_nav .has-child >a").on("click", function (e) {
            e.preventDefault();
            $(this).parent().next("has-child").slideUp();
            $(this).parent().parent().children(".has-child").children("ul").slideUp();
            $(this).parent().parent().children(".has-child").removeClass("open");
            if ($(this).next().is(":visible")) {
                $(this).parent().removeClass("open");
            } else {
                $(this).parent().addClass("open");
                $(this).next().slideDown();
            }
        });

        /* Header mobile view */
        $(window).on('resize', function () {
            var screenSize = window.innerWidth;
            if ($(this).width() <= 767.98) {
                $(".navbar-right__menu").appendTo(".mobile-author-actions");
                // $(".search-form").appendTo(".mobile-search");
                $(".contents").addClass("expanded");
                $(".sidebar ").removeClass("sidebar-collapse");
                $(".sidebar ").addClass("collapsed");
            } else {
                $(".navbar-right__menu").appendTo(".navbar-right");
            }
        })
            .trigger("resize");

        $(window)
            .bind("resize", function () {
                var screenSize = window.innerWidth;
                if ($(this).width() > 767.98) {
                    $(".atbd-mail-sidebar").addClass("show");
                }
            })
            .trigger("resize");

        $(window)
            .bind("resize", function () {
                var screenSize = window.innerWidth;
                if ($(this).width() <= 991) {
                    $(".sidebar").removeClass("sidebar-collapse");
                    $(".sidebar").addClass("collapsed");
                    $(".sidebar-toggle").on("click", function () {
                        $(".overlay-dark-sidebar").toggleClass("show");
                    });
                    $(".overlay-dark-sidebar").on("click", function () {
                        $(this).removeClass("show");
                        $(".sidebar").removeClass("sidebar-collapse");
                        $(".sidebar").addClass("collapsed");
                    });
                }
            })
            .trigger("resize");

        /* Mobile Menu */
        $(window)
            .bind("resize", function () {
                var screenSize = window.innerWidth;
                if ($(this).width() <= 991.98) {
                    $(".menu-horizontal").appendTo(".mobile-nav-wrapper");
                }
            })
            .trigger("resize");
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
<?php /**PATH C:\Users\lenovo\Downloads\revdb\resources\views/layouts/advertiser/panel_app.blade.php ENDPATH**/ ?>