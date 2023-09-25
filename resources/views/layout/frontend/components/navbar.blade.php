<!-- Main Header-->
<header class="main-header">

    <!--Header-Upper-->
    <div class="header-upper">
        <div class="outer-container">
            <div class="clearfix">

                <div class="pull-left logo-box">
                    <div class="logo"><a href="{{ route('frontend.index') }}"><img src="{{ asset('assets/frontend/images/logo.png') }}" alt=""
                                title=""></a></div>
                </div>

                <!-- Main Menu End-->
                <div class="outer-box clearfix">
                    <ul class="option-list">
                        <li><span
                                class="icon flaticon-phone-symbol-of-an-auricular-inside-a-circle"></span><strong>Tel:</strong>
                            +32 89 4567 01</li>
                        <li><a href="appointment.html"><span
                                    class="icon flaticon-sent-mail"></span><strong>Chat With Us</strong></a>
                        </li>
                    </ul>
                </div>

                <div class="nav-outer clearfix">

                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <div class="navbar-header">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="{{ Route::is('frontend.index') ? 'current' : '' }}"><a href="{{ route('frontend.index') }}">Home</a></li>

                                <li class="{{ Route::is('frontend.about') ? 'current' : '' }}"><a href="{{ route('frontend.about') }}">About Us</a></li>

                                <li class="{{ Route::is('frontend.service') ? 'current' : '' }}"><a href="{{ route('frontend.service') }}">Service</a></li>

                                <li class="{{ Route::is('frontend.project') ? 'current' : '' }}"><a href="{{ route('frontend.project') }}">Project</a></li>

                                <li class="{{ Route::is('frontend.contactus') ? 'current' : '' }}"><a href="{{ route('frontend.contactus') }}">Contact us</a></li>
                            </ul>
                        </div>

                    </nav>

                </div>

            </div>
        </div>
    </div>
    <!--End Header Upper-->

    <!--Sticky Header-->
    <div class="sticky-header">
        <div class="auto-container clearfix">
            <!--Logo-->
            <div class="logo pull-left">
                <a href="index.html" class="img-responsive"><img src="{{ asset('assets/frontend/images/logo-small.png') }}" alt=""
                        title=""></a>
            </div>

            <!--Right Col-->
            <div class="right-col pull-right">
                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-md">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                        <ul class="navigation clearfix">
                            <li class="current dropdown"><a href="#">Home</a>
                                <ul>
                                    <li><a href="index.html">Home Page 01</a></li>
                                    <li><a href="index-2.html">Home Page 02</a></li>
                                    <li class="dropdown"><a href="#">Header Styles</a>
                                        <ul>
                                            <li><a href="index.html">Header Style 01</a></li>
                                            <li><a href="index-2.html">Header Style 02</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Windows</a>
                                <ul>
                                    <li><a href="windows-instalation.html">Installation</a></li>
                                    <li><a href="window-services.html">Service & Repair</a></li>
                                    <li><a href="window-replacement.html">Replacement</a></li>
                                    <li><a href="window-brands.html">Brands We Carry</a></li>
                                    <li><a href="window-types.html">Window Types</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Doors</a>
                                <ul>
                                    <li><a href="doors-instalation.html">Installation</a></li>
                                    <li><a href="doors-repair.html">Service & Repair</a></li>
                                    <li><a href="doors-replacement.html">Replacement</a></li>
                                    <li><a href="doors-brands.html">Brands We Carry</a></li>
                                    <li><a href="doors-type.html">Doors Types</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Shop</a>
                                <ul>
                                    <li><a href="shop.html">Our Products</a></li>
                                    <li><a href="shop-single.html">Product Single</a></li>
                                    <li><a href="shoping-cart.html">Shopping Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="account.html">Account</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Gallery</a>
                                <ul>
                                    <li><a href="gallery.html">Gallery Style 01</a></li>
                                    <li><a href="gallery-2.html">Gallery Style 02</a></li>
                                    <li><a href="gallery-3.html">Gallery Style 03</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Pages</a>
                                <ul>
                                    <li><a href="about.html">About Company</a></li>
                                    <li><a href="appointment.html">Make an Appointment</a></li>
                                    <li><a href="pricing.html">Pricing Plan</a></li>
                                    <li><a href="faq.html">FAQ’s</a></li>
                                    <li><a href="testimonial.html">Testimonials</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Blog</a>
                                <ul>
                                    <li><a href="blog.html">Our Blog</a></li>
                                    <li><a href="blog-sidebar.html">Blog Sidebar</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact us</a></li>
                        </ul>
                    </div>
                </nav><!-- Main Menu End-->
            </div>

        </div>
    </div>
    <!--End Sticky Header-->

</header>
<!--End Main Header -->
