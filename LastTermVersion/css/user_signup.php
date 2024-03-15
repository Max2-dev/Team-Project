<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="u_bcolor">
<section id="signup-section">
    <div class="container">
      <form id="signup" class="frm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <header class="header">Welcome to T32 Games</header>
        <p>Sign Up</p>
        <p>Please fill in this form to sign up</p>

        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" class="un_input" placeholder="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" required>

        <label for="username">Username</label>
        <input type="text" placeholder="Enter Username" class="un_input" name="username" required>

        <label for="psw">Password</label>
        <input type="password" placeholder="Enter Password" class="un_input" name="psw" required>

        <label for="cfmpsw">Confirm Password</label>
        <input type="password" placeholder="Confirm Password" class="un_input" name="cfmpsw" required>

        <button type="submit" class="frmbtn" id="signupbtn" name="signedup" onclick="checkPassword()">Sign Up</button>

        <span>Already have an account? <a href="user_login.php" class="link"> Log In</a></span>
      </form>
    </div>
</section>
</body>
</html>
<script>
let form = document.getElementById("signup");
let first_pass = form.psw;
let confirm_pass = form.cfmpsw;


first_pass.onsubmit = checkPassword();
confirm_pass.onsubmit = checkPassword();

// Function to check that users 2 passwords match on the form
function checkPassword(){
    let form = document.getElementById("signup");

    let first_pass = form.psw;
    let confirm_pass = form.cfmpsw;
    let errors = '';
    
    if(first_pass.value === confirm_pass.value) {
        first_pass.setCustomValidity('');
    } else {
        errors += "Passwords Must Match";
    }
    
    first_pass.setCustomValidity(errors);
    first_pass.reportValidity();
}
</script>
<?php
// If the button is pressed 'signedup' HTML tag
if(isset($_POST['signedup'])){
  require_once('connectdb.php');
  echo 'You are now in the database';

  if(isset($_POST['email'],$_POST['username'],$_POST['psw'])){

    // Sanitize the input fields with and hash the password
    $email = filter_input(INPUT_POST,$_POST['email'],FILTER_SANITIZE_EMAIL);
    $username = filter_input(INPUT_POST,$_POST['username'],FILTER_SANITIZE_STRING);
    $password = password_hash($_POST['psw'],PASSWORD_DEFAULT);

    
  try {
    // Store the post input fields from the form in a variable
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['psw'],PASSWORD_DEFAULT);

    // Checks the database's username field 
    $stat = $db->prepare("SELECT username FROM customer WHERE username = :username");
    $stat->bindParam(':username',$username, PDO::PARAM_STR, 50);

    $stat->execute();

    if($stat->rowCount()> 0 ){
      $row = $stat->fetch();

      // If the username is already taken in the database, it displays an error
      if($username === $row['username']){
        echo "<div>
        <p style='text-align:center;color:red'><strong>Error! </strong>Username already exists, try again</p>
        </div>";
        exit();
      }
    }
    // Inserts new data into the database 
    $stat = $db->prepare("INSERT INTO customer VALUES(default,:email,:username,:password,default)");
    $stat->bindParam(':email', $email, PDO::PARAM_STR, 50);
    $stat->bindParam(':username', $username, PDO::PARAM_STR, 50);
    $stat->bindParam(':password', $password, 256);
    $stat->execute();


    session_start();
    $_SESSION["signup_username"] = $username; //Store sessio data
    header("Location:products.php"); // After all that that newly registered user is taken to the products page. 

    exit();

  } catch(PDOexception $error) {
    echo "Sorry, a database error occurred! <br>";
    echo "Error details: <em>". $error->getMessage()."</em>";
  }

    echo "<br>all input fields are stored</br>";

  } else {
    exit("Submitted form is incomplete, Please enter your details again!");
  }
}  
?>