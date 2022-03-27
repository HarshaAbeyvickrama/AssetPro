<!--<table class="table">-->
<!--    <thead>-->
<!--        <tr>-->
<!--            <th>#</th>-->
<!--            <th>Asset ID</th>-->
<!--            <th>Asset Name</th>-->
<!--            <th>Asset Type</th>-->
<!--            <th>Condition</th>-->
<!--            <th>Assigned Employee</th>-->
<!--        </tr>-->
<!--    </thead>-->
<!---->
<!--    <tbody class="tableRowGroup " id="assignedAssetsTableBody">-->
<!---->
<!--    </tbody>-->
<!--</table>-->

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
                <th>Condition</th>
                <th>Assigned Employee</th>
            </tr>
            </thead>
            <tbody id="assignedAssetsTableBody"></tbody>
        </table>
    </div>
</div>

<script>
    getData('http://localhost/assetpro/asset/getAllAssets/assigned', (data) => {
        data.forEach((asset, index) => {
            var tb = document.getElementById('assignedAssetsTableBody');
            row = `
                <tr>
                    <td>${i+1}</td>
                    <td>${asset.CategoryCode}/${asset.TypeCode}/${asset.AssetID}</td>
                    <td>${asset.assetName}</td>
                    <td>${asset.assetType}</td>
                    <td>${asset.AssetCondition}</td>
                    <td>${asset.employee}</td>
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
</script>