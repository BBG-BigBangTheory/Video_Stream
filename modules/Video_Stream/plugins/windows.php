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
// Windows media plugin 
$embedcode = "<embed type=\"application/x-mplayer2\" pluginspage=\"http://www.microsoft.com/Windows/Downloads/Contents/MediaPlayer/\" width=\"".$row['width']."\" height=\"".$row['height']."\" src=\"".$row['url']."\" filename=\"".$row['url']."\" autostart=\"True\" showcontrols=\"True\" Volume=\"100\"  id='mediaPlayer' displaysize='4' autosize='-1'  showstatusbar=\"True\" showdisplay=\"False\" autorewind=\"True\"></embed>"; 
?>