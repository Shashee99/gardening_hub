let category = document.querySelector("#category");
let sub_category = document.querySelector("#sub-cateogry");
let price = document.querySelector("#price");
let product_wraper = document.querySelector(".products-details");

function getProducts() {
    // Get the selected filter options
    const cat = category.value;
    const subcat = sub_category.value;
    const amount = price.value;
  
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
                        <div class="product">
                            <a href="http://localhost/gardening_hub/products/viewOneProduct/${item.product_no}">
                                <img src="http://localhost/gardening_hub/img/upload_images/product_cover_photo/${item.photo}" alt="">
                            </a>
                            <h4>${item.title}</h4>
                            <h5>${item.seller}</h5>
                            <p>Available : ${item.quantity}</p>
                            <h4>Price Rs.${item.price}</h4>
                            <div class="product-add">
                            <a id="wishlitaddbtn" href="#" onclick="popupmodal('${item.product_no}','${item.quantity}')">
                                <input type="submit" name="add-btn" value="Add to Wishlist">
                            </a>
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
    xhr.open('GET', `http://localhost/gardening_hub/products/filterProducts?category=${cat}&sub-category=${subcat}&price=${amount}`, true);
    xhr.send();
}
  
  // Update the product list when a filter option is changed
  category.addEventListener('change', getProducts);
  sub_category.addEventListener('change', getProducts);
  price.addEventListener('change', getProducts);