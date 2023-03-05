const modal = document.getElementById("delete-modal");
const buttons = document.querySelectorAll(".delete_buttonsaa");
// Get the confirm delete button
const confirmButton = document.getElementById("confirm-delete");

// Get the cancel delete button
const cancelButton = document.getElementById("cancel-delete");

buttons.forEach(function(btn){
    btn.addEventListener("click", function(){
        modal.style.display = "block";
        const id = btn.dataset.wishlistid;

        const container = document.getElementById("modal-button");
        container.innerHTML = 
                    '<form action="http://localhost/gardening_hub/harvests/deletHarvest/'+id +'" method="POST">'+
                        '<button id="confirm-delete" type="submit">Yes</button>'+
                    '</form>'+

                    // '<a href="http://localhost/gardening_hub/harvests/viewAddMyHarvest">'+
                        '<button id="cancel-delete" onclick="close_modal();">No</button>'
                    // '</a>';
    });
});

function close_modal(){
    modal.style.display = "none";
}

// cancelButton.addEventListener("click", function() {
//     modal.style.display = "none";
// });

// confirmButton.addEventListener("click", function() {
//     modal.style.display = "none";
// });
