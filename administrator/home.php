<?php 
$r=@mysql_query("select count(*) as pending from orders where orders_status=1");
$r1=@mysql_query("select count(*) as processing from orders where orders_status=2");
$r2=@mysql_query("select count(*) as delivered from orders where orders_status=3");
//$r3=@mysql_query("select count(*) as video_num from video");
$r4=@mysql_query("select count(*) as products_num from products");
$r5=@mysql_query("select count(*) as tmp_num from album");
$r6=@mysql_query("select count(*) as vistor_num from ip_history");

$row_pending=mysql_fetch_array($r);
$row_processing=mysql_fetch_array($r1);
$row_delivered=mysql_fetch_array($r2);
$row_customers=mysql_fetch_array($r3);
$row_products=mysql_fetch_array($r4);
$row_temp=mysql_fetch_array($r5);
$row_visitor=mysql_fetch_array($r6);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo LANG; ?>" />
<title><?php echo TITLES;  ?></title>
<link   href="style_sheet.css" type="text/css"  rel="stylesheet" />

</head>

<body>
<table width="798" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->

  <tr>
    <td width="8" height="44">&nbsp;</td>
    <td width="128">&nbsp;</td>
    <td width="662">&nbsp;</td>
  </tr>
  <tr>
    <td height="115">&nbsp;</td>
    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="box">
      <!--DWLayoutTable-->
      <tr>
        <td height="18" colspan="2" align="center" valign="middle" class="bar"><?php echo STATISTICS;?></td>
        </tr>
      <tr>
        <td width="6" height="4"></td>
          <td width="120"></td>
        </tr>
      <tr>
        <td height="21">&nbsp;</td>
          <td valign="middle" class="text"><?php echo VIDEO;?>: 
            <a href="?content=show_video" class="H_link">
            <?php $c_number=$row_customers['video_num']; echo $c_number;?>
          </a></td>
        </tr>
      <tr>
        <td height="22">&nbsp;</td>
          <td valign="middle" class="text"><?php echo ARTICLES;?>: 
            <a href="?content=categories" class="H_link">
            <?php $p_number=$row_products['products_num']; echo $p_number; ?>
          </a></td>
        </tr>
      <tr>
        <td height="22">&nbsp;</td>
          <td valign="middle" class="text"><!--DWLayoutEmptyCell-->&nbsp;</td>
        </tr>

      <tr>
        <td height="4"></td>
          <td></td>
        </tr>
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
    </table></td>
  <td rowspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td height="22" colspan="6" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td width="32"></td>
          <td width="50"></td>
          <td width="140"></td>
        </tr>
      <tr>
        <td width="18" height="50">&nbsp;</td>
          <td width="50" valign="top"><img src="images/icon1.jpg" width="50" height="50" /></td>
          <td width="146" valign="middle"><a href="?content=categories" class="H_link"><?php echo MENU;?></a><br />
            <span class="text"><?php echo MENU_MSG;?></span></td>
          <td width="36">&nbsp;</td>
          <td width="50" align="center" valign="middle"><img src="images/icon12.png" width="50" height="50" /></td>
          <td width="140" valign="middle"><a href="?content=banner" target="_self" class="H_link"><?php echo BANNER;?></a></span><br />
          &nbsp; <span class="text"><?php echo BANNER_MSG;?></span></td>
          <td>&nbsp;</td>
          <td valign="top"><img src="images/icon5.jpg" width="50" height="50" /></td>
          <td valign="middle"><span class="Heading"><a href="?content=categories_management" target="_self" class="H_link"><?php echo QUICK_MANAGMENT;?></a></span><br />
            <span class="text"><?php echo QUICK_MANAGMENT_MSG;?></span></td>
        </tr>
      <tr>
        <td height="20">&nbsp;</td>
          <td colspan="5" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      <tr>
        <td height="1"></td>
          <td rowspan="2" valign="top"><img src="images/icon4.jpg" width="50" height="50" /></td>
          <td rowspan="2" valign="middle"><a href="?content=show_video" target="_self" class="H_link"><?php echo VIDEO;?></a><br />
            <span class="text"><?php echo VIDEO_MSG;?></span></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td rowspan="2" valign="top"><img src="images/icon20.png" width="50" height="50" /></td>
          <td rowspan="2" valign="middle"><a href="?content=articles" target="_self" class="H_link"><?php echo ARTICLES;?></a><br />
            <span class="text"><?php echo MONEY_MSG;?></span></td>
        </tr>
      <tr>
        <td height="49"></td>
          <td>&nbsp;</td>
          <td valign="top"><img src="images/icon16.png" width="50" height="50" /></td>
          <td valign="middle"><a href="?content=media" target="_self" class="H_link"><?php echo MEDIA;?></a><br />
            <span class="text"><?php echo MEDIA_MSG;?></span></td>
          <td></td>
        </tr>
      <tr>
        <td height="20">&nbsp;</td>
          <td colspan="5" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      <tr>
        <td height="50">&nbsp;</td>
          <td valign="top"><img src="images/Computer.png" alt="" width="50" height="50" /></td>
          <td valign="middle"><a href="?content=social" target="_self" class="H_link"><?php echo SOCIAL;?></a><br />
          <span class="text"><?php echo SOCIAL_MSG;?></span></td>
          <td>&nbsp;</td>
          <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td></td>
          <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
        </tr>
      <tr>
        <td height="20">&nbsp;</td>
          <td colspan="5" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      <tr>
        <td height="50"></td>
          <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td colspan="2" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td></td>
          <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
        </tr>
      <tr>
        <td height="20"></td>
          <td colspan="5" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      <tr>
        <td height="83"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
    </table></td>
  </tr>
  <tr>
    <td height="270">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td height="94">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
