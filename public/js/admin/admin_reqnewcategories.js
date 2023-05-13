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
    let selleremail = document.getElementById('selleremail');
    let sellername = document.getElementById('sellername');
    var cat = document.getElementById("category");
    var subcat = document.getElementById('subcategory');

    let selemail = selleremail.value;
    let selname = sellername.value;
    let catgory = cat.value;
    let sucatgory = subcat.value;

    if ((catgory != "") && (sucatgory != "")) {
        var ajax = new XMLHttpRequest();

        ajax.open('POST', 'http://localhost/gardening_hub/ProductCategories/inserfromsellerreq', false);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
            }
        };
        ajax.send("category=" + catgory + "&subcategory=" + sucatgory + "&selleremail="+ selemail + "&sellername="+selname);
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



//request declined email send
const rejectmailbox = document.getElementById('rejectmailbox');
const rejectbtn = document.getElementById('sendrejectbtn');
const rejectcancelbtn = document.getElementById('cancelsendemailbtn');
const sendrectionemailbtn = document.getElementById('submitsendemail');

function showmsgbox(){
    rejectmailbox.classList.remove('hidden');
    overlay.classList.remove("hidden");

}

function closemsgbox(){
    overlay.classList.add("hidden");
    rejectmailbox.classList.add('hidden');
}

rejectcancelbtn.addEventListener('click',closemsgbox)

rejectbtn.addEventListener('click',showmsgbox);

function submitsendemail(){

    const email = document.getElementById('email').value;
    const reason = document.getElementById('reason').value;
    const sellername = document.getElementById('sellername').value;
    const reqid = document.getElementById('requestid').value;
    // console.log(reason);
      if(reason === ""){
          alert("Please Provide a Reason !");

      }
    else{
          let formdata = new FormData();
          formdata.append("email",email);
          formdata.append("reason",reason);
          formdata.append("sellername",sellername);
          formdata.append("reqid",reqid);
          var ajax = new XMLHttpRequest();

          ajax.open("POST", "http://localhost/gardening_hub/admins/sendCategoryRejectedEmail", true);
          ajax.send(formdata);

          ajax.onreadystatechange = function () {
              if (this.readyState == 4 && this.status == 200){
                  if (this.responseText === "true"){
                      window.location.href = "http://localhost/gardening_hub/admins/newproductcategories";
                  }
              }

          };
          overlay.classList.add("hidden");
          rejectmailbox.classList.add('hidden');
      }

}


sendrectionemailbtn.addEventListener('click',submitsendemail)