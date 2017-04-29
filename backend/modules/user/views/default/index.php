<?php
use yii\helpers\Url;
$this->title = 'Admin | User';
use richardfan\widget\JSRegister;
?>
<input type="hidden" name="url" id="url" value="">

<!-- Modal -->
<div class="modal inmodal" id="modalDetail" tabindex="-1" role="dialog" aria-hidden="true">
                                       <div class="modal-dialog modal-lg">
                                           <div class="modal-content animated bounceInRight">
                                               <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal">
                                                       <span aria-hidden="true">&times;</span>
                                                       <span class="sr-only">Close</span>
                                                   </button>
                                                   <!--<i class="fa fa-laptop modal-icon"></i>-->
                                                   <h4 class="modal-title"><b id="modalTitle"></b></h4>
                                               </div>
                                               <div class="modal-body">
<div class="well" id="id_ref">
  <div class="row">
    <div class="col-md-2">
      <div class="form-group">
    <label for="sel1">By Admin</label>
    <select class="form-control" id="byadmin">
    <option value="" selected="">Select</option>
    <option value="admin">admin</option>
    </select>
    </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
    <label for="sel1">By HO</label>
    <select class="form-control" id="">
    <option disabled="" selected="">Select</option>
    <option value="ho">ho</option>
    </select>
    </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
    <label for="sel1">By Branch</label>
    <select class="form-control" id="bybranch">
    <option value="" selected="">Select</option>
    <?php foreach ($branch as $br) { ?>
  <option value="<?php echo $br->branch; ?>"><?php echo $br->branch; ?></option>
    <?php } ?>
    </select>
    </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
    <label for="sel1">By Customer</label>
    <select class="form-control" id="">
    <option disabled="" selected="">Select</option>
    <?php foreach ($customers as $cs) { ?>
  <option value="<?php echo $cs->CustomerID; ?>"><?php echo $cs->Name; ?></option>
    <?php } ?>
    </select>
    </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
    <label for="sel1">By FMC</label>
    <select class="form-control" id="">
    <option disabled="" selected="">Select</option>
    <option value="fmcpusat">fmcpusat</option>
    </select>
    </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
    <label for="sel1">By Site</label>
    <select class="form-control" id="">
    <option disabled="" selected="">Select</option>
    <option value="admin">admin</option>
    <option value="fmcpusat">fmcpusat</option>
    <option value="ho">ho</option>
    </select>
    </div>
    </div>
  </div>

</div>

<div class="form-group">
    <label>Data id</label>
    <input id="id_user" type="text" placeholder="id user" class="form-control">
</div>
                                                   <div class="form-group">
                                                       <label>Name</label>
                                                       <input type="text" placeholder="Name" class="form-control" id="nama">
                                                   </div>
                                                   <div class="form-group">
                                                       <label>Username</label>
                                                       <input type="text" placeholder="Username" class="form-control" id="username">
                                                   </div>
                                                   <div class="form-group">
                                                       <label>Password</label>
                                                       <input type="text" placeholder="Password" class="form-control" id="password">
                                                   </div>
                                                   <div class="form-group">
  <label for="sel1">Level</label>
  <select class="form-control" id="level">
    <option value="1" disabled="" selected="">Select</option>
    <?php foreach ($level as $lev) { ?>
<option value="<?php echo $lev->level_id; ?>"><?php echo $lev->user_level; ?></option>
    <?php } ?>
  </select>
</div>

                                               </div>
                                               <div class="modal-footer">
                                                   <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                   <button id="btn-save" type="button" class="btn btn-primary" onclick="Submit();">Submit</button>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
 <!--modal-->


<div ng-app="">

<div class="ibox-title">
<div class="col-md-1 form-group">
<button class="btn th_table btn-xs" onclick="Add();"><span class="glyphicon glyphicon-plus"></span>Add New</button>
</div>

               <table id="tb" class="table table-striped table-hover" >
                   <thead>
                       <tr>
                       <th class="th_table"></th>
                       <th class="th_table">Name</th>
                           <th class="th_table">id</th>
                           <th class="th_table">Username</th>
                           <th class="th_table">Password</th>
                           <th class="th_table">Level</th>
                           <th class="th_table">Status</th>
                       </tr>
                   </thead>
                   <tbody>

                                   </tbody>
                               </table>

                               </div>
           <div style="margin-top: 50px;"></div>

           <input type="hidden" name="labno" id="labno">

<div class="contextMenu" id="myMenu1">
<ul>
<li id="open"><a id="ex_pdf" href="" target="_blank"><img src="<?php echo Url::base('').'/'.'img/rightclick/pdf.png';?>" /> PDF</a></li>
<li id="email"><img src="<?php echo Url::base('').'/'.'img/rightclick/excel.png';?>" /> Excel</li>
</ul>
</div>

</div>

<?php JSRegister::begin(); ?>
<script>
var tb=$("#tb").DataTable({
  "columnDefs": [
   { "width": "40px", "targets": 0 },
 ],
  "ajax": {
           "url": "<?php echo Url::toRoute('/user/action/getdata')?>",
           'type':'GET'
         },
         columns: [
           {
              "className":      'details-control',
              "orderable":      false,
              "data":           'username',
              "render": function ( data, type, full, meta ) {
    return '&nbsp;<a class="btn-link viewDetail" data-toggle="tooltip" title="Please click row for view data" href="#" onclick="Edit('+"'"+data+"'"+')"><span class="glyphicon glyphicon-pencil"></span></a>'+'&nbsp;<a class="btn-link viewDetail" data-toggle="tooltip" title="Please click row for view data" href="#" onclick="Detail('+"'"+data+"'"+')"><span class="glyphicon glyphicon-eye-open"></span></a>'+'&nbsp;<a class="btn-link viewDetail" data-toggle="tooltip" title="Please click row for view data" href="#" onclick="Delete('+"'"+data+"'"+')"><span class="glyphicon glyphicon-trash"></span></a>';
  }
          },
   {data:'nama'},
   {data:'data_id'},
   {data:'username'},
   {data:'password2'},
   {data:'user_level'},
   {data:'status'}
   ]
});



$('#tb_used_oil tbody').on( 'click', 'tr', function () {
var data=( tb.row( this ).data() );
/*alert(data.lab_no);*/
$("#labno").val(data.lab_no);
$("#export").removeAttr('disabled');
/*ymz.jq_toast({text:"Lab Number: "+data.lab_no+"", type: "notice", sec: 1});*/

$("#ex_pdf").attr('href',"<?php echo Url::toRoute('/monitoring/used_oil/action/report?type=pdf');?>"+'&'+'labNumber='+data.lab_no)

$('#tb_used_oil tbody').contextMenu('myMenu1', {});

});


$('#tb_used_oil tbody').attr({
 'data-toggle': 'tooltip',
 'title': 'Klik Baris, Lalu Klik kanan akan muncul menu export PDF'
});


$(".select2").select2();


$("#export").on('change',function(event) {
var type=$(this).val();
var labno=$("#labno").val();
window.open("<?php echo Url::toRoute('/monitoring/used_oil/action/report?type=');?>"+type+'&'+'labNumber='+labno,'_blank')
$("#export").val('Select_Export');
});


$("#select-date").on('change',function(event) {
dateEn();
});

$("#btn-refresh").on('click',function(event) {
   var dateStart=$("#date1").val();
   var dateEnd=$("#date2").val();

  if ($("#select-date").val()=='all_date') {

  }else if($("#select-date").val()=='receive_date'){
tb.ajax.url( "<?php echo Url::toRoute('/monitoring/used_oil/action/getdata_by_date?');?>"+'date1='+dateStart+'&date2='+dateEnd ).load();
  }else if($("#select-date").val()=='report_date'){

  }else if($("#select-date").val()=='sample_date'){

  }
});

$("#byadmin").on('change', function(event) {
$("#id_user").val($(this).val()).css('color','#800000');
})
$("#bybranch").on('change', function(event) {
$("#id_user").val($(this).val()).css('color','#800000');
})

dateDis();
</script>
<?php JSRegister::end(); ?>


<?php JSRegister::begin([
   'key' => 'bootstrap-modal',
   'position' => \yii\web\View::POS_END
]); ?>
<script>

   //modal//
function Detail(username){
 $.ajax({
   url: '<?php echo Url::toRoute('/user/action/getdatabyid')?>',
   type: 'GET',
   data: {username: username}
 })
 .done(function(data) {
  $("#id_ref").hide();
  $("#btn-save").hide();
   var isi=JSON.parse(data);
$("#id_user").val(isi.data_id).css('color','#800000');
$("#nama").val(isi.nama).css('color','#800000');
$("#username").val(isi.username).css('color','#800000');
$("#password").val(isi.password2).css('color','#800000');
$("#level").val(isi.level_id).css('color','#800000');

 })
 .fail(function() {
   console.log("error");
 })
 .always(function() {
   console.log("complete");
 });

 $("#modalTitle").html('Detail Username : '+username).css('color','#800000');
 $("#modalDetail").modal('show');
}

function Edit(username){
 $.ajax({
   url: '<?php echo Url::toRoute('/user/action/getdatabyid')?>',
   type: 'GET',
   data: {username: username}
 })
 .done(function(data) {
  $("#id_ref").show();
  $("#btn-save").show();
   var isi=JSON.parse(data);
$("#id_user").val(isi.data_id).css('color','#800000');
$("#nama").val(isi.nama).css('color','#800000');
$("#username").val(isi.username).css('color','#800000');
$("#password").val(isi.password2).css('color','#800000');
$("#level").val(isi.level_id).css('color','#800000');

 })
 .fail(function() {
   console.log("error");
 })
 .always(function() {
   console.log("complete");
 });

 $("#modalTitle").html('Edit Username : '+username).css('color','#800000');
 $("#modalDetail").modal('show');
}

function Delete(username){
swal({
  title: "Are you sure?",
  text: "You will not be able to recover this imaginary file!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},
function(){
   $.ajax({
   url: '<?php echo Url::toRoute('/user/action/deletedata')?>',
   type: 'GET',
   data: {username: username}
 })
 .done(function(data) {
  var json=JSON.parse(data);

swal(json.responses, json.message, json.status);
 })
 .fail(function() {
   console.log("error");
 })
 .always(function() {
   console.log("complete");
   document.location="<?php echo  Url::current(['lg'=>NULL], TRUE); ?>";
 });
  
});
}

function Add(){
  $("#url").val("<?php echo Url::toRoute('/user/action/add_data')?>");
  $("#id_ref").show();
  $("#btn-save").show();
  $("#modalTitle").html('Add New').css('color','#800000');
 $("#modalDetail").modal('show');
 clear();
}

function Submit(){
  var url=$("#url").val();
 $.ajax({
   url: url,
   type: 'GET',
   data: {
    data_id: $("#id_user").val(),
    username: $("#username").val(),
    password: $("#password").val(),
    level: $("#level").val(),
    nama: $("#nama").val()
  }
 })
 .done(function(data) {
  var json=JSON.parse(data);
swal(json.responses, json.message, json.status);
 })
 .fail(function() {
   console.log("error");
 })
 .always(function(data) {
   console.log("complete");
document.location="<?php echo  Url::current(['lg'=>NULL], TRUE); ?>";
 });

}

function clear(){
 $("#id_user").val("").css('color','#800000');
$("#nama").val("").css('color','#800000');
$("#username").val("").css('color','#800000');
$("#password").val("").css('color','#800000');
$("#level").val("1").css('color','#800000').attr({
  selected: 'selected'
});
}

$('#date1').datepicker({
format: 'dd-mm-yyyy',
           });
$('#date2').datepicker({
format: 'dd-mm-yyyy',
           });

function dateDis(){
 $('#date1').attr({
     disabled: 'disabled'
 });
 $('#date2').attr({
     disabled: 'disabled'
 });
 $("#btn-refresh").attr({
     disabled: 'disabled'
 });
}

function dateEn(){
 $('#date1').removeAttr('disabled')
 $('#date2').removeAttr('disabled')
 $("#btn-refresh").removeAttr('disabled')
}

</script>
<?php JSRegister::end(); ?>
