<?php
  class acclog{

    public $log;

    function __construct(){
      $this->log = new mysqli("localhost","root","","manga");

      if(!$this->log){
        mysqli_connect_error();
      }

    }

    function insert($email,$username,$password){
      $sql = "INSERT INTO account_info(email,username,password) VALUES('$email','$username','$password')";
      $dbconn = $this->log;
      mysqli_query($dbconn,$sql) or die("Input Failed" . mysqli_error($dbconn));
    }

    function login($username,$password){
      $sql_log = "SELECT * FROM account_info WHERE username = '$username' AND password='$password' LIMIT 1";
      $dbconn = $this->log;
      $result = mysqli_query($dbconn,$sql_log);
      if(mysqli_num_rows($result)==1){
        echo "You have Successfully Logged In";
      }else{
        echo "Login was Unsuccessful";
        exit();
      }
    }

    // public function findManga($title){
    //   $titleQuery = "SELECT manga_id FROM manga WHERE title = '%" .$title. "%'";
    //   $dbconn2 = $this->log;
    //   $result2 = mysqli_query($dbconn2,$titleQuery);
    //   if(!empty($result2)){
    //     return $result2;
    //   } else {
    //     return false;
    //   }
    // }
  }
?>
