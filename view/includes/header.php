<style>
    .header{
        display: grid;
        grid-template-columns: 7fr 0.5fr 2fr 0.5fr ;
        height: 12vh;
        
    }
    .header >div{
        border: 0px solid green;
    }
    #notificationIcon > img{
        height: 30px;
        width: 30px;
    }
    #notificationIcon{
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #notificationIcon:hover{
        cursor: pointer;
    }
    #notificationCount{
        position: absolute;
        top: 15px;
        right: 10px;
        background-color: red;
        border-radius: 50%;
        color: white;
        width: 20px;
        height: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 11px;
        font-weight: bold;
    }
    #userSection{
        display: grid;
        grid-template-columns: 7fr 3fr;
    }
    #userSection > div{
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: right;
        width: 100%;
    }
    #userSection img{
        width: 75px;
        height: 75px;
        border-radius: 50%;
    }
    #username{
        font-size: 20px;
    }
    
</style>

<div class="header">
    <div>
        
    </div>
    <div id="notificationIcon" class="notificationBadge">
        <img src="../Images/Notification.png" alt="" class="notificationBadge">
        <span id="notificationCount" class="notificationBadge">2</span>
    </div>
    <div id="userSection">
        <!-- <div id="username">Rocell Bathware</div> -->
        <div id="username">
            <?php
                $loggedInUserType = $_SESSION['userType'];
                echo $loggedInUserType;
            ?>
        </div>
        <div>
            <img src="../Images/profile.jpg" alt="">
        </div>
    </div>
    <div></div>
</div>
<?php
    include_once("notification.php")
?>



<script>
    var icon = document.getElementById("notificationIcon");
    icon.addEventListener("click",e =>{
        var notification = document.querySelector(".notificationContainer");
        if(notification.style.display ==="none"){
            notification.style.display = "grid";
        }else{
            notification.style.display= "none";
        }
    })

    //Checking for notifications

    window.onload = function(){
    //    checkNewNotifications();
    }
   

    function checkNewNotifications() {
        setInterval(getCount, 2000);
    }
    var cows =1;
    function getCount() {
        var xhr = new XMLHttpRequest();

        xhr.open("GET","../controller/mainController.php?action=newNotifCount",true);

        xhr.onload = function(){
            if(this.status === 200){
                console.log("හරකා Number "+cows+" 🐮🐮")
                cows++;
            }else{
                
            }
        }
        xhr.send();
    }


    //hide notification panel when clicked outside 
    document.addEventListener('click',function(e){
        notificationWindow = document.querySelector('.notificationContainer');
        if(e.target.classList[0] !== 'notificationBadge' && window.getComputedStyle(notificationWindow).display !== "none"){
            notificationWindow.style.display = 'none';
            
        }
    })
</script>