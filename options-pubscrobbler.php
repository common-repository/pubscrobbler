<?php
/*
Author: Phil Nelson
Author URI: http://www.pubhackers.com
Description: Administrative options for Pubscrobbler
*/

load_plugin_textdomain('pubscrob'); // NLS
$location = get_option('siteurl') . '/wp-admin/admin.php?page=options-pubscrobbler.php'; // Form Action URI

add_option('pubscrob_username', 'yourusername');

/*check form submission and update options*/
if ('process' == $_POST['stage'])
{
	update_option('pubscrob_username', $_POST['pubscrob_username']);
}

$pubscrob_username = stripslashes(get_option('pubscrob_username'));

?>

<div class="wrap"> 
  <h2><?php _e('Pubscrobbler Options', 'pubscrob') ?></h2> 
  <form name="form1" method="post" action="<?php echo $location ?>&amp;updated=true">
  	<input type="hidden" name="stage" value="process" />
  	<table width="100%" cellspacing="2" cellpadding="5" class="editform"> 
      <tr valign="top"> 
		<th scope="row"><?php _e('Audioscrobbler Username:') ?></th>
		<td><input name="pubscrob_username" type="text" id="pubscrob_username" value="<?php echo $pubscrob_username; ?>" size="40" />
		<br />
	<?php _e('Your Audioscrobbler username.', 'pubscrob') ?>
		</td>
	</tr>
	</table>
	<p class="submit">
      <input type="submit" name="Submit" value="<?php _e('Update Options', 'wpcf') ?> &raquo;" />
    </p>
  </form>
</div>