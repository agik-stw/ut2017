<?php
$this->title='Utility | Import';
use richardfan\widget\JSRegister;
use yii\helpers\Url;
?>

<div class="container-fluid">
<div class="row">
<div class="ibox-title">
<h3>Import Data</h3>
<div style="height: 2px; width: 100%; background-color: black;"></div>
</div>
</div>

<div class="row">
<div class="col-md-6 panel panel-primary">
<h4 class="panel-heading">Import Data From Csv</h4>
<div class="panel-body">

<form id="formCsv" enctype="multipart/form-data">
<input type="hidden" name="type_import" value="csv">
<div class="form-group">
<label>Select Table</label>
<select class="form-control select2" name="table_name">
<option selected="" disabled="">Select</option>
<?php foreach ($table as $tb) { ?>
<option value="<?php echo $tb['Tables_in_ut_2015']; ?>"><?php echo $tb['Tables_in_ut_2015']; ?></option>
<?php } ?>
</select>
</div>
<div class="form-group">
<label>CSV File</label>
<input type="file" name="csv_file" class="form-control">
</div>
<button class="btn btn-primary btn-sm" type="submit" name="">Import data</button>
</form>

</div>
</div>

<div class="col-md-6 panel panel-info">
<h4 class="panel-heading">Import Data From sql</h4>
<div class="panel-body">

<form>
<div class="form-group">
<label>Select Table</label>
<select class="form-control select2">
	<option selected="" disabled="">Select</option>
<?php foreach ($table as $tb) { ?>
<option value="<?php echo $tb['Tables_in_ut_2015']; ?>"><?php echo $tb['Tables_in_ut_2015']; ?></option>
<?php } ?>
</select>
</div>
<div class="form-group">
<label>sql File</label>
<input type="file" name="" class="form-control">
</div>
<input class="btn btn-info btn-sm" type="submit" name="" value="Import data">
</form>

</div>
</div>
</div>

<div class="row">
<div class="ibox-title">
<h3>Import History</h3>
<div style="height: 2px; width: 100%; background-color: black;"></div>
<table id="tbImport" class="table table-striped">
	<thead>
	<th>Action</th>
		<th>File</th>
		<th>To Table</th>
		<th>Type File</th>
		<th>Time</th>
		<th>Import By</th>
	</thead>
	<tbody>
		
	</tbody>
</table>
<div style="margin-top: 20px;"></div>
</div>
</div>

</div>


<!--script menggunakan jquery-->
<?php JSRegister::begin(); ?>
<script>

    //table import history
    tb=$("#tbImport").DataTable({

       "columnDefs": [
    { "width": "50px", "targets": 0 },
    { "width": "100px", "targets": 1 },
    { "width": "120px", "targets": 2 },
    { "width": "150px", "targets": 3 },
    { "width": "250px", "targets": 4 },
    { "width": "100px", "targets": 5 },
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
          "url": "<?php echo Url::toRoute('/utility/import/get');?>",
          'type':'get'
        },
    columns: [
    {
                "className":      'details-control',
                "orderable":      false,
                "data":           'id',
                "render": function ( data, type, full, meta ) {
      return '<a class="btn btn-xs btn-success" data-toggle="tooltip" title="Download" href="#" onclick="downloadData('+"'"+data+"'"+')"><span class="glyphicon glyphicon-download-alt"></span></a>'+'&nbsp;<a class="btn btn-xs btn-danger viewDetail" data-toggle="tooltip" title="Delete" href="#" onclick="deleteData('+"'"+data+"'"+')"><span class="glyphicon glyphicon-trash"></span></a>';
    }
            },
            {data:'file'},
    {data:'to_table'},
    {data:'type_file'},
    {data:'date'},
    {data:'import_by'}
    ],
   /* scrollY:'65vh',
        scrollCollapse: true,
        "scrollX": true,*/
        processing: true,
        serverSide: false,
        select: {
            style: 'single'
        },
        select: true,
  "rowCallback": function( row, data, index ) {
    $(row).find('td:eq(0)').css('border-right', '2px solid red');
}

});

    //upload file dengan ajax(form csv)
    $("#formCsv").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo Url::toRoute('/utility/import/process/');?>",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(res)
            {
            swal(res.responses, res.message, res.status);
            },
            error: function(e)
            {

            },
            complete:function(){
tb.ajax.url( "<?php echo Url::toRoute('/utility/import/get');?>" ).load();
            }
       });

    }));


$('.select2').select2();
</script>
<?php JSRegister::end(); ?>


<!--script tanpa jquery-->
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

//logout
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

//hapus data
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
   url: '<?php echo Url::toRoute('/utility/import/delete')?>',
   type: 'POST',
   data: {id: rid}
 })
 .done(function(json) {
swal(json.responses, json.message, json.status);
tb.ajax.url( "<?php echo Url::toRoute('/utility/import/get');?>" ).load();
 })
 .fail(function() {
   console.log("error");
 })
 .always(function() {
   console.log("complete");
 });

});
}

//function untuk download file
function downloadData(rid){

	 window.open("<?php echo Url::toRoute('/utility/import/download?id=') ?>"+rid, "toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=50,width=1200,height=600");
}

//vuejs
var vm=new Vue({

});
</script>
<?php JSRegister::end(); ?>