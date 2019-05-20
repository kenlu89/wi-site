<?php 
$id="";
$id=$_GET['id'];
$result=@mysql_query("select * from calling_rates, calling_rate_description where calling_rates.callingrate_id=calling_rate_description.callingrate_id and calling_rate_description.language_id=1 and calling_rates.callingrate_id='$id'");
$rows=mysql_fetch_array($result);
$country_ch=$rows['country_ch'];
$counntry_en=$rows['country_en'];
$code=$rows['code'];
$amount_20=$rows['amount_20'];
$amount_10=$rows['amount_10'];
$amount_5=$rows['amount_05'];
$ch_=@mysql_query("select callingrate_name from calling_rate_description where language_id=3 and callingrate_id='$id'");
$row_ch=mysql_fetch_array($ch_);
$country_ch=$row_ch['callingrate_name'];
$country_en=$rows['callingrate_name'];

if($_POST['chk']==1){
$id=$_POST['id'];
$country_ch=$_POST['country_ch'];
$country_en=$_POST['country_en'];
$code=$_POST['code'];
$amount_20=$_POST['amount_20'];
$amount_10=$_POST['amount_10'];
$amount_5=$_POST['amount_5'];
$files=$_FILES['file']['name'];

if($country_ch=="" || $country_en=="" || $code=="" || $amount_20=="" || $amount_10=="" || $amount_5==""){
$error=1;
}else{
$done=@mysql_query("update calling_rates set code='$code', amount_20='$amount_20', amount_10='$amount_10', amount_05='$amount_5' where callingrate_id='$id'");
if(mysql_num_rows($ch_)<=0){
@mysql_query("insert into calling_rate_description(callingrate_name, language_id, callingrate_id) values('$country_ch', 3, '$id')");
}
if($country_ch!=""){
@mysql_query("update calling_rate_description set callingrate_name='$country_ch' where language_id=3 and callingrate_id='$id'");
}
if($country_en!=""){
@mysql_query("update calling_rate_description set callingrate_name='$country_en' where language_id=1 and callingrate_id='$id'");
}
if($done){
header("Location: ?content=country_update&msg=1"); 
}else{
header("Location: ?content=country_update&msg=2"); 
}
}

if($files!=""){
$uploaddir = "../tmp_name"; // Where you want the files to upload to - Important: Make sure this folders permissions is 0777!
$allowed_ext = "jpg, gif, png, JPG, GIF, PNG"; // These are the allowed extensions of the files that are uploaded
$max_size = "10000000"; // 50000 is the same as 50kb
$max_height = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$max_width = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$mode=0644;

$ids=$_POST['current'];
$dates=time() + (24 * 60 * 60).'-'.date('Y-m-d');

// Check Entension
$extension = pathinfo($_FILES['file']['name']);
$extension = $extension[extension];
 $test1=$uploaddir.'/'."$dates.$extension";
$test='tmp_name'.'/'."$dates.$extension";
rename($_FILES['file']['tmp_name'], $uploaddir.'/'."$dates.$extension");	
$allowed_paths = explode(", ", $allowed_ext);
for($i = 0; $i < count($allowed_paths); $i++) {
 if ($allowed_paths[$i] == "$extension") {
 $ok = "1";
 }}		
 

// Check File Size
if ($ok == "1") {

if($_FILES['file']['size'] > $max_size )
{
print "File size is too big!";
exit;
}
// Check Height & Width

// The Upload Part
if(is_uploaded_file($_FILES['file']['tmp_name']))
{
move_uploaded_file($_FILES['file']['name'],$uploaddir.'/'.$_FILES['file']['name']);
@chmod($test1, $mode); 
}
@mysql_query("update calling_rates set image='$test' where callingrate_id='$id'");
}
}
}

?>


<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable--><form name="form1"  action="?content=rate_edit" enctype="multipart/form-data" method="post">
  <input type="hidden"  name="chk" value="1" /><input type="hidden" name="id" value="<?php echo $id;?>"   />

  <tr>
    <td width="22" height="74">&nbsp;</td>
    <td width="80">&nbsp;</td>
    <td width="66">&nbsp;</td>
    <td width="154">&nbsp;</td>
    <td width="41">&nbsp;</td>
    <td width="100">&nbsp;</td>
    <td width="40">&nbsp;</td>
    <td width="100">&nbsp;</td>
    <td width="37">&nbsp;</td>
    <td width="103">&nbsp;</td>
    <td width="57">&nbsp;</td>
    </tr>
  <tr>
    <td height="38">&nbsp;</td>
    <td colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="7" valign="middle" class="error"><?php if($error==1){ echo ERROR_MSG;}?></td>
  <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td colspan="2" valign="middle"><?php echo COUNTRY_CH;?></td>
    <td colspan="7" valign="middle"><input type="text" name="country_ch" size="35" id="country_ch"  value="<?php echo $country_ch;?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td colspan="2" valign="middle"><?php echo COUNTRY_EN;?></td>
    <td colspan="7" valign="middle"><input type="text" name="country_en" size="35" id="country_en"  value="<?php echo $country_en;?>"/></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td valign="middle"><?php echo CODE;?></td>
    <td colspan="2" valign="middle"><input type="text" name="code" size="15"  value="<?php echo $code;?>"/></td>
    <td align="right" valign="middle">$20</td>
    <td valign="middle"><input type="text" name="amount_20" size="5" id="amount_20"  value="<?php echo $amount_20;?>"/></td>
    <td align="right" valign="middle">$10</td>
    <td valign="middle"><input type="text" name="amount_10" size="5" id="amount_10"  value="<?php echo $amount_10;?>"/></td>
    <td align="right" valign="middle">$5</td>
    <td valign="middle"><input type="text" name="amount_5" size="5" id="amount_5"   value="<?php echo $amount_5;?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="38">&nbsp;</td>
    <td colspan="2" valign="middle"><?php echo FLAG;?></td>
    <td colspan="7" valign="middle"><input type="file" name="file" class="text" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="38">&nbsp;</td>
    <td colspan="2" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="7" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="38">&nbsp;</td>
    <td colspan="2" valign="top"><input type="submit" value="<?php echo SUBMIT;?>" class="text" /></td>
    <td colspan="7" valign="top"><input type="reset" value="<?php echo RESET;?>" class="text" /></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="152">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  
  
  <?php 
   $call_rate=@mysql_query("select * from calling_rates, calling_rate_description where calling_rates.callingrate_id=calling_rate_description.callingrate_id and calling_rate_description.language_id='1' order by calling_rates.callingrate_id asc");
		while($rows_calling=mysql_fetch_array($call_rate)){?>
  <?php }?>
  
  
  
  
  
</form>
</table>
</body>
</html>
