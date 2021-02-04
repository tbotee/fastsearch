<?php

class CNN extends ParserBase implements iParser
{
    public $url = "";

    public function __construct(Config $setting)
    {
        $this->url = $setting->cnnUrl;
    }

    public function getItems(string $term)
    {
        $object = parent::getItemsFromSource($term);

        $items = array();
        foreach ($object->result as $item)
        {
            $items[] = new Item(
                (string) $item->headline,
                (string) $item->body,
                (string) $item->url,
                (string) $item->thumbnail
            );
        }

        return $items;
    }
}