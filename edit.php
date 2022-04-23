<?php
require "all.php";

// if the form's update button is clicked , we need to process the form 
   if(isset($_POST['submit'])){
            $user_id = $_POST['user_id'];
            $username  = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $retypePass = $_POST['retypePass'];

            if ($password !== $retypePass) {
        header("location: ./update.php?Error=ThePasswordDoesntMatch");
        exit();
}

            // write the update query
            $sql = "UPDATE `users` SET `username`=:username,
            `email`=:email,`phone`=:phone,`password`=:password WHERE `user_id`='$user_id'";
            // Hashing the password
            $hash = password_hash($password, PASSWORD_DEFAULT);
           // Associative Array inserted the data in it
          $data = [
          'username' => $username,
          'email' => $email,
          'phone' => $phone,
          'password' => $hash,
          ];
           //prepare & execute the query
           $statment =  $pdo->prepare($sql);
           $result = $statment->execute($data);

            if($result == TRUE){
                echo "Record updated successfully.";
            }else{
                echo "Error:".$sql."<br>".$pdo->error;
            }
   }


// if the 'id' variable is set in the url , we know that we need to edit a record
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];

    //write SQL to get user data
    $sql = "SELECT * FROM users WHERE user_id=$user_id";

    //Execute the sql 
    $result = $pdo->query($sql);

    if($result->rowCount() > 0){
        while($row = $result->fetch()){
            $user_id = $row['user_id'];
            $username  = $row['username'];
            $email = $row['email'];
            $phone = $row['phone'];
        }
    } else{
        // if the 'id' value is not valid, redirect the user back to custBook.php page
        header("location: ./custBook.php?Error=TheIdDoesntExcist");
        exit();
    }
}

?>