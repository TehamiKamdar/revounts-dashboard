@extends("layouts.publisher.panel_app")

@pushonce('styles')
    <link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/css/daterangepicker.css") }}">
@endpushonce

@pushonce('scripts')

    @php
        $date = \Carbon\Carbon::now()->format("Y-m-01 00:00:00");
        $diff = now()->diffInDays(\Carbon\Carbon::parse($date));

        $startDate = request()->start_date ?? null;
        $endDate = request()->end_date ?? null;

        if($startDate)
            $startDate = \Carbon\Carbon::parse($startDate)->format("M d, Y");

        if($endDate)
            $endDate = \Carbon\Carbon::parse($endDate)->format("M d, Y");

        $routeData = [
            'start_date' => request()->start_date ?? now()->format("Y-m-01 00:00:00"),
            'end_date' => request()->end_date ?? now()->format("Y-m-t 23:59:59")
        ];

        if(request()->payment_id)
        {
            $routeData['payment_id'] = request()->payment_id;
        }

        $xslx = route("publisher.reports.transactions.export", array_merge($routeData, ['type' => 'xlsx']));
        $csv = route("publisher.reports.transactions.export", array_merge($routeData, ['type' => 'csv']));
    @endphp

    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/moment/moment.min.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/daterangepicker.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/moment.js") }}"></script>
    <script>
        function sendAjaxRequest(dataObj) {
            $.ajax({
                url: '{{ route("publisher.reports.transactions.list") }}',
                type: 'GET',
                data: dataObj,
                success: function (response) {
                    $("#totalResults").html(response.total);
                    $("#ap-overview").html(response.html);
                    changeLimit()
                }
            });
        }

        function clearFilter(key) {
            let url = new URL(document.URL);
            let urlParams = url.searchParams;
            if (key == "clearSearchByName") {
                $("#SearchByName").val("");
                if (urlParams.has(`search_by_name`)) {
                    urlParams.delete(`search_by_name`);
                    filterTransactions("search_by_name", "SearchByName");
                }
            }
            history.pushState({}, null, url.href);
            $(`#${key}`).hide();
        }

        function showClear(key) {
            if ($(`#clear${key}`).length)
                $(`#clear${key}`).show();
        }

        function filterTransactions(field, id) {
            showClear(id);
            let data = $(`#${id}`).val();
            let dataObj = {[`${field}`]: data.toString()};

            $("#ap-overview").html("");

            let url = new URL(document.URL);
            let urlParams = url.searchParams;

            if (url.search) {
                if (urlParams.has(`${field}`)) {
                    urlParams.delete(`${field}`);
                }
                if (urlParams.has('page')) {
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
            dataObj.search_by_name = urlParams.get(`search_by_name`);
            dataObj.region = urlParams.get(`region`);
            dataObj.section = urlParams.get(`section`);
            if (urlParams.has('payment_id')) {
                dataObj.payment_id = urlParams.get(`payment_id`);
            }
            sendAjaxRequest(dataObj);
        }

        function changeLimit()
        {

            $("#limit").change(() => {
                $("#ap-tabContent").addClass("spin-active");
                $("#gridLoader").removeClass("display-hidden");
                $.ajax({
                    url: '{{ route("publisher.set-limit") }}',
                    type: 'GET',
                    data: {"limit": $("#limit").val(), "type": "transaction"},
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

            @if(!request()->payment_id)

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
                        'Current Month': [moment().startOf('month'), moment().endOf('month')],
                        'Previous Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                        'Current Year': [moment().startOf('year'), moment().endOf('year')],
                        'Previous Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
                    },
                });

                {{--let setDate = "{{ $setDate }}";--}}
                {{--if(setDate) {--}}
                {{--    $('input[name="date-ranger"]').val(setDate);--}}
                {{--}--}}
                {{--else {--}}
                {{--}--}}
                $('input[name="date-ranger"]').val(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
                $('input[name="date-ranger"]').on('apply.daterangepicker', function (ev, picker) {

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
                    dataObj.search_by_name = urlParams.get(`search_by_name`);
                    dataObj.section = urlParams.get(`section`);
                    sendAjaxRequest(dataObj);

                });

                $('input[name="date-ranger"]').on('cancel.daterangepicker', function (ev, picker) {
                    $(this).val('');
                });

            @endif

            changeLimit();

            $("#SearchByName").keyup(() => {
                filterTransactions("search_by_name", "SearchByName");
                if (!$("#SearchByName").val()) {
                    $(`#clearSearchByName`).hide();
                }
            });

            $("#region").change(() => {
                filterTransactions("region", "region");
            });

            $("#publisherPagination a").click(() => {
                $("#ap-tabContent").addClass("spin-active");
                $("#gridLoader").removeClass("display-hidden");
            });

            $("#allTransactions, #pendingTransactions, #holdTransactions, #approvedTransactions, #declinedTransactions, #paidTransactions").click((e) => {

                let data = $(e.target);
                let section = data.attr('data-section');
                $("#allTransactions, #pendingTransactions, #holdTransactions, #approvedTransactions, #declinedTransactions, #paidTransactions").removeClass("active");
                if (section === "all") {
                    $("#allTransactions").addClass("active");
                    section = null;
                } else if (section === "pending") {
                    $("#pendingTransactions").addClass("active");
                } else if (section === "hold") {
                    $("#holdTransactions").addClass("active");
                } else if (section === "approved") {
                    $("#approvedTransactions").addClass("active");
                } else if (section === "declined") {
                    $("#declinedTransactions").addClass("active");
                } else if (section === "paid") {
                    $("#paidTransactions").addClass("active");
                }

                let dataObj = {section};

                $("#ap-overview").html("");

                let url = new URL(document.URL);
                let urlParams = url.searchParams;

                if (url.search) {
                    if (urlParams.has(`section`)) {
                        urlParams.delete(`section`);
                    }
                    if (urlParams.has('page')) {
                        urlParams.delete('page');
                        urlParams.append('page', "1");
                    }
                }
                if (section)
                    urlParams.append("section", section);
                history.pushState({}, null, url.href);

                url = new URL(document.URL);
                urlParams = url.searchParams;

                dataObj.start_date = urlParams.get(`start_date`);
                dataObj.end_date = urlParams.get(`end_date`);
                dataObj.search_by_name = urlParams.get(`search_by_name`);
                sendAjaxRequest(dataObj);
            });

        });
    </script>
@endpushonce

@section("content")

    <div class="contents">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-breadcrumb">

                        < class="breadcrumb-main">
                            <h1 class="title">Transactions</h1>

                            @include("partial.publisher.transaction_alert")
                            <div class="d-flex justify-content-end">
                                <p class="subtitle">Total
                                    Results: <strong id="totalResults">{{ $total }}</strong></p>
                            </div>
                                @if(!request()->payment_id)
                                    <div class="date-filter-container my-4 justify-content-end">
                                        <div class="date-input-wrapper">
                                            <i class="ri-calendar-2-line date-icon"></i>
                                            <input type="text" class="date-input-glass form-control"
                                                name="date-ranger"
                                                placeholder="{{ now()->format('M 01, Y') }} - {{ now()->format('M t, Y') }}"/>
                                        </div>
                                    </div>
                                @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        @include("partial.admin.alert")
                        <div class="table-container">
                            <div class="d-flex justify-content-between">
                                <div class="search-box">
                                    <i class="ri-search-line search-icon"></i>
                                    <input class="search-input" type="text" id="SearchByName" placeholder="Search by Name..." value="{{ request()->search_by_name }}">
                                </div>

                                @if(!request()->payment_id)
                                    <div>
                                        <div class="d-flex align-items-center">
                                        <span class="text-primary-light">Status :</span>
                                        <div class="project-tap order-project-tap global-shadow">
                                            <ul class="nav px-1" id="ap-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link {{ !request()->section || request()->section == "all" ? "active" : null }}"
                                                       data-section="all" id="allTransactions"
                                                       href="javascript:void(0)">All</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link {{ request()->section == "pending" ? "active" : null }}"
                                                       data-section="pending" id="pendingTransactions"
                                                       href="javascript:void(0)">Pending</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link {{ request()->section == "hold" ? "active" : null }}"
                                                       data-section="hold" id="holdTransactions" href="javascript:void(0)">Hold</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link {{ request()->section == "approved" ? "active" : null }}"
                                                       data-section="approved" id="approvedTransactions"
                                                       href="javascript:void(0)">Approved</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link {{ request()->section == "declined" ? "active" : null }}"
                                                       data-section="declined" id="declinedTransactions"
                                                       href="javascript:void(0)">Declined</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link {{ request()->section == "paid" ? "active" : null }}"
                                                       data-section="paid" id="paidTransactions" href="javascript:void(0)">Paid</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    </div><!-- End: .project-category -->
                                    <div>
                                        <div class="d-flex align-items-center">
                                        <span class="text-primary-light">Region :</span>
                                        <div class="project-category__select global-shadow ">
                                            <select class="js-example-basic-single js-states form-control" id="region">
                                                <option {{ request()->region == "all" || empty(request()->region) ? "selected" : "" }} value="all">All Regions</option>
                                                @if($countries && count($countries))
                                                    @foreach($countries as $country)
                                                        @if($country->advertiser_country)
                                                            <option {{ request()->region == $country->advertiser_country ? "selected" : "" }} value="{{ $country->advertiser_country }}">{{ $country->advertiser_country }}</option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                <option {{ request()->region == "unknown" ? "selected" : "" }} value="unknown">Unknown</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><!-- End: .project-category -->
                                @endif
                                <div class="dropdown action-btn">
                                    <button class="btn btn-sm btn-primary-outline dropdown-toggle" type="button"
                                            id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        <i class="la la-download"></i> Export
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <span class="dropdown-item">Export With</span>
                                        <div class="dropdown-divider"></div>
                                        <a href="{{ $xslx }}"
                                           id="exportXLSX" class="dropdown-item">
                                            <i class="la la-file-excel"></i> Excel (XLSX)</a>
                                        <a href="{{ $csv }}"
                                           id="exportCSV" class="dropdown-item">
                                            <i class="la la-file-csv"></i> CSV</a>
                                    </div>
                                </div>
                            </div>
                            <div id="ap-overview">
                                @include("template.publisher.reports.transaction.list_view", compact('transactions'))
                            </div>
                        </div>

                    </div><!-- End: .userDatatable -->
                </div><!-- End: .col -->
            </div>
        </div>

    </div>

@endsection
