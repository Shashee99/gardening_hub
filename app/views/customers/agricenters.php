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
    <title>Document</title>
    <link rel="stylesheet" href="<?= URLROOT;?>/css/customer/agricenter.css">
</head>
<body>

    <?php require_once APPROOT . '/views/inc/incCustomer/sidebar.php'; ?>

    <div class="rest">

        <div class="search-bar">
            <div class="search-img">
                <img src="<?= URLROOT; ?>/img/customer/search.png" alt="">
            </div>
            <input type="text" placeholder="Search">
        </div>
        <div class="agri-center-tabel" id="map">
            
        </div><br>

    </div>

    <script>
        var map;
        var infowindow = null;
        function initMap()
        {
            map = new google.maps.Map(document.getElementById('map'),
            {
                center:{lat:7.2906 , lng:80.6337 },
                zoom: 8
            });
            <?php foreach ($data['agricenter'] as $place) { ?>
            var marker = new google.maps.Marker({
                position: {lat: <?php echo $place->lat; ?>, lng: <?php echo $place->lng; ?>},
                map: map,
                title: '<?php echo $place->name; ?>'
            });

            // Add a click event listener for the marker
            marker.addListener('click', function() {
                // Close any existing info window
                if (infowindow != null) {
                    infowindow.close();
                }

                // Create a new info window for the clicked marker
                infowindow = new google.maps.InfoWindow({
                    content: '<h3><?php echo $place->name; ?></h3>'
                });
                infowindow.open(map, marker);
            });

            <?php } ?>
        }

    </script>
    
    <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
    <script src="<?php echo URLROOT; ?>/js/customer/menu-bar-toogle.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8YNc82y-3LAvVLgv_v7Mmi2EFjqNHQP0&callback=initMap" async defer></script>

</body>
</html>