<style>
   

  
    /* .contentSection {
        background-color: white;
        border-radius: 15px;
        margin-top: 15px;
        height: 82vh;
    } */
    .section-heading{
        color: var(--primary);
        font-size: 24px;
        font-weight: 700;
    }
</style>

<div class="overviewLayout">
    <div>
        <div class="section-heading">All Employees</div>
    </div>
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
            <tbody id="employeeTableBody">

            </tbody>
        </table>

    </div>
</div>

<script>
    getAll('allEmployees', 'employeeTableBody');
</script>