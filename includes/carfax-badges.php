<?php

function carfax_badge_insert() {

$av_curl = curl_init();

curl_setopt_array($av_curl, array(
  CURLOPT_URL => 'https://badgingapi.carfax.ca/api/v3/badges?CompanyId=19400&Language=en&Vin=4T1B61HK6KU285720',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'Authorization: Bearer '.carfax_auth().''
  ),
));

$av_response = curl_exec($av_curl);

curl_close($av_curl);
$resparray = json_decode($av_response, true);
$cfurl = $resparray["ResponseData"]["Badges"][0]["BadgesImageUrl"];

ob_start();
    ?>

<img src="<?php echo $cfurl ?>">

    <?php

    $output = ob_get_contents();
    ob_end_clean();

    return $output;

}

add_shortcode('carfax-insert', 'carfax_badge_insert'); 