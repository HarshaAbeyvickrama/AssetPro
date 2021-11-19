<style>
    /* * {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

    .overviewLayout {
        display: grid; */
        /* grid-template-rows: 0.75fr 1.5fr 0.75fr 7fr ; */
        /* height: 82vh; */
        /* width: 87.5vw; */
        /* overflow-y: scroll;
        padding: 20px;
        background-color: #F1F4FF;
    } */

    /* .overviewLayout>div {
        display: flex;
        align-items: center;
        color: #304068;
        font-size: 24px;
        font-weight: bold;

    }

    .contentSection {
        display: flex;
        justify-content: center;
        background-color: white;
        border-radius: 15px;
        margin-top: 15px;
        height: 82vh;
        align-items: flex-start !important;
    } */

    /* .addUser #addEmp {
        color: white;
        background-color: #6A71D7;
        cursor: pointer;
        padding: 15px;
        border-radius: 14px;
        font-size: 20px;
        border: none;
        margin-left: 62vw;
    } */

    /* CSS for the employee table */
    /* .table-data {
        display: block;
        color: #304068;
        margin: 20px 4px;
        height: 500px;
        width: 100%; */
        /* margin-top: -100px; */
        /* overflow-y: auto;
        overflow-x: hidden;
        text-align: left;
        font-size: 18px;
    } */


    /* .table-data th {
        color: #5C6E9B;
        padding: 8px;
        position: sticky;
        top: 0;
        background-color: white;
    } */

    /* tbody {
        display: block;
        height: 500px;
        overflow-y: auto;
        overflow-x: hidden;
    } */

    /* .table-data td {
        padding: 8px;
        font-weight: lighter;
        color: #5c6e9b;
        width: 20%;
    }

    .table-data .heading {
        align-items: center;
        text-align: left;
    }

    .table-data tr:hover {
        background-color: #EAEDF5;
        cursor: pointer;
    } */

    table tr:nth-child(2) {
        counter-reset: rowNumber;
    }

    table tr {
        counter-increment: rowNumber;
    }

    table tr td:first-child::before {
        content: counter(rowNumber);
        min-width: 1em;
        margin-right: 0.5px;
    }

    .viewBtn,
    .editBtn,
    .deleteBtn {
        color: white;
        background-color: #5C6E9B;
        padding: 10px;
        border: none;
        border-radius: 32px;
        width: 91px;
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
</style>
<div class="overviewLayout">
    <div>
        <div class="section-heading">All Employees</div>
        <div>
            <div class="addUser">
                <button class="addUser" id="addEmp">Add Employee</button>
            </div>
        </div>
    </div>


    <div class="contentSection">
        <!-- <div> -->
        <table class="table" id="empData">
            <thead>
            <tr>
                <th>#</th>
                <!-- <th>User ID</th> -->
                <th>Employee ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>View</th>
            </tr>
            </thead>
            
            <!-- <tbody> -->
                <?php

                require_once('../db/dbConnection.php');
                global $mysql;

                $sql = "SELECT
                                ud.UserID,
                                CONCAT(ud.fName, ' ', ud.lName) AS Name,
                                ud.Gender,
                                d.DepartmentCode,
                                eu.EmployeeID
                            FROM
                                userdetails ud
                            INNER JOIN employeeuser eu ON
                                ud.UserID = eu.UserID
                            INNER JOIN department d ON
                                eu.DepartmentID = d.DepartmentID
                            ORDER BY eu.EmployeeID";

                $result = $mysql->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td></td>
                                <td>" . $row['DepartmentCode'] . '/EMP/' . $row['EmployeeID'] . "</td>
                                <td>" . $row["Name"] . "</td>
                                <td>" . $row["Gender"] . "</td>
                                <td id=" . $row['EmployeeID'] . "><button id='view' class='btn btn-submit'>View</button></td>
                              </tr>";
                    }
                } else {
                    echo "No Results :(";
                }
                $mysql->close();

                ?>
            <!-- </tbody> -->
        </table>
        <!-- </div> -->
    </div>
</div>
<script type="text/javascript">
    //Loading the add employee page
    var addEmployeeBtn = document.getElementById('addEmp');
    addEmployeeBtn.addEventListener('click', function() {

        loadSection('centerSection', 'addEmployee');

    });

    //Viewing the deaprtment details
    var viewEmployeeBtn = document.querySelectorAll('#view');
    for (var i = 0; i < viewEmployeeBtn.length; i++) {
        viewEmployeeBtn[i].addEventListener('click', function() {
            loadDepartment(event.target.parentElement.id);
            // console.log(event.target.parentElement.id);

        });
    }

    //Loading details of the selected department
    function loadDepartment(EmployeeID) {
        var employeeDetails = null;
        const xhr = new XMLHttpRequest();
        xhr.open("POST", `../model/Employee.php?action=loadEmployee&EmployeeID=${EmployeeID}`, true);

        xhr.onload = function() {
            if (this.status === 200) {
                employeeDetails = JSON.parse(this.responseText);
                console.log(employeeDetails);
                loadSection('centerSection', 'emprofile');

                var json = JSON.stringify(employeeDetails);
                document.cookie = `EmployeeID=${json}`;
            }
        }
        xhr.send();
    }

    //Function to go back
    function goBack() {
        loadSection('centerSection', 'employees');
    }
</script>