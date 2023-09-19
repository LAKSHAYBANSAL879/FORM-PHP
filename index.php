<?php
$insert=false;
if (isset($_POST["name"])) {

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "formvalidate";
    $con = mysqli_connect($server, $username, $password, $database);

    if (!$con) {
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    $FULL_NAME = $_POST['name'];
    $PHONE = $_POST['number'];
    $EMAIL = $_POST['mail'];
    $MESSAGE = $_POST['msg'];

    $sql = "INSERT INTO `formvalidate`.`details` ( `FULL_NAME`, `PHONE`, `EMAIL`, `MESSAGE`, `TIME`) VALUES ('$FULL_NAME', '$PHONE', '$EMAIL', '$MESSAGE', current_timestamp());";
    // echo $sql;
    if ($con->query($sql) == true) {
        echo "succesfully inserted";
        $insert=true;
    } else {
        echo "ERROR :" . $sql . "<br>" . $con->error;

    }
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FORM-VALIDATION</title>
    <link rel="stylesheet" href="index.css" />
</head>

<body>
    <div class="container">
      <?php

if($insert==true){
    echo "<h3 class='fs'>YOUR FORM IS SUBMITTED SUCESSFULLY</h3>";
}
?>
        <div class="form">
            <form action="index.php" method="post" id="myform">
                <i class="fa-solid fa-paper-plane f" id="logo"></i>
                <div class="input-group">
                    <label for="name">FULL NAME :</label>
                    <input type="text" name="name" id="name" placeholder="Enter your Name here" onkeyup="validateName()" />
                    <span id="name-error"><i class="fa-solid fa-exclamation"></i></span>
                </div>
                <div class="input-group">
                    <label for="number">PHONE NO:</label>
                    <input type="number" name="number" id="number" placeholder="+91" min="0" maxlength="10" onkeyup="validateNumber()" />
                    <span id="phone-error"><i class="fa-solid fa-exclamation"></i>10 digit number is
                        required</span>
                </div>
                <div class="input-group">
                    <label for="email">EMAIL-ID :</label>
                    <input type="email" name="mail" id="mail" placeholder="Enter your Email here" onkeyup="validateMail()" />
                    <span id="email-error"><i class="fa-solid fa-exclamation"></i>email is required</span>
                </div>
                <div class="input-group">
                    <label for="msg" name>YOUR MESSAGE :</label>
                    <textarea name="msg" id="msg" placeholder="Enter Your Message here " onkeyup="validateMsg()"></textarea>
                    <span id="msg-error"><i class="fa-solid fa-exclamation"></i>message is required</span>
                </div>
                <button id="sumbit" onclick="return validateForm()">Submit</button>
                <span id="fixerror"><i class="fa-solid fa-exclamation"></i></span>
            </form>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/8c9b0ad18f.js" crossorigin="anonymous"></script>
    <script src="index.js"></script>
</body>

</html>