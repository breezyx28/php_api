<?php
//headers
header('Access-Control-Allow-Origin: *'); //access is public no auth
header('Content-Type: application/json'); //accepting json data only

//bring in database class and user module
include_once('../../config/Database.php');
include_once('../../modules/User.php');

//instansiate db & connect
$database = new Database();
$db = $database->connect();

//instansiate user
$user = new User($db); 

//get email and pass
$user->email = isset($_GET['email']) ? $_GET['email'] : die();
$user->pass = isset($_GET['password']) ? $_GET['password'] : die();

//check user data
$user->check_user();

//user array
$user_arr = array(
    'first_name'=>$user->fname,
    'last_name'=>$user->lname,
    'email'=>$user->email,
    'password'=>$user->pass
);

//make json
print_r(json_encode($user_arr));