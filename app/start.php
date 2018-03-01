<?php

ob_start(); //sent a request to php

session_start(); //session_destroy();

ini_set('display_error','On');

define ('APP_ROOT', __DIR__);
define ('VIEW_ROOT', APP_ROOT . '/views');
define ('MODEL_ROOT', APP_ROOT . '/models');
define ('CONTROLLER_ROOT', APP_ROOT . '/controllers');

define ('BASE_URL', 'http://localhost/PSM');

defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR); 
//this line referring to directory
defined("UPLOAD_DIRECTORY") ? null : define("UPLOAD_DIRECTORY", __DIR__ . DS . "../admin/car_images");
//this line referring to upload directory

defined("DB_HOST") ? null : define("DB_HOST", "localhost");
defined("DB_USER") ? null : define("DB_USER", "root");
defined("DB_PASS") ? null : define("DB_PASS", "");
defined("DB_NAME") ? null : define("DB_NAME", "crent");

$con= mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if($con)
{
    //echo"succefully Connected";
}else{
    die("database connection failed");
}
?>