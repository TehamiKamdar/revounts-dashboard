@extends("auth.publisher_register.base")

@section("step_form_content")

<div class="card">
    <div class="card-body bg-white radius-xl px-sm-30 pt-sm-25">
        <div class="payment-status__area py-sm-10 py-10 text-center">
            <div class="success-animation">
                <div class="success-icon animate-check">
                    <i class="ri-check-line"></i>
                </div>
            </div>
            <h4 class="success-title">Account Created Successfully!</h4>
            <p class="success-subtitle">Your publisher account has been created</p>
        </div>
    </div>
</div>

<div class="card mt-20">
    <div class="card-body">
        <div class="edit-profile__body">
            <h2 class="step-title">You're Only One Step Away!</h2>
            <p class="success-message">An email has been sent to your inbox, please check and verify to complete your registration.</p>
            <p class="success-message">If you did not receive any email, please check your spam/junk folder or click on the resend button below.</p>

            <div class="button-group d-flex pt-3 justify-content-center flex-wrap">
                <form id="stepFour" action="javascript:void(0)">
                    <button type="submit" class="btn-login">
                        <i class="ri-mail-send-line mr-10"></i>Resend Verification Email
                    </button>
                </form>
            </div>
        </div>
    </div>
</div><!-- ends: .card -->

<style>
    .success-animation {
        margin-bottom: 30px;
    }

    .success-icon {
        width: 80px;
        height: 80px;
        background: var(--success-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        color: white;
        font-size: 2.5rem;
        position: relative;
    }

    .animate-check {
        animation: checkmark 0.5s ease-in-out;
    }

    .animate-check::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        border: 2px solid var(--success-color);
        border-radius: 50%;
        animation: ripple 1s ease-out infinite;
    }

    @keyframes checkmark {
        0% {
            transform: scale(0);
            opacity: 0;
        }
        50% {
            transform: scale(1.2);
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    @keyframes ripple {
        0% {
            transform: scale(1);
            opacity: 1;
        }
        100% {
            transform: scale(2);
            opacity: 0;
        }
    }

    .success-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--success-color);
        margin-bottom: 10px;
    }

    .success-subtitle {
        font-size: 1.1rem;
        color: #6c757d;
        margin-bottom: 0;
    }

    .step-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 20px;
        text-align: center;
    }

    .success-message {
        font-size: 1.1rem;
        color: #6c757d;
        line-height: 1.6;
        margin-bottom: 15px;
        text-align: center;
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
        width:100% !important;
    }

    .btn-login:hover {
        background: var(--primary-dark-color);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(123, 54, 181, 0.3);
    }

    .button-group {
        display: flex;
        justify-content: center;
        margin-top: 30px;
    }

    .mt-20{
        margin-top: 20px;
    }

    .mr-10 {
        margin-right: 10px;
    }

    /* Card styling */
    .card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 40px;
    }

    .bg-white {
        background-color: white;
    }

    .radius-xl {
        border-radius: 20px;
    }

    .text-center {
        text-align: center;
    }

    @media (max-width: 768px) {
        .card-body {
            padding: 20px;
        }

        .success-title {
            font-size: 1.5rem;
        }

        .step-title {
            font-size: 1.5rem;
        }

        .success-message {
            font-size: 1rem;
        }

        .btn-login {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<script>
    // Add animation on page load
    document.addEventListener('DOMContentLoaded', function() {
        const successIcon = document.querySelector('.success-icon');

        // Reset animation
        successIcon.classList.remove('animate-check');
        void successIcon.offsetWidth; // Trigger reflow
        successIcon.classList.add('animate-check');

        // Form submission handler
        $('#stepFour').on('submit', function(e) {
            e.preventDefault();

            // Show loading state
            const button = $(this).find('button');
            const originalText = button.html();
            button.html('<i class="ri-loader-4-line mr-10 animate-spin"></i>Sending...');
            button.prop('disabled', true);

            // Simulate API call
            setTimeout(function() {
                // Reset button
                button.html(originalText);
                button.prop('disabled', false);

                // Show success message
                alert('Verification email has been sent successfully!');
            }, 2000);
        });
    });

    // CSS for loading animation
    const style = document.createElement('style');
    style.textContent = `
        .animate-spin {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    `;
    document.head.appendChild(style);
</script>
@endsection