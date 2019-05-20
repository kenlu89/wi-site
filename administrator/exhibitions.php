<?php 
include("includes/config.php");
$result=mysql_query("select * from exhibitions");

?><link   href="style_sheet.css" type="text/css"  rel="stylesheet" />
<script type="text/javascript">
function comfirms()
  {
  var r=confirm("Warning: Are you sure to delete this category?")
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
  <tr>
    <td width="800" height="81" valign="top" class="left"><?php include("top.php"); ?></td>
  </tr>
  <tr>
    <td height="20" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td height="233" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="box">
      <!--DWLayoutTable-->
      <tr>
        <td height="20" colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="bar">
          <!--DWLayoutTable-->
          <tr>
            <td width="136" height="20" align="center" valign="middle">Title</td>
              <td width="194" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
              <td width="154" align="center" valign="middle">Date added</td>
              <td width="154" align="center" valign="middle">Last Edited</td>
              <td width="160">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="24" colspan="2" valign="top">
        <?php $i=1;
		  while($row=mysql_fetch_array($result)){
		  
		  ?>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="text" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>>
          <!--DWLayoutTable-->
          <tr>
            <td width="31" height="24" align="center" valign="middle"><img src="images/folder.gif" width="16" height="16" /></td>
            <td width="299" valign="middle"><?php echo $row['title'];?></td>
            <td width="154" align="center" valign="middle"><?php echo $row['date_added'];?></td>
            <td width="154" align="center" valign="middle"><?php echo $row['last_edit'];?></td>
            <td width="79" align="center" valign="middle"><a href="edit_exhibitions.php?id=<?php echo $row['ids']; ?>" target="_self" class="left_nav">Edit</a></td>
            <td width="81" align="center" valign="middle"><a  href="exhibitions_remove.php?id=<?php echo $row['ids']; ?>" target="_self" class="left_nav" onclick="return comfirms()">Remove</a></td>
          </tr>
        </table><?php $i++; }?></td>
        </tr>
      <tr>
        <td width="638" height="31">&nbsp;</td>
        <td width="160">&nbsp;</td>
      </tr>
      <tr>
        <td height="43">&nbsp;</td>
        <td align="center" valign="top"><a href="new_exhibitions.php" target="_self" ><img src="images/new_exhibition.png" width="100" height="20" /></a></td>
        </tr>
      <tr>
        <td height="115">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
      
      
      
      
      
      
    </table>
    </td>
  </tr>
  
  
  
  <tr>
    <td height="35" align="center" valign="middle" class="text"> <?php include("bottom.php"); ?></td>
  </tr>
</table>
