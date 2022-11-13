<?php

namespace Cloudcogs\PayPal\Support;

abstract class AbstractCollection extends \ArrayIterator
{
    protected array $collection = [];
    protected $currentKey;
    protected int $currentKeyIndex;
    protected array $collectionKeys;

    public function __construct($array = [], $flags = 0)
    {
        parent::__construct($array, $flags);

        $this->setCollection();
        $this->processCollectionKeys();
    }

    abstract protected function setCollection(): AbstractCollection;

    public function getTotalItems(): int
    {
        return $this->total_items;
    }

    public function getTotalPages(): int
    {
        return $this->total_pages;
    }

    public function getLinks(): ?array
    {
        if (is_array($this->links) && count($this->links) > 0)
        {
            $links = [];
            foreach ($this->links as $link)
            {
                $links[$link['rel']] = new Link($link);
            }

            $this->offsetSet('links', $links);
        }
        return $this->links;
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
