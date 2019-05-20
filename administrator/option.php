<?php 
$r1=@mysql_query("select * from products_options where language_id=1 ");
if($_POST['chk']==1){
$opt="";
$opt=$_POST['opt'];
@mysql_query("insert into products_options(language_id, products_options_name) values(1, '$opt')");
header("Location: ?content=option");
}
?>
<script type="text/javascript">
function down(num){
var num1=document.getElementById(num+1).value
var num2=document.getElementById(num).value
document.location.href="categories.php?id=<?php echo $cate; ?>&ori="+num2+"&swap="+num1
}
function up(num){
var num1=document.getElementById(num-1).value
var num2=document.getElementById(num).value
document.location.href="categories.php?id=<?php echo $cate; ?>&ori="+num2+"&swap="+num1
}
</script>
<script type="text/javascript">
function comfirms()
  {
  var r=confirm("Warning: Are you sure to delete this category?")
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
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="images">
  <!--DWLayoutTable-->
  <tr>
    <td height="15">&nbsp;</td>
  </tr>
  <tr>
    <td height="234" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="box">
          <!--DWLayoutTable-->
          <tr>
            <td width="798" height="20" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="bar">
              <!--DWLayoutTable-->
              <tr>
                <td width="24" height="20" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      <td width="372" valign="middle" class="Heading_wh">Option Group</td>
                      <td width="402">&nbsp;</td>
                    </tr>
              </table>            </td>
              </tr>
          <tr>
            <td height="42">&nbsp;</td>
              </tr>
          
          <tr>
            <td height="60" valign="top">  
              <?php $i=1; while($r1 && $row1=mysql_fetch_array($r1)){ ?>
              <table width="100%" border="0" cellpadding="0" cellspacing="0" <?php if($i%2==1){ echo "bgcolor='#dbf6f6'"; }?> class="text">
                <!--DWLayoutTable-->
                <input type="hidden" name="<?php echo $i; ?>" value="<?php echo $row1['sort_order']; ?>"  id="<?php echo $i; ?>"/>
                <tr>
                  <td width="23" height="24" valign="middle">
                    <img src="images/preview.gif" width="16" height="16" /></td>
                      <td width="373" valign="middle" class="text"  ><?php echo $row1['products_options_name']; ?></td>
                      <td width="152" valign="middle" class="text"  ><a href="edit_option.php?id=<?php echo $row1['products_options_id']; ?>" target="_self" class="left_nav">Add/Rename Attributes</a></td>
                      <td width="195" valign="middle"  >
                      <a href="assign_option.php?id=<?php echo $row1['products_options_id']; ?>" target="_self" class="left_nav">
                      Assign to Multiple Products</a></td>
                      <td width="55" align="center" valign="middle">
                        <a  href="option_remove.php?id=<?php echo $row1['products_options_id']; ?>" target="_self" class="left_nav" onclick="return comfirms()">
                      Remove</a></td>
                    </tr>
              </table>              
              <?php $i++; }?>		        </td>
          </tr>
          <tr>
            <td height="35">&nbsp;</td>
              </tr>
          <tr>
            <td height="41" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="text">
              <!--DWLayoutTable-->
              <tr>
                <td width="798" height="41" align="center" valign="middle">Add a new Option Group
                <form name="add_opt" action="?content=option" method="post"  enctype="multipart/form-data">
                <input type="hidden" name="chk" value="1" />
                <input type="text" name="opt"  size="50" class="text" />                  <input type="submit" value="add" class="text" /></form></td>
              </tr>
            </table>
            </td>
          </tr>
          <tr>
            <td height="37">&nbsp;</td>
          </tr>
          
          
          
          
          
          
          
          
          
        </table></td>
  </tr>
</table>

