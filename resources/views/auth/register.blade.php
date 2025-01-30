@extends('layouts.app')

@section('title', 'Registration')
@section('content')
<div class="hero page-inner overlay" style="background-image: url('{{asset("property/images/hero_bg_1.jpg")}}')">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center mt-5">
                <h1 class="heading" data-aos="fade-up">Registration</h1>

                <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                    <ol class="breadcrumb text-center justify-content-center">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">
                            Registration
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="py-4 d-flex justify-content-center">
    <div class="card shadow-sm p-4 w-50">
        <header class="text-center">
            <h2 class="h4 text-primary">Register</h2>
            <p class="text-muted">Create a new account to access all features.</p>
        </header>

        <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label text-dark fw-bold">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required
                    autofocus autocomplete="name">
                <div class="invalid-feedback">Please enter your name.</div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label text-dark fw-bold">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required
                    autocomplete="username">
                <div class="invalid-feedback">Please enter a valid email.</div>
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label text-dark fw-bold">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number"
                    value="{{ old('phone_number') }}" required autocomplete="username">
                <div class="invalid-feedback">Please enter a valid Phone Number.</div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label text-dark fw-bold">Password</label>
                <input type="password" class="form-control" id="password" name="password" required
                    autocomplete="new-password">
                <div class="invalid-feedback">Please enter a password.</div>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label text-dark fw-bold">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    required autocomplete="new-password">
                <div class="invalid-feedback">Please confirm your password.</div>
            </div>

            <div class="text-center">
                <a href="{{ route('login') }}" class="d-block text-decoration-none text-muted mb-3">Already
                    registered?</a>
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </div>
        </form>
    </div>
</section>


@endsection