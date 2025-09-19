
    <div class="performance-glass-card card border-0">
        <div class="card-body pt-0" id="performanceCardContent">
            <div class="tab-content tab-content-glass" id="performanceTabWrapper">
                <div class="tab-pane fade active show" id="w_perfomence-year" role="tabpanel" aria-labelledby="w_perfomence-year">
                    <div class="d-flex justify-content-end gap-4 mb-4">
                        <a href="#click" class="stats-pill active" data-toggle="tab" id="click-tab" role="tab" aria-controls="click" aria-selected="false">
                            <?php if(isset($performanceOverview['growth']['position']) && $performanceOverview['growth']['position'] == "up"): ?>
                                <div>
                                    <span class="stat-label">Total Clicks</span>
                                    <div class="stat-value">
                                        <?php echo e($performanceOverview['currentPeriod']['count'] ?? 0); ?>

                                        <span class="growth-indicator growth-up">
                                            <i class="ri-arrow-up-line"></i>
                                            <?php echo e(number_format($performanceOverview['growth']['percentage'] ?? 0, 2)); ?>%
                                        </span>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div>
                                    <span class="stat-label">Total Clicks</span>
                                    <div class="stat-value">
                                        <?php echo e($performanceOverview['currentPeriod']['count'] ?? 0); ?>

                                        <span class="growth-indicator growth-down">
                                            <i class="ri-arrow-down-line"></i>
                                            <?php echo e(number_format($performanceOverview['growth']['percentage'] ?? 0, 2)); ?>%
                                        </span>
                                    </div>
                                </div>
                            <?php endif; ?>
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
<?php $__env->startPush("extended_scripts"); ?>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/Chart.min.js")); ?>"></script>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/charts.js")); ?>"></script>

    <script>

        function clickChartLine()
        {
            let labels = <?php echo json_encode($performanceOverview['currentPeriod']['labels'] ?? [], 15, 512) ?>;
            let currentPeriod = <?php echo json_encode($performanceOverview['currentPeriod']['click'] ?? [], 15, 512) ?>;
            let previousPeriod = <?php echo json_encode($performanceOverview['previousPeriod']['click'] ?? [], 15, 512) ?>;
            chartjsLineChartFour(
                "clickChart",
                "#7b36b5",
                "45",
                (data = currentPeriod),
                (data = previousPeriod),
                labels = labels,
                <?php echo e($performanceOverview['currentPeriod']['min_value'] ?? 0); ?>,
                <?php echo e($performanceOverview['currentPeriod']['max_value'] ?? 0); ?>

            );
        }

        document.addEventListener("DOMContentLoaded", function () {
            clickChartLine();
        });
    </script>

<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/publisher/widgets/section_performance_click_overview.blade.php ENDPATH**/ ?>