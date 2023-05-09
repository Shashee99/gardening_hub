
getregsellercount();
function getregsellercount() {
    var ajax = new XMLHttpRequest();

    ajax.open("POST", "http://localhost/gardening_hub/sellers/allregsellers", true);
    ajax.send();

    ajax.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            document.getElementById("sellCount").innerText = data.length;
            console.log(data.length);
        }
    };
}


//search by username (registered seller)

function searchbyregisteredshopname() {

    let search = document.getElementById('searchbyshopnameregistered').value;

    var ajax = new XMLHttpRequest();

    ajax.open("POST", "http://localhost/gardening_hub/sellers/searchbynames_registeredseller", true);

    ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    ajax.send("searchbynames_registeredseller=" + search);
    ajax.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            // console.log(data);
            var html = "";
            if(data.length>=1){

                for (var a = 0; a < data.length; a++){
                    html += "<tr>";
                    html += "<td>" + (a+1)+ "</td>";
                    html += "<td>" + data[a].shop_name + "</td>";
                    html += "<td>" + data[a].owner_name + "</td>";
                    html += "<td>" + data[a].email + "</td>";
                    html += "<td>" + data[a].tel_no + "</td>";
                    html += `<td> <div class="seller-action flex"> <a href="http://localhost/gardening_hub/admins/viewseller/${data[a].seller_id}" class="view"> View </a> <div class="delete"> Delete </div> </div></td>`;
                    html += "</tr>";
                }

            }
            else {
                html += "<tr>  <td colspan=\"6\">No Records found.</td> </tr>";
            }
            document.getElementById("registeredsellerstable").innerHTML = html;
        }

    };



}

//search by username (un registered seller)

function searchbyunregisteredshopname() {

    let search = document.getElementById('searchbyshopnameunregistered').value;

    var ajax = new XMLHttpRequest();

    ajax.open("POST", "http://localhost/gardening_hub/sellers/searchbynames_unregisteredseller", true);

    ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    ajax.send("searchbynames_unregisteredseller=" + search);
    ajax.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            // console.log(data);
            var html = "";
            if(data.length>=1){

                for (var a = 0; a < data.length; a++) {
                    html += "<tr>";
                    html += "<td>" + (a+1)+ "</td>";
                    html += "<td>" + data[a].shop_name + "</td>";
                    html += "<td>" + data[a].owner_name + "</td>";
                    html += "<td>" + data[a].email + "</td>";
                    html += "<td>" + data[a].tel_no + "</td>";
                    html += `<td> <div class="seller-action flex"> <a href="http://localhost/gardening_hub/admins/viewseller/${data[a].seller_id}" class="view"> View </a> <div class="delete"> Delete </div> </div></td>`;
                    html += "</tr>";
                    // console.log(html);
                }

            }
            else {
                html += "<tr>  <td colspan=\"6\">No Records found.</td> </tr>";
            }
            document.getElementById("unregisteredsellerstable").innerHTML = html;
        }

    };

}


