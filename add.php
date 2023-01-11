
<?php
    session_start();

        //Check if form submitted, insert form date into users table
        if(isset($_POST['submitForm'])){
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
            
        // include database connection file
        include_once("./Database/config.php");

        $Data = mysqli_query($pdo, "INSERT INTO `persol`(`id`, `idNumber`, `idType`, `email`, `firstName`, `lastName`, `mobile`, `residence`, `field`, `date`, `department`, `team`, `staffId`, `bankName`, `bankAccount`, `educationLevel`, `hometown`, `digitalAddress`, `experienceYears`, `experience`) VALUES ('', '$idNumber', '$idType', '$email', '$firstName', '$lastName', '$mobile', '$residence', '$field', '$date', '$department', '$team', '$staffId', '$bankName', '$bankAccount', '$educationLevel', '$hometown', '$GPS', '$experienceYears', '$experienceWorking')");
        //Show message when form is filled.
        echo("<script type='text/javascript'>alert('Form recorded successfully.')</script>"); 
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="PHP Web Project">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <a class="navbar-brand" href="#"><img src="./" alt="Persol Anniversary"></a>
                    <div class="collapse row navbar-collapse" id="mainNavbar">
                        <ul class="navbar-nav">
                        <h1 class="justify-content-center">Add New Staff</h1>
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
    <body>
        
        <main class="container mt-5"> 
            <div class="form">
                <form method="post">
    <?php
        echo("<h3>View <a href='./index.php'>here</a></h3>");
        }
    ?>
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
                        <input type="email"  class="form-control"  placeholder="john.doe@domain.com" required id="enail" name="email">
                    </div>
                    <div class="form-group">
                        <label class="form-label"  for="staffId">Staff ID</label>
                        <input type="text"  class="form-control"  placeholder="A83D900GH" required id="enail" name="staffId">
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
                        <select class="form-select" name="educationLevel">
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
                        <select class="form-select" name="workExperince">
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
                        <select class="form-select" name="departments">
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
                        <select class="form-select" name="teams">
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
                        <select class="form-select" name="workingYears">
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
                        <button type="submit" name="submitForm" class="btn btn-primary">Submit</button>
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
    </body>
    </html>
    