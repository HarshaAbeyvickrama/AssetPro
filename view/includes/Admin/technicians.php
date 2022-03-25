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
    .header-title {
        display: grid;
        grid-template-columns: 1fr 1fr;
    }
    .addTec {
        display: flex;
        justify-content: end;
    }
    .heading-title {
        display: flex;
        font-size: 30px;
        color: #304068;
        align-items: center;
        font-weight: bold;
    }
    .profile-image {
        width: 45px;
        height: 45px;
        border-radius: 50%;
    }

</style>
<div class="overviewLayout">
    <div class="header-title">
    <div class="heading-title">Technicians</div>
        <div class="addTec"><button id="addTec">Insert</button></div>
    </div>


    <div class="contentSection ">
        <!-- <div> -->
        <table class="table" id="tecData">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Technician ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Job Title</th>
                    <th>Action</th>
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
    //Loading the add technician page
    var addTechnicianBtn = document.getElementById('addTec');
    addTechnicianBtn.addEventListener('click', function() {

        loadSection('centerSection', 'addTechnician');

    });

    //Viewing the technicians details
    var viewTechnicianBtn = document.querySelectorAll('#view');
    for (var i = 0; i < viewTechnicianBtn.length; i++) {
        viewTechnicianBtn[i].addEventListener('click', function() {
            loadDepartment(event.target.parentElement.id);
            // console.log(event.target.parentElement.id);

        });
    }

    //Loading details of the selected department
    // function loadDepartment(TechnicianID) {
    //     var technicianDetails = null;
    //     const xhr = new XMLHttpRequest();
    //     xhr.open("GET", `http://localhost/assetpro/technicians/getTechnician/${TechnicianID}`, true);

    //     xhr.onload = function() {
    //         if (this.status === 200) {
    //             technicianDetails = JSON.parse(this.responseText);
    //             console.log(technicianDetails);
    //             loadSection('centerSection', 'tecprofile');

    //             var json = JSON.stringify(technicianDetails);
    //             document.cookie = `TechnicianID=${json}`;
    //         }
    //     }
    //     xhr.send();
    // }

    //Function to go back
    function goBack() {
        loadSection('centerSection', 'technicians');
    }
</script>