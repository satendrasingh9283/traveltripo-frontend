<?php
   session_start();
  
  error_reporting(0);
  // Report runtime errors
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
//error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
//ini_set("error_reporting", E_ALL);
   // $con = mysqli_connect("localhost","wishogkm_user","user1234","wishogkm_qms");
   $databaseHost = 'localhost';
$databaseName = 'traveltripo-tt'; 
$databaseUsername ='traveltripo-9283';
$databasePassword ='C.I34h~v4H^I';

$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
	// $con = mysqli_connect("localhost","root","","holydaytrip");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  

  
?> 
