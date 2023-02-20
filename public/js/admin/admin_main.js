getData(); //load category table
getcustomercount();
getregsellercount();
getnewsellercount();
getregadvisorcount();
getnewadvisorcount();
getviewedcomplaints();


function deletecat(e) {

    let id = e.parentNode.parentNode.children[0].innerHTML;
    if (confirm(`Are you sure want to delete ${id} ?`)) {
        var ajax = new XMLHttpRequest();
        ajax.open("POST", "http://localhost/gardening_hub/Productcategories/delete", true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200)
                alert(this.responseText);
        };

        ajax.send("id=" + id);


        getData();
        return false;
    } else {
        alert("Cancelled!")
    }


}


// Get all DOM and store in variable
const modal = document.querySelector(".modal");
const editmodal = document.querySelector(".editmodal");
const overlay = document.querySelector(".overlay");
const btnCloseModal = document.querySelector(".close-modal");
const btnCloseEditModal = document.querySelector(".closeedit-modal");
const btnShowModal = document.querySelector(".category-item3");
const addcatbutton = document.getElementById("addcatbuton");
const catform = document.getElementById("catform");
const editcatform = document.getElementById("editcatform");
// addcatbutton.addEventListener("click",(e)=>{
//    e.preventDefault();
// });

// Show Modal function const showModal
const showModal = function () {
    modal.classList.remove("hidden");
    modal.classList.add("flex");
    overlay.classList.remove("hidden");
};

// Close Modal function
const closeModal = function () {
    modal.classList.add("hidden");
    overlay.classList.add("hidden");
};
const closeeditModal = function () {
    editmodal.classList.add("hidden");
    overlay.classList.add("hidden");
};

// show modal click event
btnShowModal.addEventListener("click", showModal);

// close modal click
btnCloseModal.addEventListener("click", closeModal);
btnCloseEditModal.addEventListener("click", closeeditModal);
overlay.addEventListener("click", closeModal);
// escape click event
document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && !modal.classList.contains("hidden")) {
        closeModal();
    }
});

function getData() {
    var ajax = new XMLHttpRequest();

    ajax.open("POST", "http://localhost/gardening_hub/ProductCategories/viewAll", true);
    ajax.send();

    ajax.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            document.getElementById("catCount").innerText = data.length;
            // console.log(data[0]);
            var html = "";
            for (var a = 0; a < data.length; a++) {
                html += "<tr>";
                html += "<td>" + data[a].product_id + "</td>";
                html += "<td>" + data[a].product_category + "</td>";
                html += "<td>" + data[a].sub_category + "</td>";
                html += "<td><button onClick=\"editCat(this);\">Edit</button>\n" +
                    "<button onClick=\"deletecat(this);\">Delete</button></td>";
                html += "</tr>";
                // console.log(html);
            }

            document.getElementById("categoryTable").innerHTML = html;
        }
    };
}

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

function getviewedcomplaints() {
    var ajax = new XMLHttpRequest();

    ajax.open("POST", "http://localhost/gardening_hub/complaints/allnewcomplaints", true);
    ajax.send();

    ajax.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            document.getElementById("complaintcount").innerText = data.length;
            console.log(data.length);
        }
    };
}

function getregadvisorcount(){
    var ajax = new XMLHttpRequest();

    ajax.open("POST", "http://localhost/gardening_hub/advisors/allregadvisors", true);
    ajax.send();

    ajax.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            document.getElementById("regadcount").innerText = data.length;
            // console.log(data.length);
        }
    };
}
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

function getnewsellercount() {
    var ajax = new XMLHttpRequest();

    ajax.open("POST", "http://localhost/gardening_hub/sellers/allnewsellers", true);
    ajax.send();

    ajax.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            document.getElementById("newsellCount").innerText = data.length;
            console.log(data.length);
        }
    };
}


//prevent the page refresh after closing new modal
catform.addEventListener('click', (e) => {
    e.preventDefault();
});
editcatform.addEventListener('click', (e) => {
    e.preventDefault();
});

//Inserting product category

document.getElementById("addcatbuton").addEventListener('click', () => {

    var cat = document.getElementById("category");
    var subcat = document.getElementById('subcategory');

    let catgory = cat.value;
    let sucatgory = subcat.value;

    if ((catgory != "") && (sucatgory != "")) {
        var ajax = new XMLHttpRequest();

        ajax.open('POST', 'http://localhost/gardening_hub/ProductCategories/insert', false);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
            }

        };
        ajax.send("category=" + catgory + "&subcategory=" + sucatgory);
        getData();
        closeModal();
        catform.reset();
        return false;
    } else {
        alert("Please fill-out both fields!");
    }

});

let catobj = [];
function setcatObjID(id){
    catobj['id'] = id;
}
function getcatObjID(){
    return catobj['id'];
}

function editCat(e) {

    let id = e.parentNode.parentNode.children[0].innerHTML;
    setcatObjID(id);
    let existingcat = e.parentNode.parentNode.children[1].innerHTML;
    let existingsubcat = e.parentNode.parentNode.children[2].innerHTML;
    console.log(existingcat);
    let newcat = document.getElementById("editcategory");
    let newsub = document.getElementById('editsub');

    newcat.value = existingcat;
    newsub.value = existingsubcat;
    editmodal.classList.remove("hidden");
    editmodal.classList.add("flex");
    overlay.classList.remove("hidden");
}
document.getElementById("editcatbutton").addEventListener('click' ,()=>{
    let id = getcatObjID();
    console.log(id);
    let newcat = document.getElementById("editcategory");
    let newsub = document.getElementById('editsub');
    if (newcat.value != "" && newsub.value !=""){
        var ajax = new   XMLHttpRequest();
        ajax.open("POST","http://localhost/gardening_hub/ProductCategories/update",true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        ajax.send("cat=" + newcat.value + "&subcat=" + newsub.value + "&id=" + id );

        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200){
                getData();
            }
        };
        closeeditModal();
        getData();
    }
    else{
        alert("Please fill-out both fields!");
    }
    getData();
})


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
//search by user name (registered seller)

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
                html += "<tr> Sorry no records found!! </tr>";
            }
            document.getElementById("registeredsellerstable").innerHTML = html;
        }

    };



}

//search by user name (un registered seller)

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
                html += "<tr> Sorry no records found!! </tr>";
            }
            document.getElementById("unregisteredsellerstable").innerHTML = html;
        }

    };

}


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
                html += "<tr> Sorry no records found!! </tr>";
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
                html += "<tr> Sorry no records found!! </tr>";
            }
            document.getElementById("advisorstableunregistered").innerHTML = html;
        }

    };

}

//search product categories
function searchcategories() {

    let search = document.getElementById('searchcat').value;

    var ajax = new XMLHttpRequest();

    ajax.open("POST", "http://localhost/gardening_hub/ProductCategories/searchcategoriesbyname", true);

    ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    ajax.send("searchcategory=" + search);

    ajax.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            console.log(data);
            var html = "";
            for (var a = 0; a < data.length; a++) {
                html += "<tr>";
                html += "<td>" + data[a].product_id + "</td>";
                html += "<td>" + data[a].product_category + "</td>";
                html += "<td>" + data[a].sub_category + "</td>";
                html += "<td><button onClick=\"editCat(this);\">Edit</button>\n" +
                    "<button onClick=\"deletecat(this);\">Delete</button></td>";
                html += "</tr>";
                // console.log(html);
            }

            document.getElementById("categoryTable").innerHTML = html;
        }
    };

}




