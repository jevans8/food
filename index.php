<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require_once('vendor/autoload.php');

//Instantiate the F3 Base class
$f3 = Base::instance();

// :: invokes static method
// -> invokes instance method

//Default route
$f3->route('GET /', function(){

    //instantiate new template object
    $view = new Template();

    //display home page via render method
    echo $view->render('views/home.html');
});

//Breakfast route
$f3->route('GET /breakfast', function(){

    //echo "<h1>Welcome to my breakfast page</h1>";

    //instantiate new template object
    $view = new Template();

    //display home page via render method
    echo $view->render('views/bfast.html');
});

//Run F3
$f3->run();