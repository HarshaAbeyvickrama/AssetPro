<style>
    .overviewLayout{
        display: grid;
        grid-template-rows: 0.75fr 1.5fr 0.75fr 7fr ;
             
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
        display: inline-block;
        /* grid-template-rows: 1fr 1fr; */
        border-radius: 15px;
        padding: 10px;
        background-color: white;
        overflow-y: auto;
    }
    .contentSection > div{
        margin:15px;
        height: auto;
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
            
    }
    .tableRow .tableCell{
        padding:10px 0px;
        
    }
    hr{
        background-color: #304068;
        width: 100%;
        /* height: 1px; */
    }

</style>
<div class="overviewLayout">
    <div>
        <div> Dashboard Overview </div>
    </div>
    <div class="statSection">
        <div>
            <div class="statBox box1" id="allAssets">
                <div class="statNumber" id="allAssets"> 10 </div>
                <div class="statText"> All Assets </div>
            </div>
        </div>

        <div>
            <div class="statBox box2" id="assignedAssets">
                    <div class="statNumber" id="assignedAssets"> 4 </div>
                    <div class="statText"> Assigned Assets </div>
            </div>
        </div>
            
        <div>
            <div class="statBox box3" id="inProgress">
                <div class="statNumber" id="inProgress"> 6 </div>
                    <div class="statText"> In Progress </div>
            </div>
        </div>

        <div>
            <div class="statBox box4" id="repairedAssets">
                <div class="statNumber" id="repairedAssets"> 6 </div>
                    <div class="statText"> Repaired Assets </div>
            </div>
        </div>

    </div>

    <div>
        <div> Recent Activities </div>
    </div>
    <div class="contentSection scrollbar">

        <div class="oldActivities">
            <div class="recentTitle">   </div>

            <div class="recentActivityTable table">
                <div class="tableHeader">
                    <div class="tableCell"> Number </div>
                    <div class="tableCell"> Asset ID </div>
                    <div class="tableCell"> Asset Name </div>
                    <div class="tableCell"> Asset Type </div>
                    <div class="tableCell"> Reported Employee </div>
                    <div class="tableCell"> Status </div>
                </div>
                <div class="tableRowGroup">
                    <div class="tableRow">
                        <div class="tableCell"> 1 </div>
                        <div class="tableCell"> FA/12345 </div>
                        <div class="tableCell"> Asset name here </div>
                        <div class="tableCell"> Fixed Asset </div>
                        <div class="tableCell"> Wathsala Perera </div>
                        <div class="tableCell"> Done </div>
                    </div>
                    <div class="tableRow">
                        <div class="tableCell"> 2 </div>
                        <div class="tableCell"> FA/12346 </div>
                        <div class="tableCell"> Asset name here </div>
                        <div class="tableCell"> Fixed Asset </div>
                        <div class="tableCell"> Shanaka Madhushan </div>
                        <div class="tableCell"> Done </div>
                    </div>
                    <div class="tableRow">
                        <div class="tableCell"> 3 </div>
                        <div class="tableCell"> CA/23456 </div>
                        <div class="tableCell"> Asset name here </div>
                        <div class="tableCell"> Current Asset </div>
                        <div class="tableCell"> Nalin Perera </div>
                        <div class="tableCell"> Done </div>
                    </div>
                    <div class="tableRow">
                        <div class="tableCell"> 4 </div>
                        <div class="tableCell"> CA/23458 </div>
                        <div class="tableCell"> Asset name here </div>
                        <div class="tableCell"> Current Asset </div>
                        <div class="tableCell"> kasun Dias </div>
                        <div class="tableCell"> Done </div>
                    </div>
                    <div class="tableRow">
                        <div class="tableCell"> 5 </div>
                        <div class="tableCell"> CA/23458 </div>
                        <div class="tableCell"> Asset name here </div>
                        <div class="tableCell"> Current Asset </div>
                        <div class="tableCell"> kasun Dias </div>
                        <div class="tableCell"> Done </div>
                    </div>
                    <div class="tableRow">
                        <div class="tableCell"> 6 </div>
                        <div class="tableCell"> FA/12345 </div>
                        <div class="tableCell"> Asset name here </div>
                        <div class="tableCell"> Fixed Asset </div>
                        <div class="tableCell"> Wathsala Perera </div>
                        <div class="tableCell"> Done </div>
                    </div>      
                   
                </div>
            </div>
        </div>
    </div>
</div>
