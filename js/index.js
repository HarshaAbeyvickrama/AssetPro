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
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(JSON.stringify(data));
}

function postFiles(url, data, callback) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            callback(JSON.parse(xhr.response));
        }
    };
    xhr.open("POST", url, true);
    xhr.send(data);
}

function inputs(formID, state) {
    var inputs = document
        .getElementById(formID)
        .querySelectorAll("input, select");
    inputs.forEach((input) => {
        input.disabled = state;
    });
}

// Add a click asset listener
function addViewAssetListener(element, callback) {
    element.addEventListener("click", function (e) {
        callback(this.id);
    });
}

// Create a js element
function create(element, text = "") {
    var el = document.createElement(element);
    el.innerHTML = text;
    return el;
}

//Return a DOM element by ID
function element(id) {
    return document.getElementById(id);
}

//Confirmation message
function showConfirmation(text){
    return confirm(text);
}