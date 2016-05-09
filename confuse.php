<?php

$number = (int) $argv[1];

require 'src/Confuser.php';

echo Carlsson\Confuser::confuse($number) . "\n";
