<style>
    .overviewLayout {
        display: grid;
        grid-template-rows: 0.75fr 1.5fr 0.75fr 7fr;
        height: 82vh;
        /* width: 87.5vw; */
        overflow-y: auto;
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

    .statSection {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
        width: 100%;
        height: 100%;
    }

    .statSection>div {
        width: 100%;
        height: 100%;
        display: flex;
        /* justify-content: center; */
        align-items: center;
    }

    .statBox {
        display: grid;
        grid-template-rows: 3fr 2fr;
        color: white;
        height: 95%;
        width: 90%;
        border-radius: 12px;
    }

    .statBox>div {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .statNumber {
        font-size: 40px;
    }

    .statText {
        font-size: 17px;
        font-weight: lighter;
    }

    .box1 {
        background-color: #304068;
    }

    .box2 {
        background-color: #6A71D7;
    }

    .box3 {
        background-color: #3D7DDB;
    }

    .box4 {
        background-color: #6165A2;
    }

    .box5 {
        background-color: #4E74AB;
    }

    .contentSection {
        background-color: white;
        border-radius: 15px;
    }

    .contentSection h2 {
        color: #304068;
        font-size: 20px;
        margin-top: -50vh;
        margin-left: 5vh;
    }

    table {
        color: #5c6e9b;
        margin: 4px 4px;
        height: 400px;
        width: 80%;
        margin-left: -100px;
        overflow-y: auto;
        overflow-x: hidden;
        text-align: left;
        font-size: 18px;
    }

    table tr:hover {
        background-color: #EAEDF5;
        cursor: pointer;
    }

    td {
        /* width: 100%; */
        border-collapse: collapse;
        font-size: 18px;
        margin-left: 5vh;
        text-align: left;
    }

    th {
        color: #5C6E9B;
        padding: 8px;
    }

    td {
        padding: 8px;
        font-weight: lighter;
    }
</style>
<div class="overviewLayout">
    <div>
        <div>Dashboard Overview</div>
    </div>
    <div class="statSection">
        <div>
            <div class="statBox box1" id="allAssets">
                <div class="statNumber" id="allAssetsCount"></div>
                <div class="statText">All Assets</div>
            </div>
        </div>

        <div>
            <div class="statBox box2" id="allEmployees">
                <div class="statNumber" id="allEmployeesCount"></div>
                <div class="statText">All Employees</div>
            </div>
        </div>

        <div>
            <div class="statBox box3" id="allTechnicians">
                <div class="statNumber" id="allTechniciansCount"></div>
                <div class="statText">All Technicians</div>
            </div>
        </div>

        <div>
            <!-- <div class="statBox box4" id="allTechnicians">
                <div class="statNumber">56</div>
                    <div class="statText">All Technicians</div>
            </div> -->
        </div>

        <div>
            <!-- <div class="statBox box5" id="allTechnicians">
                <div class="statNumber">56</div>
                    <div class="statText">All Technicians</div>
            </div> -->
        </div>
    </div>
    <div>
        <div>Recent Activities</div>
    </div>
    <div class="contentSection">
        <h2>Last 24 hours</h2>
        <table>
            <tr>
                <th>Date</th>
                <th>Name</th>
                <th>Role</th>
                <th>Task</th>
                <th>Time</th>
            </tr>
            <tr>
                <td>22/10/2021</td>
                <td>Wathsala</td>
                <td>Employee</td>
                <td>Wathsala was added to the system</td>
                <td>1 hours ago</td>
            </tr>
            <tr>
                <td>22/10/2021</td>
                <td>Kasun</td>
                <td>Employee</td>
                <td>Kasun was added to the system</td>
                <td>1 hours ago</td>
            </tr>
            <tr>
                <td>22/10/2021</td>
                <td>Manoj</td>
                <td>Technician</td>
                <td>Manoj was added to the system</td>
                <td>2 hours ago</td>
            </tr>
            <tr>
                <td>21/10/2021</td>
                <td>Dasun</td>
                <td>Technician</td>
                <td>Dasun was added to the system</td>
                <td>1 Day ago</td>
            </tr>
            <tr>
                <td>21/10/2021</td>
                <td>Amali</td>
                <td>Employee</td>
                <td>Amali was added to the system</td>
                <td>1 Day ago</td>
            </tr>
        </table>
    </div>
</div>

<script>
    getCount('allAssets', 'allAssetsCount');
    getCount('allEmployees', 'allEmployeesCount');
    getCount('allTechnicians', 'allTechniciansCount');
</script>