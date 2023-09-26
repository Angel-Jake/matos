<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:index.php');
};

if(isset($_POST['order'])){
    $isproceed = true;
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $address = mysqli_real_escape_string($conn, $_POST['street'].', '. $_POST['barangay'].', '. $_POST['city']);
    $gcash = mysqli_real_escape_string($conn, $_POST['gcash']);
    $placed_on = date('d-M-Y');

    $cart_total = 0;
    $cart_products[] = '';

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    if(mysqli_num_rows($cart_query) > 0){
        while($cart_item = mysqli_fetch_assoc($cart_query)){
            $pid = $cart_item['pid'];
            $product_details = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $pid") or die('query failed');
            $product_item = mysqli_fetch_assoc($product_details);
            $product_quantity = $product_item['stock'];
            $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND gcash = '$gcash' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');
            $order_quantity = $cart_item['quantity'];
             if ($product_quantity >= $order_quantity && $product_quantity != 0 && $order_quantity != 0){
    
             }
             else{
                 $isproceed = false;
             }
        }
    
    if($isproceed === true){
        $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    if(mysqli_num_rows($cart_query) > 0){
        while($cart_item = mysqli_fetch_assoc($cart_query)){
            $cart_products[] = $cart_item['name'].''.$cart_item['pid'].' ('.$cart_item['quantity'].') ';
            $sub_total = ($cart_item['price'] * $cart_item['quantity']);
            $cart_total += $sub_total;
            $pid = $cart_item['pid'];
            $details_product = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $pid") or die('query failed');
            $item_product = mysqli_fetch_assoc($details_product);
            $quantity_product = $item_product['stock'];
            $query_order = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND gcash = '$gcash' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');
            $quantity_order = $cart_item['quantity'];
            $new_product_quantity = $quantity_product - $quantity_order;
            mysqli_query($conn, "UPDATE `products` SET stock = '$new_product_quantity' WHERE id = '$pid'") or die('query failed');
        }
        }
        $total_products = implode(', ',$cart_products);
        $total_quantity = ($cart_item['quantity']);
        $total_pid = ($cart_item['pid']);
        mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, gcash, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$gcash', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
        mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        $message[] = 'order placed successfully!';
    }else{
     $message[] = 'order failed!';
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>checkout order</h3>
    <p> <a href="home.php">home</a> / checkout </p>
</section>

<section class="display-order">
    <?php
        $grand_total = 0;
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
    ?>    
    <p> <?php echo $fetch_cart['name'] ?> <span>(<?php echo '₱'.$fetch_cart['price'].'/-'.' x '.$fetch_cart['quantity']  ?>)</span> </p>
    <?php
        }
        }else{
            echo '<p class="empty">your cart is empty</p>';
        }
    ?>
    <div class="grand-total">grand total : <span>₱<?php echo $grand_total; ?>/-</span></div>
</section>


<section class="checkout">

    <form action="" method="POST">

        <h3>place your order</h3>

        <div class="flex">
            <div class="inputBox">
                <span>Name :</span>
                <input type="text" name="name" placeholder="enter your name" required>
            </div>
            <div class="inputBox">
                <span>Number :</span>
                <input type="number" name="number" min="0" placeholder="enter your number" required>
            </div>
            <div class="inputBox">
                <span>Email :</span>
                <input type="email" name="email" placeholder="enter your email" required>
            </div>
            <div class="inputBox">
                <span>Payment Method :</span>
                <select name="method">
                    <option value="cash on delivery">cash on delivery</option>
                    <option value="Gcash(delivery)">Gcash(delivery)</option>
                    <option value="Gcash(pick-up)">Gcash(pick-up)</option>

                </select>
            </div>
            <div class="inputBox">
                <span>Address :</span>
                <input type="text" name="street" placeholder="house no. & street Name" required>
            </div>
            <div class="inputBox">
                <span>City :</span>
                <input type="text" name="city" placeholder="e.g. manila" required>
            </div>
            <div class="inputBox">
                <span>Barangay :</span>
                <input type="text" name="barangay" placeholder="e.g. barangay" required>
            </div>
            <div class="inputBox">
                <span>Gcash Reference No. :</span>
                <input type="number" min="0" name="gcash" placeholder="e.g. 123456">
            </div>
        </div>

        <div class="gcash">
        <img src="images/gcash.png">
        </div>


        <a href="checkout_v2.php" class="option-btn">Payment</a>
        <input type="submit" name="order" value="order now" class="btn">

    </form>


</section>






<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>