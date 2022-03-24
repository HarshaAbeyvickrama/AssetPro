<style>
    /* Recent activity Table CSS */
    /* hr {
        background-color: #304068;
        width: 100%;
        height: 1px;
    }

    #centerSection>div:first-of-type {
        padding: 0px 20px 20px 20px;
    } */

    

    .wrapper {
        display: grid;
        grid-template-columns: 16% 16% 16% 50%;
        grid-template-rows: 50% 50%;
        gap: 18px;
    }
    .wrapper > div{
        background: white;
        padding: 1em;
        border-radius: 15px;
    }
    .box-5 {
        grid-column: 1/4;
    }

    .box-count {
        text-align: center;
        color: #5C6E9B;
        display: grid;
        grid-template-columns: 1fr;
        align-items: center;
    }
    .title {
        font-size: 25px;
    }

    .count {
        font-size: 50px;
    }

    .image img{
        width: 80px;
        height: 80px;
    }

    #employeeDistributionDepartments {
        height: 100% !important;
        max-width: 600px !important;
    }
    #employeeCategories {
        height: 100% !important;
        max-width: 600px !important;
    }
    #technicianSpecialization {
        height: 100% !important;
        max-width: 600px !important;
    }

</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="wrapper">
    <!-- Box 1 -->
    <div class="box-count">
        <div class="image">
            <img src="../Images/icons/employees.png">
        </div>
        <div class="title">Employees</div>
        <div class="count" id="allEmployees"></div>
    </div>

    <!-- Box 2 -->
    <div class="box-count">
        <div class="image">
            <img src="../Images/icons/technicians.png" alt="" width="60px" height="60px">
        </div>
        <div class="title">Technicians</div>
        <div class="count" id="allTechnicians"></div>
    </div>
    <!-- Box 3-->
    <div class="box-count">
        <div class="image">
            <img src="../Images/icons/departments.png" alt="" width="60px" height="60px">
        </div>
        <div class="title">Departments</div>
        <div class="count" id="allDepartments"></div>
    </div>

    <!-- Box 4 -->
    <div class="box-4">
        <canvas id="employeeDistributionDepartments"></canvas>
    </div>

    <!-- Box 5 -->
    <div class="box-5">
        <canvas id="employeeCategories"></canvas>
    </div>

    <!-- Box 6 -->
    <div class="box-6">
        <canvas id="technicianSpecialization"></canvas>
    </div>


</div>


<!-- Employee Dstribution among departments chart -->
<script>
    var labels = ['Human Resource', 'Marketing', 'Production', 'Operations', 'Technical', 'June', ];
    var data = {
        labels: labels,
        datasets: [{
            label: 'Staff Disctribution within departments',
            data: [65, 59, 80, 81, 56, 55, 40],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
    };
    var config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };

    var employeeDistributionChart = new Chart(
        document.getElementById('employeeDistributionDepartments'),
        config
    );
</script>

<!-- Employee Categories  chart-->

<script>
    var labels = ['Clerk', 'Software Engineer', 'Business Analyst', 'Accountant', 'Production PLanner', 'Team Leader', ];
    var data = {
        labels: labels,
        datasets: [{
            label: 'Employee Categories',
            data: [10, 20, 40, 27, 47, 16, 40],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
    };
    var config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };

    var employeeDistributionChart = new Chart(
        document.getElementById('employeeCategories'),
        config
    );
</script>

<!-- Technician Specialization -->

<script>
    var labels = ['Carpenter', 'Electrician', 'Plumber', ];
    var data = {
        labels: labels,
        datasets: [{
            label: 'Technician Specialization',
            data: [10, 15, 12, 7],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
    };
    var config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };

    var employeeDistributionChart = new Chart(
        document.getElementById('technicianSpecialization'),
        config
    );
</script>

<script>
    // Retrieve and set all counts
    getData('http://localhost/assetpro/stats/all/', (data) => {
        console.log(data);
        document.getElementById('allEmployees').innerHTML = data.allEmployees;
        document.getElementById('allTechnicians').innerHTML = data.allTechnicians;
        document.getElementById('allDepartments').innerHTML = data.allDepartments;
    });
</script>