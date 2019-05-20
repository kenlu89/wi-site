<?php 
if($_POST['chk']==1){
$cate_en=$_POST['cate'];
$cate_ch=$_POST['cate_ch'];
$cate_tra=$_POST['cate_tra'];
$stats=$_POST['stats'];
$amount_=$_POST['amount_'];

if($cate_en=="" || $cate_ch=="" || $cate_tra==""){
$error=1;
}else{
$done=@mysql_query("insert into donor(date_added, stats, amount_) values(now(), '$stats', '$amount_')");
$last_id=mysql_insert_id();
@mysql_query("insert into donor_description(donor_name, language_id,  donor_id) values('$cate_en', '1',  '$last_id')");
@mysql_query("insert into donor_description(donor_name, language_id,  donor_id) values('$cate_tra', '3', '$last_id')");
@mysql_query("insert into donor_description(donor_name, language_id,  donor_id) values('$cate_ch', '2',  '$last_id')");

}


header("Location: ?content=donate&msg=1");
}


if($_GET['action']=="remove" && $_GET['id']!=""){
$id=$_GET['id'];
@mysql_query("delete from donor_description where donor_id='$id'");
@mysql_query("delete from donor where donor_id='$id'");
header("Location: ?content=donate&msg=1");
}
?>
<table width="800" border="0" cellpadding="0" cellspacing="0" class="text" >
            <!--DWLayoutTable-->
            <form action="?content=donate" enctype="multipart/form-data"  method="post">
              <input type="hidden" name="chk" value="1">
              <tr>
                <td height="20" colspan="15" align="center" valign="middle" class="bar"><?PHP echo NEW_CATEGORY;?></td>
              </tr>
              <tr>
                <td width="15" height="4"></td>
                <td width="16"></td>
                <td width="160"></td>
                <td width="28"></td>
                <td width="60"></td>
                <td width="16"></td>
                <td width="80"></td>
                <td width="64"></td>
                <td width="88"></td>
                <td width="32"></td>
                <td width="88"></td>
                <td width="40"></td>
                <td width="88"></td>
                <td width="18"></td>
                <td width="7"></td>
              </tr>
              <tr>
                <td height="24"></td>
                <td colspan="14" align="center" valign="middle" class="text"><?PHP echo CATEGORY_MSG;?></td>
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
                <td colspan="4" valign="middle" class="Heading"><?php echo NEW_CATEGORY;?></td>
                <td colspan="4" valign="middle" class="Heading"><?php echo NEW_CATE_CH;?></td>
                <td colspan="5" valign="middle"><?php echo NEW_CH_TRA;?></td>
              </tr>
              
              
              <tr>
                <td height="24">&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="4" valign="middle"><input name="cate" type="text" class="text" size="35" /></td>
                <td colspan="4" valign="middle"><input type="text" class="text"  name="cate_ch" size="35"></td>
                <td colspan="5" valign="middle"><input type="text" class="text"  name="cate_tra" size="35"/></td>
              </tr>
              <tr>
                <td height="24">&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="9" valign="middle" class="Heading"><?php echo IMAGE;?> </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td></td>
              </tr>
              <tr>
                <td height="24">&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="5" valign="middle"><input  type="text" name="amount_" class="text" /></td>
                <td colspan="7" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
                <td></td>
              </tr>
              <tr>
                <td height="16"></td>
                <td></td>
                <td colspan="9" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                <td></td>
                <td></td>
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
                <td colspan="2" valign="top"><input type="submit" value="<?php echo SUBMIT;?>"  class="text"/></td>
                <td colspan="7" valign="top"><input type="reset" value="<?php echo RESET;?>"  class="text"/></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td></td>
              </tr>
              <tr>
                <td height="39">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
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
              <tr  <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>>
                <td height="24">&nbsp;</td>
                <td>&nbsp;</td>
                <td valign="middle"><?php if($rows_donors){ echo $rows_donors['donor_name']; }?></td>
                <td colspan="2" valign="middle"><?php if($rows_donors){ ?>
                <a href="?content=donate&action=remove&id=<?php echo $rows_donors['donor_id'];?>" target="_self" class="red_link"><?php echo REMOVE;?></a> | 
                <a href="?content=edit_donate&id=<?php echo $rows_donors['donor_id'];?>" target="_self" class="red_link"><?php echo EDIT;?></a>
                 <?php }?></td>
                <td colspan="3" valign="middle"><?php 
				$rows_donors=mysql_fetch_array($donors);
				if($rows_donors){ echo $rows_donors['donor_name']; }
				?></td>
                <td valign="middle"><?php if($rows_donors){ ?>
                <a href="?content=donate&action=remove&id=<?php echo $rows_donors['donor_id'];?>" target="_self" class="red_link"><?php echo REMOVE;?></a> | 
                <a href="?content=edit_donate&id=<?php echo $rows_donors['donor_id'];?>" target="_self" class="red_link"><?php echo EDIT;?></a>                  <?php }?></td>
                <td colspan="3" valign="middle"><?php 
				$rows_donors=mysql_fetch_array($donors);
				if($rows_donors){ echo $rows_donors['donor_name']; }
				?></td>
                <td valign="middle"><?php if($rows_donors){ ?>
                <a href="?content=donate&action=remove&id=<?php echo $rows_donors['donor_id'];?>" target="_self" class="red_link"><?php echo REMOVE;?></a> | 
                <a href="?content=edit_donate&id=<?php echo $rows_donors['donor_id'];?>" target="_self" class="red_link"><?php echo EDIT;?></a>                  <?php }?></td>
                <td>&nbsp;</td>
                <td></td>
              </tr><?php $i++; }?>
              <tr>
                <td height="110">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td></td>
              </tr>
        </form>
    </table>
</body>
</html>
