<?php
        
function TransformEngine ( $inXMLURI, $inXSLURI )
{
    $result = array ('/_xml' => GetURI($inXMLURI) );

    // Create an XSLT processor
    $xsltproc = xslt_create();

    $html = xslt_process($xsltproc, 'arg:/_xml',$inXSLURI ,NULL, $result);

    // Detect errors
    if (!$html) die('<!-- XSLT processing error: '.xslt_error($xsltproc).'-->');

    // Destroy the XSLT processor
    xslt_free($xsltproc);

    // Output the resulting HTML
    echo $html;
}

function GetURI ( $inURI )
{
    // prepend @ to function to suppress errors to stdout
        
    $buffer = "";
    $fp = @fopen($inURI,"r");

    // read response
    if ($fp)
    {
        while(!feof($fp))
        {
              $next = fread($fp,4096);
              $buffer = $buffer.$next;
        }
        fclose($fp);
    }
      else
    {
        $buffer = "";
    }
    return $buffer;
}
function GetText( $inDoc, $inNode )
{

        $Arrayer = $inDoc->get_elements_by_tagname($inNode);
        $ChildNode = $Arrayer[0]->first_child();
        return $ChildNode->node_value();
}
function GetAttribute( $inDoc, $inNode, $inAttribute )
{
	$Arrayer = $inDoc->get_elements_by_tagname($inNode);
	$ChildNode = $Arrayer[0]->get_attribute($inAttribute);
	return $ChildNode;
}

function GetAttributeOfNode ($inNode, $inAttribute )
{
	return $inNode->get_attribute($inAttribute);

}

function GetDom ($inURI )
{
	$cacheFileName =   dirname($_SERVER['PATH_TRANSLATED'])."/cache/";
	$tmpDom = @domxml_open_file($inURI);
	if (get_class($tmpDom) == "" ) {	
		// We need to go to the cache!	
		$tmpDom = @domxml_open_file($cacheFileName.md5($inURI));
		print "<!-- CACHED VERSION!!! -->";
	}
	elseif ( substr ($_SERVER['HTTP_USER_AGENT'], 0,5) == "htdig" ) {
		//Special Case - let's store it away for safekeeping!
		$cacheFilename = $cacheFileName .md5($inURI);
		//print "caching: $cacheFilename";
		$tmpDom->dump_file($cacheFilename);
	}
	return $tmpDom;
}
?>
