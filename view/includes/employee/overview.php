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
                        <td>2021/10/22</td>
                        <td>Successfully reported Breakdown: FA/6789</td>
                        <td>1 hour ago</td>
                    </tr>
                    
                    <tr>
                        <td>2</td>
                        <td>2021/10/22</td>
                        <td>Successfully reported Breakdown: FA/1234</td>
                        <td>2 hour ago</td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>2021/10/22</td>
                        <td>Successfully reported Breakdown: FA/9056</td>
                        <td>6 hour ago</td>
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
                        <td>2021/10/22</td>
                        <td>Successfully reported Breakdown: FA/6789</td>
                        <td>1 day ago</td>
                   </tr>

                   <tr>
                        <td>2</td>
                        <td>2021/10/22</td>
                        <td>Successfully reported Breakdown: FA/9056</td>
                        <td>5 days ago</td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>2021/10/22</td>
                        <td>Successfully reported Breakdown: FA/9056</td>
                        <td>6 days ago</td>
                    </tr>

                    <tr>
                        <td>4</td>
                        <td>2021/10/22</td>
                        <td>Successfully reported Breakdown: FA/9056</td>
                        <td>8 days ago</td>
                    </tr>

                    <tr>
                        <td>5</td>
                        <td>2021/10/22</td>
                        <td>Successfully reported Breakdown: FA/9056</td>
                        <td>4 days ago</td>
                    </tr>

                    <tr>
                        <td>6</td>
                        <td>2021/10/22</td>
                        <td>Successfully reported Breakdown: FA/9056</td>
                        <td>4 days ago</td>
                    </tr>

                    <tr>
                        <td>7</td>
                        <td>2021/10/22</td>
                        <td>Successfully reported Breakdown: FA/9056</td>
                        <td>1 day ago</td>
                    </tr>
                 </tbody>
            </table>
        </div>
    </div>
    
</div>
<script>
     getCount('allAssets','allAssets');
    // getCount('allTangibles','allTangibles');
    // getCount('allTechnicians','allTechniciansCount');
</script>