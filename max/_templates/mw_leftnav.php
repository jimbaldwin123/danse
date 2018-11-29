<?PHP

// Color Settings for rollover/select states
$active_forecolor = "#FFFFFF";
$active_bkcolor = "#727272";
$inactive_bkcolor = "#575757";
$hover_bkcolor = "#808080";

// Takes the defined $section in the page and makes ' ' into _'s so the path can be found
$section = str_replace(' ','_',$section);

if ($page != ''){
	// Retreive current section subnav
	include($_SERVER['DOCUMENT_ROOT'].'/'.strtolower($section).'/subnav/leftnav.php');
	
	// Start of building subnav HTML string
	$leftnav = '<IMG src="/_images/nav/subnav_cap_top3.gif" width="175" height="22"><TABLE width="175" border="0" cellspacing="0" cellpadding="0" background="/_images/nav/subnav_menu_bg.gif">';
	
	// Loop throw number of array elements and build corresponding TR and TD for set amount
	foreach($link_labels as $key => $value){
		
		$leftnav .= '<TR><TD width="16">&nbsp;</TD><TD';
		
		// Sees if the current key is the one set in the page, if so it will highlight the TD
		if ($key == $page){
			$leftnav .= ' bgcolor="'.$active_bkcolor.'" onMouseOver=mOvr(this,"'.$hover_bkcolor.'") onMouseOut=mOut(this,"'.$active_bkcolor.'") onClick=mClk(this)>';
		} else {
			$leftnav .= ' bgcolor="'.$inactive_bkcolor.'"  onMouseOver=\'mOvr(this,"'.$hover_bkcolor.'")\' onMouseOut=\'mOut(this,"'.$inactive_bkcolor.'")\' onClick=\'mClk(this)\'>';
		}
		
		// Defines the current menu item as non selected and sets the URL
		if ($key != $page){
			$leftnav .= '<A href="'.$value.'" class="nav">';
		}
		
		// Defines the current menu item as Selected and assigns correct CSS to the link
		if($key == $page){
			$leftnav .= '<A href="'.$value.'"><B class="navSelect">'.$key.'</B></A>';
		} else {
			$leftnav .= $key;
		}
		
		// Ends out the HREF regardless of which
		if ($key != $page){
		  	$leftnav .='</A>';
		}
		$leftnav .= '</TD><TD width="6">&nbsp;</TD></TR>';
	}
	
	$leftnav .= '</TABLE>';
	$leftnav .= '<IMG src="/_images/nav/subnav_cap_bottom.gif" width="175" height="16">';
	
	echo $leftnav;
} else {
	echo '<FONT COLOR="#FDCA2F"><STRONG>Page Title is not set!</STRONG><BR>Please define variable at the top of the document</FONT>';
}
?>