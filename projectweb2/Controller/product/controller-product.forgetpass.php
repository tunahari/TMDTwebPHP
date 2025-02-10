<?php

// require_once '../../Controller/vendor/autoload.php';

// use SMSGatewayMe\Client\ApiClient;
// use SMSGatewayMe\Client\Configuration;
// use SMSGatewayMe\Client\Api\MessageApi;
// use SMSGatewayMe\Client\Model\SendMessageRequest;

// // Configure client
// $config = Configuration::getDefaultConfiguration();
// $config->setApiKey('Authorization', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTY1MzcwNDA1NSwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjk0Nzk5LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.jBYyM_lgrKGndpid_LdbDHj1VMx0fGu_lkwM1cf5CGI');
// $apiClient = new ApiClient($config);
// $messageClient = new MessageApi($apiClient);

// // Sending a SMS Message
// $sendMessageRequest = new SendMessageRequest([
//     'phoneNumber' => '0396028423',
//     'message' => 'Ok la',
//     'deviceId' => 128494
// ]);

// if ($messageClient->sendMessages([$sendMessageRequest])) {
//     echo 'Ok';
// } else {
//     echo 'No';
// }



//Send an SMS using Gatewayapi.com
$url = "https://gatewayapi.com/rest/mtsms";
$api_token = "hfAIl941SfOkiQdRJeGYDvYnUhqLWyWdJlIZ1TXPxhpRj1ISBOte_yyMv0jQM0at";

//Set SMS recipients and content
$recipients = [84396028423];
$json = [
    'sender' => 'SB Mobile',
    'message' => 'Hello world',
    'recipients' => [],
];
foreach ($recipients as $msisdn) {
    $json['recipients'][] = ['msisdn' => $msisdn];
}

//Make and execute the http request
//Using the built-in 'curl' library
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
curl_setopt($ch,CURLOPT_USERPWD, $api_token.":");
curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($json));
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
print($result);
$json = json_decode($result);
// print_r($json->ids);