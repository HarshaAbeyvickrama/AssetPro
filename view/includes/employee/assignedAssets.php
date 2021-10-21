<style>
    .overviewLayout {
        display: grid;
        /* grid-template-rows: 0.75fr 1.5fr 0.75fr 7fr; */
        height: 82vh;
        width: 87.5vw;
        overflow-y: scroll;
        padding: 20px;
        background-color: #F1F4FF;
    }
    .overviewLayout>div {
        display: flex;
        align-items: center;
        color: #304068;
        font-size: 24px;
        font-weight: bold;
    }
    .contentSection {
        background-color: white;
        border-radius: 15px;
        margin-top: 15px;
        height: 82vh;
        
    }

    .employeeData {
        width: 90%;
        border-collapse: collapse;
        font-size: 18px;
        /* margin-left: 5vw; */
        text-align: center;
    }
   
    .btnAction{
        color: white;
        background-color: #5C6E9B;
        padding: 10px;
        border: none;
        border-radius: 32px;
        width: 80px;
        height: 40px;
        cursor: pointer;
        font-size: 15px;
        align-items:center;
    }
    .btnAction:hover{
        color: black;
        background-color: white;
    }
</style>

<div class="overviewLayout">
    <div>
        <div>Assigned Assets</div>
    </div>
    <div class="contentSection">
            <table class="table">
                <thead>
                    <tr>
                        <th>Number</th>
                        <th>Asset ID</th>
                        <th>Asset Name</th>
                        <th>Asset Type</th>
                        <th>Report Breakdown</th>
                    </tr>
                </thead>
                <tbody id="employeeTableBody"></tbody>
            </table>
        </div>
</div>


<script>
   function loadAssets(){
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "../model/AssignedAssetsEmp.php?action=getAssets", true);
        xhr.onload = function() {
            if (this.status === 200) {
                var assets = JSON.parse(this.responseText);
                console.log(assets);
                for (var i = 0; i < assets.length; i++) {
                    document.getElementById('employeeTableBody').innerHTML += `
                                    <tr>
                                        <td>${i+1}</td>
                                        <td>${assets[i]['AssetID']}</td>
                                        <td>${assets[i]['assetName']}</td>
                                        <td>${assets[i]['assetType']}</td>
                                        <td>  
                                        <button class='btnAction' onClick="report(${assets[i]['AssetID']})">Report</button>
                                        </td> 
                                    </tr>`;
                }
            }
        }
        xhr.send();
    }
    loadAssets();
    
        
    function report(asset){
        var assetDetails=null;
        const xhr = new XMLHttpRequest();
        xhr.open('GET',`../model/AssignedAssetsEmp.php?action=getAssignedAssetById&asset_id=${asset}`,true);
        xhr.onload = function(){
            if(this.status == 200){
                assetDetails = JSON.parse(this.responseText);
                loadSection('centerSection','report');
                // document.cookie=`assetID=${asset}`;
                var json = JSON.stringify(assetDetails);       //object to string
                document.cookie=`assetID=${json}`;
            }                
        }
        xhr.send();
        // console.log(asset);
       
     }  
</script>

