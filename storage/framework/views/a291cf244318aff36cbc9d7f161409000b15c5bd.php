<?php if (! $__env->hasRenderedOnce('f563fb66-9de7-4bd4-9eec-01e50be0df1e')): $__env->markAsRenderedOnce('f563fb66-9de7-4bd4-9eec-01e50be0df1e');
$__env->startPush('styles'); ?>
    <style>
        .disabled {
            pointer-events: none;
            cursor: pointer;
            opacity: 0.7;
        }
    </style>
<?php $__env->stopPush(); endif; ?>
<?php if (! $__env->hasRenderedOnce('0414b78b-6bbb-4670-acb6-7072668cf3ff')): $__env->markAsRenderedOnce('0414b78b-6bbb-4670-acb6-7072668cf3ff');
$__env->startPush('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '#publisherPagination a', function(event){
            event.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            getAdvertiserList(page);
        });
        $(document).on('submit', '#advertiserForm', function(event){
            event.preventDefault();
            let url = '<?php echo e(route("admin.advertiser-management.manual_join_publisher.store")); ?>';
            $.ajax({
                url: url,
                type: 'POST',
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                data: $(this).serialize(),
                before: function () {
                    $("#advertiserContent")
                        .append(`
                            <tr>
                                <td colspan="4" class="text-center">
                                    <small>Loading Please Wait..................</small>
                                </td>
                            </tr>
                        `);
                },
                success: function (response) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Manual Join Publisher Successfully',
                        text: "Your advertiser account will be access is few minutes.",
                        showConfirmButton: false,
                    });

                },
                error: function (response) {

                }
            });
        });
        function selectAll()
        {
            $("#selectAll").change(() => {
                $('.checkbox').prop('checked', $("#selectAll").prop('checked'));
            });
        }
        function testJSON(text){
            if (typeof text!=="string"){
                return false;
            }
            try{
                var json = JSON.parse(text);
                return (typeof json === 'object');
            }
            catch (error){
                return false;
            }
        }
        function getAdvertiserList(page = '')
        {
            let url = '<?php echo e(route("get-advertisers-by-network-by-user")); ?>';
            if(page)
            {
                url = `${url}?page=${page}`
            }
            $.ajax({
                url: url,
                type: 'POST',
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                data: {"network": $("#network").val(), "country":  $("#country").val(), "publisher":  $("#publisher").val(), "website":  $("#website").val()},
                before: function () {
                    $("#advertiserContent")
                        .append(`
                            <tr>
                                <td colspan="4" class="text-center">
                                    <small>Loading Please Wait..................</small>
                                </td>
                            </tr>
                        `);
                },
                success: function (response) {

                    // response = testJSON(response) ? JSON.parse(response) : response;

                    // let name, length, trimmedString, dynamicRow = null;
                    $('#advertiserContent').html(response.html);

                    $("#selectAll").prop("checked", false);
                    $("#selectAll").addClass("disabled");
                    $("#selectAll").attr("disabled", "disabled");
                    $("#updateBttn").addClass("disabled");
                    $("#updateBttn").attr("disabled", "disabled");

                    $("#selectAll").removeClass("disabled");
                    $("#selectAll").removeAttr("disabled");
                    $("#updateBttn").removeClass("disabled");
                    $("#updateBttn").removeAttr("disabled");



                    // if(response.length) {
                    //
                    //     $.each(response, function(key, value){
                    //
                    //         name = value.name;
                    //         length = 30;
                    //         trimmedString = name.length > length ?
                    //             name.substring(0, length - 3) + "..." :
                    //             name;
                    //
                    //         dynamicRow += `
                    //                 <td style="width: 25%;">
                    //                     <div class="form-check">
                    //                       <label class="form-check-label">
                    //                         <input type="checkbox" class="form-check-input ${value.advertiser_applies_without_auth ? "" : 'checkbox'}" name="status[]" ${value.advertiser_applies_without_auth ? "checked disabled" : ''} ${(value.status == 2 ? "disabled" : "")} value="${value.id}" title="${value.name}"> ${trimmedString}
                    //                       </label>
                    //                     </div>
                    //                 </td>`
                    //
                    //         if(response.length <= (key+1) || (key+1) % 4 == 0) {
                    //             $('#advertiserContent').append(`
                    //                 <tr>
                    //                     ${dynamicRow}
                    //                 </tr>
                    //             `);
                    //             dynamicRow = null;
                    //         }
                    //
                    //         $("#selectAll").removeClass("disabled");
                    //         $("#selectAll").removeAttr("disabled");
                    //         $("#updateBttn").removeClass("disabled");
                    //         $("#updateBttn").removeAttr("disabled");
                    //
                    //     });
                    //
                    // } else {
                    //     $("#advertiserContent")
                    //         .append(`
                    //             <tr>
                    //                 <td colspan="4" class="text-center">
                    //                     <small>No Advertiser Exist</small>
                    //                 </td>
                    //             </tr>
                    //         `);
                    // }
                },
                error: function (response) {

                }
            });
        }
        function getCountryByNetworks()
        {
            $.ajax({
                url: '<?php echo e(route("get-countries-by-network")); ?>',
                type: 'POST',
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                data: {"network": $("#network").val()},
                success: function (response) {
                    $("#country")
                        .empty();

                    if(response.length) {

                        $("#country").append('<option disabled selected="selected">Please Select</option>')
                        $.each(response, function(key, value){
                            $('#country').append(`
                                <option value="${value.iso2}">${value.name}</option>
                            `);
                        });

                    } else {
                        $("#country")
                            .append('<option disabled selected="selected">No Data Found</option>');
                    }
                },
                error: function (response) {

                }
            });
        }
        function getWebsiteList()
        {
            $.ajax({
                url: '<?php echo e(route("get-websites-by-user")); ?>',
                type: 'POST',
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                data: {"publisher": $("#publisher").val()},
                success: function (response) {
                    $("#website")
                        .empty();

                    $("#website").append('<option disabled selected="selected">Please Select</option>')

                    if(Object.keys(response).length)
                    {
                        for(key in response)
                        {
                            $('#website').append(`
                                <option value="${key}">${response[key]}</option>
                            `);
                        }
                    } else {
                        $("#website")
                            .append('<option disabled selected="selected">No Data Found</option>');
                    }

                    // if(jQuery.isEmptyObject(response)) {
                    //
                    //     // $.each(response, function(key, value){
                    //     //     console.log(value)
                    //     //     // $('#website').append(`
                    //     //     //     <option value="${key}">${value}</option>
                    //     //     // `);
                    //     // });
                    //
                    // } else {
                    //     $("#website")
                    //         .append('<option disabled selected="selected">No Data Found</option>');
                    // }

                    getAdvertiserList();
                },
                error: function (response) {

                }
            });
        }
        document.addEventListener("DOMContentLoaded", function () {
            $("#network").change(() => {
                getAdvertiserList();
                getCountryByNetworks();
            });
            $("#country").change(() => {
                getAdvertiserList();
            });
            $("#publisher").change(() => {
                getWebsiteList();
            });
            $("#website").change(() => {
                getAdvertiserList();
            });
            selectAll();
        });
    </script>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>

    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main mt-4">
                            <h4 class="text-capitalize breadcrumb-title mt-3"><?php echo e(trans('advertiser.manual_join_publisher.title_singular')); ?></h4>
                        </div>

                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <form action="javascript:void(0)" method="post"
                                      enctype="multipart/form-data" id="advertiserForm" class="p-5">
                                    <?php echo csrf_field(); ?>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group <?php echo e($errors->has('network') ? 'has-error' : ''); ?>">
                                                <label for="network" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.show_on_publisher.fields.network')); ?></label>
                                                <select class="js-example-basic-single js-states form-control" id="network" name="network">
                                                    <option value="" disabled selected>Please Select</option>
                                                    <?php $__currentLoopData = $networks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $network): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($network); ?>"><?php echo e($network); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php if($errors->has('network')): ?>
                                                    <em class="invalid-feedback">
                                                        <?php echo e($errors->first('network')); ?>

                                                    </em>
                                                <?php endif; ?>
                                                <p class="helper-block">
                                                    <?php echo e(trans('advertiser.api-advertiser.show_on_publisher.fields.network_helper')); ?>

                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group <?php echo e($errors->has('country') ? 'has-error' : ''); ?>">
                                                <label for="country" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.show_on_publisher.fields.country')); ?></label>
                                                <select class="js-example-basic-single js-states form-control" id="country" name="country">
                                                    <option value="" disabled selected>First Select Network</option>
                                                </select>
                                                <?php if($errors->has('country')): ?>
                                                    <em class="invalid-feedback">
                                                        <?php echo e($errors->first('country')); ?>

                                                    </em>
                                                <?php endif; ?>
                                                <p class="helper-block">
                                                    <?php echo e(trans('advertiser.api-advertiser.show_on_publisher.fields.country_helper')); ?>

                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group <?php echo e($errors->has('publisher') ? 'has-error' : ''); ?>">
                                                <label for="publisher" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.show_on_publisher.fields.publisher')); ?></label>
                                                <select class="js-example-basic-single js-states form-control" id="publisher" name="publisher">
                                                    <option value="" selected>Please Select</option>
                                                    <?php $__currentLoopData = $publishers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publisher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($publisher->id); ?>"><?php echo e($publisher->first_name); ?> <?php echo e($publisher->last_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php if($errors->has('publisher')): ?>
                                                    <em class="invalid-feedback">
                                                        <?php echo e($errors->first('publisher')); ?>

                                                    </em>
                                                <?php endif; ?>
                                                <p class="helper-block">
                                                    <?php echo e(trans('advertiser.api-advertiser.show_on_publisher.fields.publisher_helper')); ?>

                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group <?php echo e($errors->has('website') ? 'has-error' : ''); ?>">
                                                <label for="website" class="font-weight-bold text-black">Website</label>
                                                <select class="js-example-basic-single js-states form-control" id="website" name="website">
                                                    <option value="" selected>First Select Website</option>
                                                </select>
                                                <?php if($errors->has('website')): ?>
                                                    <em class="invalid-feedback">
                                                        <?php echo e($errors->first('website')); ?>

                                                    </em>
                                                <?php endif; ?>
                                                <p class="helper-block">
                                                    <?php echo e(trans('advertiser.api-advertiser.show_on_publisher.fields.publisher_helper')); ?>

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">

                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <td colspan="4">
                                                            <label class="p-0 m-0 font-weight-bold text-black">Advertiser List</label>
                                                            <div class="float-right">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input disabled" id="selectAll" name="selectAll" disabled value="1"> Select All
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <tbody id="advertiserContent">
                                                    <?php echo $__env->make("template.admin.advertisers.manual_join.empty", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td>
                                                            <button type="submit" class="btn btn-xs btn-primary disabled" id="updateBttn" disabled>Update</button>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>

                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin.panel_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/advertisers/manual_join/advertiser.blade.php ENDPATH**/ ?>