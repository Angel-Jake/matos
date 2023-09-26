<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>about us</h3>
    <p> <a href="home.php">home</a> / about </p>
</section>

<section class="grid">

    <div class="box">
   <img src="images/6.gif" alt="">
   <h3>our email</h3>
   <a href="mailto:matoswater@gmail.com"></i>matoswater@gmail.com</a>
    </div>

    <div class="box">
   <img src="images/5.gif" alt="">
   <h3>opening hours</h3>
   <p>8:00am to 5:00pm</p>
    </div>

    <div class="box">
   <img src="images/3.gif" alt="">
   <h3>our address</h3>
    <a href="https://www.google.com/maps/place/Mato's+Water+Caloocan/@14.7488662,121.0331808,21z/data=!4m9!1m2!2m1!1srw+water+caloocan+highview+homes+congressional+road+171+bagumbong+caloocan+metro+manila!3m5!1s0x3397b14c6a99baa1:0x8de15b9c475cfad0!8m2!3d14.7488662!4d121.0334544!15sCldydyB3YXRlciBjYWxvb2NhbiBoaWdodmlldyBob21lcyBjb25ncmVzc2lvbmFsIHJvYWQgMTcxIGJhZ3VtYm9uZyBjYWxvb2NhbiBtZXRybyBtYW5pbGGSAR53YXRlcl93b3Jrc19lcXVpcG1lbnRfc3VwcGxpZXLgAQA"></i>Bagumbong, Caloocan City</a>
    <a href="https://www.google.com/maps/place/RW+WATER+(water+equipment+%26+supplies+trading)/@14.8091749,120.9885418,17z/data=!3m1!4b1!4m5!3m4!1s0x3397af05f03d2797:0xba33143ea1320365!8m2!3d14.8091697!4d120.9907358"></i>Sta.Maria, Bulacan</a>
    </div>

    <div class="box">
   <img src="images/4.gif" alt="">
   <h3>our number</h3>
    <a href="tel:09063663659"></i>0906-366-3659</a>
    <a href="tel:09953089750"></i>0995-308-9750</a>
    </div>

</section>

<section class="about">

    <div class="flex">

        <div class="image">
            <img src="images/about-img-1.png" alt="">
        </div>

        <div class="content">
            <h3>why choose us?</h3>
            <p>We believe that clients' needs are of utmost importance, hence our complete customer focus and commitment to help clients achieve their objectives.</p>
            <a href="shop.php" class="btn">shop now</a>
        </div>

    </div>

    <div class="flex">

        <div class="content">
            <h3>what we provide?</h3>
            <p>Mato's Water Equipment and Supplies Trading is here to cater to your WATER NEEDS: Water station essentials (parts, filters, seals, containers, water bottles,etc), water treatment concerns, and water filtration systems.</p>
            <a href="contact.php" class="btn">contact us</a>
        </div>

        <div class="image">
            <img src="images/about-img-2.png" alt="">
        </div>

    </div>

    <div class="flex">

        <div class="image">
            <img src="images/about-img-3.png" alt="">
        </div>

        <div class="content">
            <h3>who we are?</h3>
            <p>We are the first water equipment and supplies trading that offer extensive supplies here in Sta. Maria, Bulacan and Bagumbong, Caloocan City.</p>
            <a href="data_privacy.php" class="btn">data privacy</a>
        </div>

    </div>

    <div class="flex">

    <div class="content">
        <h3>who are the owner?</h3>
        <p>Mato’s Water was founded by Mr. Randy Fabian and Mrs. Ma. Christina Celestino in the year of 2020. It currently has two branches located in Sta. Maria, Bulacan and Bagumbong, Caloocan. </p>
        <a href="contact.php" class="btn">contact us</a>
    </div>

    <div class="image">
        <img src="images/owner.png" alt="">
    </div>

</div>

</section>

<h1 class="title">Frequently Asked Question</h1>

<section class="about">

    <div class="flex">

        <div class="image">
            <img src="images/shop.png" alt="">
        </div>

        <div class="content">
            <h3>How to order?</h3>
            <p>Go to the shop to browse our products and add to cart items.</p>
            <a href="shop.php" class="btn">shop now</a>
        </div>

    </div>

    <div class="flex">

        <div class="content">
            <h3>How to contact us?</h3>
            <p>Go to the contact page and from there you can send a message to us or you can scroll down any page of the website to find our contact information.</p>
            <a href="contact.php" class="btn">contact us</a>
        </div>

        <div class="image">
            <img src="images/contact.png" alt="">
        </div>

    </div>

    <div class="flex">

        <div class="image">
            <img src="images/update.png" alt="">
        </div>

        <div class="content">
            <h3>How to update profile?</h3>
            <p>Click the icon on the upper right of the screen to update your profile.</p>
            <a href="update_profile.php" class="btn">update profile</a>
        </div>

    </div>

    <div class="flex">

    <div class="content">
        <h3>How to view products in my wishlist?</h3>
        <p>Click the 'heart' icon to view products on your wishlist if you want to order items later.</p>
        <a href="wishlist.php" class="btn">wishlist</a>
    </div>

    <div class="image">
        <img src="images/wishlist.png" alt="">
    </div>
    
    <div class="flex">

        <div class="image">
            <img src="images/search.png" alt="">
        </div>

        <div class="content">
            <h3>How to search products?</h3>
            <p>Click the icon on the upper right of the screen to search products or information you wish to see.</p>
            <a href="search_page.php" class="btn">search</a>
        </div

    </div>
    
    <div class="flex">

    <div class="content">
        <h3>How to view my orders?</h3>
        <p>Click the "Orders" button found on the upper panel of the screen to view your placed orders.</p>
        <a href="orders.php" class="btn">orders</a>
    </div>

    <div class="image">
        <img src="images/orders.png" alt="">
    </div>

</div>

</section>











<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>