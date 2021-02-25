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

// Set vids per page limit
if($_POST['saveset']) {
	$limit = "".$_POST['limitvids']."";
	$result = $db->sql_query("UPDATE ".$prefix."_video_stream_settings SET limitvids=$limit WHERE id=1");
}
$result = $db->sql_query("SELECT * FROM ".$prefix."_video_stream_settings WHERE id=1");
$row = $db->sql_fetchrow($result);
$limit = $row['limitvids'];

if ($d == "") {
	$d = 0;
}
OpenTable();
$d *= $limit;
$getlimit = $db->sql_query("SELECT * FROM ".$prefix."_video_stream WHERE request=0 ORDER BY id DESC LIMIT $d,$limit");
$row10 = $db->sql_numrows($getlimit);
@$d /= $limit;
$getall = $db->sql_query("SELECT * FROM ".$prefix."_video_stream WHERE request=0");
$rowall = $db->sql_numrows($getall);

// If videos are in the DB then they are displayed in a table.
if ($row10 != "0") {
	echo "<table width=\"100%\"  border=\"1\" cellspacing=\"0\" cellpadding=\"3\"><tr><td width=\"100%\"><b>"._TITLE."</b></td><td nowrap><b>"._POSTEDON."</b></td><td nowrap><b>"._POSTEDBY."</b></td><td nowrap><b>"._VIEWS."</b></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
	while($row10 = $db->sql_fetchrow($getlimit)) {
		$deletevidloc = "".$admin_file.".php?op=video_stream&amp;Submit=deletevid&amp;id=".$row10['id']."&amp;d=$d&amp;loc=manage";
		echo "<tr>";
		echo "<td nowrap><a href=\"modules.php?name=Video_Stream&amp;page=watch&amp;id=".$row10['id']."\">".$row10['vidname']."</a></td>";
		echo "<td nowrap>".$row10['date']."</td>";
		echo "<td nowrap>".$row10['user']."</td>";
		echo "<td nowrap>".$row10['views']."</td>";
		echo "<td nowrap><a href=\"modules.php?name=Video_Stream&amp;page=watch&amp;id=".$row10['id']."\">"._VVIEW."</a></td>";
		echo "<td nowrap><a href=\"".$admin_file.".php?op=video_stream&amp;Submit=editvid&amp;id=".$row10['id']."\">"._EDIT."</a></td>";
		echo "<td nowrap><a href=\"javascript:disp_confirm('$deletevidloc', '"._DELETEVIDCOMFIRM."')\">"._DELETE."</a></td>";
		echo "</tr>";
	}
	echo "</table>";

	$pages   = ceil($rowall / $limit);
	$current = $d + 1;

echo "<br><table width=\"100%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td width=\"30%\">";

if ($d >= 1) {
	$p = $d - 1;
	echo "<div align=\"left\"><a href=\"".$admin_file.".php?op=video_stream&amp;d=".$p."\">"._PREVIOUS."</a></div>";
} else {
	echo "&nbsp;";
}

echo "</td><td width=\"40%\"><div align=\"center\">"._PAGE." ".$current."/".$pages."</div></tr><td width=\"30%\">";

if ($current < $pages) {
	$d += 1;
	echo "<div align=\"right\"><a href=\"".$admin_file.".php?op=video_stream&amp;d=".$d."\">"._NEXT."</a></div>";
} else {
	echo "&nbsp;";
}

echo "</td></tr></table>";
} else {
	// If no videos have been added then user is told no videos
	echo "<center>"._NOVIDSINDB."</center>";
}
echo "<br><br><center><b>"._VIDSPERPAGE."</b><form name=\"form1\" method=\"post\" action=\"\">
	  <input name=\"limitvids\" type=\"text\" size=\"3\" value=\"".$limit."\" />
	  <input type=\"submit\" name=\"saveset\" value=\""._CHANGE."\" />
	  </form></center>";

CloseTable();
echo "<br>";
// YOU MAY NOT REMOVE, EDIT, OR MARK OUT THE FOLLOWING PAYPAL CODE. IT IS PART OF OUR COPYRIGHT.
PayPalDonate();
// END OF COPYRIGHT.
echo "<br>";
VersionChecker();
?>