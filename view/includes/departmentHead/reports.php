<style>
    form {
        height: 87vh;
    }

    .profile {
        all: revert;
        display: grid;
        grid-template-columns: 1fr 1fr;
        background-color: #F1F4FF;
        overflow: hidden;
        padding: 0px;
        height: 87vh;
    }

    .profile>div {
        display: grid;
        grid-template-rows: 0.5fr 9.5fr;
    }

    .leftSection,
    .rightSection {
        overflow-y: auto;
    }

    /* .leftSection::-webkit-scrollbar,
    .rightSection::-webkit-scrollbar{
        display: none;
    } */
    .profile .leftSection {
        margin: 15px 7.5px 15px 15px;
    }

    .leftSection>div {
        /* height: 100%; */
        /* width: 100%; */
    }

    .profileImageSection>img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
    }

    .leftSection .leftBottom {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        height: 100%;
    }

    .profileImageSection {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    #uploadBtn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 150px;
        height: 40px;
        margin: 5px 0px;
        background: #5C6E9B;
        color: #F1F4FF;
        border-radius: 30px;
    }

    #uploadBtn:hover {
        cursor: pointer;
        background-color: #304068;
        transition: .5s;
    }

    /* Form styling */
    .basic-information {
        width: calc(100% - 40px);
        height: calc(100% - 40px);
        display: flex;
        flex-wrap: wrap;
        padding: 10px;
        /* justify-content: space-around; */
    }

    .title {
        color: #304068;
        margin: 10px 0px;
    }

    .col-f {
        width: 100%;
        color: #5C6E9B;
    }

    .col-f select {
        justify-content: center;
        align-items: center;
        width: calc(94% - 30px);
        border: none;
        background-color: #F1F4FF;
        height: 35px;
        border-radius: 9px;
        padding: 3px 3px;
        margin-top: 10px;
        outline: none;
    }

    .col-h {
        width: 50%;
        color: #5C6E9B;
    }

    .col-btn {
        position: relative;
        text-align: center;
        width: 100%;
        align-items: center;
        margin: 10px 0px;

    }

    .col-btn>div {
        border-radius: 15px;
        padding: 10px 20px;
        color: white;
        font-size: 18px;
        background-color: #5C6E9B;
        width: 80px;
        max-height: 30px;
        position: relative;
        float: right;
        margin-right: 5px;
    }

    .col-f input[type=text] {
        justify-content: center;
        align-items: center;
        width: calc(100% - 50px);
        border: none;
        background-color: #F1F4FF;
        height: 25px;
        border-radius: 9px;
        padding: 3px 3px;
        margin-top: 10px;
        outline: none;
    }

    .col-h input[type=text] {
        justify-content: center;
        align-items: center;
        width: calc(94% - 30px);
        border: none;
        background-color: #F1F4FF;
        height: 25px;
        border-radius: 9px;
        padding: 3px 3px;
        margin-top: 10px;
        outline: none;
    }

    .col-h,
    .col-f>span {
        display: block;
        margin-top: 5px;
    }


    /* New */
    .sectionContent {
        background-color: white;
        border-radius: 10px;
        padding-left: 20px;
    }

    .sectionHeader {
        margin-top: 10px;
        display: grid;
        grid-template-columns: 6fr 4fr;
    }

    .sectionHeader>div {
        /* border: 1px solid red; */
    }

    .sectionHeaderImage {
        text-align: center;
    }

    .sectionHeaderImage>img {
        width: 100px;
    }

    .sectionHeaderText {
        padding: 15px 0px 0px 0px;
        width: 100%;
        color: #304068;
        font-weight: bold;
        font-size: 32px;
    }

    /* Table styling */
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
        font-size: 17px;
        padding: 15px;
        font-weight: 900;
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
    }

    .tableCell {
        display: table-cell;
    }

    /* .tableRowGroup .tableRow:hover{
        cursor: pointer;
        background-color: wheat;
    } */
    /* Table overflow */
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

    th {
        color: #5C6E9B;
        padding: 10px;
    }

    .spanRow {
        color: #5C6E9B;
        font-size: 15px;
        font-weight: bold;
    }

    .row {
        font-size: 14px;
        margin-top: 13px;
    }

    .row td {
        text-align: center;
        color: #5C6E9B;
    }

    .innerRow {
        padding-left: 10px;
        text-align: left !important;
    }

    .generalStats {
        margin: 0px 0px 15px 0px;
        color: #5C6E9B;

    }

    .generalStats>div {
        margin-top: 5px;
    }
</style>
<form action="" id="reports">

    <div class="profile">
        <div id="pLeft" class="leftSection scroll">
            <div class="section-heading">
                Asset Level Report
            </div>
            <div class="sectionContent">
                <div class="sectionHeader">
                    <div class="sectionHeaderText">
                        Asset Level Report
                    </div>
                    <div class="sectionHeaderImage">
                        <img src="../Images/AssetProLogo.png" alt="">
                    </div>
                </div>
                <div class="generalStats">
                    <div>Date : </div>
                    <div>Time : </div>
                    <div>Depriciation Method : </div>
                </div>
                <table class="table">
                    <thead>
                    <tr class="">
                        <th>All Assets</th>
                        <th>FA</th>
                        <th>CA</th>
                        <th>IA</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr class="row">
                        <td class="innerRow">Count</td>
                        <td>14</td>
                        <td>4</td>
                        <td>4</td>
                        <td>14</td>
                    </tr>

                    <tr class="row">
                        <td class="innerRow">Number of breakdowns</td>
                        <td>14</td>
                        <td>4</td>
                        <td>4</td>
                        <td>14</td>
                    </tr>

                    <tr class="row">
                        <td class="innerRow">Number of repaired assets</td>
                        <td>14</td>
                        <td>4</td>
                        <td>4</td>
                        <td>14</td>
                    </tr>

                    <tr class="row">
                        <td class="innerRow">Total Value of assets</td>
                        <td>14</td>
                        <td>4</td>
                        <td>4</td>
                        <td>14</td>
                    </tr>
                    <tr class="row">
                        <td class="innerRow">Total Value of assets</td>
                        <td>14</td>
                        <td>4</td>
                        <td>4</td>
                        <td>14</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="pLeft" class="leftSection scroll">
            <div class="section-heading">
                Repair And Maintanance Report
            </div>
            <div class="sectionContent">
                <div class="sectionHeader">
                    <div class="sectionHeaderText">
                        Repair And Maintanance Report
                    </div>
                    <div class="sectionHeaderImage">
                        <img src="../Images/AssetProLogo.png" alt="">
                    </div>
                </div>
                <div class="generalStats">
                    <div>Date : </div>
                    <div>Time : </div>
                </div>
                <table class="table">
                    <thead>
                    <tr class="">
                        <th>All Assets</th>
                        <th>Number of Breakdowns</th>
                        <th>In Progress</th>
                        <th>Number of Repaired Assets</th>
                        <th>Number of Employees Assigned</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="spanRow">
                        <td colspan="5">Fixed Assets</td>
                    </tr>
                    <tr class="row">
                        <td class="innerRow">Furniture</td>
                        <td>14</td>
                        <td>4</td>

                        <td>4</td>
                        <td>14</td>
                    </tr>

                    <tr class="row">
                        <td class="innerRow">Machinery</td>
                        <td>14</td>
                        <td>4</td>

                        <td>4</td>
                        <td>14</td>
                    </tr>

                    <tr class="row">
                        <td class="innerRow">Computer</td>
                        <td>14</td>
                        <td>4</td>

                        <td>4</td>
                        <td>14</td>
                    </tr>

                    <tr class="row">
                        <td class="innerRow">Printers</td>
                        <td>14</td>
                        <td>4</td>

                        <td>4</td>
                        <td>14</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- <div id="pRight" class="rightSection scrollBar">
            
        </div> -->
    </div>
</form>