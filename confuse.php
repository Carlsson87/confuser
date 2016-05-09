<?php

require 'src/Confuser.php';

$input = $argv[1];

if (is_numeric($input)) {
    echo Confuser\Confuser::toString((int) $input) . "\n";
} else {
    echo Confuser\Confuser::toInt($input) . "\n";
}
