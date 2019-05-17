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

//user query
$result = $user->user_info();

//get row count
$num = $result->rowCount();

//check if any users
if($num > 0){

    //user array
    $users_arr = array();
    $users_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row); //this will amke use exctract all row contents into variables like $email and $pass
        $user_item = array(
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'email'=>$email,
            'password'=>$password,
        );

        //push to array users_arr['data']
        array_push($users_arr['data'],$user_item);
    }

    //turn to json
    echo json_encode($users_arr);
} else {

echo json_encode(
    array('message' => 'No Users Found')
);

}