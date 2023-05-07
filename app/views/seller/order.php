<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>

<!-- ---------------------------------------------------------------------- -->

<style>


/* -------------------------------------------------------------- */
/* ----------------------------Tab Menue css--------------------- */
/* -------------------------------------------------------------- */

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.tabscontainer{
    width: 1000px;
    padding: 30px;
    box-shadow: 0 2px 16px rgba(0, 0, 0, .1);
    border-radius: 20px;
    margin: 30px auto;
}

.tab_box{
    width: 100%;
    display: flex;
    justify-content: space-around;
    align-items: center;
    border-bottom: 2px solid green;position: relative;
}

.tab_box .tab_btn{
    font-size: 18px;
    font-weight: 600;
    color: #919191;
    background: none;
    border: none;
    padding: 18px;
    cursor: pointer;
}

.tab_box .tab_btn.active{
    color: #7360ff;
}

.content_box{
    padding: 20px;
    display: contents;
}

.content_box .content{
    display: none;
    animation: moving .5s ease;
}

@keyframes moving {
    from{transform: translate(50px);opacity: 0;}
    to{transform: translate(0px);opacity: 1;}
}

.content_box .content.active{
    display: block;
    padding: 30px;
}

.content_box .content h2{
    margin-bottom: 10px;
}

.line{
    position: absolute;
    top: 55px;
    left: 29px;
    width: 149px;
    height: 5px;
    background-color: #7360ff;
    border-radius: 10px;
    transition: all .3s ease-in-out;
}





/* -------------------------------------------------------------- */
/* ----------------------------Table css------------------------- */
/* -------------------------------------------------------------- */


.div1 {
    height: 50px;
    width: 900px;
    margin-left:auto; 
    margin-right:auto;
    /* box-shadow: 2px 2px 12px rgba(0,0,0,0.2), -1px -1px 8px rgba(0, 0, 0, 0.2); */
}

.tb1, .tb2 {
    table-layout: fixed;
    text-align: center;
    width: 900px;
    height: 50px;
    box-shadow: 2px 2px 12px rgba(0,0,0,0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
}

.div2 {
    margin-top: 2px;
    height: 300px;
    width: 900px;
    overflow: auto;
    overflow-x: hidden;
    margin-left:auto; 
    margin-right:auto;
    box-shadow: 2px 2px 12px rgba(0,0,0,0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
}

#tbl2{
    margin-top: 2px;
}

td {
    text-align: center;
    height: 50px;
    border-bottom: 0.1px solid #E5E4E2;
}

.or_btn {
    width: 75px;
    height: 22px;
    border-radius: 5px;
    background: none;
    font-size: 10px;
}

#butn1 {
    border: 2px solid #1D976C;
    margin: 0px 20px;
}

#butn2 {
    border: 2px solid #F75D59;
    margin: 0px 20px;
}

#butn3 {
    border: 2px solid 	#0F52BA;
}

#butn1:hover {
    background-color: #1D976C;
    transform: scale(1.02);
    color: #FFFFFF;   
}

#butn2:hover {
    background-color: #F75D59;
    transform: scale(1.02);
    color: #FFFFFF;   
}

#butn3:hover {
    background-color: 	#0F52BA;
    transform: scale(1.02);
    color: #FFFFFF;   
}

/* tr:hover {
    background-color: rgba(255, 253, 253, 0.671);
    transform: scale(1.02);
    box-shadow: 2px 2px 12px rgba(0,0,0,0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
} */

.div2::-webkit-scrollbar {
    width: 10px;
}

.div2::-webkit-scrollbar-track {
    background: #FFFFFF;
    border-radius: 100vw;
}

.div2::-webkit-scrollbar-thumb {
    background: #1D976C;
    border-radius: 100vw;
    border: 3px solid #FFFFFF;
}





.popup { 
    width: 400px;
    box-shadow: 0 4px 30px rgba(255, 255, 255, 0.17);
    border-radius: 6px;
    position: absolute;
    top: 0;
    left: 50%;
    transform: translate(-50%, -50%) scale(0.1);
    padding: 0 30px 30px;
    color: #333;
    visibility: hidden;
    transition: transform 0.4s, top 0.4s;
    display: flex;

}

.open-popup {
    visibility: visible;
    top: 65.28%;
    width: 900px;
    height: 350px;
    transform: translate(-50%, -50%) scale(1);
    box-shadow: 0 4px 30px rgba(255, 255, 255, 0.4);
    backdrop-filter: blur(25px);
    z-index: 20;
    margin-left: 10px;
}

#msg_img {
    width: 347px;
    height: 347px;
    padding: 0px;
    opacity: 0.9;
    border-top-left-radius: 6px;
    border-bottom-left-radius: 6px;
}

.msg {
    flex-grow: 1;
    width: 750px;
    height: 347px;
    text-align: center;
}

.tblShow {
    visibility: hidden;
}

/* .back-popup {
    background: rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(25px);
    z-index: 50;
} */

span {
    font-size:100px;
    padding: 10px;
}

.text_msg{
    font-size: 14px;
}

#com_msg {
    padding: 15px 0px;
    font-size: 21px;
}

.order_con {
    width: 120px;
    height: 26px;
    margin: 40px;
    border-radius: 30px;
    background: none;
    color: #0e0e0e;
    font-size: 12px;
}

.order_con:hover {
    transform: scale(1.02);
    color: #FFFFFF;   
}

#b1 {
    border: 2px solid #1D976C;
}

#b2 {
    border: 2px solid #F75D59;
}

#b3 {
    border: 2px solid #0F52BA;
}

#b1:hover {
    background-color: #1D976C;
}

#b2:hover {
    background-color: #F75D59;
}

#b3:hover {
    background-color: #0F52BA;
}

#cancel_reason {
    display: flex;
    margin: auto;
    width: 375px;
    height: 38px;
    border: 1px solid #FFFFFF;
    background: none;
    border-radius: 10px;
    padding-left: 20px;
    font-size: 11px;
}

#cancel_reason:focus {
    outline: none; 
    caret-color: #FFFFFF; 
}


</style>

<!-- ---------------------------------------------------------------------- -->


<div class="tabscontainer">
        <div class="tab_box">
            <button class="tab_btn active">Order Detaila</button>
            <button class="tab_btn" id="con_btn">Conformed Orders</button>
            <button class="tab_btn" id="can_btn">Cancled Orders</button>
            <button class="tab_btn" id="com_btn">Completed Orders</button>
            <div class="line"></div>
        </div>
        <div class="content_box">
            <div class="content active">
                <div class="tbl" id="tbl">
                    <div class="div1">
                        <table class="tb1">
                            <tr id="header">
                                <th>Order Id</th>
                                <th>Product Name</th>
                                <th>Customer Name</th>
                                <th>Quantity</th>
                                <th>Order Date</th>
                                <th colspan="2">Conformation</th>
                            </tr>
                        </table>
                    </div>
                    <div class="div2">
                        <table class="tb2" id="tbl2">
                            <?php foreach($data['orderData'] as $orderData) : ?>
                                <tr>
                                    <td><?php echo $orderData -> wishlit_id; ?></td>
                                    <td><?php echo $orderData -> title; ?></td>
                                    <td><?php echo $orderData -> name; ?></td>
                                    <td><?php echo $orderData -> quantity; ?></td>
                                    <td><?php echo $orderData -> order_date_time; ?></td>
                                    <td colspan="2">
                                        <button class="or_btn" id="butn1" onclick="openPopup1()" type="submit">Conform</button>
                                        <button class="or_btn" id="butn2" onclick="openPopup2()" type="submit">Reject</button>
                                    </td>

                                    <div class="popup" id="popup1">
                                        <div id="msg_img">
                                            <img src="<?= URLROOT;?>/img/seller/orderConfirm.jpg" id="msg_img">
                                        </div>
                                        <div class="msg">
                                        <span>&#128680;</span>
                                            <h2 class="text_msg" id="com_msg">Are you sure ?</h2>
                                            <h4 class="text_msg" id="text_msg">You can confirm this order and return withn the selling time period</h4>
                                            <button class="order_con" id="b1" btn_id="<?php echo $orderData -> wishlit_id . 'b1' ?>" name="orderConfirm" type="submit"> Confirm</button>
                                        </div>
                                    </div>
        
                                    <div class="popup" id="popup2">
                                        <div id="msg_img">
                                            <img src="<?= URLROOT;?>/img/seller/orderCancle.jpg" id="msg_img">
                                        </div>
                                        <div class="msg">
                                            <span>&#10067;</span>
                                            <h2 class="text_msg" id="com_msg">You want to cancle this order</h2>
                                            <input type='text' id="cancel_reason" placeholder='Reason for cancelation !' />
                                            <button class="order_con" id="b2" btn_id="<?php echo $orderData -> wishlit_id . 'b2' ?>" name="orderCancle" type="submit">Cancle</button>
                                        </div>
                                    </div>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>

        <div class="content_box">
            <div class="content">
                <div class="tbl" id="tbl">
                    <div class="div1">
                        <table class="tb1">
                            <tr id="header">
                                <th>Order Id</th>
                                <th>Product Name</th>
                                <th>Customer Name</th>
                                <th>Quantity</th>
                                <th>Remaining Time</th>
                                <th>Complete</th>
                            </tr>
                        </table>
                    </div>
                    <div class="div2">
                        <table class="tb2" id="tbl2">
                            <?php foreach($data['conformorderData'] as $conformorderData) : ?>
                                <tr>
                                    <td><?php echo $conformorderData -> wishlit_id; ?></td>
                                    <td><?php echo $conformorderData -> title; ?></td>
                                    <td><?php echo $conformorderData -> name; ?></td>
                                    <td><?php echo $conformorderData -> quantity; ?></td>
                                    <td>
                                        <?php 
                                            $exp_time_period = "0-0-3 0:0:0";
                                            $exp_time_convert = strtotime($exp_time_period);
                                            $order_start_date = $conformorderData -> order_date_time;
                                            $order_start_date_convert = strtotime($order_start_date);
                                            $order_exp_date_convert = $order_start_date_convert + $exp_time_convert;
                                            $cur_date = date('Y-m-d H:i:s');
                                            $cur_date_convert = strtotime($cur_date);
                                            $remaining_time_convert = $order_exp_date_convert - $cur_date_convert;
                                            $remaining_time = date("d H:i:s", $remaining_time_convert);
                                            echo $remaining_time; 
                                        ?>
                                    </td>
                                    <td>
                                        <button class="or_btn" id="butn3" onclick="openPopup3()" type="submit">Complete</button>
                                    </td>
                                    <div class="popup" id="popup3">
                                        <div id="msg_img">
                                            <img src="<?= URLROOT;?>/img/seller/orderComplete.png" id="msg_img">
                                        </div>
                                        <div class="msg">
                                        <span>&#129309;</span>
                                            <h2 class="text_msg" id="com_msg">Successfull</h2></h2>
                                            <h4 class="text_msg">Succesfully complete the order</h4>
                                            <button class="order_con" id="b3" btn_id="<?php echo $conformorderData -> wishlit_id . 'b3' ?>" onclick="closePopup3()" name="orderComplete" type="submit">Complete</button>
                                        </div>
                                    </div>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="content_box">
            <div class="content">
                <div class="tbl" id="tbl">
                    <div class="div1">
                        <table class="tb1">
                            <tr id="header">
                                <th>Order Id</th>
                                <th>Product Name</th>
                                <th>Customer Name</th>
                                <th>Quantity</th>
                                <th>Order Date</th>
                                <th>Cancle Reason</th>
                            </tr>
                        </table>
                    </div>
                    <div class="div2">
                        <table class="tb2" id="tbl2">
                            <?php foreach($data['cancleorderData'] as $cancleorderData) : ?>
                                <tr>
                                    <td><?php echo $cancleorderData -> wishlit_id; ?></td>
                                    <td><?php echo $cancleorderData -> title; ?></td>
                                    <td><?php echo $cancleorderData -> name; ?></td>
                                    <td><?php echo $cancleorderData -> quantity; ?></td>
                                    <td><?php echo $cancleorderData -> order_date_time; ?></td>
                                    <td><?php echo $cancleorderData -> status_msg; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="content_box">
            <div class="content">
                <div class="tbl" id="tbl">
                    <div class="div1">
                        <table class="tb1">
                            <tr id="header">
                                <th>Order Id</th>
                                <th>Product Name</th>
                                <th>Customer Name</th>
                                <th>Quantity</th>
                                <th>Completed Date</th>
                            </tr>
                        </table>
                    </div>
                    <div class="div2">
                        <table class="tb2" id="tbl2">
                            <?php foreach($data['completeeorderData'] as $completeeorderData) : ?>
                                <tr>
                                    <td><?php echo $completeeorderData -> wishlit_id; ?></td>
                                    <td><?php echo $completeeorderData -> title; ?></td>
                                    <td><?php echo $completeeorderData -> name; ?></td>
                                    <td><?php echo $completeeorderData -> quantity; ?></td>
                                    <td><?php echo $completeeorderData -> order_date_time; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $("button").click(function() {
            var t = $(this).attr('btn_id');
            if(t.includes('b1')) {
                // alert(t);
                var item = t.replace('b1', '');
                // alert(item);
                var request = new XMLHttpRequest();
                var url = "http://localhost/gardening_hub/sellers/order_conf";
                var method = "POST";
                request.open(method, url, true);
                request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                request.send("item=" + item);
                location.reload(true);
                // alert(item);
                rdirectto();
                disableButton('butn2');
                closePopup1();
                
                
            } else if (t.includes('b2')) {
                // alert(t);
                var cancel_item = t.replace('b2', '');
                var request = new XMLHttpRequest();
                var url = "http://localhost/gardening_hub/sellers/order_cancel";
                var method = "POST";
                request.open(method, url, true);
                request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                var cancel_reason = document.getElementById("cancel_reason").value;
                // alert(cancel_reason);
                request.send("cancel_item=" + cancel_item + "&cancel_reason=" + cancel_reason);
                window.location.reload();
                disableButton('butn1');
                closePopup2();
                
            }  else if (t.includes('b3')) {
                // alert(t);
                var compelete_item = t.replace('b3', '');
                var request = new XMLHttpRequest();
                var url = "http://localhost/gardening_hub/sellers/order_complete";
                var method = "POST";
                request.open(method, url, true);
                request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                request.send("compelete_item=" + compelete_item);
                window.location.reload();
                disableButton('butn1');
                closePopup2();
                
            }   

    });

    const tabs = document.querySelectorAll('.tab_btn');
        const all_content = document.querySelectorAll('.content');

        tabs.forEach((tab, index) => {
            tab.addEventListener('click', (e)=>{
                tabs.forEach(tab=>{tab.classList.remove('active')});
                tab.classList.add('active');

                var line = document.querySelector('.line');
            line.style.width = e.target.offsetWidth + "px";
            line.style.left = e.target.offsetLeft + "px";
            
            all_content.forEach(content=>{content.classList.remove('active')});
            all_content[index].classList.add('active');
            })
        })

        // async function rdirectto(){
        //     const button1 = document.getElementById("b1");
        //     const button2 = document.getElementById("con_btn");
        //     window.location.reload();
        //     await delay(1000);
        //     button1.addEventListener("click", function() {
        //         button2.click();
        //     });
        // }

        // function delay(ms) {
        //     return new Promise(resolve => setTimeout(resolve, ms));
        // }
    </script>

    <script>

        let popup1 = document.getElementById("popup1");
        let popup2 = document.getElementById("popup2");
        let popup3 = document.getElementById("popup3");
        // let popBack = document.getElementById("infopart");
        let tblVis = document.getElementById("tbl, od");

        

        


        function openPopup1() {
            popup1.classList.add("open-popup");
            // popBack.classList.add("back-popup");
            tblVis.classList.add("tblShow");
        }

        function closePopup1() {
            popup1.classList.remove("open-popup");
            // popBack.classList.remove("back-popup");
            tblVis.classList.remove("tblShow");
        }

        function openPopup2() {
            popup2.classList.add("open-popup");
            // popBack.classList.add("back-popup");
            tblVis.classList.add("tblShow");
        }

        function closePopup2() {
            popup2.classList.remove("open-popup");
            // popBack.classList.remove("back-popup");
            tblVis.classList.remove("tblShow");
        }

        function openPopup3() {
            popup3.classList.add("open-popup");
            // popBack.classList.add("back-popup");
            tblVis.classList.add("tblShow");
        }

        function closePopup3() {
            popup3.classList.remove("open-popup");
            // popBack.classList.remove("back-popup");
            tblVis.classList.remove("tblShow");
        }

        function disableButton(disableId) {
            document.getElementById(disableId).disabled = true;
        }

        // function redirectconformtab(){
        //     document.getElementById('con_btn').click();
        // }

        // function redirectcanaletab(){
        //     document.getElementById('can_btn').click();
        // }

        // function redirectcompletetab(){
        //     document.getElementById('com_btn').click();
        // }

    </script>

<?php require APPROOT . '/views/inc/incSeller/footer.php'; ?>


