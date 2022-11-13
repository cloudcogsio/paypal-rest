<?php

namespace Cloudcogs\PayPal;

use Cloudcogs\PayPal\Message\Authorization\GenerateAccessToken;
use Cloudcogs\PayPal\Message\Authorization\TerminateAccessToken;
use Cloudcogs\PayPal\Message\CatalogProducts\CreateProduct;
use Cloudcogs\PayPal\Message\CatalogProducts\ListProducts;
use Cloudcogs\PayPal\Message\CatalogProducts\ShowProductDetails;
use Cloudcogs\PayPal\Message\CatalogProducts\UpdateProduct;
use Cloudcogs\PayPal\Support\CatalogProducts\Product;
use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\NotificationInterface;
use Omnipay\Common\Message\RequestInterface;

/**
 * @method NotificationInterface acceptNotification(array $options = array())
 * @method RequestInterface authorize(array $options = array())
 * @method RequestInterface completeAuthorize(array $options = array())
 * @method RequestInterface capture(array $options = array())
 * @method RequestInterface purchase(array $options = array())
 * @method RequestInterface completePurchase(array $options = array())
 * @method RequestInterface refund(array $options = array())
 * @method RequestInterface fetchTransaction(array $options = [])
 * @method RequestInterface void(array $options = array())
 * @method RequestInterface createCard(array $options = array())
 * @method RequestInterface updateCard(array $options = array())
 * @method RequestInterface deleteCard(array $options = array())
 */
class RestGateway extends AbstractGateway
{
    public function GenerateAccessToken(array $parameters = []): GenerateAccessToken
    {
        /** @var $request GenerateAccessToken */
        $request = $this->createRequest(GenerateAccessToken::class, $parameters);
        return $request->setGateway($this);
    }

    public function TerminateAccessToken(array $parameters = []): TerminateAccessToken
    {
        /** @var $request TerminateAccessToken */
        $request = $this->createRequest(TerminateAccessToken::class, $parameters);
        return $request->setGateway($this);
    }

    public function CreateProduct(?Product $product = null): CreateProduct
    {
        /** @var $request CreateProduct */
        $request = $this->createRequest(CreateProduct::class, []);
        $request->Product($product);
        return $request->setGateway($this);
    }

    public function ListProducts(array $parameters = ['pageNumber' => 1, 'pageSize' => 10, 'totalPagesRequired' => true]): ListProducts
    {
        /** @var $request ListProducts */
        $request = $this->createRequest(ListProducts::class, $parameters);
        return $request->setGateway($this);
    }

    public function UpdateProduct(string $productId, array $parameters = [])
    {
        /** @var $request UpdateProduct */
        $request = $this->createRequest(UpdateProduct::class, $parameters);
        $request->setProductId($productId);
        return $request->setGateway($this);
    }

    public function ShowProductDetails(string $productId)
    {
        /** @var $request ShowProductDetails */
        $request = $this->createRequest(ShowProductDetails::class, []);
        $request->setProductId($productId);
        return $request->setGateway($this);
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'PayPal REST';
    }

    /**
     * @inheritDoc
     */
    public function getDefaultParameters()
    {
        return include 'DefaultParameters.php';
    }

    public function setAccessToken(string $accessToken): RestGateway
    {
        return $this->setParameter(Constants::PARAM_ACCESS_TOKEN, $accessToken);
    }

    public function getAccessToken(): ?string
    {
        return $this->getParameter(Constants::PARAM_ACCESS_TOKEN);
    }

    public function setClientId(string $clientId): RestGateway
    {
        return $this->setParameter(Constants::PARAM_CLIENT_ID, $clientId);
    }

    public function getClientId(): ?string
    {
        return $this->getParameter(Constants::PARAM_CLIENT_ID);
    }

    public function setSecret(string $secret): RestGateway
    {
        return $this->setParameter(Constants::PARAM_CLIENT_SECRET, $secret);
    }

    public function getSecret(): ?string
    {
        return $this->getParameter(Constants::PARAM_CLIENT_SECRET);
    }

    public function setBaseUrl(string $baseUrl): RestGateway
    {
        return $this->setParameter(Constants::PARAM_PAYPAL_BASEURL, $baseUrl);
    }

    public function getBaseUrl(): ?string
    {
        return $this->getParameter(Constants::PARAM_PAYPAL_BASEURL);
    }

    public function setBaseUrlSandbox(string $baseUrlSandbox): RestGateway
    {
        return $this->setParameter(Constants::PARAM_PAYPAL_BASEURL_SANDBOX, $baseUrlSandbox);
    }

    public function getBaseUrlSandbox(): ?string
    {
        return $this->getParameter(Constants::PARAM_PAYPAL_BASEURL_SANDBOX);
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement @method \Omnipay\Common\Message\NotificationInterface acceptNotification(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface authorize(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface capture(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface purchase(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface completePurchase(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface refund(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface fetchTransaction(array $options = [])
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface void(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface createCard(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface updateCard(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface deleteCard(array $options = array())
    }
}
