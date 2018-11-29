<?PHP 
// MaxWorldwide: Interior Template V.1.00

$section = 'Investor Relations';
$page = 'Financial Reports';

include($_SERVER['DOCUMENT_ROOT'].'/_templates/mw_head.php');
?>
<SCRIPT language="javascript">
<!--
function pop_sec(file) {
	window.open(file, "windowa", "width=750,height=500,scrollbars=1,status=0,resizeable=1,toolbar=1");
}
-->
</SCRIPT>
<BODY <? echo $bodyAttrib ?> onLoad="MM_preloadImages('<? echo $onloadNav ?>')">
<? include($_SERVER['DOCUMENT_ROOT'].'/_templates/mw_main_nav.php'); ?>
<TABLE width="700" border="0" cellpadding="0" cellspacing="0" bgcolor="#E0E0E0">
  <TR> 
    <TD width="175" rowspan="2" valign="top" background="/_images/nav/subnav_bg.gif" bgcolor="#7D7D7D"> 
      <? include($_SERVER['DOCUMENT_ROOT'].'/_templates/mw_leftnav.php'); ?>
    </TD>
    <TD colspan="2"><TABLE width="525" border="0" cellpadding="0" cellspacing="0">
        <TR> 
          <TD colspan="3" valign="top" bgcolor="#E0E0E0"><IMG src="/_images/pt_topper.gif" width="525" height="22"></TD>
        </TR>
        <TR> 
          <TD colspan="3" align="right" valign="top" bgcolor="#E0E0E0"><IMG src="/_images/investor_relations/pt_financial_reports.gif" width="450" height="35"><IMG src="/_images/pt_right_tab.gif" width="75" height="35"></TD>
        </TR>
        <TR> 
          <TD colspan="3" valign="top" bgcolor="#E0E0E0"><IMG src="/_images/pt_bottom.gif" width="525" height="23"></TD>
        </TR>
      </TABLE></TD>
  </TR>
  <TR> 
    <TD width="524" valign="top"><TABLE width="524" border="0" cellspacing="0" cellpadding="10">
        <TR> 
          <TD width="10">&nbsp;</TD>
          <TD>
<?php

//Plan: check to see if this is a submit
//	if so then add them to the lists, and print a thank-you page
//	else do the lookup and print the options

if ($SUBMIT ) 
{
	if (count($_POST['SubscribeTo']) > 0) {
		print "<BR><BR>
		You have been subscribed to the follwing Alert Lists:<BR><BR>";
		foreach ($_POST['SubscribeTo'] as $Subscribee) {
			print $Subscribee."<BR>";
			mail ("SUBSCRIBE-$Subscribee","","subscribe", "From: $email\n","-f$email");
			//mail ("zander@zan.com,zlichstein@l90.com","","subscribe $Subscribee","From: $email\n", "-f$email");
		}
		print "<BR><BR>
		You should be receiving messages shortly confirming this.
		You may unsubscribe at any time simply by following the information at the bottom of the alert.";
	}
	else {
		print "You must choose at least one list to subscribe to";
	}

	//Loop over the 
}
else {
        print '
	Email Alert Service:<BR><BR>
	Subscribe to the Financial Reports Alert service. As a subscriber, you will receive an e-mail alert whenever this type of company information is added to this Web site.<BR><BR><BR>
        <FORM method="POST" action="financial_reports.php">';

        include($_SERVER['DOCUMENT_ROOT'].'/_templates/xml_functions.php');

        $xmluri = "http://xml.corporate-ir.net/irxmlclient.asp?compid=70381&reqtype=ALERTS";

        $dom = GetDom($xmluri);
        $arAlert = $dom->get_elements_by_tagname("Alerts/Alert");
	foreach ($arAlert as $Alert) { 
		print '<INPUT TYPE="CHECKBOX" NAME="SubscribeTo[]" VALUE="'.GetText($Alert, "AlertEmail").'" CHECKED>';	
		print GetText($Alert, "AlertListDescr")."<BR>";
	}
	print '<BR>Enter Your email address: <INPUT TYPE=TEXT LENGTH=40 NAME=email>
	<INPUT TYPE=SUBMIT NAME=SUBMIT value="subscribe">
	</FORM>
	';
}
//	print "<LI><A class=interior HREF=\"javascript:pop_sec('";
//        print GetText($QuoteNode, "SECUrl");
//	print "')\" title=\"Click to View SEC Filings\">";
?></TD>
        </TR>
      </TABLE>
      <BR> <BR> </TD>
    <TD width="1" bgcolor="#000000"><IMG src="/_images/spacer.gif" width="1" height="200"></TD>
  </TR>
  <TR> 
    <TD colspan="3"><IMG src="/_images/frame_bottom.gif" width="700" height="6"></TD>
  </TR>
</TABLE>
<? include($_SERVER['DOCUMENT_ROOT'].'/_templates/mw_footer.inc'); ?>
</BODY>
</HTML>

