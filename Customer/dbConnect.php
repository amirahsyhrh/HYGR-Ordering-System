<?php 
// Include the configuration file 
//require_once 'config.php'; 
 
// Connect with the database  
$db = new mysqli("localhost", "root", "", "hygr");  
  
// Display error if failed to connect  
if ($db->connect_errno) {  
    printf("Connect failed: %s\n", $db->connect_error);  
    exit();  
}