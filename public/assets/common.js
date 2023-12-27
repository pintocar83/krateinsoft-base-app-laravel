toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toastr-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "2000",
    "timeOut": "5000",
    "extendedTimeOut": "2000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

format_date_moment="DD/MM/YYYY";
format_time_moment="HH:mm:ss";
format_datetime_moment="DD/MM/YYYY HH:mm:ss";
format_datetime_alt1_moment="DD MMM YYYY, HH:mm a";


function locale_selection(id){
    if(!id) return;
    var _token = $("[name='_token']").val();
    $.ajax({
        method: "PUT",
        url: "/locale/"+id,
        data: {
            _token: _token,
        },
        dataType: "json",
        cache: false,
    }).done(function(data){
        console.log(data);

        if(data["success"]){
            window.location.reload();
            return;
        }
    }).fail(function(){
        toastr.error("Fail Request", "Locale Selection");
    });

}