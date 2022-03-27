<table class="table" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>Asset ID</th>
            <th>Asset Name</th>
            <th>Asset Type</th>
            <th>Condition</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody id="allAssetsTableBody">

    </tbody>
</table>
<script>
    getData('http://localhost/assetpro/asset/getAllAssets/all', (data) => {
        data.forEach((asset, index) => {
            var bd = document.getElementById('allAssetsTableBody');
            var row = `
                <td>${index+1}</td>
                <td>${asset.CategoryCode}/${asset.TypeCode}/${asset.AssetID}</td>
                <td>${asset.assetName}</td>
                <td>${asset.assetType}</td>
                <td>${asset.AssetCondition}</td>   
                <td>${asset.Status}</td>
                `;
            var tableRow = document.createElement('tr');
            tableRow.id = asset['AssetID'];
            tableRow.innerHTML = row;

            addViewAssetListener(tableRow, (id) => {
                popup = document.querySelector('.popup-container');
                popup.style.display = 'grid';
                document.cookie = `assetID=${id}`;
                loadSection('popup', 'viewAsset');
            });

            bd.appendChild(tableRow);
        });

    })

</script>