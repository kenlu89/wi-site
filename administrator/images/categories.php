<?php 
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
$cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
header("Location: login.php ");
}else{	
@mysql_query("update products set sort_order=products_id");
$cate=$_GET['id'];
$ori=$_GET['ori'];
$swap=$_GET['swap'];
if($ori!="" && $swap!=""){

@mysql_query("update products set sort_order=1 where sort_order='$ori'");
//@mysql_query("update products_description set products_id=1 where products_id='$ori'");
@mysql_query("update products set sort_order='$ori' where sort_order='$swap'");
//@mysql_query("update products_description set products_id='$ori' where products_id='$swap'");
@mysql_query("update products set sort_order='$swap' where sort_order=1");
//@mysql_query("update products_description set products_id='$swap' where products_id=1");
}
if($cate!=""){
$r=@mysql_query("select * from categories, categories_description where categories.parent_id='$cate' and categories.categories_id=categories_description.categories_id order by categories.sort_order asc");
$r1=@mysql_query("select * from products_to_categories, products_description, products where products_to_categories.categories_id='$cate' and  products_description.products_id=products_to_categories.products_id and products_description.products_id=products.products_id order by products.sort_order desc");
}else{
$r=@mysql_query("select * from categories, categories_description where categories.parent_id=0 and categories.categories_id=categories_description.categories_id order by categories.sort_order asc");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo TITLES;  ?></title>
<link href="stylesheet.css" type="text/css"  rel="stylesheet" />
<script type="text/javascript">
function down(num){
var num1=document.getElementById(num+1).value
var num2=document.getElementById(num).value
document.location.href="categories.php?id=<?php echo $cate; ?>&ori="+num2+"&swap="+num1
}
function up(num){
var num1=document.getElementById(num-1).value
var num2=document.getElementById(num).value
document.location.href="categories.php?id=<?php echo $cate; ?>&ori="+num2+"&swap="+num1
}
</script>
</head>

<body>
<table width="821" border="0" align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable-->
  <tr>
    <td height="81" colspan="2" valign="top" class="left"><a href="index.php"><img src="images/Top.png" width="500" height="80" border="0" /></a></td>
  </tr>
  <tr>
    <td height="16" colspan="2" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td width="804" height="100%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="11" height="21">&nbsp;</td>
          <td width="576">&nbsp;</td>
          <td width="115">&nbsp;</td>
          <td width="100">&nbsp;</td>
      </tr>
      <tr>
        <td height="92">&nbsp;</td>
        <td colspan="3" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="images">
          <!--DWLayoutTable-->
          <tr>
            <td width="792" height="20" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="top_bar_text_bg"> 
              <!--DWLayoutTable-->
              <tr>
                <td width="23" height="20" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                <td width="229" valign="middle" class="Heading_wh">Categories
				  <?php if($cate!=""){
				$show_cate=@mysql_query("select * from categories_description where categories_id='$cate'");
				$r_show_cate=mysql_fetch_array($show_cate);
				echo " of ".$r_show_cate['categories_name']; 
				}?>				</td>
                <td width="140" align="center" valign="middle" class="Heading_wh">Date Added </td>
                <td width="125" align="center" valign="middle" class="Heading_wh">Last Edited</td>
                <td width="97" align="center" valign="middle" class="Heading_wh">Discontinue</td>
                <td width="88" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                <td width="90" align="center" valign="middle" class="Heading_wh">Sort</td>
          </tr>
            </table>
            </td>
              </tr>
          <tr>
            <td height="48" valign="top">              <?php while($row=mysql_fetch_array($r)){?>
              <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <!--DWLayoutTable-->
                <tr>
                  <td width="25" height="24" valign="middle">
                    <a href="categories.php?id=<?php echo $row['categories_id']; ?>" target="_self">
                      <img src="images/folder.gif" width="16" height="16" /></a></td>
                      <td width="229" valign="middle" class="left"><?php echo $row['categories_name']; ?></td>
                      <td width="147" valign="middle" class="left"><?php echo $row['date_added']; ?></td>
                      <td width="121" valign="middle" class="left"><?php echo $row['last_modified']; ?></td>
                      <td width="97" align="center" valign="middle" class="left">
					  <input  disabled="disabled" type="checkbox" name="status" class="text" id="status" value="1"  <?php if($row['status']==1){ echo " checked='checked'"; }?> /></td>
                      <td width="33" align="right" valign="middle">
                        <a href="categories_edit.php?id=<?php echo  $row['categories_id']; ?>" target="_self" class="left_nav">
                      Edit</a></td>
                      <td width="55" align="right" valign="middle">
                        <a  href="categories_remove.php?id=<?php echo $row['categories_id']; ?>" target="_self" class="left_nav">
                      Remove</a></td>
                    <td width="87" align="center" valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
                </tr>
                </table><?php }?>    
				              <?php $i=1; while($row1=mysql_fetch_array($r1)){ ?>
              <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <!--DWLayoutTable-->
				<input type="hidden" name="<?php echo $i; ?>" value="<?php echo $row1['products_id']; ?>"  id="<?php echo $i; ?>"/>
                <tr>
                  <td width="23" height="24" valign="middle">
                    <img src="images/preview.gif" width="16" height="16" /></td>
                      <td width="231" valign="middle" class="left"><?php echo $row1['products_model']; ?></td>
                      <td width="141" valign="middle" class="left"><?php echo $row1['products_date_added']; ?></td>
                      <td width="126" valign="middle" class="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      <td width="102" align="center" valign="middle" class="left"><input  disabled="disabled" type="checkbox" name="status" class="text" id="status" value="1"  <?php if($row1['wholesales']==1){ echo " checked='checked'"; }?> /></td>
                      <td width="31" align="right" valign="middle">
                        <a href="products_edit.php?id=<?php echo  $row1['products_id']; ?>" target="_self" class="left_nav">
                      Edit</a></td>
                      <td width="55" align="right" valign="middle">
                        <a  href="products_remove.php?id=<?php echo $row1['products_id']; ?>&parent=<?php echo $_GET['id'];?>" target="_self" class="left_nav">
                      Remove</a></td>
                    <td width="85" align="center" valign="middle">
					<a href=# onclick="down(<?php echo $i; ?>);" target="_self">
					<img src="images/down_arraow.png" width="10" height="10" /></a>
					<img src="images/space.png" width="20" height="20" />
					<a href=#  onclick="up(<?php echo $i; ?>);" target="_self">
					<img src="images/up_arrow.png" width="10" height="10" /></a></td>
                </tr>
                </table>
	            <?php $i++; }?>		        </td>
              </tr>
          <tr>
            <td height="21">&nbsp;</td>
            </tr>
          

          
          
          
          
          
        </table></td>
        </tr>
      <tr>
        <td height="17">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
      

      
      
      
        <tr>
          <td height="34">&nbsp;</td>
          <td>&nbsp;</td>
          <td valign="top"><a href="new_cate.php?id=<?php echo $_GET['id']; ?>" target="_self" class="left_nav"><img src="images/new_categories.png" /></a></td>
          <td valign="top"><a href="new_products.php?id=<?php echo $_GET['id']; ?>"><img src="images/new_products.png" width="100" height="20" border="0" class="left_nav" /></a></td>
        </tr>
      <tr>
        <td height="100%">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
      </tr>
      
      
      
    </table></td>
    <td width="15"></td>
  </tr>
  
  

  <tr>
    <td height="35" colspan="2" align="center" valign="middle" class="text"><?php include("bottom.php"); ?></td>
  </tr>
</table>
</body>
</html>
<?php }?>