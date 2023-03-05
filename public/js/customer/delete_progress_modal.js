const modal = document.getElementById("delete-modal");
const buttons = document.querySelectorAll(".delete_buttons");
// Get the confirm delete button
const confirmButton = document.getElementById("confirm-delete");

// Get the cancel delete button
const cancelButton = document.getElementById("cancel-delete");

buttons.forEach(function(btn){
    btn.addEventListener("click", function(){
        modal.style.display = "block";
        const id = btn.dataset.progressid;

        const container = document.getElementById("modal-button");
        container.innerHTML = 
                    '<form action="http://localhost/gardening_hub/progresses/deleteprogress/'+id +'" method="POST">'+
                        '<button id="confirm-delete" type="submit">Yes</button>'+
                    '</form>'+

                    '<a href="http://localhost/gardening_hub/progresses/viewMyProgress">'+
                        '<button id="cancel-delete">No</button>'+
                    '</a>';
    });
});

cancelButton.addEventListener("click", function() {
    modal.style.display = "none";
});

confirmButton.addEventListener("click", function() {
    modal.style.display = "none";
});
