<?php

// //bring in database class and user module
// include_once('../config/Database.php');
// include_once('../modules/User.php');

// //instansiate db & connect
// $database = new Database();
// $db = $database->connect();

// //instansiate user
// $user = new User($db); 

// //query to get user infos by seeking through database

// $query = 'SELECT *
//         FROM 
//         user
//         WHERE
//         email = :email';

// $stmt = $db->prepare($query);

// $stmt->bindParam(':email', $_GET['email']);

// $stmt->execute();

// if($result = $stmt->fetch(PDO::FETCH_ASSOC)){

//     extract($result);

//     $info = 'Hello '.$first_name.' this is your information <br>
//     First name : '.$first_name.'<br>
//     last name : '.$last_name.'<br>
//     Email : '.$email.'<br>
//     Password : '.$password.'';
// } else {

//  echo 'Something went wrong';

// }

// echo $info;


echo file_get_contents('../api/user/check_user.php');