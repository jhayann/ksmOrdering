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
    public static function foo()
    {
        echo "works";
    }
public static function sendMsg($msg,$number,$deviceid)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://smsgateway.me/api/v4/message/send",
          CURLOPT_SSL_VERIFYPEER=>false,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "[{\"phone_number\": \"$number\", \"message\": \"$msg\", \"device_id\": $deviceid}]",
          CURLOPT_HTTPHEADER => array(
            "Cache-Control: no-cache",
            "Postman-Token: 0dfb5acc-f0ae-415b-a5d3-ca12a2dfdfd3",
            "authorization: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU0MDI3NDAyMiwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjYzMDEzLCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.6TV41z4Lyg2mzHlN4RA-tPcvBOuilAb0oasHkZXTRdE"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
    }
    
}

