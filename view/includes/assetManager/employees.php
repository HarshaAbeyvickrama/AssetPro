<style>
    .overviewLayout {
        display: grid;
        /* grid-template-rows: 0.75fr 1.5fr 0.75fr 7fr; */
        height: 82vh;
        width: 87.5vw;
        overflow-y: hidden;
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

    .table-data {
        color: #304068;
        margin: 4px 4px;
        height: 500px;
        width: 100%;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .employeeData {
        width: 80%;
        border-collapse: collapse;
        font-size: 18px;
        /* margin-left: 5vw; */
        text-align: center;
    }

    .table-data th {
        color: #5C6E9B;
        padding: 8px;
        position: sticky;
        top: 0;
        background-color: white;
    }

    .table-data td {
        padding: 8px;
        font-weight: lighter;
    }
    .table-data tr:hover{
        background-color: #EAEDF5;
        cursor: pointer;
    }
    
    .btnAction{
        border-radius: 15px;
        padding: 10px 20px;
        color: white;
        font-size: 18px;
        background-color: #5C6E9B;
        width: 80px;
        max-height: 30px;
    }
    .btnAction:hover{
        color: black;
        background-color: white;
    }
    
</style>

<div class="overviewLayout">
    <div>
        <div>All Employees</div>
    </div>
    <div class="contentSection">
        <div class="table-data">
            <table class="employeeData">
                <thead>
                    <tr>
                        <th>Number</th>
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
</div>

<script>
    
    getAll('allEmployees','employeeTableBody');
    
</script>