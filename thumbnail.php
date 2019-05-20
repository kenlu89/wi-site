<?php 
			function createthumb($name,$filename,$new_w,$new_h, $old_x, $old_y){
			$system=explode('.',$name);
			if (preg_match('/jpg|jpeg|JPG|JPEG/',$system[1])){
			$src_img=imagecreatefromjpeg($name);
			}
			if (preg_match('/png/',$system[1])){
			$src_img=imagecreatefrompng($name);
			}				
			
			$thumb_w=$new_w;
			$thumb_h=$new_h;
			$new_y=number_format(($old_y-$old_x), 0);
		$yy=($thumb_h-$thumb_w);
			$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
			 imagecopyresampled ($dst_img,$src_img,0,$yy,0,$thumb_h,200,200,$old_x,$old_y); 
			if (preg_match("/png/",$system[1]))
			{
			imagepng($dst_img,$filename); 
			} else {
			imagejpeg($dst_img,$filename); 
			}
			imagedestroy($dst_img); 
			imagedestroy($src_img); 
			}
	//=========================		
	
function makeIcons_MergeCenter($src, $dst, $dstx, $dsty){

//$src = original image location
//$dst = destination image location
//$dstx = user defined width of image
//$dsty = user defined height of image

$allowedExtensions = 'jpg jpeg gif png';

$name = explode(".", $src);
$currentExtensions = $name[count($name)-1];
$extensions = explode(" ", $allowedExtensions);

for($i=0; count($extensions)>$i; $i=$i+1){
if($extensions[$i]==$currentExtensions)
{ $extensionOK=1;
$fileExtension=$extensions[$i];
break; }
}

if($extensionOK){

$size = getImageSize($src);
$width = $size[0];
$height = $size[1];

if($width >= $dstx AND $height >= $dsty){

$proportion_X = $width / $dstx;
$proportion_Y = $height / $dsty;

if($proportion_X > $proportion_Y ){
$proportion = $proportion_Y;
}else{
$proportion = $proportion_X ;
}
$target['width'] = $dstx * $proportion;
$target['height'] = $dsty * $proportion;

$original['diagonal_center'] =
round(sqrt(($width*$width)+($height*$height))/2);
$target['diagonal_center'] =
round(sqrt(($target['width']*$target['width'])+
($target['height']*$target['height']))/2);

$crop = round($original['diagonal_center'] - $target['diagonal_center']);

if($proportion_X < $proportion_Y ){
$target['x'] = 0;
$target['y'] = round((($height/2)*$crop)/$target['diagonal_center']);
}else{
$target['x'] =  round((($width/2)*$crop)/$target['diagonal_center']);
$target['y'] = 0;
}

if($fileExtension == "jpg" OR $fileExtension=='jpeg'){
$from = ImageCreateFromJpeg($src);
}elseif ($fileExtension == "gif"){
$from = ImageCreateFromGIF($src);
}elseif ($fileExtension == 'png'){
 $from = imageCreateFromPNG($src);
}

$new = ImageCreateTrueColor ($dstx,$dsty);

imagecopyresampled ($new,  $from,  0, 0, $target['x'],
$target['y'], $dstx, $dsty, $target['width'], $target['height']);

 if($fileExtension == "jpg" OR $fileExtension == 'jpeg'){
imagejpeg($new, $dst, 100);
}elseif ($fileExtension == "gif"){
imagegif($new, $dst);
}elseif ($fileExtension == 'png'){
imagepng($new, $dst);
}
}
}
}

?>