<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
*
* @package auth_wordpress_sso
* @copyright 2012 Bernard Peh (bpeh@barrett.com,.au)
* @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

$string['auth_wordpress_ssodescription'] = 'This plugin allows users to login using their wordpress credentials. It does so by authenticating the user against the wordpress DB. You have to find a way to sync the username and email from wordpress to moodle yourself. One good idea is to use one of wordpress hooks to create users in moodle using the moodle api.';
$string['auth_wordpress_url_label'] = 'Enter the wordpress login url: ';
$string['pluginname'] = 'Wordpress Singile Signon authentication';
