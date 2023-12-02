<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
</head>
<body>
<section>
    <div>
      <form>
        <header>Welcome to T32 Games</header>
        <p>Sign Up</p>
        <p>Please fill in this form to sign up</p>

        <label for="email">Email Address</label>
        <input type="email" name="email" placeholder="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" required>

        <label for="username">Username</label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="psw">Password</label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <label for="cfmpsw">Confirm Password</label>
        <input type="password" placeholder="Confirm Password" name="cfmpsw" required>

        <button type="submit" name="signedup">Sign Up</button>

        <span>Already have an account? <a href="user_login.php"> Log In</a></span>
      </form>
    </div>
</section>
</body>
</html>