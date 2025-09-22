<?php
$urlType = \App\Enums\AccountType::ADMIN->value;
?>

<header class="dashboard-header">
    <div class="header-content">
        <div class="brand">
            <div class="dashboard-logo"></div>

            <nav class="header-nav">
                <div class="nav-item has-dropdown">
                    <a href="index.html" class="nav-link active">
                        <i class="ri-user-smile-line"></i>
                        <span class="nav-text">Publishers</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="submenu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_pending_publishers_access')): ?>
                            <li>
                                <a href="<?php echo e(route("admin.publisher-management.publishers.index", ['status' => 'pending'])); ?>"
                                    data-layout="light"
                                    class="nav-link <?php echo e(request()->is("$urlType/publisher-management/publisher/pending") ? "active" : null); ?>">
                                    <span>Pending <?php echo e(trans('cruds.publisher.title')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_hold_publishers_access')): ?>
                            <li>
                                <a href="<?php echo e(route("admin.publisher-management.publishers.index", ['status' => 'hold'])); ?>"
                                    data-layout="light"
                                    class="nav-link <?php echo e(request()->is("$urlType/publisher-management/publisher/hold") ? "active" : null); ?>">
                                    <span>Hold <?php echo e(trans('cruds.publisher.title')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_active_publishers_access')): ?>
                            <li>
                                <a href="<?php echo e(route("admin.publisher-management.publishers.index", ['status' => 'active'])); ?>"
                                    data-layout="light"
                                    class="nav-link <?php echo e(request()->is("$urlType/publisher-management/publisher/active") ? "active" : null); ?>">
                                    <span>Active <?php echo e(trans('cruds.publisher.title')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_rejected_publishers_access')): ?>
                            <li>
                                <a href="<?php echo e(route("admin.publisher-management.publishers.index", ['status' => 'rejected'])); ?>"
                                    data-layout="light"
                                    class="nav-link <?php echo e(request()->is("$urlType/publisher-management/publisher/rejected") ? "active" : null); ?>">
                                    <span>Rejected <?php echo e(trans('cruds.publisher.title')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="nav-item has-dropdown">
                    <a href="#" class="nav-link">
                        <i class="ri-tools-fill"></i>
                        <span class="nav-text">Advertisers</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="submenu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_advertisers_access')): ?>
                            <li>
                                <a href="<?php echo e(route("admin.advertiser-management.advertisers.index")); ?>" data-layout="light"
                                    class="nav-link <?php echo e(request()->is("$urlType/advertiser-management/advertisers") || request()->is("$urlType/advertiser-management/advertisers/*") ? "active" : null); ?>">
                                    <span><?php echo e(trans('cruds.advertiser.title')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_api_advertisers_access')): ?>
                            <li>
                                <a href="<?php echo e(route("admin.advertiser-management.api-advertisers.index")); ?>"
                                    data-layout="light"
                                    class="nav-link <?php echo e((request()->is("$urlType/advertiser-management/api-advertisers") || request()->is("$urlType/advertiser-management/api-advertisers/*")) && !(request()->is("$urlType/advertiser-management/api-advertisers/show-on-publisher") || request()->is("$urlType/advertiser-management/api-advertisers/show-on-publisher/*") || request()->is("$urlType/advertiser-management/api-advertisers/duplicate-records") || request()->is("$urlType/advertiser-management/api-advertisers/duplicate-records/*")) ? "active" : null); ?>">
                                    <span><?php echo e(trans('advertiser.api-advertiser.title')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="nav-item has-dropdown">
                    <a href="payments.html" class="nav-link">
                        <i class="ri-money-dollar-box-line"></i>
                        <span class="nav-text">Payments</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="submenu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_pending_to_pay_payments_access')): ?>
                            <li>
                                <a href="<?php echo e(route("admin.payment-management.index", ["section" => \App\Models\PaymentHistory::PENDING_TO_PAY])); ?>"
                                    data-layout="light"
                                    class="nav-link <?php echo e(request()->is("$urlType/payment-management/pending-to-pay") || request()->is("$urlType/payment-management/pending-to-pay/*") ? "active" : null); ?>">
                                    <span><?php echo e(trans('advertiser.approval.pending.title')); ?> To Pay</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_paid_to_publisher_payments_access')): ?>
                            <li>
                                <a href="<?php echo e(route("admin.payment-management.index", ["section" => \App\Models\PaymentHistory::PAID_TO_PUBLISHER])); ?>"
                                    data-layout="light"
                                    class="nav-link <?php echo e(request()->is("$urlType/payment-management/paid-to-publisher") || request()->is("$urlType/payment-management/paid-to-publisher/*") ? "active" : null); ?>">
                                    <span>Paid To Publisher</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_release_payments_access')): ?>
                            <li>
                                <a href="<?php echo e(route("admin.payment-management.index", ["section" => \App\Models\PaymentHistory::RELEASE_PAYMENT])); ?>"
                                    data-layout="light"
                                    class="nav-link <?php echo e(request()->is("$urlType/payment-management/release-payment") || request()->is("$urlType/payment-management/release-payment/*") ? "active" : null); ?>">
                                    <span>Release Payment</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_history_payments_access')): ?>
                            <li>
                                <a href="<?php echo e(route("admin.payment-management.index", ["section" => \App\Models\PaymentHistory::PAYMENT_HISTORY])); ?>"
                                    data-layout="light"
                                    class="nav-link <?php echo e(request()->is("$urlType/payment-management/payment-history") || request()->is("$urlType/payment-management/payment-history/*") ? "active" : null); ?>">
                                    <span>Payment History</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_no_publisher_payments_access')): ?>
                            <li>
                                <a href="<?php echo e(route("admin.payment-management.index", ["section" => \App\Models\PaymentHistory::NO_PUBLISHER_PAYMENT])); ?>"
                                    data-layout="light"
                                    class="nav-link <?php echo e(request()->is("$urlType/payment-management/no-publisher-payment") || request()->is("$urlType/payment-management/no-publisher-payment/*") ? "active" : null); ?>">
                                    <span>No Publisher Payment</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="nav-item has-dropdown">
                    <a href="profile.html" class="nav-link">
                        <i class="ri-profile-line"></i>
                        <span class="nav-text">Stats.</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="submenu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_tracking_links_statistics_access')): ?>
                            <li>
                                <a href="<?php echo e(route("admin.statistics.links.index")); ?>" data-layout="light"
                                    class="nav-link <?php echo e(request()->is("$urlType/statistics/links") || request()->is("$urlType/statistics/links/*") ? "active" : null); ?>">
                                    <span><?php echo e(trans('link.statistics.links.title')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_deep_links_statistics_access')): ?>
                            <li>
                                <a href="<?php echo e(route("admin.statistics.deeplinks.index")); ?>" data-layout="light"
                                    class="nav-link <?php echo e(request()->is("$urlType/statistics/deeplinks") || request()->is("$urlType/statistics/deeplinks/*") ? "active" : null); ?>">
                                    <span><?php echo e(trans('link.statistics.links.deep_title')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="nav-item has-dropdown">
                    <a href="profile.html" class="nav-link">
                        <i class="ri-profile-line"></i>
                        <span class="nav-text">Transaction Management</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="submenu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_transactions_access')): ?>
                            <li>
                                <a href="<?php echo e(route("admin.transactions.index")); ?>" data-layout="light"
                                    class="nav-link <?php echo e(request()->is("$urlType/transactions") ? "active" : null); ?>"><span><?php echo e(trans('cruds.transaction.title')); ?></span></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_missing_transactions_access')): ?>
                            <li>
                                <a href="<?php echo e(route("admin.transactions.missing")); ?>" data-layout="light"
                                    class="nav-link <?php echo e(request()->is("$urlType/transactions/missing") ? "active" : null); ?>"><span><?php echo e(trans('cruds.transaction_missing.title')); ?></span></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_missing_payment_transactions_access')): ?>
                            <li>
                                <a href="<?php echo e(route("admin.transactions.missing.payment")); ?>" data-layout="light" class="nav-link <?php echo e(request()->is("$urlType/transactions/missing/payment") ? "active" : null); ?>"><span><?php echo e(trans('cruds.transaction_missing_payment.title')); ?></span></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_transactions_rakuten_payment_access')): ?>
                            <li>
                                <a href="<?php echo e(route("admin.transactions.rakuten.payment")); ?>" data-layout="light" class="nav-link <?php echo e(request()->is("$urlType/transactions/rakuten/payment") ? "active" : null); ?>"><span>Transaction Rakuten Payment</span></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="nav-item has-dropdown">
                    <a href="payments.html" class="nav-link">
                        <i class="ri-money-dollar-box-line"></i>
                        <span class="nav-text">Users Management</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                </div>

                <div class="nav-item has-dropdown">
                    <a href="payments.html" class="nav-link">
                        <i class="ri-money-dollar-box-line"></i>
                        <span class="nav-text">Settings</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="submenu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_advertiser_configurations_settings_access')): ?>
                            <li>
                                <a href="<?php echo e(route("admin.settings.advertiser-configs.index")); ?>" data-layout="light"
                                    class="nav-link <?php echo e(request()->is("$urlType/settings/advertiser-configs") || request()->is("$urlType/settings/advertiser-configs/*") ? "active" : null); ?>">
                                    <span><?php echo e(trans('cruds.advertiser_configuration.title')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_notification_settings_access')): ?>
                            <li>
                                <a href="<?php echo e(route("admin.settings.notification.index")); ?>" data-layout="light"
                                    class="nav-link <?php echo e(request()->is("$urlType/settings/notification") || request()->is("$urlType/settings/notification/*") ? "active" : null); ?>">
                                    <span><?php echo e(trans('cruds.notification.title')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="header-actions">
            <div class="user-profile">
                <div class="avatar">JD</div>
            </div>
        </div>
    </div>
</header><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/partial/admin/header.blade.php ENDPATH**/ ?>