<?php
    //Include database configuration file
    include_once("./Database/config.php");

    //Get id from the URL to delete that user
    $id = $_GET['id'];

    //Delete user from the table based on their chosen id
    $Data = mysqli_query($pdo, "DELETE FROM `persol` WHERE id=$id");

    echo('<script type="text/javascript">alert("Are you sure to prefer this operation");</script>');

    //After delete refirect to Home, so that latest list will display
    header("Location:./index.php");
?>