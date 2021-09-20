<style>
    .table-data {
        color: #304068;
        margin: 4px 4px;
        height: 600px;
        width: 99%;
        overflow-y: auto;
        overflow-x: hidden;
    }
    .depData {
        /* width: 100%; */
        border-collapse: collapse;
        font-size: 20px;
        margin-left: 5vh;
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

<div class="table-data">
    <table class="depData">
        <tr">
            <th>Number</th>
            <th>Department ID</th>
            <th>Department Name</th>
            <th>Contact Number</th>
            <th>Date Created</th>
            <th>Last Modified</th>
            <th>Edit</th>
            <th>Delete</th>
            </tr>

            <?php

            $conn = mysqli_connect("localhost", "root", "", "assetpro");

            $sql = "SELECT DepartmentID, Name, ContactNum, DATE(DateCreated) AS datecreated, DATE(LastModified) AS lastmodified FROM department";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                                <td></td>
                                <td>" . $row["DepartmentID"] . "</td>
                                <td>" . $row["Name"] . "</td>
                                <td>" . $row["ContactNum"] . "</td>
                                <td>" . $row["datecreated"] . "</td>
                                <td>" . $row["lastmodified"] . "</td>
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