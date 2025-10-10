@extends("auth.advertiser_register.base")

@section("step_form_content")

<div class="row justify-content-center">
    <div class="page-header border-bottom-0 pb-sm-0 px-0">
        <h1 class="">Join as Advertiser</h1>
    </div>
    <div class="col-xl-12 col-lg-12 col-sm-12">
        <div class="card" style="margin-top: 20px;">
            <div class="card-body">
                <div class="edit-profile__body">
                    <form id="stepOne" class="stepOne" action="javascript:void(0)">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name" class="form-label">First name<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your first name" value="{{ $stepOne['first_name'] ?? null }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name" class="form-label">Last name<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your last name" value="{{ $stepOne['last_name'] ?? null }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email Address<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="your@email.com" value="{{ $stepOne['email'] ?? null }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="user_name" class="form-label">Username<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Choose a username" value="{{ $stepOne['user_name'] ?? null }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
                            <div class="input-group password-field">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Create a password" value="{{ $stepOne['password'] ?? null }}">
                                <button type="button" class="password-toggle" id="togglePassword1">
                                    <i class="ri-eye-close-line"></i>
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">Confirm Password<span class="text-danger">*</span></label>
                            <div class="input-group password-field">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Confirm your password" value="{{ $stepOne['password_confirmation'] ?? null }}">
                                <button type="button" class="password-toggle" id="togglePassword2">
                                    <i class="ri-eye-close-line"></i>
                                </button>
                            </div>
                        </div>

                        <div class="button-group d-flex pt-3 justify-content-end flex-wrap">
                            <button type="submit" class="btn-login">
                                Save &amp; Next
                                <i class="ri-arrow-right-line ml-10"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- ends: .card -->

        <div class="social-connector text-center my-4">
            <span class="connector-text">Or</span>
        </div>

        <div class="button-group d-flex align-items-center justify-content-center">
            <p class="auth-redirect">
                Already have an account?
                <a href="{{ route('login', $account) }}" class="auth-link">
                    Sign in
                </a>
            </p>
        </div>
    </div><!-- ends: .col -->
</div>

<style>
    .step-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 0;
    }

    .form-label {
        font-weight: 600;
        margin-bottom: 8px;
        color: var(--dark-color);
        display: block;
    }

    .input-group {
        position: relative;
    }

    .form-control {
        width: 100%;
        padding: 14px 15px;
        border: 2px solid #e9ecef;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: #f9f9fc;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(123, 54, 181, 0.1);
        background: white;
        outline: none;
    }

    .password-field {
        position: relative;
    }

    .password-toggle {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #6c757d;
        cursor: pointer;
        font-size: 1.2rem;
        z-index: 2;
    }

    .btn-login {
        padding: 14px 30px;
        background: var(--primary-color);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-login:hover {
        background: var(--primary-dark-color);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(123, 54, 181, 0.3);
    }

    .social-connector {
        position: relative;
        margin: 30px 0;
    }

    .connector-text {
        background: white;
        padding: 0 15px;
        color: #6c757d;
        font-size: 0.9rem;
        position: relative;
        z-index: 2;
    }

    .social-connector::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background: #e9ecef;
        z-index: 1;
    }

    .auth-redirect {
        color: #6c757d;
        margin: 0;
        font-size: 1rem;
    }

    .auth-link {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
        margin-left: 5px;
        transition: color 0.3s ease;
    }

    .auth-link:hover {
        color: var(--primary-dark-color);
        text-decoration: underline;
    }

    .text-danger {
        color: #dc3545;
    }

    .ml-10 {
        margin-left: 10px;
    }

    .card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .border-color {
        border: 1px solid #e9ecef;
    }

    @media (max-width: 768px) {
        .card {
            margin: 20px 0;
            padding: 20px 15px;
        }

        .btn-login {
            width: 100%;
            justify-content: center;
        }

        .step-title {
            font-size: 1.3rem;
        }
    }
</style>

<script>
    // Password toggle functionality
    document.getElementById('togglePassword1').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const icon = this.querySelector('i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('ri-eye-close-line');
            icon.classList.add('ri-eye-line');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('ri-eye-line');
            icon.classList.add('ri-eye-close-line');
        }
    });

    document.getElementById('togglePassword2').addEventListener('click', function() {
        const passwordInput = document.getElementById('password_confirmation');
        const icon = this.querySelector('i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('ri-eye-close-line');
            icon.classList.add('ri-eye-line');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('ri-eye-line');
            icon.classList.add('ri-eye-close-line');
        }
    });
</script>
@endsection
