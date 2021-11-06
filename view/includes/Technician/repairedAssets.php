<style>
    /*.overviewLayout{
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
        /*align-items: center;
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
        /*border-radius: 15px;
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
    /*.table{
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
        /*transform: scale(0.97);
    }

    hr{
        background-color: #304068;
        width: 100%;
        /* height: 1px; */
    }
    /*.col-btn{
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
    }*/
</style>

<div class="overviewLayout">
    <div class="section-heading"> Overview </div>
    
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

    <div class="section-subHeading"> Repaired Assets </div>
    
    <div class="contentSection scrollbar">
            <table class="table">
                <thead>
                    <tr>
                        <th> # </th>
                        <th> Asset ID </th>
                        <th> Asset Name </th>
                        <th> Asset Type </th>
                        <th> Reported Employee </th>
                        <th> Status </th>
                    </tr>
                </thead>
                <tbody class="tableRowGroup" id="repairedAssetsTableBody">
                    <tr>
                        <td> 1 </td>
                        <td> FA/CC/1 </td>
                        <td> Laptop </td>
                        <td> Fixed Asset </td>
                        <td> Wathsala Perera </td>
                        <td> <button class="btncol"> Done </button> </td>
                    </tr>
                    <tr>
                        <td class="tableCell"> 2 </td>
                        <td class="tableCell"> FA/CP/1 </td>
                        <td class="tableCell"> Printer </td>
                        <td class="tableCell"> Fixed Asset </td>
                        <td class="tableCell"> Shanaka Madhushan </td>
                        <td> <button class="btncol"> Done </button> </td>
                    </tr>
                    <tr>
                        <td class="tableCell"> 3 </td>
                        <td class="tableCell"> CA/CP/2 </td>
                        <td class="tableCell"> Monitor </td>
                        <td class="tableCell"> Current Asset </td>
                        <td class="tableCell"> Nalin Perera </td>
                        <td> <button class="btncol"> Done </button> </td>
                    </tr>
                    <tr>
                        <td class="tableCell"> 4 </td>
                        <td class="tableCell"> CA/PE/2 </td>
                        <td class="tableCell"> CPU </td>
                        <td class="tableCell"> Current Asset </td>
                        <td class="tableCell"> kasun Dias </td>
                        <td> <button class="btncol"> Done </button> </td>
                    </tr>
                    <tr>
                        <td class="tableCell"> 5 </td>
                        <td class="tableCell"> CA/CP/4 </td>
                        <td class="tableCell"> Web Cam </td>
                        <td class="tableCell"> Current Asset </td>
                        <td class="tableCell"> kasun Dias </td>
                        <td> <button class="btncol"> Done </button> </td>
                    </tr>     
                    <tr>
                        <td class="tableCell"> 6 </td>
                        <td class="tableCell"> FA/CP/5 </td>
                        <td class="tableCell"> Scanner </td>
                        <td class="tableCell"> Fixed Asset </td>
                        <td class="tableCell"> Wathsala Perera </td>
                        <td> <button class="btncol"> Done </button> </td>
                    <tr>      
                </tbody>   
            </table>
    </div>
</div>

<script>
    getCount('allAssets');
    getCount('assignedAssets');
    getCount('inProgress');
    getCount('repairedAssets');
</script>