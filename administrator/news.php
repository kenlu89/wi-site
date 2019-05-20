<?php 
include("db.php");
global $dbServer, $dbUser, $dbPass, $dbName;
$cxn = @ConnectToDb($dbServer, $dbUser, $dbPass, $dbName);
include("config.php");
session_start();
if(!session_is_registered("username")){
header("Location: login.php ");
}else{	
$cate=$_GET['id'];
$ori=$_GET['ori'];
$swap=$_GET['swap'];
if($ori!="" && $swap!=""){

@mysql_query("update news set ids=1 where ids='$ori'");
@mysql_query("update news set ids='$ori' where ids='$swap'");
@mysql_query("update news set ids='$swap' where ids=1");
}

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
            <td height="24" colspan="3" align="center" valign="middle" bgcolor="#990000" class="Heading_wh">Existing News </td>
              </tr>
          <tr>
            <td width="16" height="60"></td>
                <td width="720" valign="top">
									<?php for($i=0; $i<=11; $i++){
					$months=array(January, February, March, April, May, June, August, September, Octber, November, December);
					
					?>
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <!--DWLayoutTable--><?php if($chk_num>=1 || $months[$i]=="January"){?>
                  <tr>
                    <td width="720" height="30" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <!--DWLayoutTable-->
                      <tr>
                        <td width="9" height="30">&nbsp;</td>
                          <td width="711" valign="bottom" class="Heading"><?php  echo $months[$i];  ?></td>
                        </tr>
                        </table></td>
                </tr><?php }?>
                  <tr>
                    <td height="30" valign="top">
				<?php
				$nm=$months[$i+1];
				$news=@mysql_query("select * from news where month='$months[$i]' order by ids desc");
				$next_news=@mysql_query("select * from news where month='$nm' order by ids desc");
				$chk_num=mysql_num_rows($next_news);$h=1;
				while($row_new=mysql_fetch_array($news)){
				 ?>
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
				  <!--DWLayoutTable-->
				  <tr>
				    <td width="35" height="30" align="right" valign="middle"><img src="images/preview.gif" width="16" height="16"></td>
                        <td width="468" valign="middle" class="text"><?php echo $row_new['title']; ?></td>
                      <td width="67" align="center" valign="middle">
                        <a href="edit_news.php?id=<?php echo $row_new['ids']; ?>" target="_self"  class="left_nav">
                          edit</a></td>
                      <td width="60" align="center" valign="middle">
                        <a href="remove_news.php?id=<?php echo $row_new['ids']; ?>" class="left_nav"target="_self">
                          remove</a>					</td>
                      <td width="85" align="center" valign="middle">
					<a href=# onclick="down(<?php echo $h; ?>);" target="_self">
					<img src="images/down_arraow.png" width="10" height="10" /></a>
					<img src="images/space.png" width="20" height="20" />
					<a href=#  onclick="up(<?php echo $h; ?>);" target="_self">
					<img src="images/up_arrow.png" width="10" height="10" /></a></td>
				  </tr>
				  </table>
				  <input type="hidden"  name="<?php echo $h; ?>" id="<?php echo $h; ?>" value="<?php echo $row_new['ids'];?>">				
				<?php $h++; }?>				</td>
                </tr>
                </table>
				<?php }?>                </td>
                <td width="33"></td>
              </tr>
          <tr>
            <td height="12"></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td height="819"></td>
            <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <!--DWLayoutTable-->
					<form name="news" action="news_pro.php" enctype="multipart/form-data" method="post">
                    <tr>
                      <td height="16" colspan="4" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="10" height="24">&nbsp;</td>
                      <td width="134" valign="middle" class="Heading">News Title:</td>
                      <td colspan="2" valign="middle"><input type="text" name="title" class="text"  size="80"/> </td>
                    </tr>
                    <tr>
                      <td height="24">&nbsp;</td>
                      <td valign="middle" class="Heading">Issue Date: </td>
                      <td colspan="2" valign="middle"><select name="month" class="text">
                          <option value="January">January</option>
                          <option value="February">February</option>
                          <option value="March">March</option>
                          <option value="April">April</option>
                          <option value="May">May</option>
                          <option value="June">June</option>
                          <option value="August">August</option>
                          <option value="September">September</option>
                          <option value="Octber">Octber</option>
                          <option value="November">November</option>
                          <option value="December">December</option>
                          </select> 
                          
                        <select name="year" class="text">
                          <?php for($i=0; $i<=5; $i++){ ?>
                          <option value="<?php echo date('Y')+$i; ?>"><?php echo date('Y')+$i; ?></option>					  
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
                      <td colspan="2" valign="top"><textarea name="txt" class="text" cols="70" rows="50"></textarea></td>
                    </tr>
                    
                    <tr>
                      <td height="28"></td>
                      <td align="right" valign="middle"><input type="submit" name="update" value="update" /></td>
                      <td>&nbsp;</td>
                      <td valign="middle"><input type="reset" value="reset"></td>
                    </tr>
                    </form>
                    
                </table></td>
                <td></td>
          </tr>
          <tr>
            <td height="26"></td>
            <td>&nbsp;</td>
            <td></td>
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