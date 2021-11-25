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
        overflow-y: hidden !important;
        
    }
    .tableHeader{
        display: table-header-group;
        font-size: 19px;
        padding: 15px;
        font-weight: bold;
        overflow-y: hidden !important;
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
        padding:15px 0px;
        
    }

    .tableRow .btn {
        border: 0;
        background: #659B5C;
        padding: 10px 20px;
        color: #fff;
        border-radius: 15px;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .tableRow .btn:focus {
        border: 0;
        /*background: #5C6E9B;*/
        transform: scale(0.97);
    }

    hr{
        background-color: #304068;
        width: 100%;
        /* height: 1px; */
    }
    .col-btn{
        z-index: 1;
        position: absolute; 
        left: 0px;
        bottom: 0px;
        right: calc(0%);
        cursor: pointer;
    }

    .col-btn > div:hover {
        cursor: pointer;
        background-color: #EAEDF5;
        transition: .5s;
    }

    .col-btn {
        position: relative;
        text-align: center;
        width: 100%;
        align-items: center;
        margin: 5px 0px;   
    }
    .col-btn>div {
        border-radius: 15px;
        padding: 10px 20px;
        color: white;
        font-size: 16px;
        background-color: #659B5C;
        width: 80px;
        max-height: 30px;
        position: relative;
        float: right;
        margin-right: 10px;
    }

    .cell-center {
        text-align: center;
        width: 20%;
    }

    .tableRow > div:nth-of-type(6){
        text-align: left;
    }


</style>
<div class="overviewLayout">
    <div>
        <div> Overview </div>
    </div>
    <div class="statSection">
        <div>
            <div class="statBox box1" id="allAssets">
                <div class="statNumber" id="allAssets"> 16 </div>
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
        <div> Repaired Assets </div>
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
                    <div class="cell-center"> Status </div>
                </div>
                <div class="tableRowGroup">
                    <div class="tableRow">
                        <div class="tableCell"> 1 </div>
                        <div class="tableCell"> FA/CC/1 </div>
                        <div class="tableCell"> Laptop </div>
                        <div class="tableCell"> Fixed Asset </div>
                        <div class="tableCell"> Wathsala Perera </div>
                        <div class="cell-center"><button class="btn done"> Done </button></div>
                    </div>
                    <div class="tableRow">
                        <div class="tableCell"> 2 </div>
                        <div class="tableCell"> FA/CP/1 </div>
                        <div class="tableCell"> Printer </div>
                        <div class="tableCell"> Fixed Asset </div>
                        <div class="tableCell"> Shanaka Madhushan </div>
                        <div class="cell-center"><button class="btn done"> Done </button></div>
                    </div>
                    <div class="tableRow">
                        <div class="tableCell"> 3 </div>
                        <div class="tableCell"> CA/CP/2 </div>
                        <div class="tableCell"> Monitor </div>
                        <div class="tableCell"> Current Asset </div>
                        <div class="tableCell"> Nalin Perera </div>
                        <div class="cell-center"><button class="btn done"> Done </button></div>
                    </div>
                    <div class="tableRow">
                        <div class="tableCell"> 4 </div>
                        <div class="tableCell"> FA/CP/3 </div>
                        <div class="tableCell"> CPU </div>
                        <div class="tableCell"> Current Asset </div>
                        <div class="tableCell"> kasun Dias </div>
                        <div class="cell-center"><button class="btn done"> Done </button></div>
                    </div>
                    <div class="tableRow">
                        <div class="tableCell"> 5 </div>
                        <div class="tableCell"> CA/CP/4 </div>
                        <div class="tableCell"> Web Cam </div>
                        <div class="tableCell"> Current Asset </div>
                        <div class="tableCell"> kasun Dias </div>
                        <div class="cell-center"><button class="btn done"> Done </button></div>
                    </div>
                    <div class="tableRow">
                        <div class="tableCell"> 6 </div>
                        <div class="tableCell"> FA/CP/5 </div>
                        <div class="tableCell"> Scanner </div>
                        <div class="tableCell"> Fixed Asset </div>
                        <div class="tableCell"> Wathsala Perera </div>
                        <div class="cell-center"><button class="btn done"> Done </button></div>
                    </div>      
                   
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script>
    getCount('allAssets');
    getCount('assignedAssets');
    getCount('inProgress');
    getCount('repairedAssets');
</script> -->