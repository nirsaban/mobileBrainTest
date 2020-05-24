<?php

require 'config.php';



class GetUsers extends Dbh{
    public $data = [];

    public function select(){
        $sql = 'select * from users';
        $result = mysqli_query($this->connect(),$sql);
        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        $this->data = $data;
        return $this->data;
    }
    public function getLocation(){
        $url = 'appslabs.net/mobile-brain-test/cudade.php';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        $users = $this->select();
        $usersLocation = [];
        foreach($users as $user){
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query(array('ip'=>$user['ip'])));
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
            $server_output = curl_exec($ch);
             $location = json_decode($server_output);
             $user['ip'] = isset($location->theCountry)  ? $location->theCountry : 'no country';
             $user['countryCode'] = isset($location->theCountry) ? strtoupper($location->countryCode): 'no code';
             array_push($usersLocation,$user);
        }
          curl_close($ch);

          $this->data =  $usersLocation;
          return $this->data;

    }


}



$users = new GetUsers;
$users = $users->getLocation();
print_r(json_encode($users));


