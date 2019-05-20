<?php 
$eid=$_GET['id'];

if($eid=="" && $_POST['chk']!=1){
header("Location: index.php");
}

if($_POST['chk']==1){
$fname="";
$lname="";
$birth="";
$gender="";
$birth="";
$address="";
$city="";
$state="";
$zip="";
$ids="";
$barcode="";
$title="";
$wage="";
$tel="";
$email="";
$parent="";

if($eid==""){
$eid=$_POST['parent'];
}

$parent=$_POST['parent'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$birth=$_POST['birth'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['states'];
$zip=$_POST['zip'];
$ids=$_POST['ids'];
$barcode=$_POST['barcode'];
$title=$_POST['position'];
$wage=$_POST['wage'];
$tel=$_POST['tel'];
$email=$_POST['email']; 
$files=$_FILES['file']['name'];
$daily_cal=$_POST['daily_cal'];
$cash_drawer=$_POST['cash_drawer'];
$cancel_order=$_POST['cancel_order'];
$void_order=$_POST['void_order'];
$checks=$_POST['checks'];
$discount=$_POST['discount'];
$edit_order=$_POST['edit_order'];

if($fname==""  || $lname==""  || $birth=="" || $gender=="" || $address=="" || $city=="" || $state=="" || $zip=="" || $ids=="" || $wage=="" || $email=="" || $tel==""){
$erros=1;
}else{

if($files=="" || $files==NULL){
$done=@mysql_query("update customers set customers_gender='$gender', customers_firstname='$fname', customers_lastname='$lname', customers_dob='$birth', customers_email_address='$email', customers_telephone='$tel', id='$ids', barcode='$barcode', title='$title', wage='$wage', cash_drawer='$cash_drawer', cancel_order='$cancel_order',  void_order='$void_order', checks='$checks', discount='$discount', edit_order='$edit_order', daily_cal='$daily_cal' where  customers_id='$parent'");
if($done){
@mysql_query("update address_book set entry_firstname='$fname', entry_lastname='$lname',  entry_street_address='$address', entry_city='$city', entry_state='$state', entry_postcode='$zip' where  customers_id='$parent'");
}
header("Location: ?content=employee&msg=1");
}else{
$uploaddir = "../tmp_name"; // Where you want the files to upload to - Important: Make sure this folders permissions is 0777!
$allowed_ext = "jpg, gif, png, JPG, GIF, PNG"; // These are the allowed extensions of the files that are uploaded
$max_size = "10000000"; // 50000 is the same as 50kb
$max_height = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$max_width = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$mode=0644;
$dates=time() + (24 * 60 * 60).'-'.date('Y-m-d');
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
}
// Check Height & Width

// The Upload Part
if(is_uploaded_file($_FILES['file']['tmp_name']))
{
move_uploaded_file($_FILES['file']['name'],$uploaddir.'/'.$_FILES['file']['name']);
@chmod($test1, $mode); 
}
$done=@mysql_query("update customers set customers_gender='$gender', customers_firstname='$fname', customers_lastname='$lname', customers_dob='$birth', customers_email_address='$email', customers_telephone='$tel', id='$ids', barcode='$barcode', title='$title', wage='$wage', image='$test', cash_drawer='$cash_drawer', cancel_order='$cancel_order',  void_order='$void_order', checks='$checks', discount='$discount', edit_order='$edit_order'  where  customers_id='$parent'");
if($done){
@mysql_query("update address_book set entry_firstname='$fname', entry_lastname='$lname',  entry_street_address='$address', entry_city='$city', entry_state='$state', entry_postcode='$zip' where customers_id='$parent')");
}

}
header("Location: ?content=employee&msg=1");
}
}
if($eid!=""){
$r1=@mysql_query("select * from customers, address_book where customers.customers_id=address_book.customers_id and customers.customers_id='$eid' ");
$result=@mysql_query("select * from position order by ids desc");

$row=mysql_fetch_array($r1);

$fname=$row['customers_firstname'];
$lname=$row['customers_lastname'];
$birth=$row['customers_dob'];
$gender=$row['customers_gender'];
$address=$row['entry_street_address'];
$city=$row['entry_city'];
$state=$row['entry_state'];
$zip=$row['entry_postcode'];
$ids=$row['id'];
$barcode=$row['barcode'];
$title=$row['title'];
$wage=$row['wage'];
$tel=$row['customers_telephone'];
$email=$row['customers_email_address'];

$cash_drawer=$row['cash_drawer'];
$cancel_order=$row['cancel_order'];
$void_order=$row['void_order'];
$checks=$row['checks'];
$discount=$row['discount'];
$edit_order=$row['edit_order'];
$daily_cal=$row['daily_cal'];
}
?>

<script type="text/javascript">
function comfirms()
  {
  var r=confirm("<?php echo CONFIRM;?>")
  if (r==true)
    {
return true;
    }
  else
    {
return false;
    }
  }
</script>
<table width="798" border="0" align="center" cellpadding="0" cellspacing="0" class="text">
  <!--DWLayoutTable--><form name="login" action="?content=employee_edit" method="post" enctype="multipart/form-data">
  <input type="hidden" name="chk" value="1" />
  <input type="hidden" name="parent" value="<?php echo $_GET['id'];?>">
  <tr>
    <td width="14" height="20">&nbsp;</td>
    <td width="114">&nbsp;</td>
    <td width="38">&nbsp;</td>
    <td width="28">&nbsp;</td>
    <td width="18">&nbsp;</td>
    <td width="103">&nbsp;</td>
    <td width="59">&nbsp;</td>
    <td width="13">&nbsp;</td>
    <td width="43">&nbsp;</td>
    <td width="114">&nbsp;</td>
    <td width="10">&nbsp;</td>
    <td width="76">&nbsp;</td>
    <td width="140">&nbsp;</td>
    <td width="28">&nbsp;</td>
    </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="12" valign="middle" class="errors"><?php 
	if($erros==1){	
	echo "All fields are required with *";
	}
	?></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="4" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="4" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="35">&nbsp;</td>
    <td colspan="4" valign="middle"><?php echo LAST_NAME;?> </td>
    <td colspan="4" valign="middle"><input name="lname" type="text" class="text" id="lname" size="35"  value="<?php echo $lname;?>" />
      *</td>
    <td valign="middle"><?php echo FIRST_NAME;?></td>
    <td colspan="3" valign="middle"><input name="fname" type="text" class="text" id="fname" size="35"  value="<?php echo $fname;?>"  />
      *</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="4" valign="middle"><?php echo GENDER;?></td>
    <td colspan="4" valign="middle"><?php echo MALE;?><input type="radio" name="gender" value="m"  class="text" <?php if($gender=="m" || $gender==""){ echo "checked='checked'"; }?>/>&nbsp; <?PHP echo FEMALE;?><input  type="radio" name="gender" value="f"  class="text" <?php if($gender=="f"){ echo "checked='checked'"; }?>/></td>
    <td valign="middle"><?php echo BIRTH;?></td>
    <td colspan="3" valign="middle"><input name="birth" type="text" class="text" id="fname2" size="20"  value="<?php echo $birth;?>" />
      * 
      mm/dd/yyyy</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="4" valign="middle"><?php echo ADDRESS;?></td> 
    <td colspan="8" valign="middle"><input type="text" class="text" name="address"  size="60"  value="<?php echo $address;?>"/>
      *</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td valign="middle"><?php echo CITY;?></td>
    <td colspan="4" valign="middle"><input name="city" type="text" class="text" id="city" size="20"  value="<?php echo $city;?>" />
      *</td>
    <td colspan="2" valign="middle"><?php echo STATE;?></td>
    <td colspan="2" valign="middle"><?php include("state.php");?>*</td>
    <td colspan="2" valign="middle"><?PHP echo ZIP;?></td> 
    <td valign="middle"><input name="zip" type="text" class="text" id="zip" size="10"   value="<?php echo $zip;?>"/>
      *</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="4" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="4" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="4" valign="bottom" class="red_italic"><?php echo SCAN_BARCODE;?></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="35">&nbsp;</td>
    <td colspan="4" valign="middle"><?PHP echo TEL;?></td>
    <td colspan="4" valign="middle"><input name="tel" type="text" class="text" id="tel" size="35"   value="<?php echo $tel;?>"/>
      *</td>
    <td valign="middle"><?php echo EMPLOYEE_BARCODE;?></td>
    <td colspan="3" valign="middle"><input name="barcode" type="text" class="text" id="barcode" size="35"   value="<?php echo $barcode;?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="35">&nbsp;</td>
    <td colspan="4" valign="middle"><?php echo EMPLOYEE_ID;?></td>
    <td colspan="4" valign="middle"><input name="ids" type="text" class="text" id="ids" size="35"   value="<?php echo $ids;?>"/>
      *</td>
    <td valign="middle"><?php echo EMAIL;?></td>
    <td colspan="3" valign="middle"><input name="email" type="text" class="text" id="email" size="35"   value="<?php echo $email;?>"/>
      *</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="4" valign="middle"><?php echo JOB_TITLE;?></td>
    <td colspan="4" valign="middle">
	<select name="position" class="text">
	<?php while($rows=mysql_fetch_array($result)){ ?>   
    
    <option value="<?php echo $rows['ids'];?>"  <?php if($rows['ids']==$title){ echo "selected='selected'"; }?>><?php echo $rows['title'];?></option>
   
    <?php }?> </select></td>
    <td valign="middle"><?php echo WAGE;?></td>
    <td colspan="3" valign="middle"><input name="wage" type="text" class="text" id="wage" size="35"  value="<?php echo $wage;?>" />
      *</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="33">&nbsp;</td>
    <td colspan="12" valign="bottom"><span class="b_red"><?php echo PRIVILEGES;?></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="33">&nbsp;</td>
    <td colspan="3" valign="middle"><input type="checkbox" class="text" name="cash_drawer" value="1"  <?php if($cash_drawer==1){ echo "checked='checked'"; }?>/>
      <?php echo CASH_DRAWER;?></td>
    <td colspan="3" valign="middle"><input type="checkbox" class="text" name="cancel_order" value="1" <?php if($cancel_order==1){ echo "checked='checked'"; }?>/>
      <?php echo CANCEL_ORDER;?></td>
    <td colspan="4" valign="middle"><input type="checkbox" class="text" name="void_order" value="1" <?php if($void_order==1){ echo "checked='checked'"; }?>/>
      <?php echo VOID_ORDER;?></td>
    <td colspan="2" valign="middle"><input type="checkbox" class="text" name="checks" value="1"<?php if($checks==1){ echo "checked='checked'"; }?> />
      <?php echo CHECKS;?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="33">&nbsp;</td>
    <td colspan="3" valign="middle"><input type="checkbox" class="text" name="discount" value="1"  <?php if($discount==1){ echo "checked='checked'"; }?>/>
      <?php echo DISCOUNT;?></td>
    <td colspan="3" valign="middle"><input type="checkbox" class="text" name="edit_order" value="1"  <?php if($edit_order==1){ echo "checked='checked'"; }?>/>
      <?php echo EDIT_ORDERS;?></td>
    <td colspan="4" valign="middle"><input type="checkbox" class="text" name="daily_cal" value="1"  <?php if($daily_cal==1){ echo "checked='checked'"; }?>/>
      <?php echo DAILY_CAL;?></td>
    <td colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="33">&nbsp;</td>
    <td colspan="12" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td colspan="4" valign="top"><?php echo IMAGE;?></td>
    <td colspan="8" valign="top"><input type="file" name="file" class="text" size="45"  /></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td height="36">&nbsp;</td>
    <td colspan="2" valign="top"><input type="submit" value="<?php echo SUBMIT;?>" class="text" /></td>
    <td colspan="3" valign="top"><input type="reset" value="<?php echo RESET;?>" class="text" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="52">&nbsp;</td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  

  
  
  
  
  
  
  </form>
</table>

