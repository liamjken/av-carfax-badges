<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://authentication.carfax.ca/oauth/token',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'audience=https%3A%2F%2Fapi.carfax.ca&grant_type=client_credentials&client_id=Kq4StUwZwSulNni6aFUuSmLx9p0tvE8d&client_secret=QhweVcfrki2jBA8Oy6zdwSNBm4VGnpxFjDUOfW4JpLBBHkZjyVE9L2RGbOiW1IGx',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded',
    'Cookie: did=s%3Av0%3Af8a112d0-9bf2-11ed-a90b-4fba747e9246.lvAGZh%2B3lbQmTa2r9WePb4uv56IF3DP7W0rXSYifYxg; did_compat=s%3Av0%3Af8a112d0-9bf2-11ed-a90b-4fba747e9246.lvAGZh%2B3lbQmTa2r9WePb4uv56IF3DP7W0rXSYifYxg'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;