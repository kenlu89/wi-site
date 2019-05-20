<?php 
$id=$_GET['id'];
$result=@mysql_query("select * from album, album_description where album.album_id=album_description.album_id and album_description.language_id='1' and album.album_id='$id'");

$rows=mysql_fetch_array($result);

$result_ch=@mysql_query("select * from album_description where album_id='$id' and language_id=3");
$rows1=mysql_fetch_array($result_ch);

$result_tra=@mysql_query("select * from album_description where album_id='$id' and language_id=2");
$rows2=mysql_fetch_array($result_tra);

$cate_en=$rows['album_name'];
$cate_ch=$rows1['album_name'];
$cate_tra=$rows2['album_name'];
$stats=$rows['stats'];
$description1=$rows['album_description'];
$description2=$rows1['album_description'];
$description3=$rows2['album_description'];
$sorts=$rows['sorts'];


if($_POST['chk']==1){
$id=$_POST['id'];
$cate_en=$_POST['cate'];
$cate_ch=$_POST['cate_ch'];
$cate_tra=$_POST['cate_tra'];
$stats=$_POST['stats'];
$description1=$_POST['description1'];
$description2=$_POST['description2'];

$sorts=$_POST['sorts'];
$files=$_FILES['file']['name'];

if($cate_en=="" || $cate_ch==""){
$error=1;
}else{
//$done=@mysql_query("insert into album(date_added, stats) values(now(), '$stats')");
$done=@mysql_query("update album set stats='$stats' where album_id='$id'");
//$last_id=mysql_insert_id();
if($cate_en!="" ||  $description1!=""){
@mysql_query("update album_description set album_name='$cate_en', album_description='$description1' where album_id='$id' and language_id=1 ");
//@mysql_query("insert into album_description(album_name, language_id, album_description, album_id) values('$cate_en', '1', '$description1', '$last_id')");
}
if($cate_ch!="" ||  $description2!=""){
@mysql_query("update album_description set album_name='$cate_ch', album_description='$description2' where album_id='$id' and language_id=3 ");
//@mysql_query("insert into album_description(album_name, language_id, album_description, album_id) values('$cate_tra', '3', '$description2', '$last_id')");
}


}


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
@mysql_query("update album set album_image='$test' where album_id='$id'");
}
}
header("Location: ?content=show_album&msg=3");
}


?>
<table width="800" border="0" cellpadding="0" cellspacing="0" class="text" >
            <!--DWLayoutTable-->
            <form action="?content=edit_album" enctype="multipart/form-data"  method="post">
              <input type="hidden" name="chk" value="1">
              <input type="hidden" name="id" value="<?php echo $id;?>" />
              <tr>
                <td height="20" colspan="7" align="center" valign="middle" class="bar"><?PHP echo NEW_CATEGORY;?></td>
              </tr>
              <tr>
                <td width="31" height="4"></td>
                <td width="188"></td>
                <td width="156"></td>
                <td width="25"></td>
                <td width="247"></td>
                <td width="146"></td>
                <td width="7"></td>
              </tr>
              <tr>
                <td height="24" colspan="7" align="center" valign="middle" class="text"><?PHP echo CATEGORY_MSG;?></td>
              </tr>
              <tr>
                <td height="16"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              

              <tr>
                <td height="24" colspan="4" valign="middle" class="Heading"><?php echo NEW_CATEGORY;?></td>
                <td colspan="3" valign="middle" class="Heading"><?php echo NEW_CATE_CH;?></td>
              </tr>
              
              
              <tr>
                <td height="24" colspan="4" valign="middle"><input name="cate" type="text" class="text" size="55"  value="<?php echo $cate_en;?>"/></td>
                <td colspan="3" valign="middle"><input type="text" class="text"  name="cate_ch" size="55"  value="<?php echo $cate_ch;?>"></td>
              </tr>
              <tr>
                <td height="160" colspan="4" valign="top"><textarea name="description1" class="text" rows="6" cols="50"><?php echo $description1;?></textarea></td>
                <td colspan="3" valign="top"><textarea name="description2" class="text" rows="6" cols="50"><?php echo $description2;?></textarea></td>
              </tr>
              
              
              
              <tr>
                <td height="24" colspan="5" valign="middle" class="Heading"><?php echo IMAGE;?> </td>
                <td>&nbsp;</td>
                <td></td>
              </tr>
              <tr>
                <td height="24" colspan="3" valign="middle"><input  type="file" name="file" class="text" /></td>
                <td colspan="3" valign="middle" class="text"><input type="radio" name="stats" value="1" <?php if($stats==1){ echo "checked=\"checked\""; }?>><?php echo ACTIVE;?> &nbsp; <input type="radio" name="stats" value="2"   <?php if($stats==2){ echo "checked=\"checked\""; }?>/><?php echo INACTIVE;?></td>
                <td></td>
              </tr>
              <tr>
                <td height="19" colspan="5" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td height="60">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
              </tr>
              
              
              
              
              <tr>
                <td height="30">&nbsp;</td>
                <td valign="top"><input type="submit" value="<?php echo SUBMIT;?>"  class="text"/></td>
                <td colspan="3" valign="top"><input type="reset" value="<?php echo RESET;?>"  class="text"/></td>
                <td>&nbsp;</td>
                <td></td>
              </tr>
              <tr>
                <td height="173">&nbsp;</td>
                <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td></td>
              </tr>
        </form>
    </table>
</body>
</html>
