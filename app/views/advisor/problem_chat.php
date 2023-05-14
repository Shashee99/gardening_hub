<?php require_once APPROOT . '/views/inc/incAdvisor/inchat_head.php'; ?>
<!-- chat for problem -->

<div class="chat-contener">
    <?php require_once APPROOT . '/views/inc/incAdvisor/navbar.php'; ?>
    <div class="chat-contener-2">
        <?php require_once APPROOT . '/views/inc/incAdvisor/sidebar.php'; ?>
     <div class="chat-contener-3"> 
            <div class="filtercontainer">
                
                <select name='category' id="category"   class="type-cetagory"  >
                 <option value="all">Select categories</option>   
                 <option value="vegetable">Vegetable </option>
                 <option value="fruits">Fruits</option>
                 <option value="flowers">Flowers</option>
                 <option value="others" >Others</option>
                </select>

                <select name="checked" id="replyornot">
                    <option value="allproblem">All Problems</option>
                    <option value="replied">Replied Problems</option>
                </select>
         </div>       
         <div id="problems" class="chat-content">
             <?php flash('send reply');?>
            <?php foreach ($data as $problems) { ?>
                <div class="chat-pot">
                    <div class="user-problem">
                        <div class="user-profile">
                            <img src="<?= URLROOT; ?>/img/upload_images/customer_pp/<?= $problems['customerpp'] ; ?>" alt="" >
                            <div>
                                <h5>Name : <?= $problems['name'];?> </h5>
                                <h6><?= $problems['date'];?></h6>
                                <h6>Category : <?= $problems['category'] ; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="content-problem">
                        <h3><u><?= $problems['title'] ; ?></u> </h3>
                        <p><?= $problems['content'] ; ?></p>
                    </div>
                    <div class="image-problem">
                        <?php foreach ($problems['photos'] as $row){
                            ?>
                            <div class=" image-plants"><img src="<?= URLROOT; ?>/img/upload_images/problem_photo/<?= $row ; ?>" class="preview-image" alt="" ></div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="reply-view">
                        <ul>
                            <li><a style="text-decoration: none " href="<?=URLROOT?>/advisors/problem_chat_openoneproblem/<?= $problems['id'];?>"><i class="fa-regular fa-comment"></i>Reply</a></li>
                        </ul>
                    </div>

                </div>
            <?php } ?>

        </div>
    </div>

 </div>





</div>
<script>
    // Get all the image elements with the specified class
    var images = document.querySelectorAll('.preview-image');

    // Loop through each image element
    images.forEach(function(image) {
        // Create a modal element
        var modal = document.createElement('div');
        modal.classList.add('modal');
        document.body.appendChild(modal);

        // Create an image element inside the modal
        var modalImage = document.createElement('img');
        modalImage.src = image.src;
        modal.appendChild(modalImage);

        // Add a click event listener to the image element
        image.addEventListener('click', function() {
            modal.classList.add('open');
        });

        // Add a click event listener to the modal element to close it
        modal.addEventListener('click', function() {
            modal.classList.remove('open');
        });
    });


//    problem filtering
    const problems = document.getElementById('problems');
    const category = document.getElementById('category');
    const repornot = document.getElementById('replyornot');

    function getfilteron(){
        const cat = category.value;
        const repliedornot = repornot.value;
        console.log(cat);
        console.log(repliedornot);
        var ajax = new XMLHttpRequest();
        let formdata = new FormData();
        formdata.append("category",cat);
        formdata.append("replied",repliedornot);
        ajax.open("POST", "http://localhost/gardening_hub/advisors/filterproblems", true);
        ajax.send(formdata);
        ajax.onreadystatechange = function () {
       let html = "";    let problemphotos = "";
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                let respones=JSON.parse(this.responseText)
                
                if(respones.length==0){
                  html+= `
                    <div class='empty_record' >
                        <h2>Records Not Found</h2>
                    </div>
                    `;

                  }

                if(respones.length>0){
                   for(let item of  respones){
                       html+=`
                    <div class="chat-pot">
                       <div class="user-problem">
                           <div class="user-profile">
                            <img src="http://localhost/gardening_hub/img/upload_images/customer_pp/${item.customer_photo}" alt="" >
                            <div>
                                <h5>Name : ${item.customer_name} </h5>
                                <h6>${item.date_time}</h6>
                                <h6>Category : ${item.category}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="content-problem">
                        <h3><u>${item.title}</u> </h3>
                        <p>${item.content}</p>
                    </div>
                    <div class="image-problem">`
                         for(let pht of item.photos){
                           html+=` <div class=" image-plants"><img src="http://localhost/gardening_hub/img/upload_images/problem_photo/${pht}" class="preview-image" alt="" ></div>`
                         }
                      html+=` 
                       </div>
                       <div class="reply-view">
                          <ul>
                            <li><a style="text-decoration: none " href="http://localhost/gardening_hub/advisors/problem_chat_openoneproblem/${item.problem_id}"><i class="fa-regular fa-comment"></i>Reply</a></li>
                          </ul>
                      </div>

                   </div>
         
                  `;


                }

                }else{
                    
                }


                problems.innerHTML = html;

            }
        };


    }

    category.addEventListener('change',getfilteron);
    repornot.addEventListener('change',getfilteron);
</script>
<?php require_once APPROOT . '/views/inc/incAdvisor/inchat_footer.php'; ?>