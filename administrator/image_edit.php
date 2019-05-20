<?php 
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
$cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
header("Location: login.php ");
}else{	

			

$r=@mysql_query("select * from images where ids=".$_GET['id']);








?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"  />
<title><?php echo TITLES;  ?></title>
<link href="stylesheet.css" type="text/css"  rel="stylesheet" />

</head>

<body>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable-->
  <tr>
    <td width="598" height="81" valign="top" class="left"><a href="index.php"><img src="images/Top.png" width="500" height="80" border="0" /></a></td>
  </tr>
  <tr>
    <td height="16" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td height="444" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="19" height="26">&nbsp;</td>
        <td width="558">&nbsp;</td>
        <td width="21">&nbsp;</td>
      </tr>
      <tr>
        <td height="402">&nbsp;</td>
        <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="images">
          <!--DWLayoutTable-->
          <form action="image_edit_pro.php" enctype="multipart/form-data"  method="post">
            <input type="hidden"  name="cate_id" value="<?php echo $_GET['id']; ?>" />
			<input type="hidden" name="parent" value="<?php echo $_GET['parent_id']; ?>" />
            <tr>
              <td height="24" colspan="6" align="center" valign="middle" bgcolor="#3083FD" class="Heading_wh">New Photo Category </td>
                </tr>
            <tr>
              <td height="16" colspan="6" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <!--DWLayoutTable-->
                <tr>
                  <td width="556" height="15">&nbsp;</td>
                    </tr>
              </table></td>
                </tr>
            <tr>
              <td height="300" colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <!--DWLayoutTable-->
                <tr>
                  <td width="13" height="300">&nbsp;</td>
                      <td width="120" valign="top">
                    <?php 
				  $row=mysql_fetch_array($r);
				  $tmp="../".$row['image'];
 list($width, $height, $type, $w) = getimagesize($tmp);
			if($width>120){

$p_width=(1-($width-120)/$width);
$width=$width*$p_width;
$height=$height*$p_width;
}?>                    <img src="../<?php echo $row['image']; ?>" height="<?php echo $height; ?>" width="<?php echo $width; ?>" />				  </td>
                      </tr>
                
              </table></td>
                <td width="9">&nbsp;</td>
                <td colspan="3" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <!--DWLayoutTable-->
                  <tr>
                    <td width="7" height="23">&nbsp;</td>
                      <td colspan="2" valign="top" class="Heading">Description</td>
                  </tr>
                  <tr>
                    <td height="132">&nbsp;</td>
                    <td colspan="2" valign="top"><textarea name="desc" class="text" cols="40" rows="7"><?php echo $row['description']; ?></textarea></td>
                      </tr>
                  <tr>
                    <td height="24">&nbsp;</td>
                    <td width="106" valign="middle" class="Heading">Location:</td>
                    <td width="301" valign="middle" class="text"><input type="text" name="location" class="text" size="25" value="<?php echo $row['location']; ?>" /></td>
                  </tr>
                  <tr>
                    <td height="24">&nbsp;</td>
                    <td valign="middle" class="Heading">Date issued: </td>
                    <td valign="middle"><input type="text" name="date" class="text" size="25" value="<?php echo $row['date']; ?>" /></td>
                  </tr>
                  <tr>
                    <td height="24">&nbsp;</td>
                    <td valign="middle" class="Heading">By:</td>
                    <td valign="middle"><input type="text" name="taker" class="text" size="25" value="<?php echo $row['taker']; ?>" /></td>
                  </tr>
                  <tr>
                    <td height="24">&nbsp;</td>
                    <td valign="middle" class="Heading">Price:</td>
                    <td valign="middle"><input name="price" type="text" class="text" id="price" value="<?php echo $row['price']; ?>" size="25" /></td>
                  </tr>
                  <tr>
                    <td height="49">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  
                  
                  
                  
                </table></td>
                </tr>
            <tr>
              <td width="13" height="60">&nbsp;</td>
              <td width="120" align="right" valign="top"><input type="submit" name="submit" value="update" /></td>
              <td>&nbsp;</td>
              <td width="7">&nbsp;</td>
              <td width="393" valign="top"><input type="reset" value="reset" /></td>
              <td width="14">&nbsp;</td>
            </tr>
            <tr>
              <td height="0"></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
                </form>
                
          
        </table></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="22">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
      
      

      
      
      
      
      
      
      
    </table>    </td>
  </tr>
  
  

  <tr>
    <td height="35" align="center" valign="middle" class="text"> CopyRight &copy; 
      <?php  echo date('Y');  echo " "; echo $show_con['store']; echo " ";  ?> 
    All Right Reserved.	</td>
  </tr>
</table>
</body>
</html>
<?php }?>