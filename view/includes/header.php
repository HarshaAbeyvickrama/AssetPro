<style>
    .header{
        display: flex;
        align-items: center;
        height: 100%;
        padding: 0px;
        justify-content: right;
    }
    .header > div{
        margin: 0px 10px;
    }
    .notificationBadge{
        height: 50%;
        margin: 0px;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .notificationBadge > img{
        height: 30px;
        width: 30px;
    }
    #notificationCount{
        position: absolute;
        top: -5px;
        right: -5px;
        background-color: red;
        border-radius: 50%;
        color: white;
        width: 20px;
        height: 20px;
        /* display: flex;
        justify-content: center;
        align-items: center; */
        font-size: 11px;
        font-weight: bold;
    }
    #userSection{
        display: flex;
        align-items: center;
        /* border: 1px solid red; */
        padding: 5px 10px;
        box-shadow: 0 0px 2px #5c6e9b;
        border-radius: 12px;
    }
    #userSection:hover{
        cursor: pointer;
    }
    #userSection div{
        margin: 0px 5px;
    }
    #userSection img{
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }
    #username{
        font-size: 20px;
        font-weight: 900;
        color: #304068;
        /* height: 100%; */
    }
    #username:hover{
        cursor: pointer;
    }

    /* Dropdown */
    .profile-dropdown{
        position: absolute;
        width: 250px;
        border-radius: 12px;
        /* border: 1px solid red; */
        padding: 15px 0px;
        right: 0;
        margin: 0px 10px;
        background-color: white;
        box-shadow: 0 0px 2px #5c6e9b;
        z-index: 10;
    }
    .profile-dropdown > div{
        padding: 0px 10px;
    }
    .profile-dropdown > hr{
        width: 100%;
        height: 0.5px;
    }
    #logout{
       justify-content: left;
    }
</style>
<div class="header">
    <div class="notificationBadge">
        <img src="../Images/Notification.png" alt="" class="notificationBadge">
        <span id="notificationCount" class="notificationBadge">2</span>
    </div>

    <div id="userSection">
        <div id="username">
            <?php
                include('../db/dbConnection.php');
                $userId = $_SESSION['userID'];
                // echo($userId);
                $res = mysqli_query($mysql,"Select CONCAT(userdetails.fName,' ',userdetails.lName) AS name from userdetails where userID=$userId");
                $name = mysqli_fetch_assoc($res)['name'];
                echo $name;
            ?>
        </div>
        <div>
            <img src="../Images/profile.jpg" alt="">
        </div>
    </div>
</div>
<div class="profile-dropdown">
    <div>Signed in as</div>
    <div>
        <?php
            echo $name;
        ?>
    </div>
    <hr>
    <div id="your-profile">
        Your Profile
    </div>
    <div id="logout">
        Log Out
    </div>
</div>