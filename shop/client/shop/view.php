<?php
    session_start();
    error_reporting(E_WARNING || E_NOTICE || E_ERROR);

    include_once("../../database/config.php");

    // DISPLAY PRODUCT DATA VIA ID
    if (isset($_GET['view']) || $_POST['view']) {
        $product_ID = $_GET['view'];

        $fetch_arrays = mysqli_query($PDO, "SELECT * FROM `products` WHERE pid = '$product_ID'");
        
        while($Val = mysqli_fetch_array($fetch_arrays)){
            $pid = $Val['pid'];
            $new_name = $Val['P_name'];
            $page_title = $Val['P_name'];
            $new_SKU = $Val['P_Sku'];
            $new_price = $Val['P_price'];
            $new_category = $Val['P_category'];
            $new_image = $Val['P_image'];
            $new_details = $Val['P_detail'];
            $new_unit = $Val['P_unit'];
            $new_stock = $Val['P_qty'];
        }        
    }
    else {
        header("location: ../");
    }
    
    // CHECKOUT
    if (isset($_POST['add_basket'])) {
        $cart_session_value = $_POST['user_cart_selection'];
        $_SESSION['cartValue'] = $cart_session_value;
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
        <title><?=$page_title?> | #1 Online Market</title>
        <link rel="stylesheet" href="../../node_modules/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <!-- HEADER PAGE -->
        <header class="fixe-top">
            <div class="px-3 py-2 text-bg-dark">
                <div class="container">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                        <a href="../" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                            <p class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></p>
                        </a>
                        <button class="navbar-toggler btn btn-outline-light btn-lg" type="button" data-bs-toggle="collapse" data-bs-target="#header-nav-bar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fa fa-bars fa-lg fa-2x color-light"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="header-nav-bar">
                            <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                                <li>
                                    <a href="../" class="nav-link text-secondary"><p class="bi d-block mx-auto mb-1" width="24" height="24"><i class="fa fa-home fa-2x" aria-hidden="true"></i> </p>Mart</a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link text-white"><p class="bi d-block mx-auto mb-1" width="24" height="24"><i class="fa fa-cart-plus fa-2x"></i></p>Cart</a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link text-white"><p class="bi d-block mx-auto mb-1" width="24" height="24"><i class="fa fa-heart fa-2x"></i></p>Wishlist</a>
                                </li>
                                <li>
                                    <a href="../user_account/index.php" class="nav-link text-white">
                                        <p class="bi d-block mx-auto mb-1" width="24" height="24"><i class="fa fa-user-plus fa-2x" aria-hidden="true"></i></p>Account</a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link text-white">
                                        <p class="bi d-block mx-auto mb-1" width="24" height="24"><i class="fa fa-phone fa-2x" aria-hidden="true"></i></p>Contact</a>
                                </li>
                                <li>
                                    <a href="../user_account/login.php" class="nav-link text-white">
                                        <p class="bi d-block mx-auto" width="24" height="24"><i class="fa fa-sign-in fa-3x" aria-hidden="true"></i></p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-3 py-2 border-bottom bg-dark">
                <div class="container">
                    <form class="row" role="search">
                        <div style="display:flex;flex-direction:row;">
                            <div style="width:95%; margin-right:1%;">
                                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                            </div>
                            <div>
                                <a type="submit" href=""><button class="btn btn-outline-light btn-warning" type="submit"><i class="fa  fa-search fa-lg"></i></button></a>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </header>
        
        <!-- MAIN PAGE -->
        <main>
            <div class="container">
                <div class="row mt-2 mb-5">
                    <div class="col">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content rounded-4 shadow">
                                <div class="modal-body p-5 pt-0">
                                    <div class="card mb-4 rounded-3 shadow-sm">
                                        <div class="card-header py-3">
                                            <h1 class="my-0 fw-normal "><?=$new_name?><i class="badge p-2 m-1 bg-danger">¢<?=$new_price?>.99</i></h1>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-4">
                                                    <img src="../../public/img/<?=$new_image?>" class="fluid img-fluid" alt="image">
                                                </div>
                                                <div class="col col-md-8">
                                                    <h3> Product Overview</h3>
                                                    <form method="post">
                                                        <p class="card-text"><?=$new_details?>.</p>
                                                        <p><strong>Category:</strong><a class="text-decoration-none" href="./view_one.php?product=<?=$new_category?>"> <i class="text-danger"><?=$new_category?></a></i></p>
                                                        <div style="display:flex;flex-direction:row;" class="row">
                                                            <div class="row">
                                                                <button class="btn btn-danger" onclick="reduceSelection();" style="width:15%;"><i class="fa fa-minus-circle fa-lg"></i></button>
                                                                <input style="margin-right:10px;margin-left:10px;width:20%;text-align:center;border:1px solid skyblue;" class="form-control" type="number" value="<?=$cart_value?>" id="user_cart_selection" name="user_cart_selection" id="">
                                                                <button class="btn btn-success" onclick="addSelection();" style="width:15%;margin-right:10px;"><i class="fa fa-plus-circle fa-lg"></i></button>
                                                                <a style="width:30%;" href="./checkout/index.php?checkoutID=<?=$pid?>" name="add_basket" class="text-decoration-none btn btn-sm btn-light btn-outline-primary">Add To Basket</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <h2>Related Products</h2>
                                    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5">
                                    <?php
                                        $Fetch = mysqli_query($PDO, "SELECT * FROM `products` ORDER BY `P_Sku` ASC") or die("Error fetching products");
                                        while($query = mysqli_fetch_array($Fetch)){ ?>
                                            <div class="col mt-4">
                                                <div class="card shadow-sm">
                                                    <a href="./view.php?view=<?=$query['pid'];?>"><img class="bd-placeholder-img card-img-top fluid img-fluid" src="../../public/img/<?=$query['P_image'] ?>" alt="<?php echo $query['P_name'] ?>"></a>
                                                    <div class="card-body">
                                                        <p class="card-text"><strong><?=$query['P_name'] ?></strong></p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="btn-group">
                                                                <a class="text-decoration-none" href="./view.php?view=<?=$query['pid'];?>"><button type="button" class="btn btn-light btn-outline-success"><i class="fa fa-eye fa-lg"></i></button></a>
                                                                <a href="./edit.php?edit=<?=$query['pid'];?>" id="view_product"><button type="button" class="btn btn-light btn-outline-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i></button></a>
                                                            </div>
                                                            <h1 class="badge bg-danger">¢<?=$query['P_price'] ?></h1>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
        <!-- FOOTER PAGE -->
        <div class="bg-dark text-white">
            <footer class="p-5 pb-0 container">
                <div class="row">
                <div class="col-6 col-md-2 mb-3">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">About</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">About</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3 d-none d-sm-block">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">About</a></li>
                    </ul>
                </div>

                <div class="col-md-5 offset-md-1 mb-3">
                    <form>
                    <h5>Subscribe to our newsletter</h5>
                    <p>Monthly digest of what's new and exciting from us.</p>
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Email address</label>
                        <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                        <button class="btn btn-primary" type="button">Subscribe</button>
                    </div>
                    </form>
                </div>
                </div>

                <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                <p>&copy; <?php echo( date("Y"));?> ( Akweter James) All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a class="link-light fa twitter" href="#"><i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i></a></li>
                    <li class="ms-3"><a class="link-light" href="#"><p class="bi" width="24" height="24"><i class="fa fa-youtube-square fa-2x" aria-hidden="true"></i></p></a></li>
                    <li class="ms-3"><a class="link-light fa twitter" href="#"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a></li>
                    <li class="ms-3"><a class="link-light" href="#"><p class="bi" width="24" height="24"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></p></a></li>
                    <li class="ms-3"><a class="link-light" href="#"><p class="bi" width="24" height="24"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></p></a></li>
                    <li class="ms-3"><a class="link-light" href="#"><p class="bi" width="24" height="24"><i class="fa fa-envelope fa-2x"></i></p></a></li>
                </ul>
                </div>
            </footer>
        </div>

        <script src="../../node_modules/bootstrap/bootstrap.min.js"></script>
    </body>
</html>
