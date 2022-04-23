<?php
require "all.php";
require "edit.php"
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style/sign.css ?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <!-- using bootstrap to make it looks good. -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Sign Up</title>
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
        <a class="nav-link" href="budget.php">myBudget</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="findUs.php">Find-Us</a>
      </li>    
    </ul>
  </div>  
</nav>
<br>
    <main>
     <form action="" method="POST" class="was-validated">
        <div class="signIn-Box">
            <p class="title-label">Update Form</p>
            <div class="user-label">
                <label rel="stylesheet" href="./" class="material-icons">person</label>
                <label for="userName">*UserName :</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" placeholder="Enter your name..." required>
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="email-label">
                <label rel="stylesheet" href="./" class="material-icons">email</label>
                <label for="email">*email :</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="examble@gmail.com" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="phone-label">
                <label rel="stylesheet" href="./" class="material-icons">phone</label>
                <label for="Phone">*Phone :</label>
                <input type="number" name="phone" class="form-control" value="<?php echo $phone; ?>" placeholder="+972-50-123-1234" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="pass-label">
                <label rel="stylesheet" href="./" class="material-icons">lock</label>
                <label for="password">*Password :</label>
                <input type="password" name="password" class="form-control"  placeholder="Enter your Password..." required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="retype-pass-label">
                <label rel="stylesheet" href="./" class="material-icons">lock</label>
                <label for="Retype-Pass">*Retype-Pass :</label>
                <input type="password" name="retypePass" class="form-control" placeholder="Retype your Password..." required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="submit-button">
                <input type="submit" name="submit" value="Login"  id="submit">
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