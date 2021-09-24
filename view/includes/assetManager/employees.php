<style>
    .overviewLayout {
        display: grid;
        /* grid-template-rows: 0.75fr 1.5fr 0.75fr 7fr; */
        height: 82vh;
        width: 87.5vw;
        overflow-y: scroll;
        padding: 20px;
        background-color: #F1F4FF;
    }

    .overviewLayout>div {
        display: flex;
        align-items: center;
        color: #304068;
        font-size: 24px;
        font-weight: bold;
    }

    .contentSection {
        background-color: white;
        border-radius: 15px;
        margin-top: 15px;
        height: 82vh;
    }

    .table-data {
        color: #304068;
        margin: 4px 4px;
        height: 500px;
        width: 100%;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .employeeData {
        width: 80%;
        border-collapse: collapse;
        font-size: 18px;
        /* margin-left: 5vw; */
        text-align: center;
    }

    .table-data th {
        color: #5C6E9B;
        padding: 8px;
        position: sticky;
        top: 0;
        background-color: white;
    }

    .table-data td {
        padding: 8px;
        font-weight: lighter;
    }

    table tr:nth-child(2) {
        counter-reset: rowNumber;
    }

    table tr {
        counter-increment: rowNumber;
    }

    table tr td:first-child::before {
        content: counter(rowNumber);
        min-width: 1em;
        margin-right: 0.5px;
    }
</style>

<div class="overviewLayout">
    <div>
        <div>All Employees</div>
    </div>
    <div class="contentSection">
        <div class="table-data">
            <table class="employeeData">
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
            </table>
        </div>


        <!-- Your previous codes -->

        <!-- <div class="table">
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
        </div> -->
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