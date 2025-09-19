<?php
    $websites = \App\Models\Website::withAndWhereHas('users', function($user) {
        return $user->where("id", auth()->user()->id);
    })->where("status", \App\Models\Website::ACTIVE)->count();
?>

<?php if($websites): ?>
    <!-- Profile files Bio -->
    <form action="javascript:void(0)" id="advertiserDeeplinkForm">
        <div class="deeplink-glass-card card" id="deeplinkWrapper">
            <div class="card-body" id="mainDeeplinkBody">
                <div class="form-header">
                    <div class="form-title">
                        <?php if(isset($title)): ?>
                            <h3><?php echo e($title); ?></h3>
                        <?php else: ?>
                            <h3>Create A Link</h3>
                        <?php endif; ?>
                        <?php if(isset($description)): ?>
                            <span><?php echo e($description); ?></span>
                        <?php else: ?>
                            <span>Promote any brand with a simple link.</span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <select class="form-control-glass form-control" id="widgetAdvertiser" name="widgetAdvertiser" required>
                                <option value="" selected disabled>Select Advertiser</option>
                                <?php $__currentLoopData = \App\Helper\PublisherData::getAdvertiserList(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertiserList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($advertiserList['sid']); ?>"
                                            <?php if(isset($advertiser->sid) && $advertiser->sid === $advertiserList['sid']): ?> selected <?php endif; ?>
                                            data-dd="<?php echo e($advertiserList['deeplink_enabled']); ?>">
                                        <?php echo e($advertiserList['name']); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div id="deeplinkContent">
                                <?php if(isset($advertiser->deeplink_enabled)): ?>
                                    <?php if($advertiser->deeplink_enabled): ?>
                                        <div class="deeplink-status status-enabled">
                                            <i class="ri-checkbox-circle-fill"></i>
                                            <span>Deep Link Enabled</span>
                                        </div>
                                    <?php else: ?>
                                        <div class="deeplink-status status-disabled">
                                            <i class="ri-close-circle-fill"></i>
                                            <span>Deep Link Not Available</span>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control-glass form-control" id="landing_url" name="landing_url"
                                   placeholder="Enter Landing Page URL (Optional)"
                                   <?php if(isset($advertiser->deeplink_enabled) && !$advertiser->deeplink_enabled): ?> style="display: none;" <?php endif; ?>>
                        </div>

                        <div class="form-group display-hidden" id="subIDContent">
                            <input type="text" class="form-control-glass form-control" id="sub_id" name="sub_id"
                                   placeholder="Enter Sub ID (Optional)">
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary-glass">
                                <i class="ri-links-line"></i> Create Link
                            </button>
                            <a href="javascript:void(0)" id="advancedOpt" class="advanced-link">
                                <i class="ri-settings-3-line"></i> Advanced Options
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="loader-overlay display-hidden" id="showLoader">
                <div class="spin-dots">
                    <span class="dot-primary"></span>
                    <span class="dot-primary"></span>
                    <span class="dot-primary"></span>
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
/* ---------- Helper Functions ---------- */

// Copy link
function copyLink(msg) {
    copyToClipboard(document.getElementById('widgetTrackingURL'));
    normalMsg({
        "message": `${msg} Successfully Copied.`,
        "success": true
    });
}

// Loader template
function loaderHTML() {
    return `
        <div class="text-center py-4">
            <div class="spin-dots">
                <span class="dot-primary"></span>
                <span class="dot-primary"></span>
                <span class="dot-primary"></span>
            </div>
            <p class="mt-2 text-muted">Generating your link...</p>
        </div>
    `;
}

// Inject response
function setDeeplinkContent(response) {
    $("#mainDeeplinkBody").addClass("border-bottom mb-20");

    let content = '';
    let buttonText = '';
    let buttonClass = 'btn-primary-glass';

    if (response.deeplink_link_url) {
        content = `
            <div class="form-group">
                <input type="text" class="form-control-glass form-control"
                       id="widgetTrackingURL" value="${response.deeplink_link_url}" readonly>
            </div>`;

        if (response.deeplink_link_url !== 'Generating tracking links.....') {
            buttonText = 'Copy Deep Link';
            content += `
                <button type="button" onclick="copyLink('Deeplink')"
                        class="btn ${buttonClass} mt-2">
                    <i class="ri-file-copy-line"></i> ${buttonText}
                </button>`;
        }
    } else {
        content = `
            <div class="form-group">
                <input type="text" class="form-control-glass form-control"
                       id="widgetTrackingURL" value="${response.tracking_url}" readonly>
            </div>`;

        if (response.tracking_url !== 'Generating tracking links.....') {
            buttonText = 'Copy Tracking Link';
            content += `
                <button type="button" onclick="copyLink('Tracking URL')"
                        class="btn ${buttonClass} mt-2">
                    <i class="ri-file-copy-line"></i> ${buttonText}
                </button>`;
        }
    }

    $("#deeplinkWrapper").append(`
        <div class="card-body" id="deeplinkBottomWrapper">
            <div class="result-header">
                <div class="result-title">
                    <i class="ri-links-fill"></i>
                    <span>Generated Link</span>
                </div>
                <p class="result-description">
                    Use this link to promote ${response.name}. Updates may take up to 5 min to propagate.
                </p>
            </div>
            <div class="row mt-3">
                <div class="col-12">${content}</div>
            </div>
        </div>
    `);

    $("#deeplinkContent").html(""); // clear status
    $("#mainDeeplinkBody").removeClass('disableDiv');
    $("#showLoader").hide();
}

/* ---------- Main Script ---------- */
document.addEventListener("DOMContentLoaded", function () {

    // Advanced options toggle
    $("#advancedOpt").click(function () {
        const subIDContent = $("#subIDContent");
        if (subIDContent.is(":visible")) {
            $(this).html('<i class="ri-settings-3-line"></i> Advanced Options');
            subIDContent.hide();
        } else {
            $(this).html('<i class="ri-close-line"></i> Close Options');
            subIDContent.show();
        }
    });

    // Select2 init
    if (!$("#widgetAdvertiser").hasClass("select2-hidden-accessible")) {
        $("#widgetAdvertiser").select2({
            placeholder: "Select Advertiser",
            dropdownCssClass: "select2-glass-dropdown",
            allowClear: false,
            width: '100%',
            theme: "bootstrap-5"
        });
    }

    // Advertiser change -> handle deeplink status + show/hide landing_url
    $('#widgetAdvertiser').on('select2:select', function (e) {
        let data = e.params.data;
        const deeplinkContent = $("#deeplinkContent");
        const landingUrl = $("#landing_url");

        if (data.element.dataset.dd == 1) {
            deeplinkContent.html(`
                <div class="deeplink-status status-enabled">
                    <i class="ri-checkbox-circle-fill"></i>
                    <span>Deep Link Enabled</span>
                </div>
            `);
            landingUrl.fadeIn();
        } else {
            deeplinkContent.html(`
                <div class="deeplink-status status-disabled">
                    <i class="ri-close-circle-fill"></i>
                    <span>Deep Link Not Available</span>
                </div>
            `);
            landingUrl.fadeOut();
        }
    });

    // Form submit
    $("#advertiserDeeplinkForm").submit(function (e) {
        e.preventDefault();

        $("#deeplinkBottomWrapper").remove();
        $("#mainDeeplinkBody").removeClass("border-bottom mb-20");

        $("#deeplinkContent").html(loaderHTML());
        $("#mainDeeplinkBody").addClass('disableDiv');
        $("#showLoader").show();

        let url = $("#landing_url").val()
            ? '<?php echo e(route("publisher.deeplink.check-availability")); ?>'
            : '<?php echo e(route("publisher.tracking.check-availability")); ?>';

        $.ajax({
            url: url,
            type: 'POST',
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            data: $(this).serialize(),
            success: function (response) {
                setTimeout(() => {
                    if (response.success) {
                        setDeeplinkContent(response);
                    } else {
                        $("#deeplinkContent").html("");
                        normalMsg({
                            "message": response.message,
                            "success": response.success
                        });
                    }
                }, 1000);
            },
            error: function (response) {
                showErrors(response);
                $("#deeplinkContent").html("");
            },
            complete: function () {
                $("#mainDeeplinkBody").removeClass('disableDiv');
                $("#showLoader").hide();
            }
        });
    });

    // Extra Select2 styles
    const style = document.createElement('style');
    style.textContent = `
        .select2-glass-dropdown .select2-results__option--highlighted {
            background-color: rgba(123, 54, 181, 0.1) !important;
            color: var(--primary-dark-color) !important;
        }
        .select2-glass-dropdown .select2-results__option--selected {
            background-color: var(--primary-color) !important;
            color: white !important;
        }
        .select2-container--bootstrap-5 .select2-selection {
            border: 1px solid rgba(123, 54, 181, 0.2) !important;
            border-radius: 10px !important;
            padding: 12px 16px !important;
            background: rgba(255, 255, 255, 0.8) !important;
        }
        .select2-container--bootstrap-5 .select2-selection:focus {
            border-color: var(--primary-color) !important;
            box-shadow: 0 0 0 3px rgba(123, 54, 181, 0.1) !important;
        }
        .result-header { margin-bottom: 20px; }
        .result-title {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--primary-dark-color);
            font-weight: 600;
            margin-bottom: 8px;
        }
        .result-description {
            color: #6c757d;
            font-size: 0.9rem;
            margin: 0;
        }
    `;
    document.head.appendChild(style);
});
</script>



<?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/publisher/widgets/deeplink.blade.php ENDPATH**/ ?>