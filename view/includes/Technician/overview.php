<!-- <style>
    .overviewLayout{
        display: grid;
        grid-template-rows: 0.75fr 1.5fr 0.75fr 7fr ;
             
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
        /* grid-template-rows: 1fr 1fr; */
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


    /* Recent activity Table CSS */
    .table{
        display: table;
        width: 100%;
        margin: 10px 0px;
        color: #5C6E9B;
        text-align: Left;
        
    }
    .tableHeader{
        display: table-header-group;
        font-size: 19px;
        padding: 15px;
        font-weight: bold;
    }
    .table .tableRowGroup{
        display: table-row-group;
    }
    .tableRow{
        display: table-row;
    }
    .tableCell{
        display: table-cell;
    }
    .tableRowGroup .tableRow:hover{
        cursor: pointer;
            
    }
    .tableRow .tableCell{
        padding:10px 0px;
        
    }
    hr{
        background-color: #304068;
        width: 100%;
        /* height: 1px; */
    }

</style> -->
<!-- <div class="overviewLayout">
    <div>
        <div> Dashboard Overview </div>
    </div>
    <div class="statSection">
        <div>
            <div class="statBox box1" id="allAssets">
                <div class="statNumber" id="allAssets"> 16 </div>
                <div class="statText"> All Assets </div>
            </div>
        </div>

        <div>
            <div class="statBox box2" id="assignedAssets">
                    <div class="statNumber" id="assignedAssets"> 4 </div>
                    <div class="statText"> Assigned Assets </div>
            </div>
        </div>
            
        <div>
            <div class="statBox box3" id="inProgress">
                <div class="statNumber" id="inProgress"> 6 </div>
                    <div class="statText"> In Progress </div>
            </div>
        </div>

        <div>
            <div class="statBox box4" id="repairedAssets">
                <div class="statNumber" id="repairedAssets"> 6 </div>
                    <div class="statText"> Repaired Assets </div>
            </div>
        </div> -->

        <!-- <div> -->
            <!-- <div class="statBox box4" id="allTechnicians">
                <div class="statNumber"></div>
                    <div class="statText"></div>
            </div> -->
        <!-- </div> -->

        <!-- <div> -->
            <!-- <div class="statBox box5" id="allTechnicians">
                <div class="statNumber"></div>
                    <div class="statText"></div>
            </div> -->
        <!-- </div> -->
    <!-- </div> -->
<!-- 
    <div>
        <div> Recent Activities </div>
    </div>
    <div class="contentSection scrollbar">
        <div class="recent24">
            <div class="recentTitle"> Last 24 Hours </div>

            <div class="recentActivityTable table">
                <div class="tableHeader">
                    <div class="tableCell"> Date </div>
                    <div class="tableCell"> Task </div>
                    <div class="tableCell"> Time </div>
                </div>
                <div class="tableRowGroup">
                    <div class="tableRow">
                        <div class="tableCell"> 22/10/2021 </div>
                        <div class="tableCell"> FA/CP/1 was assigned to you </div>
                        <div class="tableCell"> 1 hours ago </div>
                    </div>
                    <div class="tableRow">
                        <div class="tableCell"> 22/10/2021 </div>
                        <div class="tableCell"> Successfully repaired FA/12346 </div>
                        <div class="tableCell"> 2 hours ago </div>
                    </div>
                   
                </div>
            </div>
        </div>

        <hr>

        <div class="oldActivities">
            <div class="recentTitle"> Earlier </div>

            <div class="recentActivityTable table">
                <div class="tableHeader">
                    <div class="tableCell"> Date </div>
                    <div class="tableCell"> Task </div>
                    <div class="tableCell"> Time </div>
                </div>
                <div class="tableRowGroup">
                    <div class="tableRow">
                        <div class="tableCell"> 20/10/2021 </div>
                        <div class="tableCell"> Reported a Breakdown of FA/23445 </div>
                        <div class="tableCell"> 2 days ago </div>
                    </div>
                    <div class="tableRow">
                        <div class="tableCell"> 18/10/2021 </div>
                        <div class="tableCell"> Reported a Breakdown of FA/23456 </div>
                        <div class="tableCell"> 4 day ago </div>
                    </div>
                    <div class="tableRow">
                        <div class="tableCell"> 12/10/2021 </div>
                        <div class="tableCell"> IA/34567 was unassigned from you </div>
                        <div class="tableCell"> 10 days ago </div>
                    </div> -->
<!--                    
                </div>
            </div>
        </div>
    </div>
</div>  -->

<!-- <script>
    getCount('allAssets');
    getCount('assignedAssets');
    getCount('inProgress');
    getCount('repairedAssets');
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

<div class="dashboardContainer">
    <div class="gridRow one">
        <canvas id="assetBreakdownChart"></canvas>
    </div>
    <div class="gridRow two">
        <canvas id="assetDistributionChart"></canvas>
    </div>
    <div class="gridRow three box">
        <!-- <div class="boxTitle">Total Value</div> -->
        <div class="boxCount" title="Total Value">Rs.785,000</div>
    </div>
    <div class="gridRow four box">
        <!-- <div class="boxTitle">Net Value</div> -->
        <div class="boxCount" title="Net Value">Rs.555,000</div>
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