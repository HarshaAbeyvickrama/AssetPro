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
        <?php
        include("employeeDetails.php");
        ?>
    </div>
</div>
<script type="text/javascript">
    var addEmployeeBtn = document.getElementById('addEmp');
    addEmployeeBtn.addEventListener('click', function() {

        loadSection('centerSection', 'addEmployee');

    });
</script>