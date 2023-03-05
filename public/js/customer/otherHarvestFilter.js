let selectMenu = document.querySelector("#category");
let container = document.querySelector(".other-harvest-wrap");

selectMenu.addEventListener("change", function()
{
    let httpRequest = new XMLHttpRequest();
    let categoryName = this.value;

    httpRequest.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200){
            let response = JSON.parse(this.responseText);
            let out = "";
            console.log(response);

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
                        out += `
                            </div>
                            
                        </div><br>
                
                    </div>
                    
                    `;
                }
            }
            container.innerHTML = out;
        };
    }
    httpRequest.open('POST', "http://localhost/gardening_hub/harvests/filterOtherHarvest", true);
    httpRequest.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    httpRequest.send("category="+categoryName);
});