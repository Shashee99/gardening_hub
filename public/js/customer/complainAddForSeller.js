const complain_btn = document.getElementById("complain_btn");
const form = document.querySelector(".complain_form");
const err = document.getElementById("max-err");

complain_btn.addEventListener("click", function()
{
    let httpRequest = new XMLHttpRequest();
    let seller_id = this.value;

    httpRequest.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            let response = JSON.parse(this.responseText);
            console.log(response);

            if(response.length <= 4)
            {
                complain_btn.style.display = "none";
                form.style.display = "block";   
            }
            else
            {
                err.innerHTML = "You allready added maximum complains for this Seller";
            }

        }
    }
    httpRequest.open('POST', "http://localhost/gardening_hub/complaints/isaddedcomplain/"+seller_id, true);
    httpRequest.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    httpRequest.send();

});

function complainValidate()
{
    let complain_txt = document.getElementById("complain");
    let err = document.getElementById("complain_err");

    if(complain_txt.value=="")
    {
        err.innerHTML = "Please enter the complain";
        return false;
    }
    else
    {
        return true;
    }
};
function closemodal()
{
    let complain_txt = document.getElementById("complain");
    let err = document.getElementById("complain_err");
    const complain_btn = document.getElementById("complain_btn");
    const form = document.querySelector(".complain_form");

    complain_txt.value="";
    err.innerHTML="";
    complain_btn.style.display = "block";
    form.style.display = "none";
};