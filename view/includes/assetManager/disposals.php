<div class="overviewLayout">
    <div class="section-heading">Asset Disposal</div>

    <div class="contentSection">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Asset ID</th>
                    <th>Asset Name</th>
                    <th>Useful Years</th>
                    <th>Submit for disposal</th>
                </tr>
            </thead>
            <tbody id="disposalTableBody" >

            </tbody>
        </table>
    </div>
</div>

<script>
    getData('http://localhost/assetpro/depricated/all', (data) => {
        console.log(data);
        data.forEach((asset, index) => {
            var tb = document.getElementById('disposalTableBody');
            row = `
                <tr>
                    <td>${index+1}</td>
                    <td>${asset.CategoryCode}/${asset.TypeCode}/${asset.AssetID}</td>
                    <td>${asset.Name}</td>
                    <td>${asset.UsefulYears}</td>
                    <td>
                        ${
                            (()=>{
                                if(asset.isDisposed == 1){
                                    return `Submitted`;
                                }else{
                                    return `<button class='btn btn-submit' onclick="submitForDisposal(${asset.AssetID})">Submit</button>`;
                                }
                            })()
                            
                        }
                    </td>
                </tr>`;
            var tableRow = document.createElement('tr');
            tableRow.id = asset.AssetID;
            tableRow.innerHTML = row;
            addViewAssetListener(tableRow , (id)=>{
                console.log("Assed Id "+ id);
            });
            tb.appendChild(tableRow);
        });
    })


    function submitForDisposal(assetID) {
        postData(`http://localhost/assetpro/depricated/dispose/${assetID}`, {
            assetID:assetID
        }, (data) => {
            if(data.status == 'success'){
                alert('Successfully Submitted for disposal');
                location.reload();
            }
        })
    }
</script>