<style>
    * {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

    .overviewLayout {
        display: grid;
        /* grid-template-rows: 0.75fr 1.5fr 0.75fr 7fr ; */
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
/* CSS for the tabs */
    .tabs {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        width: 450px;
        height: 250px;
    }
    .tabs .tab-header {
        /* background: #f5f5f5; */
        padding: 10px;
        display: flex;
    }
    .tabs .tab-header > div {
        position: relative;
        width: 45%;
        text-align: center;
        padding: 10px;
        z-index: 2;
        font-weight: 500;
        color: #7F91BC;
        cursor: pointer;
        transition: all 300ms ease-in-out;
    }
    .tabs .tab-header > div.action {
        color: #304068;
    }
    .tabs .tab-indicator {
        position: absolute;
        width: calc(45% - 5px);
        height: 50px;
        background: #EAEDF5;
        top: 10px;
        left: 20px;
        border-radius: 20px;
        transition: all 300ms ease-in-out;
    }
    .tabs .tab-body {
        position: relative;
        padding: 10px;
        border-top: 2px solid #EAEDF5;
        height: calc(100% - 50px);
        overflow: hidden;
    }
    .tabs .tab-body > div{
        position: absolute;
        opacity: 0;
        top: -100%;
        transform: translateY(-10px);
        transition: opacity 300ms ease-in-out,
                    transform 300ms ease-in-out;
    }
    .tabs .tab-body > div.active {
        transform: translateY(0px);
        top:  30px;
        opacity: 1;
    }
    .tabs .tab-body {
        color: #5C6E9B;
        font-family: 15px;
    }

    .popup-content {
        width: 850px;
        height: 600px;
        background-color: white;
        border-radius: 20px;
        /* text-align: center; */
        padding: 20px;
        position: relative;
    }

    .col-f input[type=text],
    textarea {
        justify-content: center;
        align-items: center;
        width: calc(100% - 50px);
        font-size: 20px;
        border: none;
        background-color: #F1F4FF;
        height: 25px;
        border-radius: 9px;
        padding: 3px 3px;
        margin-top: 20px;
        margin-bottom: 20px;
        outline: none;
        padding: 8px 15px 8px 15px;
    }

    .col-h {
        display: block;
    }

    #dDes {
        height: 80px;
    }

    span {
        color: #5C6E9B;
    }

    .editBtn {
        width: 80px;
        height: 40px;
        background-color: #5C6E9B;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        color: #F1F4FF;
        margin-left: 95vh;
    }

    .editBtn:hover {
        cursor: pointer;
        background-color: #304068;
        transition: .5s;
    }
</style>
<div class="overviewLayout">
    <div>
        <div>Department Details</div>
    </div>
    <div class="contentSection">
        <div class="tabs">
            <div class="tab-header">
                <div class="active">General Details</div>
                <div>Employees</div>
            </div>
            <div class="tab-indicator"></div>
            <div class="tab-body">
                <div class="active">
                    <!-- <h1>Department Details</h1> -->
                    <p>Department Form should be here</p>
                </div>
                <div>
                    <!-- <h1>Employees in the Department</h1> -->
                    <p>List of employees in the Department Form should be here</p>
                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    //JS for the tab layout
    var tabs = document.querySelector(".tabs");
    var tabHeader = tabs.querySelector(".tab-header");
    var tabBody = tabs.querySelector(".tab-body");
    var tabIndicator = tabs.querySelector(".tab-indicator");
    var tabHeader = tabs.querySelectorAll(".tab-header > div");
    var tabBodyNodes = tabs.querySelectorAll(".tab-body > div");

    for(var i = 0; i<tabHeaderNodes.length; i++) {
        tabHeaderNodes[i].addEventListner("click",function() {
            tabHeader.querySelector(".active").classList.remove("active");
            tabHeaderNodes[i].classList.add("active");
            tabBody.querySelector(".active").classList.remove("active");
            tabBodyNodes[i].classList.add("active");
            tabIndicator.style.left = 'calc(clac(clac(25% - 5px) * ${i}) + 10px)'
        });
    }
</script>