<?php

require($_SERVER['DOCUMENT_ROOT'].'/wp-config.php');  
$wp->init();  
$wp->parse_request();  
$wp->query_posts();  
$wp->register_globals();

if(isset($_POST['form']))
{
 	global $wpdb, $phpmailer;

	$wpdb->query("INSERT INTO wp_forms VALUES(null, '".$_POST['form']."', '".json_encode($_POST)."', NOW())");
	
	// (Re)create it, if it's gone missing
	if ( !is_object( $phpmailer ) || !is_a( $phpmailer, 'PHPMailer' ) ) {
		require_once ABSPATH . WPINC . '/class-phpmailer.php';
		require_once ABSPATH . WPINC . '/class-smtp.php';
		$phpmailer = new PHPMailer();
	}
	
	// clear up stuff
	$phpmailer->ClearAddresses();$phpmailer->ClearAllRecipients();$phpmailer->ClearAttachments();
	$phpmailer->ClearBCCs();$phpmailer->ClearCCs();$phpmailer->ClearCustomHeaders();
	$phpmailer->ClearReplyTos();
	
	switch($_POST['form']) {
		case 'contact':
			$phpmailer->Subject = "Groschopp.com : Message From Contact Form";
			
			$body  = "<strong>Name :</strong> ".$_POST['name']."<br/>";
			$body .= "<strong>Phone :</strong> ".$_POST['phone']."<br/>";
			$body .= "<strong>Email :</strong> ".$_POST['email']."<br/>";
			
			if(isset($_POST['how_did_you_hear_about_us'])) {
			    $body .= "<strong>How did you hear about us? : </strong>".$_POST['how_did_you_hear_about_us'].'<br/>';
    			$body .= "<strong>Other : </strong>".$_POST['other'].'<br/>';
			}
			
			$body .= "<strong>Message :</strong><br/>".$_POST['message'];
			
			$phpmailer->From = apply_filters('wp_mail_from', $_POST['email']);
			$phpmailer->FromName = apply_filters('wp_mail_from_name', $_POST['name']);
			
			$phpmailer->AddAddress('bethanyw@groschopp.com');
			//$phpmailer->AddAddress('heatherm@groschopp.com');
			$redirect_id = 923;
			break;
			
		case 'employment':
			$phpmailer->Subject = "Groschopp.com : Message From Employment Form";
			
			if(isset($_POST['middle_name'])) {
				$body  = "Name : ".$_POST['first_name']." ".$_POST['middle_name']." ".$_POST['last_name']."<br/>";
			} else {
				$body  = "Name : ".$_POST['first_name']." ".$_POST['last_name']."<br/>";
			}
			
			$body .= "Address : ".$_POST['street_address']." ".$_POST['city'].", ".$_POST['state']." ".$_POST['zip_code']."<br/>";
			$body .= "Telephone : ".$_POST['telephone']."<br/>";
			$body .= "Email Address : ".$_POST['email_address']."<br/>";
			$body .= "Are you 18 or older? : ".$_POST['areyou18orolder']."<br/>";
			$body .= "Are you eligible to work in the United States? : ".$_POST['eligible_us']."<br/>";
			$body .= "What areas of employment are you interested in?<br/> ";
			
				if(isset($_POST['interest'])) {
					$body .=  "<ul>";
					foreach($_POST['interest'] as $k => $v) {
						$body .= "<li>".$v."</li>";
					}
					$body .=  "</ul>";
				}
			
			$body .= "What shifts can you work (for manufacturing)?<br/>";
			
				if(isset($_POST['shift'])) {
					$body .=  "<ul>";
					foreach($_POST['shift'] as $k => $v) {
						$body .=  "<li>".$v."</li>";
					}
					$body .=  "</ul>";
				}
				
			$body .= "What type of employment are you seeking? : ".$_POST['employed']."<br/>";
			
			$body .=  "<h2>Employment History</h2>";
			
			$body .=  "<strong>1. Present or Most Recent Employer</strong><br/>";
			
			$body .=  "Name of Employer : ".$_POST['employer1']."<br/>";
			$body .=  "Your Position : ".$_POST['position1']."<br/>";
			
			$body .=  "<strong>2. Next Previous Employer</strong><br/>";
			
			$body .=  "Name of Employer : ".$_POST['employer2']."<br/>";
			$body .=  "Your Position : ".$_POST['position2']."<br/>";
			
			$body .=  "<h2>Education History</h2>";
			
			$body .=  "<strong>1. Institution</strong><br/>";
			
			$body .=  "Name : ".$_POST['school1']."<br/>";
			$body .=  "Years Attended : ".$_POST['years1']."<br/>";
			$body .=  "Diploma/Degree Received : ".$_POST['degree1']."<br/>";
			
			$body .=  "<strong>2. Institution</strong><br/>";
			
			$body .=  "Name : ".$_POST['school2']."<br/>";
			$body .=  "Years Attended : ".$_POST['years2']."<br/>";
			$body .=  "Diploma/Degree Received : ".$_POST['degree2']."<br/>";
		
			$phpmailer->From = apply_filters('wp_mail_from', $_POST['email_address']);
			$phpmailer->FromName = apply_filters('wp_mail_from_name', $_POST['first_name']." ".$_POST['last_name']);
			
			$phpmailer->AddAddress('connievp@groschopp.com');
			$phpmailer->AddAddress('tamir@groschopp.com');
			//$phpmailer->AddAddress('chentges@arcstone.com');
			//$phpmailer->AddAddress('heatherm@groschopp.com');
			$redirect_id = 927;
			break;
			
		case 'specs':
			$phpmailer->Subject = "Groschopp.com : Message From Application Specs Form";
						
			foreach($_POST as $k => $v) {
				if(isset($v) and $k != "form") {
					if(is_array($v)) {
						$body .= ucwords(str_replace("_", " ", $k))."<br/><ul>";
	
						foreach($v as $key => $value) {
							$body .= "<li>".$value."</li>";
						}
						
						$body .= "</ul><br/>";
					} else {
						$body .= ucwords(str_replace("_", " ", $k))." : ".$v."<br/>";
					}
				}
			}
		
			$phpmailer->From = apply_filters('wp_mail_from', $_POST['email_address']);
			$phpmailer->FromName = apply_filters('wp_mail_from_name', $_POST['name']);
		
			$phpmailer->AddAddress('bethanyw@groschopp.com');
			//$phpmailer->AddAddress('mknipschield@arcstone.com');
			$redirect_id = 929;
			break;
		
		case "quote":

			$phpmailer->Subject = "Groschopp.com : Message From Request A Quote Form";
			
			$body  = "<h2>Products For Quote</h2>";
			
			$body .= "<table>";
			foreach($_POST['product'] as $k => $v):
			$v = json_decode(base64_decode($v));
			$product = get_product($v->id);

			$body .= "<tr>";
			$body .= "<td>".$product->model."</td>";
			$body .= "<td>".$product->ordering_number."</td>";
			$body .= "</tr>";

			foreach($v as $key => $value):
				if($value != ""):

				if(is_array($value)):
				foreach($value as $file_key => $file_value):
				$body .= "<tr>";
				$body .= "<td>File</td>";
				$body .= "<td><a href='".get_bloginfo('url')."/data/client/".$file_value."'>".$file_value."</a></td>";
				$body .= "</tr>";
				endforeach;
				else:
				$body .= "<tr>";
				$body .= "<td>".$key."</td>";
				$body .= "<td>".$value."</td>";
				$body .= "</tr>";
				endif;

				endif;
			endforeach;
			endforeach;
			$body .= "</table><br/><br/>";
			
			$body .= "<strong>Name :</strong> ".$_POST['name']."<br/>";
			$body .= "<strong>State :</strong> ".$_POST['state']."<br/>";
			$body .= "<strong>Company Name :</strong> ".$_POST['company_name']." ( ".$_POST['market']." )<br/>";
			$body .= "<strong>Phone Number :</strong> ".$_POST['phone']."<br/>";
			$body .= "<strong>Email Address :</strong> ".$_POST['email']."<br/>"; 
			$body .= "<strong>Looking For :</strong> ".$_POST['looking_for']."<br/>";
			$body .= "<strong>Units Per Year :</strong> ".$_POST['units_per_year']."<br/>";
			$body .= "<strong>Primary Market :</strong> ".$_POST['primary_market']."<br/>";

			if(isset($_POST['how_did_you_hear_about_us'])) {
			    $body .= "<strong>How did you hear about us? :</strong>".$_POST['how_did_you_hear_about_us'].'<br/>';
    			$body .= "<strong>Other :</strong> ".$_POST['other'].'<br/>';
			}

			$body .= "<strong>Comments :</strong><br/>".$_POST['comments'];
		
			$phpmailer->From = apply_filters('wp_mail_from', $_POST['email']);
			$phpmailer->FromName = apply_filters('wp_mail_from_name', $_POST['name']);
		
			$phpmailer->AddAddress('bethanyw@groschopp.com');
			//$phpmailer->AddAddress('heatherm@groschopp.com');
			$redirect_id = 925;

			if (isset($_COOKIE['quote'])) {
				unset($_COOKIE['quote']);
				setcookie('quote', null, -1, '/', str_replace('http://','',get_bloginfo('url')));
			}

			break;
			
		case 'newsletter':
			$phpmailer->Subject = "Groschopp.com : Message From Newsletter Form";
			
			$body  = "<strong>Name: </strong>".$_POST['first_name'].'&nbsp;'.$_POST['last_name'].'<br />';
			$body  .= "<strong>Company Name: </strong>".$_POST['company_name'].'<br />';
			$body  .= "<strong>Email: </strong>".$_POST['email_address'].'<br />';
			$body  .= "<strong>Phone: </strong>".$_POST['phone'].'<br />';
			
			if(isset($_POST['address1'])) {
			    $body  .= "<br/><strong>Address: </strong><br />".$_POST['address1'].'<br />';
    			$body  .= $_POST['address2'].'<br />';
    			$body  .= $_POST['city'].', '.$_POST['state'].'&nbsp;'.$_POST['zip'].'<br/><br/>';
			}

			$body  .= "<strong>Country: </strong>".$_POST['country'].'<br />';
			/*$body  = "Other:<br />".$_POST['other'].'<br />';*/
			$body  .= "<strong>Company Type: </strong>".$_POST['company_type'].'<br />';
			$body  .= "<strong>Motors: </strong><br />";
			if(count($_POST['motors']) > 0) {
				foreach($_POST['motors'] as $k => $v) {
	
					$body .= $v."<br/>";
			
				}
			}
			$body  .= "<strong>Gearmotors: </strong><br />";
			if(count($_POST['gearmotors']) > 0) {
				foreach($_POST['gearmotors'] as $k => $v) {
	
					$body .= $v."<br/>";
			
				}
			}
			$body  .= "<strong>Gearboxes: </strong><br />";
			if(count($_POST['gearboxes']) > 0) {
				foreach($_POST['gearboxes'] as $k => $v) {
	
					$body .= $v."<br/>";
			
				}
			}
			$body  .= "<strong>Controls: </strong>".$_POST['controls'].'<br />';
			$body  .= "<strong>Integration Services: </strong>".$_POST['integration_services'].'<br />';

			if(isset($_POST['how_did_you_hear_about_us'])) {
			    $body .= "<strong>How did you hear about us?: </strong>".$_POST['how_did_you_hear_about_us'].'<br/>';
    			$body .= "<strong>Other:</strong>".$_POST['other'].'<br/>';
			}
			
			$phpmailer->From = apply_filters('wp_mail_from', 'noreply@groschopp.com');
			$phpmailer->FromName = apply_filters('wp_mail_from_name', 'No Reply');
			
			$phpmailer->AddAddress('bethanyw@groschopp.com');
			//$phpmailer->AddAddress('heatherm@groschopp.com');
			$redirect_id = 977;
			break;

		case "email_blog":
			$phpmailer->Subject = "Groschopp.com : Message From Email Blog Form";

			$body .= "<strong>Name:</strong>".$_POST['name']."<br/>";
			$body .= "<strong>Email:</strong>".$_POST['email']."<br/>";

			$phpmailer->From = apply_filters('wp_mail_from', 'noreply@groschopp.com');
			$phpmailer->FromName = apply_filters('wp_mail_from_name', 'No Reply');

			//$phpmailer->AddAddress('brendab@groschopp.com');
			$phpmailer->AddAddress('mknipschield@arcstone.com');
			$redirect_id = 3710;
			break;
	}

	$phpmailer->Body = "<html><body>\n".$body."\n</body></html>"; 
	$phpmailer->IsHTML( true );
	$phpmailer->SMTPDebug = false;
	$phpmailer->IsSMTP();
	$phpmailer->SMTPAuth = true;
	$phpmailer->Host = "tangent2.arcstone.com";
	$phpmailer->Username = "groschopp-com";
	$phpmailer->Password = "qWLUbxByhUC1";
	$charset = get_bloginfo( 'charset' );
	
	$phpmailer->CharSet = apply_filters( 'wp_mail_charset', $charset );

 	// Send!			
	if($phpmailer->Send())
	{
		header('Location: '.get_permalink($redirect_id));
	}
	else
	{
		header('Location: '.get_permalink($redirect_id));
	}
}