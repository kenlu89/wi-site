<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo LANG; ?>" />
<title><?php echo TITLES;  ?></title>
<link   href="style_sheet.css" type="text/css"  rel="stylesheet" />

</head>

<body>
<table width="798" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable--><form name="login" action="shift_pro" method="post" enctype="multipart/form-data">
  <tr>
    <td height="81" colspan="12" valign="top" class="left"><?PHP include("top.php"); ?></td>
  </tr>
  <tr>
    <td height="16" colspan="9" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td width="51"></td>
    <td width="119"></td>
    <td width="33"></td>
  </tr>
  <tr>
    <td width="27" height="20">&nbsp;</td>
    <td width="74">&nbsp;</td>
    <td width="25">&nbsp;</td>
    <td width="47">&nbsp;</td>
    <td width="104">&nbsp;</td>
    <td width="74">&nbsp;</td>
    <td width="45">&nbsp;</td>
    <td width="146">&nbsp;</td>
    <td width="53">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="3" valign="middle">Employee's Last Name: </td>
    <td colspan="3" valign="middle"><input name="lname" type="text" class="text" id="lname" size="35"  /></td>
    <td valign="middle">Employee's First Name: </td>
    <td colspan="3" valign="middle"><input name="fname" type="text" class="text" id="fname" size="35"  /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="3" valign="middle">Employee's Gender: </td>
    <td colspan="3" valign="middle">Male<input type="radio" name="gender" value="m"  class="text"/>&nbsp; Female<input  type="radio" name="gender" value="f"  class="text"/></td>
    <td valign="middle">Employee's Birth</td>
    <td colspan="3" valign="middle"><input name="fname2" type="text" class="text" id="fname2" size="20"  />
      mm/dd/yyyy</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="3" valign="middle">Employee's Address:</td>
    <td colspan="7" valign="middle"><input type="text" class="text" name="address"  size="60" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td valign="middle">City:</td>
    <td colspan="3" valign="middle"><input name="city" type="text" class="text" id="city" size="20"  /></td>
    <td valign="middle">State:</td>
    <td colspan="2" valign="middle"><?php include("state.php");?></td>
    <td colspan="2" valign="middle">Zip Code:</td>
    <td valign="middle"><input name="zip" type="text" class="text" id="zip" size="10"  /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td colspan="4" valign="bottom" class="red_italic">Please Scan a bar code to the blank below</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="3" valign="middle">Employee's ID#:</td>
    <td colspan="3" valign="middle"><input name="ids" type="text" class="text" id="ids" size="35"  /></td>
    <td valign="middle">Employee's Barcode:</td>
    <td colspan="3" valign="middle"><input name="barcode" type="text" class="text" id="barcode" size="35"  /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="3" valign="middle">Employee's Position:</td>
    <td colspan="3" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td valign="middle">Employee's Wage:</td>
    <td colspan="3" valign="middle"><input name="wage" type="text" class="text" id="wage" size="35"  /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="33">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td colspan="2" valign="top"><input type="submit" value="Submit" class="text" /></td>
    <td colspan="2" valign="top"><input type="reset" value="reset" class="text" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="201">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="40" colspan="12" align="center" valign="top" class="text"><?php include("bottom.php");  ?></td>
  </tr>
  
  
  
  

  
  </form>
</table>
</body>
</html>
