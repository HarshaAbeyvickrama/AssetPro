
<div class="overviewLayout">
    <div>
        <div class="section-heading">Breakdown Assets</div>
    </div>
    <div class="contentSection">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <!-- <th>Error ID</th> -->
                        <th>Asset ID</th>
                        <th>Asset Name</th>
                        <th>Asset Type</th>
                        <th>view Breakdown</th>
                    </tr>
                </thead>
                <tbody id="DHBody"></tbody>
             
            </table>
    </div>
</div>

<script>
    <?php
    // echo 'var userID ='.$_SESSION['UserID']
    //should define the department id
    echo 'var DeptID = 1';
    ?>
  
     window.addEventListener('load', viewBreakAssetDH(1))
</script>




    
        
