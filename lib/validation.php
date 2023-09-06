<?php

class validation {

	private $validate = array();

function validate_image($image, $type){
		if($type == "FILES"){
			$allowed_file_types = array("image/jpeg","image/jpg","image/png");
			$file_name = $image['name'][0];
			$file_type = $image['type'][0];
			$file_error = $image['error'][0];
			$file_size = $image['size'][0];
			$file_image = $image['tmp_name'][0];
			list($width, $height, $image_type) = getimagesize($file_image);
			if( in_array($file_type,$allowed_file_types) && $file_error == 0 && $file_name != "" && is_numeric($width) && is_numeric($height) && ($image_type === 2 || $image_type === 3 ) ){
				if($file_size < 2000000){
					if($height >= 450 && $width >= 880){
						$validate['n'] = 1;
						$validate['msg'] = "Valid File";
					}
					else{
						$validate["n"] = 0;
						$validate["msg"] = "Image width should be at least 880px and height should be at least 450px.";
					}
				}
				else{
					$validate["n"] = 0;
					$validate["msg"] = "File size is greater than 2 MB";
				}
			}
			else{
				$validate["n"] = 0;
				$validate["msg"] = "Invalid File";
			}
		}
		else if($type == "MEDIA"){
			$allowed_file_types = array("image/jpeg","image/jpg","image/png");
			$file_name = $image['name'][0];
			$file_type = $image['type'][0];
			$file_error = $image['error'][0];
			$file_size = $image['size'][0];
			$file_image = $image['tmp_name'][0];
			list($width, $height, $image_type) = getimagesize($file_image);
			if( in_array($file_type,$allowed_file_types) && $file_error == 0 && $file_name != "" && is_numeric($width) && is_numeric($height) && ($image_type === 2 || $image_type === 3 ) ){
				//if($file_size < 2000000){

					//if($height == 333 && $width == 448){
						$validate['n'] = 1;
						$validate['msg'] = "Valid File";
				// 	}
				// 	else{
				// 		$validate["n"] = 0;
				// 		$validate["msg"] = "Image width should be 448px and height should be 333px.";
				// 	}
				// }
				// else{
				// 	$validate["n"] = 0;
				// 	$validate["msg"] = "File size is greater than 2 MB";
				// }
			}
			else{
				$validate["n"] = 0;
				$validate["msg"] = "Invalid File";
			}
		}
		else if($type == "EVENT"){
			$allowed_file_types = array("image/jpeg","image/jpg","image/png");
			$file_name = $image['name'][0];
			$file_type = $image['type'][0];
			$file_error = $image['error'][0];
			$file_size = $image['size'][0];
			$file_image = $image['tmp_name'][0];
			list($width, $height, $image_type) = getimagesize($file_image);
			if( in_array($file_type,$allowed_file_types) && $file_error == 0 && $file_name != "" && is_numeric($width) && is_numeric($height) && ($image_type === 2 || $image_type === 3 ) ){
				if($file_size < 2000000){

					//if($height == 333 && $width == 448){
						$validate['n'] = 1;
						$validate['msg'] = "Valid File";
					// }
					// else{
					// 	$validate["n"] = 0;
					// 	$validate["msg"] = "Image width should be 448px and height should be 333px.";
					// }
				}
				else{
					$validate["n"] = 0;
					$validate["msg"] = "File size is greater than 2 MB";
				}
			}
			else{
				$validate["n"] = 0;
				$validate["msg"] = "Invalid File";
			}
		}
		else if($type == "STRING"){

				// $validate['info'] = $image;
				// list($type, $image) = explode(';', $image);
				// list(, $file_enoceded)      = explode(',', $image);

			$file_decoded = base64_decode($image);
			$info = getimagesizefromstring($file_decoded);
			if($info == false || !is_array($info)){
				$validate["n"] = 0;
				$validate["msg"] = "Invalid File";
			}
			else{
				if(is_numeric($info[0]) && is_numeric($info[1]) && ($info[2] == 2 || $info[2] == 3 )){
						// if($info[1] >= 360 && $info[0]/$info[1] == 2){
					$validate['n'] = 1;
					$validate['msg'] = "Valid File";
					if($info[2] == 2){
						$validate['file_type'] = ".jpeg";
					}
					else{
						$validate['file_type'] = ".png";
					}
						// }
						// else{
						// 	$validate["n"] = 0;
						// 	$validate["msg"] = "Image height should be at least 360px and the height to width ratio should be 1:2";
						// }
				}
				else{
					$validate["n"] = 0;
					$validate["msg"] = "Invalid File";
				}
			}
		}
		else{
			$validate["n"] = 0;
			$validate["msg"] = "Invalid Type";
		}
		return $validate;
	}
	
	function validate_file($image, $type){
		if($type == "FILES"){
		    
			$allowed_file_types = array("application/pdf","application/doc","application/docx", "image/jpeg","image/jpg","image/png","application/msword","application/vnd.openxmlformats-officedocument.wordprocessingml.document");
			$file_name = $image['name'][0];
			$file_type = $image['type'][0];
			$file_error = $image['error'][0];
			$file_size = $image['size'][0];
			$file_image = $image['tmp_name'][0];
			
		//	print_r($file_type);
		//	list($width, $height, $image_type) = getimagesize($file_image);
			if( in_array($file_type,$allowed_file_types) && $file_error == 0 && $file_name != ""   ){
				if($file_size < 5000000){
				    
				        $validate['n'] = 1;
    					$validate['msg'] = "Valid File";
				    
				}
				else{
					$validate["n"] = 0;
					$validate["msg"] = "File size is greater than 5 MB";
				}
			}
			else{
				$validate["n"] = 0;
				$validate["msg"] = "Invalid File cdscds";
			}
		}
		else if($type == "STRING"){

				// $validate['info'] = $image;
				// list($type, $image) = explode(';', $image);
				// list(, $file_enoceded)      = explode(',', $image);

			$file_decoded = base64_decode($image);
			$info = getimagesizefromstring($file_decoded);
			if($info == false || !is_array($info)){
				$validate["n"] = 0;
				$validate["msg"] = "Invalid File";
			}
			else{
				if(is_numeric($info[0]) && is_numeric($info[1]) && ($info[2] == 2 || $info[2] == 3 )){
						// if($info[1] >= 360 && $info[0]/$info[1] == 2){
					$validate['n'] = 1;
					$validate['msg'] = "Valid File";
					if($info[2] == 2){
						$validate['file_type'] = ".jpeg";
					}
					else{
						$validate['file_type'] = ".png";
					}
						// }
						// else{
						// 	$validate["n"] = 0;
						// 	$validate["msg"] = "Image height should be at least 360px and the height to width ratio should be 1:2";
						// }
				}
				else{
					$validate["n"] = 0;
					$validate["msg"] = "Invalid File";
				}
			}
		}
		else{
			$validate["n"] = 0;
			$validate["msg"] = "Invalid Type";
		}
		return $validate;
	}
	
	function validate_product_image($image, $type){
		if($type == "FILES"){
			$allowed_file_types = array("image/jpeg","image/jpg","image/png");
			$file_name = $image['name'][0];
			$file_type = $image['type'][0];
			$file_error = $image['error'][0];
			$file_size = $image['size'][0];
			$file_image = $image['tmp_name'][0];
			list($width, $height, $image_type) = getimagesize($file_image);
			if( in_array($file_type,$allowed_file_types) && $file_error == 0 && $file_name != "" && is_numeric($width) && is_numeric($height) && ($image_type === 2 || $image_type === 3 ) ){
				if($file_size < 2000000){
					if($height != 400 && $width != 400){
						$validate['n'] = 1;
						$validate['msg'] = "Valid File";
					}
					else{
						$validate["n"] = 0;
						$validate["msg"] = "Image width should be 400px and height should be 400px.";
					}
				}
				else{
					$validate["n"] = 0;
					$validate["msg"] = "File size is greater than 2 MB";
				}
			}
			else{
				$validate["n"] = 0;
				$validate["msg"] = "Invalid File";
			}
		}
		else{
			$validate["n"] = 0;
			$validate["msg"] = "Invalid Type";
		}
		return $validate;
	}
	
		function validate_banner_image($image, $type){
		if($type == "DESKTOP"){
			$allowed_file_types = array("image/jpeg","image/jpg","image/png");
			$file_name = $image['name'][0];
			$file_type = $image['type'][0];
			$file_error = $image['error'][0];
			$file_size = $image['size'][0];
			$file_image = $image['tmp_name'][0];
			list($width, $height, $image_type) = getimagesize($file_image);
			//echo "Weight-".$width."  height".$height; exit;
			if( in_array($file_type,$allowed_file_types) && $file_error == 0 && $file_name != "" && is_numeric($width) && is_numeric($height) && ($image_type === 2 || $image_type === 3 ) ){
				if($file_size < 2000000){
					if($height == 1080 && $width == 1920){
						$validate['n'] = 1;
						$validate['msg'] = "Valid File";
					}
					else{
						$validate["n"] = 0;
						$validate["msg"] = "Image width should be  1920px and height should be 1080px.";
					}
				}
				else{
					$validate["n"] = 0;
					$validate["msg"] = "File size is greater than 2 MB";
				}
			}
			else{
				$validate["n"] = 0;
				$validate["msg"] = "Invalid File";
			}
		}
		else if($type == "MOBILE"){
			$allowed_file_types = array("image/jpeg","image/jpg","image/png");
			$file_name = $image['name'][0];
			$file_type = $image['type'][0];
			$file_error = $image['error'][0];
			$file_size = $image['size'][0];
			$file_image = $image['tmp_name'][0];
			list($width, $height, $image_type) = getimagesize($file_image);
			//echo "Weight-".$width."  height".$height; exit;
			if( in_array($file_type,$allowed_file_types) && $file_error == 0 && $file_name != "" && is_numeric($width) && is_numeric($height) && ($image_type === 2 || $image_type === 3 ) ){
				if($file_size < 2000000){
					if($height == 1280 && $width == 720){
						$validate['n'] = 1;
						$validate['msg'] = "Valid File";
					}
					else{
						$validate["n"] = 0;
						$validate["msg"] = "Image width should be  720px and height should be 1280px.";
					}
				}
				else{
					$validate["n"] = 0;
					$validate["msg"] = "File size is greater than 2 MB";
				}
			}
			else{
				$validate["n"] = 0;
				$validate["msg"] = "Invalid File";
			}
		}
		else{
			$validate["n"] = 0;
			$validate["msg"] = "Invalid Type";
		}
		return $validate;
	}
	
}
$obj_validate = new validation();

?>