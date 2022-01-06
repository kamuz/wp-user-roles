<?php
/**
 * Plugin Name: Users Roles
 * Description: Display all user roles and capabilities
 * Author: Vladimir Kamuz
 * Version: 1.0
 *
 * @package kmzuserroles
 */

/**
 * Add top-level administrative menu
 */
function users_roles_examples_add_toplevel_menu() {
	add_menu_page(
		esc_html__( 'User roles and capabilities', 'myplugin' ),
		esc_html__( 'User roles', 'myplugin' ),
		'manage_options',
		'users_roles_examples',
		'users_roles_examples_display_settings_page',
		'dashicons-unlock',
		null
	);
}
add_action( 'admin_menu', 'users_roles_examples_add_toplevel_menu' );

/**
 * Display the plugin settings page
 */
function users_roles_examples_display_settings_page() {
	// Check if user is allowed access.
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	?>
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<?php users_roles_examples_display_results(); ?>
	</div>
	<?php
}

/**
 * Display results
 */
function users_roles_examples_display_results() {
	global $wp_roles;
	$roles = $wp_roles->roles;
	$roles = array_reverse( $roles );
	echo '<pre style="background: #333; color: #fff; padding: 20px; font-family: Consolas, monospace; font-size: 13px;">';
	print_r( $roles );
	echo '</pre>';
}
