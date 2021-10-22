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
        padding: 20px;
        background-color: white;
        overflow-y: auto;
        text-align: left;
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
        color: #5C6E9B;
        text-align: Left;
        
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
            <div class="statBox box1">
                <div class="statNumber" id="allAssets"> 7 </div>
                <div class="statText"> All Assets </div>
            </div>
        </div>

        <div>
            <div class="statBox box2">
                    <div class="statNumber" id="assignedAssets"> 3 </div>
                    <div class="statText"> Assigned Assets </div>
            </div>
        </div>
            
        <div>
            <div class="statBox box3">
                <div class="statNumber" id="inProgress"> 3 </div>
                    <div class="statText"> In Progress </div>
            </div>
        </div>

        <div>
            <div class="statBox box4">
                <div class="statNumber" id="repairedAssets"> 1 </div>
                    <div class="statText"> Repaired Assets </div>
            </div>
        </div>

    </div>

    <div>
        <div> Recent Activities </div>
    </div>
    <div class="contentSection scrollbar">
        <div class="recent24">
            <div class="recentTitle"> Last 24 Hours </div>

            <div class="recentActivityTable table">
                <div class="tableHeader">
                    <div class="tableCell"> Date </div>
                    <div class="tableCell"> Task </div>
                    <div class="tableCell"> Time </div>
                </div>
                <div class="tableRowGroup">
                    <div class="tableRow">
                        <div class="tableCell"> 22/10/2021 </div>
                        <div class="tableCell"> FA/FU/1 was assigned to you </div>
                        <div class="tableCell"> 3 hours ago </div>
                    </div>
                    <div class="tableRow">
                        <div class="tableCell"> 21/10/2021 </div>
                        <div class="tableCell"> Successfully repaired CA/PE/2 </div>
                        <div class="tableCell"> 18 hours ago </div>
                    </div>
                   
                </div>
            </div>
        </div>

        <hr>

        <div class="oldActivities">
            <div class="recentTitle"> Earlier </div>

            <div class="recentActivityTable table">
                <div class="tableHeader">
                    <div class="tableCell"> Date </div>
                    <div class="tableCell"> Task </div>
                    <div class="tableCell"> Time </div>
                </div>
                <div class="tableRowGroup">
                    <div class="tableRow">
                        <div class="tableCell"> 18/10/2021 </div>
                        <div class="tableCell"> Reported a Breakdown of FA/EA/3 </div>
                        <div class="tableCell"> 4 days ago </div>
                    </div>
                    <div class="tableRow">
                        <div class="tableCell"> 21/07/2021 </div>
                        <div class="tableCell"> Reported a Breakdown of CA/PE/4 </div>
                        <div class="tableCell"> 1 day ago </div>
                    </div>
                    <div class="tableRow">
                        <div class="tableCell"> 12/10/2021 </div>
                        <div class="tableCell"> IA/SW/5 was unassigned from Ayisha Siddeequa </div>
                        <div class="tableCell"> 10 days ago </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    getCount('allAssets',);
    getCount('assignedAssets');
    getCount('inProgress');
    getCount('repairedAssets');
</script>