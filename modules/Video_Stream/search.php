<?php
/************************************************************************/
/* PHP-NUKE: Advanced Content Management System                         */
/* ============================================                         */
/*                                                                      */
/* Video Stream Module for PHP-Nuke with many features                  */
/*                                                                      */
/* Copyright (c) 2006 by Scott Cariss (Brady)                           */
/* http://www.steezmatic-designs.com                                    */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/
if (!defined('MODULE_FILE')) {
   die ("You can't access this file directly...");
}

include('header.php');
include('modules/Video_Stream/javascript.php');
echo "<link href=\"modules/Video_Stream/css.css\" rel=\"stylesheet\" type=\"text/css\">";
vsnavtop();
OpenTable();
sortandsearch();
echo "<br><hr><br>";

if (($d == "") || ($d == 0)) {
	$d = 1;
}
$sqld = $d - 1;
$sqld *= $limit;

$limit = $limit * 2;
$result = $db->sql_query("SELECT * FROM ".$prefix."_video_stream ".$sortby2." AND ".$searchtd." LIKE '%$word%' ".$sortby1." LIMIT $sqld,$limit");
$result2 = $db->sql_query("SELECT * FROM ".$prefix."_video_stream ".$sortby2." AND ".$searchtd." LIKE '%$word%' ".$sortby1."");
$rowvid2 = $db->sql_numrows($result2);

if($row = $db->sql_numrows($result) != 0) {
echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">";
	while($row = $db->sql_fetchrow($result)) {
	$id = $row['id'];
	
	echo "<tr>";
	echo "<td nowrap=\"nowrap\" valign=\"top\">";
	
	$image = $row['thumbimg'];
	echo "<table border=\"3\" cellspacing=\"0\" cellpadding=\"0\"><tr>";
		if(getimagesize($image) === false) {
			echo "          <td><a href=\"modules.php?name=Video_Stream&amp;page=watch&amp;id=".$row['id']."&amp;d=".$d."\"><img src=\"modules/Video_Stream/images/noimage_sm.gif\" border=\"0\" width=\"50\" height=\"50\" alt=\"".$row['vidname']."\"></a></td>";
		} else{
			echo "          <td><a href=\"modules.php?name=Video_Stream&amp;page=watch&amp;id=".$row['id']."&amp;d=".$d."\"><img src=\"".$image."\" border=\"0\" width=\"50\" height=\"50\" alt=\"".$row['vidname']."\"></a></td>";
		}
	echo "</tr></table>";
	
	echo "</td>";
    echo "<td width=\"100%\" valign=\"top\"><a href=\"modules.php?name=Video_Stream&amp;page=watch&amp;id=".$row['id']."\">".$row['vidname']."</a>
		  <br>".$row['description']."<br>"._VIEWS.": ".$row['views']."
		  "._RATING.": ".@number_format(($row['rating'] / $row['rates']), 2)." "._TVOTES.": ".$row['rates']."</td>";
    echo "<td nowrap=\"nowrap\" valign=\"top\">";
	category($id);
	echo "</td>";
	echo "</tr>";
	}
	echo "</table>";
	
	$pages   = ceil($rowvid2 / $limit);
	
	echo "<table width=\"100%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td width=\"30%\">";
	
	if ($d > 1) {
		$p = $d - 1;
		echo "<div align=\"left\"><a href=\"modules.php?name=Video_Stream&amp;page=search&amp;d=".$p."\">"._PREVIOUS."</a></div>";
	} else {
		echo "&nbsp;";
	}

	echo "</td><td width=\"40%\"><div align=\"center\">";
	pagesnav($d, $pages);
	echo "<br>"._PAGE." ".$d."/".$pages."</div></tr><td width=\"30%\">";

	if ($d < $pages) {
		$d += 1;
		echo "<div align=\"right\"><a href=\"modules.php?name=Video_Stream&amp;page=search&amp;d=".$d."\">"._NEXT."</a></div>";
	} else {
		echo "&nbsp;";
	}

	
	echo "</td></tr></table>";
} else {
	echo "<div align=\"center\">"._NOMATCHES."</div>";
}
CloseTable();

//***************************************************************
// IF YOU WANT TO LEGALY REMOVE ANY COPYRIGHT NOTICES PLAY FAIR AND CHECK: http://www.steezmatic-designs.com/modules.php?name=Commercial_License
// COPYRIGHT NOTICES ARE GPL SECTION 2(c) COMPLIANT AND CAN'T BE REMOVED WITHOUT STEEZMATIC DESIGNS' AUTHOR WRITTEN AUTHORIZATION
// YOU'RE NOT AUTHORIZED TO CHANGE THE CODE UNTIL YOU ACQUIRE A COMMERCIAL LICENSE
// (http://www.steezmatic-designs.com/modules.php?name=Commercial_License)
//***************************************************************
echo "<br>\n";
OpenTable();
echo "BigBangGamers Video Stream\n";
CloseTable();
// END OF COPYRIGHT

include('footer.php');
?>