<?php

require_once 'Config.php';
require_once 'Helpers.php';

// Directories with Classes
$directories = [
    'Routing',
    'Views',
    'DB'
];

// Load each Class in Directories
foreach($directories as $directory){
    foreach ( glob( ROOT. "/app/$directory/*.php" ) as $class)
    {
        require_once $class;
    }
}