const nic = document.getElementById("nic");
const contact = document.getElementById("phone");
const contactLabel = document.getElementById("phone_lable");
const nicLable = document.getElementById("nic-lable");
const email = document.getElementById("gmail");
const emailLabel = document.getElementById("email-label");
const submit= document.getElementById('sub');
const user=document.getElementById('username');
const password=document.getElementById('password');
const passwordLabel=document.getElementById('passwordlable');
const cpassword=document.getElementById('cpass');
const cpasswordLabel=document.getElementById('cpass_lable');
const username = document.getElementById("userN");
const usernameLabel = document.getElementById("username-label");





function usernameexit(){
    var xhttp = new XMLHttpRequest();   
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            console.log(response);

            if (response == "true") {
                usernameLabel.innerHTML = "Username already exists";
                usernameLabel.style.color = "red";
                usernameflag=1;
            } else {
                usernameLabel.innerHTML = "";
                usernameLabel.style.color = "black";
                username.style.borderColor = "green";
                username.style.borderWidth = "2px";
                // submit.disabled = false;
                usernameflag=0;
            }
        }
    };
    xhttp.open("POST", "http://localhost/advisor_project/controller/advisor_controller/validatiionController.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("username=" + username.value);
}





cpassword?.addEventListener("input", function () {
    if (cpassword.value != password.value) {
        cpasswordLabel.innerHTML = "Passwords do not match";
         cpasswordLabel.style.color = "red";
        // cpassword.style.borderColor = "red";
        // cpassword.style.borderWidth = "2px";
        submit.disabled = true;
        
    } else {
        cpasswordLabel.innerHTML = "";
        // cpasswordLabel.style.color = "black";
        // cpassword.style.borderColor = "green";
        // cpassword.style.borderWidth = "2px";
        submit.disabled = false;
        
    }
});


password?.addEventListener("input", function () {
    //password must be 8 characters long and contain at least one number and one lowercase letter and one uppercase letter
    if(password.value.length < 8){
        passwordLabel.innerHTML = "Password must be 8 characters long";
        passwordLabel.style.color = "red";
        submit.disabled = true;
    }else if(!password.value.match(/[a-z]/) || !password.value.match(/[A-Z]/)){
        passwordLabel.innerHTML = "Password must contain at least one  ";
        passwordLabel.innerHTML ="lowercase letter and one uppercase letter";
        passwordLabel.style.color = "red";
        submit.disabled = true;
    }else if(!password.value.match(/[0-9]/)){
        passwordLabel.innerHTML = "Password must contain at least one number";
        passwordLabel.style.color = "red";
        submit.disabled = true;
        
    }else{
        passwordLabel.innerHTML = "";
        // passwordLabel.style.color = "black";
        // password.style.borderColor = "green";
        // password.style.borderWidth = "2px";
        submit.disabled = false;
        
    }
});







nic?.addEventListener("input", function () {
    //should include 10 numbers
    var pattern=/^([0-9]{9}[x|X|v|V]|[0-9]{12})$/;
    if (!pattern.test(nic.value)) {
        nicLable.innerHTML = "Invalid nic Number";
        nicLable.style.color = "red";
        submit.disabled = true;
    } else {
        nicLable.innerHTML = " ";
        //nicLable.style.color = "black";
        nic.style.borderColor = "green";
        nic.style.borderWidth = "2px";
        submit.disabled = false;
    }
});



contact?.addEventListener("input", function () {
    //should include 9 numbers
    var pattern=/^0[0-9]\d{8}$/g;
    if (!pattern.test(contact.value)) {
        contactLabel.innerHTML = "Invalid Contact Number";  
        contactLabel.style.color = "red";
        submit.disabled = true;
    } else {
        contactLabel.innerHTML = " "; 
        //contactLabel.style.color = "black";
        contact.style.borderColor = "green";
        contact.style.borderWidth = "2px";
        submit.disabled = false;
    }
});


email?.addEventListener("input", function () {
    var reg = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    if (!reg.test(email.value)) {
        emailLabel.innerHTML = "Invalid Email";
        emailLabel.style.color = "red";
        submit.disabled = true;
    } else {
        emailLabel.innerHTML = " ";
        //emailLabel.style.color = " ";
                email.style.borderColor = "green";
                email.style.borderWidth = "2px";
                submit.disabled = false;



    }
});