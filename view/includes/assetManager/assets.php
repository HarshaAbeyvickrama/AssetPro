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
        display: grid;
        align-items: center;
        color: #304068;
        font-size: 24px;
        font-weight: bold;
    }
    .statSection{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
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

    .overviewLayout .contentSection{
        all: revert;
        display: grid;
        grid-template-rows: 1fr 9fr;
        border-radius: 15px;
        overflow-y: hidden;
        padding: 0px 10px;
        background-color: white;
    }
    .contentSection > div{
        margin:8px 15px;
        
        
    }
    .recentTitle{
        color: #304068;
        font-size: 20px;
        font-weight: bold;
    }


    /* Recent activity Table CSS */
    .table{
        display: table;
        width: 100%;
        margin: 10px 0px;
        
    }
    .tableHeader{
        display: table-header-group;
        font-size: 19px;
        padding: 15px;
        font-weight: bold;
    }
    .table .tableRowGroup{
        display: table-row-group;
    }
    .tableRow{
        display: table-row;
    }
    .tableCell{
        display: table-cell;
    }
    .tableRowGroup .tableRow:hover{
        cursor: pointer;
        background-color: grey;
        
    }
    .tableRow .tableCell{
        padding:10px 0px;
        
    }

   
    hr{
        background-color: #304068;
        width: 100%;
        /* height: 1px; */
    }
    #assetSections{
        display: flex;
        justify-content: center;
        align-items: center;
        
    }
    #assetSections > div{
        width: 200px;
        display: flex;
        text-align: center;
        align-items: center;
        justify-content: center;
        color: #7F91BC;
        font-size: 20px;
        height: 100%;
        padding: 8px 0px;
        
    }
    #assetSections > div:hover{
        cursor: pointer;
        background-color: aliceblue;
    }
    #assetContents{
        overflow-y: auto;
        padding: 10px;
        /* height: 100%; */

    }
    .buttonSection{
        all: revert;
        display: flex;
        align-items: center;
        justify-content: end;
        padding-bottom: 10px;
    }
    .button{
        background-color: #6A71D7;
        padding: 10px 20px;
        color: white;
        border-radius: 10px;
    }
    .button:hover{
        cursor: pointer;
    }
    
</style>
<div class="overviewLayout">
    <div>
        <div>Dashboard Overview</div>
    </div>
    <div class="statSection">
        <div>
            <div class="statBox box1" id="allAssets">
                <div class="statNumber">1890</div>
                <div class="statText">All Assets</div>
            </div>
        </div>

        <div>
            <div class="statBox box2" id="allEmployees">
                    <div class="statNumber">113</div>
                    <div class="statText">All Employees</div>
            </div>
        </div>
            
        <div>
            <div class="statBox box3" id="allTechnicians">
                <div class="statNumber">56</div>
                    <div class="statText">All Technicians</div>
            </div>
        </div>
        <div>
            <div class="statBox box4" id="allTechnicians">
                <div class="statNumber">897</div>
                    <div class="statText">Tangible Assets</div>
            </div>
        </div>
        <div>
            <div class="statBox box5" id="allTechnicians">
                <div class="statNumber">584</div>
                    <div class="statText">Cosumable Assets</div>
            </div>
        </div>
    </div>
    <div>
        <div>Recent Activities</div>
    </div>
    <div class="contentSection">
        <div id="assetSections">
            <div id="allAssets">All Assets</div>
            <div id="assignedAssets">Assigned Assets</div>
            <div id="unassignedAssets">Unassigned Assets</div>
            <div id="assignedHistory">Assigned History</div>
            <div id="repairedAssets">Repaired Assets</div>
            <div id="repairHistory">Repair History</div>
        </div>
        <div id="assetContents">
            <?php
                include("allAssets.php");
            ?>
        </div>
        <!-- <div class="buttonSection">
            <div class="button" id="addAsset">Add Asset</div>
        </div> -->
    </div>
</div>

<script>
    document.getElementById("assetSections").addEventListener('click',function(e){
        const eventId = e.target.id;
        if(eventId != 'assetSections'){
            assetContents = document.getElementById("assetContents");
            loadSection(eventId,assetContents);
            e.stopPropagation();
        }
        
    })
</script>