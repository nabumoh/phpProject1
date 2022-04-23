<?php
require "all.php";

// if the 'id' variable is set in the url,  we know that  we need to edit a record
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];

    //write delete query
    $sql = "DELETE FROM users WHERE user_id=$user_id ";

    //Execute the query
    $result = $pdo->query($sql);

            if($result) echo "Record Deleted successfully.";
            else{
                echo "Error:".$sql."<br>".$pdo->error;
             }
}