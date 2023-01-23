<?php
    session_start();

    if (! isset($_SESSION['login'])){
        header('location: ./auth/login.php');
    }
    elseif (! isset($_SESSION['verify'])) {
        header('location: ./auth/verify.php');
    }
    else{
        // $user = $_SESSION['username']; 
        // $pass = $_SESSION['pass'];
?>
    <html lang="en">
        <head>
            <title>Persol | Employees Dashboard</title>
            <style>
                .navbar{ color: white; }
                form{display:flex;flex-direction:row;}
                #ResetBtn{margin-left:1%}
                .searchInfo{padding: 0 1%;width:70%;}
            </style>
            <link rel="stylesheet" href="./node_modules/bootstrap.min.css">
            <link rel="stylesheet" href="./node_modules/fontawesome.min.css">
        </head>

        <header>
            <!-- Navigation -->
            <nav class="navbar navbar-expand-sm bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img src="./" alt="Persol Anniversary"></a>
                    <div class="collapse row navbar-collapse" id="mainNavbar">
                        <ul class="navbar-nav">
                    <h1 class="justify-content-center">Admin Dashboard <?php //if (! isset($_SESSION['username'])) {
                        //print_r($_SESSION['firstname']);
                    //} else {
                        //print_r($Username);
                    //}
                     ?></h1>
                            <li class="col justify-content-end">
                                <li data-bs-toggle="modal" data-bs-target="#dashboardModal" class="my-2 list-unstyled btn btn-info">Account
                                </li>
                                <li style="margin-left:10px;" class="my-2 list-unstyled">
                                    <a href="./auth/logout.php" class="btn btn-danger">Sign Out<a/>
                                </li>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

    <body>
        <main class="p-5"><a href="#" class="fa primary">
                
                <form method="GET">
                    <a class="btn btn-info" href="./add.php"><svg xmlns="http://www.w3.org/2000/svg" height="20px" width="20px" viewBox="0 0 512 512"><!-- Font Awesome Free 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm144 276c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92h-92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z"/></svg></a>
                    <div class="searchInfo">
                        <input type="search" class="form-control" name="q"  value=" <?php if(! isset($_GET['q'])){ echo("I am looking for..."); } else{ echo $_GET['q']; } ?> "/>
                    </div>
                    <button type="submit" class="btn btn-info" name="browser"><svg xmlns="http://www.w3.org/2000/svg" height="20px" width="20px" viewBox="0 0 512 512"><!-- Font Awesome Free 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"/></svg></button>
                    <a href='./' type="reset" class="btn btn-danger" name="ResetBtn" id="ResetBtn">Reset</a>                   
                </form>

                <table id="datatableId" class="table table-hover">
                    <thead>
                        <tr class='table-dark'>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Department</th>
                            <th scope="col">Staff ID</th>
                            <th scope="col">View</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                <?php
                    // Fetch database connection in config file
                        include_once("./Database/config.php");

                    // Fetch all users from the database
                    $Data = mysqli_query($pdo, "SELECT * FROM `persol` ORDER BY `id` DESC");
                    $count = 1;
                    
                    while($persol_data = mysqli_fetch_array($Data)){

                        // Set session for firstname
                        $_SESSION['firstname'] = $persol_data['firstName'];
                        
                        echo "<tbody>";
                            echo "<tr class='table-info'>";
                                echo "<td>".$count++."</td>";
                                echo "<td>".$persol_data['firstName']."</td>";
                                echo "<td>".$persol_data['lastName']."</td>";
                                echo "<td>".$persol_data['mobile']."</td>";
                                echo "<td>".$persol_data['department']."</td>";
                                echo "<td>".$persol_data['staffId']."</td>";
                                echo "<td><a href='./more.php?id=$persol_data[id]'>More</td>";
                                echo "<td><a href='./edit.php?id=$persol_data[id]'>Edit</a> | <a href='./erase.php?id=$persol_data[id]'>Delete</a></td>";
                            echo "</tr>";
                        echo "<tbody>";
                    }?>
                </table>
                
            <table class="table table-hover">
                <thead>
                        <tr class='table-dark'>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th>Department</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                            require_once('./database/config.php');

                            if(isset($_GET['browser'])){
                                $filter = $_GET['q'];
                                $scan = "SELECT * FROM `persol` WHERE CONCAT(firstname,lastname,email) LIKE '%$filter%' ";
                                $list = 0;

                                $scan_run = mysqli_query($pdo, $scan);

                                if(mysqli_num_rows($scan_run) > 0){
                                    foreach($scan_run as $data){
                                        ?>
                                        <tbody>
                                            <tr class='table-light'>
                                                <td><?= $list++; ?></td>
                                                <td><?=$data['firstName']; ?></td>
                                                <td><?=$data['lastName']; ?></td>
                                                <td><?=$data['department']; ?></td>
                                                <td><a href='./more.php?id=$persol_data[id]'>More</td>
                                            </tr>
                                        <?php
                                    }
                                }
                                else{ ?>
                                    <tr colspan="6">
                                        <td colspan="6">No records found</td>
                                    </tr>
                                <?php } } ?>           
                        </tbody>
                </table>
        </main>

        <div class="modal fade" id="dashboardModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="dashboardModal">User Information</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post">
                        <div class="modal-body">
                                <strong>User Name</strong>
                                <input type="text" name="changeUser" class="form-control" value="username" ><br/>
                                <strong>Password</strong>
                                <input type="text" name="changePass" class="form-control" value="3u499" >
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Change" name="changeSubmit">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

            <footer style="background: #1A1110; color: white;" class="mt-5">
                <div class="row">
                    <div class="col col-md-2"></div>
                    <div style="display:flex; flex-direction:row;" class="col col-md-8">
                        <a href="https://github.com/john-BAPTIS?tab=repositories" target="_blank"><img style="border-radius: 50%; padding:50% 0" width="50px" height=}50ox" src="https://avatars.githubusercontent.com/u/71665600?v=4" alt="Logo"></a>
                        <p style=" padding:15px 0 15px 10px;">Copyright  © 2023 (Persol Development Team). <strong>Powered by: <a style="text-decoration:none" href="mailto:jamesakweter@gmail.com">Akweter</a></strong></p>
                    </div>
                    <div class="col col-md-2"></div>
                </div>
            </footer>
        </body>
        <script src="./node_modules/bootstrap.min.js"></script>
        <script src="./node_modules/fontawesome.min.js"></script>
    </html>
    <?php } ?>
