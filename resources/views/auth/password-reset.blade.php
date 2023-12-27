<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <!--begin::Head-->
    <head>
        <title>{{ env('APP_NAME') }} - Password Reset</title>
        <meta charset="utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="/assets/v8.1.5/media/logos/favicon.ico" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Global Stylesheets Bundle(used by all pages)-->
        <link href="/assets/v8.1.5/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="/assets/v8.1.5/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <link href="/assets/common.css" rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body id="kt_body" class="bg-dark">
        <!--begin::Main-->
        <!--begin::Root-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Authentication - New password -->
            <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(/image/bg-1.jpg);background-size: cover;">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                    <!--begin::Logo-->
                    <a href="#" class="mb-12">
                        <img alt="Logo" src="/image/logo-inline-white.png" class="h-40px" />
                    </a>
                    <!--end::Logo-->
                    <!--begin::Wrapper-->
                    <div class="w-lg-550px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                        <!--begin::Form-->
                        <form class="form w-100" novalidate="novalidate" id="kt_new_password_form">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $_GET['email'] }}">
                            <!--begin::Heading-->
                            <div class="text-center mb-10">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3">Setup New Password</h1>
                                <!--end::Title-->
                                <!--begin::Link-->
                                <div class="text-gray-400 fw-bold fs-4">Already have reset your password ?
                                <a href="/sign-in" class="link-primary fw-bolder">Sign in here</a></div>
                                <!--end::Link-->
                            </div>
                            <!--begin::Heading-->
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row" data-kt-password-meter="true">
                                <!--begin::Wrapper-->
                                <div class="mb-1">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bolder text-dark fs-6">Password</label>
                                    <!--end::Label-->
                                    <!--begin::Input wrapper-->
                                    <div class="position-relative mb-3">
                                        <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />
                                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                            <i class="bi bi-eye-slash fs-2"></i>
                                            <i class="bi bi-eye fs-2 d-none"></i>
                                        </span>
                                    </div>
                                    <!--end::Input wrapper-->
                                    <!--begin::Meter-->
                                    <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                    </div>
                                    <!--end::Meter-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Hint-->
                                <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
                                <!--end::Hint-->
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Input group=-->
                            <div class="fv-row mb-10">
                                <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
                                <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password_confirmation" autocomplete="off" />
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Input group=-->
                            <div class="fv-row mb-10">
                                <div class="form-check form-check-custom form-check-solid form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="toc" value="1" />
                                    <label class="form-check-label fw-bold text-gray-700 fs-6">I Agree &amp;
                                    <a href="#" class="ms-1 link-primary">Terms and conditions</a>.</label>
                                </div>
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Action-->
                            <div class="text-center">
                                <button type="button" id="kt_new_password_submit" class="btn btn-lg btn-primary fw-bolder">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Action-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                <div class="d-flex flex-center flex-column-auto p-10">
                    <!--begin::Links-->
                    <div class="d-flex align-items-center fw-bold fs-6">
                        <a href="https://keenthemes.com" class="text-muted text-hover-primary px-2">About</a>
                        <a href="mailto:support@keenthemes.com" class="text-muted text-hover-primary px-2">Contact</a>
                        <a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2">Contact Us</a>
                    </div>
                    <!--end::Links-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Authentication - New password-->
        </div>
        <!--end::Root-->
        <!--end::Main-->
        <!--begin::Javascript-->
        <!--begin::Global Javascript Bundle(used by all pages)-->
        <script src="/assets/v8.1.5/plugins/global/plugins.bundle.js"></script>
        <script src="/assets/v8.1.5/js/scripts.bundle.js"></script>
        <!--end::Global Javascript Bundle-->
        <!--begin::Page Custom Javascript(used by this page)-->
        <!--end::Page Custom Javascript-->
        <script src="/assets/common.js"></script>
        <!--end::Javascript-->
        <script type="text/javascript">
            var PasswordReset = function() {
                // Elements
                var form;
                var submitButton;
                var validator;
                var passwordMeter;

                var handleForm = function(e) {
                    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
                    validator = FormValidation.formValidation(
                        form,
                        {
                            fields: {
                                'password': {
                                    validators: {
                                        notEmpty: {
                                            message: 'The password is required'
                                        },
                                        callback: {
                                            message: 'Please enter valid password',
                                            callback: function(input) {
                                                if (input.value.length > 0) {
                                                    return validatePassword();
                                                }
                                            }
                                        }
                                    }
                                },
                                'password_confirmation': {
                                    validators: {
                                        notEmpty: {
                                            message: 'The password confirmation is required'
                                        },
                                        identical: {
                                            compare: function() {
                                                return form.querySelector('[name="password"]').value;
                                            },
                                            message: 'The password and its confirm are not the same'
                                        }
                                    }
                                },
                                'toc': {
                                    validators: {
                                        notEmpty: {
                                            message: 'You must accept the terms and conditions'
                                        }
                                    }
                                }
                            },
                            plugins: {
                                trigger: new FormValidation.plugins.Trigger({
                                    event: {
                                        password: false
                                    }
                                }),
                                bootstrap: new FormValidation.plugins.Bootstrap5({
                                    rowSelector: '.fv-row',
                                    eleInvalidClass: '',
                                    eleValidClass: ''
                                })
                            }
                        }
                    );

                    submitButton.addEventListener('click', function (e) {
                        e.preventDefault();

                        validator.revalidateField('password');

                        validator.validate().then(function(status) {
                            if (status == 'Valid') {
                                // Show loading indication
                                submitButton.setAttribute('data-kt-indicator', 'on');

                                // Disable button to avoid multiple click
                                submitButton.disabled = true;

                                var _token                  = $("[name='_token']").val();
                                var token                   = $("[name='token']").val();
                                var email                   = $("[name='email']").val();
                                var password                = $("[name='password']").val();
                                var password_confirmation   = $("[name='password_confirmation']").val();

                                $.ajax({
                                    method: "POST",
                                    url: "/password-reset",
                                    data: {
                                        _token:                _token,
                                        token:                 token,
                                        email:                 email,
                                        password:              password,
                                        password_confirmation: password_confirmation
                                    },
                                    dataType: "json",
                                    cache: false,
                                    }).done(function(data){
                                        console.log(data);

                                        if(data["success"]){
                                            var redirect="/sign-in";
                                            if(data["message"]){
                                                toastr.success(data["message"], "Password Reset");
                                                setTimeout(function(){
                                                    window.location.href=redirect;
                                                }, 5000);
                                            }
                                            else{
                                                window.location.href=redirect;
                                            }
                                            return;
                                        }

                                        // Hide loading indication
                                        submitButton.removeAttribute('data-kt-indicator');
                                        // Enable button
                                        submitButton.disabled = false;

                                        toastr.error(data["message"], "Password Reset");

                                    }).fail(function(){
                                        // Hide loading indication
                                        submitButton.removeAttribute('data-kt-indicator');
                                        // Enable button
                                        submitButton.disabled = false;

                                        toastr.error("Fail Request", "Password Reset");
                                });

                            } else {
                                // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                                toastr.error("Sorry, looks like there are some errors detected, please try again.", "Sign Up");

                            }
                        });
                    });

                    form.querySelector('input[name="password"]').addEventListener('input', function() {
                        if (this.value.length > 0) {
                            validator.updateFieldStatus('password', 'NotValidated');
                        }
                    });
                }

                var validatePassword = function() {
                    return  (passwordMeter.getScore() >= 80);
                }

                // Public Functions
                return {
                    // public functions
                    init: function() {
                        form = document.querySelector('#kt_new_password_form');
                        submitButton = document.querySelector('#kt_new_password_submit');
                        passwordMeter = KTPasswordMeter.getInstance(form.querySelector('[data-kt-password-meter="true"]'));

                        handleForm();
                    }
                };
            }();

            $(function() {
                PasswordReset.init();
            });
        </script>
    </body>
    <!--end::Body-->
</html>