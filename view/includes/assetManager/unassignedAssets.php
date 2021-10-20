<style>
    .table{
        all: revert;
        display: table;
        width: 100%;
        margin: 10px 0px;
        color: #5C6E9B;
        overflow-y: hidden;  
        
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
        background-color: #EAEDF5;
        
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
    .assignAssetButton{
        padding: 10px 20px;
        background-color: #5C6E9B;
        color: white;
        text-align: center;
        width: 50px;
        border-radius: 20px;
    }
    .assignAssetButton:hover{
        background-color: whitesmoke;
        color: #5C6E9B;
    }
    .tableRow > div:last-of-type{
        text-align: center;
    }
    
    
</style>

<div class="table">
    <div class="tableHeader">
        <div>Number</div>
        <div>Asset ID</div>
        <div>Asset Name</div>
        <div>Asset Type</div>
        <div>Condition</div>
        <div></div>
    </div>
    <div class="tableRowGroup" id="unassignedAssetsTableBody">     
    </div>
</div>

<script>
    getAssets('unassigned');

    function addEventListeners(){
        const buttonArray = document.querySelectorAll('.assignAssetButton');
        for(var i=0 ; i < buttonArray.length ; i++ ){
            buttonArray[i].addEventListener('click',(e) => {
                AssignAsset(e.target.id)
            })
        }
    }

    function AssignAsset(assetId){
        console.log('Assigned' , assetId)
    }
</script>