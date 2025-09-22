{{-- <header class="header-top">
    <nav class="navbar navbar-light">
        <div class="navbar-left">
            <a class="navbar-brand" href="{{ route(" dashboard", ["type"=> \App\Helper\Static\Vars::ADMIN_ROUTE]) }}">
                @if(env("APP_ENV") == "production")
                <img class="dark" src="{{ asset(" img/logo.png") }}" alt="svg">
                <img class="light" src="{{ asset(" img/logo.png") }}" alt="img">
                @endif
            </a>
            <div class="top-menu">

                <div class="strikingDash-top-menu position-relative">
                    <ul>
                        <li class="has-subMenu">
                            <a href="#" class="">Dashboard</a>
                            <ul class="subMenu">
                                <li>
                                    <a class="" href="index.html">Social Media</a>
                                </li>
                                <li>
                                    <a class="" href="business.html">FineTech /
                                        Business</a>
                                </li>
                                <li>
                                    <a class="" href="performance.html">Site
                                        Performance</a>
                                </li>
                                <li>
                                    <a class="" href="ecommerce.html">Ecommerce</a>
                                </li>
                                <li>
                                    <a class="" href="crm.html">
                                        CRM</a>
                                </li>
                                <li>
                                    <a class="" href="sales.html">
                                        Sales Performance</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-subMenu">
                            <a href="#" class="">Layouts</a>
                            <ul class="subMenu">
                                <li class="l_sidebar">
                                    <a href="#" data-layout="light">Light Mode</a>
                                </li>
                                <li class="l_sidebar">
                                    <a href="#" data-layout="dark">Dark Mode</a>
                                </li>
                                <li class="l_navbar">
                                    <a href="#" data-layout="top">Top Menu</a>
                                </li>
                                <li class="l_navbar">
                                    <a href="#" data-layout="side">Side Menu</a>
                                </li>
                                <li class="layout">
                                    <a href="../rtl">RTL</a>
                                </li>
                                <li class="layout">
                                    <a href="../ltr">LTR</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-subMenu">
                            <a href="#" class="">Apps</a>
                            <ul class="subMenu">
                                <li>
                                    <a href="chat.html" class="">
                                        <span data-feather="message-square" class="nav-icon"></span>
                                        <span class="menu-text">Chat</span>
                                    </a>
                                </li>
                                <li class="has-subMenu-left">
                                    <a href="#" class="">
                                        <span data-feather="shopping-cart" class="nav-icon"></span>
                                        <span class="menu-text">eCommerce</span>
                                    </a>
                                    <ul class="subMenu">
                                        <li>
                                            <a href="products.html" class="">Products</a>
                                        </li>
                                        <li>
                                            <a href="product-details.html" class="">Product Details</a>
                                        </li>
                                        <li>
                                            <a href="add-product.html" class="">Product
                                                Add</a>
                                        </li>
                                        <li>
                                            <a href="" class="">Product Edit</a>
                                        </li>
                                        <li>
                                            <a href="cart.html" class="">Cart</a>
                                        </li>
                                        <li>
                                            <a href="order.html" class="">Orders</a>
                                        </li>
                                        <li>
                                            <a href="sellers.html" class="">Sellers</a>
                                        </li>
                                        <li>
                                            <a href="invoice.html" class="">Invoices</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-subMenu-left">
                                    <a href="#" class="">
                                        <span data-feather="mail" class="nav-icon"></span>
                                        <span class="menu-text">Email</span>
                                    </a>
                                    <ul class="subMenu">
                                        <li>
                                            <a href="inbox.html" class="">Inbox</a>
                                        </li>
                                        <li>
                                            <a href="read-email.html" class="">Read
                                                Email</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="chat.html" class="">
                                        <span data-feather="bookmark" class="nav-icon"></span>
                                        <span class="menu-text">Note</span>
                                    </a>
                                </li>
                                <li class="has-subMenu-left">
                                    <a href="#" class="">
                                        <span data-feather="user" class="nav-icon"></span>
                                        <span class="menu-text">Profile</span>
                                    </a>
                                    <ul class="subMenu">
                                        <li>
                                            <a href="profile.html" class="">Profile</a>
                                        </li>
                                        <li>
                                            <a href="profile-setting.html" class="">Profile Settings</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-subMenu-left">
                                    <a href="#" class="">
                                        <span data-feather="user-check" class="nav-icon"></span>
                                        <span class="menu-text">Contact</span>
                                    </a>
                                    <ul class="subMenu">
                                        <li>
                                            <a class="" href="contact-1.html">Contact 1</a>
                                        </li>
                                        <li>
                                            <a class="" href="contact-2.html">Contact 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="chat.html" class="">
                                        <span data-feather="activity" class="nav-icon"></span>
                                        <span class="menu-text">To-Do</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="kanban.html" class="">
                                        <span data-feather="columns" class="nav-icon"></span>
                                        <span class="menu-text">Kanban Board</span>
                                    </a>
                                </li>
                                <li class="has-subMenu-left">
                                    <a href="#" class="">
                                        <span data-feather="repeat" class="nav-icon"></span>
                                        <span class="menu-text">Import & Export</span>
                                    </a>
                                    <ul class="subMenu">
                                        <li>
                                            <a class="" href="import.html">Import</a>
                                        </li>
                                        <li>
                                            <a class="" href="export.html">Export</a>
                                        </li>
                                        <li>
                                            <a class="" href="export-selected.html">Export Selected
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="file-manager.html" class="">
                                        <span data-feather="file" class="nav-icon"></span>
                                        <span class="menu-text">File Manager</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="task-app.html" class="">
                                        <span data-feather="clipboard" class="nav-icon"></span>
                                        <span class="menu-text">Task App</span>
                                    </a>
                                </li>
                            </ul>
                        </li>



                        <li class="has-subMenu">
                            <a href="#" class="">Crud</a>
                            <ul class="subMenu">
                                <li class="has-subMenu-left">
                                    <a href="#" class="">
                                        <span data-feather="shopping-cart" class="nav-icon"></span>
                                        <span class="menu-text">Firestore Crud</span>
                                    </a>
                                    <ul class="subMenu">
                                        <li>
                                            <a class="" href="firestore.html">View All</a>
                                        </li>
                                        <li>
                                            <a class="" href="firestore-add.html">Add
                                                New</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>


                        <li class="mega-item has-subMenu">
                            <a href="#" class="active">Pages</a>
                            <ul class="megaMenu-wrapper megaMenu-small">
                                <li>
                                    <ul>
                                        <li>
                                            <a href="projects.html" class="">Project</a>
                                        </li>
                                        <li>
                                            <a href="application-ui.html" class="">Project Details</a>
                                        </li>
                                        <li>
                                            <a href="create.html" class="">Create
                                                Project</a>
                                        </li>
                                        <li>
                                            <a href="users-card.html" class="">Team</a>
                                        </li>
                                        <li>
                                            <a href="users-card2.html" class="">Users</a>
                                        </li>
                                        <li>
                                            <a href="user-info.html" class="">Users
                                                Info</a>
                                        </li>
                                        <li>
                                            <a href="users-list.html" class="">Users
                                                List</a>
                                        </li>
                                        <li>
                                            <a href="users-group.html" class="">Users
                                                Group</a>
                                        </li>
                                        <li>
                                            <a href="banner.html" class="">
                                                <span class="menu-text">Banners</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="testimonial.html" class="">
                                                <span class="menu-text">Testimonial</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="support.html" class="">
                                                <span class="menu-text">Support Center</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="dynamic-table.html" class="">
                                                <span class="menu-text">Dynamic Table</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li>
                                            <a href="users-datatable.html" class="">Users
                                                Table</a>
                                        </li>
                                        <li>
                                            <a href="gallery.html" class="">Gallery 1</a>
                                        </li>
                                        <li>
                                            <a href="gallery2.html" class="">Gallery 2</a>
                                        </li>
                                        <li>
                                            <a href="pricing.html" class="">Pricing</a>
                                        </li>
                                        <li>
                                            <a href="faq.html" class="">FAQ's</a>
                                        </li>
                                        <li>
                                            <a href="search.html" class="">Search
                                                Results</a>
                                        </li>
                                        <li>
                                            <a href="maintenance.html" class="">Coming
                                                Soon</a>
                                        </li>
                                        <li>
                                            <a href="404.html" class="">404</a>
                                        </li>
                                        <li>
                                            <a href="maintenance.html" class="">
                                                <span class="menu-text">Maintenance</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="login.html" class="">
                                                <span class="menu-text">Log In</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="sign-up.html" class="">
                                                <span class="menu-text">Sign Up</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blank.html" class=" active">
                                                <span class="menu-text">Blank</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="mega-item has-subMenu">
                            <a href="#" class="">Components</a>
                            <ul class="megaMenu-wrapper megaMenu-wide">
                                <li>
                                    <span class="mega-title">Components</span>
                                    <ul>
                                        <li>
                                            <a class="" href="alert.html">Alert</a>
                                        </li>
                                        <li>
                                            <a class="" href="avatar.html">Avatar</a>
                                        </li>
                                        <li>
                                            <a class="" href="badge.html">Badge</a>
                                        </li>
                                        <li>
                                            <a class="" href="breadcrumbs.html">Breadcrumb</a>
                                        </li>
                                        <li>
                                            <a class="" href="buttons.html">Button</a>
                                        </li>
                                        <li>
                                            <a class="" href="cards.html">Cards</a>
                                        </li>
                                        <li>
                                            <a class="" href="carousel.html">Carousel</a>
                                        </li>
                                        <li>
                                            <a class="" href="checkbox.html">Checkbox</a>
                                        </li>
                                        <li>
                                            <a class="" href="collapse.html">Collapse</a>
                                        </li>
                                        <li>
                                            <a class="" href="comments.html">Comments</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="mega-title">Components</span>
                                    <ul>
                                        <li>
                                            <a class="" href="dashboard-base.html">Dashboard
                                                Base</a>
                                        </li>
                                        <li>
                                            <a class="" href="date-picker.html">DatePicker</a>
                                        </li>
                                        <li>
                                            <a class="" href="drawer.html">Drawer</a>
                                        </li>
                                        <li>
                                            <a class="" href="drag-drop.html">Drag &
                                                Drop</a>
                                        </li>
                                        <li>
                                            <a class="" href="dropdown.html">Dropdown</a>
                                        </li>
                                        <li>
                                            <a class="" href="empty.html">Empty</a>
                                        </li>
                                        <li>
                                            <a class="" href="input.html">Input</a>
                                        </li>
                                        <li>
                                            <a class="" href="list.html">List</a>
                                        </li>
                                        <li>
                                            <a class="" href="menu.html">Menu</a>
                                        </li>
                                        <li>
                                            <a class="" href="message.html">Message</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="mega-title">Components</span>
                                    <ul>
                                        <li>
                                            <a class="" href="modal.html">Modals</a>
                                        </li>
                                        <li>
                                            <a class="" href="notifications.html">Notification</a>
                                        </li>
                                        <li>
                                            <a class="" href="page-header.html">Page
                                                Headers</a>
                                        </li>
                                        <li>
                                            <a class="" href="pagination.html">Paginations</a>
                                        </li>
                                        <li>
                                            <a class="" href="progressbar.html">Progress</a>
                                        </li>
                                        <li>
                                            <a class="" href="radio.html">Radio</a>
                                        </li>
                                        <li>
                                            <a class="" href="rate.html">Rate</a>
                                        </li>
                                        <li>
                                            <a class="" href="result.html">Result</a>
                                        </li>
                                        <li>
                                            <a class="" href="select.html">Select</a>
                                        </li>
                                        <li>
                                            <a class="" href="skeleton.html">Skeleton</a>
                                        </li>
                                        <li>
                                            <a class="" href="time-picker.html">Timepicker</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="mega-title">Components</span>
                                    <ul>
                                        <li>
                                            <a class="" href="slider.html">Slider</a>
                                        </li>
                                        <li>
                                            <a class="" href="spin.html">Spinner</a>
                                        </li>
                                        <li>
                                            <a class="" href="statistics.html">Statistic</a>
                                        </li>
                                        <li>
                                            <a class="" href="steps.html">Steps</a>
                                        </li>
                                        <li>
                                            <a class="" href="switch.html">Switch</a>
                                        </li>
                                        <li>
                                            <a class="" href="tab.html">Tabs</a>
                                        </li>
                                        <li>
                                            <a class="" href="tag.html">Tags</a>
                                        </li>
                                        <li>
                                            <a class="" href="timeline.html">Timeline</a>
                                        </li>
                                        <li>
                                            <a class="" href="timeline-2.html">Timeline
                                                2</a>
                                        </li>
                                        <li>
                                            <a class="" href="timeline-3.html">Timeline
                                                3</a>
                                        </li>
                                        <li>
                                            <a class="" href="uploads.html">Upload</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="has-subMenu">
                            <a href="#" class="">Features</a>
                            <ul class="subMenu">
                                <li>
                                    <a href="editors.html" class="">
                                        <span data-feather="edit" class="nav-icon"></span>
                                        <span class="menu-text">Editors</span>
                                    </a>
                                </li>
                                <li class="has-subMenu-left">
                                    <a href="#" class="">
                                        <span data-feather="grid" class="nav-icon"></span>
                                        <span class="menu-text">Icons</span>
                                    </a>
                                    <ul class="subMenu">
                                        <li>
                                            <a href="feather.html" class="">Feather icons
                                                (svg)</a>
                                        </li>
                                        <li>
                                            <a href="fontawesome.html" class="">Font
                                                Awesome</a>
                                        </li>
                                        <li>
                                            <a href="lineawesome.html" class="">Line
                                                Awesome</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-subMenu-left">
                                    <a href="#" class="">
                                        <span data-feather="bar-chart-2" class="nav-icon"></span>
                                        <span class="menu-text">Charts</span>
                                    </a>
                                    <ul class="subMenu">
                                        <li>
                                            <a class="" href="charts.html">Chart JS</a>
                                        </li>
                                        <li>
                                            <a class="" href="google-chart.html">Google
                                                Charts</a>
                                        </li>
                                        <li>
                                            <a class="" href="peity-chart.html">Peity
                                                Charts</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-subMenu-left">
                                    <a href="#" class="">
                                        <span data-feather="disc" class="nav-icon"></span>
                                        <span class="menu-text">Froms</span>
                                    </a>
                                    <ul class="subMenu">
                                        <li>
                                            <a class="" href="form.html">Basics</a>
                                        </li>
                                        <li>
                                            <a class="" href="form-layouts.html">Layouts</a>
                                        </li>
                                        <li>
                                            <a class="" href="form-elements.html">Elements</a>
                                        </li>
                                        <li>
                                            <a class="" href="form-components.html">Components</a>
                                        </li>
                                        <li>
                                            <a class="" href="form-validations.html">Validations</a>
                                        </li>
                                    </ul>
                                </li>



                                <li class="has-subMenu-left">
                                    <a href="#" class="">
                                        <span data-feather="map" class="nav-icon"></span>
                                        <span class="menu-text">Maps</span>
                                    </a>
                                    <ul class="subMenu">
                                        <li>
                                            <a href="google-map.html" class="">Google
                                                Maps</a>
                                        </li>
                                        <li>
                                            <a href="leaflet-map.html" class="">Leaflet
                                                Maps</a>
                                        </li>
                                        <li>
                                            <a href="vector-map.html" class="">Vector
                                                Maps</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-subMenu-left">
                                    <a href="#" class="">
                                        <span data-feather="server" class="nav-icon"></span>
                                        <span class="menu-text">Widget</span>
                                    </a>
                                    <ul class="subMenu">
                                        <li>
                                            <a class="" href="widget-charts.html">Chart</a>
                                        </li>
                                        <li>
                                            <a class="" href="widget-mixed.html">Mixed</a>
                                        </li>
                                        <li>
                                            <a class="" href="widget-card.html">Card</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-subMenu-left">
                                    <a href="#" class="">
                                        <span data-feather="square" class="nav-icon"></span>
                                        <span class="menu-text">Wizards</span>
                                    </a>
                                    <ul class="subMenu">
                                        <li>
                                            <a href="checkout-wizard6.html" class="">Wizard
                                                1</a>
                                        </li>
                                        <li>
                                            <a href="checkout-wizard7.html" class="">Wizard
                                                2</a>
                                        </li>
                                        <li>
                                            <a href="checkout-wizard8.html" class="">Wizard
                                                3</a>
                                        </li>
                                        <li>
                                            <a href="checkout-wizard9.html" class="">Wizard
                                                4</a>
                                        </li>
                                        <li>
                                            <a href="checkout-wizard10.html" class="">Wizard
                                                5</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-subMenu-left">
                                    <a href="#" class="">
                                        <span data-feather="book" class="nav-icon"></span>
                                        <span class="menu-text">Knowledge Base</span>
                                    </a>
                                    <ul class="subMenu">
                                        <li>
                                            <a class="" href="knowledgebase.html">Knowledge
                                                Base</a>
                                        </li>
                                        <li>
                                            <a class="" href="knowledgebase-2.html">All
                                                Article</a>
                                        </li>

                                        <li>
                                            <a class="" href="knowledgebase-3.html">Single Article</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- ends: navbar-left -->

        <div class="navbar-right">
            <ul class="navbar-right__menu">
                <!-- ends: nav-message -->
                <li class="nav-notification">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle">
                            <span data-feather="bell"></span></a>
                        <div class="dropdown-wrapper">
                            <h2 class="dropdown-wrapper__title">Notifications <span
                                    class="badge-circle badge-warning ml-1">4</span></h2>
                            <a href="" class="dropdown-wrapper__more">See all incoming activity</a>
                        </div>
                    </div>
                </li>
                <!-- ends: .nav-notification -->
                <li class="nav-author">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle"><img
                                src="{{ \App\Helper\Static\Methods::staticAsset(" img/author-nav.jpg") }}" alt=""
                                class="rounded-circle"></a>
                        <div class="dropdown-wrapper">
                            <div class="nav-author__info">
                                <div class="author-img">
                                    <img src="{{ \App\Helper\Static\Methods::staticAsset(" img/author-nav.jpg") }}"
                                        alt="" class="rounded-circle">
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
                <a href="#" class="btn-search">
                    <span data-feather="search"></span>
                    <span data-feather="x"></span></a>
                <a href="#" class="btn-author-action">
                    <span data-feather="more-vertical"></span></a>
            </div>
        </div>
        <!-- ends: .navbar-right -->
    </nav>
</header> --}}

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
                        <i class="ri-line-chart-fill"></i>
                        <span class="nav-text">Approval Reqs.</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="submenu">
                        @can('admin_pending_approval_requests_access')
                            <li>
                                <a href="{{ route("admin.approval.index", ["status" => \App\Models\AdvertiserApply::STATUS_PENDING]) }}"
                                    data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/approval/pending") || request()->is("$urlType/approval/pending/*") ? "active" : null }}">
                                    <span>{{ trans('advertiser.approval.pending.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('admin_joined_approval_requests_access')
                            <li>
                                <a href="{{ route("admin.approval.index", ["status" => \App\Models\AdvertiserApply::STATUS_ACTIVE]) }}"
                                    data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/approval/joined") || request()->is("$urlType/approval/joined/*") ? "active" : null }}">
                                    <span>{{ trans('advertiser.approval.joined.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('admin_hold_approval_requests_access')
                            <li>
                                <a href="{{ route("admin.approval.index", ["status" => \App\Models\AdvertiserApply::STATUS_HOLD]) }}"
                                    data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/approval/hold") || request()->is("$urlType/approval/hold/*") ? "active" : null }}">
                                    <span>{{ trans('advertiser.approval.hold.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('admin_admitad_hold_approval_requests_access')
                            <li>
                                <a href="{{ route("admin.approval.index", ["status" => \App\Models\AdvertiserApply::STATUS_ADMITAD_HOLD]) }}"
                                    data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/approval/admitad_hold") || request()->is("$urlType/approval/admitad_hold/*") ? "active" : null }}">
                                    <span>Admitad {{ trans('advertiser.approval.hold.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('admin_rejected_approval_requests_access')
                            <li>
                                <a href="{{ route("admin.approval.index", ["status" => \App\Models\AdvertiserApply::STATUS_REJECTED]) }}"
                                    data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/approval/rejected") || request()->is("$urlType/approval/rejected/*") ? "active" : null }}">
                                    <span>{{ trans('advertiser.approval.rejected.title') }}</span>
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
                            <li class="l_sidebar">
                                <a href="{{ route("admin.advertiser-management.advertisers.index") }}" data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/advertiser-management/advertisers") || request()->is("$urlType/advertiser-management/advertisers/*") ? "active" : null }}">
                                    <span>{{ trans('cruds.advertiser.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('admin_api_advertisers_access')
                            <li class="l_sidebar">
                                <a href="{{ route("admin.advertiser-management.api-advertisers.index") }}"
                                    data-layout="light"
                                    class="nav-link {{ (request()->is("$urlType/advertiser-management/api-advertisers") || request()->is("$urlType/advertiser-management/api-advertisers/*")) && !(request()->is("$urlType/advertiser-management/api-advertisers/show-on-publisher") || request()->is("$urlType/advertiser-management/api-advertisers/show-on-publisher/*") || request()->is("$urlType/advertiser-management/api-advertisers/duplicate-records") || request()->is("$urlType/advertiser-management/api-advertisers/duplicate-records/*")) ? "active" : null }}">
                                    <span>{{ trans('advertiser.api-advertiser.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('admin_api_advertisers_show_access')
                            <li class="l_sidebar">
                                <a href="{{ route("admin.advertiser-management.api-advertisers.show_on_publisher.index") }}"
                                    data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/advertiser-management/api-advertisers/show-on-publisher") || request()->is("$urlType/advertiser-management/api-advertisers/show-on-publisher/*") ? "active" : null }}">
                                    <span>{{ trans('advertiser.api-advertiser.show_on_publisher.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('admin_manual_join_publishers_advertisers_access')
                            <li class="l_sidebar">
                                <a href="{{ route("admin.advertiser-management.manual_join_publisher") }}"
                                    data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/advertiser-management/manual-join-publisher") || request()->is("$urlType/advertiser-management/manual-join-publisher/*") ? "active" : null }}">
                                    <span>{{ trans('advertiser.manual_join_publisher.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('admin_api_advertisers_duplicate_records_access')
                            <li class="l_sidebar">
                                <a href="{{ route("admin.advertiser-management.api-advertisers.duplicate_record") }}"
                                    data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/advertiser-management/api-advertisers/duplicate-records") || request()->is("$urlType/advertiser-management/api-advertisers/duplicate-records/*") ? "active" : null }}">
                                    <span>{{ trans('advertiser.api-advertiser.duplicate_record.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>

                <div class="nav-item has-dropdown">
                    <a href="#" class="nav-link">
                        <i class="ri-code-s-slash-line"></i>
                        <span class="nav-text">Creatives</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="submenu">
                        @can('admin_coupons_creatives_access')
                            <li class="l_sidebar">
                                <a href="{{ route("admin.creative-management.coupons.index") }}" data-layout="light"
                                    class=" nav-link {{ request()->is("$urlType/creative-management/coupons") || request()->is("$urlType/creative-management/coupons/*") ? "active" : null }}">
                                    <span>{{ trans('creative.creativeManagement.coupon.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>

                <div class="nav-item has-dropdown">
                    <a href="payments.html" class="nav-link">
                        <i class="ri-money-dollar-box-line"></i>
                        <span class="nav-text">Payments</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="submenu">
                        @can('admin_pending_to_pay_payments_access')
                            <li class="l_sidebar">
                                <a href="{{ route("admin.payment-management.index", ["section" => \App\Models\PaymentHistory::PENDING_TO_PAY]) }}"
                                    data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/payment-management/pending-to-pay") || request()->is("$urlType/payment-management/pending-to-pay/*") ? "active" : null }}">
                                    <span>{{ trans('advertiser.approval.pending.title') }} To Pay</span>
                                </a>
                            </li>
                        @endcan
                        @can('admin_paid_to_publisher_payments_access')
                            <li class="l_sidebar">
                                <a href="{{ route("admin.payment-management.index", ["section" => \App\Models\PaymentHistory::PAID_TO_PUBLISHER]) }}"
                                    data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/payment-management/paid-to-publisher") || request()->is("$urlType/payment-management/paid-to-publisher/*") ? "active" : null }}">
                                    <span>Paid To Publisher</span>
                                </a>
                            </li>
                        @endcan
                        @can('admin_release_payments_access')
                            <li class="l_sidebar">
                                <a href="{{ route("admin.payment-management.index", ["section" => \App\Models\PaymentHistory::RELEASE_PAYMENT]) }}"
                                    data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/payment-management/release-payment") || request()->is("$urlType/payment-management/release-payment/*") ? "active" : null }}">
                                    <span>Release Payment</span>
                                </a>
                            </li>
                        @endcan
                        @can('admin_history_payments_access')
                            <li class="l_sidebar">
                                <a href="{{ route("admin.payment-management.index", ["section" => \App\Models\PaymentHistory::PAYMENT_HISTORY]) }}"
                                    data-layout="light"
                                    class="nav-link {{ request()->is("$urlType/payment-management/payment-history") || request()->is("$urlType/payment-management/payment-history/*") ? "active" : null }}">
                                    <span>Payment History</span>
                                </a>
                            </li>
                        @endcan
                        @can('admin_no_publisher_payments_access')
                            <li class="l_sidebar">
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
                    <a href="profile.html" class="nav-link">
                        <i class="ri-profile-line"></i>
                        <span class="nav-text">Stats.</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="submenu">
                        @can('admin_tracking_links_statistics_access')
                            <li class="l_sidebar">
                                <a href="{{ route("admin.statistics.links.index") }}" data-layout="light" class="nav-link {{ request()->is("$urlType/statistics/links") || request()->is("$urlType/statistics/links/*") ? "active" : null }}">
                                    <span>{{ trans('link.statistics.links.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('admin_deep_links_statistics_access')
                            <li class="l_sidebar">
                                <a href="{{ route("admin.statistics.deeplinks.index") }}" data-layout="light" class="nav-link {{ request()->is("$urlType/statistics/deeplinks") || request()->is("$urlType/statistics/deeplinks/*") ? "active" : null }}">
                                    <span>{{ trans('link.statistics.links.deep_title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>

                <div class="nav-item has-dropdown">
                    <a href="payments.html" class="nav-link">
                        <i class="ri-money-dollar-box-line"></i>
                        <span class="nav-text">Settings</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="submenu">
                        @can('admin_advertiser_configurations_settings_access')
                            <li class="l_sidebar">
                                <a href="{{ route("admin.settings.advertiser-configs.index") }}" data-layout="light" class="nav-link {{ request()->is("$urlType/settings/advertiser-configs") || request()->is("$urlType/settings/advertiser-configs/*") ? "active" : null }}">
                                    <span>{{ trans('cruds.advertiser_configuration.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('admin_notification_settings_access')
                            <li class="l_sidebar">
                                <a href="{{ route("admin.settings.notification.index") }}" data-layout="light" class="nav-link {{ request()->is("$urlType/settings/notification") || request()->is("$urlType/settings/notification/*") ? "active" : null }}">
                                    <span>{{ trans('cruds.notification.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>

                <div class="nav-item has-dropdown">
                    <a href="payments.html" class="nav-link">
                        <i class="ri-money-dollar-box-line"></i>
                        <span class="nav-text">Management</span>
                        <i class="chevron ri-arrow-down-s-line"></i>
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