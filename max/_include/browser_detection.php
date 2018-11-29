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
	$BROWSER_VER=$log_version[1];
	$BROWSER_AGENT='ie';
} elseif (ereg( 'Mozilla/([0-9].[0-9]{1,2})',$HTTP_USER_AGENT,$log_version)) {
	$BROWSER_VER=$log_version[1];
	$BROWSER_AGENT='ns';
} else {
	$BROWSER_VER=0;
	$BROWSER_AGENT='ie';
}

?>