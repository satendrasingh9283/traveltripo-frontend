

<?php

 $databaseHost = 'localhost';
$databaseName = 'creativemindx';
$databaseUsername ='creativemindx-9283';
$databasePassword ='CLYCtCyno.ht';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

//  require 'db.php';


$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

// Check connection
// if (mysqli_connect_errno())
//   {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   }
   
        $email=isset($_REQUEST['email'])?$_REQUEST['email']:'';
        $password=isset($_REQUEST['password'])?$_REQUEST['password']:'';
 

    
      
      $sql="INSERT INTO login (email, password)
              VALUES('$email', '$password')";
      //  echo $sql; die;
        $result = mysqli_query($con,$sql);
        
        echo $result;
    
?>