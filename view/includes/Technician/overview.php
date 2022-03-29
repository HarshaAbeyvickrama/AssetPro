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
        grid-template-columns: 25% 25% 50%;
        grid-template-rows: 50% 50%;
        gap: 18px;
    }

        /* grid-template-rows: repeat(3 , 1fr); */
        /* width: 90%; */
    

    .gridRow {
        padding: 5px;
        border-radius: 15px;
        background-color: white;
        max-width: 100%;
        max-height: 100%;
    }
        /* border: 1px solid green; */
    

    .one {
        grid-column: 1 / 3;
        grid-row: 1 / 3;
    }

    /* .two {
        grid-row: 1 / 3;
    } */

    .seven {
        grid-row: 2/3;
    }


    #assetDistributionDepartments {
        height: 250px !important;
        max-width: 100% !important;

    }

    .image img{
        width: 80px;
        height: 80px;

    }

    .image{
        display: flex;
        justify-content: center;
    }

    .box{
        padding: 10px 20px;
        display: grid;
        align-items: center;
        color: #304068;
    }
    .boxTitle{
        color: #707ea1;
        font-size: 20px;
        font-weight: bold;
        text-align: center;

    }
    .boxCount{
        margin-top: 22px;
        position: relative;
        font-size: 60px;
        
    }

    .boxCount::before{
        position: absolute;
        left: 0;
        top: -22px;
        color: #707ea1;
        font-size: 20px;
        font-weight: bold;
        content: attr(title);
        text-align: center;
    }

    .gridRowsixbox {
        grid-row: 1/3;
        max-width: 100%;
        max-height: 100%;

    }
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="dashboardContainer">
   

        <!-- <canvas id="assetBreakdownChart"></canvas> -->
        <!-- <div class="gridRow one">
            <div class="boxCount" title="All Assets">Rs.785,000</div>
        </div> -->

        <!-- <canvas id="assetDistributionChart"></canvas> -->
        <div class="gridRow two box">
            <!-- <div class="image">
                <img src="../Images/icons/totalconsumables.png">
            </div> -->
            <div class="boxCount" title="All Assets">5</div>
        </div>

        <!-- <div class="boxTitle">Total Value</div> -->
        <div class="gridRow three box">
            <!-- <div class="image">
                <img src="../Images/icons/fixedassets.png">
            </div> -->
            <div class="boxCount" title="Assigned Assets">2</div>
        </div>

        <!-- <div class="boxTitle">Net Value</div> -->
        <div class="gridRow four box">
            <canvas id="assetDistributionDepartments"></canvas>
        </div>

        <!-- <canvas id="assetCategoriesChart"></canvas> -->
        <div class="gridRow five box">
            <!-- <div class="image">
                <img src="../Images/icons/tangibles.png">
            </div> -->
            <div class="boxCount" title="Repaired Assets">2</div>
        </div>

        
        <div class="gridRow six box">
            <!-- <div class="image">
                <img src="../Images/icons/intangibles.png">
            </div> -->
            <div class="boxCount" title="Breakdowns In Progress">2</div>
            
        </div>

        <!-- <div class="gridRow seven">
            <canvas id="assetDistributionDepartments"></canvas>
        </div> -->
    
</div>

<script>
    // Asset distribuion among departments
    var labels = ['Breakdown Assets', 'Repaired Assets',];
    var data = {
        labels: labels,
        datasets: [{
            label: 'Asset Count',
            data: [4, 2],
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