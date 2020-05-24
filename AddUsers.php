<?php

require 'config.php';

class AddUsers extends Dbh{

    public $error = [];
//    public $errorEmail;
//    public $errorIp ;
//    public $errorPhone;


    public function validateForm($post){
        $email = trim($post['email']);
        $phone = trim($post['phone']);
        $ip = trim($post['ip']);

        if(empty($email)){
            $this->error['email'] = 'the email is required';
            $jsonError = json_encode($this->error);
            print_r($jsonError);die();
        }else{
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $this->error['email'] = 'the email no valid';
                $jsonError = json_encode($this->error);
                print_r($jsonError);die();
            }
        }
        $sql = "SELECT email FROM `users` WHERE email = '$email'";
        $result = mysqli_query($this->connect(), $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $this->error['email'] = 'the email already exist';
            $jsonError = json_encode($this->error);
            print_r($jsonError);die();
        }
        if(empty($phone)){

            $this->error['phone'] = 'phone cannot be empty';
            $jsonError = json_encode($this->error);
            print_r($jsonError);die();
        }else{
            if(strlen($phone) < 10 || strlen($phone) > 10 ){
                $this->error['phone'] = 'phone must be  10 chars only ';
                $jsonError = json_encode($this->error);
                print_r($jsonError);die();
            }
        }
        if(empty($ip)){
            $this->error['ip'] = 'ip cannot be empty';
            $jsonError = json_encode($this->error);
            print_r($jsonError);die();
        }else{
            if(!filter_var($ip, FILTER_VALIDATE_IP) ){
                $this->error['ip'] = 'the ip no valid';
                $jsonError = json_encode($this->error);
                print_r($jsonError);die();
            }
        }

            $this->insert($post);

    }
    private function addError($key,$val){
        $this->errors[$key] = $val;
    }
    public function insert($field){
        $email = mysqli_real_escape_string($this->connect(),$field['email']);
        $phone = mysqli_real_escape_string($this->connect(),$field['phone']);
        $ip = mysqli_real_escape_string($this->connect(),$field['ip']);
        $token = $field['token'];
        $sql = "INSERT INTO users(email,phone,token,ip) VALUES('$email','$phone','$token','$ip')";
        if(mysqli_query($this->connect(),$sql)){
          echo 'success';
        }else{
            echo mysqli_error($this->connect());
        }

    }

}
if(isset($_POST)){

    $newUser = new AddUsers;
    $newUser->validateForm($_POST);
}

