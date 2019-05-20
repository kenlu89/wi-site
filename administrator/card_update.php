<input type="hidden" name="id" value="<?php echo $id;?>">
<input type="hidden" name="client" value="<?php echo $row_card['sold_to'];?>">
<table width="548" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="19" height="44">&nbsp;</td>
    <td colspan="2" valign="middle">	<?php echo UPDATE_MSG;?>
</td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td width="129" valign="middle"><?php echo CARD_NUM;?>:</td>
    <td width="400" valign="middle"><input type="text" name="cardnum" size="35" class="text" value="<?php echo $row_card['txt'];?>"></td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td valign="middle"><?php echo PIN_NUM;?>:</td>
    <td valign="middle"><input name="pin_num" type="text" class="text" id="pin_num" value="<?php echo $row_card['serial_num'];?>" size="35"></td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td valign="middle"><?php echo STATS;?></td>
    <td valign="middle"><input type="radio" name="stats" value="0" <?php  if($row_card['stats']==0){ echo "checked"; }?>> <?php echo AVAILABLE;?> &nbsp; <input type="radio" name="stats" value="1" <?php if($row_card['stats']==1){ echo "checked"; }?>> <?php echo SOLD;?></td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td valign="middle"><?php echo SOLD_TO;?></td>
    <td valign="middle"><?php if($row_card['sold_to']!=""){ $sold_=@mysql_query("select * from customers where customers_id=".$row_card['sold_to']); if(mysql_num_rows($sold_)>=1){ $rows_sold=mysql_fetch_array($sold_); echo $client=$rows_sold['customers_lastname']." ".$rows_sold['customers_firstname'];}else{ echo UNKNOWN; }}?></td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td valign="middle"><input type="submit" value="<?php echo UPDATE;?>"  class="text" /></td>
    <td valign="middle"><!--DWLayoutTable-->&nbsp;</td>
  </tr>
  <tr>
    <td height="48">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
