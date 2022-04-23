<?php
require "all.php";
session_start();
// writing the query to get data from users table
$sql = "SELECT * FROM `users`";

//prepare & execute the query
$result =  $pdo->query($sql);
 ?>

<!DOCTYPE html>
<html>
<head>
    <title>Customers Book</title>
    <form action="custBook.php" method="GET">
    <!-- using bootstrap to make it looks good. -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Budget Managment</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">

    <?php
    if(isset( $_SESSION['Admin'])){

    echo '<li class="nav-item"><a class="nav-link" href="custBook.php">Customer Book</a></li>';
      echo '<li class="nav-item"><a class="nav-link" href="signOut.php">SignOut</a></li>';

    }
    else{

    echo '<li class="nav-item">
        <a class="nav-link" href="signUp.php">SignUp</a>
      </li>';
    echo '<li class="nav-item">
        <a class="nav-link" href="SignIn.php">SignIn</a>
      </li>';

     echo '<li class="nav-item">
        <a class="nav-link" href="budget.php">myBudget</a>
      </li>';

     echo  '<li class="nav-item">
        <a class="nav-link" href="findUs.php">Find-Us</a>
      </li>';    

    }
    
    ?>
     
    </ul>
  </div>  
</nav>
<br>

    <div class="container">
        <h2>Customers Book</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            <?php 
            if($result->rowCount() > 0){
                // output data for each row
                while ($row = $result->fetch()){
             ?>
                   <tr>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td>
                    <a class="btn btn-info" href="update.php?user_id=<?php echo $row['user_id']; ?>">Edit</a>&nbsp;
                    <a class="btn btn-danger" href="delete.php?user_id=<?php echo $row['user_id']; ?>">Delete</a>
                    </td>
                   </tr> 
            <?php } }?>

            </tbody>
        </table>
    </div>
    
</body>
</html>