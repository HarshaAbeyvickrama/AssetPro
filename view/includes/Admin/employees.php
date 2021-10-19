<style>
    * {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

    .overviewLayout {
        display: grid;
        /* grid-template-rows: 0.75fr 1.5fr 0.75fr 7fr ; */
        height: 82vh;
        width: 87.5vw;
        overflow-y: scroll;
        padding: 20px;
        background-color: #F1F4FF;
    }

    .overviewLayout>div {
        display: flex;
        align-items: center;
        color: #304068;
        font-size: 24px;
        font-weight: bold;

    }

    .contentSection {
        background-color: white;
        border-radius: 15px;
        margin-top: 15px;
        height: 82vh;
    }

    .addEmp #addEmp {
        color: white;
        background-color: #6A71D7;
        cursor: pointer;
        padding: 15px;
        border-radius: 14px;
        font-size: 20px;
        border: none;
        margin-left: 65vw;
    }

    /* CSS for the employee table */
    .table-data {
        color: #304068;
        margin: 4px 4px;
        height: 500px;
        width: 99%;
        margin-top: -100px;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .empData {
        /* width: 100%; */
        border-collapse: collapse;
        font-size: 20px;
        margin-left: 5vh;
        text-align: center;
    }

    .table-data th {
        color: #5C6E9B;
        padding: 8px;
        position: sticky;
        top: 0;
        background-color: white;
    }

    .table-data td {
        padding: 8px;
        font-weight: lighter;
    }

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
        <div>All Employees</div>
        <div>
            <div class="addEmp">
                <button id="addEmp">Add Employee</button>
            </div>
        </div>
    </div>


    <div class="contentSection">
        <div class="table-data">
            <table class="empData" id="empData">
                <tr">
                    <th id="num">Number</th>
                    <th>User ID</th>
                    <th>Employee ID</th>
                    <th>Department ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </tr>

                    <?php

                    require_once('../db/dbConnection.php');
                    global $mysql;

                    $sql = "SELECT
                                USER.UserID,
                                userdetails.fName,
                                userdetails.lName,
                                userdetails.Gender,
                                emp.EmployeeID,
                                emp.DepartmentID
                            FROM
                                employeeuser emp
                            INNER JOIN userdetails ON userdetails.UserID = emp.UserID
                            JOIN USER ON USER.UserID = userdetails.UserID
                            WHERE
                                USER.RoleID = 3";

                    $result = $mysql->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td></td>
                                <td>" . $row["UserID"] . "</td>
                                <td>" . $row["EmployeeID"] . "</td>
                                <td>" . $row["DepartmentID"] . "</td>
                                <td>" . $row["fName"] . "</td>
                                <td>" . $row["lName"] . "</td>
                                <td>" . $row["Gender"] . "</td>
                                <td id=".$row['EmployeeID']."><button id='view' class='viewBtn'>View</button></td>
                                <td><button class='editBtn'>Edit</button></td>
                                <td><button class='deleteBtn'>Delete</button></td>
                              </tr>";
                        }
                    } else {
                        echo "No Results :(";
                    }
                    $mysql->close();

                    ?>
            </table>
        </div>
    </div>
</div>
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
            loadEmployee(event.target.parentElement.id);
            console.log(event.target.parentElement.id);
        });
    }

    //Loading the details of the selected employee
    function loadEmployee(EmployeeID) {
        var employeeDetails = null;
        const xhr = new XMLHttpRequest();
        xhr.open("POST", `../model/Employee.php?action=loadEmployee&EmployeeID=${EmployeeID}`, true);

        xhr.onload = function() {
            if (this.status === 200) {
                employeeDetails = JSON.parse(this.responseText);
                // alert(this.responseText);
                loadSection('centerSection', 'emprofile');

                var json = JSON.stringify(employeeDetails);
                document.cookie=`EmployeeID=${json}`;
            }
        }
        xhr.send();
    }
</script>