<?php
//headers
header('Access-Control-Allow-Origin: *'); //access is public no auth
header('Content-Type: application/json'); //accepting json data only
header('Access-Control-Allow-Methods: POST'); //allow to post data
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,X-Requested-With');

//bring in database class and user module
include_once('../../config/Database.php');
include_once('../../modules/User.php');

//instansiate db & connect
$database = new Database();
$db = $database->connect();

//instansiate user
$user = new User($db); 

//get inserted data
$data = json_decode(file_get_contents('php://input'));

$user->fname = $data->first_name;
$user->lname = $data->last_name;
$user->email = $data->email;
$user->pass = $data->password;

//create user
if($user->create_user()){
    echo json_encode(
        array('message' => 'user created')
    );

    //if it's all right then redirect
    // header('location:../../index.php');
    
} else {
    echo json_encode(
        array('message'=> 'user not created')
    );
    // die('error while creating a new user');
}