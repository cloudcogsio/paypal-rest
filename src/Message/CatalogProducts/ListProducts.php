<?php

namespace Cloudcogs\PayPal\Message\CatalogProducts;


use Cloudcogs\PayPal\Message\AbstractRequest;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Request;

class ListProducts extends AbstractRequest
{
    const ENDPOINT = '/v1/catalogs/products';

    const PARAM_PAGE = 'page';
    const PARAM_PAGE_SIZE = 'page_size';
    const PARAM_TOTAL_REQUIRED = 'total_required';

    /**
     * @inheritDoc
     */
    public function getData()
    {
        $this->includeAuthorization();
        return null;
    }

    public function handleResponse(ResponseInterface $response): AbstractResponse
    {
        return new ListProductsResponse($this, $response);
    }

    public function setPageNumber(int $pageNumber = 1): ListProducts
    {
        return $this->setParameter(self::PARAM_PAGE, $pageNumber);
    }

    public function getPageNumber(): int
    {
        return $this->getParameter(self::PARAM_PAGE) ?? 1;
    }

    public function setPageSize(int $pageSize = 10): ListProducts
    {
        if ($pageSize < 1) $pageSize = 1;
        if ($pageSize > 20) $pageSize = 20;

        return $this->setParameter(self::PARAM_PAGE_SIZE, $pageSize);
    }

    public function getPageSize(): int
    {
        return $this->getParameter(self::PARAM_PAGE_SIZE) ?? 10;
    }

    public function setTotalPagesRequired(bool $totalRequired = true): ListProducts
    {
        return $this->setParameter(self::PARAM_TOTAL_REQUIRED, ($totalRequired) ? 'true' : 'false');
    }

    public function getTotalPagesRequired(): ?string
    {
        return $this->getParameter(self::PARAM_TOTAL_REQUIRED) ?? 'true';
    }

    public function getEndpoint(): string
    {
        return self::ENDPOINT.'?'.http_build_query([
                self::PARAM_PAGE => $this->getPageNumber(),
                self::PARAM_PAGE_SIZE => $this->getPageSize(),
                self::PARAM_TOTAL_REQUIRED => $this->getTotalPagesRequired()
            ],'', '&');
    }

    public function getHttpMethod(): string
    {
        return Request::METHOD_GET;
    }
}