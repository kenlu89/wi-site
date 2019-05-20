<?php 
include("includes/config.php");
include("thumbnail.php");
 $parent=$_GET['parent'];
 $id=$_GET['id'];
function randomkeys($length)
  {
   $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
   for($i=0;$i<$length;$i++)
   {
     $key .= $pattern{rand(0,35)};
   }
   return $key;
  }
$image=@mysql_query("select * from images where ids='$id'");

$rows=mysql_fetch_array($image);

$jp=$rows['image'];
$ids=$rows['ids'];
if(file_exists($jp)){
//$jp=$_GET['pic'];
$dates=time() + (24 * 60 * 60).'-'.date('Y-m-d');

$tmp=$jp;
$extention=pathinfo($tmp);
list($width, $height, $type, $w) = getimagesize($tmp);
 $old_h=$height;
 $old_w=$width;
if($height>200){
$p_width=(1-($height-200)/$height);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
}


if (!is_dir("thumbnail/".date("Y"))){
mkdir("thumbnail/".date("Y"), 0700);
mkdir("thumbnail/".date("Y")."/".date("m"), 0700);
}else if(!is_dir("thumbnail/".date("Y")."/".date("m"))){
mkdir("thumbnail/".date("Y")."/".date("m"), 0700);
}
$path="thumbnail/".date("Y")."/".date("m");
$letter=randomkeys(12);
$thumbnail=$path."/$dates$letter.".$extention['extension'];
//createthumb($jp, $path."/".$dates."".$letter.".".$extention['extension'],$width,$height, $old_w, $old_h);
makeIcons_MergeCenter($jp, $path."/".$dates."".$letter.".".$extention['extension'], 200, 200);
@mysql_query("update images set thumbnail='$thumbnail' where ids=".$ids);

}
header("Location: administrator/?content=add_image&id=$parent&msg=1");
?>