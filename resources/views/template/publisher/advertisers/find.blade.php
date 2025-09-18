@extends("layouts.publisher.panel_app")

@pushonce('styles')

<link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/css/select2.min.css") }}" />
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        display: none;
    }

    .loaded-spin {
        margin: 20% 50%;
        position: absolute;
    }
</style>

@endpushonce

@pushonce('scripts')
<script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/select2.full.min.js") }}"></script>
<script src="{{ asset("vendor_assets/js/drawer.js") }}"></script>
@php $section = request()->section ?? null; @endphp
@php $page = request()->page ?? null; @endphp
<script>
    function openDrawer(e) {
        const drawerBasic = document.querySelector(".drawer-basic-wrap");
        const overlay = document.querySelector(".overlay-dark");
        const areaDrawer = document.querySelector(".area-drawer");
        const areaOverlay = document.querySelector(".area-overlay");
        e.preventDefault();
        if (this.dataset.drawer == "basic") {
            drawerBasic.classList.remove("account");
            drawerBasic.classList.remove("profile");
            drawerBasic.classList.add("basic");
            drawerBasic.classList.add("show");
            overlay.classList.add("show");
        } else if (this.dataset.drawer == "area") {
            areaDrawer.classList.add("show");
            areaOverlay.classList.add("show");
        } else if (this.dataset.drawer == "account") {
            drawerBasic.classList.remove("basic");
            drawerBasic.classList.remove("profile");
            drawerBasic.classList.add("account");
            drawerBasic.classList.add("show");
            overlay.classList.add("show");
        } else if (this.dataset.drawer == "profile") {
            drawerBasic.classList.remove("basic");
            drawerBasic.classList.remove("account");
            drawerBasic.classList.add("profile");
            drawerBasic.classList.add("show");
            overlay.classList.add("show");
        }
    }
    function sendAjaxRequest(url, urlParams, dataObj) {
        history.pushState({}, null, url.href);

        url = new URL(document.URL);
        urlParams = url.searchParams;

        dataObj.search_by_country = urlParams.get(`search_by_country`);
        dataObj.search_by_promotional_method = urlParams.get(`search_by_promotional_method`);
        dataObj.search_by_name = urlParams.get(`search_by_name`);
        dataObj.section = urlParams.get(`section`);
        dataObj.type = urlParams.get(`type`);
        // dataObj.source = urlParams.get(`source`);

        let exportXLSXURL = "{{ route("publisher.export-advertisers", ['type' => 'xlsx']) }}";
        let exportCSVURL = "{{ route("publisher.export-advertisers", ['type' => 'csv']) }}";

        exportXLSXURL = `${exportXLSXURL}${url.search}`;
        exportCSVURL = `${exportCSVURL}${url.search}`;

        $("#exportCSV").attr("href", exportCSVURL);
        $("#exportXLSX").attr("href", exportXLSXURL);

        $.ajax({
            url: '{{ route(request()->route()->getName()) }}',
            type: 'GET',
            data: dataObj,
            success: function (response) {
                console.log(response.total);
                $("#totalAdvertiser").html(response.total);
                $("#ap-overview").html(response.html);
                changeLimit();
                const drawerTriggers = document.querySelectorAll(".drawer-trigger");
                if (drawerTriggers) {
                    drawerTriggers.forEach((drawerTrigger) =>
                        drawerTrigger.addEventListener("click", openDrawer)
                    );
                }
            },
            error: function (response) {

            }
        }).done(function () {
            $("#ap-tabContent").removeClass("spin-active");
            $("#gridLoader3").addClass("display-hidden");
        });
    }
    function filterAdvertiser(field, id) {
        showClear(id);
        let data = $(`#${id}`).val();
        let dataObj = { [`${field}`]: data.toString() };

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
        sendAjaxRequest(url, urlParams, dataObj);
    }
    function clearFilter(key) {
        let url = new URL(document.URL);
        let urlParams = url.searchParams;
        if (key === "clearSearchByName") {
            $("#SearchByName").val("");
            if (urlParams.has(`search_by_name`)) {
                urlParams.delete(`search_by_name`);
                filterAdvertiser("search_by_name", "SearchByName");
            }
        }
        else if (key === "clearSearchByCountry") {
            $("#SearchByCountry").val("").trigger("change");
            if (urlParams.has(`search_by_country`)) {
                urlParams.delete(`search_by_country`);
                filterAdvertiser("search_by_country", "SearchByCountry");
            }
        }
        else if (key === "clearSearchByCategory") {
            $("#SearchByCategory").val("").trigger("change");
            if (urlParams.has(`search_by_category`)) {
                urlParams.delete(`search_by_category`);
                filterAdvertiser("search_by_category", "SearchByCategory");
            }
        }
        else if (key === "clearSearchByPromotionalMethod") {
            $("#SearchByPromotionalMethod").val("").trigger("change");
            if (urlParams.has(`search_by_promotional_method`)) {
                urlParams.delete(`search_by_promotional_method`);
                filterAdvertiser("search_by_promotional_method", "SearchByPromotionalMethod");
            }
        }
        history.pushState({}, null, url.href);
        $(`#${key}`).hide();
    }
    function showClear(key) {
        $(`#clear${key}`).show();
    }
    function pushInfo(id, name) {
        $("#advertiser_id").val(id);
        $("#advertiser_name").val(name);
    }
    function view(view) {
        $.ajax({
            url: '{{ route("publisher.set-advertiser-view") }}',
            type: 'GET',
            data: { view },
            success: function (response) {
                if (response) {
                    window.location.reload();
                }
            },
            error: function (response) {

            }
        });
    }
    function openApplyModal(id, name) {
        $("#advertiserID").html(`Brand ID: ${id}`)
        $("#advertiserName").html(name)
        $("#a_id").val(id)
        $("#a_name").val(name)
    }
    function advertiserType(type) {
        let url = new URL(document.URL);
        let urlParams = url.searchParams;

        // let sourcesStr = urlParams.get("source");
        // let sourceArr = sourcesStr ? sourcesStr.split(',') : [];
        // let source = sourceArr.indexOf(type)
        // if(source > -1)
        //     sourceArr.splice(source, 1);
        // else
        //     sourceArr.push(type)

        $("#ap-overview").html("");

        if (url.search) {
            // if(urlParams.has(`source`)) {
            //     urlParams.delete(`source`);
            // }
            if (urlParams.has('page')) {
                urlParams.delete('page');
                urlParams.append('page', "1");
            }
        }

        // source = sourceArr.toString();

        // let dataObj = {source};
        //
        // if(source)
        //     urlParams.append("source", source);

        sendAjaxRequest(url, urlParams, dataObj);

    }
    function changeLimit() {
        $("#limit").change(() => {
            $("#ap-overview").addClass("spin-active");
            $.ajax({
                url: '{{ route("publisher.set-limit") }}',
                type: 'GET',
                data: { "limit": $("#limit").val(), "type": "advertiser" },
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
    function fetchAdvertisers(section, dataObj, clearPage) {
        let url = new URL(document.URL);
        let urlParams = url.searchParams;
        //
        if (url.search) {
            if (urlParams.has(`section`)) {
                urlParams.delete(`section`);
            }
            if (clearPage && urlParams.has('page')) {
                urlParams.delete(`page`);
                urlParams.append('page', "1");
            }
        }
        if (section)
            urlParams.append("section", section);

        sendAjaxRequest(url, urlParams, dataObj);
    }
    document.addEventListener("DOMContentLoaded", function () {

        changeLimit();
        $("#SearchByCountry, #SearchByPromotionalMethod, #SearchByCategory").select2({
            placeholder: "Please Select",
            dropdownCssClass: "tag",
            allowClear: false
        });
        $("#SearchByName").keyup(() => {
            filterAdvertiser("search_by_name", "SearchByName");
            if (!$("#SearchByName").val()) {
                $(`#clearSearchByName`).hide();
            }
        });
        $("#SearchByCountry").change(() => {
            filterAdvertiser("search_by_country", "SearchByCountry")
        });
        $("#SearchByCategory").change(() => {
            filterAdvertiser("search_by_category", "SearchByCategory")
        });
        $("#advertiserType").change(() => {
            let type = $("#advertiserType").val();
            let dataObj = { type };

            let url = new URL(document.URL);
            let urlParams = url.searchParams;

            if (url.search) {
                if (urlParams.has(`type`)) {
                    urlParams.delete(`type`);
                }
                // if(urlParams.has(`source`)) {
                //     urlParams.delete(`source`);
                // }
                if (urlParams.has('page')) {
                    urlParams.delete('page');
                    urlParams.append('page', "1");
                }
            }
            // if(response.source)
            // {
            //     urlParams.append("source", response.source);
            // }
            urlParams.append("type", type);
            sendAjaxRequest(url, urlParams, dataObj);

            //     { { --$("#advertiserWrapper").html(""); --} }
            //     { { --$.ajax({--} }
            //     { { --url: '{{ route("publisher.advertiser-types") }}', --} }
            //     { { --type: 'GET', --} }
            //     { { --data: dataObj, --} }
            //     {
            //         { --beforeSend: function () { --} }
            //         { { --    }, --}
            //     }
            //     {
            //         { --success: function (response) { --} }

            //         { { --$("#advertiserWrapper").html(response.html); --} }

            //         { { --$("#ap-overview").html(""); --} }

            //         { { --let url = new URL(document.URL); --} }
            //         { { --let urlParams = url.searchParams; --} }

            //         {
            //             { --        if (url.search) { --} }
            //             {
            //                 { --            if (urlParams.has(`type`)) { --} }
            //                 { { --urlParams.delete(`type`); --} }
            //                 { { --            } --}
            //             }
            //             {
            //                 { --            if (urlParams.has(`source`)) { --} }
            //                 { { --urlParams.delete(`source`); --} }
            //                 { { --            } --}
            //             }
            //             {
            //                 { --            if (urlParams.has('page')) { --} }
            //                 { { --urlParams.delete('page'); --} }
            //                 { { --urlParams.append('page', "1"); --} }
            //                 { { --            } --}
            //             }
            //             { { --        } --}
            //         }
            //         { { --        if (response.source) --} }
            //         { { --{--} }
            //         { { --urlParams.append("source", response.source); --} }
            //         { { --        } --}
            //     }
            //     { { --urlParams.append("type", type); --} }
            //     { { --sendAjaxRequest(url, urlParams, dataObj); --} }
            //     { { --    }, --}
            // }
            //         {{--    error: function (response) { --}}

            //         {{--    }--}}
            // {{--}); --}}
        });
        $("#SearchByPromotionalMethod").change(() => {
            filterAdvertiser("search_by_promotional_method", "SearchByPromotionalMethod")
        });
        $("#allBrands, #notJoinedBrands, #joinedBrands, #newBrands, #pendingBrands, #rejectedBrands, #holdBrands").click(function (e) {
            $("#ap-tabContent").addClass("spin-active");
            $("#gridLoader3").removeClass("display-hidden");
            let data = $(e.target);
            let section = data.attr('data-section');
            $("#allBrands, #newBrands, #notJoinedBrands, #joinedBrands, #newBrands, #pendingBrands, #holdBrands, #rejectedBrands").removeClass("active");
            if (section === "all") {
                $("#allBrands").addClass("active");
                section = null;
            }
            else if (section === "new") {
                $("#newBrands").addClass("active");
            }
            else if (section === "joined") {
                $("#joinedBrands").addClass("active");
            }
            else if (section === "not-joined") {
                $("#notJoinedBrands").addClass("active");
            }
            else if (section === "pending") {
                $("#pendingBrands").addClass("active");
            }
            else if (section === "hold") {
                $("#holdBrands").addClass("active");
            }
            else if (section === "rejected") {
                $("#rejectedBrands").addClass("active");
            }

            let dataObj = { section };
            fetchAdvertisers(section, dataObj, true);
        });

        $("#ap-tabContent").addClass("spin-active");
        $("#gridLoader3").removeClass("display-hidden");
        let section = "{{ $section }}";
        let page = "{{ $page }}";
        let dataObj = { section, page };
        fetchAdvertisers(section, dataObj);

        $("#applyAdvertiser").submit(function () {
            $("#applyAdvertiserBttn").prop('disabled', true);
        });
    });
</script>
@endpushonce

@section("content")

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-breadcrumb">

                        <div class="breadcrumb-main">
                            <h1 class="title">Advertisers</h1>
                            <div class="d-flex justify-content-end flex-wrap">
                                <span class="subtitle">
                                    Total <span id="totalAdvertiser">0</span> advertisers found
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="products_page product_page--grid mb-30">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <!-- Horizontal Filters -->
                    <div class="horizontal-filters">
                        <div class="filter-header">
                            <h5 class="mb-0"><i class="ri-filter-3-line"></i> Filters</h5>
                        </div>

                        <div class="filter-grid">

                            <!-- Country Filter -->
                            <div class="filter-card">
                                <div class="filter-title">
                                    <h6>Country</h6>
                                    <a href="javascript:void(0)" id="clearSearchByCountry"
                                        onclick="clearFilter('clearSearchByCountry')"
                                        class="clear-filter {{ request()->search_by_country ? '' : 'display-hidden' }}">
                                        <small>Clear</small>
                                    </a>
                                </div>
                                <select id="SearchByCountry" class="form-control form-control-sm" multiple>
                                    <?php
    $countriesArr = [];
    if (request()->search_by_country && str_contains(request()->search_by_country, ',')) {
        $countriesArr = explode(',', request()->search_by_country);
    } else if (request()->search_by_country) {
        $countriesArr = [request()->search_by_country];
    }
                                        ?>
                                    @foreach($countries as $country)
                                        <option @if(in_array($country['iso2'], $countriesArr)) selected @endif
                                            value="{{ $country['iso2'] }}">{{ $country['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Advertiser Type Filter -->
                            <div class="filter-card">
                                <div class="filter-title">
                                    <h6>Advertiser Type</h6>
                                </div>
                                <select class="form-select" id="advertiserType">
                                    <option value="all" {{ request()->type == "third_party_advertiser" || empty(request()->type) ? "selected" : "" }}>All Advertisers</option>
                                    <option value="third_party_advertiser" {{ request()->type == "third_party_advertiser" ? "selected" : "" }}>Third-Party
                                        Advertisers</option>
                                    <option value="managed_by_linksCircle" {{ request()->type == "managed_by_linksCircle" ? "selected" : "" }}>Managed by
                                        LinksCircle</option>
                                </select>
                            </div>

                            <!-- Category Filter -->
                            <div class="filter-card">
                                <div class="filter-title">
                                    <h6>Categories</h6>
                                    <a href="javascript:void(0)" id="clearSearchByCategory"
                                        onclick="clearFilter('clearSearchByCategory')"
                                        class="clear-filter {{ request()->search_by_category ? '' : 'display-hidden' }}">
                                        <small>Clear</small>
                                    </a>
                                </div>
                                <select id="SearchByCategory" class="form-control" multiple>
                                    <?php
                                        $categoryArr = [];
                                        if (request()->search_by_category && str_contains(request()->search_by_category, ',')) {
                                            $categoryArr = explode(',', request()->search_by_category);
                                        } else if (request()->search_by_category) {
                                            $categoryArr = [request()->search_by_category];
                                        }
                                    ?>
                                    @foreach($categories as $category)
                                        <option @if(in_array($category['id'], $categoryArr)) selected @endif
                                            value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Promotional Methods Filter -->
                            <div class="filter-card">
                                <div class="filter-title">
                                    <h6>Promotional Methods</h6>
                                    <a href="javascript:void(0)" id="clearSearchByPromotionalMethod"
                                        onclick="clearFilter('clearSearchByPromotionalMethod')"
                                        class="clear-filter {{ request()->search_by_promotional_method ? '' : 'display-hidden' }}">
                                        <small>Clear</small>
                                    </a>
                                </div>
                                <select id="SearchByPromotionalMethod" class="form-select form-select-sm" multiple>
                                    <?php
                                            $promotionalArr = [];
                                            if (request()->search_by_promotional_method && str_contains(request()->search_by_promotional_method, ',')) {
                                                $promotionalArr = explode(',', request()->search_by_promotional_method);
                                            } else if (request()->search_by_promotional_method) {
                                                $promotionalArr = [request()->search_by_promotional_method];
                                            }
                                    ?>
                                    @foreach($methods as $method)
                                        <option @if(in_array($method['id'], $promotionalArr)) selected @endif
                                            value="{{ $method['id'] }}">{{ $method['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="columns-2 col-lg-12 col-md-7 col-sm-8 order-md-1 order-0">
                        <!-- End: Top Bar -->
                        @include("partial.admin.alert")
                        <div class="tab-content mt-25" id="ap-tabContent">
                            @include("template.publisher.widgets.loader-3")
                            <div class="table-container">
                                <div class="d-flex justify-content-between aling-items-center">

                                <div class="search-box">
                                    <i class="ri-search-line search-icon"></i>
                                    <input class="search-input" type="text" id="SearchByName" placeholder="Search by Name"
                                        value="{{ request()->search_by_name }}">
                                </div>
                        <!-- Start: Top Bar -->
                                        <nav class="header-nav">
                                            <ul class="nav" id="ap-tab" role="tablist">
                                                @if(request()->route()->getName() != "publisher.own-advertisers")
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ !request()->section || request()->section == "all" ? "active" : null }}"
                                                            data-section="all" href="javascript:void(0)" id="allBrands">All
                                                            Brands</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ request()->section == "new" ? "active" : null }}"
                                                            data-section="new" href="javascript:void(0)" id="newBrands">New</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ request()->section == "not-joined" ? "active" : null }}"
                                                            data-section="not-joined" href="javascript:void(0)"
                                                            id="notJoinedBrands">Not Joined</a>
                                                    </li>
                                                @endif
                                                @if(request()->route()->getName() != "publisher.own-advertisers")
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ request()->section == "pending" ? "active" : null }}"
                                                            data-section="pending" href="javascript:void(0)"
                                                            id="pendingBrands">Pending</a>
                                                    </li>
                                                @endif
                                                @if(request()->route()->getName() == "publisher.own-advertisers")
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ request()->section == "joined" || (request()->route()->getName() == "publisher.own-advertisers" && empty(request()->section)) ? "active" : null }}"
                                                            data-section="joined" href="javascript:void(0)"
                                                            id="joinedBrands"><span class="nav-text">Joined</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ request()->section == "hold" ? "active" : null }}"
                                                            data-section="hold" href="javascript:void(0)"
                                                            id="holdBrands"><span class="nav-text">Hold</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ request()->section == "rejected" ? "active" : null }}"
                                                            data-section="rejected" href="javascript:void(0)"
                                                            id="rejectedBrands"><span class="nav-text">Rejected</span></a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </nav>

                                    <div class="dropdown action-btn">
                                        <button class="btn btn-sm btn-primary-outline dropdown-toggle" type="button"
                                            id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="la la-download"></i> Export
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <span class="dropdown-item">Export With</span>
                                            <div class="dropdown-divider"></div>
                                            @php
                                                $queryParams = request()->all();
                                            @endphp
                                            <a href="{{ route("publisher.export-advertisers", array_merge(['type' => 'xlsx'], $queryParams)) }}"
                                                class="dropdown-item" id="exportXLSX">
                                                <i class="la la-file-excel"></i> Excel (XLSX)</a>
                                            <a href="{{ route("publisher.export-advertisers", array_merge(['type' => 'csv'], $queryParams)) }}"
                                                class="dropdown-item" id="exportCSV">
                                                <i class="la la-file-csv"></i> CSV</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show active" id="ap-overview" role="tabpanel"
                                    aria-labelledby="ap-overview-tab">
                                </div>
                            </div>
                        </div>
                    </div><!-- End: .columns-2 -->
                </div>
            </div>
        </div><!-- End: .products -->

        <!-- .atbd-drawer -->
        <div class="drawer-basic-wrap right account">
            <div class="atbd-drawer drawer-account d-none">
                <div class="atbd-drawer__header d-flex aling-items-center justify-content-between">
                    <h6 class="drawer-title">Send Message To The Advertiser</h6>
                    <a href="#" class="btdrawer-close"><i class="la la-times"></i></a>
                </div><!-- ends: .atbd-drawer__header -->
                <div class="atbd-drawer__body">
                    <div class="drawer-content">
                        <div class="drawer-account-form form-basic">
                            <form action="{{ route("publisher.send-msg-to-advertiser") }}" method="POST">
                                @csrf
                                <input type="hidden" name="advertiser_id" id="advertiser_id">

                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <label for="username">From</label>
                                        <input type="text" name="publisher_name" id="publisher_name"
                                            class="form-control form-control-sm" placeholder="Publisher Name"
                                            value="{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}"
                                            readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="to">To</label>
                                        <input type="text" name="advertiser_name" id="advertiser_name"
                                            class="form-control form-control-sm" placeholder="Advertiser Name" readonly>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="subject">Subject</label>
                                        <input type="text" name="subject" id="subject" class="form-control form-control-sm"
                                            placeholder="Please Enter Subject For This Message">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="question_or_comment">Your Question or Comments</label>
                                        <textarea name="question_or_comment" id="question_or_comment"
                                            class="form-control form-control-sm"
                                            placeholder="Please Enter Your Question or Comments"></textarea>
                                    </div>
                                    <button class="btn btn-primary btn-default btn-squared ">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- ends: .atbd-drawer__body -->
            </div>
        </div>
        <div class="overlay-dark"></div>
        <div class="overlay-dark-l2"></div>
        <!-- ends: .atbd-drawer -->
        <div class="modal-basic modal fade" id="modal-basic" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <form action="{{ route("publisher.apply-advertiser") }}" method="POST" id="applyAdvertiser">
                    @csrf
                    <input type="hidden" id="a_id" name="a_id">
                    <input type="hidden" id="a_name" name="a_name">
                    <div class="modal-content modal-bg-white ">
                        <div class="modal-header">
                            <h6 class="modal-title">Apply To Program</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span data-feather="x"></span></button>
                        </div>
                        <div class="modal-body">
                            <h6 class="ap-nameAddress__title text-black" id="advertiserName"></h6>
                            <h6 class="ap-nameAddress__subTitle text-left justify-content-start fs-14 pt-1 m-0"
                                id="advertiserID"></h6>
                            <p class="font-weight-bold mt-3 text-black">Optional: Tell us about your promotional
                                methods and general marketing plan for this merchant to help speed up approval.
                                (Websites you'll use, PPC terms, etc.)</p>
                            <textarea class="form-control" rows="4" cols="4" name="message"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="applyAdvertiserBttn" class="btn btn-primary btn-sm">Apply</button>
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
