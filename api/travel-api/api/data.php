<?php

// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Headers: *");
// header("Access-Control-Allow-Methods: *");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type");

require 'db.php';




        
          $sql = "select * from contact_us";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result,  MYSQLI_ASSOC); 
        
            $response = array();
                    $response['status'] = 1;
                    $response['data'] = array();
                    
                    // Fetch the data
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $response['data'][] = array(
                                "id" => $row["id"],
                                "name" => $row["name"],
                                "mobile" => $row["mobile"],
                                 "email" => $row["email"],
                                  "problem" => $row["problem"],
                                   "address" => $row["address"],
                                   "message" => $row["message"],
                                   "create_date" => $row["create_date"],
                                   "status" => $row["status"],
                                
                            );
                        }
                    }
                    
                    
                     echo json_encode($response, JSON_PRETTY_PRINT);
                     
                     
        //  $json = array("status" => 1, "user" => $row);
        // echo json_encode($row);
        // $count = mysqli_num_rows($result);
        
        
            // if($count == 1){  
                
            //     $json = array("status" => 1, "msg" => "Profile created successfully!", "user" => $row);
      	     //   echo json_encode($json);
            // }  
            // else{
            //     $json = array("status" => 2, "msg" => "Login failed. Invalid username or password.");
      	     //   echo json_encode($json);
            // }  
                
?>
