// function loadAssetsTec(userID){ //comment
//     const xhr = new XMLHttpRequest();
//     xhr.open("GET", `http://localhost/assetpro/asset/assigned/${userID}`, true);
//     xhr.onload = function() {
//         if (this.status === 200) {
//             var assets = JSON.parse(this.response);
//             for (var i = 0; i < assets.length; i++) {
//                 document.getElementById('techniciantable').innerHTML += `
//                                 <tr>
//                                     <td>${i+1}</td>
//                                     <td>${assets[i]['CategoryCode']}/${assets[i]['TypeCode']}/${assets[i]['AssetID']}</td>
//                                     <td>${assets[i]['assetName']}</td>
//                                     <td>${assets[i]['assetType']}</td>
//                                     <td>${assets[i]['Assetcondition']}</td>
//                                     <td>${assets[i]['technicianID']}/${assets[i]['specialization']}</td>     
//                                 </tr>`;
//             }
//         }
//     }
//     xhr.send();
// }


    document.getElementById("assetSections").addEventListener('click',function(e){
        const eventId = e.target.id;
        if(eventId != 'assetSections'){
            loadSection("assetContents",eventId);
            e.stopPropagation();
            setActiveTab(eventId);
        }
        
    });

    function setActiveTab(eventId){
        var tabs = document.querySelector('#assetSections').querySelectorAll('div');
        tabs.forEach(tab =>{
            tab.classList.remove('activeTab');
        })
        document.getElementById(eventId).classList.add('activeTab');
    }
    document.getElementById("addAsset").addEventListener('click',function(e){
        const eventId = e.target.id;
        if(eventId == "addAsset"){
            loadSection("centerSection",eventId);
        }
    })


    //Add event listener to listen for click events on each asset in all tables
    // function addViewAssetListener(assetElement){
    //     assetElement.addEventListener('click', (event) =>{
    //         var asset = event.target.parentElement;
    //         event.stopPropagation();
    //         getAsset(assets.id)
    //     })
    // }

    //Get asset details by ID
    // function getAsset(assetID){
    //     const xhr = new XMLHttpRequest();
    //     xhr.open("GET",`../model/Asset.php?action=getAssets&type=${type}`,true);
    // }

/* ===========================query for breakdownsInProgress================================================= */
function getAssets(userID){
    const xhr = new XMLHttpRequest();
    xhr.open("GET",`http://localhost/assetpro/breakdown/getBreakdownInprogressT/${userID}`,true);
    xhr.onload = function(){
        if(this.status === 200){
            var assets = JSON.parse(this.responseText);
            console.log(assets);
                    for(var i = 0; i<assets.length;i++){
                        document.getElementById('inprogressAssetsTableBody').innerHTML +=`
                            <tr>
                                <td>${i+1}</td>
                                <td>${assets[i]['CategoryCode']}/${assets[i]['TypeCode']}/${assets[i]['AssetID']}</td>
                                <td>${assets[i]['Name']}</td>
                                <td>${assets[i]['typeName']}</td>
                                <td>${assets[i]['DepartmentCode']}/EMP/${assets[i]['reportedEmployee']}</td>
                                <td>  
                                <button class='btn btn-submit' onClick=""> Mark as Done </button>
                                </td> 
                            </tr>`;
                    }
                }
            }
    xhr.send();
}


/* ===========================script of errorLog.php========================================================= */

// function formState(formId,readonlyState){
//     const form = document.getElementById(formId);
//     var elements = form.elements;
//     var len = elements.length;
//     for(var i=0; i<len; ++i){
//         elements[i].disabled=readonlyState;
//     }
//     document.getElementById("uploadBtn").disabled=readonlyState;

// }

// formState("errorlogForm",true);

// document.querySelectorAll(".col-btn").forEach(button =>{
//     const finishBtn = document.getElementById("finish");
//     const backBtn = document.getElementById("back");
//     button.addEventListener('click',function(event){
//         switch (event.target.id) {
//             case 'finish':
//                 formState("errorlogForm",true);
//                 finishBtn.style.display = 'none';
//                 backBtn.style.display = 'none';
                
                
//                 break;
//             case 'back':
//                 finishBtn.style.display = 'block';
//                 formState("reportBreakdownForm",false);
//                 break;
        
//             default:
//                 break;
//         }
    
    
//     })
// })

/* ===========================script of sendfeedback.php==================================================== */ 

function formState(formId,readonlyState){
    const form = document.getElementById(formId);
    var elements = form.elements;
    var len = elements.length;
    for(var i=0; i<len; ++i){
        elements[i].disabled=readonlyState;
    }
    document.getElementById("uploadBtn").disabled=readonlyState;

}

formState("sendFeedbackForm",true);

document.querySelectorAll(".col-btn").forEach(button =>{
    const sendfbBtn = document.getElementById("sendFeedback");
    const cancBtn = document.getElementById("cancelEdit");
    const errlogBtn = document.getElementById("errorLog");
    button.addEventListener('click',function(event){
        switch (event.target.id) {
            case 'sendFeedback':
                formState("sendFeedbackForm",true);
                cancBtn.style.display = 'none';
                errlogBtn.style.display = 'none';
                
                break;
            case 'cancelEdit':
                sendfbBtn.style.display = 'block';
                errlogBtn.style.display = 'block';
                /*..deleteBtn.style.display = 'none';..*/
                formState("sendFeedbackForm",false);
                break;
        
            default:
                break;
        }
    
    
    })
})
    

/* ===========================script of viewreportbreakdown.php==================================================== */
    script>

    // Enable / Disable the form fields

    // formID = the Id of the form that should be diabled
    // readonlyState ---->
    //      true --> form disabled 
    //      false --> form enabled 
    
    function formState(formId,readonlyState){
        const form = document.getElementById(formId);
        var elements = form.elements;
        var len = elements.length;
        for(var i=0; i<len; ++i){
            elements[i].disabled=readonlyState;
        }
        document.getElementById("commenceBtn").disabled=readonlyState;
    
    }
    
    formState("viewReportBreakdownForm",true);

    document.querySelectorAll(".col-btn").forEach(button =>{
        const commenceBtn = document.getElementById("commence");
        const errlogBtn = document.getElementById("errorLog");
        button.addEventListener('click',function(event){
            switch (event.target.id) {
                case 'commence':
                    formState("viewReportBreakdownForm",true);
                    commenceBtn.style.display = 'none';
                    errlogBtn.style.display = 'none';
                    break;

                case 'errorLog':
                    errlogBtn.style.display = 'block';
                    commenceBtn.style.display = 'block';
                    formState("viewReportBreakdownForm",false);
                    break;
            
                default:
                    break;
            }
        
        
        })
    })
       