<div class = "overviewLayout">
    <div>
        <div class="section-heading"> All Assigned Assets </div>
    </div>
    <div class="contentSection">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Asset ID</th>
                        <th>Asset Name</th>
                        <th>Asset Type</th>
                        <th>Condition</th>
                        <th>Assigned Technician</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>IA/SW/3</td>
                        <td>Key Board</td>
                        <td>Software</td>
                        <td>Brand New</td>
                        <td>Ayisha Siddeequa</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>CA/PE/13</td>
                        <td>Logitech C505</td>
                        <td>Computer Peripherals</td>
                        <td>Brand New</td>
                        <td>Ayisha Siddeequa</td>
                    </tr>
                </thead>
                <tbody id="techniciantable"></tbody>
            </table>
    </div>
</div>

<script>
    <?php
    echo 'var userID =' . $_SESSION['UserID'];
    ?>
    // loadAssets(userID);
    window.addEventListener('load', loadAssetsTec(userID));
</script>