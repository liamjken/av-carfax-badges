<?php

function carfax_badge_insert() {

$av_curl = curl_init();
$vin_numb = get_post_meta(get_the_id(), 'vin_number', true);
if (empty($vin_numb)) {
    $vin_num = 1;
 } else {
    $vin_num = $vin_numb;
 }
 $av_cf_dealer = esc_attr( get_option('cf_dealer_id') );


curl_setopt_array($av_curl, array(
  CURLOPT_URL => 'https://badgingapi.carfax.ca/api/v3/badges?CompanyId='.$av_cf_dealer.'&Language=en&Vin='.$vin_num.'',
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
$cfImgurl = $resparray["ResponseData"]["Badges"][0]["BadgesImageUrl"];
$cfReportUrl = $resparray["ResponseData"]["Badges"][0]["VhrReportUrl"];

ob_start();
    ?>

<a href="<?php echo $cfReportUrl ?>"  target="_blank"><img style="height: 55px;" src="<?php echo $cfImgurl ?>"></a>
    <?php

    $output = ob_get_contents();
    ob_end_clean();

    return $output;

}

add_shortcode('carfax-insert', 'carfax_badge_insert'); 