<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <a href="index.html">
                <img src="{{ asset('assets/backend/img/logo.png') }}" class="img-fluid logo" alt="">
            </a>
            <a href="index.html">
                <img src="{{ asset('assets/backend/img/logo-small.png') }}" class="img-fluid logo-small" alt="">
            </a>
        </div>
    </div>
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">

            <ul>
                <li class="menu-title"><span>Main</span></li>
                <li class="{{ Route::is('home') ? 'active' : '' }}">
                    <a class="active" href="{{ route('home') }}"><i class="fe fe-home"></i><span>Dashboard</span></a>
                </li>
            </ul>

            <ul>
                <li class="menu-title"><span>Bill Management</span></li>
                <li>
                    <a href="#"><i class="fe fe-file-text"></i> <span>Quatation</span></a>
                </li>
                <li>
                    <a href="#"><i class="fe fe-database"></i> <span>Bill</span></a>
                </li>
                <li>
                    <a href="#"><i class="fe fe-shopping-cart"></i> <span>Purchase</span></a>
                </li>
                <li>
                    <a href="#"><i class="fe fe-credit-card"></i> <span>Expence</span></a>
                </li>
            </ul>

            <ul>
                <li class="menu-title"><span>Payment Management</span></li>
                <li>
                    <a href="#"><i class="fe fe-dollar-sign"></i> <span>Vendor Payment</span></a>
                </li>
                <li>
                    <a href="#"><i class="fe fe-dollar-sign"></i> <span>Customer Payment</span></a>
                </li>
            </ul>

            <ul>
                <li class="menu-title"><span>General</span></li>
                <li class="{{ Route::is('bank.index', 'bank.store', 'bank.edit') ? 'active' : '' }}">
                    <a href="{{ route('bank.index') }}"><i class="fe fe-pocket"></i> <span>Bank</span></a>
                </li>
                <li class="{{ Route::is('product.index', 'product.store', 'product.edit' ) ? 'active' : '' }}">
                    <a href="{{ route('product.index') }}"><i class="fe fe-package"></i> <span>Product</span></a>
                </li>
                <li>
                    <a href="#"><i class="fe fe-book-open"></i> <span>Addon</span></a>
                </li>
            </ul>


            <ul>
                <li class="menu-title"><span>User Management</span></li>
                <li>
                    <a href="#"><i class="fe fe-users"></i> <span>Customers</span></a>
                </li>
                <li>
                    <a href="#"><i class="fe fe-user"></i> <span>Vendor</span></a>
                </li>
            </ul>

        </div>
    </div>
</div>
