<?php

 require_once('lib/helper.php');
 require_once('lib/library_functions.php');
 require_once('lib/validation.php');
	 
// require_once('helper.php');
$c_name = $_POST['c_name']; 
$c_email = $_POST['c_email'];
$c_phone = $_POST['c_phone'];
$c_subject = $_POST['c_subject'];
$c_message = addslashes($_POST['c_message']);

if(isset($c_email) && $c_email !=""){
	
	$insert = "INSERT INTO contact (c_name, c_email, c_contact , c_subject, c_message ) VALUES ('$c_name', '$c_email', '$c_phone', '$c_subject', '$c_message')";
	$result = $obj->conn->query($insert) or die($obj->conn->error);
	if($result){
	
	// $to = 'info@myloanexpert.in';
	$to = 'akshaym.onerooftech@gmail.com';
	$email_subject = "Regarding : Enquiry from ".$c_name;
	$email_body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge" /><meta name="viewport" content="width=device-width, initial-scale=1.0" /><title></title><style type="text/css">.ReadMsgBody{ width:100%; background-color:#fff} .ExternalClass{ width:100%; background-color:#fff} .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{ line-height:100%} html{ width:100%} body{ -webkit-text-size-adjust:none; -ms-text-size-adjust:none; margin:0; padding:0} table{ border-spacing:0; table-layout:auto; margin:0 auto} img{ display:block !important; overflow:hidden !important} .yshortcuts a{ border-bottom:none !important} img:hover{ opacity:0.9 !important} a{ color:#91c444; text-decoration:none} .textbutton a{ font-family:"open sans", arial, sans-serif !important} .btn-link a{ color:#FFF !important} .details{ font-family:"Open sans", Arial, sans-serif; font-size:15px; padding-top:5px} .details-type{ list-style-type:none; padding:0; font-family:"Open sans", Arial, sans-serif; font-size:15px; line-height:25px} li{ margin:0 !important} .submitted p{ font-family:"Open sans", Arial, sans-serif; font-size:14px; margin:0} .thankyou{ font-family:"Open sans", Arial, sans-serif; color:#3b3b3b; font-size:22px; font-weight:bold} .intro{ font-family:"Open sans", Arial, sans-serif; color:#414a51; font-size:15px; text-align:left; text-align:justify} .marg-0{ margin:0} .queries{ font-family:"Open sans", Arial, sans-serif; color:#333; font-size:14px; line-height:20px} .footer-link{ font-family:"Open sans", Arial, sans-serif; color:#fff; font-size:12px} .copyright{ font-size:13px; text-align:center; margin:0} .c-blue{ color:#2f86c8} @media only screen and (max-width:640px){ body{ margin:0px; width:auto !important; font-family:"Open Sans", Arial, Sans-serif !important} .table-inner{ width:90% !important; max-width:90% !important} .table-full{ width:100% !important; max-width:100% !important; text-align:left !important} .details-type{ font-size:14px !important} .copyright{ font-size:11px !important} .submitted p{ font-size:12px}} @media only screen and (max-width:479px){ body{ width:auto !important; font-family:"Open Sans", Arial, Sans-serif !important} .table-inner{ width:90% !important; text-align:center !important} .table-full{ width:100% !important; max-width:100% !important; text-align:left !important} .details-type{ font-size:14px !important} .copyright{ font-size:10px !important} .submitted p{ font-size:12px} u+.body .full{ width:100% !important; width:100vw !important}} </style></head><body class="body"><table class="full" width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#eceff3"><tr><td align="center"><table width="580" class="table-inner" style="max-width:580px;" align="center" border="0" cellpadding="0" cellspacing="0"><tr><td height="60"></td></tr><tr><td align="center" bgcolor="#fff" style="border-bottom:3px solid #2c81c2; background-position:top; background-size:cover;border-top-left-radius:6px;border-top-right-radius:6px;"><table width="90%" align="center" border="0" cellpadding="0" cellspacing="0"><tr><td height="10"></td></tr><tr><td align="center" style="line-height:0px;"><img src="http://ortlx.com/demo/intonation/new/assets/img/logo/logo.png" alt="Logo" style="display:block; line-height:0px; font-size:0px; border:0px;width:25%" /></td></tr><tr><td height="10"></td></tr></table></td></tr><tr><td height="25" bgcolor="#FFFFFF"></td></tr></table></td></tr></table><table class="full" align="center" bgcolor="#eceff3" width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td align="center"><table width="580" class="table-inner" style="max-width:580px;" align="center" border="0" cellpadding="0" cellspacing="0"><tr><td bgcolor="#FFFFFF" align="center"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"><tr><td class="thankyou" align="center">Thank You For Your Visit</td></tr><tr><td align="center"><table width="50" border="0" cellspacing="0" cellpadding="0"><tr><td height="5" style="border-bottom:3px solid #124672;"></td></tr></table></td></tr><tr><td height="25"></td></tr></table></td></tr></table></td></tr></table><table class="full" align="center" bgcolor="#eceff3" width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td align="center"><table width="580" class="table-inner" style="max-width:580px;" align="center" border="0" cellpadding="0" cellspacing="0"><tr><td bgcolor="#FFFFFF" align="center"><table width="500" class="table-inner" align="center" border="0" cellpadding="0" cellspacing="0"><tr><td><table align="left" class="table-full" width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td class="intro" align="left"><p class="c-blue">Hi, <b>'.$c_name.'</b></p></td></tr><tr><td class="submitted"><p>You have got a new inquiry from the contact section of website. </p></td></tr><tr><td><p class="details">Detail are as follows:</p><ul class="details-type"><li><b>Full Name: </b>'.$c_name.'</li><li><b>Email Address: </b>'.$c_email.'</li><li><b>Contact Number: </b>'.$c_phone.'</li><li><b>Subject: </b>'.$c_subject.'</li><li><b>Message: </b>'.$c_message.'</li></ul></td></tr></table></td></tr></table></td></tr></table></td></tr></table><table class="full" align="center" bgcolor="#eceff3" width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td align="center"><table width="580" class="table-inner" style="max-width:580px;" align="center" border="0" cellpadding="0" cellspacing="0"><tr><td bgcolor="#FFFFFF" align="center"><table width="87%" border="0" align="center" cellpadding="0" cellspacing="0"><tr><td class="queries" align="left"><p class="marg-0">For any further queries, you can get in touch with our support team via. <br><br>Email :<b>intonation-india.com</b><br>Phone :<b>+1 (617) 469-8756</b></p></td></tr><tr><td height="20"></td></tr></table></td></tr></table></td></tr></table><table class="full" width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#eceff3"><tr><td align="center"><table width="580" class="table-inner" style="max-width:580px;" align="center" border="0" cellpadding="0" cellspacing="0"><tr><td height="20" bgcolor="#FFFFFF"></td></tr><tr><td align="center" bgcolor="#333" style="border-bottom-left-radius:6px;border-bottom-right-radius:6px;"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"><tr><td height="5"></td></tr><tr><td height="30" class="footer-link" align="center"><p class="copyright">Intonation Research Laboratories <?php echo date("Y");?>Copyright 2020. All Rights Reserved. </p></td></tr><tr><td height="5"></td></tr></table></td><tr><td height="90"></td></tr></tr><tr style="display:none;"><td align="center"><table align="center" border="0" cellpadding="0" cellspacing="0"><tr><td height="20"></td></tr><tr><td><table border="0" align="center" cellpadding="0" cellspacing="0"><tr><td align="center" style="line-height:0px;"><a href="#"><img style="display:block; line-height:0px; font-size:0px; border:0px;" src="images/fb.png" alt="img" /></a></td><td width="20"></td><td align="center" style="line-height:0px;"><a href="#"><img style="display:block; line-height:0px; font-size:0px; border:0px;" src="images/in.png" alt="img" /></a></td></tr></table></td></tr><tr><td height="20"></td></tr></table></td></tr></table></td></tr></table></body></html>' ;
	
	$headers="From: $c_email \r\n";
	$headers.="Reply-To: $c_email \r\n";
	$headers.="Content-Type: text/html\r\n";
	$headers.="Return-Path: $c_email\r\n";
	$headers.="X-Mailer: PHP \r\n";
	$headers;
	if(mail($to, $email_subject, $email_body, $headers)){
		// $from = 'info@myloanexpert.in';
		$from = "akshaym.onerooftech@gmail.com";
		$email_subject1 = "Thank you";
		$email_body1 = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge" /><meta name="viewport" content="width=device-width, initial-scale=1.0" /><title></title><style type="text/css">.ReadMsgBody{ width:100%; background-color:#fff} .ExternalClass{ width:100%; background-color:#fff} .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{ line-height:100%} html{ width:100%} body{ -webkit-text-size-adjust:none; -ms-text-size-adjust:none; margin:0; padding:0} table{ border-spacing:0; table-layout:auto; margin:0 auto} img{ display:block !important; overflow:hidden !important} .yshortcuts a{ border-bottom:none !important} img:hover{ opacity:0.9 !important} a{ color:#91c444; text-decoration:none} .textbutton a{ font-family:"open sans", arial, sans-serif !important} .btn-link a{ color:#FFF !important} .details{ font-family:"Open sans", Arial, sans-serif; font-size:15px; padding-top:5px} .details-type{ list-style-type:none; padding:0; font-family:"Open sans", Arial, sans-serif; font-size:15px; line-height:25px} li{ margin:0 !important} .submitted p{ font-family:"Open sans", Arial, sans-serif; font-size:14px; margin:0} .thankyou{ font-family:"Open sans", Arial, sans-serif; color:#3b3b3b; font-size:22px; font-weight:bold} .intro{ font-family:"Open sans", Arial, sans-serif; color:#414a51; font-size:15px; text-align:left; text-align:justify} .marg-0{ margin:0} .queries{ font-family:"Open sans", Arial, sans-serif; color:#333; font-size:14px; line-height:20px} .footer-link{ font-family:"Open sans", Arial, sans-serif; color:#fff; font-size:12px} .copyright{ font-size:13px; text-align:center; margin:0} .c-blue{ color:#2f86c8} @media only screen and (max-width:640px){ body{ margin:0px; width:auto !important; font-family:"Open Sans", Arial, Sans-serif !important} .table-inner{ width:90% !important; max-width:90% !important} .table-full{ width:100% !important; max-width:100% !important; text-align:left !important} .details-type{ font-size:14px !important} .copyright{ font-size:11px !important} .submitted p{ font-size:12px}} @media only screen and (max-width:479px){ body{ width:auto !important; font-family:"Open Sans", Arial, Sans-serif !important} .table-inner{ width:90% !important; text-align:center !important} .table-full{ width:100% !important; max-width:100% !important; text-align:left !important} .details-type{ font-size:14px !important} .copyright{ font-size:10px !important} .submitted p{ font-size:12px} u+.body .full{ width:100% !important; width:100vw !important}} </style></head><body class="body"><table class="full" width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#eceff3"><tr><td align="center"><table width="580" class="table-inner" style="max-width:580px;" align="center" border="0" cellpadding="0" cellspacing="0"><tr><td height="60"></td></tr><tr><td align="center" bgcolor="#fff" style="border-bottom:3px solid #2c81c2; background-position:top; background-size:cover;border-top-left-radius:6px;border-top-right-radius:6px;"><table width="90%" align="center" border="0" cellpadding="0" cellspacing="0"><tr><td height="10"></td></tr><tr><td align="center" style="line-height:0px;"><img src="http://ortlx.com/demo/intonation/new/assets/img/logo/logo.png" alt="Logo" style="display:block; line-height:0px; font-size:0px; border:0px;width:25%" /></td></tr><tr><td height="10"></td></tr></table></td></tr><tr><td height="25" bgcolor="#FFFFFF"></td></tr></table></td></tr></table><table class="full" align="center" bgcolor="#eceff3" width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td align="center"><table width="580" class="table-inner" style="max-width:580px;" align="center" border="0" cellpadding="0" cellspacing="0"><tr><td bgcolor="#FFFFFF" align="center"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"><tr><td class="thankyou" align="center">Thank You For Your Visit</td></tr><tr><td align="center"><table width="50" border="0" cellspacing="0" cellpadding="0"><tr><td height="5" style="border-bottom:3px solid #124672;"></td></tr></table></td></tr><tr><td height="25"></td></tr></table></td></tr></table></td></tr></table><table class="full" align="center" bgcolor="#eceff3" width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td align="center"><table width="580" class="table-inner" style="max-width:580px;" align="center" border="0" cellpadding="0" cellspacing="0"><tr><td bgcolor="#FFFFFF" align="center"><table width="500" class="table-inner" align="center" border="0" cellpadding="0" cellspacing="0"><tr><td><table align="left" class="table-full" width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td class="intro" align="left"><p class="c-blue">Hi, <b>'.$c_name.'</b></p></td></tr><tr><td class="submitted"><p>You have got a new inquiry from the contact section of website. </p></td></tr><tr><td><p class="details">Detail are as follows:</p><ul class="details-type"><li><b>Full Name:</b>'.$c_name.'</li><li><b>Email Address: </b>'.$c_email.'</li><li><b>Contact Number </b>'.$c_phone.'</li><li><b>Subject: </b>'.$c_subject.'</li><li><b>Message: </b>'.$c_message.'</li></ul></td></tr></table></td></tr></table></td></tr></table></td></tr></table><table class="full" align="center" bgcolor="#eceff3" width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td align="center"><table width="580" class="table-inner" style="max-width:580px;" align="center" border="0" cellpadding="0" cellspacing="0"><tr><td bgcolor="#FFFFFF" align="center"><table width="87%" border="0" align="center" cellpadding="0" cellspacing="0"><tr><td class="queries" align="left"><p class="marg-0">For any further queries, you can get in touch with our support team via. <br><br>Email :<b>intonation-india.com</b><br>Phone :<b>+1 (617) 469-8756</b></p></td></tr><tr><td height="20"></td></tr></table></td></tr></table></td></tr></table><table class="full" width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#eceff3"><tr><td align="center"><table width="580" class="table-inner" style="max-width:580px;" align="center" border="0" cellpadding="0" cellspacing="0"><tr><td height="20" bgcolor="#FFFFFF"></td></tr><tr><td align="center" bgcolor="#333" style="border-bottom-left-radius:6px;border-bottom-right-radius:6px;"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"><tr><td height="5"></td></tr><tr><td height="30" class="footer-link" align="center"><p class="copyright">Intonation Research Laboratories <?php echo date("Y");?>Copyright 2020. All Rights Reserved. </p></td></tr><tr><td height="5"></td></tr></table></td><tr><td height="90"></td></tr></tr><tr style="display:none;"><td align="center"><table align="center" border="0" cellpadding="0" cellspacing="0"><tr><td height="20"></td></tr><tr><td><table border="0" align="center" cellpadding="0" cellspacing="0"><tr><td align="center" style="line-height:0px;"><a href="#"><img style="display:block; line-height:0px; font-size:0px; border:0px;" src="images/fb.png" alt="img" /></a></td><td width="20"></td><td align="center" style="line-height:0px;"><a href="#"><img style="display:block; line-height:0px; font-size:0px; border:0px;" src="images/in.png" alt="img" /></a></td></tr></table></td></tr><tr><td height="20"></td></tr></table></td></tr></table></td></tr></table></body></html>';
		
			//$email_body .= "Name: ". $name." \r\n" ;
			//$email_body .= "Email: ". $email." \r\n" ;
			//$email_body .= "subject: ". $subject." \r\n" ;
			//$email_body .= "website: ". $website." \r\n" ;
			//$email_body .= "Comment: ". $comment." \r\n" ;
		$headers1="From: $from \r\n";
		$headers1.="Reply-To: $from \r\n";
		$headers1.="Content-Type: text/html\r\n";
		$headers1.="Return-Path: $from\r\n";  
		$headers1.="X-Mailer: PHP \r\n";
		$headers;
		if(mail($c_email, $email_subject1, $email_body1, $headers1)){
			echo 1;
		}
		else{
			echo 2;
		}
	}    
	else{
		echo 3;
	}
	}else{
	    echo 3;
	}
}
else{
	echo 4;
}



?>