<?php 
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
$cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
header("Location: login.php ");
}else{	
$new=@mysql_query("select * from news where ids=".$_GET['id']);

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
    <td height="980" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="15" height="20">&nbsp;</td>
        <td width="771">&nbsp;</td>
        <td width="10">&nbsp;</td>
      </tr>
      <tr>
        <td height="943">&nbsp;</td>
        <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="images">
          <!--DWLayoutTable-->
          <tr>
            <td width="769" height="24" align="center" valign="middle" bgcolor="#990000" class="Heading_wh">Edit News </td>
              </tr>
          <tr>
            <td height="933" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <!--DWLayoutTable-->
					<form name="news" action="newsupdatepro.php" enctype="multipart/form-data" method="post">
					<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                    <tr>
                      <td height="16" colspan="4" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="10" height="24">&nbsp;</td>
                      <td width="134" valign="middle" class="Heading">News Title:</td>
                      <td colspan="2" valign="middle"><input type="text" name="title" class="text"  size="80" value="<?php echo $rows['title']; ?>"/> </td>
                    </tr>
                    <tr>
                      <td height="24">&nbsp;</td>
                      <td valign="middle" class="Heading">Issue Date: </td>
                      <td colspan="2" valign="middle"><select name="month" class="text">
                          <option value="January" <?php if($rows['month']=="January"){ echo "selected='selected'"; }?>>January</option>
                 <option value="February" <?php if($rows['month']=="February"){ echo "selected='selected'"; }?>>February</option>
                          <option value="March"<?php if($rows['month']=="March"){ echo "selected='selected'"; }?>>March</option>
                          <option value="April" <?php if($rows['month']=="April"){ echo "selected='selected'"; }?>>April</option>
                          <option value="May"<?php if($rows['month']=="May"){ echo "selected='selected'"; }?>>May</option>
                          <option value="June"<?php if($rows['month']=="June"){ echo "selected='selected'"; }?>>June</option>
                          <option value="August"<?php if($rows['month']=="August"){ echo "selected='selected'"; }?>>August</option>
                          <option value="September"<?php if($rows['month']=="September"){ echo "selected='selected'"; }?>>September</option>
                          <option value="October"<?php if($rows['month']=="October"){ echo "selected='selected'"; }?>>October</option>
                          <option value="November"<?php if($rows['month']=="November"){ echo "selected='selected'"; }?>>November</option>
                          <option value="December"<?php if($rows['month']=="December"){ echo "selected='selected'"; }?>>December</option>
                          </select> 
                          
                        <select name="year" class="text">
                          <?php for($i=0; $i<=5; $i++){ ?>
                          <option value="<?php echo date('Y')+$i;  ?>" <?php if($rows['year']==(date('Y')+$i)){ echo "selected='selected'"; }?>><?php echo date('Y')+$i; ?></option>					  
                          <?php }?>
                      </select>					  </td>
                    </tr>
                    <tr>
                      <td height="24">&nbsp;</td>
                      <td valign="middle" class="Heading">News text: </td>
                      <td width="10">&nbsp;</td>
                      <td width="566">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="703">&nbsp;</td>
                      <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      <td colspan="2" valign="top"><textarea name="txt" class="text" cols="70" rows="50"><?php echo $rows['txt']; ?></textarea></td>
                    </tr>
                    
                    <tr>
                      <td height="28"></td>
                      <td align="right" valign="middle"><input type="submit" name="update" value="update" /></td>
                      <td>&nbsp;</td>
                      <td valign="middle"><input type="reset" value="reset"></td>
                    </tr>
                    </form>
                    
                </table>
            </td>
              </tr>
          
          

          
          
          
          
              
              
              
              
          

          </table></td>
          <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="17">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
      
      

      
      
      
      
      
    </table></td>
  </tr>
  
  <tr>
    <td height="23">&nbsp;</td>
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