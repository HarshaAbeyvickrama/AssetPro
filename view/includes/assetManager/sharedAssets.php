<style>
    .table{
        all: revert;
        display: table;
        width: 100%;
        margin: 10px 0px;
        color: #5C6E9B;
        
    }
    .tableHeader{
        display: table-header-group;
        font-size: 19px;
        padding: 15px;
        font-weight: bold;
    }
    .tableHeader > div { 
        display: table-cell;
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
        background-color: wheat;
        
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
   
    
    
</style>

<div class="table scrollbar">
    <div class="tableHeader">
        <div>Number</div>
        <div>Asset ID</div>
        <div>Asset Name</div>
        <div>Asset Type</div>
        <div>Condition</div>
        <div>Department</div>
    </div>
    <div class="tableRowGroup " id="sharedAssetsTableBody">
        
    </div>
</div>

<script>
    getAssets('shared');
</script>