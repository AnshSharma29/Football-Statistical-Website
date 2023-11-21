<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $login = true;
        session_start();
        setcookie("login_success", "Logged In Successfully", time() + 5, "/");
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: afterlogin.php");
    } 
    else{
        $showError = "Invalid Credentials";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="loginpage.css"> 
    <link rel="stylesheet" href="css/loginpage1.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">

    <title>Login page</title>
  </head>
  <body>
  <header class="header" id="home">
            <div class="nav">
                <div class="navigation container">
                    <div class="logo">
                        <h1>BallorTalk</h1>
                    </div>
                    <div class="menu">
                        <div class="top-nav">
                            <div class="logo">
                                <h1>BallorTalk</h1>
                            </div>
                            <div class="close">
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                        <ul class="nav-list">
                            <li class="nav-item">
                                <a href="index.php" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php" class="nav-link">About</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php" class="nav-link">Team</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php" class="nav-link">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a href="/Minorproject/login.php" class="nav-link">Log in</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
  </header>
    <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
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
 
    <br>
    <br>
    <br>    
    <div class="form-container">
        
        <form action="/HackMAIT/login.php" method="POST">
                
            <!--Heading-->
            <div class="headingsContainer">
                <h3 align="center">Login</h3>
                <p align="center">Login with your Username and password</p>
            </div>
                
            <!--Main Containers-->
            <div class="mainContainer">
                    
                <!--Username-->
                <label for="username">Username</label>
                <input type="text" placeholder="Enter Username" id="username" name="username" aria-describedby="emailHelp" required>
                <br>
                <br>
                
                <!--password-->
                <label for="password">Password</label>
                <input type="password" placeholder="Enter Password" id="password" name="password" required>

                <br>

                <!--Submit button-->
                <button type="submit">Login</button>
                
                <br>

                <!--Register button-->        
                <div class="regi">
                    <p class="register"><a href="signup.php">Register</a></p>
                </div>
            </div>
        </form>
    </div>


    <!-- JavaScript to check and display the popup -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var registrationSuccess = getCookie("registration_success");
            if (registrationSuccess) {
                // Decode the URL-encoded message
                var decodedMessage = decodeURIComponent(registrationSuccess);
                alert(decodedMessage);
                // Remove the cookie
                document.cookie = "registration_success=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            }

            // Check if the user is already logged in
            var isLoggedIn = <?php echo isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true ? 'true' : 'false'; ?>;
            
            if (isLoggedIn) {
                // Show an error message or request form resubmission
                var confirmResubmit = confirm("You are navigating back to a previous page. Do you want to resubmit the form?");
                if (confirmResubmit) {
                    // User chose to resubmit, do nothing
                } else {
                    // User chose not to resubmit, show an error or redirect
                    alert("Form resubmission denied. Please log in again.");
                    window.location.href = "/HackMAIT/login.php";
                }
            }
        });

        // Function to get a cookie value by name
        function getCookie(name) {
            var value = "; " + document.cookie;
            var parts = value.split("; " + name + "=");
            if (parts.length === 2) return parts.pop().split(";").shift();
        }
    </script>

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
