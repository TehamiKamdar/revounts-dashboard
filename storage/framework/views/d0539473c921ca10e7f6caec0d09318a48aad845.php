<div class="card broder-0 mb-20">
    <div class="card-body pt-0" id="performanceCardContent">
        <div class="tab-content perfomence-tab-wrap" id="performanceTabWrapper">
            <div class="tab-pane fade active show" id="w_perfomence-year" role="tabpanel" aria-labelledby="w_perfomence-year">
                <div class="performance-stats nav-tabs nav">
                    <a href="#click" class="active" data-toggle="tab" id="click-tab" role="tab" area-controls="click" aria-selected="false">
                            <?php if(isset($performanceOverview['growth']['position']) && $performanceOverview['growth']['position'] == "up"): ?>
                                <div class="performance-stats__up">
                                    <span>Total Clicks</span>
                                    <strong>
                                        <?php echo e($performanceOverview['currentPeriod']['count'] ?? 0); ?>

                                        <sub>
                                            <i class="la la-arrow-up"></i>
                                            <?php echo e(number_format($performanceOverview['growth']['percentage'] ?? 0, 2)); ?>%
                                        </sub>
                                    </strong>
                                </div>
                            <?php else: ?>
                                <div class="performance-stats__down">
                                    <span>Total Clicks</span>
                                    <strong>
                                        <?php echo e($performanceOverview['currentPeriod']['count'] ?? 0); ?>

                                        <sub>
                                            <i class="la la-arrow-down"></i>
                                            <?php echo e(number_format($performanceOverview['growth']['percentage'] ?? 0, 2)); ?>

                                        </sub>
                                    </strong>
                                </div>
                            <?php endif; ?>

                    </a>
                </div>
                <!-- ends: .performance-stats -->

                <div class="wp-chart perfomence-chart">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="click" role="tabpanel" aria-labelledby="click-tab">
                            <div class="parentContainer" id="clickChartContent">
                                <div>
                                    <canvas id="clickChart"></canvas>
                                </div>
                            </div>
                            <ul class="legend-static" id="clickPeriodContent">
                                <li class="custom-label">
                                    <span style="background-color: rgb(95, 99, 242);"></span>Current Period
                                </li>
                                <li class="custom-label">
                                    <span style="background-color: #C6D0DC"></span>Previous Period
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ends: .card-body -->
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
                "#FA8B0C",
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