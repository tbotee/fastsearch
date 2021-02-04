<?php


class BuzzFeed extends ParserBase implements iParser
{

    public function __construct(Config $setting)
    {
        $this->url = $setting->buzzFeedUrl;
    }

    public function getItems(string $term)
    {
        $object = parent::getItemsFromSource($term);

        $items = array();
        foreach ($object->results as $item)
        {
            $items[] = new Item(
                (string) $item->name,
                (string) $item->description,
                (string) $item->canonical_url,
                (string) $item->image
            );
        }

        return $items;
    }
}