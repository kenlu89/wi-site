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
$image=@mysql_query("select * from pic where image_id='$id'");


$rows=mysql_fetch_array($image);

$jp=$rows['image'];
$ids=$rows['image_id'];
if(file_exists($jp)){
//$jp=$_GET['pic'];
$dates=time() + (24 * 60 * 60).'-'.date('Y-m-d');

$tmp=$jp;
$extention=pathinfo($tmp);
list($width, $height, $type, $w) = getimagesize($tmp);
 $old_h=$height;
 $old_w=$width;
if($width>200){
$p_width=(1-($width-200)/$width);
$width=number_format($width*$p_width, 0);
$height=number_format($height*$p_width, 0);
}

if (!is_dir("thumbnail/".date("Y"))){
mkdir("thumbnail/".date("Y"), 0755);
mkdir("thumbnail/".date("Y")."/".date("m"), 0755);
}else if(!is_dir("thumbnail/".date("Y")."/".date("m"))){
mkdir("thumbnail/".date("Y")."/".date("m"), 0755);
}
$path="thumbnail/".date("Y")."/".date("m");

$letter=randomkeys(12);
$thumbnail=$path."/$dates$letter.".$extention['extension'];
//createthumb($jp, $path."/".$dates."".$letter.".".$extention['extension'],$width,200, $old_w, $old_h);

makeIcons_MergeCenter($jp, $path."/".$dates."".$letter.".".$extention['extension'], 200, 200);

@mysql_query("update pic set thumb='$thumbnail' where image_id=".$id);

}
header("Location: administrator/?content=add_picture&id=".$parent."&msg=1");

?>