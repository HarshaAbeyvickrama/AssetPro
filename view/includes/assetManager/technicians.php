<style>
    .overviewLayout {
        /* display: grid; */
        /* grid-template-rows: 0.75fr 1.5fr 0.75fr 7fr; */
        height: 82vh;
        width: 87.5vw;
        overflow-y: hidden;
        padding: 20px;
        background-color: #F1F4FF;
    }

  
    .contentSection {
        background-color: white;
        border-radius: 15px;
        margin-top: 15px;
        height: 82vh;
    }
    .section-heading{
        color: var(--primary);
        font-size: 24px;
        font-weight: 700;
    }
</style>

<div class="overviewLayout">
    <div>
        <div class="section-heading">All Technicians</div>
    </div>
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
            <tbody id="technicianTableBody">

            </tbody>
        </table>

    </div>
</div>

<script>
    getAll('allTechnicians', 'technicianTableBody');
</script>