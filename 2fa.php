<?php

$apiUrl = 'https://2fa.live/tok/';

$id = $_GET['token'];

$requestUrl = $apiUrl . $id;

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $requestUrl);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);

if ($response === false) {
    $error = curl_error($curl);
    echo "Lỗi: " . $error;
} else {
    $responseData = json_decode($response, true);

    $responseData['author'] = 'PhongVuPro';
    $responseData['description'] = 'Lấy 2FA Bằng API';

    $responseDataJson = json_encode($responseData, JSON_UNESCAPED_UNICODE);

    header('Content-Type: application/json');
    echo $responseDataJson;
}

curl_close($curl);
?>
