const reqnewadd = document.getElementById('reqnewadd');
const modal = document.querySelector(".modal");
const overlay = document.querySelector(".overlay");
const btnCloseModal = document.querySelector(".close-modal");
const catform = document.getElementById("catform");

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

// show modal click event
reqnewadd.addEventListener("click", showModal);

// close modal click
btnCloseModal.addEventListener("click", closeModal);

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
        catform.reset();
        closeModal();
        enableButton();
        return false;
    } else {
        alert("Please fill-out both fields!");
    }



});

catform.addEventListener('click', (e) => {
    e.preventDefault();
});

function enableButton() {
    document.getElementById("reqnewdonebutton").classList.remove("disabled");
}
