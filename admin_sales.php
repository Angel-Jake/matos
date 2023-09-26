<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_sales.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

   <style>
table {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 1.3rem;
  border-collapse: collapse;
   display: flex;
   align-items: center;
   justify-content: center;
   margin-left: 50px;
   margin-right: 50px;
}

table td, table th {
  border: 2px solid #ddd;
  padding: 8px;
  background-color: var(--white);
}

table tr:nth-child(even){background-color: var(--white);}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: var(--light-blue);
  color: white;
}
   </style>

</head>
<body>
   
<?php @include 'admin_header.php'; ?>

<h1 class="title">
    sales history</h1>

<table>
<tr>
<th>Id:</th>
<th>Username:</th>
<th>Number:</th>
<th>Email:</th>
<th>Method:</th>
<th>Address:</th>
<th>Gcash:</th>
<th>Products:</th>
<th>Price:</th>
<th>Date:</th>
<th>Status:</th>
</tr>
<?php
$conn = new mysqli($servername,$username,$password,$dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT user_id, name, number, email, method, address, gcash, total_products, total_price, placed_on, payment_status FROM orders";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["user_id"]. "</td><td>" . $row["name"] . "</td><td>"
. $row["number"]. "</td><td>"
. $row["email"]. "</td><td>"
. $row["method"]. "</td><td>"
. $row["address"]. "</td><td>"
. $row["gcash"]. "</td><td>"
. $row["total_products"]. "</td><td>"
. $row["total_price"]. "</td><td>"
. $row["placed_on"]. "</td><td>"
. $row["payment_status"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>







<script src="js/admin_script.js"></script>

</body>
</html>