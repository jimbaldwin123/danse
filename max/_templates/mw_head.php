<?PHP
// Browser Agent Detection to deliver the correct Style Sheet.
// Must have or form elements will be screwed up in Netscape (surprise)
global $BROWSER_AGENT;
global $BROWSER_VER;

unset ($BROWSER_AGENT);
unset ($BROWSER_VER);

function browser_get_agent () {
	global $BROWSER_AGENT;
	return $BROWSER_AGENT;
}

function browser_get_version() {
	global $BROWSER_VER;
	return $BROWSER_VER;
}

function browser_is_ie() {
	if (browser_get_agent()=='ie') {
		return true;
	} else {
		return false;
	}
}

function browser_is_netscape() {
	if (browser_get_agent()=='ns') {
		return true;
	} else {
		return false;
	}
}


// Determine browser and version
if (ereg( 'MSIE ([0-9].[0-9]{1,2})',$HTTP_USER_AGENT,$log_version)) {
	$BROWSER_VER = $log_version[1];
	$BROWSER_AGENT = 'ie';
} elseif (ereg( 'Mozilla/([0-9].[0-9]{1,2})',$HTTP_USER_AGENT,$log_version)) {
	$BROWSER_VER = $log_version[1];
	$BROWSER_AGENT ='ns';
} else {
	$BROWSER_VER = 0;
	$BROWSER_AGENT = 'ie';
}

// This sets the default menu preload graphics for the main menu, or any other graphic that loads on every page
$onloadNav = "/_images/nav_brand_marketers_agencies_over.gif','/_images/nav_direct_marketers_over.gif','/_images/nav_email_marketers_over.gif','/_images/nav_publishers_over.gif','/_images/nav_contact_over.gif";

// This sets all the body attributes for color and padding
$bodyAttrib = 'bgcolor="#666666" leftmargin="10" topmargin="10" marginwidth="10" marginheight="10"';

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<!--Copyright 2002 MaxWorldwide, Inc. All rights reserved. -->
<HTML>
<HEAD>
<TITLE>MaxWorldwide : <? echo $section?> : <? echo $page ?></TITLE>

<!--# META TAGS #-->
<META http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<META http-equiv="Content-Language" content="en-us">
<META name="description" content="MaxWorldwide is a media company with expertise in both traditional direct marketing and online marketing.">
<META name="keywords" content="MaxWorldwide, MaxOnline, MaxDirect, MaxCreative, Media, Marketing, List Management">
<META http-equiv="imagetoolbar" content="NO">

<!--# FUNCTIONS #-->
<SCRIPT language="JavaScript" src="/_templates/mm_behaviors.js" type='text/javascript'></SCRIPT>
<SCRIPT language="JavaScript" src="/_templates/mw_leftnav.js" type='text/javascript'></SCRIPT>
<Script LANGUAGE="javaScript">
function popup(){
window.open('home_pop.html', 'newwindow' , 'height=250,width=250,resizable=yes,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,screenY=200,screenX=200');
window_handle = window.open('home_pop.html', 'newwindow');
window_handle.focus();
}
</script>
<LINK rel="stylesheet" href="/_templates/mw_<? echo $BROWSER_AGENT ?>.css" type="text/css">
<LINK rel="SHORTCUT ICON" href="/favicon.ico">
</HEAD>
