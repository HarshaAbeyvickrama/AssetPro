<style>
    form {
        height: 90%;
        width: 90%;
        border-radius: 15px;
    }

    .profile {
        all: revert;
        display: grid;
        grid-template-columns: 1fr 1fr;
        background-color: #F1F4FF;
        overflow: hidden;
        padding: 0px;
        height: 90vh;
        border-radius: 15px;
    }

    .profile > div {
        background-color: white;
        border-radius: 10px;

    }

    .leftSection,
    .rightSection {
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


    .leftSection > div {
        /* height: 100%; */
        /* width: 100%; */
    }

    .profileImageSection > img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
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
        display: none;
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
        position: relative !important;
        text-align: center;
        width: auto !important;
        /*border: 1px solid red;*/
        background-color: transparent;
        padding: 10px;
        margin: 10px 15px 15px 15px !important;

    }

    .col-btn > div {
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

    .col-f input[type=text],
    input[type=number],
    input[type=date] {
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

    .col-h input[type=text],
    input[type=number],
    input[type=date] {
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

    .shortInput {
        width: 35% !important;
        margin-left: 5px;
        margin-right: 5px;
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
        display: grid;
        grid-template-rows: 1fr 1fr;
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

    /*.col-btn {*/
    /*    z-index: 1;*/
    /*    position: absolute;*/
    /*    left: 0px;*/
    /*    bottom: 0px;*/
    /*    right: calc(50%);*/
    /*}*/
</style>
<script>
    // ViewAsset.php
    //=================================================== Variables ===================================================

    var assetID = getCookieValue('assetID'); //current selected asset's ID
    var categorySelect = element('category'); //The category dropdown element
    var imageUpload = element('image'); // Image element
    var depreciation = element('depreciation'); // Depreciation checkbox
    var warranty = element('warranty'); //Warranty checkbox

    //=================================================== Function calls on load ===================================================

    loadCategories(); //Load all the asset categories
    setISEditing(false); //Set editing to false
    getData(`http://localhost/assetpro/asset/get/${assetID}`, populateData); // Load data and populate

    //=================================================== Listeners ===================================================

    //To change the type according to the category selected
    categorySelect.addEventListener('change', function (event) {
        setTypes(categorySelect.value);
    })

    //Cancel edit button
    element('cancelEditAsset').addEventListener('click', () => {
        setISEditing(false);
    });

    //Edit asset button
    element('btnEditAsset').addEventListener('click', () => {
        setISEditing(true);
    });

    //Update asset button
    element('btnUpdateAsset').addEventListener('click', () => {
        const message = "Are you sure you want to update this asset?";
        if (showConfirmation(message)) {
            const image = document.getElementById('image').files[0];
            let editedAssetDetails = getFormData('addAssetForm');
            const formData = new FormData();
            editedAssetDetails['assetID'] = assetID;

            editedAssetDetails['depreciation'] = "depreciation" in editedAssetDetails;
            editedAssetDetails['warranty'] = "warranty" in editedAssetDetails;
            if (!("otherInfo" in editedAssetDetails)) {
                editedAssetDetails['otherInfo'] = '';
            }
            formData.append('image', image);
            console.log(editedAssetDetails);
            formData.append('editedAssetDetails', JSON.stringify(editedAssetDetails));

            postFiles('http://localhost/assetpro/asset/update/', formData, (result) => {
                if(result.isSuccess){
                    alert("Asset updated successfully");
                }else {
                    alert("Asset updating failed");
                }
            })

        } else {
            console.log('no update');
        }

        // setISEditing(false);
    });

    //Set the uploaded image as preview
    imageUpload.addEventListener('change', () => {
        const image = imageUpload.files[0];
        if (image) {
            var src = URL.createObjectURL(image);
            element('imagePreview').src = src;
        }
    })

    //Depreciation enable / disable
    depreciation.addEventListener('change', function () {
        assetFormState('depreciationMethod', !depreciation.checked);
        assetFormState('depreciationRate', !depreciation.checked);
        assetFormState('residualValue', !depreciation.checked);
        assetFormState('usefulYears', !depreciation.checked);
    })

    //Warranty enable / disable
    warranty.addEventListener('change', function () {
        assetFormState('fromDate', !warranty.checked);
        assetFormState('toDate', !warranty.checked);
        assetFormState('otherInfo', !warranty.checked);
    })

</script>

<form action="" id="addAssetForm">

    <div class="profile">
        <div id="pLeft" class="leftSection scrollBar">
            <div class="profileImageSection">
                <img src="../Images/addImage.png" alt="" id="imagePreview">
                <input type="file" name="image" id="image" hidden>
                <label for="image" id="uploadBtn">Choose Image</label>
            </div>
            <div class="leftBottom">
                <div class="basic-information">
                    <div class="title">Basic Information</div>

                    <div class="col-f">
                        <span for="assetID">Asset ID</span>
                        <input type="text" name="assetID" id="assetID">
                    </div>
                    <div class="col-f">
                        <span for="assetName">Asset Name</span>
                        <input type="text" name="assetName" id="assetName">
                    </div>

                    <div class="col-f">
                        <span for="assetDescription">Asset Description</span>
                        <input type="text" name="assetDescription" id="assetDescription">
                    </div>
                    <div class="col-f">
                        <span for="category">Category</span>
                        <select name="category" id="category">

                        </select>
                    </div>
                    <div class="col-f">
                        <span for="assetType">Asset Type</span>
                        <select name="assetType" id="assetType">
                        </select>
                    </div>

                    <div class="col-f">
                        <span for="condition">condition</span>
                        <select name="condition" id="condition">
                            <option value="Brand New">Brand New</option>
                            <option value="Used">Used</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div id="pRight" class="rightSection scrollBar">
            <div id="rightTop">
                <div class="basic-information">
                    <div class="col-f">
                        <span for="purchaseDate">Purchase Date</span>
                        <input type="date" name="purchaseDate" id="purchaseDate">
                    </div>
                    <div class="col-f">
                        <span for="purchaseCost">Purchase Cost</span>
                        <input type="number" name="purchaseCost" id="purchaseCost">
                    </div>

                    <div class="title" for="warranty">Warranty <input type="checkbox" name="warranty" id="warranty">
                    </div>

                    <div class="col-f">
                        <span for="warrantyPeriod">Warranty Period</span>
                        <label for="fromDate">From</label><input class="shortInput" type="date" name="fromDate"
                                                                 id="fromDate">
                        <label for="toDate">To</label><input class="shortInput" type="date" name="toDate" id="toDate">
                    </div>
                    <div class="col-f">
                        <span for="otherInfo">Other Information</span>
                        <input type="text" name="otherInfo" id="otherInfo">
                    </div>
                </div>

            </div>

            <div id="depreciationSection">
                <div class="basic-information">
                    <div class="title" for="depreciation">Depreciation <input type="checkbox" name="depreciation"
                                                                              id="depreciation"></div>
                    <div class="col-f">
                        <span for="depreciationMethod">Depreciation Method</span>
                        <select name="depreciationMethod" id="depreciationMethod">
                            <option value="Straight Line">Straight Line Method</option>
                        </select>
                    </div>
                    <div class="col-f">
                        <span for="depreciationRate">Depreciation Rate</span>
                        <input type="number" name="depreciationRate" id="depreciationRate" step=".01">
                    </div>
                    <div class="col-f">
                        <span for="residualValue">Residual Value</span>
                        <input type="number" name="residualValue" id="residualValue">
                    </div>
                    <div class="col-f">
                        <span for="usefulYears">Useful Years</span>
                        <input type="number" name="usefulYears" id="usefulYears" step="1">
                    </div>
                </div>
            </div>
            <div class="col-btn">
                <div id="btnEditAsset">Edit</div>
                <div id="btnUpdateAsset">Update</div>
                <div id="cancelEditAsset">Cancel</div>
            </div>
        </div>

    </div>
    </div>

</form>