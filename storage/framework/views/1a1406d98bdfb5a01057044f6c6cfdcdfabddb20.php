<?php
    $websites = \App\Models\Website::withAndWhereHas('users', function($user) {
        return $user->where("id", auth()->user()->id);
    })->where("status", \App\Models\Website::ACTIVE)->count();
?>

<?php if($websites): ?>
    <!-- Profile files Bio -->
    <form action="javascript:void(0)" id="advertiserDeeplinkForm">
        <div class="card" id="deeplinkWrapper">
            <div class="card-body" id="mainDeeplinkBody">
                <div class="files-area d-flex justify-content-between align-items-center">
                    <div class="files-area__left d-flex align-items-center">
                        <div class="files-area__title">
                            <?php if(isset($title)): ?>
                                <h3 class="mb-10 fw-500 color-dark text-capitalize"><?php echo e($title); ?></h3>
                            <?php else: ?>
                                <p class="mb-0 fs-14 fw-500 color-dark text-capitalize">Create A Link</p>
                            <?php endif; ?>
                            <?php if(isset($description)): ?>
                                <span class="color-light fs-14 d-flex mb-10"><?php echo e($description); ?></span>
                            <?php else: ?>
                                <span class="color-light fs-12 d-flex ">Promote any brand with a simple link.</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="form-group">
                            <select class="form-control" id="widgetAdvertiser" name="widgetAdvertiser" required>
                                <option value="" selected disabled>Please Select</option>
                                <?php $__currentLoopData = \App\Helper\PublisherData::getAdvertiserList(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertiserList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($advertiserList['sid']); ?>" <?php if(isset($advertiser->sid) && $advertiser->sid === $advertiserList['sid']): ?> selected <?php endif; ?> data-dd="<?php echo e($advertiserList['deeplink_enabled']); ?>"><?php echo e($advertiserList['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div id="deepLinkContent">
                                <?php if(isset($advertiser->deeplink_enabled)): ?>
                                    <?php if($advertiser->deeplink_enabled): ?>
                                        <div class="pt-1" style="color: green;">
                                            <i class="fas fa-check-circle"></i>
                                            <span class="icon-text ml-1">Deep Link</span>
                                        </div>
                                    <?php else: ?>
                                        <div class="pt-1" style="color: red;">
                                            <i class="fas fa-times-circle"></i>
                                            <span class="icon-text ml-1">Deep Link</span>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="landing_url" name="landing_url" placeholder="Enter a Landing Page Optional" <?php if(isset($advertiser->deeplink_enabled) && !$advertiser->deeplink_enabled): ?> style="display: none;" <?php endif; ?>>
                        </div>
                        <div class="form-group display-hidden" id="subIDContent">
                            <input type="text" class="form-control" id="sub_id" name="sub_id" placeholder="Enter a Sud ID Optional">
                        </div>
                        <div class="form-inline-action d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-sm text-white btn-primary btn-default btn-squared text-capitalize m-1">Create</button>
                            <a href="javascript:void(0)" id="advancedOpt"><span class="atbd-tag tag-primary tag-transparented">Advanced</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="loader-overlay display-hidden" id="showLoader">
                <div class="atbd-spin-dots spin-lg">
                    <span class="spin-dot badge-dot dot-primary"></span>
                    <span class="spin-dot badge-dot dot-primary"></span>
                    <span class="spin-dot badge-dot dot-primary"></span>
                    <span class="spin-dot badge-dot dot-primary"></span>
                </div>
            </div>
        </div>
    </form>
    <!-- Profile files End -->

    <?php $__env->startPush("extended_styles"); ?>
        <link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/css/select2.min.css")); ?>"/>
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush("extended_scripts"); ?>

        <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/select2.full.min.js")); ?>"></script>
        <script>

            function copyLink(msg) {
                copyToClipboard(document.getElementById(`widgetTrackingURL`))
                normalMsg({"message": `${msg} Successfully Copied.`, "success": true});
            }

            function setDeeplinkContent(response)
            {
                $("#mainDeeplinkBody").addClass("border-bottom mb-20");

                let content = '';

                if(response.deeplink_link_url)
                {
                    content = `
                    <div class="form-group">
                        <input type="text" class="form-control" id="widgetTrackingURL" name="widgetTrackingURL" value="${response.deeplink_link_url}" readonly>
                    </div>
                    `;
                    if(response.deeplink_link_url != 'Generating tracking links.....')
                        content = `${content}<button type="button" onclick="copyLink('Deeplink')" class="btn btn-sm text-white btn-primary btn-default btn-squared text-capitalize m-1">Copy Deep Link</button>`;

                }
                else
                {
                    content = `
                    <div class="form-group">
                        <input type="text" class="form-control" id="widgetTrackingURL" name="widgetTrackingURL" value="${response.tracking_url}" readonly>
                    </div>`;

                    if(response.tracking_url != 'Generating tracking links.....')
                        content = `${content}<button type="button" onclick="copyLink('Tracking URL')" class="btn btn-sm text-white btn-primary btn-default btn-squared text-capitalize m-1">Copy Tracking Link</button>`;
                }

                $("#deeplinkWrapper").append(`
                            <div class="card-body" id="deeplinkBottomWrapper">
                                <div class="files-area d-flex justify-content-between align-items-center">
                                    <div class="files-area__left d-flex align-items-center">
                                        <div class="files-area__title">
                                            <span class="color-light fs-12 d-flex ">Use this link to promote ${response.name} updates may take up to 5 min to propagate.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        ${content}
                                    </div>
                                </div>
                            </div>
                        `)
                $("#deeplinkContent").html("");

                $("#mainDeeplinkBody").removeClass('disableDiv');
                $("#showLoader").hide();
            }

            function loaderHTML()
            {
                return `
                <div class="spin-container text-center mt-5 mb-3">
                    <div class="atbd-spin-dots spin-md">
                        <span class="spin-dot badge-dot dot-primary"></span>
                        <span class="spin-dot badge-dot dot-primary"></span>
                        <span class="spin-dot badge-dot dot-primary"></span>
                        <span class="spin-dot badge-dot dot-primary"></span>
                    </div>
                </div>
            `
            }

            document.addEventListener("DOMContentLoaded", function () {

                $("#deeplinkContent").html(loaderHTML());

                $("#advancedOpt").click(function () {
                    if($('#subIDContent:visible').length)
                    {
                        $(this).html("<span class='atbd-tag tag-primary tag-transparented'>Advanced</span>");
                        $('#subIDContent').hide();
                    }
                    else
                    {
                        $(this).html("<span class='atbd-tag tag-primary tag-transparented'>Close</span>");
                        $('#subIDContent').show();
                    }
                });

                $("#widgetAdvertiser").select2({
                    placeholder: "Please Select",
                    dropdownCssClass: "tag",
                    allowClear: false
                });

                $('#widgetAdvertiser').on('select2:select', function (e) {
                    let data = e.params.data;
                    if(data.element.dataset.dd == 1)
                    {
                        $("#deepLinkContent").html(`
                            <div class="pt-1" style="color: green;">
                                <i class="fas fa-check-circle"></i>
                                <span class="icon-text ml-1">Deep Link</span>
                            </div>
                        `);
                        $("#landing_url").show();
                    } else {
                        $("#deepLinkContent").html(`
                            <div class="pt-1" style="color: red;">
                                <i class="fas fa-times-circle"></i>
                                <span class="icon-text ml-1">Deep Link</span>
                            </div>
                        `);
                        $("#landing_url").hide();
                    }
                });

                $("#advertiserDeeplinkForm").submit(function () {

                    $("#deeplinkBottomWrapper").remove()
                    $("#mainDeeplinkBody").removeClass("border-bottom mb-20")
                    $("#deeplinkContent").html(loaderHTML());

                    $("#mainDeeplinkBody").addClass('disableDiv');
                    $("#showLoader").show();

                    let url = "";

                    if($("#landing_url").val())
                    {
                        url = '<?php echo e(route("publisher.deeplink.check-availability")); ?>';
                    }
                    else
                    {
                        url = '<?php echo e(route("publisher.tracking.check-availability")); ?>';
                    }

                    $.ajax({
                        url: url,
                        type: 'POST',
                        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                        data: $(this).serialize(),
                        success: function (response) {
                            setTimeout(() => {
                                if(response.success)
                                {
                                    setDeeplinkContent(response);
                                } else
                                {
                                    $("#deeplinkContent").html("");
                                    normalMsg({"message": response.message, "success": response.success});
                                }
                            }, 1000);
                        },
                        error: function (response) {
                            showErrors(response)
                            $("#deeplinkContent").html("");
                        }
                    }).done(function () {
                        $("#mainDeeplinkBody").removeClass('disableDiv');
                        $("#showLoader").hide();
                    });


                });

            });
        </script>

    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH C:\Users\lenovo\Downloads\revdb\resources\views/template/publisher/widgets/deeplink.blade.php ENDPATH**/ ?>