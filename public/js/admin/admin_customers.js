
getcustomercount();

function getcustomercount() {
    var ajax = new XMLHttpRequest();

    ajax.open("POST", "http://localhost/gardening_hub/customers/allcustomers", true);
    ajax.send();

    ajax.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            document.getElementById("cuscount").innerText = data.length;
            // console.log(data[0]);
        }
    };
}

function searchbyname() {

    let search = document.getElementById('searchbyname').value;

    var ajax = new XMLHttpRequest();

    ajax.open("POST", "http://localhost/gardening_hub/customers/searchbynames", true);

    ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    ajax.send("searchbyname=" + search);
    ajax.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            var html = "";
            if(data.length>=1){

                for (var a = 0; a < data.length; a++) {
                    html += "<tr>";
                    html += "<td>" + (a+1)+ "</td>";
                    html += "<td>" + data[a].name + "</td>";
                    html += "<td>" + data[a].nic_no + "</td>";
                    html += "<td>" + data[a].email + "</td>";
                    html += "<td>" + data[a].bod + "</td>";
                    html += "<td>" + data[a].gramasewa_division + "</td>";
                    html += "<td>" + data[a].divisional_secretary + "</td>";
                    html += "<td>" + data[a].tel_no + "</td>";
                    html += `<td> <div class="seller-action flex"> <a href="http://localhost/gardening_hub/admins/viewcustomer/${data[a].customer_id}" class="view"> View </a> <div class="delete"> Delete </div> </div></td>`;
                    html += "</tr>";
                    // console.log(html);
                }

            }
            else {
                html += "<tr> Sorry no records found!! </tr>";
            }
            document.getElementById("customersall").innerHTML = html;
        }

    };



}