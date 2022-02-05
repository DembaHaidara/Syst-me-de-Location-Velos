<!DOCTYPE html>
<html>
<head>
	        <script src="Jquery.js"></script>

	<title></title>
</head>
<body>
<h1>Bienvenue</h1>

<script type="text/javascript">
$(document).ready(function () {

		///////LOCALISATION
function coordonnees(pos) {
    let crd = pos.coords;
  
    var latitude = crd.latitude;
    var longitude = crd.longitude;
    
   alert(latitude);

            // alert(latitude + longitude); 

var send =  $.post('browser.php',{latitude,longitude},function(donnees) {

            $(".return").html(donnees);
           
        });

return false;
}

navigator.geolocation.getCurrentPosition(coordonnees);


});







	



	


</script>

</body>
</html>


<?php

// $donne3 = $_POST['latitude'];
// $donne4 = $_POST['longitude'];


// echo $donne3."<br>".$donne4;
function get_ip() {

    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
		return $_SERVER['HTTP_CLIENT_IP'];
	}

	elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		return $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else {
		return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
	}
}

$adresse_ip = get_ip();
echo $adresse_ip;

echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";

$browser = get_browser(null, true);
print_r($browser);
?>