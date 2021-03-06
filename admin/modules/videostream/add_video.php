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

if($_POST['ADDIT']) {
	$T = $_POST['title']; $D = $_POST['description']; $U = $_POST['url']; $C = $_POST['picurl']; $CA = $_POST['category'];
	$W = $_POST['width']; $H = $_POST['height']; $P = $_POST['plugin']; $date = date("h:i A dS M Y"); $TI = $_POST['thumbimg'];
	cookiedecode($user);
	$username = $cookie[1];
	if ($username == "") {
		$username = "Anonymous";
	}
	OpenTable();
	$result = $db->sql_query("INSERT INTO ".$prefix."_video_stream (vidname, flash, user, date, description, url, imgurl, thumbimg, width, height, category, request) VALUES('$T', '$P', '$username', '$date', '$D', '$U', '$C', '$TI', '$W', '$H', '$CA', '0') ");
	echo ""._VIDADDED."";
	CloseTable();
	echo "<br>";
}
OpenTable();
echo "<style type='text/css'> .redstar {color: #FF0000;} </style>\n"
."<form name='form1' method='post' action=''>\n"
."<table width='360' border='0' cellspacing='0' cellpadding='0'>\n"
."  <tr>\n"
."    <td colspan='2'><div align='center' class='title'>"._ADDVID."</div></td>\n"
."  </tr>\n"
."  <tr>\n"
."    <td colspan='2'>&nbsp;</td>\n"
."  </tr>\n"
."  <tr>\n"
."    <td colspan='2'>"._TITLE."<span class='redstar'>*</span></td>\n"
."  </tr>\n"
."  <tr>\n"
."    <td colspan='2'><input type='text' name='title'></td>\n"
."  </tr>\n"
."  <tr>\n"
."    <td colspan='2'>&nbsp;</td>\n"
."  </tr>\n"
."  <tr>\n"
."    <td colspan='2'>"._CATEGORY."</td>\n"
."  </tr>\n"
."  <tr>\n"
."    <td colspan='2'>\n"
."      <select name='category'>\n"
."        <option value='0'>--"._NONE."--</option>\n";
$result9 = $db->sql_query("SELECT * FROM ".$prefix."_video_stream_categories");
while($row9 = $db->sql_fetchrow($result9)) {
	$cid2 = intval($row9['id']);
	$ctitle2 = $row9['name'];
	$parentid2 = intval($row9['parent']);
	if ($parentid2!=0) {
		$ctitle2 = getparent($parentid2,$ctitle2);
	}
	echo "        <option value='$cid2'>$ctitle2</option>\n";
}
echo "      </select>\n"
."    </td>\n"
."  </tr>\n"
."  <tr>\n"
."    <td colspan='2'>&nbsp;</td>\n"
."  </tr>\n"
."  <tr>\n"
."    <td height='20' colspan='2'>"._DESCRIPTION."<span class='redstar'>*</span></td>\n"
."  </tr>\n"
."  <tr>\n"
."    <td colspan='2'><textarea name='description' cols='35' rows='5'></textarea></td>\n"
."  </tr>\n"
."  <tr>\n"
."    <td colspan='2'>&nbsp;</td>\n"
."  </tr>\n"
."  <tr>\n"
."    <td width='170'>"._EMBEDVIDURL."<span class='redstar'>*</span></td>\n"
."    <td>"._PPURL."</td>\n"
."  </tr>\n"
."  <tr>\n"
."    <td><input type='text' name='url'></td>\n"
."    <td><input type='text' name='picurl' value='images/Video_Stream/noimage.gif'></td>\n"
."  </tr>\n"
."  <tr>\n"
."    <td colspan='2'>&nbsp;</td>\n"
."  </tr>\n"
."  <tr>\n"
."    <td>"._PICTHUMB."</td>\n"
."    <td>&nbsp;</td>\n"
."  </tr>\n"
."  <tr>\n"
."    <td><input type='text' name='thumbimg' value='images/Video_Stream/noimage_sm.gif'></td>\n"
."    <td>&nbsp;</td>\n"
."  </tr>\n"
."  <tr>\n"
."    <td colspan='2'>&nbsp;</td>\n"
."  </tr>\n"
."  <tr>\n"
."    <td>"._WIDTH."<span class='redstar'>*</span></td>\n"
."    <td>"._HEIGHT."<span class='redstar'> *</span></td>\n"
."  </tr>\n"
."  <tr>\n"
."    <td><input name='width' type='text' value='350' maxlength='3'></td>\n"
."    <td><input name='height' type='text' value='350' maxlength='3'></td>\n"
."  </tr>\n"
."  <tr>\n"
."    <td colspan='2'>&nbsp;</td>\n"
."  </tr>\n"
."  <tr>\n"
."    <td colspan='2'>"._PLUGIN."<span class='redstar'>*</span></td>\n"
."  </tr>\n"
."  <tr>\n"
."    <td colspan='2'>\n";
// Show plugins available
include('modules/Video_Stream/plugins/index.php');
echo "      <select name='plugin'>\n";
foreach($vs_plugins as $pid => $plugin_info) {
	$plugin_info = explode('::', $plugin_info);
	if ($pid == 0) {$selected = "selected";}
	echo "        <option value='".$pid."' ".$selected.">".$plugin_info[0]."</option>\n";
	$selected = "";
}
echo "      </select>\n"
."      &nbsp;&nbsp;&nbsp;<span class='redstar'> *</span>"._REQUIRED."\n"
."    </td>\n"
."  </tr>\n"
."  <tr>\n"
."    <td colspan='2'>&nbsp;</td>\n"
."  </tr>\n"
."  <tr>\n"
."    <td colspan='2'><input type='submit' name='ADDIT' value='"._ADDVID."'></td>\n"
."  </tr>\n"
."</table>\n"
."</form>\n";
CloseTable();
?>