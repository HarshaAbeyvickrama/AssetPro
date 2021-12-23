<style>
    /* Recent activity Table CSS */
    hr {
        background-color: #304068;
        width: 100%;
        height: 1px;
    }
</style>
<div class="overviewLayout">
    <div class="section-heading">Dashboard Overview</div>

    <div class="statSection">
        <div>
            <div class="statBox box1">
                <div class="statNumber" id="allAssetsCount"></div>
                <div class="statText">All Assets</div>
            </div>
        </div>

        <div>
            <div class="statBox box2">
                <div class="statNumber" id="allEmployeesCount"></div>
                <div class="statText">All Employees</div>
            </div>
        </div>

        <div>
            <div class="statBox box3">
                <div class="statNumber" id="allTechniciansCount"></div>
                <div class="statText">All Technicians</div>
            </div>
        </div>
        <div>
            <!-- <div class="statBox box4" id="allTechnicians">
                <div class="statNumber"></div>
                    <div class="statText"></div>
            </div> -->
        </div>
        <div>
            <!-- <div class="statBox box5" id="allTechnicians">
                <div class="statNumber"></div>
                    <div class="statText"></div>
            </div> -->
        </div>
    </div>
    <div class="section-subHeading">Recent Activities</div>

    <div class="contentSection scroll">
        <div class="recentActivities">
            <div class="h3">Last 24 Hours</div>

            <table class="table">
                <thead>
                    <tr>
                        <th class="tableCell">Date</th>
                        <th class="tableCell">Name</th>
                        <th class="tableCell">Task</th>
                        <th class="tableCell">Role</th>
                        <th class="tableCell">Time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="tableCell">22/10/2021</td>
                        <td class="tableCell">Wathsala</td>
                        <td class="tableCell">Reported Breakdown: FA/12345</td>
                        <td class="tableCell">Employee</td>
                        <td class="tableCell">1 Hours ago</td>
                    </tr>
                    <tr>
                        <td class="tableCell">22/10/2021</td>
                        <td class="tableCell">Wathsala</td>
                        <td class="tableCell">Reported Breakdown: FA/12345</td>
                        <td class="tableCell">Employee</td>
                        <td class="tableCell">1 Hours ago</td>
                    </tr>


                </tbody>
            </table>
        </div>

        <hr>

        <div class="recentActivities">
            <div class="h3">Earlier</div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Task</th>
                        <th>Role</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>17/10/2021</td=>
                        <td>Wathsala</td>
                        <td>Reported Breakdown: FA/12345</td>
                        <td>Employee</td>
                        <td>5 Days ago</td>
                    </tr>

                    <tr>
                        <td>17/10/2021</td=>
                        <td>Wathsala</td>
                        <td>Reported Breakdown: FA/12345</td>
                        <td>Employee</td>
                        <td>5 Days ago</td>
                    </tr>

                    <tr>
                        <td>17/10/2021</td=>
                        <td>Wathsala</td>
                        <td>Reported Breakdown: FA/12345</td>
                        <td>Employee</td>
                        <td>5 Days ago</td>
                    </tr>

                    <tr>
                        <td>17/10/2021</td=>
                        <td>Wathsala</td>
                        <td>Reported Breakdown: FA/12345</td>
                        <td>Employee</td>
                        <td>5 Days ago</td>
                    </tr>

                    <tr>
                        <td>17/10/2021</td=>
                        <td>Wathsala</td>
                        <td>Reported Breakdown: FA/12345</td>
                        <td>Employee</td>
                        <td>5 Days ago</td>
                    </tr>

                    <tr>
                        <td>17/10/2021</td=>
                        <td>Wathsala</td>
                        <td>Reported Breakdown: FA/12345</td>
                        <td>Employee</td>
                        <td>5 Days ago</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Adding
    getData('http://localhost/assetpro/stats/all/', (data) => {
        document.getElementById('allAssetsCount').innerHTML = data.allAssets;
        document.getElementById('allEmployeesCount').innerHTML = data.allEmployees;
        document.getElementById('allTechniciansCount').innerHTML = data.allTechnicians;
    });
</script>