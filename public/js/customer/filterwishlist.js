var fromDate = document.getElementById("from");
var toDate = document.getElementById("to");

var option1 = document.getElementById("option1");
var option2 = document.getElementById("option2");
var option3 = document.getElementById("option3");
var option4 = document.getElementById("option4");
var option5 = document.getElementById("option5");

var container = document.querySelector(".wishlist-table");

fromDate.addEventListener('input', filterData);
toDate.addEventListener('input', filterData);
option1.addEventListener('input', filterData);
option2.addEventListener('input', filterData);
option3.addEventListener('input', filterData);
option4.addEventListener('input', filterData);
option5.addEventListener('input', filterData);

function filterData()
{
    let httpRequest = new XMLHttpRequest();
    const fDate = fromDate.value;
    const tDate = toDate.value;
    const opt1 = option1.checked;
    const opt2 = option2.checked;
    const opt3 = option3.checked;
    const opt4 = option4.checked;
    const opt5 = option5.checked;

    httpRequest.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
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
                        <table>
                            <thead>
                                <th>#</th>
                                <th>Ordered Date & Time</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Seller</th>
                                <th>Status</th>
                                <th>Status Message</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="<?= URLROOT; ?>/products/viewOneProduct/${item.product_no}">
                                            <img src="<?= URLROOT; ?>/img/upload_images/product_cover_photo/${item.image}" alt="">
                                        </a>
                                    </td>
                                    <td>${item.order_date_time}</td>
                                    <td> ${item.title}</td>
                                    <td>${item.count}</td>
                                    <td>
                                        <a href="<?= URLROOT; ?>/sellers/sellerDetails/${item.seller_id}" class="seller_name"><?= $row->shop_name; ?></a>
                                    </td>
                                    <td>`
                                            
                                        if(item.status === 0)
                                        {
                                            out+= `Pending`
                                        }
                                        else if(item.status === 1 )
                                        {
                                             out+= `Rejected`
                                        }
                                        else if(item.status === 2)
                                        {
                                            out+= `Confirm & pending to Complete`
                                        }
                                        else if(item.status === 3)
                                        {
                                            out+= `Complete`
                                        }
                                        else
                                        {
                                            out+= `Not Collected`
                                        }
                                    out+= `
                                    </td>
                                    <td>`
                                            
                                        if(item.status_msg === null)
                                        {
                                            out+= `---`
                                        }
                                        else
                                        {
                                            out+= `${item.status_msg}`
                                        }
                                        
                                    out+= `    
                                    </td>
                                </tr>                       
                            </tbody>
                        </table>
                    `;
                }
            }
        }
    }
    httpRequest.open('POST', "http://localhost/gardening_hub/wishlists/filterwishlist", true);
    httpRequest.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    httpRequest.send('fromDate=' + fDate + '&toDate=' + tDate + '&option1=' + opt1 + '&option2=' + opt2 + '&option3=' + opt3 + '&option4=' + opt4 + '&option5=' + opt5);
};