

<style>
    body{
        padding: 0;
        margin: 0;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        /* overflow: hidden; */
    }
    .navWrapper{
        width: 10vw;
        height: 100vh;
        display: grid;
        grid-template-rows: 2fr 7fr 1fr;
         
      
    }
    
    #logo{
        text-align: center;
    }
    #logo > img{
        max-width: 150px;
        height: auto;
    }
    #components{
        
        overflow-y: scroll;
        overflow-x: hidden;
        
    }
    #components::-webkit-scrollbar{
        /* display: none; */
    }
    .component{
        
        margin: 5px 0px 5px 0px;
        padding: 5px;
        width: 100%;
        text-align: center;
    }
    .component div{
        /* justify-content: center  ; */
        /* align-items: center; */
        text-align: center;
        margin: 10px;
    }
    .component img{
        max-width: 30px;
    }
    .componentText{
        font-size: 24px;
    }
    .component:hover{
        cursor: pointer;
        
    }
    .component::selection{
        color: #FFA712;
    }
    .components a{
        text-decoration: none;
        
    }
    .selectedBtn{
        color: #FFA712;
    }
    .unselectedBtn{
        color: #929292;
    }
    #logoutBtn{
        
        display: flex;
        justify-content: center;
        align-items: center;
        
        

    }
    #logoutBtn > div{
        background-color: #304068;
        padding: 10px 30px;
        color: white;
        border-radius: 20px;

    }
    #logoutBtn > div:hover{
        cursor: pointer;
    }
    #logoutBtn > div:c{
        cursor: pointer;
    }
    
</style>


<div class="navWrapper">
    <div id="logo">
        <img src="../Images/AssetProLogo.png" alt="">
    </div>
    <div id="components">

        <!-- Dashboard component -->
        <div class='component' id='dashboard'>
            <div class='componentIcon' id='dashboard'>
                <img src='../Images/Selected/Dashboard.png' >
            </div>
            <div class='componentText selectedBtn' >Dashboard</div>
        </div>";
    <?php
        switch ($_SESSION['userType']) {
            case 'admin':
                //Employees
                echo "<div class='component' id='employees'>
                    <img src='../Images/NotSelected/Employees.png' >
                    <div class='componentText'>Employees</div>
                </div>";

                //Technicians
                echo "<div class='component' id='technicians'>
                    <img src='../Images/NotSelected/Technicians.png' >
                    <div class='componentText'>Technicians</div>
                </div>";


                break;

            case 'employee':

                //Assigned Assets
                echo "<div class='component' id='assignedAssets'>
                    <img src='../Images/NotSelected/Assets.png' >
                    <div class='componentText'>Assigned Assets</div>
                </div>";

                //Reported Breakdowns
                echo "<div class='component' id='reportedBreakdown'>
                    <img src='../Images/NotSelected/Breakdowns.png' >
                    <div class='componentText'>Reported Breakdowns</div>
                </div>";

                break;

            //Technician
            case 'technician':
                
                //Assigned Assets
                echo "<div class='component' id='assignedAssets'>
                    <img src='../Images/NotSelected/Assets.png' >
                    <div class='componentText'>Assigned Assets</div>
                </div>";

                //Repaired Assets
                echo "<div class='component' id='repairedAssets'>
                    <img src='../Images/NotSelected/Assets.png' >
                    <div class='componentText'>Repaired Assets</div>
                </div>";

                break;

            //Asset Manager
            case 'assetManager':
                
                //Assets
                echo "<div class='component' id='assets'>
                    <img src='../Images/NotSelected/Assets.png' >
                    <div class='componentText'>Assets</div>
                </div>";

                //Employees
                echo "<div class='component' id='employees'>
                    <img src='../Images/NotSelected/Employees.png' >
                    <div class='componentText'>Employees</div>
                </div>";

                //Technicians
                echo "<div class='component' id='technicians'>
                    <img src='../Images/NotSelected/Technicians.png' >
                    <div class='componentText'>Technicians</div>
                </div>";
                    
                //Disposals
                echo "<div class='component' id='disposals'>
                    <img src='../Images/NotSelected/Disposals.png' >
                    <div class='componentText'>Disposals</div>
                </div>";
                    
                //Reported Breakdowns
                echo "<div class='component' id='reportedBreakdown'>
                    <img src='../Images/NotSelected/Breakdowns.png' >
                    <div class='componentText'>Reported Breakdowns</div>
                </div>";

                //Reports
                echo "<div class='component' id='reports'>
                    <img src='../Images/NotSelected/Reports.png' >
                    <div class='componentText'>Reports</div>
                </div>";
                //Reported Breakdowns
                echo "<div class='component' id='reportedBreakdown'>
                    <img src='../Images/NotSelected/Breakdowns.png' >
                    <div class='componentText'>Reported Breakdowns</div>
                </div>";

                //Reports
                echo "<div class='component' id='reports'>
                    <img src='../Images/NotSelected/Reports.png' >
                    <div class='componentText'>Reports</div>
                </div>";


                break;
            default:
                # code...
                break;
        }
    ?>
        
    </div>
    <div id="logoutBtn">
        <div>Log Out</div>
    </div>
</div>

<script> 
    //Components event listener

    var components = document.getElementById("components");
    components.addEventListener("click", (event)=> {
        // event.preventDefault();
        var eventId = event.path[1].id;
        console.log(eventId);
        changeImage(eventId);
        loadSection(eventId);        
    });

    function loadSection(sectionId){

    }
    function changeImage(id){
        var components = document.getElementById("components").querySelectorAll(".component");
        components.forEach(item =>{
            var imageSrc = item.querySelector("img").src;
            var filename = imageSrc.replace(/^.*[\\\/]/, '');
            var path = "../Images/";
            if(id == item.querySelector("img").parentNode.id){
                item.querySelector("img").src = path+"Selected/"+filename;
                item.querySelector(".componentText").classList.remove("unselectedBtn");
                item.querySelector(".componentText").classList.add("selectedBtn");
            }else{
                item.querySelector("img").src = path+"NotSelected/"+filename;
                item.querySelector(".componentText").classList.remove("selectedBtn");
                item.querySelector(".componentText").classList.add("unselectedBtn");
            }
        })
    }
</script>


