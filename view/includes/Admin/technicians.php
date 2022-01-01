<style>
    .addTec #addTec {
        color: white;
        background-color: #6A71D7;
        cursor: pointer;
        padding: 15px;
        border-radius: 14px;
        font-size: 20px;
        border: none;
        /* margin-left: 62vw; */
    }


</style>
<div class="overviewLayout">
    <div>
        <!-- <div>All Technicians</div> -->
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

<script type="text/javascript">
    //Loading the add employee page
    var addTechnicianBtn = document.getElementById('addTec');
    addTechnicianBtn.addEventListener('click', function() {

        loadSection('centerSection', 'addTechnician');

    });

    //Viewing the deaprtment details
    var viewEmployeeBtn = document.querySelectorAll('#view');
    for (var i = 0; i < viewEmployeeBtn.length; i++) {
        viewEmployeeBtn[i].addEventListener('click', function() {
            loadDepartment(event.target.parentElement.id);
            // console.log(event.target.parentElement.id);

        });
    }

    //Loading details of the selected department
    function loadDepartment(TechnicianID) {
        var technicianDetails = null;
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `http://localhost/assetpro/technicians/getTechnician/${TechnicianID}`, true);

        xhr.onload = function() {
            if (this.status === 200) {
                technicianDetails = JSON.parse(this.responseText);
                console.log(technicianDetails);
                loadSection('centerSection', 'tecprofile');

                var json = JSON.stringify(technicianDetails);
                document.cookie = `TechnicianID=${json}`;
            }
        }
        xhr.send();
    }

    //Function to go back
    function goBack() {
        loadSection('centerSection', 'technicians');
    }
</script>