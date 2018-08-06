<?php require_once('Connections/trident.php'); ?>
<?php if (!isset($_SESSION)) {
  session_start();
}
?>
<?php
mysql_select_db($database_trident, $trident);
$query_Recordset1 = "SELECT invoice FROM transactions ORDER BY id DESC LIMIT 1";
$Recordset1 = mysql_query($query_Recordset1, $trident) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

 $_SESSION['ccode'] = $_POST['id'];
 $_SESSION['ccode2'] = $_SESSION['ccode'];
 $mycodes = $_SESSION['ccode2'];
mysql_select_db($database_trident, $trident);
$query_courses = "SELECT * FROM courses WHERE id=$mycodes";
$courses = mysql_query($query_courses, $trident) or die(mysql_error());
$row_courses = mysql_fetch_assoc($courses);
$totalRows_courses = mysql_num_rows($courses);

/*$colname_courses = "-1";
if (isset($_POST['id'])) {
  $colname_courses = (get_magic_quotes_gpc()) ? $_POST['id'] : addslashes($_POST['id']);
}
mysql_select_db($database_trident, $trident);
$query_courses = sprintf("SELECT * FROM courses WHERE id = %s", $colname_courses);
$courses = mysql_query($query_courses, $trident) or die(mysql_error());
$row_courses = mysql_fetch_assoc($courses);
$totalRows_courses = mysql_num_rows($courses);
*/
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
?>

<?php 
$email = $_REQUEST['email'] ;
  @$messages = $_REQUEST['message'] ;
  @$surname = $_REQUEST['surname'] ;
  @$othernames = $_REQUEST['othernames'] ;
  @$phone = $_REQUEST['phone'] ;
  @$course = $row_courses['course']; 
  @$location = $_REQUEST['location'] ;
  @$price = $row_courses['price']; 
  @$REGISTRATION_ONLY = $_REQUEST['REGISTRATION_ONLY'] ;
  @$check = $_REQUEST['check'] ;
  @$discount = $_REQUEST['discount'] ;
  @$invoice =  $row_Recordset1['invoice']; 
  @$invoice = $invoice + 1;
  @$dated = date("d-m-Y");
  
  
if (!isset($_POST['pay'])) {
/*?><?php 
if(isset($_REQUEST['pay']) && $_REQUEST['pay'] == "payafrica") {
?>
<script language ="JavaScript">
function paywindow(){
 window.open("pay.php", "myWindow", "status = 1, height = 500, widht = 500, resizable = 0");}
</script>

<?php } else { ?>
<script language ="JavaScript">
function paywindow(){
 window.open("pay.php", "myWindow", "status = 1, height = 500, widht = 500, resizable = 0");}
</script>
<?php } ?><?php */?>

  
 
 <style type="text/css"> 
<!--
.style2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style9 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
-->
 </style>
<?
  




  if (!isset($_REQUEST['message'])) 
  {
    @header( "Location: http://www.tridentelect.com/" );
  } elseif (empty($email)) 
  {
    header( "Expires: Wed, 14 Mar 2008 01:00:00 GMT" );
    header( "Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT" );
    header( "Cache-Control: no-cache, must-revalidate" );
    header( "Pragma: no-cache" );

    ?>

<script>
<!--
document.write(unescape("%09%3Chtml%3E%0D%0A%09%3Chead%3E%3Ctitle%3ETRIDENTELECT%20-%20Error%3C/title%3E%3C/head%3E%0D%0A%09%3Cbody%3E%0D%0A%09%3Cp%20align%20%3D%20%22center%22%3E%3Cfont%20color%20%3D%20%22red%22%3EYou%20have%20not%20really%20supplied%20valid%20information.%3C/font%3E%0D%0A%09%3Cbr%3E%0D%0A"));
//-->
</script>

	<div align="center">Please, <a href="javascript:window.close()"><font color = "blue">go back</font></a> to the form and try again.
      <script>
<!--
document.write(unescape("%09%3C/p%3E%0D%0A%09%3C/body%3E%0D%0A%09%3C/html%3E"));
//-->
      </script>
      <?
  }



  elseif (empty($surname) || empty($othernames)) 
  {
   ?>
      <script>
<!--
document.write(unescape("%20%20%20%3Chtml%3E%0D%0A%20%20%20%3Chead%3E%3Ctitle%3ETRIDENTELECT%20-%20Error%3C/title%3E%3C/head%3E%0D%0A%20%20%20%3Cbody%3E%0D%0A%20%20%20%3Cp%20align%20%3D%20%22center%22%3E%3Cfont%20color%20%3D%20%22red%22%3EYou%20have%20not%20supplied%20your%20name.%3C/font%3E%0D%0A%20%20%20%3Cbr%3E%0D%0A"));
//-->
      </script>
Please, <a href="javascript:window.close()"><font color = "blue">go back</font></a> to the last page and try again.<br />
Or email directly to <font color="blue">projectkits@tridentelect.com.</font> Thanks
<script>
<!--
document.write(unescape("%20%20%20%3C/p%3E%0D%0A%20%20%20%3C/body%3E%0D%0A%20%20%20%3C/html%3E"));
//-->
</script>
<?
  }



  elseif (!@ereg("([[:alnum:]\.\-]+)(\@[[:alnum:]\.\-]+\.+)", $email)) 
  {
   ?>
<script>
<!--
document.write(unescape("%20%20%20%3Chtml%3E%0D%0A%20%20%20%3Chead%3E%3Ctitle%3ETRIDENTELECT%20-%20Error%3C/title%3E%3C/head%3E%0D%0A%20%20%20%3Cbody%3E%0D%0A%20%20%20%3Cp%20align%20%3D%20%22center%22%3E%3Cfont%20color%20%3D%20%22red%22%3EUnfortunately%2C%20your%20email%20address%20may%20have%20been%20typed%20wrongly.%3C/font%3E%0D%0A%20%20%20%3Cbr%3E%0D%0A"));
//-->
</script>
Please, <a href="javascript:window.close()"><font color = "blue">go back</font></a> to the last page and try again.<br />
Or email directly to
<?
  }  
else 
{
  
  
  $email = strip_tags($_POST['email']);
  
  
  
  $vat = $price * 0.05;
  $regfee = 5000;
  // for courses in abuja
  if($location=='ABUJA') {
  $surcharge = 7500;
  $grandtotal = $vat + $price + $regfee + $surcharge;
  } else {
  $grandtotal = $vat + $price + $regfee;
  }
  
  $subject = "Training Registration";


  $headers = "From: " . $email . "\r\n";
  $headers .= "Reply-To: ". $email . "\r\n";
  //$headers .= "CC: susan@example.com\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  $message  = " <html><body>";
  $message .= "<div align=center style='font-family:times new roman, Courier, monospace; font-weight:bold';><table width=750 class=style1><tr><td><font size=6><b>Invoice</font> </td><td>.</td></tr>";
  $message .= "<tr><td></td><td></td></tr>";
  $message .= "<tr><td width=400><font size=3><b>Customer Details</b></font></td><td><font size=3><b>Company Details</b></font></td></tr>";
  $message .= "<tr><td>$surname $othernames</td><td>Trident Technologies Limited</td></tr>"; 
  $message .= "<tr><td>$email</td><td>647 Oshodi-Abeokuta Express,PWD-Ikeja</td></tr>";
  $message .= "<tr><td>$location</td><td>Close to Airforce Base Main Gate(opp Ikeja GRA Railway Bypass)</td></tr>"; 
  $message .= "<tr><td>$location</td><td>Ikeja-Lagos</td></tr>";
  $message .= "<tr><td>Tel: $phone</td><td>Nigeria</td></tr>";
  $message .= "<tr><td>Invoice No. $dated-$invoice</td><td>Tel: 08179072163, 08180059012</td></tr>";
  $message .= "<tr><td></td><td>Email: sales@tridentelect.com</td></tr>";
  $message .= "<tr><td>Tel: $phone</td><td>Web: www.tridentelect.com</td></tr>";
  $message .= "</table>";
  
  $message .= "<table width=750 border=1 bordercolor=black class=style1>";
  $message .= "<tr><td>Qty</td><td>Description</td><td align=right>Price</td><td align=right>Sub Total</tr>";
  $message .= "<tr><td height=60>1</td><td>$course</td><td align=right>N".number_format($price)."</td><td align=right>N".number_format($price)."</tr>";
  $message .= "<tr><td align=right colspan=3>Total</td><td align=right>N".number_format($price)."</tr>";
  $message .= "<tr><td align=right colspan=3>Registration Fee</td><td align=right>N".number_format($regfee)."</tr>";
  if($location == "ABUJA"){
  $message .= "<tr><td align=right colspan=3>Surcharge</td><td align=right>N".number_format($surcharge)."</tr>";
  } else {
  $message .= "<tr><td align=right colspan=3>Surcharge</td><td align=right>N".number_format(0)."</tr>";
  }
  $message .= "<tr><td align=right colspan=3>VAT</td><td align=right>N".number_format($vat)."</tr>";
  $message .= "<tr><td align=right colspan=3>Grand Total</td><td align=right>N".number_format($grandtotal)."</td></tr>";
  $message .= "</table></div>";
  
  $message .= "</body></html>";
  
  $messagem = "Training Registration \n\n\n";
  $messagem .= "Thank you for your interest in our training \n";
  $messagem .= "Below are the details of your registration \n";
  $messagem .= "Course:	$course \n";
  $messagem .= "Price:		N".number_format($price)." \n";
  $messagem .= "Vat:		N".number_format($vat)." \n";
  $messagem .= "Total:		N".number_format($grandtotal)." \n\n\n";
  
  $messagem .= "Below is our bank details \n \n";
  $messagem .= "Bank:		UBA \n";
  $messagem .= "Account Name:		Trident Technologies Limited \n";
  $messagem .= "Account No.:		1012224783 \n \n \n";
  
  $messagem .= "Bank:		Diamond Bank \n";
  $messagem .= "Account Name:		Trident Technologies Limited \n";
  $messagem .= "Account No.:		0026108664 \n";
  
  
  
  
 /* $message .= "<tr><td>".$_POST['course']."</td><td>".$course."</td></tr>";
  $message .= "<tr><td>VAT</td><td>".$vat."</td></tr>";
  $message .= "<tr><td>TOTAL</td><td>".$total."</td></tr>"; */
  
  @mail("tridentkits@yahoo.co.uk , $email", "$subject", "$message", $headers);
  
 /* mail( "projectkits@tridentelect.com", "BOOT-CAMP TRAINING FORM",
    "\nSurname: $surname\nOther Names: $othernames\n\nEmail: $email\nPhone Number: $phone\n\nInstitution: $institution\n\nCourse: $course\n\n\nEnquiries & Questions: $message\n\nAccomodation: $ACCOMODATION\n\nUndergraduate: $UNDERGRADUATE\n\n Training Location : $location\n\n Payment Type : $REGISTRATION_ONLY \n\nTerms & Conditions : $check\n\n\ Discount Code : $discount\n\nMessage Received 
From http://www.tridentelect.com\n\nTechnology Developed by Trident Technologies", "From: $email" ); */

   
  echo "Thanks $othernames! for your interest in the $course course. <br />
To complete your registration you have to make payment.<br />
Below is your invoice for your order.";
 echo $message;
 $thename = $surname." ".$othernames;
 

 $insertSQL = sprintf("INSERT INTO transactions (name, email, product, location, telephone, invoice, amount, vat, grandtotal) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($thename, "text"),
                       GetSQLValueString($email, "text"),
                       GetSQLValueString($course, "text"),
                       GetSQLValueString($location, "text"),
					   GetSQLValueString($phone, "text"),
					   GetSQLValueString($invoice, "text"),
					   GetSQLValueString($price, "text"),
					   GetSQLValueString($vat, "text"),
					   GetSQLValueString($grandtotal, "text"));
					   

  mysql_select_db($database_trident, $trident);
  $Result1 = mysql_query($insertSQL, $trident) or die(mysql_error());
  
  ?>
  
	</div>
<font color="blue>projectkits@tridentelect.com.</font> Thanks


<script>
<!--
document.write(unescape("%20%20%20%3C/p%3E%0D%0A%20%20%20%3C/body%3E%0D%0A%20%20%20%3C/html%3E"));
//-->
</script>
<div align=center><br />
  <table width="52%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><p class="style2"><strong>Please select you payment options:</strong></p>
        <form action="training_registration.php" method="post" name="form2" target="_parent" id="form2" >
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            
           
            <tr>
              <td>&nbsp;</td>
              <td><label>
                <input name="pay" type="radio" value="bank" />
              Pay Into the Bank 
              <input name="course" type="hidden" id="course" value="<?=$course?>" />
              <input name="name" type="hidden" id="name" value="<?=$thename?>" />
              <input name="location" type="hidden" id="location" value="<?=$location?>" />
              <input name="tel" type="hidden" id="tel" value="<?=$phone?>" />
              <input name="email" type="hidden" id="email" value="<?=$email?>" />
              <input name="id" type="hidden" id="id" value="<?=$mycodes?>" />
              </label></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><label>
                <input name="pay" type="radio" value="front" />
              Pay At Our Front Desk</label></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><label>
                <input type="submit" name="Submit" value="Continue" />
              </label></td>
            </tr>
          </table>
        </form>
        <?php /*?><table width="83%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="46%" height="41" class="style7">Pay Online using PayAfrica</td>
            <td width="54%"><span class="style7">Bank Payment (Attracts 30% surcharge) </span></td>
          </tr>
          <tr>
            <td><!-- payafrica.co.uk PAYMENT FORM -->
<form method=post action=http://payafrica.co.uk/process.htm>
  <input type=image src="../images/signup.gif">
</form>
<!-- payafrica.co.uk PAYMENT FORM --></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table><?php */?>
      <p class="style2">&nbsp; </p></td>
    </tr>
  </table>
</div>

<?


   }

?>
<?php 
} elseif (isset($_POST['pay']) && $_POST['pay']== "bank") {
  
  $vat = $price * 0.05;
  $regfee = 5000;
  
  // for courses in abuja
  if($location=='ABUJA') {
  $surcharge = 7500;
  $grandtotal = $vat + $price + $regfee + $surcharge;
  } else {
  $grandtotal = $vat + $price + $regfee;
  }
  
  
  $subject = "Training Registration With Bank Payment";


  $headers = "From: " . $email . "\r\n";
  $headers .= "Reply-To: ". $email . "\r\n";
  //$headers .= "CC: susan@example.com\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  $message  = " <html><body>";
  $message .= "<div align=center style='font-family:times new roman, Courier, monospace; font-weight:bold';><table width=750 class=style1><tr><td><font size=6><b>Invoice With Surcharge</font> </td><td>.</td></tr>";
  $message .= "<tr><td></td><td></td></tr>";
  $message .= "<tr><td width=400><font size=3><b>Customer Details</b></font></td><td><font size=3><b>Company Details</b></font></td></tr>";
  $message .= "<tr><td>".$_POST['name']."</td><td>Trident Technologies Limited</td></tr>"; 
  $message .= "<tr><td>".$_POST['email']."</td><td>647, Oshodi-Abeokuta Express, PWD-Ikeja</td></tr>";
  $message .= "<tr><td>".$_POST['location']."</td><td>Close to Airforce Base Main Gate(opp Ikeja GRA railway bypass.</td></tr>"; 
  $message .= "<tr><td>".$_POST['location']."</td><td>Ikeja-Lagos</td></tr>";
  $message .= "<tr><td>Tel: ".$_POST['tel']."</td><td>Nigeria</td></tr>";
  $message .= "<tr><td>Invoice No. $dated-$invoice</td><td>Tel: 08179072163, 08180059012</td></tr>";
  $message .= "<tr><td></td><td>Email: sales@tridentelect.com</td></tr>";
  $message .= "<tr><td>Tel: $phone</td><td>Web: www.tridentelect.com</td></tr>";
  $message .= "</table>";
  
  $message .= "<table width=750 border=1 bordercolor=black class=style1>";
  $message .= "<tr><td>Qty</td><td>Description</td><td align=right>Price</td><td align=right>Sub Total</tr>";
  $message .= "<tr><td height=60>1</td><td>".$_POST['course']."</td><td align=right>N".number_format($price)."</td><td align=right>N".number_format($price)."</tr>";
  $message .= "<tr><td align=right colspan=3>Total</td><td align=right>N".number_format($price)."</tr>";
  $message .= "<tr><td align=right colspan=3>Registration Fee</td><td align=right>N".number_format($regfee)."</tr>";
    if($location == "ABUJA"){
  $message .= "<tr><td align=right colspan=3>Surcharge</td><td align=right>N".number_format($surcharge)."</tr>";
  } else {
  $message .= "<tr><td align=right colspan=3>Surcharge</td><td align=right>N".number_format(0)."</tr>";
  }

  $message .= "<tr><td align=right colspan=3>VAT</td><td align=right>N".number_format($vat)."</tr>";
  $message .= "<tr><td align=right colspan=3>Grand Total</td><td align=right>N".number_format($grandtotal)."</td></tr>";
  $message .= "</table>";
  
  $message .= "Below is our bank details <br>\n \n";
  $message .= "Bank:		UBA <br>\n";
  $message .= "Account Name:		Trident Technologies Limited <br>\n";
  $message .= "Account No.:		1012224783 <br><br> \n \n";
  
  $message .= "Bank:		Diamond Bank <br>\n";
  $message .= "Account Name:		Trident Technologies Limited <br>\n";
  $message .= "Account No.:		0026108664 <br>\n";
  
  $message .= "</div></body></html>";
  
 /* $message .= "<tr><td>".$_POST['course']."</td><td>".$course."</td></tr>";
  $message .= "<tr><td>VAT</td><td>".$vat."</td></tr>";
  $message .= "<tr><td>TOTAL</td><td>".$total."</td></tr>"; */
  
  @mail("tridentkits@yahoo.co.uk , $email", "$subject", "$message", $headers);
  
 /* mail( "projectkits@tridentelect.com", "BOOT-CAMP TRAINING FORM",
    "\nSurname: $surname\nOther Names: $othernames\n\nEmail: $email\nPhone Number: $phone\n\nInstitution: $institution\n\nCourse: $course\n\n\nEnquiries & Questions: $message\n\nAccomodation: $ACCOMODATION\n\nUndergraduate: $UNDERGRADUATE\n\n Training Location : $location\n\n Payment Type : $REGISTRATION_ONLY \n\nTerms & Conditions : $check\n\n\ Discount Code : $discount\n\nMessage Received 
From http://www.tridentelect.com\n\nTechnology Developed by Trident Technologies", "From: $email" ); */

   
    $txt = "<table align=center><tr><td><form>Below is the new invoice for bank payment, you can<input type='button' value='Print This Invoice' onClick='window.print()' /> for your record. </form></td></tr></table>\n \n";

 echo $txt;
 echo $message;
 $thename = $surname." ".$othernames;
 
 $insertSQL = sprintf("INSERT INTO transactions (name, email, product, location, telephone, invoice, amount, vat, grandtotal) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($thename, "text"),
                       GetSQLValueString($email, "text"),
                       GetSQLValueString($course, "text"),
                       GetSQLValueString($location, "text"),
					   GetSQLValueString($phone, "text"),
					   GetSQLValueString($invoice, "text"),
					   GetSQLValueString($price, "text"),
					   GetSQLValueString($vat, "text"),
					   GetSQLValueString($grandtotal, "text"));
					   

  mysql_select_db($database_trident, $trident);
  $Result1 = mysql_query($insertSQL, $trident) or die(mysql_error());
 
 } elseif (isset($_POST['pay']) && $_POST['pay']== "payafrica") {
  $price = $_POST['price'];
  $vat = $price * 0.05;
  $regfee = 5000;
  $discount = $price * 0.15;
  $grandtotal = $vat + $price + $regfee;
  $grandtotal = $grandtotal - $discount; 
  // for courses in abuja
  if($location=='ABUJA') {
  $surcharge = 7500;
  $grandtotal = $vat + $price + $regfee + $surcharge;
  $grandtotal = $grandtotal - $discount; 
  } else {
  $grandtotal = $vat + $price + $regfee;
  $grandtotal = $grandtotal - $discount; 
  }
  
  
  $subject = "Training Registration Payment Using PayAfrica";


  $headers = "From: " . $email . "\r\n";
  $headers .= "Reply-To: ". $email . "\r\n";
  //$headers .= "CC: susan@example.com\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  $message  = " <html><body>";
  $message .= "<div align=center style='font-family:times new roman, Courier, monospace; font-weight:bold';><table width=750 class=style1><tr><td><font size=6><b>Invoice </font> </td><td>.</td></tr>";
  $message .= "<tr><td></td><td></td></tr>";
  $message .= "<tr><td width=400><font size=3><b>Customer Details</b></font></td><td><font size=3><b>Company Details</b></font></td></tr>";
  $message .= "<tr><td>".$_POST['name']."</td><td>Trident Technologies Limited</td></tr>"; 
  $message .= "<tr><td>".$_POST['email']."</td><td>Suite BA17, Maryland Business Plaza</td></tr>";
  $message .= "<tr><td>".$_POST['location']."</td><td>350/360 Ikorodu Road, Maryland</td></tr>"; 
  $message .= "<tr><td>".$_POST['location']."</td><td>Lagos</td></tr>";
  $message .= "<tr><td>Tel: ".$_POST['tel']."</td><td>Nigeria</td></tr>";
  $message .= "<tr><td>Invoice No. $dated-$invoice</td><td>Tel: 08179072163, 08180059012</td></tr>";
  $message .= "<tr><td></td><td>Email: sales@tridentelect.com</td></tr>";
  $message .= "<tr><td>Tel: $phone</td><td>Web: www.tridentelect.com</td></tr>";
  $message .= "</table>";
  
  $message .= "<table width=750 border=1 bordercolor=black class=style1>";
  $message .= "<tr><td>Qty</td><td>Description</td><td align=right>Price</td><td align=right>Sub Total</tr>";
  $message .= "<tr><td height=60>1</td><td>".$_POST['course']."</td><td align=right>N".number_format($price)."</td><td align=right>N".number_format($price)."</tr>";
  $message .= "<tr><td align=right colspan=3>Total</td><td align=right>N".number_format($price)."</tr>";
  $message .= "<tr><td align=right colspan=3>Registration Fee</td><td align=right>N".number_format($regfee)."</tr>";
    if($location == "ABUJA"){
  $message .= "<tr><td align=right colspan=3>Surcharge</td><td align=right>N".number_format($surcharge)."</tr>";
  } else {
  $message .= "<tr><td align=right colspan=3>Surcharge</td><td align=right>N".number_format(0)."</tr>";
  }

  $message .= "<tr><td align=right colspan=3>VAT</td><td align=right>N".number_format($vat)."</tr>";
  $message .= "<tr><td align=right colspan=3>PayAfrica Discount</td><td align=right>N".number_format($discount)."</tr>";
  $message .= "<tr><td align=right colspan=3>Grand Total</td><td align=right>N".number_format($grandtotal)."</td></tr>";
  $message .= "</table></div>";
  
  $message .= "</body></html>";
  
    
 /* $message .= "<tr><td>".$_POST['course']."</td><td>".$course."</td></tr>";
  $message .= "<tr><td>VAT</td><td>".$vat."</td></tr>";
  $message .= "<tr><td>TOTAL</td><td>".$total."</td></tr>"; */
  
  @mail("tridentkits@yahoo.co.uk , $email", "$subject", "$message", $headers);
  
 /* mail( "projectkits@tridentelect.com", "BOOT-CAMP TRAINING FORM",
    "\nSurname: $surname\nOther Names: $othernames\n\nEmail: $email\nPhone Number: $phone\n\nInstitution: $institution\n\nCourse: $course\n\n\nEnquiries & Questions: $message\n\nAccomodation: $ACCOMODATION\n\nUndergraduate: $UNDERGRADUATE\n\n Training Location : $location\n\n Payment Type : $REGISTRATION_ONLY \n\nTerms & Conditions : $check\n\n\ Discount Code : $discount\n\nMessage Received 
From http://www.tridentelect.com\n\nTechnology Developed by Trident Technologies", "From: $email" ); */

   
  echo "<div align=center>Below is the new invoice for using PayAfrica with included discount.</div>";
 echo $message;
 $thename = $surname." ".$othernames;
 
 $insertSQL = sprintf("INSERT INTO transactions (name, email, product, location, telephone, invoice, amount, vat, grandtotal) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($thename, "text"),
                       GetSQLValueString($email, "text"),
                       GetSQLValueString($course, "text"),
                       GetSQLValueString($location, "text"),
					   GetSQLValueString($phone, "text"),
					   GetSQLValueString($invoice, "text"),
					   GetSQLValueString($price, "text"),
					   GetSQLValueString($vat, "text"),
					   GetSQLValueString($grandtotal, "text"));
					   

  mysql_select_db($database_trident, $trident);
  $Result1 = mysql_query($insertSQL, $trident) or die(mysql_error());
// header('location: pay.php?pay=payafrica');
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><form method="post" action="http://payafrica.co.uk/process.htm">
      <input name="member" type="hidden" id="member" value="garry1" />
      <input type="hidden" name="action" value="payment" />
      <input type="hidden" name="product" value="<?=$_POST['course']?>" />
      <input type="hidden" name="price" value="<?=$grandtotal?>" />
      <input type="hidden" name="quantity" value="1" />
      <input type="hidden" name="invoice" value="<?=$_POST['invoice']?>" />
      <input type="hidden" name="period" value="0" />
      <input type="hidden" name="trial" value="0" />
      <input type="hidden" name="setup" value="0" />
      <input type="hidden" name="tax" value="0" />
      <input type="hidden" name="shipping" value="0" />
      <input type="hidden" name="ureturn" value="http://tridentelect.com/success.html" />
      <input type="hidden" name="unotify" value="http://tridentelect.com/success.html" />
      <input type="hidden" name="ucancel" value="http://tridentelect.com/cancel.html" />
      <input type="hidden" name="comments" value="Online payments for <?=$_POST['course']?>" />
      <span class="style9">Proceed to PayAfrica</span><br />
  <input name="image" type="image" src="../images/signup.gif" />
        </form></td>
  </tr>
</table>
<?php
 } elseif (isset($_POST['pay']) && $_POST['pay']== "front") {
  
  $vat = $price * 0.05;
  $regfee = 5000;
  
  
  // for courses in abuja
  if($location=='ABUJA') {
  $surcharge = 7500;
  $grandtotal = $vat + $price + $regfee + $surcharge;
  } else {
  $grandtotal = $vat + $price + $regfee;
  }
  
  
  $subject = "Training Registration Payment Front DeskP Payment";


  $headers = "From: " . $email . "\r\n";
  $headers .= "Reply-To: ". $email . "\r\n";
  //$headers .= "CC: susan@example.com\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  $message  = " <html><body>";
  $message .= "<div align=center style='font-family:times new roman, Courier, monospace; font-weight:bold';><table width=750 class=style1><tr><td><font size=6><b>Invoice </font> </td><td>.</td></tr>";
  $message .= "<tr><td></td><td></td></tr>";
  $message .= "<tr><td width=400><font size=3><b>Customer Details</b></font></td><td><font size=3><b>Company Details</b></font></td></tr>";
  $message .= "<tr><td>".$_POST['name']."</td><td>Trident Technologies Limited</td></tr>"; 
  $message .= "<tr><td>".$_POST['email']."</td><td>Suite BA17, Maryland Business Plaza</td></tr>";
  $message .= "<tr><td>".$_POST['location']."</td><td>350/360 Ikorodu Road, Maryland</td></tr>"; 
  $message .= "<tr><td>".$_POST['location']."</td><td>Lagos</td></tr>";
  $message .= "<tr><td>Tel: ".$_POST['tel']."</td><td>Nigeria</td></tr>";
  $message .= "<tr><td>Invoice No. $dated-$invoice</td><td>Tel: 01-7359424, 07030144572</td></tr>";
  $message .= "<tr><td></td><td>Email: sales@tridentelect.com</td></tr>";
  $message .= "<tr><td>Tel: $phone</td><td>Web: www.tridentelect.com</td></tr>";
  $message .= "</table>";
  
  $message .= "<table width=750 border=1 bordercolor=black class=style1>";
  $message .= "<tr><td>Qty</td><td>Description</td><td align=right>Price</td><td align=right>Sub Total</tr>";
  $message .= "<tr><td height=60>1</td><td>".$_POST['course']."</td><td align=right>N".number_format($price)."</td><td align=right>N".number_format($price)."</tr>";
  $message .= "<tr><td align=right colspan=3>Total</td><td align=right>N".number_format($price)."</tr>";
  $message .= "<tr><td align=right colspan=3>Registration Fee</td><td align=right>N".number_format($regfee)."</tr>";
    if($location == "ABUJA"){
  $message .= "<tr><td align=right colspan=3>Surcharge</td><td align=right>N".number_format($surcharge)."</tr>";
  } else {
  $message .= "<tr><td align=right colspan=3>Surcharge</td><td align=right>N".number_format(0)."</tr>";
  }

  $message .= "<tr><td align=right colspan=3>VAT</td><td align=right>N".number_format($vat)."</tr>";
  $message .= "<tr><td align=right colspan=3>Grand Total</td><td align=right>N".number_format($grandtotal)."</td></tr>";
  $message .= "</table>";
    
  $message .= "</div></body></html>";

/* $message .= "<tr><td>".$_POST['course']."</td><td>".$course."</td></tr>";
  $message .= "<tr><td>VAT</td><td>".$vat."</td></tr>";
  $message .= "<tr><td>TOTAL</td><td>".$total."</td></tr>"; */
  
  @mail("tridentkits@yahoo.co.uk , $email", "$subject", "$message", $headers);
  
 /* mail( "projectkits@tridentelect.com", "BOOT-CAMP TRAINING FORM",
    "\nSurname: $surname\nOther Names: $othernames\n\nEmail: $email\nPhone Number: $phone\n\nInstitution: $institution\n\nCourse: $course\n\n\nEnquiries & Questions: $message\n\nAccomodation: $ACCOMODATION\n\nUndergraduate: $UNDERGRADUATE\n\n Training Location : $location\n\n Payment Type : $REGISTRATION_ONLY \n\nTerms & Conditions : $check\n\n\ Discount Code : $discount\n\nMessage Received 
From http://www.tridentelect.com\n\nTechnology Developed by Trident Technologies", "From: $email" ); */

   
  $txt = "<table align=center><tr><td><form>Please <input type='button' value='Print This Invoice' onClick='window.print()' /> and bring it to our front desk or copy out your invoice number. </form></td></tr></table>\n \n";

 echo $txt;
 echo $message;
 $thename = $surname." ".$othernames;
 
 $insertSQL = sprintf("INSERT INTO transactions (name, email, product, location, telephone, invoice, amount, vat, grandtotal) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($thename, "text"),
                       GetSQLValueString($email, "text"),
                       GetSQLValueString($course, "text"),
                       GetSQLValueString($location, "text"),
					   GetSQLValueString($phone, "text"),
					   GetSQLValueString($invoice, "text"),
					   GetSQLValueString($price, "text"),
					   GetSQLValueString($vat, "text"),
					   GetSQLValueString($grandtotal, "text"));
					   

  mysql_select_db($database_trident, $trident);
  $Result1 = mysql_query($insertSQL, $trident) or die(mysql_error());
 
 }
?>

