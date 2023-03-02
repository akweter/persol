<?php
    session_start();
    include_once("../database/config.php");
    
    error_reporting(E_WARNING || E_NOTICE || E_ERROR);

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
        <title>#1 Online Market | Persol</title>
        <link rel="stylesheet" href="../node_modules/bootstrap/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"> -->
        <!-- <link rel="stylesheet" href="../node_modules/fontawesome/css/fontawesome.min.css"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script> -->
        <style>
            html{
                padding: 0;
                margin: 0;
            }

            div#container{}
            p#jumbotrom_text{
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                text-align: center;
            }

            .try-body{
                text-align: center;
                border: 10px solid green;;
                width: 50%;
                margin: 0 0%;
                background: lightgray;
            }

            #first-one{
                text-align: center;
                background-color: red;
                height: 60px;
                width: 200px;
                border: 3px solid blue;
                margin: 15px;
                z-index: 50px;
                position: sticky;
            }

            #second-one{
                text-align: start;
                background-color: yellow;
                height: 60px;
                width: 200px;
                border: 3px solid salmon;
                margin-left: 30px;
                margin-top: -45px;
                z-index: 51px;
                position: sticky;
            }

            #second-of-second{
                text-align: end;
                background-color: lightblue;
                width: 80px;
                height: 30px;
                position: absolute;
                top: 0px;
                right: 0px;
                z-index: 300px;
            }

            #third-one{
                background-color: blue;
                height: 60px;
                width: 200px;
                border: 3px solid rebeccapurple;
                margin-left: 0;
                margin-top: -30px;
                position: relative;
            }

            #fourth-one{
                background-color: violet;
                height: 60px;
                width: 200px;
                border: 5px solid black;
                margin-left: 30px;
                padding: 10% 0;
                margin-top: -30px;
                zoom: 100%;
            }

            #fifth-one{
                background-color: gray;
                height: 60px;
                width: 200px;
                border: 3px solid ghostwhite;
                margin-left: 14%;
                margin-top: -30px;
            }
            h3.amazing_deals{
                text-align: center;
                font-style: oblique;
                font-size: 150%;
                font-weight: lighter;
            }
            a#view_product{
                margin-right: 5%;
                margin-left: 5%;
            }
            h4{
                text-align: center;
            }
            /* div.shop_now{
                text-align: center;
                align-items: center;
            } */
        </style>
    </head>
    <body>
        <header class="fixe-top">
            <div class="px-3 py-2 text-bg-dark">
                <div class="">
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
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#cart_modal" class="nav-link text-white"><p class="bi d-block mx-auto mb-1" width="24" height="24"><i class="fa fa-cart-plus fa-2x">2</i></p>Cart</a>
                                </li>
                                <li>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#wishlist_modal" class="nav-link text-white"><p class="bi d-block mx-auto mb-1" width="24" height="24"><i class="fa fa-heart fa-2x">4</i></p>Wishlist</a>
                                </li>
                                <li>
                                    <a href="../user_account/index.php" class="nav-link text-white">
                                        <p class="bi d-block mx-auto mb-1" width="24" height="24"><i class="fa fa-user-plus fa-2x" aria-hidden="true"></i></p>Account</a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link text-white">
                                        <p data-bs-toggle="modal" data-bs-target="#contact_modal" class="bi d-block mx-auto mb-1" width="24" height="24"><i class="fa fa-phone fa-2x" aria-hidden="true"></i></p>Contact</a>
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
                <div class="">
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

        <main>
            <!-- block one -->
            <div id="jumbotrom bg-light" class="mb-5" style="background: url('../public/img/hero.jpg');padding:10%;">
                <div class="row justify-content-around">
                    <div class="col col-md-6">
                        <h3 class="amazing_deals fw-bold fs-1 bg-danger text-light">Amazing Deals Are Here</h3>
                    </div>
                    <!--- <div class="p-5">
                        <div class="jumbotrom_page-two">
                            <div class="try-body">
                                <div id="first-one"></div>
                                <div id="second-one">
                                    <div id="second-of-second"></div>
                                </div>
                                <div id="third-one"><a class=" text-light btn btn-info btn-outline-danger btn-lg mt-1" href="https://jamesakweter.online/projects" target="_balnk">My Projects</a></div>
                                <div id="fourth-one"></div>
                                <div id="fifth-one"><a class="btn btn-warning btn-outline-dark btn-lg mt-1" href="mailto:jamesakweter@gmail.com">Contact Me</a></div>
                            </div>
                         </div>
                    </div> -->
                </div>
            </div>

            <!-- block two -->
                    <div class="d-flex bg-light mb-3 p-4 justify-content-between align-items-center">
                        <div class="col d-flex justify-content-center">
                            <i class="bi text-muted flex-shrink-0 me-1" width="1.75em" height="1.75em"><i class="fa fa-truck fa-2x"></i></i>
                            <div><strong>Delivery In Accra.</strong></div>
                        </div>
                        <div class="col d-flex justify-content-center px-3">
                            <i class="bi text-muted flex-shrink-0 me-1" width="1.75em" height="1.75em"><i class="fa fa-money fa-2x"></i></i>
                            <div><strong>Cash On Delivery.</strong></div>
                        </div>
                        <div style="text-align: center;" class="col d-flex d-none d-sm-block">
                            <i class="bi text-muted flex-shrink-0 me-1" width="1.75em" height="1.75em"><i class="fa fa-headphones fa-2x"></i></i>
                            <div class="d-inline"><strong><big>24/7 Customer Support.</big></strong></div>
                        </div>
                    </div>

                    <!-- block three -->
                <div class="container">
                    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-lg-4 align-items-stretch mb-5 p-0">

                        <div class="col mb-4">
                            <a href="./shop/view_one.php?product=Insulation" class="text-decoration-none">
                                <div class="card align-items-center justify-content-center shadow-lg">
                                    <div class="d-flex flex-column text-shadow-1">
                                        <h4>Sound Proof</h4>
                                        <img style="height:210px;" src="../public/img/batt cavtiy 2.jpg" alt="img" class="img fluid img-fluid rounded-4">
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col mb-4">
                            <a href="./shop/view_one.php?product=Wooden" class="text-decoration-none">
                                <div class="card rounded-4 align-items-center justify-content-center shadow-lg">
                                    <div class="d-flex flex-column text-shadow-1">
                                        <h4>Wooden Products</h4>
                                        <img style="height:210px;" src="../public/img/woods.png" alt="img" class="img fluid img-fluid rounded-4">
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col">
                            <a href="./shop/view_one.php?product=Plumbing" class="text-decoration-none">
                                <div class="card rounded-4 align-items-center justify-content-center shadow-lg">
                                    <div class="d-flex flex-column text-shadow-1">
                                        <h4>Plumbing Deals</h4>
                                        <img style="height:210px;" src="../public/img/plastic materials.webp" alt="img" class="img fluid img-fluid rounded-4">
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col">
                            <a href="./shop/view_one.php?product=Expandable" class="text-decoration-none">
                                <div class="card rounded-4 align-items-center justify-content-center shadow-lg">
                                    <div class="d-flex flex-column text-shadow-1">
                                        <h4>Expandable Products</h4>
                                        <img style="height:210px;" src="../public/img/45-liter-EPS-doos--scaled.webp" alt="img" class="img fluid img-fluid rounded-4">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- block four -->
                    <div class="mb-5 p-0">
                        <div id="perfect_deals" class="row">
                            <h3 class="fs-3" style="text-align:center;">Perfect Deals</h3>
                            <div class="row row-cols-2 p-0 row-cols-sm-2 row-cols-md-4">
                            <?php
                                $Fetch = mysqli_query($PDO, "SELECT * FROM `products` ORDER BY `P_Sku` ASC") or die("Error fetching products");
                                while($query = mysqli_fetch_array($Fetch)){ ?>
                                    <div class="col mb-4">
                                        <div class="card shadow-sm">
                                            <a href="./shop/view.php?view=<?=$query['pid'];?>"><img class="bd-placeholder-img card-img-top" src="../public/img/<?php echo $query['P_image'] ?>" width="300" height="150" alt="<?php echo $query['P_name'] ?>"></a>
                                            <div class="card-body">
                                                <p class="card-text"><strong><?php echo $query['P_name'] ?>
                                                    <i class="badge bg-danger">¢<?php echo $query['P_price'] ?></i></strong></p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        <a class="text-decoration-none" href="./shop/view.php?view=<?=$query['pid'];?>"><button type="button" class="btn btn-light btn-sm btn-outline-success"><i class="fa fa-eye fa-lg"></i></button></a>
                                                        <a href="./shop/edit.php?edit=<?=$query['pid'];?>" id="view_product"><button type="button" class="btn btn-light btn-sm btn-outline-warning"><i class="fa fa-cart-plus" aria-hidden="true"></i></button></a>
                                                    </div>
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
        </main>

        <!-- CART MODAL -->
        <div class="modal fade" id="cart_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cart_modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cart_modalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>I will not close if you click outside me. Don't even try to press escape key.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
                </div>
            </div>
        </div>

        <!-- WISHLIAT MODAL -->
        <div class="modal fade" id="wishlist_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="wishlist_modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="wishlist_modalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>I will not close if you click outside me. Don't even try to press escape key.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
                </div>
            </div>
        </div>

        <!-- CONTACT MODAL -->
        <div class="modal-dialog contact_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4" id="contact_modal">Full screen modal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>


        <!-- Footer -->
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
                    <h5>Connect With <a class="text-decoration-none text-warning" href="https://jamesakweter.online" target="_blank">James</a></h5>
                        <div class="col col-md-6">
                            <div class="jumbotrom_page-two">
                                <div class="try-body">
                                    <div id="first-one"></div>
                                    <div id="second-one">
                                        <div id="second-of-second"></div>
                                    </div>
                                    <div id="third-one"><a class=" text-light btn btn-info btn-outline-danger btn-lg mt-1" href="https://jamesakweter.online/projects" target="_balnk">My Projects</a></div>
                                    <div id="fourth-one"></div>
                                    <div id="fifth-one"><a class="btn btn-warning btn-outline-dark btn-lg mt-1" href="mailto:jamesakweter@gmail.com">Contact Me</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- <form>
                        <h5>Subscribe to our newsletter</h5>
                        <p>Monthly digest of what's new and exciting from us.</p>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                            <label for="newsletter1" class="visually-hidden">Email address</label>
                            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                            <button class="btn btn-primary" type="button">Subscribe</button>
                        </div>
                        </form> -->
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

        <script src="../node_modules/bootstrap/bootstrap.min.js"></script>
        <!-- <script src="../node_modules\fontawesome\js\fontawesome.min.js"></script> -->
        <!-- <script src="../node_modules\fontawesome\js\all.min.js"></script> -->
    </body>
</html>
