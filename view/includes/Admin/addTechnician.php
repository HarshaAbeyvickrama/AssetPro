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
        margin-top: 5px;
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
        float: right;
        text-align: right;
    }

    .col-btn>div {
        border-radius: 15px;
        padding: 10px 20px;
        color: white;
        font-size: 18px;
        background-color: #5C6E9B;
    }

    .col-f input[type=text] {
        justify-content: center;
        align-items: center;
        width: calc(100% - 50px);
        border: none;
        background-color: #F1F4FF;
        height: 15px;
        border-radius: 9px;
        padding: 8px 15px 8px 15px;
        margin-top: 10px;
        outline: none;
    }

    .col-h input[type=text] {
        justify-content: center;
        align-items: center;
        width: calc(94% - 30px);
        border: none;
        background-color: #F1F4FF;
        height: 15px;
        border-radius: 9px;
        padding: 8px 15px 8px 15px;
        margin-top: 10px;
        outline: none;
    }

    .col-h,
    .col-f>span {
        display: block;
    }

    .leftSection>div {}

    #email,
    #dob {
        width: calc(96% - 30px);
        border: none;
        background-color: #F1F4FF;
        height: 15px;
        border-radius: 9px;
        margin-top: 10px;
        outline: none;
        padding: 8px 15px 8px 15px;
    }
    #maritalStatus {
        width: calc(101% - 30px);
        border: none;
        background-color: #F1F4FF;
        height: 30px;
        border-radius: 9px;
        margin-top: 10px;
        outline: none;
        padding: 3px 3px;
    }

    #gender {
        margin-bottom: 10px;
    }

    .editBtn,
    .delBtn {
        width: 80px;
        height: 40px;
        background-color: #5C6E9B;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        color: #F1F4FF;
        margin-left: 70vh;
    }

    .editBtn:hover,
    .delBtn:hover,
    .addBtn:hover,
    .cancBtn:hover {
        cursor: pointer;
        background-color: #304068;
        transition: .5s;
    }

    .addBtn,
    .cancBtn {
        width: 80px;
        height: 40px;
        background-color: #5C6E9B;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        color: #F1F4FF;
        margin-left: 70vh;
    }
</style>




<form action="" id="addTechnicianForm">

    <div class="profile">
        <div id="pLeft" class="leftSection">
            <div class="profileImageSection">
                <img src="../Images/profile.jpg" alt="">
                <input type="file" name="profileImage" id="profileImage" hidden>
                <label for="profileImage" id="uploadBtn">Choose Image</label>
            </div>
            <div class="leftBottom">
                <div class="basic-information">
                    <div class="title">Basic Information:</div>

                    <div class="col-f">
                        <span for="empID">Technician ID</span>
                        <input type="text" name="empID" id="empID">
                    </div>

                    <div class="col-h">
                        <span for="fName">First Name</span>
                        <input type="text" name="fName" id="fName">
                    </div>
                    <div class="col-h">
                        <span for="lName">Last Name</span>
                        <input type="text" name="lName" id="lName">
                    </div>
                    <div class="col-f">
                        <span for="role">Role</span>
                        <input type="text" name="role" id="role">
                    </div>
                    <div class="col-f">
                        <span for="gender" id="gender">Gender</span>
                        <input type="radio" name="gender" id="male" value="male"><label>Male</label>
                        <input type="radio" name="gender" id="female" value="female"><label>Female</label>
                    </div>

                </div>

            </div>
        </div>
        <div id="pRight" class="rightSection">
            <div class="basic-information">
                <div class="col-f">
                    <span for="dob">Date of Birth</span>
                    <input type="date" name="dob" id="dob">
                </div>
                <div class="col-f">
                    <span>Marital Status</span>
                    <select name="maritalStatus" id="maritalStatus">
                        <option value="Married">Married</option>
                        <option value="Unmarried">Single</option>
                        <option value="Widowed">Widowed</option>
                    </select>
                </div>
                <div class="col-f">
                    <span for="address">Address</span>
                    <input type="text" name="address" id="address">
                </div>
                <div class="col-f">
                    <span for="contactNo">Contact Number</span>
                    <input type="text" name="contactNo" id="contactNo">
                </div>
                <div class="col-f">
                    <span for="email">Email Address</span>
                    <input type="email" name="email" id="email">
                </div>

                <div class="title">Emergency Contact:</div>

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

                <!-- Add and Cancel button to add -->
                <div class="col-btn">
                    <button class="addBtn" id="btnSaveTechnician">Save</button>
                    <button class="addBtn" id="cancelAddTechnician">Cancel</button>
                </div>
            </div>

        </div>
    </div>

</form>

<script>
    document.querySelectorAll(".col-btn").forEach(button=> {
        const cancBtn = document.getElementById('cancelAddTechnician');
        const saveBtn = document.getElementById("btnSaveTechnician");
        button.addEventListener('click', function(event) {
            event.preventDefault();
            switch (event.target.id) {
                case 'cancelAddTechnician':
                    
                    break;
                case 'btnSaveTechnician':
                    const technician = getFormdata();
                    saveTechnician(technician);
                    console.log(technician);
                    break;
            
                default:
                    break;
            }
        })
    })

    //getting the form data

    function getFormdata() {
        return new FormData(document.getElementById('addTechnicianForm'));
    }

    //Saving the technician function
    //Saving technician details through AJAX

    function saveTechnician(technician) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST","../model/Technician.php?action=addTechnician",true);

        xhr.onload = function() {
            if(this.status === 200) {
                console.log(this.responseText);
            }
        }
        xhr.send(technician);
    }

</script>