<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>

<!-- ---------------------------------------------------------------------- -->

<style>
    * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    /* background: #ffffe6; */
    background: linear-gradient(#B7F8DB , #50A7C2);
}

.an {
    font-family: 'Source Sana 3';
    font-style: normal;
    font-weight: 400;
    font-size: 20px;
    line-height: 28px;
    letter-spacing: 0.08em;
    text-decoration: none;
    padding: 10px;
    margin-right: 10px;
    color: #000000;
}

.an:hover {
    border-bottom: 5px solid #EAFFD0;
}

.infopart {
    /* background: #fbf8f394; */
    margin-top: 20px;
    height: 563px;
    border-top-left-radius: 25px;
    border-top-right-radius: 25px;
    
}

.div1 {
    height: 50px;
    width: 1150px;
    margin-left:auto; 
    margin-right:auto;
    margin-top: 40px;
    box-shadow: 2px 2px 12px rgba(0,0,0,0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
}

.tb1, .tb2 {
    table-layout: fixed;
    text-align: center;
    width: 1150px;
    height: 50px;
    box-shadow: 2px 2px 12px rgba(0,0,0,0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
}

.div2 {
    margin-top: 8px;
    height: 300px;
    width: 1150px;
    overflow: auto;
    overflow-x: hidden;
    margin-left:auto; 
    margin-right:auto;
    box-shadow: 2px 2px 12px rgba(0,0,0,0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
}
th, td {
    padding: 15px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

#header {
    background-color: #1D976C;
    color: #ddd;
    opacity: 0.8;
}

h1 {
    font-weight: 600;
    text-align: center;    
    /* background-color: #1D976C; */
    /* opacity: 0.8; */
    color: black;
    padding: 10px 0px;
}

tr:hover {
    background-color: rgba(255, 253, 253, 0.671);
    transform: scale(1.02);
    box-shadow: 2px 2px 12px rgba(0,0,0,0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
}

.div2::-webkit-scrollbar {
    width: 15px;
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

.or_btn {
    width: 100px;
    height: 25px;
    border-radius: 7px;
    background: none;
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

.popup {
    width: 400px;
    /* background: #000000; */
    box-shadow: 0 4px 30px rgba(255, 255, 255, 0.17);
    border-radius: 6px;
    position: absolute;
    top: 0;
    left: 50%;
    transform: translate(-50%, -50%) scale(0.1);
    /* text-align: center; */
    padding: 0 30px 30px;
    color: #333;
    visibility: hidden;
    transition: transform 0.4s, top 0.4s;
    display: flex;

}

#msg_img {
    width: 360px;
    height: 360px;
    padding: 0px;
    opacity: 0.9;
    border-top-left-radius: 15px;
    border-bottom-left-radius: 15px;
}

.msg {
    flex-grow: 1;
    width: 750px;
    height: 360px;
    text-align: center;
}

.open-popup {
    visibility: visible;
    top: 61.5%;
    width: 1150px;
    height: 361px;
    transform: translate(-50%, -50%) scale(1);
    box-shadow: 0 4px 30px rgba(255, 255, 255, 0.4);
    backdrop-filter: blur(25px);
    z-index: 20;
    /* -webkit-backdrop-filter: blur(13.5px); */
}

.back-popup {
    background: rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(25px);
    z-index: 50;
}

.tblShow {
    visibility: hidden;
}

span {
    font-size:100px;
    padding: 10px;
}

#com_msg {
    padding: 30px 0px;
}

.order_con {
    width: 200px;
    height: 36px;
    margin: 30px;
    border-radius: 30px;
    background:none;
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

.order_con:hover {
    transform: scale(1.02);
    color: #FFFFFF;   
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

.text_msg {
    color: #FFFFFF;  
}

#cancel_reason {
    display: flex;
    margin: auto;
    width: 600px;
    height: 50px;
    border: 1px solid #FFFFFF;
    background: none;
    border-radius: 10px;
    padding-left: 20px;
}

#cancel_reason:focus {
    outline: none; /* to remove outline black corder */
    caret-color: #FFFFFF; /* to change corsor color */
}
</style>

<!-- ---------------------------------------------------------------------- -->

    <div class="infopart" id="infopart">
        <h1 id="od">Order Details</h1>
        <div class="tbl" id="tbl">

            <div class="div1">
                <table class="tb1">
                    <tr id="header">
                        <th>Product Name</th>
                        <th>Customer Name</th>
                        <th>Quantity</th>
                        <th>Order Date</th>
                        <th colspan="2">Conformation</th>
                        <th>Complete</th>
                    </tr>
                </table>
            </div>

            <div class="div2">
                <table class="tb2">
                    <?php foreach($data['orderData'] as $orderData) : ?>
                        <tr>
                            <td><?php echo $orderData -> title; ?></td>
                            <td><?php echo $orderData -> name; ?></td>
                            <td><?php echo $orderData -> quantity; ?></td>
                            <td><?php echo $orderData -> order_date; ?></td>
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
                                    <h4 class="text_msg" id="text_msg">You can confirm this order and return withn the selling time petiod</h4>
                                    <button class="order_con" btn_id="<?php echo $orderData -> product_no . 'b1' ?>" name="orderConfirm" type="submit"> Confirm</button>
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
                                    <button class="order_con" btn_id="<?php echo $orderData -> product_no . 'b2' ?>" name="orderCancle" type="submit">Cancle</button>
                                </div>
                            </div>

                            <td><button class="or_btn" id="butn3" onclick="openPopup3()" type="submit">Complete</button></td>

                            <div class="popup" id="popup3">
                                <div id="msg_img">
                                    <img src="<?= URLROOT;?>/img/seller/orderComplete.png" id="msg_img">
                                </div>
                                <div class="msg">
                                <span>&#129309;</span>
                                    <h2 class="text_msg" id="com_msg">Successfull</h2></h2>
                                    <h4 class="text_msg">Succesfully complete the order</h4>
                                    <button class="order_con" btn_id="<?php echo $orderData -> product_no . 'b3' ?>" onclick="closePopup3()" name="orderComplete" type="submit">Complete</button>
                                </div>
                            </div>

                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

    <script>
        $("button").click(function() {
            var t = $(this).attr('btn_id');
            if(t.includes('b1')) {
                alert(t);
                var item = t.replace('b1', '');
                alert(item);
                var request = new XMLHttpRequest();
                var url = "http://localhost/gardening_hub/sellers/order_conf";
                var method = "POST";
                request.open(method, url, true);
                request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                request.send("item=" + item);
                alert(item);
                disableButton('butn2');
                closePopup1();

                
            } else if (t.includes('b2')) {
                alert(t);
                var cancel_item = t.replace('b2', '');
                var request = new XMLHttpRequest();
                var url = "http://localhost/gardening_hub/sellers/order_cancel";
                var method = "POST";
                request.open(method, url, true);
                request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                var cancel_reason = document.getElementById("cancel_reason").value;
                alert(cancel_reason);
                request.send("cancel_item=" + cancel_item + "&cancel_reason=" + cancel_reason);
                disableButton('butn1');
                closePopup2();
            }    

            // function sendData(textAreaValue) {
            //     var text = new XMLHttpRequest();
            //     text.open("POST", "http://localhost/gardening_hub/sellers/order_cancel");
            //     var data = JSON.stringify(textAreaValue);
            //     alert(data);
            //     text.send("data=" + data);
            // }
    });
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

        
        // $(document).ready(function(){
        //     $("#b1").click(function(){
        //         $.post("<?php echo URLROOT; ?>/sellers/order", {value: "orderConfirm"}, function(data){
        //             console.log("Data: " + data);
        //         });
        //     });
        // });

        


        function deletecat() {

            // let id = e.parentNode.parentNode.children[0].innerHTML;
            // let id = document.getElementById("b1").parentNode.parentNode.parentNode.children[0].innerHTML;
            // alert(id);

            // var ajax = new XMLHttpRequest();
            // ajax.open("POST", "http://localhost/gardening_hub/Productcategories/delete", true);
            // ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            // ajax.onreadystatechange = function () {
            //     if (this.readyState == 4 && this.status == 200)
            //         alert(this.responseText);
            // };

            // ajax.send("id=" + id);

            // getData();
            // return false;


}

    </script>

<?php require APPROOT . '/views/inc/incSeller/footer.php'; ?>


