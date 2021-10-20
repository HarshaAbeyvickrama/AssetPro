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
        /* display: flex;
        align-items: center; */
        color: #304068;
        font-size: 18px;
        /* font-weight: bold; */

    }

    .contentSection {
        background-color: white;
        border-radius: 15px;
        margin-top: 15px;
        height: 82vh;
    }
    #tabSections {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #tabSections > div {
        width: 200px;
        display: flex;
        align-items: center;
        text-align: center;
        justify-content: center;
        color: #304068;
        font-size: 20px;
        height: 100%;
        padding: 8px 0px;
    }
    #tabSections > div:hover {
        cursor: pointer;
        background-color: aliceblue;
        transition: 0.5s;
    }
    #tabContents {
        display: flex;
        align-items: center !important;
    }
    #generalDetails {
        background-image: linear-gradient(#EAEDF5, white);
    }
</style>
<div class="overviewLayout">
    <div>
        <div>Department Details</div>
    </div>
    <div class="contentSection">
        <div id="tabSections">
            <div id="generalDetails">General Details</div>
            <div id="departmentEmployeeList">Employees</div>
        </div>
        <div id="tabContents">
            <?php
                include("generalDetails.php");
            ?>
        </div>
    </div>

</div>

<script type="text/javascript">
    document.getElementById('tabSections').addEventListener('click',function(e) {
        const eventId = e.target.id;
        if(eventId != 'tabSections') {
            loadSection('tabContents',eventId);
            e.stopPropagation();
        }
    });

    // document.getElementById('generalDetails').addEventListener('click', loadDetails);
    // document.getElementById('employeeList').addEventListener('click', loadEmployeeList);

    // function loadDetails() {
    //     var xhr = new XMLHttpRequest();
    //     xhr.open('GET','generalDetails.php', true);

    //     xhr.onload = function() {
    //         if(this.status == 200) {
    //             document.getElementById('tabContent').innerHTML = this.responseText;

    //         }
    //     }
    // }
</script>