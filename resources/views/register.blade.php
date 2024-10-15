@extends('layouts.layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-lighter-lavender text-white text-center">
                    <h3 class="mb-0 heading">Registration Form</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 mb-3 mx-auto">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" class="form-control form-control-lg" required>
                            </div>
                            <div class="form-group col-md-6 mb-3 mx-auto">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control form-control-lg" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 mb-3 mx-auto">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" class="form-control form-control-lg" required>
                            </div>
                            <div class="form-group col-md-6 mb-3 mx-auto">
                                <label for="password_confirmation">Confirm Password:</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg" required>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lighter-lavender btn-lg btn-block">Register</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('login') }}" class="text-muted">Already have an account? Login</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>

    .heading{
        color: #645885;
        font-weight: 700;
        font-size: 24px;
        margin-bottom: 20px;
    }
    /* Lighter lavender for a subtle, cleaner look */
    .bg-lighter-lavender {
        background-color: #d6c6f5; /* Lighter lavender */
        color: white;
    }

    /* Button styling with lighter lavender */
    .btn-lighter-lavender {
        background-color: #d6c6f5; /* Lighter lavender */
        color: black;
        border: none;
        padding: 12px;
        font-size: 18px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    /* Button hover effect */
    .btn-lighter-lavender:hover {
        background-color: #c2b1f0; /* Slightly darker lavender on hover */
        color: white;
    }

    /* Rounded input fields */
    .form-control-lg {
        border-radius: 8px;
        font-size: 16px;
        padding: 10px 15px;
        border: 1px solid #dcdcdc;
        transition: border-color 0.3s ease;
    }

    /* Input hover effect */
    .form-control-lg:focus {
        border-color: #d6c6f5; /* Lavender border on focus */
        box-shadow: 0 0 5px rgba(214, 198, 245, 0.5);
    }

    /* Center-align form inputs and button */
    .form-group {
        text-align: center;
    }

    /* Rounded card and header */
    .card {
        border-radius: 10px;
    }

    .card-header {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    /* Improved font style */
    label {
        font-weight: 500;
        color: #333;
    }

    h3 {
        font-family: 'Arial', sans-serif;
        font-weight: 600;
        letter-spacing: 1px;
    }

    .card-footer a {
        font-size: 14px;
    }

</style>

@endsection
