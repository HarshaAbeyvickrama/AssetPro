 
<!-- <div class="table scrollbar">
    <div class="tableHeader">
        <div> Number </div>
        <div> Asset ID </div>
        <div> Asset Name </div>
        <div> Asset Type </div>
        <div> Reported Employee </div>
        <div class="cell-center"> View Breakdown </div>
    </div>
    <div class="tableRow">
        <div> 1 </div>
        <div> FA/CC/1 </div>
        <div> Laptop </div>
        <div> fixed Asset </div>
        <div> Wathsala Perera </div>
        <div class="cell-center"><button class="btn view"> View </button></div>
    </div>
    <div class="tableRow">
        <div> 2 </div>
        <div> FA/CP/2 </div>
        <div> Printer </div>
        <div> Fixed Asset </div>
        <div> shanaka Madhushan </div>
        <div class="cell-center"><button class="btn view"> View </button></div>
    </div>
    <div class="tableRow">
        <div> 3 </div>
        <div> FA/CP/3 </div>
        <div> Monitor </div>
        <div> Current Asset </div>
        <div> Nalin Perera </div>
        <div class="cell-center"><button class="btn view"> View </button></div>
    </div>
    <div class="tableRow">
        <div> 4 </div>
        <div> FA/CP/4 </div>
        <div> CPU </div>
        <div> Current Asset </div>
        <div> kasun Dias </div>
        <div class="cell-center"><button class="btn view"> View </button></div>
    </div>
 
    <div class="tableRowGroup " id="assignedAssetsTableBody">
    </div>
</div>  -->
 
<!-- <script type="text/javascript">
    // getAssets('assigned');

    var viewBreakdownBtn = document.getElementById('') /*Loading the viewReportBreakdown page*/
    viewBreakdownBtn.addEventListener('click', function()
    {
        loadSection('centersection','viewBreakdown');
    });
</script> -->





<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Asset ID</th>
            <th>Asset Name</th>
            <th>Asset Type</th>
            <th>Reported Employee</th>
            <th>View Breakdown</th>
        </tr>
    </thead>
    <tbody id = "techniciantable">
    
    </tbody>
</table>
    
<script>
    <?php 
    echo 'var userID ='. $_SESSION['UserID']; 
    ?>
    // loadAssets(userID);
    window.addEventListener('load',getAssets(userID));
</script> 







