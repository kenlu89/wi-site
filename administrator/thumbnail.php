<?php 
			function createthumb($name,$filename,$new_w,$new_h, $old_w, $old_h){
			$system=explode('.',$name);
			if (preg_match('/jpg|jpeg|JPG|JPEG/',$system[1])){
			$src_img=imagecreatefromjpeg($name);
			}
			if (preg_match('/png/',$system[1])){
			$src_img=imagecreatefrompng($name);
			}				
			  $old_x=imageSX($src_img);
			  $old_y=imageSY($src_img);

			$dst_img=imagecreatetruecolor($new_w,$new_h);
			imagecopyresampled($dst_img,$src_img,0,0,0,0,$new_w,$new_h,$old_x,$old_y); 
			if (preg_match("/png/",$system[1]))
			{
			imagepng($dst_img,$filename); 
			} else {
			imagejpeg($dst_img,$filename); 
			}
			imagedestroy($dst_img); 
			imagedestroy($src_img); 
			}
?>