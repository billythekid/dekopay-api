<?php
// TODO - proper tests for this whole package.

include_once __DIR__ . '/../vendor/autoload.php';

use billythekid\dekopay\Core\DekoPayApiClient;

$client = new DekoPayApiClient('', 'b70deab915958d4146f69173100c64f3');
$financeCalculator = $client->getFinanceCalculator();
$response = $financeCalculator->calculate('ONIB36-9.9', 4000, 9, 100);
var_dump($response);
