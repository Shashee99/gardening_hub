<?php require_once APPROOT . '/views/inc/incAdmin/header.php'; ?>


    <h2>Please provide reason to reject briefly.</h2>

    <br>
    <br>
    <div class="rejectuser">
        <form action="<?=URLROOT;?>/admins/rejectauser/" method="post">
            <label for="email" class="rejectemail">Email :</label>
            <input type="email" id="email" name="email" value="<?=$data['email'];?>" readonly class="rejectemail emailbox"><br><br>

            <label for="reason" class="rejectemail">Reason :</label> <br>
            <textarea class="rejectemailtextbox" id="reason" name="reason" style="width:400px;height:100px;"></textarea><br><br>

            <input class="delete rejectsend" type="submit" value="Send">
        </form>

    </div>

<?php require_once APPROOT . '/views/inc/incAdmin/footer.php'; ?>