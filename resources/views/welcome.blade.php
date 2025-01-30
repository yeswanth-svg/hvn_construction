@extends('layouts.app')
@section('title', 'Realestate')

@section('content')
<style>
    .portfolio-section {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        /* 3 images per row */
        gap: 20px;
        /* Space between images */
        justify-content: center;
    }

    .grid-item {
        padding: 10px;
    }

    .portfolio-image {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        display: block;
        width: 100%;
        height: 250px;
        /* Adjust height */
        border-radius: 10px;
        /* Small curve on borders */
        border: 2px solid #ddd;
        /* Light border */
        box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
        /* Slight shadow */
        transition: transform 0.3s ease-in-out;
        cursor: pointer;
    }

    .portfolio-image:hover {
        transform: scale(1.05);
        /* Slight zoom on hover */
    }

    .title-svg {
        height: 85px;
        width: 90px;
        margin-bottom: -55px;
    }

    /* Reduce modal width */
    .modal-lg {
        max-width: 80%;
        /* Adjust modal width */
    }

    /* Position the navigation buttons outside the image */
    .custom-nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 50px;
        height: 50px;

        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10;
        transition: background 0.3s ease-in-out;
    }

    /* .custom-nav-btn:hover {
        background: rgba(0, 0, 0, 0.8);
    } */

    /* Adjust left and right button positions */
    .carousel-control-prev {
        left: -60px;
        /* Moves outside modal */
    }

    .carousel-control-next {
        right: -60px;
        /* Moves outside modal */
    }



    /* Add some padding inside modal */
    .modal-body {
        padding: 20px;
    }

    /* Improve image styling */
    .carousel-item img {
        max-height: 500px;
        width: auto;
        margin: auto;
    }
</style>


<div class="hero">
    <div class="hero-slide">
        <div class="img overlay" style="background-image: url('{{asset('property/images/hero_bg_3.jpg')}}')"></div>
        <div class="img overlay" style="background-image: url('{{asset('property/images/hero_bg_2.jpg')}}')"></div>
        <div class="img overlay" style="background-image: url('{{asset('property/images/hero_bg_1.jpg')}}')"></div>
    </div>
    <!-- 
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
    </div> -->
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
                        style="width: 100%; height: 300px; min-height: 300px; margin-top: 20px; border: 2px solid black;">
                </div>
            </div>
</section>


<br>
<!-- Project info -->
<section id="projectinfo"></section>

<section style="padding: 32px; text-align: center" data-aos="fade-up">
    <div class="container">
        <div class="col text-center">
            <div class="title-2 mb-5">
                <h2 class="font-roboto">Project Information</h2>
                <img src="{{ asset('property/images/titlesvg1.png') }}" alt="Title SVG" class="title-svg">
            </div>

        </div>
        <div class="row">
            <div class="title-2 mb-5 text-center d-flex flex-column align-items-center">
                <h2 class="font-roboto">SATHYAM GARDENS</h2>
                <p class="font-roboto">SALUR -PARVATHIPURAM</p>
            </div>
        </div>
</section>


<!-- Payment options -->
<section id="paymentoption"></section>
<!-- <section></section> -->
<section class="pricing-section slick-between slick-shadow" style="padding: 32px">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="title-2 mb-5">
                    <h2 class="font-roboto">Payment Options</h2>
                    <img src="{{ asset('property/images/titlesvg1.png') }}" alt="Title SVG" class="title-svg">
                </div>

            </div>
        </div>

        <div class="row">
            <!-- First Pricing Box -->
            <div class="col-sm-6">
                <div class="m-2 bg-brandcolor-light">
                    <div class="pricing-box">
                        <div class="pricing-details">
                            <h3 style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                Residential </h3>
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
                            <h3 style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                Residential </h3>
                        </div>
                        <ul>
                            <li>
                                3 Months Option - 25% within a week &amp; Balance 75% on or
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
<section id="amenities"></section>
<!-- <section></section> -->
<section class="pricing-section slick-between slick-shadow" id="amenities" style="padding: 32px">
    <div class="container">
        <div class="row">
            <div class="title-2 mb-5 text-center d-flex flex-column align-items-center">
                <h2 class="font-roboto">Amenities</h2>
                <img src="{{ asset('property/images/titlesvg1.png') }}" alt="Title SVG" class="title-svg">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 mb-2">
            <div class="m-2">
                <div class="pricing-box1 bg-light text-center p-3">
                    <img src="{{asset('property/amenities/24 x7 Security.png')}}" height="45px" alt="24x7 Security" />
                    <div class="pricing-details mt-2">24x7 Security</div>
                </div>
            </div>
        </div>

        <div class="col-sm-3 mb-2">
            <div class="m-2">
                <div class="pricing-box1 bg-light text-center p-3">
                    <img src="{{asset('property/amenities/Designer Street Lighting.png')}}" height="45px"
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
                    <img src="{{asset('property/amenities/Exclusive Guarded Community.png')}}" height="45px"
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
                    <img src="{{asset('property/amenities/Parks& Gardens Open Spaces.png')}}" height="45px"
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
                    <img src="{{asset('property/amenities/Rain Water Harvesting.png')}}" height="45px"
                        alt="Rain Water Harvesting" />
                    <div class="pricing-details mt-2">Rain Water Harvesting</div>
                </div>
            </div>
        </div>

        <div class="col-sm-3 mb-2">
            <div class="m-2">
                <div class="pricing-box1 bg-light text-center p-3">
                    <img src="{{asset('property/amenities/Underground Drainage System.png')}}" height="45px"
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
                    <img src="{{asset('property/amenities/Underground Water Supply.png')}}" height="45px"
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
                    <img src="{{asset('property/amenities/Wide Spacious Black Top Roads.png')}}" height="45px"
                        alt="Wide Spacious Black Top Roads" />
                    <div class="pricing-details mt-2">
                        Wide Spacious Black Top Roads
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Project Development -->
<section id="projectdevelopment"></section>
<!-- <section></section> -->
<section class="about-main ratio_36 bg-brandcolor-light" id="projectdevelopment" style="padding: 32px">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="title-2 mb-5">
                    <h2 class="font-roboto">Project Development</h2>
                    <img src="{{ asset('property/images/titlesvg1.png') }}" alt="Title SVG" class="title-svg">
                </div>
            </div>
        </div>

        <div class="row g-3">
            @php
                $images = ['1.jpeg', '2.jpeg', '3.jpeg', '4.jpeg', '5.jpeg', '6.jpeg'];
            @endphp

            @foreach($images as $index => $image)
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="showImage({{ $index }})">
                        <div class="portfolio-image"
                            style="background-image: url('{{ asset("property/projectdevelopment/$image") }}');"></div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered"> <!-- Reduced Width & Centered -->
        <div class="modal-content bg-transparent p-3 rounded-3"> <!-- bg-transparent for no background -->
            <div class="modal-header border-0">
                <!-- Ensure close button has proper visibility -->
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"
                    style="z-index: 1051;"></button>
            </div>
            <div class="modal-body position-relative d-flex justify-content-center align-items-center">
                <!-- Carousel -->
                <div id="imageCarousel" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach($images as $index => $image)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ asset("property/projectdevelopment/$image") }}"
                                    class="img-fluid rounded shadow-lg" alt="Project Image">
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Previous & Next Buttons -->
                <button class="carousel-control-prev custom-nav-btn" type="button" data-bs-target="#imageCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next custom-nav-btn" type="button" data-bs-target="#imageCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </div>
</div>







<!-- Location Highlights -->
<section id="locationhighlights"></section>
<!-- <section></section> -->
<section class="about-main ratio_36 bg-brandcolor-light" id="locationhighlights" style="padding: 32px">
    <div class="container">
        <div class="title-2 mb-5 text-center d-flex flex-column align-items-center">
            <h2 class="font-roboto">Location Highlights</h2>
            <img src="{{ asset('property/images/titlesvg1.png') }}" alt="Title SVG" class="title-svg">
        </div>
    </div>
    <div class="row gy-4 align-items-center">
        <!-- Text Content (Second on Mobile) -->
        <div class="col-lg-6 order-2 order-md-1">
            <div class="about-content">
                <!-- Project Location Highlights -->
                <div class="mb-3">
                    <h4 class="primarycolor-text d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="green"
                            stroke-width="2" class="me-2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        Project Location Highlights
                    </h4>

                    <!-- Styled Bullet Points -->
                    <ul class="font-roboto list-unstyled ps-3 d-grid gap-2" style="font-size: 16px;">
                        <li class="d-flex align-items-start">
                            <span class="me-2 text-success">•</span> Near to Green Field
                            International Airport and Aviation Hub.
                        </li>
                        <li class="d-flex align-items-start">
                            <span class="me-2 text-success">•</span> Equidistant to the three
                            districts of Vizag, Vijayanagaram, and Srikakulam.
                        </li>
                        <li class="d-flex align-items-start">
                            <span class="me-2 text-success">•</span> Very close to NH-16 (Chennai to
                            Kolkata) ensuring excellent connectivity.
                        </li>
                    </ul>
                </div>

                <!-- Strategic Infrastructure -->
                <div class="mb-3">
                    <h4 class="primarycolor-text d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="green"
                            stroke-width="2" class="me-2">
                            <line x1="4" y1="21" x2="4" y2="14"></line>
                            <line x1="4" y1="10" x2="4" y2="3"></line>
                            <line x1="12" y1="21" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12" y2="3"></line>
                            <line x1="20" y1="21" x2="20" y2="16"></line>
                            <line x1="20" y1="12" x2="20" y2="3"></line>
                        </svg>
                        Strategic Infrastructure
                    </h4>

                    <!-- Styled Bullet Points -->
                    <ul class="font-roboto list-unstyled ps-3 d-grid gap-2" style="font-size: 16px;">
                        <li class="d-flex align-items-start">
                            <span class="me-2 text-success">•</span> Close to the Madhurawada IT
                            Corridor enhancing access to technological and business hubs.
                        </li>
                        <li class="d-flex align-items-start">
                            <span class="me-2 text-success">•</span> Near the Pydibhimavaram
                            Industrial Corridor providing strategic advantages for businesses.
                        </li>
                    </ul>
                </div>

                <!-- Global Attractions -->
                <div class="mb-3">
                    <h4 class="primarycolor-text d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="green"
                            stroke-width="2" class="me-2">
                            <circle cx="12" cy="12" r="10"></circle>
                        </svg>
                        Global Attractions
                    </h4>

                    <!-- Styled Bullet Points -->
                    <ul class="font-roboto list-unstyled ps-3 d-grid gap-2" style="font-size: 16px;">
                        <li class="d-flex align-items-start">
                            <span class="me-2 text-success">•</span> Near the prestigious coastal
                            corridor tourism hub and SEZs, making it an attractive destination.
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Image Section (First on Mobile) -->
        <div class="col-lg-6 order-1 order-md-2 text-center">
            <div class="zoom-gallery-multiple">
                <img src="{{ asset('property/images/proposed.jpg') }}" class="img-fluid rounded w-50"
                    alt="Location Image" data-bs-toggle="modal" data-bs-target="#imageModal2">
            </div>
        </div>
    </div> <!-- End Row -->

    <div class="modal fade" id="imageModal2" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-transparent">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center align-items-center">
                    <!-- Added flexbox classes here -->
                    <img src="{{ asset('property/images/proposed.jpg') }}" class="img-fluid" alt="Location Image"
                        style="max-width:30%; height: auto;">
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

<!-- JavaScript to Update Modal Image -->
<!-- JavaScript to Initialize Carousel -->
<script>
    function showImage(index) {
        var imageCarousel = new bootstrap.Carousel(document.getElementById('imageCarousel'));
        imageCarousel.to(index); // Jump to the clicked image
    }
</script>


@endsection