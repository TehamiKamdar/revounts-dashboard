<div class="card broder-0 mb-20">
    <div class="card-body pt-0" id="performanceCardContent">
        <div class="tab-content perfomence-tab-wrap" id="performanceTabWrapper">
            <div class="tab-pane fade active show" id="w_perfomence-year" role="tabpanel" aria-labelledby="w_perfomence-year">
                <div class="performance-stats nav-tabs nav">
                    <a href="#commission" class="active" data-toggle="tab" id="commission-tab" role="tab" area-controls="commission" aria-selected="false">
                        @if(request()->start_date && request()->end_date)
                            <div class="performance-stats__down">
                                <span>Total Commissions</span>
                                <strong>
                                    {{ $performanceOverview['commission']['count'] ?? 0 }}
                                </strong>
                            </div>
                        @else
                            @if(isset($performanceOverview['commission']['growth']) && $performanceOverview['commission']['growth'] == "up")
                                <div class="performance-stats__up">
                                    <span>Total Commissions</span>
                                    <strong>
                                        {{ $performanceOverview['commission']['count'] ?? 0 }}
                                        <sub>
                                            <i class="la la-arrow-up"></i>
                                            {{ $performanceOverview['commission']['percentage'] ?? 0 }}
                                        </sub>
                                    </strong>
                                </div>
                            @else
                                <div class="performance-stats__down">
                                    <span>Total Commissions</span>
                                    <strong>
                                        {{ $performanceOverview['commission']['count'] ?? 0 }}
                                        <sub>
                                            <i class="la la-arrow-down"></i>
                                            {{ $performanceOverview['commission']['percentage'] ?? 0 }}
                                        </sub>
                                    </strong>
                                </div>
                            @endif
                        @endif
                    </a>
@php
    $commissionPercent = (float) \App\Helper\Static\Vars::COMMISSION_PERCENTAGE / 100;
    $rawValue = $performanceOverview['commission']['count'] ?? 0;

    // Extract numeric part
    preg_match('/([\d\.]+)/', $rawValue, $matches);
    $number = (float) ($matches[1] ?? 0);

    // Check for suffix (k, m, etc.)
    $suffix = '';
    if (stripos($rawValue, 'k') !== false) {
        $number *= 1000;
        $suffix = 'k';
    } elseif (stripos($rawValue, 'm') !== false) {
        $number *= 1000000;
        $suffix = 'm';
    }

    $calculated = $commissionPercent * $number;

    // Format result with suffix again
    if ($suffix === 'k') {
        $calculated = round($calculated / 1000, 1) . 'k';
    } elseif ($suffix === 'm') {
        $calculated = round($calculated / 1000000, 1) . 'm';
    }
@endphp
                     <a href="#commission" class="active" data-toggle="tab" id="commission-revenue-tab" role="tab" area-controls="commission" aria-selected="false">
                        @if(request()->start_date && request()->end_date)
                            <div class="performance-stats__down">
                                <span>Total Revenue</span>
                                <strong>
                                   {{ $calculated }}
                                </strong>
                            </div>
                        @else
                            @if(isset($performanceOverview['commission']['growth']) && $performanceOverview['commission']['growth'] == "up")
                                <div class="performance-stats__up">
                                    <span>Total Revenue</span>
                                    <strong>
                                      {{ $calculated }}
                                        <sub>
                                            <i class="la la-arrow-up"></i>
                                            {{ $performanceOverview['commission']['percentage'] ?? 0 }}
                                        </sub>
                                    </strong>
                                </div>
                            @else
                                <div class="performance-stats__down">
                                    <span>Total Revenue</span>
                                    <strong>
{{ $calculated }}
                                        <sub>
                                            <i class="la la-arrow-down"></i>
                                            {{ $performanceOverview['commission']['percentage'] ?? 0 }}
                                        </sub>
                                    </strong>
                                </div>
                            @endif
                        @endif
                    </a>

                    <a href="#approvedcommission" data-toggle="tab" id="approved-commission-tab" role="tab" area-controls="approvedcommission" aria-selected="false">
                        @if(request()->start_date && request()->end_date)
                            <div class="performance-stats__down">
                                <span>Total Approved Commissions</span>
                                <strong>
                                    {{ $performanceOverview['approved']['count'] ?? 0 }}
                                </strong>
                            </div>
                        @else
                            @if(isset($performanceOverview['approved']['growth']) && $performanceOverview['approved']['growth'] == "up")
                                <div class="performance-stats__up">
                                    <span>Total Approved Commissions</span>
                                    <strong>
                                        {{ $performanceOverview['approved']['count'] ?? 0 }}
                                        <sub>
                                            <i class="la la-arrow-up"></i>
                                            {{ $performanceOverview['approved']['percentage'] ?? 0 }}
                                        </sub>
                                    </strong>
                                </div>
                            @else
                                <div class="performance-stats__down">
                                    <span>Total Approved Commissions</span>
                                    <strong>
                                        {{ $performanceOverview['approved']['count'] ?? 0 }}
                                        <sub>
                                            <i class="la la-arrow-down"></i>
                                            {{ $performanceOverview['approved']['percentage'] ?? 0 }}
                                        </sub>
                                    </strong>
                                </div>
                            @endif
                        @endif
                    </a>

                    <a href="#pendingcommission" data-toggle="tab" id="pending-commission-tab" role="tab" area-controls="pendingcommission" aria-selected="false">
                        @if(request()->start_date && request()->end_date)
                            <div class="performance-stats__down">
                                <span>Total Pending Commissions</span>
                                <strong>
                                    {{ $performanceOverview['pending']['count'] ?? 0 }}
                                </strong>
                            </div>
                        @else
                            @if(isset($performanceOverview['pending']['growth']) && $performanceOverview['pending']['growth'] == "up")
                                <div class="performance-stats__up">
                                    <span>Total Pending Commissions</span>
                                    <strong>
                                        {{ $performanceOverview['pending']['count'] ?? 0 }}
                                        <sub>
                                            <i class="la la-arrow-up"></i>
                                            {{ $performanceOverview['pending']['percentage'] ?? 0 }}
                                        </sub>
                                    </strong>
                                </div>
                            @else
                                <div class="performance-stats__down">
                                    <span>Total Pending Commissions</span>
                                    <strong>
                                        {{ $performanceOverview['pending']['count'] ?? 0 }}
                                        <sub>
                                            <i class="la la-arrow-down"></i>
                                            {{ $performanceOverview['pending']['percentage'] ?? 0 }}
                                        </sub>
                                    </strong>
                                </div>
                            @endif
                        @endif
                    </a>

                     <a href="#declinedcommission" data-toggle="tab" id="declined-commission-tab" role="tab" area-controls="declinedcommission" aria-selected="false">
                        @if(request()->start_date && request()->end_date)
                            <div class="performance-stats__down">
                                <span>Total Declined Commissions</span>
                                <strong>
                                    {{ $performanceOverview['declined']['count'] ?? 0 }}
                                </strong>
                            </div>
                        @else
                            @if(isset($performanceOverview['declined']['growth']) && $performanceOverview['declined']['growth'] == "up")
                                <div class="performance-stats__up">
                                    <span>Total Declined Commissions</span>
                                    <strong>
                                        {{ $performanceOverview['declined']['count'] ?? 0 }}
                                        <sub>
                                            <i class="la la-arrow-up"></i>
                                            {{ $performanceOverview['declined']['percentage'] ?? 0 }}
                                        </sub>
                                    </strong>
                                </div>
                            @else
                                <div class="performance-stats__down">
                                    <span>Total Declined Commissions</span>
                                    <strong>
                                        {{ $performanceOverview['declined']['count'] ?? 0 }}
                                        <sub>
                                            <i class="la la-arrow-down"></i>
                                            {{ $performanceOverview['declined']['percentage'] ?? 0 }}
                                        </sub>
                                    </strong>
                                </div>
                            @endif
                        @endif
                    </a>

                    <a href="#transaction" data-toggle="tab" id="transaction-tab" role="tab" area-controls="transaction" aria-selected="false">
                        @if(request()->start_date && request()->end_date)
                            <div class="performance-stats__down">
                                <span>Total Transactions</span>
                                <strong>
                                    {{ $performanceOverview['transaction']['count'] ?? 0 }}
                                </strong>
                            </div>
                        @else
                            @if(isset($performanceOverview['transaction']['growth']) && $performanceOverview['transaction']['growth'] == "up")
                                <div class="performance-stats__up">
                                    <span>Total Transactions</span>
                                    <strong>
                                        {{ $performanceOverview['transaction']['count'] ?? 0 }}
                                        <sub>
                                            <i class="la la-arrow-up"></i>
                                            {{ $performanceOverview['transaction']['percentage'] ?? 0 }}
                                        </sub>
                                    </strong>
                                </div>
                            @else
                                <div class="performance-stats__down">
                                    <span>Total Transactions</span>
                                    <strong>
                                        {{ $performanceOverview['transaction']['count'] ?? 0 }}
                                        <sub>
                                            <i class="la la-arrow-down"></i>
                                            {{ $performanceOverview['transaction']['percentage'] ?? 0 }}
                                        </sub>
                                    </strong>
                                </div>
                            @endif
                        @endif
                    </a>

                    <a href="#sale" data-toggle="tab" id="sale-tab" role="tab" area-controls="sale" aria-selected="true">
                        @if(request()->start_date && request()->end_date)
                            <div class="performance-stats__down">
                                <span>Total Sales</span>
                                <strong>
                                    {{ $performanceOverview['sale']['count'] ?? 0 }}
                                </strong>
                            </div>
                        @else
                            @if(isset($performanceOverview['sale']['growth']) && $performanceOverview['sale']['growth'] == "up")
                                <div class="performance-stats__up">
                                    <span>Total Sales</span>
                                    <strong>
                                        {{ $performanceOverview['sale']['count'] ?? 0 }}
                                        <sub>
                                            <i class="la la-arrow-up"></i>
                                            {{ $performanceOverview['sale']['percentage'] ?? 0 }}
                                        </sub>
                                    </strong>
                                </div>
                            @else
                                <div class="performance-stats__down">
                                    <span>Total Sales</span>
                                    <strong>
                                        {{ $performanceOverview['sale']['count'] ?? 0 }}
                                        <sub>
                                            <i class="la la-arrow-down"></i>
                                            {{ $performanceOverview['sale']['percentage'] ?? 0 }}
                                        </sub>
                                    </strong>
                                </div>
                            @endif
                        @endif
                    </a>

{{--                    <a href="#click" data-toggle="tab" id="click-tab" role="tab" area-controls="click" aria-selected="false">--}}
{{--                        @if(request()->start_date && request()->end_date)--}}
{{--                            <div class="performance-stats__down">--}}
{{--                                <span>Total Clicks</span>--}}
{{--                                <strong>--}}
{{--                                    {{ $performanceOverview['click']['count'] ?? 0 }}--}}
{{--                                </strong>--}}
{{--                            </div>--}}
{{--                        @else--}}
{{--                            @if(isset($performanceOverview['click']['growth']) && $performanceOverview['click']['growth'] == "up")--}}
{{--                                <div class="performance-stats__up">--}}
{{--                                    <span>Total Clicks</span>--}}
{{--                                    <strong>--}}
{{--                                        {{ $performanceOverview['click']['count'] ?? 0 }}--}}
{{--                                        <sub>--}}
{{--                                            <i class="la la-arrow-up"></i>--}}
{{--                                            {{ $performanceOverview['click']['percentage'] ?? 0 }}--}}
{{--                                        </sub>--}}
{{--                                    </strong>--}}
{{--                                </div>--}}
{{--                            @else--}}
{{--                                <div class="performance-stats__down">--}}
{{--                                    <span>Total Clicks</span>--}}
{{--                                    <strong>--}}
{{--                                        {{ $performanceOverview['click']['count'] ?? 0 }}--}}
{{--                                        <sub>--}}
{{--                                            <i class="la la-arrow-down"></i>--}}
{{--                                            {{ $performanceOverview['click']['percentage'] ?? 0 }}--}}
{{--                                        </sub>--}}
{{--                                    </strong>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        @endif--}}
{{--                    </a>--}}
                </div>
                <!-- ends: .performance-stats -->

                <div class="wp-chart perfomence-chart">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="commission" role="tabpanel" aria-labelledby="commission-tab">
                            <div class="parentContainer">
                                <div id="commissionChartContent">
                                    <canvas id="commissionChart"></canvas>
                                </div>
                            </div>
                            <ul class="legend-static" id="commissionPeriodContent">
                                <li class="custom-label">
                                    <span style="background-color: rgb(95, 99, 242);"></span>Current Period
                                </li>
                                <li class="custom-label">
                                    <span style="background-color: #C6D0DC"></span>Previous Period
                                </li>
                            </ul>
                        </div>

                        <div class="tab-pane fade" id="pendingcommission" role="tabpanel" aria-labelledby="pending-commission-tab">
                            <div class="parentContainer">
                                <div id="pendingcommissionChartContent">
                                    <canvas id="pendingcommissionChart"></canvas>
                                </div>
                            </div>
                            <ul class="legend-static" id="pendingcommissionPeriodContent">
                                <li class="custom-label">
                                    <span style="background-color: rgb(95, 99, 242);"></span>Current Period
                                </li>
                                <li class="custom-label">
                                    <span style="background-color: #C6D0DC"></span>Previous Period
                                </li>
                            </ul>
                        </div>


                        <div class="tab-pane fade" id="declinedcommission" role="tabpanel" aria-labelledby="declined-commission-tab">
                            <div class="parentContainer">
                                <div id="declinedcommissionChartContent">
                                    <canvas id="declinedcommissionChart"></canvas>
                                </div>
                            </div>
                            <ul class="legend-static" id="declinedcommissionPeriodContent">
                                <li class="custom-label">
                                    <span style="background-color: rgb(95, 99, 242);"></span>Current Period
                                </li>
                                <li class="custom-label">
                                    <span style="background-color: #C6D0DC"></span>Previous Period
                                </li>
                            </ul>
                        </div>

                        <div class="tab-pane fade" id="approvedcommission" role="tabpanel" aria-labelledby="approved-commission-tab">
                            <div class="parentContainer">
                                <div id="approvedcommissionChartContent">
                                    <canvas id="approvedcommissionChart"></canvas>
                                </div>
                            </div>
                            <ul class="legend-static" id="approvedcommissionPeriodContent">
                                <li class="custom-label">
                                    <span style="background-color: rgb(95, 99, 242);"></span>Current Period
                                </li>
                                <li class="custom-label">
                                    <span style="background-color: #C6D0DC"></span>Previous Period
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="transaction" role="tabpanel" aria-labelledby="transaction-tab">
                            <div class="parentContainer" id="transactionChartContent">
                                <div>
                                    <canvas id="transactionChart"></canvas>
                                </div>
                            </div>
                            <ul class="legend-static" id="transactionPeriodContent">
                                <li class="custom-label">
                                    <span style="background-color: rgb(95, 99, 242);"></span>Current Period
                                </li>
                                <li class="custom-label">
                                    <span style="background-color: #C6D0DC"></span>Previous Period
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="sale" role="tabpanel" aria-labelledby="sale-tab">
                            <div class="parentContainer" id="saleChartContent">
                                <div>
                                    <canvas id="saleChart"></canvas>
                                </div>
                            </div>
                            <ul class="legend-static" id="salePeriodContent">
                                <li class="custom-label">
                                    <span style="background-color: rgb(95, 99, 242);"></span>Current Period
                                </li>
                                <li class="custom-label">
                                    <span style="background-color: #C6D0DC"></span>Previous Period
                                </li>
                            </ul>
                        </div>
{{--                        <div class="tab-pane fade" id="click" role="tabpanel" aria-labelledby="click-tab">--}}
{{--                            <div class="parentContainer" id="clickChartContent">--}}
{{--                                <div>--}}
{{--                                    <canvas id="clickChart"></canvas>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <ul class="legend-static" id="clickPeriodContent">--}}
{{--                                <li class="custom-label">--}}
{{--                                    <span style="background-color: rgb(95, 99, 242);"></span>Current Period--}}
{{--                                </li>--}}
{{--                                <li class="custom-label">--}}
{{--                                    <span style="background-color: #C6D0DC"></span>Previous Period--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ends: .card-body -->
</div>

@push("extended_scripts")
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/Chart.min.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/charts.js") }}"></script>

    <script>

        function commissionChartLine()
        {
            let labels = @json($performanceOverview['extra']['labels'] ?? []);

            @if(request()->start_date && request()->end_date)
                let data = @json($performanceOverview['commission']['commission'] ?? []);
                chartjsLineChartFive(
                    "commissionChart",
                    "#FA8B0C",
                    "45",
                    (data = data),
                    labels = labels,
                    {{ $performanceOverview['commission']['min_value'] ?? 0 }},
                    {{ $performanceOverview['commission']['max_value'] ?? 0 }}
                );
                $("#commissionPeriodContent").html(`
                    <li class="custom-label">
                        <span style="background-color: rgb(95, 99, 242);"></span>Custom Period
                    </li>
                `)
            @else
                let currentMonth = @json($performanceOverview['commission']['dailyCurrentMonth'] ?? []);
                let previousMonth = @json($performanceOverview['commission']['dailyPreviousMonth'] ?? []);
                chartjsLineChartFour(
                    "commissionChart",
                    "#FA8B0C",
                    "45",
                    (data = currentMonth),
                    (data = previousMonth),
                    labels = labels,
                    {{ $performanceOverview['commission']['min_value'] ?? 0 }},
                    {{ $performanceOverview['commission']['max_value'] ?? 0 }}
                );
            @endif
        }


          function approvedcommissionChartLine()
        {
            let labels = @json($performanceOverview['extra']['labels'] ?? []);

            @if(request()->start_date && request()->end_date)
                let data = @json($performanceOverview['approved']['commission'] ?? []);
                chartjsLineChartFive(
                    "approvedcommissionChart",
                    "#FA8B0C",
                    "45",
                    (data = data),
                    labels = labels,
                    {{ $performanceOverview['approved']['min_value'] ?? 0 }},
                    {{ $performanceOverview['approved']['max_value'] ?? 0 }}
                );
                $("#approvedcommissionPeriodContent").html(`
                    <li class="custom-label">
                        <span style="background-color: rgb(95, 99, 242);"></span>Custom Period
                    </li>
                `)
            @else
                let currentMonth = @json($performanceOverview['approved']['dailyCurrentMonth'] ?? []);
                let previousMonth = @json($performanceOverview['approved']['dailyPreviousMonth'] ?? []);
                chartjsLineChartFour(
                    "approvedcommissionChart",
                    "#FA8B0C",
                    "45",
                    (data = currentMonth),
                    (data = previousMonth),
                    labels = labels,
                    {{ $performanceOverview['approved']['min_value'] ?? 0 }},
                    {{ $performanceOverview['approved']['max_value'] ?? 0 }}
                );
            @endif
        }



          function pendingcommissionChartLine()
        {
            let labels = @json($performanceOverview['extra']['labels'] ?? []);

            @if(request()->start_date && request()->end_date)
                let data = @json($performanceOverview['pending']['commission'] ?? []);
                chartjsLineChartFive(
                    "pendingcommissionChart",
                    "#FA8B0C",
                    "45",
                    (data = data),
                    labels = labels,
                    {{ $performanceOverview['pending']['min_value'] ?? 0 }},
                    {{ $performanceOverview['pending']['max_value'] ?? 0 }}
                );
                $("#pendingcommissionPeriodContent").html(`
                    <li class="custom-label">
                        <span style="background-color: rgb(95, 99, 242);"></span>Custom Period
                    </li>
                `)
            @else
                let currentMonth = @json($performanceOverview['pending']['dailyCurrentMonth'] ?? []);
                let previousMonth = @json($performanceOverview['pending']['dailyPreviousMonth'] ?? []);
                chartjsLineChartFour(
                    "pendingcommissionChart",
                    "#FA8B0C",
                    "45",
                    (data = currentMonth),
                    (data = previousMonth),
                    labels = labels,
                    {{ $performanceOverview['pending']['min_value'] ?? 0 }},
                    {{ $performanceOverview['pending']['max_value'] ?? 0 }}
                );
            @endif
        }




          function declinedcommissionChartLine()
        {
            let labels = @json($performanceOverview['extra']['labels'] ?? []);

            @if(request()->start_date && request()->end_date)
                let data = @json($performanceOverview['declined']['commission'] ?? []);
                chartjsLineChartFive(
                    "declinedcommissionChart",
                    "#FA8B0C",
                    "45",
                    (data = data),
                    labels = labels,
                    {{ $performanceOverview['declined']['min_value'] ?? 0 }},
                    {{ $performanceOverview['declined']['max_value'] ?? 0 }}
                );
                $("#declinedcommissionPeriodContent").html(`
                    <li class="custom-label">
                        <span style="background-color: rgb(95, 99, 242);"></span>Custom Period
                    </li>
                `)
            @else
                let currentMonth = @json($performanceOverview['declined']['dailyCurrentMonth'] ?? []);
                let previousMonth = @json($performanceOverview['declined']['dailyPreviousMonth'] ?? []);
                chartjsLineChartFour(
                    "declinedcommissionChart",
                    "#FA8B0C",
                    "45",
                    (data = currentMonth),
                    (data = previousMonth),
                    labels = labels,
                    {{ $performanceOverview['declined']['min_value'] ?? 0 }},
                    {{ $performanceOverview['declined']['max_value'] ?? 0 }}
                );
            @endif
        }

        function transactionChartLine()
        {
            let labels = @json($performanceOverview['extra']['labels'] ?? []);

            @if(request()->start_date && request()->end_date)
                let data = @json($performanceOverview['transaction']['transaction'] ?? []);
                chartjsLineChartFive(
                    "transactionChart",
                    "#FA8B0C",
                    "45",
                    (data = data),
                    labels = labels,
                    {{ $performanceOverview['transaction']['min_value'] ?? 0 }},
                    {{ $performanceOverview['transaction']['max_value'] ?? 0 }}
                );
            $("#transactionPeriodContent").html(`
                <li class="custom-label">
                        <span style="background-color: rgb(95, 99, 242);"></span>Custom Period
                    </li>
            `)
            @else
                let currentMonth = @json($performanceOverview['transaction']['dailyCurrentMonth'] ?? []);
                let previousMonth = @json($performanceOverview['transaction']['dailyPreviousMonth'] ?? []);
                chartjsLineChartFour(
                    "transactionChart",
                    "#FA8B0C",
                    "45",
                    (data = currentMonth),
                    (data = previousMonth),
                    labels = labels,
                    {{ $performanceOverview['transaction']['min_value'] ?? 0 }},
                    {{ $performanceOverview['transaction']['max_value'] ?? 0 }}
                );
            @endif
        }

        function saleChartLine()
        {
            let labels = @json($performanceOverview['extra']['labels'] ?? []);

            @if(request()->start_date && request()->end_date)
                let data = @json($performanceOverview['sale']['sale'] ?? []);
                chartjsLineChartFive(
                    "saleChart",
                    "#FA8B0C",
                    "45",
                    (data = data),
                    labels = labels,
                    {{ $performanceOverview['sale']['min_value'] ?? 0 }},
                    {{ $performanceOverview['sale']['max_value'] ?? 0 }}
                );
            $("#salePeriodContent").html(`
                <li class="custom-label">
                        <span style="background-color: rgb(95, 99, 242);"></span>Custom Period
                    </li>
            `)
            @else
                let currentMonth = @json($performanceOverview['sale']['dailyCurrentMonth'] ?? []);
                let previousMonth = @json($performanceOverview['sale']['dailyPreviousMonth'] ?? []);
                chartjsLineChartFour(
                    "saleChart",
                    "#FA8B0C",
                    "45",
                    (data = currentMonth),
                    (data = previousMonth),
                    labels = labels,
                    {{ $performanceOverview['sale']['min_value'] ?? 0 }},
                    {{ $performanceOverview['sale']['max_value'] ?? 0 }}
                );
            @endif
        }

        {{--function clickChartLine()--}}
        {{--{--}}
        {{--    let labels = @json($performanceOverview['extra']['labels'] ?? []);--}}
        {{--    @if(request()->start_date && request()->end_date)--}}
        {{--        let data = @json($performanceOverview['click']['click'] ?? []);--}}
        {{--        chartjsLineChartFive(--}}
        {{--            "clickChart",--}}
        {{--            "#FA8B0C",--}}
        {{--            "45",--}}
        {{--            (data = data),--}}
        {{--            labels = labels,--}}
        {{--            {{ $performanceOverview['click']['min_value'] ?? 0 }},--}}
        {{--            {{ $performanceOverview['click']['max_value'] ?? 0 }}--}}
        {{--        );--}}
        {{--    $("#clickPeriodContent").html(`--}}
        {{--        <li class="custom-label">--}}
        {{--                <span style="background-color: rgb(95, 99, 242);"></span>Custom Period--}}
        {{--            </li>--}}
        {{--    `)--}}
        {{--    @else--}}
        {{--        let currentMonth = @json($performanceOverview['click']['dailyCurrentMonth'] ?? []);--}}
        {{--        let previousMonth = @json($performanceOverview['click']['dailyPreviousMonth'] ?? []);--}}
        {{--        chartjsLineChartFour(--}}
        {{--            "clickChart",--}}
        {{--            "#FA8B0C",--}}
        {{--            "45",--}}
        {{--            (data = currentMonth),--}}
        {{--            (data = previousMonth),--}}
        {{--            labels = labels,--}}
        {{--            {{ $performanceOverview['click']['min_value'] ?? 0 }},--}}
        {{--            {{ $performanceOverview['click']['max_value'] ?? 0 }}--}}
        {{--        );--}}
        {{--    @endif--}}
        {{--}--}}

        document.addEventListener("DOMContentLoaded", function () {
            commissionChartLine();
            approvedcommissionChartLine();
            pendingcommissionChartLine();
            declinedcommissionChartLine();
            transactionChartLine();
            saleChartLine();
            // clickChartLine();
        });
    </script>

@endpush
