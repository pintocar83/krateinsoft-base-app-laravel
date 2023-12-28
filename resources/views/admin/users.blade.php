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

<?php

/*
Cache::rememberForever( 'translations', function () {
   return collect( File::allFiles(  '../lang/'. App::getLocale() )  )->flatMap( function ( $file ) {
      return [
         $translation = $file->getBasename( '.php' ) => trans( $translation ),
      ];
   } )->toJson();
} );
*/
?>
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
<script type="text/javascript">
    var Users={
      default_image: '/assets/v8.1.5/media/avatars/blank.png',
      default_timezome: '{{ $timezone }}',
      default_language: '{{ $language }}',
      current_id: null,
      validator: null,
      form: null,

      init: function(){
        var me=this;
        //return;

        $(".user-image").css('background-image',"url('"+me.default_image+"')");
        $(".user-image .image-input-wrapper").css('background-image',"url('"+me.default_image+"')");

        $("#datatable_search").on("keyup", function(event){
          if(event.keyCode==13){
            me.search();
          }
        });

        me.form=$("#form_users");
        me.btn_save=$("#save_users");

        me.validator = FormValidation.formValidation(
          me.form.get(0),
          {
            fields: {
              'first_name': {
                validators: {
                  notEmpty: {
                    message: "{{ _('First Name is required') }}"
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
                    data: function(){
                      var tmp={
                        _token: $("[name='_token']").val()
                      };
                      if(me.current_id)
                        tmp.id=me.current_id;
                      return tmp;
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
                  callback: {
                    callback: function(input) {
                                          if(!me.current_id && !me.form.find("[name='password']").val()) //if (is new) password is required
                                            return {valid: false, message: 'The password is required'};
                                          return true;
                                        }
                                      }
                                    }
                                  },
                                  'password_confirmation': {
                                    validators: {
                                      callback: {
                                        callback: function(input) {
                                          if(!me.current_id && !me.form.find("[name='password_confirmation']").val())
                                            return {valid: false, message: 'The password confirmation is required'};
                                          if(me.form.find("[name='password']").val() && !me.form.find("[name='password_confirmation']").val())
                                            return {valid: false, message: 'The password confirmation is required'};
                                          if(me.form.find("[name='password']").val() != me.form.find("[name='password_confirmation']").val())
                                            return {valid: false, message: 'The password and its confirm are not the same'};
                                          return true;
                                        }
                                      }
                                    }
                                  }
                                },
                                plugins: {
                                  trigger: new FormValidation.plugins.Trigger({
                                    event: {
                                  //password: false
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

        me.initList();
        me.search();
      },

      initList: function(){
        var me=this;

        var _token   = $("[name='_token']").val();

        me.dt = $("#datatable_users").DataTable({
          responsive: false,
          searchDelay: 500,
          processing: true,
          serverSide: true,
          order: [[1, 'asc']],
          stateSave: true,
          deferLoading: false,
          drawCallback: function(){
                  //KTApp.initBootstrapTooltips();
          },
          select: {
            style: 'os',
            selector: 'td:first-child',
            className: 'row-selected'
          },
          ajax: {
            _token: _token,
            url: "{{ url('api/users') }}"
          },
          columns: [
            {data: 'id'},
            {data: 'first_name'},
            {data: 'phone'},
            {data: 'last_login'},
            {data: 'created_at'},
            {data: null}
            ],
          columnDefs: [
          {
            targets: 0,
            orderable: false,
            searchable: false,
            width: '1%',
            className: 'col-w1',
            render: function (data) {
              return `
              <div class="form-check form-check-sm form-check-custom form-check-solid">
              <input class="form-check-input" type="checkbox" value="${data}" />
              </div>`;
            }
          },
          {
            targets: 1,
            searchable: false,
            className: 'd-flex align-items-center',
            render: function (data, type, row, meta) {
              var letters="";
              var fullname="";
              var email=row['email'];
              if(row['first_name']){
                letters+=String(row['first_name']).charAt(0);
                fullname+=row['first_name']+" ";
              }
              if(row['last_name']){
                letters+=String(row['last_name']).charAt(0);
                fullname+=row['last_name'];
              }
              fullname=$.trim(fullname);

              var avatar=`
              <div class="symbol-label fs-3 bg-light-danger text-danger">`+letters+`</div>
              `;

              if(row['image']){
                var avatar=`
                <div class="symbol-label">
                <img src="/assets/v8.1.5/media/avatars/300-6.jpg" alt="`+fullname+`" class="w-100" />
                </div>
                `;
              }

              return `
              <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
              <a href="#">
              `+avatar+`
              </a>
              </div>
              <div class="d-flex flex-column">
              <a href="#" class="text-gray-800 text-hover-primary mb-1">`+fullname+`</a>
              <span>`+email+`</span>
              </div>
              `;
            }
          },
          {
            targets: 2,
            orderable: false,
            searchable: false,
            render: function (data, type, row) {
              var phone='';
              if(row['phone'])
                phone=row['phone'];
              return phone;
            }
          },
          {
            targets: 3,
            orderable: false,
            searchable: false,
            render: function (data, type, row) {
              var last_login="";
              var tooltip   ="";

              if(row["last_login"]){
                last_login=moment(row["last_login"],"YYYY-MM-DD HH:mm:ss").fromNow();
                tooltip   =moment(row["last_login"],"YYYY-MM-DD HH:mm:ss").format(format_datetime_alt1_moment);
              }

              return `
              <div class="badge badge-light fw-bolder cursor-pointer"
              data-bs-toggle="tooltip"
              data-bs-placement="top"
              data-bs-custom-class="tooltip-dark"
              title="`+tooltip+`"
              >`+last_login+`</div>`;
            }
          },
          {
            targets: 4,
            orderable: false,
            searchable: false,
            render: function (data, type, row) {
              var created_at="";

              if(row["created_at"]){
                created_at=moment(row["created_at"],"YYYY-MM-DD HH:mm:ss").format(format_datetime_alt1_moment);
              }

              return created_at;
            }
          },
          {
            targets: -1,
            data: null,
            orderable: false,
            searchable: false,
            className: 'text-end link-accions col-w1',
            width: '1%',
            render: function (data, type, row, meta) {
                            //console.log(meta);
              return `
                <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary me-1" onclick="Users.edit('`+row["id"]+`','`+meta["row"]+`')">
                  <i class="ki-duotone ki-pencil fs-1">
                   <span class="path1"></span>
                   <span class="path2"></span>
                  </i>
                </a>
                <a href="#" class="btn btn-icon btn-bg-light btn-active-color-danger" onclick="Users.delete('`+row["id"]+`')">
                  <i class="ki-duotone ki-trash fs-1">
                   <span class="path1"></span>
                   <span class="path2"></span>
                   <span class="path3"></span>
                   <span class="path4"></span>
                   <span class="path5"></span>
                  </i>
                </a>
              `;
            },
          },
          ]
    });

    },

    search: function(){
      var me=this;
      var text=$('#datatable_search').val();
      $('#datatable_users').dataTable().fnFilter(text);
    },

    list: function(){
      var me=this;
      $(".module-form").css("display","none");
      $(".module-list").css("display","");
    },

    reset: function(){
      var me=this;
    //return;
      me.validator.resetForm()

      $(".user-image .image-input-wrapper").css('background-image',"url('"+me.default_image+"')");

      me.current_id=null;

      me.form.find("[name='image']").val("");
      me.form.find("[name='first_name']").val("");
      me.form.find("[name='last_name']").val("");
      me.form.find("[name='email']").val("");
      me.form.find("[name='phone']").val("");
      me.form.find("[name='password']").val("");
      me.form.find("[name='password_confirmation']").val("");
      me.form.find("[name='language']").val(me.default_language);
      me.form.find("[name='language']").trigger('change.select2');
      me.form.find("[name='timezone']").val(me.default_timezome);
      me.form.find("[name='timezone']").trigger('change.select2');
      me.form.find("[name='organizations']").prop("checked",false);
    },

    add: function(){
      var me=this;

      $(".module-list").css("display","none");
      $(".module-form").css("display","");
      //$(".module-form-subtitle").html("{{ __('New') }}");

      me.reset();
    },

    edit: function(id, index) {
      var me=this;
      me.reset();
      me.current_id=id;

      var data = $("#datatable_users").dataTable().api().data()[index];

      me.form.find("[name='first_name']").val(data['first_name']);
      me.form.find("[name='last_name']").val(data['last_name']);
      me.form.find("[name='email']").val(data['email']);
      me.form.find("[name='phone']").val(data['phone']);
      me.form.find("[name='password']").val("");
      me.form.find("[name='password_confirmation']").val("");
      me.form.find("[name='language']").val(data['language']);
      me.form.find("[name='language']").trigger('change.select2');
      me.form.find("[name='timezone']").val(data['timezone']);
      me.form.find("[name='timezone']").trigger('change.select2');

      var organizations=data['organizations'];
      for(var i=0; i<organizations.length; i++){
        if(organizations[i]["status"]!=1)
          continue;
        me.form.find("#checkbox-organization-"+organizations[i]["id"]).prop("checked",true);
      }

        //$(".module-form-subtitle").html("{{ __('Edit') }}");

      $(".module-list").css("display","none");
      $(".module-form").css("display","");
    },

    save: function(){
      var me=this;

      me.validator.revalidateField('password');
      me.validator.revalidateField('password_confirmation');

      me.validator.validate().then(function(status) {
        if(status == 'Valid') {
                      // Show loading indication
          me.btn_save.attr('data-kt-indicator', 'on');

                      // Disable button to avoid multiple click
          me.btn_save.prop('disabled',true);

          var _token                  = me.form.find("[name='_token']").val();
          var first_name              = me.form.find("[name='first_name']").val();
          var last_name               = me.form.find("[name='last_name']").val();
          var email                   = me.form.find("[name='email']").val();
          var phone                   = me.form.find("[name='phone']").val();
          var password                = me.form.find("[name='password']").val();
          var password_confirmation   = me.form.find("[name='password_confirmation']").val();
          var language                = me.form.find("[name='language']").val();
          var timezone                = me.form.find("[name='timezone']").val();
          var organizations = [];
          var tmp=$("[name='organizations']:checked");
          for(var i=0; i<tmp.length; i++){
            var value=$(tmp[i]).val();
            organizations.push(value);
          }

          var method="POST";
          var url="{{ url('api/users') }}";
          if(me.current_id){
            method="PATCH";
            url+="/"+me.current_id;
          }

          var data={
            _token:                 _token,
            first_name:             first_name,
            last_name:              last_name,
            email:                  email,
            phone:                  phone,
            language:               language,
            timezone:               timezone,
            organizations:          organizations,
          };

          if(password){
            data.password               = password;
            data.password_confirmation  = password_confirmation;
          }


          $.ajax({
            method: method,
            url: url,
            data: data,
            dataType: "json",
            cache: false,
          }).done(function(data){
            console.log(data);

                              // Hide loading indication
            me.btn_save.removeAttr('data-kt-indicator');
                              // Enable button
            me.btn_save.prop('disabled',false);

            if(data["success"]){
              if(data["message"]){
                toastr.success(data["message"], "Users - Save");
              }
              me.search();
              me.list();
              return;
            }


            toastr.error(data["message"], "Users");

          }).fail(function(data){
                              // Hide loading indication
            me.btn_save.removeAttr('data-kt-indicator');
                              // Enable button
            me.btn_save.prop('disabled',false);

            if(data && data.responseJSON && data.responseJSON.message){
              toastr.error(data.responseJSON.message, "Users - Save");
            }
            else{
              toastr.error("Fail Request", "Users - Save");
            }
          });

        } else {
          toastr.error("Sorry, looks like there are some errors detected, please try again.", "Users - Save");
        }
      });


    },

    delete: function(id){
      var me=this;

    },

    deleteConfirm: function(){
      var me=this;

    },


    };

    $(function() {
      Users.init();
    });
</script>
@endsection