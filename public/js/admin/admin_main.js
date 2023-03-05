//notification panel
setInterval(getallnotifications, 500);


let notificationoverlay = document.querySelector(".popupnotificatiooverlay");
let notfications = document.querySelector('.dailynotification');
let notibell = document.getElementById('notbtn');

let closenotification = document.getElementById('notificationclose');

function popnotificationpanel() {
    notificationoverlay.classList.remove('hidden');
    notfications.classList.remove('hidden');
}

notibell.addEventListener("click", popnotificationpanel);

function closenotifications() {

    notificationoverlay.classList.add('hidden');
    notfications.classList.add('hidden');
}

//notification panel
notibell =  document.getElementById('bellnoti');

function getallnotifications() {

    var ajax = new XMLHttpRequest();

    ajax.open("POST", "http://localhost/gardening_hub/notifications/getallnotifications", true);
    ajax.send();

    ajax.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);


            let notificationBody = " ";
            document.getElementById('numofnotifications').innerText =data.length;
            if (data.length > 0) {
               notibell.classList.remove('hidden');

                for (var a = 0; a < data.length; a++) {

                    notificationBody += `
                                      <div class="notification-body">
                                        <div class="notification-icon">
                                          <img src="http://localhost/gardening_hub/img/admin/icon/warning.png" height="50px" width="50px" alt="">
                                        </div>
                                        <div class="notification-message_and_time">
                                          <div class="notification-message">
                                             New ${data[a].user_type} registration found!
                                          </div>
                                          <div class="notification-date">
                                              ${data[a].dateandtime}
                                          </div>
                                        </div>
                                        <div class="notification-delete">
                                          <img src="http://localhost/gardening_hub/img/admin/icon/close.png" height="30px" width="30px" alt="" onclick="clearnotification(${data[a].notifiication_id});">
                                        </div>
                                      </div>
                                    `;


                }

            } else {

                notificationBody = ` <h3 style="padding-left: 50px;margin-top: 20px">No notifications</h3>`
                notibell.classList.add("hidden");
            }

            document.getElementById("notifications").innerHTML = notificationBody;
        }
    };
}


function clearnotification(id) {

    let notiid = id;

    var ajax = new XMLHttpRequest();

    ajax.open("POST", "http://localhost/gardening_hub/notifications/viewnotification", true);

    ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    ajax.send("notiid=" + notiid);

    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = this.responseText;
            console.log(data);
            getallnotifications();

        }
    };

}


