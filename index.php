<?php
$insert = false;
    if(isset($_POST['name'])){
        // Set connection variable
        $server = "localhost";
        $username = "root";
        $password = "";

        // create a database connection
        $con = mysqli_connect($server, $username, $password);

        // Check for connection success
        if(!$con){
            die("Connection to this database failed due to". mysqli_connect_error());
        }
        // echo "Success connecting to the db";

        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $other = $_POST['desc'];
        $sql = "INSERT INTO `trip`.`trp` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
        // echo $sql;

        if($con->query($sql) == true){
            // echo "Successfully Inserted";
            $insert = true;
        }
        else{
            echo "Error:  $sql <br> $con->error";
        }
        $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="container">
        <h1>Welcome to us trip form</h1>
        <p>Enter details and submit this form</p>
        <?php 
            if($insert == true){
                echo "<p class='submitmitting'>Thanks for submitting your form.</p>";
            }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="text" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->

        </form>
    </div>

    <script src="index.js"></script>
</body>

</html>
<!-- INSERT INTO `trp` (`sno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('1', 'testname', '11', 'Male', 'test@gmail.com', '9999999999', 'This is a good desc', current_timestamp()); -->
