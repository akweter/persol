<?php
    session_start();
    include_once("../Database/config.php");

    if(isset($_POST['Signup'])){

        if( empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['pass1']) ) {
            echo("<script type='text/javascript'>alert('All fields are required!')</script>");
            return;
        }
        if (($_POST['pass1']) != ($_POST['pass2'])) {
            echo("<script type='text/javascript'>alert('Passwords do not match')</script>");
            return;
        }

        $eAddress = $_POST['email'];

        // Fetch all users from the database
        $Data = "SELECT * FROM `persol` WHERE email = '$eAddress' ";
        $Fetch = mysqli_query($pdo, $Data) or die("Error fetching email and password");

        if(mysqli_num_rows($Fetch) > 0){
            echo("<script type='text/javascript'>alert('Email already exist')</script>");
            return;
        }

        else{

            $fName = $_POST['fname'];
            $lName = $_POST['lname'];
            $pass = $_POST['pass1'];

            $_SESSION['fname'] = $_POST['fname'];

            mysqli_query($pdo, "INSERT INTO `persol`(`id`, `idNumber`, `idType`, `email`, `firstName`, `lastName`, `mobile`, `residence`, `field`, `date`, `department`, `team`, `staffId`, `bankName`, `bankAccount`, `educationLevel`, `hometown`, `digitalAddress`, `experienceYears`, `experience`, `passwd`) VALUES ('', '', '', '$eAddress', '$fName', '$lName', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '$pass')");

            echo("<script type='text/javascript'>alert('Sign up successfully')</script>");
            header('location:../');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User | Sign Up</title>
    <link rel="stylesheet" href="../node_modules/bootstrap.min.css">
    <style>
        body{
            background: #6c757d!important;
        }
        h1{
            text-align: center;
            text-transform: capitalize;
            margin-bottom: 2%;
        }
        h5{
            text-align: center;
        }
        div.modal-content{
            border-radius: 20% 5% 20% 5%;
        }
    </style>
    </head>
    <body>
            <div class="py-5 modal-dialog">
                <div class="modal-content p-3 ">
                    <div class="modal-header pb-4 border-bottom-0">
                        <h1 class="fw-bold mb-0 fs-2 offset-2">Sign up for free</h1>
                    </div>
                    <div class="modal-body rounded-3  pt-0">
                        <form method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-3" id="fname" name="fname" placeholder="John">
                                <label for="fname">First Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-3" id="lname" name="lname" placeholder="Doe">
                                <label for="lname">Last Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="john.doe@domain.com">
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="pass1" class="form-control rounded-3" id="pass1" placeholder="Password">
                                <label for="pass1">Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="pass2" class="form-control rounded-3" id="pass2" placeholder="Comfirm Password">
                                <label for="pass2">Comfirm Password</label>
                            </div>
                            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-info" name="Signup" type="submit">Sign up</button>
                            <small class="text-muted">By clicking Sign up, you agree to our <a href="#">terms</a> and <a href="#">conditions</a></small>
                            <hr class="my-4">
                            <div style="display:flex; flex-direction:row;">
                                <h5 style="margin-right:5%;">Or</h5>
                                <a href="./login.php" class="w-100 mb-4 btn btn-md rounded-3 btn-primary">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
