<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In page</title>
</head>
<body>

<section>
    <div>
      <form>
        <header>Welcome</header>
        <p>Log in</p>
        <p>Please fill in this form to log in</p>
        
        <label for="username">Username</label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="psw">Password</label>
        <input type="password" placeholder="Enter Password" name="psw" required>
            
        <button type="submit" name="login">Log in</button>

        <span>Create a new Account? <a href="user_signup.php"> Sign up</a></span>
        <span>Click to <a href="#"> Log in as Admin</a></span>
        
      </form>
    </div>
</section>
</body>
</html>