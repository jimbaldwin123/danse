<?PHP 
// MaxWorldwide: Interior Template V.1.00

$section = 'Press Center';
$page = 'Press Releases';

include($_SERVER['DOCUMENT_ROOT'].'/_templates/mw_head.php');
?>
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
          <TD colspan="3" align="right" valign="top" bgcolor="#E0E0E0"><IMG src="/_images/press_center/pt_press_releases.gif" width="450" height="35"><IMG src="/_images/pt_right_tab.gif" width="75" height="35"></TD>
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
          <TD><TABLE width="450" border="0" cellspacing="5" cellpadding="0">
  <TR> 
    <TD align=right><B>Date</B></TD>
    <TD><B>Title</B> <FONT size=-1>(click to view the full text)</FONT></TD>
  </TR>
  <?php
	require('../../_templates/xml_functions.php');

        $xmluri = "http://xml.corporate-ir.net/irxmlclient.asp?compid=70381&reqtype=newsreleases";

	$dom = GetDom($xmluri);
        $NewsReleases = $dom->get_elements_by_tagname("NewsRelease");
	foreach ($NewsReleases as $NewsRelease) {
		$pressTimeStamp =  strtotime(GetText($NewsRelease, "Date"));
		if ( (strtotime('Feb 04 2002') < $pressTimeStamp) || $_GET['archive'] ) {
			$pressDate = date("j-M-y", $pressTimeStamp);
			$title = GetText($NewsRelease, "Title");
			$ReqID = GetAttributeOfNode($NewsRelease, "ReleaseID");
			print "<TR><TD nowrap align=right valign=top><B>$pressDate</B></TD>
			<TD><A HREF=\"press_releases_display.php?REQID=$ReqID\" class=\"interior\">$title</TD></TR>";
		}
	}
	print "<TR><TD colspan=2 align=center><H3><BR>";
	if ($_GET['archive']) {
		print '<A HREF="index.php">Current</A> | Archive';
	}
	else {
		print 'Current | <A HREF="index.php?archive=1">Archive</A>';
	}
	print "</H3></TD></TR>";
?>
</TABLE>
<P><BR></P></TD>
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

