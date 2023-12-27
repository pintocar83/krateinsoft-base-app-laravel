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
                message: 'First Name is required'
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
        url: "/api/users"
      },
      columns: [
        {data: 'id'},
        {data: 'first_name'},
        {data: 'phone'},
        {data: 'last_login'},                
        {data: ''},                
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
          return ''
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
      var url="/api/users";
      if(me.current_id){
        method="PATCH";
        url="/api/users/"+me.current_id;
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