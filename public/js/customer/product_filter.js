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
                        <div class="product">
                            <a href="http://localhost/gardening_hub/products/viewOneProduct/${item.product_no}">
                                <img src="http://localhost/gardening_hub/img/upload_images/product_cover_photo/${item.photo}" alt="">
                            </a>
                            <h4>${item.title}</h4>
                            <div class="ratings">`;

                            if(item.ratings != null)
                            {
                                let rate_of_product = parseFloat(item.ratings);
                                let round_rate = parseFloat(rate_of_product.toFixed(1));
                                let full_stars = Math.floor(rate_of_product);
                                let half_star = 0;
                                for(let i=0;i<full_stars;i++)
                                {
                                    out += `
                                        <img src="http://localhost/gardening_hub/img/customer/star.png" alt="">
                                    `;
                                }
                                let fraction = round_rate%1;
                                if(fraction >= 0.3 && fraction <=0.9)
                                {
                                    half_star = 1;
                                    out += `
                                        <img src="http://localhost/gardening_hub/img/customer/rating.png" alt="">
                                    `;
                                }
                                let empty_star = 5-full_stars-half_star;
                                for(let i=0; i<empty_star; i++)
                                {
                                    out += `
                                        <img src="http://localhost/gardening_hub/img/customer/star1.png" alt="">
                                    `;
                                }
                            }
                            else
                            {
                                out += `
                                    <img src="http://localhost/gardening_hub/img/customer/star1.png" alt="">
                                    <img src="http://localhost/gardening_hub/img/customer/star1.png" alt="">
                                    <img src="http://localhost/gardening_hub/img/customer/star1.png" alt="">
                                    <img src="http://localhost/gardening_hub/img/customer/star1.png" alt="">
                                    <img src="http://localhost/gardening_hub/img/customer/star1.png" alt="">

                                `;
                            }
                            
                            out += `
                            </div>
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

            // console.log(out);

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