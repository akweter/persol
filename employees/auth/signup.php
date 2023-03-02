<?php
    session_start();

    if ((! empty($_SESSION['login']) || (! empty($_SESSION['verify'])))) {
        header('location: ../index.php');
    }
    else {
        ?> 

    <?php
        include_once("../Database/config.php");

        if(isset($_POST['Signup'])){

            if (($_POST['pass1']) != ($_POST['pass2'])) {
                echo("<script type='text/javascript'>alert('Passwords do not match')</script>");
            }

            elseif( empty($_POST['username']) || empty($_POST['email']) || empty($_POST['pass1']) ) {
                echo("<script type='text/javascript'>alert('All fields are required!')</script>");
            }

            $eAddress = $_POST['email'];
            $Username = $_POST['username'];

            // Fetch all users from the database
            $User = "SELECT * FROM `users_signup` WHERE username = '$Username' OR email = '$eAddress' ";
            $Qeury = mysqli_query($pdo, $User) or die("Error fetching email and password");

            if(mysqli_num_rows($Qeury) > 0){
                echo("<script type='text/javascript'>alert('Username or Email already exist')</script>");
            }
            else{
                $_SESSION['signup'] = 'true';
                $pass = $_POST['pass1'];
                $_SESSION['username'] = $_POST['username'];

                mysqli_query($pdo, "INSERT INTO `users_signup`(`email`, `profile`, `pass`, `username`) VALUES ('$eAddress','','$pass','$Username')");

                echo("<script type='text/javascript'>alert('Sign up successfully')</script>");
                header('location: ./verify.php');
            }
        }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="https://pbs.twimg.com/profile_banners/1008452946/1355397074/1500x500">
        <link rel="icon" type="image/png" sizes="16x16" href="https://pbs.twimg.com/profile_banners/1008452946/1355397074/1500x500">
        <link rel="manifest" href="/site.webmanifest">
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
                                    <input type="text" class="form-control rounded-3" id="username" name="username" placeholder="John1">
                                    <label for="username">Username</label>
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
                                <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" name="Signup" type="submit">Sign up</button>
                                <small class="text-muted">By clicking Sign up, you agree to our <a href="#">terms</a> and <a href="#">conditions</a></small>
                                <hr class="my-4">
                                <div>
                                    <h5 style="text-align:center;">Already have account?</h5>
                                    <a href="./login.php" class="w-100 mb-4 btn btn-md rounded-3 btn-warning"><strong> Login</strong></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>
<?php } ?>
