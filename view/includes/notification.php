<style>
    .notificationContainer{
        
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        background-color: #D0D5E1;
        width: 20vw;
        height: 60vh;
        display: grid;
        grid-template-rows:0.5fr 9.5fr;
        color: #304068;
        padding: 12px;
        border-radius: 10px;
        z-index: 100;
        position: absolute;
        left: 72%;
        /* justify-content: center; */
        
    }
   
    .notificationTitle{
        font-weight: bold;
        font-size: 20px;
        align-items: center;
        padding-top: 5px;
        padding-bottom: 5px;
    }
    .notificationSection{
        display: grid;
        grid-template-rows: 1.5fr 8.5fr;
    }
  
    .notificationSub{
        display: grid;
        grid-template-columns: 1fr 1fr;
        align-items: center;
    }
    

    .notificationsOld{
        justify-content: start;
    }
    .singleNotification{
        margin-top: 5px;
        margin-bottom: 5px;
        border-radius: 5px;
        padding: 5px;
        display: grid;
        grid-template-columns: 0.75fr 4.25fr;
        align-items: center;
        
    }
    
    .singleNotification img{
        border-radius: 50%;
        width: 35px;
        height: auto;
    }
    .notificationText{
        height: auto;
        width: 100%;
        font-size: 13px;
    }
    .new{
        background-color: #F1F4FF;
    }
    .notificationContent{
        overflow-y: scroll;
    }
    .notificationContent::-webkit-scrollbar{
        display: none;
    }
</style>

<div class="notificationContainer">
    <div class="notificationTitle">Notifications</div>
    <div class="notificationContent">
        <div class="notificationSection" id="newNotifications">
                <div id="titleNew" class="notificationSub">
                    <div>New</div>
                    <div>
                        <input type="checkbox" name="markRead" id="markRead">
                        <label for="markRead">Mark all as read</label>
                    </div>
                </div>
                <div>
                    <div class="singleNotification new">
                        <div>
                            <img src="../../Images/profile.jpg" alt="">
                        </div>
                        <div class="notificationText">
                            Kasun reported breakdown: FA/34567
                        </div>
                    </div>
                    <div class="singleNotification new">
                        <div>
                            <img src="../../Images/profile.jpg" alt="">
                        </div>
                        <div class="notificationText">
                            Kasun reported breakdown: FA/34567
                        </div>
                    </div>
                    <div class="singleNotification new">
                        <div>
                            <img src="../../Images/profile.jpg" alt="">
                        </div>
                        <div class="notificationText">
                            Kasun reported breakdown: FA/34567
                        </div>
                    </div>
                </div>
            </div>
            <div class="notificationSection" id="oldNotifications">
                <div class="notificationSub">Earlier</div>
                <div>
                    <div class="singleNotification new">
                        <div>
                            <img src="../../Images/profile.jpg" alt="">
                        </div>
                        <div class="notificationText">
                            Kasun reported breakdown: FA/34567
                        </div>
                    </div>
                    <div class="singleNotification new">
                        <div>
                            <img src="../../Images/profile.jpg" alt="">
                        </div>
                        <div class="notificationText">
                            Kasun reported breakdown: FA/34567
                        </div>
                    </div>
                    <div class="singleNotification new">
                        <div>
                            <img src="../../Images/profile.jpg" alt="">
                        </div>
                        <div class="notificationText">
                            Kasun reported breakdown: FA/34567
                        </div>
                    </div>
                    <div class="singleNotification new">
                        <div>
                            <img src="../../Images/profile.jpg" alt="">
                        </div>
                        <div class="notificationText">
                            Kasun reported breakdown: FA/34567
                        </div>
                    </div>
                </div>
            </div>
    </div>
    
</div>

<script>
    var markRead = document.getElementById("markRead");
    markRead.addEventListener("change",e =>{
        if(markRead.checked){
            console.log("clear All")
        }
    })
    



</script>