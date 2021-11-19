// Get asset/employee/technician getCount

function getCount(type, id) {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", `../model/Asset.php?action=getCount&type=${type}`, true);

  xhr.onload = function () {
    if (this.status === 200) {
      document.getElementById(id).innerHTML = this.responseText;
    }
  };
  xhr.send();
}
