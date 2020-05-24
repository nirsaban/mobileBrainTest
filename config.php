<?php

class DBh{

  public function connect(){
      $con = mysqli_connect('5.153.13.148', 'kfkfk_user_test', 'LKo7Xk5JdY8icAeH', 'kfkfk_test_db');
      if (!$con) {
          echo 'Connection Error =>' . mysqli_connect_error();
      }
      return $con;
  }
}

