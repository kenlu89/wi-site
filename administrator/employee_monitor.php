<?php 
$result=@mysql_query("select * from customers, shift where customers.customers_id=shift.parent_id and customers.stats=1 and shift.clock_out=''");
?>
<table width="798" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="798" height="82">&nbsp;</td>
  </tr>
  <tr>
    <td height="44" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td height="20" colspan="5" align="center" valign="middle" class="bar"><?php echo CURRENT_EMPLOYEES;?></td>
      </tr><?php while($rows=mysql_fetch_array($result)){?>
      <tr>
        <td width="10" height="24">&nbsp;</td>
        <td width="206" valign="middle" class="text"><?php echo $rows['customers_lastname'].", ".$rows['customers_firstname']; ?></td>
        <td width="155" valign="middle" class="text"><?php echo $rows['title']; ?></td>
        <td width="231" valign="middle" class="text"><?php echo CLOCK_IN;?><?php echo $rows['clock_in']; ?></td>
        <td width="196">&nbsp;</td>
      </tr><?php }?>
      
    </table>    </td>
  </tr>
  <tr>
    <td height="125">&nbsp;</td>
  </tr>
</table>

