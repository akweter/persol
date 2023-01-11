
<?php
    session_start();
    include_once("../Database/config.php");

    if(isset($_POST['signin'])){
        $pass = $_POST['pass'];
        $email = $_POST['email'];

        if ($_POST['pass'] == '' || $_POST['email'] == '') {
            echo("<script type='text/javascript'>alert('All fields are required!')</script>"); 
        }
        // Fetch all users from the database
        $Data = "SELECT * FROM `persol` WHERE email = '$email' AND passwd = '$pass' ";
        $Fetch = mysqli_query($pdo, $Data) or die("Error fetching email and password");

        if(mysqli_num_rows($Fetch) > 0){
            $_SESSION['success'] = 'Log in';
            $_SESSION['username'] = $_POST['username'];
            header('location: ../');
        }
        else{
            echo("<script type='text/javascript'>alert('Wrong Credentials.')</script>"); 
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        div.modal-content{
            border-radius: 20% 5% 20% 5%;
        }
    </style>
    </head>
    <body>
            <div class="py-5 modal-dialog">
                <div class="modal-content p-5 ">
                    <div class="modal-header pb-4 border-bottom-0">
                        <!-- <h1 class="modal-title fs-5" >Modal title</h1> -->
                        <h1 class="fw-bold mb-0 fs-2">Let's see if you're you</h1>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body rounded-3  pt-0">
                        <form method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-3" id="email" name="username" placeholder="johndoe">
                                <label for="username">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="john.doe@domain.com">
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="pass" class="form-control rounded-3" id="pass" placeholder="Password">
                                <label for="pass">Password</label>
                            </div>
                            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-info" name="signin" type="submit">Log in</button>
                            <div style="text-align:center;" id="forgotPass"><a href="#">Forgot password</a></div>
                            <hr class="my-4">
                            <div>
                                <h5 style="text-align:center;">Don't have account?</h5>
                                <a href="./signUp.php" class="w-100 mb-4 btn btn-md rounded-3 btn-primary" name="submit" type="submit"><strong> Sign Up</strong></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>
