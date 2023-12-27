<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<!--begin::Head-->
	<head>
		<title>{{ env('APP_NAME') }} - Password Forgot</title>
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
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-dark">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Password forgot -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(/image/bg-1.jpg);background-size: cover;">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--begin::Logo-->
					<a href="#" class="mb-12">
						<img alt="Logo" src="/image/logo-inline-white.png" class="h-40px" />
					</a>
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<!--begin::Form-->
						<form class="form w-100" novalidate="novalidate" id="kt_password_reset_form">
							@csrf
							<!--begin::Heading-->
							<div class="text-center mb-10">
								<!--begin::Title-->
								<h1 class="text-dark mb-3">Forgot Password ?</h1>
								<!--end::Title-->
								<!--begin::Link-->
								<div class="text-gray-400 fw-bold fs-4">Enter your email to reset your password.</div>
								<!--end::Link-->
							</div>
							<!--begin::Heading-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<label class="form-label fw-bolder text-gray-900 fs-6">Email</label>
								<input class="form-control form-control-solid" type="email" placeholder="" name="email" autocomplete="off" />
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="d-flex flex-wrap justify-content-center pb-lg-0">
								<button type="button" id="kt_password_reset_submit" class="btn btn-lg btn-primary fw-bolder me-4">
									<span class="indicator-label">Submit</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
								<a href="/sign-in" class="btn btn-lg btn-light-primary fw-bolder">Cancel</a>
							</div>
							<!--end::Actions-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Authentication - Password forgot-->
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
			var PasswordForgot = function() {
			    // Elements
			    var form;
			    var submitButton;
				var validator;

			    var handleForm = function(e) {
			        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
			        validator = FormValidation.formValidation(
						form,
						{
							fields: {
								'email': {
			                        validators: {
										notEmpty: {
											message: 'Email address is required'
										},
			                            emailAddress: {
											message: 'The value is not a valid email address'
										}
									}
								}
							},
							plugins: {
								trigger: new FormValidation.plugins.Trigger(),
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

			            // Validate form
			            validator.validate().then(function (status) {
			                if (status == 'Valid') {
			                    // Show loading indication
			                    submitButton.setAttribute('data-kt-indicator', 'on');

			                    // Disable button to avoid multiple click
			                    submitButton.disabled = true;

			                    var _token   = $("[name='_token']").val();
			                    var email    = $("[name='email']").val();

			                    $.ajax({
									method: "POST",
									url: "/password-forgot",
									data: {
										_token:   _token,
										email:    email
									},
									dataType: "json",
									cache: false,
									}).done(function(data){
										console.log(data);

										if(data["success"]){
                                            var redirect="/sign-in";
                                            if(data["message"]){
                                                toastr.success(data["message"], "Password Forgot");
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

				                        toastr.error(data["message"], "Password Forgot");

									}).fail(function(){
										// Hide loading indication
				                        submitButton.removeAttribute('data-kt-indicator');
				                        // Enable button
				                        submitButton.disabled = false;

				                        toastr.error("Fail Request", "Password Forgot");
								});


			                } else {
			                    toastr.error("Sorry, looks like there are some errors detected, please try again.", "Sign Up");
			                }
			            });
					});
			    }

			    // Public Functions
			    return {
			        // public functions
			        init: function() {
			            form = document.querySelector('#kt_password_reset_form');
			            submitButton = document.querySelector('#kt_password_reset_submit');

			            handleForm();
			        }
			    };
			}();

			$(function() {
			    PasswordForgot.init();
			});
		</script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>