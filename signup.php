<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include '_dbconnect.php';
    
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $mobno = $_POST["mobno"];
    $DOB = $_POST["DOB"];
    $wmail = $_POST["wmail"];
    $empid = $_POST["empid"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    
    $exists=false;

    if(($password == $cpassword) && $exists==false){
        $sql = "INSERT INTO `users` ( `fname`, `lname`, `mobno` , `DOB`, `wmail`, `empid`, `username`, `password`) VALUES ('$fname', '$lname', '$mobno', '$DOB', '$wmail', '$empid', '$username', '$password')";
        $result = mysqli_query($conn, $sql);
        if ($result){

            $showAlert = true;

            setcookie("registration_success", "Registration Successful", time() + 5, "/");
            // Redirect to the login page after successful registration
            header("Location: login.php");
            exit;
        }
    }

    else
    {
        $showError = "Passwords do not match";
    }
}
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="registerpage.css">

    <title>Registeration</title>
  </head>
  <body>
    
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>

        <h1>
            REGISTRATION
        </h1>

        <div class="form-container">
            <form class= "form" action="/finalsystem/signup.php" method="POST">
                <!--Heading-->
                <div class="headingsContainer">
                    
                </div>
                <!--Main Containers-->

                <div class="mainContainer">
                    <!--First name-->
                    <label for="fname">First Name:</label>
                    <input type="text" placeholder="Enter your first name" id="fname" name="fname" required>
                    <br>
                    <br>
                    <!--Last name-->
                    <label for="lname">Last Name:</label>
                    <input type="text" placeholder="Enter your last name" id="lname" name="lname" required>
                    <br>
                    <br>
                    <!--Mobileno.-->
                    <label for="mobno">Mobile No.:</label>
                    <input type="number" placeholder="Enter your Mobile no." id="mobno" name="mobno" required>
                    <br>
                    <br>
                    <!--DOB-->
                    <label for="DOB">Date of Birth:</label>
                    <input type="date" placeholder="Enter your Date of Birth" id="DOB" name="DOB" required>
                    <br>
                    <br>
                    <!--Work Email-->
                    <label for="wmail">Work Email ID:</label>
                    <input type="text" placeholder="Enter your Work Email ID" id="wmail" name="wmail" required>
                    <br>
                    <br>
                    <!--Emp ID-->
                    <label for="empid">Employee ID:</label>
                    <input type="text" placeholder="Enter your Employee ID" id="empid" name="empid" required>
                    <br>
                    <br>
                    <!--Username-->
                    <label for="username">Username:</label>
                    <input type="text" placeholder="Enter Username" id="username" name="username" aria-describedby="emailHelp" required>
                    <br>
                    <br>
                    <!--Password-->
                    <label for="password">Password:</label>
                    <input type="password" placeholder="Enter password" id="password" name="password" required>
                    <br>
                    <br>
                    <!--CPasswrd-->
                    <label for="cpassword">Confirm Password:</label>
                    <input type="password" placeholder="Re-enter password" id="cpassword" name="cpassword" required>
                    <br>
                    <br>

                    <!--Submit button-->
                
                    <button type="submit">Register</button>
                
                    <br>
                    <!--Back to Login page-->
                    <div align="center">
                        <a href= "login.php"><button type="button">Back to Login page</button></a>
                    </div>

                </div>


            </form>
        </div>

        <!-- JavaScript to disable the back button -->
        <script>
            window.onload = function () {
                window.history.forward();
            };

            window.onpageshow = function (evt) {
                if (evt.persisted) {
                    window.history.forward();
                }
            };
        </script>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
