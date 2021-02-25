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
// Quicktime plugin
$embedcode = "<OBJECT CLASSID=\"clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B\" WIDTH=\"".$row['width']."\" HEIGHT=\"".$row['height']."\" CODEBASE=\"http://www.apple.com/qtactivex/qtplugin.cab\">\n";
$embedcode .= "<PARAM name=\"SRC\" VALUE=\"".$row['url']."\">\n";
$embedcode .= "<PARAM name=\"AUTOPLAY\" VALUE=\"true\">\n";
$embedcode .= "<PARAM name=\"CONTROLLER\" VALUE=\"true\">\n";
$embedcode .= "<EMBED SRC=\"".$row['url']."\" WIDTH=\"".$row['width']."\" HEIGHT=\"".$row['height']."\" AUTOPLAY=\"true\" CONTROLLER=\"true\" PLUGINSPAGE=\"http://www.apple.com/quicktime/download/\"></EMBED>\n";
$embedcode .= "</OBJECT>\n";
?>