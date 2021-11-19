<style>
    /* .overviewLayout{
        display: grid;
        grid-template-rows: 0.75fr 1.5fr 0.75fr 7fr 0.75fr;
             
    }
    .overviewLayout > div{
        display: grid;
        align-items: center;
        color: #304068;
        font-size: 24px;
        font-weight: bold;
    } */
    /* .statSection{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
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
    } */

    
    /* .overviewLayout .contentSection{
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
    } */
    .recentTitle{
        color: #304068;
        font-size: 20px;
        font-weight: bold;
    }
    /*---------------------------------CSS FOR SEARCH---------------------*/
    .hidden {
        display: none;
    }
</style>
<label>
    <span>Search:</span>
    <input placeholder="Enter search term" type="search" id="searchInput1">
</label>

<div class="overviewLayout">
    <div>
        <div class="section-heading">Dashboard Overview</div>
    </div>

    <div class="statSection">
        <div>
            <div class="statBox box1" >
                <div class="statNumber" id="Assets"></div>
                <div class="statText">All Assets</div>
            </div>
        </div>

        <div>
            <div class="statBox box2" >
                    <div class="statNumber" id="Tangibles"></div>
                    <div class="statText">All Tangibles</div>
            </div>
        </div>
            
        <div>
            <div class="statBox box3" >
                <div class="statNumber" id="Fixeds"></div>
                    <div class="statText">All Fixeds</div>
            </div>
        </div>
        <div>
            <div class="statBox box4">
                <div class="statNumber" id="Consumables"></div>
                    <div class="statText">All Consumables</div>
            </div>
        </div>
        <div>
            <div class="statBox box5">
                <div class="statNumber" id="Intangibles"></div>
                    <div class="statText">All Intangible</div>
            </div>
        </div>
    </div>

    <div>
        <div class="section-subHeading">Recent Activities</div>
    </div>

    <div class="contentSection">
        <div>
            <div class="h3">Last 24 Hours</div>
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
                        <td>22/10/2021</td>
                        <td>Successfully reported Breakdown: FA/6789</td>
                        <td>1 hour ago</td>
                    </tr>
                    
                    <tr>
                        <td>2</td>
                        <td>22/10/2021</td>
                        <td>Successfully reported Breakdown: FA/1234</td>
                        <td>2 hour ago</td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>22/10/2021</td>
                        <td>Successfully reported Breakdown: FA/9056</td>
                        <td>2 hour ago</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <hr>

        <div>
            <div class="h3">Earlier</div>
            <table class="table" id="filterTable1">
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
                        <td>21/10/2021</td>
                        <td>Successfully reported Breakdown: FA/6542</td>
                        <td>1 day ago</td>
                   </tr>

                   <tr>
                        <td>2</td>
                        <td>17/10/2021</td>
                        <td>Successfully reported Breakdown: FA/8741</td>
                        <td>5 days ago</td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>17/10/2021</td>
                        <td>Successfully reported Breakdown: FA/5121</td>
                        <td>5 days ago</td>
                    </tr>

                    <tr>
                        <td>4</td>
                        <td>14/10/2021</td>
                        <td>Successfully reported Breakdown: FA/1256</td>
                        <td>7 days ago</td>
                    </tr>

                    <tr>
                        <td>5</td>
                        <td>14/10/2021</td>
                        <td>Successfully reported Breakdown: FA/9843</td>
                        <td>7 days ago</td>
                    </tr>

                    <tr>
                        <td>6</td>
                        <td>13/10/2021</td>
                        <td>Successfully reported Breakdown: FA/5467</td>
                        <td>8 days ago</td>
                    </tr>

                    <tr>
                        <td>7</td>
                        <td>13/10/2021</td>
                        <td>Successfully reported Breakdown: FA/8765</td>
                        <td>8 day ago</td>
                    </tr>
                 </tbody>
            </table>
        </div>
    </div>
    
</div>
<script>
    getCount('allAssets','Assets');
    getCount('allTangible','Tangibles');
    getCount('allFixed','Fixeds');
    getCount('allConsumables','Consumables');
    getCount('allIntangibles','Intangibles');
</script>

<script>
const searchInput = document.getElementById('searchInput1')
const table = document.getElementById('filterTable1')
const trArray = Array.prototype.slice.call(table.querySelectorAll('tbody tr'))

const filterTable = event => {
  const searchTerm = event.target.value.toLowerCase()
  trArray.forEach(row => {
    row.classList.add('hidden')
    const tdArray = Array.prototype.slice.call(row.getElementsByTagName('td'))
    tdArray.forEach(cell => {
      if (cell.innerText.toLowerCase().indexOf(searchTerm) > -1) {
        row.classList.remove('hidden')
      } 
    })
  })
}

searchInput.addEventListener('keyup', filterTable, false)
</script>