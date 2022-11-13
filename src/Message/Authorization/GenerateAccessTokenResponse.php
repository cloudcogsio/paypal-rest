<?php

namespace Cloudcogs\PayPal\Message\Authorization;

use Cloudcogs\PayPal\Message\AbstractResponse;

class GenerateAccessTokenResponse extends AbstractResponse
{
    const SCOPE = 'scope';
    const ACCESS_TOKEN = 'access_token';
    const TOKEN_TYPE = 'token_type';
    const APP_ID = 'app_id';
    const EXPIRES_IN = 'expires_in';
    const SUPPORTED_AUTHN_SCHEMES = 'supported_authn_schemes';
    const NONCE = 'nonce';
    const CLIENT_METADATA = 'client_metadata';

    /**
     * @inheritDoc
     */
    public function isSuccessful(): bool
    {
        return $this->getHttpResponse()->getStatusCode() == 200;
    }

    public function getScopes(): array
    {
        $scopes = $this->getDataAsObject()->offsetGet(self::SCOPE);
        return (!empty($scopes)) ? explode(" ", $scopes) : [];
    }

    public function getAccessToken(): ?string
    {
        return ($this->isSuccessful()) ? $this->getData()[self::ACCESS_TOKEN] : null;
    }

    public function getTokenType(): ?string
    {
        return ($this->isSuccessful()) ? $this->getData()[self::TOKEN_TYPE] : null;
    }

    public function getAppId(): ?string
    {
        return ($this->isSuccessful()) ? $this->getData()[self::APP_ID] : null;
    }

    public function getExpiresIn(): ?int
    {
        return ($this->isSuccessful()) ? $this->getData()[self::EXPIRES_IN] : null;
    }

    public function getSupportedAuthnSchemes(): array
    {
        return ($this->isSuccessful()) ? $this->getData()[self::SUPPORTED_AUTHN_SCHEMES] : [];
    }

    public function getNonce(): ?string
    {
        return ($this->isSuccessful()) ? $this->getData()[self::NONCE] : null;
    }

    public function getClientMetadata(): ?array
    {
        return ($this->isSuccessful()) ? $this->getData()[self::CLIENT_METADATA] : null;
    }
}
