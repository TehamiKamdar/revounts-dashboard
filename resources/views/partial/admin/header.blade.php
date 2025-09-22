<?php
$urlType = \App\Enums\AccountType::ADMIN->value;
?>

<header class="dashboard-header">
    <div class="header-content">
        <div class="brand">
            <div class="dashboard-logo"></div>

            <nav class="header-nav">
                <div class="nav-item has-dropdown">
                    <a href="#" class="nav-link active">
                        <i class="ri-user-smile-line"></i>
                        <span class="nav-text">Publishers</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="submenu">
                        @can('admin_pending_publishers_access')
                            <li>
                                <a href="{{ route("admin.publisher-management.publishers.index", ['status' => 'pending']) }}"
                                    data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/publisher-management/publisher/pending") ? "active" : null }}">
                                    <span>Pending {{ trans('cruds.publisher.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('admin_hold_publishers_access')
                            <li>
                                <a href="{{ route("admin.publisher-management.publishers.index", ['status' => 'hold']) }}"
                                    data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/publisher-management/publisher/hold") ? "active" : null }}">
                                    <span>Hold {{ trans('cruds.publisher.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('admin_active_publishers_access')
                            <li>
                                <a href="{{ route("admin.publisher-management.publishers.index", ['status' => 'active']) }}"
                                    data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/publisher-management/publisher/active") ? "active" : null }}">
                                    <span>Active {{ trans('cruds.publisher.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('admin_rejected_publishers_access')
                            <li>
                                <a href="{{ route("admin.publisher-management.publishers.index", ['status' => 'rejected']) }}"
                                    data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/publisher-management/publisher/rejected") ? "active" : null }}">
                                    <span>Rejected {{ trans('cruds.publisher.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>

                <div class="nav-item has-dropdown">
                    <a href="#" class="nav-link">
                        <i class="ri-tools-fill"></i>
                        <span class="nav-text">Advertisers</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="submenu">
                        @can('admin_advertisers_access')
                            <li>
                                <a href="{{ route("admin.advertiser-management.advertisers.index") }}" data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/advertiser-management/advertisers") || request()->is("$urlType/advertiser-management/advertisers/*") ? "active" : null }}">
                                    <span>{{ trans('cruds.advertiser.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('admin_api_advertisers_access')
                            <li>
                                <a href="{{ route("admin.advertiser-management.api-advertisers.index") }}"
                                    data-layout="light"
                                    class="nav-link {{ (request()->is("$urlType/advertiser-management/api-advertisers") || request()->is("$urlType/advertiser-management/api-advertisers/*")) && !(request()->is("$urlType/advertiser-management/api-advertisers/show-on-publisher") || request()->is("$urlType/advertiser-management/api-advertisers/show-on-publisher/*") || request()->is("$urlType/advertiser-management/api-advertisers/duplicate-records") || request()->is("$urlType/advertiser-management/api-advertisers/duplicate-records/*")) ? "active" : null }}">
                                    <span>{{ trans('advertiser.api-advertiser.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>

                <div class="nav-item has-dropdown">
                    <a href="#" class="nav-link">
                        <i class="ri-money-dollar-box-line"></i>
                        <span class="nav-text">Payments</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="submenu">
                        @can('admin_pending_to_pay_payments_access')
                            <li>
                                <a href="{{ route("admin.payment-management.index", ["section" => \App\Models\PaymentHistory::PENDING_TO_PAY]) }}"
                                    data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/payment-management/pending-to-pay") || request()->is("$urlType/payment-management/pending-to-pay/*") ? "active" : null }}">
                                    <span>{{ trans('advertiser.approval.pending.title') }} To Pay</span>
                                </a>
                            </li>
                        @endcan
                        @can('admin_paid_to_publisher_payments_access')
                            <li>
                                <a href="{{ route("admin.payment-management.index", ["section" => \App\Models\PaymentHistory::PAID_TO_PUBLISHER]) }}"
                                    data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/payment-management/paid-to-publisher") || request()->is("$urlType/payment-management/paid-to-publisher/*") ? "active" : null }}">
                                    <span>Paid To Publisher</span>
                                </a>
                            </li>
                        @endcan
                        @can('admin_release_payments_access')
                            <li>
                                <a href="{{ route("admin.payment-management.index", ["section" => \App\Models\PaymentHistory::RELEASE_PAYMENT]) }}"
                                    data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/payment-management/release-payment") || request()->is("$urlType/payment-management/release-payment/*") ? "active" : null }}">
                                    <span>Release Payment</span>
                                </a>
                            </li>
                        @endcan
                        @can('admin_history_payments_access')
                            <li>
                                <a href="{{ route("admin.payment-management.index", ["section" => \App\Models\PaymentHistory::PAYMENT_HISTORY]) }}"
                                    data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/payment-management/payment-history") || request()->is("$urlType/payment-management/payment-history/*") ? "active" : null }}">
                                    <span>Payment History</span>
                                </a>
                            </li>
                        @endcan
                        @can('admin_no_publisher_payments_access')
                            <li>
                                <a href="{{ route("admin.payment-management.index", ["section" => \App\Models\PaymentHistory::NO_PUBLISHER_PAYMENT]) }}"
                                    data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/payment-management/no-publisher-payment") || request()->is("$urlType/payment-management/no-publisher-payment/*") ? "active" : null }}">
                                    <span>No Publisher Payment</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>

                <div class="nav-item has-dropdown">
                    <a href="#" class="nav-link">
                        <i class="ri-profile-line"></i>
                        <span class="nav-text">Stats.</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="submenu">
                        @can('admin_tracking_links_statistics_access')
                            <li>
                                <a href="{{ route("admin.statistics.links.index") }}" data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/statistics/links") || request()->is("$urlType/statistics/links/*") ? "active" : null }}">
                                    <span>{{ trans('link.statistics.links.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('admin_deep_links_statistics_access')
                            <li>
                                <a href="{{ route("admin.statistics.deeplinks.index") }}" data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/statistics/deeplinks") || request()->is("$urlType/statistics/deeplinks/*") ? "active" : null }}">
                                    <span>{{ trans('link.statistics.links.deep_title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>

                <div class="nav-item has-dropdown">
                    <a href="#" class="nav-link">
                        <i class="ri-profile-line"></i>
                        <span class="nav-text">Transaction Management</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="submenu">
                        @can('admin_transactions_access')
                            <li>
                                <a href="{{ route("admin.transactions.index") }}" data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/transactions") ? "active" : null }}"><span>{{ trans('cruds.transaction.title') }}</span></a>
                            </li>
                        @endcan
                        @can('admin_missing_transactions_access')
                            <li>
                                <a href="{{ route("admin.transactions.missing") }}" data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/transactions/missing") ? "active" : null }}"><span>{{ trans('cruds.transaction_missing.title') }}</span></a>
                            </li>
                        @endcan
                        @can('admin_missing_payment_transactions_access')
                            <li>
                                <a href="{{ route("admin.transactions.missing.payment") }}" data-layout="light" class="nav-link {{ request()->is("$urlType/transactions/missing/payment") ? "active" : null }}"><span>{{ trans('cruds.transaction_missing_payment.title') }}</span></a>
                            </li>
                        @endcan
                        @can('admin_transactions_rakuten_payment_access')
                            <li>
                                <a href="{{ route("admin.transactions.rakuten.payment") }}" data-layout="light" class="nav-link {{ request()->is("$urlType/transactions/rakuten/payment") ? "active" : null }}"><span>Transaction Rakuten Payment</span></a>
                            </li>
                        @endcan
                    </ul>
                </div>

                <div class="nav-item has-dropdown">
                    <a href="#" class="nav-link">
                        <i class="ri-money-dollar-box-line"></i>
                        <span class="nav-text">Users Management</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                </div>

                <div class="nav-item has-dropdown">
                    <a href="#" class="nav-link">
                        <i class="ri-money-dollar-box-line"></i>
                        <span class="nav-text">Settings</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="submenu">
                        @can('admin_advertiser_configurations_settings_access')
                            <li>
                                <a href="{{ route("admin.settings.advertiser-configs.index") }}" data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/settings/advertiser-configs") || request()->is("$urlType/settings/advertiser-configs/*") ? "active" : null }}">
                                    <span>{{ trans('cruds.advertiser_configuration.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('admin_notification_settings_access')
                            <li>
                                <a href="{{ route("admin.settings.notification.index") }}" data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/settings/notification") || request()->is("$urlType/settings/notification/*") ? "active" : null }}">
                                    <span>{{ trans('cruds.notification.title') }}</span>
                                </a>
                            </li>
                        @endcan
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
</header>
{{-- 
<li class="nav-author">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle"><img src="{{ \App\Helper\Static\Methods::staticAsset("img/author-nav.jpg") }}" alt="" class="rounded-circle"></a>
                        <div class="dropdown-wrapper">
                            <div class="nav-author__info">
                                <div class="author-img">
                                    <img src="{{ \App\Helper\Static\Methods::staticAsset("img/author-nav.jpg") }}" alt="" class="rounded-circle">
                                </div>
                                <div>
                                    <h6>{{ auth()->user()->full_name }}</h6>
                                    <span>{{ auth()->user()->getRoleName() }}</span>
                                </div>
                            </div>
                            <div class="nav-author__options">
                                <ul>
                                    <li>
                                        <a href="">
                                            <span data-feather="user"></span> Profile</a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span data-feather="settings"></span> Settings</a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span data-feather="key"></span> Billing</a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span data-feather="users"></span> Activity</a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span data-feather="bell"></span> Help</a>
                                    </li>
                                </ul>
                                <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="nav-author__signout">
                                    <span data-feather="log-out"></span> Sign Out</a>
                                <form id="logoutform" action="{{ route('logout') }}" method="POST" class="display-hidden">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                        <!-- ends: .dropdown-wrapper -->
                    </div>
                </li> --}}