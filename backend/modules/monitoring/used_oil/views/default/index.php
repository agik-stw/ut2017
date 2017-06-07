 <?php
use yii\helpers\Url;
$this->title = 'PCR | Used Oil';
use richardfan\widget\JSRegister;
?>

 <!-- Modal -->
  <div class="modal fade" id="modalDetail" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Detail Lab Number <b id="Mtitle"></b></h3>
        </div>
        <div class="row col-md-12">

        <div class="col-md-6">   
        <ul class="list-group clear-list m-t">
                   <li class="list-group-item fist-item">
                                <span class="pull-right" id="grouploc"></span>
                                <span class="label label-success">1</span> GROUPLOC
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right" id="lab_no"></span>
                                <span class="label label-success">2</span> Lab No
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right" id="branch"></span>
                                <span class="label label-success">3</span> Branch
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right" id="cs_id"></span>
                                <span class="label label-success">4</span> customer id
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right" id="cs_name"></span>
                                <span class="label label-success">5</span> Name
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right" id="address"></span>
                                <span class="label label-success">6</span> address
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right" id="unit_id"></span>
                                <span class="label label-success">7</span> unit id
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right" id="unit_no"></span>
                                <span class="label label-success">8</span> UNIT NO
                            </li>
                        </ul>
        </div>

        <div class="col-md-6">
        <ul class="list-group clear-list m-t">
        <li class="list-group-item">
                                <span class="pull-right" id="model"></span>
                                <span class="label label-success">9</span> MODEL
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right" id="serial_no"></span>
                                <span class="label label-success">10</span> Serial Number
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right" id="oil_change"></span>
                                <span class="label label-success">11</span> Oil Change
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right" id="status"></span>
                                <span class="label label-success">12</span> Status
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right" id="receive_date"></span>
                                <span class="label label-success">13</span> Receive date
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right" id="sample_date"></span>
                                <span class="label label-success">14</span> Sample Date
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right" id="report_date"></span>
                                <span class="label label-success">15</span> Report date
                            </li>
                        </ul>
        </div>

        </div>
        <div class="row col-md-12"">
        <h3 class="modal-header">Lab Analisis</h3>

         <div class="col-md-12">
        <table class="table table-hover table-bordered table-condensed table-striped">
          <tr>
            <thead>
              <th width="120" class="th_table">Physical Test</th>
              <th width="100" class="th_table">Unit</th>
              <th width="120" class="th_table">Method</th>
              <th width="100" class="th_table">Value</th>
            </thead>
            <tbody>
            <tr>
            <td>Visc@40C (*)</td>
            <td>cSt</td>
            <td>ASTM D445-12</td>
            <td><b id="visc_40"></b></td><!-- Dynamic value -->
            </tr>
            <tr>
            <td>Visc@100C (*)</td>
            <td>cSt</td>
            <td>ASTM D445-12</td>
			<td><b id="visc_100"></b></td><!-- Dynamic value -->
            </tr>
            <tr>
            <td>TAN</td>
            <td>mg KOH/g</td>
            <td>ASTM D974-12</td>
			<td><b id="tan"></b></td><!-- Dynamic value -->
            </tr>
            <tr>
            <td>TBN</td>
            <td>mg KOH/g</td>
            <td>ASTM D2896-11</td>
			<td><b id="tbn"></b></td><!-- Dynamic value -->
            </tr>
            <thead>
              <th class="th_table">Metal Additive</th>
              <th width="100" class="th_table">Unit</th>
              <th width="120" class="th_table">Method</th>
              <th width="100" class="th_table">Value</th>
            </thead>
            <tr>
            <td>Magnesium (Mg)</td>
            <td>ppm</td>
            <td>ASTM D 5185-13e1</td>
            <td><b id="mg"></b></td><!-- Dynamic value -->
            </tr>
            <tr>
            <td>Calcium (Ca)</td>
            <td>ppm</td>
            <td>ASTM D 5185-13e1</td>
            <td><b id="ca"></b></td><!-- Dynamic value -->
            </tr>
            <tr>
            <td>Zinc (Zn)</td>
            <td>ppm</td>
            <td>ASTM D 5185-13e1</td>
            <td><b id="zn"></b></td><!-- Dynamic value -->
            </tr>
            <tr>
            <td>Boron</td>
            <td>ppm</td>
            <td>ASTM D5185-09</td>
            <td><b id="br"></b></td><!-- Dynamic value -->
            </tr>
            <tr>
            <td>Phosphor</td>
            <td>ppm</td>
            <td>ASTM D5185-09</td>
            <td><b id="psp"></b></td><!-- Dynamic value -->
            </tr>

            <thead>
              <th class="th_table">Contaminant</th>
              <th width="100" class="th_table">Unit</th>
              <th width="120" class="th_table">Method</th>
              <th width="100" class="th_table">Value</th>
            </thead>
            <tr>
            <td>Natrium (Na)</td>
            <td>ppm</td>
            <td>ASTM D 5185-13e1</td>
            <td><b id="na"></b></td><!-- Dynamic value -->
            </tr>
            <tr>
            <td>Silicon (Si)</td>
            <td>ppm</td>
            <td>ASTM D 5185-13e1</td>
            <td><b id="si"></b></td><!-- Dynamic value -->
            </tr>

            <thead>
              <th class="th_table">Wear Metal</th>
              <th width="100" class="th_table">Unit</th>
              <th width="120" class="th_table">Method</th>
              <th width="100" class="th_table">Value</th>
            </thead>
            <tr>
            <td>Iron (Fe)</td>
            <td>ppm</td>
            <td>ASTM D 5185-13e1</td>
            <td><b id="fe"></b></td><!-- Dynamic value -->
            </tr>
            <tr>
            <td>Copper (Cu)</td>
            <td>ppm</td>
            <td>ASTM D 5185-13e1</td>
            <td><b id="cu"></b></td><!-- Dynamic value -->
            </tr>
            <tr>
            <td>Alumunium (Al)</td>
            <td>ppm</td>
            <td>ASTM D 5185-13e1</td>
            <td><b id="al"></b></td><!-- Dynamic value -->
            </tr>
            <tr>
            <td>Chromium (Cr)</td>
            <td>ppm</td>
            <td>ASTM D 5185-13e1</td>
            <td><b id="crm"></b></td><!-- Dynamic value -->
            </tr>
            <tr>
            <td>Nickel (Ni)</td>
            <td>ppm</td>
            <td>ASTM D 5185-13e1</td>
            <td><b id="ni"></b></td><!-- Dynamic value -->
            </tr>
            <tr>
            <td>Tin (Sn)</td>
            <td>ppm</td>
            <td>ASTM D 5185-13e1</td>
            <td><b id="sn"></b></td><!-- Dynamic value -->
            </tr>
            <tr>
            <td>Lead (Pb)</td>
            <td>ppm</td>
            <td>ASTM D 5185-13e1</td>
            <td><b id="pb"></b></td><!-- Dynamic value -->
            </tr>
            <tr>
            <td>PQ Index</td>
            <td></td>
            <td></td>
            <td><b id="pq"></b></td><!-- Dynamic value -->
            </tr>
            <tr>
            <td>Color</td>
            <td></td>
            <td></td>
            <td><b id="clr"></b></td><!-- Dynamic value -->
            </tr>

            <thead>
              <th class="th_table">FTIR</th>
              <th width="100" class="th_table">Unit</th>
              <th width="120" class="th_table">Method</th>
              <th width="100" class="th_table">Value</th>
            </thead>
            <tr>
            <td>Soot</td>
            <td>Abs/cm</td>
            <td>ASTM E2412-10</td>
            <td><b id="soot"></b></td><!-- Dynamic value -->
            </tr>
            <tr>
            <td>Oxidation</td>
            <td>Abs/cm</td>
            <td>ASTM E2412-10</td>
            <td><b id="ox"></b></td><!-- Dynamic value -->
            </tr>
            <tr>
            <td>Nitration</td>
            <td>Abs/cm</td>
            <td>ASTM E2412-10</td>
            <td><b id="nt"></b></td><!-- Dynamic value -->
            </tr>
            <tr>
            <td>Sulfation</td>
            <td>Abs/cm</td>
            <td>ASTM E2412-10</td>
            <td><b id="sf"></b></td><!-- Dynamic value -->
            </tr>
            <tr>
            <td>Fuel Dilution</td>
            <td>ppm</td>
            <td>ASTM E2412-10</td>
            <td><b id="fl"></b></td><!-- Dynamic value -->
            </tr>
            <tr>
            <td>Water Content</td>
            <td>ppm</td>
            <td>ASTM E2412-10</td>
            <td><b id="wc"></b></td><!-- Dynamic value -->
            </tr>
            <tr>
            <td>Glycol</td>
            <td>ppm</td>
            <td>ASTM E2412-10</td>
            <td><b id="gy"></b></td><!-- Dynamic value -->
            </tr>

            <thead>
              <th class="th_table">Cleanliness</th>
              <th width="100" class="th_table">Unit</th>
              <th width="120" class="th_table">Method</th>
              <th width="100" class="th_table">Value</th>
            </thead>
            <tr>
            <td>4 um</td>
            <td>Particles/ml</td>
            <td></td>
            <td><b id="4um"></b></td><!-- Dynamic value -->
            </tr>
            <tr>
            <td>6 um</td>
            <td>Particles/ml</td>
            <td></td>
            <td><b id="6um"></b></td><!-- Dynamic value -->
            </tr>
            <tr>
            <td>14 um</td>
            <td>Particles/ml</td>
            <td></td>
            <td><b id="14um"></b></td><!-- Dynamic value -->
            </tr>
            <tr>
            <td>ISO CODE</td>
            <td>-</td>
            <td>ISO 4406</td>
            <td><b id="cd"></b></td><!-- Dynamic value -->
            </tr>
<thead>
    <th colspan="4" class="th_table">Source of Abnormality</th>
</thead>
<tr>
    <td colspan="4"><b id="rec1"></b></td>
</tr>
<thead>
    <th colspan="4" class="th_table">Action to be taken</th>
</thead>
<tr>
    <td colspan="4"><b id="rec2"></b></td>
</tr>
            </tbody>
          </tr>
        </table>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!--modal-->


  <!--modal edit-->
  <div class="modal fade" id="modal_edit" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data</h4>
        </div>
        <div class="modal-body">

        
          <form>
          <h3>General</h3>
          <div style="width: 100%; height: 2px; background-color: black;"></div>
<div class="row">
          <div class="col-md-6">
              <div class="form-group">
              <label>Grouploc</label>
              <input type="text" class="form-control" name="edit_grouploc" id="edit_grouploc">
              </div>

              <div class="form-group">
              <label>Lab Number</label>
              <input type="text" class="form-control" name="edit_lab_no" id="edit_lab_no">
              </div>

              <div class="form-group">
              <label>Branch</label>
              <input type="text" class="form-control" name="edit_branch" id="edit_branch">
              </div>

              <div class="form-group">
              <label>Customer Id</label>
              <input type="text" class="form-control" name="edit_customer_id" id="edit_customer_id">
              </div>

              <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" name="edit_name" id="edit_name">
              </div>

              <div class="form-group">
              <label>Address</label>
              <input type="text" class="form-control" name="edit_address" id="edit_address">
              </div>

              <div class="form-group">
              <label>Unit id</label>
              <input type="text" class="form-control" name="edit_unit_id" id="edit_unit_id">
              </div>

              <div class="form-group">
              <label>Unit No</label>
              <input type="text" class="form-control" name="edit_unit_no" id="edit_unit_no">
              </div>
              </div>

              <div class="col-md-6">
              <div class="form-group">
              <label>Model</label>
              <input type="text" class="form-control" name="edit_model" id="edit_model">
              </div>

              <div class="form-group">
              <label>Serial Number</label>
              <input type="text" class="form-control" name="edit_serial_number" id="edit_serial_number">
              </div>

              <div class="form-group">
              <label>Oil Change</label>
              <input type="text" class="form-control" name="edit_oil_change" id="edit_oil_change">
              </div>

              <div class="form-group">
              <label>Status</label>
              <input type="text" class="form-control" name="edit_status" id="edit_status">
              </div>

               <div class="form-group">
              <label>Receive Date</label>
              <input type="text" class="form-control" name="edit_receive_date" id="edit_receive_date">
              </div>

               <div class="form-group">
              <label>Sample Date</label>
              <input type="text" class="form-control" name="edit_sample_date" id="edit_sample_date">
              </div>

               <div class="form-group">
              <label>Report Date</label>
              <input type="text" class="form-control" name="edit_report_date" id="edit_report_date">
              </div>
              </div>

              </div>

              <h3>Lab Analysis</h3>
<div style="width: 100%; height: 2px; background-color: black;"></div>
              <div class="row">
          <div class="col-md-6">
              <div class="form-group">
              <label>Visc@40C (*)</label>
              <input type="text" class="form-control" name="edit_visc_40" id="edit_visc_40">
              </div>

              <div class="form-group">
              <label>Visc@100C (*)</label>
              <input type="text" class="form-control" name="edit_visc_100" id="edit_visc_100">
              </div>

              <div class="form-group">
              <label>TAN</label>
              <input type="text" class="form-control" name="edit_tan" id="edit_tan">
              </div>

              <div class="form-group">
              <label>TBN</label>
              <input type="text" class="form-control" name="edit_tbn" id="edit_tbn">
              </div>

              <div class="form-group">
              <label>Magnesium (Mg)</label>
              <input type="text" class="form-control" name="edit_magnesium" id="edit_magnesium">
              </div>

              <div class="form-group">
              <label>Address</label>
              <input type="text" class="form-control" name="edit_address" id="edit_address">
              </div>

              <div class="form-group">
              <label>Unit id</label>
              <input type="text" class="form-control" name="edit_unit_id" id="edit_unit_id">
              </div>
              </div>

              <div class="col-md-6">
              <div class="form-group">
              <label>Model</label>
              <input type="text" class="form-control" name="edit_model" id="edit_model">
              </div>

              <div class="form-group">
              <label>Serial Number</label>
              <input type="text" class="form-control" name="edit_serial_number" id="edit_serial_number">
              </div>

              <div class="form-group">
              <label>Oil Change</label>
              <input type="text" class="form-control" name="edit_oil_change" id="edit_oil_change">
              </div>

              <div class="form-group">
              <label>Status</label>
              <input type="text" class="form-control" name="edit_status" id="edit_status">
              </div>

               <div class="form-group">
              <label>Receive Date</label>
              <input type="text" class="form-control" name="edit_receive_date" id="edit_receive_date">
              </div>

               <div class="form-group">
              <label>Sample Date</label>
              <input type="text" class="form-control" name="edit_sample_date" id="edit_sample_date">
              </div>

               <div class="form-group">
              <label>Report Date</label>
              <input type="text" class="form-control" name="edit_report_date" id="edit_report_date">
              </div>
              </div>

              </div>
          </form>
          

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success">Submit</button>
        </div>
      </div>
    </div>
  </div>
  <!--modal edit-->


<div ng-app="">

<div class="ibox-title">
<h3>Used Oil</h3>
<div style="height: 2px; width: 100%; background-color: black;"></div>

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
 <input id="date1" type="text" class="input-sm form-control" placeholder="00-00-0000" name="start"/>
 <span class="input-group-addon">to</span>
<input id="date2" type="text" class="input-sm form-control" placeholder="00-00-0000" name="end"/>
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

<div class="col-md-2 pull-left">
<div class="form-group">
  <label for="export">Option Export:</label>
  <select disabled="" class="form-control input-sm select2" id="export">
  <option disabled="" selected="" value="Select_Export">Select Export</option>
    <?php
    foreach ($export as $key) {
        echo $key['exp'];
    }
    ?>
  </select>
</div>
</div>


                <table id="tb_used_oil" class="table table-striped table-hover" >
                    <thead>
                        <tr>
                        <th class="th_table">Actions</th>
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
                            <th class="th_table">Status</th>
                        </tr>
                    </thead>
                    <tfoot>
            <tr>
                <th class=""></th>
                            <th class="">Group</th>
                            <th class="">Branch</th>
                            <th class="">Customer Name</th>
                            <th class="">Lab Number</th>
                            <th class="">Sample Date</th>
                            <th class="">Receive Date</th>
                            <th class="">Report Date</th>
                            <th class="">Unit Number</th>
                            <th class="">Component</th>
                            <th class="">Model</th>
                            <th class="">Serial No.</th>
                            <th class=""></th>
                            <th class=""></th>
            </tr>
        </tfoot>

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
//filter footer per kolom
 $('#tb_used_oil tfoot th').not(":eq(0),:eq(12),:eq(13)").each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" />' );
    } );

var tb=$("#tb_used_oil").DataTable({

       "columnDefs": [
    { "width": "140px", "targets": 0 },
    { "width": "80px", "targets": 1 },
    { "width": "150px", "targets": 2 },
    { "width": "250px", "targets": 3 },
    { "width": "100px", "targets": 4 },
    { "width": "100px", "targets": 5 },
    { "width": "100px", "targets": 6 },
    { "width": "100px", "targets": 7 },
    { "width": "100px", "targets": 8 },
    { "width": "100px", "targets": 9 },
    { "width": "100px", "targets": 10},
    { "width": "100px", "targets": 11 },
    { "width": "60px", "targets": 12 },

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
          "url": "<?php echo Url::toRoute('/monitoring/used_oil/action/getdata');?>",
          'type':'get'
        },
    columns: [
    {
                "className":      'details-control',
                "orderable":      false,
                "data":           'Lab_No',
                /*"defaultContent": '<a href="#" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Please click row for save to PDF">PDF</a>'+'&nbsp;<a href="#" class="btn btn-xs btn-info" data-toggle="tooltip" title="Please click row for view data">View</a>',*/
                "render": function ( data, type, full, meta ) {
      return '<a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Please click row for save to PDF" target="_blank" href="'+"<?php echo Url::toRoute('/monitoring/used_oil/action/report?type=pdf&labNumber='); ?>"+data+'">PDF</a>'+'&nbsp;<a class="btn btn-xs btn-info viewDetail" data-toggle="tooltip" title="Please click row for view data" href="#" onclick="Detail('+"'"+data+"'"+')">View</a>'+'&nbsp;<a class="btn btn-xs btn-success viewDetail" data-toggle="tooltip" title="Please click row for view data" href="#" onclick="edit('+"'"+data+"'"+')">Edit</a>'+'&nbsp;<a class="btn btn-xs btn-warning viewDetail" data-toggle="tooltip" title="Please click row for view data" href="#" onclick="Delete('+"'"+data+"'"+')">Del</a>';
    }
            },
    {data:'grouploc'},
    {data:'branch'},
    {data:'name'},
    {data:'Lab_No'},
    {data:'SAMPL_DT1'},
    {data:'RECV_DT1'},
    {data:'RPT_DT1'},
    {data:'UNIT_NO'},
    {data:'COMPONENT'},
    {data:'MODEL'},
    {data:'Lab_No'},
    {data:'oil_change'},
    {
                "className":      'details-control',
                "orderable":      true,
                "data":           'EVAL_CODE',
                "render": function ( data, type, full, meta ) {
                    //status code
if(data=='N'){
return 'Normal';
}else if(data=='B'){
return 'Attention';
}else if(data=='C'){
return 'Urgent';
}else{
  return 'Normal';  
}
    }
            }
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
   $(row).find('td:eq(0)').css('background-color', '60   #ffffb3');
        /*alert(data.eval_code);*/
 if (data.EVAL_CODE=='C') {
/*$('td', row).css('background-color', '#ff6666');*/
$(row).find('td:eq(13)').css('color', '#0033cc');
 $(row).find('td:eq(13)').css('background-color', '#ff0000');
 $(row).find('td:eq(0)').css('border-right', '4px solid #ff0000');
 }else if(data.EVAL_CODE=='B'){
  /* $('td', row).css('background-color', '#ffa31a'); */
   $(row).find('td:eq(13)').css('color', '#0033cc');
   $(row).find('td:eq(13)').css('background-color', '#ffff33');
   $(row).find('td:eq(0)').css('border-right', '4px solid #ffff33');
 }else if(data.EVAL_CODE=='N'){
  /* $('td', row).css('background-color', '#ffa31a'); */
   $(row).find('td:eq(13)').css('color', '#0033cc');
   $(row).find('td:eq(13)').css('background-color', '#00ff00');
   $(row).find('td:eq(0)').css('border-right', '4px solid #00ff00');
 }else/*(data.EVAL_CODE=='')*/{
/*   $('td', row).css('background-color', '#ffa31a'); */
   $(row).find('td:eq(13)').css('color', '#0033cc');
   $(row).find('td:eq(13)').css('background-color', '#00ff00');
   $(row).find('td:eq(0)').css('border-right', '4px solid #00ff00');
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

//function edit data
function edit(labNumber){
  $.ajax({
    url: '<?php echo Url::toRoute("/monitoring/used_oil/action/getdata_by_labnumber");?>',
    type: 'GET',
    data: {labNumber: labNumber}
  })
  .done(function(isi) {
$("#edit_grouploc").val(isi.grouploc).css('color','#800000');
$("#edit_lab_no").val(isi.Lab_No).css('color','#800000');
$("#edit_branch").val(isi.branch).css('color','#800000');
$("#edit_customer_id").val(isi.customer_id).css('color','#800000');
$("#edit_name").val(isi.name).css('color','#800000');
$("#edit_address").val(isi.address).css('color','#800000');
$("#edit_unit_id").val(isi.unit_id).css('color','#800000');
$("#edit_unit_no").val(isi.UNIT_NO).css('color','#800000');
$("#edit_model").val(isi.MODEL).css('color','#800000');
$("#edit_serial_number").val(isi.serialno).css('color','#800000');
$("#edit_oil_change").val(isi.oil_change).css('color','#800000');
$("#edit_status").val(isi.statuscode).css('color','#800000');
$("#edit_receive_date").val(isi.RECV_DT1).css('color','#800000');
$("#edit_report_date").val(isi.RPT_DT1).css('color','#800000');
$("#edit_sample_date").val(isi.SAMPL_DT1).css('color','#800000');
    console.log("success");
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
  
    $('#modal_edit').modal('show');
}

    //modal//
function Detail(labNumber){
  $.ajax({
    url: '<?php echo Url::toRoute("/monitoring/used_oil/action/getdata_by_labnumber");?>',
    type: 'GET',
    data: {labNumber: labNumber}
  })
  .done(function(isi) {
    /*var isi=JSON.parse(data);*/
$("#grouploc").html(isi.grouploc).css('color','#800000');
$("#lab_no").html(isi.Lab_No).css('color','#800000');
$("#branch").html(isi.branch).css('color','#800000');
$("#cs_id").html(isi.customer_id).css('color','#800000');
$("#cs_name").html(isi.name).css('color','#800000');
$("#address").html(isi.address).css('color','#800000');
$("#unit_id").html(isi.unit_id).css('color','#800000');
$("#unit_no").html(isi.UNIT_NO).css('color','#800000');
$("#model").html(isi.MODEL).css('color','#800000');
$("#serial_no").html(isi.serialno).css('color','#800000');
$("#oil_change").html(isi.oil_change).css('color','#800000');
$("#status").html(isi.statuscode).css('color','#800000');
$("#receive_date").html(isi.RECV_DT1).css('color','#800000');
$("#report_date").html(isi.RPT_DT1).css('color','#800000');
$("#sample_date").html(isi.SAMPL_DT1).css('color','#800000');

$("#visc_100").html(isi.VISC_CST).css('color','#800000');/*analisis*/
$("#tan").html(isi.T_A_N).css('color','#800000');/*analisis*/
$("#tbn").html(isi.T_B_N).css('color','#800000');/*analisis*/
$("#mg").html(isi.MAGNESIUM).css('color','#800000');/*analisis*/
$("#ca").html(isi.CALCIUM).css('color','#800000');/*analisis*/
$("#zn").html(isi.ZINC).css('color','#800000');/*analisis*/
$("#br").html(isi.Boron).css('color','#800000');/*analisis*/
$("#psp").html(isi.phosphor).css('color','#800000');/*analisis*/
$("#na").html(isi.SODIUM).css('color','#800000');/*analisis*/
$("#si").html(isi.SILICON).css('color','#800000');/*analisis*/
$("#fe").html(isi.IRON).css('color','#800000');/*analisis*/
$("#cu").html(isi.COPPER).css('color','#800000');/*analisis*/
$("#al").html(isi.ALUMINIUM).css('color','#800000');/*analisis*/
$("#crm").html(isi.CHROMIUM).css('color','#800000');/*analisis*/
$("#ni").html(isi.NICKEL).css('color','#800000');/*analisis*/
$("#sn").html(isi.TIN).css('color','#800000');/*analisis*/
$("#pb").html(isi.LEAD).css('color','#800000');/*analisis*/
$("#pq").html(isi.PQIndex).css('color','#800000');/*analisis*/
$("#clr").html(isi.colourcode).css('color','#800000');/*analisis*/

$("#soot").html(isi.SOX).css('color','#800000');/*analisis*/
$("#ox").html(isi.OXIDATION).css('color','#800000');/*analisis*/
$("#nt").html(isi.NITRATION).css('color','#800000');/*analisis*/
$("#sf").html(isi.SOX).css('color','#800000');/*analisis*/
$("#fl").html(isi.DILUTION).css('color','#800000');/*analisis*/
$("#wc").html(isi.WATER).css('color','#800000');/*analisis*/
$("#gy").html(isi.GLYCOL).css('color','#800000');/*analisis*/
$("#14um").html("").css('color','#800000');/*analisis*/
$("#15um").html("").css('color','#800000');/*analisis*/
$("#cd").html("").css('color','#800000');/*analisis*/
$("#rec1").html(isi.RECOMM1).css('color','#800000');/*analisis*/
$("#rec2").html(isi.RECOMM2).css('color','#800000');/*analisis*/


    console.log("complete");
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
    if ($("#status").text()=='Attention') {
    $("#status").css('background-color','#ffff33');
}else if($("#status").text()=='Urgent'){
  $("#status").css('background-color','#ff0000');
}else if($("#status").text()=='Normal'){
  $("#status").css('background-color','#00ff00');
}
  });

  $("#Mtitle").html(labNumber).css('color','#800000');
  $("#modalDetail").modal('show');
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

//delete
function Delete(id){
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
 
  
});
}

</script>
<?php JSRegister::end(); ?>

