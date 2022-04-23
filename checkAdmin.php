<?php 
require "all.php";

   // if the form's submit button is clicked , we need to process the form 
   if(isset($_POST['submit'])){
            $username  = $_POST['username'];
            $password = $_POST['password'];

            //cheks if the fields are empty then he will get an emptyfields massage.
            if(empty($username) || empty($password)) {
        header("location: ./signIn.php?Error=emptyfields");
        exit();
}

          // write the sql query
            $sql = "SELECT * FROM `admin` WHERE `Admin_User`='$username'";
           
           //Execute the sql 
           $result = $pdo->query($sql);

          if($count=$result->rowCount() > 0)
            {
            // fetches the results from the table. 
             if($row = $result->fetch($count)){
                 $_username= $row['Admin_User'];
                 $_password= $row['Admin_Pass'];
             }
               if( $password == $_password)
                {   
                // checks if one the the admins are signing in.
                 if($_username ='admin'|| $_username='admin2'){
                 $_SESSION['Admin'] = $_username;
                 header("location: ./custBook.php?login=Welcome-Website-Admin");
                 echo "Hello $username .";
                 exit();
                    }
                    // checks if the passwords doesn't matches it will get not Correct message.
                }else {
                     header("location: ./signIn.php?login=passwordIsNotCorrect"); exit(); }
            
            }else if($count = 0){
               header("location: ./signIn.php?login=Failed");
                exit();
            }
        }









?>