<style>
    .addDep #addDep {
        color: white;
        background-color: #6A71D7;
        cursor: pointer;
        padding: 15px;
        border-radius: 14px;
        font-size: 20px;
        border: none;
        /* margin-left: 60vw; */
    }

    .viewBtn,
    .editBtn,
    .deleteBtn {
        color: white;
        background-color: #5C6E9B;
        padding: 10px;
        border: none;
        border-radius: 32px;
        width: 81px;
        height: 41px;
        cursor: pointer;
        font-size: 15px;
    }

    .viewBtn {
        background-color: #7A90C9;
    }

    .editBtn {
        background-color: #5C6E9B;
    }

    .deleteBtn {
        background-color: #394564;
    }

    /* CSS for pop-up form */
    .bg-popup {
        width: 100vw;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.8);
        position: absolute;
        top: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        display: none;
        z-index: 10;
        left: 0px;
    }

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
        margin-top: 20px;
        margin-bottom: 20px;
        outline: none;
        padding: 8px 15px 8px 15px;
    }

    .col-h {
        display: block;
    }

    #dDes {
        height: 80px;
    }

    span {
        color: #5C6E9B;
    }

    .addBtn {
        width: 80px;
        height: 40px;
        background-color: #5C6E9B;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        color: #F1F4FF;
        margin-left: 95vh;
    }

    .addBtn:hover {
        cursor: pointer;
        background-color: #304068;
        transition: .5s;
    }

    .close {
        position: absolute;
        top: 0;
        right: 14px;
        font-size: 50px;
        transform: rotate(45deg);
        cursor: pointer;
        color: #5C6E9B;
    }
</style>

<div class="overviewLayout">
    <div class="section-heading">Departments</div>
    <div class="contentSection ">
        <div class="table">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Department Name</th>
                    <th>Department Head</th>
                    <th>Asset Count</th>
                </tr>
                </thead>
                <tbody class="tableRowGroup" id="departmentTableBody"></tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Department pop-up form -->
<div class="bg-popup" id="closeForm">
    <div class="popup-content" id="popup-content">
        <div class="close" id="cancelAddDepartment">+</div>
        <h3 class="depInfo">Department Information</h3>
        <form action="" id="addDepartmentForm">
            <div class="col-f">
                <span for="dName" id="fieldName">Department Name</span>
                <input type="text" name="dName" id="dName" required/>
            </div>
            <div class="col-f">
                <span for="dCode" id="fieldName">Department Head</span>
                <input type="text" name="dCode" id="dCode" required/>
            </div>
            <div class="col-f">
                <span for="dDes" id="fieldName">Asset Count</span>
                <textarea type="text" name="dDes" id="dDes"></textarea>
            </div>
            <div class="col-btn">
                <button class="addBtn" id="btnSaveDepartment" type="submit">Add</button>
            </div>
        </form>
    </div>
</div>

