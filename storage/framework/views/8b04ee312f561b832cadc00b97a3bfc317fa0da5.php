<?php if (! $__env->hasRenderedOnce('33386b24-9aeb-43c4-8ef3-450bb802bf72')): $__env->markAsRenderedOnce('33386b24-9aeb-43c4-8ef3-450bb802bf72');
$__env->startPush('styles'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('3c3fe11e-85fe-47dc-9f24-b65b4b32603a')): $__env->markAsRenderedOnce('3c3fe11e-85fe-47dc-9f24-b65b4b32603a');
$__env->startPush('scripts'); ?>
<script type="text/javascript">
    function showOnPublisher(id) {
        $.ajax({
            url: `/<?php echo e(\App\Helper\Static\Vars::ADMIN_ROUTE); ?>/advertiser-management/api-advertisers/status/${id}`,
            type: 'GET',
        });
    }
    $(function () {

        $('#datatableApiAdvertiser').dataTable({
            order: [[1, 'asc']],
            scrollY: true,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            autoWidth: true,
            deferRender: true,
            sScrollXInner: "99.5%",
            ajax: {
                url: "<?php echo e(route('admin.advertiser-management.api-advertisers.index')); ?>",
                data: function (d) {
                    d.manual_update = $('#manualUpdate').val();
                    d.source = $('#source').val();
                    d.country = $('#country').val();
                }
            },
            columns: [
                { data: 'advertiser_id', name: 'advertiser_id' },
                { data: 'name', name: 'name' },
                { data: 'url', name: 'url' },
                { data: 'source', name: 'source' },
                { data: 'click_through_url', name: 'click_through_url' },
                { data: 'manual_update', name: 'manual_update', orderable: false, searchable: false },
                { data: 'action', name: 'action', orderable: false, searchable: false, width: "0%" },
            ],
            columnDefs: [{
                orderable: false,
                className: '',
                targets: 0
            }, {
            }],
            buttons: [{}]
        });

        $('#manualUpdate').change(() => {
            $('#datatableApiAdvertiser').DataTable().draw();
        });

        $('#source').change(() => {
            $('#datatableApiAdvertiser').DataTable().draw();
        });

        $('#country').change(() => {
            $('#datatableApiAdvertiser').DataTable().draw();
        });

    });
</script>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>

    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <h1 class="title"><?php echo e(trans('advertiser.api-advertiser.title')); ?> <?php echo e(trans('global.list')); ?></h1>
                    <!-- Horizontal Filters -->
                    <div class="horizontal-filters">
                        <div class="filter-header">
                            <h5 class="mb-0"><i class="ri-filter-3-line"></i> Filters</h5>
                        </div>

                        <div class="filter-grid">

                            <!-- Country Filter -->
                            <div class="filter-card">
                                <div class="filter-title">
                                    <h6>Manual Update</h6>
                                </div>
                                <select class="js-example-basic-single js-states form-control" id="manualUpdate"
                                    name="manualUpdate">
                                    <option value="" disabled selected>Select Manual Update</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <!-- Advertiser Type Filter -->
                            <div class="filter-card">
                                <div class="filter-title">
                                    <h6>Source</h6>
                                </div>
                                <select class="js-example-basic-single js-states form-control" id="source" name="source">
                                    <option value="" disabled selected>Select Source</option>
                                    <?php $__currentLoopData = \App\Helper\Static\Vars::OPTION_LIST; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($list); ?>"><?php echo e(ucwords($list)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <!-- Category Filter -->
                            <div class="filter-card">
                                <div class="filter-title">
                                    <h6>Country</h6>
                                </div>
                                <select class="js-example-basic-single js-states form-control" id="country" name="country">
                                    <option value="" disabled selected>Select Country</option>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country['iso2']); ?>"><?php echo e($country['name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="table-container">
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover datatable" id="datatableApiAdvertiser">
                            <thead>
                                <tr class="userDatatable-header footable-header">
                                    <th>
                                        <?php echo e(trans('advertiser.api-advertiser.fields.short_advertiser_id')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('advertiser.api-advertiser.fields.name')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('advertiser.api-advertiser.fields.url')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('advertiser.api-advertiser.fields.source')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('advertiser.api-advertiser.fields.is_available_tracking_url')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('advertiser.api-advertiser.fields.manual_update')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('global.action')); ?>

                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.admin.panel_table", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/advertisers/api/index.blade.php ENDPATH**/ ?>