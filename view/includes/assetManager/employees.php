<style>
    .overviewLayout{
        display: grid;
        grid-template-rows: 0.75fr 9.25fr ;
        background-color: #F1F4FF;
    }
    .overviewLayout > div:nth-child(1){
        /* display: grid; */
        align-items: center;
        color: #304068;
        font-size: 24px;
        font-weight: bold;
    }
    .overviewLayout > div:nth-child(2){
        background-color: white;
        border-radius: 12px;
        /* display: flex; */
        /* justify-content: center; */
    }

    .table{
        display: table;
        width: 95%;
        margin: 20px 0px;
        color: #5C6E9B;
        border: 3px solid red;
        overflow-y: scroll;
        /* height: 100px; */
        
        
    }
    .tableHeader{
        width: 100%;
        display: table-header-group;
        font-size: 19px;
        padding: 15px;
        font-weight: bold;
        top: 0;
        z-index: 20;
        /* position: sticky; */
    }
    .tableHeader > div { 
        display: table-cell;
    }
    .table .tableRowGroup{
        display: table-row-group;
        
    }
    .tableRow{
        display: table-row;
    }
    .tableCell{
        display: table-cell;
    }
    .tableRowGroup .tableRow:hover{
        cursor: pointer;
        background-color: wheat;
    }

    /* Table overflow */
    .tableRowGroup{
        overflow-y: auto;
    }
    .tableRow .tableCell{
        padding:10px 0px;
        
    }
    .tableRow > div{
        display: table-cell;
        padding:10px 0px;
    }
    .tableRow > div:first-of-type{
        text-align: center;
    }
    .tableHeader > div:first-of-type{
        text-align: center;
    }
    #allEmployeesTableBody{
        overflow-y: auto;
    }
    table{
        border: 3px solid red;
        width: 100%;
        margin: 20px;
    }
    tbody{
        
        display: block;
        overflow-y: auto;
        background-color: wheat;
        height: 300px;
        width: 100% !important;
    }
    thead th{
        border: 3px solid red;
    }
    tbody td:nth-child(1){
        text-align: center;
    }
    thead th:nth-child(1) , th:nth-child(2) , th:nth-child(4) , th:nth-child(5){
        width: 200px;
    }
</style>

<div class="overviewLayout">
    <div>
        <div>All Employees</div>
    </div>
    <div>
        <div class="table">
            <div class="tableHeader">
                <div>Number</div>
                <div>Employee ID</div>
                <div>Name</div>
                <div>Gender</div>
                <div>View</div>
            </div>
            <div class="tableRowGroup" id="allEmployeesTableBody">
                <div class="tableRow">
                    <div>1</div>
                    <div>1</div>
                    <div>Wathsala Nadeeshani</div>
                    <div>Female</div>
                    <div>
                        <div class='assignAssetButton'>
                            Assign
                        </div>
                    </div>
                </div>
                <div class="tableRow">
                    <div>1</div>
                    <div>1</div>
                    <div>Wathsala Nadeeshani</div>
                    <div>Female</div>
                    <div>
                        <div class='assignAssetButton'>
                            Assign
                        </div>
                    </div>
                </div>
                <div class="tableRow">
                    <div>1</div>
                    <div>1</div>
                    <div>Wathsala Nadeeshani</div>
                    <div>Female</div>
                    <div>
                        <div class='assignAssetButton'>
                            Assign
                        </div>
                    </div>
                </div>
                <div class="tableRow">
                    <div>1</div>
                    <div>1</div>
                    <div>Wathsala Nadeeshani</div>
                    <div>Female</div>
                    <div>
                        <div class='assignAssetButton'>
                            Assign
                        </div>
                    </div>
                </div>
                <div class="tableRow">
                    <div>1</div>
                    <div>1</div>
                    <div>Wathsala Nadeeshani</div>
                    <div>Female</div>
                    <div>
                        <div class='assignAssetButton'>
                            Assign
                        </div>
                    </div>
                </div>
                <div class="tableRow">
                    <div>1</div>
                    <div>1</div>
                    <div>Wathsala Nadeeshani</div>
                    <div>Female</div>
                    <div>
                        <div class='assignAssetButton'>
                            Assign
                        </div>
                    </div>
                </div>
                <div class="tableRow">
                    <div>1</div>
                    <div>1</div>
                    <div>Wathsala Nadeeshani</div>
                    <div>Female</div>
                    <div>
                        <div class='assignAssetButton'>
                            Assign
                        </div>
                    </div>
                </div>
                <div class="tableRow">
                    <div>1</div>
                    <div>1</div>
                    <div>Wathsala Nadeeshani</div>
                    <div>Female</div>
                    <div>
                        <div class='assignAssetButton'>
                            Assign
                        </div>
                    </div>
                </div>
                <div class="tableRow">
                    <div>1</div>
                    <div>1</div>
                    <div>Wathsala Nadeeshani</div>
                    <div>Female</div>
                    <div>
                        <div class='assignAssetButton'>
                            Assign
                        </div>
                    </div>
                </div>
                <div class="tableRow">
                    <div>1</div>
                    <div>1</div>
                    <div>Wathsala Nadeeshani</div>
                    <div>Female</div>
                    <div>
                        <div class='assignAssetButton'>
                            Assign
                        </div>
                    </div>
                </div>
                <div class="tableRow">
                    <div>1</div>
                    <div>1</div>
                    <div>Wathsala Nadeeshani</div>
                    <div>Female</div>
                    <div>
                        <div class='assignAssetButton'>
                            Assign
                        </div>
                    </div>
                </div>
                <div class="tableRow">
                    <div>1</div>
                    <div>1</div>
                    <div>Wathsala Nadeeshani</div>
                    <div>Female</div>
                    <div>
                        <div class='assignAssetButton'>
                            Assign
                        </div>
                    </div>
                </div>
                <div class="tableRow">
                    <div>1</div>
                    <div>1</div>
                    <div>Wathsala Nadeeshani</div>
                    <div>Female</div>
                    <div>
                        <div class='assignAssetButton'>
                            Assign
                        </div>
                    </div>
                </div>
                <div class="tableRow">
                    <div>1</div>
                    <div>1</div>
                    <div>Wathsala Nadeeshani</div>
                    <div>Female</div>
                    <div>
                        <div class='assignAssetButton'>
                            Assign
                        </div>
                    </div>
                </div>
                <div class="tableRow">
                    <div>1</div>
                    <div>1</div>
                    <div>Wathsala Nadeeshani</div>
                    <div>Female</div>
                    <div>
                        <div class='assignAssetButton'>
                            Assign
                        </div>
                    </div>
                </div>
                <div class="tableRow">
                    <div>1</div>
                    <div>1</div>
                    <div>Wathsala Nadeeshani</div>
                    <div>Female</div>
                    <div>
                        <div class='assignAssetButton'>
                            Assign
                        </div>
                    </div>
                </div>
                <div class="tableRow">
                    <div>1</div>
                    <div>1</div>
                    <div>Wathsala Nadeeshani</div>
                    <div>Female</div>
                    <div>
                        <div class='assignAssetButton'>
                            Assign
                        </div>
                    </div>
                </div>
                <div class="tableRow">
                    <div>1</div>
                    <div>1</div>
                    <div>Wathsala Nadeeshani</div>
                    <div>Female</div>
                    <div>
                        <div class='assignAssetButton'>
                            Assign
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <table>
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Kanchana Silva</td>
                    <td>Female</td>
                    <td>View</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Kanchana Silva</td>
                    <td>Female</td>
                    <td>View</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Kanchana Silva</td>
                    <td>Female</td>
                    <td>View</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Kanchana Silva</td>
                    <td>Female</td>
                    <td>View</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Kanchana Silva</td>
                    <td>Female</td>
                    <td>View</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Kanchana Silva</td>
                    <td>Female</td>
                    <td>View</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Kanchana Silva</td>
                    <td>Female</td>
                    <td>View</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Kanchana Silva</td>
                    <td>Female</td>
                    <td>View</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Kanchana Silva</td>
                    <td>Female</td>
                    <td>View</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Kanchana Silva</td>
                    <td>Female</td>
                    <td>View</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Kanchana Silva</td>
                    <td>Female</td>
                    <td>View</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Kanchana Silva</td>
                    <td>Female</td>
                    <td>View</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Kanchana Silva</td>
                    <td>Female</td>
                    <td>View</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Kanchana Silva</td>
                    <td>Female</td>
                    <td>View</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Kanchana Silva</td>
                    <td>Female</td>
                    <td>View</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Kanchana Silva</td>
                    <td>Female</td>
                    <td>View</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Kanchana Silva</td>
                    <td>Female</td>
                    <td>View</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Kanchana Silva</td>
                    <td>Female</td>
                    <td>View</td>
                </tr>
            </tbody>
        </table> -->
    </div>
</div>