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
        overflow-y: auto;
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
        font-size: 18px;
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
        height: 250px;
        border-radius: 9px;
        padding: 3px 3px;
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
        display: grid;
        grid-template-rows: 1fr 1fr;
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
    .col-btn{
        z-index: 1;
        position: absolute;
        left: 0px;
        bottom: 0px;
        right: calc(0%);
        cursor: pointer;
    }
</style>


<form action="" id="reportAssetForm" onsubmit="">

    <div class="profile">
        <div id="pLeft" class="leftSection scrollBar"> 

            <div class="profileImageSection">
                <image src="../Images/lap1.jpg"alt="laptop-1">
            </div>

            <div class="leftBottom">
                <div class="basic-information">

                    <div class="title">Basic Information</div>

                    <!-- <div class="col-h">
                        <span for="errorId">Error ID</span>
                        <input type="text" name="errorId" id="errorId" value="D/FA/2346">
                    </div> -->
                    
                    <div class="col-f">
                        <span for="assetId">Asset ID</span>
                        <input type="text" name="assetID" id="assetID" >
                    </div>
                   
                    <div class="col-f">
                        <span for="assetName">Asset Name</span>
                        <input type="text" name="assetName" id="assetName" value="Lenovo Laptop">
                    </div>

                    <div class="col-f">
                        <span for="AssetType">Asset Type</span>
                        <input type="text" name="assetType" id="assetType"  value="Fixed Asset" >
                    </div>

                    <div class="col-f">
                        <span for="category">Asset Category</span>
                        <input type="text" name="category" id="category" value="Electronic" >
                    </div>

                    <div class="col-f">
                        <span for="condition">Condition</span>
                        <input type="text" name="condition" id="condition"  value="Brand New">
                    </div>

                    <!-- <div class="col-f">
                        <span for="purchaseDate">Purchase Date</span>
                        <input type="text" name="purchaseDate" id="purchaseDate" value="2018/07/09" >
                    </div> -->
            </div>
        </div>
    </div>

        
        <div id="pRight" class="rightSection">
            <div class="basic-information">

                <div class="title">Report Breakdown:</div>

                <div class="col-f">
                    <span for="defectedParts">Defected Parts</span>
                    <textarea class="textarea" cols="" rows="" id="defP"></textarea>
                </div>

                <div class="col-f">
                    <span for="explainDefect">Explain the defect</span>
                    <textarea class="textarea" cols="" rows="" id="exDef"></textarea>
                </div>

               
                <div class="col-btn">
                        <div id="cancelReport" onClick="cancelReport()">Cancel</div>
                        <div id="reportAsset">Report</div>     
                </div>
                  

            </div>
        </div>
    </div>

</form>


<script>
    document.querySelectorAll(".col-btn").forEach(button =>{
        const cancelBtn = document.getElementById("cancelReport");
        const reportBtn = document.getElementById("reportAsset");
        button.addEventListener('click',function(event){
            //event.preventDefault();
            switch (event.target.id) {                       //event triggered when clicking the report btn
                case 'cancelReport':
                   
                    break;
                case 'reportAsset':
                   const report = getFormdata();   

                //    for (var pair of report.entries()) 
                //    {
                //    console.log(pair[0] + ': ' + pair[1]);
                //    }
                   
                   if(report == null)
                   {
                     alert('Fields cannot be empty');
                   }
                   else
                   {
                    saveReport(report);
                   }
                   
                    break;
            
                default:
                    break;
            }
        
        
        })
    })

    function getFormdata(){
        reportForm = new FormData(document.getElementById('reportAssetForm'));
        //console.log(reportForm);

        defectedPart =  document.getElementById('defP').value;
        reportForm.append('defP',defectedPart);

        explainDefect = document.getElementById('exDef').value;
        reportForm.append('exDef',explainDefect);
        console.log(reportForm);

        if(defectedPart == "" || explainDefect == "")
        {
            return null;
        }
        

        return reportForm;
    }
    

    // function checkBlank() {
    //     if( defectedPart && explainDefect== 0)
    //     {
    //     alert("empty");
    //      }
    // }


    function saveReport(report){
        var xhr = new XMLHttpRequest();
        xhr.open("POST","../model/Report.php?action=reportBreakAsset",true);    //POST
        
        xhr.onload = function(){
            if(this.status === 200){
                alert(this.responseText);
            }
        }
        xhr.send(report);
    }



   function cancelReport(){

    loadSection('centerSection','assignedAssets');

     //console.log(report);
   }
   
    
    //  cancelBtn.addEventListener('click',function(){
        
    //     loadSection('centerSection','report');
        
    // });



</script>




                    