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
    <title>Dashboard</title>
    <style>
        .container{
            display: grid;
            grid-template-columns: 12.5vw 87.5vw;
            overflow: hidden;
            z-index: 0;
            
        }
        .container > div{
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
        .dashboardRight{
            display: grid;
            grid-template-rows: 12vh 88vh;
        }
        #centerSection > div:first-of-type{
            height: 82vh;
            overflow:hidden;
            padding: 20px;
            background-color: #F1F4FF;
        }
        /* Scrollbar styling */
        .scrollBar{
            overflow-y: auto;
        }
        .scrollBar::-webkit-scrollbar-track{
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3) !important;
            background-color: #F5F5F5 !important;
        }

        .scrollBar::-webkit-scrollbar{
            width: 6px !important;
            background-color: #F5F5F5 !important;
        }

        .scrollBar::-webkit-scrollbar-thumb
        {
            background-color: #5C6E9B !important;
        }

    </style>
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
                switch ($_SESSION['userType']) {
                    case 'admin':
                        include_once("includes/Admin/overview.php");
                        break;
                    case 'employee':
                        include_once("includes/employee/overview.php");
                        break;
                    
                    case 'technician':
                        include_once("includes/technician/overview.php");
                        break;
                    case 'assetManager':
                        include_once("includes/assetManager/overview.php");
                        break;
                }
                ?>
            </div>
        </div>
        
        
    </div>
    <script>
        evaluateJs('centerSection');
       function getCount(type,id){
           var count = 0 ; 
            const xhr = new XMLHttpRequest();
            xhr.open("GET",`../model/Asset.php?action=getCount&type=${type}`,true);

            xhr.onload = function(){
                if(this.status === 200){
                    
                    document.getElementById(id).innerHTML = this.responseText;
                    // switch (type) {
                    //     case 'allAssets':
                    //         document.getElementById('allAssetsCount').innerHTML = this.responseText;
                    //         break;
                    //     case 'allEmployees':
                    //         document.getElementById('allEmployeesCount').innerHTML = this.responseText;
                    //         break;
                    //     case 'allTechnicians':
                    //         document.getElementById('allTechniciansCount').innerHTML = this.responseText;
                    //         break;
                    
                    //     default:
                    //         break;
                    // }
                    
                }
                return count;
            }
            xhr.send();

        }


        function getAll(type , table){
            const tb = document.getElementById(table);
            const xhr = new XMLHttpRequest();
            xhr.open('GET',`../model/Employee.php?action=${type}`,true);
            xhr.onload = function(){
                const res = JSON.parse(this.responseText);
                console.log(res);
                switch (type) {
                    case 'allTechnicians':
                        for(var i=0; i < res.length ; i++){
                            var row = `
                                <tr id=${res[i].UserID}>
                                    <td>${i+1}</td>
                                    <td>${res[i].EmployeeID}</td>
                                    <td>${res[i].name}</td>
                                    <td>${res[i].Gender == 'F' ? "Female" : "Male"}</td>
                                    <td><div class='btnAction'>View</div></td>
                                </tr>
                            `;
                            tb.innerHTML += row;
                        }
                        break;
                
                    case 'allEmployees':
                        for(var i=0; i < res.length ; i++){
                            var row = `
                                <tr id=${res[i].UserID}>
                                    <td>${i+1}</td>
                                    <td>${res[i].EmployeeID}</td>
                                    <td>${res[i].name}</td>
                                    <td>${res[i].Gender == 'F' ? "Female" : "Male"}</td>
                                    <td><div class='btnAction'>View</div></td>
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
    function getCookieValue(name){
        return document.cookie.match('(^|;)\\s*' + name + '\\s*=\\s*([^;]+)')?.pop() || '';
    }

    
    </script>
</body>
</html>