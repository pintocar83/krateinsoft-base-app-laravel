<?php
$lang = [
	"en" => ["name" => "English", "image" => asset('assets/v8.2.1/media/flags/united-states.svg')],
	"es" => ["name" => "Spanish", "image" => asset('assets/v8.2.1/media/flags/spain.svg')],
];
$locale=app()->getLocale();
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
	<!--begin::Head-->
	<head>
		<title> {{ env('APP_NAME') }} - Sign In</title>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="{{asset('assets/v8.2.1/media/logos/favicon.ico')}}" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{asset('assets/v8.2.1/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/v8.2.1/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/common.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(/image/bg-1.jpg); background-size: cover;">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--begin::Logo-->
					<a href="#" class="mb-12">
						<img alt="Logo" src="/image/logo-inline-white.png" class="h-40px" />
					</a>
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto position-relative">


						<div class="menu menu-rounded rounded menu-column menu-gray-600 menu-state-bg fw-semibold position-absolute top-0 end-0 w-100 bg-light" data-kt-menu="true">
							<div class="menu-item p-0" data-kt-menu-trigger="{default: 'click', lg: 'click'}" data-kt-menu-placement="right-start" data-kt-menu-offset="-15px, 0">
								<a href="#" class="menu-link p-0 flex-column" style="align-items: flex-end !important;">
									<span class="fs-8 rounded px-3 py-2 bg-light">{{ $lang[$locale]["name"] }}
									<img class="w-15px h-15px rounded-1 ms-2" src="{{ $lang[$locale]['image'] }}" alt="" /></span></span>
								</a>
								<!--begin::Menu sub-->
								<div class="menu-sub menu-sub-dropdown w-175px py-4">
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link d-flex px-5" onclick="locale_selection('en')">
										<span class="symbol symbol-20px me-4">
											<img class="rounded-1" src="{{asset('assets/v8.2.1/media/flags/united-states.svg')}}" alt="" />
										</span>English</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link d-flex px-5" onclick="locale_selection('es')">
										<span class="symbol symbol-20px me-4">
											<img class="rounded-1" src="{{asset('assets/v8.2.1/media/flags/spain.svg')}}" alt="" />
										</span>Spanish</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link d-flex px-5" onclick="locale_selection('')">
										<span class="symbol symbol-20px me-4">
											<img class="rounded-1" src="{{asset('assets/v8.2.1/media/flags/germany.svg')}}" alt="" />
										</span>German</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link d-flex px-5">
										<span class="symbol symbol-20px me-4">
											<img class="rounded-1" src="{{asset('assets/v8.2.1/media/flags/japan.svg')}}" alt="" />
										</span>Japanese</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link d-flex px-5">
										<span class="symbol symbol-20px me-4">
											<img class="rounded-1" src="{{asset('assets/v8.2.1/media/flags/france.svg')}}" alt="" />
										</span>French</a>
									</div>
									<!--end::Menu item-->
								</div>
								<!--end::Menu sub-->
							</div>
						</div>

						<!--begin::Form-->
						<form class="form w-100 position-relative" novalidate="novalidate" id="kt_sign_in_form" action="/sign-in" method="POST">
							@csrf
							<!--begin::Heading-->
							<div class="text-center mb-10">
								<!--begin::Title-->
								<h1 class="text-dark mb-3 mt-5">Welcome!</h1>
								<!--end::Title-->
								<!--begin::Link-->
								<div class="text-gray-400 fw-bold fs-4">Are you engaged?
								<a href="/sign-up" class="link-primary fw-bolder">Sign up</a></div>
								<!--end::Link-->
							</div>
							<!--begin::Heading-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<!--begin::Label-->
								<label class="form-label fs-6 fw-bolder text-dark">Email</label>
								<!--end::Label-->
								<!--begin::Input-->
								<input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off" />
								<!--end::Input-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<!--begin::Wrapper-->
								<div class="d-flex flex-stack mb-2">
									<!--begin::Label-->
									<label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
									<!--end::Label-->
									<!--begin::Link-->
									<a href="/password-forgot" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
									<!--end::Link-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Input-->
								<input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
								<!--end::Input-->
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="text-center">
								<!--begin::Submit button-->
								<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
									<span class="indicator-label">Continue</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
								<!--end::Submit button-->

								<!--begin::Separator-->
								<div class="text-center text-muted text-uppercase fw-bolder">or</div>
								<!--end::Separator-->

								@if (env('GOOGLE_ENABLED'))
								<!--begin::Google link-->
								<a href="/sign-in/google" class="btn btn-flex flex-center btn-light btn-lg w-100 mt-5">
								<img alt="Logo" src="{{asset('assets/v8.2.1/media/svg/brand-logos/google-icon.svg')}}" class="h-20px me-3" />Continue with Google</a>
								<!--end::Google link-->
								@endif

								@if (env('FACEBOOK_ENABLED'))
								<!--begin::Google link-->
								<a href="/sign-in/facebook" class="btn btn-flex flex-center btn-light btn-lg w-100 mt-5">
								<img alt="Logo" src="{{asset('assets/v8.2.1/media/svg/brand-logos/facebook-4.svg')}}" class="h-20px me-3" />Continue with Facebook</a>
								<!--end::Google link-->
								@endif

								@if (env('TWITTER_ENABLED'))
								<!--begin::Google link-->
								<a href="/sign-in/twitter" class="btn btn-flex flex-center btn-light btn-lg w-100 mt-5">
								<img alt="Logo" src="{{asset('assets/v8.2.1/media/svg/brand-logos/twitter.svg')}}" class="h-20px me-3" />Continue with Twitter</a>
								<!--end::Google link-->
								@endif

								@if (env('LINKEDIN_ENABLED'))
								<!--begin::GitHub link-->
								<a href="/sign-in/linkedin" class="btn btn-flex flex-center btn-light btn-lg w-100 mt-5">
								<img alt="Logo" src="{{asset('assets/v8.2.1/media/svg/brand-logos/linkedin-2.svg')}}" class="h-20px me-3" />Continue with LinkedIn</a>
								<!--end::GitHub link-->
								@endif

								@if (env('GITHUB_ENABLED'))
								<!--begin::GitHub link-->
								<a href="/sign-in/github" class="btn btn-flex flex-center btn-light btn-lg w-100 mt-5">
								<img alt="Logo" src="{{asset('assets/v8.2.1/media/svg/brand-logos/github.svg')}}" class="h-20px me-3" />Continue with GitHub</a>
								<!--end::GitHub link-->
								@endif

								@if (env('BITBUCKET_ENABLED'))
								<!--begin::BitBucket link-->
								<a href="/sign-in/bitbucket" class="btn btn-flex flex-center btn-light btn-lg w-100 mt-5">
								<img alt="Logo" src="{{asset('assets/v8.2.1/media/svg/brand-logos/bitbucket.svg')}}" class="h-20px me-3" />Continue with BitBucket</a>
								<!--end::BitBucket link-->
								@endif

								@if (env('GITLAB_ENABLED'))
								<!--begin::GitLab link-->
								<a href="/sign-in/gitlab" class="btn btn-flex flex-center btn-light btn-lg w-100 mt-5">
								<img alt="Logo" src="{{asset('assets/v8.2.1/media/svg/brand-logos/gitlab.svg')}}" class="h-20px me-3" />Continue with GitLab</a>
								<!--end::GitLab link-->
								@endif

							</div>
							<!--end::Actions-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->

			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{asset('assets/v8.2.1/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/v8.2.1/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{asset('assets/common.js')}}"></script>
		<!--end::Page Custom Javascript-->
		<script type="text/javascript">
		// Class definition
		var SignIn = function() {
		    // Elements
		    var form;
		    var submitButton;
		    var validator;

		    // Handle form
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
							},
		                    'password': {
		                        validators: {
		                            notEmpty: {
		                                message: 'The password is required'
		                            }
		                        }
		                    }
						},
						plugins: {
							trigger: new FormValidation.plugins.Trigger(),
							bootstrap: new FormValidation.plugins.Bootstrap5({
		                        rowSelector: '.fv-row'
		                    })
						}
					}
				);

		        // Handle form submit
		        submitButton.addEventListener('click', function (e) {
		            // Prevent button default action
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
							var password = $("[name='password']").val();

		                    $.ajax({
								method: "POST",
								url: "/sign-in",
								data: {
									_token:   _token,
									email:    email,
									password: password
								},
								dataType: "json",
								cache: false,
								}).done(function(data){
									console.log(data);

									if(data["success"]){
										window.location.reload();
										return;
									}

									// Hide loading indication
			                        submitButton.removeAttribute('data-kt-indicator');
			                        // Enable button
			                        submitButton.disabled = false;

			                        toastr.error(data["message"], "Sign In");

								}).fail(function(){
									// Hide loading indication
			                        submitButton.removeAttribute('data-kt-indicator');
			                        // Enable button
			                        submitButton.disabled = false;

			                        toastr.error("Fail Request", "Sign In");
							});

		                } else {
		                    toastr.error("Sorry, looks like there are some errors detected, please try again.", "Sign In");
		                }
		            });
				});
		    }

		    // Public functions
		    return {
	        // Initialization
	        init: function() {
	            form = document.querySelector('#kt_sign_in_form');
	            submitButton = document.querySelector('#kt_sign_in_submit');

	            handleForm();
	        }
		    };
		}();

		$(function() {
		    SignIn.init();
		    @if ($success===false && $message)
		    	toastr.error("{{ $message }}", "Sign In");
		    @endif
		});

		</script>
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>