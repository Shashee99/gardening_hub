<?php require APPROOT . '/views/inc/incSeller/header.php'; ?>

<div class="content">
    <div class="container">
        <div class="addint_part">
            <form action="<?= URLROOT; ?>/sellers/add1" method="POST">
                <div class="additems">
                    <input type="text" name="items" placeholder="Items that you wants to add" value="">
                    <p class="error items_err"></p>
                </div>
                <div class="descripitems">
                    <input type="text" name="_description" placeholder="More details about items" value="">
                    <p class="error desciption_err_err"></p>
                </div>
                <div id="btn_area">                   
                    <div class="buton">
                        <input type="submit" class="btn_nxt" id="btn_nxt" value="Request"></input>
                    </div>
                </div>
                <!-- <p style="color:red" class="error title_err" id="cat_err"> <?php echo $data['cat_err']; ?> </p> -->
            </form>
        </div>
        <div class="satatus_part">
            <h3>Pending requests</h3>
            <div class="pen_status">
                <table>
                    <tr id="header">
                        
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    
</div>

<?php require APPROOT . '/views/inc/incSeller/footer.php'; ?>