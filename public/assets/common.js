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

function dragElement(elmnt) {
    var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
    if (elmnt.querySelector('.modal-content')) {
        // if present, the header is where you move the DIV from:
        elmnt.querySelector('.modal-content').onmousedown = dragMouseDown;
    } else {
        // otherwise, move the DIV from anywhere inside the DIV:
        elmnt.onmousedown = dragMouseDown;
    }

    function dragMouseDown(e) {
        e = e || window.event;
        e.preventDefault();
        // get the mouse cursor position at startup:
        pos3 = e.clientX;
        pos4 = e.clientY;
        document.onmouseup = closeDragElement;
        // call a function whenever the cursor moves:
        document.onmousemove = elementDrag;
    }

    function elementDrag(e) {
        e = e || window.event;
        e.preventDefault();
        // calculate the new cursor position:
        pos1 = pos3 - e.clientX;
        pos2 = pos4 - e.clientY;
        pos3 = e.clientX;
        pos4 = e.clientY;
        // set the element's new position:
        elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
        elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
    }

    function closeDragElement() {
        // stop moving when mouse button is released:
        document.onmouseup = null;
        document.onmousemove = null;
    }
}


$(()=>{
    document.querySelectorAll(".modal").forEach((el) => dragElement(el));
});