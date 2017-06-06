//filter footer per kolom
 $('#tb_used_oil tfoot th').not(":eq(0),:eq(12),:eq(13)").each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" />' );
    } );

var tb=$("#tb_used_oil").DataTable({

       "columnDefs": [
    { "width": "110px", "targets": 0 },
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
      return '<a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Please click row for save to PDF" target="_blank" href="'+"<?php echo Url::toRoute('/monitoring/used_oil/action/report?type=pdf&labNumber='); ?>"+data+'">PDF</a>'+'&nbsp;<a class="btn btn-xs btn-info viewDetail" data-toggle="tooltip" title="Please click row for view data" href="#" onclick="Detail('+"'"+data+"'"+')">View</a>'+'&nbsp;<a class="btn btn-xs btn-success viewDetail" data-toggle="tooltip" title="Please click row for view data" href="#" onclick="edit('+"'"+data+"'"+')">Edit</a>';
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