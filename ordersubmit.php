<?php
session_start();
//session_destroy();

$host = "localhost:3306";;
$dbusername = "root";
$dbpassword = "";

$db = mysqli_connect($host, $dbusername, $dbpassword) or die("Could not connect to the database");


// pre_r($_SESSION);

// function pre_r($item_array)
//     {
//         echo '<pre>';
//         print_r($item_array);
//         echo '</pre>';
//     }
    
if (isset($_SESSION["wfh"])) {

    $orders = $size = $quantity = $price =  $total = "";

    if ($db) {
        echo "";
    } else {
        echo "no connection";
    }

    mysqli_select_db($db, 'project2');
    foreach ($_SESSION['wfh'] as $keys => $value) {
        extract($value);
        $total = $price*$quantity;
        $user = $_SESSION['username'];
        // $size = $_SESSION['size'];
        $query = "INSERT INTO orders(username, ordername, quantity, price, total) values ('$user','$product', $quantity, $price, $total)";
        $db->query($query);
    }

    unset($_SESSION["wfh"]);
    echo '<script>alert("Your order has been confirmed")</script>';
    echo '<script>window.location="feedback.php"</script>';
}
?>
