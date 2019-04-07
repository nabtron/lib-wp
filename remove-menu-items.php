// remove menu items for the user
function remove_profile_menu() {

	// removes the profile
    remove_submenu_page('users.php', 'profile.php');
	remove_menu_page('profile.php');
//	remove_menu_page('index.php');
}

add_action('admin_init', 'remove_profile_menu');
