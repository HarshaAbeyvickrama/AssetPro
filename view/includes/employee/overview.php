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
            <div class="boxCount">10</div></div>
    </div>

    <!-- Box 5 -->
    <div class="box-5">
        <div class="image">
            <img src="../Images/icons/tangibles.png">
        </div>
        <div class="boxTitle">Total Tangibles
            <div class="boxCount">30</div></div>
    </div>

</div>


<script>
    //Assigned Assets to staff in category wise
    var labels = ['Fixed' , 'Consumables' , 'Intangibles'];
    var data = {
        labels: labels,
        datasets:[{
            label:'Assigned Assets in categories',
            data:[10,20,30,40,50,60,70],
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
        document.getElementById('assetCategoriesChart'),
        config
    );

    <?php
    echo 'var userID =' . $_SESSION['UserID'];
    ?>


    // console.log(userID);
    //==============Getting All Fixed Assets assigned=================
    const xhr = new XMLHttpRequest();
    xhr.open("GET",`http://localhost/assetpro/stats/fixedCount/${userID}`,true);
    xhr.onload = function (){
        // console.log(this.response);
        if(this.status == 200){
            const result = JSON.parse(this.response);
            document.getElementById('fixedCount').innerHTML = result.fixedcount;
        }
    }
    xhr.send();

    //==============Getting All Consumable Assets assigned=================
    const xhr1 = new XMLHttpRequest();
    xhr1.open("GET",`http://localhost/assetpro/stats/consumableCount/${userID}`,true);
    xhr1.onload = function (){
        console.log(this.response);
        if(this.status == 200){
            const result1 = JSON.parse(this.response);
            document.getElementById('consumableCount').innerHTML = result1.consumablecount;
        }
    }
    xhr1.send();


</script>






