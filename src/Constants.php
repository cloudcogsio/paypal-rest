<?php

namespace Cloudcogs\PayPal;

class Constants
{
    const PARAM_CLIENT_ID = 'clientId';
    const PARAM_CLIENT_SECRET = 'secret';
    const PARAM_ACCESS_TOKEN = 'accessToken';

    const PARAM_PAYPAL_BASEURL_SANDBOX = 'baseUrlSandbox';
    const PARAM_PAYPAL_BASEURL = 'baseUrl';

    const HEADER_PAYPAL_DEBUG_ID = 'Paypal-Debug-Id';
    const HEADER_PAYPAL_REQUEST_ID = 'PayPal-Request-Id';
    const HEADER_PAYPAL_CLIENT_METADATA_ID = 'PayPal-Client-Metadata-Id';
    const HEADER_PAYPAL_PARTNER_ATTRIBUTION_ID = 'PayPal-Partner-Attribution-Id';
    const HEADER_PAYPAL_PARTNER_AUTH_ASSERTION = 'PayPal-Auth-Assertion';
    const HEADER_PREFER_REPRESENTATION = 'Prefer';

    const PAYPAL_PREFER_REPRESENTATION_DETAILED = 'return=representation';
    const PAYPAL_PREFER_REPRESENTATION_MINIMAL = 'return=minimal';
}
