<style>
    * {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

    .overviewLayout {
        display: grid;
        /* grid-template-rows: 0.75fr 1.5fr 0.75fr 7fr; */
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

</style>

<div class="overviewLayout">
    <div>
        <div>All Departments</div>
        <div class="addDep">
            <button id="addDep">Add Department</button>
        </div>
    </div>

    <div class="contentSection ">
        <?php
        include("departmentDetails.php");
        ?>
    </div>
</div>

<!-- Add Department pop-up form -->
<div class="bg-popup">
    <div class="popup-content">
        <div class="close" id="cancelAddTechnician">+</div>
        <h3 class="depInfo">Department Information</h3>
        <form action="" id="addDepartmentForm" onsubmit="checkBlank()">
            <div class="col-f">
                <span for="depID" id="fieldName">Department ID</span>
                <input type="text" name="depID" id="depID" required />
            </div>
            <div class="col-f">
                <span for="depID" id="fieldName">Department Name</span>
                <input type="text" name="dName" id="dName" required />
            </div>
            <div class="col-f">
                <span for="depID" id="fieldName">Contact Number</span>
                <input type="text" name="dCon" id="dCon" required />
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

    document.querySelectorAll(".col-btn").forEach(button => {
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

    // checking if all fields are filled
    function checkBlank() {
        if (document.getElementById('dName').value == "") {
            alert('Please enter all the details');
            return false;
        }
    }

    //Saving the department function
    //Saving department details through AJAX

    function saveDepartment(department) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../model/Department.php?action=addDepartment", true);

        xhr.onload = function() {
            if (this.status === 200) {
                console.log(this.responseText);
            }
        }
        xhr.send(department);
    }
</script>