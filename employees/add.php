<?php
    session_start();

    if ((empty($_SESSION['login']) || (empty($_SESSION['verify'])))) {
        header('location: ./auth/login.php');
    }
    else {
        ?> 

<?php
        //Check if form submitted, insert form date into users table
        if(isset($_POST['submitForm'])){
            $idNumber = htmlspecialchars($_POST['IdNumber']);
            $idType = htmlspecialchars($_POST['IdType']);
            $firstName = htmlspecialchars($_POST['firstname']);
            $lastName = htmlspecialchars($_POST['lastname']);
            $residence = htmlspecialchars($_POST['residence']);
            $GPS = htmlspecialchars($_POST['gCode']);
            $email = htmlspecialchars($_POST['email']);
            $mobile = htmlspecialchars($_POST['mobile']);
            $date = htmlspecialchars($_POST['date']);
            $field = htmlspecialchars($_POST['field']);
            $department = htmlspecialchars($_POST['departments']);
            $team = htmlspecialchars($_POST['teams']);
            $staffId = htmlspecialchars($_POST['staffId']);
            $bankName = htmlspecialchars($_POST['bankName']);
            $bankAccount = htmlspecialchars($_POST['bankAcc']);
            $educationLevel = htmlspecialchars($_POST['educationLevel']);
            $hometown = htmlspecialchars($_POST['hometown']);
            $experienceWorking = htmlspecialchars($_POST['workExperince']);
            $experienceYears = htmlspecialchars($_POST['workingYears']);
            
        // include database connection file
        include_once("./Database/config.php");
        
        $Data = mysqli_query($pdo, "INSERT INTO `staffs_details`(`id`, `idNumber`, `idType`, `email`, `firstName`, `lastName`, `mobile`, `residence`, `field`, `date`, `department`, `team`, `staffId`, `bankName`, `bankAccount`, `educationLevel`, `hometown`, `digitalAddress`, `experienceYears`, `experience`) VALUES ('', '$idNumber', '$idType', '$email', '$firstName', '$lastName', '$mobile', '$residence', '$field', '$date', '$department', '$team', '$staffId', '$bankName', '$bankAccount', '$educationLevel', '$hometown', '$GPS', '$experienceYears', '$experienceWorking')");
        //Show message when form is filled.
        echo("<script type='text/javascript'>alert('Form recorded successfully.')</script>");
        echo("<h3>View <a href='./index.php'>here</a></h3>");
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>
        <title>Persol | Fill Form</title>
        <style>
            form{
                justify-content: center;
            }
            input,select{ margin-bottom: 2%; }
            h3{ margin-top: 2%; }
            .container{padding: 0 20%; }
            footer{
                text-align: center;
            }
        </style>
    </head>
        <header>
            <!-- Navigation -->
            <nav class="navbar navbar-expand-sm bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="./"><img src="https://pbs.twimg.com/profile_banners/1008452946/1355397074/1500x500" width="50" height="40'' alt="Persol Anniversary"></a>
                    <div class="collapse row navbar-collapse" id="mainNavbar">
                        <ul class="navbar-nav">
                        <h1 style="color:white;" class="justify-content-center">Add New Staff</h1>
                            <li class="col justify-content-end">
                                <li class="my-2 list-unstyled">
                                    <a href="./" class="btn btn-info">Dashboard<a/>
                                </li>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    <body onload="OnPageLoad()">
        <main class="container mt-5">
            <div class="form">
                <form method="post" onsubmit="formValidation()">
                    <h3>Personal Information</h3>
                    <div class="form-group">
                        <label class="form-label"  for="firstname">First Name</label>
                        <input type="text" placeholder="John" class="form-control" required id="firstname" name="firstname">
                    </div>
                    <div class="form-group">
                        <label class="form-label"  for="lastname">Last Name</label>
                        <input type="text" class="form-control" required id="lastname" placeholder="Doe" name="lastname">
                    </div>
                    <div class="form-group">
                        <label  class="form-label" for="IdType">ID Card Type</label>
                        <input type="text"  placeholder="Ecowas Card"  class="form-control" required id="IdType" name="IdType">
                    </div>
                    <div class="form-group">
                        <label  class="form-label" for="IdNumber">ID Number</label>
                        <input type="IdNumber"   placeholder="GHA-22541525-2" class="form-control" required id="IdNumber" name="IdNumber">
                    </div>
                    <div class="form-group">
                        <label  class="form-label" for="mobile">Telephone</label>
                        <input type="tel"  class="form-control" placeholder="0540544210"  required id="mobile" name="mobile">
                    </div>
                    <div class="form-group">
                        <label class="form-label"  for="enail">Active Email</label>
                        <input type="email"  class="form-control"  placeholder="john.doe@domain.com" required id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label class="form-label"  for="staffId">Staff ID</label>
                        <input type="text"  class="form-control"  placeholder="A83D900GH" required id="staffId" name="staffId">
                    </div>
                    <div class="form-group">
                        <label  class="form-label" for="residence">Residential Address</label>
                        <input type="text"  class="form-control" placeholder="Ablekuma - Accra"  required id="residence" name="residence">
                    </div>
                    <div class="form-group">
                        <label class="form-label"  for="gCode">GPS Code</label>
                        <input type="text"  class="form-control" placeholder="GC-4521-54"  required id="gCode" name="gCode">
                    </div>
                    <div class="form-group">
                        <label class="form-label"  for="hometown">Where is your hometown?</label>
                        <input type="text"  class="form-control" placeholder="Anloga"  required id="hometown" name="hometown">
                    </div>
                    <div class="form-group">
                        <label class="form-label"  for="date">Commencement Date</label>
                        <input type="date"  class="form-control" required id="date" name="date">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="educationLevel">Education Level</label>
                        <select class="form-select" id="educationLevel" name="educationLevel">
                            <option value="Below SHS">Below SHS</option>
                            <option value="High School" selected>High School</option>
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
                        <select class="form-select" name="workExperince" id="workExperince">
                            <option value="Yes" selected>Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="field">What's your field</label>
                        <select class="form-select" name="field">
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
                        <select class="form-select" id="department" name="departments">
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
                        <select class="form-select" id="teams" name="teams">
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
                        <select class="form-select" id="workingYears" name="workingYears">
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
                        <input type="text"  class="form-control" placeholder="Ecobank"  required id="bankName" name="bankName">
                    </div>
                    <div class="form-group">
                        <label class="form-label"  for="bankAcc">Bank Account</label>
                        <input type="number" placeholder="101124000424" class="form-control" required id="bankAcc" name="bankAcc">
                    </div>
                    
                    <div class="">
                        <button type="submit" id="submitBtn" name="submitForm" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </main>
        <footer style="background: #1A1110; color: white;" class="mt-5">
            <div class="row">
                <div style="display:flex; flex-direction:row;" class="col-md-8 col-sm-12">
                    <a href="https://github.com/john-BAPTIS?tab=repositories" target="_blank"><img style="border-radius: 50%; padding:10px 0" width="50px" src="https://avatars.githubusercontent.com/u/71665600?v=4" alt="Logo"></a>
                    <p style="padding:10px 5px;">Copyright  © 2023 (Angel Development Team). <strong>Powered by: <a style="text-decoration:none" href="mailto:jamesakweter@gmail.com">Akweter</a></strong></p>
                </div>
            </div>
        </footer>

    </body>
    </html>
<?php } ?>
