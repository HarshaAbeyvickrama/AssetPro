function viewBreakAssetDH(DeptID){
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `http://localhost/assetpro/departmentheads/getDHBreakdowns/${DeptID}`, true);
    xhr.onload = function() {
        if (this.status === 200) {
            var viewassets = JSON.parse(this.response);
            for (var i = 0; i < viewassets.length; i++) {
                var date = new Date(viewassets[i]['reportedDate']);
                var newDate = date.getDate()+'/'+(date.getMonth()+1)+'/'+date.getFullYear();     
                var reportedDate = viewassets[i]['reportedDate'].replace(/-/gi, "/");
                document.getElementById('DHBody').innerHTML += `
                                <tr>
                                    <td>${i+1}</td>
                                    <td>${newDate}</td>
                                    <td>${viewassets[i]['CategoryCode']}/${viewassets[i]['TypeCode']}/${viewassets[i]['AssetID']}</td>
                                    <td>${viewassets[i]['assetName']}</td>
                                    <td>${viewassets[i]['assetType']}</td>
                                    <td>${viewassets[i]['Status']}</td>
                                    <td>  
                                    <button class='btn btn-submit' onClick="">View</button>
                                    </td> 
                                </tr>`;
            }
        }
    }
    xhr.send();
}