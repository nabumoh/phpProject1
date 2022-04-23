<?php
// Create connection
require "all.php";

session_start();

// intialize for local variables values.
$total = 0;
$update = false;
$id=0;
$name = '';
$amount = '';

// function for saving the the (name,amount) into the the table in DataBase
    if(isset($_POST['save'])){
       
        $budget = $_POST['budget'];
        $amount = $_POST['amount'];

        $sql= "INSERT INTO budget (name, amount) VALUE ('$budget', '$amount')";

        //writing the query
        $result = $pdo->query($sql); 
        
        $_SESSION['massage'] = "Recode has been saved !";
        $_SESSION['msg_type'] = "primary";

        header("location: budget.php?result=true");
    }

    

        // it take all the info from the DataBase Table
        $sql = "SELECT * FROM budget";
        //writing the query
         $result = $pdo->query($sql);

    //While Condition to fetch every row one by one in DataBase  & Calculates the Total budget
    while($row = $result->fetch()){

              $total = $total + $row['amount'];         
    }

    //Delete the row of the Budget data by Selecting the ID in the DataBase which declared in AUTO INCREMENT way.
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];

        $sql = "DELETE FROM budget WHERE id=$id";
        //writing the query 
         $result = $pdo->query($sql);

        $_SESSION['massage'] = "Recode has been Delete !";
        $_SESSION['msg_type'] = "danger";

        header("location: budget.php");

    }

    //Edit the row of the Budget data by Selecting the ID in the DataBase which declared in AUTO INCREMENT way.
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;

        $sql = "SELECT * FROM budget WHERE id=$id";
        //writing the query 
         $result = $pdo->query($sql);

         //cheks if we got one result from of this ID (==1) then every thing is fine and the clicked excits so he can do the function.
        if( $count=$result->rowCount() == 1){
            $row = $result->fetch($count);
            $name = $row['name'];
            $amount = $row['amount'];
        }    
    }

    //Update the row of the Budget data by Selecting the ID in the DataBase which declared in AUTO INCREMENT way.
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $budget = $_POST['budget'];
        $amount = $_POST['amount'];

        $sql = "UPDATE budget SET name='$budget', amount='$amount' WHERE id='$id'";
        //writing the query
         $result = $pdo->query($sql);

        $_SESSION['massage'] = "Recode has been Updated !";
        $_SESSION['msg_type'] = "success";
        header("location: budget.php");
    }


?>

