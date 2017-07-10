 <?php
use yii\helpers\Url;
$this->title = 'Monitoring | Used Oil';
use richardfan\widget\JSRegister;
?>

<div class="ibox-title">
                <table id="tb" class="table table-striped table-hover" >
                    <thead>
                        <tr>
                        <th class="th_table">Actions</th>
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
setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('United Tractors', 'Welcome to Petrolab Client Report');

            }, 1300);

var tb=$("#tb").DataTable({
        "ajax": {
          "url": "<?php echo Url::toRoute('/monitoring/unit_no_history/action/get'); ?>",
          'type':'POST'
        },
        columnDefs:[
 { "width": "40px", "targets": 0 }
        ],
    columns: [
    {
        data:'grouploc',
        render:function(data,type,full,meta){
            return "<li class='dropdown list-none'><a href='#' class='btn btn-xs btn-outline btn-success dropdown-toggle count-info' data-toggle='dropdown'><i class='fa fa-bars'></i></a>"+'<ul class="dropdown-menu dropdown-alerts"><li><a href="mailbox.html"><div><i class="fa fa-eye"></i> View data</div></a></li><li><a href="mailbox.html"><div><i class="fa fa-eye"></i> Sample date <span class="badge badge-success">12</span></div></a></li><li><a href="mailbox.html"><div><i class="fa fa-eye"></i> Metering reading <span class="badge badge-success">12</span></div></a></li><li><a href="mailbox.html"><div><i class="fa fa-eye"></i> Lab Number <span class="badge badge-success">12</span></div></a></li></ul></li>';
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