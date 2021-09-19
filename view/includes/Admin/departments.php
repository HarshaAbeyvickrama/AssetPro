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

    .statSection {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
        width: 100%;
        height: 100%;
    }

    .statSection>div {
        width: 100%;
        height: 100%;
        display: flex;
        /* justify-content: center; */
        align-items: center;
    }

    .statBox {
        display: grid;
        grid-template-rows: 3fr 2fr;
        color: white;
        height: 95%;
        width: 90%;
        border-radius: 12px;
    }

    .statBox>div {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .statNumber {
        font-size: 40px;
    }

    .statText {
        font-size: 17px;
        font-weight: lighter;
    }

    .box1 {
        background-color: #304068;
    }

    .box2 {
        background-color: #6A71D7;
    }

    .box3 {
        background-color: #3D7DDB;
    }

    .box4 {
        background-color: #6165A2;
    }

    .box5 {
        background-color: #4E74AB;
    }

    .contentSection {
        background-color: white;
        border-radius: 15px;
        margin-top: 15px;
        height: 82vh;
    }

    .addDep #addDep {
        color: white;
        background-color: #6A71D7;
        cursor: pointer;
        padding: 15px;
        border-radius: 14px;
        font-size: 20px;
        border: none;
        margin-left: 63vw;
    }

    .depData {
        width: 100%;
        border-collapse: collapse;
        font-size: 20px;
        margin-top: -38vh;
        margin-left: 5vh;

    }

    .depData th {
        color: #5C6E9B;
        padding: 8px;
    }

    .depData td {
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

<div class="overviewLayout">
    <div>
        <div>All Departments</div>
        <div class="addDep">
            <button id="addDep">Add Department</button>
        </div>
    </div>

    <div class="contentSection ">
        <div class="data">
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
    </div>
</div>

<!-- Add Department pop-up form -->
<div class="bg-popup">
    <div class="popup-content">
        <div class="close" id="cancelAddTechnician">+</div>
        <h3 class="depInfo">Department Information</h3>
        <form action="" id="addDepartmentForm">
            <div class="col-f">
                <span for="depID" id="fieldName">Department ID</span>
                <input type="text" name="depID" id="depID">
            </div>
            <div class="col-f">
                <span for="depID" id="fieldName">Department Name</span>
                <input type="text" name="dName" id="dName">
            </div>
            <div class="col-f">
                <span for="depID" id="fieldName">Contact Number</span>
                <input type="text" name="dCon" id="dCon">
            </div>
            <div class="col-f">
                <span for="depID" id="fieldName">Description</span>
                <textarea type="text" name="dDes" id="dDes"></textarea>
            </div>
                <div class="col-btn">
                    <button class="addBtn" id="btnSaveDepartment">Add</button>
                </div>
        </form>
    </div>
</div>

<script type="text/javascript">

    //JS for pop-up form
    document.getElementById('addDep').addEventListener('click',
        function popForm() {
            document.querySelector('.bg-popup').style.display = 'flex';
        });

    // function popForm() {
    //     document.getElementById('bg-popup').style.display = 'flex';
    // }

    document.querySelector('.close').addEventListener('click',
        function popForm() {
            document.querySelector('.bg-popup').style.display = 'none';
        });

    // Getting the form data

    document.querySelectorAll(".col-btn").forEach(button=> {
        // const cancBtn = document.getElementById('cancelAddDepartment');
        const saveBtn = document.getElementById("btnSaveDepartment");
        button.addEventListener('click', function(event) {
            event.preventDefault();
            switch (event.target.id) {
                case 'cancelAddDepartment':
                    
                    break;
                case 'btnSaveDepartment':
                    const department = getFormdata();
                    saveDepartment(department);
                    console.log(department);
                    break;
            
                default:
                    break;
            }
        })
    })

    //getting the form data

    function getFormdata() {
        return new FormData(document.getElementById('addDepartmentForm'));
    }

    //Saving the department function
    //Saving department details through AJAX

    function saveDepartment(department) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST","../model/Department.php?action=departments",true);

        xhr.onload = function() {
            if(this.status === 200) {
                console.log(this.responseText);
            }
        }
        xhr.send(department);
    }

</script>