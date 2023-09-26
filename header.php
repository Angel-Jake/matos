<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

if(!empty($update_image)){
    if($update_image_size > 2000000){
       $message[] = 'image is too large';
    }else{
       $image_update_query = mysqli_query($conn, "UPDATE `users` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
       if($image_update_query){
          move_uploaded_file($update_image_tmp_name, $update_image_folder);
       }
       $message[] = 'image updated succssfully!';
    }
 }

?>

<header class="header">

    <div class="flex">

        <a href="home.php" class="logo">💦 Matos Water</a>

        <nav class="navbar">
            <ul>
                <li><a href="home.php"> home</a></li>
                <li><a href="#"> pages ▼</a>
                    <ul>
                        <li><a href="about.php"> about</a></li>
                        <li><a href="contact.php"> contact</a></li>
                        <li><a href="data_privacy.php"> data privacy</a></li>
                    </ul>
                </li>
                <li><a href="shop.php"> shop</a></li>
                <li><a href="orders.php"> orders</a></li>
                <li><a href="#"> account ▼</a>
                    <ul>
                        <li><a href="index.php"> login</a></li>
                        <li><a href="register.php"> register</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <?php
                $select_wishlist_count = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id = '$user_id'") or die('query failed');
                $wishlist_num_rows = mysqli_num_rows($select_wishlist_count);
            ?>
            <a href="wishlist.php"><i class="fas fa-heart"></i><span>(<?php echo $wishlist_num_rows; ?>)</span></a>
            <?php
                $select_cart_count = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                $cart_num_rows = mysqli_num_rows($select_cart_count);
            ?>
            <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?php echo $cart_num_rows; ?>)</span></a>
        </div>

        <div class="account-box">
        <?php
         $select = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);}
        ?>

        <?php
            if($fetch['image'] == ''){
               echo '<img src="images/default-avatar.png">';
            }else{
               echo '<img src="uploaded_img/'.$fetch['image'].'">';
            }
            if(isset($message)){
               foreach($message as $message){
                  echo '<div class="message">'.$message.'</div>';
               }
            }
         ?>
            <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="update_profile.php" class="btn">update profile</a>
            <a href="logout.php" class="delete-btn">logout</a>
        </div>

    </div>

</header>