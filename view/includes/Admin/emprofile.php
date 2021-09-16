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
        margin-left: -12vh;
        margin-top: -30vh;
        font-size: 24px;
    }
</style>

<form action="">
    <div id="emprofile" class="profile">
        <div id="pLeft">
            <div class="profile-pic-div">
                <img src="../Images/addImage.png" alt="photo here">
                <input type="file" id="file">
            </div>
            <h2>Basic Information:</h2>

        </div>
        <div id="pRight">
            <p>bpah</p>
            <button type="submit">Click me</button>
        </div>
    </div>
</form>