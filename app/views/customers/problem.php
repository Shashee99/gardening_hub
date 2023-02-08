<?php

    if(!isset($_SESSION['cus_id']))
    {
        redirect('users/login');
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problems</title>
    <link rel="stylesheet" href="<?= URLROOT;?>/css/customer/problem.css">
</head>
<body>
    <?php require_once APPROOT . '/views/inc/incCustomer/sidebar.php'; ?>

    <?php require_once APPROOT . '/views/inc/incCustomer/navbar.php'; ?>

    <section id="rest">
        <div class="problem-filter">
            <select name="category" id="category">
                <option value="">All</option>
                <option value="Bonzzai">Bonzzai</option>
                <option value="Hybrid Plantation">Hybrid Plantation</option>
                <option value="Others">Others</option>
            </select>
        </div>
        <div class="problem-add">
            <div class="border">
                <a href="<?= URLROOT; ?>/problems/addProblems">Add a new problem</a>
            </div>
        </div>
        <?php flash("problem_add_successfuly"); ?>
        <div class="problem-wraper">

            <?php foreach ($data['problems'] as $problems) { ?>
                <div class="problem-card">
                    <div class="problem">
                        <div class="user-info">
                            <div class="photo">
                                <img src="<?= URLROOT; ?>/public/img/upload_images/customer_pp/<?= $_SESSION['cus_photo_path']; ?>" alt="">
                            </div>
                            <div class="name-date-time">
                                <h5><?= $_SESSION['cus_name']; ?></h5>
                                <h6><?= $problems->date_time; ?></h6>

                            </div>
                        </div>
                        <h3><?= $problems->title; ?></h3>
                        <div class="problem-content">
                            <p>
                                <?= $problems->content; ?>
                            </p><br>

                        </div>
                        <a href="<?= URLROOT; ?>/problems/viewOneProblem/<?= $problems->problem_id; ?>">Replies ...</a><br>

                    </div>
                </div>
            <?php } ?>

            <div class="problem-card">
                <div class="problem">
                    <div class="user-info">
                        <div class="photo">
                            <img src="<?= URLROOT; ?>/img/upload_images/advisor_pp/images.jfif" alt="">
                        </div>
                        <div class="name-date-time">
                            <h5>Nilshan Deemantha</h5>
                            <h6>2022-12-12</h6>
                            <h6>10.10 PM</h6>

                        </div>
                    </div>
                    <h3>Question about soli making for brinjall plantation</h3>
                    <div class="problem-content">
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus, recusandae quibusdam.
                            Ex odit aperiam nulla est quam iste repudiandae! Dolores velit, repellat laudantium odio nobis ut nulla eius voluptatem atque?

                        </p><br>

                    </div>


                </div>
                <div class="reply">
                    <div class="user-info">
                        <div class="photo">
                            <img src="<?= URLROOT; ?>/img/upload_images/advisor_pp/images.jfif" alt="">
                        </div>
                        <div class="name-date-time">
                            <h5>Nilshan Deemantha</h5>
                            <h6>2022-12-12</h6>
                            <h6>10.10 PM</h6>

                        </div>
                    </div>
                    <div class="reply-content">
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus, recusandae quibusdam.
                            Ex odit aperiam nulla est quam iste repudiandae! Dolores velit, repellat laudantium odio nobis ut nulla eius voluptatem atque?

                        </p><br>

                    </div>

                </div>
                <div class="reply">
                    <div class="user-info">
                        <div class="photo">
                            <img src="<?= URLROOT; ?>/img/upload_images/advisor_pp/images.jfif" alt="">
                        </div>
                        <div class="name-date-time">
                            <h5>Nilshan Deemantha</h5>
                            <h6>2022-12-12</h6>
                            <h6>10.10 PM</h6>

                        </div>
                    </div>
                    <div class="reply-content">
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus, recusandae quibusdam.
                            Ex odit aperiam nulla est quam iste repudiandae! Dolores velit, repellat laudantium odio nobis ut nulla eius voluptatem atque?

                        </p><br>

                    </div>

                </div>
                <div class="reply">
                    <div class="user-info">
                        <div class="photo">
                            <img src="<?= URLROOT; ?>/img/upload_images/advisor_pp/images.jfif" alt="">
                        </div>
                        <div class="name-date-time">
                            <h5>Nilshan Deemantha</h5>
                            <h6>2022-12-12</h6>
                            <h6>10.10 PM</h6>

                        </div>
                    </div>
                    <div class="reply-content">
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus, recusandae quibusdam.
                            Ex odit aperiam nulla est quam iste repudiandae! Dolores velit, repellat laudantium odio nobis ut nulla eius voluptatem atque?

                        </p><br>

                    </div>

                </div>
            </div>
            <div class="problem-card">
                <div class="problem">
                    <div class="user-info">
                        <div class="photo">
                            <img src="<?= URLROOT; ?>/img/upload_images/advisor_pp/images.jfif" alt="">
                        </div>
                        <div class="name-date-time">
                            <h5>Nilshan Deemantha</h5>
                            <h6>2022-12-12</h6>
                            <h6>10.10 PM</h6>

                        </div>
                    </div>
                    <h3>Question about soli making for brinjall plantation</h3>
                    <div class="problem-content">
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus, recusandae quibusdam.
                            Ex odit aperiam nulla est quam iste repudiandae! Dolores velit, repellat laudantium odio nobis ut nulla eius voluptatem atque?

                        </p><br>

                    </div>


                </div>
            </div>
            <div class="problem-card">
                <div class="problem">
                    <div class="user-info">
                        <div class="photo">
                            <img src="<?= URLROOT; ?>/img/upload_images/advisor_pp/images.jfif" alt="">
                        </div>
                        <div class="name-date-time">
                            <h5>Nilshan Deemantha</h5>
                            <h6>2022-12-12</h6>
                            <h6>10.10 PM</h6>

                        </div>
                    </div>
                    <h3>Question about soli making for brinjall plantation</h3>
                    <div class="problem-content">
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus, recusandae quibusdam.
                            Ex odit aperiam nulla est quam iste repudiandae! Dolores velit, repellat laudantium odio nobis ut nulla eius voluptatem atque?

                        </p><br>

                    </div>


                </div>
            </div>
            <div class="problem-card">
                <div class="problem">
                    <div class="user-info">
                        <div class="photo">
                            <img src="<?= URLROOT; ?>/img/upload_images/advisor_pp/images.jfif" alt="">
                        </div>
                        <div class="name-date-time">
                            <h5>Nilshan Deemantha</h5>
                            <h6>2022-12-12</h6>
                            <h6>10.10 PM</h6>

                        </div>
                    </div>
                    <h3>Question about soli making for brinjall plantation</h3>
                    <div class="problem-content">
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus, recusandae quibusdam.
                            Ex odit aperiam nulla est quam iste repudiandae! Dolores velit, repellat laudantium odio nobis ut nulla eius voluptatem atque?

                        </p>

                    </div>
                    <a href="<?= URLROOT; ?>/problems/viewOneProblem/19">Replies</a><br>

                </div>
            </div>
        </div>

    </section>

</body>
</html>
