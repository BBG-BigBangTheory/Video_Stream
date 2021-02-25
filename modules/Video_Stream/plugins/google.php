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
// Modify URL For use in this plugin
$url = $row['url'];
$url = stristr($url, 'videoplay?docid=');
$url = explode('=', $url);
$url = explode('&', $url[1]);
$url = $url[0];
// Google Video Plugin
$embedcode = "<embed style=\"width:".$row['width']."px; height:".$row['height']."px;\" id=\"VideoPlayback\" type=\"application/x-shockwave-flash\" src=\"http://video.google.com/googleplayer.swf?docId=".$url."&hl=en\" flashvars=\"\"></embed>\n";
$url = "http://video.google.com/googleplayer.swf?docId=".$url."&hl=en";
?>