<?php 
require "all.php";
require_once 'process.php'; 
if(isset($_SESSION['message'])):
endif    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Calculator</title>

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
      <li class="nav-item">
        <a class="nav-link" href="findUs.php">Find-Us</a>
      </li>   
      <?php 
      if(isset($_SESSION['username']))
      {
       echo '<li class="nav-item"><a class="nav-link" href="budget.php">myBudget</a></li>';
      echo '<li class="nav-item"><a class="nav-link" href="signOut.php">SignOut</a></li> ';
      }
      
      
      ?> 
    </ul>
  </div>  
</nav>
    <br><br><br>


    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2 class="text-center">Add Expense</h2>
                <hr><br>
                <form action="process.php" method="POST">
                    <div class="form-group">
                        <label for="budgetTitle">Budget Title</label>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="text" name="budget" class="form-control" id="budgetTitle" placeholder="Enter Budget Title" required autocomplete="off"  value="<?php echo $name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" name="amount" class="form-control" id="amount" placeholder="Enter Amount" required  value="<?php echo $amount; ?>">
                    </div>
                    <?php if($update == true): ?>
                    <button type="submit" name="update" class="btn btn-success btn-block">Update</button>
                    <?php else: ?>
                    <button type="submit" name="save" class="btn btn-primary btn-block">Save</button>
                    <?php endif; ?>
                </form>
            </div>
            <div class="col-md-8">
                <h2 class="text-center">Total Expenses : $ <?php echo $total;?></h2>
                <hr>
                <br><br>

                <?php 

                    if(isset($_SESSION['massage'])){
                        echo    "<div class='alert alert-{$_SESSION['msg_type']} alert-dismissible fade show ' role='alert'>
                                    <strong> {$_SESSION['massage']} </storng>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>
                                ";
                    }

                ?>
                <h2>Expenses List</h2>

                <?php 
                    // write the query
                    $sql = "SELECT * FROM budget";
                   //Execute the sql 
                    $result = $pdo->query($sql);
                ?>

                <div class="row justify-content-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Budget Name</th>
                                <th>Budget Amount</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>

                        <?php 
                            if($result->rowCount() > 0){
                            // output data for each row
                             while ($row = $result->fetch()){
                         ?>
                         
                            <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td> $ <?php echo $row['amount']; ?></td>
                                <td>
                                    <a href="budget.php?edit=<?php echo $row['id']; ?>" class="btn btn-success">edit</a>
                                    <a href="process.php?delete=<?php echo $row['id']; ?>"  class="btn btn-danger">delete</a>
                                </td>
                            </tr>

                        <?php } } ?>
                             
                    </table>
                </div>
            </div>
        </div>
    </div>


</body>
</html>