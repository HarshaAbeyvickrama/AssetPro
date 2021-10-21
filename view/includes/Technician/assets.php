<style>
    .overviewLayout{
        display: grid;
        grid-template-rows: 0.75fr 1.5fr 0.75fr 7fr ;
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
        grid-template-rows: 1fr 8.5fr 0.5fr;
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
        background-color: #EAEDF5;
    }
    #assetContents{
        overflow-y: auto;
        padding: 10px;
        /* height: 100%; */

    }
    .buttonSection{
        /*all: revert;*/
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
    
    .activeTab{
        background-image: linear-gradient(#EAEDF5, white);;
    }
</style>

<script>

    getCount('allAssets');
    getCount('assignedAssets');
    getCount('inProgress');
    getCount('repairedAssets');

    
    

    function getAssets(type){
        const xhr = new XMLHttpRequest();
        xhr.open("GET",`../model/Asset.php?action=getAssets&type=${type}`,true);

        xhr.onload = function(){
            if(this.status === 200){
                var assets = JSON.parse(this.responseText);
                switch (type) {
                    case 'assigned':
                        for(var i = 0; i<assets.length;i++){
                            var bd = document.getElementById('assignedAssetsTableBody')
                            var row= `
                                    <div>${i+1}</div>
                                    <div>${assets[i]['Number']}</div>
                                    <div>${assets[i]['AssetID']}</div>
                                    <div>${assets[i]['AssetName']}</div>
                                    <div>${assets[i]['AssetType']}</div>
                                    <div>${assets[i]['ReportedEmployee']}</div>   
                                    <div>${assets[i]['StartRepairing']}</div>
                                `;
                            var tableRow = document.createElement('div');
                            tableRow.className = 'tableRow';
                            tableRow.id = assets[i]['AssetID'];
                            tableRow.innerHTML = row;
                            addViewAssetListener(tableRow);
                            bd.appendChild(tableRow);


                        }
                        break;
                    case 'inprogress':
                        for(var i = 0; i<assets.length;i++){
                            var tb = document.getElementById('inprogressAssetsTableBody');
                            tb.innerHTML += `
                                <div class="tableRow">
                                    <div>${i+1}</div>
                                    <div>${assets[i]['Number']}</div>
                                    <div>${assets[i]['AssetID']}</div>
                                    <div>${assets[i]['AssetName']}</div>
                                    <div>${assets[i]['AssetType']}</div>
                                    <div>${assets[i]['ReportedEmployee']}</div>
                                    <div>${assets[i]['MarkasDone']}</div>
                                </div>`;
                        }
                        addEventListeners();
                        break;
                
                    default:
                        break;
                }
                
            }
        }
        xhr.setRequestHeader("Content-type", "application/json");
        xhr.send();
    }

    document.getElementById("assetSections").addEventListener('click',function(e){
        const eventId = e.target.id;
        if(eventId != 'assetSections'){
            loadSection("assetContents",eventId);
            e.stopPropagation();
            setActiveTab(eventId);
        }
        
    });

    function setActiveTab(eventId){
        var tabs = document.querySelector('#assetSections').querySelectorAll('div');
        tabs.forEach(tab =>{
            tab.classList.remove('activeTab');
        })
        document.getElementById(eventId).classList.add('activeTab');
    }
    document.getElementById("addAsset").addEventListener('click',function(e){
        const eventId = e.target.id;
        if(eventId == "addAsset"){
            loadSection("centerSection",eventId);
        }
    })


    //Add event listener to listen for click events on each asset in all tables
    function addViewAssetListener(assetElement){
        assetElement.addEventListener('click', (event) =>{
            var asset = event.target.parentElement;
            event.stopPropagation();
            getAsset(assets.id)
        })
    }

    //Get asset details by ID
    function getAsset(assetID){
        const xhr = new XMLHttpRequest();
        xhr.open("GET",`../model/Asset.php?action=getAssets&type=${type}`,true);
    }
</script>


<div class="overviewLayout">
    <div>
        <div> Dashboard Overview </div>
    </div>
    <div class="statSection">
        <div>
            <div class="statBox box1" >
                <div class="statNumber" id="allAssets"> </div>
                <div class="statText"> All Assets </div>
            </div>
        </div>

        <div>
            <div class="statBox box2" id="assignedAssets">
                    <div class="statNumber" id="assignedAssets"> </div>
                    <div class="statText"> Assigned Assets </div>
            </div>
        </div>
            
        <div>
            <div class="statBox box3" id="inProgress">
                <div class="statNumber" id="inProgress"> </div>
                    <div class="statText"> In Progress </div>
            </div>
        </div>
        <div>
            <div class="statBox box4" id="repairedAssets">
                <div class="statNumber" id="repairedAssets"> </div>
                    <div class="statText"> Repaired Assets </div>
            </div>
        </div>
    </div>
    <div>
        <div> All Assigned Assets </div>
    </div>
    <div class="contentSection">
        <div id="assetSections">
            <div id="techAssignedAssets" class="activeTab"> Assigned Assets </div>
            <div id="assetsinprogress"> In Progress </div>
        </div>
        <div id="assetContents">
            <?php
                include("techAssignedAssets.php");
            ?>
        </div>
    </div>
</div>



