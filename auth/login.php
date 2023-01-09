<?php
session_start();

    if(isset($_POST['submit'])){
        $_SESSION['user'] = $_POST['user'];
        $_SESSION['success'] ="Log In";
    }
    if($_POST['pass'] == 'Persol23' ){
        $_SESSION['pass'] = 'Persol23';
        print_r($_SESSION['success']);
        unset($_SESSION['success']);
        header("location: ../");    
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
                        <h1 class="fw-bold mb-0 fs-2">Sign up for free</h1>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body rounded-3  pt-0">
                        <form method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-3" id="name" name="user" placeholder="John Doe">
                                <label for="name">Full Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="pass" class="form-control rounded-3" id="pass" placeholder="Password">
                                <label for="pass">Password: use Persol23</label>
                            </div>
                            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" name="submit" type="submit">Sign up</button>
                            <small class="text-muted">By clicking Sign up, you agree to the <a href="#">terms</a> of use.</small>
                            <hr class="my-4">
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>