

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
        padding-top: 15px;
    }
    #logo > img{

        max-width: 100px;
        height: auto;
    }
    #components{
        overflow-y: scroll;
        overflow-x: hidden;
        
    }
    /* #components::-webkit-scrollbar-thumb {
        border-radius: 100px;
        background: #8070D4;
        border: 6px solid rgba(0,0,0,0.2);
    } */
    #components::-webkit-scrollbar{
        display: none;
     }

     /* #components::-webkit-scrollbar-track{
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
    }

    #components::-webkit-scrollbar
    {
        width: 6px;
        background-color: #F5F5F5;
    }

    #components::-webkit-scrollbar-thumb{
        background-color: #000000;
    } */
    .component{
        
        margin: 5px 0px 5px 0px;
        padding: 5px;
        width: 100%;
        text-align: center;
    }
    .component div{
        
        text-align: center;
        margin: 10px;
    }
    .component img{
        max-width: 20px;
    }
    .componentText{
        color: #929292;
        font-size: 20px;
    }
    .component:hover{
        cursor: pointer;
        
    }
    .selectedComponent{
        /* border: 1px solid green; */
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
    #logout{
        
        display: flex;
        justify-content: center;
        align-items: center;
        
        

    }
    #logout > div{
        background-color: #304068;
        padding: 10px 30px;
        color: white;
        border-radius: 20px;

    }
    #logout > div:hover{
        cursor: pointer;
    }
    #logout > div:c{
        cursor: pointer;
    }
    
</style>


<div class="navWrapper">
    <div id="logo">
        <img src="../Images/AssetProLogo.png" alt="">
    </div>
    <div id="components">

        <!-- Dashboard component -->
        <div class='component selectedComponent' id='dashboard'>
            <img src='../Images/Selected/Dashboard.png' >
            <div class='componentText selectedBtn' >Dashboard</div>
        </div>
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



                break;
            default:
                # code...
                break;
        }
    ?>
        
    </div>
    <div id="logout">
        <div id="btnLogout">Log Out</div>
    </div>
</div>

<script> 
    //Components event listener

    var components = document.getElementById("components");
    components.addEventListener("click", (event)=> {
        // event.preventDefault();
        var eventId = event.path[1].id;
        console.log(eventId);
        setFocus(eventId);
        loadSection(eventId);        
    });

    function loadSection(sectionId){

    }
    function setFocus(id){
        var components = document.getElementById("components").querySelectorAll(".component");
        components.forEach(item =>{
            var imageSrc = item.querySelector("img").src;
            var filename = imageSrc.replace(/^.*[\\\/]/, '');
            var path = "../Images/";
            if(id == item.querySelector("img").parentNode.id){
                item.querySelector("img").src = path+"Selected/"+filename;
                item.querySelector(".componentText").classList.remove("unselectedBtn");
                item.querySelector(".componentText").classList.add("selectedBtn");
                item.classList.add("selectedComponent");
                console.log(item)
            }else{
                item.querySelector("img").src = path+"NotSelected/"+filename;
                item.querySelector(".componentText").classList.remove("selectedBtn");
                item.querySelector(".componentText").classList.add("unselectedBtn");
                item.classList.remove("selectedComponent");
            }
        })
    }

    //Logout button event listener
    var btnLogout = document.getElementById("btnLogout");
    btnLogout.addEventListener("click",()=>{
        console.log("logout")
    })
</script>


