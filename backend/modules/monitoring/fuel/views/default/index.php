 <?php
use yii\helpers\Url;
use app\components\Random;
$this->title = 'PCR | Fuel';
use richardfan\widget\JSRegister;
?>

<!--hidden id-->
<input type="hidden" id="typeSubmit" name="typeSubmit" value="">

<!-- Modal -->
<div class="modal inmodal" id="modal1" role="dialog" aria-hidden="true">
                                       <div class="modal-dialog modal-lg">
                                       <form id="form" enctype="multipart/form-data">
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


<div class="form-group">
    <label>Report id <b class="star">***{{aaa}}</b></label>
    <input id="report_id" type="text" placeholder="report id" name="report_id" class="form-control" value="" v-model="v_report_id">
</div>

                                                   <div class="form-group">
                                                       <label>Report Date</label>
                                                       <input type="text" placeholder="Report Date" class="form-control datepicker" id="report_date" name="report_date">
                                                   </div>
                                                   <div class="form-group">
                                                       <label>Receive Date</label>
                                                       <input type="text" placeholder="Receive Date" class="form-control datepicker" id="receive_date" name="receive_date">
                                                   </div>
                                                   <div class="form-group">
                                                       <label>Sample Date</label>
                                                       <input type="text" placeholder="Sample Date" class="form-control datepicker" id="sample_date" name="sample_date">
                                                   </div>
                                                   <div class="form-group">
                                                       <label>Group</label>
                                                       <input type="text" placeholder="Group" class="form-control" id="group" name="group">
                                                   </div>
<div class="form-group">
  <label>Customer</label>
  <select class="form-control" id="customer_name" name="customer_name">
  <option selected="" disabled="" value="select">Select</option>
  <?php foreach ($customers as $cust) { ?>
      <option value="<?php echo $cust['CustomerID']; ?>"><?php echo $cust['Name']; ?></option>
  <?php } ?>
  </select>
</div>
                                                   <div class="form-group">
  <label>Departement</label>
  <select class="form-control" id="departement" name="departement">
  <option selected="" disabled="" value="select">Select</option>
  <?php foreach ($departement as $dept) { ?>
      <option value="<?php echo $dept['departement_id']; ?>"><?php echo $dept['departement_name']; ?></option>
  <?php } ?>
  </select>
</div>



                                                   <div class="form-group">
                                                       <label>Lab Number</label>
                                                       <input type="text" placeholder="Lab Number" class="form-control" id="lab_number" name="lab_number">
                                                   </div>
                                                   <div class="form-group">
                                                       <label>Job Number</label>
                                                       <input type="text" placeholder="Job Number" class="form-control" id="job_number" name="job_number">
                                                   </div>
                                                   <div class="form-group">
                                                       <label>Detail of Sample</label>
                                                       <input type="text" placeholder="Detail Of Sample" class="form-control" id="detail_of_sample" name="detail_of_sample">
                                                   </div>
                                                   <div class="form-group">
                                                       <label>Target Lead Time</label>
                                                       <input type="text" placeholder="Target Lead Time" class="form-control" id="target_lead_time" name="target_lead_time">
                                                   </div>
                                                   <div class="form-group">
                                                       <label>Actual Lead Time</label>
                                                       <input type="text" placeholder="Actual Lead Time" class="form-control" id="actual_lead_time" name="actual_lead_time">
                                                   </div>
                                                   <div class="form-group">
                                                       <label>Alert</label>
                                                       <input type="text" placeholder="Alert" class="form-control" id="alert" name="alert">
                                                   </div>
                                                   <div class="form-group">
  <label for="sel1">File Pdf <b class="star">*** </b></label>
<input class="form-control" type="file" id="file_upload" accept=".pdf" name="file_upload" @change="onChange()">
</div>

                                               </div>
                                               <div class="modal-footer">
                                                   <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                   <button id="btn-save" type="submit" class="btn btn-primary">Submit</button>
                                               </div>
</div>
</form>
 </div>
 </div>
 <!--modal-->


<div class="ibox-title">
<h3>Fuel</h3>
<div style="height: 2px; width: 100%; background-color: black;"></div>
<div class="row">

<div class="col-md-2 pull-left">
<div class="form-group">
  <label for="export">Select By:</label>
  <select class="form-control input-sm select2" id="select-date">
  <option selected="" value="all_date">All Date</option>
    <option value="receive_date">Receive Date</option>
    <option value="sample_date">Sample Date</option>
    <option value="report_date">Report Date</option>
  </select>
</div>
</div>

<div class="col-md-4 pull-left">
<div class="form-group">
 <div class="form-group" id="daterange">
<label class="font-noraml">Range select</label>
<div class="input-daterange input-group">
 <input id="date1" type="text" class="input-sm form-control" placeholder="yyyy-mm-dd" name="start"/>
 <span class="input-group-addon">to</span>
<input id="date2" type="text" class="input-sm form-control" placeholder="yyyy-mm-dd" name="end"/>
</div>
</div>
</div>
</div>


<div class="col-md-1 pull-left">
<div class="form-group input-sm">
  <label></label>
 <button id="btn-refresh" class="btn btn-xs btn-default form-control"><span class="glyphicon glyphicon-refresh"></span></button>
</div>
</div>
</div>

<div class="row">
<button id="btn_add" class="btn btn-sm th_table" style="margin-bottom: 5px;"><span class="glyphicon glyphicon-plus"></span>Add New</button>
</div>


<div class="row">
                <table id="tb_used_oil" class="table table-striped table-hover" >
                    <thead>
                        <tr>
                        <th class="th_table">Action</th>
                        <th class="th_table">Report Id</th>
                            <th class="th_table">Group</th>
                            <th class="th_table">Branch</th>
                            <th class="th_table">Customer Name</th>
                            <th class="th_table">Lab Number</th>
                            <th class="th_table">Sample Date</th>
                            <th class="th_table">Receive Date</th>
                            <th class="th_table">Report Date</th>
                            <!-- <th class="th_table">Unit Number</th>
                            <th class="th_table">Component</th>
                            <th class="th_table">Model</th>
                            <th class="th_table">Serial No.</th>
                            <th class="th_table">Oil Chg</th>
                            <th class="th_table">Status</th> -->
                        </tr>
                    </thead>
                    <tbody>

                                    </tbody>
                                </table>
                                </div>

                                </div>
            <div style="margin-top: 50px;"></div>

            <input type="hidden" name="labno" id="labno">

<div class="contextMenu" id="myMenu1">
<ul>
<li id="open"><a id="ex_pdf" href="" target="_blank"><img src="<?php echo Url::base('').'/'.'img/rightclick/pdf.png';?>" /> PDF</a></li>
<li id="email"><img src="<?php echo Url::base('').'/'.'img/rightclick/excel.png';?>" /> Excel</li>
</ul>
</div>

<?php JSRegister::begin(); ?>
<script>
$('.datepicker').datepicker({
format: 'yyyy-mm-dd',
            });

/*plugin datatables jquery*/
var tb=$("#tb_used_oil").DataTable({

       "columnDefs": [
    { "width": "70px", "targets": 0 },
    { "width": "100px", "targets": 1 },
    { "width": "120px", "targets": 2 },
    { "width": "150px", "targets": 3 },
    { "width": "250px", "targets": 4 },
    { "width": "100px", "targets": 5 },
    { "width": "100px", "targets": 6 },
    { "width": "100px", "targets": 7 },
    { "width": "100px", "targets": 8 },
   /* { "width": "100px", "targets": 9 },
    { "width": "100px", "targets": 10},
    { "width": "100px", "targets": 11 },
    { "width": "60px", "targets": 12 },*/

  ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],
     "paging": true,
     "bSort": false,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "responsive": true,
        "autoWidth": true,
        "ajax": {
          "url": "<?php echo Url::toRoute('/monitoring/fuel/action/get');?>",
          'type':'get'
        },
    columns: [
    {
                "className":      'details-control',
                "orderable":      false,
                "data":           'report_id',
                /*"defaultContent": '<a href="#" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Please click row for save to PDF">PDF</a>'+'&nbsp;<a href="#" class="btn btn-xs btn-info" data-toggle="tooltip" title="Please click row for view data">View</a>',*/
                "render": function ( data, type, full, meta ) {
      return '<a class="btn btn-xs btn-success" data-toggle="tooltip" title="Edit" href="#" onclick="edit('+"'"+data+"'"+')"><span class="glyphicon glyphicon-pencil"></span></a>'+'&nbsp;<a class="btn btn-xs btn-info viewDetail" data-toggle="tooltip" title="Please click row for view data" href="#" onclick="view('+"'"+data+"'"+')"><span class="glyphicon glyphicon-eye-open"></span></a>'+'&nbsp;<a class="btn btn-xs btn-danger viewDetail" data-toggle="tooltip" title="Please click row for view data" href="#" onclick="deleteData('+"'"+data+"'"+')"><span class="glyphicon glyphicon-trash"></span></a>';
    }
            },
            {data:'report_id'},
    {data:'group'},
    {data:'Branch'},
    {data:'Name'},
    {data:'lab_number'},
    {data:'sample_date'},
    {data:'receive_date'},
    {data:'report_date'}/*,
    {data:'unit_number'},
    {data:'component_name'},
    {data:'model'},
    {data:'lab_no'},
    {data:'oil_change'},*/
   /* {data:'cmp'},
    {data:'filter_code'},
    {data:'mp'},*/
    /*{data:'eval_code'}*/
    ],
    scrollY:'65vh',
        scrollCollapse: true,
        "scrollX": true,
        processing: true,
        serverSide: true,
        select: {
            style: 'single'
        },
        select: true,
  "rowCallback": function( row, data, index ) {
    $(row).find('td:eq(0)').css('border-right', '2px solid red');
  /*  $(row).find('td:eq(0)').css('background-color', '60   #ffffb3');
 if (data.eval_code=='Urgent') {
$(row).find('td:eq(13)').css('color', '#0033cc');
 $(row).find('td:eq(13)').css('background-color', '#ff0000');
 $(row).find('td:eq(0)').css('border-right', '4px solid #ff0000');
 }else if(data.eval_code=='Attention'){
   $(row).find('td:eq(13)').css('color', '#0033cc');
   $(row).find('td:eq(13)').css('background-color', '#ffff33');
   $(row).find('td:eq(0)').css('border-right', '4px solid #ffff33');
 }else if(data.eval_code=='Normal'){
   $(row).find('td:eq(13)').css('color', '#0033cc');
   $(row).find('td:eq(13)').css('background-color', '#00ff00');
   $(row).find('td:eq(0)').css('border-right', '4px solid #00ff00');
 }else if(data.eval_code==' '){
   $(row).find('td:eq(13)').css('color', '#0033cc');
   $(row).find('td:eq(13)').css('background-color', '#00ff00');
   $(row).find('td:eq(0)').css('border-right', '4px solid #00ff00');
 }*/

}

});


/*fungsi jika table body di klik*/
$('#tb_used_oil tbody').on( 'click', 'tr', function () {
var data=( tb.row( this ).data() );
/*alert(data.lab_no);*/
$("#labno").val(data.lab_no);
$("#export").removeAttr('disabled');
/*ymz.jq_toast({text:"Lab Number: "+data.lab_no+"", type: "notice", sec: 1});*/

$("#ex_pdf").attr('href',"<?php echo Url::toRoute('/monitoring/used_oil/action/report?type=pdf');?>"+'&'+'labNumber='+data.lab_no)

$('#tb_used_oil tbody').contextMenu('myMenu1', {});

});

/*tooltip plugin*/
$('#tb_used_oil tbody').attr({
  'data-toggle': 'tooltip',
  'title': 'Klik Baris, Lalu Klik kanan akan muncul menu export PDF'
});

/*plugin select2 bootstrap*/
$(".select2").select2();

/*fungsi jika button export dirubah*/
$("#export").on('change',function(event) {
var type=$(this).val();
var labno=$("#labno").val();
window.open("<?php echo Url::toRoute('/monitoring/used_oil/action/report?type=');?>"+type+'&'+'labNumber='+labno,'_blank')
$("#export").val('Select_Export');
});


/*jika select tanggal di rubah maka kolom date di enable*/
$("#select-date").on('change',function(event) {
 dateEn();
});

/*fungsi klik button refresh*/
$("#btn-refresh").on('click',function(event) {
    var dateStart=$("#date1").val();
    var dateEnd=$("#date2").val();

   if ($("#select-date").val()=='all_date') {
tb.ajax.url( "<?php echo Url::toRoute('/monitoring/fuel/action/get');?>" ).load();
   }else if($("#select-date").val()=='receive_date'){
tb.ajax.url( "<?php echo Url::toRoute('/monitoring/fuel/action/getdata_by_receive_date?');?>"+'date1='+dateStart+'&date2='+dateEnd ).load();
   }else if($("#select-date").val()=='report_date'){
tb.ajax.url( "<?php echo Url::toRoute('/monitoring/fuel/action/getdata_by_report_date?');?>"+'date1='+dateStart+'&date2='+dateEnd ).load();
   }else if($("#select-date").val()=='sample_date'){
    tb.ajax.url( "<?php echo Url::toRoute('/monitoring/fuel/action/getdata_by_sample_date?');?>"+'date1='+dateStart+'&date2='+dateEnd ).load();

   }
});

/*panggil fungsi disable date untuk disable date*/
dateDis();

/*tampilkan modal tambah data baru*/
$('#btn_add').click(function(event) {
  $('#typeSubmit').val('add');
  clear();
  $('#modalTitle').html('Add new');
    $('#modal1').modal('show');
});

/*ajax serverSide tambah data baru*/
    $("#form").on('submit',(function(e) {
        e.preventDefault();
var typeSubmit=$('#typeSubmit').val();
        $.ajax({
            url: "<?php echo Url::toRoute('/monitoring/fuel/action/');?>/"+typeSubmit,
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(res)
            {
            swal(res.responses, res.message, res.status);
            $("#modal1").modal('hide');
            tb.ajax.url( "<?php echo Url::toRoute('/monitoring/fuel/api/get') ?>").load();
            $('#form input').val('');
            },
            error: function(e)
            {

            }
       });

    }));
</script>
<?php JSRegister::end(); ?>


<?php JSRegister::begin([
    'key' => 'bootstrap-modal',
    'position' => \yii\web\View::POS_END
]); ?>
<script>

    //modal//
function view(rid){
 window.open("<?php echo Url::toRoute('/monitoring/fuel/report/view?reportid=') ?>"+rid, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=50,width=1200,height=600");
}

    //modal//
function edit(reportid){
  $('#typeSubmit').val('edit');
  $.ajax({
    url: "<?php echo Url::toRoute('/monitoring/fuel/action/by_report_id?reportId=');?>"+reportid,
    type: 'GET',
    data: {reportid: reportid}
  })
  .done(function(data) {
    $('#report_id').val(data.report_id);
    $('#report_date').val(data.report_date);
    $('#receive_date').val(data.receive_date);
    $('#sample_date').val(data.sample_date);
    $('#group').val(data.group);
    $('#customer_name').val(data.customer_id);
    $('#departement').val(data.departement_id);
    $('#lab_number').val(data.lab_number);
    $('#job_number').val(data.Job_number);
    $('#detail_of_sample').val(data.detail_of_sample);
    $('#target_lead_time').val(data.target_lead_time);
    $('#actual_lead_time').val(data.actual_lead_time);
    $('#alert').val(data.Alert);

    console.log("complete");
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {

  });
$('#modalTitle').html('Edit Data');
$('#modal1').modal('show');
}
function deleteData(rid){
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
   url: '<?php echo Url::toRoute('/monitoring/fuel/api/delete')?>',
   type: 'GET',
   data: {report_id: rid}
 })
 .done(function(json) {
swal(json.responses, json.message, json.status);
window.location.reload();
 })
 .fail(function() {
   console.log("error");
 })
 .always(function() {
   console.log("complete");
 });

});
}


//clear modal
function clear(){
  $('#report_id').val("<?php echo Random::reportId(); ?>");
    $('#report_date').val("");
    $('#receive_date').val("");
    $('#sample_date').val("");
    $('#group').val("");
    $('#customer_name').val("select");
    $('#departement').val("select");
    $('#lab_number').val("");
    $('#job_number').val("");
    $('#detail_of_sample').val("");
    $('#target_lead_time').val("");
    $('#actual_lead_time').val("");
    $('#alert').val("");
}

$('#date1').datepicker({
format: 'yyyy-mm-dd',
            });
$('#date2').datepicker({
format: 'yyyy-mm-dd',
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


//vue validasi
var vm=new Vue({
el:'#modal1',
data:{
v_report_id:"<?php echo Random::reportId(); ?>",
v_file_upload:""
},
computed:{
  aaa:function(value){
    if (this.v_report_id=="") {
    alert('Report Id tidak boleh kosong');
return '  Report Id tidak boleh kosong';
  }
}
}
});

</script>
<?php JSRegister::end(); ?>
