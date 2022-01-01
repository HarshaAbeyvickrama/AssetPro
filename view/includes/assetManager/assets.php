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

 
    #topSection{
        display: grid;
        grid-template-columns: 1fr 1fr;
    }
  
    
</style>

<script>
    // Retrieve and set all counts
    getData('http://localhost/assetpro/stats/all/', (data) => {
        document.getElementById('allAssetsCount').innerHTML = data.allAssets;
        document.getElementById('allEmployeesCount').innerHTML = data.allEmployees;
        document.getElementById('allTechniciansCount').innerHTML = data.allTechnicians;
        document.getElementById('allTangible').innerHTML = data.tangibleAssets;
        document.getElementById('allConsumable').innerHTML = data.consumableAssets;
    });

    function getAssets(type) {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `../model/Asset.php?action=getAssets&type=${type}`, true);

        xhr.onload = function() {
            if (this.status === 200) {
                var assets = JSON.parse(this.responseText);
                switch (type) {
                    case 'all':
                        for (var i = 0; i < assets.length; i++) {
                            var bd = document.getElementById('allAssetsTableBody')
                            var row = `
                                    <td>${i+1}</td>
                                    <td>${assets[i]['CategoryCode']}/${assets[i]['TypeCode']}/${assets[i]['AssetID']}</td>
                                    <td>${assets[i]['assetName']}</td>
                                    <td>${assets[i]['assetType']}</td>
                                    <td>${assets[i]['AssetCondition']}</td>   
                                    <td>${assets[i]['Status']}</td>
                                `;
                            var tableRow = document.createElement('tr');
                            tableRow.id = assets[i]['AssetID'];
                            tableRow.innerHTML = row;
                            addViewAssetListener(tableRow);
                            bd.appendChild(tableRow);


                        }
                        break;
                    case 'assigned':
                        for (var i = 0; i < assets.length; i++) {
                            var tb = document.getElementById('assignedAssetsTableBody');
                            tb.innerHTML += `
                                <tr>
                                    <td>${i+1}</td>
                                    <td>${assets[i]['CategoryCode']}/${assets[i]['TypeCode']}/${assets[i]['AssetID']}</td>
                                    <td>${assets[i]['assetName']}</td>
                                    <td>${assets[i]['assetType']}</td>
                                    <td>${assets[i]['AssetCondition']}</td>
                                    <td>${assets[i]['employee']}</td>
                                </tr>`;
                        }
                        break;

                    case 'shared':
                        for (var i = 0; i < assets.length; i++) {
                            document.getElementById('sharedAssetsTableBody').innerHTML += `
                                <tr>
                                    <td>${i+1}</td>
                                    <td>${assets[i]['CategoryCode']}/${assets[i]['TypeCode']}/${assets[i]['AssetID']}</td>
                                    <td>${assets[i]['assetName']}</td>
                                    <td>${assets[i]['assetType']}</td>
                                    <td>${assets[i]['AssetCondition']}</td>
                                    <td>${assets[i]['department']}</td>
                                </tr>`;
                        }
                        break;
                    case 'unassigned':
                        for (var i = 0; i < assets.length; i++) {
                            const tb = document.getElementById('unassignedAssetsTableBody');
                            tb.innerHTML += `
                                <tr>
                                    <td>${i+1}</td>
                                    <td>${assets[i]['CategoryCode']}/${assets[i]['TypeCode']}/${assets[i]['AssetID']}</td>
                                    <td>${assets[i]['assetName']}</td>
                                    <td>${assets[i]['assetType']}</td>
                                    <td>${assets[i]['AssetCondition']}</td>
                                    <td>
                                        <button class='btn btn-assign' id=${assets[i]['AssetID']}>
                                            Assign
                                        </button>
                                    </td>
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

    document.getElementById("assetSections").addEventListener('click', function(e) {
        const eventId = e.target.id;
        if (eventId != 'assetSections') {
            loadSection("assetContents", eventId);
            e.stopPropagation();
            setActiveTab(eventId);
        }

    });

    function setActiveTab(eventId) {
        var tabs = document.querySelector('#assetSections').querySelectorAll('div');
        tabs.forEach(tab => {
            tab.classList.remove('activeTab');
        })
        document.getElementById(eventId).classList.add('activeTab');
    }
    document.getElementById("addAsset").addEventListener('click', function(e) {
        const eventId = e.target.id;
        if (eventId == "addAsset") {
            loadSection("popup", eventId);
        }
    })


    //Add event listener to listen for click events on each asset in all tables
    // function addViewAssetListener(assetElement) {
    //     assetElement.addEventListener('click', (event) => {
    //         var asset = event.target.parentElement;
    //         event.stopPropagation();
    //         document.cookie = `assetID=${asset.id}`;
    //         loadSection('centerSection', 'viewAsset');
    //     })
    // }

    function addViewAssetListener(element, callback) {
        element.addEventListener("click", function(e) {
            callback(this.id);
        });
    }
    //Get asset details by ID
</script>
<div class="overviewLayout">
    <div class="section-heading">Dashboard Overview</div>

    <div class="statSection">
        <div>
            <div class="statBox box1">
                <div class="statNumber" id="allAssetsCount"></div>
                <div class="statText">All Assets</div>
            </div>
        </div>

        <div>
            <div class="statBox box2">
                <div class="statNumber" id="allEmployeesCount"></div>
                <div class="statText">All Employees</div>
            </div>
        </div>

        <div>
            <div class="statBox box3">
                <div class="statNumber" id="allTechniciansCount"></div>
                <div class="statText">All Technicians</div>
            </div>
        </div>
        <div>
            <div class="statBox box4">
                <div class="statNumber" id="allTangible">897</div>
                <div class="statText">Tangible Assets</div>
            </div>
        </div>
        <div>
            <div class="statBox box5">
                <div class="statNumber" id="allConsumable">584</div>
                <div class="statText">Cosumable Assets</div>
            </div>
        </div>
    </div>
    <div id="topSection">
        <div class="section-subHeading">Assets</div>
        <div class="buttonSection" id="addAssetButtonSection">
            <div class="button" id="addAsset">Add Asset</div>
        </div>

    </div>
    <div class="contentSection">
        <div id="assetSections">
            <div id="allAssets" class="activeTab">All Assets</div>
            <div id="assignedAssets">Assigned Assets</div>
            <div id="unassignedAssets">Unassigned Assets</div>
            <div id="sharedAssets">Shared Assets</div>
        </div>
        <div id="assetContents">
            <?php
            include("allAssets.php");
            ?>
        </div>
       

    </div>
</div>