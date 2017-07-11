 <?php
use yii\helpers\Url;
$this->title = 'Monitoring | Component Health';
use richardfan\widget\JSRegister;
use backend\assets\Angular;
Angular::register($this);
use backend\appjs\machine_health\Module as Machine_health;
Machine_health::register($this);
?>

<div class="ibox-title" ng-app="Machine_health" ng-controller="controller_machine_health">
<h3>Component Health</h3>
<div style="height: 2px; width: 100%; background-color: black;"></div>
<div class="row">

<div class="col-md-2 pull-left">
<div class="form-group">
  <label for="export">Select By:</label>
  <select class="form-control input-sm select2" id="select-date">
  <option ng-repeat="n in select_date" value="{{n.value}}">{{n.text}}</option>
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
 <button id="btn-refresh" class="btn btn-xs btn-default form-control" ng-click="btn_refresh()"><span class="glyphicon glyphicon-refresh"></span></button>
</div>
</div>
</div>

<!-- <div class="row">
<button id="btn_add" class="btn btn-sm th_table" style="margin-bottom: 5px;" ng-click="add()"><span class="glyphicon glyphicon-plus"></span>Add New</button>
</div> -->


<div class="row">
                <table id="tb_used_oil" class="table table-striped table-hover" >
                    <thead>
                        <tr>
                        <th class="th_table">Componen ID</th>
                        <th class="th_table">Component</th>
                        <th class="th_table">Model</th>
                            <th class="th_table">Unit ID</th>
                            <th class="th_table">Lab No</th>
                            <th class="th_table">Report 1</th>
                            <th class="th_table">Report 2</th>
                            <th class="th_table">Report 3</th>
                            <th class="th_table">Report 4</th>
                            <th class="th_table">Report 5</th>
                        </tr>
                    </thead>
                    <tbody>

                                    </tbody>
                                    <tfoot>
                                       <tr>
                        <th class="">Componen ID</th>
                        <th class="">Component</th>
                        <th class="">Model</th>
                            <th class="">Unit ID</th>
                            <th class="">Lab No</th>
                            <th class="">Report 1</th>
                            <th class="">Report 2</th>
                            <th class="">Report 3</th>
                            <th class="">Report 4</th>
                            <th class="">Report 5</th>
                        </tr>
                                    </tfoot>
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

<div style="display:none">
    <table id="detailsTable" class="table table-striped table-bordered table-sub">
    <caption>Component <span class="badge"><b class="jsonL">0</b></span></caption>
<thead>
<th class="th_table_sub">Id</th>
<th class="th_table_sub">Component</th>
<th class="th_table_sub">Report 1</th>
<th class="th_table_sub">Report 2</th>
<th class="th_table_sub">Report 3</th>
<th class="th_table_sub">Report 4</th>
<th class="th_table_sub">Report 5</th>
</thead>
<tbody>
  
</tbody>
</table>
</div>

<?php JSRegister::begin(); ?>
<script>
setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Component Health', 'Monitoring');

            }, 1300);
            
$('.datepicker').datepicker({
format: 'yyyy-mm-dd',
            });

//filter footer per kolom
 $('#tb_used_oil tfoot th')/*.not(":eq(0)")*/.each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" />' );
    } );

/*plugin datatables jquery*/
tb=$("#tb_used_oil").DataTable({

       "columnDefs": [
    { "width": "100px", "targets": 0 },
    { "width": "100px", "targets": 1 },
    { "width": "120px", "targets": 2 },
    { "width": "100px", "targets": 3 },
    { "width": "100px", "targets": 4 },
    { "width": "100px", "targets": 5 },
    { "width": "100px", "targets": 6 },
    { "width": "100px", "targets": 7 },
    { "width": "100px", "targets": 8 },
    { "width": "100px", "targets": 9 },
  ],
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
          "url": "<?php echo Url::toRoute('/monitoring/machine_health/action/get');?>",
          'type':'get'
        },
    columns: [
    {data:'UnitID'},
    {data:'UnitID'},
    {data:'Model'},
    {data:'Model'},
    {data:'UnitNo'},
     {
                /*"className":      'tgl1',*/
                /*"orderable":      false,*/
                "data":           'tgl1',
                "render": function ( data, type, full, meta ) {
                  if(data=='0000-00-00'){
                    return data;
                  }else{
return '<a target="_blank" href='+'"'+"<?php echo Url::toRoute('/monitoring/machine_health');?>"+'/report/pdf?u='+full.UnitID+'&m='+full.Model+'&t='+data+'&e='+full.ec1+'"'+'>'+data+'/'+full.ln1+'</a>';
                  }
    }
            },
            {
                /*"className":      '',*/
                /*"orderable":      false,*/
                "data":           'tgl2',
                "render": function ( data, type, full, meta ) {
                  if(data=='0000-00-00'){
                    return data;
                  }else{
      return '<a target="_blank" href='+'"'+"<?php echo Url::toRoute('/monitoring/machine_health');?>"+'/report/pdf?u='+full.UnitID+'&m='+full.Model+'&t='+data+'&e='+full.ec2+'"'+'>'+data+'/'+full.ln2+'</a>';
    }
  }
            },
            {
                /*"className":      '',*/
                /*"orderable":      false,*/
                "data":           'tgl3',
                "render": function ( data, type, full, meta ) {
                  if(data=='0000-00-00'){
                    return data;
                  }else{
      return '<a target="_blank" href='+'"'+"<?php echo Url::toRoute('/monitoring/machine_health');?>"+'/report/pdf?u='+full.UnitID+'&m='+full.Model+'&t='+data+'&e='+full.ec3+'"'+'>'+data+'/'+full.ln3+'</a>';
    }
  }
            },
            {
                /*"className":      '',*/
                /*"orderable":      false,*/
                "data":           'tgl4',
                "render": function ( data, type, full, meta ) {
                  if(data=='0000-00-00'){
                    return data;
                  }else{
      return '<a target="_blank" href='+'"'+"<?php echo Url::toRoute('/monitoring/machine_health');?>"+'/report/pdf?u='+full.UnitID+'&m='+full.Model+'&t='+data+'&e='+full.ec4+'"'+'>'+data+'/'+full.ln4+'</a>';
    }
  }
            },
            {
                /*"className":      '',*/
                /*"orderable":      false,*/
                "data":           'tgl5',
                "render": function ( data, type, full, meta ) {
                  if(data=='0000-00-00'){
                    return data;
                  }else{
      return '<a target="_blank" href='+'"'+"<?php echo Url::toRoute('/monitoring/machine_health');?>"+'/report/pdf?u='+full.UnitID+'&m='+full.Model+'&t='+data+'&e='+full.ec5+'"'+'>'+data+'/'+full.ln5+'</a>';
    }
  }
            }
    ],
    /*scrollY:'65vh',*/
        scrollCollapse: true,
        "scrollX": true,
        processing: true,
        serverSide: true,
        select: true,
  "rowCallback": function( row, data, index ) {
  if (data.ec1=='A') {
$(row).find('td:eq(5)').css('background-color', '#66ff33');
 }else if(data.ec1=='B'){
$(row).find('td:eq(5)').css('background-color', '#ffff00');
 }else if(data.ec1=='C'){
$(row).find('td:eq(5)').css('background-color', '#ff5c33');
 }
    if (data.ec2=='A') {
$(row).find('td:eq(6)').css('background-color', '#66ff33');
 }else if(data.ec2=='B'){
$(row).find('td:eq(6)').css('background-color', '#ffff00');
 }else if(data.ec2=='C'){
$(row).find('td:eq(6)').css('background-color', '#ff5c33');
 }

    if (data.ec3=='A') {
$(row).find('td:eq(7)').css('background-color', '#66ff33');
 }else if(data.ec3=='B'){
$(row).find('td:eq(7)').css('background-color', '#ffff00');
 }else if(data.ec3=='C'){
$(row).find('td:eq(7)').css('background-color', '#ff5c33');
 }
    if (data.ec4=='A') {
$(row).find('td:eq(8)').css('background-color', '#66ff33');
 }else if(data.ec4=='B'){
$(row).find('td:eq(8)').css('background-color', '#ffff00');
 }else if(data.ec4=='C'){
$(row).find('td:eq(8)').css('background-color', '#ff5c33');
 }

    if (data.ec5=='A') {
$(row).find('td:eq(9)').css('background-color', '#66ff33');
 }else if(data.ec5=='B'){
$(row).find('td:eq(9)').css('background-color', '#ffff00');
 }else if(data.ec5=='C'){
$(row).find('td:eq(9)').css('background-color', '#ff5c33');
 }

}

});

  // Apply the search
    tb.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );


/*fungsi jika table body di klik*/
/*$('#tb_used_oil tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = tb.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
            $("#detailsTable > tbody > tr").remove();
        }
    } );*/

/*tooltip plugin*/
$('#tb_used_oil tbody').attr({
  'data-toggle': 'tooltip',
  'title': 'Klik tanggal untuk lihat hasil'
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

function format ( d ) {

$("#detailsTable").attr('datatable','tb_'+d.UnitID);
table_detail=$("#detailsTable").html();
$.ajax({
  url: "<?php echo Url::toRoute('/monitoring/machine_health/action/component_by_unit_id');?>",
  type: 'GET',
  data: {unitID: d.UnitID},
})
.done(function(da) {

  //looping data dengan each
$.each(da,function(index, el) {
  $( "[datatable="+'tb_'+d.UnitID+"]" ).append('<tr>'+
'<td>'+el.ComponentID+'</td>'+
'<td>'+el.Component+'</td>'+
'<td>'+el.tgl1+'</td>'+
'<td>'+el.tgl2+'</td>'+
'<td>'+el.tgl3+'</td>'+
'<td>'+el.tgl4+'</td>'+
'<td>'+el.tgl5+'</td>'+
'</tr>');
});
$(".jsonL").html(da.length);
})
.fail(function() {
  console.log("error");
})
.always(function() {
  console.log("complete");
});

return table_detail;

}

//function refresh
function refresh(){
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
}

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

</script>
<?php JSRegister::end(); ?>
