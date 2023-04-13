<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>


    <div class="category parentwidth flex">
        <div class="category-item1 flex">
            <h3 class="font600">All Product categories</h3>
            <h1 class="font700" id="catCount"></h1>
        </div>
        <div class="category-item2 bglightgray">
            <div class="notification"><p class="noticount">20</p></div>
            <div class="flex">
                <img src="<?= URLROOT; ?>/img/admin/icon/addcat.png" alt=""
                     style="width: auto;height: 25px;margin-right: 10px">
                <h4 class="font400">New Product categories</h4>
            </div>
        </div>
        <div class="category-item3 flex bglightgray">
            <img src="<?= URLROOT; ?>/img/admin/icon/plus.png" alt=""
                 style="width: 25px; height: 25px; margin-right: 10px">
            <h4 class="font400">New Product categories</h4>
        </div>
    </div>
    <hr>
    <div class="sortarea flex parentwidth">
        <div class="sortbtn flex bglightgray">
            <img src="<?= URLROOT; ?>/img/admin/icon/sort.png" alt="" width="25px" height="25px">
            <p class="font500" style="font-size: 20px">Sort by</p>
        </div>
        <div class="searcharea flex">
            <input type="text" name="searchcat" id="searchcat" class="searchbox" placeholder="Search Category" onkeyup="searchcategories();">
            <div class="searchbtn bglightgray">
                <img src="<?= URLROOT; ?>/img/admin/icon/search.png" alt="" width="30px" height="25px"
                     class="searchicon">
            </div>
        </div>
    </div>
    <hr>
    <div class="cattablearea parentwidth">
        <table class="cattable">
            <thead>
            <th>#</th>
            <th>Category</th>
            <th>Sub Category</th>
            <th>Action</th>
            </thead>
            <tbody id="categoryTable">



            </tbody>
        </table>
    </div>

        <form action="#" method="POST" id="catform">
            <div class="modal hidden">
                <button class="close-modal">&times;</button>
                <h3>Enter new category</h3>
                <div>
                    <input type="text" name="category" id="category" class="modelinputfield" placeholder="Enter category">
                    <p class="errcat"></p>
                </div>
                <div>
                    <input type="text" name="category" id="subcategory" class="modelinputfield" placeholder="Enter Sub category">
                    <p class="errmsgsub"></p>
                </div>
                <input type="submit" class="done"  name="add" id="addcatbuton" value="Add" >
            </div>


        </form>




    <form method="POST" id="editcatform">
        <div class="editmodal hidden">
        <button class="closeedit-modal">&times;</button>
        <h3>Edit category</h3>
        <div>
            <input type="text" name="editcategory" id="editcategory" class="modelinputfield" value="" placeholder="Enter category">
            <p class="errcat"></p>
        </div>
        <div>
            <input type="text" name="editsubcategory" id="editsub" class="modelinputfield" value="" placeholder="Enter Sub category">
            <p class="errmsgsub"></p>
        </div>
            <input type="submit" class="done"  name="add" id="editcatbutton" value="Save" >
        </div>
    </form>
    <div class="overlay hidden"></div>

<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>