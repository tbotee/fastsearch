<?php

class Ello extends ParserBase implements iParser
{

    public function __construct(Config $setting)
    {
        $this->url = $setting->elloUrl;
    }

    public function getItems(string $term) {

        $object = parent::getItemsFromSource($term);

        $items = array();

        foreach ($object->posts as $item)
        {
            $items[] = (string) $item->posts->title;
        }

        return $items;
    }
}