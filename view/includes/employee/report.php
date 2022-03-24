<style>
    form{
        height: 87vh;
    }
    .profile {
        all: revert;
        display: grid;
        grid-template-columns: 1fr 1fr;
        background-color: #F1F4FF;
        overflow:hidden;
        padding: 0px;
        height: 87vh;
    }
    .profile>div {
        background-color: white;
        border-radius: 10px;
    }
    .leftSection,
    .rightSection{
        overflow-y: hidden;
    }


    /* .leftSection::-webkit-scrollbar,
    .rightSection::-webkit-scrollbar{
        display: none;
    } */
    .profile .leftSection {
        display: grid;
        grid-template-rows: 4fr 6fr;
        justify-content: center;
        align-items: center;
        margin: 15px 7.5px 15px 15px;
        padding: 10px;
        
    }
    .leftSection>div {
        /* height: 100%; */
        /* width: 100%; */
    }
    .profileImageSection>img {
        width: 200px;
        border-radius: 0%;
    }
    .leftSection .leftBottom {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        height: 100%;
    }
   
    .profileImageSection {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    #uploadBtn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 150px;
        height: 40px;
        margin: 5px 0px;
        background: #5C6E9B;
        color: #F1F4FF;
        border-radius: 30px;
    }
    #uploadBtn:hover {
        cursor: pointer;
        background-color: #304068;
        transition: .5s;
    }
    /* Form styling */
    .basic-information {
        width: calc(100% - 40px);
        height: calc(100% - 40px);
        display: flex;
        flex-wrap: wrap;
        padding: 10px;
        /* overflow-y:auto; */
        overflow-y:hidden;
        /* justify-content: space-around; */
    }
    .title {
        width: 100%;
        color: #304068;
        font-weight: bolder;
        margin: 10px 0px;
        font-size: 20px;
    }
    .col-f {
        width: 100%;
        color: #5C6E9B;
    }
    .col-f select{
        justify-content: center;
        align-items: center;
        width: calc(94% - 30px);
        border: none;
        background-color: #F1F4FF;
        height: 35px;
        border-radius: 9px;
        padding: 3px 3px;
        margin-top: 10px;
        outline: none;
    }
    .col-h {
        width: 50%;
        color: #5C6E9B;
    }
    .col-btn {
        position: relative;
        text-align: center;
        width: 100%;
        align-items: center;
        margin: 10px 0px;   
    }
    .col-btn>div {
        border-radius: 15px;
        padding: 10px 20px;
        color: white;
        font-size: 16px;
        background-color: #5C6E9B;
        width: 80px;
        max-height: 30px;
        position: relative;
        float: right;
        margin-right: 5px;
    }
    .col-f input[type=text] {
        justify-content: center;
        align-items: center;
        width: calc(100% - 50px);
        border: none;
        background-color: #F1F4FF;
        height: 25px;
        border-radius: 9px;
        padding: 3px 3px;
        /* padding: 8px 15px 8px 15px; */
        margin-top: 10px;
        outline: none;
    }
    .col-h input[type=text] {
        justify-content: center;
        align-items: center;
        width: calc(94% - 30px);
        border: none;
        background-color: #F1F4FF;
        height: 25px;
        border-radius: 9px;
        padding: 3px 3px;
        margin-top: 10px;
        outline: none;
    }
    .textarea{
        justify-content: center;
        align-items: center;
        width: calc(94% - 30px);
        border: none;
        background-color: #F1F4FF;
        /* height: 100px; */
        border-radius: 9px;
        padding: 3px 3px;
        /* padding: 8px 15px 8px 15px; */
        margin-top: 10px;
        outline: none;
    }
    .col-h,
    .col-f>span {
        display: block;
        margin-top: 5px;
    }
    
    .radio-group{
        margin: 5px 0px;
    }
    .radio-group > label { 
        margin-left: 5px;
    }
    .radio-group > input[type=radio]:hover{
        cursor: pointer;
    }
    .col-btn > div:hover {
        cursor: pointer;
        background-color: #304068;
        transition: .5s;
    }
    #pRight{
        background-color: #F1F4FF;
        /* display: grid; */
        /* grid-template-rows: 1fr 1fr; */
        overflow-x: hidden;
    }
    #pRight > div{
        background-color: white;
        border-radius: 10px;
    }
    #pRight > div:nth-child(1){
        margin: 15px 10px 5px 5px;
    }
    #pRight > div:nth-child(2){
        margin: 5px 15px 10px 5px;
    }
    /* .col-btn{
        z-index: 1;
        position: absolute;
        left: 0px;
        bottom: 0px;
        right: calc(0%);
        cursor: pointer;
    } */
        /* CSS for pop-up form */
        .bg-popup {
        width: 100vw;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.8);
        position: absolute;
        top: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        display: none;
        z-index: 10;
        left: 0px;
    }

    .popup-content {
        width: 600px;
        height: 130px;
        background-color: white;
        border-radius: 20px;
        /* text-align: center; */
        padding: 20px;
        position: relative;
    }

    .depInfo {
        text-align: center;
        margin-left: 20px;
        color: #304068;
    }

    .addBtn {
        width: 80px;
        height: 40px;
        background-color: #5C6E9B;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        color: #F1F4FF;
        margin-left: 95vh;
    }

    .addBtn:hover {
        cursor: pointer;
        background-color: #304068;
        transition: .5s;
    }

    .close {
        position: absolute;
        top: 0;
        right: 14px;
        font-size: 50px;
        transform: rotate(45deg);
        cursor: pointer;
        color: #5C6E9B;
    }
</style>


<form action="" id="reportAssetForm" onsubmit="">

    <div class="profile">
        <div id="pLeft" class="leftSection"> 
            <div class="profileImageSection">
                <image src="../Images/lap1.jpg"alt="laptop-1">
            </div>
            <div class="leftBottom">
                <div class="basic-information">
                    <div class="title">Basic Information</div>
                    
                    <div class="col-f">
                        <span for="assetId">Asset ID</span>
                        <input type="text" name="assetID" id="assetID" disabled>
                    </div>
                    <div class="col-f">
                        <span for="assetName">Asset Name</span>
                        <input type="text" name="assetName" id="assetName" disabled>
                    </div>
                    <div class="col-f">
                        <span for="AssetType">Asset Type</span>
                        <input type="text" name="assetType" id="assetType" disabled >
                    </div>
                    <div class="col-f">
                        <span for="category">Asset Category</span>
                        <input type="text" name="category" id="category" disabled >
                    </div>
                    <div class="col-f">
                        <span for="condition">Condition</span>
                        <input type="text" name="condition" id="condition" disabled>
                    </div>
                    
            </div>
        </div>
     </div>
        
        <div id="pRight" class="rightSection">
            <div class="basic-information">
                <div class="title">Report Breakdown:</div>
                <div class="col-f">
                    <span for="defectedParts">Defected Parts</span>
                    <textarea class="textarea" cols="8.5" rows="8.5" id="defP"></textarea>
                </div>
                <div class="col-f">
                    <span for="explainDefect">Explain the defect</span>
                    <textarea class="textarea" cols="10" rows="10" id="exDef"></textarea>
                </div>
                <div class="col-btn">
                        <div id="cancelReport" onClick="cancelReport()">Cancel</div>
                        <div id="reportAsset">Report</div>     
                </div>
            </div>
        </div>
    </div>
</form>

<!-- ===========================pop-up-form========================================= -->
<div class="bg-popup" id="closeForm">
    <div class="popup-content" id="popup-content">
        <div class="close" id="cancelAddTechnician">+</div>
        <h2 class="depInfo">Do you really want to report?</h2>
            <div class="col-btn">
                <button class="addBtn" id="btnSaveDepartment" type="submit">Yes</button>
                <button class="addBtn" id="btnSaveDepartment" type="submit">No</button>
            </div>
    </div>
</div>


<script>

    var assetID = getCookieValue('assetID');  
    console.log('assetdetails'+assetID);
    var asset =   JSON.parse(assetID)[0];  //string to object
    console.log(asset); 
    document.getElementById('assetID').value = asset.CategoryCode + '/' + asset.TypeCode + '/' + asset.AssetID;
    document.getElementById('assetName').value = asset.assetName;
    document.getElementById('assetType').value = asset.assetType;
    document.getElementById('category').value = asset.categoryName;
    document.getElementById('condition').value = asset.AssetCondition;

  
   
    document.querySelectorAll(".col-btn").forEach(button =>{
        const cancelBtn = document.getElementById("cancelReport");
        const reportBtn = document.getElementById("reportAsset");
        button.addEventListener('click',function(event){
            //event.preventDefault();
            switch (event.target.id) {                      
                case 'cancelReport':
                   
                    break;
                case 'reportAsset':
                   const report = getFormdata(asset.AssetID);   

                   if(report == null){
                     alert('Fields cannot be empty');
                   }else{
                    saveReport(report);
                   }
                    break;
            
                default:
                    break;
            }
        
        
        })
    })

    function getFormdata(id){
        assetID = id;
        defectedPart =  document.getElementById('defP').value;
        explainDefect = document.getElementById('exDef').value;

        if(defectedPart == "" || explainDefect == "")
        {
            return null;
        }   
        var reportdata = {
            assetID:assetID,
            defP:defectedPart,
            exDef: explainDefect

        }

        return reportdata;
    }

    
     
    function saveReport(report){
        postData('http://localhost/assetpro/breakdown/reportBreakdown' , report , (response) =>{
            console.log(response);
        })
    }

   function cancelReport(){
    loadSection('centerSection','assignedAssets');
   }


   //JS for pop-up form
   document.getElementById('reportAsset').addEventListener('click',
        function popForm() {
            document.querySelector('.bg-popup').style.display = 'flex';
        });

    function popForm() {
        document.getElementById('bg-popup').style.display = 'flex';
    }

    document.querySelector('.close').addEventListener('click',
        function popForm() {
            document.querySelector('.bg-popup').style.display = 'none';
        });
</script>