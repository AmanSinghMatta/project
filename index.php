<?php
//This script will handle login
session_start();

// check if the user is already logged in
if (isset($_SESSION['username'])) {
    header("location: homepage.php");
    exit;
}

require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $err = "Please enter username + password";
    } else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


    if (empty($err)) {
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;


        // Try to execute this statement
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hashed_password)) {
                        // this means the password is corrct. Allow user to login
                        session_start();
                        $_SESSION["username"] = $username;
                        $_SESSION["id"] = $id;
                        $_SESSION["loggedin"] = true;

                        //Redirect user to welcome page
                        header("location: homepage.php");
                    }
                    else {
                        $err = "incorrect credential";
                    }
                }
            }
        }
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Project2</title>
    <style>
        .cover {
            background-image: url("https://images.pexels.com/photos/3965545/pexels-photo-3965545.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260");
            height: 600px;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>

</head>

<body style="background-color: #282828;">

    <div style="color: white;" class="cover">
        <h3 style="color: black;" class=" mx-5 my-5">Please Login Here:</h3>
        <hr>
        <form action="" method="post">
            <div class="container-fluid my-5">
            <?php if($err) { ?>
                <div>
                    <p> <?php echo $err; ?>
                </div>
                <?php  } ?>
                
                <div class="row mx-5 my-5">
                    <div class="col-md-2 my-5">
                        <div class="form-group my-5">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username" required>
                        </div>
                    </div>
                    <div class="col-md-2 my-5">
                        <div class="form-group my-5">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mx-5">Submit</button><br>
                <a style="color: white;" class=" mx-5" href="register.php">New?? Register first</a>
            </div>
        </form>
    </div>

    <div class="container" style="color: white;">
        <div class="row my-5">
            <div class="col-md-6">
                <div class="text-center">No Minimum Order</div>
                <div class="text-center my-5">Order for yourself or for the group, with no restrictions on order quantity or value</div>
            </div>
            <div class="col-md-6">
                <div class="text-center">Lightning Fast Delivery</div>
                <div class="text-center my-5">Experience our lightning fast delivery</div>
            </div>
        </div>
    </div>



    <div style="background-color: dimgray;">
        <!-- Footer -->
        <footer class="bd-footer text-muted">
            <div class="container-fluid p-md-5">
                <ul class="bd-footer-links">
               <li><?php echo '<a style="color: white;" href="aboutus.php">About us</a>' ?></li>
               <li><?php echo '<a style="color: white;" href="TermsConditions.php">Terms & Conditions</a>' ?></li>
                </ul>
                <p style="color: white;">Designed and built by Aman Singh
                </p>
            </div>
        </footer>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>