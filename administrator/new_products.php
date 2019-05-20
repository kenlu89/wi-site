<?php 
$pid=$_GET['pid'];
if($pid==""){
$pid=$_POST['pid'];
}
$id=$_GET['id'];
$lan_id=$_GET['lan_id'];
	  if($lan_id==""){
	  $lan_id=1;
	  }

function randomkeys($length)
  {
   $pattern = "QWERTYUIOPLKJHGFDSAZXCVBNM1234567890";
   for($i=0;$i<$length;$i++)
   {
     $key .= $pattern{rand(0,35)};
   }
   return $key;
  }
$model=randomkeys(6);

if($_POST['chk']==1){
$id=$_POST['id'];
$model=$_POST['model'];
$description=$_POST['description'];
$files=$_FILES['file']['name'];
$stats=$_POST['stats']; 
$names=$_POST['names'];
$tel=$_POST['author'];
$language=$_POST['lang'];
$other=$_POST['source'];
$email=$_POST['publish_time'];

if($names=="" ){
$errors=1;
}else{
$times=date("Y-m-d H:i:s"); 
//$chk=@mysql_query("select * from products where products_id=
@mysql_query("insert into products(products_model, products_date_added, products_status) values('$model', '$times', '$stats')");
$pid=mysql_insert_id();
@mysql_query("insert into products_description(products_id, products_description, products_name, language_id) values ('$pid', '$description', '$names', '$language')");
@mysql_query("insert into products_description(products_id, products_description, products_name, language_id) values ('$pid', '$description', '$names', '3')");


if($files!=""){

if (!is_dir("../tmp_name/".date("Y"))){
mkdir("../tmp_name/".date("Y"), 0700);
mkdir("../tmp_name/".date("Y")."/".date("m"), 0700);
}else if(!is_dir("../tmp_name/".date("Y")."/".date("m"))){
mkdir("../tmp_name/".date("Y")."/".date("m"), 0700);
}


$uploaddir = "../tmp_name/".date("Y")."/".date("m"); 
$data_path="tmp_name/".date("Y")."/".date("m"); // Where you want the files to upload to - Important: Make sure this folders permissions is 0777!
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
$test=$data_path.'/'."$dates.$extension";
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
@mysql_query("update products set products_image='$test' where products_id='$pid'");
}
}
//=======================================================================================================================
@mysql_query("insert into products_to_categories values('$pid', '$id')");

header("Location: ?content=categories&id=$id&msg=1");
//header("Location: ../test.php?parent=$id&id=$pid");
}
}

?>
<script src="clienthint.js"></script> 
	<script src="../ckeditor/ckeditor.js"></script>
	<link href="../ckeditor/sample.css" rel="stylesheet">
<script language="javascript" type="text/javascript">
			function showProducts( )
			{
			var newQty =document.getElementById("language").value;
			document.location.href = '?content=new_products&lan_id='+newQty+'&id=<?php echo $_GET['id'];?>';
			}
</script>
<table width="800" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable--><form name="product" action="?content=new_products"  enctype="multipart/form-data" method="post"><input type="hidden" name="chk" value="1" />
        <input type="hidden" name="id"  value="<?php echo $id; ?>" />
        <input  type="hidden" name="pid" value="<?php echo $pid;?>" />
        <tr>
          <td width="7" height="41">&nbsp;</td>
          <td width="152">&nbsp;</td>
          <td width="20">&nbsp;</td>
          <td width="54">&nbsp;</td>
          <td width="20">&nbsp;</td>
          <td width="109">&nbsp;</td>
          <td width="22">&nbsp;</td>
          <td width="193">&nbsp;</td>
          <td width="181">&nbsp;</td>
          <td width="35">&nbsp;</td>
          <td width="7">&nbsp;</td>
        </tr>
  
        <?php if($errors==1){?>
        <tr>
          <td height="30">&nbsp;</td>
          <td colspan="8" valign="middle" class="errors"><?php echo MSG;?></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <?php }?>
        <tr>
          <td height="30">&nbsp;</td>
            <td valign="middle" class="text"><?php echo PRODUCT_STATS;?></td>
            <td valign="middle" class="text"><input type="radio" name="stats" value="1"  checked="checked"/></td>
            <td valign="middle" class="text"><?php echo IN_STOCK;?></td>
            <td valign="middle"><input type="radio" name="stats" value="0" /></td>
            <td valign="middle" class="text"><?php echo OUT_STOCK;?></td>
            <td align="center" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td align="right" valign="middle">

      <select name="lang" class="text" onchange="showProducts()" id="language">
      <option value="1" <?php if($lan_id==1){ echo "selected=\"selected\""; }?>><?php echo ENGLISH;?></option>
      <option value="3" <?php if($lan_id==3){ echo "selected=\"selected\""; }?>><?php echo SIMPLIFY_CHINESE;?></option>
      </select></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        
        <tr>
          <td height="30"></td>
            <td valign="middle" class="text"><?php echo PRODUCT_NAME;?></td>
            <td colspan="8" valign="middle"><input name="names" type="text" class="text" id="names" size="100"  value="<?php echo $names;?>"/></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="15"></td>
          <td valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td colspan="8" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td>&nbsp;</td>
        </tr>

        <tr>
          <td height="30"></td>
            <td valign="middle" class="text"><?php echo ITEM_NUM;?></td>
            <td colspan="8" valign="middle" class="errors"><input type="text" name="model"  class="text"  size="35" id="model"  onkeyup="showHint(this.value)" value="<?php echo $model;?>"/> 
              * <span id="txtHint"></span></td>
            <td>&nbsp;</td>
        </tr>

        <tr>
          <td height="15"></td>
          <td valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td colspan="8" valign="middle" class="errors"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="300"></td>
          <td valign="top" class="text"><?php echo DESCRIPTION;?></td>
          <td colspan="8" valign="top" class="errors"><textarea name="description" cols="100" rows="20" class="ckeditor" id="editor4"><?php echo $description;?></textarea></td>
          <td>&nbsp;</td>
        </tr>
        
        
        
        <tr>
          <td height="30"></td>
          <td valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td colspan="8" valign="middle" class="errors"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        
        <tr>
          <td height="30"></td>
          <td valign="top"><?php echo TEL;?></td>
          <td colspan="8" valign="top">
            <input type="text" name="author"  class="text"  size="35" id="author" value="<?php echo $tel;?>"/>          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="30"></td>
          <td valign="top"><?php echo GMAIL;?></td>
          <td colspan="8" valign="top"> <input type="text" name="publish_time"  class="text"  size="35" id="times" value="<?php echo $email;?>"/></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="30"></td>
          <td valign="top"><?php echo OTHER;?></td>
          <td colspan="8" valign="top">  <input type="text" name="source"  class="text"  size="35" id="source" value="<?php echo $other;?>"/></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="30"></td>
          <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td colspan="8" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="30"></td>
          <td valign="top"><?php echo IMAGE;?></td>
          <td colspan="8" valign="top"><input type="file" name="file" size="35" class="text" /></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="60"></td>
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
          <td height="41"></td>
          <td valign="middle"><input type="submit" name="submit" value="<?php echo SUBMIT;?>"  class="text"/></td>
          <td colspan="6" valign="middle"><input type="reset" name="reset" value="<?php echo RESET;?>"  class="text"/></td>
          <td>&nbsp;</td>
          <td></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="51"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td></td>
          <td>&nbsp;</td>
        </tr>
        

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        </form>
  </table>

