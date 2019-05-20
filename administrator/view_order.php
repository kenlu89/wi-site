<?php
$oid=$_GET['id'];

$view=@mysql_query("select * from orders where orders_id='$oid'");

$rows=mysql_fetch_array($view);


?>
<script type="text/javascript">

			function orders( )
			{
				var or_id =document.getElementById("sorts").value;				
				document.location.href = '?content=orders&id='+or_id+'&ids=1';
			}
			
			function Go( )
			{
			 var oid=document.getElementById("order_id").value;	
			 document.location.href='?content=orders&id='+oid;
			}

</script>
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
  function popCheck(url) {
	newwindow=window.open(url,'name','height=800,width=272,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no');
	if (window.focus) {newwindow.focus()}
	return false;
}
</script>
<link   href="style_sheet.css" type="text/css"  rel="stylesheet" />
<style type="text/css">
<!--
.style1 {
	font-size: 14px;
	color: #ffffff;
	font-weight: bold;
}
a {
	font-size: 14px;
	color: #006600;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #006600;
}
a:hover {
	text-decoration: none;
	color: #00CC00;
}
a:active {
	text-decoration: none;
	color: #006600;
}
.style3 {color: #006600}
-->
</style>
<table width="800" border="0" cellpadding="0" cellspacing="0" align="center">
  <!--DWLayoutTable-->
  <tr>
    <td width="800" height="196">&nbsp;</td>
  </tr>
</table>

