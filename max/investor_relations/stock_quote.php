<?PHP 
// MaxWorldwide: Interior Template V.1.00

$section = 'Investor Relations';
$page = 'Stock Quote';

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
          <TD colspan="3" align="right" valign="top" bgcolor="#E0E0E0"><IMG src="/_images/investor_relations/pt_stock_quote.gif" width="450" height="35"><IMG src="/_images/pt_right_tab.gif" width="75" height="35"></TD>
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
          <TD><TABLE width=450>
<?php
	require('../_templates/xml_functions.php');

        $xmluri = "http://xml.corporate-ir.net/irxmlclient.asp?compid=70381&reqtype=quotes";

	$dom = GetDom($xmluri);
        $QuoteNode = $dom->get_elements_by_tagname("StockQuotes/Stock_Quote");
        $QuoteNode = $QuoteNode[0];
        
	$quoTicker = GetAttributeOfNode($QuoteNode, "Ticker");
	$quoClass = GetAttributeOfNode($QuoteNode, "Class");
        $quoTrade= GetText($QuoteNode, "Trade");
	$quoPreviousClose = GetText($QuoteNode, "PreviousClose");
	$quoChange = GetText($QuoteNode, "Change");
	$quoChangePct = abs(round(($quoChange / $quoPreviousClose) * 100,2));
	if ($quoChange > 0) 
		$quoChange = "<FONT color=green>+ ". (float) $quoChange ." (up $quoChangePct %)</font>" ;
	elseif ($quoChange < 0) 
		$quoChange = "<FONT color=red> ".(float) $quoChange ." (down $quoChangePct %)</font>";
	else
		$quoChange = "unchanged";
	
	$quoHigh = GetText($QuoteNode, "High");
	$quoLow = GetText($QuoteNode, "Low");
	$quoVolume = number_format(GetText($QuoteNode, "Volume"));
	$quoDate = GetText($QuoteNode, "Date");
	$quoExchange = GetAttributeOfNode($QuoteNode, "Exchange");
	$quo52WeekHigh = GetText($QuoteNode, "FiftyTwoWeekHigh");
        $quo52WeekLow = GetText($QuoteNode, "FiftyTwoWeekLow");
        $quo52WeekHighDate = date("j-M-y", strtotime(GetText($QuoteNode, "FiftyTwoWeekHighDate")));
        $quo52WeekLowDate = date("j-M-y", strtotime(GetText($QuoteNode, "FiftyTwoWeekLowDate")));

//Print them all out
	print "<TR><TD colspan=2 align=right><B> Security: $quoTicker ($quoClass)<BR><BR></TD></TR>"; 
	print "<TR><TD colspan=2 align=right><font size=-2>Minimum 20 minutes delayed</font></TD></TR>";

	print "<TR><TD colspan=2 align=center><H3>$quoTrade<BR>
	$quoChange</H3></TD></TR>
	<TR><TD align=left>Current Day's High:</TD><TD align=right> $quoHigh </TD></TR>
        <TR><TD align=left>Current Day's Low:</TD><TD align=right> $quoLow </TD></TR>
        <TR><TD align=left>Current Day's Volume:</TD><TD align=right> $quoVolume shares</TD></TR>
        <TR><TD align=left>Last Trade:</TD><TD align=right> $quoDate </TD></TR>
        <TR><TD align=left>Stock Exchange:</TD><TD align=right> $quoExchange </TD></TR>";

	print "<TR><TD align=left valign=top>52-Week Range:</TD>
	<TD align=right> $quo52WeekLow - $quo52WeekHigh <BR>
	$quo52WeekLowDate - $quo52WeekHighDate </TD></TR>";
	 
?>
<TR><TD><BR><BR></TD></TR>
<TR><TD colspan=2 class=fineprint>
NOTE: The stock price performance shown on the quote above is not necessarily indicative of future price performance.
<BR><BR><BR></TD></TR>
<TR><TD colspan=2 align=center class=fineprint>
Copyright © 1998-2001 MarketWatch.com Inc. User agreement applies. Historical and current end-of-day data provided by Interactive Data Corp. Intraday data is at least 20-minutes delayed. All times are EDT. Intraday data provided by S&P Comstock and subject to terms of use.
</TD></TR></TABLE>
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

