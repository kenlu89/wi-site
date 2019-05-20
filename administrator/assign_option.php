<?php 
include("includes/config.php");
if($_GET['id']==""){
$ids=$_POST['parent'];
}else{
$ids=$_GET['id'];
}

$option=@mysql_query("select * from products_description, products where products_description.products_id=products.products_id order by products.sort_order asc");
$row=mysql_fetch_array($option);

if($_GET['action']=="remove"){
$aid="";
$aid=$_GET['id'];
$parent="";
$parent=$_GET['parent'];
@mysql_query("delete from products_attributes where products_attributes_id='$aid'");
header("Location: assign_option.php?id=$parent");
}
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

			function exchange( )
			{
			var blank=document.getElementById("options").value;
				
				document.location.href = 'assign_option.php?id='+<?php echo $_GET['id'];?>+'&opt_id='+blank;
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
    <td height="234" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="box">
          <!--DWLayoutTable--><form name="option" action="assign_attribute_pro.php" enctype="multipart/form-data" method="post"><input type="hidden" name="chk" value="1" />
          <input  type="hidden" name="pid" value="<?php echo $_GET['id'];?>" />
          <input type="hidden" name="opt_id" value="<?php echo $_GET['opt_id'];?>" />
          <tr>
            <td height="20" colspan="4" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="bar">
              <!--DWLayoutTable-->
              <tr>
                <td width="24" height="20" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      <td width="774" valign="middle" class="Heading_wh"><strong>Assigning product option</strong></td>
                    </tr>
              </table>            </td>
              </tr>
          <tr>
            <td width="24" height="29">&nbsp;</td>
              <td width="189">&nbsp;</td>
              <td width="562">&nbsp;</td>
              <td width="23">&nbsp;</td>
          </tr>
          <tr>
            <td height="38"></td>
            <td colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable--><?php 
			$chk=@mysql_query("select DISTINCT options_id from products_attributes, products_options, products_options_values where products_options.products_options_id=products_attributes.options_id  and products_options_values.products_options_values_id=products_attributes.options_values_id and $ids=products_attributes.products_id and products_options_values.language_id=1");
			while($option=mysql_fetch_array($chk)){
			$oid=$option['options_id'];
			$result=@mysql_query("select * from products_attributes, products_options, products_options_values where products_options.products_options_id=products_attributes.options_id  and products_options_values.products_options_values_id=products_attributes.options_values_id and $ids=products_attributes.products_id and products_options_values.language_id=1 and products_attributes.options_id='$oid'");
	
	//$result=@mysql_query("select * from products_options_values_to_products_options, products_options_values where products_options_values.products_options_values_id=products_options_values_to_products_options.products_options_values_id and  products_options_values.language_id=1 and products_options_values_to_products_options.products_options_id=".$_GET['opt_id']);
	
	?>
              
              <tr>
                <td width="653" height="18" valign="bottom" class="bar">&nbsp; &nbsp; 
                  <?php
				$chk_name=@mysql_query("select * from products_options where products_options_id='$oid'");
				$row_name=mysql_fetch_array($chk_name);
				
				
				 echo $row_name['products_options_name'];?>                                
                
                <td colspan="2" align="center" valign="middle" class="bar"><a href="assign_option.php?action=edit&opt_id=<?php echo $oid;?>&id=<?php echo $_GET['id'];?>" target="_self" class="left_nav">More Options </a>                          
                </tr>
              <?php 	while($current=mysql_fetch_array($result)){?>
              <tr>
                <td height="20" colspan="2" valign="middle">
                    
                    <?php 
				
			echo "&nbsp; &nbsp; &nbsp; <span class='text'>".$current['products_options_values_name']."</span><br>";

			


			?>
                <td width="80" valign="middle"><a href="assign_option.php?action=remove&parent=<?php echo $_GET['id'];?>&id=<?php echo $current['products_attributes_id'];?>" target="_self" class="left_nav" onclick="return comfirms()">remove</a>                                                          </tr>
              <tr>
                <td height="1"></td>
                <td width="18"></td>
                <td></td>
              </tr>
              
              
              <?php 

			}
			}
			?>
            </table></td>
            <td></td>
          </tr>
          <tr>
            <td height="8"></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          
               
          
          <tr>
            <td height="20">&nbsp;</td>
            <td colspan="2" valign="middle" class="bar">Please Select a option for <?php echo $row['products_name'];?></td>
            <td>&nbsp;</td>
          </tr>
          
          <tr >
            <td height="30">&nbsp;</td>
            <td colspan="3" valign="middle" class="mtext"><select name="options"  id="options" class="text" onchange="exchange(this)">
                <option value="">--- Please select option ---</option>
                <?php $r1=@mysql_query("select * from products_options where language_id=1 "); 
			while($row_1=@mysql_fetch_array($r1)){
			$chk_opt=@mysql_query("select * from products_attributes where products_id='$ids' and options_id=".$row_1['products_options_id']);
			echo $num_opt=mysql_num_rows($chk_opt);
			if($num_opt<=0){
			?>
                <option value="<?php echo $row_1['products_options_id'];?>" <?php if($row_1['products_options_id']==$_GET['opt_id']){ echo "selected='selected'"; } ?>><?php echo $row_1['products_options_name'];?></option>
                <?php } }?>
                        </select></td>
            </tr>
          
          <tr>
            <td height="29">&nbsp;</td>
            <td colspan="2" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>  	  
            <td colspan="2" valign="middle" class="text">
            <?php			
			if($_GET['opt_id']!=""){
			$opt="";
			$opt=$_GET['opt_id'];
			$opt_value="";
			$opt_value=mysql_query("select * from products_options_values_to_products_options, products_options_values where products_options_values.products_options_values_id=products_options_values_to_products_options.products_options_values_id and  products_options_values.language_id=1 and products_options_values_to_products_options.products_options_id=".$opt);
			while($row_opt=mysql_fetch_array($opt_value)){
			$i=0;
			if($_GET['action']=="edit"){
			$chk_i=@mysql_query("select * from products_attributes where products_id='$ids' and options_id='$opt' and options_values_id=".$row_opt['products_options_values_id']);
			$num_i=mysql_num_rows($chk_i);
			if($num_i>=1){
			 $i=1;
			}}
			?>
            
            <input  name="attribute[]" type="checkbox" class="text" id="attribute" <?php if($i==1){ echo "checked='checked'"; }?> value="<?php echo $row_opt['products_options_values_id'];?>"  />
            <?php echo $row_opt['products_options_values_name'];?><br />

            
            <?php } }?>            </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="70">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          
          
          
          <tr>
            <td height="40">&nbsp;</td>
            <td valign="top"><?php if($_GET['opt_id']!=""){ ?><input type="submit" name="Next" value="Next" class="mtext" /><?php }?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="160">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>

      </form>
    </table></td>
  </tr>
  <tr>
    <td height="35" align="center" valign="middle" class="text"> <?php include("bottom.php"); ?></td>
  </tr>
</table>
</body>
</html>
