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

                            <div class="carousel-item active">
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="table-dark">
                                            <th scope="col">#</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Status</th>
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
                                            <td><?=$query['Status']?></td>
                                            <td class="text-danger"><a href="./edit_customer.php?editUser=<?=$query['C_id'];?>"><i class="fa fa-edit fa-lg"></i>Edit</a> | <a onclick="return confirm('This operation is risky. Are you sure to delete?');" href="./user_action.php?eraseUser=<?=$query['pid'];?>"><i class="fa fa-times fa-lg"></i>Delete</a> | <a href='./user_action.php?moreDetails=<?=$query['pid'];?>'><i class="fa fa-search fa-lg"></i>View</a></td>
                                        </tr>
                                    </tbody>
                                        <?php } ?>
                                </table>
                            </div>

                            <div class="carousel-item">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="table-danger">
                                            <th scope="col">#</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Status</th>
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
                                            <td><?=$query['Status'] ?></td>
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
        <script src="../../node_modules/bootstrap/bootstrap.min.js"></script>
        <script src="../../node_modules\fontawesome\js\fontawesome.min.js"></script>
        <script src="../../node_modules\fontawesome\js\all.min.js"></script>
    </body>
</html>
