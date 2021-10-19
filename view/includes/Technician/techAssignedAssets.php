<style>
    .table{
        display: table;
        width: 100%;
        margin: 10px 0px;
        color: #5C6E9B;
        overflow-y: hidden !important;
           
    }
    .tableHeader{
        width: 100%;
        display: table-header-group;
        font-size: 19px;
        padding: 15px;
        font-weight: bold;
        overflow-y: hidden !important;
    }
    .tableHeader > div { 
        display: table-cell;
    }
    .table .tableRowGroup{
        display: table-row-group;
        overflow-y: auto !important;
    }
    .tableRow{
        display: table-row;
    }
    .tableCell{
        display: table-cell;
    }
    .tableRowGroup .tableRow:hover{
        cursor: pointer;
        background-color: wheat;
        
    }
    .tableRowGroup{
        overflow-y: auto;
    }
    .tableRow .tableCell{
        padding:10px 0px;
        
    }
    .tableRow > div{
        display: table-cell;
        padding:10px 0px;
    }
    .tableRow > div:first-of-type{
        text-align: center;
    }
    .tableHeader > div:first-of-type{
        text-align: center;
    }
   
    .col-btn{
        z-index: 1;
        position: absolute; 
        left: 5px;
        bottom: 0px;
        right: calc(0%);
        cursor: pointer;
    }

    .col-btn > div:hover {
        cursor: pointer;
        background-color: #304068;
        transition: .5s;
    }

    .col-btn {
        position: relative;
        text-align: center;
        width: 100%;
        align-items: center;
        margin: 10px 0px;   
    }
    .col-btn>div {
        border-radius: 15px;
        padding: 10px 20px;
        color: white;
        font-size: 16px;
        background-color: #5C6E9B;
        width: 80px;
        max-height: 30px;
        position: relative;
        float: right;
        margin-right: 5px;
    }
</style>

<div class="table scrollbar">
    <div class="tableHeader">
        <div> Number </div>
        <div> Asset ID </div>
        <div> Asset Name </div>
        <div> Asset Type </div>
        <div> Reported Employee </div>
        <div> Start Repairing </div>
    </div>
    <div class="tableRow">
        <div> 1 </div>
        <div> FA/12345 </div>
        <div> Laptop </div>
        <div> fixed Asset </div>
        <div> Wathsala Perera </div>
        <div class="col-btn">
            <div class="tableCell" id="startRepair"> Commence </div>    
        </div>
    </div>
    <div class="tableRow">
        <div> 2 </div>
        <div> FA/12346 </div>
        <div> Printer </div>
        <div> Fixed Asset </div>
        <div> shanaka Madhushan </div>
        <div class="col-btn">
            <div class="tableCell" id="startRepair"> Commence </div>    
        </div>
    </div>
    <div class="tableRow">
        <div> 3 </div>
        <div> CA/23456 </div>
        <div> Monitor </div>
        <div> Current Asset </div>
        <div> Nalin Perera </div>
        <div class="col-btn">
            <div class="tableCell" id="startRepair"> Commence </div>    
        </div>
    </div>
    <div class="tableRow">
        <div> 4 </div>
        <div> CA/23458 </div>
        <div> CPU </div>
        <div> Current Asset </div>
        <div> kasun Dias </div>
        <div class="col-btn">
            <div class="tableCell" id="startRepair"> Commence </div>    
        </div>
    </div>

    <div class="tableRowGroup " id="assignedAssetsTableBody">      
    </div>
</div>

<script>
    getAssets('assigned');
</script>