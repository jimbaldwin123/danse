<?PHP 
// MaxWorldwide: Interior Template V.1.00

$section = 'Investor Relations';
$page = 'Stock Chart';

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
          <TD colspan="3" align="right" valign="top" bgcolor="#E0E0E0"><IMG src="/_images/investor_relations/pt_stock_chart.gif" width="450" height="35"><IMG src="/_images/pt_right_tab.gif" width="75" height="35"></TD>
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
          <TD><FORM method=GET action="stock_chart.php">
<TABLE width="450" border="0" cellspacing="0" cellpadding="2">  
<?php
	
// First we need to Display the header with basic quote information:

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
		$quoChange = "<FONT color=green> Change +". (float) $quoChange ." (up $quoChangePct %)</font>" ;
	elseif ($quoChange < 0) 
		$quoChange = "<FONT color=red> Change ".(float) $quoChange ." (down $quoChangePct %)</font>";
	else
		$quoChange = "unchanged";
	
	$quoDate = GetText($QuoteNode, "Date");
	
	print "<TR><TD colspan=3 align=right><B> Security: $quoTicker ($quoClass)<BR><BR></TD></TR>"; 
	print "<TR><TD colspan=3 align=center>Price: <B><font size=+1>$quoTrade</font></B>";
	print "$quoChange</TD></TR>";
    print "<TR><TD colspan=3 align=center>$quoDate <EM>(minimum 20 minutes delayed)</EM><BR><BR><BR></TD></TR>";
?>

        
  <!-- Begin Chart Control -->
          
    <TR bgcolor="#999999">    
      <TD><FONT color="#FFFFFF"><B>Time Frame</B></FONT></TD>
      <TD><FONT color="#FFFFFF"><B>Frequency</B></FONT></TD>
      <TD><FONT color="#FFFFFF"><B>Compare To</B></FONT></TD>
    </TR>

<?php
	//Set up defaults
	if (!$time) $time ="1yr";
	if (!$freq) $freq ="1dy";
	if (!$compidx) $compidx = "aaaaa:0";
	if (!$ma) $ma = "1";
	if (!$maval) $maval = "50";
	if (!uf) $uf = "2048";

	//Handle some illegal conditions
	//I believe that if the Time is any form of day/hour, 
	//then the frequency must be an intraday form (default to hour)
	//Furthermore, if we are intraday, then we can't have the markers "uf"
	if (( substr($time,1,2) == "dy")  or  ( substr($time,1,2) == "hr" ) ) {
		if ( !(substr($freq,1,2) == "mi") and !(substr($freq,1,2) == "hr") ) {
			$freq="5mi";	
			$ma=0;
		}
	}
	//conversely: if it is a non intraday form of time, then it can't be an intraday frequency
	else {
		if ( (substr($freq,1,2) == "mi") or (substr($freq,1,2) == "hr") ) {
			$freq="1dy";
			$uf=0;
		}
	}

    $xmluri = "http://xml.corporate-ir.net/irxmlclient.asp?compid=70381&reqtype=chart";

    $dom = GetDom($xmluri);
    $ChartNode = $dom->get_elements_by_tagname("StockChart");
	$ChartNode = $ChartNode[0];
	$BaseURL = GetText($ChartNode,"BaseURL");
	$QueryString = "?symb=$quoTicker&time=$time&freq=$freq&compidx=$compidx&If=1&uf=0&maval=$maval&ma=$ma&size=2&style=453&type=2";
	
	print "<TR><TD bgcolor=\"#CCCCCC\">";
	MakeSelect($dom, "time", $time);
	print "</TD>";
	print "<TD bgcolor=\"#CCCCCC\">";
	MakeSelect($dom, "freq", $freq);
	print "</TD>";
	print "<TD bgcolor=\"#CCCCCC\">";
	MakeSelect($dom, "compidx", $compidx);
	print "</TD>";
	
	print "<TR bgcolor=\"#CCCCCC\"> 
      <TD colspan=\"3\" height=\"5\"><IMG src=\"/_images/spacer.gif\" width=\"50\" height=\"5\"></TD>
    </TR>";
	
	print "<TR bgcolor=\"#CCCCCC\">   
      <TD colspan=\"2\">&nbsp;</TD>
      <TD><INPUT type=SUBMIT></TD>
    </TR>";
	
	print "<TR> 
      <TD colspan=3 align=center><BR><IMG SRC=$BaseURL$QueryString width=430 height=218></TD>
    </TR>";
	

function MakeSelect ($inNode, $inName, $inSelectedValue)
{
	$ControlSets = $inNode->get_elements_by_tagname("StockChart/ControlSets/ControlSet");
	foreach ($ControlSets as $singleSet) {
		if (GetAttributeOfNode ($singleSet, "param")  == $inName) {
			print "<SELECT NAME=$inName>\n";
			//loop over the Control Set, and render it
			$ValuePairs = $singleSet->child_nodes();
			foreach ($ValuePairs as $Option) {
				$OptionValue = getAttributeOfNode($Option, "value");
				//print "|".$OptionValue."|".$inSelectedValue;
				print "<OPTION value=$OptionValue";
				if ($OptionValue == $inSelectedValue ) print " SELECTED";
				print ">".getAttributeOfNode($Option, "description")."</OPTION>\n"; 
			}	
			print "</SELECT>";
			break;	
		}
	}
}
?>
    
    <TR>   
      <TD colspan=3 class=fineprint><BR>
      <B>NOTE:</B> The stock price performance shown on the quote above is not necessarily indicative of future price performance.<BR>
      <BR>
      <BR>
      </TD>
    </TR>
          
    <TR>    
      <TD colspan=3 align=center class=fineprint>
<FONT size="1">Copyright © 1998-2001 MarketWatch.com Inc. User agreement applies. Historical and current end-of-day data provided by Interactive Data Corp. Intraday data is at least 20-minutes delayed. All times are EDT. Intraday data provided by S&P Comstock and subject to terms of use.
</FONT></TD>
    </TR>   
</TABLE>
</FORM></TD>
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

