<?php

use Printful\Exceptions\PrintfulApiException;
use Printful\Exceptions\PrintfulException;
use Printful\PrintfulApiClient;
use Printful\PrintfulProductsApi;
use Printful\Structures\Sync\Responses\SyncProductResponse;

require_once __DIR__ . '../../vendor/autoload.php';

/**
 * This example fill will demonstrate how to get a single Product using id and external id
 * Docs for this endpoint can be found here: https://www.printful.com/docs/products#getSingleSyncProduct
 */

// Replace this with your API key
$apiKey = '';

try {
    // create ApiClient
    $pf = new PrintfulApiClient($apiKey);

    // create Products Api object
    $productsApi = new PrintfulProductsApi($pf);

    // product id in your Printful store
    $productId = 1;

    // get product by id
    /** @var SyncProductResponse $product */
    $product = $productsApi->getProduct($productId);


    // product id in your store(saved with external_id)
    $externalProductId = 15946;

    // get product by external_id
    /** @var SyncProductResponse $product */
    $product = $productsApi->getProduct('@' . $externalProductId);

} catch (PrintfulApiException $e) { // API response status code was not successful
    echo 'Printful API Exception: ' . $e->getCode() . ' ' . $e->getMessage();
} catch (PrintfulException $e) { // API call failed
    echo 'Printful Exception: ' . $e->getMessage();
    var_export($pf->getLastResponseRaw());
}