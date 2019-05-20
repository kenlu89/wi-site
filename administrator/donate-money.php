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

$show_=@mysql_query("select * from donation_book order by donation_book_id desc");

?>
<table width="800" border="0" cellpadding="0" cellspacing="0" class="text" >
            <!--DWLayoutTable-->
            <form action="?content=donate" enctype="multipart/form-data"  method="post">
              <input type="hidden" name="chk" value="1">
              <tr>
                <td height="20" colspan="8" align="center" valign="middle" class="bar"><?PHP echo NEW_CATEGORY;?></td>
              </tr>
              <tr>
                <td width="15" height="4"></td>
                <td width="194"></td>
                <td width="104"></td>
                <td width="206"></td>
                <td width="51"></td>
                <td width="61"></td>
                <td width="142"></td>
                <td width="27"></td>
              </tr>
              <tr>
                <td height="24"></td>
                <td colspan="7" align="center" valign="middle" class="text"><?PHP echo CATEGORY_MSG;?></td>
              </tr>
              <tr>
                <td height="58"></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="20"></td>
                <td valign="middle" class="bar"><?php echo DONATE_COMPANY;?></td>
                <td valign="middle" class="bar"><?php echo TEL;?></td>
                <td valign="middle" class="bar"><?php echo EMAIL;?></td>
                <td valign="middle" class="bar"><?php echo STATS;?></td>
                <td valign="middle" class="bar"><?php echo AMOUNT;?></td>
                <td valign="middle" class="bar"><?php echo DATE_ADDED;?></td>
                <td>&nbsp;</td>
              </tr><?php $i=0; while($rows_show=mysql_fetch_array($show_)){?>
              <tr>
                <td height="20"></td>
                <td valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?> ><?php echo $rows_show['entry_company']." / ".$rows_show['entry_firstname']." ".$rows_show['entry_lastname '];?></td>
                <td valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?> ><?php echo $rows_show['tel'];?></td>
                <td valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?> ><?php echo $rows_show['email_address'];?></td>
                <td valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?> ><input type="checkbox" name="stats" value="2" <?php if($rows_show['pay_stats']==2){ echo "checked=\"checked\""; }?>  class="text"/></td>
                <td valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?> ><?php echo $rows_show['donation_amount'];?></td>
                <td valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?> ><?php echo $rows_show['date_added'];?></td>
                <td>&nbsp;</td>
              </tr><?php ++$i; }?>
              <tr>
                <td height="325"></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
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
