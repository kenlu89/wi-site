<?php 
$id=$_GET['id'];

$banners=@mysql_query("select * from banners where banners_id='$id' order by banners_id desc");
$rows_banner=mysql_fetch_array($banners);
$title=$rows_banner['banners_title']; 
$url=$rows_banner['banners_url'];
$stats=$rows_banner['status'];
$language=$rows_banner['language_id'];
$line1=$rows_banner['line_1'];
$line2=$rows_banner['line_2'];
$sort_order=$rows_banner['sort_order'];

if($_POST['chk']==1){ 
$title=$_POST['title'];
$link=$_POST['link'];
$files=$_FILES['file']['name'];
$id=$_POST['id'];
$stats=$_POST['stats'];
$line1=$_POST['line1'];
$line2=$_POST['line2'];
$language=$_POST['language'];
$sort_order=$_POST['sort_order'];
if($title=="" || $link==""){
$error=1;

}else{
//$done=@mysql_query("insert into banners (banners_title, banners_url)values('$title', '$link')");
$done=@mysql_query("update banners set banners_title='$title', banners_url='$link', status='$stats', language_id='$language', line_1='$line1', line_2='$line2', sort_order='$sort_order' where banners_id='$id'");
//$last_id=mysql_insert_id();


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
@mysql_query("update banners set banners_image='$test' where banners_id='$id'");
}
}

}
header("Location: ?content=banner&msg=1");
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


<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable-->
  
 <form name="form1" action="?content=edit_banner"  enctype="multipart/form-data" method="post">
 <input  type="hidden" name="chk" value="1" /><input type="hidden" name="id" value="<?php echo $id;?>" />

  
  
  <tr>
    <td width="68" height="20">&nbsp;</td>
    <td width="120">&nbsp;</td>
    <td width="547">&nbsp;</td>
    <td width="65">&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td valign="middle"><?php echo BANNER_TITLE;?></td>
    <td valign="middle"><input type="text" name="title" class="text" size="70" value="<?php echo $title;?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td valign="middle"><?php echo BANNER_LINK;?></td>
    <td valign="middle"><input type="text" name="link" class="text" size="70" value="<?php echo $url;?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
  </tr>    <tr>
    <td height="24">&nbsp;</td>
    <td valign="middle"><?php echo LINE1;?></td>
    <td colspan="4" valign="middle"><input type="text" name="line1" class="text" size="70"  value="<?php echo $line1;?>"/></td>
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
    <td valign="middle"><?php echo LINE2;?></td>
    <td colspan="4" valign="middle"><input type="text" name="line2" class="text" size="70" value="<?php echo $line2;?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td valign="middle"><?php echo BANNER_STATS;?></td>
    <td valign="middle"><input type="radio" name="stats" value="1" <?php if($stats==1){ echo "checked=\"checked\""; }?>/> <?php echo BIG;?> &nbsp; &nbsp; <input type="radio" name="stats" value="2" <?php if($stats==2){ echo "checked=\"checked\""; }?>/> <?php echo SMALL;?> </td>
    <td>&nbsp;</td>
  </tr> 
  
  <tr>
    <td height="24">&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
  </tr>   <tr>
    <td height="24">&nbsp;</td>
    <td valign="middle"><?php echo LANGUAGE;?></td>
    <td colspan="4" valign="middle"><input type="radio" name="language" value="1"   <?php if($language==1){ echo "checked=\"checked\""; }?>/> <?php echo ENGLISH;?> &nbsp; &nbsp; <input type="radio" name="language" value="3"  <?php if($language==3){ echo "checked=\"checked\""; }?>/> <?php echo CHINESE;?> </td>
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
    <td colspan="4" valign="middle"><input type="text" name="sort_order" value="<?php echo $sort_order;?>"></td>
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
    <td valign="middle"><?Php echo IMAGE;?></td>
    <td valign="middle"><input type="file" name="file" class="text" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
    <td colspan="2" valign="bottom"><input name="submit" type="submit" class="text" value="Submit" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td colspan="2" valign="middle" class="bar">&nbsp;<?php echo CURRENT_BANNERS;?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="104">&nbsp;</td>
    <td colspan="2" valign="top"> <?php 
$image="../".$rows_banner['banners_image'];
				  
if(!file_exists($image)){		
$image=DEFAULT_;
$height=280;
$width=280;
}else{
list($width, $height, $type, $w) = getimagesize($image);
if($width>667){
$p_width=(1-($width-667)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
//$image="../".$image;
}

}
?>
          
          <img src="<?php echo $image;?>" height="<?php echo $height;?>" width="<?php echo $width;?>" class="gray_box" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="80">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
