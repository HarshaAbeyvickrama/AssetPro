<div class="overviewLayout">
    <div>
        <div class="section-heading">All Department Assets</div>
    </div>
    <div class="contentSection">
        <table class="table" id="filterTable">
            <thead>
            <tr>
                <th>#</th>
                <th>Asset ID</th>
                <th>Asset Name</th>
                <th>Asset Type</th>
                <th>Asset Category</th>
            </tr>
            </thead>
            <tbody id="DHBody"></tbody>
        </table>

    </div>
</div>

<script>
    <?php
    echo 'var userID =' . $_SESSION['UserID'];
    ?>
    // loadAssets(userID);
    window.addEventListener('load',loadDeptAssets(userID));
</script>