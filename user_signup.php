<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
</head>
<body class="u_bcolor">
<section id="signup-section">
    <div class="container">
      <form id="signup" class="frm">
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

        <button type="submit" class="frmbtn" name="signedup">Sign Up</button>

        <span>Already have an account? <a href="user_login.php" class="link"> Log In</a></span>
      </form>
    </div>
</section>
</body>
</html>