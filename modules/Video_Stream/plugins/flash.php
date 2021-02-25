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
// Flash suport
$embedcode = "<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0\" width=\"".$row['width']."\" height=\"".$row['height']."\">\n";
$embedcode .= "<param name=\"movie\" value=\"".$row['url']."\">\n";
$embedcode .= "<param name=\"quality\" value=\"high\">\n";
$embedcode .= "<embed src=\"".$row['url']."\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"".$row['width']."\" height=\"".$row['height']."\"></embed>\n";
$embedcode .= "</object>";
?>