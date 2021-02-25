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
OpenTable();
$id = $_GET['id'];
$loc = $_GET['loc'];
$result = $db->sql_query("DELETE FROM ".$prefix."_video_stream WHERE id=$id");
if ($loc == "broken") {
	$result = $db->sql_query("DELETE FROM ".$prefix."_video_stream_broken WHERE brokenvidid=$id");
	Header("Location: ".$admin_file.".php?op=video_stream&Submit=broken");
	die();
} elseif ($loc == "manage") {
	Header("Location: ".$admin_file.".php?op=video_stream&d=$d");
	die();
}
CloseTable();

?>