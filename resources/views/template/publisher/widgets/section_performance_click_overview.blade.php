
    <div class="performance-glass-card card border-0">
        <div class="card-body pt-0" id="performanceCardContent">
            <div class="tab-content tab-content-glass" id="performanceTabWrapper">
                <div class="tab-pane fade active show" id="w_perfomence-year" role="tabpanel" aria-labelledby="w_perfomence-year">
                    <div class="d-flex justify-content-end gap-4 mb-4">
                        <a href="#click" class="stats-pill active" data-toggle="tab" id="click-tab" role="tab" aria-controls="click" aria-selected="false">
                            @if(isset($performanceOverview['growth']['position']) && $performanceOverview['growth']['position'] == "up")
                                <div>
                                    <span class="stat-label">Total Clicks</span>
                                    <div class="stat-value">
                                        {{ $performanceOverview['currentPeriod']['count'] ?? 0 }}
                                        <span class="growth-indicator growth-up">
                                            <i class="ri-arrow-up-line"></i>
                                            {{ number_format($performanceOverview['growth']['percentage'] ?? 0, 2) }}%
                                        </span>
                                    </div>
                                </div>
                            @else
                                <div>
                                    <span class="stat-label">Total Clicks</span>
                                    <div class="stat-value">
                                        {{ $performanceOverview['currentPeriod']['count'] ?? 0 }}
                                        <span class="growth-indicator growth-down">
                                            <i class="ri-arrow-down-line"></i>
                                            {{ number_format($performanceOverview['growth']['percentage'] ?? 0, 2) }}%
                                        </span>
                                    </div>
                                </div>
                            @endif
                        </a>
                    </div>

                    <div class="chart-container-glass">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="click" role="tabpanel" aria-labelledby="click-tab">
                                <div class="parentContainer" id="clickChartContent">
                                    <div>
                                        <canvas id="clickChart"></canvas>
                                    </div>
                                </div>
                                <div class="chart-legend-minimal" id="clickPeriodContent">
                                    <div class="legend-item-minimal">
                                        <div class="legend-dot dot-current"></div>
                                        <span>Current Period</span>
                                    </div>
                                    <div class="legend-item-minimal">
                                        <div class="legend-dot dot-previous"></div>
                                        <span>Previous Period</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@push("extended_scripts")
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/Chart.min.js") }}"></script>
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/charts.js") }}"></script>

    <script>

        function clickChartLine()
        {
            let labels = @json($performanceOverview['currentPeriod']['labels'] ?? []);
            let currentPeriod = @json($performanceOverview['currentPeriod']['click'] ?? []);
            let previousPeriod = @json($performanceOverview['previousPeriod']['click'] ?? []);
            chartjsLineChartFour(
                "clickChart",
                "#7b36b5",
                "45",
                (data = currentPeriod),
                (data = previousPeriod),
                labels = labels,
                {{ $performanceOverview['currentPeriod']['min_value'] ?? 0 }},
                {{ $performanceOverview['currentPeriod']['max_value'] ?? 0 }}
            );
        }

        document.addEventListener("DOMContentLoaded", function () {
            clickChartLine();
        });
    </script>

@endpush
