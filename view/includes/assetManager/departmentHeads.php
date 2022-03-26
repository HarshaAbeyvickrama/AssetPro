<style>
    * {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

    /* .contentSection {
        display: flex;
        justify-content: center;
        background-color: white;
        border-radius: 15px;
        margin-top: 15px;
        height: 82vh;
        align-items: flex-start !important;
    } */

    .addEmp #addEmp {
        color: white;
        background-color: #6A71D7;
        cursor: pointer;
        padding: 15px;
        border-radius: 14px;
        font-size: 20px;
        border: none;
        /* margin-left: 62vw; */
    }
    .header-title {
        display: grid;
        grid-template-columns: 1fr 1fr;
    }
    .addEmp {
        display: flex;
        justify-content: end;
    }
    .heading-title {
        display: flex;
        font-size: 30px;
        color: #304068;
        align-items: center;
        font-weight: bold;
    }

    .profile-row {
        /* display: inline-flex; */
        /* height: 2rem !important; */
    }
    .profile-image {
        width: 45px;
        height: 45px;
        border-radius: 50%;
    }
    .profile-name {
        height: 100% !important;
        /* display: inline-block; */
    }

    /* CSS for the employee table */
</style>
<div class="overviewLayout">
    <!-- <div>
        <div>All Employees</div>
        <div>
            <div class="addEmp">
                <button id="addEmp" >Add Employee</button>
            </div>
        </div>
    </div> -->
    <div class="header-title">
        <div class="heading-title">Department Heads</div>
        <div class="addEmp"><button id="addEmp">Insert</button></div>
    </div>

    <div class="contentSection">
        <!-- <div> -->
        <table class="table" id="empData">
            <thead>
                <tr>
                    <th class="heading">#</th>
                    <th>Department Head ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="tableRowGroup" id="headTableBody"></tbody>
        </table>
    </div>
</div>

<script>
    window.addEventListener('load', loadDepartmentHeads());
</script>

<script>
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
            <td class="profile-row">
              <img class="profile-image" src="http://localhost/assetpro/${departmenthead[i]["ProfilePicURL"]}" alt="">
              <span class="profile-name">${departmenthead[i]["Name"]}</span>
            </td>
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
</script>