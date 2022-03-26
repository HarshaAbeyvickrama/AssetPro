<style>
    .header {
        display: flex;
        align-items: center;
        /* height: 100%; */
        padding: 5px 0px;
        justify-content: right;
        background-color: #F1F4FF;
        /* border: 1px solid red; */
    }

    .header > div {
        margin: 0px 10px;
    }

    .notificationBadge {
        height: 40%;
        margin: 0px;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .notificationBadge > img {
        height: 25px;
        width: 25px;
    }

    #notificationCount {
        position: absolute;
        top: -5px;
        right: -5px;
        background-color: red;
        border-radius: 50%;
        color: white;
        width: 15px;
        height: 15px;
        /* display: flex;
        justify-content: center;
        align-items: center; */
        font-size: 11px;
        font-weight: bold;
    }

    #userSection {
        display: flex;
        position: relative;
        align-items: center;
        /* border: 1px solid red; */
        padding: 5px 10px;
        /* box-shadow: 0 0px 2px #5c6e9b; */
        /* border-radius: 12px; */
    }

    #userSection:hover {
        cursor: pointer;
    }

    #userSection div {
        margin: 0px 5px;
    }

    #userSection img {
        width: 35px;
        height: 35px;
        border-radius: 50%;
    }

    #username {
        font-size: 15px;
        font-weight: 900;
        color: #304068;
        /* height: 100%; */
    }

    #userSectionMask {
        background-color: transparent;
        width: 220px !important;
        height: 45px;
        position: absolute;
        z-index: 10;
        color: transparent;
        right: 0;
    }

    #userSectionMask:hover {
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

    .profile-dropdown > div {
        padding: 0px 10px;
    }

    .profile-dropdown > hr {
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
        /*box-sizing: 0 5px 25px rgba(0, 0, 0, 0.1);*/
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
        <img src="../Images/Notifications.png" alt="" class="notificationBadge" id="notificationIcon">
        <span id="notificationCount" class="notificationBadge">2</span>
    </div>

    <div id="userSection">
        <img src="../Images/profile.jpg" alt="">
        <div id="username">
            <?php
            echo $_SESSION['name'];
            ?>
        </div>
        <div id="userSectionMask">

        </div>
    </div>
</div>
<?php
include_once("notification.php")
?>

<div class="profile-dropdown" id="profiledropdown">
    <div class="menu">
        <h3>Signed in as <br> <span><?php echo $_SESSION['name'] ?></span></h3>
        <ul>
            <li id="my-profile"><img src="../Images/avatar.png" alt="">My Profile</li>
            <li id="logout"><img src="../Images/settings.png" alt="">Log Out</li>
        </ul>
    </div>
</div>

<script>
    const userSectionMask = document.getElementById('userSectionMask');
    const dd = document.getElementById('profiledropdown');
    userSectionMask.addEventListener('click', () => {
        showUserSection();
    });

    function showUserSection() {
        const style = window.getComputedStyle(dd, null).display;
        if (style === 'none') {
            dd.style.display = 'block';
        } else {
            dd.style.display = 'none';
        }
    }

    const icon = document.getElementById("notificationIcon");
    icon.addEventListener("click", e => {
        showNotification();
    })


    document.getElementById('logout').addEventListener('click', (e) => {
        window.location.replace("http://localhost/assetpro/logout");
    })

    //Catch the click outside the profile dropdown
    document.addEventListener('click', (e) => {
        if (e.target.id !== 'userSectionMask') {
            const style = window.getComputedStyle(dd, null).display;
            if (style === 'block') {
                dd.style.display = 'none';
            }
        }

        if (e.target.id === 'my-profile') {
            loadSection("centerSection", 'profile');
        }
    })


</script>