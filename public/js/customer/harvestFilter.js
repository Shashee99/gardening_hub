let selectMenu = document.querySelector("#category");
let container = document.querySelector(".harvest-wrap");

selectMenu.addEventListener("change", function()
{
    let httpRequest = new XMLHttpRequest();
    let categoryName = this.value;

    httpRequest.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            let response = JSON.parse(this.responseText);
            let out = "";
            if(response.length == 0)
            {
                out += `
                    <div class='empty_record' >
                        <h2>Rsecords Not Found</h2>
                    </div>
                `;
            }
            else
            {
                for(let item of response)
                {
                    out += `
                    <div class="harvest">
                    <div class="part1">
                        <div class="photo">
                            <img src="http://localhost/gardening_hub/img/upload_images/customer_pp/${item.photo_path}" alt="">
                        </div>
                        <div class="date">
                            <h5>${item.cus_name}</h5>
                            <h6>${item.date}</h6>
                            <p>Category : ${item.category}</p>
                        </div>
                    </div>
                    <h3>${item.title}</h3>
                    <div class="content">
                        <p>${item.description}</p>
                    </div>
                    <div class="last">

                        <div class="images">`
                        for(let pht of item.photo)
                        {
                            out += ` <img src="http://localhost/gardening_hub/img/upload_images/harvest_photo/${pht}" alt="">`
                            
                        }
                        
                        out += `</div>
                        <div class="delete_btn">
                            <button class="delete_buttonsaa" data-wishlistID="${item.id}">DELETE</button>      
                        </div>
                    </div><br>
            
                </div>
                `;
                }
            }
            
            container.innerHTML = out;
            const modal = document.getElementById("delete-modal");
            const buttons = document.querySelectorAll(".delete_buttonsaa");
            // Get the confirm delete button
            const confirmButton = document.getElementById("confirm-delete");

            // Get the cancel delete button
            const cancelButton = document.getElementById("cancel-delete");

            console.log("Hello");

            buttons.forEach(function(btn){
                btn.addEventListener("click", function(){
                    modal.style.display = "block";
                    const id = btn.dataset.wishlistid;

                    const container = document.getElementById("modal-button");
                    container.innerHTML = 
                                '<form action="http://localhost/gardening_hub/harvests/deletHarvest/'+id +'" method="POST">'+
                                    '<button id="confirm-delete" type="submit">Yes</button>'+
                                '</form>'+

                                '<a href="http://localhost/gardening_hub/harvests/viewAddMyHarvest">'+
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
        };
    }

    httpRequest.open('POST', "http://localhost/gardening_hub/harvests/filterHarvest", true);
    httpRequest.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    httpRequest.send("category="+categoryName);

});