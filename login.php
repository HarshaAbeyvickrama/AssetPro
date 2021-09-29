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
        font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
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
      .txt_field input:focus ~ label,
      .txt_field input:valid ~ label {
        top: -5px;
        color: #ffffff;
      }
      .txt_field input:focus ~ span::before,
      .txt_field input:valid ~ span::before {
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
    </style>
  </head>
  <body>
    <div class="center">
      <div class="logo">
          <img src="./Images/AssetProLogo.png" alt="AssetPro Logo">
      </div>
      <form id="loginForm" action = "#">
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
        <input type="submit" value="Login" id="btnLogin"/>
      </form>
    </div>
  </body>
</html>
<script>
  document.getElementById("forgotPass").addEventListener("click",function(){
    alert("Relax and try to remember your password 😊😊")
  })

  const form = document.getElementById('loginForm');
  form.addEventListener('submit',(e)=>{
    e.preventDefault();
    var login = new FormData(form);
    
    const xhr = new XMLHttpRequest();
    xhr.open('POST','./controller/mainController.php?action=login',true);
    xhr.onload = function(){
      const res = JSON.parse(this.responseText);
      if(res.status != "ok"){
        alert("Wrong userame/password combination!!!!!")
      }else{
        // console.log(`http://localhost/assetpro/${res.location}`);
        window.location.replace(res.location);
      }
    }
    xhr.send(login);
  })

</script>
