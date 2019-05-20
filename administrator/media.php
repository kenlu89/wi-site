<?php 
$domain_name="http://".$_SERVER['HTTP_HOST']."/"; 
if($_POST['chk']==1){
$files=$_FILES['file']['name'];

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
@mysql_query("insert into media(image, date_added) values('$test', now())");
}
}
header("Location: ?content=media&msg=1");
}


if($_GET['action']=="remove"){
$id=$_GET['id'];
$chk=@mysql_query("select * from media where media_id='$id'");
$row_chk=mysql_fetch_array($chk);
echo $del_image=$domain_name.$row_chk['image'];
unlink($del_image);
@mysql_query("delete from media where media_id='$id'");
//header("Location: ?content=media&msg=2");

}
?>
<script type="text/javascript">
function comfirms()
  {
  var r=confirm("<?php echo WARNING;?>")
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
<table width="800" border="0" cellpadding="0" cellspacing="0" class="text" >
            <!--DWLayoutTable-->
            <form action="?content=media" enctype="multipart/form-data"  method="post">
              <input type="hidden" name="chk" value="1">
              <tr>
                <td height="20" colspan="7" align="center" valign="middle" class="bar"><?PHP echo CONTENT_TITLE;?></td>
              </tr>
              <tr>
                <td width="15" height="4"></td>
                <td width="16"></td>
                <td width="140"></td>
                <td width="364"></td>
                <td width="100"></td>
                <td width="108"></td>
                <td width="57"></td>
              </tr>
              <tr>
                <td height="24"></td>
                <td colspan="6" align="center" valign="middle" class="text"><?PHP echo CONTENT_MSG;?></td>
              </tr>
              <tr>
                <td height="23"></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="24"></td>
                <td>&nbsp;</td>
                <td colspan="5" valign="middle" class="text"><input type="file" name="file" class="text" /> <input type="submit" value="<?php echo SUBMIT;?>"  class="text"/> ( <?Php echo UPLOAD_MSG;?> )</td>
              </tr>
              <tr>
                <td height="66"></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="24"></td>
                <td>&nbsp;</td>
                <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
              <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
              <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
              <td align="center" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
              <td>&nbsp;</td>
              </tr><?php 
			  $media=@mysql_query("select * from media order by media_id desc");
			  while($row_media=mysql_fetch_array($media)){
			  $image="../".$row_media['image'];
				  
if(!file_exists($image)){		
$image=DEFAULT_;
$height=80;
$width=80;
}else{
list($width, $height, $type, $w) = getimagesize($image);
$prev_width=$width;
$prev_height=$height;
if($width>80){
$p_width=(1-($width-80)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
//$image="../".$image;
}

}
			  ?>
              <tr>
                <td height="24"></td>
                <td>&nbsp;</td>
                <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
                <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
                <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
                <td align="center" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="24"></td>
                <td>&nbsp;</td>
                <td valign="middle"><img src="<?php echo $image;?>" height="<?php echo $height;?>" width="<?php echo $width;?>"  class="box"/></td>
                <td valign="middle"><?php echo $domain_name; echo $row_media['image'];?></td>
                <td valign="middle"><?php echo $prev_width;?> X <?php echo $prev_height;?></td>
                <td align="center" valign="middle"><a href="?content=media&action=remove&id=<?php echo $row_media['media_id'];?>" target="_self" class="red_link" onClick="return comfirms();"><?php echo REMOVE;?></a></td>
                <td>&nbsp;</td>
              </tr><?php }?>
              <tr>
                <td height="24"></td>
                <td>&nbsp;</td>
                <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
                <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
                <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
                <td align="center" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="82"></td>
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
