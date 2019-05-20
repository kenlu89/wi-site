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
$done=@mysql_query("delete from album where album_id=".$_GET['id']);
@mysql_query("delete from album_description where album_id=".$_GET['id']);
@mysql_query("delete from pic where parent_id=".$_GET['id']);
header("Location: ?content=show_album&msg=2");
}

if($_GET['action']=="promot" && $_GET['id']!=""){
@mysql_query("update album set promote=1 where album_id=".$_GET['id']);
header("Location: ?content=show_album&msg=4");
}

if($_GET['action']=="cancel" && $_GET['id']!=""){
@mysql_query("update album set promote='' where album_id=".$_GET['id']);
header("Location: ?content=show_album&msg=3");
}
?>
<table width="800" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="800" height="30" align="right" valign="top"><a href="?content=album" target="_self" class="red_link"><?Php echo ADD_PICTURE;?></a></td>
  </tr>
  <tr>
    <td height="494" valign="top">
	
<?php 
$show_=@mysql_query("select * from album , album_description where album.album_id=album_description.album_id and album_description.language_id='$lan'");

while($rows_show=mysql_fetch_array($show_)){

$chk="";
$chk=@mysql_query("select * from pic where parent_id=".$rows_show['album_id']);

?>
	<?php include("album_pic.php");?>
    
    <?php }?></td>
  </tr>
  <tr>
    <td height="46">&nbsp;</td>
  </tr>
</table>
