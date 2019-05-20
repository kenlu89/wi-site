<?php 
include("includes/config.php");

$parent=$_POST['parent'];
$opt=array();
$opt=$_POST['opt'];
$option=@mysql_query("select * from products_description, products where products_description.products_id=products.products_id order by products.sort_order asc");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo LANG; ?>" />
<title><?php echo TITLES;  ?></title>
<link   href="style_sheet.css" type="text/css"  rel="stylesheet" />
<script type="text/javascript">
function comfirms()
  {
  var r=confirm("Warning: Are you sure to delete this?")
  if (r==true)
    {
return true;
    }
  else
    {
return false;
    }
  }
</script>
<script src="dataentry.js"></script>
<script type="text/javascript">
function comfirms()
  {
  var r=confirm("Warning: Are you sure to delete this?")
  if (r==true)
    {
return true;
    }
  else
    {
return false;
    }
  }
</script>
</head>

<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable-->
  <tr>
    <td width="800" height="81" valign="top" class="left"><?php include("top.php"); ?></td>
  </tr>
  <tr>
    <td height="15">&nbsp;</td>
  </tr>
  <tr>
    <td height="234" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="800" height="237" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="box">
          <!--DWLayoutTable--><form name="option" action="assign_attribute_pro.php" enctype="multipart/form-data" method="post"><input type="hidden" name="chk" value="1" /><?php foreach($opt as $key=>$value){?>
          <input type="hidden" name="options[]" value="<?php echo $value;?>" />
          
          <?php }?>
          <input type="hidden" name="parent" value="<?php echo $parent;?>"  />
          <tr>
            <td height="20" colspan="3" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="bar">
              <!--DWLayoutTable-->
              <tr>
                <td width="24" height="20" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      <td width="774" valign="middle" class="Heading_wh"><strong>Modify Product Options</strong></td>
                    </tr>
              </table>            </td>
              </tr>
          <tr>
            <td width="24" height="24">&nbsp;</td>
              <td colspan="2" valign="bottom" class="mtext"> Assigning product option: <?php 
			  $r1=@mysql_query("select * from products_options where language_id=1 and products_options_id='$parent'");
			  $row=mysql_fetch_array($r1);
			   echo $row['products_options_name'];
			 $attribute=@mysql_query("select * from products_options_values_to_products_options, products_options_values where products_options_values.products_options_values_id=products_options_values_to_products_options.products_options_values_id and  products_options_values.language_id=1 and products_options_values_to_products_options.products_options_id=".$parent);
			 
			  ?></td>
              </tr>
          <tr>
            <td height="24" colspan="3" valign="top">
            <?php $i=1; while($result=mysql_fetch_array($attribute)){ ?>
            
            <table width="100%" border="0" cellpadding="0" cellspacing="0" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?>>
              <!--DWLayoutTable-->
              <tr >
                <td width="24"></td>
                  <td width="585" height="24" valign="middle" class="mtext">
                    <input  type="checkbox" name="attribute[]"  class="mtext" value="<?php echo $result['products_options_values_id'];?>" />                <?php echo $result['products_options_values_name'];?></td>
                <td width="189" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
                  </tr>
              
              
            </table><?php $i++; }?></td>
            </tr>
          <tr>
            <td height="37">&nbsp;</td>
            <td width="189">&nbsp;</td>
            <td width="585">&nbsp;</td>
          </tr>
          
          
          
          

          
          <tr>
            <td height="40">&nbsp;</td>
            <td valign="top"><input type="submit" name="Next" value="Next" class="mtext" /></td>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <td height="160">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>

      </form>
        </table></td>
        </tr>
      
      
      
      
      
      
    </table></td>
  </tr>
  <tr>
    <td height="35" align="center" valign="middle" class="text"> <?php include("bottom.php"); ?></td>
  </tr>
</table>
</body>
</html>
