
function viewBreakAssetDH(userID){
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `http://localhost/assetpro/departmentheads/getDHBreakdowns/${userID}`, true);
    xhr.onload = function() {
        if (this.status === 200) {
            var viewassets = JSON.parse(this.response);
            console.log('the data is');
            for (var i = 0; i < viewassets.length; i++) {
                document.getElementById('DHBody').innerHTML += `
                                <tr>
                                    <td>${i+1}</td>
                                    <td>${viewassets[i]['CategoryCode']}/${viewassets[i]['TypeCode']}/${viewassets[i]['AssetID']}</td>
                                    <td>${viewassets[i]['assetName']}</td>
                                    <td>${viewassets[i]['departmentName']}</td>
                                    <td>${viewassets[i]['DefectedParts']}</td>
                                    <td>  
                                    <button class='btn btn-submit' onClick="">View</button>
                                    </td> 
                                </tr>`;
            }
        }
    }
    xhr.send();
}

/************************************employees.php*********************************************/
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
              <td>${employees[i]["Name"]}</td>
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