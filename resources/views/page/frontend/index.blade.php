@extends('layout.frontend.guest')

@section('content')

        <!--Main Slider-->
        <section class="main-slider">

            <div class="main-slider-carousel owl-carousel owl-theme">

                <div class="slide" style="background-image: url('{{ asset('assets/frontend/images/main-slider/image-1.jpg') }}');">
                    <div class="auto-container">
                        <div class="content">
                            <h2>Doors</h2>
                            <h3>That Open For <span>You All.</span></h3>
                            <div class="text">Must explain to you how all this mistaken idea of denouncing pleasure
                                and <br> praising pain was born and I will give you a completed.</div>
                            <div class="link-box">
                                <a href="#" class="theme-btn btn-style-one"><span
                                        class="arrow flaticon-right-arrow-4"></span>About Company</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slide" style="background-image: url('{{ asset('assets/frontend/images/main-slider/image-2.jpg') }}');">
                    <div class="auto-container">
                        <div class="content">
                            <h2>Windows</h2>
                            <h3>That Available in Wide Range of <span>Colors.</span></h3>
                            <div class="text">Must explain to you how all this mistaken idea of denouncing pleasure
                                and <br>praising pain was born and I will give you a completed.</div>
                            <div class="link-box">
                                <a href="#" class="theme-btn btn-style-one"><span
                                        class="arrow flaticon-right-arrow-4"></span>About Company</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slide" style="background-image: url('{{ asset('assets/frontend/images/main-slider/image-3.jpg') }}');">
                    <div class="auto-container">
                        <div class="content">
                            <h2>Prices</h2>
                            <h3>We Will Beat Your Lowest <span>Quote.</span></h3>
                            <div class="text">Must explain to you how all this mistaken idea of denouncing pleasure
                                and <br> praising pain was born and I will give you a completed.</div>
                            <div class="link-box">
                                <a href="#" class="theme-btn btn-style-one"><span
                                        class="arrow flaticon-right-arrow-4"></span>About Company</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!--End Main Slider-->

        <!--Welcome Section-->
        <section class="welcome-section">

            <div class="auto-container">
                <!--Sec Title-->
                <div class="sec-title">
                    <h2>Welcome to <span class="theme_color">Shutters</span></h2>
                </div>
                <div class="row clearfix">

                    <!--Image Column-->
                    <div class="image-column col-lg-4 col-md-12 col-sm-12">
                        <div class="inner-column wow slideInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image">
                                <img src="{{ asset('assets/frontend/images/resource/welcome-1.jpg') }}" alt="" />
                            </div>
                        </div>
                    </div>

                    <!--Content Column-->
                    <div class="content-column col-lg-8 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <h2>uPVC Windows & Doors <br> Available With Wide Range of <br> Colors & Designs.</h2>
                            <div class="text">
                                <p>Expound the actual teachings of the great explorer of the truth, the master-builder
                                    of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it
                                    is pleasure, but because those who do not know how to pursue pleasure rationally
                                    encounter consequences that are extremely painful.</p>
                                <p>The great explorer of the truth, the master-builder of human happiness. No one
                                    rejects, dislikes, or avoids it is those who do not know how to pursue pleasure.</p>
                                <p>Master Upvc shutter services</p>
                            </div>
                            <div class="percent"><span>60% </span>Of Commercial Place</div>
                        </div>
                    </div>

                </div>
            </div>

            <!--Address Box-->
            <section class="address-box">
                <div class="inner-box" style="background-image: url(images/background/pattern-1.png)">
                    <div class="icon-box">
                        <span class="icon flaticon-place"></span>
                    </div>
                    <h2>Address</h2>
                    <div class="text">PO Box 37188 Millon Street, Welmington 11226 <br> United States.</div>
                </div>
            </section>
            <!--End Address Box-->

        </section>
        <!--End Welcome Section-->

        <section class="services-section">
            <div class="outer-container">
                <div class="auto-container">
                    <!--Sec Title-->
                    <div class="sec-title centered">
                        <div class="title-inner">
                            <h2>Our Main <span class="theme_color">Services</span></h2>
                        </div>
                    </div>
                </div>
                <div class="single-item-carousel owl-carousel owl-theme">

                    <!--Services Block-->
                    <div class="services-block">
                        <div class="inner-box">
                            <div class="image-outer">
                                <div class="image">
                                    <img src="{{ asset('assets/frontend/images/resource/service-1.jpg') }}" alt="" />
                                    <a href="{{ asset('assets/frontend/images/resource/service-1.jpg') }}" class="overlay-box lightbox-image"
                                        data-fancybox="services-gallery" data-caption=""><span
                                            class="plus flaticon-plus-symbol"></span></a>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="big-icon flaticon-window"></div>
                                <div class="icon-box">
                                    <span class="icon flaticon-window"></span>
                                </div>
                                <h3><a href="window-services.html">UPVC Window</a></h3>
                                <div class="text">Great explorer of the truth, the master-builder of human happiness
                                    one rejects, dislikes, or avoids pleasure itself, because it is but consequences
                                    that are extremely painful.</div>
                            </div>
                        </div>
                    </div>

                    <!--Services Block-->
                    <div class="services-block">
                        <div class="inner-box">
                            <div class="image-outer">
                                <div class="image">
                                    <img src="{{ asset('assets/frontend/images/resource/service-2.jpg') }}" alt="" />
                                    <a href="{{ asset('assets/frontend/images/resource/service-2.jpg') }}" class="overlay-box lightbox-image"
                                        data-fancybox="services-gallery" data-caption=""><span
                                            class="plus flaticon-plus-symbol"></span></a>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="big-icon flaticon-doorway"></div>
                                <div class="icon-box">
                                    <span class="icon flaticon-doorway"></span>
                                </div>
                                <h3><a href="window-services.html">UPVC Door</a></h3>
                                <div class="text">Enouncing pleasure and praising great explorer of the truth, the
                                    master-builder of human happiness one rejects, dislikes, or avoids pleasure itself,
                                    because it is pleasure.</div>
                            </div>
                        </div>
                    </div>

                    <!--Services Block-->
                    <div class="services-block">
                        <div class="inner-box">
                            <div class="image-outer">
                                <div class="image">
                                    <img src="{{ asset('assets/frontend/images/resource/service-3.jpg') }}" alt="" />
                                    <a href="{{ asset('assets/frontend/images/resource/service-3.jpg') }}" class="overlay-box lightbox-image"
                                        data-fancybox="services-gallery" data-caption=""><span
                                            class="plus flaticon-plus-symbol"></span></a>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="big-icon flaticon-car-parts"></div>
                                <div class="icon-box">
                                    <span class="icon flaticon-car-parts"></span>
                                </div>
                                <h3><a href="window-services.html">Services & Repair</a></h3>
                                <div class="text">Great explorer of the truth, the master-builder of human happiness.
                                    one rejects, dislikes, or avoids pleasure itself, because it is but consequences
                                    that are extremely painful. </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!--Fluid Section One-->
        <section class="fluid-section-one">
            <div class="outer-container clearfix">

                <!--Content Column-->
                <div class="content-column clearfix">
                    <div class="inner-column">
                        <div class="sec-title">
                            <h2>Upvc Key <span class="theme_color">Features</span></h2>
                        </div>

                        <div class="single-vertical-carousel">

                            <div class="slide">

                                <!--Key Block-->
                                <div class="key-block">
                                    <div class="inner-box">
                                        <div class="icon-box">
                                            <span class="icon flaticon-rain"></span>
                                            <span class="number">1</span>
                                        </div>
                                        <div class="content">
                                            <h3><a href="window-services.html">Weather Resistance</a></h3>
                                            <div class="text">Desires to obtain pain of itself, because it is pain,
                                                but because occasionally circumstances occur in which toil.</div>
                                        </div>
                                    </div>
                                </div>

                                <!--Key Block-->
                                <div class="key-block">
                                    <div class="inner-box">
                                        <div class="icon-box">
                                            <span class="icon flaticon-handle"></span>
                                            <span class="number">2</span>
                                        </div>
                                        <div class="content">
                                            <h3><a href="window-services.html">High Security</a></h3>
                                            <div class="text">Nor again is there anyone who loves or pursues or
                                                desires to because it pain, but because occasionally.</div>
                                        </div>
                                    </div>
                                </div>

                                <!--Key Block-->
                                <div class="key-block">
                                    <div class="inner-box">
                                        <div class="icon-box">
                                            <span class="icon flaticon-speaker-1"></span>
                                            <span class="number">3</span>
                                        </div>
                                        <div class="content">
                                            <h3><a href="window-services.html">Sound Insulation</a></h3>
                                            <div class="text">Nor again is there anyone who loves or pursues or
                                                desires to because it pain, but because occasionally.</div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="slide">

                                <!--Key Block-->
                                <div class="key-block">
                                    <div class="inner-box">
                                        <div class="icon-box">
                                            <span class="icon flaticon-rain"></span>
                                            <span class="number">1</span>
                                        </div>
                                        <div class="content">
                                            <h3><a href="window-services.html">Weather Resistance</a></h3>
                                            <div class="text">Desires to obtain pain of itself, because it is pain,
                                                but because occasionally circumstances occur in which toil.</div>
                                        </div>
                                    </div>
                                </div>

                                <!--Key Block-->
                                <div class="key-block">
                                    <div class="inner-box">
                                        <div class="icon-box">
                                            <span class="icon flaticon-handle"></span>
                                            <span class="number">2</span>
                                        </div>
                                        <div class="content">
                                            <h3><a href="window-services.html">High Security</a></h3>
                                            <div class="text">Nor again is there anyone who loves or pursues or
                                                desires to because it pain, but because occasionally.</div>
                                        </div>
                                    </div>
                                </div>

                                <!--Key Block-->
                                <div class="key-block">
                                    <div class="inner-box">
                                        <div class="icon-box">
                                            <span class="icon flaticon-speaker-1"></span>
                                            <span class="number">3</span>
                                        </div>
                                        <div class="content">
                                            <h3><a href="window-services.html">Sound Insulation</a></h3>
                                            <div class="text">Nor again is there anyone who loves or pursues or
                                                desires to because it pain, but because occasionally.</div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

                <!--Image Column-->
                <div class="image-column" style="background-image: url('{{ asset('assets/frontend/images/resource/image-1.jpg') }}');">
                    <figure class="image-box"><img src="{{ asset('assets/frontend/images/resource/image-1.jpg') }}" alt=""></figure>
                </div>

            </div>
        </section>
        <!--End Fluid Section One Section-->

        <!--Feedback Section-->
        <section class="feedback-section">
            <!--Title Box-->
            <div class="title-box">
                <div class="auto-container">
                    <!--Sec Title-->
                    <div class="sec-title centered">
                        <div class="title-inner">
                            <h2>Customer <span class="theme_color">Feedback</span></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lower-section">
                <div class="lower-inner-section">
                    <div class="single-item-carousel owl-theme owl-carousel">

                        <!--Testimonial Block-->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="image-outer">
                                    <div class="image">
                                        <img src="{{ asset('assets/frontend/images/resource/author-4.jpg') }}" alt="" />
                                    </div>
                                    <div class="quote-icon">
                                        <span class="icon flaticon-quote-1"></span>
                                    </div>
                                </div>
                                <h3>Kenozoik Elson</h3>
                                <div class="location">Newyork</div>
                                <div class="text">Expound the actual teachings of the greatexplorer of the truth, the
                                    master builder of human happiness one rejects, dislikes, or avoids pleasure.</div>
                            </div>
                        </div>

                        <!--Testimonial Block-->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="image-outer">
                                    <div class="image">
                                        <img src="{{ asset('assets/frontend/images/resource/author-5.jpg') }}" alt="" />
                                    </div>
                                    <div class="quote-icon">
                                        <span class="icon flaticon-quote-1"></span>
                                    </div>
                                </div>
                                <h3>Piyush Miranda</h3>
                                <div class="location">California</div>
                                <div class="text">Expound the actual teachings of the greatexplorer of the truth, the
                                    master builder of human happiness one rejects, dislikes, or avoids pleasure.</div>
                            </div>
                        </div>

                        <!--Testimonial Block-->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="image-outer">
                                    <div class="image">
                                        <img src="{{ asset('assets/frontend/images/resource/author-6.jpg') }}" alt="" />
                                    </div>
                                    <div class="quote-icon">
                                        <span class="icon flaticon-quote-1"></span>
                                    </div>
                                </div>
                                <h3>Shame Amos</h3>
                                <div class="location">Los Angeles</div>
                                <div class="text">Expound the actual teachings of the greatexplorer of the truth, the
                                    master builder of human happiness one rejects, dislikes, or avoids pleasure.</div>
                            </div>
                        </div>

                        <!--Testimonial Block-->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="image-outer">
                                    <div class="image">
                                        <img src="{{ asset('assets/frontend/images/resource/author-4.jpg') }}" alt="" />
                                    </div>
                                    <div class="quote-icon">
                                        <span class="icon flaticon-quote-1"></span>
                                    </div>
                                </div>
                                <h3>Kenozoik Elson</h3>
                                <div class="location">Newyork</div>
                                <div class="text">Expound the actual teachings of the greatexplorer of the truth, the
                                    master builder of human happiness one rejects, dislikes, or avoids pleasure.</div>
                            </div>
                        </div>

                        <!--Testimonial Block-->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="image-outer">
                                    <div class="image">
                                        <img src="{{ asset('assets/frontend/images/resource/author-5.jpg') }}" alt="" />
                                    </div>
                                    <div class="quote-icon">
                                        <span class="icon flaticon-quote-1"></span>
                                    </div>
                                </div>
                                <h3>Piyush Miranda</h3>
                                <div class="location">California</div>
                                <div class="text">Expound the actual teachings of the greatexplorer of the truth, the
                                    master builder of human happiness one rejects, dislikes, or avoids pleasure.</div>
                            </div>
                        </div>

                        <!--Testimonial Block-->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="image-outer">
                                    <div class="image">
                                        <img src="{{ asset('assets/frontend/images/resource/author-6.jpg') }}" alt="" />
                                    </div>
                                    <div class="quote-icon">
                                        <span class="icon flaticon-quote-1"></span>
                                    </div>
                                </div>
                                <h3>Shame Amos</h3>
                                <div class="location">Los Angeles</div>
                                <div class="text">Expound the actual teachings of the greatexplorer of the truth, the
                                    master builder of human happiness one rejects, dislikes, or avoids pleasure.</div>
                            </div>
                        </div>

                        <!--Testimonial Block-->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="image-outer">
                                    <div class="image">
                                        <img src="{{ asset('assets/frontend/images/resource/author-4.jpg') }}" alt="" />
                                    </div>
                                    <div class="quote-icon">
                                        <span class="icon flaticon-quote-1"></span>
                                    </div>
                                </div>
                                <h3>Kenozoik Elson</h3>
                                <div class="location">Newyork</div>
                                <div class="text">Expound the actual teachings of the greatexplorer of the truth, the
                                    master builder of human happiness one rejects, dislikes, or avoids pleasure.</div>
                            </div>
                        </div>

                        <!--Testimonial Block-->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="image-outer">
                                    <div class="image">
                                        <img src="{{ asset('assets/frontend/images/resource/author-5.jpg') }}" alt="" />
                                    </div>
                                    <div class="quote-icon">
                                        <span class="icon flaticon-quote-1"></span>
                                    </div>
                                </div>
                                <h3>Piyush Miranda</h3>
                                <div class="location">California</div>
                                <div class="text">Expound the actual teachings of the greatexplorer of the truth, the
                                    master builder of human happiness one rejects, dislikes, or avoids pleasure.</div>
                            </div>
                        </div>

                        <!--Testimonial Block-->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="image-outer">
                                    <div class="image">
                                        <img src="{{ asset('assets/frontend/images/resource/author-6.jpg') }}" alt="" />
                                    </div>
                                    <div class="quote-icon">
                                        <span class="icon flaticon-quote-1"></span>
                                    </div>
                                </div>
                                <h3>Shame Amos</h3>
                                <div class="location">Los Angeles</div>
                                <div class="text">Expound the actual teachings of the greatexplorer of the truth, the
                                    master builder of human happiness one rejects, dislikes, or avoids pleasure.</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!--End Feedback Section-->

        <!--Map Section-->
        <section class="map-section">
            <!--Map Outer-->
            <div class="map-outer">
                <div class="google-map" id="contact-google-map" data-map-lat="44.231172" data-map-lng="-76.485954"
                    data-icon-path="images/icons/map-marker.png" data-map-title="Alabama, USA" data-map-zoom="12"
                    data-markers='{
                	"marker-1": [42.231172, -84.485954, "<h4>Branch Office</h4><p>4/99 Alabama, USA</p>"],
                    "marker-2": [44.231172, -76.485954, "<h4>Branch Office</h4><p>4/99 Alabama, USA</p>"],
                    "marker-3": [40.880550, -78.393705, "<h4>Branch Office</h4><p>4/99 Pennsylvania, USA</p>"]
                }'>

                </div>
            </div>
        </section>
        <!--End Map Section-->

        <!--Estimate Section-->
        <section class="estimate-section">
            <div class="auto-container">
                <!--Sec Title-->
                <div class="sec-title centered">
                    <h2>Online <span class="theme_color">Estimation</span></h2>
                </div>
                <div class="row clearfix">

                    <!--Form Column-->
                    <div class="form-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">

                            <!--Estimate Form-->
                            <div class="estimate-form">

                                <form method="post" action="contact-form">
                                    <div class="row clearfix">
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <input type="text" name="name" value="" placeholder="Name"
                                                required>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <input type="email" name="email" value="" placeholder="Email"
                                                required>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <input type="text" name="phone" value="" placeholder="Phone"
                                                required>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <select class="custom-select-box">
                                                <option>Choose Your Style</option>
                                                <option>Style One</option>
                                                <option>Style Two</option>
                                                <option>Style Three</option>
                                                <option>Style Four</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <button type="submit" class="theme-btn btn-style-two"><span
                                                    class="arrow flaticon-right-arrow-4"></span>Get Estimation</button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>

                    <!--Info Column-->
                    <div class="info-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="row clearfix">

                                <!--Column-->
                                <div class="column col-lg-6 col-md-6 col-sm-12">

                                    <!--Info Block-->
                                    <div class="info-block">
                                        <div class="inner-box">
                                            <div class="icon-box">
                                                <span class="icon flaticon-place"></span>
                                            </div>
                                            <h3>Visit Our Place</h3>
                                            <ul>
                                                <li>75014 Paris, France <br> 48 Boulevard Jourdan Candiate. </li>
                                            </ul>
                                            <a href="appointment.html" class="find-map"><span
                                                    class="arrow flaticon-right-arrow-4"></span> Find Us On Map</a>
                                        </div>
                                    </div>

                                </div>

                                <!--Column-->
                                <div class="column col-lg-6 col-md-6 col-sm-12">

                                    <!--Info Block-->
                                    <div class="info-block padd-left">
                                        <div class="inner-box">
                                            <div class="icon-box">
                                                <span class="icon flaticon-mail"></span>
                                            </div>
                                            <h3>Phone & Mail</h3>
                                            <ul>
                                                <li>+0 789.0123.456 </li>
                                                <li>supportyou@example.com</li>
                                            </ul>
                                            <a href="appointment.html" class="find-map"><span
                                                    class="arrow flaticon-right-arrow-4"></span> Make Appointment</a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--End Estimate Section-->

@endsection
