<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="checkout-progress-indicator ">
                    @if(($isStepOne && !$isStepTwo && !$isStepThree && !$isStepFour) || (!$isStepOne && !$isStepTwo && !$isStepThree && !$isStepFour))
                        @include("auth.publisher_register.steps.one")

                    @elseif(!$isStepOne && $isStepTwo && !$isStepThree && !$isStepFour)
                        @include("auth.publisher_register.steps.two")

                    @elseif(!$isStepOne && !$isStepTwo && $isStepThree && !$isStepFour)
                        @include("auth.publisher_register.steps.three")

                    @elseif(!$isStepOne && !$isStepTwo && !$isStepThree && $isStepFour)
                        @include("auth.publisher_register.steps.four")

                    @endif
                </div><!-- checkout -->
            </div>
            <div class="col-xl-7 col-lg-8 col-sm-10">
                @yield("step_form_content")
            </div><!-- ends: col -->
        </div>
    </div><!-- ends: col -->
</div>
