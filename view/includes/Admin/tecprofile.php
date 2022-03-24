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

    .profile>div {
        /* margin: 15px; */
        background-color: white;
        border-radius: 10px;
        /* height: calc(100% - 100px); */
        /* height: 100%; */
        /* padding: 10px; */

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

    .rightSection {
        display: flex;
        align-items: center;
        justify-content: center;
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

    .col-f input[type=text],
    input[type=number] {
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

    .col-h,
    .col-f>span {
        display: block;
        margin-top: 5px;
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

    .radio-group {
        margin: 5px 0px;
    }

    .radio-group>label {
        margin-left: 5px;
    }

    .radio-group>input[type=radio]:hover {
        cursor: pointer;
    }

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

    .editBtn:hover,
    .backBtn:hover {
        cursor: pointer;
        background-color: #304068;
        transition: .5s;
    }

    #updateBtnSection{
        display: none;
    }

    /* .BtnGroup{
        border: 1px solid red;
        display: block;
        position: relative;
        float: left;
    } */
</style>
<form action="" id="errorlogForm">

    <div class="profile">
        <div id="pLeft" class="leftSection scrollBar">
            <div class="profileImageSection">
                <img src="../Images/profile.jpg" alt="" name="profileImage" id="imagePrev">
                <input type="file" name="profileImage" id="profileImage" hidden>
                <label for="profileImage" id="uploadBtn"> Choose Image </label>
            </div>
            <div class="leftBottom">
                <div class="basic-information">
                    <div class="title"> Basic Information: </div>

                    <div class="col-f">
                        <span for="tecID"> Technician ID: </span>
                        <input type="text" name="tecID" id="tecID">
                    </div>

                    <div class="col-h">
                        <span for="fName"> First Name: </span>
                        <input type="text" name="fName" id="fName">
                    </div>

                    <div class="col-h">
                        <span for="lName"> Last Name: </span>
                        <input type="text" name="lName" id="lName">
                    </div>

                    <div class="col-f">
                        <span for="NIC">NIC</span>
                        <input type="text" name="NIC" id="NIC" maxlength="12">
                    </div>

                    <div class="col-f">
                        <span for="role"> Role: </span>
                        <input type="text" name="role" id="role" value="Technician">
                    </div>

                    <div class="col-f">
                        <span for="gender"> Gender </span>
                        <div class="radio-group" id="radio-group">
                            <input type="radio" name="gender" id="Male" value="male"><label> Male </label>
                            <input type="radio" name="gender" id="Female" value="female"><label> Female </label>
                        </div>
                    </div>

                    <!-- <div class="col-btn">
                        <div class="btnAction" id="btnEditProfile"> Edit </div>
                    </div> -->

                </div>

            </div>
        </div>
        <div id="pRight" class="rightSection scrollBar">
            <div class="basic-information">
                <div class="col-f">
                    <span for="dob"> Date of Birth: </span>
                    <input type="datetime" name="dob" id="dob">
                </div>
                <div class="col-f">
                    <!-- <span> Marital Status: </span>
                <select name="maritalStatus" id="maritalStatus">
                    <option value="Married"> Married </option>
                    <option value="Unmarried"> Unmarried </option>
                    <option value="Widowed"> Widowed </option>
                </select> -->
                    <span for="jobTitle"> Job Title: </span>
                    <input type="text" name="jobTitle" id="jobTitle">
                </div>
                <div class="col-f">
                    <span for="address"> Address: </span>
                    <input type="text" name="address" id="address">
                </div>
                <div class="col-f">
                    <span for="contactNo"> Contact Number: </span>
                    <input type="number" name="contactNo" id="contactNo" maxlength="10">
                </div>
                <div class="col-f">
                    <span for="email"> Email Address: </span>
                    <input type="email" name="email" id="email">
                </div>

                <div class="title"> Emergency Contact: </div>

                <div class="col-f">
                    <span for="eName"> Name: </span>
                    <input type="text" name="eName" id="eName">
                </div>
                <div class="col-f">
                    <span for="eRelationship"> Relationship: </span>
                    <input type="text" name="eRelationship" id="eRelationship">
                </div>
                <div class="col-f">
                    <span for="econtact"> Telephone Number: </span>
                    <input type="number" name="econtact" id="econtact" maxlength="10" minlength="10">
                </div>
                <div class="col-btn" id="EditBtnSection">
                    <!-- <div class="btnAction" id="cancelAddEmployee" onClick="goBack()"> Back </div> -->
                    <div class="btnAction" id="btnEditProfile"> Edit </div>
                </div>
                <div class="col-btn" id="updateBtnSection">
                    <div class="btnAction" id="Cancelupdate"> Cancel </div>
                    <div class="btnAction" id="ConfirmUpdate"> Update </div>
                </div>


            </div>

        </div>
    </div>

</form>

<script>

    document.getElementById('btnEditProfile').addEventListener('click', () => {
        document.getElementById('EditBtnSection').style.display = 'none';
        document.getElementById('updateBtnSection').style.display = 'block';
        inputs('errorlogForm', false);
    })

    document.getElementById('Cancelupdate').addEventListener('click', () => {
        document.getElementById('updateBtnSection').style.display = 'none';
        document.getElementById('EditBtnSection').style.display = 'block';
        inputs('errorlogForm', true);
    })

    // Enable / Disable the form fields

    // formID = the Id of the form that should be diabled
    // readonlyState ---->
    //      true --> form disabled 
    //      false --> form enabled 

    function formState(formId, readonlyState) {
        const form = document.getElementById(formId);
        var elements = form.elements;
        var len = elements.length;
        for (var i = 0; i < len; ++i) {
            elements[i].disabled = readonlyState;
        }
        document.getElementById("uploadBtn").disabled = readonlyState;


    }

    formState("errorlogForm", true);

    document.querySelectorAll(".col-btn").forEach(button => {
        const backBtn = document.getElementById("back");
        button.addEventListener('click', function(event) {
            switch (event.target.id) {
                case 'back':
                    formState("errorlogForm", true);
                    /*saveBtn.style.display = 'none';
                    cancelBtn.style.display = 'none';
                    btnEditProfile.style.display = 'block';*/


                    break;

                default:
                    break;
            }


        })
    })

    //Getting the technician details to the form
    var technicianID = getCookieValue('TechnicianID');
    var technician = JSON.parse(technicianID);
    console.log(technician);

    document.getElementById('imagePrev').src = `..${technician.ProfilePicURL}`;
    document.getElementById('tecID').value = technician.TechnicianID;
    document.getElementById('fName').value = technician.fName;
    document.getElementById('lName').value = technician.lName;
    document.getElementById('NIC').value = technician.NIC;
    var radio = document.getElementById('radio-group').children;
    // console.log(technician.Gender);
    var gender = document.getElementById(technician.Gender)
    // gender.checked = true;
    document.getElementById(technician.Gender).checked = true;
    document.getElementById('dob').value = technician.DOB;
    // document.getElementById('maritalStatus').value = technician.CivilStatus;
    document.getElementById('jobTitle').value = technician.jobTitle;
    document.getElementById('address').value = technician.Address;
    document.getElementById('contactNo').value = technician.PhoneNumber;
    document.getElementById('email').value = technician.Email;
    document.getElementById('eName').value = technician.eName;
    document.getElementById('eRelationship').value = technician.Relationship;
    document.getElementById('econtact').value = technician.TelephoneNumber;
</script>