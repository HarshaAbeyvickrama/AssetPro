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
        color: #304068;
    }
    .boxTitle{
        color: #707ea1;
        font-size: 15px;
        font-weight: bold;
    }
    .boxCount{
        margin-top: 22px;
        position: relative;
        font-size: 30px;
    }
    .boxCount::before{
        position: absolute;
        left: 0;
        top: -22px;
        color: #707ea1;
        font-size: 15px;
        font-weight: bold;
        content: attr(title)
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Retrieve and set all counts
    getData('http://localhost/assetpro/stats/all/', (data) => {
        document.getElementById('allAssetsCount').innerHTML = data.allAssets;
        document.getElementById('allEmployeesCount').innerHTML = data.allEmployees;
        document.getElementById('allTechniciansCount').innerHTML = data.allTechnicians;
        // document.getElementById('allTangible').innerHTML = data.tangibleAssets;
        // document.getElementById('allConsumable').innerHTML = data.consumableAssets;
        document.getElementById('allDepartmentsCount').innerHTML = data.allDepartments;
        console.log(data.allDepartments);
    });
</script>

<div class="dashboardContainer">
    <div class="gridRow one">
        <canvas id="assetBreakdownChart"></canvas>
    </div>
    <div class="gridRow three box">
        <!-- <div class="boxTitle">Total Value</div> -->
        <div class="boxCount" title="All Assets" id="allAssetsCount"></div>
    </div>
    <div class="gridRow four box">
        <!-- <div class="boxTitle">Net Value</div> -->
        <div class="boxCount" title="All Staff" id="allEmployeesCount"></div>
    </div>
    <div class="gridRow three box">
        <!-- <div class="boxTitle">Total Value</div> -->
        <div class="boxCount" title="All Technicians" id="allTechniciansCount"></div>
    </div>
    <div class="gridRow four box">
        <!-- <div class="boxTitle">Net Value</div> -->
        <div class="boxCount" title="All Departments" id="allDepartmentsCount"></div>
    </div>
    <div class="gridRow five">
        <canvas id="assetCategoriesChart">Count
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
            label: 'My Second dataset',
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
            label: 'My Third Dataset',
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
    // renderChart('assetDistributionChart', 'polarArea', data)
    renderChart('assetCategoriesChart', 'doughnut', data)
</script>

<script>
    // Asset distribuion among departments
    var labels = ['January', 'February', 'March', 'April', 'May', 'June', ];
    var data = {
        labels: labels,
        datasets: [{
            label: 'My Fourth Dataset',
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