=== Pubscrobbler ===
Tags: music, sidebar
Contributors: murder

== Requirements ==

You need PHP5, and a working Wordpress 1.5.x installation.

== Installation ==

1. Upload to your plugins folder, usually `wp-content/plugins/`
2. Activate the plugin on the plugin screen
3. In the Options section of the Wordpress Administraton section, click Pubscrobbler and enter your username.
4. Insert the following code in your sidebar wherever you'd like the recently played tracklist to appear:
	
	<?php pubscrobbler_spit(); ?>

== Frequently Asked Questions ==

= How can I tell if it's working? =

Easy as pie. Once you follow the above steps, you'll see the last 10 tracks you've played in the sidebar.