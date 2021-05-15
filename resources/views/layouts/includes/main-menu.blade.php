<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('home') }}">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">POS</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="{{ route('home') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span><span class="badge badge badge-warning badge-pill float-right mr-2">2</span></a>
                <ul class="menu-content">
                    <li class="active"><a href="{{ route('home') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Analytics</span></a>
                    </li>
                    <li><a href=""><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">eCommerce</span></a>
                    </li>
                </ul>
            </li>
            <li class=" navigation-header"><span>SHOP</span></li>
            <li class=" nav-item"><a href="{{ route('orders.index') }}"><i class="feather icon-list"></i><span class="menu-title" data-i18n="Email">POS Invoice</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('transactions.index') }}"><i class="feather icon-credit-card"></i><span class="menu-title" data-i18n="Chat">Transactions</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('products.index') }}"><i class="feather icon-check-square"></i><span class="menu-title" data-i18n="Todo">Products</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('suppliers.index') }}"><i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Calender">Suppliers</span></a>
            </li>
            <li class=" nav-item"><a href=""><i class="feather icon-users"></i><span class="menu-title" data-i18n="Customer">Customers</span></a>
            </li>
            <li class=" nav-item"><a href=""><i class="feather icon-truck"></i><span class="menu-title" data-i18n="Incoming">Incoming</span></a>
            </li>
            <li class=" nav-item"><a href=""><i class="feather icon-shopping-cart"></i><span class="menu-title" data-i18n="Ecommerce">Invoice</span></a>
                <ul class="menu-content">
                    <li><a href=""><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Shop">POS Invoice</span></a>
                    </li>
                    <li><a href=""><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">Manage Invoice</span></a>
                    </li>
                </ul>
            </li>
            <li class=" navigation-header"><span>Reports</span>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-paperclip"></i><span class="menu-title" data-i18n="Charts">Reports</span><span class="badge badge badge-pill badge-success float-right mr-2">3</span></a>
                <ul class="menu-content">
                    <li><a href=""><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Apex">Apex</span></a>
                    </li>
                    <li><a href=""><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Chartjs">Chartjs</span></a>
                    </li>
                    <li><a href=""><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Echarts">Echarts</span></a>
                    </li>
                </ul>
            </li>
            <li class=" navigation-header"><span>SETUP</span>
            </li>
            <li class=" nav-item"><a href="{{ route('users.index') }}"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Profile">Users</span></a>
            </li>
            <li class=" nav-item"><a href=""><i class="feather icon-settings"></i><span class="menu-title" data-i18n="Account Settings">Account Settings</span></a>
            </li>
            <li class=" nav-item"><a href=""><i class="feather icon-help-circle"></i><span class="menu-title" data-i18n="FAQ">FAQ</span></a>
            </li>
            <li class=" nav-item"><a href=""><i class="feather icon-info"></i><span class="menu-title" data-i18n="Knowledge Base">Knowledge Base</span></a>
            </li>
            <li class=" nav-item"><a href=""><i class="feather icon-search"></i><span class="menu-title" data-i18n="Search">Search</span></a>
            </li>
            <li class=" navigation-header"><span>Support</span>
            </li>
            <li class=" nav-item"><a href="https://advancepos.com" target="_blank"><i class="feather icon-folder"></i><span class="menu-title" data-i18n="Documentation">Support Ticket</span></a>
            </li>
        </ul>
    </div>
</div>
