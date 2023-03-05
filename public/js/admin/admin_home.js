//Dashboard count update

getcustomercount();

function getcustomercount() {
    var ajax = new XMLHttpRequest();

    ajax.open("POST", "http://localhost/gardening_hub/customers/allcustomers", true);
    ajax.send();

    ajax.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            document.getElementById("customers").innerText = data.length;
            // console.log(data[0]);
        }
    };
}


getregsellercount();
function getregsellercount() {
    var ajax = new XMLHttpRequest();

    ajax.open("POST", "http://localhost/gardening_hub/sellers/allregsellers", true);
    ajax.send();

    ajax.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            document.getElementById("sellers").innerText = data.length;
            console.log(data.length);
        }
    };
}


getregadvisorcount();
function getregadvisorcount(){
    var ajax = new XMLHttpRequest();

    ajax.open("POST", "http://localhost/gardening_hub/advisors/allregadvisors", true);
    ajax.send();

    ajax.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            document.getElementById("advisors").innerText = data.length;
            // console.log(data.length);
        }
    };
}


getnewadvisorcount();
function getnewadvisorcount(){
    var ajax = new XMLHttpRequest();

    ajax.open("POST", "http://localhost/gardening_hub/advisors/allnewadvisors", true);
    ajax.send();

    ajax.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            document.getElementById("newadcount").innerText = data.length;

            // console.log(data.length);
        }
    };
}

//latest users
getrecentadvisors();
function getrecentadvisors(){
    let recentadvisors = document.getElementById('latestadvisors');
    var ajax = new XMLHttpRequest();

    ajax.open("POST", "http://localhost/gardening_hub/advisors/recentlyaddedadvisors", true);
    ajax.send();

    var html = "";
    ajax.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            console.log(data);

            for(let a=0 ; a < data.length; a++){
               html += '<div class="advisorcards-card">' +
                    '<div class="advisorimg">' +
                    '<img src="'+'http://localhost/gardening_hub/img/upload_images/advisor_pp/' + data[a].photo + '" alt="" style="width: 100%; height: 100%; border-radius: 100%">' +
                    '</div>' +
                    '<p>' + data[a].name + '</p>' +
                    '<p>' + data[a].email + '</p>' +
                    '</div>';

            }

            recentadvisors.innerHTML = html;
            // console.log(data.length);
        }
    };
}

//latestsellers

getrecentlyaddedsellers();
function getrecentlyaddedsellers(){
    let recentsellers = document.getElementById('latestsellers');
    var ajax = new XMLHttpRequest();

    ajax.open("POST", "http://localhost/gardening_hub/sellers/recentlyaddedsellers", true);
    ajax.send();

    var html = "";
    ajax.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            console.log(data);

            for(let a=0 ; a < data.length; a++){
                html += '<div class="advisorcards-card">' +
                    '<div class="advisorimg">' +
                    '<img src="'+'http://localhost/gardening_hub/img/upload_images/seller_pp/' + data[a].photo + '" alt="" style="width: 100%; height: 100%; border-radius: 100%">' +
                    '</div>' +
                    '<p>' + data[a].shop_name + '</p>' +
                    '<p>' + data[a].email + '</p>' +
                    '</div>';

            }

            recentsellers.innerHTML = html;
            // console.log(data.length);
        }
    };
}

//latestcustomers


getlatestcustomers();
function getlatestcustomers(){
    let latestcustomers = document.getElementById('latestcustomers');
    var ajax = new XMLHttpRequest();

    ajax.open("POST", "http://localhost/gardening_hub/customers/recentlyaddedcustomers", true);
    ajax.send();

    var html = "";
    ajax.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            console.log(data);

            for(let a=0 ; a < data.length; a++){
                html += '<div class="advisorcards-card">' +
                    '<div class="advisorimg">' +
                    '<img src="'+'http://localhost/gardening_hub/img/upload_images/customer_pp/' + data[a].photo + '" alt="" style="width: 100%; height: 100%; border-radius: 100%">' +
                    '</div>' +
                    '<p>' + data[a].name + '</p>' +
                    '<p>' + data[a].email + '</p>' +
                    '</div>';

            }

            latestcustomers.innerHTML = html;
            // console.log(data.length);
        }
    };
}
