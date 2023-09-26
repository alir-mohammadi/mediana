<?php

require_once(__DIR__ . '/../vendor/autoload.php');
//Set API KEY here or you can load it from ENV file using Dotenv\Dotenv class
DEFINE('API_KEY', 'rxHZGuIXG8mYXK5K3fsfS-X3ML-Y6-W46MjixAAaQuo=');

$config =  App\Packages\Mediana\Configuration::getDefaultConfiguration()->setApiKey('Authorization', API_KEY)
            ->setApiKeyPrefix('Authorization', 'AccessKey');

$apiInstance = new  App\Packages\Mediana\Api\AuthApi(new GuzzleHttp\Client(), $config);
try {
    $result = $apiInstance->getAuthorizedUser();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthApi->getAuthorizedUser: ', $e->getMessage(), PHP_EOL;
}
