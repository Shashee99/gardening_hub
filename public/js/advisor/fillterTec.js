
  // function filterTec(div){
  //   //console.log(div.value);
  //   for (let index = 1; index < div.options.length; index++) {
  //       console.log(document.querySelectorAll('did'));
  //       // if(div.value!=div.options[index].value){
  //       //     //console.log(document.getElementById(div.options[index].value).style.display);
  //       //     document.getElementById(div.options[index].value).style.display="none";
  //       // }else if(div.value==div.options[index].value){
  //       //      document.getElementById(div.value).style.display="inline-flex";
  //       // }
  //       //console.log(div.options[index].value);
        
  //   }
    
  // }



  let category = document.querySelector("#category");
  //let category=document.getElementById('category');
// let sub_category = document.querySelector("#sub-cateogry");
// let price = document.querySelector("#price");
let product_wraper = document.querySelector(".tecno-details");

function getProducts() {
    // Get the selected filter options
    const cat = category.value;
    console.log(cat);
    // const subcat = sub_category.value;
    // const amount = price.value;
   //  console.log(cat);
    // console.log(subcat);
    // console.log(amount);
  
    // Make an AJAX request to get the filtered products
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
        // Parse the JSON response and update the product list
            let response = JSON.parse(this.responseText);
            let out = "";
            // const products = JSON.parse(this.responseText);
            // productList.innerHTML = '';

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
                              <div class="card-data-filed" id="">
                              <!-- <div class="hide-dive"></div> -->
                          <div class="profile">
                                <div class="headear">
                                    <div class="div-profile"><div class='pp'><img style=' width: 70px; height: 70px; border-radius: 50px;'src="" alt=""></div></div>
                                    <div class="category-filed">
                                        <div><span style=' font-weight:500 ;'>Name:</span></div>
                                        <div><span> :9.25</span></div>
                                        <div><span  style=' font-weight:500 ;'>category: </span></div>
                                    </div>
                                </div>
                                <div class="title"><span>${item.title}</span></div>
                                  
                                <div class="content"><p></p></div>
                                <div class="photo">
                                    
                          
                                </div>
                                  
                                <div class="but">
                                    <div class="update"><a href="<?=URLROOT?>/advisors/updateTecnhology"><i class="fa-solid fa-pen-to-square"></i>Update</a></div>
                                    <div class="update"><a href="<?=URLROOT?>/advisors/tecnoDelete"><i class="fa-solid fa-eye-slash"></i>Delete</a></div>
                                    
                                </div>
                              
                          </div>

                          
                          

                      </div>
                              `;
                }
            }
            product_wraper.innerHTML = out;

            console.log(out);

            // products.forEach(function(product) {
            //   const productItem = document.createElement('div');
            //   productItem.classList.add('product-item');
            //   productItem.innerHTML = `
            //     <h3>${product.name}</h3>
            //     <p>Category: ${product.category}</p>
            //     <p>Sub-Category: ${product.subCategory}</p>
            //     <p>Price: ${product.price}</p>
            //   `;
            //   productList.appendChild(productItem);
            // });
        }
    };
    xhr.open('GET', `http://localhost/gardening_hub/Advisor/addtecno?category=${cat}`, true);
    xhr.send();
}
  
  // Update the product list when a filter option is changed
  category.addEventListener('change', getProducts);
  // sub_category.addEventListener('change', getProducts);
  // price.addEventListener('change', getProducts);