<?php 
require "all.php";

// if the form's Login button is clicked, we need to process the form 
if(isset($_POST['submit'])){
// getting the values that insterted from user into Variables
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$retypePass = $_POST['retypePass'];   

// checks if he's not under age (check-box is clicked)
//if the passwords doesn't matches refering to the same page
if ($password !== $retypePass || !(isset($_POST['checkbox']))) {
        header("location: ./signUp.php?Error=ThePasswordDoesntMatch");
        exit();
}

// Write sql query
$sql = ("INSERT INTO `users`(`username`, `email`, `phone`, `password`) VALUES (:username,:email,:phone,:password)");
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
  if($result){
      echo "New Record Created Successfully.";
  }else{
      echo "Error: ".$sql."<br>".$pdo->error;
  }
  $pdo=null;
}
?>