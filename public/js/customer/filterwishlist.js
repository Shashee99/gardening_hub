let fromDate = document.getElementById("from");
let toDate = document.getElementById("to");
let state = document.getElementById("state");
let container = document.querySelector("#table_body");

    fromDate.addEventListener('input', filterData);
    toDate.addEventListener('input', filterData);
    state.addEventListener('change',filterData);

function filterData()
{
    let fDate = fromDate.value;
    let tDate = toDate.value;
    let state_value = state.value;

    if((fromDate.value > toDate.value) && toDate.value != '' && fromDate.value != '')
    {
        let err =  document.getElementById("date-err");
        err.innerHTML = "From date should be less than to date";   
    }
    else
    {
        let err =  document.getElementById("date-err");
        err.innerHTML = ""; 
        let empty = document.querySelector(".empty_record");
        empty.innerHTML = "";
        let httpRequest = new XMLHttpRequest();

        httpRequest.onreadystatechange = function()
        {
            if(this.readyState == 4 && this.status == 200)
            {
                let response = JSON.parse(this.responseText);
                let out = "";
                if(response.length == 0)
                {
                    empty.innerHTML = "<h3>Records Not Found</h3>";
                }
                else
                {
                    for(let item of response)
                    {
                        out += ` 
                                    <tr>
                                        <td>
                                            <a href="http://localhost/gardening_hub/products/viewOneProduct/${item.product_no}">
                                                <img src="http://localhost/gardening_hub/img/upload_images/product_cover_photo/${item.image}" alt="">
                                            </a>
                                        </td>
                                        <td>${item.order_date_time}</td>
                                        <td> ${item.title}</td>
                                        <td>${item.count}</td>
                                        <td>
                                            <a href="http://localhost/gardening_hub/sellers/sellerDetails/${item.seller_id}" class="seller_name">${item.shop_name}</a>
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
                                        <td class="last">
                                            <a  class="cancel" href="">Cancel</a>
                                            <a class="delete" href="">Delete</a>
                                        </td>
                                    </tr>                       
                        `;
                    }
                }
                container.innerHTML = out;
            }
        }
        httpRequest.open('POST', "http://localhost/gardening_hub/wishlists/filterwishlist", true);
        httpRequest.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        httpRequest.send('fromDate=' + fDate + '&toDate=' + tDate + '&state=' + state_value );
    }

};

