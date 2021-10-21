<style>
    .header {
        display: flex;
        align-items: center;
        height: 100%;
        padding: 0px;
        justify-content: right;
    }

    .header>div {
        margin: 0px 10px;
    }

    .notificationBadge {
        height: 50%;
        margin: 0px;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .notificationBadge>img {
        height: 30px;
        width: 30px;
    }

    #notificationCount {
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

    #userSection {
        display: flex;
        align-items: center;
        /* border: 1px solid red; */
        padding: 5px 10px;
        box-shadow: 0 0px 2px #5c6e9b;
        border-radius: 12px;
    }

    #userSection:hover {
        cursor: pointer;
    }

    #userSection div {
        margin: 0px 5px;
    }

    #userSection img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    #username {
        font-size: 20px;
        font-weight: 900;
        color: #304068;
        /* height: 100%; */
    }

    #username:hover {
        cursor: pointer;
    }

    /* Dropdown */
    .profile-dropdown {
        display: none;
        justify-content: center;
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

    .profile-dropdown>div {
        padding: 0px 10px;
    }

    .profile-dropdown>hr {
        width: 100%;
        height: 0.5px;
    }

    #logout {
        justify-content: left;
    }

    .topic:hover,
    .log-out:hover {
        color: #5c6e9b;
        background-color: #EAEDF5;
        cursor: pointer;
    }

    .profile-dropdown .menu {
        top: 80px;
        right: -10px;
        padding: 10px 20px;
        background: #FAFBFF;
        width: 200px;
        box-sizing: 0 5px 25px rgba(0, 0, 0, 0.1);
        border-radius: 15px;
        transition: 0.5s;
    }

    .profile-dropdown .menu::before {
        content: '';
        right: 28px;
        width: 20px;
        height: 20px;
        background: red;
        transform: rotate(45deg);
    }

    .profile-dropdown .menu h3 {
        width: 100%;
        text-align: center;
        font-size: 18px;
        padding: 20px 0;
        font-weight: 500;
        color: #304068;
        line-height: 1.2em;
    }

    .profile-dropdown .menu h3 span {
        font-size: 14px;
        color: #5c6e9b;
        font-weight: 400;
    }
    .profile-dropdown .menu ul li {
        list-style: none;
        padding: 15px 0;
        border-top: 1px solid rgba(0, 0, 0, 0.05);
        display: flex;
        align-items: center;
        color: #5c6e9b;
        cursor: pointer;
    }
    .profile-dropdown .menu ul li img {
        max-width: 20px;
        margin-right: 10px;
        opacity: 0.5;
        transform: 0.5s;
    }

    .profile-dropdown .menu ul li:hover img {
        opacity: 1;
    }
</style>

<div class="header">
    <div class="notificationBadge">
        <img src="../Images/Notification.png" alt="" class="notificationBadge" id="notificationIcon">
        <span id="notificationCount" class="notificationBadge">2</span>
    </div>

    <div id="userSection">
        <div id="username">
            <?php
            include('../db/dbConnection.php');
            $userId = $_SESSION['userID'];
            // echo($userId);
            $res = mysqli_query($mysql, "Select CONCAT(userdetails.fName,' ',userdetails.lName) AS name from userdetails where userID=$userId");
            $name = mysqli_fetch_assoc($res)['name'];
            echo $name;
            ?>
        </div>
        <!-- <div> -->
        <img src="../Images/profile.jpg" alt="">
        <!-- </div> -->
    </div>
</div>

<!-- <div class="profile-dropdown" id="profiledropDown">
    <div>Signed in as</div>
    <div>
        
    </div>
    <hr>
    <div id="your-profile">
        Your Profile
    </div>
    <div id="logout">
        Log Out
    </div>
</div> -->
<!-- <div class="profile-dropdown">
    <div class="maintopic">Signed in as</div>
    <div class="signedName">
        
    </div>
    <hr>
    <div id="your-profile" class="topic">
        Your Profile
    </div>
    <div id="logout" class="log-out">
        Log Out
    </div>

</div> -->

<div class="profile-dropdown" id="profiledropdown">
    <div class="menu">
        <h3>Signed in as <br> <span><?php echo $name ?></span></h3>
        <ul>
            <li><img src="../Images/avatar.png" alt="">My Profile</li>
            <li id="logout"><img src="../Images/settings.jpg" alt="">Log Out</li>
        </ul>
    </div>
</div>

<script>
    var userSection = document.getElementById('userSection');
    userSection.addEventListener('click', (e) => {
        if (e.target.parentNode.id == 'userSection') {
            var dd = document.getElementById('profiledropdown');
            var style = window.getComputedStyle(dd, null).getPropertyValue("display");
            if (style == 'none') {
                dd.style.display = 'flex';
            } else {
                dd.style.display = 'none';
            }
        }
    })

    document.getElementById('logout').addEventListener('click', (e) => {
        window.location.replace("../controller/mainController.php?action=logout");
    })

    var icon = document.getElementById("notificationIcon");
    icon.addEventListener("click", e => {
        var notification = document.querySelector(".notificationContainer");
        if (notification.style.display === "none") {
            notification.style.display = "grid";
        } else {
            notification.style.display = "none";
        }
    })
</script>