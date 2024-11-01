<?php

$udinra_nginx_secure_response .= 
	'##################################################'.PHP_EOL .
	'# Block file injections '.PHP_EOL .
	'##################################################'.PHP_EOL .
    'set $block_file_injections 0;'.PHP_EOL .
    'if ($query_string ~ "[a-zA-Z0-9_]=http://") {'.PHP_EOL .
    '    set $block_file_injections 1;'.PHP_EOL .
    '}'.PHP_EOL .
    'if ($query_string ~ "[a-zA-Z0-9_]=(\.\.//?)+") {'.PHP_EOL .
    '    set $block_file_injections 1;'.PHP_EOL .
    '}'.PHP_EOL .
    'if ($query_string ~ "[a-zA-Z0-9_]=/([a-z0-9_.]//?)+") {'.PHP_EOL .
    '    set $block_file_injections 1;'.PHP_EOL .
    '}'.PHP_EOL .
    'if ($block_file_injections = 1) {'.PHP_EOL .
    '    return 403;'.PHP_EOL .
    '}'.PHP_EOL;

?>