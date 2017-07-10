 <?php
use yii\helpers\Url;
$this->title = 'Monitoring | Used Oil';
use richardfan\widget\JSRegister;
?>

<!--modal sample date -->
  <div class="modal inmodal fade" id="mdl_sample_date" tabindex="-1" role="dialog"  aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <span aria-hidden="true">&times;</span>
                                                        <span class="sr-only">Close</span>
                                                    </button>
                                                    <h4 class="modal-title">Modal title</h4>
                                                    <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                        <strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                                                printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                                                remaining essentially unchanged.
                                                    </p>
                                                    <p>
                                                        <strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                                                printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                                                remaining essentially unchanged.
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--modal sample date -->


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
                toastr.success('Unit Number History', 'Monitoring');

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
            return "<li class='dropdown list-none'><a href='#' class='btn btn-xs btn-outline btn-success dropdown-toggle count-info' data-toggle='dropdown'><i class='fa fa-bars'></i></a>"
            +'<ul class="dropdown-menu dropdown-alerts">'
            +'<li><a href="#"><div><i class="fa fa-eye"></i> View data</div></a></li>'
            +'<li><a href="Javascript:sample_date('+"'"+data+"'"+')"><div><i class="fa fa-eye"></i> Sample date <span class="badge badge-success">12</span></div></a></li>'
            +'<li><a href="mailbox.html"><div><i class="fa fa-eye"></i> Metering reading <span class="badge badge-success">12</span></div></a></li>'
            +'<li><a href="#"><div><i class="fa fa-eye"></i> Lab Number <span class="badge badge-success">12</span></div></a></li>'
            +'</ul></li>';
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
        ordering:false,
        select:true
            
});



$(".select2").select2();
</script>
<?php JSRegister::end(); ?>

<?php JSRegister::begin([
    'key' => 'bootstrap-modal',
    'position' => \yii\web\View::POS_END
]); ?>
<script>
 function sample_date(id){
    alert(id);
    $('#mdl_sample_date').modal('show');
 }   
</script>
<?php JSRegister::end(); ?>