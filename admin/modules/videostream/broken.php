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
LinkAdmin();
VideoStreamMenu();

if ($_GET['deleteent']) {
	$db->sql_query("DELETE FROM ".$prefix."_video_stream_broken WHERE brokenvidid='".$deleteent."'");
	Header("Location: ".$admin_file.".php?op=video_stream&Submit=broken");
	die();
}

OpenTable();
echo "<div align='center'><FONT class=title>"._REPORTEDBROKE."</FONT></div>\n"
."<br>\n";
$result = $db->sql_query("SELECT * FROM ".$prefix."_video_stream_broken");
$rows = $db->sql_numrows($result);
if ($rows != "0") {
	echo "<table width='100%' border='1'>\n"
	."  <tr>\n"
	."    <td>"._VIDNAME."</td>\n"
	."    <td>"._USERNAME."</td>\n"
	."    <td colspan='5'>"._EMAIL."</td>\n"
	."  </tr>\n";
	while($row = $db->sql_fetchrow( $result )) {
		$videoname = $db->sql_query("SELECT vidname FROM ".$prefix."_video_stream WHERE id=".$row['brokenvidid']."");
		$rowname = $db->sql_fetchrow($videoname);
		$deletevidloc = "".$admin_file.".php?op=video_stream&Submit=deletevid&id=".$row['brokenvidid']."&loc=broken";
		$deleteentloc = "".$admin_file.".php?op=video_stream&amp;Submit=broken&amp;deleteent=".$row['brokenvidid']."";
		echo "  <tr>"
		."    <td>".$rowname['vidname']."</td>\n"
		."    <td>".$row['username']."</td>\n"
		."    <td>".$row['email']."</td>\n"
		."    <td><a href='modules.php?name=Video_Stream&page=watch&id=".$row['brokenvidid']."'>"._VVIEW."</a></td>\n"
		."    <td><a href='".$admin_file.".php?op=video_stream&amp;Submit=editvid&amp;id=".$row['brokenvidid']."'>"._EDIT."</a></td>\n"
		."    <td><a href=\"javascript:disp_confirm('$deletevidloc', '"._DELETEVIDCOMFIRM."')\">"._DELETE."</a></td>\n"
		."    <td><a href=\"javascript:disp_confirm('$deleteentloc', '"._DELETEENT."')\">"._DELETEENT."</a></td>\n"
		."  </tr>\n";
	}
	echo "</table>\n";
	echo "<br><br><center>"._GOBACKVID." <a href='".$admin_file.".php?op=video_stream'>"._GO."</a></center>\n";
} else {
	echo "<center>"._NOBROKEN."<br><br>"._GOBACKVID." <a href='".$admin_file.".php?op=video_stream'>"._GO."</a></center>\n";
}
CloseTable();
?>