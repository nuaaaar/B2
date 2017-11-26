<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.mainapi.net/logistic/v1.0/vessel/schedule?start=2017-11-10&end=2017-11-10");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$post = array(
    "file" => "@" .realpath("/full/path/to/test.json")
);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");


$headers = array();
$headers[] = "Accept: application/json";
$headers[] = "Authorization: Bearer 85f202b2d8aa20c289b831f9965b0296";
$headers[] = "Content-Type: application/x-www-form-urlencoded";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);

$hasil = var_dump($result);
$payloadLength = count($hasil);
for ($i=1; $i < $payloadLength ; $i+1) {
]   echo $hasil['payload'][i]['vessel_name'];
}

 ?>
