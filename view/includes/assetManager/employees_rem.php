<div class="overviewLayout">
    <div class="section-heading">All Employees</div>

    <div class="contentSection">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="employeeTableBody"></tbody>
        </table>
    </div>
</div>
<script>
    getData('http://localhost/assetpro/employees/all', (employees) => {
        let employeeTableBody = document.getElementById('employeeTableBody');
        employees.forEach((employee, index) => {
            console.log(employee);
            var row = document.createElement('tr');
            var btn = document.createElement('div');
            btn.classList.add('btn');
            btn.classList.add('btn-assign');
            btn.id = employee.EmployeeID;
            btn.innerHTML = 'View';
            addViewAssetListener(btn, (id) => {
                popupContainer = document.querySelector('.popup-container');
                popupContainer.style.display = 'grid';
                document.cookie = `EmployeeID = ${id}`;
                loadSection('popup', 'emprofile');
                
            })
            var tr = create('tr');
            var td = create('td', index + 1);
            tr.appendChild(td);
            td = create('td', `EMP/${employee.EmployeeID}`);
            tr.appendChild(td);
            td = create('td', employee.Name);
            tr.appendChild(td);
            td = create('td', employee.DepartmentName);
            tr.appendChild(td);
            td = create('td');
            td.appendChild(btn);
            tr.appendChild(td);
            tr.id = employee.UserID;
            employeeTableBody.appendChild(tr);
        })
    });
</script>