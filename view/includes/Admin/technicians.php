<style>
    .addTec #addTec {
        color: white;
        background-color: #6A71D7;
        cursor: pointer;
        padding: 15px;
        border-radius: 14px;
        font-size: 20px;
        border: none;
        margin-left: 62vw;
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
        <!-- <div> -->
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Technician ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>View</th>
                </tr>
                <tbody class="tableRowGroup" id="techniciansTableBody"></tbody>
            </thead>
        </table>
        <!-- </div> -->
    </div>
</div>

<script>
    window.addEventListener('load', loadTechnicians());
</script>

<!-- <script type="text/javascript">
    var addTechnicianBtn = document.getElementById('addTec');
    addTechnicianBtn.addEventListener('click', function() {

        //Add the code to execute

        loadSection('centerSection', 'addTechnician');

        // alert("hemlo 👽") 
    });
</script> -->