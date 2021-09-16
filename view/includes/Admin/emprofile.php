<style>
    .profile {
        display: grid;
        height: 82vh;
        width: 87.5vw;
        grid-template-columns: 1fr 1fr;
        margin: 10px;
        padding: 5px;
        background-color: #F1F4FF;

    }

    .profile>div {
        width: auto;
        height: auto;
        margin: 15px;
        background-color: white;
        border-radius: 10px;
        padding: 10px;

    }

    #pLeft {
        display: grid;
        grid-template-rows: 4fr 6fr;
        justify-content: center;
        align-items: center;
    }

    #pLeft>div {
        height: 100%;
        width: 100%;
    }

    #pLeft>img {
        width: 225px;
        border-radius: 50%;
        background-color: red;
    }

    #pRight {
        /* margin-left: 5px; */
    }
</style>

<div id="emprofile" class="profile">
    <div id="pLeft">
        <div class="formBx">
            <form action="">
                <span>Basic Information</span>
                <div class="inputBx">
                    <span>Employee ID</span>
                    <input type="text">
                </div>
                <div class="inputBx">
                    <span>Department ID</span>
                    <input type="text">
                </div>
                <div class="inputBx">
                    <span>First Name</span>
                    <input type="text">
                    <span>Last Name</span>
                    <input type="text">
                </div>
                <div class="radioBx">
                    <span>Gender</span>
                      <input type="radio" name="gender" value="Male">
                      <label for="Male">Male</label>
                      <input type="radio" name="gender" value="Female">
                      <label for="Female">Female</label>
                </div>
            </form>
        </div>
    </div>
    <div id="pRight">

    </div>
</div>