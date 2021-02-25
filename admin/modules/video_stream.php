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
global $prefix, $db, $admin_file, $currentlang;
if (!defined('ADMIN_FILE')) {
   die ('Illegal File Access');
}
$aid = substr("$aid", 0,25);
$row = $db->sql_fetchrow($db->sql_query("SELECT radminsuper FROM " . $prefix . "_authors WHERE aid='$aid'"));
if ($row['radminsuper'] == 1) {
	
	if ($currentlang) {
		if (file_exists("modules/Video_Stream/lang-admin/lang-$currentlang.php")) { 
			include_once("modules/Video_Stream/lang-admin/lang-$currentlang.php");
		} else {
			include_once("modules/Video_Stream/lang-admin/lang-english.php");
		}
	} else {
		include_once("modules/Video_Stream/lang-admin/lang-english.php");
	}
	
	include_once("admin/modules/videostream/functions.php");
	
	include ("header.php");
	
	?>
	<script language="javascript" type="text/javascript">
	function disp_confirm(wheretogo, message) {
		var name = confirm(message)
		if (name==true) {
			window.location = ''+wheretogo+''
		}
	}
	</script>
	<?php
	
	switch($Submit) {
	
		case "Psettings":
		include("admin/modules/videostream/Psettings.php");
		break;
		
		case "settings":
		include("admin/modules/videostream/settings.php");
		break;
	
		case "addvid":
		include("admin/modules/videostream/add_video.php");
		break;
	
		case "editvid":
		include("admin/modules/videostream/edit_video.php");
		break;
		
		case "deletevid":
		include("admin/modules/videostream/delete_video.php");
		break;
		
		case "broken":
		include("admin/modules/videostream/broken.php");
		break;
		
		case "request":
		include("admin/modules/videostream/request.php");
		break;
		
		case "category":
		include("admin/modules/videostream/category.php");
		break;
		
		default:
		include("admin/modules/videostream/manage_videos.php");
		break;
		
	}
	
	include("footer.php");
	
} else {
    echo "Access Denied";
}

?>