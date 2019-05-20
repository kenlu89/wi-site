<?php 
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
$cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
header("Location: login.php ");
}else{	
$new=@mysql_query("select * from event where ids=".$_GET['id']);

$rows=mysql_fetch_array($new);


?>

<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo TITLES;  ?></title>
<link href="stylesheet.css" type="text/css"  rel="stylesheet" />
<script type="text/javascript">
function down(num){
var num1=document.getElementById(num+1).value
var num2=document.getElementById(num).value
document.location.href="news.php?ori="+num2+"&swap="+num1
}
function up(num){
var num1=document.getElementById(num-1).value
var num2=document.getElementById(num).value
document.location.href="news.php?ori="+num2+"&swap="+num1
}
</script>
</head>

<body>
<table width="798" border="0" align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable-->
  <tr>
    <td width="796" height="81" valign="top" class="left"><a href="index.php"><img src="images/Top.png" width="500" height="80" border="0" /></a></td>
  </tr>
  <tr>
    <td height="16" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td height="538" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="15" height="20">&nbsp;</td>
          <td width="771">&nbsp;</td>
          <td width="10">&nbsp;</td>
        </tr>
      <tr>
        <td height="510">&nbsp;</td>
          <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="images">
            <!--DWLayoutTable-->
            <tr>
              <td width="769" height="24" align="center" valign="middle" bgcolor="#990000" class="Heading_wh">Edit News </td>
              </tr>
            <tr>
              <td height="469" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <!--DWLayoutTable-->
                <form name="news" action="eventeditpro.php" enctype="multipart/form-data" method="post">
                  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                  <tr>
                    <td height="16" colspan="4" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      </tr>
                  <tr>
                    <td width="10" height="24">&nbsp;</td>
                        <td width="134">&nbsp;</td>
                        <td width="10">&nbsp;</td>
                        <td width="615">&nbsp;</td>
                      </tr>
                  <tr>
                    <td height="24">&nbsp;</td>
                        <td valign="middle" class="Heading">Issue Date: </td>
                        <td colspan="2" valign="middle"><input type="text" name="year" class="text" value="<?php echo $rows['year'];?>"></td>
                      </tr>
                  <tr>
                    <td height="24">&nbsp;</td>
                        <td valign="middle" class="Heading">News text: </td>
                        <td colspan="2" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      </tr>
                  <tr>
                    <td height="353">&nbsp;</td>
                        <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                        <td colspan="2" valign="top"><textarea name="txt" class="text" cols="70" rows="25"><?php echo $rows['txt']; ?></textarea></td>
                      </tr>
                  <tr>
                    <td height="28">&nbsp;</td>
                        <td align="right" valign="middle"><input type="submit" name="update" value="update" /></td>
                        <td>&nbsp;</td>
                        <td valign="middle"><input type="reset" value="reset"></td>
                      </tr>
                    </form>
                        
                </table></td>
              </tr>
            <tr>
              <td height="15">&nbsp;</td>
              </tr>
            
            
            
            
            
            
            
            
            
            
            
            
            
          </table></td>
          <td>&nbsp;</td>
        </tr>
      <tr>
        <td height="7"></td>
          <td></td>
          <td></td>
        </tr>
      

      
      
      

      
      
      
      
    </table></td>
  </tr>
  <tr>
    <td height="35" align="center" valign="middle" class="text"> CopyRight &copy; 
      <?php  echo date('Y');  echo " "; echo $show_con['store']; echo " ";  ?> 
    All Right Reserved.	</td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php }?>