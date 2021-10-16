<style>
    .overviewLayout{
        display: grid;
        grid-template-rows: 0.75fr 1.5fr 0.75fr 7fr ;
        height: 82vh;
        width: 87.5vw;
        overflow-y: auto;
        padding: 20px;
        background-color: #F1F4FF;
    }
    
    .overviewLayout > div{
        display: flex;
        align-items: center;
        color: #304068;
        font-size: 24px;
        font-weight: bold;
        
    }
    
    .contentSection{
        background-color: white;
        border-radius: 15px;
        padding:15px;
    }

    /*inside the content section*/
    .container{     
        width:100%;
        height:100%;
        display:grid;
        grid-template-columns:1fr 1fr 2fr 1fr;
        
    }
   
   
</style>
<div class="overviewLayout">
    
    <div>
    <div>Recent Activities</div>
    </div>

    <div class="contentSection">
        <div class="container"> 
                 <div>
                     <h5> Number </h5>
                     <p> 1 </p>
                     <p> 2 </p>
                     <p> 3 </p>
                     <p> 4 </p>
                     <p> 5 </p>
                 </div>

                 <div>
                     <h5> Asset ID </h5>
                     <p> FA/12345 </p>
                     <p> FA/12345 </p>
                     <p> FA/12345 </p>
                     <p> FA/12345 </p>
                     <p> FA/12345 </p>
                 </div>

                 <div>
                     <h5> Error ID </h5>
                     <p> D/FA/ 12345 </p>
                     <p> D/FA/ 12345 </p>
                     <p> D/FA/ 12345 </p>
                     <p> D/FA/ 12345 </p>
                     <p> D/FA/ 12345 </p>
                 </div>
                 
                 <div>
                     <h5> Asset Name </h5>
                     <p> Asset Name here </p>
                     <p> Asset Name here </p>
                     <p> Asset Name here </p>
                     <p> Asset Name here </p>
                     <p> Asset Name here </p>
                 </div>

                 <div>
                     <h5> Last repaired </h5>
                     <p> 2021/02/20 </p>
                     <p> 2020/04/10 </p>
                     <p> 2020/03/08 </p>
                     <p> 2020/02/12 </p>
                     <p> 2019/05/24 </p>
                 </div>

                 <div>
                     <h5> Technician </h5>
                     <p> Dinithi Upeksha </p>
                     <p> Nayana Kalhara </p>
                     <p> Awantha Kanakarathnam </p>
                     <p> Kasun Chamika </p>
                     <p> Muzni Ahamed </p>
                 </div>

                 <div>
                     <h5> MTTR </h5>
                     <p> 2 days </p>
                     <p> 3 days </p>
                     <p> 7 days </p>
                     <p> 1 days </p>
                     <p> 5 days </p>
                 </div>
                 
                 <div>
                     <h5> Cost (Rs) </h5>
                     <p> 10,000</p>
                     <p> 15,050 </p>
                     <p> 42,560 </p>
                     <p> 2,500 </p>
                     <p> 14,980 </p>
                 </div>


        </div>
        
    </div>
</div>
