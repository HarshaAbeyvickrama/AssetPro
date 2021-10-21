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
        position: relative;
    }
 
 
    .tableRowGroup .tableRow:hover {
        cursor: pointer;
        background-color: wheat;
 
    }
 
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
 
    .tableRow .btn {
        border: 0;
        background: #5C6E9B;
        padding: 10px 20px;
        color: #fff;
        border-radius: 15px;
        cursor: pointer;
        transition: 0.2s ease;
    }
 
    .tableRow .btn:focus {
        border: 0;
        background: #5C6E9B;
        transform: scale(0.97);
    }
 
    .cell-center {
        text-align: center;
        width: 20%;
    }
 
    .tableHeader>div:first-of-type {
        text-align: center;
</style>


<form action="" id="errorLogForm" onsubmit="">

    <div class="profile">
        <div id="pLeft" class="leftSection scrollBar"> 

            <div class="profileImageSection">
                <image src="../Images/lap1.jpg"alt="laptop-1">
            </div>

            <div class="leftBottom">
                <div class="basic-information">

                    <div class="title">Basic Information</div>

                    <div class="col-h">
                        <span for="assetId"> Error ID : </span>
                        <input type="text" name="assetID" id="assetID" value="FA/12345" >
                    </div>
                    
                    <div class="col-h">
                        <span for="assetId"> Asset ID : </span>
                        <input type="text" name="assetID" id="assetID" value="FA/12345" >
                    </div>
                   
                    <div class="col-f">
                        <span for="assetName"> Asset Name: </span>
                        <input type="text" name="assetName" id="assetName" value="Asus Laptop">
                    </div>

                    <div class="col-f">
                        <span for="condition"> Condition: </span>
                        <input type="text" name="condition" id="condition"  value="Brand New">
                    </div>

                    <div class="col-f">
                        <span for="purchaseDate"> Purchase Date: </span>
                        <input type="text" name="purchaseDate" id="purchaseDate" value="" >
                    </div>

                    <div class="col-f">
                        <span for="AssetType"> Asset Type: </span>
                        <input type="text" name="assetType" id="assetType"  value="Fixed Asset" >
                    </div>

                    <div class="col-f">
                        <span for="category"> Asset Category: </span>
                        <input type="text" name="category" id="category" value="Electronic" >
                    </div>
            </div>
        </div>
    </div>

        
        <div id="pRight" class="rightSection">
            <div class="basic-information">

                <div class="title"> Error Log: </div>

                <div class="col-f">
                    <span for="defectedParts"> Defected Parts: </span>
                    <textarea class="textarea" cols="" rows="" id="defP"></textarea>
                </div>

                <div class="col-f">
                    <span for="explainDefect"> Identified Defect: </span>
                    <textarea class="textarea" cols="" rows="" id="exDef"></textarea>
                </div>

               
                <div class="col-btn">
                    <div class="commenceBtn btnAction" id="commence"> Commence </div>
                    <div class="errlogBtn btnAction" id="errorLog"> Error Log </div>     
                </div>

            </div>
        </div>
    </div>

</form>

<script>

    // Enable / Disable the form fields

    // formID = the Id of the form that should be diabled
    // readonlyState ---->
    //      true --> form disabled 
    //      false --> form enabled 
    
    function formState(formId,readonlyState){
        const form = document.getElementById(formId);
        var elements = form.elements;
        var len = elements.length;
        for(var i=0; i<len; ++i){
            elements[i].disabled=readonlyState;
        }
        document.getElementById("uploadBtn").disabled=readonlyState;
    
    }
    
    formState("viewReportBreakdownForm",true);

    document.querySelectorAll(".col-btn").forEach(button =>{
        const commenceBtn = document.getElementById("commence");
        const errlogBtn = document.getElementById("errorLog");
        button.addEventListener('click',function(event){
            switch (event.target.id) {
                case 'commence':
                    formState("viewReportBreakdownForm",true);
                    commenceBtn.style.display = 'none';
                    errlogBtn.style.display = 'none';
                    
                    
                    break;
                case 'errorLog':
                    errlogBtn.style.display = 'block';
                    commenceBtn.style.display = 'block';
                    formState("viewReportBreakdownForm",false);
                    break;
            
                default:
                    break;
            }
        
        
        })
    })
       
</script>