<?php
    error_reporting(E_WARNING || E_NOTICE || E_ERROR);
    session_start();
    include_once("../../database/config.php");
    
    $admin_signup =  $_SESSION['admin_sign_up'];
    $admin_login = $_SESSION['admin_login'];
    $admin_username = $_SESSION['admin_username'];
    $status = $_SESSION['admin'];

    if (empty($admin_login) || empty($admin_signup)) {
        header('location: ./auth/login.php');
    }

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
                        <h4>New admin added sucessfully</h4>
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
        <link rel="icon" sizes="180x180" href="../../public/img/glass.webp">
        <link rel="apple-touch-icon" sizes="180x180" href="../../public/img/glass.webp">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="../../node_modules/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../../node_modules/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="../../node_modules/fontawesome/css/all.css">
    </head>
    <body>

        <!-- Header -->
        <header>
        <div class="px-3 py-2 bg-info">
                <div class="container">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="./" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><img src="../../public/img/wheat.jpg" width="50" height="50" alt="logo" srcset=""></svg><h1 style="margin-left:50px;">Welcome <?php if (isset($admin_username)) {echo($admin_username);}?> <i class="badge bg-danger"><?php if (isset($status)) {echo($status);} ?></i></h1>
                        </a>
                        <ul class="nav p-3 col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                            <li>
                                <button type="button" class="btn btn-sm btn-light dropdown-toggle border">
                                <span data-feather="calendar" class="align-text-bottom"></span>This week
                            </button>
                            </li>
                            <li>
                                <button type="button" class="btn btn-sm btn-light btn-light border">Share</button>
                            </li>
                            <li>
                                <button type="button" class="btn btn-sm btn-light btn-light border">Export</button>
                            </li>
                            <li class="">
                                <a href="../auth/logout.php"><button type="button" class="btn btn-sm btn-danger">Log Out</button></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="px-3 py-2 bg-light border-bottom mb-3">
                <div class="container d-flex flex-wrap justify-content-center">
                    <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto" role="search">
                        <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                    </form>

                    <div class="btn-toolbar mb-2 mb-md-0">
                        <h1>Users</h1>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Main Content -->
        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3 sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="../dashboard.php" class="nav-link text-decoration-none">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a href="../stock" class="nav-link text-decoration-none">Stock</a>
                            </li>
                            <li class="nav-item">
                                <a href="../product" class="nav-link text-decoration-none">Products</a>
                            </li>
                            <li class="nav-item">
                                <a href="../orders" class="nav-link text-decoration-none">Orders</a>
                            </li>
                            <li class="mb-1">
                                <!-- <button class="nav-link btn">Users</button> -->
                                <!-- <div class="collapse" id="orders-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <li><a href="#" class="nav-link text-danger d-inline-flex text-decoration-none rounded">Admin</a></li>
                                        <li><a href="#" class="nav-link text-danger d-inline-flex text-decoration-none rounded">Customers</a></li>
                                    </ul>
                                </div> -->
                                <div  class="">
                                    <button  class="nav-link btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">Users</button>                                   <div class="collapse show" id="home-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <li><a href="#" type="button" data-bs-target="#user_carousel" data-bs-slide-to="0" class="nav-link text-danger d-inline-flex text-decoration-none rounded">Customers</a></li>
                                        <li><a href="#" type="button" data-bs-target="#user_carousel" data-bs-slide-to="1" aria-label="Slide 1" class="nav-link text-danger d-inline-flex text-decoration-none rounded">Admins</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>

                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                            <span>Account</span>
                            <a class="link-secondary" href="#" aria-label="Add a new report">
                                <span data-feather="plus-circle" class="align-text-bottom"></span>
                            </a>
                        </h6>
                        <ul class="nav flex-column mb-2">
                            <li class="nav-item">
                            <img src="./" alt="Avatar">
                            </li>
                            
                        </ul>
                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div id="user_carousel" class="carousel slide">
                        <div class="carousel-inner">

                        <!-- ITEM ONE -->
                            <div class="carousel-item active">
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="table-dark">
                                            <th scope="col">#</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <!-- <th scope="col">Status</th> -->
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                        <?php
                                        $Fetch = mysqli_query($PDO, "SELECT * FROM `customers` ORDER BY Username ASC") or die("Error fetching products");
                                        $num = 1;
                                                    
                                        while($query = mysqli_fetch_array($Fetch)){ ?>
                                    <tbody>
                                        <tr>
                                            <td><?=$num++ ?></td>
                                            <td><?=$query['Username'] ?></td>
                                            <td><?=$query['email_Add'] ?></td>
                                            <td><?=$query['C_fn'] ?></td>
                                            <td><?=$query['C_ln']?></td>
                                            <!-- <td><?=$query['Status']?></td> -->
                                            <td class="text-danger"><a href="./edit_customer.php?editUser=<?=$query['C_id'];?>"><i class="fa fa-edit fa-lg"></i>Edit</a> | <a onclick="return confirm('This operation is risky. Are you sure to delete?');" href="./user_action.php?eraseUser=<?=$query['pid'];?>"><i class="fa fa-times fa-lg"></i>Delete</a> | <a href='./user_action.php?moreDetails=<?=$query['pid'];?>'><i class="fa fa-search fa-lg"></i>View</a></td>
                                        </tr>
                                    </tbody>
                                        <?php } ?>
                                </table>
                            </div>

                            <!-- ITEM TWO -->
                            <div class="carousel-item">
                                <a data-bs-toggle="modal" data-bs-target="#add_new_admin_modal" href="#" class="btn btn-lg btn-primary m-2">Add new admin</a>
                            <?php if (isset($user_added)) {echo($user_added);} if (isset($user_exists)) {echo($user_exists);} if (isset($wrong_input)) {echo($wrong_input);} if (isset($fields_required)) {echo($fields_required);} ?>
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="table-danger">
                                            <th scope="col">#</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Email</th>
                                            <!-- <th scope="col">Status</th> -->
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                        <?php
                                        $Fetch = mysqli_query($PDO, "SELECT * FROM `admin_users` ORDER BY Username ASC") or die("Error fetching products");
                                        $num = 1;
                                                    
                                        while($query = mysqli_fetch_array($Fetch)){ ?>
                                    <tbody>
                                        <tr>
                                            <td><?=$num++ ?></td>
                                            <td><?=$query['Username'] ?></td>
                                            <td><?=$query['email_Add'] ?></td>
                                            <!-- <td><?=$query['Status'] ?></td> -->
                                            <td class="text-danger"><a href='./user_action.php?adminDetails=<?=$query['Admin_id'];?>'><i class="fa fa-search fa-lg"></i>View More</a></td>
                                        </tr>
                                    </tbody>
                                        <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <!-- Footer -->
        <div class="bg-info">
                <footer class="py-4 container">
                    <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                        <p>&copy; <?php echo(date("Y")); ?> Angel Dev Team. All rights reserved.</p>
                    </div>
                </footer>
            </div>
        </div>

        
        <!-- CART MODAL -->
        <div class="modal fade" id="add_new_admin_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="add_new_admin_modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="add_new_admin_modalLabel">Add New Administrator</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
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
                                <div>
                                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" name="Signup" type="submit"></button>
                                <div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="Signup" data-bs-dismiss="modal">Add Admin</button>
                            <small class="text-muted">By clicking Sign up, you agree to our <a href="#">terms</a> and <a href="#">conditions</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="../../node_modules/bootstrap/bootstrap.min.js"></script>
        <script src="../../node_modules\fontawesome\js\fontawesome.min.js"></script>
        <script src="../../node_modules\fontawesome\js\all.min.js"></script>
    </body>
</html>
