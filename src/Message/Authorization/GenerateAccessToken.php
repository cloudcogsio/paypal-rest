<?php

namespace Cloudcogs\PayPal\Message\Authorization;

use Cloudcogs\PayPal\Message\AbstractRequest;
use Psr\Http\Message\ResponseInterface;

class GenerateAccessToken extends AbstractRequest
{
    const ENDPOINT = '/v1/oauth2/token';

    const PARAM_IGNORE_CACHE = 'ignoreCache';
    const PARAM_GRANT_TYPE = 'grant_type';
    const PARAM_RETURN_AUTHN_SCHEMES = 'return_authn_schemes';
    const PARAM_RETURN_CLIENT_METADATA = 'return_client_metadata';
    const PARAM_RETURN_UNCONSENTED_SCOPES = 'return_unconsented_scopes';

    function getEndpoint(): string
    {
        return self::ENDPOINT;
    }

    public function getData(): string
    {
        return http_build_query([
            self::PARAM_GRANT_TYPE => $this->getGrantType(),
            self::PARAM_IGNORE_CACHE => $this->getIgnoreCache(),
            self::PARAM_RETURN_AUTHN_SCHEMES => $this->getReturnAuthnSchemes(),
            self::PARAM_RETURN_CLIENT_METADATA => $this->getReturnClientMetadata(),
            self::PARAM_RETURN_UNCONSENTED_SCOPES => $this->getReturnUnconsentedScopes(),
        ], '', '&');
    }

    /**
     * The credential type to exchange for an access token.
     *
     * If not set, defaults to 'client_credentials'
     *
     * @param string $grant_type
     * @return GenerateAccessToken
     */
    public function setGrantType(string $grant_type): GenerateAccessToken
    {
        return $this->setParameter(self::PARAM_GRANT_TYPE, $grant_type);
    }

    public function getGrantType(): string
    {
        return $this->getParameter(self::PARAM_GRANT_TYPE) ?? 'client_credentials';
    }

    /**
     * A new token is issued ignoring the previously issued and still not expired token.
     *
     * If not set, defaults to true
     *
     * @param bool $flag
     * @return GenerateAccessToken
     */
    public function setIgnoreCache(bool $flag): GenerateAccessToken
    {
        return $this->setParameter(self::PARAM_IGNORE_CACHE,  ($flag) ? 'true' : 'false');
    }

    public function getIgnoreCache(): string
    {
        return $this->getParameter(self::PARAM_IGNORE_CACHE) ?? 'true';
    }

    /**
     * Lists user authentication options and returns a first-party access token to authenticate an end user.
     * Valid for all grant types except the `authzcode` authorization code,
     * which indicates that the user is already authenticated.
     *
     * If not set, defaults to true
     *
     * @param bool $flag
     * @return GenerateAccessToken
     */
    public function setReturnAuthnSchemes(bool $flag): GenerateAccessToken
    {
        return $this->setParameter(self::PARAM_RETURN_AUTHN_SCHEMES, ($flag) ? 'true' : 'false');
    }

    public function getReturnAuthnSchemes(): string
    {
        return $this->getParameter(self::PARAM_RETURN_AUTHN_SCHEMES) ?? 'true';
    }

    /**
     * Lists client metadata attributes. Valid for all grant types.
     *
     * If not set, defaults to true
     *
     * @param bool $flag
     * @return GenerateAccessToken
     */
    public function setReturnClientMetadata(bool $flag): GenerateAccessToken
    {
        return $this->setParameter(self::PARAM_RETURN_CLIENT_METADATA,  ($flag) ? 'true' : 'false');
    }

    public function getReturnClientMetadata(): string
    {
        return $this->getParameter(self::PARAM_RETURN_CLIENT_METADATA) ?? 'true';
    }

    /**
     * Lists unconsented scopes between the user and client. Valid for all grant types except `client_credentials`.
     *
     * If not set, defaults to true
     *
     * @param bool $flag
     * @return GenerateAccessToken
     */
    public function setReturnUnconsentedScopes(bool $flag): GenerateAccessToken
    {
        return $this->setParameter(self::PARAM_RETURN_UNCONSENTED_SCOPES,  ($flag) ? 'true' : 'false');
    }

    public function getReturnUnconsentedScopes(): string
    {
        return $this->getParameter(self::PARAM_RETURN_UNCONSENTED_SCOPES) ?? 'true';
    }

    public function getHeaders(array $headers = []): array
    {
        $this->includeAuthorization(false);

        $headers['Content-Type'] = 'application/x-www-form-urlencoded';
        $headers['Authorization'] = 'Basic '.base64_encode(
            $this->RestGateway->getClientId().':'.$this->RestGateway->getSecret());

        return parent::getHeaders($headers);
    }

    function handleResponse(ResponseInterface $response): GenerateAccessTokenResponse
    {
        $accessTokenResponse = new GenerateAccessTokenResponse($this, $response);
        $this->RestGateway->setAccessToken($accessTokenResponse->getAccessToken());

        return $accessTokenResponse;
    }
}
