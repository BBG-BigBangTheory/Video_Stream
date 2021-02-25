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

if(($viewV == 1) && ($looker == "Anonymous")) {
	echo ""._REGWATCH."";
} else {

	// Gets the data of that video
	$result = $db->sql_query("SELECT * FROM ".$prefix."_video_stream WHERE id='$id'");
	$row = $db->sql_fetchrow($result);
	$plugin = $row['flash'];
	
	include('modules/Video_Stream/plugins/index.php');
	$plugin_info = explode('::', $vs_plugins[$plugin]);
	include($plugin_info[1]);
	echo $embedcode;
	
}
?>