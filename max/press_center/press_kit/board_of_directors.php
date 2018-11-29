<?PHP 
// MaxWorldwide: Interior Template V.1.00

$section = 'Press Center';
$page = 'Press Kit';

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
          <TD colspan="3" align="right" valign="top" bgcolor="#E0E0E0"><IMG src="/_images/press_center/pt_press_kit.gif" width="450" height="35"><IMG src="/_images/pt_right_tab.gif" width="75" height="35"></TD>
        </TR>
      </TABLE>
      <TABLE width="524" border="0" cellpadding="0" cellspacing="0">
        <TR> 
          <TD rowspan="4"> <IMG src="/_images/pk_subnav_left.gif" width="295" height="79"></TD>
          <TD><A href="/press_center/press_kit/company_overview.php"><IMG src="/_images/pk_subnav_01.gif" width="156" height="22" border="0"></A></TD>
          <TD rowspan="4"><IMG src="/_images/pk_subnav_right.gif" width="74" height="79"></TD>
        </TR>
        <TR> 
          <TD><A href="/press_center/press_kit/corporate_fact_sheet.php"><IMG src="/_images/pk_subnav_02.gif" width="156" height="18" border="0"></A></TD>
        </TR>
        <TR> 
          <TD><A href="/press_center/press_kit/executive_profiles.php"><IMG src="/_images/pk_subnav_03.gif" width="156" height="18" border="0"></A></TD>
        </TR>
        <TR> 
          <TD height="2"><A href="/press_center/press_kit/board_of_directors.php"><IMG src="/_images/pk_subnav_04.gif" width="156" height="21" border="0"></A></TD>
        </TR>
      </TABLE></TD>
  </TR>
  <TR> 
    <TD width="524" valign="top">
<TABLE width="524" border="0" cellspacing="0" cellpadding="10">
        <TR> 
          <TD width="10">&nbsp;</TD>
          <TD><? include ($_SERVER['DOCUMENT_ROOT'].'/company/board_of_directors.inc'); ?>
          </TD>
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

