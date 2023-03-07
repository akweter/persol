<?php
    session_start();

    if ((! empty($_SESSION['admin_login']) || (! empty($_SESSION['admin_sign_up'])))) {
        header('location: ../dashboard.php');
    }
    else {
        ?> 

    <?php
        include_once("../../database/config.php");

        if(isset($_POST['Signup'])){

            if (($_POST['pass1']) != ($_POST['pass2'])) {
                echo("<script type='text/javascript'>alert('Passwords do not match')</script>");
            }

            elseif( empty($_POST['username']) || empty($_POST['email']) || empty($_POST['pass1']) ) {
                echo("<script type='text/javascript'>alert('All fields are required!')</script>");
            }

            $eAddress = htmlspecialchars($_POST['email']);
            $Username = htmlspecialchars($_POST['username']);
            $PassWd = htmlspecialchars($_POST['pass1']);
            $status = htmlspecialchars($_POST['admin_status']);
            $avatar = htmlspecialchars($_POST['avatar']);

            // Comaparing user info to the one in the database
            $Data = "SELECT * FROM `admin_users` WHERE Username = '$Username' OR email_Add = '$eAddress' ";
            $Query = mysqli_query($PDO, $Data) or die("Error fetching email and password");

            if(mysqli_num_rows($Query) > 0){
                echo("<script type='text/javascript'>alert('Username or Email already exist')</script>");
            }
            else{
                $_SESSION['admin'] = 'Admin';
                $_SESSION['admin_login'] = 'true';
                $_SESSION['admin_sign_up'] = 'true';
                $_SESSION['admin_username'] = $username;
                
                mysqli_query($PDO, "INSERT INTO `admin_users`(`Admin_id`, `email_Add`, `Logo`, `Username`, `Status`, `PassWD`) VALUES ('', '$eAddress', '$avatar', '$Username', '$status', '$PassWd')");

                echo("<script type='text/javascript'>alert('Sign up successfully')</script>");
                header('location: ./login.php');
            }
        }
    ?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="Supermarket Management Software">
            <meta name="author" content="James Akweter">
            <meta name="generator" content="Angel Dev Team">
            <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
            <title>Admin Sign Up</title>
            <link rel="stylesheet" href="../../node_modules/bootstrap/bootstrap.min.css">
            <style>
                body{
                    background: gray;
                    margin: 0 20%;
                }
                div.modal-dialog{
                    background: white;
                    margin: 2% 0;
                    border-radius: 10% 20% 5% 2%;
                }
            </style>
        </head>
        <body>
            <div class="modal-dialog">
                <div class="modal-content p-3 ">
                    <div class="modal-header pb-4 border-bottom-0">
                        <h1 class="fw-bold mb-0 fs-2 offset-2">Sign up for free</h1>
                    </div>
                    <div class="modal-body rounded-3  pt-0">
                            <form method="post">
                                <div class="form-floating mb-3">
                                    <input required type="text" class="form-control rounded-3" id="username" name="username" placeholder="John1">
                                    <label for="username">Username</label>
                                <div class="form-floating mb-3">
                                    <input required type="email" class="form-control rounded-3" id="email" name="email" placeholder="john.doe@domain.com">
                                    <label for="email">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input required type="password" name="pass1" class="form-control rounded-3" id="pass1" placeholder="Password">
                                    <label for="pass1">Password</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input required type="password" name="pass2" class="form-control rounded-3" id="pass2" placeholder="Comfirm Password">
                                    <label for="pass2">Comfirm Password</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <label for="avatar">Profile</label>
                                    <input type="file" name="avatar" class="form-control form-control-lg" id="avatar">
                                </div>
                                <div>
                                    <input type="hidden" name="admin_status" value="admin">
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
