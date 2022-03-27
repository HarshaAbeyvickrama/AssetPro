
//================loading all the breakdown assets within the department of DH==============
function viewBreakAssetDH(userID){
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `http://localhost/assetpro/departmentheads/getDHBreakdowns/${userID}`, true);
    xhr.onload = function() {
        if (this.status === 200) {
            var viewassets = JSON.parse(this.response);
            console.log('the data is');
            for (var i = 0; i < viewassets.length; i++) {
              var date = new Date(viewassets[i]['reportedDate']);
              var newDate = date.getDate()+'/'+(date.getMonth()+1)+'/'+date.getFullYear();     
              var reportedDate = viewassets[i]['reportedDate'].replace(/-/gi, "/");
                document.getElementById('DHBody').innerHTML += `
                                <tr>
                                    <td>${i+1}</td>
                                    <td>${viewassets[i]['CategoryCode']}/${viewassets[i]['TypeCode']}/${viewassets[i]['AssetID']}</td>
                                    <td>${newDate}</td>
                                    <td>${viewassets[i]['assetName']}</td>
                                     <td></td>
                                    <td>  
                                    <button class='btn btn-submit' onClick="">View</button>
                                    </td> 
                                </tr>`;
            }
        }
    }
    xhr.send();
}

/************************************employees_rem.php*********************************************/
//Loading all the employees within his department
function loadDepartmentEmployees(userID) {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `http://localhost/assetpro/departmentheads/getDepartmentEmployees/${userID}`, true);
    xhr.onload = function () {
      if (this.status == 200) {
        var employees = JSON.parse(this.response);
        for (var i = 0; i < employees.length; i++) {
          document.getElementById("employeeTableBody").innerHTML += `
            <tr>
              <td>${i + 1}</td>
              <td>${employees[i]["DepartmentCode"]}/EMP/${employees[i]["EmployeeID"]}</td>
              <td class="profile-row">
                <img class="profile-image" src="http://localhost/assetpro/${employees[i]["ProfilePicURL"]}" alt="">
                <span class="profile-name">${employees[i]["Name"]}</span>
              </td>
              <td>${employees[i]["Gender"]}</td>
              <td>${employees[i]["jobTitle"]}</td>
              <td>
                <button class='btn btn-submit ' id='view' onClick="loadEmployee(${employees[i]["EmployeeID"]})">View</button>
              </td>
            </tr>`;
        }
      }
      console.log(employees);
    };
    xhr.send();
  }


//Loading all the assigned assets of Department Head
function loadAssignedAssets(userID){
  const xhr = new XMLHttpRequest();
  xhr.open("GET", `http://localhost/assetpro/departmentheads/getDHAssignedAssets/${userID}`, true);
  xhr.onload = function() {
      if (this.status == 200) {
          var viewassets = JSON.parse(this.response);
          console.log(viewassets);
          for (var i = 0; i < viewassets.length; i++) {
              document.getElementById('DHBody').innerHTML += `
                              <tr>
                                  <td>${i+1}</td>
                                  <td>${viewassets[i]['CategoryCode']}/${viewassets[i]['TypeCode']}/${viewassets[i]['AssetID']}</td>
                                  <td>${viewassets[i]['assetName']}</td>
                                  <td>${viewassets[i]['assetType']}</td>
                                  <td>  
                                  <button class='btn btn-submit' onClick="">Report</button>
                                  </td> 
                              </tr>`;
          }
      }
  }
  xhr.send();
}

//Loading all the Assets of Department Head
function loadDeptAssets(userID){
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `http://localhost/assetpro/departmentheads/getDeptAssets/${userID}`, true);
    xhr.onload = function() {
        if (this.status == 200) {
            var viewassets = JSON.parse(this.response);
            console.log(viewassets);
            for (var i = 0; i < viewassets.length; i++) {
                document.getElementById('DHBody').innerHTML += `
                              <tr>
                                  <td>${i+1}</td>
                                  <td>${viewassets[i]['CategoryCode']}/${viewassets[i]['TypeCode']}/${viewassets[i]['AssetID']}</td>
                                  <td>${viewassets[i]['assetName']}</td>
                                  <td>${viewassets[i]['assetType']}</td>
                                   <td>${viewassets[i]['categoryName']}</td>
                              </tr>`;
            }
        }
    }
    xhr.send();
}