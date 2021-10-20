<style>
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
        width: auto;
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
<<<<<<< HEAD
=======


    /* Recent activity Table CSS */
    .table{
        display: table;
        width: 100%;
        margin: 10px 0px;
        color: #5C6E9B;
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
        background-color: #EAEDF5;
        
    }
    .tableRow .tableCell{
        padding:10px 0px;
        
    }
>>>>>>> e3692f1a844bff3e1e0f4652736745ebbf9c60db
    hr{
        background-color: #304068;
        width: 100%;
        height: 1px;
    }
</style>
<div class="overviewLayout">
    <div>
        <div>Dashboard Overview</div>
    </div>
    <div class="statSection">
        <div>
            <div class="statBox box1" >
                <div class="statNumber" id="allAssetsCount"></div>
                <div class="statText">All Assets</div>
            </div>
        </div>

        <div>
            <div class="statBox box2" >
                    <div class="statNumber" id="allEmployeesCount"></div>
                    <div class="statText">All Employees</div>
            </div>
        </div>
            
        <div>
            <div class="statBox box3" >
                <div class="statNumber" id="allTechniciansCount"></div>
                    <div class="statText">All Technicians</div>
            </div>
        </div>
        <div>
            <!-- <div class="statBox box4" id="allTechnicians">
                <div class="statNumber"></div>
                    <div class="statText"></div>
            </div> -->
        </div>
        <div>
            <!-- <div class="statBox box5" id="allTechnicians">
                <div class="statNumber"></div>
                    <div class="statText"></div>
            </div> -->
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
                        <th class="tableCell">Date</th>
                        <th class="tableCell">Name</th>
                        <th class="tableCell">Task</th>
                        <th class="tableCell">Role</th>
                        <th class="tableCell">Time</th>
                    </tr>
                </thead>
                <tbody >
                    <tr>
                        <td class="tableCell">20/10/2021</td>
                        <td class="tableCell">Wathsala</td>
                        <td class="tableCell">Reported Breakdown: FA/12345</td>
                        <td class="tableCell">Employee</td>
                        <td class="tableCell">5 Hours ago</td>
                    </tr>
                    <tr>
                        <td class="tableCell">20/10/2021</td>
                        <td class="tableCell">Wathsala</td>
                        <td class="tableCell">Reported Breakdown: FA/12345</td>
                        <td class="tableCell">Employee</td>
                        <td class="tableCell">5 Hours ago</td>
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
                        <th>Date</th>
                        <th>Name</th>
                        <th>Task</th>
                        <th>Role</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>17/10/2021</td=>
                        <td>Wathsala</td>
                        <td>Reported Breakdown: FA/12345</td>
                        <td>Employee</td>
                        <td>5 Hours ago</td>
                    </tr>
                   
                    <tr>
                        <td>17/10/2021</td=>
                        <td>Wathsala</td>
                        <td>Reported Breakdown: FA/12345</td>
                        <td>Employee</td>
                        <td>5 Hours ago</td>
                    </tr>
                   
                    <tr>
                        <td>17/10/2021</td=>
                        <td>Wathsala</td>
                        <td>Reported Breakdown: FA/12345</td>
                        <td>Employee</td>
                        <td>5 Hours ago</td>
                    </tr>
                   
                    <tr>
                        <td>17/10/2021</td=>
                        <td>Wathsala</td>
                        <td>Reported Breakdown: FA/12345</td>
                        <td>Employee</td>
                        <td>5 Hours ago</td>
                    </tr>
                   
                    <tr>
                        <td>17/10/2021</td=>
                        <td>Wathsala</td>
                        <td>Reported Breakdown: FA/12345</td>
                        <td>Employee</td>
                        <td>5 Hours ago</td>
                    </tr>
                   
                    <tr>
                        <td>17/10/2021</td=>
                        <td>Wathsala</td>
                        <td>Reported Breakdown: FA/12345</td>
                        <td>Employee</td>
                        <td>5 Hours ago</td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    getCount('allAssets','allAssetsCount');
    getCount('allEmployees','allEmployeesCount');
    getCount('allTechnicians','allTechniciansCount');
</script>