<?php
    session_start();

    // if ((! empty($_SESSION['admin_login']) || (! empty($_SESSION['admin_sign_up'])))) {
    //     header('location: ../dashboard.php');
    // }
    // else {
        ?> 

    <?php
        include_once("../../database/config.php");

        if(isset($_POST['Signup'])){

            if( empty($_POST['username']) || empty($_POST['email']) || empty($_POST['pass1']) ) {
                $fields_required = '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h4>All fields are required!</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            elseif (($_POST['pass1']) !== ($_POST['pass2'])) {
                $wrong_input = '
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <h4>Passwords do not match</h4
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            else {
                $eAddress = htmlspecialchars($_POST['email']);
                $Username = htmlspecialchars($_POST['username']);
                $PassWd = htmlspecialchars($_POST['pass1']);
                $status = htmlspecialchars($_POST['admin_status']);
                $avatar = htmlspecialchars($_POST['avatar']);

                // Comaparing user info to the one in the database
                $Data = "SELECT * FROM `admin_users` WHERE Username = '$Username' OR email_Add = '$eAddress' ";
                $Query = mysqli_query($PDO, $Data) or die("Error fetching email and password");

                if(mysqli_num_rows($Query) > 0){
                    $user_exists = '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h4>Username or Email exists!</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
                else{
                    // $_SESSION['admin'] = 'Admin';
                    // $_SESSION['admin_login'] = 'true';
                    // $_SESSION['admin_sign_up'] = 'true';
                    // $_SESSION['admin_username'] = $Username;
                    
                    mysqli_query($PDO, "INSERT INTO `admin_users`(`Admin_id`, `email_Add`, `Logo`, `Username`, `Status`, `PassWD`) VALUES ('', '$eAddress', '$avatar', '$Username', 'Admin', '$PassWd')");

                    $user_added = '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <h4>You are added sucessfully</h4><a href="./login.php" class="btn btn-warning">Sign In</a>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
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
                        <?php if (isset($user_added)) {echo($user_added);} if (isset($user_exists)) {echo($user_exists);} if (isset($wrong_input)) {echo($wrong_input);} if (isset($fields_required)) {echo($fields_required);} ?>
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
            <script src="../../node_modules/bootstrap/bootstrap.min.js"></script>
        </body>
    </html>
<?php //} ?>
