<?php 
if($_POST['chk']==1){
$files=$_FILES['file']['name'];


if($files!=""){
unlink("../images/header.jpg");
$uploaddir = "../images"; // Where you want the files to upload to - Important: Make sure this folders permissions is 0777!
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
 $test1=$uploaddir.'/'."header.$extension";
$test='images'.'/'."header.$extension";
rename($_FILES['file']['tmp_name'], $uploaddir.'/'."header.$extension");	
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
//@mysql_query("update album set album_image='$test' where album_id='$last_id'");
}
}
header("Location: ?content=bg&msg=1");
}


?>
<table width="800" border="0" cellpadding="0" cellspacing="0" class="text" >
            <!--DWLayoutTable-->
            <form action="?content=bg" enctype="multipart/form-data"  method="post">
              <input type="hidden" name="chk" value="1">
              <tr>
                <td width="15" height="4"></td>
                <td width="300"></td>
                <td width="129"></td>
                <td width="356"></td>
              </tr>
              <tr>
                <td height="24"></td>
                <td colspan="3" align="center" valign="middle" class="text"><?PHP echo BG_MSG;?>
                
                <?php
				
				if($_GET['msg']==1){
				echo "<br>".MSG1;
				}
				?>
                </td>
              </tr>
              <tr>
                <td height="29"></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="29"></td>
                <td valign="middle"><input type="file" name="file" class="text" /></td>
                <td valign="middle"><input type="submit" value="<?php echo UPLOAD;?>" class="text" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="493"></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
        </form>
    </table>
</body>
</html>
