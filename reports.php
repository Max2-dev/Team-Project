<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}


$update = $conn->prepare("SELECT * FROM `orders`");
$update->execute();

$orders = $update->fetch(PDO::FETCH_ASSOC);

if($orders['payment_status'] = 'pending'){
  $new = $conn->prepare("UPDATE `products` WHERE units = ?");
  
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reports</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="../css/admin_style.css">

</head>


<body>
  <?php include '../components/admin_header.php'; ?>
<section class="add-box">
  <h1 class="heading">Reports</h1>
  <div class="row">
    <div class="stock_levels_column">
        <div class="card">
            <h1>Current Stock Levels for all Products</h1>
            <table style="overflow:scroll">
              <tr>
                <th>ID</th>
                <th>Category id</th>
                <th>Name</th>
                <th>Units</th>
                <th>Stock Level</th>
              </tr>
              
              <tbody>
                <?php 
                
                $query = "SELECT * FROM `products`";
                $stat = $conn->prepare($query);

                $stat->execute();

                $result = $stat->fetchAll();

                if($result){
                  foreach($result as $row){

                    ?>
                    <tr>
                        <td><?= $row['id'] ?> </td>
                        <td><?= $row['Category_id'] ?> </td>
                        <td><?= $row['name'] ?> </td>
                        <td><?= $row['units'] ?> </td>
                        <td><?= $row['stock_level'] ?> </td>
                    </tr>
                    <?php 
                  }

                }
                else {
                  ?>
                  <tr>
                    <td colspan="5">No Products Found</td>
                </tr>
                <?php 
                }
                
                ?>
              </tbody>
            </table>
        </div>
    </div>
</div>
</section>

<section class="card-box">
  <div class="row">
    <div class="column">
      <div class="card">
          <h1>Incoming Orders for all products</h1>
          <table>
            <tr>
              <th>ID</th>
              <th>Supplier</th>
              <th>Destination</th>
              <th>Product request</th>
              <th>Quantity</th>
              <th>Status</th>
            </tr>

            <tbody>
              <?php

              $query = "SELECT * FROM purchasing";
              $stat = $conn->prepare($query);
              $stat->execute();

              $result = $stat->fetchAll();

              if($result){
                foreach($result as $row){
                  ?>

                  <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['supplier']; ?></td>
                    <td><?= $row['destination']; ?></td>
                    <td><?= $row['product_request']; ?></td>
                    <td><?= $row['quantity']; ?></td>
                    <td><?= $row['status']; ?></td>


                  </tr>
                  <?php
                }
              }
              else {
                ?>
                <tr>
                  <td colspan="6"> No Purchasing Order Records Found </td>
                <tr>
              <?php
              }
              ?>
              </tbody>
              <a href="purchase_order.php" id="entry-btn">Enter Order</a>
            </table>
        </div>
      </div>
        
  <div class="column">
      <div class="card">
          <h1>Outgoing Orders for all products</h1>
        <table>
          <tr>
            <th>ID</td>
            <th>User Id</th>
            <th>Address</th>
            <th>Total Price</th>
            <th>Order Date</th>
            <th>Payment Status</th>
          </tr>

          <tbody>
            <?php

            $query = "SELECT * FROM orders";
            $stat = $conn->prepare($query);
            $stat->execute();

            $result = $stat->fetchAll();

            if($result){
              foreach($result as $row){
                if($row['payment_status'] == "completed"){

                }
                ?>
                <tr>
                  <td><?= $row['id']; ?></td>
                  <td><?= $row['user_id']; ?></td>
                  <td><?= $row['address']; ?></td>
                  <td><?= $row['total_price']; ?></td>
                  <td><?= $row['placed_on']; ?></td>
                  <td><?= $row['payment_status']; ?></td>

                </tr>
                <?php
              }
            }
            else {
              ?>
              <tr>
                <td colspan="6"> No Order Records Found</td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
  </div>
</div>
</section>

<script src="../js/admin_script.js"></script>


</body>
</html>