<?php

$udinra_nginx_secure_response .= 
	'##################################################'.PHP_EOL .
	'# Block SQL injections '.PHP_EOL .
	'##################################################'.PHP_EOL .
    'set $block_sql_injections 0;'.PHP_EOL .
    'if ($query_string ~ "union.*select.*\(") {'.PHP_EOL .
    '    set $block_sql_injections 1;'.PHP_EOL .
    '}'.PHP_EOL .
    'if ($query_string ~ "union.*all.*select.*") {'.PHP_EOL .
    '    set $block_sql_injections 1;'.PHP_EOL .
    '}'.PHP_EOL .
    'if ($query_string ~ "concat.*\(") {'.PHP_EOL .
    '    set $block_sql_injections 1;'.PHP_EOL .
    '}'.PHP_EOL .
    'if ($block_sql_injections = 1) {'.PHP_EOL .
    '    return 403;'.PHP_EOL .
    '}'.PHP_EOL;

?>