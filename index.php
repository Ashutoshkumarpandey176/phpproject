<?php
$insert = false;
if (isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $con = mysqli_connect($server, $username, $password);

    if (!$con) {
        die("connection to this database failed due to " . mysqli_connect_error());
    }

    $name   = $_POST['name']   ?? '';
    $age    = $_POST['age']    ?? '';
    $gender = $_POST['gender'] ?? '';
    $email  = $_POST['email']  ?? '';
    $Phone  = $_POST['Phone']  ?? '';
    $desc   = $_POST['desc']   ?? '';

    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `Phone`, `other`, `dt`) 
            VALUES ('$name', '$age', '$gender', '$email', '$Phone', '$desc', current_timestamp());";

    if ($con->query($sql) == true) {
        $insert = true;
    } else {
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel from </title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<img class="bg" src="maxresdefault.jpg" alt="Graphic Era Hill University">
    <div class="container">
       <b><h1>Welcome To Graphic Era US Trip form</h1></b>
        <p>Enter your details to confirm your participation in the trip</p>

        <?php
        if ($insert == true) {
            echo "<p class='SubmitMsg'>Thanks for submitting the form, graphians! Enjoy your US Trip</p>";
        }
        ?>

        <form action="" method="post">
            <input type="text" name="name" id="name" placeholder="Enter the name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="Phone" name="Phone" id="Phone" placeholder="Enter the phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter your information here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>

