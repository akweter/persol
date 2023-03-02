<?php
    session_start();

    include_once("../../database/config.php");
    if (isset($_POST['P_Upload'])) {
        $pid = '';
        $sku = filter_var($_POST['P_Sku'], FILTER_SANITIZE_STRING);
        $name = filter_var($_POST['P_Name'], FILTER_SANITIZE_STRING);
        $category = filter_var($_POST['P_Category'], FILTER_SANITIZE_STRING);
        $price = filter_var($_POST['P_Price']);
        $qty = filter_var($_POST['P_Qty']);
        $details = filter_var($_POST['P_Details'], FILTER_SANITIZE_STRING);
        $unit = filter_var($_POST['P_Unit'], FILTER_SANITIZE_STRING);
        $date = date("y/m/d");
        $time = time();

        $image = $_FILES['image']['name'];
        $image = filter_var($image, FILTER_SANITIZE_STRING);
        $img_size = $_FILES['image']['size'];
        $img_tmp_name = $_FILES['image']['tmp_name'];
        $img_folder = "../../public/img/".$image;

        $Data = "SELECT * FROM `products` WHERE P_Sku = '$sku'";
        $Fetch = mysqli_query($PDO, $Data) or die("Error fetching email and password");

        if(mysqli_num_rows($Fetch) > 0){
            $message = '
            <div style="width:50%;" class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>SKU Already exists</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
            </div>';
        }
        
        else {
            $insert_products = mysqli_query($PDO, "INSERT INTO `products`(`pid`, `P_Sku`, `P_qty`, `P_unit`, `P_name`, `P_image`, `P_detail`, `P_category`, `P_price`, `P_upload_date`, `P_time`) VALUES ('$pid', '$sku', '$qty', '$unit', '$name', '$image', '$details', '$category', '$price', '$date', '$time');");

            if ($insert_products) {
                if ($img_size > 20000000) {
                    $message = '
                    <div style="width:50%;" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Image cannot be more than 100 mb</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                    </div>';
                }
                else {
                    move_uploaded_file($img_tmp_name, $img_folder);
                }
                
            }
            $message = '
            <div style="width:50%;" class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Product uploaded successfully</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
            </div>';
        }
    }
    
?>
<?php
    if (isset($_POST['create_doc'])) {
        if (isset($_POST['topic']) && !empty($_POST['topic'])) {
            $Output = "
                <h1>".$_POST['topic']."</h2>
                <p>".nl2br($_POST['content'])."</p>";

            $filename = "Persol-".date("d-m-Y").'.doc';

            header("Cache-Control: ");
            @header("Pragma: ");
            header("Expires: 0");
            header("Content-Type: application/vnd.msword");
            header("content-disposition: attachment; filename=".$filename);

            echo "<html";
            echo $Output;
            echo "</html>";
        }
        else {
            echo "<script>alert('All fields are required!')</script>"; 
        echo "<script>window.location='index.php'</script>";
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
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="../../node_modules/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../../node_modules/fontawesome/css/all.css">
        <style>
            .fa-times{color:red;}.fa-search{color:green;}
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
                                <a href="../auth/logout.php"><button type="button" class="btn btn-sm btn-danger">Log Out</button></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="px-3 bg-light py-2 border-bottom mb-3">
                <div class="container d-flex flex-wrap justify-content-center">
                    <form action="../search/index.php?p-q=<?php $query;?>" method="POST" class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto" role="search">
                    <?php if (isset($_POST['p-q'])) { $query = $_POST['p-q']; } ?>
                        <input type="search" name="p-q" class="form-control" placeholder="I am looking for..." aria-label="Search">
                    </form>

                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <h1>Products</h1>
                        </div>
                        
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
                                <a href="../dashboard.php" class="text-decoration-none"><button class="nav-link btn btn-toggle d-inline-flex align-items-center rounded border-0">Dashboard</button></a>
                            </li>
                            <li class="mb-1">
                                <li><a href="../stock" class="nav-link d-inline-flex text-decoration-none rounded">Stock</a></li>
                            </li>
                            <li class="nav-item">
                                <div  class="">
                                    <button  class="nav-link btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">Products</button>                                   <div class="collapse show" id="home-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <li><a href="#" type="button" data-bs-target="#product_carousel" data-bs-slide-to="0" class="nav-link text-danger d-inline-flex text-decoration-none rounded">Overview</a></li>
                                        <li><a href="#" type="button" data-bs-target="#product_carousel" data-bs-slide-to="1" aria-label="Slide 2" class="nav-link text-danger d-inline-flex text-decoration-none rounded">Add product</a></li>
                                        <!-- <li><a href="#"  type="button" data-bs-target="#product_carousel" data-bs-slide-to="2" aria-label="Slide 3" class="nav-link text-danger d-inline-flex text-decoration-none rounded">Trending</a></li>
                                        <li><a href="#"  type="button" data-bs-target="#product_carousel" data-bs-slide-to="3" aria-label="Slide 4" class="nav-link text-danger d-inline-flex text-decoration-none rounded">Categories</a></li> -->
                                    </ul>
                                </div>
                            </li>
                            <li class="mb-1">
                                <li><a href="../orders" class="nav-link d-inline-flex text-decoration-none rounded">Orders</a></li>
                            </li>
                            <li class="mb-1">
                                <li><a href="../user" class="nav-link d-inline-flex text-decoration-none rounded">Users</a></li>
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
                            <a href=""><img src="../../public/img/wheat.jpg" width="50" height="50" alt="Admin Logo"></a>
                            </li>
                            
                        </ul>
                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-5">
                    <div id="product_carousel" class="carousel slide">
                        <div class="carousel-inner">

                            <!-- Item One -->
                            <div class="carousel-item active">
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="table-dark">
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price GH¢</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Available Stock</th>
                                            <th scope="col">Thumbnail</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $Fetch = mysqli_query($PDO, "SELECT * FROM `products` ORDER BY `P_Sku` ASC") or die("Error fetching products");
                                    $num = 1;
                                    
                                    while($query = mysqli_fetch_array($Fetch)){ ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $num++ ?></td>
                                            <td><?php echo $query['P_name'] ?></td>
                                            <td>¢ <?php echo $query['P_price'] ?>.00</td>
                                            <td><?php echo $query['P_category'] ?></td>
                                            <td><?php echo $query['P_qty'].' '.$query['P_unit'] ?>s </td>
                                            <td> <img width="40" height="40" src="../../public/img/<?php echo $query['P_image'] ?>" alt="<?php echo $query['P_name'] ?>"></td>
                                            <td class="text-danger"><a href="./edit.php?edit=<?=$query['pid'];?>"><i class="fa fa-edit fa-lg"></i></a> | <a onclick="return confirm('This operation is risky. Are you sure to delete?');" href="./action.php?erase=<?=$query['pid'];?>"><i class="fa fa-times fa-lg"></i></a> | <a href='./action.php?more=<?=$query['pid'];?>'><i class="fa fa-search fa-lg"></i></a></td>
                                        </tr>
                                    </tbody>
                                    <?php } ?>
                                </table>
                            </div>

                            <!-- Item Two -->
                            <div class="carousel-item">
                                <?php if (isset($message)) { echo($message); } ?>
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-2">
                                    <div class="text-bg-dark pt-md-2 px-md-3 text-center overflow-scroll">
                                        <div class="">
                                            <h2 class="">Add New Product</h2>
                                        </div>
                                        <div class="bg- shadow-sm mx-auto" style="width: 100%; height: 300px; border-radius: 21px 21px 0 0;">
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div style="display:flex;flex-direction:row;">
                                                    <div  style="width:70%;" class="form-group mb-3">
                                                        <input required type="text" class="form-control rounded-3" id="P_Name" name="P_Name" placeholder="Enter product name">
                                                    </div>
                                                    <div style="width:30%; margin-left:10px;" class="form-group mb-3">
                                                        <input required type="text" class="form-control rounded-3" id="P_Sku" name="P_Sku" placeholder="SKU">
                                                    </div>
                                                </div>
                                                <div style="display:flex;flex-direction:row;">
                                                    <div style="width:50%;" class="form-group mb-3">
                                                        <input required type="number" class="form-control rounded-3" min="0" id="P_Price" name="P_Price" placeholder="How much?">
                                                    </div>
                                                    <div style="width:50%; margin-left:10px;" class="form-group mb-3">
                                                        <input required type="number" class="form-control rounded-3" min="0" id="P_Qty" name="P_Qty" placeholder="Available Qtys">
                                                    </div>
                                                </div>
                                                <div style="display:flex;flex-direction:row;">
                                                    <div style="width:70%;" class="form-group mb-3">
                                                        <select required class="form-control" name="P_Category" id="P_Category">
                                                            <option value="" selected disabled class="option">Select Category</option>
                                                            <option value="Cement" class="option">Cement</option>
                                                            <option value="Rope" class="option">Rope</option>
                                                            <option value="Insulation" class="option">Insulation</option>
                                                            <option value="Armaflex" class="option">Armaflex</option>
                                                            <option value="Roofing" class="option">Roofing</option>
                                                            <option value="Expandable" class="option">EPS</option>
                                                            <option value="Donwproofing" class="option">Bitumen</option>
                                                            <option value="Wooden" class="option">Wooden</option>
                                                            <option value="Plumbing" class="option">Plumbing</option>
                                                            <option value="Cladding" class="option">Cladding</option>
                                                        </select>
                                                    </div>
                                                    <div style="width:30%; margin-left:10px;" class="form-group mb-3">
                                                        <select required class="form-control" name="P_Unit" id="P_Unit">
                                                            <option value="" selected disabled class="option">Unit</option>
                                                            <option value="Packet" class="option">Packet</option>
                                                            <option value="Gallon" class="option">Gallon</option>
                                                            <option value="Can" class="option">Can</option>
                                                            <option value="Piece" class="option">Piece</option>
                                                            <option value="Bag" class="option">Bag</option>
                                                            <option value="Roll" class="option">Roll</option>
                                                            <option value="Sheet" class="option">Sheet</option>
                                                            <option value="Board" class="option">Board</option>
                                                            <option value="Pair" class="option">Pair</option>
                                                            <option value="Yard" class="option">Yard</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <input required type="file" class="form-control rounded-3" id="image" name="image" accept="image/jpeg, image/jpg, image/png, image/img, image/gif, image/webp">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <textarea required class="form-control rounded-3 p-3" id="P_Details" name="P_Details" placeholder="Enter product details"></textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <input type="submit" class="form-control btn btn-warning" name="P_Upload" value="Upload Product">
                                                </div>                                    
                                            </form>
                                        </div>
                                    </div>

                                    <div class="bg-light pt-md-2 px-md-3 text-center overflow-hidden">
                                        <div>
                                            <h2 class="text-danger">Take NoteS Online</h2>
                                        </div>
                                        <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
                                            <div class="text-white">
                                                <div class="col-md-12">
                                                    <form action="" method="post">
                                                        <h4>Title</h4>
                                                        <input type="text" name="topic" class="form-control"/>
                                                        <br/>
                                                        <h4>Body</h4>
                                                        <textarea name="content" class="form-control" cols="8" rows="4"></textarea>
                                                        <button type="submit" name="create_doc" class="btn btn-warning mt-1">Download as Word Doc</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <!--  -->
                                
                            </div>

                            <!-- Item Three
                            <div class="carousel-item">
                                <div style="height:300px;width:100%;">
                                    <h1>TRENDING DEALS HERE</h1>
                                </div>
                            </div>

                            Item Four
                            <div class="carousel-item">
                                <div style="height:300px;width:100%;">
                                    <h1>ODER BY CATEGORIES</h1>
                                </div>
                            </div> -->
                        </div>
                    </div>                
                </main>
            </div>
        </div>

        <!-- Footer -->
        <div class="bg-info">
            <footer class="container py-4">
                <div class="d-flex flex-column flex-sm-row justify-content-between py-3 my-4 border-top">
                <p>&copy; <?php echo date("Y"); ?> Angel Dev Team. All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
                </ul>
                </div>
            </footer>
            </div>
        <script src="../../node_modules/bootstrap/bootstrap.min.js"></script>
    </body>
</html>
