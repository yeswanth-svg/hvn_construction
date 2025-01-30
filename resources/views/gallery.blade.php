@extends('layouts.app')
@section('title', 'Realestate')

@section('content')

<div class="hero page-inner overlay" style="background-image: url('{{asset("property/images/hero_bg_3.jpg")}}')">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-9 text-center mt-5">
        <h1 class="heading" data-aos="fade-up">Gallery</h1>

        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
          <ol class="breadcrumb text-center justify-content-center">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active text-white-50" aria-current="page">
              About
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-12 mb-4">
        <h2 class="text-center">Gallery</h2>
      </div>
      <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
        <div class="gallery-item">
          <img src="{{asset("property/images/img_1.jpg")}}" class="img-fluid rounded" alt="Gallery Image 1" />
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
        <div class="gallery-item">
          <img src="{{asset("property/images/img_2.jpg")}}" class="img-fluid rounded" alt="Gallery Image 2" />
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
        <div class="gallery-item">
          <img src="{{asset("property/images/img_3.jpg")}}" class="img-fluid rounded" alt="Gallery Image 3" />
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
        <div class="gallery-item">
          <img src="{{asset("property/images/img_4.jpg")}}" class="img-fluid rounded" alt="Gallery Image 4" />
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="500">
        <div class="gallery-item">
          <img src="{{asset("property/images/img_5.jpg")}}" class="img-fluid rounded" alt="Gallery Image 5" />
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="600">
        <div class="gallery-item">
          <img src="{{asset("property/images/img_6.jpg")}}" class="img-fluid rounded" alt="Gallery Image 6" />
        </div>
      </div>
    </div>
  </div>
</div>

@endsection