<?php

class User {

    //db things
    private $conn;
    private $table = 'user';

    //user props
    public $fname;
    public $lname;
    public $email;
    public $pass;

    //construct with db
    public function __construct($db){
        $this->conn = $db;
    }

    //get user info
    public function user_info(){
        //making query for getting the user info
        $query = 'SELECT *
        FROM
        '.$this->table.'
        ORDER BY id DESC';

        //prepare the query
        $stmt = $this->conn->prepare($query);

        //execute the query
        $stmt->execute();

        return $stmt;
    }

    //getting info of one user
    public function check_user(){

        // $this->email = $_POST['email'];
        // $this->pass = $_POST['password'];

        //making query for getting only one user

        

            $query = 'SELECT *
                    FROM
                    '.$this->table.'
                    WHERE 
                    password = ?
                    AND
                    email = ?';

            //prepare for stmt
            $stmt = $this->conn->prepare($query);

            //binf
            $stmt->bindParam(1, $this->pass);
            $stmt->bindParam(2, $this->email);

            //execute
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            //set properties
            $this->fname = $row['first_name'];
            $this->lname = $row['last_name'];
            $this->email = $row['email'];
            $this->pass = $row['password'];
        
    }

    //create user
    public function create_user(){
        //making query for creating a new user

        // $this->fname = $GET['first_name'];
        // $this->lname = $GET['last_name'];
        // $this->email = $GET['email'];
        // $this->pass = $GET['password'];

        $query = 'INSERT INTO
                '.$this->table.'
                SET
                first_name = :fname,
                last_name = :lname,
                email = :email,
                password = :pass';

        //prepare stmt
        $stmt = $this->conn->prepare($query);

        //secure the inputs
        $this->fname = htmlspecialchars(strip_tags($this->fname));
        $this->lname = htmlspecialchars(strip_tags($this->lname));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->pass = htmlspecialchars(strip_tags($this->pass));

        //bind params
        $stmt->bindParam(':fname',$this->fname);
        $stmt->bindParam(':lname',$this->lname);
        $stmt->bindParam(':email',$this->email);
        $stmt->bindParam(':pass',$this->pass);

        //execute
        if($stmt->execute()){
            return true;
        }

        //echo error 
        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}