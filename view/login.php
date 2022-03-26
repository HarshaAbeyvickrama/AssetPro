<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <title>AssetPro</title>
<!--  <link rel="stylesheet" href="style.css" />-->
  <link rel="stylesheet" href="../css/login.css">
  <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
</head>

<body>
  <div class="center">


    <div class="logo">
      <img src="../Images/AssetProLogo.png" alt="AssetPro Logo">
    </div>
    <form id="loginForm" method="POST" action="../controller/userController.php">
      <input type="hidden" name="type" value="login">
      <div class="txt_field">
        <input type="text" name="Username" autocomplete="off" required />
        <span></span>
        <label>Username</label>
      </div>
      <div class="txt_field">
        <input type="password" name="Password" required />
        <span></span>
        <label>Password</label>
      </div>
      <button type="submit" value="Login" id="btnLogin" name="submit">Login</button>
      <br>
      <a href="password-reset.php" class="pass" id="forgotPass">Forgot Password?</a>

    </form>
  </div>

</body>

</html>
