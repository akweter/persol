<?php
    session_start();
    $admin_session =  $_SESSION['admin_sign_up'];

    if (empty($admin_session)) {
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
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="../node_modules/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../node_modules/fontawesome/css/all.min.css">
        <style>
            .card-title,.card-text{color:red;cursor: pointer;}.fa{color:lightgreen;}
        </style>
    </head>
    <body>

        <!-- Header -->
        <header>
            <div class="px-3 py-2 bg-info">
                <div class="container">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                        <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
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
                                <a href="./auth/logout.php"><button type="button" class="btn btn-sm btn-danger">Log Out</button></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="bg-light px-3 py-2 border-bottom mb-3">
                <div class="container d-flex flex-wrap justify-content-center">
                    <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto" role="search">
                        <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                    </form>

                    <div class="btn-toolbar mb-2 mb-md-0">
                        <h1>Admin Dashboard</h1>
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
                                <button class="nav-link btn btn-toggle d-inline-flex align-items-center rounded border-0">Dashboard</button>  
                            </li>
                            <li class="nav-item">
                                <a href="./stock" class="text-decoration-none"><button class="nav-link btn btn-toggle d-inline-flex align-items-center rounded border-0">Stock</button></a>
                            </li>
                            <li class="nav-item">
                                <a href="./product" class="text-decoration-none"><button class="nav-link btn btn-toggle d-inline-flex align-items-center rounded border-0">Products</button></a>
                            </li>
                            <li class="nav-item">
                                <a href="./orders" class="text-decoration-none"><button class="nav-link btn btn-toggle d-inline-flex align-items-center rounded border-0">Orders</button></a>
                            </li>
                            <li class="nav-item">
                                <a href="./user" class="text-decoration-none"><button class="nav-link btn btn-toggle d-inline-flex align-items-center rounded border-0">Users</button></a>
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
                    <div class="album py-2">
                        
                        <div class="album py-4 mb-4">
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                                <div class="col">
                                    <div class="card">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <i class="fa fa-user-friends fa-3x fill p-3"></i>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">2</h5>
                                                    <p class="card-text">Users</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <i class="fa fa-th-list fa-3x p-3"></i>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">12</h5>
                                                    <p class="card-text">Categories</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <i class="fa fa-shopping-cart fa-3x p-3"></i>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">9</h5>
                                                    <p class="card-text">Products</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <i class="fa fa-money-bill-wave fa-3x p-3"></i>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">GHS: 5232</h5>
                                                    <p class="card-text">Orders</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="album">
                            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-3 g-3">
                                <div class="col col-md-5">
                                    <h4 class="">Top Products</h4>
                                    <table class=" table table-striped">
                                        <thead class="thead">
                                            <tr>
                                                <td>Title</td><td>Total Sold</td><td>Total QTY</td>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody">
                                            <tr>
                                                <td>Cement</td><td>50</td><td>542</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col col-md-5">
                                    <h4 class="">New Orders</h4>
                                    <table class=" table table-striped">
                                        <thead class="thead">
                                            <tr>
                                                <td>#</td><td>Product Name</td><td>Date</td><td>Total Sale</td>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody">
                                            <tr>
                                                <td>2</td><td>ODE</td><td>2023/02/23</td><td>GHS: 242</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col col-md-2">
                                    <div class="card rounded-3 shadow-sm">
                                        <div class="card-header">
                                            <h4 class="my-0 fw-normal">Checklists</h4>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-unstyled">
                                                <li>10 active users</li>
                                                <li>2 GB of storage</li>
                                                <li>Email support</li>
                                                <li>Help center access</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
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
                    <p>&copy; 2023 Company, Inc. All rights reserved.</p>
                    <ul class="list-unstyled d-flex">
                        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
                        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
                        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
                    </ul>
                </div>
            </footer>
            </div>
        <script src="../node_modules/bootstrap/bootstrap.min.js"></script>
       </body>
</html>
