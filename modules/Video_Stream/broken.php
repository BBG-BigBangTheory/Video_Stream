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
if (!defined('MODULE_FILE')) 
	{
	   die ("You can't access this file directly...");
	}

include('header.php');

if(($brokenV == 1) && ($looker == "Anonymous")) {
	OpenTable();
	echo ""._REGBROKEN."";
	CloseTable();
} else {
	if($_POST['Submit']) {
		OpenTable();
		$usernameb = $_POST['username'];
		$user_emailb = $_POST['user_email'];
		$result = $db->sql_query("INSERT INTO ".$prefix."_video_stream_broken (username, email, brokenvidid) VALUES('$usernameb', '$user_emailb', '$id') ");
		echo "<div align=\"center\"><FONT class=title>".$sitename." "._VIDEOCOLECTION."</FONT></div><br>";
		echo ""._BROKENNOTICE."";
		echo " >><a href=\"modules.php?name=Video_Stream\">"._BACK."</a>";
		CloseTable();
	} else {
		$cookie[0] = intval($cookie[0]);
		if ($cookie[1] != "") {
			$row = $db->sql_fetchrow($db->sql_query("SELECT name, username, user_email FROM ".$user_prefix."_users WHERE user_id='$cookie[0]'"));
			if ($row['name'] != "") {
				$sender_name = $row['name'];
			} else {
				$sender_name = $row['username'];
			}
			$sender_email = $row['user_email'];
		}
			
		OpenTable();
		$vidname = str_replace('-', ' ', $vidname);
		echo "<div align=\"center\"><FONT class=title>".$sitename." "._VIDEOCOLECTION."</FONT></div><br>";
		echo ""._REPORTP1." ".$vidname." "._REPORTP2."";
		echo "<form name=\"form1\" method=\"post\" action=\"modules.php?name=Video_Stream&amp;page=broken&amp;id=".$id."\">";
		echo "<table width=\"144\" border=\"0\" align=\"center\"><tr><td><div align=\"left\">"._USERNAME.":</div></td>";
		echo "</tr><tr><td><div align=\"left\"><input name=\"username\" type=\"text\" value=\"".$sender_name."\"></div></td></tr><tr>";
		echo "<td><div align=\"left\">"._EMAIL.":</div></td></tr><tr><td><div align=\"left\"><input name=\"user_email\" type=\"text\" value=\"".$sender_email."\">";
		echo "</div></td></tr><tr><td><div align=\"left\"></div></td></tr><tr><td><div align=\"center\"><input type=\"submit\" name=\"Submit\" value=\""._SUBMIT."\">";
		echo "</div></td></tr></table></form>";
		CloseTable();	
	}
}
include('footer.php');
?>