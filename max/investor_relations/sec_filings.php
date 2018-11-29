<?PHP 
// MaxWorldwide: Interior Template V.1.00

$section = 'Investor Relations';
$page = 'SEC Filings';

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
          <TD colspan="3" align="right" valign="top" bgcolor="#E0E0E0"><IMG src="/_images/investor_relations/pt_sec_filings.gif" width="450" height="35"><IMG src="/_images/pt_right_tab.gif" width="75" height="35"></TD>
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
          <TD><UL><FONT size="2">
<?php
	require('../_templates/xml_functions.php');

        $xmluri = "http://xml.corporate-ir.net/irxmlclient.asp?compid=70381&reqtype=SECFILINGS";

	$dom = GetDom($xmluri);
        $QuoteNode = $dom->get_elements_by_tagname("SECFilings");
        $QuoteNode = $QuoteNode[0];
	print "<LI><A class=interior HREF=\"javascript:pop_sec('";
        print GetText($QuoteNode, "SECUrl");
	print "')\" title=\"Click to View MaxWorldwide SEC Filings\">";
?>
Click <B>here</B> to continue on to view MaxWorldwide SEC filings.</A></li></FONT>
  <LI>
				You are provided a hyperlink to a third-party SEC Filings web site.  MaxWorldwide does not maintain or provide information directly to this site.
			<LI>
				MaxWorldwide makes no representations or warranties with respect to the information contained herein and takes no responsibility for supplementing, updating, or correcting any such information.
			<LI>
				The filings service offers several useful features to enhance investors' review of SEC documents:
		<UL>
			<LI>
				Complete indexing of the documents
			<LI>
				Filing attachments
			<LI>
				Ability to download financial tables to spreadsheet format
		</UL>
		<LI><A href="javascript:pop_sec('http://ccbn.tenkwizard.com/fil_list.asp?&TK=lnty&CK=0001095158&FG=0&FC=000000&SC=ON&TC=FFFFFF&LK=000000&AL=3333FF&VL=000000&st=2&page=0&extras')" title="L90 SEC Filings">Click Here to view old L90 SEC Filings</A>
		</LI>
		</UL>

<BR><BR>
NOTE: The stock price performance shown on the quote above is not necessarily indicative of future price performance.
<BR>
<BR><BR></TD>
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

