<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Groschopp_Store
 */

global $post;

?>

<aside id="sidebar" class="col-md-3">
	<span class="close-btn"></span>

	<?php

        $args = array(
            'theme_location' => 'primary',
            'menu' => 'primary',
            'container' => 'nav',
            'container_id' => 'side-nav',
            'depth' => 3,
            //'submenu' => (string)$post->ID,
            'walker' => new UL_Submenu_Walker()
        );

        wp_nav_menu($args);

        $args = array(
            'theme_location' => 'sub-nav',
            'menu' => 'sub-nav',
            'container' => 'nav',
            'container_id' => 'side-nav',
            'depth' => 2,
            //'submenu' => (string)$post->ID,
            'walker' => new UL_Submenu_Walker()
        );

        wp_nav_menu($args);

        if(is_page('my-account')) {
	        $args = array(
		        'theme_location' => 'myaccount',
		        'menu' => 'myaccount',
		        'container' => 'nav',
		        'container_id' => 'side-nav',
	        );

	        wp_nav_menu($args);
        }

    ?>

    <!--<a href="http://www.groschopp.com/48-hour-turnaround/"><img class="hidden-xs" src="<?php echo get_template_directory_uri() ?>/images/48-hour.png" alt=""></a> -->

	<?php $page = get_page_by_title('Contact'); ?>
    <a class="text-btn contact hidden-xs" href="<?php echo get_permalink($page->ID); ?>">Contact Us</a>
    <a class="text-btn search hidden-xs"  href="<?php echo get_permalink(6443) ?>">Search for Your Motor</a>

    <?php $page = get_page_by_title('Upload application specs'); ?>
    <a class="text-btn upload hidden-xs" href="<?php echo get_permalink($page->ID) ?>">Upload Your Application Specs</a>


    <!-- 3rd Party From from Hayley
    
<meta content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
<script type="text/javascript" src="https://schp.maillist-manage.com/js/optin.min.js" onload="setupSF('sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff','ZCFORMVIEW',false,'acc',false,'2')"></script>
<script type="text/javascript">
function runOnFormSubmit_sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff(th) { /*Before submit, if you want to trigger your event, "include your code here"*/ };
</script>
<style>#customForm p{display:inline;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff #customForm *:not(.dateClass){-webkit-box-sizing: border-box !important;-moz-box-sizing: border-box !important;box-sizing: border-box !important;word-break:break-word;overflow-wrap: break-word;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff .dateClass{-webkit-box-sizing: unset!important;-moz-box-sizing: unset !important;box-sizing: unset !important;word-break:break-word;overflow-wrap: break-word;}/*** RESPONSIVE START */@media only screen and (max-width: 319px){#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff #signupMainDiv{width:220px !important;min-width:220px !important;margin: 0px auto !important;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff #SIGNUP_PAGE{padding:0px !important}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff [changeitem="SIGNUP_FORM_FIELD"]{width:94% !important;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff .zcinputbox{width:100% !important;max-width:100% !important;float:none !important;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff #captchaDiv{width:69.5% !important;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff #relCaptcha{margin-right:11px !important;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff .recaptcha{transform:scale(0.55);-webkit-transform:scale(0.55);transform-origin:0 0;-webkit-transform-origin:0 0;}}/*Major Mobiles*/@media screen and (min-width: 320px) and (max-width: 580px){#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff #signupMainDiv{width:280px !important;min-width:280px !important;margin: 0px auto !important;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff .zcinputbox{width:100% !important;max-width:100% !important;float:none !important;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff [changeitem="SIGNUP_FORM_FIELD"]{width:95% !important;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff #captchaDiv{width:72% !important;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff #captchaText{width:96% !important;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff #relCaptcha{margin-right:6px !important;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff #capRequired{margin-right: -10px !important;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff .recaptcha{transform:scale(0.72);-webkit-transform:scale(0.75);transform-origin:0 0;-webkit-transform-origin:0 0;}}@media screen and (min-width:581px) and (max-width: 767px){#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff #signupMainDiv{width:440px !important;min-width:440px !important;margin: 0px auto !important;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff .zcinputbox{width:100% !important;max-width:100% !important;float:none !important;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff [changeitem="SIGNUP_FORM_FIELD"]{width:95% !important;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff #captchaDiv{width:84.4% !important;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff #captchaText{width:96% !important;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff #relCaptcha{margin-right:14px !important;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff #capRequired{margin-right: -10px !important;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff .recaptcha{transform:scale(1.13);-webkit-transform:scale(1.0);margin-bottom:40px;transform-origin:0 0;-webkit-transform-origin:0 0;}}/* Desktops and laptops ----------- */@media only screen  and (min-width : 1025px) {#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff #signupMainDiv{width:600px !important;min-width:600px !important;margin: 0px auto !important;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff .recaptcha{transform:scale(1.03);-webkit-transform:scale(1.08);transform-origin:0 0;-webkit-transform-origin:0 0;}}/* Large Screens */@media only screen  and (min-width : 1824px) {#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff #signupMainDiv{width:600px !important;min-width:600px !important;margin: 0px auto !important;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff .recaptcha{transform:scale(1.03);-webkit-transform:scale(1.08);transform-origin:0 0;-webkit-transform-origin:0 0;}}@media only screen and (min-device-width: 1200px) and (max-device-width:1200px){#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff #signupMainDiv{width:600px !important;min-width:600px !important;margin: 0px auto !important;}}/* iPads*/@media only screen and (min-width : 768px) and (max-width : 1024px){#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff #signupMainDiv{width:500px !important;min-width:240px !important;margin: 0px auto !important;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff #captchaDiv{width:86.8% !important;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff #relCaptcha{margin-right:12px !important;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff .recaptcha{transform:scale(0.90);-webkit-transform:scale(0.90);transform-origin:50% 50%;-webkit-transform-origin:0 0;}}/*** RESPONSIVE END */#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff .bdr_btm_hover{background-color:#f9f9f9; padding:10px;}#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff .bdr_btm{padding:10px }#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff .f14{font-size:14px}</style>
<div id="sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff" data-type="signupform">
    <div id="customForm"><input type="hidden" id="recapTheme" value="2"><input type="hidden" id="isRecapIntegDone" value="false"><input type="hidden" id="recapMode" value="508775000000887049"><input type="hidden" id="signupFormType" value="LargeForm_Vertical">
        <div name="SIGNUP_PAGE" id="SIGNUP_PAGE" class="SIGNUP_PAGE large_form_10_css" style="color: rgb(0, 39, 70); background-color: rgb(220, 220, 220); padding: 30px; font-family: Arial; background-size: 100% 100%; min-width: 240px; background-image: url(&quot;https://campaign-image.com/zohocampaigns/1294cf31e_blue_fade.png&quot;); background-repeat: no-repeat; background-position: 50% 50%; font-size: 13px; text-align: center;">
            <div>
                <div name="" changeid="" changename="" style="margin:0px auto">
                    <div id="imgBlock" name="LOGO_DIV" logo="true" style="width: 600px; margin: 0px auto; color: rgb(68, 68, 68); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; padding-bottom: 10px; text-align: left; padding-right: 10px; padding-top: 10px;"><img valign="middle" src="https://campaign-image.com/zohocampaigns/1294cf31e_groschopp_navy_1.png" name="LOGO" id="iframeImg" style="max-width: 100%; height: auto; width: 600px;"></div>
                </div><br>
                <div id="signupMainDiv" style="margin: 0px auto; width: 100%; min-width: 230px; max-width: 600px;" name="SIGNUPFORM" changeid="SIGNUPFORM" changename="SIGNUPFORM">
                    <div>
                        <div style="position:relative;">
                            <div id="Zc_SignupSuccess" style="display:none;position:absolute;margin-left:4%;width:90%;background-color: white; padding: 3px; border: 3px solid rgb(194, 225, 154);  margin-top: 10px;margin-bottom:10px;word-break:break-all">
                                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                    <tbody>
                                        <tr>
                                            <td width="10%"><img class="successicon" src="https://schp.maillist-manage.com/images/challangeiconenable.jpg" align="absmiddle"></td>
                                            <td><span id="signupSuccessMsg" style="color: rgb(73, 140, 132); font-family: sans-serif; font-size: 14px;word-break:break-word">&nbsp;&nbsp;Thank you for Signing Up</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <form method="POST" id="zcampaignOptinForm" style="margin:0px;" action="https://schp.maillist-manage.com/weboptin.zc" target="_zcSignup">
                            <div id="SIGNUP_BODY_ALL" name="SIGNUP_BODY_ALL" style="border: none; padding: 0px;">
                                <h1 style="color: rgb(0, 39, 70); background-color: rgba(0, 0, 0, 0); overflow-wrap: break-word; word-break: break-all; margin: 0px; border-color: rgb(237, 237, 237); font-family: Arial; border-width: 1px; border-style: none; font-weight: 100; font-size: 36px; text-align: center; padding: 10px;" id="SIGNUP_HEADING" name="SIGNUP_HEADING" changeid="SIGNUP_MSG" changetype="SIGNUP_HEADER">Stay up-to-date on our NEW blogs!</h1>
                                <div style="background-color: rgb(193, 191, 191); color: rgb(0, 0, 0); padding: 30px; font-family: Arial; border-radius: 30px; text-align: center; font-size: 13px; opacity: 1;" id="SIGNUP_BODY" name="SIGNUP_BODY">
                                    <div style="margin:0px auto;text-align:left;">
                                        <div style="line-height:1.6;" class="" changeid="SIGNUP_MSG" id="SIGNUP_DESCRIPTION" changetype="SIGNUP_DESCRIPTION">Please complete this form to create an account, receive email updates and much more.</div>
                                        <div style="display:none;background-color:#FFEBE8;padding:10px 10px; color:#d20000; font-size:11px; margin:10px 0px;border:solid 1px #ffd9d3; margin-top:20px;" id="errorMsgDiv">&nbsp;&nbsp;Please correct the marked field(s) below.</div>
                                        <div>
                                            <div style="font-size:12px;  margin-top:10px;" name="fieldsdivSf" class="zcsffieldsdiv">
                                                <div style="padding:10px 0px 10px 0px;" class="zcsffield " fieldid="508775000000000021">
                                                    <div style="">
                                                        <div style="color: rgb(69, 69, 69); font-family: Arial; font-size: 17px; padding-left: 10px;" name="SIGNUP_FORM_LABEL">Contact Email&nbsp;<span name="SIGNUP_REQUIRED" style="color: rgb(180, 0, 0); font-family: Arial; font-size: 11px;">*</span></div>
                                                        <div style="width:100%;  min-width:170px; margin-top:5px;"><input name="CONTACT_EMAIL" changeitem="SIGNUP_FORM_FIELD" style="width: 97%; color: rgb(68, 68, 68); background-color: rgb(235, 235, 235); border: 2px solid rgb(255, 255, 255); outline: 0px; font-family: Arial; border-radius: 24px; box-sizing: border-box; font-size: 16px; text-indent: 15px; height: 42px; padding: 0px;" maxlength="100" type="email" required="true" value=""><span style="display:none" id="dt_CONTACT_EMAIL">1,true,6,Contact Email,2</span></div>
                                                    </div>
                                                    <div style="clear:both"></div>
                                                </div>
                                                <div style="padding:10px 0px 10px 0px;" class="zcsffield " fieldid="508775000000000023">
                                                    <div style="">
                                                        <div style="color: rgb(69, 69, 69); font-family: Arial; font-size: 17px; padding-left: 10px;" name="SIGNUP_FORM_LABEL">First Name&nbsp;<span name="SIGNUP_REQUIRED" style="color: rgb(180, 0, 0); font-family: Arial; font-size: 11px;">*</span></div>
                                                        <div style="width:100%;  min-width:170px; margin-top:5px;"><input name="FIRSTNAME" changeitem="SIGNUP_FORM_FIELD" style="width: 97%; color: rgb(68, 68, 68); background-color: rgb(235, 235, 235); border: 2px solid rgb(255, 255, 255); outline: 0px; font-family: Arial; border-radius: 24px; box-sizing: border-box; font-size: 16px; text-indent: 15px; height: 42px; padding: 0px;" maxlength="100" type="text" required="true" value=""><span style="display:none" id="dt_FIRSTNAME">1,true,1,First Name,2</span></div>
                                                    </div>
                                                    <div style="clear:both"></div>
                                                </div>
                                                <div style="padding:10px 0px 10px 0px;" class="zcsffield " fieldid="508775000000000025">
                                                    <div style="">
                                                        <div style="color: rgb(69, 69, 69); font-family: Arial; font-size: 17px; padding-left: 10px;" name="SIGNUP_FORM_LABEL">Last Name&nbsp;<span name="SIGNUP_REQUIRED" style="color: rgb(180, 0, 0); font-family: Arial; font-size: 11px;">*</span></div>
                                                        <div style="width:100%;  min-width:170px; margin-top:5px;"><input name="LASTNAME" changeitem="SIGNUP_FORM_FIELD" style="width: 97%; color: rgb(68, 68, 68); background-color: rgb(235, 235, 235); border: 2px solid rgb(255, 255, 255); outline: 0px; font-family: Arial; border-radius: 24px; box-sizing: border-box; font-size: 16px; text-indent: 15px; height: 42px; padding: 0px;" maxlength="100" type="text" required="true" value=""><span style="display:none" id="dt_LASTNAME">1,true,1,Last Name,2</span></div>
                                                    </div>
                                                    <div style="clear:both"></div>
                                                </div>
                                                <div style="padding:10px 0px 10px 0px;" class="zcsffield " fieldid="508775000000000027">
                                                    <div style="">
                                                        <div style="color: rgb(69, 69, 69); font-family: Arial; font-size: 17px; padding-left: 10px;" name="SIGNUP_FORM_LABEL">Company Name&nbsp;</div>
                                                        <div style="width:100%;  min-width:170px; margin-top:5px;"><input name="COMPANYNAME" changeitem="SIGNUP_FORM_FIELD" style="width: 97%; color: rgb(68, 68, 68); background-color: rgb(235, 235, 235); border: 2px solid rgb(255, 255, 255); outline: 0px; font-family: Arial; border-radius: 24px; box-sizing: border-box; font-size: 16px; text-indent: 15px; height: 42px; padding: 0px;" maxlength="100" type="text" value=""><span style="display:none" id="dt_COMPANYNAME">1,false,1,Company Name,2</span></div>
                                                    </div>
                                                    <div style="clear:both"></div>
                                                </div>
                                            </div>
                                            <div class="recaptcha" style="padding: 10px 0px 10px 10px;display:none " id="captchaOld" name="captchaContainer">
                                                <div style="">
                                                    <div style="width: 59%; float: left; min-width: 170px; max-width: 70%;" id="captchaParent"><img src="//campaigns.zoho.com/images/refresh_icon.png" style="cursor: pointer;float:right;margin-right:4px" onclick="loadCaptcha('https://campaigns.zoho.com/campaigns/CaptchaVerify.zc?mode=generate',this,'#sf7328fd08cb725227f6f98a450f1f51050abda9b180e81eff');" id="relCaptcha">
                                                        <div id="captchaDiv" captcha="true" name="" style="padding: 20px;background:#fff;border: 1px solid rgb(222, 222, 222);box-sizing: border-box;width:98.8%"></div><input placeholder="Captcha" id="captchaText" name="captchaText" changeitem="SIGNUP_FORM_FIELD" style="margin-top: 5px; width: 98.7%; color: rgb(68, 68, 68); background-color: rgb(235, 235, 235); border: 2px solid rgb(255, 255, 255); outline: 0px; font-family: Arial; border-radius: 24px; box-sizing: border-box; font-size: 16px; text-indent: 15px; height: 42px; padding: 0px;" maxlength="100" type="text"><span name="SIGNUP_REQUIRED" id="capRequired" style="color: rgb(180, 0, 0); margin-top: -16px; margin-right: -2px; float: right; font-family: Arial; font-size: 11px;">*</span>
                                                    </div>
                                                </div>
                                                <div style="clear: both"></div>
                                            </div><input type="hidden" id="secretid" value="6LdNeDUUAAAAAG5l7cJfv1AA5OKLslkrOa_xXxLs">
                                            <div style=" border-bottom:#ebebeb dotted 1px; margin-top:10px; clear:both;"></div>
                                            <div id="REQUIRED_FIELD_TEXT" changetype="REQUIRED_FIELD_TEXT" name="SIGNUP_REQUIRED" style="color: rgb(180, 0, 0); padding: 10px 10px 10px 0px; font-family: Arial; font-size: 11px;">*Required Fields</div>
                                            <div style="padding:10px; text-align:center;"><input type="submit" action="Save" id="zcWebOptin" name="SIGNUP_SUBMIT_BUTTON" changetype="SIGNUP_SUBMIT_BUTTON_TEXT" style="cursor: pointer; color: rgb(255, 255, 255); background-color: rgb(241, 194, 50); padding: 9px 28px; outline: none medium; appearance: none; font-family: Arial; border-radius: 24px; background-size: initial; background-attachment: initial; background-origin: initial; background-clip: initial; width: 100%; font-size: 21px; background-position: center bottom; background-repeat: repeat-x; text-align: center; border-style: solid; border-color: rgb(255, 255, 255); border-width: 2px;" value="Subscribe"></div><input type="hidden" id="fieldBorder" value=""><input type="hidden" name="zc_trackCode" id="zc_trackCode" value="ZCFORMVIEW" onload=""><input type="hidden" name="viewFrom" id="viewFrom" value="URL_ACTION"><input type="hidden" id="submitType" name="submitType" value="optinCustomView"><input type="hidden" id="lD" name="lD" value="170f882ab9a033b5"><input type="hidden" name="emailReportId" id="emailReportId" value=""><input type="hidden" name="zx" id="cmpZuid" value="1294cf31e"><input type="hidden" name="zcvers" value="3.0"><input type="hidden" name="oldListIds" id="allCheckedListIds" value=""><input type="hidden" id="mode" name="mode" value="OptinCreateView"><input type="hidden" id="zcld" name="zcld" value="170f882ab9a033b5"><input type="hidden" id="zctd" name="zctd" value=""><input type="hidden" id="document_domain" value=""><input type="hidden" id="zc_Url" value="schp.maillist-manage.com"><input type="hidden" id="new_optin_response_in" value="0"><input type="hidden" id="duplicate_optin_response_in" value="0"><input type="hidden" id="zc_formIx" name="zc_formIx" value="7328fd08cb725227f6f98a450f1f51050abda9b180e81eff">
                                        </div>
                                    </div><input type="hidden" id="isCaptchaNeeded" value="false"><input type="hidden" id="superAdminCap" value="0"><img src="https://schp.maillist-manage.com/images/spacer.gif" onload="referenceSetter(this)" id="refImage" style="display:none;">
                                </div>
                                <div style="margin: 0px auto;margin-top:20px;text-align:left;height:76px;" id="privacyNotes" identity="privacyNotes"><span>Note: It is our responsibility to protect your privacy and we guarantee that your data will be completely confidential.</span></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="zcOptinOverLay" oncontextmenu="return false" style="display:none;text-align: center; background-color: rgb(0, 0, 0); opacity: 0.5; z-index: 100; position: fixed; width: 100%; top: 0px; left: 0px; height: 988px;"></div>
<div id="zcOptinSuccessPopup" style="display:none;z-index: 9999;width: 800px; height: 40%;top: 84px;position: fixed; left: 26%;background-color: #FFFFFF;border-color: #E6E6E6; border-style: solid; border-width: 1px;  box-shadow: 0 1px 10px #424242;padding: 35px;"><span style="position: absolute;top: -16px;right:-14px;z-index:99999;cursor: pointer;" id="closeSuccess"><img src="https://schp.maillist-manage.com/images/videoclose.png"></span>
    <div id="zcOptinSuccessPanel"></div>
</div>
 -->
</aside>
