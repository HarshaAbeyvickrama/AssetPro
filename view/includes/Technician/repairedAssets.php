
<div class = "table">
    <div>
        <div class="section-heading"> All Repaired Assets </div>
    </div>
    <div class="contentSection">
            <table class="table" id="filterTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Asset ID</th>
                        <th>Asset Name</th>
                        <th>Asset Type</th>
                        <th>Reported Employee</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="techniciantable"></tbody>
            </table>
    </div>
</div>

<script>
    <?php
    echo 'var userID ='. $_SESSION['UserID'];
    ?>

    //load Assets
    window.addEventListener('load' , getAssets(userID));

</script>
// <!-- <script>
//     getCount('allAssets');
//     getCount('assignedAssets');
//     getCount('inProgress');
//     getCount('repairedAssets');
