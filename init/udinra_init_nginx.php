<?php

$udinra_nginx_secure_response = 
	'##################################################'.PHP_EOL .
	'# Instructions to User '.PHP_EOL .
	'##################################################'.PHP_EOL .
	'# Create secure.conf file in your Nginx configuration directory (/etc/nginx on debian).'.PHP_EOL .
	'# Copy contents of this box in the file.Save the file'.PHP_EOL .
	'# Include this file in Nginx Server block.'.PHP_EOL .
	'# server {'.PHP_EOL .
	'# ....other config lines'.PHP_EOL .
	'#  include secure.conf'.PHP_EOL .
	'# ....other config lines'.PHP_EOL .
	'# }'.PHP_EOL .
	'# Note there will not be # before include secure.conf while you add in your server block'.PHP_EOL .
	'##################################################'.PHP_EOL .
	'# Start of Configuration directives '.PHP_EOL .
	'##################################################'.PHP_EOL;

$udinra_nginx_site = get_site_url();
$udinra_start_pos  = strpos($udinra_nginx_site,'://');
$udinra_start_pos  = $udinra_start_pos + 3;
$udinra_nginx_site = substr($udinra_nginx_site,$udinra_start_pos);

if(strpos($udinra_nginx_site,'www.') === false) {
}
else {
	$udinra_start_pos  = strpos($udinra_nginx_site,'www.');
	$udinra_start_pos  = $udinra_start_pos + 4;
	$udinra_nginx_site = substr($udinra_nginx_site,$udinra_start_pos);
}

$udinra_nginx_dir_temp  = wp_upload_dir();
$udinra_nginx_dir  = $udinra_nginx_dir_temp['baseurl'];
$udinra_start_pos  = strpos($udinra_nginx_dir,$udinra_nginx_site);
$udinra_end_pos    = strpos($udinra_nginx_dir,'/',$udinra_start_pos + 1);
$udinra_nginx_dir = '/' . substr($udinra_nginx_dir,$udinra_end_pos + 1) . '/';

?>