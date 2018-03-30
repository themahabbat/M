<?php
$router->get('/', function(){
	echo substr('abc', 1);
});

$router->get( '/about', function(){
    return view('pages/index');
} );

$router->get('/go', function(){
    return view('pages/gof');
} );

