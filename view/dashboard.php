<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/index.js"></script>
    <script src="../js/assetmanager.js"></script>
    <script src="../js/admin.js"></script>
    <script src="../js/employee.js"></script>
    <script src="../js/technician.js"></script>
    <script src="../js/hod.js"></script>
    <title>Dashboard</title>
    <style>
        .container {
            display: grid;
            grid-template-columns: 12.5vw 87.5vw;
            overflow: hidden;
            z-index: 0;

        }

        .container>div {
            width: 100%;
            height: 100%;
            margin: 0px;
            padding: 0px;
        }

        #headerDiv {
            border: none;
            border-left: 4px solid #F1F4FF;
            margin: 0;
            padding: 0;
        }

        .dashboardRight {
            display: grid;
            grid-template-rows: 12vh 88vh;
        }

        #centerSection>div:first-of-type {
            height: 82vh;
            overflow: hidden;
            padding: 20px;
            background-color: #F1F4FF;
        }

        /* Scrollbar styling */
        .scrollBar {
            overflow-y: auto;
        }

        .scrollBar::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3) !important;
            background-color: #F5F5F5 !important;
        }

        .scrollBar::-webkit-scrollbar {
            width: 6px !important;
            background-color: #F5F5F5 !important;
        }

        .scrollBar::-webkit-scrollbar-thumb {
            background-color: #5C6E9B !important;
        }
    </style>
    <script>
        getCount(); 
    </script>
</head>

<body>
    <div class="container">
        <div id="dashboardLeft">
            <?php
            include_once("includes/leftNav.php");
            ?>
        </div>
        <div class="dashboardRight">
            <div id="headerDiv">
                <?php
                include_once("includes/header.php")
                ?>
            </div>
            <div id="centerSection">
                <?php
                // Adding the relevant overview section related to the user and role
                switch ($_SESSION['RoleID']) {
                    case '1':
                        include_once("includes/Admin/overview.php");
                        break;
                    case '3':
                        include_once("includes/employee/overview.php");
                        break;

                    case '4':
                        include_once("includes/technician/overview.php");
                        break;
                    case '2':
                        include_once("includes/assetManager/overview.php");
                        break;
                }
                ?>
            </div>
        </div>


    </div>
    <script>
        evaluateJs('centerSection');

        


        function getAll(type, table) {
            const tb = document.getElementById(table);
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `../model/Employee.php?action=${type}`, true);
            xhr.onload = function() {
                const res = JSON.parse(this.responseText);
                console.log(res);
                switch (type) {
                    case 'allTechnicians':
                        for (var i = 0; i < res.length; i++) {
                            var row = `
                                <tr id=${res[i].UserID}>
                                    <td>${i+1}</td>
                                    <td>TECH/${res[i].TechnicianID}</td>
                                    <td>${res[i].name}</td>
                                    <td>${res[i].Gender}</td>
                                    <td><button class='btn btn-assign'>View</button></td>
                                </tr>
                            `;
                            tb.innerHTML += row;
                        }
                        break;

                    case 'allEmployees':
                        for (var i = 0; i < res.length; i++) {
                            var row = `
                                <tr id=${res[i].UserID}>
                                    <td>${i+1}</td>
                                    <td>EMP/${res[i].EmployeeID}</td>
                                    <td>${res[i].Name}</td>
                                    <td>${res[i].Gender}</td>
                                    <td><div class='btn btn-assign'>View</div></td>
                                </tr>
                            `;
                            tb.innerHTML += row;
                        }
                        break;

                    default:
                        break;
                }

            }
            xhr.send();
        }

        // Read a cookie value
        function getCookieValue(name) {
            return document.cookie.match('(^|;)\\s*' + name + '\\s*=\\s*([^;]+)')?.pop() || '';
        }
    </script>
</body>

</html>