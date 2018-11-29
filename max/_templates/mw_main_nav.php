<?PHP
$header = '<TABLE width="700" border="0" cellspacing="0" cellpadding="0">
  <TR> 
    <TD width="350" rowspan="2"><A href="/index.php"><IMG src="/_images/hdr_left.jpg" alt="MaxWorldwide, Inc." width="350" height="78" border="0"></A></TD>
    <TD colspan="2"><IMG src="/_images/hdr_right_corner.jpg" width="256" height="30"><A href="/sitemap/index.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage(\'sitemap\',\'\',\'/_images/hdr_right_sitemap_ov.gif\',1)"><IMG src="/_images/hdr_right_sitemap.gif" alt="Sitemap" name="sitemap" width="53" height="30" border="0" id="sitemap"></A><A href="/help/index.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage(\'help\',\'\',\'/_images/hdr_right_help_ov.gif\',1)"><IMG src="/_images/hdr_right_help.gif" alt="Help" name="help" width="41" height="30" border="0"></A></TD>
  </TR>
  <TR> 
    <TD width="31" align="right"><IMG src="/_images/hdr_right_bottom_holder.gif" width="31" height="48"></TD>
    <TD width="320" align="right" valign="bottom" background="/_images/hdr_right_bottom.jpg"><FORM method=POST action="/htdig/search.php"><INPUT name="words" type=text size="15">&nbsp;<INPUT name="imageField" class="search" type="image" src="/_images/hdr_search_btn.gif" align="top" border="0">&nbsp;</FORM></TD>
  </TR>
</TABLE><TABLE WIDTH="700" BORDER="0" CELLSPACING="0" CELLPADDING="0">
  <TR> 
    <TD>';

// Company Button
	if(strtolower($section) == "company"){
		$header .= '<A href="/company/index.php"><IMG src="/_images/nav_company_dn.jpg" alt="Company" name="company" width="68" height="21" border="0"></A></TD>';
	}else{
		$header .= '<A href="/company/index.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage(\'company\',\'\',\'/_images/nav_company_ov.jpg\',1)"><IMG src="/_images/nav_company.jpg" alt="Company" name="company" width="68" height="21" border="0"></A></TD>';
	}

// Divisions Button
	if(strtolower($section) == "divisions"){
		$header .= '<TD><A href="/divisions/index.php"><IMG src="/_images/nav_divisions_dn.jpg" alt="Divisions" name="divisions" width="73" height="21" border="0"></A></TD>';
	}else{
		$header .= '<TD><A href="/divisions/index.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage(\'divisions\',\'\',\'/_images/nav_divisions_ov.jpg\',1)"><IMG src="/_images/nav_divisions.jpg" alt="Divisions" name="divisions" width="73" height="21" border="0"></A></TD>';
	}

// Press Center Button
	if(strtolower($section) == "press center"){
		$header .= '<TD><A href="/press_center/index.php"><IMG src="/_images/nav_presscenter_dn.jpg" alt="Press Center" name="press" width="90" height="21" border="0"></A></TD>';
	}else{
		$header .= '<TD><A href="/press_center/index.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage(\'press\',\'\',\'/_images/nav_presscenter_ov.jpg\',1)"><IMG src="/_images/nav_presscenter.jpg" alt="Press Center" name="press" width="90" height="21" border="0"></A></TD>';
	}

// Investor Relations Button
	if(strtolower($section) == "investor relations"){
		$header .= '<TD><A href="/investor_relations/index.php"><IMG src="/_images/nav_investorrelations_dn.jpg" alt="Investor Relations" name="ir" width="128" height="21" border="0"></A></TD>';
	}else{
		$header .= '<TD><A href="/investor_relations/index.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage(\'ir\',\'\',\'/_images/nav_investorrelations_ov.jpg\',1)"><IMG src="/_images/nav_investorrelations.jpg" alt="Investor Relations" name="ir" width="128" height="21" border="0"></A></TD>';
	}

// Contact Button
	if(strtolower($section) == "contact"){
		$header .= '<TD><A href="/contact/index.php"><IMG src="/_images/nav_contact_dn.jpg" alt="Contact" name="contact" width="69" height="21" border="0"></A></TD>';
	}else{
		$header .= '<TD><A href="/contact/index.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage(\'contact\',\'\',\'/_images/nav_contact_ov.jpg\',1)"><IMG src="/_images/nav_contact.jpg" alt="Contact" name="contact" width="69" height="21" border="0"></A></TD>';
	}
    
$header .= '<TD><IMG src="/_images/nav_endcap.jpg" width="273" height="21"></TD>
  </TR>
</TABLE>';

echo $header;
?>



