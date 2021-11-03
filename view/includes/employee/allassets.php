<style>
    * {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

    .overviewLayout {
        display: grid;    
        height: 82vh;   
        overflow-y: scroll;
        padding: 20px;
        background-color: #F1F4FF;
    }

    .overviewLayout>div {    
        color: #304068;
        font-size: 18px;
       

    }

    .contentSection {
        background-color: white;
        border-radius: 15px;
        margin-top: 15px;
        display: absolute;
    }
    #tabSections {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #tabSections > div {
        width: 200px;
        display: flex;
        align-items: center;
        text-align: center;
        justify-content: center;
        color: #304068;
        font-size: 20px;
        height: 100%;
        padding: 8px 0px;
    }
    #tabSections > div:hover {
        cursor: pointer;
        background-color: aliceblue;
        transition: 0.5s;
    }
    #tabContents {
        display: flex;
        align-items: center !important;
    }
    #generalDetails {
        background-image: linear-gradient(#EAEDF5, white);
    }
</style>



<div class="overviewLayout">
    <div>
        <div>Assets Details</div>
    </div>
    <div class="contentSection">
    <div id="tabSections">
            <div id="assignedAssets">Assigned Assets</div>
            <div id="sharedAssets">Shared Assets</div>
            <div id="inprogressAssets">Inprogress Assets</div>
        </div>
        <div id="tabContents">
            <?php
                //  include("assignedAssets.php");
            ?>
        </div>
    </div>
</div>


<script type="text/javascript">
    document.getElementById('tabSections').addEventListener('click',function(e) {
        const eventId = e.target.id;
        if(eventId != 'tabSections') {
            loadSection('tabContents',eventId);
            e.stopPropagation();
        }
    });