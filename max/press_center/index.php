<?PHP
// MaxWorldwide: Interior Template V.1.00

$section = 'Press Center';
$page = ' ';

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
          <TD colspan="3" align="right" valign="top" bgcolor="#E0E0E0"><IMG src="/_images/press_center/pt_press_center.gif" width="450" height="35"><IMG src="/_images/pt_right_tab.gif" width="75" height="35"></TD>
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
          <TD><TABLE width="450" border="0" cellspacing="0" cellpadding="0">
  <TR>
    <TD>
      <P>For more information on the company, or if you are a journalist and have
        questions pertaining to MaxWorldwide, please contact: </P>
      <P>&nbsp;</P>
      <TABLE width="450" border="0" cellspacing="0" cellpadding="0">
          <TR>
            <TD bgcolor="#ececec"></TD>
          </TR>
          <TR>
            <TD height="20"  align="left" valign="middle" background="/_images/table_header_bg.gif"><SPAN class="caption_grey">&nbsp;&nbsp;</SPAN><B>PUBLIC
              RELATIONS</B></TD>
          </TR>
          <TR>
            <TD bgcolor="#999999"></TD>
          </TR>
          <TR>
            <TD bgcolor="#FFFFFF"></TD>
          </TR>
          <TR background="/_images/table_bg.gif">
            <TD align="left" valign="top" background="/_images/table_bg.gif" >
              <TABLE width="440" border="0" cellspacing="0" cellpadding="10">
                <TR align="left" valign="top">
                  <TD width="33%"> <P><B>Cheryl Dubicki</B><BR>
                      </P>
                    <P><IMG src="/_images/button_email.gif" width="12" height="12" align="absbottom">
                      <A href="mailto:cdubicki@maxworldwide.com">cdubicki@maxworldwide.com</A></P></TD>
                </TR>
              </TABLE></TD>
          </TR>
          <TR>
            <TD bgcolor="#999999"></TD>
          </TR>
        </TABLE>
      </TD>
  </TR>
</TABLE></TD>
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

