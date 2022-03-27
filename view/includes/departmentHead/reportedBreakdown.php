
<div class="overviewLayout">
    <div>
        <div class="section-heading">Breakdown Assets</div>
    </div>
    <div class="contentSection">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>                    
                        <th>Asset ID</th>
                        <th>Reported Date</th>
                        <th>Asset Name</th>
                        <th>Assigned Technician</th>
                        <th>view Breakdown</th>
                    </tr>
                </thead>
                <tbody id="DHBody"></tbody>
             
            </table>
    </div>
</div>

<script>
    <?php
    echo 'var userID ='.$_SESSION['UserID'];
    ?>
  

     window.addEventListener('load',viewBreakAssetDH(userID));
</script>




    
        
