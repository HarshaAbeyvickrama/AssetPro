<div class="overviewLayout">
    <div class="section-heading">All Employees</div>

    <div class="contentSection">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="employeeTableBody"></tbody>
        </table>
    </div>
</div>
<script>
    getAll('allEmployees', 'employeeTableBody');
</script>