@include('layouts.includes.header')
<!-- BEGIN: Header-->
@include('layouts.includes.navbar')
<!-- END: Header-->

<!-- BEGIN: Main Menu-->
@include('layouts.includes.main-menu')
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    @yield('content')
</div>
<!-- END: Content-->
@include('layouts.includes.footer')
