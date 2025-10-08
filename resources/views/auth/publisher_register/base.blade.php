
@if(($isStepOne && !$isStepTwo && !$isStepThree && !$isStepFour) || (!$isStepOne && !$isStepTwo && !$isStepThree && !$isStepFour))
    @include("auth.publisher_register.steps.one")

@elseif(!$isStepOne && $isStepTwo && !$isStepThree && !$isStepFour)
    @include("auth.publisher_register.steps.two")

@elseif(!$isStepOne && !$isStepTwo && $isStepThree && !$isStepFour)
    @include("auth.publisher_register.steps.three")

@elseif(!$isStepOne && !$isStepTwo && !$isStepThree && $isStepFour)
    @include("auth.publisher_register.steps.four")

@endif
@yield("step_form_content")