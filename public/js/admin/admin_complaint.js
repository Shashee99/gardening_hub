getviewedcomplaints();

function getviewedcomplaints() {
    var ajax = new XMLHttpRequest();

    ajax.open("POST", "http://localhost/gardening_hub/complaints/allnewcomplaints", true);
    ajax.send();

    ajax.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            document.getElementById("complaintcount").innerText = data.length;

        }
    };
}
