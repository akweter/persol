
<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
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
            color: red;
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
                        <h1 class="fw-bold mb-0 fs-2 offset-2">Verify if you're human</h1>
                    </div>
                    <div class="modal-body rounded-3  pt-0">
                        <form method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-3" id="guess" name="guess" placeholder="Guess" required>
                                <label for="guess">Any random number</label>
                            </div>
                            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-info" name="submit" type="submit">Okay</button>
                        </form>
                        <p>
                            <?php
                                if (! isset($_POST['guess'])) {
                                    echo('<h5>Answer cannot be empty</h5>');
                                }
                                elseif (! is_numeric($_POST['guess'])) {
                                    echo('<h5>Your value should be numeric</h5>');
                                }
                                elseif (($_POST['guess']) > 33 || ($_POST['guess'] == 33) ) {
                                    echo('<h5>Value should be less than 33</h5>');
                                }
                                elseif (($_POST['guess'] < 31 ) || ($_POST['guess'] == 31) ) {
                                    echo('<h5>Try answer greater than 31</h5>');
                                }
                                else {
                                    if (! isset($_SESSION['verify'])){
                                        $_SESSION['verify'] = 'verified';
                                        $_SESSION['login'] = 'true';
                                    echo("<script type='text/javascript'>alert('Verified')</script>");
                                    header('location: ../index.php');
                                    // ($_POST['guess'] == 32 )
                                    }
                                }
                                // else {
                                //     echo('<h5>Try Again!</h5>');
                                // }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
