<?php if (! $__env->hasRenderedOnce('e5a853dd-67b5-4873-9e34-2b9a61170549')): $__env->markAsRenderedOnce('e5a853dd-67b5-4873-9e34-2b9a61170549');
$__env->startPush('styles'); ?>
    <style>
        .user-member__form .form-control {
            padding: 10px 33px 10px 13px !important;
        }
    </style>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('945178d1-d2aa-4a78-9590-714341a43626')): $__env->markAsRenderedOnce('945178d1-d2aa-4a78-9590-714341a43626');
$__env->startPush('scripts'); ?>
    <script>
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
        function sendAjaxRequest(url, urlParams, dataObj)
        {
            history.pushState({}, null, url.href);

            url = new URL(document.URL);
            urlParams = url.searchParams;

            dataObj.search_by_name = urlParams.get(`search_by_name`);

            let exportXLSXURL = "<?php echo e(route("publisher.creatives.coupons.export", ['type' => 'xlsx'])); ?>";
            let exportCSVURL = "<?php echo e(route("publisher.creatives.coupons.export", ['type' => 'csv'])); ?>";

            exportXLSXURL = `${exportXLSXURL}${url.search}`;
            exportCSVURL = `${exportCSVURL}${url.search}`;

            $("#exportCSV").attr("href", exportCSVURL);
            $("#exportXLSX").attr("href", exportXLSXURL);

            $.ajax({
                url: '<?php echo e(route("publisher.creatives.coupons.list")); ?>',
                type: 'GET',
                data: dataObj,
                beforeSend: function () {
                },
                success: function (response) {
                    $("#totalResults").html(response.total);
                    $("#ap-overview").html(response.html);
                    // changeLimit();
                },
                error: function (response) {

                }
            });
        }
        function filterCoupons(field, id)
        {
            showClear(id);
            let data = $(`#${id}`).val();
            let dataObj = {[`${field}`]: data.toString()};

            $("#ap-overview").html("");

            let url = new URL(document.URL);
            let urlParams = url.searchParams;

            if(url.search) {
                if(urlParams.has(`${field}`)) {
                    urlParams.delete(`${field}`);
                }
                if(urlParams.has('page')) {
                    urlParams.delete('page');
                    urlParams.append('page', "1");
                }
            }
            urlParams.append(field, data);
            sendAjaxRequest(url, urlParams, dataObj);
        }
        function showClear(key)
        {
            $(`#clear${key}`).show();
        }
        function clearFilter(key)
        {
            let url = new URL(document.URL);
            let urlParams = url.searchParams;
            if(key === "clearSearchByName")
            {
                $("#SearchByName").val("");
                if(urlParams.has(`search_by_name`)) {
                    urlParams.delete(`search_by_name`);
                    filterCoupons("search_by_name", "SearchByName");
                }
            }
            history.pushState({}, null, url.href);
            $(`#${key}`).hide();
        }
        document.addEventListener("DOMContentLoaded", function () {
            $("#limit").change(() => {
                changeLimit();
            });
            $("#SearchByName").keyup(() => {
                filterCoupons("search_by_name", "SearchByName");
                if (!$("#SearchByName").val()) {
                    $(`#clearSearchByName`).hide();
                }
            });
        });
    </script>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>

    <div class="contents">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-breadcrumb">

                        <div class="breadcrumb-main">
                            <h1 class="title">Coupons</h1>
                        </div>

                        <div class="project-top-wrapper d-flex justify-content-end flex-wrap mb-25 mt-n10">

                            <div class="content-center mt-10">
                                <p class="subtitle">Total
                                    Results: <strong id="totalResults"><?php echo e($total); ?></strong></p>
                            </div><!-- End: .content-center -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="table-container">
                        <div class="d-flex justify-content-between">

                            <div class="search-box">
                                <i class="ri-search-line search-icon"></i>
                                <input class="search-input" type="text" id="SearchByName" placeholder="Search by Offer / Advertiser Name" value="<?php echo e(request()->search_by_name); ?>">
                            </div>
                                <div class="dropdown action-btn">
                                    <button class="btn btn-sm btn-primary-outline dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="la la-download"></i> Export
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <span class="dropdown-item">Export With</span>
                                        <div class="dropdown-divider"></div>
                                        <?php
                                            $queryParams = request()->all();
                                        ?>
                                        <a href="<?php echo e(route("publisher.creatives.coupons.export", array_merge(['type' => 'xlsx'], $queryParams))); ?>" class="dropdown-item" id="exportXLSX">
                                            <i class="la la-file-excel"></i> Excel (XLSX)</a>
                                        <a href="<?php echo e(route("publisher.creatives.coupons.export", array_merge(['type' => 'csv'], $queryParams))); ?>" class="dropdown-item" id="exportCSV">
                                            <i class="la la-file-csv"></i> CSV</a>
                                    </div>
                                </div>
                        </div>
                        <div id="ap-overview">
                            <?php echo $__env->make("template.publisher.creatives.coupons.list_view", compact('coupons'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div><!-- End: .userDatatable -->
                    </div>
                </div><!-- End: .col -->
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make("layouts.publisher.panel_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/publisher/creatives/coupons/list.blade.php ENDPATH**/ ?>