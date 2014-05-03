<?php
/*
*     LTM Popup Save form
*     http://johnmann.org
*/

session_start();
$LTM_Popup_Name = isset($_POST['LTM_Popup_Name']) ? $_POST['LTM_Popup_Name'] : '';
$LTM_Popup_Email = isset($_POST['LTM_Popup_Email']) ? $_POST['LTM_Popup_Email'] : '';

$LTM_Popup_abspath = dirname(__FILE__);
$LTM_Popup_abspath_1 = str_replace('wp-content/plugins/ltm-popup-form', '', $LTM_Popup_abspath);
$LTM_Popup_abspath_1 = str_replace('wp-content\plugins\ltm-popup-form', '', $LTM_Popup_abspath_1);
require_once($LTM_Popup_abspath_1 .'wp-config.php');

if($LTM_Popup_Email <> "")
{
	$LTM_Popup_On_MyEmail = $ltm_popup_settings['LTM_Popup_On_MyEmail'];
	$LTM_Popup_On_Subject = $ltm_popup_settings['LTM_Popup_On_Subject'];
		
	if($LTM_Popup_On_MyEmail <> "YOUR-EMAIL-ADDRESS-TO-RECEIVE-MAILS" && $LTM_Popup_On_MyEmail <> "")
	{
		$sender_email = mysql_real_escape_string(trim($LTM_Popup_Email));
		$sender_name = mysql_real_escape_string(trim($LTM_Popup_Name));
		$subject = $LTM_Popup_On_Subject;
		$message = $sender_name . ' (Email: ' . $sender_email . ') subscribed';				
	
		$message = preg_replace('|&[^a][^m][^p].{0,3};|', '', $message);
		$message = preg_replace('|&amp;|', '&', $message);
		$mailtext = wordwrap(strip_tags($message), 80, "\n");
		
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		$headers .= "From: \"$sender_name\" <$sender_email>\n";
		$headers .= "Return-Path: <" . mysql_real_escape_string(trim($LTM_Popup_Email)) . ">\n";
		$headers .= "Reply-To: \"" . mysql_real_escape_string(trim($LTM_Popup_Name)) . "\" <" . mysql_real_escape_string(trim($LTM_Popup_Email)) . ">\n";
		$mailtext = str_replace("\r\n", "<br />", $mailtext);
		@wp_mail($LTM_Popup_On_MyEmail, $subject, $mailtext, $headers);
	}

	_e('Message sent successfully.', 'ltm-popup');
}
else
{
	//echo "Please enter your name and email.";
	_e('Please enter your name and email.', 'ltm-popup');
}
?>