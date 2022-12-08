# PayPal REST API
This package aims implements the [PayPal REST API](https://developer.paypal.com/api/rest/) as an [Omnipay](https://omnipay.thephpleague.com/) compatible gateway. Omnipay's basic gateway operations will be supported, but PayPal endpoints can also be used directly.

### PayPal REST API Coverage
##### Only the following APIs are planned.
Checked APIs are completed. Unchecked are under development.
- [ ] Add Tracking
- [x] Catalog Products
- [ ] Disputes
- [ ] Invoicing
- [ ] Orders
- [ ] Payments
- [ ] Payouts
- [x] Subscriptions
- [ ] Webhooks

### Installation via Composer
``` bash
$ composer require cloudcogsio/paypal-rest
```

### Usage
##### 1. Instantiate the gateway class
The main gateway class is instantiated the same as an Omnipay gateway.
```php
use Omnipay\Omnipay;

$gateway = Omnipay::create(\Cloudcogs\PayPal\RestGateway::class);
$gateway
    ->setTestMode(true)
    ->setClientId(#YOUR PAYPAL CLIENT ID)
    ->setSecret(#YOUR PAYPAL SECRET);
```
##### 2. Generate an Access Token.
```php
$accessToken = $gateway->GenerateAccessToken()->send();
```
Note, the Access Token is stored in the gateway at this point.

- Management of the Access Token is not *(yet)* included in this
  library.
- You should implement your own method for saving and reusing
  the Access Token until expired to avoid hitting PayPal query limits by generating a token for each API call.

You can set a previously retrieved Access Token in the gateway as follows:
```php
$gateway->setAccessToken($accessToken);
```
##### 3. Begin making API calls
```php
/**
 * List products
 * https://developer.paypal.com/docs/api/catalog-products/v1/#products_list
 */

// You can pass API parameters directly
$ListProducts = $gateway->ListProducts(['pageNumber' => 1, 'pageSize' => 5]);

// Alternatively, use the API methods (preferred)
$ListProducts = $gateway->ListProducts();
$ListProducts
    ->setPageNumber(1)
    ->setPageSize(5);

$APIResponse = $ListProducts->send();

// Check for a successful response
if($APIResponse->isSuccessful())
{
    $productList = $APIResponse->getProductList();
    
    // You can iterate over collections
    while(($product = $productList->current()) != null)
    {
        print_r($product);
        $productList->next();
    }
} 

// Handle errors
else {
    $error = $APIResponse->getPayPalError();
    print_r($error);
}
```

## Support

If you are having general issues with Omnipay, we suggest posting on  [Stack Overflow](http://stackoverflow.com/). Be sure to add the  [omnipay tag](http://stackoverflow.com/questions/tagged/omnipay)  so it can be easily found.

If you believe you have found a bug, please report it using the  [GitHub issue tracker](https://github.com/cloudcogsio/paypal-rest/issues), or better yet, fork the library and submit a pull request.