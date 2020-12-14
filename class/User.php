<?php
    class User {
        public $name, $email, $mobile, $ques, $ans;

        function signup($con, $email, $name, $mobile, $password, $ques, $ans) {
            $password = md5($password);
            $sql = "INSERT INTO `tbl_user`(`email`, `name`, `mobile`, `email_approved`, `phone_approved`, `active`, `is_admin`, `sign_up_date`, `password`, `security_question`, `security_answer`) VALUES ('".$email."','".$name."','".$mobile."',0,0,0,0,NOW(),'".$password."','".$ques."','".$ans."')";
            $result = mysqli_query($con, $sql);
            return $result;
        }
        function check_user_email_available($con, $email) {
            $sql = "SELECT * FROM `tbl_user` WHERE `email` = '".$email."'";
            $result = mysqli_query($con, $sql);
            $row = $result->fetch_row();
            return $row;
        }
        function check_user_mobile_available($con, $mobile) {
            $sql = "SELECT * FROM `tbl_user` WHERE `mobile` = '".$mobile."'";
            $result = mysqli_query($con, $sql);
            $row = $result->fetch_row();
            return $row;
        }
        function login($con, $email, $password) {
            $password = md5($password);
            $sql = "SELECT * FROM `tbl_user` WHERE `email` = '".$email."' AND `password` = '".$password."'";
            $result = mysqli_query($con, $sql);
            $row = $result->fetch_row();
            if($row > 0) {
                $check = "SELECT * FROM `tbl_user` WHERE `email` = '".$email."' AND `active` = 1";
                $res = mysqli_query($con, $check);
                $rows = $res->fetch_row();
                if($rows > 0) {
                    $_SESSION['email'] = $email;
                    return 1;
                } else {
                    $_SESSION['email'] = $email;
                    return -1;
                }
            } else {
                return 0;
            }
        }
        function fetch_users($con, $email, $password) {
            $password = md5($password);
            $sql = "SELECT * FROM `tbl_user` WHERE `email` = '".$email."' AND `password` = '".$password."'";
            $result = mysqli_query($con, $sql);
            $fetch = $result->fetch_assoc();
            return $fetch;
        }
        function update_user($con, $type, $email) {
            $sql = "UPDATE `tbl_user` SET `".$type."` = 1, `active` = 1 WHERE `email` = '".$email."'";
            $result = mysqli_query($con, $sql);
            return $result;
        }
        function isadmin($con, $email) {
            $sql = "SELECT * FROM `tbl_user` WHERE `email` = '".$email."'";
            $result = mysqli_query($con, $sql);
            $fetch = $result->fetch_assoc();
            $_SESSION['isadmin'] = $fetch['is_admin'];
            return $fetch;
        }
    }
?>