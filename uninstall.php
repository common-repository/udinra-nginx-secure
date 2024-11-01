<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit();
}

udinra_uninstall_nginx_plugin();

function udinra_uninstall_nginx_plugin () {
    if ( ! current_user_can( 'activate_plugins' ) ) {
        return;
    }
	udinra_delete_nginx_options();
}

function udinra_delete_nginx_options () {
	delete_option('udinra_nginx_secure_response');
}

?>