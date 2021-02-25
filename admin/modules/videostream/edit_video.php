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

if($_POST['EDITIT']) {
	$T = $_POST['title']; $D = $_POST['description']; $U = @html_entity_decode($_POST['url']); $C = $_POST['picurl'];
	$W = $_POST['width']; $H = $_POST['height']; $P = $_POST['plugin']; $CA = $_POST['category']; $DA = $_POST['date'];
	$TI = $_POST['thumbimg'];
	$result = $db->sql_query("UPDATE ".$prefix."_video_stream SET vidname='$T', description='$D', url='$U', imgurl='$C', thumbimg='$TI', width='$W', height='$H', flash='$P', category='$CA', date='$DA' WHERE id=$id");
}
OpenTable();

$result = $db->sql_query("SELECT * FROM ".$prefix."_video_stream WHERE id=$id");
$row = $db->sql_fetchrow($result);
echo "<style type=\"text/css\"> .redstar {color: #FF0000;} </style>";
echo "<form name=\"form1\" method=\"post\" action=\"\"><table width=\"360\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">";
echo "<tr><td colspan=\"2\"><div align=\"center\" class=\"title\">"._EDITVID."</div></td></tr><tr><td colspan=\"2\">&nbsp;</td>";
echo "</tr><tr><td colspan=\"2\">"._TITLE."<span class=\"redstar\">*</span></td></tr><tr><td colspan=\"2\"><input type=\"text\" name=\"title\" value=\"".$row['vidname']."\"></td>";
echo "</tr><tr>";
$selected[$row['category']] = "selected";
echo "<td colspan=\"2\">&nbsp;</td></tr><tr><td colspan=\"2\">"._CATEGORY."</td></tr><tr><td colspan=\"2\">";
echo "<select name=\"category\">";
echo "<option value=\"0\">--"._NONE."--</option>";
$result9 = $db->sql_query("SELECT * FROM ".$prefix."_video_stream_categories");
while($row9 = $db->sql_fetchrow($result9)) {
	$cid2 = intval($row9['id']);
	$ctitle2 = $row9['name'];
	$parentid2 = intval($row9['parent']);
	if ($parentid2!=0) {
		$ctitle2 = getparent($parentid2,$ctitle2);
	}
	echo "<option value=\"$cid2\" ".$selected[$cid2].">$ctitle2</option>";
}
unset($selected);
echo "</select></td></tr>";
echo "<tr><td colspan=\"2\">&nbsp;</td></tr><tr><td height=\"20\" colspan=\"2\">"._DESCRIPTION."<span class=\"redstar\">*</span></td></tr><tr>";
echo "<td colspan=\"2\"><textarea name=\"description\" cols=\"35\" rows=\"5\">".$row['description']."</textarea></td></tr><tr><td colspan=\"2\">&nbsp;</td>";
echo "</tr><tr><td width=\"170\">"._VIDURL."<span class=\"redstar\">*</span></td><td>"._PPURL."</td></tr><tr>";
echo "<td><input type=\"text\" name=\"url\" value=\"".@htmlentities($row['url'])."\"></td><td><input type=\"text\" name=\"picurl\" value=\"".$row['imgurl']."\"></td></tr><tr><td colspan=\"2\">&nbsp;</td>";
echo "</tr><tr><td>"._WIDTH."<span class=\"redstar\">*</span></td><td>"._HEIGHT."<span class=\"redstar\"> *</span></td></tr><tr>";
echo "<td><input name=\"width\" type=\"text\" value=\"".$row['width']."\" maxlength=\"3\"></td><td><input name=\"height\" type=\"text\" value=\"".$row['height']."\" maxlength=\"3\"></td>";
echo "</tr><tr><td colspan=\"2\">&nbsp;</td></tr><tr><td>Date<span class=\"redstar\">*</span></td><td>"._PICTHUMB."</td></tr>";
echo "<tr><td><input name=\"date\" type=\"text\" value=\"".$row['date']."\"></td><td><input name=\"thumbimg\" type=\"text\" value=\"".$row['thumbimg']."\"></td></tr>";
echo "<tr><td colspan=\"2\">&nbsp;</td></tr><tr><td colspan=\"2\">"._PLUGIN."<span class=\"redstar\">*</span></td></tr><tr>";
echo "<td colspan=\"2\">";
// Show plugins available
include('modules/Video_Stream/plugins/index.php');
echo "      <select name='plugin'>\n";
foreach($vs_plugins as $pid => $plugin_info) {
	$plugin_info = explode('::', $plugin_info);
	if ($pid == $row['flash']) {$selected = "selected";}
	echo "        <option value='".$pid."' ".$selected.">".$plugin_info[0]."</option>\n";
	$selected = "";
}
echo "      </select>\n";
echo "&nbsp;&nbsp;&nbsp;<span class=\"redstar\"> *</span>";
echo ""._REQUIRED."</td></tr><tr><td colspan=\"2\">&nbsp;</td></tr><tr><td colspan=\"2\"><input type=\"submit\" name=\"EDITIT\" value=\""._EDITVID."\"></td>";
echo "</tr></table></form>";
CloseTable();
?>