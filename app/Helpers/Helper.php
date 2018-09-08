<?php

namespace App\Helpers;

class Helper {
    
    public static function image_resize($target, $newcopy, $w, $h, $ext) {
	list($w_or,$h_or) = getimagesize($target);
	$scale_ratio = $w_or / $h_or;
	if(($w / $h) > $scale_ratio) {
		$w = $h * $scale_ratio;
	} else {
		$h = $h / $scale_ratio;
	}
	$img = "";
	$ext = strtolower($ext);
	if($ext == "gif") {
		$img = imagecreatefromgif($target);
	} else if($ext == "png"){
		$img = imagecreatefrompng($target);
	} else if($ext == "jpg"){
		$img = imagecreatefromjpeg($target);
	}
	$imgtru = imagecreatetruecolor($w,$h);
	imagecopyresampled($imgtru, $img,0,0,0,0,$w,$h,$w_or,$h_or);
	
	if($ext == "gif") {
		imagegif($imgtru, $newcopy, 80);
	} else if($ext == "png"){
		imagepng($imgtru, $newcopy, 80);
	} else if($ext == "jpg"){
		imagejpeg($imgtru, $newcopy, 80);
	}
}
    
}

