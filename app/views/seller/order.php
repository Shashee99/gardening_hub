<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>

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
                                    <td class="order_td"><?php echo $orderData -> wishlit_id; ?></td>
                                    <td class="order_td"><?php echo $orderData -> title; ?></td>
                                    <td class="order_td"><?php echo $orderData -> name; ?></td>
                                    <td class="order_td"><?php echo $orderData -> count; ?></td>
                                    <td class="order_td"><?php echo $orderData -> order_date_time; ?></td>
                                    <td colspan="2">
                                        <button class="or_btn" id="butn1" onclick="openPopup1()" type="submit">Conform</button>
                                        <button class="or_btn" id="butn2" onclick="openPopup2()" type="submit">Reject</button>
                                    </td>

                                    <div class="popup" id="popup1">
                                        <i id="cancelicon1" class="fa-regular fa-circle-xmark" onclick="closePopup1()"></i>
                                        <div id="msg_img">
                                            <img src="<?= URLROOT;?>/img/seller/orderConfirm.jpg" id="msg_img">
                                        </div>
                                        <div class="msg">
                                        <span class="span_order">&#128680;</span>
                                            <h2 class="text_msg" id="com_msg">Are you sure ?</h2>
                                            <h4 class="text_msg" id="text_msg">You can confirm this order and return withn the selling time period</h4>
                                            <button class="order_con" id="b1" btn_id="<?php echo $orderData -> wishlit_id . 'b1' ?>" name="orderConfirm" type="submit"> Confirm</button>
                                        </div>
                                    </div>
        
                                    <div class="popup" id="popup2">
                                        <i id="cancelicon2" class="fa-regular fa-circle-xmark" onclick="closePopup2()"></i>
                                        <div id="msg_img">
                                            <img src="<?= URLROOT;?>/img/seller/orderCancle.jpg" id="msg_img">
                                        </div>
                                        <div class="msg">
                                            <span class="span_order">&#10067;</span>
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
                                <th>Complete</th>
                            </tr>
                        </table>
                    </div>
                    <div class="div2">
                        <table class="tb2" id="tbl2">
                            <?php foreach($data['conformorderData'] as $conformorderData) : ?>
                                <tr>
                                    <td class="order_td"><?php echo $conformorderData -> wishlit_id; ?></td>
                                    <td class="order_td"><?php echo $conformorderData -> title; ?></td>
                                    <td class="order_td"><?php echo $conformorderData -> name; ?></td>
                                    <td class="order_td"><?php echo $conformorderData -> count; ?></td>
                                    <td class="order_td">
                                        <button class="or_btn" id="butn3" onclick="openPopup3()" type="submit">Complete</button>
                                    </td>
                                    <div class="popup" id="popup3">
                                        <i id="cancelicon3" class="fa-regular fa-circle-xmark" onclick="closePopup3()"></i>
                                        <div id="msg_img">
                                            <img src="<?= URLROOT;?>/img/seller/orderComplete.png" id="msg_img">
                                        </div>
                                        <div class="msg">
                                        <span class="span_order">&#129309;</span>
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
                                    <td><?php echo $cancleorderData -> count; ?></td>
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
                                    <td><?php echo $completeeorderData -> count; ?></td>
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


        let popup1 = document.getElementById("popup1");
        let popup2 = document.getElementById("popup2");
        let popup3 = document.getElementById("popup3");
        let tblVis = document.getElementById("tbl, od");

        

        


        function openPopup1() {
            popup1.classList.add("open-popup");
            tblVis.classList.add("tblShow");
        }

        function closePopup1() {
            popup1.classList.remove("open-popup");
            tblVis.classList.remove("tblShow");
        }

        function openPopup2() {
            popup2.classList.add("open-popup");
            tblVis.classList.add("tblShow");
        }

        function closePopup2() {
            popup2.classList.remove("open-popup");
            tblVis.classList.remove("tblShow");
        }

        function openPopup3() {
            popup3.classList.add("open-popup");
            tblVis.classList.add("tblShow");
        }

        function closePopup3() {
            popup3.classList.remove("open-popup");
            tblVis.classList.remove("tblShow");
        }

        function disableButton(disableId) {
            document.getElementById(disableId).disabled = true;
        }


    </script>

<?php require APPROOT . '/views/inc/incSeller/footer.php'; ?>


