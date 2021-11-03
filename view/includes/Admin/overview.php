
<div class="overviewLayout">
        <div class="section-heading">Dashboard Overview</div>
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
        <div class="section-subHeading">Recent Activities</div>
    </div>
    <div class="contentSection">
        <div class="h3">Last 24 hours</div>
        <table class="table">
            <thead>
            <tr>
                <th>Date</th>
                <th>Name</th>
                <th>Role</th>
                <th>Task</th>
                <th>Time</th>
            </tr>
            </thead>
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