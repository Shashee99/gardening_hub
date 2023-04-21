let selectMenu = document.querySelector("#category");

selectMenu.addEventListener("change", function()
{
    let httpRequest = new XMLHttpRequest();
    let categoryName = this.value;
    let out;

    if(categoryName !== "")
    {
        httpRequest.onreadystatechange = function()
        {
            if(this.readyState == 4 && this.status == 200)
            {
                let response = JSON.parse(this.responseText);
                out = "<option value=\"\">All Sub Category</option>";

                for (var a = 0; a < response.length; a++)
                {
                    out += `<option value =\"${response[a].sub_category}\">${response[a].sub_category}</option>`;
                }
                document.getElementById("sub-cateogry").innerHTML = out;
            };
        }
        httpRequest.open('POST', "http://localhost/gardening_hub/ProductCategories/getsubcategory", true);
        httpRequest.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        httpRequest.send("category="+categoryName);
    }
    else
    {
        out = "<option value=\"\">All Sub Category</option>";
        document.getElementById("sub-cateogry").innerHTML = out;
    }
});