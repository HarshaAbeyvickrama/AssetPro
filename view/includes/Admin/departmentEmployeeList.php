<style>
    .table-data {
        color: #304068;
        margin: 4px 4px;
        height: 500px;
        width: 99%;
        /* margin-top: -100px; */
        overflow-y: auto;
        overflow-x: hidden;
        /* font-size: 16px; */
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
        font-size: 16px;
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
        width: 80px;
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

<div>
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
                            *
                        FROM
                            employeeuser
                        INNER JOIN userdetails ON employeeuser.UserID = userdetails.UserID
                        WHERE
                            DepartmentID = 1";

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
                                <td id=" . $row['EmployeeID'] . "><button id='view' class='viewBtn'>View</button></td>
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

<!-- 
    SELECT
    *
FROM
    `employeeuser`
INNER JOIN userdetails ON employeeuser.UserID = userdetails.UserID
WHERE
    DepartmentID = 1
 -->