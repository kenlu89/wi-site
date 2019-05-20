<?php 

$r1=@mysql_query("select * from products_description, products where  products_description.products_id=products.products_id order by products.products_id desc");


if($_POST['chk']==1){ 
 $title=$_POST['title'];
 $link=$_POST['link'];
$files=$_FILES['file']['name'];
$stats=$_POST['stats'];

$sort_order=$_POST['sort_order'];
$language=$_POST['language'];
if($title=="" || $link==""){
$error=1;

}else{
$done=@mysql_query("insert into social_meida (meida_name, meida_url, language_id, sort_order)values('$title', '$link', '$language', '$sort_order')");
$last_id=mysql_insert_id();


if($files!=""){
$uploaddir = "../tmp_name"; // Where you want the files to upload to - Important: Make sure this folders permissions is 0777!
$allowed_ext = "jpg, gif, png, JPG, GIF, PNG"; // These are the allowed extensions of the files that are uploaded
$max_size = "10000000"; // 50000 is the same as 50kb
$max_height = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$max_width = "1500"; // This is in pixels - Leave this field empty if you don't want to upload images
$mode=0644;

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
@mysql_query("update social_meida set meida_image='$test' where social_meida_id='$last_id'");
}
}

}
header("Location: ?content=social&msg=1");
}


if($_GET['action']=="remove"){
$id=$_GET['id'];
@mysql_query("delete from  social_meida where social_meida_id='$id'");
header("Location: ?content=social&msg=1");
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
</head>

<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="text">
  <!--DWLayoutTable-->
  
 <form name="form1" action="?content=social"  enctype="multipart/form-data" method="post">
 <input  type="hidden" name="chk" value="1" />

  
  
  <tr>
    <td width="68" height="20">&nbsp;</td>
    <td width="120">&nbsp;</td>
    <td width="30">&nbsp;</td>
    <td width="369">&nbsp;</td>
    <td width="80">&nbsp;</td>
    <td width="68">&nbsp;</td>
    <td width="65">&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td valign="middle"><?php echo BANNER_TITLE;?></td>
    <td colspan="4" valign="middle"><input type="text" name="title" class="text" size="70" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="4" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td valign="middle"><?php echo BANNER_LINK;?></td>
    <td colspan="4" valign="middle"><input type="text" name="link" class="text" size="70" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="4" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td height="24">&nbsp;</td>
    <td valign="middle"><?php echo LANGUAGE;?></td>
    <td colspan="4" valign="middle"><input type="radio" name="language" value="1"  checked="checked"/> <?php echo ENGLISH;?> &nbsp; &nbsp; <input type="radio" name="language" value="3" /> <?php echo CHINESE;?> </td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td height="24">&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="4" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td valign="middle"><?php echo SORT_ORDER;?></td>
    <td colspan="4" valign="middle"><input type="text" name="sort_order"></td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td height="24">&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="4" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td valign="middle"><?php echo IMAGE;?></td>
    <td colspan="4" valign="middle"><input type="file" name="file" class="text" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
    <td colspan="5" valign="bottom"><input name="submit" type="submit" class="text" value="<?php echo SUBMIT;?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td colspan="5" valign="middle" class="bar">&nbsp; <?php echo BANNERS;?></td>
    <td>&nbsp;</td>
  </tr><?php
  $banners=@mysql_query("select * from social_meida order by social_meida_id desc");
  while($rows_banner=mysql_fetch_array($banners)){
  ?>
  <tr>
    <td height="40">&nbsp;</td>
    <td colspan="2" valign="middle"> <?php 
	if($rows_banner['meida_image']!=""){
$image="../".$rows_banner['meida_image'];
				  
if(!file_exists($image)){		
$image=DEFAULT_;
$height=140;
$width=140;
}else{
list($width, $height, $type, $w) = getimagesize($image);
if($width>140){
$p_width=(1-($width-140)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
//$image="../".$image;
}

}
?>
  <br />
<br />
        
          <img src="<?php echo $image;?>" height="<?php echo $height;?>" width="<?php echo $width;?>"  class="gray_box"/><br />
<br />
<?php }?></td>
    <td valign="middle"><?php echo $rows_banner['meida_url'];?></td>
    <td align="center" valign="middle"><a href="?content=edit_social&id=<?php echo $rows_banner['social_meida_id'];?>"  class="H_link"><?php echo EDIT;?></a></td>
    <td align="center" valign="middle"><a href="?content=social&action=remove&id=<?php echo $rows_banner['social_meida_id'];?>" onClick="return comfirms()" class="H_link"><?php echo REMOVE;?></a></td>
    <td>&nbsp;</td>
  </tr><?php
  }?>
  <tr>
    <td height="144">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
