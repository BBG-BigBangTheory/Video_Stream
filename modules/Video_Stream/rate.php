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

if(($ratingV == 1) && ($looker == "Anonymous")) {
	echo ""._REGRATE."";
} else {
	$rate = $_GET['rate'];
	$id = $_GET['id'];
	$vsratingcookie = $HTTP_COOKIE_VARS["video_stream_rating"];
	$vsratingcookie = explode(':', $vsratingcookie);
	if($rate != "1" && $rate != "2" && $rate != "3" && $rate != "4" && $rate != "5") {
		echo "Error in voting!!";
	} else {
		if(array_search($id, $vsratingcookie) !== false) {
			echo "You have already voted for this video";
		} else {
			$result = $db->sql_query("SELECT rates, rating FROM ".$prefix."_video_stream WHERE id='$id'");
			$row = $db->sql_fetchrow($result);
			$rates = $row['rates'];
			$rating = $row['rating'];
			
			$rates++;
			$rating += $rate;
	
			userpointsVS(5);
			$result = $db->sql_query("UPDATE ".$prefix."_video_stream SET rates='$rates', rating='$rating' WHERE id='$id'");
			$vsratingcookie = implode(':', $vsratingcookie);
			$vsratingcookie = $vsratingcookie.":".$id;
			setcookie("video_stream_rating", $vsratingcookie, time()+(60*60*24*356));
			echo _TYRATE;
		}
	}
}
?>