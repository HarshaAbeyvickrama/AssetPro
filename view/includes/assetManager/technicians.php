<div class="overviewLayout">
    <div class="section-heading">All Technicians</div>

    <div class="contentSection">

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Technician ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="technicianTableBody"></tbody>
        </table>

    </div>
</div>

<script>
    getAll('allTechnicians', 'technicianTableBody');
</script>