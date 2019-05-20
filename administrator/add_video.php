<?php 
if($_POST['chk']==1){
$cate_en=$_POST['cate'];
$cate_ch=$_POST['cate_ch'];
$cate_tra=$_POST['cate_tra'];
$stats=$_POST['stats'];
$description1=$_POST['description1'];
$description2=$_POST['description2'];
$description3=$_POST['description3'];
$sorts=$_POST['sorts'];
$files=$_FILES['file']['name'];
$video_link=$_POST['video_link'];

if($cate_en=="" || $cate_ch==""){
$error=1;
}else{


$done=@mysql_query("insert into video(date_added, stats, video_link) values(now(), '$stats', '$video_link')");
$last_id=mysql_insert_id();
@mysql_query("insert into video_description(video_name, language_id, video_description, video_id) values('$cate_en', '1', '$description1', '$last_id')");
@mysql_query("insert into video_description(video_name, language_id, video_description, video_id) values('$cate_ch', '3', '$description3', '$last_id')");
//@mysql_query("insert into video_description(video_name, language_id, video_description, video_id) values('$cate_ch', '2', '$description3', '$last_id')");


if($files!=""){

if (!is_dir("../tmp_name/".date("Y"))){
mkdir("../tmp_name/".date("Y"), 0755);
mkdir("../tmp_name/".date("Y")."/".date("m"), 0755);
}else if(!is_dir("../tmp_name/".date("Y")."/".date("m"))){
mkdir("../tmp_name/".date("Y")."/".date("m"), 0755);
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
//@mysql_query("update products set products_image='$test' where products_id='$pid'");
@mysql_query("update video set cover_image='$test' where video_id='$id'");
}
}

header("Location: ?content=show_video&msg=1");
}


}


?>
<table width="800" border="0" cellpadding="0" cellspacing="0" class="text" >
            <!--DWLayoutTable-->
            <form action="?content=add_video" enctype="multipart/form-data"  method="post">
              <input type="hidden" name="chk" value="1">
              <tr>
                <td height="20" colspan="8" align="center" valign="middle" class="bar"><?PHP echo NEW_CATEGORY;?></td>
              </tr>
              <tr>
                <td width="15" height="4"></td>
                <td width="16"></td>
                <td width="188"></td>
                <td width="156"></td>
                <td width="64"></td>
                <td width="208"></td>
                <td width="146"></td>
                <td width="7"></td>
              </tr>
              <tr>
                <td height="24"></td>
                <td colspan="7" align="center" valign="middle" class="text"><?PHP echo CATEGORY_MSG;?></td>
              </tr>
              <tr>
                <td height="16"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              
              <tr>
                <td height="24">&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="3" valign="middle" class="Heading"><?php echo NEW_CATEGORY;?></td>
                <td colspan="3" valign="middle" class="Heading"><?php echo NEW_CATE_CH;?></td>
              </tr>
              
              
              <tr>
                <td height="24">&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="3" valign="middle"><input name="cate" type="text" class="text" size="55" /></td>
                <td colspan="3" valign="middle"><input type="text" class="text"  name="cate_ch" size="55"></td>
              </tr>
              <tr>
                <td height="160"></td>
                <td></td>
                <td colspan="3" valign="top"><textarea name="description1" class="text" rows="5" cols="50"></textarea></td>
                <td colspan="3" valign="top"><textarea name="description3" class="text" rows="5" cols="50"></textarea></td>
              </tr>
              
              
              
              <tr>
                <td height="24">&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="6" valign="middle" class="Heading"><?php echo LINKS;?> </td>
              </tr>
              <tr>
                <td height="24">&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2" valign="middle"><input type="text" name="video_link" class="text" size="40" /></td>
                <td colspan="3" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
                <td></td>
              </tr>
              <tr>
                <td height="24">&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="5" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
                <td></td>
              </tr>
              <tr>
                <td height="24">&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="5" valign="middle" class="text"><?php echo IMAGE;?> </td>
                <td></td>
              </tr>
              <tr>
                <td height="24">&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="5" valign="middle" class="text"><input type="file" name="file" class="text" /></td>
                <td></td>
              </tr>
              <tr>
                <td height="24">&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="5" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
                <td></td>
              </tr>
              <tr>
                <td height="24">&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="5" valign="middle" class="text"><input type="radio" name="stats" value="1"  checked="checked"/>                  <?php echo ACTIVE;?> &nbsp; <input type="radio" name="stats" value="2" />                  <?php echo INACTIVE;?></td>
                <td></td>
              </tr>
              <tr>
                <td height="19"></td>
                <td></td>
                <td colspan="4" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td height="24">&nbsp;</td>
                <td>&nbsp;</td>
                <td valign="middle" class="Heading"><?PHP echo SORT_ORDER;?> </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td></td>
              </tr>
              <tr>
                <td height="24"></td>
                <td></td>
                <td colspan="4" valign="middle"><input type="text" name="sorts" class="text"  size="10" /></td>
              <td></td>
              <td></td>
              </tr>
              <tr>
                <td height="12"></td>
                <td></td>
                <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              </tr>
              
              <tr>
                <td height="30">&nbsp;</td>
                <td>&nbsp;</td>
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
              <td>&nbsp;</td>
              <td></td>
              </tr>
        </form>
    </table>
</body>
</html>
