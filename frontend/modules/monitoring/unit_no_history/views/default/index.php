 <?php
use yii\helpers\Url;
$this->title = 'Monitoring | Used Oil';
use richardfan\widget\JSRegister;
?>

<div class="ibox-title">
                <table id="tb" class="table table-striped table-hover" >
                    <thead>
                        <tr>
                        <th class="th_table">Options</th>
                            <th class="th_table">Grouploc</th>
                            <th class="th_table">Serial No</th>
                            <th class="th_table">Unit No</th>
                            <th class="th_table">Model</th>
                            <th class="th_table">Customer</th>
                            <th class="th_table">Component</th>
                            <th class="th_table">Eval Code</th>
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
var tb=$("#tb").DataTable({
        "ajax": {
          "url": "<?php echo Url::toRoute('/monitoring/unit_no_history/action/get'); ?>",
          'type':'POST'
        },
    columns: [
    {
        data:'grouploc',
        render:function(data,type,full,meta){
            return "<select class='select2'><option disabled selected>Select</option><option>Sample Date</option></select>";
        }
    },
    {data:'grouploc'},
    {data:'Serial_No'},
    {data:'Unit_No'},
    {data:'Model'},
    {data:'Customer'},
    {data:'Component'},
    {data:'Eval_Code'}
    ],
        processing: false,
        serverSide: true,
        ordering:false
            
});



$(".select2").select2();
</script>
<?php JSRegister::end(); ?>