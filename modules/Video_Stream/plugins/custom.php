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
if (!eregi("modules.php", $_SERVER['SCRIPT_NAME'])) {
	die ("You can't access this file directly...");
}
//Custom Code Plugin
// Trims down code to find url for download link
$url = $row['url'];
$urlfull = stristr($url, '<embed');
$urlfull = stristr($urlfull, 'src="');
$urlfull = explode('"', $urlfull);
$url = $urlfull[1];
//Just display the code out of db
$embedcode = "".$row['url']."";	
?>