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
        grid-template-columns: 50% 25% 25%;
        grid-template-rows: 50% 50%;
        gap: 18px;
    }
    .wrapper > div{
        background: white;
        padding: 1em;
        border-radius: 15px;
    }

    .box3 {
       grid-row: 1/3;
    }

    .image img{
        width: 60px;
        height: 60px;
    }


</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="wrapper">
    <!-- Box 1 -->
    <div class="box1">
        <div class="image">
            <img src="../Images/icons/employees.png">
        </div>
        <div class="title">Employees</div>
        <div class="count">c</div>
    </div>

    <!-- Box 2 -->
    <div>
        <div class="image">
            <img src="../Images/icons/technicians.png" alt="" width="60px" height="60px">
        </div>
        <div class="title">Technicians</div>
        <div class="count">c</div>
    </div>
    <!-- Box 3-->
    <div class = "box3">
        <div class="image">
            <img src="../Images/icons/departments.png" alt="" width="60px" height="60px">
        </div>
        <div class="title">Departments</div>
        <div class="count">c</div>
    </div>

    <!-- Box 4 -->
    <div>
        4
    </div>

    <!-- Box 5 -->
    <div class="box-5">
        5
    </div>

    


</div>


</script>