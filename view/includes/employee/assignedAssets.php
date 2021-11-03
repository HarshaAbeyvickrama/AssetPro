<style>
    /* .overviewLayout{
        display: grid;  
    }
    .overviewLayout > div{
        display: grid;
        align-items: center;
        color: #304068;
        font-size: 24px;
        font-weight: bold;
    }
    .overviewLayout .contentSection{
        all: revert;
        display: inline-block;
        border-radius: 15px;
        padding: 10px;
        background-color: white;
        overflow-y: auto;
    }
    .contentSection > div{
        margin:15px;
        height: auto;
    } */
    .btnAction{
        color: white;
        background-color: #5C6E9B;
        padding: 10px;
        border: none;
        border-radius: 32px;
        width: 80px;
        height: 40px;
        cursor: pointer;
        font-size: 15px;
        align-items:center;
    }
    .btnAction:hover{
        color: black;
        background-color: white;
    }
    .hidden {
        display: none;
    }   
</style>
<label>
    <span>Search:</span>
    <input placeholder="Enter search term" type="search" id="searchInput">
</label>

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
                        <th>Report Breakdown</th>
                    </tr>
                </thead>
                <tbody id="employeeTableBody"></tbody>
            </table>
    </div>
</div>


<script>
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
<script>
const searchInput = document.getElementById('searchInput')
const table = document.getElementById('filterTable')
const trArray = Array.prototype.slice.call(table.querySelectorAll('tbody tr'))

const filterTable = event => {
  const searchTerm = event.target.value.toLowerCase()
  trArray.forEach(row => {
    row.classList.add('hidden')
    const tdArray = Array.prototype.slice.call(row.getElementsByTagName('td'))
    tdArray.forEach(cell => {
      if (cell.innerText.toLowerCase().indexOf(searchTerm) > -1) {
        row.classList.remove('hidden')
      } 
    })
  })
}

searchInput.addEventListener('keyup', filterTable, false)
</script>

