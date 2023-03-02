<?php
    session_start();

    if ((empty($_SESSION['login']) || (empty($_SESSION['verify'])))) {
        header('location: ./auth/login.php');
    }
    else {
        ?> 

<?php
    include_once("./Database/config.php");
    //Show selected user based on the chosen in url 
    $id = $_GET['id'];

    $Data = mysqli_query($pdo, "SELECT * FROM `staffs_details` WHERE id=$id");

    while($Val = mysqli_fetch_array($Data)){
        $id = $Val['id'];
        $idNumber = $Val['idNumber'];
        $idType = $Val['idType'];
        $firstName = $Val['firstName'];
        $lastName = $Val['lastName'];
        $residence = $Val['residence'];
        $GPS = $Val['digitalAddress'];
        $email = $Val['email'];
        $mobile = $Val['mobile'];
        $date = $Val['date'];
        $field = $Val['field'];
        $department = $Val['department'];
        $team = $Val['team'];
        $staffId = $Val['staffId'];
        $bankName = $Val['bankName'];
        $bankAccount = $Val['bankAccount'];
        $educationLevel = $Val['educationLevel'];
        $hometown = $Val['hometown'];
        $experienceWorking = $Val['experience'];
        $experienceYears = $Val['experienceYears'];
    }
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="PHP Web Project">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="https://pbs.twimg.com/profile_banners/1008452946/1355397074/1500x500">
        <link rel="icon" type="image/png" sizes="16x16" href="https://pbs.twimg.com/profile_banners/1008452946/1355397074/1500x500">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="stylesheet" href="./node_modules/bootstrap.min.css">
        <title>Persol | Fill Form</title>
        <style>
            main{padding: 0 5%;}
        </style>
    </head>
        <header>
            <!-- Navigation -->
            <nav class="navbar navbar-expand-sm bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="./"><img src="https://pbs.twimg.com/profile_banners/1008452946/1355397074/1500x500" width="40" height="50'' alt="Persol Anniversary"></a>
                    <div class="collapse row navbar-collapse" id="mainNavbar">
                        <ul class="navbar-nav">
                        <h1 style="color:white;">Details of <?=$firstName;?> <?=$lastName;?></h1>
                            <li class="col justify-content-end">
                                <li class="my-2 list-unstyled">
                                    <a href="./" class="btn btn-info">Skip To Home<a/>
                                </li>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    <body>
        <main class="mt-4">
            <table class="table table-hover">
                <thead>
                    <tr class="table-dark">
                        <th scope="col">Key</th>
                        <th scope="col">Values</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-default">
                        <td class="blog-post-meta">First name</td>
                        <td class="blog-post-meta"><?=$firstName; ?></td>
                    </tr>
                    <tr class="table-warning">
                        <td class="blog-post-meta">Last name</td>
                        <td class="blog-post-meta"><?=$lastName; ?></td>
                    </tr>
                    <tr class="table-info">
                        <td class="blog-post-meta">ID Type</td>
                        <td class="blog-post-meta"><?=$idType; ?></td>
                    </tr>
                    <tr class="table-primary">
                        <td class="blog-post-meta">ID Number</td>
                        <td class="blog-post-meta"><?=$idNumber; ?></td>
                    </tr>
                    <tr class="table-secondary">
                        <td class="blog-post-meta">Telephone</td>
                        <td class="blog-post-meta"><?=$mobile; ?></td>
                    </tr>
                    <tr class="table-light">
                        <td class="blog-post-meta">Staff ID</td>
                        <td class="blog-post-meta"><?=$staffId; ?></td>
                    </tr>
                    <tr class="table-success">
                        <td class="blog-post-meta">Residence</td>
                        <td class="blog-post-meta"><?=$residence; ?></td>
                    </tr>
                    <tr class="table-danger">
                        <td class="blog-post-meta">Email</td>
                        <td class="blog-post-meta"><?=$email; ?></td>
                    </tr>
                    <tr class="table-primary">
                        <td class="blog-post-meta">Digital Address</td>
                        <td class="blog-post-meta"><?=$GPS; ?></td>
                    </tr>
                    <tr class="table-info">
                        <td class="blog-post-meta">Hometown</td>
                        <td class="blog-post-meta"><?=$hometown; ?></td>
                    </tr>
                    <tr class="table-light">
                        <td class="blog-post-meta">Commencement Date</td>
                        <td class="blog-post-meta"><?=$date; ?></td>
                    </tr>
                    <tr class="table-success">
                        <td class="blog-post-meta">Education Level</td>
                        <td class="blog-post-meta"><?=$educationLevel; ?></td>
                    </tr>
                    <tr class="table-secondary">
                        <td class="blog-post-meta">Any working experience?</td>
                        <td class="blog-post-meta"><?=$experienceWorking; ?></td>
                    </tr>
                    <tr class="table-warning">
                        <td class="blog-post-meta">Field of experience</td>
                        <td class="blog-post-meta"><?=$field; ?></td>
                    </tr>
                    <tr class="table-info">
                        <td class="blog-post-meta">Department</td>
                        <td class="blog-post-meta"><?=$department; ?></td>
                    </tr>
                    <tr class="table-primary">
                        <td class="blog-post-meta">Team</td>
                        <td class="blog-post-meta"><?=$team; ?></td>
                    </tr>
                    <tr class="table-secondary">
                        <td class="blog-post-meta">Years of experience</td>
                        <td class="blog-post-meta"><?=$experienceYears; ?></td>
                    </tr>
                    <tr class="table-info">
                        <td class="blog-post-meta">Bankers</td>
                        <td class="blog-post-meta"><?=$bankName; ?></td>
                    </tr>
                    <tr class="table-light">
                        <td class="blog-post-meta">Bank Account</td>
                        <td class="blog-post-meta"><?=$bankAccount; ?></td>
                    </tr>
                </tbody>
            </table>
        </main>
            
        <footer style="background: #1A1110; color: white;" class="mt-5">
            <div class="row">
                <div class="col col-md-2"></div>
                <div style="display:flex; flex-direction:row;" class="col col-md-8">
                    <a href="https://github.com/john-BAPTIS?tab=repositories" target="_blank"><img style="border-radius: 50%; padding:50% 0" width="50px" height=}50ox" src="https://avatars.githubusercontent.com/u/71665600?v=4" alt="Logo"></a>
                    <p style=" padding:15px 0 15px 10px;">Copyright  © 2023 (Angel Development Team). <strong>Powered by: <a style="text-decoration:none" href="mailto:jamesakweter@gmail.com">Akweter</a></strong></p>
                </div>
                <div class="col col-md-2"></div>
            </div>
        </footer>
        <script src="./node_modules/bootstrap/js/bootstrap.min.js"></script>
    </body>
    </html>
<?php } ?>