<style>
    /*.table {
        display: table;
        width: 100%;
        margin: 10px 0px;
        color: #5C6E9B;
        overflow-y: hidden !important;
 
    }
 
    .tableHeader {
        width: 100%;
        display: table-header-group;
        font-size: 19px;
        padding: 15px;
        font-weight: bold;
        overflow-y: hidden !important;
    }
 
    .tableHeader>div {
        display: table-cell;
    }
 
    .table .tableRowGroup {
        display: table-row-group;
        overflow-y: auto !important;
    }
 
    .tableRow {
        display: table-row;
        position: relative;
    }
 
 
    .tableRowGroup .tableRow:hover {
        cursor: pointer;
        background-color: wheat;
 
    }
 
    .tableRowGroup {
        overflow-y: auto;
    }
 
    .tableRow .tableCell {
        padding: 10px 0px;
 
    }
 
    .tableRow>div {
        display: table-cell;
        padding: 10px 0px;
    }
 
    .tableRow>div:first-of-type {
        text-align: center;
    }
 
    .tableRow .btn {
        border: 0;
        background: #5C6E9B;
        padding: 10px 20px;
        color: #fff;
        border-radius: 15px;
        cursor: pointer;
        transition: 0.2s ease;
    }
 
    .tableRow .btn:focus {
        border: 0;
        background: #5C6E9B;
        transform: scale(0.97);
    }
 
    .cell-center {
        text-align: center;
        width: 20%;
    }
 
    .tableHeader>div:first-of-type {
        text-align: center;
    }*/
</style>
 
<table class="table">
    <thead>
        <tr>
            <th> # </th>
            <th> Asset ID </th>
            <th> Asset Name </th>
            <th> Asset Type </th>
            <th> Reported Employee </th>
            <th> Mark as Done </th>
        </tr>
    </thead>
    <tbody class="tableRowGroup" id="inprogressAssetsTableBody">
        <tr>
            <td> 1 </td>
            <td> FA/EA/1 </td>
            <td> Acer Nitro </td>
            <td> fixed Asset </td>
            <td> Douglas Kumar </td>
            <td> <button class="btncol"> Done </button> </td>
        </tr>
        <tr>
            <td> 2 </td>
            <td> FA/CP/2 </td>
            <td> Printer </td>
            <td> Fixed Asset </td>
            <td> Andrew Dias </td>
            <td> <button class="btncol"> Done </button> </td>
        </tr>
        <tr>
            <td> 3 </td>
            <td> CA/PE/2 </td>
            <td> Monitor </td>
            <td> Current Asset </td>
            <td> Pavani Kumari </td>
            <td> <button class="btncol"> Done </button> </td>
        </tr>
        <tr>
            <td> 4 </td>
            <td> CA/CP/3 </td>
            <td> Monitor </td>
            <td> Consumable Asset </td>
            <td> Nalin Perera </td>
            <td> <button class="btncol"> Done </button> </td>
        </tr>
        <tr>
            <td> 5 </td>
            <td> CA/PE/7 </td>
            <td> Web Cam </td>
            <td> Current Asset </td>
            <td> Farhan Ahamed </td>
            <td> <button class="btncol"> Done </button> </td>
        </tr>
        <tr>
            <td> 6 </td>
            <td> CA/CP/5 </td>
            <td> Web Cam </td>
            <td> Consumable Asset </td>
            <td> kasun Dias </td>
            <td> <button class="btncol"> Done </button> </td>
        </tr>
    </tbody>
</table>    

<script>
    getAssets('inprogress');
</script>