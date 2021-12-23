<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Asset ID</th>
            <th>Asset Name</th>
            <th>Asset Type</th>
            <th>Condition</th>
            <th>Department</th>
        </tr>
    </thead>
    <tbody id="sharedAssetsTableBody">

    </tbody>
</table>

<script>
    getData('http://localhost/assetpro/asset/getAllAssets/shared', (data) => {
        data.forEach((asset, index) => {
            console.log(asset);
            var tb = document.getElementById('sharedAssetsTableBody');
            row = `
                <tr>
                    <td>${index+1}</td>
                    <td>${asset.CategoryCode}/${asset.TypeCode}/${asset.AssetID}</td>
                    <td>${asset.assetName}</td>
                    <td>${asset.assetType}</td>
                    <td>${asset.AssetCondition}</td>
                    <td>${asset.department}</td>
                </tr>`;
            var tableRow = document.createElement('tr');
            tableRow.id = asset.AssetID;
            tableRow.innerHTML = row;
            addViewAssetListener(tableRow);
            tb.appendChild(tableRow);
        });
    })
</script>