<?php 
$ip=$_SERVER['REMOTE_ADDR'];
//if($ip=="129.44.51.83" || $ip=="127.0.0.1"){
if($_POST['chk']==1){
$error=array();
$file=$_FILES['file']['name'];
$extension = pathinfo($_FILES['file']['name']);
$extension = $extension[extension];
$uploaddir= "tmp_xls";
if($file!="" && $extension=="xls"){
require_once 'Excel/reader.php';
$data = new Spreadsheet_Excel_Reader();
$mode=0644;
$cate=$_POST['cate'];

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
	 
$tel=$data->sheets[0]['cells'][$j+1][2];
$pin=$data->sheets[0]['cells'][$j+1][1];
if($tel!="" && $pin!=""){
@mysql_query("insert into  phone_cards(serial_num, txt, date_added, parent_id) values('$tel', '$pin', now(), '$cate')");
}
}
unlink($test1);

}
}
?>


<script language="javascript" type="text/javascript">

			function showProducts( )
			{
			var newQty =document.getElementById("cate").value;
			document.location.href = 'new_products.php?pid='+newQty+'&id=<?php echo $_GET['id'];?>';
			}
</script>

<table width="798" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable--><form name="form1"  action="?content=quick_update" enctype="multipart/form-data" method="post">
  <input type="hidden"  name="chk" value="1" />

  <tr>
    <td width="22" height="74">&nbsp;</td>
    <td width="51">&nbsp;</td>
    <td colspan="3" align="right" valign="top"><a href="?content=phone_cards" target="_self" class="red_link"><?php echo BACK_TO_PREVIOUS;?></a></td>
    </tr>
  <tr>
    <td height="38">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" valign="middle"><span class=""><?php echo UPLOAD_MSG;?></span><span class="error"><?php if($ok==1){ echo DONE_MSG; }?></span></td>
  <td width="53">&nbsp;</td>
  </tr>
  
  <tr>
    <td height="36">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="154" valign="middle"><?php echo CATEGORY;?></td>
    <td width="518" valign="middle"><select  name="cate" class="text">
  <?php 
$products=@mysql_query("select * from products_description, products, products_to_categories where products.products_id=products_description.products_id and products.products_id=products_to_categories.products_id and products_to_categories.categories_id=2 and products_description.language_id='$lan'");

while($row_products=mysql_fetch_array($products)){
?>
      <option value="<?php echo $row_products['products_id']; ?>"><?php echo $row_products['products_name']; echo "(".$row_products['products_id'].")";?></option>
      <?php 
  }
  ?>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="middle"><?php echo EXCEL_DATA;?></td>
    <td valign="middle"><input type="file"  name="file" class="text" size="30" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="38">&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top"><input type="submit" value="<?php echo EXPORT;?>" class="text" /></td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="104">&nbsp;</td>
    <td colspan="3" align="center" valign="top"><?php 
	if($_POST['chk']==1){
	echo ERROR_PIN."<br>";
	foreach($error as $key=>$value){	
	echo $value."<br>";	
	}
	}
	?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="54">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  
</form>
</table>
<?php
/*
}else{
echo PRIVILEGE_MSG;
 }*/?>