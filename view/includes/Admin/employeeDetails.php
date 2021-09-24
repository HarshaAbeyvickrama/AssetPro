<style>
    .table-data {
        color: #304068;
        margin: 4px 4px;
        height: 600px;
        width: 99%;
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
</style>

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
            <th>Edit</th>
            <th>Delete</th>
            </tr>

            <?php

            $conn = mysqli_connect("localhost", "root", "", "assetpro");

            // $sql = "SELECT userdetails.UserID, fName, lName, Gender 
            // FROM userdetails JOIN user 
            // ON user.UserID = userdetails.UserID 
            // WHERE user.RoleID = 3";

            $sql = "SELECT 
                user.UserID, userdetails.fName, userdetails.lName, userdetails.Gender,
                emp.EmployeeID, emp.DepartmentID 
                FROM employeeuser emp INNER JOIN userdetails 
                ON userdetails.UserID = emp.UserID 
                JOIN user ON user.UserID = userdetails.UserID 
                WHERE user.RoleID = 3";

            $result = $conn->query($sql);

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
                                <td><button class='editBtn'>Edit</button></td>
                                <td><button class='deleteBtn'>Delete</button></td>
                              </tr>";
                }
            } else {
                echo "No Results :(";
            }
            $conn->close();

            ?>
    </table>
</div>