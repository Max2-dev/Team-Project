<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In page</title>
</head>
<body class="u_bcolor">
<section id="login-section">
    <div class="container">
      <form class="frm">
        <header class="header">Welcome</header>
        <p>Log in</p>
        <p>Please fill in this form to log in</p>
        
        <label for="username">Username</label>
        <input type="text" placeholder="Enter Username" class="un_input" name="username" required>

        <label for="psw">Password</label>
        <input type="password" placeholder="Enter Password" class="un_input" name="psw" required>
            
        <button type="submit" name="login" id="loginbtn" class="frmbtn">Log in</button>

        <span>Create a new Account? <a href="user_signup.php" class="link"> Sign up</a></span>
        <span id="adm">Click to <a href="#" class="link"> Log in as Admin</a></span>
        
      </form>
    </div>
</section>
</body>
</html>