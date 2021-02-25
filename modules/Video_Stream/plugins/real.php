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
// Real PLayer Plugin
$embedcode = "<object id=\"RVOCX\" classid=\"clsid:CFCDAA03-8BE4-11CF-B84B-0020AFBBCCFA\" width=\"".$row['width']."\" height=\"".$row['height']."\">\n";
$embedcode .= "<param name=\"src\" value=\"".$row['url']."\">\n";
$embedcode .= "<param name=\"autostart\" value=\"true\">\n";
$embedcode .= "<param name=\"controls\" value=\"ImageWindow\">\n";
$embedcode .= "<param name=\"console\" value=\"video\">\n";
$embedcode .= "<param name=\"maintainaspect\" value=\"true\">\n";
$embedcode .= "<embed src=\"".$row['url']."?embed\" type=\"audio/x-pn-realaudio-plugin\" controls=\"ImageWindow\" width=\"".$row['width']."\" height=\"".$row['height']."\" nojava=\"true\" console=\"video\" autostart=\"true\" maintainaspect=\"true\" />\n";
$embedcode .= "</object>\n";
$embedcode .= "<br>\n";
$embedcode .= "<object id=\"RVOCX\" classid=\"clsid:CFCDAA03-8BE4-11CF-B84B-0020AFBBCCFA\" width=\"".$row['width']."\" height=\"36\">\n";
$embedcode .= "<param name=\"controls\" value=\"ControlPanel\">\n";
$embedcode .= "<param name=\"console\" value=\"video\">\n";
$embedcode .= "<embed src=\"".$row['url']."?embed\" type=\"audio/x-pn-realaudio-plugin\" controls=\"ControlPanel\" width=\"".$row['width']."\" height=\"36\" nojava=\"true\" console=\"video\" />\n";
$embedcode .= "</object>\n";
?>