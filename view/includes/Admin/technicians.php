<style>
    * {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

    .overviewLayout {
        display: grid;
        grid-template-rows: 0.75fr 1.5fr 0.75fr 7fr;
        height: 82vh;
        width: 87.5vw;
        overflow-y: auto;
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

    .addTec #addTec {
        color: white;
        background-color: #6A71D7;
        cursor: pointer;
        padding: 15px;
        border-radius: 14px;
        font-size: 20px;
        border: none;
        margin-left: 64vw;
    }

    /* CSS for the technicians table */
    .table-data {
        color: #304068;
        margin: 4px 4px;
        height: 600px;
        width: 99%;
        /* margin-top: -100px; */
        overflow-y: auto;
        overflow-x: hidden;
    }

    .tecData {
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
        <div>All Technicians</div>
        <div class="addTec">
            <button id="addTec">Add Technician</button>
        </div>
    </div>


    <div class="contentSection ">
        <div class="table-data">
            <table class="tecData">
                <tr">
                    <th>Number</th>
                    <th>Technician ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </tr>

                    <?php


                    $conn = mysqli_connect("localhost", "root", "", "assetpro");
                    // require_once('../db/dbConnection.php');

                    $sql = "SELECT userdetails.UserID, fName, lName, Gender 
                FROM userdetails JOIN user 
                ON user.UserID = userdetails.UserID 
                WHERE user.RoleID = 4";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td></td>
                                <td>" . $row["UserID"] . "</td>
                                <td>" . $row["fName"] . "</td>
                                <td>" . $row["lName"] . "</td>
                                <td>" . $row["Gender"] . "</td>
                                <td><button class='viewBtn'>View</button></td>
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
    </div>
</div>

<script type="text/javascript">
    var addTechnicianBtn = document.getElementById('addTec');
    addTechnicianBtn.addEventListener('click', function() {

        //Add the code to execute

        loadSection('centerSection', 'addTechnician');

        // alert("hemlo 👽") 
    });
</script>