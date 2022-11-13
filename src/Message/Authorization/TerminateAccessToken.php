<?php

namespace Cloudcogs\PayPal\Message\Authorization;

use Cloudcogs\PayPal\Message\AbstractRequest;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Psr\Http\Message\ResponseInterface;

class TerminateAccessToken extends AbstractRequest
{
    const ENDPOINT = '/v1/oauth2/token/terminate';

    const PARAM_TOKEN = 'token';
    const PARAM_TOKEN_TYPE_HINT = 'token_type_hint';

    function handleResponse(ResponseInterface $response): AbstractResponse
    {
        return new TerminateAccessTokenResponse($this, $response);
    }

    function getEndpoint(): string
    {
        return self::ENDPOINT;
    }

    public function getData(): string
    {
        return http_build_query([
            self::PARAM_TOKEN => $this->getAccessToken(),
            self::PARAM_TOKEN_TYPE_HINT => $this->getAccessTokenTypeHint(),
        ], '', '&');
    }

    public function setAccessToken(string $accessToken): TerminateAccessToken
    {
        return $this->setParameter(self::PARAM_TOKEN, $accessToken);
    }

    public function getAccessToken(): ?string
    {
        return $this->getParameter(self::PARAM_TOKEN);
    }

    public function setAccessTokenTypeHint(string $hint): TerminateAccessToken
    {
        return $this->setParameter(self::PARAM_TOKEN_TYPE_HINT, $hint);
    }

    public function getAccessTokenTypeHint(): ?string
    {
        return $this->getParameter(self::PARAM_TOKEN_TYPE_HINT) ?? 'ACCESS_TOKEN';
    }

    public function getHeaders(array $headers = []): array
    {
        $this->includeAuthorization();

        $headers['Content-Type'] = 'application/x-www-form-urlencoded';

        return parent::getHeaders($headers);
    }
}