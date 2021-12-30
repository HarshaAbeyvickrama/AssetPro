<!-- <style>
    .overviewLayout{
        display: grid;
        grid-template-rows: 0.75fr 1.5fr 0.75fr 7fr 0.75fr;
             
    }
    .overviewLayout > div{
        display: grid;
        align-items: center;
        color: #304068;
        font-size: 24px;
        font-weight: bold;
    }
    .statSection{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
        width: 100%;
        height: 100%;
    }
    .statSection > div{
        width: 100%;
        height: 100%;
        display: flex;
        /* justify-content: center; */
        align-items: center;
    }
    .statBox{
        display: grid;
        grid-template-rows: 3fr 2fr;
        color: white;
        height: 95%;
        width: 90%;
        border-radius: 12px;
    }
    .statBox > div{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .statNumber{
        font-size: 40px;
    }
    .statText{
        font-size: 17px;
        font-weight: lighter;
    }
    .box1{
        background-color: #304068;
    }
    .box2{
        background-color: #6A71D7;
    }
    .box3{
        background-color: #3D7DDB;
    }
    .box4{
        background-color: #6165A2;
    }
    .box5{
        background-color: #4E74AB;
    }

    
    .overviewLayout .contentSection{
        all: revert;
        display: inline-block;
        border-radius: 15px;
        padding: 10px;
        background-color: white;
        overflow-y: auto;
    }
    .contentSection > div{
        margin:15px;
        height: auto;
    }
    .recentTitle{
        color: #304068;
        font-size: 20px;
        font-weight: bold;
    }



</style>

<div class="overviewLayout">
    <div>
        <div>Dashboard Overview</div>
    </div>

    <div class="statSection">
        <div>
            <div class="statBox box1" >
                <div class="statNumber" id="Assets"></div>
                <div class="statText">All Assets</div>
            </div>
        </div>

        <div>
            <div class="statBox box2" >
                    <div class="statNumber" id="Tangibles"></div>
                    <div class="statText">All Tangibles</div>
            </div>
        </div>
            
        <div>
            <div class="statBox box3" >
                <div class="statNumber" id="Fixeds"></div>
                    <div class="statText">All Fixeds</div>
            </div>
        </div>
        <div>
            <div class="statBox box4">
                <div class="statNumber" id="Consumables"></div>
                    <div class="statText">All Consumables</div>
            </div>
        </div>
        <div>
            <div class="statBox box5">
                <div class="statNumber" id="Intangibles"></div>
                    <div class="statText">All Intangible</div>
            </div>
        </div>
    </div>

    <div>
        <div>Recent Activities</div>
    </div>

    <div class="contentSection">
        <div class="recent24">
            <div class="recentTitle">Last 24 Hours</div>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Task</th>
                    <th>Time</th>
                </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>22/10/2021</td>
                        <td>Successfully reported Breakdown: FA/6789</td>
                        <td>1 hour ago</td>
                    </tr>
                    
                    <tr>
                        <td>2</td>
                        <td>22/10/2021</td>
                        <td>Successfully reported Breakdown: FA/1234</td>
                        <td>2 hour ago</td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>22/10/2021</td>
                        <td>Successfully reported Breakdown: FA/9056</td>
                        <td>2 hour ago</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <hr>

        <div class="oldActivities">
            <div class="recentTitle">Earlier</div>
            <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Task</th>
                    <th>Time</th>
                </tr>
                </thead>

                 <tbody>
                   <tr>
                        <td>1</td>
                        <td>21/10/2021</td>
                        <td>Successfully reported Breakdown: FA/6542</td>
                        <td>1 day ago</td>
                   </tr>

                   <tr>
                        <td>2</td>
                        <td>17/10/2021</td>
                        <td>Successfully reported Breakdown: FA/8741</td>
                        <td>5 days ago</td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>17/10/2021</td>
                        <td>Successfully reported Breakdown: FA/5121</td>
                        <td>5 days ago</td>
                    </tr>

                    <tr>
                        <td>4</td>
                        <td>14/10/2021</td>
                        <td>Successfully reported Breakdown: FA/1256</td>
                        <td>7 days ago</td>
                    </tr>

                    <tr>
                        <td>5</td>
                        <td>14/10/2021</td>
                        <td>Successfully reported Breakdown: FA/9843</td>
                        <td>7 days ago</td>
                    </tr>

                    <tr>
                        <td>6</td>
                        <td>13/10/2021</td>
                        <td>Successfully reported Breakdown: FA/5467</td>
                        <td>8 days ago</td>
                    </tr>

                    <tr>
                        <td>7</td>
                        <td>13/10/2021</td>
                        <td>Successfully reported Breakdown: FA/8765</td>
                        <td>8 day ago</td>
                    </tr>
                 </tbody>
            </table>
        </div>
    </div>
    
</div>
<script>
    getCount('allAssets','Assets');
    getCount('allTangible','Tangibles');
    getCount('allFixed','Fixeds');
    getCount('allConsumables','Consumables');
    getCount('allIntangibles','Intangibles');
</script> -->


<style>
    /* Recent activity Table CSS */
    hr {
        background-color: #304068;
        width: 100%;
        height: 1px;
    }

    #centerSection>div:first-of-type {
        padding: 0px 20px 20px 20px;
    }

    .dashboardContainer {
        height: 90vh;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-template-rows: 1fr 1fr 2fr;
        /* grid-template-rows: repeat(3 , 1fr); */
        gap: 18px;
        /* width: 90%; */
    }

    .gridRow {
        /* border: 1px solid green; */
        padding: 5px;
        border-radius: 15px;
        background-color: white;
        max-width: 100%;
        max-height: 100%;
    }

    .one {
        grid-column: 1 / 3;
        grid-row: 1 / 3;
    }

    .two {
        grid-row: 1 / 3;
    }

    .seven {
        grid-column: 3/5;
    }



    #assetBreakdownChart {
        height: 100% !important;
    }

    #assetDistributionChart {
        height: 100% !important;
    }

    #assetCategoriesChart {
        max-width: 100% !important;
        max-height: 280px !important;
    }

    #assetDisposalsChart {
        max-width: 100% !important;
        max-height: 280px !important;
    }

    #assetDistributionDepartments {
        height: 280px !important;
        max-width: 100% !important;

    }
    .box{
        padding: 10px 20px;
        display: grid;
        align-items: center;
    }
    .boxTitle{
        border: 1px solid red;
        font-size: 18px;
    }
    .boxCount{
        border: 1px solid red;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="dashboardContainer">
    <div class="gridRow one">
        <canvas id="assetBreakdownChart"></canvas>
    </div>
    <div class="gridRow two">
        <canvas id="assetDistributionChart"></canvas>
    </div>
    <div class="gridRow three box">
        <div class="boxTitle">Total Value</div>
        <div class="boxCount">Rs.785,000</div>
    </div>
    <div class="gridRow four box">
        <div class="boxTitle">Net Value</div>
        <div class="boxCount">Rs.555,000</div>
    </div>
    <div class="gridRow five">
        <canvas id="assetCategoriesChart"></canvas>
    </div>
    <div class="gridRow six">
        <canvas id="assetDistributionDepartments"></canvas>
    </div>
    <div class="gridRow seven">
        <canvas id="assetDisposalsChart"></canvas>
    </div>
</div>
<!-- breakdwon chart js -->
<script>
    var labels = ['January', 'February', 'March', 'April', 'May', 'June', ];

    var data = {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45],
        }]
    };

    var config = {
        type: 'line',
        data: data,
        options: {}
    };
    var assetBreakdownChart = new Chart(
        document.getElementById('assetBreakdownChart'),
        config
    );
</script>

<!-- Disposals chart js -->
<script>
    var labels = ['January', 'February', 'March', 'April', 'May', 'June', ];

    var data = {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45],
        }]
    };

    var config = {
        type: 'line',
        data: data,
        options: {}
    };
    var assetBreakdownChart = new Chart(
        document.getElementById('assetDisposalsChart'),
        config
    );
</script>

<!-- Asset distribtion polar area chart -->
<script>
    function renderChart(canvasID, chartType, chartData, chartOptions = {}) {
        var ctx = document.getElementById(canvasID).getContext('2d');
        var chart = new Chart(ctx, {
            type: chartType,
            data: chartData,
            options: chartOptions
        });
    }
    var data = {
        labels: [
            'Red',
            'Green',
            'Yellow',
            'Grey',
            'Blue'
        ],
        datasets: [{
            label: 'My First Dataset',
            data: [11, 16, 7, 3, 14],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(75, 192, 192)',
                'rgb(255, 205, 86)',
                'rgb(201, 203, 207)',
                'rgb(54, 162, 235)'
            ]
        }]
    };
    renderChart('assetDistributionChart', 'polarArea', data)
    renderChart('assetCategoriesChart', 'doughnut', data)
</script>

<script>
    // Asset distribuion among departments
    var labels = ['January', 'February', 'March', 'April', 'May', 'June', ];
    var data = {
        labels: labels,
        datasets: [{
            label: 'My First Dataset',
            data: [65, 59, 80, 81, 56, 55, 40],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
    };
    var config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };

    var assetBreakdownChart = new Chart(
        document.getElementById('assetDistributionDepartments'),
        config
    );
</script>

<script>
    // Adding
    getData('http://localhost/assetpro/stats/all/', (data) => {
        document.getElementById('allAssetsCount').innerHTML = data.allAssets;
        document.getElementById('allEmployeesCount').innerHTML = data.allEmployees;
        document.getElementById('allTechniciansCount').innerHTML = data.allTechnicians;
    });
</script>