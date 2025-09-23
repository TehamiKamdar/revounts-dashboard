<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <link rel="icon" type="image/png" href="<?php echo e(asset("admin_assets/favicon.png")); ?>">

    <?php echo SEOMeta::generate(); ?>

    <?php echo OpenGraph::generate(); ?>

    <?php echo Twitter::generate(); ?>

    <?php echo JsonLd::generate(); ?>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- RemixIcons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <?php echo $__env->yieldPushContent('styles'); ?>

    <link rel="stylesheet" href="<?php echo e(asset("admin_assets/css/style.css")); ?>">

    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__clear {
            margin: -3px -6px;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            margin: 10px 0 !important;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__rendered li,
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            margin: 7px 0 7px 10px !important;
        }
        .select2-container--default .select2-selection--single, .select2-container--default .select2-selection--multiple {
            padding: unset !important;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            margin-bottom: 5px;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__rendered {
            padding: 0 20px 0 5px !important;
        }
    table.dataTable tbody>tr.selected>td {
        background-color: #3C1A55 !important;
        /* apna desired color */
        color: #fff !important;
    }
    </style>

</head>

<body>

    <?php echo $__env->make("partial.admin.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="dashboard-container">
        <main class="dashboard-main">
            <?php echo $__env->yieldContent("content"); ?>
        </main>
    </div>
    <?php echo $__env->make("partial.admin.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

    <script src="<?php echo e(asset("vendor_assets/js/jquery/jquery-3.5.1.min.js")); ?>"></script>
    <script src="<?php echo e(asset("vendor_assets/js/jquery/jquery-ui.js")); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset("vendor_assets/js/feather.min.js")); ?>"></script>
    <script src="<?php echo e(asset("vendor_assets/js/admin_extra.js")); ?>"></script>

    <?php echo $__env->yieldPushContent("editor"); ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
    <?php echo $__env->yieldPushContent('extended_scripts'); ?>

</body>
</html>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/layouts/admin/panel_app.blade.php ENDPATH**/ ?>