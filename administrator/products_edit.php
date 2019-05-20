<?php 
$pid=$_GET['id'];
$parent=$_GET['parent'];
if($pid==""){
$pid=$_POST['id'];
$parent=$_POST['parent'];
}
$lan_id=$_GET['lan_id'];
if($lan_id==""){
$lan_id=1;
}

if($pid!=""){
$r=@mysql_query("select * from products_description where products_id='$pid' and  language_id='$lan_id' order by products_id desc");
$row=mysql_fetch_array($r);
$r1=@mysql_query("select * from products where products_id='$pid'");
$rows1=mysql_fetch_array($r1);
$stats=$row1['products_status'];
$model=$rows1['products_model'];
$description=$row['products_description'];
$names=$row['products_name'];
$tel=$rows1['tel'];
$email=$rows1['email'];
$other=$rows1['other'];
$featured=$rows1['featured'];
$gallery=$rows1['gallery_'];
}

if($_POST['chk']==1){
$cate=$_POST['cate'];
$pid=$_POST['pid'];
$lan_id=$_POST['lang'];
$model=$_POST['model'];
$description=$_POST['description'];
$featured=$_POST['featured'];
$files=$_FILES['file']['name'];
$stats=$_POST['stats']; 
$names=$_POST['names'];
$parent=$_POST['parent'];
$other=$_POST['source'];
$tel=$_POST['author'];
$gallery=$_POST['gallery_'];
$email=$_POST['publish_time'];
$language=$_POST['lang'];
$remove_image=$_POST['remove_image'];

if($remove_image==1){
@mysql_query("update products set products_image='' where products_id='$pid'");

}
if($model==""){
$errors=1;
}else{

@mysql_query("update products_to_categories set categories_id='$parent' where products_id='$pid'");
$times=date("Y-m-d H:i:s"); 
@mysql_query("update  products set products_model='$model',  products_status='$stats', featured='$featured', gallery_='$gallery' where products_id='$pid'");
$chk=@mysql_query("select * from products_description where language_id='$language' and products_id='$pid'");
if(mysql_num_rows($chk)>=1){
@mysql_query("update products_description set products_description='$description', products_name='$names' where products_id='$pid' and language_id='$language'");
}else{
@mysql_query("insert into products_description(products_id, products_description, products_name, language_id) values ('$pid', '$description', '$names', '$language')");
}
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
//header("Location: ../test.php?parent=$parent&id=$pid");
header("Location: ?content=categories&id=$parent&msg=1");
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
			document.location.href = '?content=products_edit&lan_id='+newQty+'&id=<?php echo $_GET['id'];?>&parent=<?php echo $_GET['parent']; ?>';
			}
</script>
<?Php

$current=@mysql_query("select * from products_to_categories where products_id='$id'");
$row_current=mysql_fetch_array($current);
?>
<table width="800" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable--><form name="product" action="?content=products_edit"  enctype="multipart/form-data" method="post"><input type="hidden" name="chk" value="1" />
        <input type="hidden" name="id"  value="<?php echo $id; ?>" />
        <input  type="hidden" name="pid" value="<?php echo $pid;?>" /><input type="hidden" name="parent" value="<?php echo $parent;?>" />
        <tr>
          <td width="7" height="41">&nbsp;</td>
          <td width="152">&nbsp;</td>
          <td width="20">&nbsp;</td>
          <td width="54">&nbsp;</td>
          <td width="20">&nbsp;</td>
          <td width="109">&nbsp;</td>
          <td width="22">&nbsp;</td>
          <td width="106">&nbsp;</td>
          <td width="87">&nbsp;</td>
          <td width="216">&nbsp;</td>
          <td width="7">&nbsp;</td>
        </tr>
        <tr>
          <td height="30">&nbsp;</td>
          <td valign="middle"><?php echo CATEGORIES;?></td>
          <td colspan="8" valign="middle" class="text"><select name="cate" id="cate" class="text"><option value="">--- <?php echo SELECT;?> ---</option>
          <?php $all_cate=@mysql_query("select * from categories_description where language_id='$lan' order by categories_id asc");
		  
		  while($rows_cate=mysql_fetch_array($all_cate)){
		  ?>
          <option value="<?php echo $rows_cate['categories_id'];?>" <?Php if($parent== $rows_cate['categories_id']){ echo "selected=\"selected\""; }?>><?php echo $rows_cate['categories_name'];?></option>
           <?php }?>
          </select></td>
          <td>&nbsp;</td>
        </tr>
  
        <tr>
          <td height="30">&nbsp;</td>
          <td valign="middle"><?php echo RELATE_GALLERY;?></td>
          <td colspan="8" valign="middle" class="errors"><?php echo $rows_cate['gallery_'];?>            <select name="gallery_" class="text" id="gallery_">
                        <option value="">--- <?Php echo SELECT;?> ---</option>
                        <?php 
						$album=@mysql_query("select * from album_description where language_id='$lan' order by album_id desc");
						while($row_album=mysql_fetch_array($album)){
						?>
                        <option value="<?php echo $row_album['album_id'];?>" <?php if($row_album['album_id']==$rows1['gallery_']){ echo "selected=\"selected\""; }?>><?php echo $row_album['album_name'];?></option>
                        <?php 
						
						}
						?>
          </select></td>
          <td>&nbsp;</td>
        </tr>        <?php if($errors==1){?>
        <tr>
          <td height="30">&nbsp;</td>
          <td colspan="9" valign="middle" class="errors"><?php echo MSG;?></td>
          <td>&nbsp;</td>
        </tr>
        <?php }?>
        <tr>
          <td height="30">&nbsp;</td>
            <td valign="middle" class="text"><?php echo PRODUCT_STATS;?></td>
            <td valign="middle" class="text"><input type="radio" name="stats" value="1" <?php if($stats==1 || $stats==""){ echo "checked=\"checked\""; }?>/></td>
            <td valign="middle" class="text"><?php echo IN_STOCK;?></td>
            <td valign="middle"><input type="radio" name="stats" value="2" <?php if($stats==2){ echo "checked=\"checked\""; } ?>/></td>
            <td valign="middle" class="text"><?php echo OUT_STOCK;?></td>
            <td align="center" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td colspan="2" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
      <td align="right" valign="middle">
      
      <select name="lang" class="text" onchange="showProducts()" id="language">
        <option value="1" <?php if($lan_id==1){ echo "selected=\"selected\""; }?>><?php echo ENGLISH;?></option>
        <option value="3" <?php if($lan_id==3){ echo "selected=\"selected\""; }?>><?php echo SIMPLIFY_CHINESE;?></option>
      </select></td>
          <td>&nbsp;</td>
        </tr>
        
        <tr>
          <td height="30"></td>
            <td valign="middle" class="text"><?php echo PRODUCT_NAME;?></td>
            <td colspan="8" valign="middle"><input name="names" type="text" class="text" id="names" size="100"  value="<?php echo $names;?>"/></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="19"></td>
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
          <td height="19"></td>
          <td valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td colspan="8" valign="middle" class="errors"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="283"></td>
          <td valign="top" class="text"><?php echo DESCRIPTION;?></td>
          <td colspan="8" valign="top"><textarea name="description" cols="100" rows="30"  class="ckeditor" id="editor4"><?php echo $description;?></textarea></td>
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
          <td valign="top"><?php echo FEATURED;?></td>
          <td colspan="8" valign="top"><input type="checkbox" name="featured" value="1" <?php if($featured==1){ ?>checked="checked"<?php }?> /></td>
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
          <td colspan="6" valign="top"><input type="file" name="file" size="35" class="text" /></td>
          <td colspan="2" align="center" valign="middle" class="bar"><?php echo CURRENT_IMAGE;?></td>
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
          <td colspan="2" align="right" valign="top"><?php 
$image="../".$rows1['products_image'];
				  
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
          
          <img src="<?php echo $image;?>" height="<?php echo $height;?>" width="<?php echo $width;?>" class="box" /><br />
<br />

<input type="checkbox" name="remove_image" value="1" /> Image Remove
</td>
          <td>&nbsp;</td>
        </tr>
        

        <tr>
          <td height="41"></td>
          <td valign="middle"><input type="submit" name="submit" value="<?php echo SUBMIT;?>"  class="text"/></td>
          <td colspan="7" valign="middle"><input type="reset" name="reset" value="<?php echo RESET;?>"  class="text"/></td>
          <td>&nbsp;</td>
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
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        </form>
  </table>

