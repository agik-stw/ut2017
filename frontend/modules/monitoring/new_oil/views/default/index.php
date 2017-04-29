 <?php
use yii\helpers\Url;
$this->title = 'Monitoring | Used Oil';
use richardfan\widget\JSRegister;
?>

<div class="ibox-title">
<div class="col-md-2 pull-left">
<div class="form-group">
  <label for="export">Option Export:</label>
  <select disabled="" class="form-control input-sm select2" id="export">
  <option disabled="" selected="" value="Select_Export">Select Export</option>
    <option value="pdf">PDF</option>
    <option value="excel">EXCEL</option>
  </select>
</div>
</div>

                <table id="tb_used_oil" class="table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th class="th_table">Group</th>
                            <th class="th_table">Branch</th>
                            <th class="th_table">Customer Name</th>
                            <th class="th_table">Lab Number</th>
                            <th class="th_table">Sample Date</th>
                            <th class="th_table">Receive Date</th>
                            <th class="th_table">Report Date</th>
                            <th class="th_table">Unit Number</th>
                            <th class="th_table">Component</th>
                            <th class="th_table">Model</th>
                            <th class="th_table">Serial No.</th>
                            <th class="th_table">Oil Chg</th>
                            <th class="th_table">Comp Chg</th>
                            <th class="th_table">FC</th>
                            <th class="th_table">MP</th>
                            <th class="th_table">Status</th>
                        </tr>
                    </thead>
                    <tbody>

                           
                                    </tbody>
                                </table>
                                </div>
            <div style="margin-top: 50px;"></div>

            <input type="hidden" name="labno" id="labno">

<?php JSRegister::begin(); ?>
<script>
var tb=$("#tb_used_oil").DataTable({
    language: {
        select: {
            rows: "%d rows selected"
        }
    },
    select: true,
     "paging": true,
     "bSort": false,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "responsive": true,
        "autoWidth": true,
        "ajax": {
          "url": "<?php echo Url::toRoute('/api/new_oil/getdata?token=itpetrolab');?>",
          'type':'POST'
        },
    columns: [
    {data:'grouploc'},
    {data:'branch'},
    {data:'customer_name'},
    {data:'lab_no'},
    {data:'sample_date'},
    {data:'receive_date'},
    {data:'report_date'},
    {data:'unit_number'},
    {data:'component_name'},
    {data:'model'},
    {data:'lab_no'},
    {data:'oil_change'},
    {data:'cmp'},
    {data:'filter_code'},
    {data:'mp'},
    {data:'eval_code'}
    ],
    "scrollY": 400,
        "scrollX": true,
        processing: true,
        serverSide: false,
        select: {
            style: 'single'
        },
        select: true,
     "rowCallback": function( row, data, index ) {
        /*alert(data.eval_code);*/
 if (data.eval_code=='Urgent') {
$('td', row).css('background-color', '#ff6666');
$('td', row).css('color', 'white');
 }else if(data.eval_code=='Attention'){
   $('td', row).css('background-color', '#ffa31a'); 
   $('td', row).css('color', 'white'); 
 }
}  
            
   
});

$('#tb_used_oil tbody').on( 'click', 'tr', function () {
var data=( tb.row( this ).data() );
/*alert(data.lab_no);*/
$("#labno").val(data.lab_no);
$("#export").removeAttr('disabled');

ymz.jq_toast({text:"Lab Number: "+data.lab_no+"", type: "notice", sec: 5});
});


$(".select2").select2();


$("#export").on('change',function(event) {
var type=$(this).val();
var labno=$("#labno").val();
window.open("<?php echo Url::toRoute('/monitoring/new_oil/action/report?type=');?>"+type+'&'+'labNumber='+labno,'_blank')
$("#export").val('Select_Export');
});


/*var table = $("#tb_used_oil").easyTable({
            hover:'btn-primary',
    buttons:false,
    select:true,
    sortable:false,
         });*/


</script>
<?php JSRegister::end(); ?>



<?php

$this->registerJsFile(
    '@web/modulejs/usedOil/controller.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

?>