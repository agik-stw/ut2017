<?PHP 

/*
REVISI PERBAIKAN TANGGAL 13 JUNI 2015

*/


session_start();
include_once("ewcfg11.php");


function buat_excel()
{
include_once("ewcfg11.php");

require_once "Excel.class.php";
 
$excel = new Excel();
// Send Header
$excel->setHeader('export.xls');
$excel->BOF();

$dbserver=EW_CONN_HOST;
$dbuser=EW_CONN_USER;
$dbpassword=EW_CONN_PASS;
$dbdatabase=EW_CONN_DB;

$conn=mysql_Connect($dbserver,$dbuser,$dbpassword);
$pilih=mysql_select_db($dbdatabase,$conn);

  if ($conn) {
    	$pilih   = mysql_select_db($dbdatabase, $conn);
   	$sqlstr = "select unit,serial_no,model,component,unsur,value0,value1,value2,value3,value4,value5,value6 from tbl_report";
    	$hasil  = mysql_query($sqlstr);
	$i=0;
   	$excel->writeLabel($i, 0, "unit");
	$excel->writeLabel($i, 1, "serial_no");
	$excel->writeLabel($i, 2, "model");
	$excel->writeLabel($i, 3, "component");
	$excel->writeLabel($i, 4, "unsur");
	$excel->writeLabel($i, 5, "sample1");
	$excel->writeLabel($i, 6, "sample2");
	$excel->writeLabel($i, 7, "sample3");
	$excel->writeLabel($i, 8, "sample4");
	$excel->writeLabel($i, 9, "sample5");
	$excel->writeLabel($i, 10, "sample6");
	$excel->writeLabel($i, 11, "sample7");
 	while ($row= mysql_fetch_row($hasil)) {
		$i++;
    	list($unit,$serial_no,$model,$component,$unsur,$value0,$value1,$value2,$value3,$value4,$value5,$value6) = $row;
	$excel->writeLabel($i, 0, "$unit");
	$excel->writeLabel($i, 1, "$serial_no");
	$excel->writeLabel($i, 2, "$model");
	$excel->writeLabel($i, 3, "$component");
	$excel->writeLabel($i, 4, "$unsur");
	$excel->writeLabel($i, 5, "$value0");
	$excel->writeLabel($i, 6, "$value1");
	$excel->writeLabel($i, 7, "$value2");
	$excel->writeLabel($i, 8, "$value3");
	$excel->writeLabel($i, 9, "$value4");
	$excel->writeLabel($i, 10, "$value5");
	$excel->writeLabel($i, 11, "$value6");

    }	
  }
 

 
$excel->EOF();
exit();

}


function createlist($ComponentID,$sqlstr,&$data)
{
$dbserver=EW_CONN_HOST;
$dbuser=EW_CONN_USER;
$dbpassword=EW_CONN_PASS;
$dbdatabase=EW_CONN_DB;

$conn=mysql_Connect($dbserver,$dbuser,$dbpassword);

if ($conn) {
   		$pilih=mysql_select_db($dbdatabase,$conn);

    		$i=0; 
		$hasil=mysql_query($sqlstr);

		$fields = mysql_num_fields($hasil);
		$out="";
    		for ($i = 0; $i < $fields; $i++) {
    		$fname[$i]=mysql_field_name($hasil, $i);
                }

		$i=0;
		while ($row=mysql_fetch_row($hasil))
                {
		list($Unit[$i],$serial_no[$i],$Model[$i],$Component[$i],$value0[$i],$value1[$i],$value2[$i],$value3[$i],$value4[$i],$value5[$i],$value6[$i],$value7[$i],$value8[$i],$value9[$i],$value10[$i],$value11[$i],$value12[$i],$value13[$i],$value14[$i],$value15[$i],$value16[$i])=$row;
                $i++;
                 }
	//	echo($sqlstr);
     /*           $i=0;
        	$sqlInsert[0]="insert into tbl_report (unit,serial_no,model,component,unsur,value0,value1,value2,value3,value4,value5,value6) values ('$Unit[0]','$serial_no[0]','$Model[0]','$Component[0]','$fname[4]','$value0[0]','$value0[1]','$value0[2]','$value0[3]','$value0[4]','$value0[5]','$value0[6]') ";
		$sqlInsert[1]="insert into tbl_report (unit,serial_no,model,component,unsur,value0,value1,value2,value3,value4,value5,value6) values ('$Unit[0]','$serial_no[0]','$Model[0]','$Component[0]','$fname[5]','$value1[0]','$value1[1]','$value1[2]','$value1[3]','$value1[4]','$value1[5]','$value1[6]') ";
        	$sqlInsert[2]="insert into tbl_report (unit,serial_no,model,component,unsur,value0,value1,value2,value3,value4,value5,value6) values ('$Unit[0]','$serial_no[0]','$Model[0]','$Component[0]','$fname[6]','$value2[0]','$value2[1]','$value2[2]','$value2[3]','$value2[4]','$value2[5]','$value2[6]') ";
		$sqlInsert[3]="insert into tbl_report (unit,serial_no,model,component,unsur,value0,value1,value2,value3,value4,value5,value6) values ('$Unit[0]','$serial_no[0]','$Model[0]','$Component[0]','$fname[7]','$value3[0]','$value3[1]','$value3[2]','$value3[3]','$value3[4]','$value3[5]','$value3[6]') ";		
		$sqlInsert[4]="insert into tbl_report (unit,serial_no,model,component,unsur,value0,value1,value2,value3,value4,value5,value6) values ('$Unit[0]','$serial_no[0]','$Model[0]','$Component[0]','$fname[8]','$value4[0]','$value4[1]','$value4[2]','$value4[3]','$value4[4]','$value4[5]','$value4[6]') ";
        	$sqlInsert[5]="insert into tbl_report (unit,serial_no,model,component,unsur,value0,value1,value2,value3,value4,value5,value6) values ('$Unit[0]','$serial_no[0]','$Model[0]','$Component[0]','$fname[9]','$value5[0]','$value5[1]','$value5[2]','$value5[3]','$value5[4]','$value5[5]','$value5[6]') ";
		$sqlInsert[6]="insert into tbl_report (unit,serial_no,model,component,unsur,value0,value1,value2,value3,value4,value5,value6) values ('$Unit[0]','$serial_no[0]','$Model[0]','$Component[0]','$fname[10]','$value6[0]','$value6[1]','$value6[2]','$value6[3]','$value6[4]','$value6[5]','$value6[6]') ";		
		$sqlInsert[7]="insert into tbl_report (unit,serial_no,model,component,unsur,value0,value1,value2,value3,value4,value5,value6) values ('$Unit[0]','$serial_no[0]','$Model[0]','$Component[0]','$fname[11]','$value7[0]','$value7[1]','$value7[2]','$value7[3]','$value7[4]','$value7[5]','$value7[6]') ";
       		$sqlInsert[8]="insert into tbl_report (unit,serial_no,model,component,unsur,value0,value1,value2,value3,value4,value5,value6) values ('$Unit[0]','$serial_no[0]','$Model[0]','$Component[0]','$fname[12]','$value8[0]','$value8[1]','$value8[2]','$value8[3]','$value8[4]','$value8[5]','$value8[6]') ";
		$sqlInsert[9]="insert into tbl_report (unit,serial_no,model,component,unsur,value0,value1,value2,value3,value4,value5,value6) values ('$Unit[0]','$serial_no[0]','$Model[0]','$Component[0]','$fname[13]','$value9[0]','$value9[1]','$value9[2]','$value9[3]','$value9[4]','$value9[5]','$value9[6]') ";		
        	$sqlInsert[10]="insert into tbl_report (unit,serial_no,model,component,unsur,value0,value1,value2,value3,value4,value5,value6) values ('$Unit[0]','$serial_no[0]','$Model[0]','$Component[0]','$fname[14]','$value10[0]','$value10[1]','$value10[2]','$value10[3]','$value10[4]','$value10[5]','$value10[6]') ";
		$sqlInsert[11]="insert into tbl_report (unit,serial_no,model,component,unsur,value0,value1,value2,value3,value4,value5,value6) values ('$Unit[0]','$serial_no[0]','$Model[0]','$Component[0]','$fname[15]','$value11[0]','$value11[1]','$value11[2]','$value11[3]','$value11[4]','$value11[5]','$value11[6]') ";		
 		$sqlInsert[12]="insert into tbl_report (unit,serial_no,model,component,unsur,value0,value1,value2,value3,value4,value5,value6) values ('$Unit[0]','$serial_no[0]','$Model[0]','$Component[0]','$fname[16]','$value12[0]','$value12[1]','$value12[2]','$value12[3]','$value12[4]','$value12[5]','$value12[6]') ";                              
 		$sqlInsert[13]="insert into tbl_report (unit,serial_no,model,component,unsur,value0,value1,value2,value3,value4,value5,value6) values ('$Unit[0]','$serial_no[0]','$Model[0]','$Component[0]','$fname[17]','$value13[0]','$value13[1]','$value13[2]','$value13[3]','$value13[4]','$value13[5]','$value13[6]') ";                              
  		$sqlInsert[14]="insert into tbl_report (unit,serial_no,model,component,unsur,value0,value1,value2,value3,value4,value5,value6) values ('$Unit[0]','$serial_no[0]','$Model[0]','$Component[0]','$fname[18]','$value14[0]','$value14[1]','$value14[2]','$value14[3]','$value14[4]','$value14[5]','$value14[6]') ";         
 		$sqlInsert[15]="insert into tbl_report (unit,serial_no,model,component,unsur,value0,value1,value2,value3,value4,value5,value6) values ('$Unit[0]','$serial_no[0]','$Model[0]','$Component[0]','$fname[19]','$value15[0]','$value15[1]','$value15[2]','$value15[3]','$value15[4]','$value15[5]','$value15[6]') ";                              
  		$sqlInsert[16]="insert into tbl_report (unit,serial_no,model,component,unsur,value0,value1,value2,value3,value4,value5,value6) values ('$Unit[0]','$serial_no[0]','$Model[0]','$Component[0]','$fname[20]','$value16[0]','$value16[1]','$value16[2]','$value16[3]','$value16[4]','$value16[5]','$value16[6]') ";         

		$xxx=16;
	       for ($i = 0; $i < $xxx; $i++) {
		        if ($fname[4+$i]!="")
					$hasil=mysql_query($sqlInsert[$i]);
                }
*/

		} 

		
    $data[0]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[4],$value0[6],$value0[5],$value0[4],$value0[3],$value0[2],$value0[1],$value0[0]) ;
	$data[1]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[5],$value1[6],$value1[5],$value1[4],$value1[3],$value1[2],$value1[1],$value1[0]) ;
    $data[2]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[6],$value2[6],$value2[5],$value2[4],$value2[3],$value2[2],$value2[1],$value2[0]) ;
	$data[3]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[7],$value3[6],$value3[5],$value3[4],$value3[3],$value3[2],$value3[1],$value3[0]) ;		
	$data[4]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[8],$value4[6],$value4[5],$value4[4],$value4[3],$value4[2],$value4[1],$value4[0]) ;
    $data[5]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[9],$value5[6],$value5[5],$value5[4],$value5[3],$value5[2],$value5[1],$value5[0]) ;
	$data[6]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[10],$value6[6],$value6[5],$value6[4],$value6[3],$value6[2],$value6[1],$value6[0]) ;		
	$data[7]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[11],$value7[6],$value7[5],$value7[4],$value7[3],$value7[2],$value7[1],$value7[0]) ;
    $data[8]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[12],$value8[6],$value8[5],$value8[4],$value8[3],$value8[2],$value8[1],$value8[0]) ;
	$data[9]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[13],$value9[6],$value9[5],$value9[4],$value9[3],$value9[2],$value9[1],$value9[0]) ;		
    $data[10]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[14],$value10[6],$value10[5],$value10[4],$value10[3],$value10[2],$value10[1],$value10[0]) ;
	$data[11]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[15],$value11[6],$value11[5],$value11[4],$value11[3],$value11[2],$value11[1],$value11[0]) ;		
 	$data[12]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[16],$value12[6],$value12[5],$value12[4],$value12[3],$value12[2],$value12[1],$value12[0]) ;                              
 	$data[13]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[17],$value13[6],$value13[5],$value13[4],$value13[3],$value13[2],$value13[1],$value13[0]) ;                              
  	$data[14]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[18],$value14[6],$value14[5],$value14[4],$value14[3],$value14[2],$value14[1],$value14[0]) ;         
 	$data[15]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[19],$value15[6],$value15[5],$value15[4],$value15[3],$value15[2],$value15[1],$value15[0]) ;                              
  	$data[16]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[20],$value16[6],$value16[5],$value16[4],$value16[3],$value16[2],$value16[5],$value16[0]) ;   

/*
    $data[0]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[4],$value0[0],$value0[1],$value0[2],$value0[3],$value0[4],$value0[5],$value0[6]) ;
	$data[1]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[5],$value1[0],$value1[1],$value1[2],$value1[3],$value1[4],$value1[5],$value1[6]) ;
    $data[2]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[6],$value2[0],$value2[1],$value2[2],$value2[3],$value2[4],$value2[5],$value2[6]) ;
	$data[3]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[7],$value3[0],$value3[1],$value3[2],$value3[3],$value3[4],$value3[5],$value3[6]) ;		
	$data[4]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[8],$value4[0],$value4[1],$value4[2],$value4[3],$value4[4],$value4[5],$value4[6]) ;
    $data[5]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[9],$value5[0],$value5[1],$value5[2],$value5[3],$value5[4],$value5[5],$value5[6]) ;
	$data[6]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[10],$value6[0],$value6[1],$value6[2],$value6[3],$value6[4],$value6[5],$value6[6]) ;		
	$data[7]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[11],$value7[0],$value7[1],$value7[2],$value7[3],$value7[4],$value7[5],$value7[6]) ;
    $data[8]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[12],$value8[0],$value8[1],$value8[2],$value8[3],$value8[4],$value8[5],$value8[6]) ;
	$data[9]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[13],$value9[0],$value9[1],$value9[2],$value9[3],$value9[4],$value9[5],$value9[6]) ;		
    $data[10]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[14],$value10[0],$value10[1],$value10[2],$value10[3],$value10[4],$value10[5],$value10[6]) ;
	$data[11]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[15],$value11[0],$value11[1],$value11[2],$value11[3],$value11[4],$value11[5],$value11[6]) ;		
 	$data[12]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[16],$value12[0],$value12[1],$value12[2],$value12[3],$value12[4],$value12[5],$value12[6]) ;                              
 	$data[13]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[17],$value13[0],$value13[1],$value13[2],$value13[3],$value13[4],$value13[5],$value13[6]) ;                              
  	$data[14]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[18],$value14[0],$value14[1],$value14[2],$value14[3],$value14[4],$value14[5],$value14[6]) ;         
 	$data[15]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[19],$value15[0],$value15[1],$value15[2],$value15[3],$value15[4],$value15[5],$value15[6]) ;                              
  	$data[16]=array($Unit[0],$serial_no[0],$Model[0],$Component[0],$fname[20],$value16[0],$value16[1],$value16[2],$value16[3],$value16[4],$value16[5],$value16[6]) ;   

*/
}

function data_per_idcomponent($ComponentID,$COMPONENT,$vtgl_2,$data)
{
        $sqlstr="";
      	$condition = " where ComponentID='$ComponentID'  and SAMPL_DT1<='$vtgl_2'  order by SAMPL_DT1 DESC";

	if (strtoupper($COMPONENT)=="ENGINE")
    	$sqlstr = "select UNIT_NO,ADD_MET,MODEL,COMPONENT,Lab_No,SAMPL_DT1,EVAL_CODE,HRS_KM_OC,VISC_CST as VISC,T_B_N as TBN,DILUTION as FUEL_DILUTION,SODIUM as Na,IRON as Fe,COPPER as Cu,PQIndex as PQ_Index,WATER,DIR_TRANS as Soot from tbl_transaction " . $condition;
	if ((strtoupper($COMPONENT)=="HYDRAULIC") or (strtoupper($COMPONENT)=="HYDRAULIC SYSTEM"))
    	$sqlstr = "select UNIT_NO,ADD_MET,MODEL,COMPONENT,Lab_No,SAMPL_DT1,EVAL_CODE,HRS_KM_OC,VISC_CST as VISC,T_A_N as TAN,COPPER as Cu,IRON as Fe,COPPER as Cu,DIR_TRANS ,PQIndex as PQ_Index,WATER,Seq_I,Seq_II,Seq_III , colourcode as Colour from tbl_transaction " . $condition;
	if (strtoupper($COMPONENT)=="TRANSMISSION")
    	$sqlstr = "select UNIT_NO,ADD_MET,MODEL,COMPONENT,Lab_No,SAMPL_DT1,EVAL_CODE,HRS_KM_OC,VISC_CST as VISC,T_A_N as TAN,PQIndex as PQ_Index,IRON as Fe,COPPER as Cu,DIR_TRANS  from tbl_transaction " . $condition;
	if ((strtoupper($COMPONENT)=="DIFFERENTIAL") or (strtoupper($COMPONENT)=="DIFFERENTIAL FRONT") or (strtoupper($COMPONENT)=="DIFFERENTIAL REAR"))
    	$sqlstr = "select UNIT_NO,ADD_MET,MODEL,COMPONENT,Lab_No,SAMPL_DT1,EVAL_CODE,HRS_KM_OC,VISC_CST as VISC,T_A_N as TAN,PQIndex as PQ_Index,IRON as Fe,COPPER as Cu,DIR_TRANS  from tbl_transaction " . $condition;
	if ((strtoupper($COMPONENT)=="RIGHT FINAL DRIVE") or (strtoupper($COMPONENT)=="FINAL DRIVE RH"))
    	$sqlstr = "select UNIT_NO,ADD_MET,MODEL,COMPONENT,Lab_No,SAMPL_DT1,EVAL_CODE,HRS_KM_OC,VISC_CST as VISC,T_A_N as TAN,PQIndex as PQ_Index,DIR_TRANS  from tbl_transaction " . $condition;
	if ((strtoupper($COMPONENT)=="LEFT FINAL DRIVE") or (strtoupper($COMPONENT)=="FINAL DRIVE LH"))
    	$sqlstr = "select UNIT_NO,ADD_MET,MODEL,COMPONENT,Lab_No,SAMPL_DT1,EVAL_CODE,HRS_KM_OC,VISC_CST as VISC,T_A_N as TAN,PQIndex as PQ_Index,DIR_TRANS  from tbl_transaction " . $condition;
	if (strtoupper($COMPONENT)=="BRAKE COOLING")
    	$sqlstr = "select UNIT_NO,ADD_MET,MODEL,COMPONENT,Lab_No,SAMPL_DT1,EVAL_CODE,HRS_KM_OC,VISC_CST as VISC,T_A_N as TAN,IRON as Fe,COPPER as Cu,PQIndex as PQ_Index  from tbl_transaction " . $condition;
	
        if ($sqlstr!="")
	createlist($ComponentID,$sqlstr,$data);
	
}


function export_xls($vtgl_1, $vtgl_2,$vtgl_1r, $vtgl_2r, $vgroup, $vcomponent, $vmodel, $vunitno, $vcompchg,$vserialno, $vstatus,$vLab_No,$vbranch,$vname)
{
include_once("ewcfg11.php");
require_once "Excel.class.php";

$excel = new Excel();
// Send Header
$excel->setHeader('Critical_Item.xls');
$excel->BOF();

$dbserver=EW_CONN_HOST;
$dbuser=EW_CONN_USER;
$dbpassword=EW_CONN_PASS;
$dbdatabase=EW_CONN_DB;
$conn=mysql_Connect($dbserver,$dbuser,$dbpassword);
$pilih=mysql_select_db($dbdatabase,$conn);

  if ($conn) {
    $pilih   = mysql_select_db($dbdatabase, $conn);
    $sqlstr_delete="DELETE FROM tbl_report";
    $hasil_delete  = mysql_query($sqlstr_delete);
	
	$condition = '';
	
	if ($vtgl_1!=''){
	if ($vgroup=="")
	    $condition = " where SAMPL_DT1>='$vtgl_1' and SAMPL_DT1<='$vtgl_2'  and ComponentID >0 and COMPONENT <> '' ";
	else
    	$condition = " where SAMPL_DT1>='$vtgl_1' and SAMPL_DT1<='$vtgl_2'  and grouploc LIKE '$vgroup%' and ComponentID >0 and COMPONENT <> '' ";
    }
	
 	if (($vtgl_1r!='') and ($condition == '') ){
	if ($vgroup=="")
	    $condition = " where RECV_DT1>='$vtgl_1r' and RECV_DT1<='$vtgl_2r'  and ComponentID >0 and COMPONENT <> '' ";
	else
    	$condition = " where RECV_DT1>='$vtgl_1r' and RECV_DT1<='$vtgl_2r'  and grouploc LIKE '$vgroup%' and ComponentID >0 and COMPONENT <> '' ";
    } 
  

if ($vcomponent!='')
//     $condition = $condition." and COMPONENT='$vcomponent' ";
	 $condition = $condition." and COMPONENT LIKE'%$vcomponent%' ";

if ($vmodel!='')
//    $condition = $condition." and MODEL='$vmodel' ";
	$condition = $condition." and MODEL LIKE '%$vmodel%' ";
if ($vunitno!='')
//     $condition = $condition." and UNIT_NO='$vunitno' ";
	 $condition = $condition." and UNIT_NO LIKE '%$vunitno%' ";

if ($vcompchg!='')
     $condition = $condition." and ADD_MVAL='$vcompchg' ";
	 
if ($vserialno!='')
//     $condition = $condition." and ADD_MET='$vserialno' ";
	$condition = $condition." and ADD_MET LIKE '%$vserialno%' ";	 
if ($vstatus!='')	
     $condition = $condition." and EVAL_CODE='$vstatus' ";
	 
if ($vLab_No!='')
     $condition = $condition." and Lab_No='$vLab_No' ";
	 
if ($vbranch!='')
     $condition = $condition." and branch LIKE '%$vbranch%' ";
	 
if ($vname!='')	
     $condition = $condition." and NAME LIKE '%$vname%' ";
  
    
    $sqlstr = "select distinct ComponentID,COMPONENT from tbl_transaction " . $condition;
    
    $hasil  = mysql_query($sqlstr);
  
        $baris=0;
    	while ($row = mysql_fetch_row($hasil)) {
   		list($ComponentID,$COMPONENT) = $row;
    		data_per_idcomponent($ComponentID,$COMPONENT,$vtgl_2,$data);
    		for ($i = 0; $i < 16; $i++) {
                        if ($data[$i][4]!=""){
    		    	for ($j = 0; $j < 11; $j++) {
    			    $excel->writeLabel($baris, $j, $data[$i][$j]);
                            }
			    $baris++;
			}
               	}
         $data=NULL;
        }
         
    }
	

$excel->EOF();
exit();
}


	$vLab_No  = $_GET["vLab_No"];
	$vbranch  = $_GET["vbranch"];
	$vname  = $_GET["vname"];
	$vtgl_1  = $_GET["date1"];
	$vtgl_2  = $_GET["date2"];
		$vtgl_1r  = $_GET["vtgl1r"];
	$vtgl_2r  = $_GET["vtgl2r"];
	$vgroup  = $_GET["vgroup"];
	$vcomponent = $_GET["vcomponent"];
	$vmodel = $_GET["vmodel"];
	$vunitno = $_GET["vunitno"];
	$vcompchg = $_GET["vcompchg"];
	$vserialno = $_GET["vserialno"];
	$vstatus = $_GET["vstatus"];


/*
    $vtgl_1  = $_GET["vtgl1"];
    $vtgl_2  = $_GET["vtgl2"];
    $vgroup  = $_GET["vgroup"];   
*/ 
    export_xls($vtgl_1, $vtgl_2,$vtgl_1r, $vtgl_2r, $vgroup,$vcomponent,$vmodel,$vunitno,$vcompchg,$vserialno,$vstatus,$vLab_No,$vbranch,$vname);
	 
?>