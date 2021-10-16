<?php

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <title>AssetPro</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
    }

    body {
      margin: 0;
      padding: 0;
      background-image: url(./Images/loginBackground.png);
      background-position: -45vh;
      background-size: cover;
      height: 100vh;
      overflow: hidden;
    }

    .center {
      position: absolute;
      top: 50%;
      left: 79.7%;
      transform: translate(-50%, -50%);
      width: 83vh;
      height: 100vh;
      background: rgba(207, 207, 207, 0.1);
      backdrop-filter: blur(10px);
      color: whitesmoke;
      box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.05);
    }

    .center img {
      margin-top: 8vh;
      margin-bottom: 2vh;
      width: 250px;
      height: 262px;
    }

    .logo {
      text-align: center;
    }

    .center form {
      padding: 0 40px;
      box-sizing: border-box;
    }

    form .txt_field {
      position: relative;
      border-bottom: 2px solid #bad2ff;
      margin: 30px 0;
    }

    .txt_field input {
      width: 100%;
      padding: 0 5px;
      height: 40px;
      font-size: 16px;
      border: none;
      color: aliceblue;
      background: none;
      outline: none;
    }

    .txt_field label {
      position: absolute;
      top: 50%;
      left: 5px;
      color: #bad2ff;
      transform: translateY(-50%);
      font-size: 20px;
      pointer-events: none;
      transition: 0.5s;
    }

    .txt_field span::before {
      content: "";
      position: absolute;
      top: 40px;
      left: 0;
      width: 0%;
      height: 2px;
      background: #ffffff;
      transition: 0.5s;
    }

    .txt_field input:focus~label,
    .txt_field input:valid~label {
      top: -5px;
      color: #ffffff;
    }

    .txt_field input:focus~span::before,
    .txt_field input:valid~span::before {
      width: 100%;
    }

    .pass {
      margin: -5px 0 20px 5px;
      color: white;
      cursor: pointer;
    }

    .pass:hover {
      text-decoration: underline;
    }

    input[type="submit"] {
      width: 40%;
      height: 50px;
      border: none;
      background: white;
      border-radius: 25px;
      font-size: 18px;
      color: black;
      font-weight: 700;
      cursor: pointer;
      outline: none;
      margin-left: 23vh;
    }

    input[type="submit"]:hover {
      background: #687baa;
      color: white;
      transition: 0.5s;
    }

    /* CSS for the forgot password popup form */
    .bg-popup {
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.8);
      position: absolute;
      top: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      display: none;
      z-index: 10;
      left: 0px;
    }

    .popup-content {
      width: 360px;
      height: 450px;
      margin: 8% auto;
      background-color: white;
      border-radius: 20px;
      /* text-align: center; */
      padding: 20px;
      position: relative;
      text-align: center;
      padding: 20px;
      overflow: hidden;
    }
    .popup-content form {
      width: 280px;
      position: absolute;
      top: 100px;
      left: 40px;
      transition: 0.5s;
    }

    .forgotPasswordInfo {
      color: #687baa;
      font-size: 30px;
      padding-bottom: 10px;
    }

    .emailText {
      color: #687baa;
      font-weight: lighter;
    }

    img {
      width: 100px;
      height: 100px;
    }

    .email {
      width: 100%;
      display: block;
      margin: 25px auto;
      padding: 10px 5px;
      border: 0;
      border-bottom: 1px solid #687baa;
      outline: none;
    }

    ::placeholder {
      color: #BAC2D6;
      text-align: center;
    }

    .btn-box {
      width: 100%;
      margin: 30px auto;
      text-align: center;
    }

    form button {
      width: 110px;
      height: 35px;
      margin: 0 10px;
      background: linear-gradient(to right, #394564, #7A90C9);
      border-radius: 30px;
      border: 0;
      outline: none;
      color: #EAEDF5;
      cursor: pointer;
    }

    .close {
      position: absolute;
      top: 0;
      right: 14px;
      font-size: 42px;
      transform: rotate(45deg);
      cursor: pointer;
    }

    #Form2 {
      left: 450px;
    }

    #Form3 {
      left: 450px;
    }
    .step-row {
      width: 360px;
      height: 40px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      box-shadow: 0 -1px 5px -1px #bad2ff;
      position: relative;
      left: 0;
    }
    .step-col {
      width: 120px;
      text-align: center;
      color: red;
    }
    #progress {
      position: absolute;
      height: 100%;
      /* kalin thibbe 120 */
      width: 180px; 
      background: linear-gradient(to right, #394564, #7A90C9);
      transition: 1s;
    }
    #progress::after {
      content: '';
      height: 0;
      width: 0;
      border-top: 20px solid transparent;
      border-bottom: 20px solid transparent;
      position: absolute;
      right: -20px;
      top: 0;
      border-left: 20px solid #7A90C9;
    }
  </style>
</head>

<body>
  <div class="center">
    <div class="logo">
      <img src="./Images/AssetProLogo.png" alt="AssetPro Logo">
    </div>
    <form id="loginForm" action="#">
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
      <div class="pass" id="forgotPass">Forgot Password?</div>
      <input type="submit" value="Login" id="btnLogin" />
    </form>
  </div>

  <!-- Forgot Password popup form -->
  <div class="bg-popup" id="closeForm">
    <div class="popup-content" id="popup-content">
      <div class="close" id="cancelforgotPassword">+</div>

      <!-- Form for the first tab (entering the email address) -->
      <form action="" id="Form1">
        <h3 class="forgotPasswordInfo">Forgot Password</h3>
        <img src="./Images/forgotpass.png" alt="forgot password">
        <h4 class="emailText">Enter your email address below</h4>
        <input type="text" placeholder="E-Mail" class="email" name="password_rest_link" autocomplete="off" required>
        <div class="btn-box">
          <!-- <button type="button" id="closeForm">Cancel</button> -->
          <button type="button" id="Next1">Send Link</button>
        </div>
      </form>

      <!-- Form for the second tab (email sent message) -->
      <form action="" id="Form2">
      <img src="./Images/otp.png" alt="forgot password" style="width: 130px;">
        <h4 class="emailText">Check you E-Mails</h4>
        <!-- <input type="text" placeholder="otp" class="email"> -->
        <div class="btn-box">
          <button type="button">Ok</button>
          <button type="button" id="Back1">Back</button>
        </div>
      </form>

      <!-- Entring and confirming the new password -->
      <form action="#" id="Form3">
      <img src="./Images/newpass.png" alt="forgot password" style="width: 110px;">
        <h4 class="emailText">Enter new password</h4>
        <input type="text" placeholder="New Password" class="email" required>
        <input type="text" placeholder="Confirm Password" class="email" required>
        <div class="btn-box">
          <button type="button" id="Back2">Back</button>
          <button type="button">Submit</button>
        </div>
      </form>

      <div class="step-row">
        <div id="progress"></div>
        <div class="step-col"><small>Step 1</small></div>
        <div class="step-col"><small>Step 2</small></div>
        <!-- <div class="step-col"><small>Step 3</small></div> -->
      </div>

    </div>
  </div>

<script>
  var Form1 = document.getElementById('Form1');
  var Form2 = document.getElementById('Form2');
  // var Form3 = document.getElementById('Form3');

  var Next1 = document.getElementById('Next1');
  // var Next2 = document.getElementById('Next2');
  var Back1 = document.getElementById('Back1');
  // var Back2 = document.getElementById('Back2');

  var progress = document.getElementById('progress');

  Next1.onclick = function() {
    Form1.style.left = "-450px";
    Form2.style.left = "40px";
    progress.style.width = "360px";
  }
  Back1.onclick = function() {
    Form1.style.left = "40px";
    Form2.style.left = "450px";
    progress.style.width = "180px";
  }
  // Next2.onclick = function() {
  //   Form2.style.left = "-450px";
  //   Form3.style.left = "40px";
  //   progress.style.width = "360px";
  // }
  // Back2.onclick = function() {
  //   Form2.style.left = "40px";
  //   Form3.style.left = "450px";
  //   progress.style.width = "240px";
  // }


</script>

</body>

</html>
<script>
  //JS for pop-up form after clicking the forgot password
  document.getElementById('forgotPass').addEventListener('click',
    function popForm() {
      document.querySelector('.bg-popup').style.display = 'flex';
    });

  // function popForm() {
  //     document.getElementById('bg-popup').style.display = 'flex';
  // }

  //Closing the form
  document.querySelector('.close').addEventListener('click',
    function popForm() {
      document.querySelector('.bg-popup').style.display = 'none';
    });

  const form = document.getElementById('loginForm');
  form.addEventListener('submit', (e) => {
    e.preventDefault();
    var login = new FormData(form);

    const xhr = new XMLHttpRequest();
    xhr.open('POST', './controller/mainController.php?action=login', true);
    xhr.onload = function() {
      const res = JSON.parse(this.responseText);
      if (res.status != "ok") {
        alert("Wrong userame/password combination!!!!!")
      } else {
        // console.log(`http://localhost/assetpro/${res.location}`);
        window.location.replace(res.location);
      }
    }
    xhr.send(login);
  })

</script>