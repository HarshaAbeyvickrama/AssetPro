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

    .col-h input[type=text] {
        justify-content: center;
        align-items: center;
        width: calc(94% - 30px);
        border: none;
        background-color: #F1F4FF;
        height: 15px;
        border-radius: 9px;
        padding: 8px 15px 8px 15px;
        outline: none;
    }
    .col-h,
    .col-f>span {
        display: block;
    }
    select {
        justify-content: center;
        align-items: center;
        width: 97%;
        border: none;
        background-color: #F1F4FF;
        height: 37px;
        border-radius: 9px;
        margin-top: 20px;
        margin-bottom: 20px;
        padding: 8px 15px 8px 15px;
        outline: none;
    }

    #dDes {
        height: 100px;
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
        /* margin-left: 95vh; */
    }

    .addBtn:hover {
        cursor: pointer;
        background-color: #304068;
        transition: .5s;
    }
    .add-btn {
        display: flex;
        justify-content: end;
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
    <div>
        <!-- <div>All Departments</div> -->
        <div class="addDep">
            <button id="addDep">Insert</button>
        </div>
    </div>

    <div class="contentSection ">
        <div class="table">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Department ID</th>
                        <th>Department Name</th>
                        <th>Contact Number</th>
                        <th>Action</th>
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
                <span for="dCode" id="fieldName">Department Code</span>
                <input type="text" name="dCode" id="dCode" required />
            </div>
            <div class="col-f">
                <span for="dName" id="fieldName">Department Name</span>
                <input type="text" name="dName" id="dName" required >
            </div>
            <!-- <div class="col-f">
                <span for="dhName">Department Head</span>
                <select class="dhName" type="text" name="dhName" id="dhName" required ></select>
            </div> -->
            <div class="col-f">
                <span for="dCon" id="fieldName">Contact Number</span>
                <input type="text" name="dCon" id="dCon" required />
            </div>
            <div class="col-f">
                <span for="dDes" id="fieldName">Description</span>
                <textarea type="text" name="dDes" id="dDes"></textarea>
            </div>
            <div class="col-btn add-btn">
                <button class="addBtn" id="btnSaveDepartment" type="submit">Add</button>
            </div>
        </form>
    </div>
</div>

<script>
    window.addEventListener('load', loadDepartments());
</script>

<script type="text/javascript">
    //JS for pop-up form
    document.getElementById('addDep').addEventListener('click',
        function popForm() {
            document.querySelector('.bg-popup').style.display = 'flex';
            getDepartmentHeads();
        });

    // function popForm() {
    //     document.getElementById('bg-popup').style.display = 'flex';
    // }

    document.querySelector('.close').addEventListener('click',
        function popForm() {
            document.querySelector('.bg-popup').style.display = 'none';
        });

    //close form function
    function closeForm(formID) {
        document.getElementById('closeForm').style.display = 'none';
    }

    // Getting the form data
    document.querySelectorAll(".col-btn").forEach(button => {
        // const cancBtn = document.getElementById('cancelAddDepartment');
        const saveBtn = document.getElementById("btnSaveDepartment");
        button.addEventListener('click', function(event) {
            event.preventDefault();
            switch (event.target.id) {
                case 'cancelAddDepartment':

                    break;
                case 'btnSaveDepartment':
                    const department = getFormdata("addDepartmentForm");

                    if(department == null) {
                        alert("Fields Cannot be Empty!");
                    } else {
                        saveDepartment(department);
                    }
                    break;

                    default:
                        break;
                }

                    // saveDepartment(department);
                    // var isEmpty = false;
                    // for (var pair of department.entries()) {
                    //     // console.log(pair[0] + ': ' + pair[1]);
                    //     if (pair[1] == '') {
                    //         isEmpty = true;
                    //     }
                    // }
                    // if (!isEmpty) {
                    //     saveDepartment(department);
                    // } else {
                    //     alert('Fill the form!');
                    // }

                //     break;

                // default:
                //     break;
            // }
        })
    })

    //getting the form data

    function getFormdata() {
        form = new FormData(document.getElementById('addDepartmentForm'));
        var department = {}
        for(var pair of form.entries()) {
            console.log(pair[0] + ': ' + pair[1]);
            department[pair[0]] = pair[1];
        }
        return department;
    }

    //Saving the department function
    //Saving department details through AJAX

    function saveDepartment(department) {
        postData("http://localhost/assetpro/departments/addDepartment", department, (data) => {
            console.log(data);
        });
    }

    //Getting the department heads list
    function getDepartmentHeads() {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "http://localhost/assetpro/departments/getDepartmentHeadList", true);
        xhr.onload = function() {
            if(this.status == 200) {
                var departmentHeads = JSON.parse(this.responseText);
                var select = document.getElementById('dhName');

                for(var i = 0; i <departmentHeads.length; i++) {
                    console.log(departmentHeads[i]);
                    var option = `<option value=${departmentHeads[i].HeadID}>${departmentHeads[i].Name}</option>`;
                    select.innerHTML += option;
                }
            }
        }
        xhr.send();
    }
    


    //Viewing the deaprtment details
    // var viewDepartmentBtn = document.querySelectorAll('#view');
    // for (var i = 0; i < viewDepartmentBtn.length; i++) {
    //     viewDepartmentBtn[i].addEventListener('click', function() {
    //         loadDepartment(event.target.parentElement.id);
    //         // console.log(event.target.parentElement.id);

    //     });
    // }

    //Loading details of the selected department
    // function loadDepartment(DepartmentID) {
    //     var departmentDetails = null;
    //     const xhr = new XMLHttpRequest();
    //     xhr.open("POST", `../model/Department.php?action=loadDepartment&DepartmentID=${DepartmentID}`, true);

    //     xhr.onload = function() {
    //         if (this.status === 200) {
    //             departmentDetails = JSON.parse(this.responseText);
    //             // alert(this.responseText);
    //             loadSection('centerSection', 'departmentDetails');

    //             var json = JSON.stringify(departmentDetails);
    //             document.cookie = `DepartmentID=${json}`;
    //         }
    //     }
    //     xhr.send();
    // }

    //Loading the employee list of the selected department
    // function loadEmploeeDepartment(DepartmentID) {
    //     var departmentEMployeeDetails = null;
    //     const xhr = new XMLHttpRequest();
    //     xhr.open("POST", `../model/Department.php?action=loadEmployeeDepartment&DepartmentID=${DepartmentID}`, true);

    //     xhr.onload = function() {
    //         if (this.status === 200) {
    //             departmentEmployeeDetails = JSON.parse(this.responseText);
    //             // alert(this.responseText);
    //             // loadSection('centerSection', 'departmentDetails');

    //             var json = JSON.stringify(departmentDetails);
    //             document.cookie = `DepartmentID=${json}`;
    //         }
    //     }
    //     xhr.send();
    // }
</script>