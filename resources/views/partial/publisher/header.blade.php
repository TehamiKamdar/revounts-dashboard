@php
    $notificationsCount = \App\Helper\Static\Methods::newNotificationCount();
@endphp

@if($notificationsCount == 0)
    <style>
        .navbar-right__menu .nav-notification .nav-item-toggle:before {
            background: unset;
        }
    </style>
@endif
{{-- <header class="header-top">
    <nav class="navbar navbar-light">
        <div class="navbar-left">
            <a href="{{ route(" dashboard", ["type"=> "publisher"]) }}" class="sidebar-toggle">
                <img class="svg" src="{{ asset(" img/svg/bars.svg") }}" alt="img">
            </a>
            <a class="navbar-brand" href="{{ route(" dashboard", ["type"=> "publisher"]) }}">
                @if(env("APP_ENV") == "production")
                <img class="dark" src="{{ asset(" img/logo.png") }}" alt="svg" style="width: 200px">
                <img class="light" src="{{ asset(" img/logo.png") }}" alt="img" style="width: 200px">
                @endif
            </a>
            <form action="/" class="search-form">
                <span data-feather="search"></span>
                <input class="form-control mr-sm-2 box-shadow-none" type="text" placeholder="Search...">
            </form>
            <div class="top-menu">

                <div class="strikingDash-top-menu position-relative">
                    <ul>
                        <li>
                            <a href="{{ route(" dashboard", ["type"=> "publisher"]) }}" class="{{
                                \App\Helper\PublisherData::isDashboardActive() }}">Dashboard</a>
                        </li>
                        <li class="has-subMenu">
                            <a href="javascript:void(0)"
                                class="{{ \App\Helper\PublisherData::isAdvertiserActive() }}">Advertisers</a>
                            <ul class="subMenu">
                                <li class="l_sidebar">
                                    <a href="{{ route(" publisher.find-advertisers") }}?section=new"
                                        data-layout="light">New Advertisers</a>
                                </li>
                                <li class="l_sidebar">
                                    <a href="{{ route(" publisher.own-advertisers") }}" data-layout="light">My
                                        Advertisers</a>
                                </li>
                                <li class="l_sidebar">
                                    <a href="{{ route(" publisher.find-advertisers") }}" data-layout="dark">Find
                                        Advertisers</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-subMenu">
                            <a href="javascript:void(0)"
                                class="{{ \App\Helper\PublisherData::isReportActive() }}">Reports</a>
                            <ul class="subMenu">
                                <li class="l_sidebar">
                                    <a href="{{ route(" publisher.reports.performance-by-clicks.list") }}"
                                        data-layout="light">Clicks Performance</a>
                                </li>
                                <li class="l_sidebar">
                                    <a href="{{ route(" publisher.reports.performance-by-transactions.list") }}"
                                        data-layout="light">Advertiser Performance</a>
                                </li>
                                <li class="l_sidebar">
                                    <a href="{{ route(" publisher.reports.transactions.list") }}"
                                        data-layout="dark">Transactions</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-subMenu">
                            <a href="javascript:void(0)"
                                class="{{ \App\Helper\PublisherData::isCreativeActive() }}">Creatives</a>
                            <ul class="subMenu">
                                <li class="l_sidebar">
                                    <a href="{{ route(" publisher.creatives.coupons.list") }}"
                                        data-layout="dark">Coupons</a>
                                </li>
                                <li class="l_sidebar">
                                    <a href="{{ route(" publisher.creatives.text-links.list") }}"
                                        data-layout="dark">Text Links</a>
                                </li>
                                <li class="l_sidebar">
                                    <a href="{{ route(" publisher.creatives.deep-links.list") }}"
                                        data-layout="dark">Deep Links</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-subMenu">
                            <a href="javascript:void(0)"
                                class="{{ \App\Helper\PublisherData::isToolActive() }}">Tools</a>
                            <ul class="subMenu">
                                <li>
                                    <a href="{{ route(" publisher.tools.deep-links.generate") }}" class="">Deep Link
                                        Generator</a>
                                </li>
                                <li>
                                    <a href="{{ route(" publisher.tools.api-info.index") }}" class="">API</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route(" publisher.payments.index") }}" class="">Payments</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- ends: navbar-left -->

        <div class="navbar-right">
            <ul class="navbar-right__menu">
                @php
                $headerWebsites = auth()->user()->websites->where("status", \App\Models\Website::ACTIVE)->where('id',
                '!=', auth()->user()->active_website_id);
                @endphp
                @if(count($headerWebsites) && isset(auth()->user()->active_website->name))
                <li class="nav-flag-select">
                    <div class="dropdown dropdown-click">
                        <a class="btn-link" href="" aria-expanded="false" aria-haspopup="true" data-toggle="dropdown">
                            <span
                                style="width: 7px; height: 7px; border-radius: 50%; margin-right: 4px; display: inline-block; position: relative; top: -1px; background: #20c997;"></span>
                            {{ auth()->user()->active_website->name }} (active)
                            <span data-feather="chevron-down"></span>
                        </a>
                        <div class="dropdown-default dropdown-menu" style="top: 20px !important;">
                            @foreach($headerWebsites as $website)
                            <a class="dropdown-item" href="{{ route(" publisher.set-website", ["website"=>
                                $website->id]) }}">{{ $website->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </li>
                @endif
                <!-- ends: nav-message -->
                <!-- ends: nav-message -->
                <li class="nav-notification">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle">
                            <span data-feather="bell"></span>
                        </a>
                        <div class="dropdown-wrapper">
                            <h2 class="dropdown-wrapper__title">Notifications
                                @if($notificationsCount)
                                <span class="badge-circle badge-warning ml-1">{{ $notificationsCount }}</span>
                                @endif
                            </h2>
                            <ul>
                                @foreach(\App\Helper\Static\Methods::getNotifications() as $notification)
                                <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                    <div class="nav-notification__type nav-notification__type--primary">
                                        <span data-feather="inbox"></span>
                                    </div>
                                    <div class="nav-notification__details">
                                        <p style="max-width: 180px;">
                                            <a href="{{ route(" publisher.notification-center.show", $notification->id)
                                                }}" class="subject stretched-link text-truncate-custom">
                                                {{ $notification->notification_header }}
                                            </a>
                                        </p>
                                        <p>
                                            <span class="time-posted">{{ $notification->created_at->diffForHumans()
                                                }}</span>
                                        </p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            <a href="{{ route(" publisher.notification-center.index") }}"
                                class="dropdown-wrapper__more">See all incoming activity</a>
                        </div>
                    </div>
                </li>
                <!-- ends: .nav-notification -->
                <li class="nav-support">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle">
                            <span data-feather="help-circle"></span></a>
                        <div class="dropdown-wrapper card shadow-lg">
                            <div class="card-body py-0 px-0">
                                <div class="faq-support text-center">
                                    <img src="{{ \App\Helper\Static\Methods::staticAsset(" img/svg/faq-support.svg") }}"
                                        alt="support" class="svg img-fluid w-50">
                                    <h5 class="fw-600 mt-20 mb-20 color-dark">Need help?</h5>
                                    <h6 class="fw-400 mt-0 mb-20">Connect with your Account Manager</h6>
                                    <div class="content-center">
                                        <button
                                            onclick="window.open('https://join.skype.com/invite/rGeSJpSJ8kuq','_blank')"
                                            class="btn btn-primary btn-default btn-squared text-capitalize px-30"><i
                                                class="la la-skype" style="font-size:25px;"></i> Add to Skype
                                        </button>
                                    </div>
                                    <h6 class="fw-400 mt-20 mb-0 color-light">live:.cid.9cd2316ea40009f1</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-author">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle">
                            <img id="profilePic"
                                src="{{ \App\Helper\Static\Methods::staticAsset(isset(auth()->user()->publisher->image) && auth()->user()->publisher->image ? auth()->user()->publisher->image : "
                                img/author-nav.jpg") }}" alt="" class="rounded-circle">
                        </a>
                        <div class="dropdown-wrapper">
                            <div class="nav-author__info">
                                <div class="author-img">
                                    <img src="{{ \App\Helper\Static\Methods::staticAsset(isset(auth()->user()->publisher->image) && auth()->user()->publisher->image ? auth()->user()->publisher->image : "
                                        img/author-nav.jpg") }}" alt="" class="rounded-circle">
                                </div>
                                <div>
                                    <h6>{{ auth()->user()->full_name }}</h6>
                                    <span>{{ auth()->user()->getRoleName() }} ID: {{ auth()->user()->sid }}</span>
                                </div>
                            </div>
                            <div class="nav-author__options">
                                <ul>
                                    @if(auth()->user()->type == \App\Models\User::PUBLISHER)
                                    <li>
                                        <a href="{{ route(" publisher.profile.basic-information.index") }}">
                                            <span data-feather="settings"></span> Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route(" publisher.profile.websites.index") }}">
                                            <span data-feather="grid"></span> Websites
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route(" publisher.payments.payment-settings.index") }}">
                                            <span data-feather="key"></span> Payment Settings
                                        </a>
                                    </li>
                                    @else
                                    <li>
                                        <a href="">
                                            <span data-feather="user"></span> Profile
                                        </a>
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
                                    @endif
                                </ul>
                                <a href="javascript:void(0)"
                                    onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
                                    class="nav-author__signout">
                                    <span data-feather="log-out"></span> Sign Out</a>
                                <form id="logoutform" action="{{ route('logout') }}" method="POST"
                                    class="display-hidden">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                        <!-- ends: .dropdown-wrapper -->
                    </div>
                </li>
                <!-- ends: .nav-author -->
            </ul>
            <!-- ends: .navbar-right__menu -->
            <div class="navbar-right__mobileAction d-md-none">
                <a href="#" class="btn-author-action">
                    <span data-feather="more-vertical"></span></a>
            </div>
        </div>
        <!-- ends: .navbar-right -->
    </nav>
</header> --}}
<header class="dashboard-header">
    <div class="header-content">
        <div class="brand">
            <div class="dashboard-logo"></div>

            <nav class="header-nav">
                <div class="nav-item has-dropdown">
                    <a href="index.html" class="nav-link {{ \App\Helper\PublisherData::isAdvertiserActive() }}">
                        <i class="ri-user-smile-line"></i>
                        <span class="nav-text">Advertisers</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route("publisher.find-advertisers") }}?section=new" class="nav-link"><span>New Advertiser</span></a></li>
                        <li><a href="{{ route("publisher.own-advertisers") }}" class="nav-link"><span>My Advertiser</span></a></li>
                        <li><a href="{{ route("publisher.find-advertisers") }}" class="nav-link"><span>Find Advertiser</span></a></li>
                    </ul>
                </div>

                <div class="nav-item has-dropdown">
                    <a href="#" class="nav-link {{ \App\Helper\PublisherData::isReportActive() }}">
                        <i class="ri-line-chart-fill"></i>
                        <span class="nav-text">Reports</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route("publisher.reports.performance-by-clicks.list") }}" class="nav-link"><span>Clicks Performance</span></a></li>
                        <li><a href="{{ route("publisher.reports.performance-by-transactions.list") }}" class="nav-link"><span>Advertiser Performance</span></a></li>
                        <li><a href="{{ route("publisher.reports.transactions.list") }}" class="nav-link"><span>Transactions</span></a></li>
                    </ul>
                </div>

                <div class="nav-item has-dropdown">
                    <a href="#" class="nav-link {{ \App\Helper\PublisherData::isCreativeActive() }}">
                        <i class="ri-tools-fill"></i>
                        <span class="nav-text">Creatives</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route("publisher.creatives.coupons.list") }}" class="nav-link"><span>Coupons</span></a></li>
                        <li><a href="{{ route("publisher.creatives.text-links.list") }}" class="nav-link"><span>Text Links</span></a></li>
                        <li><a href="{{ route("publisher.creatives.deep-links.list") }}" class="nav-link"><span>Deep Links</span></a></li>
                    </ul>
                </div>

                <div class="nav-item has-dropdown">
                    <a href="#" class="nav-link {{ \App\Helper\PublisherData::isToolActive() }}">
                        <i class="ri-code-s-slash-line"></i>
                        <span class="nav-text">Dev Tools</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route("publisher.tools.deep-links.generate") }}" class="nav-link"><span>Deep Link Generator</span></a></li>
                        <li><a href="{{ route("publisher.tools.api-info.index") }}" class="nav-link"><span>API</span></a></li>
                    </ul>
                </div>

                <div class="nav-item">
                    <a href="{{ route("publisher.payments.index") }}" class="nav-link">
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
