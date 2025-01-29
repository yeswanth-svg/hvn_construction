@extends('layouts.app')
@section('title', 'Realestate')

@section('content')

<style>
    section {
        padding: 40px 0;
    }

    .single-property {
        margin-top: 30px;
    }

    .single-property .description-section .desc-box {
        box-shadow: 3.346px 3.716px 22.5px rgba(0, 0, 0, 0.07);
    }

    .single-property .description-section .menu-top {
        background-color: #fff;
        border-bottom: 1px solid #d2d2d2;
        padding: 15px 0;
    }

    li {
        display: inline-block;
        font-size: 14px;
    }

    a {
        cursor: pointer;
    }

    a {
        transition: 0.5s ease;
        text-decoration: none;
    }

    .single-property .description-section .menu-top li a {
        padding: 15px 20px;
        text-transform: uppercase;
        font-weight: 600;
        color: #1c2d3a;
    }

    .single-property .description-section .menu-top.sticky {
        position: fixed;
        z-index: 2;
        top: 0;
        left: 0;
        width: 100%;
        box-shadow: 1px 3px 20px 0 rgba(0, 0, 0, 0.1);
        margin-top: 0;
        padding: 16px 0;
        animation: smoothScroll 1s forwards;
    }

    .single-property .description-section .menu-top {
        background-color: #fff;
        border-bottom: 1px solid #d2d2d2;
        padding: 15px 0;
    }

    .single-property .description-section .menu-top li.active a {
        color: green !important;
        border-bottom: 2px solid green !important;
        transition: 0.5s;
    }

    .title-svg {
        fill: var(--theme-default);
        stroke: var(--theme-default);
        height: 85px;
        width: 85px;
        margin-bottom: -85px;
    }
</style>

<div class="hero">
    <div class="hero-slide">
        <div class="img overlay" style="background-image: url('{{asset('property/images/hero_bg_3.jpg')}}')"></div>
        <div class="img overlay" style="background-image: url('{{asset('property/images/hero_bg_2.jpg')}}')"></div>
        <div class="img overlay" style="background-image: url('{{asset('property/images/hero_bg_1.jpg')}}')"></div>
    </div>

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center">
                <h1 class="heading" data-aos="fade-up">
                    Easiest way to find your dream home
                </h1>
                <form action="#" class="narrow-w form-search d-flex align-items-stretch mb-3" data-aos="fade-up"
                    data-aos-delay="200">
                    <input type="text" class="form-control px-4" placeholder="Your ZIP code or City. e.g. New York" />
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
    </div>
</div>


<section class="single-property" style="margin-top: 30px; padding-top: 10px">
    <div class="col-lg-12 col-xl-12">
        <div class="description-section">
            <div class="description-details">
                <div class="desc-box" id="onlineplotavaiability">
                    <div class="menu-top">
                        <div class="container" style="width: 100%; max-width: 100%">
                            <ul class="nav" style="justify-content: center">
                                <li class="active">
                                    <a class="" href="#onlineplotavaiability">Online Plot Availability</a>
                                </li>
                                <li><a class="" href="#projectinfo">Project Info</a></li>
                                <li>
                                    <a class="" href="#paymentoption">Payment Option</a>
                                </li>
                                <li><a class="" href="#amenities">Amenities</a></li>
                                <li>
                                    <a class="" href="#projectdevelopment">Project Development</a>
                                </li>
                                <li>
                                    <a class="" href="#locationhighlights">Location Highlights</a>
                                </li>
                                <li>
                                    <a class="" href="#downloadbrochure">Download Project Layout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <!-- online plot availability-->
                <div id="onlineplotavaiability" data-aos="fade-up">
                    <img src="{{ asset('property/images/hero_bg_1.jpg') }}" alt="Hero Background"
                        style="width: 100%; height: auto; min-height: 300px; margin-top: 20px; border: 2px solid black;">
                </div>
                <!-- Project info -->
                <section id="projectinfo" style="padding: 32px; text-align: center" data-aos="fade-up">
                    <div class="container">
                        <div class="title-2 m-4">
                            <h2>SATHYAM GARDENS</h2>
                            <p class="font-roboto">SALUR -PARVATHIPURAM</p>
                        </div>
                    </div>
                </section>

                <!-- Payment options -->
                <section class="pricing-section slick-between slick-shadow" id="paymentoption" style="padding: 32px">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <div class="title-2 mb-5">
                                    <h2 class="font-roboto">Payment Options</h2>
                                    <svg class="title-svg">
                                        <use xlink:href="/assets/svg/icons.svg#title-line"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- First Pricing Box -->
                            <div class="col-sm-6">
                                <div class="m-2 bg-brandcolor-light">
                                    <div class="pricing-box">
                                        <div class="pricing-details">
                                            <h3 class="text-truncate">Residential</h3>
                                        </div>
                                        <ul>
                                            <li>A - 100% Spot Payment</li>
                                        </ul>
                                        <div class="price">
                                            <h4 style="color: rgb(210, 158, 42)">Rs. 15,299</h4>
                                            <span class="light-text">Per Square Yard</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Second Pricing Box -->
                            <div class="col-sm-6">
                                <div class="m-2 bg-brandcolor-light">
                                    <div class="pricing-box">
                                        <div class="pricing-details">
                                            <h3 class="text-truncate">Residential</h3>
                                        </div>
                                        <ul>
                                            <li>
                                                3 Months Option - 25% within a week & Balance 75% on or
                                                before 3 months
                                            </li>
                                        </ul>
                                        <div class="price">
                                            <h4 style="color: rgb(210, 158, 42)">Rs. 15,999</h4>
                                            <span class="light-text">Per Square Yard</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Amenities -->
                <section class="pricing-section slick-between slick-shadow" id="amenities" style="padding: 32px">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <div class="title-2 mb-5">
                                    <h2 class="font-roboto">Amenities</h2>
                                    <svg class="title-svg">
                                        <use xlink:href="/assets/svg/icons.svg#title-line"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3 mb-2">
                                <div class="m-2">
                                    <div class="pricing-box1 bg-light text-center p-3">
                                        <img src="{{asset('amenities/24 x7 Security.png')}}" height="45px"
                                            alt="24x7 Security" />
                                        <div class="pricing-details mt-2">24x7 Security</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3 mb-2">
                                <div class="m-2">
                                    <div class="pricing-box1 bg-light text-center p-3">
                                        <img src="{{asset('amenities/Designer Street Lighting.png')}}" height="45px"
                                            alt="Designer Street Lighting" />
                                        <div class="pricing-details mt-2">
                                            Designer Street Lighting
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3 mb-2">
                                <div class="m-2">
                                    <div class="pricing-box1 bg-light text-center p-3">
                                        <img src="{{asset('amenities/Exclusive Guarded Community.png')}}" height="45px"
                                            alt="Exclusive Guarded Community" />
                                        <div class="pricing-details mt-2">
                                            Exclusive Guarded Community
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3 mb-2">
                                <div class="m-2">
                                    <div class="pricing-box1 bg-light text-center p-3">
                                        <img src="{{asset('amenities/Parks& Gardens Open Spaces.png')}}" height="45px"
                                            alt="Parks & Gardens Open Spaces" />
                                        <div class="pricing-details mt-2">
                                            Parks & Gardens Open Spaces
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3 mb-2">
                                <div class="m-2">
                                    <div class="pricing-box1 bg-light text-center p-3">
                                        <img src="{{asset('amenities/Rain Water Harvesting.png')}}" height="45px"
                                            alt="Rain Water Harvesting" />
                                        <div class="pricing-details mt-2">Rain Water Harvesting</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3 mb-2">
                                <div class="m-2">
                                    <div class="pricing-box1 bg-light text-center p-3">
                                        <img src="{{asset('amenities/Underground Drainage System.png')}}" height="45px"
                                            alt="Underground Drainage System" />
                                        <div class="pricing-details mt-2">
                                            Underground Drainage System
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3 mb-2">
                                <div class="m-2">
                                    <div class="pricing-box1 bg-light text-center p-3">
                                        <img src="{{asset('amenities/Underground Water Supply.png')}}" height="45px"
                                            alt="Underground Water Supply" />
                                        <div class="pricing-details mt-2">
                                            Underground Water Supply
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3 mb-2">
                                <div class="m-2">
                                    <div class="pricing-box1 bg-light text-center p-3">
                                        <img src="{{asset('amenities/Wide Spacious Black Top Roads.png')}}"
                                            height="45px" alt="Wide Spacious Black Top Roads" />
                                        <div class="pricing-details mt-2">
                                            Wide Spacious Black Top Roads
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- Project Development -->
                <section class="about-main ratio_36 bg-brandcolor-light" id="projectdevelopment" style="padding: 32px">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <div class="title-2 mb-5">
                                    <h2 class="font-roboto">Project Development</h2>
                                    <svg class="title-svg">
                                        <use xlink:href="/assets/svg/icons.svg#title-line"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio-section zoom-gallery-multiple gy-md-4 gy-3 ratio_square row">
                            <div class="slick-slider blog-1">
                                <div class="slick-list">
                                    <div class="slick-track">
                                        <!-- Image Item 1 -->
                                        <div class="slick-slide">
                                            <div class="grid-item col-sm-6 col-lg-3">
                                                <div class="grid-box">
                                                    <div class="overlay">
                                                        <div class="portfolio-image">
                                                            <a class="bg-size" style="
                                background-image: url('/assets/img/3_133572928263527505.jpeg');
                              "></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Image Item 2 -->
                                        <div class="slick-slide">
                                            <div class="grid-item col-sm-6 col-lg-3">
                                                <div class="grid-box">
                                                    <div class="overlay">
                                                        <div class="portfolio-image">
                                                            <a class="bg-size" style="
                                background-image: url('/assets/img/2_133572928263931814.jpeg');
                              "></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Image Item 3 -->
                                        <div class="slick-slide">
                                            <div class="grid-item col-sm-6 col-lg-3">
                                                <div class="grid-box">
                                                    <div class="overlay">
                                                        <div class="portfolio-image">
                                                            <a class="bg-size" style="
                                background-image: url('/assets/img/1_133572928263972948.jpeg');
                              "></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Location Highlights -->
                <section class="about-main ratio_36 bg-brandcolor-light" id="locationhighlights" style="padding: 32px">
                    <div class="container">
                        <div class="title-2 mb-5">
                            <h2 class="font-roboto" style="color: rgb(210, 158, 42)">
                                Location Highlights
                            </h2>
                            <svg class="title-svg">
                                <use xlink:href="/assets/svg/icons.svg#title-line"></use>
                            </svg>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="user-about">
                                    <div class="row">
                                        <div class="d-flex col">
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="about-content">
                                                    <!-- Project Location Highlights -->
                                                    <div class="mb-3">
                                                        <h4 class="primarycolor-text">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="green" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <path
                                                                    d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z">
                                                                </path>
                                                                <circle cx="12" cy="10" r="3"></circle>
                                                            </svg>
                                                            Project Location Highlights
                                                        </h4>
                                                        <ul class="font-roboto"
                                                            style="margin-left: 24px; font-size: 16px">
                                                            <li>
                                                                Near to Green Field International Airport and
                                                                Aviation Hub.
                                                            </li>
                                                            <li>
                                                                Equidistant to the three districts of Vizag,
                                                                Vijayanagaram, and Srikakulam.
                                                            </li>
                                                            <li>
                                                                Very close to NH-16 (Chennai to Kolkata) ensuring
                                                                excellent connectivity.
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <!-- Strategic Infrastructure -->
                                                    <div class="mb-3">
                                                        <h4 class="primarycolor-text">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="green" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <line x1="4" y1="21" x2="4" y2="14"></line>
                                                                <line x1="4" y1="10" x2="4" y2="3"></line>
                                                                <line x1="12" y1="21" x2="12" y2="12"></line>
                                                                <line x1="12" y1="8" x2="12" y2="3"></line>
                                                                <line x1="20" y1="21" x2="20" y2="16"></line>
                                                                <line x1="20" y1="12" x2="20" y2="3"></line>
                                                            </svg>
                                                            Strategic Infrastructure
                                                        </h4>
                                                        <ul class="font-roboto"
                                                            style="margin-left: 24px; font-size: 16px">
                                                            <li>
                                                                Close to the Madhurawada IT Corridor enhancing
                                                                access to technological and business hubs.
                                                            </li>
                                                            <li>
                                                                Near the Pydibhimavaram Industrial Corridor
                                                                providing strategic advantages for businesses.
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <!-- Global Attractions -->
                                                    <div class="mb-3">
                                                        <h4 class="primarycolor-text">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="green" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <circle cx="12" cy="12" r="10"></circle>
                                                            </svg>
                                                            Global Attractions
                                                        </h4>
                                                        <ul class="font-roboto"
                                                            style="margin-left: 24px; font-size: 16px">
                                                            <li>
                                                                Near the prestigious coastal corridor tourism hub
                                                                and SEZs making it an attractive destination.
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Image Section -->
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="portfolio-section zoom-gallery-multiple gy-md-4 gy-3 ratio_square row"
                                                    style="justify-content: center; align-items: flex-start">
                                                    <div class="grid-item col-sm-6 col-lg-4">
                                                        <a>
                                                            <img src="/assets/img/proposed_133572918151671037.jpg"
                                                                style="width: 220px; height: 300px" />
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="downloadbrochure"></section>
                <section></section>
                <!-- Downloadbrochure section -->
                <section style="display: flex; justify-content: center">
                    <div class="home-search-6 m-5">
                        <button type="button" class="btn btn-secondary" style="width: 100%">
                            Download Project Layout
                        </button>
                        <div class="vertical-search">
                            <div></div>
                        </div>
                    </div>
                </section>




            </div>
        </div>
    </div>
</section>



<div class="section sec-testimonials">
    <div class="container">
        <div class="row mb-5 align-items-center">
            <div class="col-md-6">
                <h2 class="font-weight-bold heading text-primary mb-4 mb-md-0">
                    Customer Says
                </h2>
            </div>
            <div class="col-md-6 text-md-end">
                <div id="testimonial-nav">
                    <span class="prev" data-controls="prev">Prev</span>

                    <span class="next" data-controls="next">Next</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4"></div>
        </div>
        <div class="testimonial-slider-wrap">
            <div class="testimonial-slider">
                <div class="item">
                    <div class="testimonial">
                        <img src="{{asset("property/images/person_1-min.jpg")}}" alt="Image"
                            class="img-fluid rounded-circle w-25 mb-4" />
                        <div class="rate">
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                        </div>
                        <h3 class="h5 text-primary mb-4">James Smith</h3>
                        <blockquote>
                            <p>
                                &ldquo;Far far away, behind the word mountains, far from the
                                countries Vokalia and Consonantia, there live the blind
                                texts. Separated they live in Bookmarksgrove right at the
                                coast of the Semantics, a large language ocean.&rdquo;
                            </p>
                        </blockquote>
                        <p class="text-black-50">Designer, Co-founder</p>
                    </div>
                </div>

                <div class="item">
                    <div class="testimonial">
                        <img src="{{asset("property/images/person_2-min.jpg")}}" alt="Image"
                            class="img-fluid rounded-circle w-25 mb-4" />
                        <div class="rate">
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                        </div>
                        <h3 class="h5 text-primary mb-4">Mike Houston</h3>
                        <blockquote>
                            <p>
                                &ldquo;Far far away, behind the word mountains, far from the
                                countries Vokalia and Consonantia, there live the blind
                                texts. Separated they live in Bookmarksgrove right at the
                                coast of the Semantics, a large language ocean.&rdquo;
                            </p>
                        </blockquote>
                        <p class="text-black-50">Designer, Co-founder</p>
                    </div>
                </div>

                <div class="item">
                    <div class="testimonial">
                        <img src="{{asset("property/images/person_3-min.jpg")}}" alt="Image"
                            class="img-fluid rounded-circle w-25 mb-4" />
                        <div class="rate">
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                        </div>
                        <h3 class="h5 text-primary mb-4">Cameron Webster</h3>
                        <blockquote>
                            <p>
                                &ldquo;Far far away, behind the word mountains, far from the
                                countries Vokalia and Consonantia, there live the blind
                                texts. Separated they live in Bookmarksgrove right at the
                                coast of the Semantics, a large language ocean.&rdquo;
                            </p>
                        </blockquote>
                        <p class="text-black-50">Designer, Co-founder</p>
                    </div>
                </div>

                <div class="item">
                    <div class="testimonial">
                        <img src="{{asset("property/images/person_4-min.jpg")}}" alt="Image"
                            class="img-fluid rounded-circle w-25 mb-4" />
                        <div class="rate">
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                        </div>
                        <h3 class="h5 text-primary mb-4">Dave Smith</h3>
                        <blockquote>
                            <p>
                                &ldquo;Far far away, behind the word mountains, far from the
                                countries Vokalia and Consonantia, there live the blind
                                texts. Separated they live in Bookmarksgrove right at the
                                coast of the Semantics, a large language ocean.&rdquo;
                            </p>
                        </blockquote>
                        <p class="text-black-50">Designer, Co-founder</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section section-4 bg-light">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-5">
                <h2 class="font-weight-bold heading text-primary mb-4">
                    Let's find home that's perfect for you
                </h2>
                <p class="text-black-50">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam
                    enim pariatur similique debitis vel nisi qui reprehenderit.
                </p>
            </div>
        </div>
        <div class="row justify-content-between mb-5">
            <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2">
                <div class="img-about dots">
                    <img src="{{asset("property/images/hero_bg_3.jpg")}}" alt="Image" class="img-fluid" />
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex feature-h">
                    <span class="wrap-icon me-3">
                        <span class="icon-home2"></span>
                    </span>
                    <div class="feature-text">
                        <h3 class="heading">2M Properties</h3>
                        <p class="text-black-50">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Nostrum iste.
                        </p>
                    </div>
                </div>

                <div class="d-flex feature-h">
                    <span class="wrap-icon me-3">
                        <span class="icon-person"></span>
                    </span>
                    <div class="feature-text">
                        <h3 class="heading">Top Rated Agents</h3>
                        <p class="text-black-50">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Nostrum iste.
                        </p>
                    </div>
                </div>

                <div class="d-flex feature-h">
                    <span class="wrap-icon me-3">
                        <span class="icon-security"></span>
                    </span>
                    <div class="feature-text">
                        <h3 class="heading">Legit Properties</h3>
                        <p class="text-black-50">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Nostrum iste.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row section-counter mt-5">
            <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div class="counter-wrap mb-5 mb-lg-0">
                    <span class="number"><span class="countup text-primary">3298</span></span>
                    <span class="caption text-black-50"># of Buy Properties</span>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                <div class="counter-wrap mb-5 mb-lg-0">
                    <span class="number"><span class="countup text-primary">2181</span></span>
                    <span class="caption text-black-50"># of Sell Properties</span>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                <div class="counter-wrap mb-5 mb-lg-0">
                    <span class="number"><span class="countup text-primary">9316</span></span>
                    <span class="caption text-black-50"># of All Properties</span>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                <div class="counter-wrap mb-5 mb-lg-0">
                    <span class="number"><span class="countup text-primary">7191</span></span>
                    <span class="caption text-black-50"># of Agents</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="section">
    <div class="row justify-content-center footer-cta" data-aos="fade-up">
        <div class="col-lg-7 mx-auto text-center">
            <h2 class="mb-4">Be a part of our growing real state agents</h2>
            <p>
                <a href="#" target="_blank" class="btn btn-primary text-white py-3 px-4">Apply for Real Estate agent</a>
            </p>
        </div>

    </div>

</div> -->

<div class="section section-5 bg-light">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-6 mb-5">
                <h2 class="font-weight-bold heading text-primary mb-4">
                    Our Agents
                </h2>
                <p class="text-black-50">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam
                    enim pariatur similique debitis vel nisi qui reprehenderit totam?
                    Quod maiores.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
                <div class="h-100 person">
                    <img src="{{asset("property/images/person_1-min.jpg")}}" alt="Image" class="img-fluid" />

                    <div class="person-contents">
                        <h2 class="mb-0"><a href="#">James Doe</a></h2>
                        <span class="meta d-block mb-3">Real Estate Agent</span>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Facere officiis inventore cumque tenetur laboriosam, minus
                            culpa doloremque odio, neque molestias?
                        </p>

                        <ul class="social list-unstyled list-inline dark-hover">
                            <li class="list-inline-item">
                                <a href="#"><span class="icon-twitter"></span></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><span class="icon-facebook"></span></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><span class="icon-linkedin"></span></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><span class="icon-instagram"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
                <div class="h-100 person">
                    <img src="{{asset("property/images/person_2-min.jpg")}}" alt="Image" class="img-fluid" />

                    <div class="person-contents">
                        <h2 class="mb-0"><a href="#">Jean Smith</a></h2>
                        <span class="meta d-block mb-3">Real Estate Agent</span>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Facere officiis inventore cumque tenetur laboriosam, minus
                            culpa doloremque odio, neque molestias?
                        </p>

                        <ul class="social list-unstyled list-inline dark-hover">
                            <li class="list-inline-item">
                                <a href="#"><span class="icon-twitter"></span></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><span class="icon-facebook"></span></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><span class="icon-linkedin"></span></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><span class="icon-instagram"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
                <div class="h-100 person">
                    <img src="{{asset("property/images/person_3-min.jpg")}}" alt="Image" class="img-fluid" />

                    <div class="person-contents">
                        <h2 class="mb-0"><a href="#">Alicia Huston</a></h2>
                        <span class="meta d-block mb-3">Real Estate Agent</span>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Facere officiis inventore cumque tenetur laboriosam, minus
                            culpa doloremque odio, neque molestias?
                        </p>

                        <ul class="social list-unstyled list-inline dark-hover">
                            <li class="list-inline-item">
                                <a href="#"><span class="icon-twitter"></span></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><span class="icon-facebook"></span></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><span class="icon-linkedin"></span></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><span class="icon-instagram"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const menuTop = document.querySelector(".menu-top");
        const menuTopOffset = menuTop.offsetTop; // Get the initial position

        window.addEventListener("scroll", function () {
            if (window.scrollY >= menuTopOffset) {
                menuTop.classList.add("sticky");
            } else {
                menuTop.classList.remove("sticky");
            }
        });
    });
</script>

@endsection