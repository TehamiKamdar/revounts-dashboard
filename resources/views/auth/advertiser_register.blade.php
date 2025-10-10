@extends("layouts.panel_guest")

@section("content")
        @if(($isStepOne && !$isStepTwo && !$isStepThree) || (!$isStepOne && !$isStepTwo && !$isStepThree))
            @include("auth.advertiser_register.step_one", $stepOne)

        @elseif(!$isStepOne && $isStepTwo && !$isStepThree)
            @include("auth.advertiser_register.step_two", $stepTwo)

        @elseif(!$isStepOne && !$isStepTwo && $isStepThree)
            @include("auth.advertiser_register.step_three")

        @endif

    <div class="loader-overlay display-hidden" id="showLoader">
        <div class="atbd-spin-dots spin-lg">
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
        </div>
    </div>
@endsection

@push("scripts")

    <script>
        let toastCount = 0;

        function createToast(type, content) {
            let toast = ``;
            const notificationShocase = $('.notification-wrapper');

            toast = `
                        <div class="atbd-notification-box notification-${type} notification-${toastCount}">
                            <div class="atbd-notification-box__content media">
                                <div class="atbd-notification-box__icon">
                                    <span data-feather="x-circle"></span>
                                </div>
                                <div class="atbd-notification-box__text media-body">
                                    <h6>Error List</h6>
                                    ${content}
                                </div>
                            </div>
                            <a href="#" class="atbd-notification-box__close" data-toast="close">
                                <span data-feather="x"></span>
                            </a>
                        </div>
                        `;

            notificationShocase.append(toast);
            toastCount++;
        }

        function showErrors(response) {
            let duration = (optionValue, defaultValue) =>
                typeof optionValue === "undefined" ? defaultValue : optionValue;

            let errorContent = "";

            Object.values(response.responseJSON.errors).forEach(errors => {
                errors.forEach(error => {
                    errorContent += `<p>${error}</p>`
                });
            });

            createToast("danger", errorContent);
            feather.replace();
            let thisToast = toastCount - 1;

            $('*[data-toast]').on('click', function () {
                $(this).parent('.atbd-notification-box').remove();
            })

            setTimeout(function () {
                $(document).find(".notification-" + thisToast).remove();
            }, duration(6000));
        }

        function stepFormShow(page) {
            let account = "{{ $account }}";
            $.ajax({
                url: '{{ route("advertiser-step-form") }}',
                type: 'GET',
                data: { page, account },
                success: function (data) {
                    $("#signUpForm").html(data)

                    if (page === 1)
                        loadStepOneForm();

                    else if (page === 2)
                        loadStepTwoForm();

                    else if (page === 3)
                        loadStepThreeForm();

                }
            });
        }

        function loadStepOneForm() {

            $("#stepOne").validate({
                rules: {
                    first_name: {
                        required: true,
                    },
                    last_name: {
                        required: true,
                    },
                    user_name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 8,
                    },
                    password_confirmation: {
                        required: true,
                        minlength: 8,
                        equalTo: "#password"
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
                },
                submitHandler: function () {

                    $("#signUpForm").addClass("disableDiv");
                    $("#showLoader").show();

                    let data = $("#stepOne").serialize();
                    $.ajax({
                        url: '{{ route("advertiser-step-one") }}',
                        type: 'POST',
                        headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
                        data: data,
                        success: function (response) {
                            if (response) {
                                stepFormShow(2)
                            }
                            $("#signUpForm").removeClass("disableDiv");
                            $("#showLoader").hide();
                        },
                        error: function (response) {
                            showErrors(response)
                            $("#signUpForm").removeClass("disableDiv");
                            $("#showLoader").hide();
                        }
                    });

                }
            });

        }

        function loadStepTwoForm() {
            $('#country').change(function () {

                $("#signUpForm").addClass("disableDiv");
                $("#showLoader").show();

                $.ajax({
                    url: '{{ route("get-states") }}',
                    type: 'POST',
                    headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
                    data: { "country_id": $(this).val() },
                    success: function (response) {
                        $("#state").html("<option value='' selected disabled>Please Select</option>");
                        response.map(state => {
                            $("#state").append(`<option value="${state.id}">${state.name}</option>`);
                        })
                        $("#signUpForm").removeClass("disableDiv");
                        $("#showLoader").hide();
                    },
                    error: function (response) {
                        showErrors(response);
                        $("#signUpForm").removeClass("disableDiv");
                        $("#showLoader").hide();
                    }
                });
            });
            $('#state').change(function () {

                $("#signUpForm").addClass("disableDiv");
                $("#showLoader").show();

                $.ajax({
                    url: '{{ route("get-cities") }}',
                    type: 'POST',
                    headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
                    data: { "state_id": $(this).val(), "country_id": $('#country').val() },
                    success: function (response) {
                        $("#city").html("<option value='' selected disabled>Please Select</option>");
                        response.map(city => {
                            $("#city").append(`<option value="${city.id}">${city.name}</option>`);
                        })
                        $("#signUpForm").removeClass("disableDiv");
                        $("#showLoader").hide();
                    },
                    error: function (response) {
                        showErrors(response);
                        $("#signUpForm").removeClass("disableDiv");
                        $("#showLoader").hide();
                    }
                });
            });

            $('#agree').change(function () {
                let isChecked = $(this).is(':checked');
                if (isChecked)
                    $("#terms").val(1);
                else
                    $("#terms").val("");
            });

            $("#stepTwo").validate({
                ignore: ':hidden:not(#terms)',
                rules: {
                    "brand_name": {
                        required: true,
                    },
                    "company_name": {
                        required: true,
                    },
                    "website_url": {
                        required: true,
                        url: true
                    },
                    "phone_number": {
                        required: true,
                    },
                    "address": {
                        required: true,
                    },
                    "state": {
                        required: true,
                    },
                    "country": {
                        required: true,
                    },
                    "terms": {
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
                    if ($(element).attr("name") === "terms") {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function () {
                    $("#signUpForm").addClass("disableDiv");
                    $("#showLoader").show();
                    let data = $("#stepTwo").serialize();
                    $.ajax({
                        url: '{{ route("advertiser-step-two") }}',
                        type: 'POST',
                        headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
                        data: data,
                        success: function (response) {
                            if (response) {
                                stepFormShow(3)
                            }
                            $("#signUpForm").removeClass("disableDiv");
                            $("#showLoader").hide();
                        },
                        error: function (response) {
                            showErrors(response);
                            $("#signUpForm").removeClass("disableDiv");
                            $("#showLoader").hide();
                        }
                    });
                }
            });
        }

        function loadStepThreeForm() {
            $("#stepThree").submit(function () {

                $("#signUpForm").addClass("disableDiv");
                $("#showLoader").show();

                $.ajax({
                    url: '{{ route('verification.send') }}',
                    type: 'POST',
                    headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
                    success: function (data) {
                        $("#signUpForm").removeClass("disableDiv");
                        $("#showLoader").hide();
                    }
                });

            });
        }

        document.addEventListener("DOMContentLoaded", function () {

            loadStepOneForm();
            loadStepTwoForm();
            loadStepThreeForm();

        });
    </script>

@endpush