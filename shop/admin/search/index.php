
<?php
    $admin_signup =  $_SESSION['admin_sign_up'];
    $admin_login = $_SESSION['admin_login'];
    $admin_username = $_SESSION['admin_username'];
    $status = $_SESSION['admin'];

    if (empty($admin_login) || empty($admin_signup)) {
        header('location: ../auth/login.php');
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
        <title>Search</title>
        <link rel="stylesheet" href="../../node_modules/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../../node_modules/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="../../node_modules/fontawesome/css/all.css">
    </head>
    <body>

        <!-- Header -->
        <header>
            <div class="px-3 py-2 text-bg-info">
                <div class="container">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                        <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
                        </a>
                        <ul class="nav p-3 col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                            <li>
                                <a href="../" class="btn btn-light btn-lg">Dashboard</a>
                            </li>
                            <li class="">
                                <a href="./auth/logout.php"><button type="button" class="btn btn-lg btn-danger">Log Out</button></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Main Content -->
            <div class="container-fluid container m-5">
            
                <?php
                    include_once("../../database/config.php");

                    if(isset($_SERVER['sp'])){
                        $filter = $_GET['p-q'];
                        $scan = "SELECT * FROM `products` WHERE CONCAT(P_name,P_detail,P_category,P_price) LIKE '%$filter%' ";
                        $scan_run = mysqli_query($PDO, $scan);

                        // `admin_users` AND `customers`

                        if(mysqli_num_rows($scan_run) > 0){
                            foreach($scan_run as $data){
                    ?>
                    <div class="list-group">
                        <a href="#" class='list-group-item-item'>data</a>
                    </div>

                    <?php } }
                        else{ ?>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">No match found</a>
                        </div>
                <?php }}
                else {
                    echo "
                    <div class='list-group'>
                        <a href='#' class='list-group-item list-group-item-action'>No match found</a>
                    </div>";
                }?>
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
