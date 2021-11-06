<style>
    
    #assetSections{
        display: flex;
        justify-content: center;
        align-items: center;
        
    }
    #assetSections>div{
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
    #assetSections>div:hover{
        cursor: pointer;
        background-color: #EAEDF5;
    }
    #assetContents{
        overflow-y: auto;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        /* padding: 10px;
        height: 100%; */

    }
    .buttonSection{
        display: flex;
        align-items: center;
        justify-content: right;
        float: right;
        /*padding-bottom: 10px;*/
    }
    .button{
        background-color: #6A71D7;
        margin-right: 15px;
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
        xhr.open("GET",`../model/Technician.php?action=getAssets&type=${type}`,true);

        xhr.onload = function(){
            if(this.status === 200){
                var assets = JSON.parse(this.responseText);
                // console.log(assets);
                switch (type) {
                    case 'assigned':
                        for(var i = 0; i<assets.length;i++){
                            var tb = document.getElementById('assignedAssetsTableBody')
                            tb.innerHTML += `
                                <tr>
                                    <td>${i+1}</td>
                                    <td>${assets[i]['CategoryCode']}/${assets[i]['TypeCode']}/${assets[i]['AssetID']}</td>
                                    <td>${assets[i]['assetName']}</td>
                                    <td>${assets[i]['Name']}</td>
                                    <td>${assets[i]['employeeName']}</td>
                                    <td>
                                        <button class='btn btn-assign'>
                                            View
                                        </button>
                                    </td>
                                </tr>`;
                            // var tableRow = document.createElement('div');
                            // tableRow.className = 'tableRow';
                            // tableRow.id = assets[i]['AssetID'];
                            // tableRow.innerHTML = row;
                            // addViewAssetListener(tableRow);
                            // bd.appendChild(tableRow);


                        }
                        break;
                    case 'inprogress':
                        for(var i = 0; i<assets.length;i++){
                            var tb = document.getElementById('assignedAssetsTableBody');
                            console.log(assets[i]);
                            // tb.innerHTML += `
                            //     <tr>
                            //         <td>${i+1}</td>
                            //         <td>${assets[i]['CategoryCode']}/${assets[i]['TypeCode']}/${assets[i]['AssetID']}</td>
                            //         <td>${assets[i]['assetName']}</td>
                            //         <td>${assets[i]['Name']}</td>
                            //         <td>${assets[i]['employeeName']}</td>
                            //         <td>${assets[i]['MarkasDone']}</td>
                            //     </tr>`;
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
    <div class="section-heading"> Dashboard Overview </div>
    
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
        <div class="section-subHeading"> All Assigned Assets </div>
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



