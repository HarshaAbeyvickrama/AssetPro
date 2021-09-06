
<style>
    .profile{
        display: grid;
        height: 82vh;
        width: 87.5vw;
        grid-template-columns: 1fr 1fr;
        margin: 10px;
        padding: 5px;
        background-color: #F1F4FF;

    }
    .profile >div{
        width: auto;
        height: auto;
        margin: 15px;
        background-color: white;
        border-radius: 10px;
        padding: 10px;
        
    }
    #pLeft{
        display: grid;
        grid-template-rows: 4fr 6fr;
        justify-content: center;
        align-items: center;
    }
    #pLeft > div{
        height: 100%;
        width: 100%;
    }
    #pLeft > img{
        width: 225px;
        border-radius: 50%;
        background-color: red;
    }
    #pRight{
        /* margin-left: 5px; */
    }
</style>

<div class="profile">
    <div id="pLeft">
        <img src="../Images/profile.jpg" alt="">
        <div style="background-color: green;">
            <!-- <div>Basic Information</div> -->
            <!-- A sample php code inside this div -->
            
        </div>
    </div>
    <div id="pRight"></div>
</div>


    