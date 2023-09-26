<?php

require_once(__DIR__ . '/../../../../vendor/autoload.php');
//Set API KEY here or you can load it from ENV file using Dotenv\Dotenv class
DEFINE('API_KEY', 'rxHZGuIXG8mYXK5K3fsfS-X3ML-Y6-W46MjixAAaQuo=');

$config =  \App\Packages\Mediana\Configuration::getDefaultConfiguration()->setApiKey('Authorization', API_KEY)
            ->setApiKeyPrefix('Authorization', 'AccessKey');

$apiInstance = new  \App\Packages\Mediana\Api\MessagesApi(new GuzzleHttp\Client(), $config);
$message = new \App\Packages\Mediana\Model\MessageToSend([
    "originator"=>"+983000505",
    "recipients"=>["+989378419977"],
    "message"=>"salam"
]);
try {
    $result = $apiInstance->sendSMS($message);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthApi->getAuthorizedUser: ', $e->getMessage(), PHP_EOL;
}
