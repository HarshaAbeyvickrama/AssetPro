<style>
   hr {
       background-color: #304068;
       width: 100%;
       height: 1px;
   }

</style>
<div class="overviewLayout">
    <div class="section-heading"> Dashboard Overview </div>
    
    <div class="statSection">
        <div>
            <div class="statBox box1">
                <div class="statNumber" id="allAssets"> 7 </div>
                <div class="statText"> All Assets </div>
            </div>
        </div>

        <div>
            <div class="statBox box2">
                    <div class="statNumber" id="assignedAssets"> 3 </div>
                    <div class="statText"> Assigned Assets </div>
            </div>
        </div>
            
        <div>
            <div class="statBox box3">
                <div class="statNumber" id="inProgress"> 3 </div>
                <div class="statText"> In Progress </div>
            </div>
        </div>

        <div>
            <div class="statBox box4">
                <div class="statNumber" id="repairedAssets"> 1 </div>
                <div class="statText"> Repaired Assets </div>
            </div>
        </div>

    </div>

    <div class="section-subHeading"> Recent Activities </div>

    <div class="contentSection scrollbar">
        <div class="recentActivities">
            <div class="h3"> Last 24 Hours </div>

            <table class="table">
                <thead>
                    <tr>
                        <th class="tableCell"> Date </div>
                        <th class="tableCell"> Task </div>
                        <th class="tableCell"> Time </div>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="tableCell"> 22/10/2021 </td>
                        <td class="tableCell"> FA/FU/1 was assigned to Ayisha Siddeequa </td>
                        <td class="tableCell"> 3 hours ago </td>
                    </tr>
                    <tr>
                        <td class="tableCell"> 21/10/2021 </td>
                        <td class="tableCell"> Successfully repaired CA/PE/2 </td>
                        <td class="tableCell"> 18 hours ago </td>
                    </tr>
                    <tr>
                        <td class="tableCell"> 22/10/2021 </td>
                        <td class="tableCell"> Successfully repaired FA/12346 </td>
                        <td class="tableCell"> 2 hours ago </td>
                    </tr>
                   
                </tbody>
            </table>
        </div>

        <hr>

        <div class="recentactivities">
            <div class="h3"> Earlier </div>

            <table class="table">
                <thead>
                    <tr>
                        <th> Date </th>
                        <th> Task </th>
                        <th> Time </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> 18/10/2021 </td>
                        <td> Reported a Breakdown of FA/EA/3 </td>
                        <td> 4 days ago </td>
                    </tr>
                    <tr>
                        <td> 21/07/2021 </td>
                        <td> Reported a Breakdown of CA/PE/4 </td>
                        <td> 1 day ago </td>
                    </tr>
                    <tr>
                        <td> 20/10/2021 </td>
                        <td> Reported a Breakdown of FA/23445 </td>
                        <td> 2 days ago </td>
                    </tr>
                    <tr>
                        <td> 18/10/2021 </td>
                        <td> Reported a Breakdown of FA/23456 </td>
                        <td> 4 day ago </td>
                    </tr>
                    <tr>
                        <td> 12/10/2021 </td>
                        <td> IA/SW/5 was unassigned from Ayisha Siddeequa </td>
                        <td> 10 days ago </td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    getCount('allAssets',);
    getCount('assignedAssets');
    getCount('inProgress');
    getCount('repairedAssets');
</script>