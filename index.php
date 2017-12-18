<?php
//turn on debugging messages
ini_set('display_errors', 'On');
error_reporting(E_ALL);
//Autoloader class to load all the different directories
include_once "autoload.php";

include_once "dbconfig.php";
//this starts the program as a static.  Start tracing the program from here following the classes and methods being called
$response = http\processRequest::createResponse();


?>