<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/RegistrationPages/customerRegister.css">
</head>
<body>
    <div class="login-page-navbar">
        <div class="logo">
            <a href="<?php echo URLROOT; ?>/css/LoginPage/login_page.css">
                <img src="<?php echo URLROOT; ?>/img/login-registration/logo2.png" alt="logo">
            </a>  
        </div>
    </div>
    
    <div class="signup-page-container">
    
        <div class="form-content">
        <h1><?php echo $data['title']; ?></h1>
            <form action="<?=URLROOT;?>/users/customerRegister" method="POST" enctype="multipart/form-data">
                <div class="user-details">
                    
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input id='<?php echo (!empty($data['name_err'])) ? 'invalid' : ''; ?>'
                               type="text" name="name" value="<?php echo $data['name']; ?>" placeholder="Enter your name">
                        <div class="error">
                            <span><?php echo $data['name_err']; ?></span>
                        </div>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input id='<?php echo (!empty($data['password_err'])) ? 'invalid' : ''; ?>'
                        type="password" name="password" value="<?php echo $data['password']; ?>" placeholder="Enter your passsword" >
                        <div class="error">
                            <span><?php echo $data['password_err']; ?></span>
                        </div>
                    </div>
                    <div class="input-box">
                        <span class="details">Address</Address></span>
                        <input id='<?php echo (!empty($data['address_err'])) ? 'invalid' : ''; ?>'
                        type="text" name="address" value="<?php echo $data['address']; ?>" placeholder="Enter your address" >
                        <div class="error">
                            <span><?php echo $data['address_err']; ?></span>
                        </div>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input id='<?php echo (!empty($data['confirm_pass_err'])) ? 'invalid' : ''; ?>'
                        type="password" name="confirm_pass" value="<?php echo $data['confirm_pass']; ?>" placeholder="Enter your Password again" >
                        <div class="error">
                            <span><?php echo $data['confirm_pass_err']; ?></span>
                        </div>
                    </div>
                    <div class="input-box">
                        <span class="details">ID Number</span>
                        <input id='<?php echo (!empty($data['id_err'])) ? 'invalid' : ''; ?>'
                        type="text" name="nic" value="<?php echo $data['id']; ?>" placeholder="Enter your id number" >
                        <div class="error">
                            <span><?php echo $data['id_err']; ?></span>
                        </div>
                    </div>
                    <div class="input-box">
                        <span class="details">Mobile Number</span>
                        <input id='<?php echo (!empty($data['mobile_err'])) ? 'invalid' : ''; ?>'
                        type="text" name="phone" value="<?php echo $data['mobile']; ?>" placeholder="Enter your mobile number" >
                        <div class="error">
                            <span><?php echo $data['mobile_err']; ?></span>
                        </div>
                    </div>
                    <div class="input-box">
                        <span class="details">Birthday</span>
                        <input id='<?php echo (!empty($data['bod_err'])) ? 'invalid' : ''; ?>'
                        type="date" name="birthday" value="<?php echo $data['bod']; ?>" placeholder="Select your birthday" >
                        <div class="error">
                            <span><?php echo $data['bod_err']; ?></span>
                        </div>
                    </div>
                    <div class="input-box">
                        <span class="details">E mail</span>
                        <input id='<?php echo (!empty($data['email_err'])) ? 'invalid' : ''; ?>'
                        type="text" name="mail" value="<?php echo $data['email']; ?>" placeholder="Enter your mobile number" >
                        <div class="error">
                            <span><?php echo $data['email_err']; ?></span>
                        </div>
                    </div>
                    
                    <!-- <div class="input-box">
                        <span class="details">User Name</span>
                        <input id='<?php echo (!empty($data['user_name_err'])) ? 'invalid' : ''; ?>'
                        type="text" name="user_name" value="<?php echo $data['user_name']; ?>" placeholder="Enter your user name " >
                        <div class="error">
                            <span><?php echo $data['user_name_err']; ?></span>
                        </div>
                    </div>  -->
                    <div class="input-box">
                        <span class="details">Profile Photo</span>
                        <input type="file" name="photo" placeholder="Select a phohto" id='<?php echo (!empty($data['photo_err'])) ? 'invalid' : ''; ?>' >
                        <div class="error">
                            <span><?php echo $data['photo_err']; ?></span>
                        </div>
                    </div> 
                    <div class="input-box">
                        <label for="">Selecet Location</label>
                        <div id="map">

                        </div>
                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">
                        <div class="error">
                            <span><?php echo $data['location_err']; ?></span>
                        </div>  
                    </div>
                    <div class="policy">
                        <input type="checkbox" class="check" name="policy" value="1">
                        <label for="">I have clearly read the <a href="#">privacy policy </a> and i accept all the policies</label> 
                        <div class="error">
                            <span><?php echo $data['privacy_err']; ?></span>
                        </div>  
                    </div>

                    <div class="button">
                        <input type="submit" value="register">
                    </div>
                    <br>

                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8YNc82y-3LAvVLgv_v7Mmi2EFjqNHQP0&callback=initMap" async defer></script>
    <script>
        var map;
        var marker;
        
        function initMap() {
            // Initialize the map centered on a default location
            var defaultLocation = {lat: 6.66696, lng: 80.70479};
            map = new google.maps.Map(document.getElementById('map'), {
                center: defaultLocation,
                zoom: 8
            });
            
            // Add a click listener to the map to set the marker
            map.addListener('click', function(event) {
                placeMarker(event.latLng);
            });
        }
        
        function placeMarker(location) {
            // Remove the existing marker, if there is one
            if (marker) {
                marker.setMap(null);
            }
            
            // Add a new marker at the selected location
            marker = new google.maps.Marker({
                position: location,
                map: map
            });
            
            // Update the latitude and longitude hidden inputs with the selected location
            document.getElementById('latitude').value = location.lat();
            document.getElementById('longitude').value = location.lng();
        }
    </script>
</body>
</html>