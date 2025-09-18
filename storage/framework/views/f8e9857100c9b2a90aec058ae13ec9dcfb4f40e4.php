<?php if (! $__env->hasRenderedOnce('bc599277-7a7c-4625-ba9a-475cedb951b0')): $__env->markAsRenderedOnce('bc599277-7a7c-4625-ba9a-475cedb951b0');
$__env->startPush('styles'); ?>

    <style>
        .friends-widget .card-body .labelLine, .friends-widget .card-body .trackerHeading {max-width: 100%!important;}.friends-widget .card-body .trackerMinimize {display:none!important;}
    </style>

<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('2598830c-ba89-4f5e-b041-4e730275ea4a')): $__env->markAsRenderedOnce('2598830c-ba89-4f5e-b041-4e730275ea4a');
$__env->startPush('scripts'); ?>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/drawer.js")); ?>"></script>
    <script>
        function clickToCopy(id, msg)
        {
            copyToClipboard(document.getElementById(id))
            normalMsg({"message": msg, "success": true});
        }
        function prepareVoucherFormContent(id)
        {
            $.ajax({
                url: `/publisher/creatives/coupons/${id}`,
                type: 'GET',
                success: function (response) {
                    $("#voucherModalContent").html(response)
                },
                error: function (response) {

                }
            });
        }
        function changeLimit()
        {
            $.ajax({
                url: '<?php echo e(route("publisher.set-limit")); ?>',
                type: 'GET',
                data: {"limit": $("#limit").val(), "type": "coupon"},
                success: function (response) {
                    if(response) {
                        window.location.reload();
                    }
                },
                error: function (response) {

                }
            });
        }
        function fetch_data(page = 1)
        {
            $.ajax({
                url: '<?php echo e(route("publisher.creatives.coupons.list")); ?>',
                type: 'GET',
                data: {"search_by_name": "<?php echo e($advertiser->advertiser_id); ?>", page},
                beforeSend: function () {
                },
                success: function (response) {
                    $("#ap-overview").html(response.html);
                    $("#limit").change(function () {
                        changeLimit();
                    });
                },
                error: function (response) {

                }
            });
        }
        document.addEventListener("DOMContentLoaded", function () {
            $(document).on('click', '.atbd-pagination__item a', function(event){
                event.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });
            $("#coupons-tab").one( "click", function () {
                fetch_data();
            });
            $("#applyAdvertiser").submit(function () {
                $("#applyAdvertiserBttn").prop('disabled', true);
            });
        });
    </script>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>

    <div class="contents">

        <div class="container-fluid">
            <div class="profile-content mb-50">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title"></h4>

                        </div>

                    </div>
                    <div class="cos-lg-3 col-md-4  ">
                        <aside class="profile-sider">
                            <!-- Profile Acoount -->
                            <div class="card mb-25">
                                <div class="card-body text-center pt-sm-30 pb-sm-0  px-25 pb-0">

                                    <div class="account-profile">
                                    <div class="ap-img w-100 d-flex justify-content-center">
                                            <!-- Profile picture image-->
                                          <?php if(!empty($advertiser->fetch_logo_url) && $advertiser->is_fetchable_logo): ?>
    <img loading="lazy" class="ap-img__main w-auto h-40 mb-3 d-flex" 
         src="<?php echo e($advertiser->fetch_logo_url); ?>" alt="<?php echo e($advertiser->name); ?>">
<?php elseif(!empty($advertiser->logo)): ?>
    <img src="<?php echo e(\App\Helper\Static\Methods::staticAsset("$advertiser->logo")); ?>" 
         alt="<?php echo e($advertiser->name); ?>" class="mw-50px mw-lg-75px">
<?php else: ?>
    <img loading="lazy" class="ap-img__main w-auto h-40 mb-3 d-flex" 
         src="<?php echo e(\App\Helper\Static\Methods::isImageShowable($advertiser->logo)); ?>" 
         alt="<?php echo e($advertiser->name); ?>">
<?php endif; ?>

                                        </div>
                                        <div class="ap-nameAddress pb-3 pt-1">
                                            <h5 class="ap-nameAddress__title"><?php echo e($advertiser->name); ?></h5>
                                            <p class="ap-nameAddress__subTitle fs-14 m-0">ID: <?php echo e($advertiser->sid); ?></p>
                                            <p class="ap-nameAddress__subTitle fs-14 m-0">
                                                <?php
                                                    $regions = $advertiser->primary_regions ?? [];
                                                    if(count($regions) > 1) {
                                                        $regions = "Multi";
                                                    } elseif (count($regions) == 1 && $regions[0] == "00") {
                                                        $regions = "All";
                                                    } elseif (count($regions) == 1) {
                                                        $regions = $regions[0];
                                                    } else {
                                                        $regions = "-";
                                                    }
                                                ?>
                                                <span data-feather="map-pin"></span><?php echo e($regions); ?>

                                            </p>
                                        </div>
                                        <div class="ap-button button-group d-flex justify-content-center flex-wrap">
                                            <button type="button" class="border text-capitalize px-25 color-gray transparent shadow2 radius-md drawer-trigger" data-drawer="account">
                                                <span data-feather="mail"></span>message</button>

                                            <?php if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_PENDING): ?>

                                                <button type="button" class="btn btn-warning  btn-default btn-squared text-capitalize px-25 shadow2 radius-md" disabled>
                                                    <i class="las la-clock color-white"></i> Pending
                                                </button>

                                            <?php elseif(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE): ?>

                                                <button type="button" class="btn btn-success btn-default btn-squared text-capitalize px-25 shadow2 radius-md" disabled>
                                                    <i class="las la-check color-white"></i> Joined
                                                </button>

                                            <?php elseif(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_REJECTED): ?>

                                                <button type="button" class="btn btn-danger btn-default btn-squared text-capitalize px-25 shadow2 radius-md" disabled>
                                                    <i class="las la-times color-white"></i> Rejected
                                                </button>

                                            <?php elseif(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_HOLD): ?>

                                                <button type="button" class="btn btn-secondary btn-default btn-squared text-capitalize px-25 shadow2 radius-md" disabled>
                                                    <i class="las la-stop-circle color-white"></i> Hold
                                                </button>

                                            <?php else: ?>

                                                <button type="button" class="btn btn-default btn-squared btn-outline-success text-capitalize px-25 shadow2 follow radius-md" data-toggle="modal" data-target="#modal-basic">
                                                    <span class="las la-user-plus follow-icon"></span> Apply
                                                </button>

                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="card-footer mt-20 pt-20 pb-20 px-0">
                                        <div class="profile-overview d-flex justify-content-between flex-wrap">
                                            <div class="po-details">
                                                <h6 class="po-details__title pb-1"><?php echo e($advertiser->commission); ?><?php echo e($advertiser->commission_type == "percentage" ? "%" : $advertiser->commission_type); ?></h6>
                                                <span class="po-details__sTitle">Commission</span>
                                            </div>
                                            <div class="po-details">
                                                <h6 class="po-details__title pb-1"><?php echo e($regions); ?></h6>
                                                <span class="po-details__sTitle">Regions</span>
                                            </div>
                                            <div class="po-details">
                                                <h6 class="po-details__title pb-1"><?php echo e($advertiser->average_payment_time ?? "-"); ?> <span class="fs-12">days</span></h6>
                                                <span class="po-details__sTitle">APC</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Profile Acoount End -->

                            <?php if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE): ?>
                                <?php echo $__env->make("template.publisher.widgets.deeplink", compact('advertiser'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>

                            <!-- Profile User Bio -->
                            <div class="card mb-25">
                                <div class="user-bio border-bottom">
                                    <div class="card-header border-bottom-0 pt-sm-30 pb-sm-0  px-md-25 px-3">
                                        <div class="profile-header-title">
                                            About
                                        </div>
                                    </div>
                                    <div class="card-body pt-md-1 pt-0">
                                        <div class="user-bio__content">
                                            <?php if($advertiser->short_description): ?>
                                                <p class="m-0">
                                                    <?php echo \Illuminate\Support\Str::limit($advertiser->short_description, 2000); ?>

                                                </p>
                                                <p class="mt-3">
                                                    <small>
                                                        <?php if(strlen($advertiser->short_description) >= 80): ?>
                                                            Read More to Detail Introduction
                                                        <?php endif; ?>
                                                    </small>
                                                </p>
                                            <?php else: ?>
                                                <p class="m-0">
                                                    <?php echo \Illuminate\Support\Str::limit($advertiser->description, 80); ?>

                                                </p>
                                                <p class="mt-3">
                                                    <small>
                                                        <?php if(strlen($advertiser->description) >= 80): ?>
                                                            Read More to Detail Introduction
                                                        <?php endif; ?>
                                                    </small>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-info border-bottom">
                                    <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                                        <div class="profile-header-title">
                                            Contact info
                                        </div>
                                    </div>
                                    <div class="card-body pt-md-1 pt-0">
                                        <div class="user-content-info">
                                            <p class="user-content-info__item">
                                                <span data-feather="mail"></span><?php echo e($advertiser->user->email ?? "-"); ?>

                                            </p>
                                            <p class="user-content-info__item mb-0">
                                                <span data-feather="globe"></span>
                                                <?php echo $url; ?>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-skils border-bottom">
                                    <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                                        <div class="profile-header-title">
                                            Primary Regions
                                        </div>
                                    </div>
                                    <div class="card-body pt-md-1 pt-0">
                                        <ul class="user-skils-parent">
                                            <?php if($advertiser->primary_regions): ?>
                                                <?php $__currentLoopData = $advertiser->primary_regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="user-skils-parent__item">
                                                        <a href="#"><?php echo e($region['region'] ?? $region); ?></a>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="user-skils border-bottom">
                                    <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                                        <div class="profile-header-title">
                                            Supported Regions
                                        </div>
                                    </div>
                                    <div class="card-body pt-md-1 pt-0">
                                        <ul class="user-skils-parent">
                                            <?php if($advertiser->supported_regions): ?>
                                                <?php $__currentLoopData = $advertiser->supported_regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="user-skils-parent__item">
                                                        <a href="#"><?php echo e($region['region'] ?? $region); ?></a>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <li class="user-skils-parent__item">
                                                    -
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="user-skils border-bottom">
                                    <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                                        <div class="profile-header-title">
                                            Categories
                                        </div>
                                    </div>
                                    <div class="card-body pt-md-1 pt-0">
                                        <ul class="user-skils-parent">
                                            <?php if($advertiser->categories): ?>
                                                <?php $__currentLoopData = \App\Helper\PublisherData::getMixNames($advertiser->categories); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="user-skils-parent__item">
                                                        <a href="#"><?php echo e($category ?? "-"); ?></a>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <li class="user-skils-parent__item">
                                                    -
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>































                            </div>
                            <!-- Profile User Bio End -->


















































                        </aside>
                    </div>

                    <div class="col">
                        <!-- Tab Menu -->
                        <div class="ap-tab ap-tab-header">
                            <div class="ap-tab-header__img">
                                <img src="<?php echo e(\App\Helper\Static\Methods::staticAsset("img/placeholder-cover.png")); ?>" alt="ap-header" class="img-fluid w-100">
                            </div>
                            <div class="ap-tab-wrapper">
                                <ul class="nav px-25 ap-tab-main" id="ap-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="overview-tab" data-toggle="pill" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="commission-rates-tab" data-toggle="pill" href="#commission-rates" role="tab" aria-controls="commission-rates" aria-selected="false">Commission Rates</a>
                                    </li>
                                    <?php if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE): ?>
                                        <li class="nav-item">
                                            <a class="nav-link" id="links-tab" data-toggle="pill" href="#links" role="tab" aria-controls="links" aria-selected="false">Tracking links</a>
                                        </li>
                                    <?php endif; ?>
                                    <li class="nav-item">
                                        <a class="nav-link" id="terms-tab" data-toggle="pill" href="#terms" role="tab" aria-controls="terms" aria-selected="false">Terms</a>
                                    </li>
                                    <?php if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE): ?>
                                        <li class="nav-item">
                                            <a class="nav-link" id="coupons-tab" data-toggle="pill" href="#coupons" role="tab" aria-controls="coupons" aria-selected="false">Creative</a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <!-- Tab Menu End -->
                        <div class="tab-content mt-25" id="ap-tabContent">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                <div class="ap-content-wrapper">
                                    <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <div class="row">
                                        <div class="col-lg-4 mb-25">
                                            <!-- Card 1 -->
                                            <div class="ap-po-details radius-xl bg-white d-flex justify-content-between">
                                                <div>
                                                    <div class="overview-content">
                                                        <h2>Detailed Introduction</h2>
                                                        <div>
                                                            <?php if($advertiser->description): ?>
                                                                <?php echo $advertiser->description ?? "-"; ?>

                                                            <?php else: ?>
                                                                <?php echo $advertiser->short_description; ?>

                                                            <?php endif; ?>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <!-- Card 1 End -->
                                        </div>
                                        <div class="col-lg-4 mb-25">
                                            <!-- Card 2 End  -->
                                            <div class="ap-po-details radius-xl bg-white d-flex justify-content-between">
                                                <div>
                                                    <div class="overview-content">
                                                        <h2>Preferred Promotional Methods</h2>
                                                        <p>Promotional Traffic from these sources is allowed:</p>
                                                        <ul class="user-skils-parent">
                                                            <?php if($advertiser->promotional_methods): ?>
                                                                <?php $__currentLoopData = \App\Helper\PublisherData::getMixNames($advertiser->promotional_methods); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li class="badge badge-round badge-success badge-lg my-2 mr-2">
                                                                        <?php echo e($method); ?>

                                                                    </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?>
                                                                -
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Card 2 End  -->
                                        </div>
                                        <div class="col-lg-4 mb-25">
                                            <!-- Card 3 -->
                                            <div class="ap-po-details radius-xl bg-white d-flex justify-content-between">
                                                <div>
                                                    <div class="overview-content">
                                                        <h2>Restricted Methods</h2>
                                                        <p>Promotional Traffic from these sources are strictly not allowed:</p>
                                                        <ul class="user-skils-parent">
                                                            <?php if($advertiser->program_restrictions): ?>
                                                                <?php $__currentLoopData = \App\Helper\PublisherData::getMixNames($advertiser->program_restrictions); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li class="badge badge-round badge-danger badge-lg my-2 mr-2">
                                                                        <?php echo e($method); ?>

                                                                    </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?>
                                                                -
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Card 3 End -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="commission-rates" role="tabpanel" aria-labelledby="commission-rates-tab">
                                <div class="ap-post-content">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- Product Table -->
                                            <div class="card mt-25 mb-40">
                                                <div class="card-header text-capitalize px-md-25 px-3">
                                                    <h2>Commission Terms</h2>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="ap-product">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th>Date</th>
                                                                    <th>Condition</th>
                                                                    <th class="text-center">Commission Rate</th>
                                                                    <th>Additional info</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php if(count($advertiser->commissions)): ?>
                                                                        <?php $__currentLoopData = $advertiser->commissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <tr>
                                                                                <?php if(empty($commission->date)): ?>
                                                                                    <td><?php echo e(now()->format("Y-m-d")); ?></td>
                                                                                <?php else: ?>
                                                                                    <td><?php echo e($commission->date); ?></td>
                                                                                <?php endif; ?>
                                                                                <td><?php echo e($commission->condition ?? "-"); ?></td>
                                                                                <td class="text-center"><?php echo e($commission->rate ?? "-"); ?><?php echo e($commission->type == "amount" ? $advertiser->currency_code : "%"); ?></td>
                                                                                <td><?php echo e($commission->info ?? "-"); ?></td>
                                                                            </tr>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php else: ?>
                                                                        <tr class="border-0">
                                                                            <td class="text-center" colspan="4">
                                                                                <small>No Commission Rates Exist</small>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endif; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Table End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE): ?>
                                <div class="tab-pane fade" id="links" role="tabpanel" aria-labelledby="links-tab">
                                    <div class="ap-post-content">
                                        <div class="row">
                                            <div class="col-xxl-12">
                                                <div class="card global-shadow mb-25">
                                                    <div class="friends-widget">
                                                        <div class="card-header px-md-25 px-3">
                                                            <h2>Tracking Link</h2>
                                                        </div>
                                                        <div class="card-body ">
                                                           
                                                            <?php if(isset($advertiser->advertiser_applies->is_tracking_generate) && isset($advertiser->advertiser_applies->tracking_url) && $advertiser->advertiser_applies->is_tracking_generate == 1): ?>
                                                                <a href="<?php echo e($advertiser->advertiser_applies->tracking_url_long ?? $advertiser->advertiser_applies->tracking_url); ?>" target="_blank" id="trackingURL"><?php echo e($advertiser->advertiser_applies->tracking_url_long ?? $advertiser->advertiser_applies->tracking_url); ?></a>
                                                                <br /><br />
                                                                <a href="javascript:void(0)" onclick="clickToCopy('trackingURL', 'Tracking URL Successfully Copied.')" class="btn btn-xs btn-outline-dashed">Copy Tracking Link</a>
                                                            <?php elseif(isset($advertiser->advertiser_applies->is_tracking_generate) && $advertiser->advertiser_applies->is_tracking_generate == 2): ?>
                                                                <a href="javascript:void(0)"><i>Generating tracking links.....</i></a>
                                                                <br /><br />
                                                                <a href="javascript:void(0)" class="btn btn-xs btn-outline-dashed">Copy Tracking Link</a>
                                                            <?php else: ?>
                                                                -
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card global-shadow mb-25">
                                                    <div class="friends-widget">
                                                        <div class="card-header px-md-25 px-3">
                                                            <h2>Short Tracking Link</h2>
                                                        </div>
                                                        <div class="card-body ">
                                                            <?php if(isset($advertiser->advertiser_applies->is_tracking_generate) && isset($advertiser->advertiser_applies->tracking_url_short) && $advertiser->advertiser_applies->is_tracking_generate == 1): ?>
                                                                <a href="<?php echo e($advertiser->advertiser_applies->tracking_url_short); ?>" id="trackingShortURL" target="_blank"><?php echo e($advertiser->advertiser_applies->tracking_url_short); ?></a>
                                                                <br /><br />
                                                                <a href="javascript:void(0)" onclick="clickToCopy('trackingShortURL', 'Tracking Short URL Successfully Copied.')" class="btn btn-xs btn-outline-dashed">Copy Short Tracking Link</a>
                                                            <?php elseif(isset($advertiser->advertiser_applies->is_tracking_generate) && $advertiser->advertiser_applies->is_tracking_generate == 2): ?>
                                                                <a href="javascript:void(0)"><i>Generating short tracking links.....</i></a>
                                                                <br /><br />
                                                                <a href="javascript:void(0)" class="btn btn-xs btn-outline-dashed">Copy Short Tracking Link</a>
                                                            <?php else: ?>
                                                                -
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="tab-pane fade" id="terms" role="tabpanel" aria-labelledby="terms-tab">
                                <div class="ap-post-content">
                                    <div class="row">
                                        <div class="col-xxl-8">
                                            <!-- Friend post -->
                                            <div class="card global-shadow mb-25">
                                                <div class="friends-widget">
                                                    <div class="card-header px-md-25 px-3">
                                                        <h2>Program Terms</h2>
                                                    </div>
                                                    <div class="card-body ">
                                                        <?php echo $advertiser->program_policies ?? "-"; ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Friend Post End -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE): ?>
                                <div class="tab-pane fade" id="coupons" role="tabpanel" aria-labelledby="coupons-tab">
                                    <div class="ap-post-content">
                                        <div class="orderDatatable global-shadow border py-30 px-sm-30 px-20 bg-white radius-xl w-100 mb-30" id="ap-overview"></div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-basic modal fade" id="modal-basic" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <form action="<?php echo e(route("publisher.apply-advertiser")); ?>" method="POST" id="applyAdvertiser">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="a_id" name="a_id" value="<?php echo e($advertiser->sid); ?>">
                    <input type="hidden" id="a_name" name="a_name" value="<?php echo e($advertiser->name); ?>">
                    <div class="modal-content modal-bg-white ">
                        <div class="modal-header">
                            <h6 class="modal-title">Apply To Program</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span data-feather="x"></span></button>
                        </div>
                        <div class="modal-body">
                            <h6 class="ap-nameAddress__title text-black" id="advertiserName"><?php echo e($advertiser->name); ?></h6>
                            <h6 class="ap-nameAddress__subTitle text-left justify-content-start fs-14 pt-1 m-0" id="advertiserID">Brand ID: <?php echo e($advertiser->sid); ?></h6>
                            <p class="font-weight-bold mt-3 text-black">Optional: Tell us about your promotional methods and general marketing plan for this merchant to help speed up approval. (Websites you'll use, PPC terms, etc.)</p>
                            <textarea class="form-control" rows="4" cols="4" name="message"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="applyAdvertiserBttn" class="btn btn-primary btn-sm">Apply</button>
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- .atbd-drawer -->
        <div class="drawer-basic-wrap right account">
            <div class="atbd-drawer drawer-account d-none">
                <div class="atbd-drawer__header d-flex aling-items-center justify-content-between">
                    <h6 class="drawer-title">Send Message To The Advertiser</h6>
                    <a href="#" class="btdrawer-close"><i class="la la-times"></i></a>
                </div><!-- ends: .atbd-drawer__header -->
                <div class="atbd-drawer__body">
                    <div class="drawer-content">
                        <div class="drawer-account-form form-basic">
                            <form action="<?php echo e(route("publisher.send-msg-to-advertiser")); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="advertiser_id" id="advertiser_id" value="<?php echo e($advertiser->id); ?>">

                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <label for="publisher_name">From</label>
                                        <input type="text" name="publisher_name" id="publisher_name" class="form-control form-control-sm" placeholder="Publisher Name" value="<?php echo e(auth()->user()->first_name); ?> <?php echo e(auth()->user()->last_name); ?>" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="advertiser_name">To</label>
                                        <input type="text" name="advertiser_name" id="advertiser_name" class="form-control form-control-sm" placeholder="Advertiser Name" readonly value="<?php echo e($advertiser->name); ?>">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="subject">Subject</label>
                                        <input type="text" name="subject" id="subject" class="form-control form-control-sm" placeholder="Please Enter Subject For This Message" >
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="question_or_comment">Your Question or Comments</label>
                                        <textarea name="question_or_comment" id="question_or_comment" class="form-control form-control-sm" placeholder="Please Enter Your Question or Comments"></textarea>
                                    </div>
                                    <button class="btn btn-primary btn-default btn-squared ">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- ends: .atbd-drawer__body -->
            </div>
        </div>
        <div class="overlay-dark"></div>
        <div class="overlay-dark-l2"></div>
        <!-- ends: .atbd-drawer -->

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.publisher.panel_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/publisher/advertisers/detail.blade.php ENDPATH**/ ?>