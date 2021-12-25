// Ajax GET call
function getData(url, callback) {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      callback(JSON.parse(xhr.response));
    }
  };
  xhr.open("GET", url, true);
  xhr.send();
}

// Ajax POST call
function postData(url, data, callback) {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      callback(JSON.parse(xhr.response));
    }
  };
  console.log(data);
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.send(JSON.stringify(data));
}

function addViewAssetListener(element , callback) {
  element.addEventListener("click", function (e) {
    // popup = document.getElementById("popup");
    // popup.style.display = "grid";
    callback(this.id);
  });
}