<?php

$recordId = '12345678-abcd'; 
$source_url = "https://SimpleCRM.com/api/v1/accounts/$recordId";


$ch = curl_init($source_url);


curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: bd28a190-a93c-3720-1200-6010f311165f'
]);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');


$response = curl_exec($ch);
curl_close($ch);


$responseData = json_decode($response, true);
if (isset($responseData['success']) && $responseData['success'] === true) 
{
    echo "record deleted.";
} 
else 
{
    echo "failed to delete the record.";
}
?>
