<?php
/*
Plugin Name: Udinra Nginx Secure
Plugin URI: https://udinra.com/downloads/udinra-nginx-secure-pro
Description: Secure your Nginx powered websites.
Author: Udinra
Version: 1.0
Author URI: https://udinra.com
*/
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
function Udinra_Nginx() {
	$udinra_nginx_secure_response = '';
	if (isset($_REQUEST['activate_license'])) {
		udinra_nginx_secure_loop($udinra_nginx_secure_response);
		update_option('udinra_nginx_secure_response', $udinra_nginx_secure_response); 
	}
?>	
	<div class="wrap">
	<u><h1>Udinra Nginx Secure(Configuration)</h1></u><br /><br />
	<ul>
		<li>We believe in Simplicity. Plugin takes care of everything.</li>
		<li>Click Secure the Site button to get started.</li>
		<li>Rate this plugin 5 if found useful</li>
	</ul>
    <form action="" method="post">
        <p class="submit">
            <input type="submit" name="activate_license" value="Secure the Site" class="button-primary" />
        </p>
		<textarea rows="25" cols="100" readonly><?php echo get_option('udinra_nginx_secure_response'); ?></textarea>
    </form>
</div>
<?php
}

function udinra_nginx_secure_loop(&$udinra_nginx_secure_response) {
	include 'init/udinra_init_nginx.php';
	include 'secure/udinra_common_exploit.php';
	include 'secure/udinra_block_agents.php';
	include 'secure/udinra_file_injection.php';
	include 'secure/udinra_sql_injection.php';
	update_option('udinra_nginx_secure_response', $udinra_nginx_secure_response); 
}

function udinra_nginx_secure_admin() {
	if (function_exists('add_options_page')) {
		add_options_page('Udinra Nginx Secure', 'Udinra Nginx Secure', 'manage_options', basename(__FILE__), 'Udinra_Nginx');
	}
}

function udinra_nginx_admin_notice() {
		global $current_user ;
		$user_id = $current_user->ID;
		if ( ! get_user_meta($user_id, 'udinra_nginx_admin_notice') ) {
			echo '<div class="notice notice-info"><p>'; 
			printf(__('Udinra Nginx Secure Pro for $28 only.PayPal - udinesvi@gmail.com | <a href="%1$s">Hide Notice</a>'), '?udinra_nginx_admin_ignore=0');
			echo "</p></div>";
		}
}

function udinra_nginx_admin_ignore() {
	global $current_user;
	$user_id = $current_user->ID;
	if ( isset($_GET['udinra_nginx_admin_ignore']) && '0' == $_GET['udinra_nginx_admin_ignore'] ) {
		add_user_meta($user_id, 'udinra_nginx_admin_notice', 'true', true);
	}
}
 function udinra_nginx_act() {
	 udinra_nginx_secure_loop($udinra_nginx_secure_response);
 }
 
 function udinra_nginx_deact() {
	$udinra_nginx_secure_response = '';
	update_option('udinra_nginx_secure_response', $udinra_nginx_secure_response); 
	remove_action('admin_menu','udinra_nginx_secure_admin');	
	remove_action('admin_notices', 'udinra_nginx_admin_notice');
	remove_action('admin_init', 'udinra_nginx_admin_ignore');
}

register_activation_hook(__FILE__, 'udinra_nginx_act');
register_deactivation_hook(__FILE__, 'udinra_nginx_deact');

add_action('admin_menu','udinra_nginx_secure_admin');	
add_action('admin_notices', 'udinra_nginx_admin_notice');
add_action('admin_init', 'udinra_nginx_admin_ignore');

?>
