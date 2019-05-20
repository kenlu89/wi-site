
<style type="text/css">
body{background:url(<?php echo $domain;?>images/bg1.jpg) no-repeat;
}

</style><?php 
$show_=@mysql_query("select * from article_description, article where article_description.products_id=12 and  language_id='$lan' and article.products_id=article_description.products_id  order by article.products_id desc");
$row_page=mysql_fetch_array($show_);
if($_POST['chk']==1){
$names=$_POST['contact_name'];
$phone=$_POST['contact_tel'];
$email=$_POST['contact_email'];

if($names=="" || $phone=="" || $email==""){
$error=1;
}
$domain=$_SERVER['SERVER_NAME'];
$subject="appointment from $domain";
$comemnt=$_POST['comment'];
$times=date('l, dS \of F Y h:i A');
$ip=$_SERVER['REMOTE_ADDR'];
$ADDR = "skybluestudio@gmail.com";
//$ADDR = "walklikeaman123@gmail.com";

$headers="contact@$domain\r\n";
$headers.= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers=stripslashes($headers);
$msg="Client submitted this booking request at $times, from the IP address: $ip<br /><br /><br />";
$msg .="Name: $names <br />";
$msg .="Tel: $phone <br />";
$msg .="Email: $email <br /><br />";
$msg .="Comment: $comment <br />";

$msg=stripslashes($msg);
 if (mail($ADDR,"$subject", "$msg", "From: $headers"))
{
header("Location: http://".$domain."index.php/contacts/1");

}
}
?>
<div id="bg"></div>
<div id="content" >
<p></p>

<h1><?php echo $row_page['products_name'];?></h1>
<?php 
$image=$domain.$row_page['products_image'];
if($row_page['products_image']!=""){		

list($width, $height, $type, $w) = getimagesize($row_page['products_image']);
if($width>250){
$p_width=(1-($width-250)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
//$image="../".$image;
}
?>
<img src="<?php echo $domain.$row_page['products_image'];?>" height="<?php echo $height;?>" width="<?php echo $width;?>" style="margin-right:10px; margin-left:10px; float:right;"/>
<?php }?>
<?php
 echo $row_page['products_description']; ?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable--><form name="form1" action="<?php echo $domain;?>contacts" enctype="multipart/form-data" method="post"><input type="hidden" name="chk" value="1" />
      <tr>
        <td width="7" height="40">&nbsp;</td>
        <td width="543" valign="middle"><span class="error">
          <?php if($error==1){ echo "<br>".ERROR_MSG; }else if($_GET['msg']==1){ echo "<br>".DONE_MSG; }?></span>
</td>
      </tr>
      <tr>
        <td height="423">&nbsp;</td>
        <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="text">
          <!--DWLayoutTable-->
          <tr>
            <td height="35" valign="middle" class="text"><?php echo NAME;?></td>
            <td valign="middle"><input type="text" name="contact_name" class="text" size="35" /> </td>
          </tr>
          <tr>
            <td height="35" valign="middle"  class="text"><?php echo EMAIL;?></td>
            <td valign="middle"><input type="text" name="contact_email" class="text" size="35" id="contact_email" /></td>
          </tr>
          <tr>
            <td height="35" valign="middle"  class="text"><?php echo TEL;?></td>
            <td valign="middle"><input type="text" name="contact_tel" class="text" size="35" id="contact_tel" /></td>
          </tr>
          <tr>
            <td height="35" colspan="2" valign="bottom"><?php echo COMMENT;?></td>
          </tr>
          <tr>
            <td height="163" colspan="2" valign="middle"><textarea name="comment" class="text" cols="90" rows="10"></textarea></td>
          </tr>
          <tr>
            <td height="25">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          
          
          <tr>
            <td height="60" valign="top"><input type="submit" value="<?php echo SUBMIT;?>" class="text" /></td>
          <td valign="top"><input type="reset" value="<?php echo RESET;?>" class="text" /></td>
        </tr>
        </table></td>
      </tr></form>
    </table>
</div>
