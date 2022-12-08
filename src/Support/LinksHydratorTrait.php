<?php

namespace Cloudcogs\PayPal\Support;

trait LinksHydratorTrait
{
    protected function hydrateLinks(array $links): array
    {
        foreach ($links as $i => $link) {
            if (is_array($link))
            {
                $links[$link[Link::REL]] = new Link($link);
                unset($links[$i]);
            }
        }

        return $links;
    }
}
