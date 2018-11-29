<?PHP 
// MaxWorldwide: Interior Template V.1.00

$section = '';
$page = '';

include($_SERVER['DOCUMENT_ROOT'].'/_templates/mw_head.php');
?>
<BODY <? echo $bodyAttrib ?> onLoad="MM_preloadImages('<? echo $onloadNav ?>')">
<? include($_SERVER['DOCUMENT_ROOT'].'/_templates/mw_main_nav.php'); ?>
<TABLE width="700" border="0" cellpadding="0" cellspacing="0" bgcolor="#E0E0E0">
  <TR> 
    <TD width="524" valign="top"><TABLE width="699" border="0" cellspacing="0" cellpadding="10">
        <TR> 
          <TD width="10">&nbsp;</TD>
          <TD><H3><FONT color="#003366"><BR>
              <BR>
              We're sorry!</FONT></H3>
            <P>It appears the page you were trying to locate is unavailable.</P>
            <P>Return to <A href="http://www.maxworldwide.com">www.maxworldwide.com</A> 
              or view our <A href="/sitemap/index.php">SiteMap</A> to find what 
              you're looking for. </P></TD>
        </TR>
      </TABLE>
      <BR> <BR> </TD>
    <TD width="1" bgcolor="#000000"><IMG src="/_images/spacer.gif" width="1" height="200"></TD>
  </TR>
  <TR> 
    <TD colspan="2"><IMG src="/_images/frame_bottom.gif" width="700" height="6"></TD>
  </TR>
</TABLE>
<? include($_SERVER['DOCUMENT_ROOT'].'/_templates/mw_footer.inc'); ?>
</BODY>
</HTML>

