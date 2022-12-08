<?php

namespace Cloudcogs\PayPal\Support;

abstract class AbstractCollection extends \ArrayIterator
{
    use LinksHydratorTrait;

    protected array $collection = [];
    protected $currentKey;
    protected int $currentKeyIndex;
    protected array $collectionKeys;

    protected const TOTAL_ITEMS = 'total_items';
    protected const TOTAL_PAGES = 'total_pages';
    protected const LINKS = 'links';

    public function __construct($array = [], $flags = 0)
    {
        parent::__construct($array, $flags);

        $this->setCollection();
        $this->processCollectionKeys();
    }

    abstract protected function setCollection(): AbstractCollection;

    public function getCollection(): array
    {
        return $this->collection ?? [];
    }

    /**
     * @return int The total number of items.
     */
    public function getTotalItems(): int
    {
        return $this->{self::TOTAL_ITEMS};
    }

    /**
     * @return int The total number of pages.
     */
    public function getTotalPages(): int
    {
        return $this->{self::TOTAL_PAGES};
    }

    /**
     * @return array|null An array of request-related HATEOAS links.
     */
    public function getLinks(): ?array
    {
        $links = $this->hydrateLinks($this->{self::LINKS});
        $this->offsetSet(self::LINKS, $links);

        return $this->{self::LINKS};
    }

    public function __get($offset)
    {
        return ($this->offsetExists($offset)) ?
            $this->offsetGet($offset) :
            null;
    }

    public function getArrayCopy(): array
    {
        return $this->collection;
    }

    public function count(): int
    {
        return count($this->collection);
    }

    public function rewind()
    {
        reset($this->collection);
    }

    public function current()
    {
        return (array_key_exists($this->currentKey, $this->collection)) ?
            $this->collection[$this->currentKey] :
            null;
    }

    public function key()
    {
        return $this->currentKey;
    }

    public function next()
    {
        $this->currentKeyIndex++;
        $this->currentKey = $this->collectionKeys[$this->currentKeyIndex] ?? null;
    }

    public function valid(): bool
    {
        return array_key_exists(($this->currentKeyIndex + 1), $this->collectionKeys);
    }

    protected function processCollectionKeys()
    {
        if (!isset($this->collectionKeys))
        {
            $this->collectionKeys = array_keys($this->collection);
            $this->currentKey = $this->collectionKeys[0];
            $this->currentKeyIndex = 0;
        }
    }
}
