<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}


if(isset($_POST['add_order'])){
    $supplier = $_POST['supplier'];
    $supplier = filter_var($supplier, FILTER_SANITIZE_STRING);

    $destination = $_POST['destination'];
    $destination = filter_var($destination, FILTER_SANITIZE_STRING);

    $product_request = $_POST['product_request'];
    $destination = filter_var($destination, FILTER_SANITIZE_STRING);

    $quantity = $_POST['quantity'];
    $quantity = filter_var($quantity, FILTER_SANITIZE_NUMBER_INT);


    $purchasing = $conn->prepare("SELECT * FROM `purchasing` WHERE supplier = ?");
    $purchasing->execute([$supplier]);

    if($purchasing->rowCount() > 0){
        $message[] = 'Order already exist!';
    } else {
        $enter_order = $conn->prepare("INSERT INTO `purchasing`(supplier, destination, product_request, quantity) VALUES(?,?,?,?)");
        $enter_order->execute([$supplier, $destination, $product_request, $quantity]);

        if($enter_order){
            $update_status = $conn->prepare("UPDATE `purchasing` SET status = 'Ordered' WHERE supplier = ?");
            $update_status->execute([$supplier]);
            $message[] = 'Order Sent, Thank you!';

        } else {
            $message[] = 'An Error Occurred, Please try again';

        }
  
    }

};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incoming Order Entry</title>
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>
    

<?php include '../components/admin_header.php'; ?>

<section class="add-products">
    <h1 class="heading">Purchase Order</h1>
        <form action="" method="post" enctype="multipart/form-data">
      <div class="flex">
         <div class="inputBox">
            <span>Supplier Name (required)</span>
            <input type="text" class="box" required maxlength="100" placeholder="enter supplier name" name="supplier">
         </div>
         <div class="inputBox">
            <span>Destination (required)</span>
            <textarea name="destination" placeholder="enter destination" class="box" required maxlength="500" cols="30" rows="10"></textarea>
         </div>
         <div class="inputBox">
            <span>Product request(required)</span>
            <textarea name="product_request" placeholder="enter product request" class="box" required maxlength="500" cols="30" rows="10"></textarea>
         </div>
         <div class="inputBox">
            <span>Quantity</span>
            <input type="number" min="0" class="box" required max ="9999999999" placeholder="Enter quantity" onkeypress="if(this.value.length == 10) return false;" name="quantity">
         </div>
      </div>
      <input type="submit" value="Add Order" class="btn" name="add_order">
   </form>
</section>
    

<script src="../js/admin_script.js"></script>

</body>
</html>