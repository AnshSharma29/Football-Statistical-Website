<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: /finalsystem/login.php");
    exit;
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

    <title>Homepage</title>
</head>
<body>

<h1>
    <?php
    if (isset($_SESSION['username'])) {
        echo 'Welcome ' . $_SESSION['username'];
    } else {
        echo 'Welcome';
    }
    ?>
</h1>

<div class="form-container">
    <form method="POST">
        <!-- Heading -->
        <div class="headingsContainer">

        </div>
    
<div class="form-container">
    <form>
        <div class="headingsContainer">
            <div class="mainContainer">
                <div align="center">
                    <!-- Submit button -->
                    <a href="/HackMAIT/logout.php">
                        <button type="button">Log out</button>
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

        <!-- JavaScript to check and display the popup -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var loginSuccess = getCookie("login_success");
                if (loginSuccess) {
                    // Decode the URL-encoded message
                    var decodedMessage = decodeURIComponent(loginSuccess);
                    alert(decodedMessage);
                    // Remove the cookie
                    document.cookie = "login_success=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                }
            });

            // Function to get a cookie value by name
            function getCookie(name) {
                var value = "; " + document.cookie;
                var parts = value.split("; " + name + "=");
                if (parts.length === 2) return parts.pop().split(";").shift();
            }
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var aregisterSuccess = getCookie("aregister_success");
                if (aregisterSuccess) {
                    // Decode the URL-encoded message
                    var decodedMessage = decodeURIComponent(aregisterSuccess);
                    alert(decodedMessage);
                    // Remove the cookie
                    document.cookie = "aregister_success=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                }
            });

            // Function to get a cookie value by name
            function getCookie(name) {
                var value = "; " + document.cookie;
                var parts = value.split("; " + name + "=");
                if (parts.length === 2) return parts.pop().split(";").shift();
            }
        </script>

<script>
            document.addEventListener("DOMContentLoaded", function () {
                var empregisterSuccess = getCookie("empregister_success");
                if (empregisterSuccess) {
                    // Decode the URL-encoded message
                    var decodedMessage = decodeURIComponent(empregisterSuccess);
                    alert(decodedMessage);
                    // Remove the cookie
                    document.cookie = "empregister_success=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    </body>
</html>
