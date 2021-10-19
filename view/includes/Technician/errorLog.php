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
    .upSection,
    .bottomSection{
        overflow-y: auto;
    }
    /* .upSection::-webkit-scrollbar,
    .rightSection::-webkit-scrollbar{
        display: none;
    } */

    .profile .upSection {
        display: grid;
        grid-template-rows: 4fr 6fr;
        justify-content: center;
        align-items: center;
        margin: 15px 7.5px 15px 15px;
        padding: 10px;
        
    }


    .upSection>div {
        /* height: 100%; */
        /* width: 100%; */
    }

    .profileImageSection>img {
        width: 200px;
        border-radius: 0%;
    }

    .upSection .upRight {
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


<form action="" id="errorlogForm" onsubmit="">

    <div class="profile">
        <div id="pUp" class="upSection scrollBar"> 

            <div class="profileImageSection">
                <image src="../Images/lap1.jpg" alt="laptop-1">
            </div>

            <div class="upRight">
                <div class="basic-information">

                    <div class="title"> Basic Information: </div>

                    <div class="col-h">
                        <span for="errorId"> Error ID: </span>
                        <input type="text" name="errorId" id="errorId" value="D/FA/12345">
                    </div> 
                    
                    <div class="col-f">
                        <span for="assetId"> Asset ID: </span>
                        <input type="text" name="assetID" id="assetID" value="FA/12345">
                    </div>
                   
                    <div class="col-f">
                        <span for="assetName"> Asset Name: </span>
                        <input type="text" name="assetName" id="assetName" value="Asus Laptop">
                    </div>

                    <div class="col-f">
                        <span for="condition"> Condition:</span>
                        <input type="text" name="condition" id="condition"  value="Brand New">
                    </div>

                    <div class="col-f">
                        <span for="purchaseDate"> Purchase Date: </span>
                        <input type="text" name="purchaseDate" id="purchaseDate" value="2018/07/09" >
                    </div>

                    <div class="col-f">
                        <span for="AssetType"> Asset Type: </span>
                        <input type="text" name="assetType" id="assetType" value="Fixed Asset">
                    </div>

                    <div class="col-f">
                        <span for="category"> Asset Category: </span>
                        <input type="text" name="category" id="category" value="Electronic" >
                    </div>
            </div>
        </div>
    </div>

    <div>
        <div> Error Log: </div>
    </div>
    <div class="contentSection scrollbar">

        <div class="oldActivities">
            <div class="recentTitle">   </div>

            <div class="recentActivityTable table">
                <div class="tableHeader">
                    <div class="tableCell"> Number </div>
                    <div class="tableCell"> Asset ID </div>
                    <div class="tableCell"> Error ID </div>
                    <div class="tableCell"> Asset Name </div>
                    <div class="tableCell"> Last repaired </div>
                    <div class="tableCell"> Technician </div>
                    <div class="tableCell"> MTTR </div>
                    <div class="tableCell"> Cost(Rs) </div>
                </div>
                <div class="tableRowGroup">
                    <div class="tableRow">
                        <div class="tableCell"> 1 </div>
                        <div class="tableCell"> FA/12345 </div>
                        <div class="tableCell"> D/FA/12345 </div>
                        <div class="tableCell"> Laptop </div>
                        <div class="tableCell"> 2021/02/20 </div>
                        <div class="tableCell"> Dinithi Upeksha </div>
                        <div class="tableCell"> 2 days </div>
                        <div class="tableCell"> 10,000 </div>
                    </div>
                    <div class="tableRow">
                        <div class="tableCell"> 2 </div>
                        <div class="tableCell"> FA/12346 </div>
                        <div class="tableCell"> D/FA/12346 </div>
                        <div class="tableCell"> Printer </div>
                        <div class="tableCell"> 2020/04/10 </div>
                        <div class="tableCell"> Nayana Kalhara </div>
                        <div class="tableCell"> 3 days </div>
                        <div class="tableCell"> 15,050 </div>
                    </div>
                    <div class="tableRow">
                        <div class="tableCell"> 3 </div>
                        <div class="tableCell"> FA/12347 </div>
                        <div class="tableCell"> D/FA/12347 </div>
                        <div class="tableCell"> Scanner </div>
                        <div class="tableCell"> 2020/03/08 </div>
                        <div class="tableCell"> Awantha Kanakarathnam </div>
                        <div class="tableCell"> 7 days </div>
                        <div class="tableCell"> 42,560 </div>
                    </div>
                    <div class="tableRow">
                        <div class="tableCell"> 4 </div>
                        <div class="tableCell"> CA/22345 </div>
                        <div class="tableCell"> D/CA/22345 </div>
                        <div class="tableCell"> Monitor </div>
                        <div class="tableCell"> 2020/02/11 </div>
                        <div class="tableCell"> Kasun Chamika </div>
                        <div class="tableCell"> 1 day </div>
                        <div class="tableCell"> 2,500 </div>
                    </div>
                    <div class="tableRow">
                        <div class="tableCell"> 5 </div>
                        <div class="tableCell"> CA/22346 </div>
                        <div class="tableCell"> D/CA/22346 </div>
                        <div class="tableCell"> Web Cam </div>
                        <div class="tableCell"> 2019/05/24 </div>
                        <div class="tableCell"> Muzni Ahamed </div>
                        <div class="tableCell"> 5 days </div>
                        <div class="tableCell"> 14,980 </div>
                    </div> 
                    <div class="col-btn">
                        <div class="sendfbBtn btnAction" id="sendFeedback"> Finish </div>
                        <div class="cancBtn btnAction" id="cancelEdit"> Back </div>
                </div>     
                   
                </div>
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
    
    formState("errorlogForm",true);

    document.querySelectorAll(".col-btn").forEach(button =>{
        const finishBtn = document.getElementById("finish");
        const backBtn = document.getElementById("back");
        button.addEventListener('click',function(event){
            switch (event.target.id) {
                case 'finish':
                    formState("errorlogForm",true);
                    finishBtn.style.display = 'none';
                    backBtn.style.display = 'none';
                    
                    
                    break;
                case 'back':
                    finishBtn.style.display = 'block';
                    formState("reportBreakdownForm",false);
                    break;
            
                default:
                    break;
            }
        
        
        })
    })
       
</script>