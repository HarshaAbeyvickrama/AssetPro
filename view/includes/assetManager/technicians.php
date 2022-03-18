<div class="overviewLayout">
    <div class="section-heading">All Technicians</div>

    <div class="contentSection">

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Technician ID</th>
                    <th>Name</th>
                    <th>Specialization</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="technicianTableBody"></tbody>
        </table>

    </div>
</div>

<script>
    getData('http://localhost/assetpro/technicians/all', (technicians) => {
        let technicianTableBody = document.getElementById('technicianTableBody');
        technicians.forEach((technician, index) => {
            console.log(technician);
            var row = document.createElement('tr');
            var btn = document.createElement('div');
            btn.classList.add('btn');
            btn.classList.add('btn-assign');
            btn.id = technician.TechnicianID;
            btn.innerHTML = 'View';
            addViewAssetListener(btn, (id) => {
                popup = document.querySelector('.popup-container');
                popup.style.display = 'grid';
                document.cookie = `TechnicianID = ${id}`;
                loadSection('popup', 'techprofile');
            })
            var tr = create('tr');
            var td = create('td', index + 1);
            tr.appendChild(td);
            td = create('td', `TECH/${technician.TechnicianID}`);
            tr.appendChild(td);
            td = create('td', technician.Name);
            tr.appendChild(td);
            td = create('td', '');
            tr.appendChild(td);
            td = create('td');
            td.appendChild(btn);
            tr.appendChild(td);
            tr.id = technician.UserID;
            technicianTableBody.appendChild(tr);
        })
    });
</script>