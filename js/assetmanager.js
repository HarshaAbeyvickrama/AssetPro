//Load all asset categories
function loadCategories() {
    getData("http://localhost/assetpro/asset/categories", (data) => {
        categories = data;
        setCategories();
    });
}

//Set the loaded asset categories to the form dropdown
function setCategories() {
    const select = document.getElementById("category");
    categories.forEach((category) => {
        const option = `<option value=${category.CategoryID}>${category.CategoryName}</option>`;
        select.innerHTML += option;
    });
}

//Render the types according to category selected
function setTypes(id) {
    var select = document.getElementById("assetType");
    categories.forEach((category) => {
        if (category.CategoryID === id) {
            select.innerHTML = `<option value="">Select Type</option>`;
            category.Types.forEach((type) => {
                var option = `<option value=${type.TypeID}>${type.TypeName}</option>`;
                select.innerHTML += option;
            });
        }
    });
}

// Populate the loaded asset details to the form
function populateData(asset) {
    element('assetID').value = `${asset.CategoryCode}/${asset.TypeCode}/${asset.AssetID}`;
    element('imagePreview').src = `../${asset.ImageURL}`;
    element('assetName').value = asset.Name;
    element('assetDescription').value = asset.Description;
    element('category').value = asset.CategoryID;
    setTypes(asset.CategoryID);
    element('assetType').value = asset.TypeID;
    element('condition').value = asset.AssetCondition;
    element('purchaseDate').value = asset.PurchasedDate;
    element('purchaseCost').value = asset.Cost;

    if (asset.fromDate != null) {
        element('warranty').checked = true;
        element('fromDate').value = asset.fromDate;
        element('toDate').value = asset.toDate;
        element('otherInfo').value = asset.OtherInfo;
    }

    if (asset.DepriciaionRate != null) {
        element('depreciation').checked = true;
        element('depreciationRate').value = asset.DepriciaionRate;
        element('residualValue').value = asset.ResidualValue;
        element('usefulYears').value = asset.UsefulYears;
    }
}

//Set the isEditing State to track whether the form is in edit mode or not
function setISEditing(state) {
    if (state) {
        sectionState('addAssetForm', false )
        assetFormState('assetID',true);
        document.getElementById("uploadBtn").style.display = 'flex';
        document.getElementById("btnUpdateAsset").style.display = 'block';
        document.getElementById("cancelEditAsset").style.display = 'block';
        document.getElementById("btnEditAsset").style.display = 'none';
    } else {
        sectionState('addAssetForm', true)
        document.getElementById("uploadBtn").style.display = 'none';
        document.getElementById("btnUpdateAsset").style.display = 'none';
        document.getElementById("cancelEditAsset").style.display = 'none';
        document.getElementById("btnEditAsset").style.display = 'block';
    }
}

//Return the form object by ID
function getFormData(formID) {
    let form = new FormData(document.getElementById(formID));
    const asset = {};
    for (const pair of form.entries()) {
        asset[pair[0]] = pair[1];
    }
    return asset;
}



//Change the section state with ID
function sectionState(sectionID, state) {
    var inputs = element(sectionID).querySelectorAll("input, select");
    inputs.forEach(input => {
        input.disabled = state;
    })
}


function updateAsset(asset) {
    postData('http://localhost/assetpro/asset/update', asset, (data) => {
        console.log(data);
    })
}
