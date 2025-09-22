<?php if (! $__env->hasRenderedOnce('ec2488a2-2965-4266-bb88-34eccd589401')): $__env->markAsRenderedOnce('ec2488a2-2965-4266-bb88-34eccd589401');
$__env->startPush('styles'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('3c0de1ea-a4ba-4b3d-b8f5-94f675ee270e')): $__env->markAsRenderedOnce('3c0de1ea-a4ba-4b3d-b8f5-94f675ee270e');
$__env->startPush('scripts'); ?>
    <script type="text/javascript">
        function openModal(id) {
            $("#transaction_id").val(id);
        }
        $(function() {

            $('#datatableTransaction').dataTable({
                order: [
                    [2, 'desc']
                ],
                scrollY: true,
                scrollX: true,
                scrollCollapse: true,
                paging: true,
                autoWidth: true,
                deferRender: true,
                sScrollXInner: "150%",
                ajax: {
                    url: "<?php echo e(route('admin.transactions.index')); ?>",
                    data: function(d) {
                        d.source = $('#source').val();
                        d.country = $('#country').val();
                        d.search_filter = $('#search_filter').val();
                        d.route_name = "<?php echo e(request()->route()->getName()); ?>";
                    }
                },
                columns: [{
                        data: 'transaction_id',
                        name: 'transaction_id'
                    },
                    {
                        data: 'assign',
                        name: 'assign',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'advertiser_name',
                        name: 'advertiser_name',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'transaction_date',
                        name: 'transaction_date'
                    },
                    {
                        data: 'publisher_url',
                        name: 'publisher_url'
                    },
                    {
                        data: 'customer_country',
                        name: 'customer_country'
                    },
                    {
                        data: 'advertiser_country',
                        name: 'advertiser_country'
                    },
                    {
                        data: 'commission_status',
                        name: 'commission_status'
                    },
                    {
                        data: 'commission_amount',
                        name: 'commission_amount'
                    },
                    {
                        data: 'commission_amount_currency',
                        name: 'commission_amount_currency'
                    },
                    {
                        data: 'sale_amount',
                        name: 'sale_amount'
                    },
                    {
                        data: 'sale_amount_currency',
                        name: 'sale_amount_currency'
                    },
                    {
                        data: 'source',
                        name: 'source'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: "0%"
                    },
                ],
                columnDefs: [{
                    orderable: false,
                    className: '',
                    targets: 0
                }, {}],
                buttons: [{}]
            });

            $('#source').change(() => {
                $('#datatableTransaction').DataTable().draw();
            });

            $('#country').change(() => {
                $('#datatableTransaction').DataTable().draw();
            });

            $('#search_filter').change(() => {
                $('#datatableTransaction').DataTable().draw();
            });

            $("#publisher").change(() => {
                $.ajax({
                    url: '<?php echo e(route('get-websites-by-user')); ?>',
                    type: 'POST',
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        "publisher": $("#publisher").val()
                    },
                    success: function(response) {
                        $("#website")
                            .empty()
                            .append(
                                '<option disabled selected="selected">Please Select</option>')

                        if (Object.keys(response).length) {
                            for (key in response) {
                                $('#website').append(`
                                <option value="${key}">${response[key]}</option>
                            `);
                            }
                        } else {
                            $("#website")
                                .append(
                                    '<option disabled selected="selected">No Data Found</option>'
                                );
                        }
                    },
                    error: function(response) {

                    }
                });
            });

        });
    </script>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="breadcrumb-main">
                    <h1 class="title"><?php echo e(trans('cruds.transaction_missing.title')); ?> <?php echo e(trans('global.list')); ?></h4>
                        <div class="horizontal-filters">
                            <div class="filter-header">
                                <h5 class="mb-0"><i class="ri-filter-3-line"></i> Filters</h5>
                            </div>

                            <div class="filter-grid">

                                <!-- Country Filter -->
                                <div class="filter-card">
                                    <div class="filter-title">
                                        <h6>Source</h6>
                                    </div>
                                    <select class="js-example-basic-single js-states form-control" id="source"
                                        name="source">
                                        <option value="" disabled selected>Select</option>
                                        <?php $__currentLoopData = \App\Helper\Static\Vars::OPTION_LIST; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($list); ?>"><?php echo e(ucwords($list)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <!-- Advertiser Type Filter -->
                                <div class="filter-card">
                                    <div class="filter-title">
                                        <h6>Country</h6>
                                    </div>
                                    <select class="js-example-basic-single js-states form-control" id="country"
                                        name="country">
                                        <option value="" disabled selected>Select</option>
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country['iso2']); ?>"><?php echo e($country['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <!-- Category Filter -->
                                <div class="filter-card">
                                    <div class="filter-title">
                                        <h6>Search Filter</h6>
                                    </div>
                                    <select class="js-example-basic-single js-states form-control" id="search_filter"
                                        name="search_filter">
                                        <option value="" disabled selected>Select</option>
                                        <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($column); ?>"><?php echo e($column); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>

            </div>
        </div>

        <?php echo $__env->make('partial.admin.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-borderless table-hover datatable"
                    id="datatableTransaction">
                    <thead>
                        <tr class="userDatatable-header footable-header">
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.transaction_id')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.assign')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.advertiser_name')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.transaction_date')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.publisher_url')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.customer_country')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.advertiser_country')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.commission_status')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.commission_amount')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.commission_amount_currency')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.sale_amount')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.sale_amount_currency')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('advertiser.api-advertiser.fields.source')); ?>

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
    <div class="website-modal modal fade show" id="missing-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <form action="<?php echo e(route('admin.transactions.missing.store')); ?>" method="post" enctype="multipart/form-data"
                id="setMissingTransactionForm" class="p-5">
                <?php echo csrf_field(); ?>

                <input type="hidden" id="transaction_id" name="transaction_id">
                <div class="modal-content modal-bg-white">
                    <div class="modal-header">
                        <h6 class="modal-title text-black" id="modelTitle"></h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span data-feather="x"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="publisher" class="font-weight-bold text-black">Publisher</label>
                                    <select class="js-example-basic-single js-states form-control" id="publisher"
                                        name="publisher">
                                        <option value="" selected>Please Select</option>
                                        <?php $__currentLoopData = $publishers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publisher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($publisher->id); ?>"><?php echo e($publisher->first_name); ?>

                                                <?php echo e($publisher->last_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="website" class="font-weight-bold text-black">Website</label>
                                    <select class="js-example-basic-single js-states form-control" id="website"
                                        name="website">
                                        <option value="" selected>First Select Website</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"
                            id="closeModal">Cancel</button>
                    </div>
                </div>
            </form>
            <div class="loader-overlay display-hidden" id="showLoader">
                <div class="atbd-spin-dots spin-lg">
                    <span class="spin-dot badge-dot dot-primary"></span>
                    <span class="spin-dot badge-dot dot-primary"></span>
                    <span class="spin-dot badge-dot dot-primary"></span>
                    <span class="spin-dot badge-dot dot-primary"></span>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.panel_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tehami\Desktop\revounts-dashboard\resources\views/template/admin/transaction_missing/index.blade.php ENDPATH**/ ?>