<style>
    .overviewLayout {
        display: grid;
        grid-template-rows: 0.75fr 1.5fr 0.75fr 7fr;
        height: 82vh;
        width: 87.5vw;
        overflow-y: auto;
        padding: 20px;
        background-color: #F1F4FF;
    }

    .overviewLayout>div {
        display: flex;
        align-items: center;
        color: #304068;
        font-size: 24px;
        font-weight: bold;

    }

    .statSection {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        width: 100%;
        height: 100%;
    }

    .statSection>div {
        width: 100%;
        height: 100%;
        display: flex;
        /* justify-content: center; */
        align-items: center;
    }

    .statBox {
        display: grid;
        grid-template-rows: 3fr 2fr;
        color: white;
        height: 95%;
        width: 90%;
        border-radius: 12px;
    }

    .statBox>div {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .statNumber {
        font-size: 40px;
    }

    .statText {
        font-size: 17px;
        font-weight: lighter;
    }

    .box1 {
        background-color: #304068;
    }

    .box2 {
        background-color: #6A71D7;
    }

    .box3 {
        background-color: #3D7DDB;
    }

    .box4 {
        background-color: #6165A2;
    }

    .box5 {
        background-color: #4E74AB;
    }

    .contentSection {
        background-color: white;
        border-radius: 15px;
        padding: 15px;
        width: 100%;
        height: 100%;
    }

    /*inside content section*/
    .econtainer1 {
        width: 100%;
        height: 100%;
        display: grid;
        grid-template-columns: 2fr 14fr 2fr 1fr;

    }

    #reportbtn {
        color: white;
        background-color: #5C6E9B;
        padding: 10px;
        border: none;
        border-radius: 32px;
        width: 100px;
        height: 49px;
        cursor: pointer;
        font-size: 15px;
    }

    /*------------------------------------------modified one ----------------------------------*/
    .table {
        display: table;
        width: 100%;
        margin: 10px 0px;
        color: #5C6E9B;
        overflow-y: hidden !important;


    }

    .tableHeader {
        width: 100%;
        display: table-header-group;
        font-size: 19px;
        padding: 15px;
        font-weight: bold;
        overflow-y: hidden !important;

    }

    .tableHeader>div {
        display: table-cell;
    }

    .table .tableRowGroup {
        display: table-row-group;
        overflow-y: auto !important;

    }

    .tableRow {
        display: table-row;
    }

    .tableCell {
        display: table-cell;
    }

    .tableRowGroup .tableRow:hover {
        cursor: pointer;
        background-color: wheat;
    }

    /* Table overflow */
    .tableRowGroup {
        overflow-y: auto;
    }

    .tableRow .tableCell {
        padding: 10px 0px;

    }

    .tableRow>div {
        display: table-cell;
        padding: 10px 0px;
    }

    .tableRow>div:first-of-type {
        text-align: center;
    }

    .tableHeader>div:first-of-type {
        text-align: center;
    }
</style>


<div class="overviewLayout">
    <div>
        <div>Dashboard Overview</div>
    </div>
    <div class="statSection">
        <div>
            <div class="statBox box1" id="allAssets">
                <div class="statNumber">100</div>
                <div class="statText">All Assets</div>
            </div>
        </div>

        <div>
            <div class="statBox box2" id="allEmployees">
                <div class="statNumber">70</div>
                <div class="statText">Tangible Assets</div>
            </div>
        </div>

        <div>
            <div class="statBox box3" id="allTechnicians">
                <div class="statNumber">40</div>
                <div class="statText">Fixed Assets</div>
            </div>
        </div>

        <div>
            <div class="statBox box4" id="allAssets">
                <div class="statNumber">30</div>
                <div class="statText">Consumable Assets</div>
            </div>
        </div>

        <div>
            <div class="statBox box5" id="allAssets">
                <div class="statNumber">30</div>
                <div class="statText">Intangible Assets</div>
            </div>
        </div>


    </div>

    <div>
        <div>Recent Activities</div>
    </div>

    <div class="contentSection">
        <!-- <div class="econtainer1">  -->
        <div class="table">
            <div class="tableHeader">
                <div>Number</div>
                <div>Asset ID</div>
                <div>Asset Name</div>
                <div>Asset Type</div>
                <div>ReportBreakdown</div>
            </div>


            <div class="tableRowGroup" id="allAssetsEmp">



            </div>
        </div>
    </div>
</div>




<script>
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "../model/AssignedAssetsEmp.php?action=getAssets", true);

    xhr.onload = function() {
        if (this.status === 200) {
            var assets = JSON.parse(this.responseText);
            console.log(assets);
            for (var i = 0; i < assets.length; i++) {
                document.getElementById('allAssetsEmp').innerHTML += `
                                <div class="tableRow">
                                    <div>${i+1}</div>
                                    <div>${assets[i]['AssetID']}</div>
                                    <div>${assets[i]['assetName']}</div>
                                    <div>${assets[i]['assetType']}</div>

                                    <div>  
                                    <p><button id='reportbtn' onClick="report(${assets[i]['AssetID']})">Report</button></p>
                                    </div> 

                                </div>`;
            }
        }
    }

<<<<<<< HEAD
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.send();

    function report(asset) {
        var assetDetails = null;
        const xhr = new XMLHttpRequest();
        xhr.open('GET', '');
        xhr.onload = () => {
            if (this.status == 200) {
=======
        xhr.setRequestHeader("Content-type", "application/json");
        xhr.send();


        
    function report(asset){
        var assetDetails=null;
        const xhr = new XMLHttpRequest();
        xhr.open('GET',`../model/AssignedAssetsEmp.php?action=getAssignedAssetById&asset_id=${asset}`,true);
        xhr.onload = function(){
            if(this.status == 200){
>>>>>>> upstream/main
                assetDetails = JSON.parse(this.responseText);
                test(assetDetails);
        }
<<<<<<< HEAD
        xhr.send();
        loadSection('centerSection', 'report');

        if (!null) {
            document.getElementById('assetID').innerhtml = assetDetails.assetId;
        }

        console.log(asset);

    }
=======
        
     }

      

       function test(assetDetails){
             console.log(assetDetails);

             loadSection('centerSection','report');

             
        var testone = document.getElementById('assetID');
        testone.value= assetDEtails['asset_id'];
         console.log();

           
       }

         xhr.send();



        console.log(asset);
    }


   


    
>>>>>>> upstream/main
</script>






<!--Report button click to report.php-->

<!-- <script>
    var reportbtn = document.getElementById('reportbtn');
    reportbtn.addEventListener('click',function(){

        console.log('looooooaddd plzz');
        loadSection('centerSection','report');
        
    
    });
</script> -->