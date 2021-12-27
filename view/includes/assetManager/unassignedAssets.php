<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Asset ID</th>
            <th>Asset Name</th>
            <th>Asset Type</th>
            <th>Condition</th>
            <th></th>
        </tr>
    </thead>
    <tbody id="unassignedAssetsTableBody"></tbody>
</table>

<script>
    getData('http://localhost/assetpro/asset/getAllAssets/unassigned', (data) => {
        data.forEach((asset, index) => {
            var tb = document.getElementById('unassignedAssetsTableBody');
            row = `
                <tr>
                    <td>${index+1}</td>
                    <td>${asset.CategoryCode}/${asset.TypeCode}/${asset.AssetID}</td>
                    <td>${asset.assetName}</td>
                    <td>${asset.assetType}</td>
                    <td>${asset.AssetCondition}</td>
                </tr>`;
            var tableRow = document.createElement('tr');
            tableRow.id = asset.AssetID;
            tableRow.innerHTML = row;
            addViewAssetListener(tableRow, (id) => {
                popup = document.getElementById('popup');
                popup.style.display = 'grid';
                event.stopPropagation();
                document.cookie = `assetID=${id}`;
                loadSection('popup', 'viewAsset');
            });
            tb.appendChild(tableRow);
        });

    })

    function addEventListeners() {
        const buttonArray = document.querySelectorAll('.assignAssetButton');
        for (var i = 0; i < buttonArray.length; i++) {
            buttonArray[i].addEventListener('click', (e) => {
                AssignAsset(e.target.id)
            })
        }
    }

    function AssignAsset(assetId) {
        console.log('Assigned', assetId)
    }
</script>