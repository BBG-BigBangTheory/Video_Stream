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
///////////////////////////////////////////
/////Layout by Q @ www.3c0x1.net///////////
///////////////////////////////////////////
if (!defined('MODULE_FILE')) {
   die ("You can't access this file directly...");
}

global $dbi, $user;
include('header.php');
include('modules/Video_Stream/javascript.php');
echo "<link href=\"modules/Video_Stream/css.css\" rel=\"stylesheet\" type=\"text/css\">\n";
vsnavtop();
OpenTable();
sortandsearch();
echo "<hr><br>\n";

if (($d == "") || ($d == 0)) {
	$d = 1;
}
$sqld = $d - 1;
$sqld *= $limit;
$result = $db->sql_query("SELECT * FROM ".$prefix."_video_stream ".$sortby2." ".$sortby1." LIMIT $sqld,$limit");
$rowvid = $db->sql_numrows($result);
$result2 = $db->sql_query("SELECT * FROM ".$prefix."_video_stream ".$sortby2." ".$sortby1."");
$rowvid2 = $db->sql_numrows($result2);


//////////////////////////////////////////////
// If videos are in the DB then they are displayed.
$qn=0;
if ($rowvid != "0") {
	echo "<table width=\"100%\" border=\"0\">";
	while($row = $db->sql_fetchrow( $result )) {
	
	$qvidid = $row['vidid'];
	$qcomments = $db->sql_query("SELECT * FROM ".$prefix."_video_stream_comments where vidid = ".vidid." LIMIT $sqld,$limit");
$rowvid = $db->sql_numrows($qcoments);


	/////////////////////
	if ($qn == 1) {
	echo "<td width=\"50%\">";
	$qn=0;
	} else {
	echo "<tr><td width=\"50%\">";
	$qn=1;
	}
	/////////////////////
		$userav = $row['user'];
		if ($row['rating'] == "") {$rating = "0";} else {$rating = $row['rating'];}
		$id = $row['id'];
		echo "<table width=\"100%\" border=\"1\"><td width=\"175\">";
			$image = $row['imgurl'];
if(getimagesize($image) == false) {
		/////////
	//	echo "<table width=\"100%\" border=\"1\"><td>";

			echo "<a href=\"modules.php?name=Video_Stream&amp;page=watch&amp;id=".$row['id']."&amp;d=".$d."\"><img src=\"modules/Video_Stream/images/noimage.gif\" border=\"0\" width=\"175\" height=\"150\" alt=\"".$row['vidname']."\"></a>\n";
		} else{
			echo "<a href=\"modules.php?name=Video_Stream&amp;page=watch&amp;id=".$row['id']."&amp;d=".$d."\"><img src=\"".$image."\" border=\"0\" width=\"175\" height=\"150\" alt=\"".$row['vidname']."\"></a>\n";
		}
		echo "</td><td>";
				//category($id);

		echo "<a href=\"modules.php?name=Video_Stream&amp;page=watch&amp;id=".$row['id']."&amp;d=".$d."\">".$row['vidname']."</a>";
		echo "<br> Posted by ".$row['user']." <a href=\"modules.php?name=Video_Stream&amp;page=search&amp;search=user:".$row['user']."\">["._MOREFROMUSER."]</a>\n";
		echo "<br><strong>".$row['date']."</strong>";
		
			echo"<span style=\"float:left\">
	      <a class=\"addthis_button_twitter\"></a>
	      <a class=\"addthis_button_facebook\"></a>   
	      <a class=\"addthis_button_google\"></a>     
	      <a class=\"addthis_button_compact\"></a>
	      <a class=\"addthis_counter addthis_bubble_style\"></a>
	</div></span>\n"; 

		echo "<br>" .$row['description']. "" ;
		echo "<br><b>"._VIEWS.":</b> ".$row['views']."&nbsp;\n";
	//	$image = $row['imgurl'];
		echo "<td width=\"100\">";
		category($id);
		echo "</td></td></tr></table>";
		///////
		if ($qn == 1) {	echo "</td>"; }
	}

	echo "</tr></table>";
////////////////////////////////////////////////////
//ZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZ

	$pages   = ceil($rowvid2 / $limit);
	echo "<table width=\"100%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
	echo "  <tr>\n";
	echo "    <td width=\"30%\">\n";
	if ($d > 1) {
		$p = $d - 1;
		echo "      <div align=\"left\"><a href=\"modules.php?name=Video_Stream&amp;d=".$p."\">"._PREVIOUS."</a></div>\n";
	} else {
		echo "      &nbsp;\n";
	}
	echo "    </td>\n";
	echo "    <td width=\"40%\"><div align=\"center\">\n";
	pagesnav($d, $pages);
	echo "      <br>"._PAGE." ".$d."/".$pages."</div>\n";
	echo "    </td>\n";
	echo "    <td width=\"30%\">\n";
	if ($d < $pages) {
		$d += 1;
		echo "      <div align=\"right\"><a href=\"modules.php?name=Video_Stream&amp;d=".$d."\">"._NEXT."</a></div>\n";
	} else {
		echo "&nbsp;\n";
	}
	echo "  </td></tr></table>\n";

	
} else {

	// If no videos have been added then user is told no videos
	echo "<center>"._NOVIDSINDB."</center>\n";
}

CloseTable();
echo "<br>\n";
stats();

//***************************************************************
// IF YOU WANT TO LEGALY REMOVE ANY COPYRIGHT NOTICES PLAY FAIR AND CHECK: http://www.steezmatic-designs.com/modules.php?name=Commercial_License
// COPYRIGHT NOTICES ARE GPL SECTION 2(c) COMPLIANT AND CAN'T BE REMOVED WITHOUT STEEZMATIC DESIGNS' AUTHOR WRITTEN AUTHORIZATION
// YOU'RE NOT AUTHORIZED TO CHANGE THE CODE UNTIL YOU ACQUIRE A COMMERCIAL LICENSE
// (http://www.steezmatic-designs.com/modules.php?name=Commercial_License)
//***************************************************************
echo "<br>\n";
OpenTable();
echo "HTTP Video Stream Module<br>By <a href=\"http://www.steezmatic-designs.com\">Steezmatic Designs</a>\n";
CloseTable();
// END OF COPYRIGHT

include('footer.php');
?>