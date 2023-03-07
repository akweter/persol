<!-- Editing Modal -->
    <?php
        error_reporting(E_WARNING || E_NOTICE || E_ERROR);
        session_start();
        
        $admin_signup =  $_SESSION['admin_sign_up'];
        $admin_login = $_SESSION['admin_login'];
        $admin_username = $_SESSION['admin_username'];
        $status = $_SESSION['admin'];

        if (empty($admin_login) || empty($admin_signup)) {
            header('location: ../auth/login.php');
        }
    

        include_once("../../database/config.php");
            if (isset($_GET['edit'])) {
                $product_ID = $_GET['edit'];

                $fetch_arrays = mysqli_query($PDO, "SELECT * FROM `products` WHERE pid = '$product_ID'");
                while($Val = mysqli_fetch_array($fetch_arrays)){
                    $new_name = $Val['P_name'];
                    $new_SKU = $Val['P_Sku'];
                    $new_price = $Val['P_price'];
                    $new_category = $Val['P_category'];
                    $new_image = $Val['P_image'];
                    $new_details = $Val['P_detail'];
                    $new_unit = $Val['P_unit'];
                    $new_stock = $Val['P_qty'];
                }
            }
        ?>
        <?php
            if (isset($_POST['edited_product'])) {
                $new_P_ID = $_POST['Editted_id'];

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
                $old_image = $_POST['old_image'];

                $update_products = mysqli_query($PDO, "UPDATE `products` SET `P_Sku`='$sku',`P_qty`='$qty',`P_unit`='$unit',`P_name`='$name',`P_detail`='$details',`P_category`='$category',`P_price`='$price',`P_upload_date`='$date',`P_time`='$time' WHERE pid=$new_P_ID");

                if (!empty($image)) {
                    if ($img_size > 2000000) {
                        $message = '
                        <div style="width:50%;" class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Image cannot be more than 100 mb</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    else {
                        $update_img = mysqli_query($PDO, "UPDATE `products` SET `P_image`='$image' WHERE pid=$new_P_ID");
                        move_uploaded_file($img_tmp_name, $img_folder);
                        unlink('../../public/img/'.$old_image);
                    }
                    
                }
                $message = '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Product updated successfully!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
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
        <title>Edit Products</title>
        <link rel="stylesheet" href="../../node_modules/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../../node_modules/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="../../node_modules/fontawesome/css/all.css">
    </head>
    <body>

        <!-- Header -->
        <header>
            <div class="bg-info">
                <div class="container p-3">
                    <a href="./" class="btn btn-lg btn-primary" style="float:right;margin-left:10px;">Dashboard</a>
                    <a href="./action.php?more=<?=$product_ID?>" class="btn btn-lg btn-warning" style="float:right;">Go Back</a>
                    <h1 class="text-danger">Editing <k class="text-success"><?php if (isset($new_name)) {echo($new_name);}else{echo('Product');} ?></k></h1>
                </div>
            </div>
        </header>
        <body class="text-bg-dark">
            
                        <?php if (isset($message)) { echo($message); } ?>
                        <div class="row m-5">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="Editted_id" value="<?=$_GET['edit']?>">
                                        <input type="hidden" name="old_image" value="<?=$new_image?>">
                                        <div style="display:flex;flex-direction:row;">
                                            <div  style="width:70%;" class="form-group mb-3">
                                                <input required type="text" class="form-control rounded-3" value="<?=$new_name?>" name="P_Name">
                                            </div>
                                            <div style="width:30%; margin-left:10px;" class="form-group mb-3">
                                                <input required type="text" class="form-control rounded-3" value="<?=$new_SKU?>" name="P_Sku">
                                            </div>
                                        </div>
                                        <div style="display:flex;flex-direction:row;">
                                            <div style="width:50%;" class="form-group mb-3">
                                                <input required type="number" class="form-control rounded-3" value="<?=$new_price?>" min="0" name="P_Price">
                                            </div>
                                            <div style="width:50%; margin-left:10px;" class="form-group mb-3">
                                                <input required type="number" class="form-control rounded-3" value="<?=$new_stock?>" min="0" name="P_Qty">
                                            </div>
                                        </div>
                                        <div style="display:flex;flex-direction:row;">
                                            <div style="width:70%;" class="form-group mb-3">
                                                <select required class="form-control" value="<?=$new_category?>" name="P_Category">
                                                    <option value="" disabled class="option">Select Category</option>
                                                    <option value="cement" class="option">Cement</option>
                                                    <option value="Rope" class="option">Rope</option>
                                                    <option value="insulation" class="option">Insulation</option>
                                                    <option value="armaflex" class="option">Armaflex</option>
                                                    <option value="Roofing" class="option">Roofing</option>
                                                    <option value="Expandable" class="option">EPS</option>
                                                    <option value="Donwproofing" class="option">Bitumen</option>
                                                    <option value="Wooden" class="option">Wooden</option>
                                                    <option value="Plumbing" class="option">Plumbing</option>
                                                    <option value="Cladding" class="option">Cladding</option>
                                                </select>
                                            </div>
                                        <div style="width:30%; margin-left:10px;" class="form-group mb-3">
                                                <select required class="form-control" value="<?=$new_unit?>" name="P_Unit">
                                                    <option value="unit" disabled class="option">Unit</option>
                                                    <option value="PKTS" class="option">Packet</option>
                                                    <option value="gallon" class="option">Gallon</option>
                                                    <option value="can" class="option">Can</option>
                                                    <option value="PC" class="option">Piece</option>
                                                    <option value="Bag" class="option">Bag</option>
                                                    <option value="Roll" class="option">Roll</option>
                                                    <option value="Sheet" class="option">Sheet</option>
                                                    <option value="BDS" class="option">Board</option>
                                                    <option value="Pair" class="option">Pair</option>
                                                    <option value="Yard" class="option">Yard</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div style="display:flex;flex-direction:row;" class="form-group mb-3">
                                            <input required type="image" width="150" height="100" src="../../public/img/<?=$new_image?>" alt="<?=$new_name?>">
                                            <input style="margin-left:10px" type="file" name="P_image" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input style="padding:15px" type="text" value="<?=$new_details?>" required class="form-control rounded-3" name="P_Details">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="submit" class="form-control btn btn-warning p-3" name="edited_product" value="Update Product">
                                        </div>                                    
                                    </form>
                                </div>
        </body>
                    
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
    </body>
</html>
