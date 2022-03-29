 
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
        <tr>
            <td>1</td>
            <td>IA/SW/4</td>
            <td>Web Cam</td>
            <td>Software</td>
            <td>Mushrifa Mansoor</td>
            <td>  
                <button class='btn btn-submit' onClick=""> View </button>
            </td>
            
        </tr>
        <tr>
            <td>2</td>
            <td>IA/SW/h5</td>
            <td>Windows 10</td>
            <td>Software</td>
            <td>Mushrifa Mansoor</td>
            <td>  
                <button class='btn btn-submit' onClick=""> View </button>
            </td>
            
        </tr>
        <tr>
            <td>3</td>
            <td>CA/PE/8</td>
            <td>Key Board</td>
            <td>Computer Peripherals</td>
            <td>Mushrifa Mansoor</td>
            <td>  
                <button class='btn btn-submit' onClick=""> View </button>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>FA/CP/14</td>
            <td>HP Laser Jet</td>
            <td>Computer and Computer Peripherals</td>
            <td>Mushrifa Mansoor</td>
            <td>  
                <button class='btn btn-submit' onClick=""> View </button>
            </td>
        </tr>
    </thead>
    <tbody id = "techniciantable">
    
    </tbody>
</table>
    
<script>
    <?php 
    echo 'var userID ='. $_SESSION['UserID']; 
    ?>
    
    window.addEventListener('load',getAssets(userID));
</script> 







