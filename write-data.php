<?php
 
    //Variabel database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "monitoring";
 
    $conn = mysqli_connect("$servername", "$username", "$password","$dbname");
 
    // Prepare the SQL statement
  
    $result = mysqli_query ($conn,"INSERT INTO curah_hujan (data) VALUES ('".$_GET["data_hujan"]."')");    
    
    if (!$result) 
        {
            die ('Invalid query: '.mysqli_error($conn));
        }  
?>