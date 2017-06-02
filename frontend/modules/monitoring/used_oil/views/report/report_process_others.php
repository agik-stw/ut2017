<?php
require('fpdf/fpdf.php');
error_reporting(0);
class PDF extends FPDF {

  function WriteHTML($html)
  {
      //HTML parser
      $html=str_replace("\n",' ',$html);
      $a=preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
      foreach($a as $i=>$e)
      {
          if($i%2==0)
          {
              //Text
              if($this->HREF)
                  $this->PutLink($this->HREF,$e);
              else
                  $this->Write(5,$e);
          }
          else
          {
              //Tag
              if($e{0}=='/')
                  $this->CloseTag(strtoupper(substr($e,1)));
              else
              {
                  //Extract attributes
                  $a2=explode(' ',$e);
                  $tag=strtoupper(array_shift($a2));
                  $attr=array();
                  foreach($a2 as $v)
                      if(ereg('^([^=]*)=["\']?([^"\']*)["\']?$',$v,$a3))
                          $attr[strtoupper($a3[1])]=$a3[2];
                  $this->OpenTag($tag,$attr);
              }
          }
      }
  }

  function OpenTag($tag,$attr)
  {
      //Opening tag
      if($tag=='B' or $tag=='I' or $tag=='U')
          $this->SetStyle($tag,true);
      if($tag=='A')
          $this->HREF=$attr['HREF'];
      if($tag=='BR')
          $this->Ln(5);
  }

  function CloseTag($tag)
  {
      //Closing tag
      if($tag=='B' or $tag=='I' or $tag=='U')
          $this->SetStyle($tag,false);
      if($tag=='A')
          $this->HREF='';
  }

  function SetStyle($tag,$enable)
  {
      //Modify style and select corresponding font
      $this->$tag+=($enable ? 1 : -1);
      $style='';
      foreach(array('B','I','U') as $s)
          if($this->$s>0)
              $style.=$s;
      $this->SetFont('',$style);
  }

  function PutLink($URL,$txt)
  {
      //Put a hyperlink
      $this->SetTextColor(0,0,255);
      $this->SetStyle('U',true);
      $this->Write(5,$txt,$URL);
      $this->SetStyle('U',false);
      $this->SetTextColor(0);
  }

  function ImprovedTable($header, $data, $format) {
    $this->SetTextColor(0);
    $this->SetDrawColor(200, 200, 200);
    $this->SetFont('Arial', 'B', 8);
    $this->SetLineWidth(0.03);

    $w = array(
      2.8,
      1.45,
      2.1,
      2.15,
      2.15,
      2.15,
      2.15,
      2.15,
      1.35,
      1.35
    );

    for ($i = 0; $i < count($header); $i++) {
      switch ($i) {
        case 0:
          $this->Cell($w[$i], 0.5, $header[$i], 'LTB', 0, 'L');
          break;
        case 7:
          $this->Cell($w[$i], 0.5, $header[$i], 'TBR', 0, 'L');
          break;
        case 8:
          if ($format == 1) {
            $this->Cell($w[$i], 0.5, $header[$i], 'TL', 0, 'L');
          } else if ($format == 2) {
            $this->Cell($w[$i], 0.5, $header[$i], 1, 0, 'C');
          } else {
            $this->SetTextColor(200);
            $this->Cell($w[$i], 0.5, $header[$i], 'LR', 0, 'L');
            $this->SetTextColor(0);
          }
          break;
        case 9:
          if ($format == 1) {
            $this->Cell($w[$i], 0.5, $header[$i], 'TR', 0, 'L');
          } else if ($format == 2) {
            $this->Cell($w[$i], 0.5, $header[$i], 1, 0, 'C');
          } else {
            $this->SetTextColor(200);
            $this->Cell($w[$i], 0.5, $header[$i], 'LR', 0, 'L');
            $this->SetTextColor(0);
          }
          break;
        default:
          $this->Cell($w[$i], 0.5, $header[$i], 'TB', 0, 'C');
          break;
      }
    }

    $this->Ln();
    $this->SetFont('Arial', '', 7);

    $fill  = 0;
    $width = 0.345;

    foreach ($data as $row) {
      $this->Cell($w[0], $width, $row[0], 'L', 0, 'L', $fill);
      if ($format == 1) {
        $this->Cell($w[1], $width, $row[1], '', 0, 'C', $fill);
        $this->SetFont('Arial', '', 6);
        $this->Cell($w[2], $width, $row[2], 'R', 0, 'C', $fill);
      } else {
        $this->Cell($w[1], $width, $row[1], 'LR', 0, 'C', $fill);
        $this->SetFont('Arial', '', 6);
        $this->Cell($w[2], $width, $row[2], 'LR', 0, 'C', $fill);
      }

      $this->SetFont('Arial', '', 7);

      if ($row[0] == 'Lube Oil Name')
        $this->SetFont('Arial', '', 5.5);

      $this->color($R, $G, $B, $row[3]);
      $this->SetTextColor($R, $G, $B);
      $this->Cell($w[3], $width, $row[3], 'LR', 0, 'C', $fill);
      $this->color($R, $G, $B, $row[4]);
      $this->SetTextColor($R, $G, $B);
      $this->Cell($w[4], $width, $row[4], 'LR', 0, 'C', $fill);
      $this->color($R, $G, $B, $row[5]);
      $this->SetTextColor($R, $G, $B);
      $this->Cell($w[5], $width, $row[5], 'LR', 0, 'C', $fill);
      $this->color($R, $G, $B, $row[6]);
      $this->SetTextColor($R, $G, $B);
      $this->Cell($w[6], $width, $row[6], 'LR', 0, 'C', $fill);
      $this->color($R, $G, $B, $row[7]);
      $this->SetTextColor($R, $G, $B);
      $this->Cell($w[7], $width, $row[7], 'LR', 0, 'C', $fill);
      $this->SetTextColor(0, 0, 0);
      $this->SetFont('Arial', '', 7);

      if ($format == 1) {
        $this->Cell($w[8], $width, $row[8], 'L', 0, 'C', $fill);
        $this->Cell($w[9], $width, $row[9], 'R', 0, 'C', $fill);
      } else if ($format == 4) {
        $this->Cell($w[8], $width, $row[8], 'LRB', 0, 'C', $fill);
        $this->Cell($w[9], $width, $row[9], 'LRB', 0, 'C', $fill);
      } else {
        $this->Cell($w[8], $width, $row[8], 'LR', 0, 'C', $fill);
        $this->Cell($w[9], $width, $row[9], 'LR', 0, 'C', $fill);
      }

      $this->Ln();
    }

    $this->Cell(2.9 + 1.5 + 1.95 + 2.15 + 2.15 + 2.15 + 2.15 + 2.15, 0, '', 'T');
  }

  function color($R, $G, $B, $data) {
    if (substr($data, 0, 2) == "N/") {
      $R  = 0;
      $G  = 0;
      $B  = 0;
      $data = substr($data, 2, 10);
    } else if (substr($data, 0, 2) == "C/") {
      $R  = 255;
      $G  = 0;
      $B  = 0;
      $data = substr($data, 2, 10);
    } else if (substr($data, 0, 2) == "B/") {
      $R  = 255;
      $G  = 220;
      $B  = 0;
      $data = substr($data, 2, 10);
    } else if (substr($data, 0, 2) == "D/") {
      $R  = 255;
      $G  = 0;
      $B  = 0;
      $data = substr($data, 2, 10);
    } else if ((substr($data, 0, 3) == "BL/") || (substr($data, 0, 3) == "BH/")) {
      $R  = 255;
      $G  = 220;
      $B  = 0;
      $data = substr($data, 3, 10);
    } else if ((substr($data, 0, 3) == "CL/") || (substr($data, 0, 3) == "CH/")) {
      $R  = 255;
      $G  = 0;
      $B  = 0;
      $data = substr($data, 3, 10);
    } else if ((substr($data, 0, 3) == "DL/") || (substr($data, 0, 3) == "DH/")) {
      $R  = 255;
      $G  = 0;
      $B  = 0;
      $data = substr($data, 3, 10);
    } else {
      $R = 0;
      $G = 0;
      $B = 0;
    }
  }

  function Footer() {
  }

  function RoundedRect($x, $y, $w, $h, $r, $style = '') {
    $k  = $this->k;
    $hp = $this->h;

    if ($style == 'F')
      $op = 'f';
    elseif ($style == 'FD' or $style == 'DF')
      $op = 'B';
    else
      $op = 'S';

    $MyArc = 4 / 3 * (sqrt(2) - 1);
    $this->_out(sprintf('%.2f %.2f m', ($x + $r) * $k, ($hp - $y) * $k));
    $xc = $x + $w - $r;
    $yc = $y + $r;
    $this->_out(sprintf('%.2f %.2f l', $xc * $k, ($hp - $y) * $k));
    $this->_Arc($xc + $r * $MyArc, $yc - $r, $xc + $r, $yc - $r * $MyArc, $xc + $r, $yc);
    $xc = $x + $w - $r;
    $yc = $y + $h - $r;
    $this->_out(sprintf('%.2f %.2f l', ($x + $w) * $k, ($hp - $yc) * $k));
    $this->_Arc($xc + $r, $yc + $r * $MyArc, $xc + $r * $MyArc, $yc + $r, $xc, $yc + $r);
    $xc = $x + $r;
    $yc = $y + $h - $r;
    $this->_out(sprintf('%.2f %.2f l', $xc * $k, ($hp - ($y + $h)) * $k));
    $this->_Arc($xc - $r * $MyArc, $yc + $r, $xc - $r, $yc + $r * $MyArc, $xc - $r, $yc);
    $xc = $x + $r;
    $yc = $y + $r;
    $this->_out(sprintf('%.2f %.2f l', ($x) * $k, ($hp - $yc) * $k));
    $this->_Arc($xc - $r, $yc - $r * $MyArc, $xc - $r * $MyArc, $yc - $r, $xc, $yc - $r);
    $this->_out($op);
  }

  function _Arc($x1, $y1, $x2, $y2, $x3, $y3) {
    $h = $this->h;
    $this->_out(sprintf('%.2f %.2f %.2f %.2f %.2f %.2f c ', $x1 * $this->k, ($h - $y1) * $this->k, $x2 * $this->k, ($h - $y2) * $this->k, $x3 * $this->k, ($h - $y3) * $this->k));
  }
}

function process($a, $j) {
  $cpt  = $j;
  $find = 'false';

  while (($cpt > 0) and ($find == 'false')) {
    if ($cellTitle[22] == 'IRON') {
      $find = 'true';
    }
    $cpt = $cpt - 1;
  }

  if ($find == 'true') {
    return $a . "/C";
  } else {
    return $a . "z";
  }
}

function alarm($value, $code) {
  if ($code == '') {
    return $value;
  } else {
    return $code . "/" . $value;
  }
}

function chartbaru($vdatamat, $vlabel, $vfile, $vtitle, $vtoptitle, $jml) {
  require_once("lib/phpchartdir.php");
  $labels = $vlabel;
  $k = 0;

  while ($k < $jml) {
    $data1[$k] = $vdatamat[1][$k];
    $data2[$k] = $vdatamat[2][$k];
    $data3[$k] = $vdatamat[3][$k];
    $data4[$k] = $vdatamat[4][$k];
    $data5[$k] = $vdatamat[5][$k];
    $data6[$k] = $vdatamat[6][$k];
    $data7[$k] = $vdatamat[7][$k];
    $k++;
  }

  $c = new XYChart(700, 230, 0xffffff, 0x000000, 0);
  $c->setPlotArea(50, 50, 610, 160, 0xffffff, -1, -1, 0xc0c0c0, -1);
  $legendObj = $c->addLegend(30, 14, false, "", 9);
  $legendObj->setBackground(Transparent);
  $c->addTitle2(Top, $vtoptitle, "arialbd.ttf", 12, 0xffffff, 0x31319c);
  $c->xAxis->setLabels($labels);
  $layer = $c->addLineLayer();

  $dataSetObj = $layer->addDataSet($data1, 0x0033FF, $vtitle[1]);
  $dataSetObj->setDataSymbol('1', 9);
  $dataSetObj = $layer->addDataSet($data2, 0x00CC66, $vtitle[2]);
  $dataSetObj->setDataSymbol('1', 9);
  $dataSetObj = $layer->addDataSet($data3, 0x993300, $vtitle[3]);
  $dataSetObj->setDataSymbol('1', 9);
  $dataSetObj = $layer->addDataSet($data4, 0xFFCC00, $vtitle[4]);
  $dataSetObj->setDataSymbol('1', 9);
  $dataSetObj = $layer->addDataSet($data5, 0xFF0000, $vtitle[5]);
  $dataSetObj->setDataSymbol('1', 9);
  $dataSetObj = $layer->addDataSet($data6, 0x000000, $vtitle[6]);
  $dataSetObj->setDataSymbol('1', 9);
  $dataSetObj = $layer->addDataSet($data7, 0xFF00FF, $vtitle[7]);
  $dataSetObj->setDataSymbol('1', 9);

  $c->makeChart($vfile);
}

function fSeq_I($seq_I) {
  $panjang = strlen($seq_I);
  $i     = 0;
  $find  = 0;

  while (($i < $panjang) && ($find == 0)) {
    $vchar = substr($seq_I, $i, 1);
    if ($vchar == '/') {
      $find = 1;
    } else {
      $i++;
    }
  }

  $vchar = substr($seq_I, 0, $i);
  return $vchar;
}
function  hitung_others($col1,$col2,$col3,$col4,$col5){
include_once("ewcfg12.php");

  $dbserver   = $EW_CONN["DB"]["host"];
  $dbuser   = $EW_CONN["DB"]["user"];
  $dbpassword = $EW_CONN["DB"]["pass"];
  $dbdatabase = $EW_CONN["DB"]["db"];


  $conn = mysqli_connect('localhost', $dbuser, $dbpassword,$dbdatabase);
/*  $pilih     = mysql_select_db($dbdatabase, $conn);*/

  $colomn[1]=$col1;
  $colomn[2]=$col2;
  $colomn[3]=$col3;
  $colomn[4]=$col4;
  $colomn[5]=$col5;

  $colomnname[1]='col1';
  $colomnname[2]='col2';
  $colomnname[3]='col3';
  $colomnname[4]='col4';
  $colomnname[5]='col5';

  	$sqlupdate="update tbl_otherorder_lu set col1='',col2='',col3='',col4='',col5=''";
	$hasil=mysqli_query($conn,$sqlupdate);

  $i=1;
  while ($i<=5) {

  $sqlstr = "select unsur,unit,methode,value,attention,urgent from tbl_otherorder  where Lab_No='$colomn[$i]'";
  $hasil = mysqli_query($conn,$sqlstr);

  while ($rowresume = mysqli_fetch_row($hasil)) {
    list($unsur,$unit,$methode,$value,$attention,$urgent) = $rowresume;
	$sqlupdate="update tbl_otherorder_lu set $colomnname[$i]=$value where unsur='$unsur'";
	$hasilupdate=mysqli_query($conn,$sqlupdate);
  }
  $i++;

  }

}


function Cari_Other1($data9, $lab_no,$Others,$Jml,$ke){
   include_once("ewcfg12.php");

  $dbserver   = $EW_CONN["DB"]["host"];
  $dbuser   = $EW_CONN["DB"]["user"];
  $dbpassword = $EW_CONN["DB"]["pass"];
  $dbdatabase = $EW_CONN["DB"]["db"];


  $conn = mysql_Connect($dbserver.':3306', $dbuser, $dbpassword);

  $pilih     = mysql_select_db($dbdatabase, $conn);

 $sqlstr = "select unsur,unit,methode,value,attention,urgent from tbl_otherorder  where Lab_No='$lab_no'";

  $hasilresume = mysql_query($sqlstr);
  $i=900;
  $Temp=0;
    while ($rowresume = mysql_fetch_row($hasilresume)) {
	 $i++;
    list($unsur,$unit,$methode,$value,$attention,$urgent) = $rowresume;
    $Temp=1;
	if ($ke==1)
    $data9[$i] = array($unsur,$unit,$methode,$value,'','','','',$attention,$urgent);

	if ($ke==2)
    $data9[$i] = array($unsur,$unit,$methode,'',$value,'','','',$attention,$urgent);

	if ($ke==3)
    $data9[$i] = array($unsur,$unit,$methode,'','',$value,'','',$attention,$urgent);

    if ($ke==4)
    $data9[$i] = array($unsur,$unit,$methode,'','','',$value,'',$attention,$urgent);

	    if ($ke==5)
    $data9[$i] = array($unsur,$unit,$methode,'','','','',$value,$attention,$urgent);
	}

	 while ($i<903)
	 {
	 $i++;
    $data9[$i] = array('','','','','','','','','','');
	 }
	$Others=$Temp;
	$Jml=$i-900;
}

function Cari_Other(&$data9, $lab_no,&$Others,&$Jml,$ke){
   include_once("ewcfg12.php");

  $dbserver   = $EW_CONN["DB"]["host"];
  $dbuser   = $EW_CONN["DB"]["user"];
  $dbpassword = $EW_CONN["DB"]["pass"];
  $dbdatabase = $EW_CONN["DB"]["db"];


  $conn = mysql_Connect($dbserver.':3306', $dbuser, $dbpassword);

  $pilih     = mysql_select_db($dbdatabase, $conn);

 $sqlstr = "select unsur,unit,methode,attention,urgent, col1,col2,col3,col4,col5,attention,urgent from tbl_otherorder_lu  where col1<>'' or col2<>'' or col3<>'' or col4<>'' or col5<>''";

  $hasilresume = mysql_query($sqlstr);
   $data9[901] = array("","","","","","","","","","");
  $data9[902] = array("","","","","","","","","","");
  $data9[903] = array("","","","","","","","","","");
  $data9[904] = array("","","","","","","","","","");
   $data9[905] = array("","","","","","","","","","");

  $i=900;

    while ($rowresume = mysql_fetch_row($hasilresume)) {
	 $i++;
    list($unsur,$unit,$methode,$attention,$urgent,$col1,$col2,$col3,$col4,$col5,$attention,$urgent) = $rowresume;
   $data9[$i] = array($unsur,$unit,$methode,$col1,$col2,$col3,$col4,$col5,$attention,$urgent);
//  $data9[$i] = array($unsur,$unit,$methode,$col1,$col2,$col3,$col4,$col5,5,6);
	}


	$Others=$Temp;
	$Jml=$i-900;
	$Jml=5;
}


function show_rpt_5($lab_no, $vtgl_1, $vtgl_2, $vgroup, $vcust_id) {
  define('FPDF_FONTPATH', 'fpdf/font/');
  include_once("ewcfg12.php");

// define("EW_USE_ADODB", FALSE, TRUE); // Use ADOdb
if (!defined("EW_USE_MYSQLI"))

 $dbserver   = '$EW_CONN["DB"]["port"]';
 $dbuser   = $EW_CONN["DB"]["user"];
 $dbpassword = $EW_CONN["DB"]["pass"];
 $dbdatabase = $EW_CONN["DB"]["db"];

  /*return var_dump($dbserver);*/
  $dbdirgraph = './image/';
  $kertas = 'Legal';

  $pdf = new PDF('P', 'cm', $kertas);
  /*$pdf->Open();*/
  $pdf->AliasNbPages();

/*  $conn = mysql_Connect($dbserver.':3306', $dbuser, $dbpassword);*/
$conn=mysqli_connect( 'localhost', $dbuser, $dbpassword,$dbdatabase);

  if ($vcust_id != '') {
    $cond_cust_id = " and customer_id=" . $vcust_id . " ";
  } else {
    $cond_cust_id = " ";
  }

  if (($vgroup != '') && ($vtgl_1 != '') && ($vtgl_2 != ''))
    $conditionresume = " where RPT_DT1 >= '" . $vtgl_1 . "' and RPT_DT1 <='" . $vtgl_2 . "'" . $cond_cust_id . " and grouploc like '%" . $vgroup . "%' order by grouploc , lab_no ";
  else if (($vtgl_1 != '') && ($vtgl_2 != ''))
    $conditionresume = " where RPT_DT1 >= '" . $vtgl_1 . "' and RPT_DT1 <='" . $vtgl_2 . "'" . $cond_cust_id . "order by grouploc , lab_no ";
  else
    $conditionresume = " where lab_no ='" . $lab_no . "'";

  $sqlstrresume = "select grouploc,lab_no  from tbl_transaction " . $conditionresume;

/*  $pilih     = mysql_select_db($dbdatabase, $conn);*/
  $hasilresume = mysqli_query($conn,$sqlstrresume);

  $ii = 0;
  while ($rowresume = mysqli_fetch_row($hasilresume)) {
    $data1  = NULL;
    $data2  = NULL;
    $data3  = NULL;
    $data4  = NULL;
    $data5  = NULL;
    $data6  = NULL;
    $data7  = NULL;
    $data8  = NULL;
    $cell   = NULL;
    $cell_c = NULL;
    $vdatawearmat = NULL;
    $vdataftirmat = NULL;
    $vdataTAN_TBN = NULL;
    $vdataVISC  = NULL;
    $matrix   = NULL;
    $minmatrix  = NULL;
    $cellTitle  = NULL;
    $vlabel   = NULL;
    $cellmethod = NULL;
    $coeff = NULL;
    $i   = NULL;
    $j   = NULL;
    $jml   = NULL;
    list($grouploc, $lab_no1) = $rowresume;
    $lab_no = $lab_no1;
    $pdf->AddPage();
    $ii++;

    find_rec($vcode1, $vcode2, $vcode3, $vowner, $vcompany, $lab_no);
    $condition = "";

    if ($conn) {
    /*  $pilih   = mysql_select_db($dbdatabase, $conn);*/
      $condition = " where name='" . $vcompany . "' and component='" . $vcode1 . "' and unit_id='" . $vcode2 . "' and lab_no<='" . $lab_no . "' order by Sampl_dt1 desc, lab_no desc ";
      $sqlstr = "select count(name)  from tbl_transaction " . $condition;
      $hasil = mysqli_query($conn,$sqlstr);
      $row   = mysqli_fetch_row($hasil);
      list($jml) = $row;
      $jmlkolom=$jml;
      if ($jml >= 5) {
        $jml = 5;
      }

      $sqlstr = "select name,branch,address, matrix, model,unit_no,oil_type,oil_matrix,'',ComponentID,component, recomm1, recomm2,add_phys,Lab_no,Date(Sampl_dt1),Date(recv_dt1),Date(rpt_dt1),HRS_KM_OC,HRS_KM_TOT,oil_change,visc_40,Visc_cst,T_A_N,T_B_N,Magnesium,calcium,zinc,Boron,phosphor,sodium,Silicon,Iron,Copper,Aluminium,Chromium,nickel,TIN,lead,PQIndex,colourcode,dir_trans,oxidation,nitration,sox,dilution,water,glycol,4um,6um,15um,ISO4406,seq_I,seq_II,seq_III,eval_code,matrix  from tbl_transaction " . $condition;
      $hasil = mysqli_query($conn,$sqlstr);
      $i   = $jml;

      while ($row = mysqli_fetch_row($hasil)) {
        list($vname, $vbranch_nm, $vaddress_nm, $vmatrix, $vmodel, $vunit_no, $voil_type, $voil_matrix, $vunit_loc, $ComponentID, $vcomponent1, $vrecomm1, $vrecomm2, $add_phys, $cell[$i][101], $cell[$i][102], $cell[$i][103], $cell[$i][104], $cell[$i][105], $cell[$i][106], $cell[$i][107], $cell[$i][201], $cell[$i][202], $cell[$i][203], $cell[$i][204], $cell[$i][301], $cell[$i][302], $cell[$i][303], $cell[$i][304], $cell[$i][305], $cell[$i][401], $cell[$i][402], $cell[$i][501], $cell[$i][502], $cell[$i][503], $cell[$i][504], $cell[$i][505], $cell[$i][506], $cell[$i][507], $cell[$i][508], $cell[$i][509],$cell[$i][601], $cell[$i][602], $cell[$i][603], $cell[$i][604],$cell[$i][605], $cell[$i][606], $cell[$i][607], $cell[$i][701], $cell[$i][702], $cell[$i][703], $cell[$i][704], $cell[$i][801], $cell[$i][802], $cell[$i][803], $cell[$i][44], $matrixcode) = $row;
        //list($vname, $vbranch_nm, $vaddress_nm, $vmatrix, $vmodel, $vunit_no, $voil_type, $voil_matrix, $vunit_loc, $ComponentID, $vcomponent1, $vrecomm1, $vrecomm2, $add_phys, $cell[$i][101], $cell[$i][102], $cell[$i][103], $cell[$i][104], $cell[$i][105], $cell[$i][106], $cell[$i][107], $cell[$i][108], $cell[$i][201], $cell[$i][202], $cell[$i][203], $cell[$i][204], $cell[$i][301], $cell[$i][302], $cell[$i][303], $cell[$i][304], $cell[$i][305], $cell[$i][306], $cell[$i][401], $cell[$i][402], $cell[$i][403], $cell[$i][404], $cell[$i][405], $cell[$i][501], $cell[$i][502], $cell[$i][503], $cell[$i][504], $cell[$i][505], $cell[$i][506], $cell[$i][507], $cell[$i][508], $cell[$i][509], $cell[$i][601], $cell[$i][602], $cell[$i][603], $cell[$i][604], $cell[$i][701], $cell[$i][702], $cell[$i][703], $cell[$i][704], $cell[$i][801], $cell[$i][802], $cell[$i][803], $cell[$i][44], $matrixcode) = $row;
        if ($i == $jml) {
          $name      = $vname;
          $branch_nm     = $vbranch_nm;
          $address_nm    = $vaddress_nm;
          $matrik      = $vmatrix;
          $model       = $vmodel;
          $unit_no     = $vunit_no;
          $oil_type    = $voil_type;
          $oil_matrix    = $voil_matrix;
          $unit_loc    = $vunit_loc;
          $component     = $vcomponent1;
          $recomm1     = $vrecomm1;
          $recomm2     = $vrecomm2;
          $eval      = $cell[$i][44];
          $lab       = $cell[$i][101];
          $seq_I       = $cell[$i][801];
          $sqlstr_tblbrand = "select visc_100,visc_40,T_A_N,T_B_N  from tbl_oilbrand where oil_type='" . $oil_type . "'";
          $hasil_tblbrand  = mysqli_query($conn,$sqlstr_tblbrand);

          if ($row = mysqli_fetch_row($hasil_tblbrand))
            list($visc_100, $visc_40, $T_A_N, $T_B_N) = $row;

 /*        if ($component != 'ENGINE') {
            $vcaption = "T A N";
            $vvalue   = $T_A_N;
          } else {
            $vcaption = "T B N";
            $vvalue   = $T_B_N;
          }
*/
          if ((strtoupper($component) != 'ENGINE') and (strtoupper($component) != 'ENGINE UPPER') and (strtoupper($component) != 'ENGINE LOWER')  and (strtoupper($component) != 'New Oil B')) {
            $vcaption = "T A N";
            $vvalue   = $T_A_N;
          } else {
            $vcaption = "T B N";
            $vvalue   = $T_B_N;
          }


          $noreport = "";

          if ($add_phys == "") {
            $noreport = $add_phys;
          } else {
            $noreport = 'No. ' . $add_phys;
          }
        }
        $i--;
      }

	  hitung_others($cell[1][101],$cell[2][101],$cell[3][101],$cell[4][101],$cell[5][101]);
      $sqlstr = "select '','','','','','','',VISC_40_CODE,CST_CODE,TAN_CODE,TBN_CODE,MG_CODE,CA_CODE,ZN_CODE,NA_CODE,SI_CODE,FE_CODE,CU_CODE,AL_CODE,CR_CODE,NI_CODE,SN_CODE,PB_CODE,TRANS_CODE,OXID_CODE,NITR_CODE,SOX_CODE,DILUT_CODE, WTR_CODE, GLY_CODE,4um_code,6um_code,15um_code,ISO4406_CODE,seq_I_code,seq_II_code,seq_III_code  from tbl_transaction " . $condition;
      $hasil  = mysqli_query($conn,$sqlstr);
      $i    = $jml;`

      while ($row = mysqli_fetch_row($hasil)) {
        list($cell_c[$i][101], $cell_c[$i][102], $cell_c[$i][103], $cell_c[$i][104], $cell_c[$i][105], $cell_c[$i][106], $cell_c[$i][107], $cell_c[$i][201], $cell_c[$i][202], $cell_c[$i][203], $cell_c[$i][204], $cell_c[$i][301], $cell_c[$i][302], $cell_c[$i][303], $cell_c[$i][401], $cell_c[$i][402], $cell_c[$i][501], $cell_c[$i][502], $cell_c[$i][503], $cell_c[$i][504], $cell_c[$i][505], $cell_c[$i][506], $cell_c[$i][507], $cell_c[$i][601], $cell_c[$i][602], $cell_c[$i][603], $cell_c[$i][604],$cell_c[$i][605], $cell_c[$i][606], $cell_c[$i][607], $cell_c[$i][701], $cell_c[$i][702], $cell_c[$i][703], $cell_c[$i][704], $cell_c[$i][801], $cell_c[$i][802], $cell_c[$i][803]) = $row;
        //list($cell_c[$i][101], $cell_c[$i][102], $cell_c[$i][103], $cell_c[$i][104], $cell_c[$i][105], $cell_c[$i][106], $cell_c[$i][107], $cell_c[$i][108], $cell_c[$i][201], $cell_c[$i][202], $cell_c[$i][203], $cell_c[$i][204], $cell_c[$i][301], $cell_c[$i][302], $cell_c[$i][303], $cell_c[$i][304], $cell_c[$i][305], $cell_c[$i][401], $cell_c[$i][402], $cell_c[$i][403], $cell_c[$i][404], $cell_c[$i][405], $cell_c[$i][501], $cell_c[$i][502], $cell_c[$i][503], $cell_c[$i][504], $cell_c[$i][505], $cell_c[$i][506], $cell_c[$i][507], $cell_c[$i][508], $cell_c[$i][509], $cell_c[$i][601], $cell_c[$i][602], $cell_c[$i][603], $cell_c[$i][604], $cell_c[$i][701], $cell_c[$i][702], $cell_c[$i][703], $cell_c[$i][704], $cell_c[$i][801], $cell_c[$i][802], $cell_c[$i][803]) = $row;
        $i--;
      }

      $sqlstr    = "select element,urgent,attention from tbl_alarm where lab_no='" . $lab_no . "'";
      $hasil     = mysqli_query($conn,$sqlstr);
      $listurgent  = '';
      $listattention = '';

      while ($row = mysqli_fetch_row($hasil)) {
        list($element, $urgent, $attention) = $row;
        if ($urgent == 1) {
          $listurgent = $listurgent . " " . $element;
        } else {
          $listattention = $listattention . " " . $element;
        }
      }

      if ($jml > 1) {
        $matrix[301] = $cell[$jml - 1][301] * 1.5;
        $matrix[302] = $cell[$jml - 1][302] * 1.5;
        $matrix[303] = $cell[$jml - 1][303] * 1.5;
      }

      $sqlstr = "select V40minB,V40maxB,V40minC,V40maxC,V100minB,V100maxB,V100minC,V100maxC,TANB,TANC,TBNB,TBNC from tbl_oil_matrix where oil_matrix='" . $oil_matrix . "'";
      $hasil = mysqli_query($conn,$sqlstr);

      while ($row = mysqli_fetch_row($hasil)) {
        list($minBmatrix[201], $maxBmatrix[201], $minCmatrix[201], $maxCmatrix[201], $minBmatrix[202], $maxBmatrix[202], $minCmatrix[202], $maxCmatrix[202], $minmatrix[203], $matrix[203], $minmatrix[204], $matrix[204]) = $row;
        $minmatrix[201] = "" . $minBmatrix[201] . "/" . $maxBmatrix[201];
        $matrix[201]  = "" . $minCmatrix[201] . "/" . $maxCmatrix[201];
        $minmatrix[202] = "" . $minBmatrix[202] . "/" . $maxBmatrix[202];
        $matrix[202]  = "" . $minCmatrix[202] . "/" . $maxCmatrix[202];
      }

      $sqlstr = "select NaB,SiB,FeB,CuB,AlB,CrB,NiB,SnB,PbB,SootB,OxiB,NitB,SulB,FuelB,WaterB,GlycolB from tbl_wear_ftir_matrix where matrix='" . $matrik . "'";
      $hasil  = mysqli_query($conn,$sqlstr);

      while ($row = mysqli_fetch_row($hasil)) {
        list($minmatrix[401], $minmatrix[402], $minmatrix[501], $minmatrix[502], $minmatrix[503], $minmatrix[504], $minmatrix[505], $minmatrix[506], $minmatrix[507], $minmatrix[601], $minmatrix[602], $minmatrix[603], $minmatrix[604], $minmatrix[605], $minmatrix[606], $minmatrix[607]) = $row;
      }

      $sqlstr = "select NaC,SiC,FeC,CuC,AlC,CrC,NiC,SnC,PbC,SootC,OxiC,NitC,SulC,FuelC,WaterC,GlycolC from tbl_wear_ftir_matrix where matrix='" . $matrik . "'";
      $hasil  = mysqli_query($conn,$sqlstr);

      while ($row = mysqli_fetch_row($hasil)) {
        list($matrix[401], $matrix[402], $matrix[501], $matrix[502], $matrix[503], $matrix[504], $matrix[505], $matrix[506], $matrix[507], $matrix[601], $matrix[602], $matrix[603], $matrix[604],$matrix[605], $matrix[606], $matrix[607]) = $row;
      }


	  	$sqlstrcolor="select B, C from  tbl_color" ;
		$hasilcolor=mysqli_query($conn,$sqlstrcolor) or die(mysqli_error($conn));
		$rowcol=mysqli_fetch_row($hasilcolor);
		list($B,$C)=$rowcol;
		$minmatrix[509]=$B;
	    $matrix[509]=$C;


	  	$sqlstrseq="select B1,B2,C1,C2 from  tbl_sequence" ;
		$hasilseq=mysqli_query($conn,$sqlstrseq) or die(mysqli_error($conn));
		$rowseq=mysqli_fetch_row($hasilseq);
		list($B1,$B2,$C1,$C2)=$rowseq;
		$minmatrix[801]=$B1.'/'.$B2;
		$matrix[801]=$C1.'/'.$C2;

      $condition1 = " where Matrix='" . $matrik . "'";
      $sqlstr   = "select 6attention, 14attention, 6urgent, 14urgent from  tbl_wear_ftir_matrix " . $condition1;
      $hasil = mysqli_query($conn,$sqlstr) or die(mysqli_error($conn));

      if ($row = mysqli_fetch_row($hasil)) {
        list($attention6, $attention14, $urgent6, $urgent14) = $row;
        $minmatrix[704] = $attention6 . "/" . $attention14;
        $matrix[704]  = $urgent6 . "/" . $urgent14;
      }
    }
    $vdatawearmat = array();
    $vdataftirmat = array();
    $vdataTAN_TBN = array();
    $vdataVISC  = array();
    $k = 0;

    while ($k < $jml) {
      $vdatawearmat[1][$k] = $cell[$k + 1][501];
      /*iron*/
      $vdatawearmat[2][$k] = $cell[$k + 1][502];
      /*cooper*/
      $vdatawearmat[3][$k] = $cell[$k + 1][503];
      /*alumunium*/
      $vdatawearmat[4][$k] = $cell[$k + 1][504];
      /*Chromium*/
      $vdatawearmat[5][$k] = $cell[$k + 1][505];
      /*Nickel*/
      $vdatawearmat[6][$k] = $cell[$k + 1][506];
      /*Tin*/
      $vdatawearmat[7][$k] = $cell[$k + 1][507];
      /*Pb*/
      $vdataftirmat[1][$k] = $cell[$k + 1][601];
      /*soot*/
      $vdataftirmat[2][$k] = $cell[$k + 1][602];
      /*oxid*/
      $vdataftirmat[3][$k] = $cell[$k + 1][603];
      /*nit*/
      $vdataftirmat[4][$k] = $cell[$k + 1][604];
      /*sulf*/
      $vdatawearmat[8][$k] = $cell[$k + 1][605];
      /*fuel dilution*/
      $vdatawearmat[9][$k] = $cell[$k + 1][606];
      /*Water*/
      $vdatawearmat[10][$k] = $cell[$k + 1][607];
      /*glycol*/
      $vdataftirmat[5][$k] = $cell[$k + 1][403];
      /*fuel*/
      $vdataftirmat[6][$k] = $cell[$k + 1][404];
      /*water*/
      $vdataftirmat[7][$k] = $cell[$k + 1][405];
      /*glycol*/
      $vdataVISC[1][$k] = $cell[$k + 1][201];
      /*Visc 40*/
      $vdataVISC[2][$k] = $cell[$k + 1][202];
      /*Visc 100*/
      $vdataTAN_TBN[1][$k] = $cell[$k + 1][203];
      /*TAN*/
      $vdataTAN_TBN[2][$k] = $cell[$k + 1][204];
      /*TBN*/
      $k++;
    }

    $titlewear[1] = "Fe";
    $titlewear[2] = "Cu";
    $titlewear[3] = "Al";
    $titlewear[4] = "Cr";
    $titlewear[5] = "Ni";
    $titlewear[6] = "Sn";
    $titlewear[7] = "Pb";
    $titleftir[1] = "soot";
    $titleftir[2] = "oxid";
    $titleftir[3] = "nit";
    $titleftir[4] = "sulf";
    $titleftir[5] = "fuel";
    $titleftir[6] = "water";
    $titleftir[7] = "glycol";
    $titleTAN_TBN[1] = "TAN";
    $titleTAN_TBN[2] = "TBN";
    $titleVISC[1] = "Visc 40";
    $titleVISC[2] = "Visc 100";
    $vlabel  = array();
    $vlabel[0] = $cell[1][3];
    $vlabel[1] = $cell[2][3];
    $vlabel[2] = $cell[3][3];
    $vlabel[3] = $cell[4][3];
    $vlabel[4] = $cell[5][3];

    $graph1 = "graph01" . $ii . ".jpg";
    $graph2 = "graph02" . $ii . ".jpg";
    $graph3 = "graph03" . $ii . ".jpg";
    $graph4 = "graph04" . $ii . ".jpg";

 /*   chartbaru($vdatawearmat, $vlabel, $dbdirgraph . $graph1, $titlewear, "WEAR TRENDING", $jml);
    chartbaru($vdataftirmat, $vlabel, $dbdirgraph . $graph2, $titleftir, "CONTAMINANT - FTIR ANALYSIS", $jml);
  chartbaru($vdataTAN_TBN, $vlabel, $dbdirgraph . $graph3, $titleTAN_TBN, "TBN - TAN", $jml);
 chartbaru($vdataVISC, $vlabel, $dbdirgraph . $graph4, $titleVISC, "Viscosity", $jml);
*/
    $cellTitle[101] = "Lab. Number";
    $cellTitle[102] = "Sampling Date";
    $cellTitle[103] = "Received Date";
    $cellTitle[104] = "Report Date";
    $cellTitle[105] = "Hours on Oil";
    $cellTitle[106] = "Hours On Unit";
    //$cellTitle[107] = "Lube Oil Name";
    $cellTitle[107] = "Oil Change";
    $cellTitle[201] = "Visc@40C (*)";
    $cellTitle[202] = "Visc@100C (*)";
    $cellTitle[203] = "TAN";
    $cellTitle[204] = "TBN";

    $cellTitle[301] = "Magnesium (Mg)";
    $cellTitle[302] = "Calcium (Ca)";
    $cellTitle[303] = "Zinc (Zn)";
    //$cellTitle[304] = "Molybdenum (Mo)";
    $cellTitle[304] = "Boron";
    $cellTitle[305] = "Phosphor";
    $cellTitle[401] = "Natrium (Na)";
    $cellTitle[402] = "Silicon (Si)";
    //$cellTitle[403] = "Fuel Dilution";
    //$cellTitle[404] = "Water Content";
    //$cellTitle[405] = "Glycol";

    $cellTitle[501] = "Iron (Fe)";
    $cellTitle[502] = "Copper (Cu)";
    $cellTitle[503] = "Alumunium (Al)";
    $cellTitle[504] = "Chromium (Cr)";
    $cellTitle[505] = "Nickel (Ni)";
    $cellTitle[506] = "Tin (Sn)";
    $cellTitle[507] = "Lead (Pb)";
    $cellTitle[508] = "PQ Index";
    $cellTitle[509] = "Color";
    $cellTitle[601] = "Soot";
    $cellTitle[602] = "Oxidation";
    $cellTitle[603] = "Nitration";
    $cellTitle[604] = "Sulfation";
    $cellTitle[605] = "Fuel Dilution";
    $cellTitle[606] = "Water Content";
    $cellTitle[607] = "Glycol";
    $cellTitle[701] = "4 um";
    $cellTitle[702] = "6 um";
    $cellTitle[703] = "14 um";
    $cellTitle[704] = "ISO CODE";
    $cellTitle[801] = "Seq.I";
    $cellTitle[802] = "Seq.II";
    $cellTitle[803] = "Seq.III";

    $cellunit[201] = "cSt";
    $cellunit[202] = "cSt";
    $cellunit[203] = "mg KOH/g";
    $cellunit[204] = "mg KOH/g";
    $cellunit[301] = "ppm";
    $cellunit[302] = "ppm";
    $cellunit[303] = "ppm";
    //$cellunit[304] = "ppm";
    $cellunit[304] = "ppm";
    $cellunit[305] = "ppm";
    $cellunit[401] = "ppm";
    $cellunit[402] = "ppm";
    $cellunit[403] = "%v";
    $cellunit[404] = "%v";
    $cellunit[405] = "%v";
    $cellunit[501] = "ppm";
    $cellunit[502] = "ppm";
    $cellunit[503] = "ppm";
    $cellunit[504] = "ppm";
    $cellunit[505] = "ppm";
    $cellunit[506] = "ppm";
    $cellunit[507] = "ppm";
    //$cellunit[508] = "";
    $cellunit[601] = "Abs/cm";
    $cellunit[602] = "Abs/cm";
    $cellunit[603] = "Abs/cm";
    $cellunit[604] = "Abs/cm";
    $cellunit[605] = "ppm";
    $cellunit[606] = "ppm";
    $cellunit[607] = "ppm";
    $cellunit[701] = "Particles/ml";
    $cellunit[702] = "Particles/ml";
    $cellunit[703] = "Particles/ml";
    $cellunit[704] = "-";
    $cellunit[801] = "ml/ml";
    $cellunit[802] = "ml/ml";
    $cellunit[803] = "ml/ml";
    $cellunit[31] = "-";
    $cellmethod[201] = "ASTM D445-12";
    $cellmethod[202] = "ASTM D445-12";
    $cellmethod[203] = "ASTM D974-12";
    $cellmethod[204] = "ASTM D2896-11";
    $cellmethod[301] = "ASTM D 5185-13e1";
    $cellmethod[302] = "ASTM D 5185-13e1";
    $cellmethod[303] = "ASTM D 5185-13e1";
    //$cellmethod[304] = "ASTM D5185-09";
    $cellmethod[304] = "ASTM D5185-09";
    $cellmethod[305] = "ASTM D5185-09";
    $cellmethod[401] = "ASTM D 5185-13e1";
    $cellmethod[402] = "ASTM D 5185-13e1";

    $cellmethod[403] = "ASTM D 5185-13e1";
    $cellmethod[404] = "ASTM D 5185-13e1";
    $cellmethod[405] = "ASTM D 5185-13e1";
    $cellmethod[501] = "ASTM D 5185-13e1";
    $cellmethod[502] = "ASTM D 5185-13e1";
    $cellmethod[503] = "ASTM D 5185-13e1";
    $cellmethod[504] = "ASTM D 5185-13e1";
    $cellmethod[505] = "ASTM D 5185-13e1";
    $cellmethod[506] = "ASTM D 5185-13e1";
    $cellmethod[507] = "ASTM D 5185-13e1";
    $cellmethod[508] = "";
    $cellmethod[509] = "";
    $cellmethod[601] = "ASTM E2412-10";
    $cellmethod[602] = "ASTM E2412-10";
    $cellmethod[603] = "ASTM E2412-10";
    $cellmethod[604] = "ASTM E2412-10";
    $cellmethod[605] = "ASTM E2412-10";
    $cellmethod[606] = "ASTM E2412-10";
    $cellmethod[607] = "ASTM E2412-10";
    $cellmethod[701] = "";
    $cellmethod[702] = "";
    $cellmethod[703] = "";
    $cellmethod[704] = "ISO 4406";
    $cellmethod[801] = "ASTM D892";
    $cellmethod[802] = "ASTM D892";
    $cellmethod[803] = "ASTM D892";

    $pdf->SetY(1.7);
    $pdf->Image('image/logo.png', 1, 1, 12);
    $pdf->SetLineWidth(0.025);
    $pdf->SetFillColor(225);
    $pdf->RoundedRect(14.65,1.5, 6.18, 0.9, 0.15, 'DF');
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(1.87, 0.4, '', 0, 0, 'L');
    $pdf->Cell(9.35, -0.3, '', 0, 0, 'L');

    $pdf->image('phpimages/KAN_kalibrasi_.png', 15.8, 0, 2);
    $pdf->image('phpimages/KAN_penguji.png', 17.8, 0, 2);

    if ($noreport <> '') {
      $pdf->SetFont('Arial', 'UB', 12);
      $pdf->Cell(11, 0.3, 'OIL ANALYSIS REPORT', 0, 0, 'C');
    } else {
      $pdf->SetFont('Arial', 'B', 12);
      $pdf->Cell(11, 0.5, 'OIL ANALYSIS REPORT', 0, 0, 'C');
    }

    $pdf->Ln(0);
    $pdf->Cell(1.87, 0.4, '', 0, 0, 'L');
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(2.4);
    $pdf->Cell(6.18, 0.5, '', 0, 1, 'C');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Ln(-0.24);
    $pdf->Cell(1.87, 0.4, '', 0, 0, 'L');
    $pdf->SetFont('Arial', 'B', 6.25);
    $pdf->Ln(0);
    $pdf->Cell(1.87, 0.4, '', 0, 0, 'L');
    $pdf->SetFont('Arial', 'B', 6.25);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(30, 0.5, $noreport, 0, 0, 'C');
    $pdf->SetFont('Arial', '', 7);
    $pdf->SetLineWidth(0.05);
    //$pdf->Line(20.80, 2, 1, 2);
    //$pdf->Line(20.80, 3.35, 1, 3.35);
    $pdf->Line(20.80, 2.67, 1, 2.67);
    $pdf->Line(20.80, 4.3, 1, 4.3);
    $pdf->Ln(0.93);

    //line 1
    $pdf->Cell(0.2, 0.13, '', 0, 0, 'L');
    $pdf->Cell(2.4, 0.13, 'Customer Name', 0, 0, 'L');
    $pdf->Cell(7.2, 0.13, ' :  ' . $branch_nm, 0, 0, 'L');
    $pdf->Cell(2.4, 0.13, 'Component', 0, 0, 'L');
    $pdf->Cell(4.2, 0.13, ' :  ' . $component, 0, 0, 'L');

   // $pdf->Cell(2.4, 0.13, 'Viscosity@100\B0C', 0, 0, 'L');
   // $pdf->Cell(2.4, 0.13, ' :  ' . $visc_100, 0, 0, 'L');

    //line 2
    $pdf->Ln(0.27);
    $pdf->Cell(0.2, 0.13, '', 0, 0, 'L');
    $pdf->Cell(2.4, 0.13, 'For Attention', 0, 0, 'L');
    $pdf->Cell(7.2, 0.13, ' :  ' . $name, 0, 0, 'L');
    $pdf->Cell(2.4, 0.13, 'Component Matrix', 0, 0, 'L');
    $pdf->Cell(4.2, 0.13, ' :  ' . $matrik, 0, 0, 'L');

  //  $pdf->Cell(2.4, 0.13, 'Viscosity@40\B0C', 0, 0, 'L');
  //  $pdf->Cell(2.4, 0.13, ' :  ' . $visc_40, 0, 0, 'L');

    //line 3
    $pdf->Ln(0.27);
    $pdf->Cell(0.2, 0.3, '', 0, 0, 'L');
    $pdf->Cell(2.4, 0.13, 'Address');
    $pdf->Cell(7.2, 0.13, ' :  ' . $vaddress_nm);
    $pdf->Cell(2.4, 0.13, 'Oil Matrix', 0, 0, 'L');
    $pdf->Cell(2.4, 0.13, ' :  ' . $oil_matrix, 0, 0, 'L');
  //  $pdf->Cell(2.4, 0.13, $vcaption, 0, 0, 'L');
  //  $pdf->Cell(2.4, 0.13, ' :  ' . $vvalue, 0, 0, 'L');

    //line 4
    $pdf->Ln(0.27);
    $pdf->Cell(0.2, 0.13, '', 0, 0, 'L');
    $pdf->Cell(2.4, 0.13, 'Unit Model', 0, 0, 'L');
    $pdf->Cell(7.2, 0.13, ' :  ' . $model, 0, 0, 'L');
    $pdf->Cell(2.4, 0.13, 'Lube Oil Name', 0, 0, 'L');
    $pdf->Cell(2.4, 0.13, ' :  '.$oil_type, 0, 0, 'L');

    //line 5
    $pdf->Ln(0.27);
    $pdf->Cell(0.2, 0.13, '', 0, 0, 'L');
    $pdf->Cell(2.4, 0.13, 'Unit Number', 0, 0, 'L');
    $pdf->Cell(4.2, 0.13, ' :  ' . $unit_no, 0, 0, 'L');
    $pdf->Ln(0.43);

    $x = $pdf->GetY();
    $pdf->SetY($x);
    $pdf->SetFont('Arial', 'B', 8);
    $j = 1;
    $pdf->Cell(17);
    $pdf->SetFont('Arial', 'B', 6);
    $pdf->Cell(3, 0.5, 'Overall Analysis Result:', 0, 0, 'C');
    $evalcode = $cell[$jml][44];

    if ($evalcode == "D") {
      $eval = "SEVERE";
      $pdf->Ln(0);
      $pdf->Image('image/merah.jpg', 18.85, 4.85, 1.15);
      $pdf->SetFont('Arial', 'B', 9);
      $pdf->Ln(0.3);
      $pdf->Cell(17);
      $pdf->Cell(3, 4.8, 'SEVERE', 0, 0, 'C');
      $pdf->Ln(-0.6);
    }
    if (($evalcode == "C") or ($evalcode == "U")) {
      $eval = "URGENT";
      $pdf->Ln(0);
      $pdf->Image('image/merah.jpg', 18.85, 4.85, 1.15);
      $pdf->SetFont('Arial', 'B', 9);
      $pdf->Ln(0.3);
      $pdf->Cell(17);
      $pdf->Cell(3, 4.8, 'URGENT', 0, 0, 'C');
      $pdf->Ln(-0.6);
    }
    if ($evalcode == "B") {
      $eval = "ATTENTION";
      $pdf->Ln(0);
      $pdf->Image('image/kuning.jpg', 18.85, 4.85, 1.15);
      $pdf->SetFont('Arial', 'B', 9);
      $pdf->Ln(0.3);
      $pdf->Cell(17);
      $pdf->Cell(3, 4.8, 'ATTENTION', 0, 0, 'C');
      $pdf->Ln(-0.6);
    }
    if ($evalcode == "N") {
      $eval = "NORMAL";
      $pdf->Ln(0);
      $pdf->Image('image/biru.jpg', 18.85, 4.85, 1.15);
      $pdf->SetFont('Arial', 'B', 9);
      $pdf->Ln(0.3);
      $pdf->Cell(17);
      $pdf->Cell(3, 4.8, 'NORMAL', 0, 0, 'C');
      $pdf->Ln(-0.6);
    }
    if ($evalcode == "") {
      $eval = "NORMAL";
      $pdf->Ln(0);
      $pdf->Image('image/biru.jpg', 18.85, 4.85, 1.15);
      $pdf->SetFont('Arial', 'B', 9);
      $pdf->Ln(0.3);
      $pdf->Cell(17);
      $pdf->Cell(3, 4.8, 'NORMAL', 0, 0, 'C');
      $pdf->Ln(-0.6);
    }
    $pdf->Ln(-4.5);
    $lebar = 0.30;
    $pdf->Ln();
    $data1 = NULL;

    for ($j = 101; $j <= 107; $j++) {
      $data1[$j] = array(
        $cellTitle[$j],
        $cellunit[$j],
        $cellmethod[$j],
        alarm($cell[1][$j], $cell_c[1][$j]),
        alarm($cell[2][$j], $cell_c[2][$j]),
        alarm($cell[3][$j], $cell_c[3][$j]),
        alarm($cell[4][$j], $cell_c[4][$j]),
        alarm($cell[5][$j], $cell_c[5][$j]),
        $matrix[$j],
        $matrix[$j]
      );
    }
    $header1 = array(
      'TEST DETAILS',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      ''
    );
    $pdf->ImprovedTable($header1, $data1, 1);
    $data2 = NULL;
    $pdf->Ln();

    for ($j = 201; $j <= 202; $j++) {
      $data2[$j - 200] = array(
        $cellTitle[$j],
        $cellunit[$j],
        $cellmethod[$j],
        alarm($cell[1][$j], $cell_c[1][$j]),
        alarm($cell[2][$j], $cell_c[2][$j]),
        alarm($cell[3][$j], $cell_c[3][$j]),
        alarm($cell[4][$j], $cell_c[4][$j]),
        alarm($cell[5][$j], $cell_c[5][$j]),
        $minmatrix[$j],
        $matrix[$j]
      );
    }
    $j = 203;


//	  if (((strtoupper($component) <> "ENGINE") and (strtoupper($component) <> "ENGINE UPPER") and (strtoupper($component) <> "ENGINE LOWER") and (strtoupper($component) <> "NEW OIL B")) and ($j == 203)) {
      $data2[$j - 200] = array(
        $cellTitle[$j],
        $cellunit[$j],
        $cellmethod[$j],
        alarm($cell[1][$j], $cell_c[1][$j]),
        alarm($cell[2][$j], $cell_c[2][$j]),
        alarm($cell[3][$j], $cell_c[3][$j]),
        alarm($cell[4][$j], $cell_c[4][$j]),
        alarm($cell[5][$j], $cell_c[5][$j]),
        $minmatrix[$j],
        $matrix[$j]
      );
 //   }
    $j = 204;

 //   if (((strtoupper($component) == "ENGINE") or (strtoupper($component) == "ENGINE UPPER") or (strtoupper($component) == "ENGINE LOWER") or (strtoupper($component) == "NEW OIL B")) and ($j == 204)) {
      $data2[$j - 200] = array(
        $cellTitle[$j],
        $cellunit[$j],
        $cellmethod[$j],
        alarm($cell[1][$j], $cell_c[1][$j]),
        alarm($cell[2][$j], $cell_c[2][$j]),
        alarm($cell[3][$j], $cell_c[3][$j]),
        alarm($cell[4][$j], $cell_c[4][$j]),
        alarm($cell[5][$j], $cell_c[5][$j]),
        $minmatrix[$j],
        $matrix[$j]
      );
 //   }
    $header2 = array(
      'Physical Test',
      'Unit',
      'Method',
      '',
      '',
      'Test Value',
      '',
      '',
      'Attention',
      'Urgent'
    );
    $pdf->SetFillColor(235);
    $pdf->Cell(17.1, 0.5, '', 0, 1, 'C', 1);
    $pdf->Ln(-0.5);
    $pdf->ImprovedTable($header2, $data2, 2);
    $data3 = NULL;
    $pdf->Ln();

    for ($j = 301; $j <= 305; $j++) {
      $data3[$j - 300] = array(
        $cellTitle[$j],
        $cellunit[$j],
        $cellmethod[$j],
        alarm($cell[1][$j], $cell_c[1][$j]),
        alarm($cell[2][$j], $cell_c[2][$j]),
        alarm($cell[3][$j], $cell_c[3][$j]),
        alarm($cell[4][$j], $cell_c[4][$j]),
        alarm($cell[5][$j], $cell_c[5][$j]),
        null,
        null
      );

    }
    $header3 = array(
      'Metal Additive',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      'Warning',
      'Limit'
    );
    $pdf->SetFillColor(235);
    $pdf->Cell(17.1, 0.5, '', 0, 1, 'C', 1);
    $pdf->Ln(-0.5);
    $pdf->ImprovedTable($header3, $data3, 3);
    $data4 = NULL;
    $pdf->Ln();

    for ($j = 401; $j <= 402; $j++) {
      $data4[$j - 400] = array(
        $cellTitle[$j],
        $cellunit[$j],
        $cellmethod[$j],
        alarm($cell[1][$j], $cell_c[1][$j]),
        alarm($cell[2][$j], $cell_c[2][$j]),
        alarm($cell[3][$j], $cell_c[3][$j]),
        alarm($cell[4][$j], $cell_c[4][$j]),
        alarm($cell[5][$j], $cell_c[5][$j]),
        $minmatrix[$j],
        $matrix[$j]
      );
    }
    $header4 = array(
      'Contaminant',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      ''
    );
    $pdf->SetFillColor(235);
    $pdf->Cell(17.1, 0.5, '', 0, 1, 'C', 1);
    $pdf->Ln(-0.5);
    $pdf->ImprovedTable($header4, $data4, 3);
    $data5 = NULL;
    $pdf->Ln();

    for ($j = 501; $j <= 509; $j++) {
      $data5[$j - 500] = array(
        $cellTitle[$j],
        $cellunit[$j],
        $cellmethod[$j],
        alarm($cell[1][$j], $cell_c[1][$j]),
        alarm($cell[2][$j], $cell_c[2][$j]),
        alarm($cell[3][$j], $cell_c[3][$j]),
        alarm($cell[4][$j], $cell_c[4][$j]),
        alarm($cell[5][$j], $cell_c[5][$j]),
        $minmatrix[$j],
        $matrix[$j]
      );
    }
    $header5 = array(
      'Wear Metal',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      ''
    );
    $pdf->SetFillColor(235);
    $pdf->Cell(17.1, 0.5, '', 0, 1, 'C', 1);
    $pdf->Ln(-0.5);
    $pdf->ImprovedTable($header5, $data5, 3);
    $data6 = NULL;
    $pdf->Ln();

    if ((strtoupper($component) == "ENGINE") || (strtoupper($component) != "ENGINE UPPER")) {
      for ($j = 601; $j <= 607; $j++) {
        $data6[$j - 600] = array(
          $cellTitle[$j],
          $cellunit[$j],
          $cellmethod[$j],
          alarm($cell[1][$j], $cell_c[1][$j]),
          alarm($cell[2][$j], $cell_c[2][$j]),
          alarm($cell[3][$j], $cell_c[3][$j]),
          alarm($cell[4][$j], $cell_c[4][$j]),
          alarm($cell[5][$j], $cell_c[5][$j]),
          $minmatrix[$j],
          $matrix[$j]
        );
      }
    } else {
      $j    = 602;
      $data6[1] = array(
        $cellTitle[$j],
        $cellunit[$j],
        $cellmethod[$j],
        alarm($cell[1][$j], $cell_c[1][$j]),
        alarm($cell[2][$j], $cell_c[2][$j]),
        alarm($cell[3][$j], $cell_c[3][$j]),
        alarm($cell[4][$j], $cell_c[4][$j]),
        alarm($cell[5][$j], $cell_c[5][$j]),
        $minmatrix[$j],
        $matrix[$j]
      );
    }

    $header6 = array(
      'FTIR',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      'Warning',
      'Limit'
    );
    $pdf->SetFillColor(235);
    $pdf->Cell(17.1, 0.5, '', 0, 1, 'C', 1);
    $pdf->Ln(-0.5);
    $pdf->ImprovedTable($header6, $data6, 3);
    $pdf->Ln();
    $coeff = 0;






    if ((strtoupper($component) == "ENGINE") or (strtoupper($component) == "ENGINE UPPER") or (strtoupper($component) == "ENGINE LOWER")) {
      for ($j = 704; $j <= 704; $j++) {
        $data7[$j - 704] = array(
          $cellTitle[$j],
          $cellunit[$j],
          $cellmethod[$j],
          alarm($cell[1][$j], $cell_c[1][$j]),
          alarm($cell[2][$j], $cell_c[2][$j]),
          alarm($cell[3][$j], $cell_c[3][$j]),
          alarm($cell[4][$j], $cell_c[4][$j]),
          alarm($cell[5][$j], $cell_c[5][$j]),
          $minmatrix[$j],
          $matrix[$j]
        );
      }
      $header7 = array(
        'Other Analysis',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        ''
      );
    } else {
      $coeff = 2.5;

      for ($j = 701; $j <= 704; $j++) {
        $data7[$j - 700] = array(
          $cellTitle[$j],
          $cellunit[$j],
          $cellmethod[$j],
          alarm($cell[1][$j], $cell_c[1][$j]),
          alarm($cell[2][$j], $cell_c[2][$j]),
          alarm($cell[3][$j], $cell_c[3][$j]),
          alarm($cell[4][$j], $cell_c[4][$j]),
          alarm($cell[5][$j], $cell_c[5][$j]),
          $minmatrix[$j],
          $matrix[$j]
        );
      }
      $header7 = array(
        'Cleanliness',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        ''
      );
    $pdf->SetFillColor(235);
    $pdf->Cell(17.1, 0.5, '', 0, 1, 'C', 1);
    $pdf->Ln(-0.5);
    $pdf->ImprovedTable($header7, $data7, 3);
    $pdf->Ln();
    $coeff = 0;

      for ($j = 801; $j <= 803; $j++) {
        $data8[$j - 800] = array(
          $cellTitle[$j],
          $cellunit[$j],
          $cellmethod[$j],
          alarm($cell[1][$j], $cell_c[1][$j]),
          alarm($cell[2][$j], $cell_c[2][$j]),
          alarm($cell[3][$j], $cell_c[3][$j]),
          alarm($cell[4][$j], $cell_c[4][$j]),
          alarm($cell[5][$j], $cell_c[5][$j]),
          $minmatrix[$j],
          $matrix[$j]
        );
      }
      $header8 = array(
        'Foaming Characteristic',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        ''
      );

    }

	      $header9 = array(
        'OTHERS',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        ''
      );

	$Others=0;
	//$ke=3;
	Cari_Other($data9,$lab_no,$Others,$Jml,$jmlkolom);
//$Jml=5;
      $pdf->Ln();
      $pdf->SetFillColor(235);
      $pdf->Cell(17.1, 0.5, '', 0, 1, 'C', 1);
      $pdf->Ln(-0.5);
      $pdf->ImprovedTable($header9, $data9, $Jml);

	$coeff=0;

    $pdf->SetDrawColor(0);
    $pdf->SetLineWidth(0.05);
    $coeff = $coeff + 23.4;
    $pdf->Line(20.80, $coeff , 1, $coeff );

    $pdf->Image('image/' . $graph1, 1, $coeff + 0.1, 9.2);
    $pdf->Image('image/' . $graph2, 11.3, $coeff + 0.1, 9.2);
   // $pdf->Image('image/' . $graph3, 1, $coeff + 22.2, 9.2);
  //  $pdf->Image('image/' . $graph4, 11.3, $coeff + 22.2, 9.2);
	$pdf->SetXY(16,29.4);
    $pdf->Ln(-2.5);
    $mcfile = 'upload/gambar/MC_'.$lab_no.'.jpg';
    $edit = 'http://'.$_SERVER['HTTP_HOST'].'tbl_transactionedit.php?Lab_No='.$lab_no;
    if (file_exists($mcfile)) {
      /*
      $pdf->addpage();
      $pdf->Image($mcfile,6.7,5,8);
      $text = 'Micro Analysis';
      $pdf->SetFont('Arial','B',10);
      $pdf->Ln(10);
      $pdf->Cell(19.5,1,$text,0,0,'C');
      */
      $pdf->SetFont('Arial', 'BU', 7.5);
//      $pdf->Ln(6);
      $pdf->Cell(3, 0.8, 'Source of Abnormality', 0, 0, 'L', '', $_SERVER['HTTP_HOST'].'/pap2/tbl_transactionedit.php?Lab_No='.$lab_no);
      $pdf->Ln(0.6);
      $pdf->SetFont('Arial', '', 7);
      $pdf->multiCell(13.6, 0.3, $recomm1, 0, 1, 'L');
      $pdf->Ln(0.4);
      $pdf->SetFont('Arial', 'BU', 7.5);
      $pdf->Cell(3, 0.8, 'Action to be taken', 0, 0, 'L', '', $_SERVER['HTTP_HOST'].'/pap2/tbl_transactionedit.php?Lab_No='.$lab_no);
      $pdf->Ln(0.6);
      $pdf->SetFont('Arial', '', 7);
      $pdf->multiCell(13.6, 0.3, $recomm2, 0, 1, 'L');
      $pdf->Image($mcfile,14.5,28.4,6);
    } else {
      $pdf->SetFont('Arial', 'BU', 7.5);
 //     $pdf->Ln(6);
      $pdf->Cell(5, 0.8, 'Source of Abnormality', 0, 0, 'L', '', $_SERVER['HTTP_HOST'].'/pap2/tbl_transactionedit.php?Lab_No='.$lab_no);
      $pdf->Ln(0.6);
      $pdf->SetFont('Arial', '', 7);
      $pdf->multiCell(19.5, 0.3, $recomm1, 0, 1, 'L');
      $pdf->Ln(0.4);
      $pdf->SetFont('Arial', 'BU', 7.5);
      $pdf->Cell(5, 0.8, 'Action to be taken', 0, 0, 'L', '', $_SERVER['HTTP_HOST'].'/pap2/tbl_transactionedit.php?Lab_No='.$lab_no);
      $pdf->Ln(0.6);
      $pdf->SetFont('Arial', '', 7);
      $pdf->multiCell(19.5, 0.3, $recomm2, 0, 1, 'L');




  }
           $pdf->Ln(1);
      $pdf->SetFont('Arial', 'BU', 7.5);
	  $pdf->Cell(15, 0.8, '', 0, 0, 'L');
	  $pdf->SetXY(16,29.4);
      $pdf->Cell(10, 0.8, 'Manager Teknis', 0, 0, 'L');
	  	include_once("ewcfg12.php");
	$dbserver   = $EW_CONN["DB"]["host"];
	$dbuser   = $EW_CONN["DB"]["user"];
	$dbpassword = $EW_CONN["DB"]["pass"];
	$dbdatabase = $EW_CONN["DB"]["db"];
	@$lab_no = $_GET['vlab_no'];
	$conn = mysql_Connect($dbserver.':3306', $dbuser, $dbpassword);
	$pilih   = mysql_select_db($dbdatabase, $conn);

		 $query = "SELECT * FROM tbl_transaction WHERE Lab_No='$lab_no';";
		$result = mysql_query($query) or die(mysql_error());
		 while($row = mysql_fetch_array($result)){
		$verifikasi =$row['verifikasi'];
		if(($verifikasi == "") or ($verifikasi == "0000-00-00")){
    //  $pdf->Ln(1);
	  // $pdf->Image('image/TTD+STMPL.jpg', 14.7, 28.1, 5);
		}else{
    $pdf->Ln(1);
	   $pdf->Image('image/TTD+STMPL.jpg', 14.7, 30, 5);

		}}

	   $pdf->Ln(2.2);
	   $pdf->Cell(15, 0.8, '', 0, 0, 'L');
	  $pdf->SetXY(16,32.2);
      $pdf->Cell(10, 0.8, 'Reko Sayogo, S.Si', 0, 0, 'L','', '/others_npmp12/tbl_transactionlist.php?psearch='.$lab_no);

	    $pdf->SetFont('Arial', '', 7);
	     $pdf->Ln(0.8);
$pdf->SetXY(1,30);
		  $pdf->Cell(25, 2.6, '(*) Berdasarkan ISO VG Grade dan SAE Viscocity Grade', 0, 0, 'L');
		  	     $pdf->Ln(0.3);
		  $pdf->Cell(25, 2.6, '(*) Catatan   : Data analisa hanya berlaku untuk sample yang diuji di laboratorium PT. Petrolab Services', 0, 0, 'L');
 		  	     $pdf->Ln(0.3);
		  $pdf->Cell(10, 2.6, '     Pengaduan tidak dilayani setelah 30 hari dari tanggal report di terbitkan ', 0, 0, 'L');
	include_once("ewcfg12.php");
	$dbserver   = $EW_CONN["DB"]["host"];
	$dbuser   = $EW_CONN["DB"]["user"];
	$dbpassword = $EW_CONN["DB"]["pass"];
	$dbdatabase = $EW_CONN["DB"]["db"];
	@$lab_no = $_GET['vlab_no'];
	$conn = mysql_Connect($dbserver.':3306', $dbuser, $dbpassword);
	$pilih   = mysql_select_db($dbdatabase, $conn);

		 $query = "SELECT * FROM tbl_transaction WHERE Lab_No='$lab_no';";
		$result = mysql_query($query) or die(mysql_error());
		 while($row = mysql_fetch_array($result)){
		$verifikasi =$row['verifikasi'];
		if(($verifikasi == "") or ($verifikasi == "0000-00-00")) {
//		$pdf->SetFont('Arial', 'BU', 7.5);
//		$pdf->SetXY(16,30);
//		$pdf->Cell(10, 0.8, 'Reko Sayogo, S.Si', 0, 0, 'L','', '/others_npmp12/tbl_transactionlist.php');
//		$pdf->SetFont('Arial', '', 7);
	$pdf->Ln(2);
		  $pdf->Cell(25, 0.9, '                                                                                                             Page 1 Of 1                                                                                                                RK/5.10/01/01/02', 0, 0, 'L');

	  }else{
		  		$pdf->SetFont('Arial', '', 7);
			$pdf->Ln(0.3);
		  $pdf->Cell(10, 2.6, '(*) Verifikasi : '.$verifikasi, 0, 0, 'L','');
			$pdf->SetFont('Arial', '', 7);
//			$pdf->SetY(32.4);
		  	     $pdf->Ln(1.8);
		  $pdf->Cell(25, 0.8, '                                                                                                             Page 1 Of 1                                                                                                                RK/5.10/01/01/02', 0, 0, 'L');

		 }}


    //Page number
  //  $pdf->Cell(2,0.5,'Page '.$pdf->PageNo().' Of {nb}',0,0,'C');

    /*
    $vfile = 'gambar/' . $lab_no . '.jpg';
    if (file_exists($vfile)) {
      $pdf->addpage();
      $pdf->Image($vfile, 6.7, 5, 8);
      $text = 'Foaming Tendency pada seq 1 = ' . fSeq_I($seq_I) . ' ml';
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Ln(10);
      $pdf->Cell(19.5, 1, $text, 0, 0, 'C');
    }
    */

    /*
    $pdf->addpage();
    $text = 'Magnetic Plug and Filter Cutting';
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(19.5, 1, $text, 0, 0, 'C');
    $pdf->Ln();
    $pdf->Cell(5, 1, "Rating", "L T B", 0, "L", 1);
    $pdf->Cell(6, 1, "Picture", "T B", 0, "L", 1);
    $pdf->Cell(8.5, 1, "Notes", "T B R", 0, "L", 1);
    $pdf->Ln();
    $pdf->Cell(5, 10, "A", "L T B", 0, "L", 0);
    $pdf->Image('image/mp.jpg', 3.6, 3.4, 8);
    $pdf->Cell(6, 10, "", "T B", 0, "L", 0);
    $pdf->Cell(8.5, 10, "Notes", "T B R", 0, "L", 0);
    $pdf->Ln();
    $pdf->Cell(5, 7, "A", "L T B", 0, "L", 0);
    $pdf->Image('image/fc.jpg', 3.6, 13.4, 8);
    $pdf->Cell(6, 7, "", "T B", 0, "L", 0);
    $pdf->Cell(8.5, 7, "Notes", "T B R", 0, "L", 0);
    */
  }

  $pdf->Output( 'Used Oil-'.$_GET["labNumber"].'.'.'pdf','D');
}

function find_rec($code1, $code2, $code3, $owner, $company, $lab_no) {
  include_once("ewcfg12.php");
  $dbserver   = $EW_CONN["DB"]["host"];
  $dbuser   = $EW_CONN["DB"]["user"];
  $dbpassword = $EW_CONN["DB"]["pass"];
  $dbdatabase = $EW_CONN["DB"]["db"];
  $conn    = mysqli_Connect('localhost', $dbuser, $dbpassword,$dbdatabase);
  $condition = "";

  if ($conn) {
    /*$pilih   = mysqli_select_db($dbdatabase, $conn);*/
    $condition = " where lab_no='" . $lab_no . "'";
    $sqlstr = "select component,unit_id,Date(recv_dt1),name, lab_no  from tbl_transaction " . $condition;
    $hasil  = mysqli_query($conn,$sqlstr);
    $row  = mysqli_fetch_row($hasil);
    list($code1, $code2, $code3, $company, $lab_no) = $row;
  }
}

// MAIN
$lab_no   = $_GET["labNumber"];
/*$vtgl1  = $_GET["vtgl1"];
$vtgl2  = $_GET["vtgl2"];
$vgroup   = $_GET["vgroup"];
$vcust_id = $_GET["vcust_id"];*/
$vtgl1   = '';
$vtgl2   = '';
$vtgl_1   = '';
$vtgl_2   = '';
$vgroup   = '';
$vcust_id   = '';

if (($vtgl1 != '') && ($vtgl2 != '')) {
  $vtgl_1 = substr($vtgl1, 6, 4) . "-" . substr($vtgl1, 3, 2) . "-" . substr($vtgl1, 0, 2);
  $vtgl_2 = substr($vtgl2, 6, 4) . "-" . substr($vtgl2, 3, 2) . "-" . substr($vtgl2, 0, 2);
}

show_rpt_5($lab_no, $vtgl_1, $vtgl_2, $vgroup, $vcust_id);
/*show_rpt_5('','','','','');*/
?>
