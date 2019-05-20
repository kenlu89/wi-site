<?php 
$id=$_GET['id'];
$donor_en=@mysql_query("select * from donor_description, donor where donor_description.language_id=1 and  donor_description.donor_id=donor.donor_id order by donor.donor_id desc");
$row_donor_en=mysql_fetch_array($donor_en);		  

$donor_ch=@mysql_query("select * from donor_description where language_id=3 and  donor_id='$id'");
$row_donor_ch=mysql_fetch_array($donor_ch);	

$donor_tra=@mysql_query("select * from donor_description where language_id=2 and  donor_id='$id'");
$row_donor_tra=mysql_fetch_array($donor_tra);	


$en_donor=$row_donor_en['donor_name'];
$ch_donor=$row_donor_ch['donor_name'];
$tra_donor=$row_donor_tra['donor_name'];
$amount_=$row_donor_en['amount_'];
	  
if($_POST['chk']==1){
$en_donor=$_POST['cate'];
$ch_donor=$_POST['cate_ch'];
$tra_donor=$_POST['cate_tra'];
$stats=$_POST['stats'];
$amount_=$_POST['amount_'];
$id=$_POST['id'];

if($en_donor=="" || $ch_donor=="" || $tra_donor==""){
$error=1;
}else{

$done=@mysql_query("update donor set amount_='$amount_' where donor_id='$id'");
@mysql_query("update donor_description set donor_name='$tra_donor' where language_id=1 and  donor_id='$id'");
//@mysql_query("update donor_description set donor_name='$en_donor' where language_id=1 and  donor_id='$id'");
@mysql_query("update donor_description set donor_name='$ch_donor' where language_id=3 and  donor_id='$id'");
@mysql_query("update donor_description set donor_name='$tra_donor' where language_id=2 and  donor_id='$id'");
}


//header("Location: ?content=donate&msg=1");
}


?>
<table width="800" border="0" cellpadding="0" cellspacing="0" class="text" >
            <!--DWLayoutTable-->
<form action="?content=edit_donate" enctype="multipart/form-data"  method="post">
              <input type="hidden" name="chk" value="1"><input type="hidden" name="id" value="<?php echo $id;?>" />
              <tr>
                <td height="20" colspan="9" align="center" valign="middle" class="bar"><?PHP echo NEW_CATEGORY;?></td>
              </tr>
              <tr>
                <td width="15" height="4"></td>
                <td width="16"></td>
                <td width="188"></td>
                <td width="76"></td>
                <td width="80"></td>
                <td width="184"></td>
                <td width="88"></td>
                <td width="146"></td>
                <td width="7"></td>
              </tr>
              <tr>
                <td height="24"></td>
                <td colspan="8" align="center" valign="middle" class="text"><?PHP echo CATEGORY_MSG;?></td>
              </tr>
              <tr>
                <td height="16"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              
              <tr>
                <td height="24">&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2" valign="middle" class="Heading"><?php echo NEW_CATEGORY;?></td>
                <td colspan="2" valign="middle" class="Heading"><?php echo NEW_CATE_CH;?></td>
                <td colspan="3" valign="middle"><?php echo NEW_CH_TRA;?></td>
              </tr>
              
              
              <tr>
                <td height="24">&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2" valign="middle"><input name="cate" type="text" class="text" size="35"  value="<?php echo $en_donor;?>"/></td>
                <td colspan="2" valign="middle"><input type="text" class="text"  name="cate_ch" size="35" value="<?php echo $ch_donor;?>"></td>
                <td colspan="3" valign="middle"><input type="text" class="text"  name="cate_tra" size="35" value="<?php echo $tra_donor;?>"/></td>
              </tr>
              <tr>
                <td height="24">&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="5" valign="bottom" class="Heading"><?php echo AMOUNT;?> </td>
                <td>&nbsp;</td>
                <td></td>
              </tr>
              <tr>
                <td height="24">&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="3" valign="middle"><input  type="text" name="amount_" class="text" /></td>
                <td colspan="3" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
                <td></td>
              </tr>
              <tr>
                <td height="16"></td>
                <td></td>
                <td colspan="5" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td height="60">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td></td>
              </tr>
              
              
              
              <tr>
                <td height="30">&nbsp;</td>
                <td>&nbsp;</td>
                <td valign="top"><input type="submit" value="<?php echo SUBMIT;?>"  class="text"/></td>
                <td colspan="4" valign="top"><input type="reset" value="<?php echo RESET;?>"  class="text"/></td>
                <td>&nbsp;</td>
                <td></td>
              </tr>
              <tr>
                <td height="173">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td></td>
              </tr>
              <?php 
			  $donors=@mysql_query("select * from donor_description, donor where donor_description.language_id='$lan' and  donor_description.donor_id=donor.donor_id order by donor.donor_id desc");
			  $i=0;
			  while($rows_donors=mysql_fetch_array($donors)){
			  ?>
              <?php $i++; }?>
        </form>
    </table>
</body>
</html>
