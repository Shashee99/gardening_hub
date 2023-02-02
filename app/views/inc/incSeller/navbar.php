<style>
    .logo{
        background: url("<?php echo URLROOT; ?>/img/seller/logo.png");
        width: 158px;
        height: 148px;

    }
    ul{
        list-style: none;
        display: flex;
        padding: 55px 0px
    }
    .an{

        font-family: 'Source Sans 3';
        font-style: normal;
        font-weight: 400;
        font-size: 20px;
        line-height: 28px;
        letter-spacing: 0.08em;
        text-decoration: none;
        padding: 10px;
        margin-right: 10px;

        color: #000000;
    }
    .an:hover{
        border-bottom: 5px solid #EAFFD0 ;
    }
    nav{
        display: flex;
        width: 1200px;
    }

    .btn{
            background-color: white;
            color: green;
            padding: 5px 10px;
            border-radius: 50px;
            text-align: center;
            display: inline-block;
            font-size: 20px;
            margin: 10px 30px;
            cursor: pointer;
            text-decoration:none;
            margin-left: 500px;
        }

    .container{
        position: relative;
        max-width: 1305px;
        margin: 0 auto;
        padding: 0 40px;
        z-index: 12;
    }
    
    
    
</style>

<div class="container">
    <nav>
        <div class="logo"></div>
        <div class="navs">
            <ul>
                <li><a href="<?php echo URLROOT; ?>" class="an">Home</a></li>
                <li><a href="<?php echo URLROOT; ?>pages/about" class="an">About</a></li>
                <li><a href="<?php echo URLROOT; ?>pages/contactus" class="an">Contact Us</a></li>
                <?php if(isset($_SESSION['user_id'])) : ?>
                <li><li><a href="<?php echo URLROOT; ?>/users/logout" class="btn">Logout</a></li></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</div>