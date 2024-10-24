<?php
function getAccessToken($clientId, $clientSecret, $username, $password) 
{
    // I have taken damy url
    $url = "https://SimpleCRM.com/Api/access_token"; 

    $data = [
        "grant_type" => "password",
        "client_id" => $clientId,
        "client_secret" => $clientSecret,
        "username" => $username,
        "password" => $password,
    ];

    $options = [
        'http' => [
            'header' => "Content-Type: application/json",
            'method' => 'POST',
            'content' => json_encode($data),
        ],
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result, true);

    if (isset($response['access_token'])) 
    {
        return $response['access_token'];
    } 
    else
    {
        throw new Exception("Authentication failed: " . $response['message']);
    }
}

function createRecord($token, $name, $email, $phone) 
{
    // I have taken damy url

    $url = "https://SimpleCRM.com/Api/V8/module"; 

    $data = [
        "data" => [
            "type" => "Contacts",
            "attributes" => [
                "name" => $name,
                "email" => $email,
                "phone" => $phone,
            ],
        ],
    ];

    $options = [
        'http' => [
            'header' => "Authorization: Bearer $token" .
                        "Content-Type: application/json",
            'method' => 'POST',
            'content' => json_encode($data),
        ],
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return json_decode($result, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    // collected form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

   
    $clientId = '9b03dee4-9e6e-cab0-a7df-5d249aed2abc'; 
    $clientSecret = '123456';
    $username = 'ritesh'; 
    $password = 'ritesh@123';    

    try {
        // authenticate
        $token = getAccessToken($clientId, $clientSecret, $username, $password);
        
        // create record
        $createResponse = createRecord($token, $name, $email, phone: $phone);


        if (isset($createResponse['data'])) 
        {
            echo "contact successfully created with ID: " . $createResponse['data']['id'];
        }
        else
        {
            echo "failed to create contact: " . json_encode($createResponse);
        }
    } 
    catch (Exception $e)
    {
        echo "Error: " . $e->getMessage();
    }
} 

?>
