<?php

$units = $_POST['units'];
$units = filter_var($units, FILTER_SANITIZE_NUMBER_INT);



if($update_product){
    if($units > 0){
        $fetch_stock_level = $conn->prepare("UPDATE `products` SET stock_level = 'Available' WHERE units = ?");
        $fetch_stock_level->execute([$units]);
    } else {
        $fetch_stock_level = $conn->prepare("UPDATE `products` SET stock_level = 'Unavailable' WHERE units = ?");
        $fetch_stock_level->execute([$units]);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <span>Update Units</span>
    <input type="number" min="0" class="box" required max ="9999999999" placeholder="Enter units" onkeypress="if(this.value.length == 10) return false;" name="units">
</body>
</html>