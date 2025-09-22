<?php if (! $__env->hasRenderedOnce('e810e220-a17c-40d5-9ee5-42292d2b72f9')): $__env->markAsRenderedOnce('e810e220-a17c-40d5-9ee5-42292d2b72f9');
$__env->startPush('styles'); ?>
    <style>
        .disabled {
            pointer-events: none;
            cursor: pointer;
            opacity: 0.7;
        }
        a.dropdown-item.active {
            color: #FFFFFF;
        }
    </style>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('36c74c81-f762-4f70-8f5a-1f40f0a98458')): $__env->markAsRenderedOnce('36c74c81-f762-4f70-8f5a-1f40f0a98458');
$__env->startPush('scripts'); ?>
    <script>
        function assignedFunc(event, id, url, rowID)
        {
            $(`#assign${rowID} .unassign`).removeClass('active');

            let status = "<?php echo e(\App\Helper\Static\Vars::ADVERTISER_AVAILABLE); ?>";
            if($(event).hasClass('active')) {
                $(event).removeClass("active");
                status = "<?php echo e(\App\Helper\Static\Vars::ADVERTISER_NOT_AVAILABLE); ?>";
            }
            else {
                $(event).addClass("active");
            }
            updateAdvertiser(id, url, status, rowID);
        }

        function unassignedFunc(event, url, rowID)
        {
            $(`#assign${rowID} .dropdown-item`).removeClass('active');
            $(event).addClass("active");
            updateAdvertiser(null, url, null, rowID);
        }

        function updateAdvertiser(id, url, status, rowID)
        {
            $.ajax({
                url: '<?php echo e(route("admin.advertiser-management.api-advertisers.duplicate_record.store")); ?>',
                type: 'POST',
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                data: {id, url, status},
                success: function (response) {
                    $(`#assignedTo${rowID}`).text(response.data.source);
                },
                error: function (response) {

                }
            });
        }

        document.addEventListener("DOMContentLoaded", function () {
            $("#assignedFilter").change((event) => {

                // Get the current URL
                let currentURL = new URL(window.location.href);

                // Add a new query parameter
                currentURL.searchParams.set('filter', event.target.value);

                // Replace the current URL with the updated URL
                window.history.replaceState({}, '', currentURL.href);

                window.location.reload();

            });
        });
    </script>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>

    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title mt-3"><?php echo e(trans('advertiser.api-advertiser.duplicate_record.title_singular')); ?></h4>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="breadcrumb-main">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">

                                    </div>
                                    <div class="col-lg-4">
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="js-example-basic-single js-states form-control" id="assignedFilter">
                                            <option value="" disabled selected>Assigned</option>
                                            <option <?php if(request()->filter == "Yes"): ?> selected <?php endif; ?>>Yes</option>
                                            <option <?php if(request()->filter == "No"): ?> selected <?php endif; ?>>No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">


                                <table class="table table table-condensed table-bordered table-striped table-hover datatable">
                                    <thead>
                                        <tr class="userDatatable-header footable-header">
                                            <th style="width: 25%;">
                                                Advertiser URL
                                            </th>
                                            <th style="width: 40%;">
                                                Networks
                                            </th>
                                            <th style="width: 15%;">
                                                Assigned To
                                            </th>
                                            <th style="width: 20%;">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $advertisers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $advertiser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $assignNames = [];
                                            ?>
                                            <tr>
                                                <td><?php echo e($advertiser['url'] ?? '-'); ?></td>
                                                <td>
                                                    <?php $__currentLoopData = $advertiser['network_names']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $network): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($network['status']): ?>
                                                            <?php
                                                                $assignNames[] = $network['name'];
                                                            ?>
                                                        <?php endif; ?>
                                                        <a href="<?php echo e(route("admin.advertiser-management.api-advertisers.show", ['api_advertiser' => $network['id']])); ?>"><?php echo e($network['name']); ?></a> - <?php if($network['commission']): ?> <?php echo e($network['commission']); ?><?php echo e($network['type']); ?> <?php else: ?> N/A <?php endif; ?><br>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </td>
                                                <td id="assignedTo<?php echo e($key); ?>">
                                                    <?php if(count($assignNames)): ?>
                                                        <?php echo e(implode(', ', $assignNames)); ?>

                                                    <?php else: ?>
                                                        Not Assigned
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-primary btn-default btn-squared dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Assign
                                                            <i class="la la-angle-down"></i>
                                                        </button>
                                                        <div class="dropdown-menu" id="assign<?php echo e($key); ?>" aria-labelledby="dropdownMenuButton">
                                                            <?php $__currentLoopData = $advertiser['network_names']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $network): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <a onclick="assignedFunc(this, `<?php echo e($network['id']); ?>`, `<?php echo e($advertiser['url']); ?>`, `<?php echo e($key); ?>`)" class="dropdown-item <?php echo e(in_array($network['name'], $assignNames) ? "active" : null); ?>" href="javascript:void(0);"><?php echo e($network['name']); ?></a>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <a onclick="unassignedFunc(this, `<?php echo e($advertiser['url']); ?>`, `<?php echo e($key); ?>`)" class="dropdown-item unassign <?php echo e(count($assignNames) ? null : "active"); ?>" href="javascript:void(0);">Do not Show</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin.panel_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/advertisers/duplicate/advertiser.blade.php ENDPATH**/ ?>