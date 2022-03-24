// ***************** addEmployee.php ***************** //


function saveEmployee(employee) {
  postData("http://localhost/assetpro/employees/addEmployee", employee, (data) => {
    console.log(data);
  });
}


// ***************** addTechnician.php ***************** //


//Saving the technician function
//Saving technician details through AJAX

function saveTechnician(technician) {
  postData("http://localhost/assetpro/technicians/addTechnician", technician, (data) => {
    console.log(data);
  });
}

//Function to go back
function goBack() {
  loadSection("centerSection", "technicians");
}

// ***************** departmentDetails.php ***************** //

//Function for tab sections
document.getElementById("tabSections").addEventListener("click", function (e) {
  const eventId = e.target.id;
  if (eventId != "tabSections") {
    loadSection("tabContents", eventId);
    e.stopPropagation();
  }
});

// ***************** departmentEmployeeList.php ***************** //

// ***************** departments.php ***************** //

//Loading all the departments
function loadDepartments() {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "http://localhost/assetpro/departments/all", true);
  xhr.onload = function () {
    if (this.status == 200) {
      var department = JSON.parse(this.response);
      for (var i = 0; i < department.length; i++) {
        document.getElementById("departmentTableBody").innerHTML += `
          <tr>
            <td>${i + 1}</td>
            <td>${department[i]["DepartmentCode"]}/${
          department[i]["DepartmentID"]
        }</td>
            <td>${department[i]["Name"]}</td>
            <td>${department[i]["ContactNum"]}</td>
            <td>
              <button class='btn btn-submit ' id='view' onClick="loadDepartment(${
                department[i]["DepartmentID"]
              })">View</button>
            </td>
          </tr>`;
      }
    }
  };
  xhr.send();
}

//JS for pop-up form
document.getElementById("addDep").addEventListener("click", function popForm() {
  document.querySelector(".bg-popup").style.display = "flex";
});

// function popForm() {
//     document.getElementById('bg-popup').style.display = 'flex';
// }

document.querySelector(".close").addEventListener("click", function popForm() {
  document.querySelector(".bg-popup").style.display = "none";
});

//close form function
function closeForm(formID) {
  document.getElementById("closeForm").style.display = "none";
}

// Getting the form data
document.querySelectorAll(".col-btn").forEach((button) => {
  // const cancBtn = document.getElementById('cancelAddDepartment');
  const saveBtn = document.getElementById("btnSaveDepartment");
  button.addEventListener("click", function (event) {
    event.preventDefault();
    switch (event.target.id) {
      case "cancelAddDepartment":
        break;
      case "btnSaveDepartment":
        const department = getFormdata();
        // saveDepartment(department);
        var isEmpty = false;
        for (var pair of department.entries()) {
          // console.log(pair[0] + ': ' + pair[1]);
          if (pair[1] == "") {
            isEmpty = true;
          }
        }
        if (!isEmpty) {
          saveDepartment(department);
        } else {
          alert("Fill the form!");
        }

        break;

      default:
        break;
    }
  });
});

//getting the form data

function getFormdata(formID) {
  return new FormData(document.getElementById(formID));
}

//Saving the department function
//Saving department details through AJAX

function saveDepartment(department) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../model/Department.php?action=addDepartment", true);

  xhr.onload = function () {
    if (this.status === 200) {
      alert(this.responseText);
    }
  };
  xhr.send(department);
}

//Viewing the deaprtment details
var viewDepartmentBtn = document.querySelectorAll("#view");
for (var i = 0; i < viewDepartmentBtn.length; i++) {
  viewDepartmentBtn[i].addEventListener("click", function () {
    loadDepartment(event.target.parentElement.id);
    // console.log(event.target.parentElement.id);
  });
}

//Loading details of the selected department
function loadDepartment(DepartmentID) {
  var departmentDetails = null;
  const xhr = new XMLHttpRequest();
  xhr.open(
    "GET",
    `http://localhost/assetpro/departments/getDepartment/${DepartmentID}`,
    true
  );

  xhr.onload = function () {
    if (this.status === 200) {
      departmentDetails = JSON.parse(this.responseText);
      // alert(this.responseText);
      loadSection("centerSection", "departmentDetails");

      var json = JSON.stringify(departmentDetails);
      document.cookie = `DepartmentID=${json}`;
    }
  };
  xhr.send();
}

//Loading the employee list of the selected department
function loadEmploeeDepartment(DepartmentID) {
  var departmentEMployeeDetails = null;
  const xhr = new XMLHttpRequest();
  xhr.open(
    "POST",
    `../model/Department.php?action=loadEmployeeDepartment&DepartmentID=${DepartmentID}`,
    true
  );
  xhr.onload = function () {
    if (this.status === 200) {
      departmentEmployeeDetails = JSON.parse(this.responseText);
      // alert(this.responseText);
      // loadSection('centerSection', 'departmentDetails');

      var json = JSON.stringify(departmentDetails);
      document.cookie = `DepartmentID=${json}`;
    }
  };
  xhr.send();
}

// ***************** employees_rem.php ***************** //

//Loading all the employees
function loadEmployees() {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "http://localhost/assetpro/employees/all", true);
  xhr.onload = function () {
    if (this.status == 200) {
      var employees = JSON.parse(this.response);
      for (var i = 0; i < employees.length; i++) {
        document.getElementById("employeeTableBody").innerHTML += `
          <tr>
            <td>${i + 1}</td>
            <td>${employees[i]["DepartmentCode"]}/EMP/${
          employees[i]["EmployeeID"]
        }</td>
            <td>${employees[i]["Name"]}</td>
            <td>${employees[i]["Gender"]}</td>
            <td>${employees[i]["jobTitle"]}</td>
            <td>
              <button class='btn btn-submit ' id='view' onClick="loadEmployee(${
                employees[i]["EmployeeID"]
              })">View</button>
            </td>
          </tr>`;
      }
    }
  };
  xhr.send();
}

//Loading details of the selected employee
function loadEmployee(EmployeeID) {
  var employeeDetails = null;
  const xhr = new XMLHttpRequest();
  xhr.open(
    "GET",
    `http://localhost/assetpro/employees/getEmployee/${EmployeeID}`,
    true
  );
  xhr.onload = function () {
    if (this.status === 200) {
      employeeDetails = JSON.parse(this.responseText);
      popup = document.querySelector(".popup-container");
      popup.style.display = "grid";
      loadSection("popup", "emprofile");
      var json = JSON.stringify(employeeDetails);
      document.cookie = `EmployeeDetails=${json}`;
    }
    console.log(employeeDetails);
  };
  xhr.send();
}

//Loading the add employee page
var addEmployeeBtn = document.getElementById("addEmp");
addEmployeeBtn.addEventListener("click", function () {
  loadSection("centerSection", "addEmployee");
});

// //Viewing the employee details
// var viewEmployeeBtn = document.querySelectorAll("#view");
// for (var i = 0; i < viewEmployeeBtn.length; i++) {
//   viewEmployeeBtn[i].addEventListener("click", function () {
//     // loadEmployee(event.target.parentElement.id);
//     // console.log(event.target.parentElement.id);
//     console.log("Hello");
//   });
// }

//Function to go back
function goBack() {
  loadSection("centerSection", "employees");
}

// ***************** generalDetails.php ***************** //

var departmentID = getCookieValue("DepartmentID");
var department = JSON.parse(departmentID)[0];
// console.log(department);
document.getElementById("dId").value = department.DepartmentID;
document.getElementById("dCode").value = department.DepartmentCode;
document.getElementById("dName").value = department.Name;
document.getElementById("dCon").value = department.ContactNum;
document.getElementById("dDes").value = department.description;

// ***************** technicians_rem.php ***************** //

//Load all the technicians
function loadTechnicians() {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "http://localhost/assetpro/technicians/all", true);
  xhr.onload = function () {
    if (this.status == 200) {
      var technicians = JSON.parse(this.response);
      for (var i = 0; i < technicians.length; i++) {
        document.getElementById("techniciansTableBody").innerHTML += `
          <tr>
            <td>${i + 1}</td>
            <td>${technicians[i]["DepartmentCode"]}/TEC/${
          technicians[i]["TechnicianID"]
        }</td>
            <td>${technicians[i]["Name"]}</td>
            <td>${technicians[i]["Gender"]}</td>
            <td>${technicians[i]["jobTitle"]}</td>
            <td>
              <button class='btn btn-submit ' id='view' onClick="loadTechnician(${
                technicians[i]["TechnicianID"]
              })">View</button>
            </td>
          </tr>`;
      }
    }
  };
  xhr.send();
}

//Loading details of the selected technician
function loadTechnician(TechnicianID) {
  var technicianDetails = null;
  const xhr = new XMLHttpRequest();
  xhr.open(
    "GET",
    `http://localhost/assetpro/technicians/getTechnician/${TechnicianID}`,
    true
  );
  xhr.onload = function () {
    console.log(technicianDetails);
    if (this.status === 200) {
      technicianDetails = JSON.parse(this.responseText);
      popup = document.querySelector('.popup-container');
      popup.style.display = "grid";
      loadSection("popup", "tecprofile");
      var json = JSON.stringify(technicianDetails);
      document.cookie = `TechnicianID=${json}`;
    }
  };
  xhr.send();
}

//Funtion to get the add technicians form
var addTechnicianBtn = document.getElementById("addTec");
addTechnicianBtn.addEventListener("click", function () {
  //Add the code to execute

  loadSection("centerSection", "addTechnician");
});

// ***************** tecprofile.php ***************** //

// Enable / Disable the form fields

// formID = the Id of the form that should be diabled
// readonlyState ---->
//      true --> form disabled
//      false --> form enabled

function formState(formId, readonlyState) {
  const form = document.getElementById(formId);
  var elements = form.elements;
  var len = elements.length;
  for (var i = 0; i < len; ++i) {
    elements[i].disabled = readonlyState;
  }
  document.getElementById("uploadBtn").disabled = readonlyState;
}

formState("errorlogForm", true);

document.querySelectorAll(".col-btn").forEach((button) => {
  const backBtn = document.getElementById("back");
  button.addEventListener("click", function (event) {
    switch (event.target.id) {
      case "back":
        formState("errorlogForm", true);
        /*saveBtn.style.display = 'none';
                    cancelBtn.style.display = 'none';
                    btnEditProfile.style.display = 'block';*/

        break;

      default:
        break;
    }
  });
});

// ************************* dhead.php ************************ //

//Getting all the department heads
function loadDepartmentHeads() {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "http://localhost/assetpro/departmentheads/all", true);
  xhr.onload = function () {
    if (this.status == 200) {
      var departmenthead = JSON.parse(this.response);
      console.log(departmenthead);
      for (var i = 0; i < departmenthead.length; i++) {
        document.getElementById("headTableBody").innerHTML += `
          <tr>
            <td>${i + 1}</td>
            <td>${departmenthead[i]["DepartmentCode"]}/DH/${
          departmenthead[i]["HeadID"]
        }</td>
            <td>${departmenthead[i]["Name"]}</td>
            <td>${departmenthead[i]["Gender"]}</td>
            <td>
              <button class='btn btn-submit ' id='view' onClick="loadDepartmentHead(${
                departmenthead[i]["HeadID"]
              })">View</button>
            </td>
          </tr>`;
      }
    }
  };
  xhr.send();
}

//Loading details of the department head
function loadDepartmentHead(HeadID) {
  var headDetails = null;
  const xhr = new XMLHttpRequest();
  xhr.open ("GET", `http://localhost/assetpro/departmentheads/getDepartmentHead/${HeadID}`, true);
  xhr.onload = function() {
    if(this.status == 200) {
      headDetails = JSON.parse(this.responseText);
      popup = document.querySelector(".popup-container");
      popup.style.display = "grid";
      loadSection("popup", "headprofile");
      var json = JSON.stringify(headDetails);
      document.cookie = `HeadDetails=${json}`;
    }
    console.log(headDetails);
  };
  xhr.send();
}

//Save department head function
function saveDepartmentHead(departmenthead) {
  postData("http://localhost/assetpro/departmentheads/addDepartmentHead", departmenthead, (data) => {
    console.log(data);
  });
}

