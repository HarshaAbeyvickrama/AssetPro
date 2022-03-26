<style>
    /* Recent activity Table CSS */
    /* hr {
        background-color: #304068;
        width: 100%;
        height: 1px;
    }

    #centerSection>div:first-of-type {
        padding: 0px 20px 20px 20px;
    } */



    .wrapper {
        display: grid;
        grid-template-columns: 50% 25% 25%;
        grid-template-rows: 50% 50%;
        gap: 18px;
    }
    .wrapper > div{
        background: white;
        padding: 1em;
        border-radius: 15px;
    }

    .box3 {
       grid-row: 1/3;
        max-width: 100%;
        max-height: 100%;
    }

    .image img{
        width: 80px;
        height: 80px;

    }

    .image{
        display: flex;
        justify-content: center;
    }

    .boxCount{
        margin-top: 22px;
        position: relative;
        font-size: 40px;
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

    .boxTitle{
        color: #707ea1;
        font-size: 20px;
        font-weight: bold;
        text-align: center;

    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="wrapper">
    <!-- Box 1 -->
    <div class="box1">
        <div class="image">
            <img src="../Images/icons/totalconsumables.png">
        </div>
        <div class="boxTitle">Total Consumables
            <div class="boxCount" id="consumableCount"></div></div>
    </div>

    <!-- Box 2 -->
    <div>
        <div class="image">
            <img src="../Images/icons/fixedassets.png">
        </div>
        <div class="boxTitle">Total Fixed
            <div class="boxCount" id="fixedCount"></div></div>
    </div>
    <!-- Box 3-->
    <div class = "box3">
        <canvas id="assetCategoriesChart"></canvas>
    </div>

    <!-- Box 4 -->
    <div>
        <div class="image">
            <img src="../Images/icons/intangibles.png">
        </div>
        <div class="boxTitle">Total Intangibles
            <div class="boxCount" id="intangibleCount"></div></div>
    </div>

    <!-- Box 5 -->
    <div class="box-5">
        <div class="image">
            <img src="../Images/icons/tangibles.png">
        </div>
        <div class="boxTitle">Total Tangibles
            <div class="boxCount" id="tangibleCount"></div></div>
    </div>

</div>


<script>
    <?php
    echo 'var userID =' . $_SESSION['UserID'];
    ?>

    <?php
    echo 'var allTangibles = 0' ;
    ?>

    const xhr = new XMLHttpRequest();
    xhr.open("GET",`http://localhost/assetpro/stats/assetsCount/${userID}`,true);
    xhr.onload = function (){
        if(this.status == 200){
            // console.log(this.response);
            const result = JSON.parse(this.response);
            document.getElementById('fixedCount').innerHTML = result.totalfixed;
             var allConsumables = document.getElementById('consumableCount').innerHTML = result.totalconsumables;
             var allIntangibles = document.getElementById('intangibleCount').innerHTML = result.totalintangibles;
            var allFixed = document.getElementById('fixedCount').innerHTML = result.totalfixed;
            allTangibles = parseInt(result.totalfixed) + parseInt(result.totalconsumables);
            document.getElementById('tangibleCount').innerHTML =   allTangibles ;
        }
        console.log(allTangibles);
        // //Assigned Assets to staff in category wise
        var labels = ['Fixed' , 'Consumables' , 'Intangibles','Tangibles'];
        var data = {
            labels: labels,
            datasets:[{
                label:'Assigned Assets in categories',
                data:[allFixed,allConsumables,allIntangibles,allTangibles],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 205, 86)',
                    'rgb(54, 162, 235)',
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
            document.getElementById('assetCategoriesChart'),
            config
        );
    }
    xhr.send();

</script>






