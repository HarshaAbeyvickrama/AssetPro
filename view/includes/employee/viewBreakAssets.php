<style>
    form {
        height: 87vh;
    }

    .profile {
        all: revert;
        display: grid;
        grid-template-columns: 1fr 1fr;
        background-color: #F1F4FF;
        overflow: hidden;
        padding: 0px;
        height: 87vh;
    }

    .profile > div {
        background-color: white;
        border-radius: 10px;
    }

    .leftSection,
    .rightSection {
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

    .leftSection > div {
        /* height: 100%; */
        /* width: 100%; */
    }

    .profileImageSection > img {
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
        overflow-y: hidden;
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

    .col-f select {
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

    .col-btn > div {
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

    .textarea {
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
    .col-f > span {
        display: block;
        margin-top: 5px;
    }

    .radio-group {
        margin: 5px 0px;
    }

    .radio-group > label {
        margin-left: 5px;
    }

    .radio-group > input[type=radio]:hover {
        cursor: pointer;
    }

    .col-btn > div:hover {
        cursor: pointer;
        background-color: #304068;
        transition: .5s;
    }

    #pRight {
        background-color: #F1F4FF;
        /* display: grid; */
        /* grid-template-rows: 1fr 1fr; */
        overflow-x: hidden;
    }

    #pRight > div {
        background-color: white;
        border-radius: 10px;
    }

    #pRight > div:nth-child(1) {
        margin: 15px 10px 5px 5px;
    }

    #pRight > div:nth-child(2) {
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
    #updateBtnSection {
        display: none;
    }
</style>


<form action="" id="BreakAssetForm" onsubmit="">

    <div class="profile">
        <div id="pLeft" class="leftSection">
            <div class="profileImageSection">
                <image src="../Images/lap1.jpg" alt="laptop-1">
            </div>
            <div class="leftBottom">
                <div class="basic-information">
                    <div class="title">Basic Information</div>
                    <!--                    --><?php
                    //                       $txt = $_SESSION['EmployeeID'];
                    //                       echo ($txt);
                    //                    ?>

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
                        <input type="text" name="assetType" id="assetType" disabled>
                    </div>
                    <div class="col-f">
                        <span for="category">Asset Category</span>
                        <input type="text" name="category" id="category" disabled>
                    </div>
                    <div class="col-f">
                        <span for="condition">Condition</span>
                        <input type="text" name="condition" id="condition" disabled>
                    </div>
                </div>
            </div>
        </div>

</form>

<form action="" id="EditForm">
    <div id="pRight" class="rightSection">
        <div class="basic-information">
            <div class="title">Reported Breakdown:</div>
            <div class="col-f">
                <span for="defectedParts">Breakdown ID</span>
                <textarea class="textarea"  id="Bid" name="breakdownid" disabled></textarea>
            </div>
            <div class="col-f">
                <span for="defectedParts">Defected Parts</span>
                <textarea class="textarea" cols="8.5" rows="8.5" id="defP" name="defectedPrt" disabled></textarea>
            </div>
            <div class="col-f">
                <span for="explainDefect">Explain the defect</span>
                <textarea class="textarea" cols="10" rows="10" id="exDef" name="explainDef" disabled></textarea>
            </div>
            <div class="col-btn" id="EditBtnSection">
                <div id="cancelReport" onClick="cancelReport()">Back</div>
                <div id="EditReport">Edit</div>
            </div>
            <div class="col-btn" id="updateBtnSection">
                <div id="ConfirmUpdate">Update</div>
                <div id="Cancelupdate">cancel</div>

            </div>
        </div>
    </div>
</form>
</div>


<script>
    // function getCookieValue(name){
    //         return document.cookie.match('(^|;)\\s*' + name + '\\s*=\\s*([^;]+)')?.pop() || '';
    //     }

    // setIsEditingBreakdown(false);
    document.getElementById('EditReport').addEventListener('click', () => {
        setIsEditingBreakdown(true);
    })

    document.getElementById('Cancelupdate').addEventListener('click', () => {
        setIsEditingBreakdown(false);
    })

    var breakdownID = getCookieValue('BreakdownID');
    var breakdown = JSON.parse(breakdownID)[0]; //string to object
    // console.log(breakdown);
    document.getElementById('assetID').value = breakdown.CategoryCode + '/' + breakdown.TypeCode + '/' + breakdown.AssetID;
    document.getElementById('assetName').value = breakdown.assetName;
    document.getElementById('assetType').value = breakdown.assetType;
    document.getElementById('category').value = breakdown.categoryName;
    document.getElementById('condition').value = breakdown.AssetCondition;
    document.getElementById('defP').value = breakdown.DefectedParts;
    document.getElementById('exDef').value = breakdown.Reason;
    document.getElementById('Bid').value = breakdown.BreakdownID;
    //Getting the breakdownID
    // var BreakId = breakdown.BreakdownID;


    function cancelReport() {
        loadSection('centerSection', 'reportedBreakdown');
    }

//=============updating the data by clicking the update button==========
    document.querySelectorAll(".col-btn").forEach(button =>{
        const updateBtn = document.getElementById("ConfirmUpdate");
        const cancelBtn = document.getElementById("Cancelupdate");
        button.addEventListener('click',function(event){
            switch (event.target.id) {
                case 'Cancelupdate':

                    break;
                case 'ConfirmUpdate':
                    const updateData = getFormData('EditForm');
                    const Bid = element('Bid').value;
                    console.log(Bid);
                    updateData.append('BID' , Bid);

                    saveUpdate(updateData);
                    // if(updateData == null){
                    //     alert('Fields cannot be empty');
                    // }
                    // else {
                    //     const result = showConfirmation('Are you really want to report?');
                    //     if (result == true) {
                    //         saveUpdate(updateData);
                    //         alert('Successfully Reported!');
                    //     } else {
                    //         alert('Breakdown was not recorded!');
                    //     }
                    // }
            }

        })
    })

    // function getFormdata(breakdownid){
    //     breakdownI = breakdownid;
    //     defectedPart =  document.getElementById('defP').value;
    //     explainDefect = document.getElementById('exDef').value;
    //
    //     // if(defectedPart == "" || explainDefect == "")
    //     // {
    //     //     return null;
    //     // }
    //     var updatedata = {
    //         breakdownid:breakdownID2,
    //         defP:defectedPart,
    //         exDef: explainDefect
    //
    //     }
    //     return updatedata;
    //
    // }

    function saveUpdate(updateData){
        postData('http://localhost/assetpro/breakdown/updateAllBreakdowns' , updateData , (response) =>{
            // console.log(response);
        })
    }

</script>