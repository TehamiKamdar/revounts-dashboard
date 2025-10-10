@extends('layouts.panel_guest')

@push('scripts')
    <script>
        // Password toggle functionality
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('ri-eye-line');
                icon.classList.add('ri-eye-off-line');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('ri-eye-off-line');
                icon.classList.add('ri-eye-line');
            }
        });

        // Form validation
        $(document).ready(function () {
            $("#loginForm").validate({
                rules: {
                    "email": {
                        required: true,
                    },
                    "password": {
                        required: true,
                    }
                },
                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error');
                },
                unhighlight: function (element) { // un-hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass('has-error');
                },
                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-modal-group'));
                }
            });
        });
    </script>
@endpush

@section('content')
    @include('partial.admin.alert')
    <div class="page-header animate-in">
        <h1>{{ ucfirst($type) }} Login</h1>
        <p>Sign in to your account to continue</p>
    </div>

    <div class="login-form">
        <form id="loginForm" class="animate-in" method="POST" action="{{ route('login', ['type' => $type]) }}">
            @csrf
            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <div class="input-group">
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control"
                        placeholder="Enter your email" required>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input id="password" class="form-control" type="password" name="password"
                        autocomplete="current-password" placeholder="Please Enter Password">
                    <button type="button" class="password-toggle" id="togglePassword">
                        <i class="ri-eye-line"></i>
                    </button>
                </div>
            </div>

            <div class="form-options">
                <div class="remember-me">
                    <input class="checkbox" type="checkbox" id="remember" name="remember" value="1">
                    <label for="remember">Remember me</label>
                </div>
                <a href="{{ route('password.request') }}" class="forgot-password">Forgot Password?</a>
            </div>

            <button type="submit" class="btn-login">Sign In</button>
        </form>

        <div class="register-link animate-in">
            <p>Don't have an account?</p>
            <a href="{{ route('register', ['type' => $type]) }}" class="btn-register">Create {{ ucfirst($type) }} Account</a>
        </div>
    </div>
    {{-- <div class="logo-div text-center">
        <a href="https://www.linkscircle.com/">
            <img src="{{ \App\Helper\Static\Methods::staticAsset('img/logo.png') }}" alt="LinksCircle Affiliate Network"
                width="200px" class="img-fluid">
        </a>
    </div> --}}
    {{-- <div class="btn-group atbd-button-group btn-group-normal nav mb-20">
        <a class="btn btn-sm btn-outline-light nav-link @if ($type == $advertiser) active text-white @endif"
            href="{{ route(" login", ["type"=> $advertiser]) }}">Advertiser</a>
        <a class="btn btn-sm btn-outline-light nav-link @if ($type == $publisher) active text-white @endif" href="{{ route("
            login", ["type"=> $publisher]) }}">Publisher</a>
    </div> --}}

    {{-- <form id="login-form" action="{{ route('login', ['type' => $type]) }}" class="form-section">
        @csrf
        <h2 class="form-title">Login to Your Account</h2>

        <div class="form-group">
            <label for="email">{{ __('Email Address') }}*</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Enter your email" required>
        </div>

        <div class="form-group" style="position: relative;">
            <label for="password">Password*</label>
            <input id="password" class="form-control" type="password" name="password" autocomplete="current-password"
                placeholder="Please Enter Password">

            <!-- Eye icon -->
            <i id="password-icon" class="ri-eye-close-line" onclick="showPassword('password')"
                style="position: absolute; right: 10px; top: 38px; cursor: pointer;"></i>
        </div>

        <div class="checkbox-theme-default custom-checkbox ">
            <input class="checkbox" type="checkbox" id="remember" name="remember" value="1">
            <label for="remember">
                <span class="checkbox-text">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="login-links">
            <a href="{{ route('password.request') }}">Forgot Password?</a>
        </div>

        <div class="form-buttons">
            <button type="submit" class="btn btn-primary">Log In</button>
        </div>

        <div class="login-links">
            <span>Don't have an account? <a href="{{route('register', [" type"=> $type])}}">Sign up</a></span>
        </div>
    </form> --}}
@endsection