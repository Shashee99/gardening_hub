const review_btn = document.getElementById("review-btn");
const err_msg = document.getElementById("error-msg");
const err_msg2 = document.getElementById("error-msg2");
const review_modal = document.querySelector(".review-rating-add");

review_btn.addEventListener("click", function()
{
    let httpRequest = new XMLHttpRequest();
    let seller_id = this.value;

    httpRequest.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            let response = JSON.parse(this.responseText);
            console.log(response);

            if(response == "true1")
            {
                console.log("Executed");
                err_msg.style.display = "block";
                
            }
            else if(response == "true2")
            {
                review_modal.style.display = "block";
                review_btn.style.display = "none";
            }
            else if(response == "true3")
            {
                err_msg2.style.display = "block";
            }

        }
    }
    console.log("http://localhost/gardening_hub/sellers/isaddedreview/"+seller_id);
    httpRequest.open('POST', "http://localhost/gardening_hub/sellers/isaddedreview/"+seller_id, true);
    httpRequest.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    httpRequest.send();
});