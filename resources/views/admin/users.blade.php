@extends('layout')

@section('title')
{{ __('Users') }}
@endsection

@section('breadcrumb')
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
	<!--begin::Item-->
	<li class="breadcrumb-item text-muted">
		<a href="{{ url('/') }}" class="text-muted text-hover-primary">Home</a>
	</li>
	<!--end::Item-->
	<!--begin::Item-->
	<li class="breadcrumb-item">
		<span class="bullet bg-gray-500 w-5px h-2px"></span>
	</li>
	<!--end::Item-->
	<!--begin::Item-->
	<li class="breadcrumb-item text-muted">Management</li>
	<!--end::Item-->
	<!--begin::Item-->
	<li class="breadcrumb-item">
		<span class="bullet bg-gray-500 w-5px h-2px"></span>
	</li>
	<!--end::Item-->
	<!--begin::Item-->
	<li class="breadcrumb-item text-muted">Users</li>
	<!--end::Item-->
</ul>
@endsection

@section('actions')
	<!--<a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Create</a>-->
@endsection

@section('content')
<div id="kt_app_content_container" class="app-container container-xxl">
	<!--begin::Card List-->
	<div class="card module-list">
		<!--begin::Card header-->
		<div class="card-header border-0 pt-6">
          <!--begin::Card title-->
          <div class="card-title">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
              <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                <span class="path1"></span>
                <span class="path2"></span>
              </i>
              <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search user" />
            </div>
            <!--end::Search-->
          </div>
          <!--begin::Card title-->
          <!--begin::Card toolbar-->
          <div class="card-toolbar">
            <!--begin::Toolbar-->
            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
              <!--begin::Filter-->
              <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
              <i class="ki-duotone ki-filter fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
              </i>Filter</button>
              <!--begin::Menu 1-->
              <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                <!--begin::Header-->
                <div class="px-7 py-5">
                  <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                </div>
                <!--end::Header-->
                <!--begin::Separator-->
                <div class="separator border-gray-200"></div>
                <!--end::Separator-->
                <!--begin::Content-->
                <div class="px-7 py-5" data-kt-user-table-filter="form">
                  <!--begin::Input group-->
                  <div class="mb-10">
                    <label class="form-label fs-6 fw-semibold">Role:</label>
                    <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
                      <option></option>
                      <option value="Administrator">Administrator</option>
                      <option value="Analyst">Analyst</option>
                      <option value="Developer">Developer</option>
                      <option value="Support">Support</option>
                      <option value="Trial">Trial</option>
                    </select>
                  </div>
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <div class="mb-10">
                    <label class="form-label fs-6 fw-semibold">Two Step Verification:</label>
                    <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="two-step" data-hide-search="true">
                      <option></option>
                      <option value="Enabled">Enabled</option>
                    </select>
                  </div>
                  <!--end::Input group-->
                  <!--begin::Actions-->
                  <div class="d-flex justify-content-end">
                    <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
                    <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
                  </div>
                  <!--end::Actions-->
                </div>
                <!--end::Content-->
              </div>
              <!--end::Menu 1-->
              <!--end::Filter-->
              <!--begin::Add user-->
              <button type="button" class="btn btn-primary" onclick="Users.add()">
              <i class="ki-duotone ki-plus fs-2"></i>Add User</button>
              <!--end::Add user-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Group actions-->
            <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
              <div class="fw-bold me-5">
              <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>
              <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
            </div>
            <!--end::Group actions-->
          </div>
          <!--end::Card toolbar-->
        </div>
		<!--end::Card header-->
		<!--begin::Card body-->
		<div class="card-body py-4">
			<!--begin::Table-->
			<table class="table align-middle table-row-dashed fs-6 gy-5" id="datatable_users">
				<!--begin::Table head-->
				<thead>
					<!--begin::Table row-->
					<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
						<th class="w-10px pe-2">
							<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
								<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#datatable_users .form-check-input" value="1" />
							</div>
						</th>
						<th class="min-w-125px">User</th>
						<th class="min-w-125px">Phone</th>
						<th class="min-w-125px">Last login</th>
						<th class="min-w-125px">Roles</th>
						<th class="min-w-125px">Joined Date</th>
						<th class="text-end min-w-100px">Actions</th>
					</tr>
					<!--end::Table row-->
				</thead>
				<!--end::Table head-->
				<!--begin::Table body-->
				<tbody class="text-gray-600 fw-bold">
				</tbody>
				<!--end::Table body-->
			</table>
			<!--end::Table-->
		</div>
		<!--end::Card body-->
	</div>
	<!--end::Card List-->

	<div class="card module-form" style="display: none;">
        <div class="card-header border-0 cursor-pointer" role="button">
            <div class="card-title m-0">
                <h2 class="fw-bolder m-0 d-flex align-items-center flex-wrap">
                	{{ __("Add User") }}
                	<span class="h-20px border-gray-200 border-start mx-4"></span>

                	<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
						<li class="breadcrumb-item text-muted module-form-subtitle">
						</li>
					</ul>

                </h2>
            </div>
        </div>
        <div id="kt_account_profile_details" class="show">
            <!--begin::Form-->
            <form id="form_users" class="form" action="" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-body border-top p-9">

                    <div class="row mb-6">
                        <label class="col-lg-3 col-form-label fw-bold fs-6 text-lg-end">{{ __("Avatar") }}</label>
                        <div class="col-lg-9">
                            <div class="image-input image-input-empty user-image" data-kt-image-input="true">
                                <!--<div class="image-input-wrapper w-125px h-125px"></div>-->
                                <div class="image-input-wrapper w-125px h-125px"></div>
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="{{ __('Change') }}">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="image_remove" />
                                </label>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="{{ __('Cancel') }}">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="{{ __('Remove') }}">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                            </div>
                            <div class="form-text">{{ __("Allowed file types: png, jpg, jpeg.") }}</div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-3 col-form-label fw-bold fs-6 text-lg-end">{{ __("Full Name") }}</label>
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-6 fv-row">
                                    <input type="text" name="first_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="{{ __('First Name') }}" value="" />
                                </div>
                                <div class="col-lg-6 fv-row">
                                    <input type="text" name="last_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="{{ __('Last Name') }}" value="" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-3 col-form-label fw-bold fs-6 text-lg-end">{{ __("Email") }}</label>
                        <div class="col-lg-9 fv-row">
                            <input type="text" name="email" class="form-control form-control-solid" placeholder="{{ __('Email') }}" value="" />
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-3 col-form-label fw-bold fs-6 text-lg-end">
                            {{ __("Phone") }}
                        </label>
                        <div class="col-lg-9 fv-row">
                            <input type="tel" name="phone" class="form-control form-control-solid" placeholder="{{ __('Phone Number') }}" value="" />
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-3 col-form-label fw-bold fs-6 text-lg-end">{{ __("Password") }}</label>
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-6 fv-row">
                                    <input type="password" name="password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="{{ __('Password') }}" value="" />
                                </div>
                                <div class="col-lg-6 fv-row">
                                    <input type="password" name="password_confirmation" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="{{ __('Password Confirmation') }}" value="" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-3 col-form-label fw-bold fs-6 text-lg-end">{{ __("Language") }}</label>
                        <div class="col-lg-9 fv-row">
                            <select name="language" aria-label="Select a Language" data-control="select2" data-placeholder="{{ __('Select a language...') }}" class="form-select form-select-solid form-select-lg">
                                <option value="">{{ __('Select a language...') }}</option>
                                <option data-kt-flag="/assets/v8.1.5/flags/united-kingdom.svg" value="en">English</option>
                                <option data-kt-flag="/assets/v8.1.5/flags/spain.svg" value="es">Español - Spanish</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-3 col-form-label fw-bold fs-6 text-lg-end">{{ __("Time Zone") }}</label>
                        <div class="col-lg-9 fv-row">
                            <select name="timezone" aria-label="Select a Timezone" data-control="select2" data-placeholder="{{ __('Select a timezone...') }}" class="form-select form-select-solid form-select-lg">
                                <option value="">{{ __('Select a Timezone...') }}</option>
                                <?php foreach($timezones as $key => $value): ?>
                                    <option value="{{ $key }}">{{ $value }}</option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-3 col-form-label fw-bold fs-6 text-lg-end">{{ __("Organizations") }}</label>
                        <div class="col-lg-9 fv-row  text-gray-700">

                            @foreach ($organizations as $key => $organization)
                        	<div class="form-check form-check-custom form-check-solid form-check-sm pt-4">
							    <input class="form-check-input" type="checkbox" value="{{ $organization->id }}" name='organizations' id="checkbox-organization-{{ $organization->id }}"/>
							    <label class="form-check-label" for="checkbox-organization-{{ $organization->id }}">
							        {{ $organization->name }}
							    </label>
							</div>
							@endforeach

                        </div>
                    </div>

                </div>

                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a class="btn btn-danger btn-active-light-primary me-2" href="#" onclick="Users.list()">{{ __("Cancel") }}</a>
                    <button type="button" class="btn btn-success" onclick="Users.save()" id="save_users">
                        <span class="indicator-label">{{ __("Save") }}</span>
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>

            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>

</div>
@endsection

@section('stylesheet')

@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('apps/admin/users.js')}}"></script>
@endsection