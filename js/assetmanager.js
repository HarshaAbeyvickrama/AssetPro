function loadCategories() {
  getData("http://localhost/assetpro/asset/categories", (data) => {
    categories = data;
    setCats();
  });
}

function setCats() {
  var select = document.getElementById("category");
  categories.forEach((category) => {
    var option = `<option value=${category.CategoryID}>${category.CategoryName}</option>`;
    select.innerHTML += option;
  });
}

function setTypes(id) {
  var select = document.getElementById("assetType");
  categories.forEach((category) => {
    if (category.CategoryID == id) {
      select.innerHTML = `<option value="">Select Type</option>`;
      category.Types.forEach((type) => {
        var option = `<option value=${type.TypeID}>${type.TypeName}</option>`;
        select.innerHTML += option;
      });
    }
  });
}
