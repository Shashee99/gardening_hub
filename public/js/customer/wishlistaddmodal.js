
function popupmodal(id,available_qnt)
{
    let form = document.getElementById("form");validatequantity
    let wishlist_id = document.getElementById("wishlistid");
    let modal = document.getElementById("delete-modal");
    let availabel = document.getElementById("available");

    form.action = "http://localhost/gardening_hub/products/addProductToWishlist/"+id;
    wishlist_id.value = id;
    availabel.value = available_qnt;
    modal.style.display = "block";

    
};

function closemodal()
{
    let modal = document.getElementById("delete-modal");
    let err_msg = document.getElementById("add_error");
    let input = document.getElementById("input-field");
    input.value = '';
    err_msg.innerHTML = "";
    modal.style.display = "none";
};
function validatequantity(input_qnt,available_qnt)
{
    let err_msg = document.getElementById("add_error");
    if(!input_qnt || input_qnt==0)
    {
        err_msg.innerHTML = "Please enter quantity";
        return false;
    }
    else if(input_qnt>available_qnt)
    {
        err_msg.innerHTML = "You can purcahse only upto "+available_qnt+" items";
        return false;
    }

    return true;
}