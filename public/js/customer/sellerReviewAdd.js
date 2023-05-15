function reviewAddModal(seller_id)
{
    let modal = document.querySelector(".review-rating-add");
    let httpRequest = new XMLHttpRequest();
    let errmsg3 = document.getElementById("error3");

    httpRequest.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            let response = JSON.parse(this.responseText);
            console.log(response);
            if(response == "true1")
            {
                errmsg3.innerHTML = "You allready review";
            }
            else if(response == "true2")
            {
                errmsg3.innerHTML = "You can add review after purchasing product from seller";
            }
            else
            {
                modal.style.display = "block";
            }
            
        }
    }
    httpRequest.open('POST', "http://localhost/gardening_hub/sellers/isaddedreview", true);
    httpRequest.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    httpRequest.send("seller_id="+seller_id);
   
};

function closeModal()
{
    let modal = document.querySelector(".review-rating-add");
    const errmsg1 = document.getElementById("err1");
    const errmsg2 = document.getElementById("err2");
    const service = document.querySelectorAll('input[name="service"]');
    const product = document.querySelectorAll('input[name="product"]');
    const overall = document.querySelectorAll('input[name="overall"]');
    const review = document.getElementById("review");

    modal.style.display = "none";
    errmsg1.innerHTML="";
    errmsg2.innerHTML="";
    service.checked= false;
    product.checked= false;
    overall.checked= false;
    review.value ="";
}

function validateReview(product_id,cus_id)
{
    const errmsg1 = document.getElementById("err1");
    const errmsg2 = document.getElementById("err2");
    const service = document.querySelectorAll('input[name="service"]');
    const product = document.querySelectorAll('input[name="product"]');
    const overall = document.querySelectorAll('input[name="overall"]');
    const review = document.getElementById("review");
    let serviceChecked = false;
    let productChecked = false;
    let overallChecked = false;


    service.forEach(function(button) {
        if (button.checked) {
            serviceChecked = true;
        }
    });
    product.forEach(function(button) {
        if (button.checked) {
            productChecked = true;
        }
    });
    overall.forEach(function(button) {
        if (button.checked) {
            overallChecked = true;
        }
    });
    if (!serviceChecked || !productChecked || !overall) 
    {
        errmsg1.innerHTML = "Please selecet all ratings";
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
    
    // else
    // {
    //     let httpRequest = new XMLHttpRequest();

    //     httpRequest.onreadystatechange = function()
    //     {
    //         if(this.readyState == 4 && this.status == 200)
    //         {
    //             let response = JSON.parse(this.responseText);
    //             console.log(response);
    //             if(response === "true")
    //             {
    //                 errmsg2.innerHTML = "You already added review";
    //                 return false;
    //             }
    //             else
    //             {
    //                 return true;
    //             }
                
    //         }
    //     }
    //     httpRequest.open('POST', "http://localhost/gardening_hub/products/isAddedProductReview", true);
    //     httpRequest.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    //     httpRequest.send("product_id="+product_id+"&cus_id="+cus_id);

    // }
 
}


