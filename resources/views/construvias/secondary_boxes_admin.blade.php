@extends('layout')

@section('title')
{{ __('Secondary Boxes') }}
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
  <li class="breadcrumb-item text-muted">{{ __('Secondary Boxes') }}</li>
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
          <button type="button" class="btn btn-primary" onclick="Boxes.add()">
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
            <th class="min-w-225px">{{ __('Secondary Box') }}</th>
            <th class="min-w-125px">{{ __('Description') }}</th>
            <th class="min-w-125px">{{ __('Workgroup - Main Box') }}</th>
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
            <label class="col-lg-3 col-form-label fw-bold fs-6 text-lg-end">{{ __("Code") }}</label>
            <div class="col-lg-9 fv-row">
              <div class="row">
                <div class="col-lg-4 fv-row">
                  <input type="text" name="code" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="{{ __('Code') }}" value="" />
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-lg-3 col-form-label fw-bold fs-6 text-lg-end">{{ __("Name") }}</label>
            <div class="col-lg-9 fv-row">
              <input type="text" name="name" class="form-control form-control-solid" placeholder="{{ __('Name') }}" value="" autocomplete="one-time-code" />
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-lg-3 col-form-label fw-bold fs-6 text-lg-end">{{ __("Description") }}</label>
            <div class="col-lg-9 fv-row">
              <textarea type="text" name="description" class="form-control form-control-solid" placeholder="{{ __('Description') }}" value="" /></textarea>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-lg-3 col-form-label fw-bold fs-6 text-lg-end">{{ __("Ip Address") }}</label>
            <div class="col-lg-9 fv-row">
              <input type="text" name="ip_address" class="form-control form-control-solid" placeholder="{{ __('Ip Address') }}" value="" autocomplete="one-time-code" />
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-lg-3 col-form-label fw-bold fs-6 text-lg-end">{{ __("Order") }}</label>
            <div class="col-lg-9 fv-row">
              <div class="row">
                <div class="col-lg-4 fv-row">
                  <input type="number" name="order" min="1" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="{{ __('Order') }}" value="" />
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-lg-3 col-form-label fw-bold fs-6 text-lg-end">{{ __("Status") }}</label>
            <div class="col-lg-9 fv-row d-flex align-items-center">
              <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                <input class="form-check-input " type="checkbox" value="" checked id="sw_status" onchange="Boxes.changeStatus()"/>
                <label class="form-check-label fw-bold fs-4" for="sw_status" id="sw_status_label">
                  &nbsp;
                </label>
              </div>
            </div>
          </div>

        </div>

        <div class="card-footer d-flex justify-content-end py-6 px-9">
          <a class="btn btn-danger btn-active-light-primary me-2" href="#" onclick="Boxes.list()">{{ __("Cancel") }}</a>
          <button type="button" class="btn btn-success" onclick="Boxes.save()" id="module_save">
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
var Boxes={
  token: $("[name='_token']").val(),
  current_id: null,
  validator: null,
  form: null,

  init: function(){
    var me=this;

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
        url: "{{ url('api/boxes') }}"
      },
      columns: [
        {data: 'id'},
        {data: 'code'},
        {data: 'description'},
        {data: 'workgroup'},
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
          var workgroup='';
          
          return workgroup;
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
            <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary me-1" onclick="Boxes.edit('`+row["id"]+`','`+meta["row"]+`')">
              <i class="ki-duotone ki-pencil fs-1">
               <span class="path1"></span>
               <span class="path2"></span>
              </i>
            </a>
            <a href="#" class="btn btn-icon btn-bg-light btn-active-color-danger" onclick="Boxes.delete('`+row["id"]+`','`+meta["row"]+`')">
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

    me.current_id=null;

    me.form.find("[name='code']").val("");
    me.form.find("[name='name']").val("");
    me.form.find("[name='description']").val("");
    me.form.find("[name='ip_address']").val("");
    me.form.find("[name='order']").val("");

    me.form.find("#sw_status").prop("checked",true);

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
      url: "{{ url('api/boxes/new') }}",
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

    me.form.find("[name='code']").val(data['code']);
    me.form.find("[name='name']").val(data['name']);
    me.form.find("[name='description']").val(data['description']);
    me.form.find("[name='ip_address']").val(data['ip_address']);
    me.form.find("[name='order']").val(data["order"]);

    me.form.find("#sw_status").prop("checked",false);
    if(data["status"]=="1"){
      me.form.find("#sw_status").prop("checked",true);
    }

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

        var code                    = me.form.find("[name='code']").val();
        var name                    = me.form.find("[name='name']").val();
        var description             = me.form.find("[name='description']").val();
        var ip_address              = me.form.find("[name='ip_address']").val();
        var order                   = me.form.find("[name='order']").val();
        var status                  = me.form.find("#sw_status").is(":checked") ? "1" : "0";

        var _method="POST";
        var url="{{ url('api/boxes') }}";
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
        data.append('ip_address',       ip_address);
        data.append('order',            order);
        data.append('status',           status);

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
              toastr.success(data["message"], "{{ __('Seconday Boxes - Save') }}");
            }
            me.search();
            me.list();
            return;
          }
          toastr.error(data["message"], "Boxes");
        }).fail(function(data){
          // Hide loading indication
          me.btn_save.removeAttr('data-kt-indicator');
          // Enable button
          me.btn_save.prop('disabled',false);

          if(data && data.responseJSON && data.responseJSON.message){
            toastr.error(data.responseJSON.message, "{{ __('Seconday Boxes - Save') }}");
          }
          else{
            toastr.error("{{ __('Fail Request') }}", "{{ __('Seconday Boxes - Save') }}" );
          }
        });

      } else {
        toastr.error("{{ __('Sorry, looks like there are some errors detected, please try again.') }}", "{{ __('Seconday Boxes - Save') }}");
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
          url: "{{ url('api/boxes') }}",
          data: {
            _token: me.token,
            id: [id]
          },
          dataType: "json",
          cache: false,
        }).done(function(data){
          if(data["success"]){
            toastr.success(data["message"], "{{ __('Seconday Boxes - Delete') }}");
            me.search();
            return;
          }
          toastr.error(data["message"], "{{ __('Seconday Boxes - Delete') }}");

        }).fail(function(data){
          toastr.error("{{ __('Fail Request') }}", "{{ __('Seconday Boxes - Delete') }}" );
        });
      }
    });

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
  Boxes.init();
});
</script>
@endsection