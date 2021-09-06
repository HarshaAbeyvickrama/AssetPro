<style>
    * {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
    .overviewLayout{
        display: grid;
        grid-template-rows: 0.75fr 1.5fr 0.75fr 7fr ;
        height: 82vh;
        width: 87.5vw;
        overflow-y: auto;
        padding: 20px;
        background-color: #F1F4FF;
    }
    .overviewLayout > div{
        display: flex;
        align-items: center;
        color: #304068;
        font-size: 24px;
        font-weight: bold;
        
    }
    .statSection{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
        width: 100%;
        height: 100%;
    }
    .statSection > div{
        width: 100%;
        height: 100%;
        display: flex;
        /* justify-content: center; */
        align-items: center;
    }
    .statBox{
        display: grid;
        grid-template-rows: 3fr 2fr;
        color: white;
        height: 95%;
        width: 90%;
        border-radius: 12px;
    }
    .statBox > div{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .statNumber{
        font-size: 40px;
    }
    .statText{
        font-size: 17px;
        font-weight: lighter;
    }
    .box1{
        background-color: #304068;
    }
    .box2{
        background-color: #6A71D7;
    }
    .box3{
        background-color: #3D7DDB;
    }
    .box4{
        background-color: #6165A2;
    }
    .box5{
        background-color: #4E74AB;
    }
    .contentSection{
        background-color: white;
        border-radius: 15px;
        margin-top: 15px;
        height: 82vh;
    }
    .addEmp {
        color: white;
        background-color: #6A71D7;
        cursor: pointer;
        padding: 15px;
        border-radius: 14px;
        font-size: 20px;
        border: none;
        margin-left: 139.8vh;
    }
    .empData {
        width: 100%;
        border-collapse: collapse;
        font-size: 20px;
        margin-top: -38vh;
        margin-left: 5vh;
    }
    .empData th {
        color: #5C6E9B;
        padding: 8px;
    }
    .empData td {
        padding: 8px;
        font-weight: lighter;
    }
    table tr:nth-child(2){
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
    .editBtn, .deleteBtn {
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
<div class="overviewLayout">
    <div>
        <div>All Employees</div>
        <div>
            <button id="addEmp" class="addEmp">Add Employee</button>
        </div>
    </div>
    
    
    <div class="contentSection ">
        <div class="data">
            <table class="empData">
                <tr">
                    <th id="num">Number</th>
                    <th>Employee ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                <?php
                
                $conn = mysqli_connect("localhost","root","","assetpro");

                $sql = "SELECT userdetails.UserID, fName, lName, Gender 
                FROM userdetails JOIN user 
                ON user.UserID = userdetails.UserID 
                WHERE user.RoleID = 3";

                $result = $conn->query($sql);

                if($result->num_rows>0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td></td>
                                <td>".$row["UserID"]."</td>
                                <td>".$row["fName"]."</td>
                                <td>".$row["lName"]."</td>
                                <td>".$row["Gender"]."</td>
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
<script>
    document.getElementById('addEmp').addEventListener('click', function() {
        loadSection('emprofile');
    });
</script>