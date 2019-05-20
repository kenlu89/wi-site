<?php 
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
$done=@mysql_query("insert into customers(customers_gender, customers_firstname, customers_lastname, customers_dob, customers_email_address, customers_telephone, id, barcode, title, wage, cash_drawer, cancel_order, void_order, checks, discount, edit_order) values('$gender', '$fname', '$lname', '$birth', '$email', '$tel', '$ids', '$barcode', '$title', '$wage', '$cash_drawer', '$cancel_order', '$void_order', '$checks', '$discount', '$edit_order')");
if($done){
@mysql_query("insert into address_book (customers_id, entry_firstname, entry_lastname, entry_street_address, entry_city, entry_state, entry_postcode) values(LAST_INSERT_ID(), '$fname', '$lname', '$address', '$city', '$state', '$zip')");
}

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
$done=@mysql_query("insert into customers(customers_gender, customers_firstname, customers_lastname, customers_dob, customers_email_address, customers_telephone, id, barcode, title, wage, image, cash_drawer, cancel_order, void_order, checks, discount, edit_order) values('$gender', '$fname', '$lname', '$birth', '$email', '$tel', '$ids', '$barcode', '$title', '$wage', '$test', '$cash_drawer', '$cancel_order', '$void_order', '$checks', '$discount', '$edit_order')");
if($done){
@mysql_query("insert into address_book (customers_id, entry_firstname, entry_lastname,  entry_street_address, entry_city, entry_state, entry_postcode) values(LAST_INSERT_ID(), '$fname', '$lname', '$address', '$city', '$state', '$zip')");
}

}
header("Location: ?content=employee");
}
}
$r1=@mysql_query("select * from customers, address_book where customers.customers_id=address_book.customers_id  order by customers.customers_id desc");
$result=@mysql_query("select * from position order by ids desc");

if($_GET['action']=="remove"){
$id=$_GET['id'];
@mysql_query("delete from customers where customers_id='$id'");
@mysql_query("delete from address_book where customers_id='$id'");
header("Location: ?content=employee");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo LANG; ?>" />
<title><?php echo TITLES;  ?></title>
<link   href="style_sheet.css" type="text/css"  rel="stylesheet" />
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
</head>

<body>
<table width="798" border="0" align="center" cellpadding="0" cellspacing="0" class="text">
  <!--DWLayoutTable--><form name="login" action="?content=employee" method="post" enctype="multipart/form-data">
  <input type="hidden" name="chk" value="1" />
  <tr>
    <td width="27" height="20">&nbsp;</td>
    <td width="74">&nbsp;</td>
    <td width="25">&nbsp;</td>
    <td width="47">&nbsp;</td>
    <td width="34">&nbsp;</td>
    <td width="70">&nbsp;</td>
    <td width="74">&nbsp;</td>
    <td width="36">&nbsp;</td>
    <td width="9">&nbsp;</td>
    <td width="146">&nbsp;</td>
    <td width="25">&nbsp;</td>
    <td width="73">&nbsp;</td>
    <td width="86">&nbsp;</td>
    <td width="26">&nbsp;</td>
    <td width="46">&nbsp;</td>
    </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="13" valign="middle" class="errors"><?php 
	if($erros==1){	
	echo "All fields are required with *";
	}
	
	if($_GET['msg']==1){
	echo UPDATE_DONE;
	}
	?></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="5" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="4" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="3" valign="middle"><?php echo LAST_NAME;?> </td>
    <td colspan="5" valign="middle"><input name="lname" type="text" class="text" id="lname" size="35"  value="<?php echo $lname;?>" />
      *</td>
    <td valign="middle"><?php echo FIRST_NAME;?></td>
    <td colspan="4" valign="middle"><input name="fname" type="text" class="text" id="fname" size="35"  value="<?php echo $fname;?>"  />
      *</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="3" valign="middle"><?php echo GENDER;?></td>
    <td colspan="5" valign="middle"><?php echo MALE;?><input type="radio" name="gender" value="m"  class="text" <?php if($gender=="m" || $gender==""){ echo "checked='checked'"; }?>/>&nbsp; <?PHP echo FEMALE;?><input  type="radio" name="gender" value="f"  class="text" <?php if($gender=="f"){ echo "checked='checked'"; }?>/></td>
    <td valign="middle"><?php echo BIRTH;?></td>
    <td colspan="4" valign="middle"><input name="birth" type="text" class="text" id="fname2" size="20"  value="<?php echo $birth;?>" />
      * 
      mm/dd/yyyy</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="3" valign="middle"><?php echo ADDRESS;?></td> 
    <td colspan="10" valign="middle"><input type="text" class="text" name="address"  size="60"  value="<?php echo $address;?>"/>
      *</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="39">&nbsp;</td>
    <td valign="middle"><?php echo CITY;?></td>
    <td colspan="4" valign="middle"><input name="city" type="text" class="text" id="city" size="20"  value="<?php echo $city;?>" />
      *</td>
    <td valign="middle"><?php echo STATE;?></td>
    <td colspan="3" valign="middle"><?php include("state.php");?>*</td>
    <td colspan="2" valign="middle"><?PHP echo ZIP;?></td> 
    <td colspan="2" valign="middle"><input name="zip" type="text" class="text" id="zip" size="10"   value="<?php echo $zip;?>"/>
      *</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="5" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="5" valign="bottom" class="red_italic"><?php echo SCAN_BARCODE;?></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="3" valign="middle"><?PHP echo TEL;?></td>
    <td colspan="5" valign="middle"><input name="tel" type="text" class="text" id="tel" size="35"   value="<?php echo $tel;?>"/>
      *</td>
    <td valign="middle"><?php echo EMPLOYEE_BARCODE;?></td>
    <td colspan="4" valign="middle"><input name="barcode" type="text" class="text" id="barcode" size="35"   value="<?php echo $barcode;?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="3" valign="middle"><?php echo EMPLOYEE_ID;?></td>
    <td colspan="5" valign="middle"><input name="ids" type="text" class="text" id="ids" size="35"   value="<?php echo $ids;?>"/>
      *</td>
    <td valign="middle"><?php echo EMAIL;?></td>
    <td colspan="4" valign="middle"><input name="email" type="text" class="text" id="email" size="35"   value="<?php echo $email;?>"/>
      *</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="3" valign="middle"><?php echo JOB_TITLE;?></td>
    <td colspan="5" valign="middle">
	<select name="position" class="text">
	<?php while($rows=mysql_fetch_array($result)){ ?>   
    
    <option value="<?php echo $rows['ids'];?>"  <?php if($rows['ids']==$title){ echo "selected='selected'"; }?>><?php echo $rows['title'];?></option>
   
    <?php }?> </select></td>
    <td valign="middle"><?php echo WAGE;?></td>
    <td colspan="4" valign="middle"><input name="wage" type="text" class="text" id="wage" size="35"  value="<?php echo $wage;?>" />
      *</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="33">&nbsp;</td>
    <td colspan="13" valign="bottom" class="b_red"><?php echo PRIVILEGES;?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="33">&nbsp;</td>
    <td colspan="4" valign="middle"><input type="checkbox" class="text" name="cash_drawer" value="1" /> <?php echo CASH_DRAWER;?></td>
    <td colspan="3" valign="middle"><input type="checkbox" class="text" name="cancel_order" value="1" /> <?php echo CANCEL_ORDER;?></td>
    <td colspan="3" valign="middle"><input type="checkbox" class="text" name="void_order" value="1" /> <?php echo VOID_ORDER;?></td>
    <td colspan="3" valign="middle"><input type="checkbox" class="text" name="checks" value="1" /> <?php echo CHECKS;?></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td colspan="4" valign="middle"><input type="checkbox" class="text" name="discount" value="1"  <?php if($discount==1){ echo "checked='checked'"; }?>/>
      <?php echo DISCOUNT;?></td>
    <td colspan="3" valign="middle"><input type="checkbox" class="text" name="edit_order" value="1"  <?php if($edit_order==1){ echo "checked='checked'"; }?>/>
      <?php echo EDIT_ORDERS;?></td>
    <td colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td colspan="3" valign="top"><?php echo IMAGE;?></td>
    <td colspan="10" valign="top"><input type="file" name="file" class="text" size="45"  /></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td height="36">&nbsp;</td>
    <td colspan="2" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
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
  <tr>
    <td height="45">&nbsp;</td>
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
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="20" colspan="15" valign="middle" class="bar">&nbsp;<?php echo CURRENT_EMPLOYEE;?></td>
    </tr>
  
  
  <tr>
    <td height="25">&nbsp;</td>
    <td colspan="12" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="text">
      <!--DWLayoutTable--><?php while($employee=mysql_fetch_array($r1)){?>
      <tr>
        <td width="196" height="25" valign="middle"><?php echo $employee['customers_firstname']." ".$employee['customers_lastname']; ?></td>
          <td width="171" valign="middle"><?php echo $employee['title'];?></td>
          <td width="232" valign="top"><?php echo $employee['customers_telephone']; ?></td>
          <td width="129" align="center" valign="middle"><a href="?content=employee_edit&id=<?php echo $employee['customers_id']?>" target="_self" class="red_small_link"><?php echo EDIT;?></a>&nbsp; | &nbsp; <a href="?content=employee&action=remove&id=<?php echo $employee['customers_id']?>" target="_self" class="red_small_link" onclick="return comfirms()"><?php echo REMOVE;?></a></td>
        </tr>
      
      
      <?php }?>
    </table></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="48">&nbsp;</td>
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
    <td>&nbsp;</td>
  </tr>
  
  
  
  
  
  

  </form>
</table>
</body>
</html>
