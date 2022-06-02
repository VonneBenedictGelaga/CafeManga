<?php

  class acclog{
    public $log;

    function __construct(){

      $this->log = new mysqli("localhost","root","","mangaecafe_login");

      if($this->log){
        echo "Successful connected to Database";
      }else{
        mysqli_connect_error();
      }

    }

    function insert($email,$username,$password){
      $sql = "INSERT INTO account_info (`email`,`username`,`password`) VALUES('$email','$username','$password')";
      $dbconn = $this->log;
      mysqli_query($dbconn,$sql) or die(mysqli_error($dbconn));
    }
  }
?>
