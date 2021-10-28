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
    getAssets('unassigned');

    function addEventListeners(){
        const buttonArray = document.querySelectorAll('.assignAssetButton');
        for(var i=0 ; i < buttonArray.length ; i++ ){
            buttonArray[i].addEventListener('click',(e) => {
                AssignAsset(e.target.id)
            })
        }
    }

    function AssignAsset(assetId){
        console.log('Assigned' , assetId)
    }
</script>