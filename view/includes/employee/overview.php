<style>
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
                <div class="statNumber" id="allAssets"></div>
                <div class="statText">All Assets</div>
            </div>
        </div>

        <div>
            <div class="statBox box2" >
                    <div class="statNumber" id="allTangibles"></div>
                    <div class="statText">All Tangibles</div>
            </div>
        </div>
            
        <div>
            <div class="statBox box3" >
                <div class="statNumber" id="allFixeds"></div>
                    <div class="statText">All Fixeds</div>
            </div>
        </div>
        <div>
            <div class="statBox box4">
                <div class="statNumber" id="allConsumables"></div>
                    <div class="statText">All Consumables</div>
            </div>
        </div>
        <div>
            <div class="statBox box5">
                <div class="statNumber" id="allIntangibles"></div>
                    <div class="statText">All Consumables</div>
            </div>
        </div>
    </div>

    <div>
        <div>Recent Activities</div>
    </div>

     <div class="contentSection scrollbar">
         <div class = "recent24">
     </div>

    
</div>
<script>
    // getCount('allAssets','allAssets');
    // getCount('allTangibles','allTangibles');
    // getCount('allTechnicians','allTechniciansCount');
</script>