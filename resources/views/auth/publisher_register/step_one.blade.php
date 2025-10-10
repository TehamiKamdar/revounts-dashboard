@extends("auth.publisher_register.base")

@section("step_form_content")
    <div class="card">
        <div class="card-body ">
            <div class="edit-profile__body">
                <form id="stepOne" class="stepOne" action="javascript:void(0)">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name" class="form-label">First name<span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        placeholder="First Name" value="{{ $stepOne['first_name'] ?? null }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name" class="form-label">Last name<span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                        placeholder="Last Name" value="{{ $stepOne['last_name'] ?? null }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="user_name" class="form-label">Username<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Username"
                                value="{{ $stepOne['user_name'] ?? null }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email Address<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="username@email.com" value="{{ $stepOne['email'] ?? null }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
                        <div class="input-group password-field">
                            <input id="password" class="form-control" type="password" name="password" required
                                autocomplete="current-password" value="{{ $stepOne['password'] ?? null }}">
                            <button type="button" class="password-toggle" id="togglePassword1">
                                <i class="ri-eye-close-line"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Confirm Password<span
                                class="text-danger">*</span></label>
                        <div class="input-group password-field">
                            <input id="password_confirmation" class="form-control" type="password"
                                name="password_confirmation" required autocomplete="current-password_confirmation"
                                value="{{ $stepOne['password_confirmation'] ?? null }}">
                            <button type="button" class="password-toggle" id="togglePassword2">
                                <i class="ri-eye-close-line"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="checkbox-container">
                            <input type="checkbox" class="checkbox" id="agree" name="agree" value="1" {{ isset($stepOne['agree']) && $stepOne['agree'] ? "checked" : null }} />
                            <label for="agree">I Agree with the
                                <a href="https://www.linkscircle.com/terms">Terms and Conditions</a>.</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="terms" name="terms" hidden
                            value="{{ $stepOne['terms'] ?? null }}" />
                    </div>

                    <div class="button-group d-flex pt-20 mb-20 justify-content-md-end justify-content-center">
                        <button type="submit" class="btn-login">Save &amp; Next <i
                                class="ri-arrow-right-line ml-10"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- ends: card -->

    <style>
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
        }

        .checkbox-container {
            display: flex;
            align-items: flex-start;
            margin-top: 10px;
        }

        .checkbox-container input {
            margin-top: 5px;
            margin-right: 10px;
            accent-color: var(--primary-color);
        }

        .checkbox-container label {
            line-height: 1.5;
            color: var(--dark-color);
        }

        .checkbox-container a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }

        .checkbox-container a:hover {
            text-decoration: underline;
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

        .text-danger {
            color: #dc3545;
        }

        .ml-10 {
            margin-left: 10px;
        }
    </style>

    <script>
        // Password toggle functionality
        document.getElementById('togglePassword1').addEventListener('click', function () {
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

        document.getElementById('togglePassword2').addEventListener('click', function () {
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
