<?php 
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
$cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
header("Location: login.php ");
}else{	
$tmp=$_POST['service'];
$id=$_POST['ids'];
if($tmp!=""){
@mysql_query("insert into services (parent_id, service) values('$ids', '$tmp')");
}
if($_GET['id']==""){
$r=@mysql_query("select * from services where parent_id=".$_POST['ids']);
}else{
$r=@mysql_query("select * from services where parent_id=".$_GET['id']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
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
        <td width="11" height="21">&nbsp;</td>
        <td width="564">&nbsp;</td>
        <td width="23">&nbsp;</td>
      </tr>
      <tr>
        <td height="68">&nbsp;</td>
        <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="images">
          <!--DWLayoutTable-->
          <tr>
            <td width="24" height="20" valign="top" bgcolor="#710808"><!--DWLayoutEmptyCell-->&nbsp;</td>
              <td width="311" valign="middle" bgcolor="#710808" class="Heading_wh">Shipping services of <?php if( $_GET['company']==""){ echo  $_POST['company']; }else{ echo $_GET['company']; }?></td>
            <td width="126" align="center" valign="middle" bgcolor="#710808" class="Heading_wh"><!--DWLayoutEmptyCell-->&nbsp;</td>
            <td width="101" valign="top" bgcolor="#710808"><!--DWLayoutEmptyCell-->&nbsp;</td>
            </tr>
          <tr>
            <td height="6"></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          <tr>
            <td height="24" colspan="4" valign="top">
              <?php while($row=mysql_fetch_array($r)){?>
              <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <!--DWLayoutTable-->
                <tr>
                  <td width="25" height="24" valign="middle">
                      <img src="images/folder.gif" width="16" height="16" /></td>
                      <td width="485" valign="middle" class="left"><?php echo $row['service']; ?></td>
                      <td width="52" align="right" valign="middle">
                        <a  href="service_remove.php?id=<?php echo $row['ids']; ?>&company=<?php echo $_GET['company']; ?>&parent=<?php echo $_GET['id']; ?>" target="_self" class="left_nav">
                      Remove</a></td>
                    </tr>
                </table>
                <?php }?>             		  </td>
            </tr>
          <tr>
            <td height="16">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          
          
          
          
          
          
          
        </table></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="13">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="316">&nbsp;</td>
        <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
          <form action="services.php" method="post" enctype="multipart/form-data" name="forma">
		  <input type="hidden" name="ids" value="<?php echo $_GET['id']; ?>" />
		  <input type="hidden" name="company" value="<?php echo $_GET['company']; ?>" />
          <tr>
            <td width="121" height="16">&nbsp;</td>
            <td width="11">&nbsp;</td>
            <td width="432">&nbsp;</td>
          </tr>
          <tr>
            <td height="27" align="right" valign="middle" class="Heading">Services:</td>
            <td>&nbsp;</td>
            <td valign="middle" class="text"><input name="service" type="text" class="text" id="service" /></td>
          </tr>
          <tr>
            <td height="16">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="28" align="right" valign="middle"><input  type="submit" value="create" /></td>
            <td>&nbsp;</td>
            <td valign="top"><input type="reset" value="reset" /></td>
          </tr>
          <tr>
            <td height="229">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr></form>
        </table>
        </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="62">&nbsp;</td>
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