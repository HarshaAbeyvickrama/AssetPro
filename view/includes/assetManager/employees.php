<style>
    .profile{
        display: grid;
        height: 82vh;
        width: 87.5vw;
        grid-template-columns: 1fr 1fr;
        /* padding: 20px; */
        background-color: #F1F4FF;
        border: 1px solid red;

    }
    .profile > div{
        /* margin: 15px; */
        background-color: white;
        border-radius: 10px;
        /* padding: 10px; */
        
    }
    .leftSection{
        display: grid;
        grid-template-rows: 4fr 6fr;
        align-items: center;
        justify-content: center;
        background-color: forestgreen;
        margin: 15px 7.5px 15px 15px;
    }
    .rightSection{
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: forestgreen;
        margin: 15px 15px 15px 7.5px;
    }
    .leftSection > div{
        /* height: 100%; */
        /* width: 100%; */
    }
    .profileImageSection > img{
        width: 200px;
        border-radius: 50%;
    }
    .rightSection{
        border: 1px solid black;
    }
    .leftSection .leftBottom{
        all: revert;
        display: flex;
        border: 1px solid black;
        width: 100%;
        height: 100%;
    }
    .profileImageSection{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    #uploadBtn{
        display: flex;
        align-items: center;
        justify-content: center;
        width: 150px;
        height: 40px;
        margin: 5px 0px;
        background: rgba(0, 0, 0, 0.9);
        color: #F1F4FF;
        border-radius: 10px;
    }
    #uploadBtn:hover{
        cursor: pointer;
    }

    /* Form styling */
    .basic-information{
        width: calc(100% - 40px);
        height: calc(100% - 40px);
        display: flex;
        flex-wrap: wrap;
        /* justify-content: space-around; */
    }
    .title{
        width: 100%;
    }
    .col-f{
        width: 100%;
    }
    .col-h{
        width: 50%;
    }
    .col-btn{
        float: right;
        text-align: right;
    }
    .col-btn > div{
        border-radius: 15px;
        padding: 10px 20px;
        color: white;
        font-size: 18px;
        background-color: #5C6E9B;
    }
    .col-f input[type=text]{
        justify-content: center;
        align-items: center;
        width: calc(100% - 50px);
    }
    .col-h input[type=text]{
        justify-content: center;
        align-items: center;
        width: calc(100% - 30px);
    }
    .col-h , .col-f > span{
        display: block;
    }
    .leftSection > div{
        
    }
    
     
</style>
<form action="">

    <div class="profile">
        <div id="pLeft" class="leftSection"> 
            <div class="profileImageSection">
                <img src="../Images/profile.jpg" alt="">
                <input type="file" name="profileImage" id="profileImage" hidden>
                <label for="profileImage" id="uploadBtn">Choose Image</label>
            </div>
            <div class="leftBottom">
                <div class="basic-information">
                    <div class="title">Basic Information</div>

                    <div class="col-f">
                        <span for="empID">Employee ID</span>
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
                        <span for="gender">Gender</span>
                        <input type="radio" name="gender" id="male" value="male"><label>Male</label>
                        <input type="radio" name="gender" id="female" value="female"><label>Female</label>
                    </div>
                    <div class="col-btn">
                        <div>Edit</div>
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
        </div>

        </div>
    </div>

</form>


    