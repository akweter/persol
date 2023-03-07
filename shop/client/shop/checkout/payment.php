<?php
    session_start();
    
    // FINAL CHECKOUT
    if (isset($_POST['final_checkout_form'])) {
        echo('<script>alert("Order received");</script>');
        
        // CUSTOMER INFORMATION TO CUSTOMERS DB
        $c_id = '';
        $c_fn = filter_var($_POST['C_fn'], FILTER_SANITIZE_STRING);
        $c_ln = filter_var($_POST['C_ln'], FILTER_SANITIZE_STRING);
        $c_email = filter_var($_POST['email_Add'], FILTER_SANITIZE_STRING);
        $c_username = filter_var($_POST['Username'], FILTER_SANITIZE_STRING);
        $c_city = filter_var($_POST['C_city'], FILTER_SANITIZE_STRING);
        $c_town = filter_var($_POST['C_town'], FILTER_SANITIZE_STRING);
        $c_country = 'Ghana';
        $c_status = 'customer';
        $c_passwd = filter_var($_POST['pass1'], FILTER_SANITIZE_STRING);
        $c_phone = filter_var($_POST['Telephone'], FILTER_SANITIZE_STRING);
        $c_region = filter_var($_POST['P_region'], FILTER_SANITIZE_STRING);
        $c_zip_code = filter_var($_POST['C_GPS'], FILTER_SANITIZE_STRING);
  
        $Data = "SELECT * FROM `customers` WHERE Username = '$c_username' ";
        $Query = mysqli_query($PDO, $Data) or die("Error fetching email and password");
  
        if(mysqli_num_rows($Fetch) > 0){
          $user_exist = '
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Username Exist!</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        }
        else{
          $add_new_customer = mysqli_query($PDO, "INSERT INTO `customers`(`C_id`, `C_fn`, `C_ln`, `C_country`, `C_city`, `C_town`, `C_GPS`, `C_image`, `email_Add`, `Username`, `Telephone`, `Status`, `PassWD`, `P_region`) VALUES ('$c_id','$c_fn','$c_ln','$c_country','$c_city','$c_town','$c_zip_code','','$c_email','$c_username','$c_phone','$c_status','$c_passwd','$c_region');");
        }
        
        // TO ORDER DB $name = filter_var($_POST['P_Name'], FILTER_SANITIZE_STRING);
        $o_username = filter_var($_POST['Username'], FILTER_SANITIZE_STRING);
        $o_orderID = '';
        $o_subtotal = $cart_price_value;
        $o_total_payment = $disount_given;
        $o_product_id = $new_pid;
        $o_qty = $customer_cart_value;
        $o_paymentMode = $_POST['paymentMode'];
        $o_time = time();
        $o_date = date("Y/M/D"); 
  
        if (isset($add_new_customer)) {
          $add_new_customer = mysqli_query($PDO, "INSERT INTO `orders`(`o_username`, `o_orderID`, `o_subtotal`, `o_total_payment`, `o_product_id`, `o_qty`, `o_paymentMode`, `o_time`, `o_date`) VALUES ('$o_username','$o_orderID','$o_subtotal','$o_total_payment','$o_product_id','$o_qty','$o_paymentMode','$o_time','$o_date');");
  
          $order_received = '
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Username Exist!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          ';
        }
      }
?>