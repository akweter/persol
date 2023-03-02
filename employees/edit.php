<?php
    session_start();

    if ((empty($_SESSION['login']) || (empty($_SESSION['verify'])))) {
        header('location: ./auth/login.php');
    }
    else {
        ?> 

<?php
    //Include database connection file.
    include_once("./Database/config.php");

    //Show selected user based on the chosen in url 
    $id = $_GET['id'];

    $Data = mysqli_query($pdo, "SELECT * FROM `staffs_details` WHERE id=$id");

    while($Val = mysqli_fetch_array($Data)){
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

<?php
    //Include database connection file.
    include_once("./Database/config.php");

    //Check if form is submiited for update, then redirect to homepage after update
    if(isset($_POST['update'])){
        
        $id = $_POST['id'];

        $idNumber = $_POST['IdNumber'];
        $idType = $_POST['IdType'];
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $residence = $_POST['residence'];
        $GPS = $_POST['gCode'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $date = $_POST['date'];
        $field = $_POST['field'];
        $department = $_POST['departments'];
        $team = $_POST['teams'];
        $staffId = $_POST['staffId'];
        $bankName = $_POST['bankName'];
        $bankAccount = $_POST['bankAcc'];
        $educationLevel = $_POST['educationLevel'];
        $hometown = $_POST['hometown'];
        $experienceWorking = $_POST['workExperince'];
        $experienceYears = $_POST['workingYears'];

    //Update form
    $Data = mysqli_query($pdo,"UPDATE `staffs_details` SET `idNumber`='$idNumber',`idType`='$idType',`email`='$email',`firstName`='$firstName',`lastName`='$lastName',`mobile`='$mobile',`residence`='$residence',`field`='$residence',`date`='$date',`department`='$department',`team`='$team',`staffId`='$staffId',`bankName`='$bankName',`bankAccount`='$bankAccount',`educationLevel`='$educationLevel',`hometown`='$hometown',`digitalAddress`='$GPS',`experienceYears`='$experienceYears',`experience`='$experienceWorking' WHERE id=$id");

    //Show message when form is filled.
    echo("<script type='text/javascript'>alert('Form updated successfully.')</script>");
    echo("<script type='text/javascript'>alertEdit();</script>");
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
            form{
                justify-content: center;
            }
            input,select{ margin-bottom: 2%; }
            h3{ margin-top: 2%; }
            .container{padding: 0 20%; }
        </style>
    </head>
    <header>
            <!-- Navigation -->
            <nav class="navbar navbar-expand-sm bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img src="https://pbs.twimg.com/profile_banners/1008452946/1355397074/1500x500" width="50" height="40'' alt="Persol Anniversary"></a>
                    <div class="collapse row navbar-collapse" id="mainNavbar">
                        <ul class="navbar-nav">
                            <li class="col justify-content-end">
                                <li class="my-2 list-unstyled">
                                    <a href="./" class="btn btn-info">Back Home<a/>
                                </li>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

    <body>
        <main class="container mt-5">
            <div id="alert_message"></div>
            <div class="form">
                <form method="post">
                    <h3>Personal Information</h3>
                    <div class="form-group">
                        <label class="form-label"  for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" value="<?=$firstName ?>" name="firstname">
                    </div>
                    <div class="form-group">
                        <label class="form-label"  for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname"  value="<?=$lastName ?>" name="lastname">
                    </div>
                    <div class="form-group">
                        <label  class="form-label" for="IdType">ID Card Type</label>
                        <input type="text" name="IdType" value="<?=$idType ?>" class="form-control" id="IdType"">
                    </div>
                    <div class="form-group">
                        <label  class="form-label" for="IdNumber">ID Number</label>
                        <input type="IdNumber" value="<?=$idNumber ?>-2" class="form-control" id="IdNumber" name="IdNumber">
                    </div>
                    <div class="form-group">
                        <label  class="form-label" for="mobile">Telephone</label>
                        <input type="tel"  class="form-control"  value="<?=$mobile ?>"  id="mobile" name="mobile">
                    </div>
                    <div class="form-group">
                        <label class="form-label"  for="enail">Active Email</label>
                        <input type="email"  class="form-control"   value="<?=$email ?>" id="enail" name="email">
                    </div>
                    <div class="form-group">
                        <label class="form-label"  for="staffId">Staff ID</label>
                        <input type="text" class="form-control" value="<?=$staffId ?>" id="enail" name="staffId">
                    </div>
                    <div class="form-group">
                        <label  class="form-label" for="residence">Residential Address</label>
                        <input type="text"  class="form-control"  value="<?=$residence ?>"  id="residence" name="residence">
                    </div>
                    <div class="form-group">
                        <label class="form-label"  for="gCode">GPS Code</label>
                        <input type="text"  class="form-control"  value="<?=$GPS ?>"  id="gCode" name="gCode">
                    </div>
                    <div class="form-group">
                        <label class="form-label"  for="hometown">Where is your hometown?</label>
                        <input type="text"  class="form-control"  value="<?=$hometown ?>"  id="hometown" name="hometown">
                    </div>
                    <div class="form-group">
                        <label class="form-label"  for="date">Commencement Date</label>
                        <input type="date" class="form-control" id="date" value="<?=$date ?>" name="date">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="educationLevel">Education Level</label>
                        <select class="form-select" value="<?=$educationLevel ?>" name="educationLevel">
                            <option value="Below SHS">Below SHS</option>
                            <option value="High School" >High School</option>
                            <option value="Diploma">Diploma</option>
                            <option value="HND">HND</option>
                            <option value="1st Degreee">1st Degreee</option>
                            <option value="Masters Degree">Masters Degree</option>
                            <option value="Doctorate Degree">Doctorate Degree</option>
                            <option value="Associate Professor">Associate Professor</option>
                            <option value="Professor">Professor</option>
                        </select>
                    </div>
                    <h3>Work experience</h3>
                    <div class="form-group">
                    <label class="form-label" for="workExperince">Do you have working experience?</label>
                        <select class="form-select" value="<?=$experienceWorking ?>" name="workExperince">
                            <option value="Yes" selected>Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="field">What's your field</label>
                        <select class="form-select" value="<?=$field ?>" name="field">
                            <option value="UI/UX Designer" selected>UI/UX Designer</option>
                            <option value="Web Developer">Web Developer</option>
                            <option value="Accountant">Accountant</option>
                            <option value="Forensic Engineer">Forensic Engineer</option>
                            <option value="Cybersecurity">Cybersecurity</option>
                            <option value="Driving">Driving</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Management">Management</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="department">Department</label>
                        <select class="form-select" value="<?=$department ?>" name="departments">
                            <option value="Accounts" selected>Accounts</option>
                            <option value="Logistics" >Logistics</option>
                            <option value="Procurement">Procurement</option>
                            <option value="Development">Development</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Information Systems">Information Systems</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="teams">Education Level</label>
                        <select class="form-select" value="<?=$team ?>" name="teams">
                            <option value="Special Force" selected>Special Force</option>
                            <option value="FAQ Team">FAQ Team</option>
                            <option value="Troubleshoot Team">Troubleshoot Team</option>
                            <option value="Standby Team">Standby Team</option>
                            <option value="Night Shift">Night Shift</option>
                            <option value="Holidays Team">Holidays Team</option>
                            <option value="Emergency Response">Emergency Response</option>
                            <option value="Remote Team">Remote Team</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="workingYears">How many years?</label>
                        <select class="form-select" value="<?=$experienceYears ?>" name="workingYears">
                            <option value="Starter" >Starter</option>
                            <option value="Less than 3 years" selected>Less than 3 years</option>
                            <option value="3 - 5 years">3 - 5 years</option>
                            <option value="5 - 7 years">5 - 7 years</option>
                            <option value="10 years and above">10 years and above</option>
                        </select>
                    </div>
                    <h3>Bank Information:</h3>
                    <div class="form-group">
                        <label class="form-label"  for="bankName">Your Bankers</label>
                        <input type="text"  class="form-control" value="<?=$bankName ?>" id="bankName" name="bankName">
                    </div>
                    <div class="form-group">
                        <label class="form-label"  for="bankAcc">Bank Account</label>
                        <input type="number" value="<?=$bankAccount ?>" class="form-control" id="bankAcc" name="bankAcc">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?=$_GET['id']; ?>">
                        <input type="submit" name="update" class="btn btn-primary" value="Update">
                        <a href="./"><input class="btn btn-danger" value="Cancel"></a>
                    </div>
                </form>
            </div>
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
                    
        </script>
        <script src="./node_modules/bootstrap.min.js"></script>
    </body>
    </html>
    <?php } ?>
    