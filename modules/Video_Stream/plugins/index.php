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
// List available plugins
// FORMAT: $vs_plugins[Plugin_ID] = "Plugin_Name::Plugin_Location::Image_Location";
// Windows Media Player
$vs_plugins[0] = _WINDOWSMP."::modules/Video_Stream/plugins/windows.php::modules/Video_Stream/images/wmplayer.png";
// Flash Player
$vs_plugins[1] = _FLASHP."::modules/Video_Stream/plugins/flash.php::modules/Video_Stream/images/flash.png";
// Quicktime Player
$vs_plugins[2] = _QUICKTIMEP."::modules/Video_Stream/plugins/quicktime.php::modules/Video_Stream/images/quicktime.png";
// Real Player
$vs_plugins[3] = _REALP."::modules/Video_Stream/plugins/real.php::modules/Video_Stream/images/real.png";
// Custom Embed Code
$vs_plugins[4] = _CUSTOMEMBED."::modules/Video_Stream/plugins/custom.php::modules/Video_Stream/images/custom.png";
// YouTube Player
$vs_plugins[5] = _YOUTUBEVP."::modules/Video_Stream/plugins/youtube.php::modules/Video_Stream/images/youtube.png";
// Google Video Player
$vs_plugins[6] = _GOOGLEVP."::modules/Video_Stream/plugins/google.php::modules/Video_Stream/images/gvideo.png";
// Winamp Plugin
$vs_plugins[7] = _WINAMP."::modules/Video_Stream/plugins/winamp.php::modules/Video_Stream/images/winamp.png";
//FLV Player Plugin
$vs_plugins[8] = _FLVPLAYER."::modules/Video_Stream/plugins/flvplayer.php::modules/Video_Stream/images/flash.png";
?>