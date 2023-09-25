@extends('layout.frontend.guest')

@section('content')
    <section class="page-title" style="background-image:url({{ asset('assets/frontend/images/background/1.jpg') }})">
        <div class="auto-container">
            <h1>About Our Company</h1>
            <ul class="page-breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li>Pages</li>
                <li>About Us</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Company Section-->
    <section class="company-section">
        <div class="auto-container">

            <!--Sec Title-->
            <div class="sec-title">
                <h2>leading upvc <span class="theme_color">Doors & Windows</span> company</h2>
            </div>
            <div class="row clearfix">

                <!--Mission Column-->
                <div class="mission-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h2>Our Mission</h2>
                        <div class="text">There anyone who loves or pursues or desires to obtain pain of itself, because
                            it is pain, but because occasionally circumstances occur in which toil and pain can procure him
                            some great pleasure. To take a trivial example, which of us ever undertakes laborious physical
                            exercise.</div>
                        <div class="row clearfix">
                            <div class="image-column col-lg-6 col-md-6 col-sm-6">
                                <div class="image">
                                    <a href="images/resource/mission-1.jpg" class="overlay-box lightbox-image"
                                        data-fancybox="mission-gallery" data-caption=""><img
                                            src="{{ asset('assets/frontend/images/resource/mission-1.jpg') }}"
                                            alt="" /></a>
                                </div>
                            </div>
                            <div class="image-column col-lg-6 col-md-6 col-sm-6">
                                <div class="image">
                                    <a href="images/resource/mission-2.jpg" class="overlay-box lightbox-image"
                                        data-fancybox="mission-gallery" data-caption=""><img
                                            src="{{ asset('assets/frontend/images/resource/mission-2.jpg') }}"
                                            alt="" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Vision Column-->
                <div class="vision-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="row clearfix">
                            <div class="image-column col-lg-6 col-md-6 col-sm-6">
                                <div class="image">
                                    <a href="images/resource/vision-1.jpg" class="overlay-box lightbox-image"
                                        data-fancybox="vision-gallery" data-caption=""><img
                                            src="{{ asset('assets/frontend/images/resource/vision-1.jpg') }}"
                                            alt="" /></a>
                                </div>
                            </div>
                            <div class="image-column col-lg-6 col-md-6 col-sm-6">
                                <div class="image">
                                    <a href="images/resource/vision-2.jpg" class="overlay-box lightbox-image"
                                        data-fancybox="vision-gallery" data-caption=""><img
                                            src="{{ asset('assets/frontend/images/resource/vision-2.jpg') }}"
                                            alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <h2>Our Vision</h2>
                        <ul class="list-style-one">
                            <li>Leader for custom door and window solutions.</li>
                            <li>Quality, performance & value.</li>
                            <li>Providing comfort and protection for your family.</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Company Section-->

    <!--Services Section Two-->
    <section class="services-section-two">
        <div class="auto-container">
            <!--Sec Title-->
            <div class="sec-title centered">
                <h2>Reason for <span class="theme_color">Choose Us</span></h2>
            </div>
            <div class="services-item-carousel-two owl-carousel owl-theme">

                <!--Services Block Two-->
                <div class="services-block-two">
                    <div class="inner-box">
                        <div class="icon-box">
                            <span class="icon flaticon-door-4"></span>
                        </div>
                        <div class="content-box">
                            <h3><a href="windows-repair.html">76 Yrs <br> of Experience</a></h3>
                            <div class="text">Great explorer of the truth, thats master-builder off human happiness.</div>
                            <a href="doors-brands.html" class="read-more">Know More</a>
                        </div>
                    </div>
                </div>

                <!--Services Block Two-->
                <div class="services-block-two">
                    <div class="inner-box">
                        <div class="icon-box">
                            <span class="icon flaticon-award"></span>
                        </div>
                        <div class="content-box">
                            <h3><a href="windows-repair.html">We <br> Care Quality</a></h3>
                            <div class="text">There anyone who loves or pursues or desires to obtain works of itself.
                            </div>
                            <a href="doors-brands.html" class="read-more">Know More</a>
                        </div>
                    </div>
                </div>

                <!--Services Block Two-->
                <div class="services-block-two">
                    <div class="inner-box">
                        <div class="icon-box">
                            <span class="icon flaticon-money"></span>
                        </div>
                        <div class="content-box">
                            <h3><a href="windows-repair.html"> $50 <br> Million Sales</a></h3>
                            <div class="text">Toil and pain can procure him some great pleasure to take a trivial example.
                            </div>
                            <a href="doors-brands.html" class="read-more">Know More</a>
                        </div>
                    </div>
                </div>

                <!--Services Block Two-->
                <div class="services-block-two">
                    <div class="inner-box">
                        <div class="icon-box">
                            <span class="icon flaticon-labor-man"></span>
                        </div>
                        <div class="content-box">
                            <h3><a href="windows-repair.html">Trained <br> Service Team</a></h3>
                            <div class="text">Who loves or pursues or desires obtain pain off itself, in toil to exercise.
                            </div>
                            <a href="doors-brands.html" class="read-more">Know More</a>
                        </div>
                    </div>
                </div>

                <!--Services Block Two-->
                <div class="services-block-two">
                    <div class="inner-box">
                        <div class="icon-box">
                            <span class="icon flaticon-door-4"></span>
                        </div>
                        <div class="content-box">
                            <h3><a href="windows-repair.html">76 Yrs <br> of Experience</a></h3>
                            <div class="text">Great explorer of the truth, thats master-builder off human happiness.</div>
                            <a href="doors-brands.html" class="read-more">Know More</a>
                        </div>
                    </div>
                </div>

                <!--Services Block Two-->
                <div class="services-block-two">
                    <div class="inner-box">
                        <div class="icon-box">
                            <span class="icon flaticon-award"></span>
                        </div>
                        <div class="content-box">
                            <h3><a href="windows-repair.html">We <br> Care Quality</a></h3>
                            <div class="text">There anyone who loves or pursues or desires to obtain works of itself.
                            </div>
                            <a href="doors-brands.html" class="read-more">Know More</a>
                        </div>
                    </div>
                </div>

                <!--Services Block Two-->
                <div class="services-block-two">
                    <div class="inner-box">
                        <div class="icon-box">
                            <span class="icon flaticon-money"></span>
                        </div>
                        <div class="content-box">
                            <h3><a href="windows-repair.html"> $50 <br> Million Sales</a></h3>
                            <div class="text">Toil and pain can procure him some great pleasure to take a trivial
                                example.</div>
                            <a href="doors-brands.html" class="read-more">Know More</a>
                        </div>
                    </div>
                </div>

                <!--Services Block Two-->
                <div class="services-block-two">
                    <div class="inner-box">
                        <div class="icon-box">
                            <span class="icon flaticon-labor-man"></span>
                        </div>
                        <div class="content-box">
                            <h3><a href="windows-repair.html">Trained <br> Service Team</a></h3>
                            <div class="text">Who loves or pursues or desires obtain pain off itself, in toil to
                                exercise.</div>
                            <a href="doors-brands.html" class="read-more">Know More</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Services Section Two-->

    <!--Fun Facts Section-->
    <div class="fact-counter-section style-two">
        <div class="fact-counter">
            <div class="auto-container">
                <div class="row clearfix">

                    <!--Column-->
                    <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="6000" data-stop="5">0</span>k
                                <h4 class="counter-title">Windows Installed</h4>
                            </div>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="6000" data-stop="2">0</span>K
                                <h4 class="counter-title">Doors Installed</h4>
                            </div>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="6000" data-stop="57">0</span>
                                <h4 class="counter-title">Expert Team Members</h4>
                            </div>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="column counter-column col-lg-3 col-md-5 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="900ms" data-wow-duration="1500ms">
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="8000" data-stop="219">0</span>
                                <h4 class="counter-title">Corporate Partners</h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--End Fun Facts Section-->

    <!--Certificate Section-->
    <section class="certificate-section style-two">
        <div class="auto-container">
            <!--Sec Title-->
            <div class="sec-title centered">
                <h2>Affiliations & <span class="theme_color">Certification</span></h2>
            </div>
            <div class="row clearfix">

                <!--Certificate Block-->
                <div class="certificate-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <img src="{{ asset('assets/frontend/images/resource/certificate.png') }}" alt="" />
                        </div>
                        <div class="text">Nor again is there anyone who loves or pursues or desires too.</div>
                    </div>
                </div>

                <!--Certificate Block-->
                <div class="certificate-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow bounceIn" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="{{ asset('assets/frontend/images/resource/certificate.png') }}" alt="" />
                        </div>
                        <div class="text"> Idea of denouncing pleasure praising pain was born system expound.</div>
                    </div>
                </div>

                <!--Certificate Block-->
                <div class="certificate-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <img src="{{ asset('assets/frontend/images/resource/certificate.png') }}" alt="" />
                        </div>
                        <div class="text">Give you a complete account of that system expound actual.</div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Certificate Section-->
@endsection
