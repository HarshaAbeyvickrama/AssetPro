<style>
    #assetSections {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #assetSections>div {
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

    #assetSections>div:hover {
        cursor: pointer;
        background-color: #EAEDF5;
    }

    #assetContents {
        overflow-y: hidden;
        /* padding: 10px; */
        display: flex;
        justify-content: center;
        align-items: flex-start;

    }

    .buttonSection {
        display: flex;
        /* align-items: center; */
        justify-content: right;
        padding-bottom: 10px;
        /* float: right; */
    }

    .button {
        margin-right: 15px;
        background-color: #6A71D7;
        padding: 10px 20px;
        color: white;
        border-radius: 10px;
        width: max-content;
    }

    .button:hover {
        cursor: pointer;
    }

    #topSection {
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

</style>


<script>
 
    function getAssets(type){
        const xhr = new XMLHttpRequest();
        xhr.open("GET",`../model/Asset.php?action=getAssets&type=${type}`,true);

        xhr.onload = function(){
            if(this.status === 200){
                var assets = JSON.parse(this.responseText);
                switch (type) {
                    case 'assigned':
                        for(var i = 0; i < assets.length; i++){
                            var bd = document.getElementById('techniciantable')
                            var row= `
                                <tr>
                                    <td>${i+1}</td>
                                    <td>${assets[i]['CategoryCode']}/${assets[i]['TypeCode']}/${assets[i]['AssetID']}</td>
                                    <td>${assets[i]['Name']}</td>
                                    <td>${assets[i]['typeName']}</td>
                                    <td>${assets[i]['DepartmentCode']}/EMP/${assets[i]['reportedEmployee']}</td>
                                    <td>  
                                    <button class='btn btn-submit' onClick="">View</button>
                                    </td> 
                                </tr>`;
                            var tableRow = document.createElement('div');
                            tableRow.className = 'tableRow';
                            tableRow.id = assets[i]['AssetID'];
                            tableRow.innerHTML = row;
                            addViewAssetListener(tableRow);
                            bd.appendChild(tableRow);

                        }
                        break;

                    case 'inprogress':
                        for (var i = 0; i<assets.length; i++){
                            var tb = document.getElementById('inprogressAssetsTableBody');
                            tb.innerHTML += `
                                <tr>
                                    <td>${i+1}</td>
                                    <td>${assets[i]['Number']}</td>
                                    <td>${assets[i]['AssetID']}</td>
                                    <td>${assets[i]['AssetName']}</td>
                                    <td>${assets[i]['AssetType']}</td>
                                    <td>${assets[i]['ReportedEmployee']}</td>
                                    <td>${assets[i]['MarkasDone']}</td>
                                </tr>`;
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
    <div class="section-heading"> All Assigned Breakdowns </div>
    
    <div class="contentSection">
        <div id="assetSections">
            <div id="assignedBreakdowns" class="activeTab"> Assigned Breakdowns </div>
            <div id="breakdownsInProgress"> Breakdowns In Progress </div>
        </div>
        <div id="assetContents">
            <?php
                include("assignedBreakdowns.php");
            ?>
        </div>
    </div>
</div>



