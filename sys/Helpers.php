<?php
use Views\Compiler;

function url($url){
	$basepath = implode('/',
		array_slice(
			explode('/', $_SERVER['SCRIPT_NAME']),
			0, -1
		)
	);
	return $basepath.$url;
}

function redirect($url){
	exit(
		header("Location: ".url($url))
	);
}

function show_404(){
    exit(
        include(ROOT. '/build/view/errors/404.php')
    );
}

function view($view){
    $view = ROOT . "/build/view/$view.php";

        if (file_exists($view)) {
            echo Compiler::compile($view);
        } else redirect('/');
}