<?php 

$r=mysql_query("select * from config order by ids desc");
$row=mysql_fetch_array($r);
$tax=$row['tax'];
$address=$row['address'];
$company=$row['company'];

if($_POST['current']==1){
$tax=$_POST['tax']; 
$store=$_POST['store'];
$tel=$_POST['tel']; 
$fax=$_POST['fax'];
$address=$_POST['address'];
$company=$_POST['company'];

@mysql_query("update config set tax='$tax', address='$address', company='$company' where ids=4"); 

echo "<script>alert('".UPDATE_DONE."');window.location='?content=home';</script>";	
}

?>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable-->
  
 <form name="form1" action="?content=configuration_store"  enctype="multipart/form-data" method="post">
 <input  type="hidden" name="current" value="1" />

  <tr>
    <td width="58" height="43">&nbsp;</td>
    <td width="117">&nbsp;</td>
    <td width="576">&nbsp;</td>
    <td width="49">&nbsp;</td>
  </tr>

  
  <tr>
    <td height="30"></td>
    <td valign="middle" class="Heading"><?php echo COMPANY;?></td>
    <td valign="middle"><input name="company" type="text" class="text" id="company"  value="<?php echo $row['company']; ?>" size="45"/></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="30"></td>
    <td valign="middle" class="Heading"><?PHP echo TAX;?></td>
    <td valign="middle"><input name="tax" type="text" class="text" size="45"  value="<?php echo $row['tax']; ?>"/></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="30"></td>
    <td valign="middle" class="Heading"><?php echo ADDRESS;?></td>
    <td rowspan="2" valign="top"><textarea  name="address"  class="text" cols="50" rows="5"><?php echo $row['address']; ?> </textarea></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="135"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td height="40"></td>
    <td colspan="3" valign="bottom"><input type="submit" name="submit" value="<?php echo SUBMIT;?>" /></td>
    </tr>
  <tr>
    <td height="91">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  </form>
</table>
