<?php
    session_start();

    if ((! empty($_SESSION['login']) || (! empty($_SESSION['verify'])))) {
        header('location: ../index.php');
    }
    else {
        ?> 

    <?php
        include_once("../Database/config.php");

        if(isset($_POST['signin'])){
            $pass = $_POST['pass'];
            $email = $_POST['email'];

            if ($_POST['pass'] == '' || $_POST['email'] == '') {
                echo("<script type='text/javascript'>alert('All fields are required!')</script>"); 
            }
            // Fetch all users from the database
            $Data = "SELECT * FROM `signup` WHERE pass = '$pass' AND email = '$email' ";
            $Fetch = mysqli_query($pdo, $Data) or die("Error fetching email and password");

            while($Data = mysqli_fetch_array($Fetch)){
                $_SESSION['username'] = $Data['username'];
                $_SESSION['pass'] = $Data['passwd'];
            }

            if(mysqli_num_rows($Fetch) > 0){

                $_SESSION['username'] = $user;
                $_SESSION['login'] = 'true';
                $_SESSION['verify'] = 'verified';
                
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
                background: #6c757d!important; linear-gradient(lightblue, skyblue); url(../../../../img/deals.jpg);
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
                            <h1 class="fw-bold mb-0 fs-2">Let's see if you're you</h1>
                        </div>
                        <div class="modal-body rounded-3  pt-0">
                            <form method="post">
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
<?php } ?>