<?php
$user_first_name   = "";
$user_last_name    = "";
$user_email        = "";
$user_password = "";
$user_password_confirmation = "";
if($errors->any()){
    $user_first_name               = old('first_name');
    $user_last_name                = old('last_name');
    $user_email                    = old('email');
    $user_password                 = old('password');
    $user_password_confirmation    = old('password_confirmation');
}

?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<!--begin::Head-->
	<head>
		<title>{{ env('APP_NAME') }} - Sign Up</title>
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
		<link href="/assets/v8.1.5/common.css" rel="stylesheet" type="text/css" />
		<style type="text/css">
			.fv-plugins-message-container.invalid-feedback.invalid-email {
				display: none;
			}
		</style>
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-dark">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-up -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(/image/bg-1.jpg);background-size: cover;">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--begin::Logo-->
					<a href="#" class="mb-12">
						<img alt="Logo" src="/image/logo-inline-white.png" class="h-40px" />
					</a>
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<!--begin::Form-->
						<form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" action="/sign-up" method="POST">
							@csrf
							<!--begin::Heading-->
							<div class="mb-10 text-center">
								<!--begin::Title-->
								<h1 class="text-dark mb-3">Join Us!</h1>
								<!--end::Title-->
								<!--begin::Link-->
								<div class="text-gray-400 fw-bold fs-4">Already engaged?
								<a href="/sign-in" class="link-primary fw-bolder">Sign in</a></div>
								<!--end::Link-->
							</div>
							<!--end::Heading-->

							<!--begin::Input group-->
							<div class="row fv-row mb-7">
								<div class="col-xl-12">
		                        @if ($errors->any())
		                            <div class="alert alert-danger alert-dismissible d-flex flex-column flex-sm-row p-5 mb-10">
		                                <span class="svg-icon svg-icon-5hx svg-icon-danger me-4">
		                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
		                                        <path d="M11.1669899,4.49941818 L2.82535718,19.5143571 C2.557144,19.9971408 2.7310878,20.6059441 3.21387153,20.8741573 C3.36242953,20.9566895 3.52957021,21 3.69951446,21 L21.2169432,21 C21.7692279,21 22.2169432,20.5522847 22.2169432,20 C22.2169432,19.8159952 22.1661743,19.6355579 22.070225,19.47855 L12.894429,4.4636111 C12.6064401,3.99235656 11.9909517,3.84379039 11.5196972,4.13177928 C11.3723594,4.22181902 11.2508468,4.34847583 11.1669899,4.49941818 Z" fill="#000000" opacity="0.3"/>
		                                        <rect fill="#000000" x="11" y="9" width="2" height="7" rx="1"/>
		                                        <rect fill="#000000" x="11" y="17" width="2" height="2" rx="1"/>
		                                    </svg>
		                                </span>
		                                <div class="d-flex flex-column text-danger pe-0 pe-sm-10">
		                                    <h4 class="mb-1 text-danger">{{ __("Validation Errors") }}</h4>
		                                    <ul>
		                                        @foreach ($errors->all() as $error)
		                                            <li><span>{{ $error }}</span></li>
		                                        @endforeach
		                                    </ul>
		                                </div>
		                                <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
		                                    <span class="svg-icon svg-icon-2x svg-icon-danger">
		                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
		                                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
		                                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"></rect>
		                                                <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1"></rect>
		                                            </g>
		                                        </svg>
		                                    </span>
		                                </button>
		                            </div>
		                        @endif
		                        </div>

								<!--begin::Col-->
								<div class="col-xl-6">
									<label class="form-label fw-bolder text-dark fs-6">First Name</label>
									<input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="first_name" autocomplete="off" value="{{ $user_first_name }}"/>
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-xl-6">
									<label class="form-label fw-bolder text-dark fs-6">Last Name</label>
									<input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="last_name" autocomplete="off" value="{{ $user_last_name }}"/>
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="fv-row mb-7">
								<label class="form-label fw-bolder text-dark fs-6">Email</label>
								<input class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="email" autocomplete="off"  value="{{ $user_email }}" />
								<div class="fv-plugins-message-container invalid-feedback invalid-email">There is already a user with this email</div>
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="mb-10 fv-row" data-kt-password-meter="true">
								<!--begin::Wrapper-->
								<div class="mb-1">
									<!--begin::Label-->
									<label class="form-label fw-bolder text-dark fs-6">Password</label>
									<!--end::Label-->
									<!--begin::Input wrapper-->
									<div class="position-relative mb-3">
										<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" value="{{ $user_password }}"/>
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
							<!--begin::Input group-->
							<div class="fv-row mb-5">
								<label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
								<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password_confirmation" autocomplete="off" value="{{ $user_password_confirmation }}" />
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<label class="form-check form-check-custom form-check-solid form-check-inline">
									<input class="form-check-input" type="checkbox" name="toc" value="1" />
									<span class="form-check-label fw-bold text-gray-700 fs-6">I am Eager To Join
									</span>
								</label>
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="text-center">
								<button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
									<span class="indicator-label">Submit</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
							</div>
							<!--end::Actions-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->

			</div>
			<!--end::Authentication - Sign-up-->
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
		<script src="/assets/v8.1.5/common.js"></script>
		<!--end::Javascript-->
		<script type="text/javascript">

		var SignUp = function() {
		    // Elements
		    var form;
		    var submitButton;
		    var validator;
		    var passwordMeter;

		    // Handle form
		    var handleForm  = function(e) {
		        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		        validator = FormValidation.formValidation(
					form,
					{
						fields: {
							'first_name': {
								validators: {
									notEmpty: {
										message: 'First Name is required'
									}
								}
		                    },
		                    'last_name': {
								validators: {
									notEmpty: {
										message: 'Last Name is required'
									}
								}
							},
							'email': {
		                        validators: {
									notEmpty: {
										message: 'Email address is required'
									},
		                            emailAddress: {
										message: 'The value is not a valid email address'
									},
									remote: {
			                            message: 'The username is not available',
			                            method: 'POST',
			                            data: {
			                            	_token: $("[name='_token']").val()
			                            },
			                            url: function(){
											var email=$('[name="email"]').val().trim();
											return "/users/valid/"+email;
			                            }
			                        },
								}
							},
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

		        // Handle form submit
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
		                    var first_name              = $("[name='first_name']").val();
		                    var last_name               = $("[name='last_name']").val();
		                    var email                   = $("[name='email']").val();
							var password                = $("[name='password']").val();
							var password_confirmation   = $("[name='password_confirmation']").val();


							$.ajax({
								method: "POST",
								url: "/sign-up",
								data: {
									_token:                 _token,
									first_name:             first_name,
									last_name:              last_name,
									email:                  email,
									password:               password,
									password_confirmation:  password_confirmation
								},
								dataType: "json",
								cache: false,
								}).done(function(data){
									console.log(data);

									if(data["success"]){
										var redirect="/email-verify";
										if(data["message"]){
											toastr.success(data["message"], "Sign Up");
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

			                        toastr.error(data["message"], "Sign Up");

								}).fail(function(data){
									// Hide loading indication
			                        submitButton.removeAttribute('data-kt-indicator');
			                        // Enable button
			                        submitButton.disabled = false;

			                        if(data && data.responseJSON && data.responseJSON.message){
			                        	toastr.error(data.responseJSON.message, "Sign Up");
			                        }
			                        else{
			                        	toastr.error("Fail Request", "Sign Up");
			                        }
							});

		                } else {
		                  	toastr.error("Sorry, looks like there are some errors detected, please try again.", "Sign Up");
		                }
				    });
		        });

		        // Handle password input
		        form.querySelector('input[name="password"]').addEventListener('input', function() {
		            if (this.value.length > 0) {
		                validator.updateFieldStatus('password', 'NotValidated');
		            }
		        });
		    }

		    // Password input validation
		    var validatePassword = function() {
		        return  (passwordMeter.getScore() >= 80);
		    }

		    // Public functions
		    return {
		        // Initialization
		        init: function() {
		            // Elements
		            form = document.querySelector('#kt_sign_up_form');
		            submitButton = document.querySelector('#kt_sign_up_submit');
		            passwordMeter = KTPasswordMeter.getInstance(form.querySelector('[data-kt-password-meter="true"]'));

		            handleForm ();
		        },

		    };
		}();

	    $(function() {
		    SignUp.init();
		});

		</script>
	</body>
	<!--end::Body-->
</html>