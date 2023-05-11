let selectMenu = document.querySelector("#category");
let container = document.querySelector(".new-tech-wraper");

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
                        <div class="new_technology">
                            <div class="part1">
                                <div class="photo">
                                    <img src="http://localhost/gardening_hub/img/upload_images/advisor_pp/${item.advisor_photo}" alt="">
                                </div>
                                <div class="date">
                                    <h5>${item.advisor_name}</h5>
                                    <h6>${item.date}</h6>
                                    <p>Category : ${item.cat}</p>
                                </div>
                            </div>
                            <h3>${item.title}</h3>
                            <div class="content">
                                <p>${item.content}</p>
                            </div><br>

                            <div class="tech-photos">`
                                for(let pht of item.tech_photos)
                                {
                                    out += ` <img src="http://localhost/gardening_hub/img/upload_images/new_tech_photos/${pht}" alt="">`
                                    
                                }
                        
                        out += `</div><br>
                
                        </div>
                    `;
                }

            }
            container.innerHTML = out;
        };
    }
    httpRequest.open('POST', "http://localhost/gardening_hub/newTechs/filterNewTech", true);
    httpRequest.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    httpRequest.send("category="+categoryName);

});