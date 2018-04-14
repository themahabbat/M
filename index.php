<?php
define('ROOT', dirname(__FILE__));
define('SYS', ROOT.'/sys');
define('BUILD', ROOT.'/build');

require_once SYS.'/Config.php';
require_once SYS.'/Helpers.php';
require_once SYS.'/init.php';
require_once BUILD.'/routes/init.php';