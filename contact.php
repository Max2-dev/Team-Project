<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $msg = $_POST['msg'];
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);

   $select_message = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $select_message->execute([$name, $email, $number, $msg]);

   if($select_message->rowCount() > 0){
      $message[] = 'already sent message!';
   }else{

      $insert_message = $conn->prepare("INSERT INTO `messages`(user_id, name, email, number, message) VALUES(?,?,?,?,?)");
      $insert_message->execute([$user_id, $name, $email, $number, $msg]);

      $message[] = 'sent message successfully!';

   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!--  css file link  -->
   <link rel="stylesheet" href="css/formstyle.css">
</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="contact">

   <form action="" method="post">
      <h3>Contact Form</h3>

      <label for="name"><h4>Name</h4></label>
      <input type="text" name="name" placeholder="Please enter your name" required maxlength="20" class="box">
      <small class="error"></small>

      <label for="e-mail"><h4>E-mail</h4></label>
      <input type="email" name="email" placeholder="Please enter your e-mail address" required maxlength="50" class="box">
      <small class="error"></small>

      <label for="number"><h4>Number</h4></label>
      <input type="number" name="number" min="0" max="9999999999" placeholder="Please enter your telephone number" required onkeypress="if(this.value.length == 10) return false;" class="box">
      <small class="error"></small>

      <label for="enquiry"><h4>Message/Enquiry</h4></label>
      <textarea name="msg" class="box" placeholder="Enter your message/enquiry here" cols="30" rows="10"></textarea>
      <small class="error"></small>

      <input type="submit" value="submit" name="send" class="btn">

   </form>

</section>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>