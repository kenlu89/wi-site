<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="jquery.js"></script>
<title>Untitled Document</title>
<style type="text/css">
.intro{
background-color:#996600;
width:300px;
height:400px;
position:relative;
		margin:0;
		padding:0;
		top:100px;
		left:200px;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
  $("button").click(function(){
$("div.contentToChange").css({"background-color":"yellow","font-size":"200%"}); 

  });
});
</script>
</head>

<body>
<div>
<p>sfsdfsdf
</p></div>
<div class="contentToChange">
<p class="firstparagraph">Lorem ipsum <em>dolor</em> sit amet, consectetuer <em>adipiscing</em> elit, sed diam nonummy nibh euismod <em>tincidunt</em> ut laoreet dolore magna aliquam erat <strong>volutpat</strong>. Ut wisi enim ad minim <em>veniam</em>, quis nostrud exerci <strong>tation</strong> ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>

<p class="fifthparagraph">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse <strong>molestie</strong> consequat, vel illum <strong>dolore</strong> eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer <strong>adipiscing</strong> elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
</div>
<button>Add a class to the first p element</button>

<div class="intro">sdlkfs;dfkh</div>
</body>
</html>
