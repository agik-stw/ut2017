 <?php
use yii\helpers\Url;
$this->title = 'PCR | Fuel';
use richardfan\widget\JSRegister;
?>



<div ng-app="">

<div class="ibox-title">

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
var tb=$("#tb_used_oil").DataTable({

       "columnDefs": [
    { "width": "30px", "targets": 0 },
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
          "url": "<?php echo Url::toRoute('/monitoring/fuel/action/getdata');?>",
          'type':'get'
        },
    columns: [
    {
                "className":      'details-control',
                "orderable":      false,
                "data":           'report_id',
                /*"defaultContent": '<a href="#" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Please click row for save to PDF">PDF</a>'+'&nbsp;<a href="#" class="btn btn-xs btn-info" data-toggle="tooltip" title="Please click row for view data">View</a>',*/
                "render": function ( data, type, full, meta ) {
      return '&nbsp;<a class="btn btn-xs btn-info viewDetail" data-toggle="tooltip" title="View or download Data" href="#" onclick="view('+"'"+data+"'"+')"><span class="glyphicon glyphicon-eye-open"></span></a>';
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
        serverSide: false,
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
 $("#date1").val("");
 $("#date2").val("");
});

$("#btn-refresh").on('click',function(event) {
    var dateStart=$("#date1").val();
    var dateEnd=$("#date2").val();

   if ($("#select-date").val()=='all_date') {
tb.ajax.url( "<?php echo Url::toRoute('/monitoring/fuel/action/getdata');?>").load();
   }else if($("#select-date").val()=='receive_date'){
tb.ajax.url( "<?php echo Url::toRoute('/monitoring/fuel/action/get_by_receive_date?');?>"+'date1='+dateStart+'&date2='+dateEnd ).load();
   }else if($("#select-date").val()=='report_date'){
tb.ajax.url( "<?php echo Url::toRoute('/monitoring/fuel/action/get_by_report_date?');?>"+'date1='+dateStart+'&date2='+dateEnd ).load();
   }else if($("#select-date").val()=='sample_date'){
tb.ajax.url( "<?php echo Url::toRoute('/monitoring/fuel/action/get_by_sample_date?');?>"+'date1='+dateStart+'&date2='+dateEnd ).load();
   }
});

dateDis();
</script>
<?php JSRegister::end(); ?>


<?php JSRegister::begin([
    'key' => 'bootstrap-modal',
    'position' => \yii\web\View::POS_END
]); ?>
<script>

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

    //modal//
function view(rid){
 window.open("<?php echo Url::toRoute('/monitoring/fuel/report/view?reportid=') ?>"+rid, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=50,width=1200,height=600");
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
  document.location="<?php echo Url::toRoute('/login/proces/logout'); ?>";
});
}

</script>
<?php JSRegister::end(); ?>
