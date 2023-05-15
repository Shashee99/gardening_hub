const modal = document.getElementById("delete-modal");
const buttons = document.querySelectorAll(".delete_buttons");
// Get the confirm delete button
const confirmButton = document.getElementById("confirm-delete");

// Get the cancel delete button
const cancelButton = document.getElementById("cancel-delete");

buttons.forEach(function(btn){
    btn.addEventListener("click", function(){
        modal.style.display = "block";
        const id = btn.dataset.problemid;

        const container = document.getElementById("modal-button");
        container.innerHTML = 
                    '<form action="http://localhost/gardening_hub/problems/deletProblem/'+id +'" method="POST">'+
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