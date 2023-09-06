<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

error_reporting(E_ALL);
ini_set('display_errors', '1');
$files = array();
$file_name = array();
//var_dump($_POST);



if(isset($_FILES['cr_upload']) && $_FILES['cr_upload']['name'][0] !='')
{
	$cr_upload=$_FILES['cr_upload'];
	$file_path = $_FILES['cr_upload']['tmp_name'][0];
	$file_name_text = $_FILES['cr_upload']['name'][0];
	
	array_push($files,$file_path);
	array_push($file_name,$file_name_text);

	 require_once('lib/helper.php');
	 require_once('lib/library_functions.php');
	 require_once('lib/validation.php');

	if ($_POST['type'] == "careersform") {
	    // $id = '';
	    // if( isset($_POST['id']) ){
	    //     $id = $obj->data_filter(base64_decode(base64_decode(base64_decode(base64_decode($_POST['id'])))));   
	    // }

	    
		$name = $obj->data_filter($_POST['cr_name']);
		$email = $obj->data_filter($_POST['cr_email']);
		$contact = $obj->data_filter($_POST['cr_phone']);

		$city = $obj->data_filter($_POST['cr_city']);
		$edu = $obj->data_filter($_POST['cr_edu']);
		$dept = $obj->data_filter($_POST['cr_dept']);

	    
		// $cr_message = $obj->data_textArea_filter($_POST['cr_message']);
		// $exists = array();
		// array_push($exists, 1, $email,$job_title);
		// $param = "sss";
		// $where_append = "";
		// if ($id != '') {
		// 	array_push($exists, $id);
		// 	$param .= "i";
		// 	$where_append = " AND id!=?";
		// }
		// $check_blog = $obj->select_prepare("*","job_application","status=? AND email=? AND job_title=? $where_append","$param",$exists);

		if(isset($_FILES['cr_upload'])){
			$resume1 = $_FILES['cr_upload'];
			$resume1_name = $_FILES['cr_upload']['name'];

			$validate_img = $obj_validate->validate_file($_FILES['cr_upload'], "FILES");
		}
        
// 		if (is_array($check_blog)) {
// 		    echo $response['n'] = 3;exit;
// 			$response['msg'] = "Already Applied";
// 			$response['type'] = "name";
// 		}
// 		else 

		if (isset($_FILES['cr_upload']) && $validate_img['n'] == 0) {
			$response['n'] = 3;
			$response['msg'] = $validate_img['msg'];
			$response['type'] = "resume";
		}
		else{

			
				$insert_field = "";
				$insert_value = "";

				if(isset($_FILES['cr_upload']) && $validate_img['n'] == 1){

					$destination_url = 'careers/'; 
					$resume_upload_arr = compress_image($_FILES['cr_upload'], $destination_url,100); 
					$resume_upload = addslashes($resume_upload_arr[0]);
					$insert_field.= ",resume";
					$insert_value.= ",'$resume_upload'";
				}
				

				

			$insert = "INSERT INTO join_team (name, email, contact, city, education, dept $insert_field) VALUES ('$name', '$email', '$contact', '$city', '$edu', '$dept' $insert_value)";
				$result = $obj->conn->query($insert) or die($obj->conn->error);
				if($result){
					// echo 2;
					$response['n'] = 2;
					$response['msg'] = "success";
				//	$response['description'] = $blog_description;
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $obj->conn->error;
				}
			

		}

	}
	
	if($response['n'] == 2){ 


        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        // require_once 'PHPMailer/PHPMailer.php';
        // require_once 'PHPMailer/SMTP.php';
        // require_once 'PHPMailer/Exception.php';
	    
	    //admin mail
    	//$to = "mktg@anchrom.in";
    	//$to = "admin@anchrom.in";
    	$to="siddharthnaik77@gmail.com";
    	$from = $email;
    	$subject = 'Career Mail Received from '.$name; 
    	
    	$adminmessage = '<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <style type="text/css">
        .ReadMsgBody {
            width: 100%;
            background-color: #fff
        }

        .ExternalClass {
            width: 100%;
            background-color: #fff
        }

        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 100%
        }

        html {
            width: 100%
        }

        body {
            -webkit-text-size-adjust: none;
            -ms-text-size-adjust: none;
            margin: 0;
            padding: 0
        }

        table {
            border-spacing: 0;
            table-layout: auto;
            margin: 0 auto
        }

        img {
            display: block !important;
            overflow: hidden !important
        }

        .yshortcuts a {
            border-bottom: none !important
        }

        img:hover {
            opacity: 0.9 !important
        }

        .textbutton a {
            font-family: "open sans", arial, sans-serif !important
        }

        .btn-link a {
            color: #FFF !important
        }

        .details {
            font-family: "Open sans", Arial, sans-serif;
            font-size: 15px;
            padding-top: 5px
        }

        .details-type {
            list-style-type: none;
            padding: 0;
            font-family: "Open sans", Arial, sans-serif;
            font-size: 15px;
            line-height: 25px
        }

        li {
            margin: 0 !important
        }

        .submitted p {
            font-family: "Open sans", Arial, sans-serif;
            font-size: 14px;
            margin: 0
        }

        .thankyou {
            font-family: "Open sans", Arial, sans-serif;
            color: #3b3b3b;
            font-size: 22px;
            font-weight: bold
        }

        .intro {
            font-family: "Open sans", Arial, sans-serif;
            color: #414a51;
            font-size: 15px;
            text-align: left;
            text-align: justify
        }

        .marg-0 {
            margin: 0
        }

        .queries {
            font-family: "Open sans", Arial, sans-serif;
            color: #333;
            font-size: 14px;
            line-height: 20px
        }

        .footer-link {
            font-family: "Open sans", Arial, sans-serif;
            color: #fff;
            font-size: 12px
        }

        .copyright {
            font-size: 13px;
            text-align: center;
            margin: 0
        }

        .c-blue {
            color: #2f86c8
        }

        @media only screen and (max-width:640px) {
            body {
                margin: 0px;
                width: auto !important;
                font-family: "Open Sans", Arial, Sans-serif !important
            }

            .table-inner {
                width: 90% !important;
                max-width: 90% !important
            }

            .table-full {
                width: 100% !important;
                max-width: 100% !important;
                text-align: left !important
            }

            .details-type {
                font-size: 14px !important
            }

            .copyright {
                font-size: 11px !important
            }

            .submitted p {
                font-size: 12px
            }
        }

        @media only screen and (max-width:479px) {
            body {
                width: auto !important;
                font-family: "Open Sans", Arial, Sans-serif !important
            }

            .table-inner {
                width: 90% !important;
                text-align: center !important
            }

            .table-full {
                width: 100% !important;
                max-width: 100% !important;
                text-align: left !important
            }

            .details-type {
                font-size: 14px !important
            }

            .copyright {
                font-size: 10px !important
            }

            .submitted p {
                font-size: 12px
            }

            u+.body .full {
                width: 100% !important;
                width: 100vw !important
            }
        }
    </style>
</head>

<body class="body">
    <table class="full" width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#eceff3">
        <tr>
            <td align="center">
                <table width="580" class="table-inner" style="max-width:580px;" align="center" border="0"
                    cellpadding="0" cellspacing="0">
                    <tr>
                        <td height="120"></td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#fff"
                            style="border-bottom:3px solid #2c81c2; background-position:top; background-size:cover;border-top-left-radius:6px;border-top-right-radius:6px;">
                            <table width="90%" align="center" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td align="center" style="line-height:0px;"><img
                                            src="http://www.intotech.net/assets/img/logo/logo.png" alt="Logo"
                                            style="display:block; line-height:0px; font-size:0px; border:0px;width:25%" />
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="25" bgcolor="#FFFFFF"></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table class="full" align="center" bgcolor="#eceff3" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center">
                <table width="580" class="table-inner" style="max-width:580px;" align="center" border="0"
                    cellpadding="0" cellspacing="0">
                    <tr>
                        <td bgcolor="#FFFFFF" align="center">
                            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <!-- <td class="thankyou" align="center">Thank You For Your Applying With Us</td> -->
                                    <td class="thankyou" align="center">Application For Employement</td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table width="50" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td height="5" style="border-bottom:3px solid #124672;"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="25"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table class="full" align="center" bgcolor="#eceff3" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center">
                <table width="580" class="table-inner" style="max-width:580px;" align="center" border="0"
                    cellpadding="0" cellspacing="0">
                    <tr>
                        <td bgcolor="#FFFFFF" align="center">
                            <table width="500" class="table-inner" align="center" border="0" cellpadding="0"
                                cellspacing="0">
                                <tr>
                                    <td>
                                        <table align="left" class="table-full" width="100%" border="0" cellspacing="0"
                                            cellpadding="0">
                                            <tr>
                                                <td class="intro" align="left">
                                                    <p class="c-blue" style="text-transform: capitalize;">Dear, 
                                                        <b>Admin</b></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="submitted">
                                                    <p>You have a new application through the join our team page of the
                                                        website.
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="details">Detail are as follows:</p>
                                                    <ul class="details-type">
                                                        <li><b>Full Name: </b>'.$name.'</li>
                                                        <li><b>Contact Number: </b>'.$contact.'</li>
                                                        <li><b>Email Address: </b>'.$email.'</li>
                                                        <li><b>City: </b>'.$city.'</li>
                                                        <li><b>Education: </b>'.$edu.'</li>
                                                        <li><b>Department: </b>'.$dept.'</li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table class="full" width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#eceff3">
        <tr>
            <td align="center">
                <table width="580" class="table-inner" style="max-width:580px;" align="center" border="0"
                    cellpadding="0" cellspacing="0">
                    <tr>
                        <td height="20" bgcolor="#FFFFFF"></td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#333"
                            style="border-bottom-left-radius:6px;border-bottom-right-radius:6px;">
                            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td height="5"></td>
                                </tr>
                                <tr>
                                    <td height="30" class="footer-link" align="center">
                                        <p class="copyright">Intonation Research Laboratories
                                            <?php echo date("Y");?>Copyright 2020. All Rights Reserved. </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="5"></td>
                                </tr>
                            </table>
                        </td>
                    <tr>
                        <td height="90"></td>
                    </tr>
        </tr>
        <tr style="display:none;">
            <td align="center">
                <table align="center" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td height="20"></td>
                    </tr>
                    <tr>
                        <td>
                            <table border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center" style="line-height:0px;"><a href="#"><img
                                                style="display:block; line-height:0px; font-size:0px; border:0px;"
                                                src="images/fb.png" alt="img" /></a></td>
                                    <td width="20"></td>
                                    <td align="center" style="line-height:0px;"><a href="#"><img
                                                style="display:block; line-height:0px; font-size:0px; border:0px;"
                                                src="images/in.png" alt="img" /></a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="20"></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    </td>
    </tr>
    </table>
</body>

</html>';
    	
    	
    
        
	    $message = "";
    			
  		$message .= $adminmessage;
      	
      
      $heading = '';
      $footer = '';
      $mail_type = 'phpmailer'; 
      $use_template = 'no';

      try {
        //Server settings
        //$mail = new PHPMailer\PHPMailer\PHPMailer(); // create a new object
        $mail = new PHPMailer(true);
        
        $mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
        //$mail->IsSMTP(); // enable SMTP
        //$mail->SMTPAuth = true; // authentication enabled                                       //Comment if using Godaddy
        //$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail OR SSL         //Comment if using Godaddy
        $mail->Host = "smtp.gmail.com"; //changed localhost/smtp.gmail.com for using godaddy
        //$mail->Port = 587;    //587 tls , 465 ssl , 25 unsecured //Comment if using Godaddy 
        $mail->Port = 25;    //587 tls , 465 ssl , 25 unsecured
        //$mail->Host = 'tls://smtp.gmail.com:25'; 
        $mail->IsHTML(true);
        
        //$mail->Username = "upendra.onerooftech@gmail.com"; //Comment if using Godaddy 
        //$mail->Password = "ort_1234*#"; //Comment if using Godaddy 
        
        //$mail->Username = "aadesh.onerooftech@gmail.com";
        //$mail->Password = "ort1234*";  
        
        $mail->Username = "siddharthnaik77@gmail.com";
	    $mail->Password = "Xpro@siddharth!2b";

        $mail->ClearAllRecipients( ); // clear all
        $mail->SetFrom($from);
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        $mail->addAttachment('careers/'.$resume_upload);         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AddAddress($to);
        /*
        $multi_mail = array();
        $multi_mail = explode(',', $to);
        if (count($multi_mail) > 1) {
          foreach ($multi_mail as $email) {
            $mail->AddAddress($email);
          }
        }
        else{
          $mail->AddAddress($to);
        }
        */
        
        if($mail->Send()) 
        {
          //echo "success"; 
          $flag = 1;
        } 
        else 
        {
          //echo "Mailer Error: " . $mail->ErrorInfo; 
          $flag = 2;
        }
      }
      catch (Exception $e) {
        //echo 'Mail Not Sent '.$e; 
        $flag = 3;
      }
    	
     
    	//applicant email
     	$appto = $email;
     	$appfrom = "siddharthnaik77@gmail.com";
    	
    // 	$appsubject = 'Thank you for your email'; 
        $mail_name = "Hello $name,";
     	//$appmessage1 = "Hello ".$name.",\n\n </br> Thanks for taking the time to apply for our position. We appreciate your interest in Anchrom. \n\n We're currently in the process of taking applications for this position. If you are selected for our interview process, our human resources department will get in touch with you. \n\n Thank you,";
     	
     	$appmsg1 = "Thanks for taking the time to apply for our position. We appreciate your interest in Intonation Research Laboratories. \n\n We're currently in the process of taking applications for this position. If you are selected for our interview process, our human resources department will get in touch with you. \r\n <br>Thank you,\r\n <br> Team Intonation Research Laboratories";
       // $appmessage1 = '<div style="width: 60%;margin: 5% auto;height: auto;box-shadow: 0 0 2px #aaa;background: #e9e9e9;"><div style="width: 100%;"><div class="row"><div ><p style="padding: 0px 10px 0px 20px; margin-bottom: 0px;font-size: 15px;"> '.$appmsg1.'</p><br/></div></div><br/><div class="row" style="background: #860404; color: #fff;"><div class="col-md-12"><p style="padding: 0px 10px 0px 20px; margin-bottom: 0px; font-size: 15px;text-align: center;">Anchrom &copy; 2020, All Rights Reserved.</p></div></div></div></div>' ;
         			
    	$appsubject = "Intonation Research Laboratories Thank you for Joining Us";
        $appmessage = '<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <style type="text/css">
        .ReadMsgBody {
            width: 100%;
            background-color: #fff
        }

        .ExternalClass {
            width: 100%;
            background-color: #fff
        }

        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 100%
        }

        html {
            width: 100%
        }

        body {
            -webkit-text-size-adjust: none;
            -ms-text-size-adjust: none;
            margin: 0;
            padding: 0
        }

        table {
            border-spacing: 0;
            table-layout: auto;
            margin: 0 auto
        }

        img {
            display: block !important;
            overflow: hidden !important
        }

        .yshortcuts a {
            border-bottom: none !important
        }

        img:hover {
            opacity: 0.9 !important
        }

        .textbutton a {
            font-family: "open sans", arial, sans-serif !important
        }

        .btn-link a {
            color: #FFF !important
        }

        .details {
            font-family: "Open sans", Arial, sans-serif;
            font-size: 14px;
            padding-top: 5px;
            margin-top: 0;
            margin-bottom: 30px;
            line-height: 23px;
        }

        .details-type {
            list-style-type: none;
            padding: 0;
            font-family: "Open sans", Arial, sans-serif;
            font-size: 15px;
            line-height: 25px
        }

        li {
            margin: 0 !important
        }

        .submitted p {
            font-family: "Open sans", Arial, sans-serif;
            font-size: 14px;
            margin: 0
        }

        .thankyou {
            font-family: "Open sans", Arial, sans-serif;
            color: #3b3b3b;
            font-size: 22px;
            font-weight: bold
        }

        .intro {
            font-family: "Open sans", Arial, sans-serif;
            color: #414a51;
            font-size: 15px;
            text-align: left;
            text-align: justify
        }

        .marg-0 {
            margin: 0
        }

        .queries {
            font-family: "Open sans", Arial, sans-serif;
            color: #333;
            font-size: 14px;
            line-height: 20px
        }

        .footer-link {
            font-family: "Open sans", Arial, sans-serif;
            color: #fff;
            font-size: 12px
        }

        .copyright {
            font-size: 13px;
            text-align: center;
            margin: 0
        }

        .c-blue {
            color: #2f86c8
        }

        @media only screen and (max-width:640px) {
            body {
                margin: 0px;
                width: auto !important;
                font-family: "Open Sans", Arial, Sans-serif !important
            }

            .table-inner {
                width: 90% !important;
                max-width: 90% !important
            }

            .table-full {
                width: 100% !important;
                max-width: 100% !important;
                text-align: left !important
            }

            .details-type {
                font-size: 14px !important
            }

            .copyright {
                font-size: 11px !important
            }

            .submitted p {
                font-size: 12px
            }
        }

        @media only screen and (max-width:479px) {
            body {
                width: auto !important;
                font-family: "Open Sans", Arial, Sans-serif !important
            }

            .table-inner {
                width: 90% !important;
                text-align: center !important
            }

            .table-full {
                width: 100% !important;
                max-width: 100% !important;
                text-align: left !important
            }

            .details-type {
                font-size: 14px !important
            }

            .copyright {
                font-size: 10px !important
            }

            .submitted p {
                font-size: 12px
            }

            u+.body .full {
                width: 100% !important;
                width: 100vw !important
            }
        }
    </style>
</head>

<body class="body">
    <table class="full" width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#eceff3">
        <tr>
            <td align="center">
                <table width="580" class="table-inner" style="max-width:580px;" align="center" border="0"
                    cellpadding="0" cellspacing="0">
                    <tr>
                        <td height="150"></td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#fff"
                            style="border-bottom:3px solid #2c81c2; background-position:top; background-size:cover;border-top-left-radius:6px;border-top-right-radius:6px;">
                            <table width="90%" align="center" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td align="center" style="line-height:0px;"><img
                                            src="http://www.intotech.net/assets/img/logo/logo.png" alt="Logo"
                                            style="display:block; line-height:0px; font-size:0px; border:0px;width:25%" />
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="25" bgcolor="#FFFFFF"></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table class="full" align="center" bgcolor="#eceff3" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center">
                <table width="580" class="table-inner" style="max-width:580px;" align="center" border="0"
                    cellpadding="0" cellspacing="0">
                    <tr>
                        <td bgcolor="#FFFFFF" align="center">
                            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="thankyou" align="center">Thank You For Your Applying With Us</td>
                                    <!-- <td class="thankyou" align="center">Careers</td> -->
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table width="50" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td height="5" style="border-bottom:3px solid #124672;"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="25"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table class="full" align="center" bgcolor="#eceff3" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center">
                <table width="580" class="table-inner" style="max-width:580px;" align="center" border="0"
                    cellpadding="0" cellspacing="0">
                    <tr>
                        <td bgcolor="#FFFFFF" align="center">
                            <table width="500" class="table-inner" align="center" border="0" cellpadding="0"
                                cellspacing="0">
                                <tr>
                                    <td>
                                        <table align="left" class="table-full" width="100%" border="0" cellspacing="0"
                                            cellpadding="0">
                                            <tr>
                                                <td class="intro" align="left">
                                                    <p class="c-blue" style="text-transform: capitalize;">Hi,
                                                        <b>'.$name.'</b></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="details">Thanks for taking the time to apply for our
                                                        position. We appreciate your interest in Intonation Research
                                                        Laboratories. We\'re currently in the process of taking
                                                        applications for this position. If you are selected for our
                                                        interview process, our human resources department will get in
                                                        touch with you.
                                                        <br><br>
                                                        Thank you,
                                                        <br>
                                                        Team Intonation Research Laboratories
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table class="full" width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#eceff3">
        <tr>
            <td align="center">
                <table width="580" class="table-inner" style="max-width:580px;" align="center" border="0"
                    cellpadding="0" cellspacing="0">
                    <tr>
                        <td height="20" bgcolor="#FFFFFF"></td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#333"
                            style="border-bottom-left-radius:6px;border-bottom-right-radius:6px;">
                            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td height="5"></td>
                                </tr>
                                <tr>
                                    <td height="30" class="footer-link" align="center">
                                        <p class="copyright">Intonation Research Laboratories
                                            <?php echo date("Y");?>Copyright 2020. All Rights Reserved. </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="5"></td>
                                </tr>
                            </table>
                        </td>
                    <tr>
                        <td height="170"></td>
                    </tr>
        </tr>
        <tr style="display:none;">
            <td align="center">
                <table align="center" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td height="20"></td>
                    </tr>
                    <tr>
                        <td>
                            <table border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center" style="line-height:0px;"><a href="#"><img
                                                style="display:block; line-height:0px; font-size:0px; border:0px;"
                                                src="images/fb.png" alt="img" /></a></td>
                                    <td width="20"></td>
                                    <td align="center" style="line-height:0px;"><a href="#"><img
                                                style="display:block; line-height:0px; font-size:0px; border:0px;"
                                                src="images/in.png" alt="img" /></a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="20"></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    </td>
    </tr>
    </table>
</body>

</html>' ;
        
        
        try {
            //Server settings
            //$tmail = new PHPMailer\PHPMailer\PHPMailer(); // create a new object     
            $tmail = new PHPMailer(true);
            
            $tmail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
            //$tmail->IsSMTP(); // enable SMTP
            //$tmail->SMTPAuth = true; // authentication enabled                                       //Comment if using Godaddy
            //$tmail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail OR SSL         //Comment if using Godaddy
            $tmail->Host = "smtp.gmail.com"; //changed localhost/smtp.gmail.com for using godaddy
            //$tmail->Port = 587;    //587 tls , 465 ssl , 25 unsecured //Comment if using Godaddy 
            $tmail->Port = 25;    //587 tls , 465 ssl , 25 unsecured
            //$tmail->Host = 'tls://smtp.gmail.com:25'; 
            $tmail->IsHTML(true);
            
            //$tmail->Username = "upendra.onerooftech@gmail.com"; //Comment if using Godaddy 
            //$mail->Password = "ort_1234*#"; //Comment if using Godaddy 
            
            //$mail->Username = "aadesh.onerooftech@gmail.com";
            //$mail->Password = "ort1234*"; 
            
            $tmail->Username = "siddharthnaik77@gmail.com";
	        $tmail->Password = "Xpro@siddharth!2b";
    
            $tmail->ClearAllRecipients( ); // clear all
            $tmail->SetFrom($appfrom);
            // $tmail->addReplyTo('info@example.com', 'Information');
            // $tmail->addCC('cc@example.com');
            // $tmail->addBCC('bcc@example.com');
    
            //Attachments
             //$tmail->addAttachment('careers/'.$resume_upload);         // Add attachments
            // $tmail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            
            $tmail->Subject = $appsubject;
            $tmail->Body = $appmessage;
            $tmail->AddAddress($appto);
            /*
            $multi_mail = array();
            $multi_mail = explode(',', $appto);
            if (count($multi_mail) > 1) {
              foreach ($multi_mail as $email) {
                $tmail->AddAddress($email);
              }
            }
            else{
              $tmail->AddAddress($to);
            }
            */
            if($tmail->Send()) 
            {
              //echo "success"; 
              $flag = 1;
            } 
            else 
            {
              //echo "Mailer Error: " . $mail->ErrorInfo; 
              $flag = 5;
            }
        }
        catch (Exception $e) {
            //echo 'Mail Not Sent '.$e; 
            $flag = 6;
        }
        
        
        echo $flag;
	} 
	else{
        echo 2;
    }
   // echo "resp".$response['n'];
}




?>