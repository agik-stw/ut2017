function Logout(){
swal({
  title: "Are you sure?",
  text: "You will Logout",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes!",
  closeOnConfirm: false
},
function(){
  document.location='/login/proces/logout';
});
}

$.ajaxSetup({
beforeSend:function(){
HoldOn.open({
    theme:'sk-rect',
    message:"<h4>"+"Please Wait..."+"</h4>"
});
},
complete:function(){
    HoldOn.close();
}
});