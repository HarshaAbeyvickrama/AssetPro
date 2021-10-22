<style>
   
</style>
 
<table class="table">
    <thead>
        <tr class="tableHeader">
            <th> # </th>
            <th> Asset ID </th>
            <th> Asset Name </th>
            <th> Asset Type </th>
            <th> Reported Employee </th>
            <th class="cell-center"> View Breakdown </th>
        </tr>
    </thead>
    
    <!-- <div class="tableRow">
        <div> 1 </div>
        <div> FA/CP/1 </div>
        <div> Laptop </div>
        <div> fixed Asset </div>
        <div> Jithendra Priyanjalee </div>
        <div class="cell-center"><button class="btn view"> View </button></div>
    </div>
    <div class="tableRow">
        <div> 2 </div>
        <div> FA/CP/2 </div>
        <div> Printer </div>
        <div> Fixed Asset </div>
        <div> Muzni Ahamed </div>
        <div class="cell-center"><button class="btn view"> View </button></div>
    </div>
    <div class="tableRow">
        <div> 3 </div>
        <div> CA/PE/2 </div>
        <div> CPU </div>
        <div> Consumable Asset </div>
        <div> Sara Desapriyan </div>
        <div class="cell-center"><button class="btn view"> View </button></div>
    </div>
    <div class="tableRow">
        <div> 4 </div>
        <div> CA/PE/4 </div>
        <div> Mouse </div>
        <div> Consumable Asset </div>
        <div> Namal Ranasinghe </div>
        <div class="cell-center"><button class="btn view"> View </button></div>
    </div> -->
 
    <tbody id="assignedAssetsTableBody">
    </tbody>
</table>
 
<script type="text/javascript">
    getAssets('assigned');

    var viewBtn = document.getElementById('') /*Loading the viewReportBreakdown page*/
    viewBtn.addEventListener('click', function()
    {
        loadSection('centersection','viewBreakdown');
    });
</script>


                        
