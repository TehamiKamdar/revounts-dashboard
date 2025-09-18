@extends("auth.publisher_register.base")

@section("step_form_content")

    <div class="card checkout-shipping-form">
        <div class="card-header border-bottom-0 pb-sm-0 pb-1 px-0">
            <h4 class="fw-500">Email Verification</h4>
        </div>

        <div class="card payment-status bg-normal mt-0 p-sm-30 p-15">
            <div class="card-body bg-white bg-shadow radius-xl px-sm-30 pt-sm-25 m-0 p-0">
                <div class="payment-status__area  py-sm-10 py-10 text-center">
                    <div class="content-center">
                        <span class="wh-34 bg-success rounded-circle content-center">
                            <span class="las la-check fs-16 color-white"></span>
                        </span>
                    </div>
                    <h4 class="fw-500 mt-20 mb-10">Account Created</h4>
                </div>
            </div>
        </div>

        <div class="card-body p-0 mt-20" data-select2-id="7">
            <div class="edit-profile__body">
                <h2 class="pt-2">You're Only One Step Away!</h2>
                <p>An email has been sent to your inbox, please check and verify to complete your registration.</p>
                <p>If you did not receive any email, please check your spam/junk folder or click on the resend button below.</p>
                <div class="button-group d-flex pt-3 justify-content-between flex-wrap">
                    <form id="stepFour" action="javascript:void(0)">
                        {{--                            <form method="POST" action="{{ route('verification.send') }}">--}}
                        {{--                                @csrf--}}
                        <button type="submit" class="btn text-white btn-primary btn-default btn-squared text-capitalize m-1">Resend Verification Email</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- ends: .card -->

@endsection
