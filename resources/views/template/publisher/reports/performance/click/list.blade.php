@extends("layouts.publisher.panel_app")

@pushonce('styles')
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/css/daterangepicker.css") }}">
    <style>
        .loaded-spin {
            margin: 40%;
            position: absolute;
        }
    </style>
@endpushonce

@pushonce('scripts')
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/moment/moment.min.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/daterangepicker.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/moment.js") }}"></script>

    @php
        $date = \Carbon\Carbon::now()->format("Y-m-01 00:00:00");
        $diff = now()->diffInDays(\Carbon\Carbon::parse($date));

        $startDate = request()->start_date ?? null;
        $endDate = request()->end_date ?? null;

        if($startDate)
            $startDate = \Carbon\Carbon::parse($startDate)->format("M d, Y");

        if($endDate)
            $endDate = \Carbon\Carbon::parse($endDate)->format("M d, Y");

    @endphp

@endpushonce
<script>
    function showLoader()
    {
        $("#listingContentWrapper").addClass("zero-point-one-opacity");
        $("#performanceTabWrapper").addClass("zero-point-one-opacity");
        $("#ap-overview").append(`
                <div class="spin-container text-center" id="performanceLoader">
                    <div class="atbd-spin-dots spin-sm top-minus-25px">
                        <span class="spin-dot badge-dot dot-primary"></span>
                        <span class="spin-dot badge-dot dot-primary"></span>
                        <span class="spin-dot badge-dot dot-primary"></span>
                        <span class="spin-dot badge-dot dot-primary"></span>
                    </div>
                </div>
            `);
        $("#performanceCardContent").append(`
                <div class="spin-container text-center" id="performanceLoader2">
                    <div class="atbd-spin-dots spin-sm top-minus-25px">
                        <span class="spin-dot badge-dot dot-primary"></span>
                        <span class="spin-dot badge-dot dot-primary"></span>
                        <span class="spin-dot badge-dot dot-primary"></span>
                        <span class="spin-dot badge-dot dot-primary"></span>
                    </div>
                </div>
            `);
    }
    function hideLoader()
    {
        $("#listingContentWrapper").removeClass("zero-point-one-opacity");
        $("#performanceTabWrapper").removeClass("zero-point-one-opacity");
        $("#performanceLoader").remove();
        $("#performanceLoader2").remove();
    }

    function sendAjaxRequest(dataObj) {
        $.ajax({
            url: '{{ route("publisher.reports.performance-by-clicks.list") }}',
            type: 'GET',
            data: dataObj,
            before: function () {
                showLoader();
            },
            success: function (response) {
                console.log(response)
                $("#totalResults").html(`Total Results: <strong>${response.total}</strong>`);
                $("#totalResults2").html(`Total Results: <strong>${response.total2}</strong>`);
                $("#ap-overview").html(response.html);
                if(dataObj.start_date && dataObj.end_date) {
                    createClickGraph(response?.performanceOverview);
                }
            }
        }).done(function () {
            hideLoader();
            changeLimit();
        });
    }

    function createClickGraph(response)
    {
        let currentPeriod = response?.currentPeriod;
        let labels = currentPeriod?.labels;
        $("#click-tab").html(`
                <div class="performance-stats__down">
                    <span>Total Clicks</span>
                    <strong>
                        ${currentPeriod?.count}
                    </strong>
                </div>
            `);
        $("#clickChart").remove();
        $("#clickChartContent").html(`<canvas id="clickChart"></canvas>`);

        let previousPeriod = response?.previousPeriod;
        chartjsLineChartFour(
            "clickChart",
            "#FA8B0C",
            "45",
            (data = currentPeriod?.click),
            (data = previousPeriod?.click),
            labels,
            click?.min_value,
            click?.max_value
        );
    }

    function filterTransactions(field, id) {
        showClear(id);
        if(field == "conversion_search")
        {
            $("#ap-tabContent-2").addClass("spin-active");
            $("#gridLoader2").removeClass("display-hidden");
        }
        let data = $(`#${id}`).val();
        let dataObj = {[`${field}`]: data.toString()};
        searchFunc(field, data, dataObj);
    }

    function clearFilter(key) {
        let url = new URL(document.URL);
        let urlParams = url.searchParams;
        if (key === "clearSearchByName") {
            $("#SearchByName").val("");
            if (urlParams.has(`page`)) {
                urlParams.delete(`page`);
            }
            if (urlParams.has(`conversion_search`)) {
                urlParams.delete(`conversion_search`);
            }
        }
        if (key === "clearSearchByName2") {
            $("#SearchByName2").val("");
            if (urlParams.has(`conversion_search`)) {
                urlParams.delete(`conversion_search`);
                filterTransactions("conversion_search", "SearchByName2");
            }
            if (urlParams.has(`start_date`)) {
                urlParams.delete(`start_date`);
            }
            if (urlParams.has(`end_date`)) {
                urlParams.delete(`end_date`);
            }
            if (urlParams.has(`earning_sort`)) {
                urlParams.delete(`earning_sort`);
            }
            if (urlParams.has(`conversion_sort`)) {
                urlParams.delete(`conversion_sort`);
            }
        }
        history.pushState({}, null, url.href);
        $(`#${key}`).hide();

        url = new URL(document.URL);
        urlParams = url.searchParams;

        let data = $(`#SearchByName`).val();
        let dataObj = {['conversion_search']: data.toString()};

        dataObj.start_date = urlParams.get(`start_date`);
        dataObj.end_date = urlParams.get(`end_date`);
        sendAjaxRequest(dataObj);
    }

    function showClear(key) {
        if ($(`#clear${key}`).length)
            $(`#clear${key}`).show();
    }

    function searchFunc(field, data, dataObj)
    {
        let url = new URL(document.URL);
        let urlParams = url.searchParams;

        if (url.search) {
            if (urlParams.has(`${field}`)) {
                urlParams.delete(`${field}`);
            }
            if (field === "conversion_search" && urlParams.has('page')) {
                urlParams.delete('page');
                urlParams.append('page', "1");
            }
        }
        urlParams.append(field, data);
        history.pushState({}, null, url.href);

        url = new URL(document.URL);
        urlParams = url.searchParams;

        dataObj.start_date = urlParams.get(`start_date`);
        dataObj.end_date = urlParams.get(`end_date`);
        dataObj.page = urlParams.get(`page`);
        sendAjaxRequest(dataObj);
    }

    function changeLimit()
    {
        $("#limit").change(() => {
            $("#ap-tabContent").addClass("spin-active");
            $("#gridLoader").removeClass("display-hidden");

            let url = new URL(document.URL);
            let urlParams = url.searchParams;

            if (urlParams.has('page')) {
                urlParams.delete('page');
                urlParams.append('page', "1");
            }

            history.pushState({}, null, url.href);

            $.ajax({
                url: '{{ route("publisher.set-limit") }}',
                type: 'GET',
                data: {"limit": $("#limit").val(), "type": "click_performance"},
                success: function (response) {
                    if (response) {
                        window.location.reload();
                    }
                },
                error: function (response) {

                }
            });
        });
    }

    document.addEventListener("DOMContentLoaded", function () {

        let startDate = "{{ $startDate }}";
        let endDate = "{{ $endDate }}";

        let start;
        let end;

        if (startDate && endDate) {
            start = moment(startDate);
            end = moment(endDate);
        } else {
            start = moment().startOf("month");
            end = moment().endOf("month");
        }

        $('input[name="date-ranger"]').daterangepicker({
             maxSpan: {
                        days: 365
                    },
            startDate: start,
            endDate: end,
            singleDatePicker: false,
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            },
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                'Current Year': [moment().startOf('year'), moment().endOf('year')],
                'Previous Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
            },
        });

        $('input[name="date-ranger"]').val(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
        $('input[name="date-ranger"]').on('apply.daterangepicker', function (ev, picker) {

            showLoader();

            let exportXLSXURL = "{{ route("publisher.reports.transactions.export", ['type' => 'xlsx']) }}";
            let exportCSVURL = "{{ route("publisher.reports.transactions.export", ['type' => 'csv']) }}";

            $(this).val(picker.startDate.format('MMM D, YYYY') + ' - ' + picker.endDate.format('MMM D, YYYY'));

            exportXLSXURL = `${exportXLSXURL}?start_date=${picker.startDate.format('YYYY-MM-DD')}&end_date=${picker.endDate.format('YYYY-MM-DD')}`;
            exportCSVURL = `${exportCSVURL}?start_date=${picker.startDate.format('YYYY-MM-DD')}&end_date=${picker.endDate.format('YYYY-MM-DD')}`;

            $("#exportCSV").attr("href", exportCSVURL);
            $("#exportXLSX").attr("href", exportXLSXURL);

            let url = new URL(document.URL);
            let urlParams = url.searchParams;

            if (url.search) {
                if (urlParams.has('page')) {
                    urlParams.delete('page');
                    urlParams.append('page', "1");
                }
            }

            if (urlParams.has(`start_date`)) {
                urlParams.delete(`start_date`);
            }

            if (urlParams.has(`end_date`)) {
                urlParams.delete(`end_date`);
            }

            urlParams.append("start_date", picker.startDate.format('YYYY-MM-DD'));
            urlParams.append("end_date", picker.endDate.format('YYYY-MM-DD'));
            history.pushState({}, null, url.href);

            let dataObj = {};
            dataObj.start_date = urlParams.get(`start_date`);
            dataObj.end_date = urlParams.get(`end_date`);
            dataObj.earning_sort = urlParams.get(`earning_sort`);
            dataObj.conversion_sort = urlParams.get(`conversion_sort`);
            dataObj.conversion_search = urlParams.get(`conversion_search`);
            sendAjaxRequest(dataObj);

        });

        $('input[name="date-ranger"]').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });

        $(document).on('click', '#publisherPagination a', function(event){
            event.preventDefault();
            $("#ap-tabContent").addClass("spin-active");
            $("#gridLoader").removeClass("display-hidden");
            let page = $(this).attr('href').split('page=')[1];
            let dataObj = {page};
            searchFunc("page", page, dataObj);
        });

        changeLimit();

        $("#sortBy").change(function () {
            $("#ap-tabContent").addClass("spin-active");
            $("#gridLoader").removeClass("display-hidden");
            let data = $(this).val();
            let dataObj = {"earning_sort": data};
            searchFunc("earning_sort", data, dataObj);
        });

        $("#sortBy2").change(function () {
            $("#ap-tabContent-2").addClass("spin-active");
            $("#gridLoader2").removeClass("display-hidden");
            let data = $(this).val();
            let dataObj = {"conversion_sort": data};
            searchFunc("conversion_sort", data, dataObj);
        });

        $("#SearchByName").keyup(() => {
            filterTransactions("conversion_search", "SearchByName");
            if (!$("#SearchByName").val()) {
                $(`#clearSearchByName`).hide();
            }
        });

    });
</script>

@section("content")

    <div class="contents">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-breadcrumb">
                        <div class="breadcrumb-main">
                            <h1 class="title">Clicks Performance</h1>
                            <div class="d-flex justify-content-end flex-wrap mb-25 mt-n10">
                                <p class="subtitle" id="totalResults">Total Results: <strong>{{ $total }}</strong></p>
                            </div><!-- End: .project-top-wrapper -->
                            <div class="date-filter-container my-4 justify-content-end">
                                <div class="date-input-wrapper">
                                    <i class="ri-calendar-2-line date-icon"></i>
                                    <input type="text" class="date-input-glass form-control"
                                        name="date-ranger"
                                        placeholder="{{ now()->format('M 01, Y') }} - {{ now()->format('M t, Y') }}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" id="performanceOverview">
                    @include("template.publisher.widgets.section_performance_click_overview", compact('performanceOverview'))
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row" id="listingContentWrapper">
                <div class="col-lg-12">
                    <div class="">


                        @include("partial.admin.alert")
                        <div class="table-container">
                            <div class="d-flex justify-content-between">

                            <div class="search-box">
                                <i class="ri-search-line search-icon"></i>
                                <input class="search-input" type="text" id="SearchByName" placeholder="Search by Name..." value="{{ request()->search_by_name }}">
                            </div>
                                <div class="dropdown action-btn">
                                    <button class="btn btn-sm btn-primary-outline dropdown-toggle" type="button"
                                            id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        <i class="la la-download"></i> Export
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <span class="dropdown-item">Export With</span>
                                        <div class="dropdown-divider"></div>
                                        <a href="{{ route("publisher.reports.performance-by-clicks.export", ['type' => 'xlsx', 'start_date' => request()->start_date ?? now()->format("Y-m-01 00:00:00"), 'end_date' => request()->end_date ?? now()->format("Y-m-t 23:59:59")]) }}"
                                           id="exportXLSX" class="dropdown-item">
                                            <i class="la la-file-excel"></i> Excel (XLSX)</a>
                                        <a href="{{ route("publisher.reports.performance-by-clicks.export", ['type' => 'csv', 'start_date' => request()->start_date ?? now()->format("Y-m-01 00:00:00"), 'end_date' => request()->end_date ?? now()->format("Y-m-t 23:59:59")]) }}"
                                           id="exportCSV" class="dropdown-item">
                                            <i class="la la-file-csv"></i> CSV</a>
                                    </div>
                                </div>
                            </div>
                            <div id="ap-overview">
                                @include("template.publisher.reports.performance.click.list_view", compact('performanceOverviewList2'))
                            </div>
                        </div>

                    </div><!-- End: .userDatatable -->
                </div><!-- End: .col -->
            </div>
        </div>

    </div>

@endsection
