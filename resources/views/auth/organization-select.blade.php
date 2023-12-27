<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<!--begin::Head-->
	<head>
		<title>{{ env('APP_NAME') }} - Organization</title>
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
			<!--begin::Authentication - Organization -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(/image/bg-1.jpg); background-size: cover;">
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
						<form class="form w-100" novalidate="novalidate" id="kt_organizacion_select_form" action="/organization-select" method="POST">
							@csrf

							<div class="text-center mb-10">
								<h1 class="text-dark mb-3">Organization</h1>
							</div>

							<div class="mh-300px scroll-y me-n5 pe-5">
								@if (count($organizations)>0)
									@foreach ($organizations as $key => $organization)
									<a href= "/organization-select/{{ $organization->id }}" class="btn btn-white btn-active-success d-flex align-items-center p-3 rounded-3 cursor-pointer mb-1">
										<div class="symbol symbol-50px symbol-circle me-5">
											<span class="fs-3 symbol-label bg-light-success text-success fw-bold">{{ substr($organization->name,0,1) }}</span>
										</div>
										<div class="fw-bold">
											<span class="fs-4 me-2">{{ $organization->name }}</span>
										</div>
									</a>
									@endforeach
								@else
									<div class="pb-15 fw-bold text-center">
										<h3 class="text-gray-600 fs-5 mb-2">Not found</h3>
										<div class="text-muted fs-7">Please try again with a different user or require access</div>
									</div>
								@endif
							</div>

							<a href="/sign-out" class="btn btn-flex flex-center btn-danger btn-lg w-100 mt-15">
								Back to Sign In
							</a>

						</form>
						<!--end::Form-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->

			</div>
			<!--end::Authentication - Organization -->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="/assets/v8.1.5/plugins/global/plugins.bundle.js"></script>
		<script src="/assets/v8.1.5/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="/assets/v8.1.5/common.js"></script>
		<!--end::Page Custom Javascript-->
		<script type="text/javascript">

		$(function() {
		    @if ($success===false && $message)
		    	toastr.error("{{ $message }}", "Organization");
		    @endif
		});

		</script>
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>