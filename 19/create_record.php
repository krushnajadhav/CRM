<?php

$source_url = 'https://SimpleCRM.com/api/v1/accounts'; 

$data = [
    'name' => 'ritesh',
    'education' => 'B-Tech',
    'industry' => 'Information Technology',
    'phone_no' => '9854789632',
];


$jsonData = json_encode($data);

$ch = curl_init($source_url);


curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: bd28a190-a93c-3720-1200-6010f311165f' 
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);


$response = curl_exec($ch);
curl_close($ch);


$responseData = json_decode($response, true);
if (isset($responseData['id']))
{
    echo "new record created with ID : " . $responseData['id'];
}
else
{
    echo "failed to create a new record.";
}
?>
