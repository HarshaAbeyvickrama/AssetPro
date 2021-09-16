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
        background-color: white;
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
        display: grid;
        grid-template-rows: 4fr 6fr;
        justify-content: center;
        align-items: center;
        background-color: white;
    }

    .profile-pic-div img {
        width: 200px;
        height: 200px;
        margin-top: 5vh;
        text-align: center;
    }

    h2 {
        margin-left: -30vh;
        margin-top: -30vh;
        font-size: 24px;
        color: #304068;
    }

    #file {
        display: none;
    }

    #uploadBtn {
        height: 40px;
        width: 100%;
        margin-left: -18vh;
        background: rgba(0, 0, 0, 0.7);
        color: #F1F4FF;
    }
    h4 {
        margin-top: -20vh;
    }

</style>

<form action="">
    <div id="emprofile" class="profile">
        <div id="pLeft">
            <div class="profile-pic-div">
                <img src="../Images/addImage.png" alt="photo here" id="photo">
                <input type="file" id="file">
                <label for="file" id="uploadBtn">Choose Image</label>
            </div>
            <h2>Basic Information:</h2>
            <h4>Employee ID:</h4>
            <input type="text">
            <div class="name">
                <h4 class="name">First Name:</h4>
                <input type="text" class="empId" name="employee ID">
                <h4 class="name">Last Name:</h4>
                <input type="text" class="empId" name="employee ID">
            </div>
            <h4>Role:</h4>
            <input type="text">
            <h4>Gender:</h4>
            <label class="radio">
                <input type="radio" class="radio">
                <span class="radio-one"></span>
                Male
            </label>
            <label class="radio">
                <input type="radio" class="radio">
                <span class="radio-two"></span>
                Female
            </label>

        </div>
        <div id="pRight">
            <p>bpah</p>
            <button type="submit">Click me</button>
        </div>
    </div>
