<style>
    * {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

    /* .contentSection {
        display: flex;
        justify-content: center;
        background-color: white;
        border-radius: 15px;
        margin-top: 15px;
        height: 82vh;
        align-items: flex-start !important;
    } */

    .addEmp #addEmp {
        color: white;
        background-color: #6A71D7;
        cursor: pointer;
        padding: 15px;
        border-radius: 14px;
        font-size: 20px;
        border: none;
        /* margin-left: 62vw; */
    }
    .header-title {
        display: grid;
        grid-template-columns: 1fr 1fr;
    }
    .addEmp {
        display: flex;
        justify-content: end;
    }
    .heading-title {
        display: flex;
        font-size: 30px;
        color: #304068;
        align-items: center;
        font-weight: bold;
    }
    .profile-row {
        /* display: inline-flex; */
        /* height: 2rem !important; */
    }
    .profile-image {
        width: 45px;
        height: 45px;
        border-radius: 50%;
    }
    .profile-name {
        height: 100% !important;
        /* display: inline-block; */
    }

    tr {
        /* align-items: center !important; */
    }

    /* CSS for the employee table */
</style>
<div class="overviewLayout">
    <!-- <div>
        <div>All Employees</div>
        <div>
            <div class="addEmp">
                <button id="addEmp" >Add Employee</button>
            </div>
        </div>
    </div> -->
    <div class="header-title">
        <div class="heading-title">Employees</div>
        <div class="addEmp"><button id="addEmp">Insert</button></div>
    </div>

    <div class="contentSection">
        <!-- <div> -->
        <table class="table" id="empData">
            <thead>
                <tr>
                    <th class="heading">#</th>
                    <th>Staff ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Job Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="tableRowGroup" id="employeeTableBody"></tbody>
        </table>
    </div>
</div>

<script>
    window.addEventListener('load', loadEmployees());
</script>


<script type="text/javascript">
    //Loading the add employee page
    var addEmployeeBtn = document.getElementById('addEmp');
    addEmployeeBtn.addEventListener('click', function() {

        loadSection('centerSection', 'addEmployee');

    });

    // //Viewing the employee details
    // var viewEmployeeBtn = document.querySelectorAll('#view');
    // for (var i = 0; i < viewEmployeeBtn.length; i++) {
    //     viewEmployeeBtn[i].addEventListener('click', function() {
    //         loadDepartment(event.target.parentElement.id);
    //         // console.log(event.target.parentElement.id);

    //     });
    // }

    //Loading details of the selected department
    // function loadDepartment(EmployeeID) {
    //     var employeeDetails = null;
    //     const xhr = new XMLHttpRequest();
    //     xhr.open("GET", `http://localhost/assetpro/employee/getEmployee/${EmployeeID}`, true);

    //     xhr.onload = function() {
    //         if (this.status === 200) {
    //             employeeDetails = JSON.parse(this.responseText);
    //             console.log(employeeDetails);
    //             loadSection('centerSection', 'emprofile');

    //             var json = JSON.stringify(employeeDetails);
    //             document.cookie = `EmployeeID=${json}`;
    //         }
    //     }
    //     xhr.send();
    // }

    //Function to go back
    function goBack() {
        loadSection('centerSection', 'employees');
    }
</script>