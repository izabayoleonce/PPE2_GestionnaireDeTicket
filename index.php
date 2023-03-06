<?php
require 'autoload.php';
require_once 'vendor/autoload.php';

session_start(); // On appelle session_start() APRÈS avoir enregistré l'autoload.
//uniquement en debbugging
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );


$controllerPath = 'controller';

if( isset( $_GET['controller'] ) ) {
  $controllerName = ucfirst($_GET['controller']);
} else {
  $controllerName = 'Home';
}
$fileName = 'controller/' . $controllerName . 'Controller.php';
$className = $controllerPath . '\\' . $controllerName . 'Controller';



if( file_exists( $fileName) ) {
  if( class_exists( $className ) ) {
    $controller = new $className();
  } else {
    exit( "Error : Class not found!" );
  }
} else {
  exit( "Error 404 : not found!" );
}