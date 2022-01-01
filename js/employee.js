

//==============================assignedAssets.php================================================
//========Reporting the particular asset from the table of assigned assets======================= 
function loadAssets(userID){
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `http://localhost/assetpro/asset/assigned/${userID}`, true);
        xhr.onload = function() {
            if (this.status === 200) {
                var assets = JSON.parse(this.response);
                for (var i = 0; i < assets.length; i++) {
                    document.getElementById('employeeTableBody').innerHTML += `
                                    <tr>
                                        <td>${i+1}</td>
                                        <td>${assets[i]['CategoryCode']}/${assets[i]['TypeCode']}/${assets[i]['AssetID']}</td>
                                        <td>${assets[i]['assetName']}</td>
                                        <td>${assets[i]['assetType']}</td>
                                        <td>  
                                        <button class='btn btn-submit ' onClick="report(${assets[i]['AssetID']})">Report</button>
                                        </td> 
                                    </tr>`;
                }
            }
        }
        xhr.send();
    }
    
//==============================assignedAssets.php================================================
//=======click Report button to redirect to the page of report.php FORM for partcular asset======
//'AssetID' is assigned to (asset)
//by using the par assetID,can get the assetDetails and put that to a string and then create a cookie for 'assetID'
    function report(assetId){       
        var assetDetails=null;
         console.log('assetId = ' + assetId);
        const xhr = new XMLHttpRequest();      
        xhr.open('GET',`http://localhost/assetpro/asset/getAsset/${assetId}`,true);
        xhr.onload = function(){
            if(this.status == 200){
                assetDetails = JSON.parse(this.response);
                loadSection('centerSection','report');
                var json = JSON.stringify(assetDetails);       //object to string ==> the details of (partcular asset) will be stored as a string
                document.cookie=`assetID=${json}`;
            }    
            // console.log(assetDetails);            
        }
        xhr.send();
       
     }  


//=================================report.php=========================================
//The basic information of the asset will be displayed default and reason & defected part can be written

//     var assetID = getCookieValue('assetID');  
//     var asset =   JSON.parse(assetID)[0];  //string to object
//     console.log(asset); 
//     document.getElementById('assetID').value = asset.AssetID;
//     document.getElementById('assetName').value = asset.assetName;
//     document.getElementById('assetType').value = asset.assetType;
//     document.getElementById('category').value = asset.categoryName;
//     document.getElementById('condition').value = asset.AssetCondition;

  
   
//     document.querySelectorAll(".col-btn").forEach(button =>{
//         const cancelBtn = document.getElementById("cancelReport");
//         const reportBtn = document.getElementById("reportAsset");
//         button.addEventListener('click',function(event){
//             //event.preventDefault();
//             switch (event.target.id) {                       //event triggered when clicking the report btn
//                 case 'cancelReport':
                   
//                     break;
//                 case 'reportAsset':
//                    const report = getFormdata();   
//                    for (var pair of report.entries()) 
//                    {
//                    console.log(pair[0] + ': ' + pair[1]);
//                    }
                   
//                    if(report == null){
//                      alert('Fields cannot be empty');
//                    }else{
//                     saveReport(report);
//                    }
//                     break;
            
//                 default:
//                     break;
//             }
        
        
//         })
//     })
//     function getFormdata(){
//         reportForm = new FormData(document.getElementById('reportAssetForm'));
//         defectedPart =  document.getElementById('defP').value;
//         reportForm.append('defP',defectedPart);
//         explainDefect = document.getElementById('exDef').value;
//         reportForm.append('exDef',explainDefect);
//         // console.log(reportForm);
//         if(defectedPart == "" || explainDefect == "")
//         {
//             return null;
//         }   
//         return reportForm;
//     }
    
   
//     function saveReport(report){
//         var xhr = new XMLHttpRequest();
//         xhr.open("POST",`../model/Report.php?action=reportBreakAsset&asset_id=${asset.AssetID}`,true);    //POST
  
//         xhr.onload = function(){
//             if(this.status === 200){
//                alert(this.responseText); // 2nd alert
//             }
//         }
//         xhr.send(report);
//     }
//    function cancelReport(){
//     loadSection('centerSection','assignedAssets');
//     // console.log(report);
//    }


    

//==========================reportedBreakdown.php=======================================
//===================viewing the reported assets in table==============================
    function viewBreakAsset(userID){
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `http://localhost/assetpro/breakdown/assigned/${userID}`, true);
        xhr.onload = function() {
            if (this.status === 200) {
                var viewassets = JSON.parse(this.response);
                for (var i = 0; i < viewassets.length; i++) {
                    var date = new Date(viewassets[i]['reportedDate']);
                    var newDate = date.getDate()+'/'+(date.getMonth()+1)+'/'+date.getFullYear();     
                    var reportedDate = viewassets[i]['reportedDate'].replace(/-/gi, "/");
                    document.getElementById('employeeTableBody').innerHTML += `
                                    <tr>
                                        <td>${i+1}</td>
                                        <td>${newDate}</td>
                                        <td>${viewassets[i]['CategoryCode']}/${viewassets[i]['TypeCode']}/${viewassets[i]['AssetID']}</td>
                                        <td>${viewassets[i]['assetName']}</td>
                                        <td>${viewassets[i]['assetType']}</td>
                                        <td>${viewassets[i]['Status']}</td>
                                        <td>  
                                        <button class='btn btn-submit' onClick="viewBreak(${viewassets[i]['AssetID']},${viewassets[i]['BreakdownID']})">View</button>
                                        </td> 
                                    </tr>`;
                }
            }
        }
        xhr.send();
    }
//==========================reportedBreakdown.php=============================================== 
//==========click view will redirect to the viewBreakAssets.php file FORM of part. asset========
    function viewBreak(assetId,breakdownId){   
        var viewBreakAssetDetails = null;
        const xhr = new XMLHttpRequest();
        xhr.open('GET',`http://localhost/assetpro/breakdown/getBreakdown/${assetId}/${breakdownId}`,true);
        xhr.onload = function(){
            if(this.status == 200){
             viewBreakAssetDetails = JSON.parse(this.response);
             console.log(viewBreakAssetDetails);
             loadSection('centerSection','viewBreakAssets');   
             var json = JSON.stringify(viewBreakAssetDetails );       //object to string
             document.cookie=`BreakdownID=${json}`;
           }  
       }
       xhr.send();
     }
    
    
    
    
//      //======================viewBreakAssets.php===============================
//      //the basic information of the asset will be displayed default including reason & defected parts

//     var breakdownID = getCookieValue('BreakdownID');  
//     var breakdown =   JSON.parse(breakdownID)[0];  //string to object
//     console.log(breakdown); 
//     document.getElementById('assetID').value = breakdown.AssetID;
//     document.getElementById('assetName').value = breakdown.assetName;
//     document.getElementById('assetType').value = breakdown.assetType;
//     document.getElementById('category').value =breakdown.categoryName;
//     document.getElementById('condition').value = breakdown.AssetCondition;
//     document.getElementById('defP').value = breakdown.DefectedParts;
//     document.getElementById('exDef').value = breakdown.Reason;
   
    
   
//     document.querySelectorAll(".col-btn").forEach(button =>{
//         const cancelBtn = document.getElementById("cancelReport");
//         const reportBtn = document.getElementById("reportAsset");
//         button.addEventListener('click',function(event){
//             //event.preventDefault();
//             switch (event.target.id) {                       //event triggered when clicking the report btn
//                 case 'cancelReport':
                   
//                     break;
//                 case 'reportAsset':
//                    const report = getFormdata();   
//                    for (var pair of report.entries()) 
//                    {
//                    console.log(pair[0] + ': ' + pair[1]);
//                    }
                   
//                    if(report == null){
//                      alert('Fields cannot be empty');
//                    }else{
//                     saveReport(report);
//                    }
//                     break;
            
//                 default:
//                     break;
//             }
        
        
//         })
//     })
//     function getFormdata(){
//         reportForm = new FormData(document.getElementById('reportAssetForm'));
//         defectedPart =  document.getElementById('defP').value;
//         reportForm.append('defP',defectedPart);
//         explainDefect = document.getElementById('exDef').value;
//         reportForm.append('exDef',explainDefect);
//         console.log(reportForm);
//         if(defectedPart == "" || explainDefect == "")
//         {
//             return null;
//         }   
//         return reportForm;
//     }
    
//    function cancelReport(){
//     loadSection('centerSection','reportedBreakdown');
//    }






    
        






