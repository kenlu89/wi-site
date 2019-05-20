<?php 
$pid=$_GET['pid'];
if($pid==""){
$pid=$_POST['pid'];
}
$id=$_GET['id'];
$lan_id=$_GET['lan_id'];
function randomkeys($length)
  {
   $pattern = "QWERTYUIOPLKJHGFDSAZXCVBNM1234567890";
   for($i=0;$i<$length;$i++)
   {
     $key .= $pattern{rand(0,35)};
   }
   return $key;
  }
$model=randomkeys(8);

if($_POST['chk']==1){
$id=$_POST['id'];
$model=$_POST['model'];
$description=$_POST['description'];
$files=$_FILES['file']['name'];
$stats=$_POST['stats']; 
$names=$_POST['names'];
$stats_bar=$_POST['stats_bar'];
$gallery_=$_POST['gallery_'];
$language=$_POST['lang'];
$source=$_POST['source'];
$publish_time=$_POST['publish_time'];

if($names==""){
$errors=1;
}else{
$times=date("Y-m-d H:i:s"); 
//$chk=@mysql_query("select * from products where products_id=
@mysql_query("insert into article(products_model, products_date_added, products_status, gallery_, stats_bar) values('$model', '$times', '$stats', '$gallery_', '$stats_bar')");
$pid=mysql_insert_id();
@mysql_query("insert into article_description(products_id, products_description, products_name, language_id) values ('$pid', '$description', '$names', '$language')");

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
@mysql_query("update article set products_image='$test' where products_id='$pid'");
}
}
//=======================================================================================================================
//@mysql_query("insert into products_to_categories values('$pid', '$id')");

header("Location: ?content=articles&id=$id&msg=1");

}
}

?>
	<script src="../ckeditor/ckeditor.js"></script>
	<link href="../ckeditor/sample.css" rel="stylesheet">
<script language="javascript" type="text/javascript">
			function showProducts()
			{
			var newQty =document.getElementById("language").value;
			document.location.href = '?content=new_article&lan_id='+newQty+'&id=<?php echo $_GET['id'];?>';
			}
</script>
<table width="800" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable--><form name="product" action="?content=new_article"  enctype="multipart/form-data" method="post"><input type="hidden" name="chk" value="1" />
        <input type="hidden" name="id"  value="<?php echo $id; ?>" />
        <input  type="hidden" name="pid" value="<?php echo $pid;?>" />
        <input type="hidden" name="lang" value="<?php echo $lan_id;?>" />
        <tr>
          <td width="6" height="41">&nbsp;</td>
          <td width="152">&nbsp;</td>
          <td width="20">&nbsp;</td>
          <td width="53">&nbsp;</td>
          <td width="20">&nbsp;</td>
          <td width="108">&nbsp;</td>
          <td width="21">&nbsp;</td>
          <td width="191">&nbsp;</td>
          <td width="179">&nbsp;</td>
          <td width="34">&nbsp;</td>
          <td width="16">&nbsp;</td>
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
      <option value="3" <?php if($lan_id==3){ echo "selected=\"selected\""; }?>><?php echo TRADINTION_CHINESE;?></option>
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
          <td colspan="8" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td>&nbsp;</td>
        </tr>

        <tr>
          <td height="30"></td>
            <td valign="middle" class="text"><?php echo MENU_BAR;?></td>
            <td colspan="8" valign="middle" class="text"><input type="radio" name="stats_bar" value="1"  <?php if($stats_bar==1){ echo "checked=\"checked\""; }?>/>
              <?php echo TOP_MENU;?>&nbsp;
              <input type="radio" name="stats_bar" value="2" <?php if($stats_bar==2){ echo "checked=\"checked\""; }?>/>
              <?php echo BOTTOM_MENU;?> &nbsp; <input type="radio" name="stats_bar" value="3" <?php if($stats_bar==3){ echo "checked=\"checked\""; }?>/>
              <?php echo BOTH;?></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="19"></td>
          <td valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td colspan="8" valign="middle" class="errors"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="303"></td>
          <td valign="top" class="text"><?php echo DESCRIPTION;?></td>
          <td colspan="8" valign="top" class="errors"><textarea name="description" cols="70" rows="15" class="ckeditor" id="editor4" tabindex="1"><?php echo $description;?></textarea></td>
          <td>&nbsp;</td>
        </tr>
        
        
        
        <tr>
          <td height="30"></td>
          <td valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td colspan="8" valign="middle" class="errors"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
  
  <tr>
          <td height="30">&nbsp;</td>
          <td valign="middle"><?php echo RELATE_GALLERY;?></td>
          <td colspan="8" valign="middle" class="errors"><?php echo $rows_cate['gallery_'];?><select name="gallery_" class="text" id="gallery_">
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
        </tr>  
        <tr>
          <td height="30"></td>
          <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td colspan="8" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="41"></td>
          <td valign="middle"><input type="submit" name="submit" value="<?php echo SUBMIT;?>"  class="text"/></td>
          <td colspan="6" valign="middle"><input type="reset" name="reset" value="<?php echo RESET;?>"  class="text"/></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="111"></td>
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

