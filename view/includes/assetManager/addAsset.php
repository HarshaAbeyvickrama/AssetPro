<style>
    .profile {
        display: grid;
        grid-template-columns: 1fr 1fr;
        background-color: #F1F4FF;
    }

    .profile>div {
        /* margin: 15px; */
        background-color: white;
        border-radius: 10px;
        /* padding: 10px; */

    }

    .leftSection {
        display: grid;
        grid-template-rows: 4fr 6fr;
        align-items: center;
        justify-content: center;
        background-color: forestgreen;
        margin: 15px 7.5px 15px 15px;
        padding: 10px;

    }

    .rightSection {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: forestgreen;
        margin: 15px 15px 15px 7.5px;
        padding: 10px;
    }

    .leftSection>div {
        /* height: 100%; */
        /* width: 100%; */
    }

    .profileImageSection>img {
        width: 200px;
        border-radius: 50%;
    }

    .rightSection {
        /* border: 1px solid black; */
    }

    .leftSection .leftBottom {
        all: revert;
        display: flex;
        width: 100%;
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
    }

    .col-f {
        width: 100%;
        color: #5C6E9B;
    }

    .col-h {
        width: 50%;
        color: #5C6E9B;
    }

    .col-btn {
        position: relative;
        border: 1px solid green;
        text-align: center;
        width: 100%;
        align-items: center;
        
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

    .col-h,
    .col-f>span {
        display: block;
    }

    .leftSection>div {}

    #email,
    #dob,
    #maritalStatus {
        width: calc(97% - 30px);
        border: none;
        background-color: #F1F4FF;
        height: 25px;
        border-radius: 9px;
        margin-top: 10px;
        outline: none;
        padding: 3px 3px;
    }
    
    /* #gender {
        margin-bottom: 10px;
    } */

    /* .editBtn,
    .delBtn {
        width: 80px;
        height: 40px;
        background-color: #5C6E9B;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        color: #F1F4FF;
        margin-left: 70vh;
    } */

    .col-btn > div:hover {
        cursor: pointer;
        background-color: #304068;
        transition: .5s;
    }

    /* .saveBtn,
    .cancBtn {
        width: 80px;
        height: 40px;
        background-color: #5C6E9B;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        color: #F1F4FF;
        margin-left: 70vh;
    } */
    /* .BtnGroup{
        border: 1px solid red;
        display: block;
        position: relative;
        float: left;
    } */

</style>
<form action="" id="userProfileForm">

    <div class="profile">
        <div id="pLeft" class="leftSection"> 
            <div class="profileImageSection">
                <img src="../Images/profile.jpg" alt="">
                <input type="file" name="assetImage" id="assetImage" hidden>
                <label for="assetImage" id="uploadBtn">Choose Image</label>
            </div>
            <div class="leftBottom">
                <div class="basic-information">
                    <div class="title">Basic Information</div>

                    <div class="col-f">
                        <span for="assetId">Asset ID</span>
                        <input type="text" name="assetId" id="assetId">
                    </div>
                    
                    <div class="col-f">
                        <span for="assetName">Asset Name</span>
                        <input type="text" name="assetName" id="assetName">
                    </div>
                   
                    <div class="col-f">
                        <span for="assetType">Asset Type</span>
                        <select name="assetType" id="assetType">
                            <option value="Furniture">Furniture</option>
                        </select>
                    </div>
                    <div class="col-f">
                        <span for="category">Category</span>
                        <select name="category" id="category">
                            <option value="Fixed Asset">Fixed Asset</option>
                        </select>
                    </div>
                    <div class="col-f">
                        <span for="condition">condition</span>
                        <select name="condition" id="condition">
                            <option value="Brand New">Brand New</option>
                            <option value="Used">Used</option>
                        </select>
                    </div>

                    <div class="col-btn">
                        <div id="btnSaveAsset">Edit</div>
                        <div id="btnCancel">Edit</div>
                    </div>
                    

                </div>
                
            </div>
        </div>
        <div id="pRight" class="rightSection">
        <div class="basic-information">
            <div class="col-f">
                <span for="dob">Date of Birth</span>
                <input type="datetime" name="dob" id="dob">
            </div>
            <div class="col-f">
                <span>Marital Status</span>
                <select name="maritalStatus" id="maritalStatus">
                    <option value="Married">Married</option>
                    <option value="Unmarried">Unmarried</option>
                    <option value="Widowed">Widowed</option>
                </select>
            </div>
            <div class="col-f">
                <span for="address">Address</span>
                <input type="text" name="address" id="address">
            </div>
            <div class="col-f">
                <span for="contactNo">Address</span>
                <input type="text" name="contactNo" id="contactNo">
            </div>
            <div class="col-f">
                <span for="email">Address</span>
                <input type="email" name="email" id="email">
            </div>

            <div class="title">emergency Contact</div>

            <div class="col-f">
                <span for="eName">Name</span>
                <input type="text" name="eName" id="eName">
            </div>
            <div class="col-f">
                <span for="eRelationship">Relationship</span>
                <input type="text" name="eRelationship" id="eRelationship">
            </div>
            <div class="col-f">
                <span for="econtact">Telephone Number</span>
                <input type="text" name="econtact" id="econtact">
            </div>
            <div class="col-btn">
                <div class="saveBtn">Save</div>
                <div class="cancBtn">Cancel</div>
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
    
    formState("userProfileForm",true);

    var btnEditProfile = document.getElementById("btnEditProfile")
    btnEditProfile.addEventListener('click',function(){
        formState("userProfileForm",false);
        btnEditProfile.style.display = 'none';


    })

</script>

    