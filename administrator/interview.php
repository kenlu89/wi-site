<?php 
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
$cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
header("Location: login.php ");
}else{	

$update=$_POST['update']; 
$title=$_POST['title']; 
$txt=$_POST['txt']; 
if($update!=""){
@mysql_query("update interviews set title='$title', txt='$txt' where ids='$update'");
echo "<script>alert('Interview has  been updated'); window.location='interview.php';</script>";
}
$chk=$_POST['chk'];
if($chk==1 && $update==""){
if($title=="" || $txt==""){
echo "<script>alert('Incorrect format, please try again'); window.location='interview.php';</script>";
}else{
$done=@mysql_query("insert into interviews(title, txt) values('$title', '$txt')");
if($done){
echo "<script>alert('Interview has been uploaded.'); window.location='interview.php';</script>";
}
}}
$r=@mysql_query("select * from interviews order by ids asc");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"  />
<title><?php echo TITLES;  ?></title>
<link href="stylesheet.css" type="text/css"  rel="stylesheet" />

</head>

<body>
<table width="861" border="0" align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable-->
  <tr>
    <td height="81" colspan="3" valign="top" class="left"><a href="index.php"><img src="images/Top.png" width="500" height="80" border="0" /></a></td>
  </tr>
  <tr>
    <td height="18" colspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td width="15" height="664">&nbsp;</td>
    <td width="827" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="10" height="21">&nbsp;</td>
          <td width="817">&nbsp;</td>
        </tr>
      <tr>
        <td height="69">&nbsp;</td>
          <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="images">
              <!--DWLayoutTable-->
              <tr>
                <td width="24" height="20" valign="top" bgcolor="#3083FD"><!--DWLayoutEmptyCell-->&nbsp;</td>
                <td width="522" valign="middle" bgcolor="#3083FD" class="Heading_wh">Interview  </td>
                <td width="168" align="center" valign="middle" bgcolor="#3083FD" class="Heading_wh">Date Added </td>
                <td width="101" valign="top" bgcolor="#3083FD"><!--DWLayoutEmptyCell-->&nbsp;</td>
              </tr>
              <tr>
                <td height="29" colspan="4" valign="top">              <?php while($row=mysql_fetch_array($r)){?>
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <!--DWLayoutTable-->
                    <tr>
                      <td width="25" height="24" valign="middle">
                        <img src="images/folder.gif" width="16" height="16" /></td>
                      <td width="522" valign="middle" class="left"><?php echo $row['title']; ?></td>
                      <td width="176" align="center" valign="middle" class="left"><?php echo $row['date_added']; ?></td>
                      <td width="29" align="right" valign="middle">
                        <a href="interview.php?id=<?php echo  $row['ids']; ?>" target="_self" class="left_nav">
                      Edit</a></td>
                      <td width="52" align="right" valign="middle">
                        <a  href="interview_remove.php?id=<?php echo $row['ids']; ?>" target="_self" class="left_nav">
                      Remove</a></td>
                    </tr>
                  </table>
                  <?php }?>            </td>
              </tr>
              <tr>
                <td height="18"></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              
              
              
              
              
              
              
          </table></td>
        </tr>
      <tr>
        <td height="17"></td>
          <td></td>
        </tr>
      <tr>
        <td height="557"></td>
        <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable--><form action="<?php echo  $HTTP_SERVER_VARS[PHP_SELF]; ?>" enctype="multipart/form-data" name="form1" method="post">
		  <input  type="hidden" name="chk" value="1" />
		  <input type="hidden"  name="update" value="<?php echo $_GET['id']; ?>" />
          <tr>
            <td height="24" colspan="8" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable-->
              <tr>
                <td width="817" height="24" align="center" valign="middle" bgcolor="#3083FD" class="Heading_wh">New interview </td>
                </tr>
            </table></td>
              </tr>
          <tr>
            <td width="15" height="16"></td>
            <td width="56"></td>
            <td width="41"></td>
            <td width="84"></td>
            <td width="75"></td>
            <td width="16"></td>
            <td width="521"></td>
            <td width="9"></td>
          </tr>
          <tr><?php $ids=$_GET['id'];
if($ids!=""){
$Interview=@mysql_query("select * from interviews  where ids='$ids'");
$row=mysql_fetch_array($Interview);
} ?>
            <td height="23"></td>
            <td valign="middle" class="Heading">Title:</td>
            <td colspan="6" valign="middle"><input type="text"   name="title" size="130" class="text"   value="<?php echo $row['title']; ?>"/></td>
          </tr>
          <tr>
            <td height="24"></td>
            <td colspan="3" valign="bottom" class="Heading">Description:</td>
            <td colspan="2" valign="middle" class="Heading"><!--DWLayoutEmptyCell-->&nbsp;</td>
            <td colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
          </tr>
          <tr>
            <td height="703"></td>
            <td colspan="6" valign="top"><textarea name="txt"  class="text" rows="50" cols="125"><?php echo $row['txt']; ?></textarea></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="40"></td>
            <td colspan="2" valign="top"><input type="submit" name="submit" value="submit" /></td>
            <td colspan="2" valign="top"><input type="reset" name="reset" value="reset" /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td></td>
          </tr>
          <tr>
            <td height="24"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td></td>
          </tr>
          
          
          
          
          
          
          
          
          
          
          
          </form>
          
          
          

        </table></td>
        </tr>
      

      


      
    </table></td>
    <td width="17">&nbsp;</td>
  </tr>
  
  <tr>
    <td height="35" colspan="3" align="center" valign="middle" class="text"> CopyRight &copy; 
      <?php  echo date('Y');  echo " "; echo $show_con['store']; echo " ";  ?> 
    All Right Reserved.	</td>
  </tr>
</table>
</body>
</html>
<?php }?>