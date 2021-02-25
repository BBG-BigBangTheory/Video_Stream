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



global $admin_file;

if (!defined('ADMIN_FILE')) {
   die ('Illegal File Access');
}



switch($op) {

    case "video_stream":

    include("admin/modules/video_stream.php");

    break;



}



?>