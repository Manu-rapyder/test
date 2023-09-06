<?php

ini_set("date.timezone", "Asia/Kolkata");


function compress_image($source_url, $destination_url,$quality) 
{ 
	$curr_time = guid();
	$destination_url = trim($destination_url);
	if(is_dir($destination_url) == "")
	{
		mkdir($destination_url,0755,true);
	}
	
	for ($i=0;$i<count($source_url['tmp_name']);$i++)
	{
		if(is_array($source_url['tmp_name'])){
			$s_path = $source_url['tmp_name'][$i];
			$s_name = str_replace(" ", "_",$source_url['name'][$i]);
		}
		else{
			$s_path = $source_url['tmp_name'];
			$s_name = str_replace(" ", "_",$source_url['name']);
		}
		$destination_path=strtolower($destination_url.$curr_time.$s_name);
		$destination_path_file =strtolower($curr_time.$s_name);
		if($source_url['type'] != 'image/jpg' || $source_url['type'] != 'image/jpeg' || $source_url['type'] != 'image/png' || $source_url['type'] != 'image/gif')
		{
		    //$info = getimagesize($source_url['tmp_name'][$i]);
			// Create a new image from file 
	       /* switch($info['mime']){ 
	            case 'image/jpeg': 
	                $image = imagecreatefromjpeg($source_url['tmp_name'][$i]); 
	                break; 
	            case 'image/png': 
	                $image = imagecreatefrompng($source_url['tmp_name'][$i]); 
	                break; 
	            case 'image/gif': 
	                $image = imagecreatefromgif($source_url['tmp_name'][$i]); 
	                break; 
	            default: 
	                $image = imagecreatefromjpeg($source_url['tmp_name'][$i]); 
	        } 
	     */
	        // Save image 
	        //imagejpeg( $image , $destination_path , 75 );
	    
			$document = move_uploaded_file($s_path,$destination_path);
			$link[]=$destination_path_file;
		}
		else
		{
			$info = getimagesize($source_url['tmp_name'][$i]);
			if ($info['mime'] == 'image/jpeg')
			{ 
				$image = imagecreatefromjpeg($s_path); 
				$new_image = imagejpeg($image, $destination_path, $quality);
			}
			elseif ($info['mime'] == 'image/gif') 
			{
				$image = imagecreatefromgif($s_path); 
				$new_image = imagegif($image, $destination_path, $quality);
			}
			elseif ($info['mime'] == 'image/png')
			{ 
				$image = imagecreatefrompng($s_path);
				$new_image = imagepng($image, $destination_path, $quality);
			}
			elseif ($info['mime'] == 'image/jpg')
			{
				$image = imagecreatefromjpeg($s_path); 
				$new_image = imagejpeg($image, $destination_path, $quality);
			}
			else
			{
				$document = move_uploaded_file($s_path,$destination_path);
			} 
			$link[]=$destination_path_file;
		}	
		
		
	}
	return $link; 
}

function compress_image_custom_name($source_url, $destination_url,$quality,$append_custom_name) 
{ 
	$curr_time = guid();
	$destination_url = trim($destination_url);
	if(is_dir($destination_url) == "")
	{
		mkdir($destination_url,0755,true);
	}
	
	for ($i=0;$i<count($source_url['tmp_name']);$i++)
	{
		if(is_array($source_url['tmp_name'])){
			$s_path = $source_url['tmp_name'][$i];
			$ext_name = explode('.',$source_url['name'][$i]);
			$s_name = '.'.end($ext_name);
		}
		else{
			$s_path = $source_url['tmp_name'];
			$ext_name = explode('.',$source_url['name']);
			$s_name = '.'.end($ext_name);
		}
		$destination_path=strtolower($destination_url.$append_custom_name.$curr_time.$s_name);
		if($source_url['type'] != 'image/jpg' || $source_url['type'] != 'image/jpeg' || $source_url['type'] != 'image/png' || $source_url['type'] != 'image/gif')
		{
			$document = move_uploaded_file($s_path,$destination_path);
			$link[]=$destination_path;
		}
		else
		{
			$info = getimagesize($source_url['tmp_name'][$i]);
			if ($info['mime'] == 'image/jpeg')
			{ 
				$image = imagecreatefromjpeg($s_path); 
				$new_image = imagejpeg($image, $destination_path, $quality);
			}
			elseif ($info['mime'] == 'image/gif') 
			{
				$image = imagecreatefromgif($s_path); 
				$new_image = imagegif($image, $destination_path, $quality);
			}
			elseif ($info['mime'] == 'image/png')
			{ 
				$image = imagecreatefrompng($s_path);
				$new_image = imagepng($image, $destination_path, $quality);
			}
			elseif ($info['mime'] == 'image/jpg')
			{
				$image = imagecreatefromjpeg($s_path); 
				$new_image = imagejpeg($image, $destination_path, $quality);
			}
			else
			{
				$document = move_uploaded_file($s_path,$destination_path);
			} 
			$link[]=$destination_path;
		}    
		
		
	}
	return $link; 
}

function pre($data){
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

function pre_exit($data){
	echo "<pre>";
	print_r($data);
	echo "</pre>";
	exit();
}

function convert_number($number) 
{ 
	if (($number < 0) || ($number > 999999999)) 
	{ 
		throw new Exception("Number is out of range");
	} 
	
	$Gn = floor($number / 100000);  /* lacs (mega) */ 
	$number -= $Gn * 100000; 
	$kn = floor($number / 1000);     /* Thousands (kilo) */ 
	$number -= $kn * 1000; 
	$Hn = floor($number / 100);      /* Hundreds (hecto) */ 
	$number -= $Hn * 100; 
	$Dn = floor($number / 10);       /* Tens (deca) */ 
	$n = $number % 10;               /* Ones */ 
	
	$res = ""; 
	
	if ($Gn) 
	{ 
		$res .= convert_number($Gn) . " Lacs"; 
	} 
	
	if ($kn) 
	{ 
		$res .= (empty($res) ? "" : " ") . 
		convert_number($kn) . " Thousand"; 
	} 
	
	if ($Hn) 
	{ 
		$res .= (empty($res) ? "" : " ") . 
		convert_number($Hn) . " Hundred"; 
	} 
	
	$ones = array("", "One", "Two", "Three", "Four", "Five", "Six", 
		"Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", 
		"Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", 
		"Nineteen"); 
	$tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", 
		"Seventy", "Eigthy", "Ninety"); 
	
	if ($Dn || $n) 
	{ 
		if (!empty($res)) 
		{ 
			$res .= " and "; 
		} 
		
		if ($Dn < 2) 
		{ 
			$res .= $ones[$Dn * 10 + $n]; 
		} 
		else 
		{ 
			$res .= $tens[$Dn]; 
			
			if ($n) 
			{ 
				$res .= "-" . $ones[$n]; 
			} 
		} 
	} 
	
	if (empty($res)) 
	{ 
		$res = "zero"; 
	} 
	
	return $res; 
}

	function secondsToTime($seconds) {        // Output : 2 Days 3 Hrs.
		$dtF = new \DateTime('@0');
		$dtT = new \DateTime("@$seconds");
		return $dtF->diff($dtT)->format('%a Days %h Hrs');
	}
	
	
	function guid(){
		if (function_exists('com_create_guid')){
			return com_create_guid();
		}else{
			mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
			$charid = strtoupper(md5(uniqid(rand(), true)));
			$hyphen = chr(45);// "-"
			$uuid = //chr(123)// "{"
			substr($charid, 0, 8).$hyphen
			.substr($charid, 8, 4).$hyphen
			.substr($charid,12, 4).$hyphen
			.substr($charid,16, 4).$hyphen
			.substr($charid,20,12);
			//.chr(125);// "}"
			return $uuid;
		}
	}
	
	
	// use_template = 'yes/no'
	//heading = Your Template heading
	//messagebody = Template Message Body / Normal Email Body 
	//footer = Template Footer (E.g Copyright © 2016 Project Name. All Rights Reserved.)
	// mail_type = 'defaultmail/phpmailer'
	// from_mail = From email id
	// to_mail = To email id
	// subject = Mail Subject
	
	function sendEmail($use_template,$heading,$messagebody,$footer,$mail_type,$from_mail,$to_mail,$subject)
	{
		if($use_template == 'yes')
		{
			$message ='<!DOCTYPE html>
			<html>
			<head>
			<link href="http://ortlx.com/demo/kfpl/css/font-awesome.min.css" rel="stylesheet">
			<title></title>
			</head>
			<body>
			<table width="100%"><tbody><tr><td>
			<table align="center" cellspacing="0" cellpadding="0" style="padding-top:30px;margin-left:auto;margin-right:auto;padding:30px 0;width:100%"><tbody><tr><td style="padding-left:0;padding-right:0">
			<table width="100%"><tbody><tr><td style="padding-left:0;padding-right:0">
			'.$heading.'
			<table width="100%" style="border:2px solid #ddd">
			<tbody>
			'.$messagebody.'		
			<tr>
			<td style="font-family:Helvetica,Arial,sans-serif;padding-bottom:25px;padding-top:10px;text-align:center">
			'.$footer.'
			</td>
			</tr></tbody></table></td>
			</tr></tbody></table></td>
			</tr></tbody></table></td>
			</tr></tbody></table>
			</body>
			</html>';
		}
		else
		{
			$message = $messagebody;
		}
		
		
		if($mail_type == 'defaultmail')
		{
			$from_add = $from_mail;
			$to_add = $to_mail;
			$subject = $subject;
			$headers = "From: $from_add \r\n";
			$headers .= "Reply-To: $from_add \r\n";
			$headers .= "Return-Path: $from_add\r\n";
			$headers .= "X-Mailer: PHP \r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			
			if(mail($to_add,$subject,$message,$headers))
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		else if($mail_type == 'phpmailer')
		{
			require_once '../PHPMailer/class.phpmailer.php';
			
			$mail = new PHPMailer(); // create a new object  
			$mail->IsSMTP(); // enable SMTP
			$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true; // authentication enabled                                       //Comment if using Godaddy
		    //$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail OR SSL         //Comment if using Godaddy 
		    $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail OR SSL
			//$mail->Host = "localhost"; //changed localhost/smtp.gmail.com for using godaddy 
			$mail->Host = "smtp.gmail.com"; //changed localhost/smtp.gmail.com for using godaddy
			//$mail->Port = 25;    //587 tls , 463 ssl , 25 unsecured                                //Comment if using Godaddy 
			$mail->Port = 587;    //587 tls , 463 ssl , 25 unsecured 
			$mail->Host = 'tls://smtp.gmail.com:587';
			$mail->IsHTML(true);
			// $mail->Username = "info@seven-rivers.com";                                       //Comment if using Godaddy
			// $mail->Password = "kflvanity@123";                                               //Comment if using Godaddy 
			
			$mail->Username = "aadesh.onerooftech@gmail.com";
			$mail->Password = "ort1234*"; 
			
			$mail->SetFrom($from_mail);
			$mail->Subject = $subject;
			$mail->Body = $message;
			$mail->AddAddress($to_mail);
			
			if($mail->Send()) 
			{
				return 1;
			} 
			else 
			{
				//echo "Mailer Error: " . $mail->ErrorInfo;
				return 0;
			}
		}
		else if($mail_type == 'phpmailer1')
		{
			require_once 'adminpanel/PHPMailer/class.phpmailer.php';
			
			$mail = new PHPMailer(); // create a new object  
			$mail->IsSMTP(); // enable SMTP
			$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true; // authentication enabled                                       //Comment if using Godaddy
			$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail OR SSL         //Comment if using Godaddy
			$mail->Host = "smtp.gmail.com"; //changed localhost/smtp.gmail.com for using godaddy
			$mail->Port = 587;    //587 tls , 463 ssl , 25 unsecured                                //Comment if using Godaddy
			$mail->IsHTML(true);
			$mail->Username = "upendra.onerooftech@gmail.com";                                      //Comment if using Godaddy
			$mail->Password = "ort_1234*#";                                                        //Comment if using Godaddy
			$mail->ClearAllRecipients( ); // clear all
			$mail->SetFrom($from_mail);
			$mail->Subject = $subject;
			$mail->Body = $message;
			$mail->AddAddress($to_mail);
			
			if($mail->Send()) 
			{
				return 1;
			} 
			else 
			{
				//echo "Mailer Error: " . $mail->ErrorInfo;
				return 0;
			}
		}
	}

	function title($type){
		$str= $_SERVER['REQUEST_URI'];
		$base = basename($str,".php");
		$base = explode("?",$base);
		$base = basename($base[0],".php");
		if($type == "page_title"){
			$base = str_replace("-"," ",$base);
			$base = str_replace("_"," ",$base);
			$base = ucwords($base);
		}
		return $base;
	}
	
	function get_client_ip_server(){
	$ipaddress = '';
	if (array_key_exists('HTTP_CLIENT_IP', $_SERVER))
		$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	else if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER))
		$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	else if (array_key_exists('HTTP_X_FORWARDED', $_SERVER))
		$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	else if (array_key_exists('HTTP_FORWARDED_FOR', $_SERVER))
		$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	else if (array_key_exists('HTTP_FORWARDED', $_SERVER))
		$ipaddress = $_SERVER['HTTP_FORWARDED'];
	else if (array_key_exists('REMOTE_ADDR', $_SERVER))
		$ipaddress = $_SERVER['REMOTE_ADDR'];
	else
		$ipaddress = 'UNKNOWN';

	return $ipaddress;
}

function getBrowser(){
	$u_agent = $_SERVER['HTTP_USER_AGENT']; 
	$bname = 'Unknown';
	$platform = 'Unknown';
	$version= "";

		//First get the platform?
	if (preg_match('/linux/i', $u_agent)) {
		$platform = 'linux';
	}
	elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
		$platform = 'mac';
	}
	elseif (preg_match('/windows|win32/i', $u_agent)) {
		$platform = 'windows';
	}

		// Next get the name of the useragent yes seperately and for good reason
	if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
	{ 
		$bname = 'Internet Explorer'; 
		$ub = "MSIE"; 
	} 
	elseif(preg_match('/Firefox/i',$u_agent)) 
	{ 
		$bname = 'Mozilla Firefox'; 
		$ub = "Firefox"; 
	}
	elseif(preg_match('/OPR/i',$u_agent)) 
	{ 
		$bname = 'Opera'; 
		$ub = "Opera"; 
	} 
	elseif(preg_match('/Chrome/i',$u_agent)) 
	{ 
		$bname = 'Google Chrome'; 
		$ub = "Chrome"; 
	} 
	elseif(preg_match('/Safari/i',$u_agent)) 
	{ 
		$bname = 'Apple Safari'; 
		$ub = "Safari"; 
	} 
	elseif(preg_match('/Netscape/i',$u_agent)) 
	{ 
		$bname = 'Netscape'; 
		$ub = "Netscape"; 
	} 

		// finally get the correct version number
	$known = array('Version', $ub, 'other');
	$pattern = '#(?<browser>' . join('|', $known) .
	')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
	if (!preg_match_all($pattern, $u_agent, $matches)) {
			// we have no matching number just continue
	}

		// see how many we have
	$i = count($matches['browser']);
	if ($i != 1) {
			//we will have two since we are not using 'other' argument yet
			//see if version is before or after the name
		if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
			$version= $matches['version'][0];
		}
		else {
			$version= $matches['version'][1];
		}
	}
	else {
		$version= $matches['version'][0];
	}

		// check if we have a number
	if ($version==null || $version=="") {$version="?";}

	return array(
		'userAgent' => $u_agent,
		'name'      => $bname,
		'version'   => $version,
		'platform'  => $platform,
		'pattern'    => $pattern
	);

}




function compress_image_media($source_url, $destination_url,$quality) 
{ 
	$curr_time = guid();
	$destination_url = trim($destination_url);
	if(is_dir($destination_url) == "")
	{
		mkdir($destination_url,0755,true);
	}
	
	for ($i=0;$i<count($source_url['tmp_name']);$i++)
	{
		if(is_array($source_url['tmp_name'])){
			$s_path = $source_url['tmp_name'][$i];
			$s_name = str_replace(" ", "_",$source_url['name'][$i]);
		}
		else{
			$s_path = $source_url['tmp_name'];
			$s_name = str_replace(" ", "_",$source_url['name']);
		}
		$destination_path=strtolower($destination_url.$curr_time.$s_name);
		$destination_path_file =strtolower($curr_time.$s_name);
		if($source_url['type'] != 'image/jpg' || $source_url['type'] != 'image/jpeg' || $source_url['type'] != 'image/png' || $source_url['type'] != 'image/gif')
		{
		    $info = getimagesize($source_url['tmp_name'][$i]);
		    
		    $width  = $info[0];    // width of the image
            $height = $info[1];    // height of the image
            
            //$new_image = imagecreate(448, 333);
            $new_image = imagecreate(720, 535);
		  //  print_r($info);
		  //  exit();
			// Create a new image from file 
	        switch($info['mime']){ 
	            case 'image/jpeg': 
	                $image = imagecreatefromjpeg($source_url['tmp_name'][$i]); 
	                $image = imagecopyresized($new_image, $image, 0, 0, 0, 0, 448 , 333 , $width, $height);
	                break; 
	            case 'image/png': 
	                $image = imagecreatefrompng($source_url['tmp_name'][$i]); 
	                $image = imagecopyresized($new_image, $image, 0, 0, 0, 0, 448, 333, $width, $height);
	                break; 
	            case 'image/gif': 
	                $image = imagecreatefromgif($source_url['tmp_name'][$i]); 
	                $image = imagecopyresized($new_image, $image, 0, 0, 0, 0, 448, 333, $width, $height);
	                break; 
	            default: 
	                $image = imagecreatefromjpeg($source_url['tmp_name'][$i]); 
	                $image = imagecopyresized($new_image, $image, 0, 0, 0, 0, 448, 333, $width, $height);
	        } 
	     
	        // Save image
	        //file_put_contents($image, file_get_contents($destination_path)); 
	        imagejpeg($image, $destination_path, 75);
	    
			$document = move_uploaded_file($s_path,$destination_path);
			$link[]=$destination_path_file;
		}
		else
		{
			$info = getimagesize($source_url['tmp_name'][$i]);
			if ($info['mime'] == 'image/jpeg')
			{ 
				$image = imagecreatefromjpeg($s_path); 
				$new_image = imagejpeg($image, $destination_path, $quality);
			}
			elseif ($info['mime'] == 'image/gif') 
			{
				$image = imagecreatefromgif($s_path); 
				$new_image = imagegif($image, $destination_path, $quality);
			}
			elseif ($info['mime'] == 'image/png')
			{ 
				$image = imagecreatefrompng($s_path);
				$new_image = imagepng($image, $destination_path, $quality);
			}
			elseif ($info['mime'] == 'image/jpg')
			{
				$image = imagecreatefromjpeg($s_path); 
				$new_image = imagejpeg($image, $destination_path, $quality);
			}
			else
			{
				$document = move_uploaded_file($s_path,$destination_path);
			} 
			$link[]=$destination_path_file;
		}	
		
		
	}
	return $link; 
}

	?>	