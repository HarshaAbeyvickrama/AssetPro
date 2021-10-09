<style>
    .overviewLayout{
        display: grid;
        grid-template-rows: 0.75fr 1.5fr 0.75fr 7fr ;
        height: 82vh;
        width: 87.5vw;
        overflow-y: auto;
        padding: 20px;
        background-color: #F1F4FF;
    }
    .overviewLayout > div{
        display: flex;
        align-items: center;
        color: #304068;
        font-size: 24px;
        font-weight: bold;
        
    }
    .statSection{
        display: grid;
        grid-template-columns: repeat(5 1fr);
        width: 100%;
        height: 100%;
    }
    .statSection > div{
        width: 100%;
        height: 100%;
        display: flex;
        /* justify-content: center; */
        align-items: center;
    }
    .statBox{
        display: grid;
        grid-template-rows: 3fr 2fr;
        color: white;
        height: 95%;
        width: 90%;
        border-radius: 12px;
    }
    .statBox > div{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .statNumber{
        font-size: 40px;
    }
    .statText{
        font-size: 17px;
        font-weight: lighter;
    }
    .box1{
        background-color: #304068;
    }
    .box2{
        background-color: #6A71D7;
    }
    .box3{
        background-color: #3D7DDB;
    }
    .box4{
        background-color: #6165A2;
    }
    .box5{
        background-color: #4E74AB;
    }
    .contentSection{
        background-color: white;
        border-radius: 15px;
        padding:15px;
    }

/*inside content section*/
    .econtainer1{     
        width:100%;
        height:100%;
        display:grid;
        grid-template-columns:1fr 1fr 2fr 1fr;
        
    }
   
   
</style>
<div class="overviewLayout">
    <div>
        <div>Dashboard Overview</div>
    </div>
    <div class="statSection">
        <div>
            <div class="statBox box1" id="allAssets">
                <div class="statNumber">10</div>
                <div class="statText">All Assets</div>
            </div>
        </div>
            
        <div>
            <div class="statBox box3" id="allTechnicians">
                <div class="statNumber">4</div>
                    <div class="statText">Assigned Assets</div>
            </div>
        </div>

        <div>
            <div class="statBox box4" id="allAssets">
                <div class="statNumber">6</div>
                <div class="statText">In Progress</div>
            </div>
        </div>

        <div>
            <div class="statBox box5" id="allAssets">
                <div class="statNumber">6</div>
                <div class="statText">Repaired Assets</div>
            </div>
        </div>

        
    </div>

    <div>
    <div>Recent Activities</div>
    </div>

    <div class="contentSection">
        <div class="econtainer1"> 
                 <div>
                     <h5>Date</h5>
                     <p>18/07/2020</p>
                     <p>18/07/2020</p>
                     <p>17/07/2020</p>
                     <p>17/07/2020</p>
                 </div>

                 <div>
                     <h5>Role</h5>
                     <p>Dasun</p>
                     <p>Kamal</p>
                     <p>Asset Manager</p>
                     <p>Me</p>
                 </div>

                 <div>
                     <h5>Task</h5>
                     <p>Reported breakdown of FA/23445</p>
                     <p>Reported breakdown of FA/23456</p>
                     <p>IA/34567 was unassigned from you</p>
                     <p>Successfully repaired IA/34567</p>
                 </div>
                 
                 <div>
                     <h5>Time</h5>
                     <p>4 days ago</p>
                     <p>4 days ago</p>
                     <p>5 days ago</p>
                     <p>5 days ago</p>
                 </div>

        </div>
        
    </div>
</div>