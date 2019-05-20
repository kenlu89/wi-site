<?php 
$domain_name="http://".$_SERVER['HTTP_HOST']."/"; 
$id=$_GET['id'];
$submission=@mysql_query("select * from submission where submission_id='$id'");

$rows=mysql_fetch_array($submission);
if($_GET['action']=="remove"){
$id=$_GET['id'];

@mysql_query("delete from submission where submission_id='$id'");
header("Location: ?content=submission&msg=2");

}

$sub=@mysql_query("select * from submission  order by submission_id desc");

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
                <td width="32" height="81">&nbsp;</td>
                <td width="736" valign="middle" class="error"><?php
                
				if($_GET['msg']==2){
				
				echo "Article has been deleted!";
				
				}
				
			?></td>
                <td width="32">&nbsp;</td>
              </tr>
              <tr>
                <td height="24"></td>
                <td align="center" valign="middle" class="bar"><?php echo $rows['title'];?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="286"></td>
                <td valign="top"><?php echo $rows['txt'];?></td>
                <td>&nbsp;</td>
              </tr>
              
              
              <?php 
			  $submission=@mysql_query("select * from submission order by submission_id desc");
			  while($show_sub=mysql_fetch_array($submission)){
			  ?>
              
              <?php 
			  }?>
              
              
              
              
              
              
              
              
              
              
              <?php 
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
              
              <?php }?>
        </form>
    </table>
</body>
</html>
