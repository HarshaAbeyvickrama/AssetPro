<style>
    .overviewLayout{
        display: grid;
        grid-template-rows: 0.75fr 1.5fr 0.75fr 7fr ;
        /* height: 82vh;
        width: 87.5vw;
        overflow-y: auto;
        padding: 20px;
        background-color: #F1F4FF; */
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
        grid-template-columns: repeat(5 1fr);
        width: 100%;
        height: 100%;
    }
    .statSection > div{
        width: 100%;
        height: 100%;
        display: flex;
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
    /* .contentSection{
        background-color: white;
        border-radius: 15px;
        padding:15px;
    } */

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

    /*............Recent Activities CSS..............*/
    





/*inside content section*/
    .econtainer1{     
        width:100%;
        height:100%;
        display:grid;
        grid-template-columns:1fr 1fr 2fr 1fr;
        font-size:18px;
        font-weight:lighter;
        text-align:center;      
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
                    <div class="statNumber" id="Tangibles"></div>
                    <div class="statText">Tangible Assets</div>
            </div>
        </div>
            
        <div>
            <div class="statBox box3" >
                <div class="statNumber" id="Fixeds">40</div>
                    <div class="statText">Fixed Assets</div>
            </div>
        </div>

        <div>
            <div class="statBox box4" >
                <div class="statNumber" id="Consumables">30</div>
                <div class="statText">Consumable Assets</div>
            </div>
        </div>

        <div>
            <div class="statBox box5" >
                <div class="statNumber" id="Intangibles">30</div>
                <div class="statText">Intangible Assets</div>
            </div>
        </div>

        
    </div>

    <div>
    <div>Recent Activities</div>
    </div>

    <div class="contentSection">
        <div class="econtainer1"> 
                 <div>
                     <h5>Date</h5>
                     <p>2021/9/09</p>
                     <p>2021/7/07</p>
                     <p>2021/1/09</p>
                     <p>2021/1/19</p>
                     <p>2021/7/09</p>
                 </div>

                 <div>
                     <h5>Role</h5>
                     <p>Employee1</p>
                     <p>Employee3</p>
                     <p>Employee7</p>
                     <p>Employee9</p>
                     <p>Employee4</p>
                 </div>

                 <div>
                     <h5>Task</h5>
                     <p>Reported breakdown of the asset FA/C/123</p>
                     <p>Reported breakdown of the asset CA/T/323</p>
                     <p>Reported breakdown of the asset FA/C/190</p>
                     <p>Reported breakdown of the asset FA/T/200</p>
                     <p>Reported breakdown of the asset FA/T/890</p>
                 </div>
                 
                 <div>
                     <h5>Time</h5>
                     <p>5 days ago</p>
                     <p>7 days ago</p>
                     <p>9 days ago</p>
                     <p>3 days ago</p>
                     <p>1 days ago</p>
                 </div>
        </div>
        
    </div>
</div>

<script>
    // document.getElementById('allAssets').innerHTML =  getCount('allAssets');
    getCount('allAssets','allAssets');
    getCount('allTangible','Tangibles');
    getCount('allFixed','Fixeds');
    getCount('allConsumables','Consumables');
    getCount('allIntangibles','Intangibles');
    // console.log('c : ',a);
</script>