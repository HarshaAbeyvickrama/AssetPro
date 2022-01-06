
<div class="overviewLayout">
    <!-- <div>
        <div>All Employees</div>
        <div>
            <div class="addEmp">
                <button id="addEmp" >Add Employee</button>
            </div>
        </div>
    </div> -->

    <div>
        <div class="section-heading">All Employees</div>
    </div>

    <div class="contentSection">
        <!-- <div> -->
        <table class="table" id="empData">
            <thead>
                <tr>
                    <th class="heading">#</th>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Job Title</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody id="employeeTableBody"></tbody>
        </table>
    </div>
</div>

<script>
    <?php
    echo 'var userID ='.$_SESSION['UserID'];
    ?>

    window.addEventListener('load', loadDepartmentEmployees(userID));
</script>


<script type="text/javascript">
    //Loading the add employee page
    var addEmployeeBtn = document.getElementById('addEmp');
    addEmployeeBtn.addEventListener('click', function() {

        loadSection('centerSection', 'addEmployee');

    });

    //Viewing the employee details
    var viewEmployeeBtn = document.querySelectorAll('#view');
    for (var i = 0; i < viewEmployeeBtn.length; i++) {
        viewEmployeeBtn[i].addEventListener('click', function() {
            loadDepartment(event.target.parentElement.id);
            // console.log(event.target.parentElement.id);

        });
    }

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