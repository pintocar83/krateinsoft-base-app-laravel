@extends('layout')

@section('title')
{{ __('Workgroups') }}
@endsection

@section('breadcrumb')
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
  <li class="breadcrumb-item text-muted">
    <a href="{{ url('/') }}" class="text-muted text-hover-primary">{{ __('Home') }}</a>
  </li>
  <li class="breadcrumb-item">
    <span class="bullet bg-gray-500 w-5px h-2px"></span>
  </li>
  <li class="breadcrumb-item text-muted">{{ __('Management') }}</li>
  <li class="breadcrumb-item">
    <span class="bullet bg-gray-500 w-5px h-2px"></span>
  </li>
  <li class="breadcrumb-item text-muted">{{ __('Workgroups') }}</li>
</ul>
@endsection

@section('actions')

@endsection

@section('content')
<div id="kt_app_content_container" class="app-container container-xxl">
  <div class="card module-list">
    <div class="card-header border-0 pt-6">
      <div class="card-title">
        <div class="d-flex align-items-center position-relative my-1">
          <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
            <span class="path1"></span>
            <span class="path2"></span>
          </i>
          <input type="text" id="datatable_search" data-kt-data-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="{{ __('Search') }}" />
        </div>
      </div>
      <div class="card-toolbar">
        <div class="d-flex justify-content-end" data-kt-data-table-toolbar="base">
          <button type="button" class="btn btn-primary" onclick="Workgroups.add()">
          <i class="ki-duotone ki-plus fs-2"></i>{{ __('Add') }}</button>
        </div>
        <div class="d-flex justify-content-end align-items-center d-none" data-kt-data-table-toolbar="selected">
          <div class="fw-bold me-5">
          <span class="me-2" data-kt-data-table-select="selected_count"></span>Selected</div>
          <button type="button" class="btn btn-danger" data-kt-data-table-select="delete_selected">Delete Selected</button>
        </div>
      </div>
    </div>
    <div class="card-body py-4">
      <table class="table align-middle table-row-dashed fs-6 gy-5" id="module_datatable">
        <thead>
          <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
            <th class="w-10px pe-2">
              <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#module_datatable .form-check-input" value="1" />
              </div>
            </th>
            <th class="min-w-225px">{{ __('Workgroup') }}</th>
            <th class="min-w-125px">{{ __('Description') }}</th>
            <th class="min-w-125px">{{ __('Connection Type') }}</th>
            <th class="min-w-125px">{{ __('Ip Address') }}</th>
            <th class="min-w-125px">{{ __('Created') }}</th>
            <th class="text-end min-w-100px">{{ __('Actions') }}</th>
          </tr>
        </thead>
        <tbody class="text-gray-600 fw-bold">
        </tbody>
      </table>
    </div>
  </div>
  <div class="card module-form" style="display: none;">
    <div class="card-header border-0 cursor-pointer" role="button">
      <div class="card-title m-0">
        <h2 class="fw-bolder m-0 d-flex align-items-center flex-wrap module-title">
          &nbsp;
        </h2>
      </div>
    </div>
    <div id="kt_account_profile_details" class="show">
      <form id="module_form" class="form" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="card-body border-top p-9">



          <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-bold fs-6 text-lg-end">{{ __("Picture") }}</label>
            <div class="col-lg-3">
              <div class="image-input image-input-empty module-image" data-kt-image-input="true">
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
              <div class="form-text">{{ __("Allowed file types: :types", ['types'=>"png, jpg, jpeg."]) }}</div>
            </div>

            <div class="col-lg-7">
              <div class="row mb-6">
                <label class="col-lg-8 col-form-label fw-bold fs-6 text-lg-end">{{ __("Main") }}</label>
                <div class="col-lg-4 fv-row d-flex align-items-center">
                  <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                    <input class="form-check-input " type="checkbox" value="" id="sw_main" onchange="Workgroups.changeMain()"/>
                    <label class="form-check-label fw-bold fs-4" for="sw_status" id="sw_main_label">
                      &nbsp;
                    </label>
                  </div>
                </div>
              </div>

              <div class="row mb-6">
                <label class="col-lg-8 col-form-label fw-bold fs-6 text-lg-end">{{ __("Status") }}</label>
                <div class="col-lg-4 fv-row d-flex align-items-center">
                  <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                    <input class="form-check-input " type="checkbox" value="" checked id="sw_status" onchange="Workgroups.changeStatus()"/>
                    <label class="form-check-label fw-bold fs-4" for="sw_status" id="sw_status_label">
                      &nbsp;
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-bold fs-6 text-lg-end">{{ __("Workgroup - Main Box") }}</label>
            <div class="col-lg-10 fv-row">
              <div class="row">
                <div class="col-lg-7 fv-row">
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="mdi mdi-layers-triple"></i>
                    </span>
                    <input type="text" name="name" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="tooltip-inverse" title="{{ __('Workgroup - Main Box') }}" class="form-control form-control-solid mb-lg-0" placeholder="{{ __('Name') }}" value="" />
                  </div>
                </div>
                <div class="col-lg-3 fv-row">
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="mdi mdi-pound"></i>
                    </span>
                    <input type="text" name="code" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="tooltip-inverse" title="{{ __('Code') }}" class="form-control form-control-solid mb-lg-0" placeholder="{{ __('Code') }}" value="" />
                  </div>
                </div>
                <div class="col-lg-2 fv-row">
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="mdi mdi-order-numeric-ascending"></i>
                    </span>
                    <input type="text" name="order" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="tooltip-inverse" title="{{ __('Order') }}" class="form-control form-control-solid mb-lg-0" placeholder="{{ __('Order') }}" value="" />
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-bold fs-6 text-lg-end"></label>
            <div class="col-lg-10 fv-row">
              <div class="input-group">
                <span class="input-group-text">
                  <i class="mdi mdi-card-text"></i>
                </span>
                <textarea type="text" name="description" class="form-control form-control-solid" placeholder="{{ __('Description') }}" value="" /></textarea>
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-bold fs-6 text-lg-end">{{ __("Connection") }}</label>
            <div class="col-lg-10 fv-row">

              <div class="row">
                <div class="col-lg-4 fv-row" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="tooltip-inverse" title="{{ __('Connection Type') }}">
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="mdi mdi-connection"></i>
                    </span>
                    <select name="connection_type" aria-label="{{ __('Select a connection type') }}" data-control="select2" data-placeholder="{{ __('Select a connection type') }}..." class="form-select form-select-solid form-select-lg">
                      <option value="">{{ __('Select a connection type') }}...</option>
                      <option value="tcp/ip">TCP/IP</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-8 fv-row">
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="mdi mdi-ip-network"></i>
                    </span>
                    <input type="text" name="ip_address" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="tooltip-inverse" title="{{ __('Ip Address') }}" class="form-control form-control-solid" placeholder="{{ __('Ip Address') }}" value="" autocomplete="one-time-code" />
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-bold fs-6 text-lg-end">{{ __("Address") }}</label>
            <div class="col-lg-10 fv-row">
              <div class="row">
                <div class="col-lg-4 fv-row">
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="mdi mdi-earth"></i>
                    </span>
                    <input type="text" name="address_country" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="tooltip-inverse" title="{{ __('Country') }}" class="form-control form-control-solid mb-lg-0" placeholder="{{ __('Country') }}" value="" />
                  </div>
                </div>
                <div class="col-lg-3 fv-row">
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="mdi mdi-map"></i>
                    </span>
                    <input type="text" name="address_state" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="tooltip-inverse" title="{{ __('State') }}" class="form-control form-control-solid mb-lg-0" placeholder="{{ __('State') }}" value="" />
                  </div>
                </div>
                <div class="col-lg-5 fv-row">
                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="mdi mdi-city"></i>
                    </span>
                    <input type="text" name="address_city" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="tooltip-inverse" title="{{ __('City') }}" class="form-control form-control-solid mb-lg-0" placeholder="{{ __('City') }}" value="" />
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-bold fs-6 text-lg-end"></label>
            <div class="col-lg-10 fv-row">
              <div class="input-group">
                <span class="input-group-text">
                  <i class="mdi mdi-map-marker-radius"></i>
                </span>
                <input type="text" name="address_line1" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="tooltip-inverse" title="{{ __('Address Line 1') }}" class="form-control form-control-solid" placeholder="{{ __('Address Line 1') }}" value="" autocomplete="one-time-code" />
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-bold fs-6 text-lg-end"></label>
            <div class="col-lg-10 fv-row">
              <div class="input-group">
                <span class="input-group-text">
                  <i class="mdi mdi-map-marker-radius"></i>
                </span>
                <input type="text" name="address_line2" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="tooltip-inverse" title="{{ __('Address Line 2') }}" class="form-control form-control-solid" placeholder="{{ __('Address Line 2') }}" value="" autocomplete="one-time-code" />
              </div>
            </div>
          </div>

          

        </div>

        <div class="card-footer d-flex justify-content-end py-6 px-9">
          <a class="btn btn-danger btn-active-light-primary me-2" href="#" onclick="Workgroups.list()">{{ __("Cancel") }}</a>
          <button type="button" class="btn btn-success" onclick="Workgroups.save()" id="module_save">
              <span class="indicator-label">{{ __("Save") }}</span>
              <span class="indicator-progress">{{ __('Please wait...') }}
              <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('stylesheet')
<style type="text/css">

</style>
@endsection

@section('scripts')
<script type="text/javascript">
var Workgroups={
  token: $("[name='_token']").val(),
  default_image: "{{ asset('image/image-input-not-found.png') }}",
  default_timezome: '',
  default_language: '',
  path_image: "{{ asset('storage/construvias/workgroups') }}",
  current_id: null,
  current_organization_id: '{{ session('Auth::organization')?->id }}',
  validator: null,
  form: null,

  init: function(){
    var me=this;
    //return;

    $(".module-image").css('background-image',"url('"+me.default_image+"')");
    $(".module-image .image-input-wrapper").css('background-image',"url('"+me.default_image+"')");

    $("#datatable_search").on("keyup", function(event){
      if(event.keyCode==13){
        me.search();
      }
    });

    me.form=$("#module_form");
    me.btn_save=$("#module_save");

    me.validator = FormValidation.formValidation(
      me.form.get(0),
      {
        fields: {
          'code': {
            validators: {
              notEmpty: {
                message: "{{ __('Code is required') }}"
              }
            }
          },
          'name': {
            validators: {
              notEmpty: {
                message: "{{ __('Name is required') }}"
              }
            }
          },
          'order': {
            validators: {
              callback: {
                callback: function(input) {
                  if(!input.value)
                    return {valid: false, message: "{{ __('Order is required') }}" };
                  if(!(input.value>0))
                    return {valid: false, message: "{{ __('Order must be numeric') }}" };
                  return true;
                }
              }
            }
          },
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

    me.dt = $("#module_datatable").DataTable({
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
        _token: me.token,
        url: "{{ url('api/workgroups') }}"
      },
      columns: [
        {data: 'id'},
        {data: 'code'},
        {data: 'description'},
        {data: 'conection_type'},
        {data: 'ip_address'},
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
            </div>
          `;
        }
      },
      {
        targets: 1,
        searchable: false,
        className: 'd-flex align-items-center',
        render: function (data, type, row, meta) {
          var letters="";
          var code=row['code'];
          var name=row['name'];
          var name_array=name.split(" ");
          if(row['name']){
            letters+=String(row['name']).charAt(0);
          }
          if(name_array[1]){
            letters+=String(name_array[1]).charAt(0);
          }

          var avatar=`
            <div class="symbol-label fs-3 bg-light-danger text-danger">`+letters+`</div>
          `;

          if(row['image']){
            var avatar=`
              <div class="symbol-label">
                <img src="`+me.path_image+"/thumbnail/"+row['image']+`" alt="`+name+`" class="w-100" />
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
             <a href="#" class="text-gray-600 text-hover-primary mb-1 fs-6">`+code+`</a>
             <span>`+name+`</span>
            </div>
          `;
        }
      },
      {
        targets: 2,
        orderable: false,
        searchable: false,
        render: function (data, type, row) {
          var description='';
          if(row['description'])
            description=row['description'];
          return description;
        }
      },
      {
        targets: 3,
        orderable: false,
        searchable: false,
        render: function (data, type, row) {
          var connection_type='';
          if(row['connection_type'])
            connection_type=row['connection_type'];
          return connection_type;
        }
      },
      {
        targets: 4,
        orderable: false,
        searchable: false,
        render: function (data, type, row) {
          return data;
        }
      },
      {
        targets: 5,
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
          return `
            <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary me-1" onclick="Workgroups.edit('`+row["id"]+`','`+meta["row"]+`')">
              <i class="ki-duotone ki-pencil fs-1">
               <span class="path1"></span>
               <span class="path2"></span>
              </i>
            </a>
            <a href="#" class="btn btn-icon btn-bg-light btn-active-color-danger" onclick="Workgroups.delete('`+row["id"]+`','`+meta["row"]+`')">
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
    $('#module_datatable').dataTable().fnFilter(text);
  },

  list: function(){
    var me=this;
    $(".module-form").css("display","none");
    $(".module-list").css("display","");
  },

  reset: function(){
    var me=this;

    $(".module-image .image-input-wrapper").css('background-image',"url('"+me.default_image+"')");

    me.current_id=null;

    me.form.find("[name='image']").val("");
    me.form.find("[name='code']").val("");
    me.form.find("[name='name']").val("");
    me.form.find("[name='description']").val("");
    me.form.find("[name='connection_type']").val("tcp/ip");
    me.form.find("[name='connection_type']").trigger('change.select2');
    me.form.find("[name='ip_address']").val("");
    me.form.find("[name='address_country']").val("");
    me.form.find("[name='address_state']").val("");
    me.form.find("[name='address_city']").val("");
    me.form.find("[name='address_line1']").val("");
    me.form.find("[name='address_line2']").val("");
    me.form.find("[name='order']").val("");

    me.form.find("#sw_main").prop("checked",false);
    me.form.find("#sw_status").prop("checked",true);

    me.changeMain();
    me.changeStatus();

    me.validator.resetForm();
  },

  add: function(){
    var me=this;

    me.reset();

    $(".module-list").css("display","none");
    $(".module-form").css("display","");
    $(".module-title").html("{{ __('Add') }}");

    $.ajax({
      method: "GET",
      url: "{{ url('api/workgroups/new') }}",
      dataType: "json",
      cache: false,
    }).done(function(data){
      //console.log(data);
      me.form.find("[name='code']").val(data['code']);
      me.form.find("[name='order']").val(data["order"]);

    }).fail(function(data){

    });
  },

  edit: function(id, index) {
    var me=this;
    me.reset();
    me.current_id=id;

    const data = $("#module_datatable").dataTable().api().data()[index];

    if(data['image']){
      $(".module-image .image-input-wrapper").css('background-image',"url("+me.path_image+"/"+data['image']+")");
    }

    me.form.find("[name='code']").val(data['code']);
    me.form.find("[name='name']").val(data['name']);
    me.form.find("[name='description']").val(data['description']);
    me.form.find("[name='connection_type']").val(data['connection_type']);
    me.form.find("[name='connection_type']").trigger('change.select2');
    me.form.find("[name='ip_address']").val(data['ip_address']);
    me.form.find("[name='address_country']").val(data["address_country"]);
    me.form.find("[name='address_state']").val(data["address_state"]);
    me.form.find("[name='address_city']").val(data["address_city"]);
    me.form.find("[name='address_line1']").val(data["address_line1"]);
    me.form.find("[name='address_line2']").val(data["address_line2"]);
    me.form.find("[name='order']").val(data["order"]);

    me.form.find("#sw_main").prop("checked",false);
    if(data["main"]=="1"){
      me.form.find("#sw_main").prop("checked",true);
    }

    me.form.find("#sw_status").prop("checked",false);
    if(data["status"]=="1"){
      me.form.find("#sw_status").prop("checked",true);
    }

    me.changeMain();
    me.changeStatus();

    $(".module-title").html("{{ __('Edit') }}");

    $(".module-list").css("display","none");
    $(".module-form").css("display","");
  },

  save: function(){
    var me=this;

    me.validator.validate().then(function(status) {
      if(status == 'Valid') {
        // Show loading indication
        me.btn_save.attr('data-kt-indicator', 'on');
        // Disable button to avoid multiple click
        me.btn_save.prop('disabled',true);

        var image                   = me.form.find("[name='image']").val() ? me.form.find("[name='image']")[0].files[0] : null;
        var code                    = me.form.find("[name='code']").val();
        var name                    = me.form.find("[name='name']").val();
        var description             = me.form.find("[name='description']").val();
        var connection_type         = me.form.find("[name='connection_type']").val();
        var ip_address              = me.form.find("[name='ip_address']").val();
        var address_country         = me.form.find("[name='address_country']").val();
        var address_state           = me.form.find("[name='address_state']").val();
        var address_city            = me.form.find("[name='address_city']").val();
        var address_line1           = me.form.find("[name='address_line1']").val();
        var address_line2           = me.form.find("[name='address_line2']").val();
        var order                   = me.form.find("[name='order']").val();
        var main                    = me.form.find("#sw_main").is(":checked")   ? "1" : "0";
        var status                  = me.form.find("#sw_status").is(":checked") ? "1" : "0";

        var _method="POST";
        var url="{{ url('api/workgroups') }}";
        if(me.current_id){
          _method="PATCH";
          url+="/"+me.current_id;
        }

        var data = new FormData();
        data.append('_token',           me.token);
        data.append('_method',          _method);
        data.append('code',             code);
        data.append('name',             name);
        data.append('description',      description);
        data.append('connection_type',  connection_type);
        data.append('ip_address',       ip_address);
        data.append('address_country',  address_country);
        data.append('address_state',    address_state);
        data.append('address_city',     address_city);
        data.append('address_line1',    address_line1);
        data.append('address_line2',    address_line2);
        data.append('order',            order);
        data.append('main',             main);
        data.append('status',           status);

        if(image){
          data.append('image',         image);
        }

        $.ajax({
          method: "POST",
          url: url,
          enctype: 'multipart/form-data',
          data: data,
          dataType: "json",
          processData: false,
          contentType: false,
          cache: false,
        }).done(function(data){
          // Hide loading indication
          me.btn_save.removeAttr('data-kt-indicator');
          // Enable button
          me.btn_save.prop('disabled',false);

          if(data["success"]){
            if(data["message"]){
              toastr.success(data["message"], "{{ __('Workgroups - Save') }}");
            }
            me.search();
            me.list();
            return;
          }
          toastr.error(data["message"], "Workgroups");
        }).fail(function(data){
          // Hide loading indication
          me.btn_save.removeAttr('data-kt-indicator');
          // Enable button
          me.btn_save.prop('disabled',false);

          if(data && data.responseJSON && data.responseJSON.message){
            toastr.error(data.responseJSON.message, "{{ __('Workgroups - Save') }}");
          }
          else{
            toastr.error("{{ __('Fail Request') }}", "{{ __('Workgroups - Save') }}" );
          }
        });

      } else {
        toastr.error("{{ __('Sorry, looks like there are some errors detected, please try again.') }}", "{{ __('Workgroups - Save') }}");
      }
    });


  },

  delete: function(id, index){
    var me=this;

    const data = $("#module_datatable").dataTable().api().data()[index];

    Swal.fire({
      html: `<h2>{{ __('Are you sure you want to delete?') }}</h2>`,
      icon: "question",
      buttonsStyling: false,
      showCancelButton: true,
      confirmButtonText: "Yes, delete!",
      cancelButtonText: 'No, cancel',
      customClass: {
          confirmButton: "btn fw-bold btn-danger",
          cancelButton: 'btn fw-bold btn-active-light-primary',
      }
    }).then(function(t) {
      if(t.isConfirmed){
        $.ajax({
          method: "DELETE",
          url: "{{ url('api/workgroups') }}",
          data: {
            _token: me.token,
            id: [id]
          },
          dataType: "json",
          cache: false,
        }).done(function(data){
          if(data["success"]){
            toastr.success(data["message"], "{{ __('Workgroups - Delete') }}");
            me.search();
            return;
          }
          toastr.error(data["message"], "{{ __('Workgroups - Delete') }}");

        }).fail(function(data){
          toastr.error("{{ __('Fail Request') }}", "{{ __('Workgroups - Delete') }}" );
        });
      }
    });

  },

  changeMain: function(){
    var me=this;

    var check = me.form.find("#sw_main").is(":checked");
    if(check){
      me.form.find("#sw_main_label").addClass("text-success");
      me.form.find("#sw_main_label").html("{{ __('Yes') }}");
    }
    else{
      me.form.find("#sw_main_label").removeClass("text-success");
      me.form.find("#sw_main_label").html("{{ __('No') }}");
    }
  },

  changeStatus: function(){
    var me=this;

    var check = me.form.find("#sw_status").is(":checked");
    if(check){
      me.form.find("#sw_status_label").addClass("text-success");
      me.form.find("#sw_status_label").html("{{ __('Enabled') }}");
    }
    else{
      me.form.find("#sw_status_label").removeClass("text-success");
      me.form.find("#sw_status_label").html("{{ __('Disabled') }}");
    }
  },

};

$(function() {
  Workgroups.init();
});
</script>
@endsection