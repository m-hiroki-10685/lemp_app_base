<?php
require_once(__DIR__ . '/vendor/autoload.php');

use Classes\FrontClass;
$f = new FrontClass;
$temp_file = __DIR__.'/temp/'.basename($_SERVER['PHP_SELF'],'php').'html';