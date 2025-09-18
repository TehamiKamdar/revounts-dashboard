<?php if (! $__env->hasRenderedOnce('8b7d64c3-8561-444d-9157-a2c982514021')): $__env->markAsRenderedOnce('8b7d64c3-8561-444d-9157-a2c982514021');
$__env->startPush('styles'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('f38d965f-d3e1-4586-adc5-1aa36cdaff39')): $__env->markAsRenderedOnce('f38d965f-d3e1-4586-adc5-1aa36cdaff39');
$__env->startPush('scripts'); ?>
    <script type="text/javascript">
        function showOnPublisher(id)
        {
            $.ajax({
                url: `/<?php echo e(\App\Helper\Static\Vars::ADMIN_ROUTE); ?>/advertiser-management/api-advertisers/status/${id}`,
                type: 'GET',
            });
        }
        $(function () {

            $('#datatableApiAdvertiser').dataTable({
                order:          [[1, 'asc']],
                scrollY:        true,
                scrollX:        true,
                scrollCollapse: true,
                paging:         true,
                autoWidth:      true,
                deferRender:    true,
                sScrollXInner:  "99.5%",
                ajax: {
                    url: "<?php echo e(route('admin.advertiser-management.api-advertisers.index')); ?>",
                    data: function (d) {
                        d.manual_update = $('#manualUpdate').val();
                        d.source = $('#source').val();
                        d.country = $('#country').val();
                    }
                },
                columns: [
                    {data: 'advertiser_id', name: 'advertiser_id'},
                    {data: 'name', name: 'name'},
                    {data: 'url', name: 'url'},
                    {data: 'source', name: 'source'},
                    {data: 'click_through_url', name: 'click_through_url'},
                    {data: 'manual_update', name: 'manual_update', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: "0%"},
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
                    <div class="col-lg-4">
                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title"><?php echo e(trans('advertiser.api-advertiser.title')); ?> <?php echo e(trans('global.list')); ?></h4>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="breadcrumb-main">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <select class="js-example-basic-single js-states form-control" id="manualUpdate" name="manualUpdate">
                                            <option value="" disabled selected>Select Manual Update</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="js-example-basic-single js-states form-control" id="source" name="source">
                                            <option value="" disabled selected>Select Source</option>
                                            <?php $__currentLoopData = \App\Helper\Static\Vars::OPTION_LIST; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($list); ?>"><?php echo e(ucwords($list)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
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
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <table class="table table-bordered table-striped table-hover datatable"
                                       id="datatableApiAdvertiser">
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
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin.panel_table", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Downloads\revdb\resources\views/template/admin/advertisers/api/index.blade.php ENDPATH**/ ?>