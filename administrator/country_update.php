<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo TITLES;  ?></title>
<link href="style_sheet.css" type="text/css"  rel="stylesheet" />
<script src="clienthint.js"></script> 
<script language="javascript" type="text/javascript"  src="../tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
	mode : "textareas"
});
			function showProducts( )
			{
			var newQty =document.getElementById("cate").value;
			document.location.href = 'new_products.php?pid='+newQty+'&id=<?php echo $_GET['id'];?>';
			}
</script>
<?php 

if($_POST['chk']==1){
$file=$_FILES['file']['name'];
$extension = pathinfo($_FILES['file']['name']);
$extension = $extension[extension];
$uploaddir= "tmp_xls";
if($file!="" && $extension=="xls"){
require_once 'Excel/reader.php';
$data = new Spreadsheet_Excel_Reader();
$mode=0644;

function randomkeys($length)
  {
   $pattern = "QWERTYUIOPLKJHGFDSAZXCVBNM1234567890";
   for($i=0;$i<$length;$i++)
   {
     $key .= $pattern{rand(0,35)};
   }
   return $key;
  }
  
if($tmp_==""){
$tmp_=randomkeys(8);
}
$test1=$uploaddir.'/'.$tmp_.".xls";
rename($_FILES['file']['tmp_name'], $uploaddir.'/'."$tmp_.$extension");	

if(is_uploaded_file($_FILES['file']['tmp_name']))
{
move_uploaded_file($_FILES['file']['name'],$uploaddir.'/'.$_FILES['file']['name']);
@chmod($test1, $mode); 

}

//$data->read($file);
$data->read($test1);
error_reporting(E_ALL ^ E_NOTICE);




for ($j = 1; $j <= $data->sheets[0]['numRows']; $j++){
	 
$country_en=$data->sheets[0]['cells'][$j+1][2];
$country_ch=$data->sheets[0]['cells'][$j+1][1];
$code=$data->sheets[0]['cells'][$j+1][3];
$amount_20=$data->sheets[0]['cells'][$j+1][4];
$amount_10=$data->sheets[0]['cells'][$j+1][5];
$amount_5=$data->sheets[0]['cells'][$j+1][6];

$chk_item=@mysql_query("select * from calling_rate_description where callingrate_name='$country_en'");
$num_item=mysql_num_rows($chk_item);
if($num_item>=1){
$item=mysql_fetch_array($chk_item); 	 	

@mysql_query("update calling_rates set  amount_20='$amount_20', amount_10='$amount_10', amount_05='$amount5' where  callingrate_id=".$item['callingrate_id']);

}else{

@mysql_query("insert into calling_rates(date_added, stats, code, amount_05, amount_10, amount_20) values(now(), 1, '$code', '$amount_5', '$amount_10', '$amount_20')");
$lastid=mysql_insert_id();
@mysql_query("insert into calling_rate_description(callingrate_name, language_id, callingrate_id) values('$country_ch', 3, '$lastid')");
@mysql_query("insert into calling_rate_description(callingrate_name, language_id, callingrate_id) values('$country_en', 1, '$lastid')");

}
}
unlink($test1);
header("Location: ?content=country_update&msg=1");
}
}
?>
</head>
<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable--><form name="form1"  action="?content=country_update" enctype="multipart/form-data" method="post">
  <input type="hidden"  name="chk" value="1" />

  <tr>
    <td width="22" height="74">&nbsp;</td>
    <td colspan="9" valign="middle"><?php echo COUNTRY_MSG;?></td>
    <td width="18">&nbsp;</td>
  </tr>
  <tr>
    <td height="38">&nbsp;</td>
    <td width="40">&nbsp;</td>
    <td width="120">&nbsp;</td>
    <td width="146" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="6" valign="middle" class="error"><?php if($_GET['msg']==1){ echo DONE_MSG;}?></td>
  <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="middle"><?php echo EXCEL_DATA;?></td>
    <td colspan="6" valign="middle"><input type="file"  name="file" class="text" size="30" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="38">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top"><input type="submit" value="<?php echo SUBMIT;?>" class="text" /></td>
    <td colspan="6" valign="top"><input type="reset" value="<?php echo RESET;?>" class="text" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="55">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="54">&nbsp;</td>
    <td width="80">&nbsp;</td>
    <td width="80">&nbsp;</td>
    <td width="80">&nbsp;</td>
    <td width="80">&nbsp;</td>
    <td width="80">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td colspan="9" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="bar">
      <!--DWLayoutTable-->
      <tr>
        <td width="360" height="25" valign="middle"><?php echo COUNTRY;?></td>
      <td width="80" valign="middle"><?php echo CODE;?></td>
      <td width="80" align="center" valign="middle">$20</td>
      <td width="80" align="center" valign="middle">$10</td>
      <td width="80" align="center" valign="middle">$5</td>
      <td width="80" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <?php 
   $call_rate=@mysql_query("select * from calling_rates, calling_rate_description where calling_rates.callingrate_id=calling_rate_description.callingrate_id and calling_rate_description.language_id='1' order by calling_rates.callingrate_id asc");
   $i=1;
		while($rows_calling=mysql_fetch_array($call_rate)){?>
  <tr>
    <td height="36">&nbsp;</td>
    <td align="right" valign="middle"  <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>> <?php 
	if($rows_calling['image']!=""){
	 $image="../".$rows_calling['image'];
		if(!file_exists($image)){		
$image=DEFAULT_;
$height=32;
$width=22;
}else{
list($width, $height, $type, $w) = getimagesize($image);
if($width>32){
$p_width=(1-($width-32)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
//$image="../".$image;
}

}
?><?php  }?>
      <img src="<?php echo "../".$rows_calling['image'];?>" height="<?php echo $height;?>" width="<?php echo $width;?>"  /></td>
    <td colspan="3" valign="middle"  <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>> &nbsp; <?php echo $rows_calling['callingrate_name'];?> / 
      <?php $ch=@mysql_query("select * from calling_rate_description where callingrate_id='".$rows_calling['callingrate_id']."' and language_id=3"); $row_ch=mysql_fetch_array($ch); echo $row_ch['callingrate_name'];?></td>
    <td valign="middle"  <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><?php echo $rows_calling['code'];?></td>
    <td align="center" valign="middle"  <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><?php echo $rows_calling['amount_20'];?></td>
    <td align="center" valign="middle"  <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><?php echo $rows_calling['amount_10'];?></td>
    <td align="center" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><?php echo $rows_calling['amount_05'];?></td>
    <td align="center" valign="middle" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>><a href="?content=rate_edit&id=<?php echo $rows_calling['callingrate_id'];?>" target="_self" class="red_link"><?PHP echo EDIT;?></a></td>
    <td>&nbsp;</td>
  </tr><?php $i++; }?>
  <tr>
    <td height="181">&nbsp;</td>
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
  </tr>
  
  
  
  
</form>
</table>
</body>
</html>
