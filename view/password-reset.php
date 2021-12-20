<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
    <title>Forgot Password</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            background-image: url(../Images/loginBackground.png);
            background-position: center;
            background-size: cover;
            height: 100vh;
            overflow: hidden;
        }

        .bg-popup {
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            position: absolute;
            top: 0;
            display: flex;
            justify-content: center;
            align-items: center;
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
            text-align: center;
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
        .successAlert {
            z-index: 100;
            position: absolute;
            color: white;
            text-align: center;
            width: 100%;
        }
    </style>
</head>

<body>
    <!-- PLace to show the success message -->
    <?php
        if(isset($_SESSION['status'])) {
            ?>
            <div class="successAlert">
                <h5><?= $_SESSION['status']; ?></h5>
            </div>
            <?php
                unset($_SESSION['status']);
        }
    ?>

    <div class="bg-popup" id="closeForm">
        <div class="popup-content" id="popup-content">

            <!-- Form for entering the email address -->
            <form action="../controller/passwordResetController.php" method="POST">
                <input type="hidden" name="email" value="send">
                <h3 class="forgotPasswordInfo">Forgot Password</h3>
                <img src="../Images/forgotpass.png" alt="forgot password">
                <h4 class="emailText">Enter your email address below</h4>
                <input type="text" placeholder="E-Mail" class="email" name="email" autocomplete="off" required>
                <div class="btn-box">
                    <a href="login.php"><button type="button">Back</button></a>
                    <button type="submit" name="submit">Send Link</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
