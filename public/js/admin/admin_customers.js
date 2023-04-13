
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
getallcustomers();
function getallcustomers(){
    var ajax = new XMLHttpRequest();

    ajax.open("POST", "http://localhost/gardening_hub/customers/allcustomers", true);
    ajax.send();
    ajax.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);

            var html = "";
            for (var a = 0; a < data.length; a++) {

                let rcount = a+1;

                html += "<tr>";
                html += "<td>" + rcount + "</td>";
                html += "<td>" + data[a].name + "</td>";

                html += "<td>" + data[a].email + "</td>";

                html += "<td>" + data[a].gramasewa_division + "</td>";
                html += "<td>" + data[a].divisional_secretary + "</td>";
                html += "<td>" + data[a].tel_no + "</td>";
                html += `<td> <div class="seller-action flex"> <a href="http://localhost/gardening_hub/admins/viewcustomer/${data[a].customer_id}" class="view"> View </a> <div onclick="deletecustomer(${data[a].customer_id});" class="delete"> Delete </div> </div></td>`;
                html += "</tr>";
                // console.log(html);
            }

            document.getElementById("customersall").innerHTML = html;
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

                    html += "<td>" + data[a].email + "</td>";

                    html += "<td>" + data[a].gramasewa_division + "</td>";
                    html += "<td>" + data[a].divisional_secretary + "</td>";
                    html += "<td>" + data[a].tel_no + "</td>";
                    html += `<td> <div class="seller-action flex"> <a href="http://localhost/gardening_hub/admins/viewcustomer/${data[a].customer_id}" class="view"> View </a> <div onclick="deletecustomer(${data[a].customer_id});" class="delete"> Delete </div> </div></td>`;
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

function deletecustomer(e){

    let id = e;
    if (confirm(`Are you sure want to delete this user ?`)) {
        var ajax = new XMLHttpRequest();
        ajax.open("POST", "http://localhost/gardening_hub/customers/deletecustomer", true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200)
                alert(this.responseText);
        };

        ajax.send("id=" + id);
        getallcustomers();
        return false;
    } else {
        alert("Cancelled!")
    }


}