<?php
    session_start();

    if(empty($_SESSION['success'])){
        header('location: ./auth/login.php');

        if (empty($_SESSION['verify'])) {
            header('location: ./auth/verify.php');
        }
    }
    else{
        $username =  $_SESSION['username'];
        $firstname =  $_SESSION['firstname'];
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
        </head>

        <header>
            <!-- Navigation -->
            <nav class="navbar navbar-expand-sm bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img src="./" alt="Persol Anniversary"></a>
                    <div class="collapse row navbar-collapse" id="mainNavbar">
                        <ul class="navbar-nav">
                    <h1 class="justify-content-center">Welcome <?php if (empty($firstname)) {
                        print_r($username);
                    } else {
                        print_r($username);
                    }
                     ?></h1>
                            <li class="col justify-content-end">
                                <li class="my-2 list-unstyled">
                                    <a href="./auth/logout.php" class="btn btn-info">Sign Out<a/>
                                </li>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

    <body>
        <main class="p-5">
                <form method="GET">
                    <a class="btn btn-success" href="./add.php">Add New Staff</a>
                    <div class="searchInfo">
                        <input type="search" class="form-control" name="searchDetails" placeholder="I am looking for..."/>
                    </div>
                    <button type="submit" class="btn btn-info" name="SearchBtn">Query</button>
                    <input type="reset" value="Reset" class="btn btn-danger" name="ResetBtn" id="ResetBtn">                    
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
                                // <td><a id='modal' href='#staticBackdropLive' data-bs-toggle='modal' data-bs-target='#staticBackdropLive'>More</a></td>
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
                            <th scope="col">Email</th>
                            <th>Department</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //value=" <?php if(isset($_GET['searchDetails'])){ echo $_GET['searchDetails']; }
                            require_once('./database/config.php');

                            if(isset($_GET['searchDetails'])){
                                $filter = $_GET['searchDetails'];
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
                                                <td><?=$data['email']; ?></td>
                                                <td><?=$data['department']; ?></td>
                                                <td><a href='./more.php?id=$data[id]'>More</td>
                                            </tr>
                                        <?php
                                    }
                                }
                                else{ ?>
                                    <tr colspan="5">
                                        <td>No records found</td>
                                    </tr>
                                <?php } } ?>           
                        </tbody>
                </table>
        </main>
            <div class="modal fade" id="staticBackdropLive" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLiveLabel">Details of <?php print_r($_SESSION['user']); ?></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="table-dark">
                                        <th scope="col">Key</th>
                                        <th scope="col">Values</th>
                                    </tr>
                                </thead>
                                <tbody><?php
                                $Data = mysqli_query($pdo, "SELECT * FROM `persol` ORDER BY `id` DESC");
                                while($persol_data = mysqli_fetch_array($Data)){ ?>
                                    <tr>
                                        <td class="blog-post-meta"><?php $persol_data['firstName']?></td>
                                        <td class="blog-post-meta"><?php $persol_data['lastName']?></td>
                                    </tr>
                                    <tr class="table-warning">
                                        <td class="blog-post-meta"><?php $persol_data['firstName']?></td>
                                        <td class="blog-post-meta"><?php $persol_data['firstName']?></td>
                                    </tr>
                                    <tr class="table-info">
                                        <td class="blog-post-meta"><?php $persol_data['firstName']?></td>
                                        <td class="blog-post-meta"><?php $persol_data['firstName']?></td>
                                    </tr>
                                    <tr class="table-light">
                                        <td class="blog-post-meta"><?php $persol_data['firstName']?></td>
                                        <td class="blog-post-meta"><?php $persol_data['firstName']?></td>
                                    </tr>
                                    <tr class="table-primary">
                                        <td class="blog-post-meta"><?php $persol_data['firstName']?></td>
                                        <td class="blog-post-meta"><?php $persol_data['firstName']?></td>
                                    </tr>
                                    <tr>
                                        <td class="blog-post-meta"><?php $persol_data['firstName']?></td>
                                        <td class="blog-post-meta"><?php $persol_data['firstName']?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Okay</button>
                            <a href="./edit.php?id=$persol_data[id]"><button type="button" class="btn btn-primary">Edit</button></a>
                        </div>
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
    </html>
    <?php } ?>
