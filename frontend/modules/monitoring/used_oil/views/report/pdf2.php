<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use yii\helpers\Url;
use kartik\sidenav\SideNav;
/*use frontend\assets\InspiniaAsset;
InspiniaAsset::register($this);*/
/*use frontend\assets\BootstrapAsset;
BootstrapAsset::register($this);*/
/*use frontend\assets\AppAsset;
AppAsset::register($this);*/

$this->registerCssFile("@web/report/pdf.css");

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Print Invoice</title>

    <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
        <div id="wrapper">
            <p style="text-align:center; font-weight:bold; padding-top:5mm;">INVOICE</p>
            <br />
            <table class="heading" style="width:100%;">
                <tr>
                    <td style="width:80mm;">
                        <h1 class="heading">ABC Corp</h1>
                        <h2 class="heading">
					123 Happy Street
                            <br />
					CoolCity - Pincode
                            <br />
					Region , Country
                            <br />
					
					Website : www.website.com
                            <br />
					E-mail :
                            <a class="__cf_email__" href="/cdn-cgi/l/email-protection" data-cfemail="d9b0b7bfb699aebcbbaab0adbcf7bab6b4">[email&#160;protected]</a>
                            <script data-cfhash='f9e31' type="text/javascript">/* 
                                <![CDATA[ */!function(t,e,r,n,c,a,p){try{t=document.currentScript||function(){for(t=document.getElementsByTagName('script'),e=t.length;e--;)if(t[e].getAttribute('data-cfhash'))return t[e]}();if(t&&(c=t.previousSibling)){p=t.parentNode;if(a=c.getAttribute('data-cfemail')){for(e='',r='0x'+a.substr(0,2)|0,n=2;a.length-n;n+=2)e+='%'+('0'+('0x'+a.substr(n,2)^r).toString(16)).slice(-2);p.replaceChild(document.createTextNode(decodeURIComponent(e)),c)}p.removeChild(t)}}catch(u){}}()/* ]]> */
                            </script>
                            <br />
					Phone : +1 - 123456789
                        </h2>
                    </td>
                    <td rowspan="2" valign="top" align="right" style="padding:3mm;">
                        <table>
                            <tr>
                                <td>Invoice No : </td>
                                <td>11-12-17</td>
                            </tr>
                            <tr>
                                <td>Dated : </td>
                                <td>01-Aug-2011</td>
                            </tr>
                            <tr>
                                <td>Currency : </td>
                                <td>USD</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Buyer</b> :
                        <br />
    			Client Name
                        <br />
			Client Address
                        <br />
    			City - Pincode , Country
                        <br />
                    </td>
                </tr>
            </table>
            <div id="content">
                <div id="invoice_body">
                    <table>
                        <tr style="background:#eee;">
                            <td style="width:8%;">
                                <b>Sl. No.</b>
                            </td>
                            <td>
                                <b>Product</b>
                            </td>
                            <td style="width:15%;">
                                <b>Quantity</b>
                            </td>
                            <td style="width:15%;">
                                <b>Rate</b>
                            </td>
                            <td style="width:15%;">
                                <b>Total</b>
                            </td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td style="width:8%;">1</td>
                            <td style="text-align:left; padding-left:10px;">Software Development
                                <br />Description : Upgradation of telecrm
                            </td>
                            <td class="mono" style="width:15%;">1</td>
                            <td style="width:15%;" class="mono">157.00</td>
                            <td style="width:15%;" class="mono">157.00</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td>Total :</td>
                            <td class="mono">157.00</td>
                        </tr>
                    </table>
                </div>
                <div id="invoice_total">
			Total Amount :
			
                    <table>
                        <tr>
                            <td style="text-align:left; padding-left:10px;">One  Hundred And Fifty Seven  only</td>
                            <td style="width:15%;">USD</td>
                            <td style="width:15%;" class="mono">157.00</td>
                        </tr>
                    </table>
                </div>
                <br />
                <hr />
                <br />
                <table style="width:100%; height:35mm;">
                    <tr>
                        <td style="width:65%;" valign="top">
					Payment Information :
                            <br />
					Please make cheque payments payable to :
                            <br />
                            <b>ABC Corp</b>
                            <br />
                            <br />
					The Invoice is payable within 7 days of issue.
                            <br />
                            <br />
                        </td>
                        <td>
                            <div id="box">
					E &amp; O.E.
                                <br />
					For ABC Corp
                                <br />
                                <br />
                                <br />
                                <br />
					Authorised Signatory
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <br />
        </div>
        <htmlpagefooter name="footer">
            <hr />
            <div id="footer">
                <table>
                    <tr>
                        <td>Software Solutions</td>
                        <td>Mobile Solutions</td>
                        <td>Web Solutions</td>
                    </tr>
                </table>
            </div>
        </htmlpagefooter>
        <sethtmlpagefooter name="footer" value="on" />
        <?php $this->endBody() ?> 
    </body>
</html>
<?php $this->endPage() ?>