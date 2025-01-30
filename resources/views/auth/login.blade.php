@extends('layouts.app')
@section('title', 'Login')
@section('content')

<div class="hero page-inner overlay" style="background-image: url('{{asset("property/images/hero_bg_2.jpg")}}')">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center mt-5">
                <h1 class="heading" data-aos="fade-up">Login</h1>

                <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                    <ol class="breadcrumb text-center justify-content-center">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">
                            Login
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<section class="py-4 d-flex justify-content-center">
    <div class="card shadow-sm p-4 w-50">
        <header class="text-center">
            <h2 class="h4 text-primary">Login</h2>
            <p class="text-muted">Access your account to continue.</p>
        </header>

        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label text-dark fw-bold">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required
                    autofocus autocomplete="username">
                <div class="invalid-feedback">Please enter a valid email.</div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label text-dark fw-bold">Password</label>
                <input type="password" class="form-control" id="password" name="password" required
                    autocomplete="current-password">
                <div class="invalid-feedback">Please enter your password.</div>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                <label class="form-check-label text-dark" for="remember_me">Remember me</label>
            </div>

            <div class="text-center">
                <a href="{{ route('password.request') }}" class="d-block text-decoration-none text-muted mb-3">Forgot
                    your password?</a>
                <button type="submit" class="btn btn-primary w-100">Log in</button>
            </div>
        </form>
    </div>
</section>


@endsection