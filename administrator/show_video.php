<script type="text/javascript">
function confirms()
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
<?php 
if($_GET['action']=="remove" && $_GET['id']!=""){
$done=@mysql_query("delete from video where video_id=".$_GET['id']);
@mysql_query("delete from video_description where video_id=".$_GET['id']);
header("Location: ?content=show_video&msg=2");
}

if($_GET['action']=="promot" && $_GET['id']!=""){
@mysql_query("update video set promote=1 where video_id=".$_GET['id']);
header("Location: ?content=show_video&msg=4");
}

if($_GET['action']=="cancel" && $_GET['id']!=""){
@mysql_query("update video set promote='' where video_id=".$_GET['id']);
header("Location: ?content=show_video&msg=3");
}
?>
<table width="800" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="800" height="30" align="right" valign="top"><a href="?content=add_video" target="_self" class="red_link"><?Php echo ADD;?></a></td>
  </tr>
  <tr>
    <td height="494" valign="top">
	
<?php 
$show_=@mysql_query("select * from video , video_description where video.video_id=video_description.video_id and video_description.language_id='$lan'");

while($rows_show=mysql_fetch_array($show_)){

$chk="";
$chk=@mysql_query("select * from pic where parent_id=".$rows_show['video_id']);

?>
	<?php include("video_pic.php");?>
    
    <?php }?></td>
  </tr>
  <tr>
    <td height="46">&nbsp;</td>
  </tr>
</table>
