<style>
    .popup-content {
        width: 850px;
        height: 600px;
        background-color: white;
        border-radius: 20px;
        /* text-align: center; */
        padding: 20px;
        position: relative;
    }

    .depInfo {
        text-align: left;
        margin-left: 20px;
        color: #304068;
        font-size: 18px;
    }

    .col-f input[type=text],
    textarea {
        justify-content: center;
        align-items: center;
        width: calc(100% - 50px);
        border: none;
        background-color: #F1F4FF;
        height: 25px;
        border-radius: 9px;
        padding: 3px 3px;
        margin-top: 10px;
        margin-bottom: 20px;
        outline: none;
        padding: 8px 15px 8px 15px;
        font-size: 18px;
    }

    .col-h {
        display: block;
    }

    #dDes {
        height: 80px;
        font-size: 18px;
    }

    span {
        color: #5C6E9B;
    }
    .editBtn {
        width: 80px;
        height: 40px;
        background-color: #5C6E9B;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        color: #F1F4FF;
        margin-left: 95vh;
    }

    .editBtn:hover {
        cursor: pointer;
        background-color: #304068;
        transition: .5s;
    }
</style>

<div class="popup-content" id="popup-content">
    <form action="" id="addDepartmentForm">
        <div class="col-f">
            <span for="dId" id="fieldName">Department ID</span>
            <input type="text" name="dId" id="dId" disabled>
        </div>
        <div class="col-f">
            <span for="dCode" id="fieldName">Department Code</span>
            <input type="text" name="dCode" id="dCode" disabled>
        </div>
        <div class="col-f">
            <span for="dName" id="fieldName">Department Name</span>
            <input type="text" name="dName" id="dName" disabled>
        </div>
        <div class="col-f">
            <span for="dCon" id="fieldName">Contact Number</span>
            <input type="text" name="dCon" id="dCon" disabled>
        </div>
        <div class="col-f">
            <span for="dDes" id="fieldName">Description</span>
            <textarea type="text" name="dDes" id="dDes" disabled></textarea>
        </div>
        <div class="col-btn">
            <button class="editBtn" id="btnEditDepartment" type="submit">Submit</button>
        </div>

    </form>
</div>

<script>
    var departmentID = getCookieValue('DepartmentID');
    var department = JSON.parse(departmentID)[0];
    console.log(department);
    document.getElementById('dId').value = department.DepartmentID;
    document.getElementById('dCode').value = department.DepartmentCode;
    document.getElementById('dName').value = department.Name;
    document.getElementById('dCon').value = department.ContactNum;
    document.getElementById('dDes').value = department.description;
</script>