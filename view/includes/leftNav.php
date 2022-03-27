<style>
    body {
        padding: 0;
        margin: 0;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        /* overflow: hidden; */
    }

    .navWrapper {
        width: 10vw;
        height: 100vh;
        display: grid;
        grid-template-rows: 2fr 8fr;
        background-color: #304068;
        padding-right: 0px;
    }

    #logo {
        text-align: center;
        padding-top: 15px;
    }

    #logo > img {
        max-width: 120px;
        height: auto;
    }

    #components {
        overflow-y: hidden;
        overflow-x: hidden;
        margin-bottom: 10px;
        margin-right: 0px;
        padding-right: 0px;
        /* background-color: white; */
        /* box-shadow: 0 2px 5px rgba(128, 128, 128, 0.5); */

    }

    /* #components::-webkit-scrollbar-thumb {
        border-radius: 100px;
        background: #eaedf5;
        border: 6px solid rgba(0,0,0,0.2);
    } */
    /* #components::-webkit-scrollbar{
        display: none;
     } */

    /* #components::-webkit-scrollbar-track{
       -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
       background-color: #F5F5F5;
   }

   #components::-webkit-scrollbar
   {
       width: 6px;
       background-color: #F5F5F5;
   } */

    /* #components::-webkit-scrollbar-thumb{
        background-color: #000000;
    } */
    .component {
        margin: 20px 0px 5px 15px;
        padding: 10px 5px;
        /* width: 80%; */
        text-align: center;
        height: 30px;
        /* border: 1px solid red; */
        display: flex;
        justify-content: flex-start;
        align-items: center;
        right: 0px;

    }

    .component span {
        margin-left: 5px;
        z-index: 5;
        display: inline-flex;
        align-items: center;
        font-size: 14px;
        height: 30px;
        width: fit-content;
        text-align: left;
    }

    .component img {
        display: inline-flex;
        width: 25px;
        margin-left: 10px;
        margin-right: 5px;
    }

    .componentText {
        color: #F1F4FF;
        font-size: 20px;
    }

    .component:hover {
        cursor: pointer;

    }

    .selectedComponent {
        /* z-index: -5; */
        position: relative;
        /* border: 1px solid green; */
        background-color: #F1F4FF;
        border-radius: 25px 0px 0px 25px;
    }

    .selectedComponent::before {
        z-index: 0;
        content: "";
        position: absolute;
        width: 50px;
        height: 50px;
        background-color: transparent;
        right: 0;
        top: -50px;
        border-bottom-right-radius: 25px;
        box-shadow: 0 25px 0 0 #F1F4FF;
    }

    .selectedComponent::after {
        content: "";
        position: absolute;
        width: 50px;
        height: 50px;
        background-color: transparent;
        right: 0;
        bottom: -50px;
        border-top-right-radius: 25px;
        box-shadow: 0 -25px 0 0 #F1F4FF;
    }

    /* .component::selection{
        color: #FFA712;
    } */
    .components a {
        text-decoration: none;

    }

    .selectedBtn {
        color: #304068;
        font-weight: bolder;
    }

    .unselectedBtn {
        color: #929292;
    }

    #logout {

        display: flex;
        justify-content: center;
        align-items: center;
    }

    #logout > div {
        background-color: #304068;
        padding: 10px 30px;
        color: white;
        border-radius: 20px;

    }

    #logout > div:hover {
        cursor: pointer;
    }

    #logout > div:c {
        cursor: pointer;
    }

</style>

<div class="navWrapper">
    <div id="logo">
        <img src="../Images/AssetProLogo.png" alt="">
    </div>
    <div id="components">

        <!-- Dashboard component -->
        <div class='component selectedComponent' id='overview'>
            <img src='../Images/icons/Selected/dashboard.png'>
            <span class='componentText selectedBtn'>Dashboard</span>
        </div>
        <?php
        switch ($_SESSION['RoleID']) {
            case '1':
                //Employees
                echo "<div class='component' id='employees'>
                    <img src='../Images/icons/NotSelected/employees.png' >
                    <span class='componentText'>Staff</span>
                </div>";

                //Technicians
                echo "<div class='component' id='technicians'>
                    <img src='../Images/icons/NotSelected/technician.png' >
                    <span class='componentText'>Technicians</span>
                </div>";

                //Department head
                echo "<div class='component' id='dhead'>
                    <img src='../Images/icons/NotSelected/dh.png' >
                    <span class='componentText'>Department head</span>
                </div>";

                //Departments
                echo "<div class='component' id='departments'>
                    <img src='../Images/icons/NotSelected/department.png' >
                    <span class='componentText'>Departments</span>
                </div>";

                //Assigned assets
                echo "<div class='component' id='assignedAssets'>
                    <img src='../Images/icons/NotSelected/assignedassets.png' >
                    <span class='componentText'>Assigned Assets</span>
                </div>";


                break;

            case '3':

                //Assigned Assets
                echo "<div class='component' id='assignedAssets'>
                    <img src='../Images/icons/NotSelected/Assets.png' >
                    <span class='componentText'>Assigned assets</span>
                </div>";

                //Reported Breakdowns
                echo "<div class='component' id='reportedBreakdown'>
                    <img src='../Images/icons/NotSelected/reportedBreakdowns.png' >
                    <span class='componentText'>Reported Breakdowns</span>
                </div>";

                break;

            //Technician
            case '4':

                //Assigned Breakdowns
                echo "<div class='component' id='assets'>
                    <img src='../Images/icons/NotSelected/Breakdowns.png' >
                    <span class='componentText'>Breakdowns</span>
                </div>";

                //Repaired Assets
                echo "<div class='component' id='repairedAssets'>
                    <img src='../Images/icons/NotSelected/broken.png' >
                    <span class='componentText'>Repaired Assets</span>
                </div>";

                //Assigned Assets
                echo "<div class='component' id='assignedAssets'>
                    <img src='../Images/icons/NotSelected/assignedassets.png' >
                    <span class='componentText'>Assigned assets</span>
                </div>";


                break;

            //Asset Manager
            case '2':

                //Assets
                echo "<div class='component' id='assets'>
                    <img src='../Images/icons/NotSelected/Assets.png' >
                    <span class='componentText'>Assets</span>
                </div>";

                //Employees
//                echo "<div class='component' id='employees'>
//                    <img src='../Images/icons/NotSelected/Employees.png' >
//                    <span class='componentText'>Employees</span>
//                </div>";
//
                //Department head
                echo "<div class='component' id='departmentHeads'>
                    <img src='../Images/icons/NotSelected/dh.png' >
                    <span class='componentText'>Department Heads</span>
                </div>";

                //Departments
                echo "<div class='component' id='departments'>
                    <img src='../Images/icons/NotSelected/department.png' >
                    <span class='componentText'>Departments</span>
                </div>";

//                //Technicians
//                echo "<div class='component' id='technicians'>
//                    <img src='../Images/icons/NotSelected/Technician.png' >
//                    <span class='componentText'>Technicians</span>
//                </div>";

                //Disposals
                echo "<div class='component' id='disposals'>
                    <img src='../Images/icons/NotSelected/disposal.png' >
                    <span class='componentText'>Disposals</span>
                </div>";

                //Reported Breakdowns
                echo "<div class='component' id='reportedBreakdown'>
                    <img src='../Images/icons/NotSelected/reportedBreakdowns.png' >
                    <span class='componentText'>Reported Breakdowns</span>
                </div>";

                //Reports
                echo "<div class='component' id='reports'>
                    <img src='../Images/icons/NotSelected/report.png' >
                    <span class='componentText'>Reports</span>
                </div>";

                //Assigned assets
                echo "<div class='component' id='assignedAssets'>
                    <img src='../Images/icons/NotSelected/assignedassets.png' >
                    <span class='componentText'>Assigned Assets</span>
                </div>";


                break;

            case '5':
                //Employees
                echo "<div class='component' id='employees'>
                        <img src='../Images/icons/NotSelected/employees.png' >
                        <span class='componentText'>Staff</span>
                    </div>";

                //Assets
                echo "<div class='component' id='assets'>
                        <img src='../Images/icons/NotSelected/assets.png' >
                        <span class='componentText'>Assets</span>
                    </div>";

                //Assigned assets
                echo "<div class='component' id='assignedAssets'>
                        <img src='../Images/icons/NotSelected/assignedassets.png' >
                        <span class='componentText'>Assigned Assets</span>
                    </div>";

                //Assigned assets
                echo "<div class='component' id='reports'>
                        <img src='../Images/icons/NotSelected/report.png' >
                        <span class='componentText'>Reports</span>
                    </div>";

                //Breakdown
                echo "<div class='component' id='reportedBreakdown'>
                    <img src='../Images/icons/NotSelected/reportedBreakdowns.png' >
                    <span class='componentText'>Breakdowns</span>
                    </div>";

                break;
            default:
                # code...
                break;
        }
        ?>
    </div>

</div>

<script>

    //Components event listener
    var components = document.getElementById("components");
    components.addEventListener("click", (event) => {
        // event.preventDefault();
        var eventId = event.path[1].id;
        if (eventId !== 'components') {
            setFocus(eventId);
            loadSection("centerSection", eventId);
        }
    });

    //Loading the sections on left nav clicks with AJAX

    function loadSection(sectionId, eventId, params) {
        params = params || null;
        var section = document.getElementById(sectionId);
        const xhr = new XMLHttpRequest();

        xhr.open('GET', `http://localhost/assetpro/view/${eventId}`, true);
        xhr.setRequestHeader("Content-type", "text/javascript");
        xhr.onload = function () {
            if (this.status === 200) {
                section.innerHTML = this.responseText;
                evaluateJs(sectionId);
            }

        }
        xhr.send();
    }

    //Evalute the js code coming from the AJAX requests and appending them to DOM as scripts

    function evaluateJs(sectionId) {
        removeScript(sectionId);
        scripts = document.getElementById(sectionId).querySelectorAll('script');

        for (var n = 0; n < scripts.length; n++) {
            var script = document.createElement("script");
            script.type = "text/javascript";
            script.className = `${sectionId}Script`;
            script.innerHTML = scripts[n].innerHTML;
            document.getElementsByTagName('head')[0].appendChild(script);

        }
    }

    //Removing the dynamically added scripts

    function removeScript(sectionId) {
        const scripts = document.querySelectorAll(`.${sectionId}Script`);
        for (var n = 0; n < scripts.length; n++) {
            scripts[n].remove();
        }
    }

    // setting the colored icon and text on the navigation on click
    function setFocus(id) {
        var components = document.getElementById("components").querySelectorAll(".component");
        components.forEach(item => {
            var imageSrc = item.querySelector("img").src;
            console.log(imageSrc);
            var filename = imageSrc.replace(/^.*[\\\/]/, '');
            console.log(filename);
            var path = "../Images/icons/";
            if (id == item.querySelector("img").parentNode.id) {
                item.querySelector("img").src = path + "Selected/" + filename;
                // item.querySelector(".componentText").classList.remove("unselectedBtn");
                item.querySelector(".componentText").classList.add("selectedBtn");
                item.classList.add("selectedComponent");
            } else {
                item.querySelector("img").src = path + "NotSelected/" + filename;
                item.querySelector(".componentText").classList.remove("selectedBtn");
                // item.querySelector(".componentText").classList.add("unselectedBtn");
                item.classList.remove("selectedComponent");
            }
        })
    }

    //Logout button event listener
    // var btnLogout = document.getElementById("btnLogout");
    // if(btnLogout){
    //     btnLogout.addEventListener("click",()=>{
    //         window.location.replace("../controller/mainController.php?action=logout");
    //     })
    // }
</script>


