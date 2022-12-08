<?php

namespace Cloudcogs\PayPal\Message;

use Cloudcogs\PayPal\Constants;
use Cloudcogs\PayPal\Exception\AccessTokenNotFoundException;
use Cloudcogs\PayPal\Exception\InvalidPreferRepresentationException;
use Cloudcogs\PayPal\RestGateway;
use Psr\Http\Message\ResponseInterface;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    protected RestGateway $RestGateway;
    protected bool $includeAuthorization = true;

    /**
     * Make Gateway instance available to requests
     *
     * @param RestGateway $restGateway
     * @return $this
     */
    public function setGateway(RestGateway $restGateway): AbstractRequest
    {
        $this->RestGateway = $restGateway;
        return $this;
    }

    public function getGateway(): RestGateway
    {
        return $this->RestGateway;
    }

    /**
     * @param $data
     * @return AbstractResponse
     */
    public function sendData($data): AbstractResponse
    {
        $baseUrl = ($this->RestGateway->getTestMode()) ?
            $this->RestGateway->getBaseUrlSandbox() :
            $this->RestGateway->getBaseUrl();

        $endpoint = $baseUrl.$this->getEndpoint();

        $response = $this->httpClient->request(
            $this->getHttpMethod(),
            $endpoint,
            $this->getHeaders(),
            $data
        );

        return $this->getResponseOrError($response);
    }

    /**
     * Override/get headers for a request
     *
     * @param array $headers
     * @return array
     */
    public function getHeaders(array $headers = []): array
    {
        $authorization = ($this->includeAuthorization) ?
            ['Authorization' => 'Bearer '.$this->RestGateway->getAccessToken()] : [];

        $paypalHeaders = $this->getPayPalHeaders();

        return array_merge([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ], $headers, $authorization, $paypalHeaders);
    }

    /**
     * Get HTTP method for a request
     * Default is POST, subclasses should override as needed.
     *
     * @return string
     */
    public function getHttpMethod(): string
    {
        return Request::METHOD_POST;
    }

    /**
     * Return a Response or Error object based on the HTTP status code return
     *
     * @param ResponseInterface $response
     * @return AbstractResponse
     * @throws \JsonException
     */
    public function getResponseOrError(ResponseInterface $response): AbstractResponse
    {
        return ($response->getStatusCode() < 200 || $response->getStatusCode() > 299) ?
            new ErrorResponse($this, $response):
            $this->handleResponse($response);
    }

    /**
     * Indicate whether to include the Authorization header with previously retrieved or manually supplied
     * Access Token.
     *
     * This is implicitly called for requests that require Authorization.
     *
     * @param bool $flag
     * @return $this
     * @throws AccessTokenNotFoundException
     */
    public function includeAuthorization(bool $flag = true): AbstractRequest
    {
        if($flag === true && !is_string($this->RestGateway->getAccessToken()))
            throw new AccessTokenNotFoundException();

        $this->includeAuthorization = $flag;
        return $this;
    }

    /**
     * Determine which PayPal-* headers to include with the request
     *
     * @return array
     */
    protected function getPayPalHeaders(): array
    {
        $headers = [];

        // PayPal-Request-Id
        $headers[Constants::HEADER_PAYPAL_REQUEST_ID] =
            $this->getPayPalRequestId() ?? $this->setPayPalRequestId(null, true);

        // PayPal-Client-Metadata-Id
        $PayPalClientMetadataId = $this->getPayPalClientMetadataId();
        if ($PayPalClientMetadataId != null)
            $headers[Constants::HEADER_PAYPAL_CLIENT_METADATA_ID] = $PayPalClientMetadataId;

        // PayPal-Partner-Attribution-Id
        $PayPalPartnerAttributionId = $this->getPayPalPartnerAttributionId();
        if ($PayPalPartnerAttributionId != null)
            $headers[Constants::HEADER_PAYPAL_PARTNER_ATTRIBUTION_ID] = $PayPalPartnerAttributionId;

        // PayPal-Auth-Assertion
        $PayPalAuthAssertion = $this->getPayPalAuthAssertion();
        if ($PayPalAuthAssertion != null)
            $headers[Constants::HEADER_PAYPAL_PARTNER_AUTH_ASSERTION] = $PayPalAuthAssertion;

        // Prefer
        $PreferRepresentation = $this->getPreferRepresentation();
        if ($PreferRepresentation != null)
            $headers[Constants::HEADER_PREFER_REPRESENTATION] = $PreferRepresentation;

        return $headers;
    }

    /**
     * Can be used to manually set a UUID to be sent with the request.
     *
     * Manually calling this method is not necessary since one is generated for each request and can be retrieved
     * from this same request or the response using 'getPayPalRequestId()'
     *
     * @param string|null $uuid
     * @param bool $returnUuid
     * @return AbstractRequest|string
     */
    public function setPayPalRequestId(?string $uuid, bool $returnUuid = false)
    {
        $uuid = $uuid ?? (Uuid::uuid4())->toString();
        $this->setParameter(Constants::HEADER_PAYPAL_REQUEST_ID, $uuid);

        return ($returnUuid === false) ? $this : $uuid;
    }

    /**
     * Retrieve the PayPal-Request-Id value (if any)
     * This is only populated at the time of sending a request, but can also be manually populated by calling
     * 'setPayPalRequestId'
     *
     * @return string|null
     */
    public function getPayPalRequestId(): ?string
    {
        return $this->getParameter(Constants::HEADER_PAYPAL_REQUEST_ID);
    }

    /**
     * Optional.
     *
     * Verifies that the payment originates from a valid, user-consented device and application.
     * Reduces fraud and decreases declines. Transactions that do not include a client metadata ID are not
     * eligible for PayPal Seller Protection.
     *
     * @param string $metadataId
     * @return AbstractRequest
     */
    public function setPayPalClientMetadataId(string $metadataId): AbstractRequest
    {
        return $this->setParameter(Constants::HEADER_PAYPAL_CLIENT_METADATA_ID, $metadataId);
    }

    /**
     * Retrieve the PayPal-Client-Metadata-Id header value (if any)
     *
     * @return string|null
     */
    public function getPayPalClientMetadataId(): ?string
    {
        return $this->getParameter(Constants::HEADER_PAYPAL_CLIENT_METADATA_ID);
    }

    /**
     * Optional.
     *
     * Identifies the caller as a PayPal partner. To receive revenue attribution,
     * specify a unique build notation (BN) code. BN codes provide tracking on all
     * transactions that originate or are associated with a particular partner.
     * To find your BN code, see Code and Credential Reference.
     *
     * @param string $attributionId
     * @return AbstractRequest
     */
    public function setPayPalPartnerAttributionId(string $attributionId): AbstractRequest
    {
        return $this->setParameter(Constants::HEADER_PAYPAL_PARTNER_ATTRIBUTION_ID, $attributionId);
    }

    /**
     * Retrieve the PayPal-Partner-Attribution-Id header value (if any)
     *
     * @return string|null
     */
    public function getPayPalPartnerAttributionId(): ?string
    {
        return $this->getParameter(Constants::HEADER_PAYPAL_PARTNER_ATTRIBUTION_ID);
    }

    /**
     * An API client-provided JSON Web Token (JWT) assertion that identifies the merchant.
     * To use this header, you must get consent to act on behalf of a merchant.
     *
     * @param string $jwt
     * @return AbstractRequest
     */
    public function setPayPalAuthAssertion(string $jwt): AbstractRequest
    {
        return $this->setParameter(Constants::HEADER_PAYPAL_PARTNER_AUTH_ASSERTION, $jwt);
    }

    /**
     * Retrieve the PayPal-Auth-Assertion header value (if any)
     *
     * @return string|null
     */
    public function getPayPalAuthAssertion(): ?string
    {
        return $this->getParameter(Constants::HEADER_PAYPAL_PARTNER_AUTH_ASSERTION);
    }

    /**
     * The preferred server response upon successful completion of the request.
     *
     * return=minimal
     * The server returns a minimal response to optimize communication between the API caller and the server.
     * A minimal response includes the id, status and HATEOAS links.
     *
     * return=representation
     * The server returns a complete resource representation, including the current state of the resource.
     *
     * @param string $option
     * @return AbstractRequest
     * @throws InvalidPreferRepresentationException
     */
    public function setPreferRepresentation(string $option): AbstractRequest
    {
        switch ($option)
        {
            case Constants::PAYPAL_PREFER_REPRESENTATION_MINIMAL:
            case Constants::PAYPAL_PREFER_REPRESENTATION_DETAILED:
                return $this->setParameter(Constants::HEADER_PREFER_REPRESENTATION, $option);
        }

        throw new InvalidPreferRepresentationException($option);
    }

    /**
     * Retrieve the Prefer header value (if any)
     *
     * @return string|null
     */
    public function getPreferRepresentation(): ?string
    {
        return $this->getParameter(Constants::HEADER_PREFER_REPRESENTATION);
    }

    abstract public function handleResponse(ResponseInterface $response): AbstractResponse;
    abstract public function getEndpoint(): string;
}