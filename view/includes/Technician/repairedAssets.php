<style>
    .overviewLayout{
        display: grid;
        grid-template-rows: 0.75fr 1.5fr 0.75fr 7fr ;
        height: 82vh;
        width: 87.5vw;
        overflow-y: auto;
        padding: 20px;
        background-color: #F1F4FF;
    }

    .overviewLayout > div{
        display: flex;
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
    
    .contentSection{
        background-color: white;
        border-radius: 15px;
        padding:15px;
    }

    /*inside content section*/ 
    .econtainer{     
        width:100%;
        height:100%;
        display:grid;
        grid-template-columns:1fr 1fr 2fr 1fr;
        
    }
   
   
</style>

<div class="overviewLayout">

    <div>
        <div> Overview </div>
    </div>

    <div class="statSection">
        <div>
            <div class="statBox box1" id="allAssets">
                <div class="statNumber">10</div>
                <div class="statText">All Assets</div>
            </div>
        </div>
            
        <div>
            <div class="statBox box2" id="assigned assets">
                <div class="statNumber">4</div>
                    <div class="statText">Assigned Assets</div>
            </div>
        </div>

        <div>
            <div class="statBox box3" id="inProgress">
                <div class="statNumber">6</div>
                <div class="statText">In Progress</div>
            </div>
        </div>

        <div>
            <div class="statBox box4" id="repairedAssets">
                <div class="statNumber">6</div>
                <div class="statText">Repaired Assets</div>
            </div>
        </div>

        
    </div>

    <div>
    <div>Recent Activities</div>
    </div>

    <div class="contentSection">

    <div class="econtainer"> 

            <div>
                <h5> Number </h5>
                <p> 1 </p>
                <p> 2 </p>
                <p> 3 </p>
                <p> 4 </p>
                <p> 5 </p>
                <p> 6 </p>
            </div>

            <div>
                <h5> Asset ID </h5>
                <p> FA/12345 </p>
                <p> FA/12346 </p>
                <p> CA/23456 </p>
                <p> CA/23458 </p>
                <p> CA/23458 </p>
                <p> FA/12345 </p>
            </div>

            <div>
                <h5> Asset Name </h5>
                <p> Asset name here </p>
                <p> Asset name here </p>
                <p> Asset name here </p>
                <p> Asset name here </p>
                <p> Asset name here </p>
                <p> Asset name here </p>
            </div>

            <div>
                <h5> Asset Type </h5>
                <p> Fixed Asset </p>
                <p> Fixed Asset </p>
                <p> Current Asset </p>
                <p> Current Asset </p>
                <p> Current Asset </p>
                <p> Fixed Asset </p>
            </div>

            <div>
                <h5> Reported Employee </h5>
                <p> Wathsala Perera </p>
                <p> Shanaka Madhushan </p>
                <p> Nalin Perera </p>
                <p> Kasun Dias </p>
                <p> Kasun Dias </p>
                <p> Wathsala Perera </p>
            </div>

            <div>
                <h5> Status </h5>
                <p> Done </p>
                <p> Done </p>
                <p> Done </p>
                <p> Done </p>
                <p> Done </p>
                <p> Done </p>
            </div>

        </div>  
    </div>
</div>