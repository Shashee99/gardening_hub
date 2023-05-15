

function getProducts() {
    let category = document.querySelector("#category");
    const cat = category.value;
    let product_wraper = document.querySelector(".crad");
    console.log(cat);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      
        if (this.readyState == 4 && this.status == 200) {
          
            let respones=JSON.parse(this.responseText);
            let details='';
            console.log(respones);
            if(respones.length==0){
                details+= `
                    <div class='empty_record' >
                        <h2>Records Not Found</h2>
                    </div>
                    `;

            }
            else{
                for(let items of respones){
                    details+= `
                        <div class="card-data-filed" >
                        
                        <div class="profile">
                                <div class="headear">
                                    <div class="div-profile"><div class='pp'><img style=' width: 70px; height: 70px; border-radius: 50px;'src="http://localhost/gardening_hub/img/upload_images/advisor_pp/${items.advisor_photo}" alt=""></div></div>
                                    <div class="category-filed">
                                        <div><span style=' font-weight:500 ;'>Name: ${items.advisor_name}</span></div>
                                        <div><span>${items.date}</span></div>
                                        <div><span  style=' font-weight:500 ;'>category: ${items.cat}</span></div>
                                    </div>
                                </div>
                                <div class="title"><span>${items.title}</span></div>
                                
                                <div class="content"><p>${items.content}</p></div>
                                <div class="photo">`
                                for(let pht of items.tech_photos)
                                {
                                    details += ` <div class="potos"><img class='poto' src="http://localhost/gardening_hub/img/upload_images/new_tech_photos/${pht}" alt=""></div>`
                    
                                } 
                        
                                details+=`</div>
                                
                                <div class="but">
                                    <div class="update"><a href="http://localhost/gardening_hub/advisors/updateTecnhology/${items.id}"><i class="fa-solid fa-pen-to-square"></i>Update</a></div>
                                    <div class="update" onclick="del('${items.id}')"><span><i class="fa-solid fa-eye-slash"></i>Delete</span></div>
                                    
                                </div>
                                                                            
                        </div>                     
    
                    </div>
                    
                    `;
                }
         
            }

            product_wraper.innerHTML=details;

        }
    };
    xhr.open("POST","http://localhost/gardening_hub/newTechs/filterMyNewTech",true);
    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhr.send("category="+cat);
}

  