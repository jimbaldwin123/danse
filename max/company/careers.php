<?PHP 
// MaxWorldwide: Interior Template V.1.00

$section = 'Company';
$page = 'Careers';

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
          <TD colspan="3" align="right" valign="top" bgcolor="#E0E0E0"><IMG src="/_images/company/pt_careers.gif" width="450" height="35"><IMG src="/_images/pt_right_tab.gif" width="75" height="35"></TD>
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
          <TD><P>As the company and our client list continue to expand, MaxWorldwide 
              has taken aggressive steps to solidify the company's infrastructure 
              and recruit the best leadership and team members. We offer a dynamic 
              and entrepreneurial team-based work environment and provide an exciting 
              opportunity to contribute to the growth of this visionary media 
              company. </P>
            If you are interested in applying for a position with MaxWorldwide 
            or any of our divisions, please forward your resume and cover letter 
            to <A href="mailto:careers@maxworldwide.com" class="interior">careers@maxworldwide.com</A>. 
            Please indicate which position you're seeking and in which city you're 
            interested in working. </TD>
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

