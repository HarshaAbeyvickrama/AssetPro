

<div class="overviewLayout">
    <div>
        <div class="section-heading">Assigned Assets</div>
    </div>
    <div class="contentSection">
            <table class="table" id="filterTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Asset ID</th>
                        <th>Asset Name</th>
                        <th>Asset Type</th>
                        <th>Status</th>
                        <th>Report Breakdown</th>
                    </tr>
                </thead>
                <tbody id="employeeTableBody"></tbody>
            </table>
    </div>
</div>

<script>
<?php 
echo 'var userID ='. $_SESSION['UserID']; 
?>
// loadAssets(userID);
window.addEventListener('load',loadAssets(userID));
</script>





<!-- <script>
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
                                        <td>${assets[i]['CategoryCode']}/${assets[i]['TypeCode']}/${assets[i]['AssetID']}</td>
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
       
     }  
</script>
 -->





