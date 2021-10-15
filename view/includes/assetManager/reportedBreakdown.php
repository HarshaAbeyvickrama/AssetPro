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
        background-color: wheat;
        cursor: pointer;
    }
    /* .table-data tr>td:nth-child(6) > div{
        text-align: center;
        align-items: center;
    } */
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
        <div>Reported Breakdowns</div>
    </div>
    <div class="contentSection">
        <div class="table-data">
            <table class="employeeData">
                <thead>
                    <tr>
                        <th>Number</th>
                        <th>Date</th>
                        <th>Asset ID</th>
                        <th>Asset Name</th>
                        <th>Asset Type</th>
                        <th>Reported Employee</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="employeeTableBody">
                <tr>
                    <td>1</td>
                    <td>2021/07/20</td>
                    <td>FA/12345</td>
                    <td>Computer</td>
                    <td>Fixed Asset</td>
                    <td>Kalum De Silva</td>
                    <td><div class='btnAction'>View</div></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>2021/07/20</td>
                    <td>FA/12345</td>
                    <td>Computer</td>
                    <td>Fixed Asset</td>
                    <td>Kalum De Silva</td>
                    <td><div class='btnAction'>View</div></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>2021/07/20</td>
                    <td>FA/12345</td>
                    <td>Computer</td>
                    <td>Fixed Asset</td>
                    <td>Kalum De Silva</td>
                    <td><div class='btnAction'>View</div></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>2021/07/20</td>
                    <td>FA/12345</td>
                    <td>Computer</td>
                    <td>Fixed Asset</td>
                    <td>Kalum De Silva</td>
                    <td><div class='btnAction'>View</div></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>2021/07/20</td>
                    <td>FA/12345</td>
                    <td>Computer</td>
                    <td>Fixed Asset</td>
                    <td>Kalum De Silva</td>
                    <td><div class='btnAction'>View</div></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>2021/07/20</td>
                    <td>FA/12345</td>
                    <td>Computer</td>
                    <td>Fixed Asset</td>
                    <td>Kalum De Silva</td>
                    <td><div class='btnAction'>View</div></td>
                </tr>
               
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    
    // getAll('allEmployees','employeeTableBody');
    
</script>