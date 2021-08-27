<style>
    body{
        padding: 0;
        margin: 0;  
    }
    .popupContainer{
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        display: flex;
        background-color: black; 
        /* opacity: 50%;  */
        width: 100vw;
        height: 100vh;
        overflow: hidden;
        align-items: center;
        justify-content: center;
    }
    .unassignPopup{
        color: #304068;
        background-color: white;
        opacity: 100%;
        display: grid;
        grid-template-rows: 1fr 8fr 1fr;
        height: 70vh;
        width: 22vw;
        justify-content: center;
        border-radius: 15px;
    }
    #popupTitle{
        display: flex;
        align-items: center;
        font-size: 18px;
        margin-top: 10px;
        padding: 20px;
        font-weight: bold;
    }
    #popupContent{
        border: 1px solid yellowgreen;
        overflow-x: hidden;
        overflow-y: scroll;
    }
    #popupContent::-webkit-scrollbar{
        display: none;
    }
    .btn{
        color: white;
        text-align: center;
        padding: 8px;
        float: right;
        margin: 5px;
        border-radius: 25px;
        font-size: 12px;
    }
    .btn:hover{
        cursor: pointer;
    }
    #btnDelete{
        background-color: #6A71D7;
        width: 120px;  
    }
    #btnCancel{
        background-color: #304068;
        width: 90px;
    }
    
</style>

<div class="popupContainer">
    <div class="unassignPopup">
        <div id="popupTitle">These assets will be unassigned !</div>
        <div id="popupContent">

        </div>
        <div id="popupBtn">
            <div class="btn" id="btnDelete">Delete Anyway</div>
            <div class="btn" id="btnCancel">Cancel</div>
        </div>
    </div>
</div>
