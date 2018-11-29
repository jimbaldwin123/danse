<?PHP 
// MaxWorldwide: Interior Template V.1.00

$section = '';
$page = '';

include($_SERVER['DOCUMENT_ROOT'].'/_templates/mw_head.php');
?>
<BODY <? echo $bodyAttrib ?> onLoad="MM_preloadImages('<? echo $onloadNav ?>')">
<? include($_SERVER['DOCUMENT_ROOT'].'/_templates/mw_main_nav.php'); ?>
<TABLE width=700 border="0" cellpadding="10" bgcolor="#E0E0E0" cellspaceing="0">
<TR><TD>
<?php
   # $Id: search.php,v 1.2 2001/10/12 17:51:28 junkmale Exp $
   #
   # This is a php wrapper for use with htdig (http://www.htdig.org/)
   #
   # Copyright (c) 2001 DVL Software Limited
   # http://www.dvl-software.com/



$Debug = 0;  # set to non-zero to display debugging messages
$HTSEARCH_PROG = "/home/httpd/cgi-bin/htsearch";
$Parameters = $HTTP_POST_VARS;
$QueryString = $HTTP_SERVER_VARS["QUERY_STRING"];

if ($QueryString) {
	$ArrayParm  = ConvertQueryStringToArray($QueryString, ";");
    # these are the fields which the user fills in
    $method   = $ArrayParm["method"];
    $format   = $ArrayParm["format"];
    $sort     = $ArrayParm["sort"];
    $words    = urldecode($ArrayParm["words"]);
    # these fields are hidden and therefore don't need to be populated
    # but are provided for completeness
    #$config   = $ArrayParm["config"];
    #$restrict = $ArrayParm["restrict"];
    #$exclude  = $ArrayParm["exclude"];
    #$submit   = $ArrayParm["submit"];
    #$page     = $ArrayParm["page"];
   }

$words = strip_tags($words);




function ConvertQueryStringToArray($QueryString, $Delimiter) {
   # if there's nothing to do, do nothing.
   if (strlen($QueryString)) {
      # split the query string into an array.
      $SimpleArray = explode($Delimiter, $QueryString);
      
	# taken each element of the array, which will have
      # elements 0..n where each element is of the form
      # "keyn"="valuen" and split them into "keyn" and "valuen"
      #
      while (list($key, $value) = each($SimpleArray)) {
         list($KeyN, $ValueN) = split("=", $value);
         # put that key/value pair into the result we are going to pass back
         $Result[$KeyN] = $ValueN;
      }
   } else {
      echo "nothing found<br>\n";
   }

   return $Result;
}

function CompileQuery($HTTP_POST_VARS) {

   $query = '';

   while (list($name, $value) = each($HTTP_POST_VARS)) {
      $query = $query . "$name=$value;";
   }

   # remove the trailing ;
   $query = substr($query, 0, strlen($query) - 1);

   return $query;
}

#
# if the user clicked on Search or we have a query string
#
if ($Parameters || strlen($HTTP_SERVER_VARS["QUERY_STRING"])) {

   if (count($Parameters)) {
      $query = CompileQuery($Parameters);
   } else {
      $query = $HTTP_SERVER_VARS["QUERY_STRING"];
   }
   $command="$HTSEARCH_PROG \"$query\"";
   exec($command,$result);

   # debug: look at the output.  useful for seeing what is where
   if ($Debug) {
      while (list($k,$v) = each($result)) {
         echo "$k -> $v \n<BR>";
      }
   }

   # how many rows do we have?
   $rc = count($result);

   # all these magic numbers have got to go
   if ($rc < 3) {
      echo "There was an error executing this query.  Please try later.\n";
   } else {
      if ($result[2]=="NOMATCH") {
         echo "There were no matches for <B>$words</B> found on the website.<P>\n";
      } else {
         if ($result[2]=="SYNTAXERROR") {
            echo "There is a syntax error in your search for <B>$search</B>:<BR>";
            echo "<PRE>" . $result[3] . "</PRE>\n";
         } else {
            #
            # display the headers, this includes the forum, the search
            # parameters, etc.
            #

            $ResultSetStart = 1;
            for ($i = $ResultSetStart; $i < $rc; $i++) {
               echo $result[$i];
            }
         }
      }
   }
}

?>
</TD></TR>
</TABLE>
<? include($_SERVER['DOCUMENT_ROOT'].'/_templates/mw_footer.inc'); ?>
</BODY>
</HTML>

