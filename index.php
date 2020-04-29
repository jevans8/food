<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();

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

    //instantiate new template object
    $view = new Template();

    //display page via render method
    echo $view->render('views/bfast.html');
});

//Breakfast - green eggs and ham route
$f3->route('GET /breakfast/greenEggs', function(){

    //instantiate new template object
    $view = new Template();

    //display page via render method
    echo $view->render('views/greenEggsAndHam.html');
});

//Lunch route
$f3->route('GET /lunch', function(){

    //instantiate new template object
    $view = new Template();

    //display page via render method
    echo $view->render('views/lunch.html');
});

//Order route
$f3->route('GET|POST /order', function($f3){

    //if form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        //var_dump($_POST); //array(2) { ["food"]=> string(5) "pizza" ["meal"]=> string(6) "dinner" }

        //validate form data
        $meals = array("breakfast", "lunch", "dinner");

        if(empty($_POST['food']) || !in_array($_POST['meal'], $meals)){

            echo "<p>Please enter a food and select a meal</p>";

        }
        //data is valid
        else {

            $_SESSION['food'] = $_POST['food'];
            $_SESSION['meal'] = $_POST['meal'];

            //redirect to order summary page
            $f3->reroute('summary');

            session_destroy();
        }
    }

    //instantiate new template object
    $view = new Template();

    //display page via render method
    echo $view->render('views/order.html');
});

//Order summary route
$f3->route('GET /summary', function(){

    //instantiate new template object
    $view = new Template();

    //display page via render method
    echo $view->render('views/summary.html');

});


//Run F3
$f3->run();