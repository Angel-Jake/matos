<?php

include 'config.php';

if(isset($_POST['submit'])){

   $filter_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $name = mysqli_real_escape_string($conn, $filter_name);
   $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
   $email = mysqli_real_escape_string($conn, $filter_email);
   $filter_pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
   $pass = mysqli_real_escape_string($conn, md5($filter_pass));
   $filter_cpass = filter_var($_POST['cpass'], FILTER_SANITIZE_STRING);
   $cpass = mysqli_real_escape_string($conn, md5($filter_cpass));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:login.php');
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
   <title>data privacy</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>
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
?>
   
<section class="data">

       <div class="text">
      <h3>  Data Privacy Statement </h3>
<p>Terms and Conditions: </p>


<p>1.	We shall collect, process and store your personal data and information, like your name, address, cellphone/telephone  number, email address, username  and password, only in the course of or incidental to the conduct of our business with you.  We shall comply with the terms and provisions of Data Privacy Act and applicable rules and regulations in the processing and collection of your personal data.
</p>

<p>2.	By using our website, registering, availing of any our services or products or clicking any button indicating your acceptance of the Terms and Conditions of the Data Privacy Statement, you expressly consent to the collection, use, disclosure and processing of your personal data in the manner described in the Privacy Statement.
</p>

<p>3.	We shall not share, disclose, or transfer any of the disclosed personal data to any third party  for any purpose other than what is stated herein, unless required to be disclosed by Data Privacy Act. 
</p>

<p>4.	We shall use appropriate safeguards to protect the disclosed personal data from loss, usage, access, disclosure, alteration, or destruction, whether unauthorized or accidental. In case of breach of data privacy, we shall inform you about the security incident and shall employ best efforts in the mitigation and remediation of the incident.
</p>

<p>5.	For any concerns on these terms or your disclosed personal data , you may contact us at cellphone number 09171800155.
</p>

    <div class="more-btn">
        <a href="home.php" class="option-btn">send us message</a>
    </div>
    
</div>
    
</section>




</body>
</html>