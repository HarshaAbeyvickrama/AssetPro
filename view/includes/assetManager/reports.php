<style>
    form{
        height: 87vh;
    }
    .profile {
        all: revert;
        display: grid;
        grid-template-columns: 1fr 1fr;
        background-color: #F1F4FF;
        overflow:hidden;
        padding: 0px;
        height: 87vh;
    }

    .profile>div {
        display: grid;
        grid-template-rows: 0.5fr 9.5fr;

    }
   
    .leftSection,
    .rightSection{
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
        width: 100%;
        color: #304068;
        font-weight: bolder;
        margin: 10px 0px;
        font-size: 18px;
    }

    .col-f {
        width: 100%;
        color: #5C6E9B;
    }

    .col-f select{
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
    
    .radio-group{
        margin: 5px 0px;
    }
    .radio-group > label { 
        margin-left: 5px;
    }
    .radio-group > input[type=radio]:hover{
        cursor: pointer;
    }

    .col-btn > div:hover {
        cursor: pointer;
        background-color: #304068;
        transition: .5s;
    }
   
    .col-btn{
        z-index: 1;
        position: absolute;
        left: 0px;
        bottom: 0px;
        right: calc(50%);
    }

    /* New */
    .sectionContent{
        background-color: white;
        border-radius: 10px;
        padding-left: 20px;

    }
    .sectionHeader{
        margin-top: 10px;
        display: grid;
        grid-template-columns: 6fr 4fr;
    }
    .sectionHeader > div{
        /* border: 1px solid red; */
    }
    .sectionHeaderImage{
        text-align: center;
    }
    .sectionHeaderImage > img{
        width: 100px;
    }
    .sectionHeaderText{
        padding: 15px 0px 0px 0px;
        width: 100%;
        color: #304068;
        font-weight: bold;
        font-size: 32px;
    }
    
    /* Table styling */
    .table{
        display: table;
        width: 100%;
        margin: 10px 0px;
        color: #5C6E9B;
        overflow-y: hidden !important;
    }
    .tableHeader{
        width: 100%;
        display: table-header-group;
        font-size: 17px;
        padding: 15px;
        font-weight: bold;
        overflow-y: hidden !important;
        
    }
    .tableHeader > div { 
        display: table-cell;
    }
    .table .tableRowGroup{
        display: table-row-group;
        overflow-y: auto !important;
        
    }
    .tableRow{
        display: table-row;
    }
    .tableCell{
        display: table-cell;
    }
    /* .tableRowGroup .tableRow:hover{
        cursor: pointer;
        background-color: wheat;
    } */
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
    
    th{
        color: #5C6E9B;
        padding: 10px;
    }
    .spanRow{
        color: #5C6E9B;
        font-size: 15px;
    }
    .row{
        font-size: 14px;
        margin-top: 13px;
    }
    .row td{
        text-align: center;
    }
    .innerRow{
        padding-left: 10px;
        text-align: left !important;
    }
    .generalStats{
        margin: 0px 0px 15px 0px;
    }
    .generalStats > div{
        margin-top: 5px;
    }
</style>
<form action="" id="reports">

    <div class="profile">
        <div id="pLeft" class="leftSection scrollBar"> 
            <div class="title">
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
                    <div >Date : </div>
                    <div >Time : </div>
                    <div >Depriciation Method : </div>
                </div>
                <div class="table">
                    <div class="tableHeader">
                        <div>All Assets</div>
                        <div>FA</div>
                        <div>CA</div>
                        <div>IA</div>
                        <div>Total</div>
                    </div>
                    <div class="tableRowGroup" id="allAssetsTableBody">
                        <div class="tableRow">
                            <div>Count</div>
                            <div>313</div>
                            <div>584</div>
                            <div>577</div> 
                            <div>1890</div>
                        </div>
                        <div class="tableRow">
                            <div>Number of Brakdowns</div>
                            <div>313</div>
                            <div>584</div>
                            <div>577</div> 
                            <div>1890</div>
                        </div>
                        <div class="tableRow">
                            <div>Number of Repaired Assets</div>
                            <div>313</div>
                            <div>584</div>
                            <div>577</div> 
                            <div>1890</div>
                        </div>
                        <div class="tableRow">
                            <div>Total Value of Assets</div>
                            <div>313</div>
                            <div>584</div>
                            <div>577</div> 
                            <div>1890</div>
                        </div>
                        <div class="tableRow">
                            <div>Sent for disposal</div>
                            <div>313</div>
                            <div>584</div>
                            <div>577</div> 
                            <div>1890</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div id="pLeft" class="leftSection scrollBar"> 
        <div class="title">
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
                <div>
                    <div >Date : </div>
                    <div >Time : </div>
                </div>
                <table class="">
                    <tr class="">
                        <th>All Assets</th>
                        <th>Number of Breakdowns</th>
                        <th>In Progress</th>
                        <th>Number of Repaired Assets</th>
                        <th>Number of Employees Assigned</th>
                    </tr>
                    <tr class="spanRow">
                        <td colspan="5">Fixed Assets</td>
                    </tr>
                    <tr class="row">
                        <td class="innerRow">Furniture</td>
                        <td>187</td>
                        <td>4</td>
                        <td>4</td> 
                        <td>187</td>
                    </tr>                      
                    <tr class="row">
                        <td class="innerRow">Machinery</td>
                        <td>187</td>
                        <td>4</td>
                        <td>4</td> 
                        <td>187</td>
                    </tr>                      
                    <tr class="row">
                        <td class="innerRow">Computer</td>
                        <td>187</td>
                        <td>4</td>
                        <td>4</td> 
                        <td>187</td>
                    </tr>                      
                    <tr class="row">
                        <td class="innerRow">Printers</td>
                        <td>187</td>
                        <td>4</td>
                        <td>4</td> 
                        <td>187</td>
                    </tr>                      
                </table>
            </div>
        </div>
        
        <!-- <div id="pRight" class="rightSection scrollBar">
            
        </div> -->
    </div>

</form>

