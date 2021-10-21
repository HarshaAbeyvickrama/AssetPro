<style>
    .table-data {
        color: #304068;
        margin: 4px 4px;
        height: 500px;
        width: 100%;
        /* margin-top: -100px; */
        overflow-y: auto;
        overflow-x: hidden;
        /* font-size: 16px; */
        font-size: 20px;
        text-align: left;
    }

    .empData {
        /* width: 100%; */
        border-collapse: collapse;
        margin-left: 5vh;
        text-align: left;
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
        font-size: 20px;
        color: #5c6e9b;
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
        <tr>
                    <th id="num">#</th>
                    <!-- <th>User ID</th> -->
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th class="heading">View</th>
                </tr>

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
                            WHERE
                                d.DepartmentCode = 'FIN'
                            ORDER BY
                                eu.EmployeeID";

                    $result = $mysql->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td></td>
                                <td>" .$row['DepartmentCode'].'/EMP/'. $row['EmployeeID'] . "</td>
                                <td>" . $row["Name"] . "</td>
                                <td>" . $row["Gender"] . "</td>
                                <td id=".$row['EmployeeID']."><button id='view' class='viewBtn'>View</button></td>
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