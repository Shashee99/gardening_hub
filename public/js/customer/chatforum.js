const chatbox = document.getElementById("chatboxid");
const customerid = document.getElementById('customerid').value;
const chatprompt = document.getElementById('prompt');
const sendbutton = document.getElementById('sendmsgbutton');

let isScrolledToBottom = true;

function handleScroll() {
    const scrollHeight = chatbox.scrollHeight;
    const scrollTop = chatbox.scrollTop;
    const clientHeight = chatbox.clientHeight;

    // Check if the user has scrolled to the bottom
    isScrolledToBottom = scrollHeight - scrollTop === clientHeight;

    // If the user has scrolled up, disable the automatic scrolling
    if (!isScrolledToBottom) {
        clearInterval(scrollInterval);
    }
}

function scrollToBottom() {
    // Only scroll to the bottom if the user hasn't scrolled up
    if (isScrolledToBottom) {
        chatbox.scrollTop = chatbox.scrollHeight;
    }
}

const scrollInterval = setInterval(scrollToBottom, 1000); // Call the function every second

function formatTimestamp(timestamp) {
    const date = new Date(timestamp);
    const options = { hour: 'numeric', minute: 'numeric', hour12: true };
    return date.toLocaleTimeString('en-US', options);
}


// setInterval(load_all_messages,1000);
load_all_messages();

function load_all_messages(){

    var ajax = new XMLHttpRequest();
    ajax.open("POST", "http://localhost/gardening_hub/chats/chats", true);
    ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    ajax.send();
    var html = "";
    let ttt= "";
    ajax.onload = function () {

        if (this.status == 200) {
          var data = JSON.parse(this.responseText);
          for(let a = 0 ;a < data.length ; a++){
              ttt = formatTimestamp(data[a].timesdata);
              if(data[a].customer_id != customerid ){
                  html += `
                    <div class="chatpreview">
                        <div class="profileandchat">
                            <div class="senderprofile">
                            <img src="http://localhost/gardening_hub/img/upload_images/customer_pp/${data[a].photo}" alt="Profile Photo">
                            </div>
                            <div class="chatcontent">
                                <h4>${data[a].name}</h4>
                                ${data[a].message}
                            </div>
                        </div>
                        <span class="chattime-righ"></span>
                    </div>`;
              }else{
                  html += `<div class="chatpreviewoutgoing">
                        <div class="profileandchat">
                            <div class="senderprofile">
                             <img src="http://localhost/gardening_hub/img/upload_images/customer_pp/${data[a].photo}" alt="Profile Photo">
                            </div>
                            <div class="chatcontent">
                                <h4>${data[a].name}</h4>
                                ${data[a].message}
                            </div>
                        </div>
                        <span class="chattime-righ"></span>
                    </div>`;
              }
            }
        }
        document.getElementById("chatboxid").innerHTML = html;
    };

}



function sendmessage(){
    let messge = chatprompt.value;
    var ajax = new XMLHttpRequest();
    if (messge != "") {
        ajax.open("POST", "http://localhost/gardening_hub/chats/sendmessages/", true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        ajax.onload = function () {
            if (this.status == 200) {
                console.log(this.responseText);
            }
        };
        ajax.send("chatmessage=" + messge);
        chatprompt.value="";
        load_all_messages();
        chatbox.scrollTop = chatbox.scrollHeight;
    } else {
        alert("Please provide a text to sent");
    }
    handleScroll();

}

