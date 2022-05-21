<?php

$insert=false;
if(isset($_POST['name'])){
    // Set connection variable
   $sarver = "localhost";
   $username = "root";
   $password = "";
    // Create database connection
   $con = mysqli_connect($sarver,$username,$password);

//    Check for connection

//    if(!$con){
//        die("Connection to this database faied".mysqli_connect_error());
//    }
//    else{
//        echo"Successfully connected";
//    }

// Collect post variable
   $name = $_POST['name'];
   $age = $_POST['age'];
   $gender = $_POST['gender'];
   
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $other = $_POST['other'];


 $sql= "INSERT INTO `us_trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";

//  echo $sql;

// Execute the query
 if($con->query($sql) == true){
    //  echo"Successfully inserted";

    // Flug for successfull connection
    $insert=true;
 }
 else{
     echo"ERROR: $sql <br> $con->error";
 }


// Close the database connection
 $con->close();

}
?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Koushik Travel</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Nunito:ital,wght@1,500&family=Roboto+Slab:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>
<body>



    <img class="bg" src="bg.jpg" alt="Koushik Travel">
    <div class="container">
        <h1 class="head">Welcome to Koushik Travel for US trip</h1>
        <p>Enter your details and submit the form to confirm your participation in the trip </p>"
        <?php
        if($insert==true){
        echo"<p>Thank you for submiting the form. We are happy to see you joining us for the us trip.  </p>";
        }
        ?>
        <form action="index.php" method="post">
            <p class="input-text">Name:</p>
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <p class="input-text">Age:</p>
            <input type="number" name="age" id="age" placeholder="Enter your age">
            <p class="input-text">Gender:</p>
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <p class="input-text">Email:</p>
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <p class="input-text">Phone:</p>
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <p class="input-text">Comment:</p>
            <textarea name="other" id="other" cols="30" rows="10"></textarea>
            <button class="btn">Submit</button>
           
        </form>
        
    </div>
    <script src="index.js"></script>

    
</body>
</html>