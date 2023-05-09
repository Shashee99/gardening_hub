//search by user name (registered advisor)
function searchbyregisteredseller() {

    let search = document.getElementById('searchbyadviosrregistered').value;

    var ajax = new XMLHttpRequest();

    ajax.open("POST", "http://localhost/gardening_hub/advisors/searchbynames_registeredadvisor", true);

    ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    ajax.send("searchbynames_registeredadvisor=" + search);
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
                    html += "<td>" + data[a].tel_no + "</td>";
                    html += `<td> <div class="seller-action flex"> <a href="http://localhost/gardening_hub/admins/viewadvisor/${data[a].advisor_id}" class="view"> View </a> <div class="delete"> Delete </div> </div></td>`;
                    html += "</tr>";
                }

            }
            else {
                html += "<tr> <td colspan=\"6\" style=\"text-align:center;\">No advisors found.</td> </tr>";
            }
            document.getElementById("advisorstableregistered").innerHTML = html;
        }

    };

}

//search by user name (unregistered advisor)
function searchbyunregisteredseller() {

    let search = document.getElementById('searchbyadviosrunregistered').value;

    var ajax = new XMLHttpRequest();

    ajax.open("POST", "http://localhost/gardening_hub/advisors/searchbynames_unregisteredadvisor", true);

    ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    ajax.send("searchbynames_unregisteredadvisor=" + search);
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
                    html += "<td>" + data[a].tel_no + "</td>";
                    html += `<td> <div class="seller-action flex"> <a href="http://localhost/gardening_hub/admins/viewadvisor/${data[a].advisor_id}" class="view"> View </a> <div class="delete"> Delete </div> </div></td>`;
                    html += "</tr>";
                }

            }
            else {
                html += "<tr> <td colspan=\"6\" style=\"text-align:center;\">No new advisors found.</td> </tr>";
            }
            document.getElementById("advisorstableunregistered").innerHTML = html;
        }

    };

}
