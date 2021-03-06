
<div class="overviewLayout">
    <div>
        <div class="section-heading">Breakdown Assets</div>
    </div>
    <div class="contentSection">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <!-- <th>Error ID</th> -->
                        <th>Asset ID</th>
                        <th>Asset Name</th>
                        <th>Asset Type</th>
                        <th>Status</th>
                        <th>view Breakdown</th>
                    </tr>
                </thead>
                <tbody id="employeeTableBody"></tbody>
             
            </table>
    </div>
</div>

<script>
    <?php
    echo 'var userID ='.$_SESSION['UserID']
    ?>
    //  viewBreakAsset(userID);
     window.addEventListener('load', viewBreakAsset(userID))
</script>

<!-- <script>
    function viewBreakAsset(){
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "../model/AssignedAssetsEmp.php?action=viewAssetBreak", true);
        xhr.onload = function() {
            if (this.status === 200) {
                var viewassets = JSON.parse(this.responseText);
                console.log(viewassets);
                for (var i = 0; i < viewassets.length; i++) {
                    var date = new Date(viewassets[i]['reportedDate']);
                    var newDate = date.getDate()+'/'+(date.getMonth()+1)+'/'+date.getFullYear();     
                    var reportedDate = viewassets[i]['reportedDate'].replace(/-/gi, "/");
                    document.getElementById('employeeTableBody').innerHTML += `
                                    <tr>
                                        <td>${i+1}</td>
                                        <td>${newDate}</td>
                                        <td>${viewassets[i]['BreakdownID']}</td>
                                        <td>${viewassets[i]['CategoryCode']}/${viewassets[i]['TypeCode']}/${viewassets[i]['AssetID']}</td>
                                        <td>${viewassets[i]['assetName']}</td>
                                        <td>${viewassets[i]['assetType']}</td>
                                        <td>  
                                        <button class='btnAction' onClick="viewBreak(${viewassets[i]['BreakdownID']},${viewassets[i]['AssetID']})">View</button>
                                        </td> 
                                    </tr>`;
                }
            }
        }
        xhr.send();
    }
    viewBreakAsset();


    function viewBreak(viewasset,viewassetid){
       
        var viewBreakAssetDetails = null;
        const xhr = new XMLHttpRequest();
        xhr.open('GET',`../model/AssignedAssetsEmp.php?action=viewBreakAssetById&view_id=${viewasset}&assetid=${viewassetid}`,true);
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

</script>  -->



    
        
