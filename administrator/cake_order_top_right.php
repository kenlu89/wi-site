<table width="280" border="0" cellpadding="0" cellspacing="0" >
  <!--DWLayoutTable-->
  <form  name="take_out" action="" enctype="multipart/form-data" method="post"><input type="hidden" name="chk" value="1" /><input type="hidden" name="oid" value="<?php echo $oid;?>" />
  <tr>
    <td width="82" height="50" valign="middle" bgcolor="#3366FF">&nbsp; <?php echo NAME;?></td>
  <td width="205" valign="middle" bgcolor="#0066FF"><input type="text" name="client" id="client" class="text" size="20" style="height:45px;" align="absmiddle" value="<?php echo $rowtable['client'];?>" onClick="popitup_input('tel_input.php?action=client')"></td>
  </tr>
  <tr>
    <td height="50" valign="middle" bgcolor="#6666FF">&nbsp; <?php echo TEL;?></td>
    <td valign="middle" bgcolor="#6666FF"><input type="text" name="tel" id="tel" class="text" size="20" style="height:45px;"  value="<?php echo $rowtable['tel'];?>" onClick="popitup_input('tel_input.php?action=tel')"></td>
  </tr>
  <tr>
    <td height="50" valign="middle" bgcolor="#663300">&nbsp; <?php echo PICK_UP_DATE;?></td>
    <td valign="middle" bgcolor="#663300"><input type="text" name="pick_up_date" id="pick_up_date" class="text" size="20" style="height:45px;"  value="<?php echo $rowtable['pickup'];?>" onClick="popitup_input('tel_input.php?action=pick_up_date')"></td>
  </tr>
    <tr>
    <td height="50" valign="middle" bgcolor="#996633">&nbsp; <?php echo DEPOSIT;?></td>
    <td valign="middle" bgcolor="#996633"><input type="text" name="deposit" id="deposit" class="text" size="20" style="height:45px;"  value="<?php echo $rowtable['deposit'];?>" onClick="popitup_input('tel_input.php?action=deposit')"></td>
  </tr>
  <tr>
    <td height="35" colspan="2" valign="bottom"  bgcolor="#999900">&nbsp; <?php echo MSG;?></td>
  </tr>
  <tr>
    <td height="160" colspan="2" valign="top" bgcolor="#999900"><textarea  name="msg" class="text"  id="msg" cols="45" rows="5" onClick="popitup_input('tel_input.php?action=msg')"><?php echo $rowtable['msg'];?></textarea><br />
      <span  class="error"><?php if($_GET['msg']==1){ echo MSG1; }?>
      </span></td>
  </tr>
  
  <tr>
    <td height="80" colspan="2" valign="top"><button type="submit" class="button_to_cake"><?php echo ENTER;?></button></td>
  </tr>
  
  <tr>
    <td height="293" colspan="2" valign="top">
                                    <?php 
									$mid=$_GET['mid'];	
									$chk_image=@mysql_query("select *  from products where products_id='$mid'");
									$row_image=mysql_fetch_array($chk_image);
$image=$row_image['products_image'];
		  
if(!file_exists($image)){		
$image=DEFAULT_;
$height=280;
$width=280;
}else{
list($width, $height, $type, $w) = getimagesize($image);
if($width>280){
$p_width=(1-($width-280)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);

}

}
?>
          
      <img src="<?php echo $image;?>" height="<?php echo $height;?>" width="<?php echo $width;?>" class="gray_box" />    </td>
  </tr>
  </form>
</table>