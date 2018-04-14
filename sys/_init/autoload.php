<?php

// Directories with Classes
$directories = [
    'Routing',
    'Views',
    'DB'
];

// Load each Class in Directories
foreach($directories as $directory){
    foreach ( glob( SYS. "/$directory/*.php" ) as $class)
    {
        require_once $class;
    }
}