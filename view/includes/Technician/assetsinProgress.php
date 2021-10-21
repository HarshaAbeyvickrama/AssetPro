<style>
    .table {
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
    }
</style>
 
<div class="table scrollbar">
    <div class="tableHeader">
        <div> # </div>
        <div> Asset ID </div>
        <div> Asset Name </div>
        <div> Asset Type </div>
        <div> Reported Employee </div>
        <div class="cell-center"> Mark as Done </div>
    </div>
    <div class="tableRow">
        <div> 1 </div>
        <div> FA/EA/1 </div>
        <div> Acer Nitro </div>
        <div> fixed Asset </div>
        <div> Douglas Kumar </div>
        <div class="cell-center"><button class="btn done"> Done </button></div>
 
    </div>
    <div class="tableRow">
        <div> 2 </div>
        <div> FA/EA/3 </div>
        <div> Printer </div>
        <div> Fixed Asset </div>
        <div> Andrew Dias </div>
        <div class="cell-center"><button class="btn done"> Done </button></div>
    </div>
    <div class="tableRow">
        <div> 3 </div>
        <div> CA/PE/2 </div>
        <div> Monitor </div>
        <div> Current Asset </div>
        <div> Pavani Kumari </div>
        <div class="cell-center"><button class="btn done"> Done </button></div>
    </div>
    <div class="tableRow">
        <div> 4 </div>
        <div> CA/PE/4 </div>
        <div> CPU </div>
        <div> Current Asset </div>
        <div> Samanali Perera </div>
        <div class="cell-center"><button class="btn done"> Done </button></div>
    </div>
    <div class="tableRow">
        <div> 5 </div>
        <div> CA/PE/7 </div>
        <div> Web Cam </div>
        <div> Current Asset </div>
        <div> Farhan Ahamed </div>
        <div class="cell-center"><button class="btn done"> Done </button></div>
    </div>
    <div class="tableRow">
        <div> 6 </div>
        <div> IA/SW/5 </div>
        <div> Scanner </div>
        <div> Fixed Asset </div>
        <div> Wathsala Perera </div>
        <div class="cell-center"><button class="btn done"> Done </button></div>
    </div>
    
        <div class="tableRowGroup" id="inprogressAssetsTableBody">
        </div>
    </div>
</div>

<script>
    getAssets('inprogress');
</script>