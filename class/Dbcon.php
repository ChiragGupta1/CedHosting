<?php
    class Dbcon {
        public $conn;
        function __construct () {
            $this->connect(); 
        }
        function connect() {
            $conn = mysqli_connect('localhost','root','chirag26oct','CedHosting');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            else if($conn){
                return $conn;
            } 
        }
    }
?>