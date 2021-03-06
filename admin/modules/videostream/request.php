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

if($_GET['accept']) {
	OpenTable();
	$result = $db->sql_query("UPDATE ".$prefix."_video_stream SET request=0 WHERE id=".$_GET['accept']."");
	Header("Location: ".$admin_file.".php?op=video_stream&Submit=request");
	die();
}

if($_GET['reject']) {
	OpenTable();
	$result = $db->sql_query("DELETE FROM ".$prefix."_video_stream WHERE id=".$_GET['reject']."");
	Header("Location: ".$admin_file.".php?op=video_stream&Submit=request");
	die();
}

OpenTable();
$result = $db->sql_query("SELECT * FROM ".$prefix."_video_stream WHERE request=1");
$rows = $db->sql_numrows($result);
if($rows != "0") {
	echo "<table width=\"100%\" border=\"1\" cellspacing=\"\" cellpadding=\"3\"><tr><td width=\"100%\">"._TITLE."</td><td nowrap>"._CATEGORY."</td>";
	echo "<td nowrap>"._POSTEDBY.":</td><td nowrap>"._POSTEDON.":</td><td colspan=\"4\" nowrap>&nbsp;</td></tr>";
	while($row = $db->sql_fetchrow($result)) {
		echo "<tr>";
		echo "<td nowrap>".$row['vidname']."</td>";
		$category = $db->sql_query("SELECT name FROM ".$prefix."_video_stream_categories WHERE id=".$row['category']."");
		$rowcat = $db->sql_fetchrow($category);
		if($rowcat['name'] == "") { $catname = ""._NONE.""; } else { $catname = $rowcat['name']; }
		echo "<td nowrap>".$catname."</td>";
		echo "<td nowrap>".$row['user']."</td>";
		echo "<td nowrap>".$row['date']."</td>";
		$rejectloc = $admin_file.".php?op=video_stream&Submit=request&amp;reject=".$row['id'];
		$acceptloc = $admin_file.".php?op=video_stream&Submit=request&amp;accept=".$row['id'];
		echo "<td nowrap><a href=\"modules.php?name=Video_Stream&amp;page=watch&amp;id=request&amp;request=".$row['id']."\">"._VVIEW."</a></td>";
		echo "<td nowrap><a href=\"".$admin_file.".php?op=video_stream&Submit=editvid&id=".$row['id']."\">"._EDIT."</a></td>";
		echo "<td nowrap><a href=\"javascript:disp_confirm('$rejectloc', '"._DREQUESTCOM."')\">"._REJECT."</a></td>";
		echo "<td nowrap><a href=\"javascript:disp_confirm('$acceptloc', '"._AREQUESTCOM."')\">"._ACCEPT."</a></td>";
		echo "</tr>";
	}
	echo "</table>";
} else {
	echo "<center>"._NOVIDSRE."<br><br>"._GOBACKVID." <a href=\"".$admin_file.".php?op=video_stream\">"._GO."</a></center>";
}
CloseTable();
?>