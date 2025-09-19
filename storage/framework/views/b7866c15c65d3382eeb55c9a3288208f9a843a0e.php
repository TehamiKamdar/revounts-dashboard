<?php
    $notificationsCount = \App\Helper\Static\Methods::newNotificationCount();
?>

<?php if($notificationsCount == 0): ?>
    <style>
        .navbar-right__menu .nav-notification .nav-item-toggle:before {
            background: unset;
        }
    </style>
<?php endif; ?>

<header class="dashboard-header">
    <div class="header-content">
        <div class="brand">
            <div class="dashboard-logo"></div>

            <nav class="header-nav">
                <div class="nav-item has-dropdown">
                    <a href="index.html" class="nav-link <?php echo e(\App\Helper\PublisherData::isAdvertiserActive()); ?>">
                        <i class="ri-user-smile-line"></i>
                        <span class="nav-text">Advertisers</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo e(route("publisher.find-advertisers")); ?>?section=new" class="nav-link"><span>New Advertiser</span></a></li>
                        <li><a href="<?php echo e(route("publisher.own-advertisers")); ?>" class="nav-link"><span>My Advertiser</span></a></li>
                        <li><a href="<?php echo e(route("publisher.find-advertisers")); ?>" class="nav-link"><span>Find Advertiser</span></a></li>
                    </ul>
                </div>

                <div class="nav-item has-dropdown">
                    <a href="#" class="nav-link <?php echo e(\App\Helper\PublisherData::isReportActive()); ?>">
                        <i class="ri-line-chart-fill"></i>
                        <span class="nav-text">Reports</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo e(route("publisher.reports.performance-by-clicks.list")); ?>" class="nav-link"><span>Clicks Performance</span></a></li>
                        <li><a href="<?php echo e(route("publisher.reports.performance-by-transactions.list")); ?>" class="nav-link"><span>Advertiser Performance</span></a></li>
                        <li><a href="<?php echo e(route("publisher.reports.transactions.list")); ?>" class="nav-link"><span>Transactions</span></a></li>
                    </ul>
                </div>

                <div class="nav-item has-dropdown">
                    <a href="#" class="nav-link <?php echo e(\App\Helper\PublisherData::isCreativeActive()); ?>">
                        <i class="ri-tools-fill"></i>
                        <span class="nav-text">Creatives</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo e(route("publisher.creatives.coupons.list")); ?>" class="nav-link"><span>Coupons</span></a></li>
                        <li><a href="<?php echo e(route("publisher.creatives.text-links.list")); ?>" class="nav-link"><span>Text Links</span></a></li>
                        <li><a href="<?php echo e(route("publisher.creatives.deep-links.list")); ?>" class="nav-link"><span>Deep Links</span></a></li>
                    </ul>
                </div>

                <div class="nav-item has-dropdown">
                    <a href="#" class="nav-link <?php echo e(\App\Helper\PublisherData::isToolActive()); ?>">
                        <i class="ri-code-s-slash-line"></i>
                        <span class="nav-text">Dev Tools</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo e(route("publisher.tools.deep-links.generate")); ?>" class="nav-link"><span>Deep Link Generator</span></a></li>
                        <li><a href="<?php echo e(route("publisher.tools.api-info.index")); ?>" class="nav-link"><span>API</span></a></li>
                    </ul>
                </div>

                <div class="nav-item">
                    <a href="<?php echo e(route("publisher.payments.index")); ?>" class="nav-link">
                        <i class="ri-money-dollar-box-line"></i>
                        <span class="nav-text">Payments</span>
                    </a>
                </div>
            </nav>
        </div>

        <div class="header-actions">
            <div class="user-profile">
                <div class="avatar">JD</div>
            </div>
        </div>
    </div>
</header>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/partial/publisher/header.blade.php ENDPATH**/ ?>