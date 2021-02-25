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

require_once("mainfile.php");
$module_name = basename(dirname(__FILE__));
$index = 0;

global $currentlang, $db, $prefix;

if ($currentlang) {
	if (file_exists("modules/Video_Stream/lang-module/lang-$currentlang.php")) { 
		include_once("modules/Video_Stream/lang-module/lang-$currentlang.php");
	} else {
		include_once("modules/Video_Stream/lang-module/lang-english.php");
	}
} else {
	include_once("modules/Video_Stream/lang-module/lang-english.php");
}

include('modules/Video_Stream/functions.php');
switch($page) {

	case "vidpop":
	include('modules/Video_Stream/popup.php');
	break;
	
	case "comment":
	if($commentEDDD == 1) {
		include('modules/Video_Stream/comment.php');
	}
	break;
	
	case "friend":
	if($sendED == 1) {
		include('modules/Video_Stream/friend.php');
	}
	break;
	
	case "watch":
	include('modules/Video_Stream/watch.php');
	break;
	
	case "search":
	include('modules/Video_Stream/search.php');
	break;
	
	case "rate":
	if($ratingED == 1) {
		include('modules/Video_Stream/rate.php');
	}
	break;
	
	case "vidadd":
	if($submitED == 1) {
		include('modules/Video_Stream/add_video.php');
	}
	break;
	
	case "broken":
	if($brokenED == 1) {
		include('modules/Video_Stream/broken.php');
	}
	break;
	
	case "send":
	if($sendED == 1) {
		include('modules/Video_Stream/send.php');
	}
	break;
	
	case "disclaimer":
	include('modules/Video_Stream/disclaimer.php');
	break;
	
	default:
	include('modules/Video_Stream/layout.php');
	break;
}
?>