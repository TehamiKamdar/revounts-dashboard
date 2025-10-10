<header class="dashboard-header">
    <div class="header-content">
        <!-- Brand and Navigation -->
        <div class="brand">
            <div class="dashboard-logo"></div>


            <nav class="header-nav">
                @can('publisher_dashboard')
                    <div class="nav-item">
                        <a href="{{ route("dashboard", ["type" => "advertiser"]) }}" class="nav-link">
                            <i class="ri-dashboard-line"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </div>
                @endcan

                @can('publisher_advertiser_access')
                    <div class="nav-item has-dropdown">
                        <a href="#" class="nav-link">
                            <i class="ri-user-smile-line"></i>
                            <span class="nav-text">Advertisers</span>
                            <i class="chevron ri-arrow-down-s-line"></i>
                        </a>
                        <ul class="submenu">
                            @can('publisher_my_advertiser')
                                <li><a href="#" class="nav-link">My Advertisers</a></li>
                            @endcan
                            @can('publisher_find_advertiser')
                                <li><a href="#" class="nav-link">Find Advertisers</a></li>
                            @endcan
                        </ul>
                    </div>
                @endcan

                @can('publisher_reports_access')
                    <div class="nav-item has-dropdown">
                        <a href="#" class="nav-link">
                            <i class="ri-line-chart-line"></i>
                            <span class="nav-text">Reports</span>
                            <i class="chevron ri-arrow-down-s-line"></i>
                        </a>
                        <ul class="submenu">
                            @can('publisher_reports_performance')
                                <li><a href="#" class="nav-link">Performance</a></li>
                            @endcan
                            @can('publisher_reports_transactions')
                                <li><a href="#" class="nav-link">Transactions</a></li>
                            @endcan
                        </ul>
                    </div>
                @endcan

                @can('publisher_links_access')
                    <div class="nav-item has-dropdown">
                        <a href="#" class="nav-link">
                            <i class="ri-links-line"></i>
                            <span class="nav-text">Links</span>
                            <i class="chevron ri-arrow-down-s-line"></i>
                        </a>
                        <ul class="submenu">
                            @can('publisher_links_banners')
                                <li><a href="#" class="nav-link">Banners</a></li>
                            @endcan
                            @can('publisher_links_text_n_emails')
                                <li><a href="#" class="nav-link">Text/Emails</a></li>
                            @endcan
                            @can('publisher_links_coupons')
                                <li><a href="#" class="nav-link">Coupons</a></li>
                            @endcan
                            @can('publisher_links_products')
                                <li><a href="#" class="nav-link">Products</a></li>
                            @endcan
                            @can('publisher_links_brand_datafeeds')
                                <li><a href="#" class="nav-link">Brands Datafeeds</a></li>
                            @endcan
                        </ul>
                    </div>
                @endcan

                @can('publisher_payments_access')
                    <div class="nav-item has-dropdown">
                        <a href="#" class="nav-link">
                            <i class="ri-money-dollar-circle-line"></i>
                            <span class="nav-text">Payments</span>
                            <i class="chevron ri-arrow-down-s-line"></i>
                        </a>
                        <ul class="submenu">
                            @can('publisher_payments_summary')
                                <li><a href="#" class="nav-link">Summary</a></li>
                            @endcan
                            @can('publisher_payments_details')
                                <li><a href="#" class="nav-link">Details</a></li>
                            @endcan
                            @can('publisher_payments_transaction_inquiries')
                                <li><a href="#" class="nav-link">Transaction Inquiries</a></li>
                            @endcan
                        </ul>
                    </div>
                @endcan

                @can('publisher_settings')
                    <div class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="ri-settings-3-line"></i>
                            <span class="nav-text">Settings</span>
                        </a>
                    </div>
                @endcan
            </nav>
        </div>

        <!-- User Profile Actions -->
        <div class="header-actions">
            <div class="user-profile">
                <div class="avatar"><i class="ri-user-2-fill"></i></div>
                <div class="profile-dropdown">
                    <div class="user-info">
                        <div class="user-name">{{ auth()->user()->full_name }}</div>
                        <div class="user-email">{{ auth()->user()->getRoleName() }} ID: {{ auth()->user()->sid }}</div>
                    </div>

                    @if(auth()->user()->type == \App\Models\User::PUBLISHER)
                        <a class="dropdown-item" href="{{ route("publisher.profile.basic-information.index") }}">
                            <i class="ri-settings-3-line"></i>
                            <span>Settings</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="ri-global-line"></i>
                            <span>Websites</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="ri-currency-line"></i>
                            <span>Payment Settings</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="ri-user-add-line"></i>
                            <span>Refer A Friend</span>
                        </a>
                    @else
                        <a class="dropdown-item" href="#"><span>Profile</span></a>
                        <a class="dropdown-item" href="#"><span>Settings</span></a>
                        <a class="dropdown-item" href="#"><span>Billing</span></a>
                        <a class="dropdown-item" href="#"><span>Activity</span></a>
                        <a class="dropdown-item" href="#"><span>Help</span></a>
                    @endif

                    <div class="dropdown-divider"></div>

                    <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="dropdown-item logout-item">
                        <i class="ri-logout-box-r-line"></i>
                        <span>Logout</span>
                        <form id="logoutform" action="{{ route('logout') }}" method="POST" class="display-hidden">
                            {{ csrf_field() }}
                        </form>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
