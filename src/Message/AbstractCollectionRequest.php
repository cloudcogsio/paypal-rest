<?php

namespace Cloudcogs\PayPal\Message;

use Cloudcogs\PayPal\Exception\AccessTokenNotFoundException;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractCollectionRequest extends AbstractRequest
{
    const PARAM_PAGE = 'page';
    const PARAM_PAGE_SIZE = 'page_size';
    const PARAM_TOTAL_REQUIRED = 'total_required';

    public function setPageNumber(int $pageNumber = 1): AbstractCollectionRequest
    {
        return $this->setParameter(self::PARAM_PAGE, $pageNumber);
    }

    public function getPageNumber(): int
    {
        return $this->getParameter(self::PARAM_PAGE) ?? 1;
    }

    public function setPageSize(int $pageSize = 10): AbstractCollectionRequest
    {
        if ($pageSize < 1) $pageSize = 1;
        if ($pageSize > 20) $pageSize = 20;

        return $this->setParameter(self::PARAM_PAGE_SIZE, $pageSize);
    }

    public function getPageSize(): int
    {
        return $this->getParameter(self::PARAM_PAGE_SIZE) ?? 10;
    }

    public function setTotalPagesRequired(bool $totalRequired = true): AbstractCollectionRequest
    {
        return $this->setParameter(self::PARAM_TOTAL_REQUIRED, ($totalRequired) ? 'true' : 'false');
    }

    public function getTotalPagesRequired(): ?string
    {
        return $this->getParameter(self::PARAM_TOTAL_REQUIRED) ?? 'true';
    }

    public function getHttpMethod(): string
    {
        return Request::METHOD_GET;
    }

    /**
     * @inheritDoc
     * @throws AccessTokenNotFoundException
     */
    public function getData()
    {
        $this->includeAuthorization();
        return null;
    }
}
