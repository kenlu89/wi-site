<?php 
//echo $computer=php_uname('n');
$computer=$_SERVER['REMOTE_ADDR'];
$result=@mysql_query("select * from config order by ids desc");
$rows=mysql_fetch_array($result);
if (function_exists("printer_list"))
  {
  $PrintCurr = 0;

  // Get the local printers.
  $PrintDests = printer_list(PRINTER_ENUM_LOCAL);
  if (isset($PrintDests))
    foreach ($PrintDests as $PrintDest)
     $PrintDest["NAME"];
	  $PrinterList[$PrintCurr] = $PrintDest["NAME"];
$PrintCurr++;
//$stats="ok";
  // We should be able to enumerate the remote printers too.  Let's have a
  // shot at it.
  //
  // Start by looking for the remote printers tree.
  $PrintDoms = printer_list(PRINTER_ENUM_NAME); $PrintTree = "";

  if (isset($PrintDoms))
    foreach ($PrintDoms as $PrintDomain)
      {
      if (preg_match("/Remote/i", $PrintDomain["NAME"]))
        { $PrintTree = $PrintDomain["NAME"]; break; }
      }

  // If we found a remote printers tree, we need to enumerate all of the
  // domains/workgroups/nodes within the tree and all the printers attached
  // to those nodes.
  if ($PrintTree != "")
    {
    // Enumerate all of the domains.
    $PrintDoms = printer_list(PRINTER_ENUM_NAME, $PrintTree);

    if (isset($PrintDoms))
      foreach ($PrintDoms as $PrintDomain)
        {
        // Enumerate all of the nodes within the domain.
        $PrintNodes = printer_list(PRINTER_ENUM_NAME, $PrintDomain["NAME"]);

        if (isset($PrintNodes))
          foreach ($PrintNodes as $PrintNode)
            {
            // Enumerate all of the printers within the node.
            $PrintDests = printer_list(PRINTER_ENUM_NAME,
              $PrintNode["NAME"]);

            if (isset($PrintDests))
              foreach ($PrintDests as $PrintDest)
                $PrinterList[$PrintCurr] = $PrintDest["NAME"];
				$PrintCurr++;
            }
        }
    }
  }
  
 if($_POST['chk']==1){
$online_code=$_POST['online_code'];
 $kitchen_printer=$_POST['kitchen_printer'];
 $counter_printer=$_POST['counter_printer'];
 $waiter_printer=$_POST['waiter_printer'];
 $discount=$_POST['discount'];
 $keys=$_POST['keys'];
 $tax=$_POST['tax'];
 
 $chk=@mysql_query("select * from config order by ids desc");
 $num_chk=mysql_num_rows($chk);
 if($num_chk>=1){
 $row=mysql_fetch_array($chk);
 $ids=$row['ids'];
 $done=@mysql_query("update config set  kitchen_printer='$kitchen_printer', counter_printer='$counter_printer', waiter_printer='$waiter_printer', discount='$discount', stats='$keys', tax='$tax', online_code='$online_code' where ids='$ids'");
 }else{
$done=@mysql_query("insert into config(kitchen_printer,  counter_printer, waiter_printer, discount, stats, tax, online_code) values('$kitchen_printer', '$counter_printer', '$waiter_printer', '$discount', '$keys', '$tax', '$online_code')"); 
 }
 header("Location: ?content=setting&msg=1"); 
 } 
?><link   href="style_sheet.css" type="text/css"  rel="stylesheet" />
<table width="798" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable--><form  action="?content=setting" enctype="multipart/form-data" method="post">
  <input  type="hidden" name="chk" value="1" />
  <tr>
    <td height="33" colspan="6" align="center" valign="middle" class="error"><?php if($_GET['msg']==1){ echo UPDATED_MSG; }?></td>
    </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td colspan="5" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td width="39" height="31">&nbsp;</td>
    <td width="127" valign="middle" class="text"><?php echo DISCOUNT;?></td>
  <td colspan="4" valign="middle"><input type="text" size="15" class="text"  name="discount" value="<?php echo $rows['discount'];?>" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo ENABLE_KEYPAD;?>
    <input type="radio" name="keys" value="1" class="text" <?php if($rows['stats']==1){ echo "checked='checked'"; }?>/>    <?php echo ENABLE; ?> &nbsp; &nbsp; &nbsp; 
    <input type="radio" name="keys" value="0" class="text"  <?php if($rows['stats']==0){ echo "checked='checked'"; }?>/>    <?php echo DISABLE; ?></td>
    </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td valign="middle" class="text"><?php echo TAX;?></td>
    <td colspan="2" valign="middle"><input type="text" size="15" class="text"  name="tax" value="<?php echo $rows['tax'];?>" /></td>
    <td width="91" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td width="168" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td valign="middle" class="text"><?php echo ONLINE_CODE;?></td>
    <td colspan="2" valign="middle"><input type="text" size="15" class="text"  name="online_code" value="<?php echo $rows['online_code'];?>" /></td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  
   <tr>
     <td height="25">&nbsp;</td>
     <td colspan="2" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
     <td width="250" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
     <td colspan="2" valign="middle"  class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
   </tr>
   <tr>
    <td height="25">&nbsp;</td>
    <td colspan="2" valign="middle" class="text"><strong><?php echo KARGO_PRINTER;?></strong></td>
  <td valign="middle" class="text"><strong><?php echo PRODUCT_PRINTER;?></strong></td>
  <td colspan="2" valign="middle"  class="text"><strong><?php echo SHIPPING_PRINTER;?></strong></td>
  </tr>
  <tr>
    <td height="39">&nbsp;</td>
    <td colspan="2" valign="middle" class="text"><?php     foreach ($PrintDests as $PrintDest){ 
	if( $PrintDest["NAME"]!=""){
	?>
        <input type="radio" name="kitchen_printer" value="<?php echo  $PrintDest["NAME"];?>"  class="text" <?php if($rows['kitchen_printer']==$PrintDest["NAME"]){ echo "checked='checked'"; }?>/>
        <?php echo  $PrintDest["NAME"];?><br />
				
      <?php } }?></td>
  <td valign="middle" class="text"><?php     foreach ($PrintDests as $PrintDest){ 
	if( $PrintDest["NAME"]!=""){
	?>
        <input type="radio" name="counter_printer" value="<?php echo  $PrintDest["NAME"];?>"  class="text" <?php if($rows['counter_printer']==$PrintDest["NAME"]){ echo "checked='checked'"; }?>/>
        <?php echo  $PrintDest["NAME"];?><br />
				
        <?php } }?></td>
  <td colspan="2" valign="middle" class="text"><?php     foreach ($PrintDests as $PrintDest){ 
	if( $PrintDest["NAME"]!=""){
	?>
        <input type="radio" name="waiter_printer" value="<?php echo  $PrintDest["NAME"];?>"  class="text" <?php if($rows['waiter_printer']==$PrintDest["NAME"]){ echo "checked='checked'"; }?>/>
        <?php echo  $PrintDest["NAME"];?><br />
				
      <?php } }?></td>
  </tr>
  
  
  <tr>
    <td height="54">&nbsp;</td>
    <td colspan="2" valign="middle"><input type="submit" value="<?php echo SUBMIT;?>" class="text" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="58">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="123">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  
  </form>
</table>

