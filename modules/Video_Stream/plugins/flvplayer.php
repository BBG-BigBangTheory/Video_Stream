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
//FLV PLayer Code

$embedcode = "<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0\" width=\"".$row['width']."\" height=\"".$row['height']."\" id=\"flvplayer\" align=\"middle\">\n";
$embedcode .= "<param name=\"FlashVars\" value=\"url=".$row['url']."\" />\n";
$embedcode .= "<param name=\"movie\" value=\"modules/Video_Stream/plugins/flvplayer.swf\" />\n";
$embedcode .= "<param name=\"quality\" value=\"high\" />\n";
$embedcode .= "<param name=\"bgcolor\" value=\"#ffffff\" />\n";
$embedcode .= "<embed src=\"modules/Video_Stream/plugins/flvplayer.swf\" FlasVars=\"url=".$row['url']."\" quality=\"high\" bgcolor=\"#ffffff\" width=\"".$row['width']."\" height=\"".$row['height']."\" name=\"flvplayer\" align=\"middle\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />\n";
$embedcode .= "</object>\n";
?>