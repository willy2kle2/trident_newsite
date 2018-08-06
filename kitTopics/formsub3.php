<?php require_once('../Connections/trident.php'); ?>
<?php
mysql_select_db($database_trident, $trident);
$query_course = "SELECT * FROM courses ORDER BY id ASC";
$course = mysql_query($query_course, $trident) or die(mysql_error());
$row_course = mysql_fetch_assoc($course);
$totalRows_course = mysql_num_rows($course);
?><html>
<head><title>Form</title>
<script language ="JavaScript">




function newWindow102(){window.open("terms.html");}
 
function newWindow103(){
window.close();}

</script>
</head>
<body>
<table width = 700 border=2 align ="center">
<tr><td>
<p align="center"><b>TRIDENT TRAINING REGISTRATION FORM</b></P>
<hr>
Please read the
 <a href="javascript:newWindow102()"><font color="blue" font size=3><u> terms and conditions</u></a></font> before filling this form. <br>
 <br><font color="green">When you submit this registration form, a proforma invoice and payment options would be sent to your email box (please ensure your phone number and email is entered correctly).</font><hr> <font size="2"> Pls click the SUBMIT button at the bottom of the page after filling this form.</font><br>
<form action = "../processor-referencer/formsub3.php", method = "post" >


<table width = "100%" >
 <tr>
   <td width="39%" align = "20%"><font size="-4" face="Verdana, Arial, Helvetica, sans-serif"><strong>Course</strong></font></td>
   <td width="2%" align = "50%">&nbsp;</td>
   <td width="59%" align = "50%"><select name="id" id="id">
       <option value="">Select Course</option>
       <?php
do {  
?>
       <option value="<?php echo $row_course['id']?>"><?php echo $row_course['course']?> - N<?php echo number_format($row_course['price'])?></option>
       <?php
} while ($row_course = mysql_fetch_assoc($course));
  $rows = mysql_num_rows($course);
  if($rows > 0) {
      mysql_data_seek($course, 0);
	  $row_course = mysql_fetch_assoc($course);
  }
?>
     </select></td>
 </tr>
 <tr>
   <td align = "20%"><font size="-4" face="Verdana, Arial, Helvetica, sans-serif"><strong>Registration Fee </strong></font></td>
   <td align = "50%">&nbsp;</td>
   <td align = "50%">N5,000</td>
 </tr>
 <tr>
<td align = "20%"><strong><font size = "-4" face="Verdana, Arial, Helvetica, sans-serif">Surname</font></strong></td>
<td align = "50%">&nbsp;</td><td align = "50%"><input type = "text" name = "surname" size = "32"></td>
</tr>

<tr>
<td align = "20%"><strong><font size = "-4" face="Verdana, Arial, Helvetica, sans-serif">OtherNames</font></strong></td>
<td align = "50%">&nbsp;</td><td align = "50%"><input type = "text" name = "othernames" size = "32"></td>
</tr>
<tr>
<td align = "20%"><strong><font size = "-4" face="Verdana, Arial, Helvetica, sans-serif">Email</font></strong></td>
<td align = "50%">&nbsp;</td><td align = "50%"><input type = "text" name = "email" size = "32"></td>
</tr>

<tr>
<td align = "20%"><strong><font size = "-4" face="Verdana, Arial, Helvetica, sans-serif">Phone Num</font></strong></td>
<td align = "50%">&nbsp;</td><td align = "50%"><input type = "numeral" name = "phone", size = "32"></td>
</tr><br><br>
<tr>
<td><font size="-4" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td align = "20%"><strong><font size = "-4" face="Verdana, Arial, Helvetica, sans-serif">Please Select Your Training Location</font></strong></td>
<td align = "50%">&nbsp;</td><td align = "50%">
<select name="location">
<option>Please Select Location</option>
<option value="ABUJA">ABUJA</option>
<option value="LAGOS">LAGOS</option>
</select>
</td>
</tr>

<tr>
<td><font size="-4" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td align = "20%", valign = "top"><strong><font size = "-4" face="Verdana, Arial, Helvetica, sans-serif">Questions & Enquiries<br>
      <font color="green">Let us know any questions you have about this training <br> 
      or the course you are interested in ?</font></font></strong></td>
<td>&nbsp;</td>
<td align = "50%"><textarea rows = "5" cols = "25" name = "message"></textarea></td>
</tr>
<tr>
<td colspan="3">
<input type="checkbox" name="check" value="checked"> I have read , understood & agreed with the<br><a href="javascript:newWindow102()"> <font color="blue" font size=3><u> terms and conditions</u></font></a> for this training.</td>
</tr>
</table>
<table align = "center">
<td><input name="submit" type = "submit" value = "Submit">
  </td><td>
      <input name="reset" type = "reset"></td>
</table>

</form>

</td></tr><table>
</body>

</table>
</html>
<?php
mysql_free_result($course);
?>