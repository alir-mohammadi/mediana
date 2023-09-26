<?php

require_once(__DIR__ . '/../vendor/autoload.php');
//Set API KEY here or you can load it from ENV file using Dotenv\Dotenv class
DEFINE('API_KEY', 'rxHZGuIXG8mYXK5K3fsfS-X3ML-Y6-W46MjixAAaQuo=');

$config =  App\Packages\Mediana\Configuration::getDefaultConfiguration()->setApiKey('Authorization', API_KEY)
            ->setApiKeyPrefix('Authorization', 'AccessKey');

$apiInstance = new  App\Packages\Mediana\Api\MessagesApi(new GuzzleHttp\Client(), $config);
$pattern = new \App\Packages\Mediana\Model\PatternToSend([
    "pattern_code"=>"xxx",
    "originator"=>"+98xxx",
    "recipient"=>"+98xx",
    "values"=>["xx"=>"xxx"]
]);
try {
    $result = $apiInstance->sendPattern($pattern);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthApi->getAuthorizedUser: ', $e->getMessage(), PHP_EOL;
}
