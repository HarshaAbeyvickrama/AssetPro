// Function for loging
// const form = document.getElementById('loginForm');
// form.addEventListener('submit', (e) => {
//   e.preventDefault();
//   var login = new FormData(form);

//   const xhr = new XMLHttpRequest();
//   xhr.open('POST', './controller/mainController.php?action=login', true);
//   xhr.onload = function() {
//     const res = JSON.parse(this.responseText);
//     if (res.status != "ok") {
//       alert("Wrong userame/password combination!!!!!")
//     } else {
//       // console.log(`http://localhost/assetpro/${res.location}`);
//       window.location.replace(res.location);
//     }
//   }
//   xhr.send(login);
// })

// Get asset/employee/technician getCount

// function getCount(type, id) {
//   const xhr = new XMLHttpRequest();
//   xhr.open("GET", `../model/Asset.php?action=getCount&type=${type}`, true);

//   xhr.onload = function () {
//     if (this.status === 200) {
//       document.getElementById(id).innerHTML = this.responseText;
//     }
//   };
//   xhr.send();
// }
function getCount(type =null) {
  const xhr = new XMLHttpRequest();
  if(!type){
    xhr.open("GET", `http://localhost/assetpro/stats/all/`, true);
  }else{
    return;
    xhr.open("GET", `http://localhost/assetpro/stats/count/${type}`, true);
  }


  xhr.onload = function () {
    var result;
    if (this.status === 200) {
      result = JSON.parse(this.response);
      document.getElementById("allAssetsCount").innerHTML = res.allAssets;
      document.getElementById("allEmployeesCount").innerHTML = res.allEmployees;
      document.getElementById("allTechniciansCount").innerHTML = res.allTechnicians;
      return result;

    } 
  };
  xhr.send();

 
}
