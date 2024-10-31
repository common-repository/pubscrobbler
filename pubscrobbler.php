<?php

/*
Plugin Name: Pubscrobbler
Plugin URI: http://www.pubhackers.com/
Description: Displays the last 10 tracks played, via <a href="http://www.audioscrobbler.com">Audioscrobbler</a>.
Version: 1.0
Author: Phil Nelson
Author URI: http://www.pubhackers.com/
*/

/*  Copyright 2005  Phil Nelson  (email : zero@zerolives.org)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

load_plugin_textdomain('pubscrob'); // NLS

function pubscrob_add_options_page() {
    if (function_exists('add_options_page')) {
		add_options_page('Pubscrobbler Options', 'Pubscrobbler', 9, 'options-pubscrobbler.php');
    }
}


function pubscrobbler_spit() {

	$pubscrob_username = stripslashes(get_option('pubscrob_username'));
	
	$xml = "http://ws.audioscrobbler.com/1.0/user/".$pubscrob_username."/recenttracks.xml";
	
	if(!empty($pubscrob_username)) {
		$s = simplexml_load_file($xml);
		if(!$s) { 
			echo "<li><h2>Recently Played</h2>";
			echo "<p>This is broken- either Audioscrobbler is down or you need to upgrade the script.</p>";
			echo "</li>";
		} 
		
		else {
			echo "<li><h2>Recently Played</h2>";
			echo "\n\t\t\t<ul>";
			foreach($s->track as $track) {
				echo "\n\t\t\t\t<li><a href=\"".$track->url."\">".$track->name."</a> by <a href=\"http://musicbrainz.org/artist/".$track->artist[mbid].".html\">".$track->artist."</a></li>";
			}
			echo "\n\t\t\t</ul>";
			echo "</li>";
		}
	}
	else {
		echo "<h2>Whoops</h2>";
		echo "<p><a href=\"http://www.pubhackers.com/2005/09/14/pubscrobbler/\">Pubscrobbler</a> isn't working because nobody has entered a username. tsk tsk.</p>";
	}
}

add_action('admin_menu', 'pubscrob_add_options_page');

?>