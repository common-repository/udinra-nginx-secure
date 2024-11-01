<?php

$udinra_nginx_secure_response .= 
	'##################################################'.PHP_EOL .
	'# Block Hacking and User Agents '.PHP_EOL .
	'##################################################'.PHP_EOL .
    'set $block_user_agents 0;'.PHP_EOL .
    'if ($http_user_agent ~ "Wget") {'.PHP_EOL .
    '    set $block_user_agents 1;'.PHP_EOL .
    '}'.PHP_EOL .
    'if ($http_user_agent ~ "Indy Library") {'.PHP_EOL .
    '    set $block_user_agents 1;'.PHP_EOL .
    '}'.PHP_EOL .
    'if ($http_user_agent ~ "libwww-perl") {'.PHP_EOL .
    '    set $block_user_agents 1;'.PHP_EOL .
    '}'.PHP_EOL .
    'if ($http_user_agent ~ "GetRight") {'.PHP_EOL .
    '    set $block_user_agents 1;'.PHP_EOL .
    '}'.PHP_EOL .
    'if ($http_user_agent ~ "GetWeb!") {'.PHP_EOL .
    '    set $block_user_agents 1;'.PHP_EOL .
    '}'.PHP_EOL .
    'if ($http_user_agent ~ "Go!Zilla") {'.PHP_EOL .
    '    set $block_user_agents 1;'.PHP_EOL .
    '}'.PHP_EOL .
    'if ($http_user_agent ~ "Download Demon") {'.PHP_EOL .
    '    set $block_user_agents 1;'.PHP_EOL .
    '}'.PHP_EOL .
    'if ($http_user_agent ~ "Go-Ahead-Got-It") {'.PHP_EOL .
    '    set $block_user_agents 1;'.PHP_EOL .
    '}'.PHP_EOL .
    'if ($http_user_agent ~ "TurnitinBot") {'.PHP_EOL .
    '    set $block_user_agents 1;'.PHP_EOL .
    '}'.PHP_EOL .
    'if ($http_user_agent ~ "GrabNet") {'.PHP_EOL .
    '    set $block_user_agents 1;'.PHP_EOL .
    '}'.PHP_EOL .
    'if ($block_user_agents = 1) {'.PHP_EOL .
    '    return 403;'.PHP_EOL .
    '}'.PHP_EOL ;
	
?>