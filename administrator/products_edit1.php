<?php 
$pid=$_GET['id'];
$parent=$_GET['parent'];
if($pid==""){
$pid=$_POST['id'];
$parent=$_POST['parent'];
}

if($pid!=""){
$r=@mysql_query("select * from products_description, products where  products_description.products_id=products.products_id and  products.products_id='$pid' and  products_description.language_id=1 order by products.products_id desc");
$row=mysql_fetch_array($r);

$stats=$row['products_status'];
$model=$row['products_model'];
$description=$row['products_description'];
$names=$row['products_name'];
$stats=$row['products_status'];

$r2=@mysql_query("select * from products_description, products where  products_description.products_id=products.products_id and  products.products_id='$pid' and  products_description.language_id=3 order by products.products_id desc");
$row2=mysql_fetch_array($r2);

$description_ch=$row2['products_description'];
$names2=$row2['products_name'];
}

if($_POST['chk']==1){
$pid=$_POST['id'];
$lan_id=$_POST['lan_id'];
$model=$_POST['model'];
$description=$_POST['description'];
$description_ch=$_POST['description2'];
$price=$_POST['price'];
$qty=$_POST['qty'];
$weight=$_POST['weight']; 
$files=$_FILES['file']['name'];
$stats=$_POST['stats']; 
$names=$_POST['names'];
$names_ch=$_POST['names2'];
$taxable=$_POST['tax'];
$price1=$_POST['price1'];
$unit=$_POST['price_unit'];
$unit1=$_POST['price_unit1'];
$unit2=$_POST['price_unit2'];
$discontinue=$_POST['wholesale'];
$stats=$_POST['stats'];
if($model=="" || $price=="" ){
$errors=1;
}else{

$price=$_POST['price']; 

$times=date("Y-m-d H:i:s"); 
@mysql_query("update  products set products_model='$model', products_price='$price', products_status='$stats', wholesales='$discontinue' where products_id='$pid'");

@mysql_query("update products_description set products_description='$description', products_name='$names' where products_id='$pid' and language_id=1");
@mysql_query("update products_description set products_description='$description_ch', products_name='$names_ch' where products_id='$pid'  and language_id=3");

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
@mysql_query("update products set products_image='$test' where products_id='$pid'");
}
}
//=======================================================================================================================



echo "<script>alert('".UPDATE_DONE."');window.location='?content=categories&id=$parent';</script>";
}
}

?>
<script src="clienthint.js"></script> 
<script language="javascript" type="text/javascript"  src="../tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
	mode : "textareas"
});
			function showProducts( )
			{
			var newQty =document.getElementById("cate").value;
			document.location.href = '?content=new_products&pid='+newQty+'&id=<?php echo $_GET['id'];?>';
			}
</script>
<table width="800" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable--><form name="product" action="?content=products_edit"  enctype="multipart/form-data" method="post"><input type="hidden" name="chk" value="1" />
        <input  type="hidden" name="id" value="<?php echo $pid;?>" /><input type="hidden" name="parent" value="<?php echo $parent;?>" />
        <tr>
          <td width="8" height="107">&nbsp;</td>
          <td width="152">&nbsp;</td>
          <td width="20">&nbsp;</td>
          <td width="55">&nbsp;</td>
          <td width="20">&nbsp;</td>
          <td width="110">&nbsp;</td>
          <td width="23">&nbsp;</td>
          <td width="26">&nbsp;</td>
          <td width="169">&nbsp;</td>
          <td width="32">&nbsp;</td>
          <td width="154">&nbsp;</td>
          <td width="31">&nbsp;</td>
        </tr>
        
        <?php if($errors==1){?>
        <tr>
          <td height="30">&nbsp;</td>
          <td colspan="10" valign="middle" class="errors"><?php echo MSG;?></td>
          <td>&nbsp;</td>
        </tr><?php }?>
        <tr>
          <td height="30">&nbsp;</td>
            <td valign="middle" class="text"><?php echo PRODUCT_STATS;?></td>
            <td valign="middle" class="text"><input type="radio" name="stats" value="1" <?php if($stats==1){ echo "checked=\"checked\""; }?>/></td>
            <td valign="middle" class="text"><?php echo IN_STOCK;?></td>
            <td valign="middle"><input type="radio" name="stats" value="0"  <?php if($stats==0){ echo "checked=\"checked\""; }?>/></td>
            <td valign="middle" class="text"><?php echo OUT_STOCK;?></td>
            <td align="center" valign="middle" class="text"><input  type="checkbox" name="wholesale" value="1" /></td>
            <td colspan="2" valign="middle" class="text"><?php echo DISCONTINUE;?></td>
            <td valign="middle"><span class="text">
              <input  type="checkbox" name="tax" value="1" id="tax"  <?php if($taxable==1){ echo "checked='checked'"; }?>/>
            </span></td>
            <td valign="middle"><?php echo TAXBALE;?></td>
            <td>&nbsp;</td>
        </tr>
        
        <tr>
          <td height="30"></td>
            <td valign="middle" class="text"><?php echo PRODUCT_NAME;?></td>
            <td colspan="10" valign="middle"><input name="names" type="text" class="text" id="names" size="100"  value="<?php echo $names;?>"/></td>
          </tr>
        <tr>
          <td height="30"></td>
          <td valign="middle" class="text"><?php echo PRODUCT_NAME_CH;?></td>
          <td colspan="10" valign="middle"><input name="names2" type="text" class="text" id="names2" size="100"  value="<?php echo $names2;?>"/></td>
        </tr>
        <tr>
          <td height="30"></td>
            <td valign="middle" class="text"><?php echo ITEM_NUM;?></td>
            <td colspan="10" valign="middle" class="errors"><input type="text" name="model"  class="text"  size="35" id="model"  onkeyup="showHint(this.value)" value="<?php echo $model;?>"/> 
              * <span id="txtHint"></span></td>
          </tr>
        <tr>
          <td height="30"></td>
          <td valign="middle" class="text"><?php echo RETAIL_PRICE;?></td>
          <td colspan="10" valign="middle" class="text"><input name="price" type="text"  class="text" id="price"  size="15" value="<?php echo $price;?>"/> &nbsp;&nbsp; &nbsp; &nbsp;</td>
        </tr>
        <tr>
          <td height="30"></td>
          <td valign="middle" class="text"><?php echo DESCRIPTION_CH;?></td>
          <td colspan="10" rowspan="2" valign="middle" class="errors"><textarea name="description2" cols="100" rows="10" class="text" id="description2"><?php echo $description_ch;?></textarea></td>
        </tr>
        <tr>
          <td height="133"></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="30"></td>
          <td valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td colspan="10" valign="middle" class="errors"><!--DWLayoutEmptyCell-->&nbsp;</td>
        </tr>
        <tr>
          <td height="30"></td>
            <td valign="middle" class="text"><?php echo DESCRIPTION;?></td>
            <td colspan="10" rowspan="2" valign="top"><textarea name="description" cols="100" rows="10" class="text" id="description"><?php echo $description;?></textarea></td>
          </tr>
        <tr>
          <td height="161"></td>
            <td>&nbsp;</td>
          </tr>
        <tr>
          <td height="35"></td>
          <td valign="top"><?php echo IMAGE;?></td>
          <td colspan="10" valign="top"><input type="file" name="file" class="text" size="35" /></td>
        </tr>
        <tr>
          <td height="32"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="4" rowspan="3" align="right" valign="top">
                                <?php 
$image="../".$row['products_image'];
				  
if(!file_exists($image)){		
$image=DEFAULT_;
$height=280;
$width=280;
}else{
list($width, $height, $type, $w) = getimagesize($image);
if($width>300){
$p_width=(1-($width-300)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
//$image="../".$image;
}

}
?>
          
          <img src="<?php echo $image;?>" height="<?php echo $height;?>" width="<?php echo $width;?>" class="gray_box" /></td>
        </tr>
        <tr>
          <td height="41"></td>
          <td valign="middle"><input type="submit" name="submit" value="<?php echo SUBMIT;?>" /></td>
        <td colspan="6" valign="middle"><input type="reset" name="reset" value="<?php echo RESET;?>" /></td>
        </tr>
        
        <tr>
          <td height="48"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        
        <tr>
          <td height="26"></td>
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

