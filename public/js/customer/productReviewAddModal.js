function reviewAddModal(product_id,cus_id)
{
    let modal = document.querySelector(".review-rating-add");
    let httpRequest = new XMLHttpRequest();
    let errmsg3 = document.getElementById("err3");

    httpRequest.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            let response = JSON.parse(this.responseText);
            console.log(response);
            if(response == "true")
            {
                errmsg3.innerHTML = "You already added review";
            }
            else
            {
                modal.style.display = "block";
            }
            
        }
    }
    httpRequest.open('POST', "http://localhost/gardening_hub/products/isAddedProductReview", true);
    httpRequest.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    httpRequest.send("product_id="+product_id+"&cus_id="+cus_id);

    
};

function closeModal()
{
    let modal = document.querySelector(".review-rating-add");
    const errmsg1 = document.getElementById("err1");
    const errmsg2 = document.getElementById("err2");
    const ratingButtons = document.querySelectorAll('input[name="rating"]');
    const review = document.getElementById("review");

    modal.style.display = "none";
    errmsg1.innerHTML="";
    errmsg2.innerHTML="";
    ratingButtons.checked= false;
    review.value ="";
}

function validateReview(product_id,cus_id)
{
    const ratingButtons = document.querySelectorAll('input[name="rating"]');
    const errmsg1 = document.getElementById("err1");
    const errmsg2 = document.getElementById("err2");
    const review = document.getElementById("review");
    let ratingChecked = false;

    ratingButtons.forEach(function(button) {
        if (button.checked) {
        ratingChecked = true;
        }
    });
    if (!ratingChecked) {
        errmsg1.innerHTML = "Please selecet rating";
        if(!review.value)
        {
            errmsg2.innerHTML = "Please add a review";
        }
        return false;
    }
    else if(!review.value)
    {
        errmsg2.innerHTML = "Please add a review";
        return false;
    }
    else
    {
        let httpRequest = new XMLHttpRequest();

        httpRequest.onreadystatechange = function()
        {
            if(this.readyState == 4 && this.status == 200)
            {
                let response = JSON.parse(this.responseText);
                console.log(response);
                if(response === "true")
                {
                    errmsg2.innerHTML = "You already added review";
                    return false;
                }
                else
                {
                    return true;
                }
                
            }
        }
        httpRequest.open('POST', "http://localhost/gardening_hub/products/isAddedProductReview", true);
        httpRequest.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        httpRequest.send("product_id="+product_id+"&cus_id="+cus_id);

    }
 
}