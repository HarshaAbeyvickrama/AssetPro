// ***************** addEmployee.php ***************** //

//Function to cancel the form and add
document.querySelectorAll(".col-btn").forEach((button) => {
  const cancBtn = document.getElementById("cancelAddEmployee");
  const saveBtn = document.getElementById("btnSaveEmployee");
  button.addEventListener("click", function (event) {
    event.preventDefault();
    switch (event.target.id) {
      case "cancelAddEmployee":
        break;
      case "btnSaveEmployee":
        const employee = getFormdata();
        // saveDepartment(department);
        var isEmpty = false;
        for (var pair of employee.entries()) {
          // console.log(pair[0] + ': ' + pair[1]);
          if (pair[1] == "") {
            isEmpty = true;
          }
        }
        if (!isEmpty) {
          saveEmployee(employee);
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

function getFormdata() {
  return new FormData(document.getElementById("addEmployeeForm"));
}

//Getting the image preview
var imageUpload = document.getElementById("profileImage");
imageUpload.addEventListener("change", () => {
  const image = imageUpload.files[0];
  if (image) {
    var src = URL.createObjectURL(image);
    document.getElementById("imagePreview").src = src;
  }
});

//Saving the employee function
//Saving employee details through AJAX

function saveEmployee(employee) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../model/Employee.php?action=addEmployee", true);

  xhr.onload = function () {
    if (this.status === 200) {
      console.log(this.responseText);
      alert("Successfully added to the system!");
    }
  };
  xhr.send(employee);
}

//Function to go back
function goBack() {
  loadSection("centerSection", "employees");
}

getDepartments();
function getDepartments() {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../model/Department.php?action=getDepartments", true);

  xhr.onload = function () {
    if (this.status === 200) {
      var departments = JSON.parse(this.responseText);
      // console.log(departments);
      var select = document.getElementById("depID");

      for (var i = 0; i < departments.length; i++) {
        console.log(departments[i]);
        var option = `<option value=${departments[i].DepartmentID}>${departments[i].Name}(${departments[i].DepartmentCode})</option>`;
        select.innerHTML += option;
      }
    }
  };
  xhr.send();
}

// ***************** addTechnician.php ***************** //

//Function to add and cancel form
document.querySelectorAll(".col-btn").forEach((button) => {
  const cancBtn = document.getElementById("cancelAddTechnician");
  const saveBtn = document.getElementById("btnSaveTechnician");
  button.addEventListener("click", function (event) {
    event.preventDefault();
    switch (event.target.id) {
      case "cancelAddTechnician":
        break;
      case "btnSaveTechnician":
        const technician = getFormdata();
        saveTechnician(technician);
        console.log(technician);
        break;

      default:
        break;
    }
  });
});

//getting the form data

function getFormdata() {
  return new FormData(document.getElementById("addTechnicianForm"));
}

//Getting the image preview
var imageUpload = document.getElementById("profileImage");
imageUpload.addEventListener("change", () => {
  const image = imageUpload.files[0];
  if (image) {
    var src = URL.createObjectURL(image);
    document.getElementById("imagePreview").src = src;
  }
});

//Saving the technician function
//Saving technician details through AJAX

function saveTechnician(technician) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../model/Technician.php?action=addTechnician", true);

  xhr.onload = function () {
    if (this.status === 200) {
      console.log(this.responseText);
      alert("Successfully added to the system!");
    }
  };
  xhr.send(technician);
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

function getFormdata() {
  return new FormData(document.getElementById("addDepartmentForm"));
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
    "POST",
    `../model/Department.php?action=loadDepartment&DepartmentID=${DepartmentID}`,
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

// ***************** employees.php ***************** //

//Loading the add employee page
var addEmployeeBtn = document.getElementById("addEmp");
addEmployeeBtn.addEventListener("click", function () {
  loadSection("centerSection", "addEmployee");
});

//Viewing the deaprtment details
var viewEmployeeBtn = document.querySelectorAll("#view");
for (var i = 0; i < viewEmployeeBtn.length; i++) {
  viewEmployeeBtn[i].addEventListener("click", function () {
    loadDepartment(event.target.parentElement.id);
    // console.log(event.target.parentElement.id);
  });
}

//Loading details of the selected department
function loadDepartment(EmployeeID) {
  var employeeDetails = null;
  const xhr = new XMLHttpRequest();
  xhr.open(
    "POST",
    `../model/Employee.php?action=loadEmployee&EmployeeID=${EmployeeID}`,
    true
  );

  xhr.onload = function () {
    if (this.status === 200) {
      employeeDetails = JSON.parse(this.responseText);
      console.log(employeeDetails);
      loadSection("centerSection", "emprofile");

      var json = JSON.stringify(employeeDetails);
      document.cookie = `EmployeeID=${json}`;
    }
  };
  xhr.send();
}

//Function to go back
function goBack() {
  loadSection("centerSection", "employees");
}

// ***************** emprofile.php ***************** //

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

//Getting the employee details to the form
var employeeID = getCookieValue("EmployeeID");
var employee = JSON.parse(employeeID)[0];
console.log(employee);

console.log(employee.ProfilePicURL);

document.getElementById("imagePrev").src = `..${employee.ProfilePicURL}`;

document.getElementById("empID").value = employee.EmployeeID;
document.getElementById("fName").value = employee.fName;
document.getElementById("lName").value = employee.lName;
document.getElementById("NIC").value = employee.NIC;
var radio = document.getElementById("radio-group").children;
// console.log(employee.Gender);
var gender = document.getElementById(employee.Gender);
gender.checked = true;
// document.getElementById(employee.Gender).checked = true;
document.getElementById("dob").value = employee.DOB;
document.getElementById("maritalStatus").value = employee.CivilStatus;
document.getElementById("address").value = employee.Address;
document.getElementById("contactNo").value = employee.PhoneNumber;
document.getElementById("email").value = employee.Email;
document.getElementById("eName").value = employee.eName;
document.getElementById("eRelationship").value = employee.Relationship;
document.getElementById("econtact").value = employee.TelephoneNumber;

// ***************** generalDetails.php ***************** //

var departmentID = getCookieValue("DepartmentID");
var department = JSON.parse(departmentID)[0];
// console.log(department);
document.getElementById("dId").value = department.DepartmentID;
document.getElementById("dCode").value = department.DepartmentCode;
document.getElementById("dName").value = department.Name;
document.getElementById("dCon").value = department.ContactNum;
document.getElementById("dDes").value = department.description;

// ***************** overview.php ***************** //

//Getting the counts
getCount("allAssets", "allAssetsCount");
getCount("allEmployees", "allEmployeesCount");
getCount("allTechnicians", "allTechniciansCount");

// ***************** technicians.php ***************** //

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

//Getting the employee details to the form
var employeeID = getCookieValue("EmployeeID");
var employee = JSON.parse(employeeID)[0];
console.log(employee);

document.getElementById("imagePrev").src = `..${employee.ProfilePicURL}`;
document.getElementById("empID").value = employee.EmployeeID;
document.getElementById("fName").value = employee.fName;
document.getElementById("lName").value = employee.lName;
document.getElementById("NIC").value = employee.NIC;
var radio = document.getElementById("radio-group").children;
// console.log(employee.Gender);
var gender = document.getElementById(employee.Gender);
gender.checked = true;
// document.getElementById(employee.Gender).checked = true;
document.getElementById("dob").value = employee.DOB;
document.getElementById("maritalStatus").value = employee.CivilStatus;
document.getElementById("address").value = employee.Address;
document.getElementById("contactNo").value = employee.PhoneNumber;
document.getElementById("email").value = employee.Email;
document.getElementById("eName").value = employee.eName;
document.getElementById("eRelationship").value = employee.Relationship;
document.getElementById("econtact").value = employee.TelephoneNumber;
