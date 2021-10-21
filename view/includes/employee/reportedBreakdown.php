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
    .table-data {
        color: #304068;
        margin: 4px 4px;
        height: 500px;
        width: 100%;
        overflow-y: auto;
        overflow-x: hidden;
    }
    .employeeData {
        width: 90%;
        border-collapse: collapse;
        font-size: 18px;
        /* margin-left: 5vw; */
        text-align: center;
    }
    .table-data th {
        color: #5C6E9B;
        padding: 8px;
        position: sticky;
        top: 0;
        background-color: white;
    }
    .table-data td {
        padding: 8px;
        font-weight: lighter;
    }
    .table-data tr:hover{
        background-color: wheat;
        cursor: pointer;
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
        <div>Breakdown Assets</div>
    </div>
    <div class="contentSection">
        <div class="table-data">
            <table class="employeeData">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Error ID</th>
                        <th>Asset ID</th>
                        <th>Asset Name</th>
                        <th>Asset Type</th>
                        <th>view Breakdown</th>
                    </tr>
                </thead>
                <tbody id="employeeTableBody"></tbody>
             
            </table>
        </div>
    </div>
</div>

<script>
    function viewBreakAsset(){
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "../model/AssignedAssetsEmp.php?action=viewAssetBreak", true);
        xhr.onload = function() {
            if (this.status === 200) {
                var viewassets = JSON.parse(this.responseText);
                console.log(viewassets);
                for (var i = 0; i < viewassets.length; i++) {
                    document.getElementById('employeeTableBody').innerHTML += `
                                    <tr>
                                        <td>${i+1}</td>
                                        <td>${viewassets[i]['reportedDate']}</td>
                                        <td>${viewassets[i]['BreakdownID']}</td>
                                        <td>${viewassets[i]['AssetID']}</td>
                                        <td>${viewassets[i]['assetName']}</td>
                                        <td>${viewassets[i]['assetType']}</td>
                                        <td>  
                                        <button class='btnAction' onClick="viewBreak(${viewassets[i]['BreakdownID']})">View</button>
                                        </td> 
                                    </tr>`;
                }
            }
        }
        xhr.send();
    }
    viewBreakAsset();


    function viewBreak(viewasset){
        var viewBreakAssetDetails = null;
        const xhr = new XMLHttpRequest();
        xhr.open('GET',`../model/AssignedAssetsEmp.php?action=viewBreakAssetById&view_id=${viewasset}`,true);
        xhr.onload = function(){
            if(this.status == 200){
             viewBreakAssetDetails = JSON.parse(this.responseText);
             console.log(viewBreakAssetDetails);
             loadSection('centerSection','viewBreakAssets');   
             var json = JSON.stringify(viewBreakAssetDetails );       //object to string
             document.cookie=`BreakdownID=${json}`;
           }  
       }
       xhr.send();
     }

</script>



    
        
