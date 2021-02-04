<?php

class Reddit extends ParserBase implements iParser
{

    public function __construct(Config $setting)
    {
        $this->url = $setting->redditUrl;
    }

    public function getItems(string $term)
    {
        $object = parent::getItemsFromSource($term);

        $items = array();

        foreach ($object->data->children as $item)
        {
            $items[] = new Item(
                (string) $item->data->title,
                (string) $item->data->selftext,
                (string) $item->data->url,
                (string) $item->data->thumbnail === "self" ? "" : (string) $item->data->thumbnail
            );
        }

        return $items;
    }


}