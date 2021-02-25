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
// WINAMP
$embedcode = "<embed type=\"application/x-nsv-vp3-mp3\" width=\"".$row['width']."\" height=\"".$row['height']."\" codebase=\"http://www.nullsoft.com/nsv/embed/nsvmoz_vp3_mp3.xpi\" location=\"".$row['url']."\"></embed>";
?>