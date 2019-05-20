<table width="760" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
    <!--DWLayoutTable-->
  <tr>
    <td width="120" height="30" valign="middle" class="text" bgcolor='#dbf6f6'>&nbsp; <?php echo TEL;?></td>
    <td width="260" valign="middle" bgcolor='#dbf6f6' class="text">&nbsp; <?php echo $rowT['tel'];?></td>
    <td width="120" valign="middle" bgcolor='#dbf6f6' class="text">&nbsp; <?php echo ADDRESS;?></td>
    <td width="260" valign="middle" bgcolor='#dbf6f6' class="text">&nbsp; <?php echo $rowT['street'];?></td>
  </tr>
  <tr>
    <td height="30" valign="middle" class="text">&nbsp; <?PHP echo CLIENT;?></td>
    <td valign="middle" class="text">&nbsp; <?php echo $rowT['client'];?></td>
    <td valign="middle" class="text">&nbsp; <?php echo ZIPCODE;?></td>
    <td valign="middle" class="text">&nbsp; <?php echo $rowT['zip'];?></td>
  </tr>
  <tr>
    <td height="30" valign="middle" bgcolor='#dbf6f6' class="text">&nbsp; <?PHP echo CLIENT_RATE;?></td>
    <td valign="middle" bgcolor='#dbf6f6' class="text">&nbsp; <?php if($rowT['stats']==1){ echo GOOD; }else if($rowT['stats']==2){ echo LIAR; }else{ echo NO_ADDRESS; }?></td>
    <td valign="middle" bgcolor="#DBF6F6" class="text" >&nbsp; <?php echo CREATE_BY; ?></td>
    <td valign="middle" bgcolor="#DBF6F6" class="text" >&nbsp; <?php echo $rowT['sales']." ".TIME." ".$rowT['date_added'];?></td>
  </tr>
  <tr>
    <td height="30" valign="middle" class="text">&nbsp; <?PHP echo LASST_EDIT_BY; ?></td>
    <td valign="middle" class="text">&nbsp; <?php echo $rowT['last_edited_sales']." ".TIME." ".$rowT['last_edited'];?></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="30" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td></td>
    <td></td>
  </tr>
  
  
</table>
 