
<table class="table">
    <thead>
        <tr>
            <th> # </th>
            <th> Asset ID </th>
            <th> Asset Name </th>
            <th> Asset Type </th>
            <th> Reported Employee </th>
            <th> Mark as Done </th>
        </tr>
    </thead>

    <tbody id = "inprogressAssetsTableBody">
    
    </tbody>
</table>

<!-- <script>
    getData('http://localhost/assetpro/breakdown/getAllTechBreakdownsInProgress/all' , (data) => {
        data.forEach((asset, index) => {
            var tb = document.getElementById('inprogressAssetsTableBody');
            row = `
                <tr>
                    <td>${i+1}</td>
                    <td>${asset.CategoryCode}/${asset.TypeCode}/${asset.AssetID}</td>
                    <td>${asset.assetName}</td>
                    <td>${asset.assetType}</td>
                    <td>${}</td>
                    <td>${}</td>
                </tr>`;
            var tableRow = document.createElement('tr');
            tableRow.id = asset.AssetID;
            tableRow.innerHTML = row;
            addViewAssetListener(tableRow, (id) => {
                popup = document.querySelector('.popup-container');
                popup.style.display = 'grid';
                document.cookie = `assetID=${id}`;
                loadSection('popup', 'viewAsset');
            });
            tb.appendChild(tableRow);
        });
    })
</script> -->

<script>
<?php 
echo 'var userID ='. $_SESSION['UserID']; 
?>
// loadAssets(userID);
window.addEventListener('load',getAssets(userID));
</script>



    <!-- <div class="tableRow">
        <div> 1 </div>
        <div> FA/CC/1 </div>
        <div> Laptop </div>
        <div> fixed Asset </div>
        <div> Wathsala Perera </div>
        <div class="cell-center"><button class="btn done"> Done </button></div>
 
    </div> -->
    
    
        
    
<!-- <script>
    getAssets('inprogress');
</script> -->