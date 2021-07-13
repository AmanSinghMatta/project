<?php
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $email = $password = $dob = $contact = $address = $gender = "";
    $username_err = $email_err = $password_err = $dob_err = $contact_err = $address_err = $gender_err = "";

    // Check for username
    if (empty(trim($_POST['username']))) {
        $username_err = "username cannot be blank";
    } else {
        $username = trim($_POST['username']);
    }

    // Check if email is empty
    if (empty(trim($_POST["email"]))) {
        $email_err = "email cannot be blank";
    } else {
        $sql = "SELECT id FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set the value of param email
            $param_email = trim($_POST['email']);

            // Try to execute this statement
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_err = "This email is already taken";
                } else {
                    $email = trim($_POST['email']);
                }
            } else {
                echo "Something went wrong";
            }
            mysqli_stmt_close($stmt);
        }
    }

    // Check for  password
    if (empty(trim($_POST['password']))) {
        $password_err = "Destination cannot be blank";
    } else {
        $password = trim($_POST['password']);
    }

    // Check for  date of birth
    if (empty(trim($_POST['dob']))) {
        $dob_err = "Destination cannot be blank";
    } else {
        $dob = trim($_POST['dob']);
    }

    // Check for  contact
    if (empty(trim($_POST['contact']))) {
        $contact_err = "Destination cannot be blank";
    } else {
        $contact = trim($_POST['contact']);
    }

    // Check for address
    if (empty(trim($_POST['address']))) {
        $address_err = "address cannot be blank";
    } else {
        $address = trim($_POST['address']);
    }

    // Check for gender
    if (empty(trim($_POST['gender']))) {
        $gender_err = "Gender cannot be blank";
    } else {
        $gender = trim($_POST['gender']);
    }



    // If there were no errors, go ahead and insert into the database
    if (empty($username_err) && empty($email_err) && empty($password_err) && empty($dob_err) && empty($contact_err) && empty($address_err)) {
        $sql = "INSERT INTO users (username , email , password , dob , contact , address , gender) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssssss", $param_username, $param_email, $param_password, $param_dob, $param_contact, $param_address, $param_gender);

            // Set these parameters
            $param_username =  $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_dob =  $dob;
            $param_contact = $contact;
            $param_address =  $address;
            $param_gender = $gender;
            // Try to execute the query
            if (mysqli_stmt_execute($stmt)) {

                header("location: index.php");
            } else {
                echo "Something went wrong... cannot redirect!";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}
?>

<!docaddress html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    </head>

    <body>
        <div class="container mt-5">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputusername1">User name</label>
                            <input type="text" class="form-control" name="username" id="exampleInputusername1" aria-describedby="usernameHelp">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="text" class="form-control" name="email" id="exampleInputPassword1">
                            <small id="usernameHelp" class="form-text text-muted">We'll never share your username with anyone else.</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="md-col-5 mx-3">
                        <div class="form-group">
                            <label for="exampleInputusername1">Password</label>
                            <input type="password" class="form-control" name="password" id="exampleInputusername1" aria-describedby="usernameHelp">
                        </div>
                    </div>
                    <div class="md-col-6 mx-5">
                        <div class="form-group">
                            <label for="exampleInputusername1">Date-Of-Birth</label>
                            <input type="text" class="form-control" name="dob" id="exampleInputusername1" aria-describedby="usernameHelp">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="exampleInputusername1">contact</label>
                            <input type="text" class="form-control" name="contact" id="exampleInputusername1" aria-describedby="usernameHelp" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputusername1">address</label>
                    <input type="text" class="form-control" name="address" id="exampleInputusername1" aria-describedby="usernameHelp" placeholder="">
                </div>
                <div class="quotationformrow my-5">
                    <label class="quotation_label">Gender</label>
                    <select class="quotation_selectfield mx-3" name="gender" required="">
                        <option selected="selected" value="0">--Select--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <button address="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <div style="background-color: dimgray;">
            <!-- Footer -->
            <footer class="bd-footer text-muted">
                <div class="container-fluid p-3 p-md-5">
                    <ul class="bd-footer-links">
                        <li><a style="color: white;" href="aboutus.php">About</a></li>
                        <li><a style="color: white;" href="TermsConditions.php">Terms & Conditions </li>
                        <p>Designed and built by Aman Singh
                        </p>
                    </ul>
                </div>
            </footer>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>

    </html>