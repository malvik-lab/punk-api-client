<?php



use MalvikLab\PunkApiClient\Client;
use MalvikLab\PunkApiClient\Exceptions\InvalidClientVersionException;

require 'vendor/autoload.php';


try {
    $client = Client::make(Client::V2);
} catch (InvalidClientVersionException $e) {
}
