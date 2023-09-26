<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:index.php');
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_search_page.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>search page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php @include 'admin_header.php'; ?>

   <h1 class="title">search orders</h1>

<section class="search-form">
    <form action="" method="POST">
        <input type="text" class="box" placeholder="search orders name..." name="search_box">
        <input type="submit" class="btn" value="search" name="search_btn">
    </form>
</section>

<section class="orders" style="padding-top: 0;">

   <div class="box-container">

      <?php
        if(isset($_POST['search_btn'])){
         $search_box = mysqli_real_escape_string($conn, $_POST['search_box']);
         $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE name LIKE '%{$search_box}%'") or die('query failed');
         if(mysqli_num_rows($select_orders) > 0){
            while($fetch_orders = mysqli_fetch_assoc($select_orders)){
      ?>
      <div class="box">
         <p> user id : <span><?php echo $fetch_orders['user_id']; ?></span> </p>
         <p> placed on : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
         <p> name : <span><?php echo $fetch_orders['name']; ?></span> </p>
         <p> number : <span><?php echo $fetch_orders['number']; ?></span> </p>
         <p> email : <span><?php echo $fetch_orders['email']; ?></span> </p>
         <p> address : <span><?php echo $fetch_orders['address']; ?></span> </p>
         <p> total products : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
         <p> total price : <span>₱<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
         <p> payment method : <span><?php echo $fetch_orders['method']; ?></span> </p>
         <p> gcash reference no. : <span><?php echo $fetch_orders['gcash']; ?></span> </p></div>
      </form>
      <?php
         }
            }else{
                echo '<p class="empty">no result found!</p>';
            }
        }else{
            echo '<p class="empty">search something!</p>';
        }
      ?>

   </div>

</section>


<script src="js/script.js"></script>

</body>
</html>