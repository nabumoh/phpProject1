<?php
require "all.php";
require "check.php";
require "checkAdmin.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sign.css ?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  <!-- google Icons library -->
    <!-- using bootstrap to make it looks good. -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Sign In</title>
</head>


<body>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Budget Managment</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="signUp.php">SignUp</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="SignIn.php">SignIn</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="findUs.php">Find-Us</a>
      </li>    
    </ul>
  </div>  
</nav>
<br>

    <main>     
        <form action="signIn.php" method="POST" class="was-validated">

        <div class="signIn-Box">
            <p class="title-label">Sign in</p>
            <div class="user-label">
                <label rel="stylesheet" href="./" class="material-icons">person</label>
                <label for="userName">*UserName :</label>
                <input type="text" name="username" class="form-control" placeholder="Enter your name..." pattern="[a-zA-Z0-9]{3,15}" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="pass-label">
                <label rel="stylesheet" href="./" class="material-icons">lock</label>
                <label for="password">*Password :</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your Password..." pattern="[a-zA-Z0-9._%+-]{6-20}" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>

            </div>

            <div class="submit-button">      
                <input type="submit" name="submit" value="Login" id="submit">
            </div>

            <div>
                <a for="text" style="color:white">not a User ?</a>
                <a class="nav-link" href="signUp.php" style="color:red">SignUp</a>
            </div>
        </div>
</form>
    </main>

    <footer>
        <label rel="stylesheet" href="./" class="material-icons">copyright</label>
        Nadeem&Lian-2021
    </footer>

</body>

</html>