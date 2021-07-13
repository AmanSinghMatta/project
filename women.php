<?php
session_start();
require_once('config.php');
$product_ids = array();

if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["wfh"])) {
        $item_array_id = array_column($_SESSION["wfh"], "id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["wfh"]);
            $item_array = array(
                'id' => $_GET["id"],
                'product' => $_POST["product"],
                'price' => $_POST["price"],
                'quantity' => $_POST["quantity"]
            );
            $_SESSION["wfh"][$count] = $item_array;
        } else {
            echo '<script>alert("Item Already Added")</script>';
            echo '<script>window.location="women.php"</script>';
        }
    } else {
        $item_array = array(
            'id' => $_GET["id"],
            'product' => $_POST["product"],
            'price' => $_POST["price"],
            'quantity' => $_POST["quantity"]
        );
        $_SESSION["wfh"][0] = $item_array;
    }
}
if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["wfh"] as $keys => $values) {
            if ($values["id"] == $_GET["id"]) {
                unset($_SESSION["wfh"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="women.php"</script>';
            }
        }
    }
}

// pre_r($_SESSION);

function pre_r($item_array)
{
    echo '<pre>';
    print_r($item_array);
    echo '</pre>';
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--aos-->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Women</title>
    <style></style>
</head>

<body style="margin: 0; padding: 0; box-sizing: border-box;">
    <div>
        <!--Navigation-->
        <nav class="navbar navbar-expand-lg sticky-top" style="background-color: black;">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active mx-2 my-2">
                        <?php echo '<a style="color: white;" href="homepage.php">Home</a>' ?><span class="sr-only">(current)</span>
                    </li>
                    <li class="nav-item mx-2 my-2">
                        <?php echo '<a style="color: white;" href="aboutus.php">About us</a>' ?>
                    </li>
                    <li class="nav-item mx-2 my-2">
                        <?php echo '<a style="color: white;" href="contact.php">Contact us</a>' ?>
                    </li>
                    <li class="nav-item mx-2 my-2">
                        <h5 style="color: white;"><?php echo "Welcome " . $_SESSION['username'] ?>!</h5>
                    </li>
                </ul>
                <li class="nav-item">
                    <?php echo '<a style="color: white;" class="btn btn-danger" href="logout.php">Logout</a>;' ?>
                </li>
            </div>
        </nav>

        <!--support-->
        <!-- <a id="support" style="color: white; background: #179781; border-top-left-radius: 6px; border-top-right-radius: 6px; border-top: 2px solid #badfe7; font-size: 13px; font-weight: 700; padding: 8px 16px; position: fixed; top: 164px; right: -26px; z-index: 1030; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg);" href="contact.php">Support</a> -->

        <!--browse-->
        <!-- <a id="browse" style="color: white; background: #179781; border-top-left-radius: 6px; border-top-right-radius: 6px; border-bottom-left-radius: 6px; border-bottom-right-radius: 6px; border-top: 2px solid #badfe7; font-size: 13px; font-weight: 700; padding: 8px 16px; position: fixed; bottom: 30px; left: 50px; z-index: 1030;" href="browse.php"><i class="bi bi-arrow-left-circle"></i>Browse</a> -->

        <div class="row mx-5">
            <div class="col-md-7">
                <div class="container" data-aos="fade-up" data-aos-offset="200" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false">
                    <?php

                    $query = 'SELECT * FROM women ORDER by id ASC';
                    $result = mysqli_query($conn, $query);

                    if ($result) :
                        if (mysqli_num_rows($result) > 0) :
                            while ($product = mysqli_fetch_assoc($result)) :
                                //print_r($product);
                    ?>
                                <div class="container">
                                    <div class="col-1"></div>
                                    <div class="col-sm-3 col-md-3">
                                        <form method="post" action="women.php?action=add&id=<?php echo $product['id']; ?>">
                                            <div class="product">
                                                <img style="height: 350px; width: 300px; border: 5px; border-color: white;" src="<?php echo $product['image']; ?>" class="img-responsive my-5" />
                                                <h4 class="text-info"><?php echo $product['product']; ?></h4>
                                                <h4>₹ <?php echo $product['price']; ?></h4>
                                                <input type="number" name="quantity" class="form-control" value="1">
                                                <input type="hidden" name="product" value="<?php echo $product['product']; ?>" />
                                                <input type="hidden" name="price" value="<?php echo $product['price']; ?>" />
                                                <input type="submit" name="add_to_cart" class="btn btn-info my-3" value="Add to Cart" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                    <?php
                            endwhile;
                        endif;
                    endif;
                    ?>

                    <div style="clear:both;"></div>
                    </br>
                </div>
            </div>
            <div class="col-md-5 my-5">
                <form method="post" action="ordersubmit.php?add">
                    <div class="table-responsive" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false">
                        <table class="table">
                            <tr>
                                <th colspan="5">
                                    <h3> Order Details </h3>
                                </th>
                            </tr>
                            <tr>
                                <th width="40%">Product Name</th>
                                <th width="10%">Quantity</th>
                                <th width="20%">Price</th>
                                <th width="15%">Total</th>
                                <th width="5%">Action</th>
                            </tr>
                            <?php
                            if (!empty($_SESSION['wfh'])) :
                                $total = 0;
                                foreach ($_SESSION['wfh'] as $key => $product) :
                            ?>
                                    <tr>
                                        <td name="ordername"><?php echo $product['product']; ?></td>
                                        <td name="quantity"><?php echo $product['quantity']; ?></td>
                                        <td name="price">₹ <?php echo $product['price']; ?></td>
                                        <td name="total">₹ <?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>
                                        <td><a href="women.php?action=delete&id=<?php echo $product['id']; ?>">
                                                <div class="btn-danger">Remove</div>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                    $total = $total + ($product['quantity'] * $product['price']);
                                endforeach;
                                ?>
                                <tr>
                                    <td colspan="3" align="right">Total</td>
                                    <td align="right">₹ <?php echo number_format($total, 2); ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <!-- show checkout button only if the shopping cart is not empty-->
                                    <td colspan="5">
                                        <?php
                                        if (isset($_SESSION['wfh'])) :
                                            if (count($_SESSION['wfh']) > 0) :
                                        ?><input type="submit" action="ordersubmit.php" name="checkout" class="btn btn-info my-3" value="Confirm Order" />
                                        <?php endif;
                                        endif; ?>
                                    </td>
                                </tr>
                            <?php
                            endif;
                            ?>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <form class="mbr-form" action="/" method="post" data-form-title="Mobirise Form">
<label class="form-control-label mbr-fonts-style display-7" >Enter your coupon Code</label>
<input type="text" class="form-control" name="coupon"  required placeholder="coupon code"
                id="coupon" />

                <span class="input-group-btn"><button type="submit" class="btn btn-form btn-warning display-4 my-3 mx-3">
              apply code
            </button></span>

</form>

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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" 2 integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" 3 crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>