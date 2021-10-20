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
    .table-data tr>td:nth-child(6) > div{
        text-align: center;
        align-items: center;
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
        background-color: #EAEDF5;
    }
</style>

<div class="overviewLayout">
    <div>
        <div>Asset Disposal</div>
    </div>
    <div class="contentSection">
        <div class="table-data">
            <table class="employeeData">
                <thead>
                    <tr>
                        <th>Number</th>
                        <th>Asset ID</th>
                        <th>Asset Name</th>
                        <th>Asset Type</th>
                        <th>Useful Years</th>
                        <th>Submit for disposal</th>
                    </tr>
                </thead>
                <tbody id="employeeTableBody">
                <tr>
                    <td>1</td>
                    <td>FA/12345</td>
                    <td>Computer</td>
                    <td>Fixed Asset</td>
                    <td>5</td>
                    <td><div class='btnAction'>Submit</div></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>FA/12345</td>
                    <td>Computer</td>
                    <td>Fixed Asset</td>
                    <td>5</td>
                    <td><div class='btnAction'>Submit</div></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>FA/12345</td>
                    <td>Computer</td>
                    <td>Fixed Asset</td>
                    <td>5</td>
                    <td><div class='btnAction'>Submit</div></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>FA/12345</td>
                    <td>Computer</td>
                    <td>Fixed Asset</td>
                    <td>5</td>
                    <td><div class='btnAction'>Submit</div></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>FA/12345</td>
                    <td>Computer</td>
                    <td>Fixed Asset</td>
                    <td>5</td>
                    <td><div class='btnAction'>Submit</div></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    
    // getAll('allEmployees','employeeTableBody');
    
</script>