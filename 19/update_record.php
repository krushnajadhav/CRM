<?php

$recordId = '12345678-abcd'; 
$source_url = "https://simplecrm.com/api/v1/accounts/$recordId";


$data = [
    'name' => 'Updated Umesh Pawar',
    'education' => 'M-Tech(CS)',
    'phone_no' => '098-765-4321'
];


$jsonData = json_encode($data);


$ch = curl_init($source_url);


curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: bd28a190-a93c-3720-1200-6010f311165f' 
]);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);


$response = curl_exec($ch);
curl_close($ch);


$responseData = json_decode($response, true);
if (!empty($responseData)) 
{
    echo "record updated.";
} 
else
{
    echo "failed to update the record.";
}
?>
