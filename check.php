<?php
require "all.php";
session_start(); 

// if the form's submit button is clicked , we need to process the form 
   if(isset($_POST['submit'])){
            $username  = $_POST['username'];
            $password = $_POST['password'];


            //cheks if the fields are empty then he will get an emptyfields massage.
            if(empty($username) || empty($password)) {
        header("location: ./signIn.php?Error=emptyfields");
        exit();
}
            // write the update.
            $sql = "SELECT * FROM `users` WHERE `username`='$username'";
           
           //writing the sql query.
           $result = $pdo->query($sql);

          if($count=$result->rowCount() > 0)
            {
             if($row = $result->fetch($count)){
                 $_username= $row['username'];
                 $_password= $row['password'];
             }
          
               // if Condition checks if the password matches each other by translating the hashed paswword.
                if(password_verify( $password,$_password))
                {   
                 $_SESSION['username'] = $_username;
                 $_SESSION['password'] = $_password;
                 header("location: ./budget.php?login=success");
                 echo "Hello $username .";
                 exit();
                } 
                else { header("location: ./signIn.php?login=passwordIsNotCorrect"); exit(); }
                  
              }else if($count = 0){
               header("location: ./signIn.php?login=Failed");
                exit();
            }
            

 }

?>