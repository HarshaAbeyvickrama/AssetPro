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
    getAssets(userID);
</script> 







