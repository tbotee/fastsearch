<?php


class ABCNews extends ParserBase implements iParser
{

    public function __construct(Config $setting)
    {
        $this->url = $setting->abcNewUrl;
    }

    public function getItems(string $term) {

        $object = parent::getItemsFromSource($term);

        $items = array();
        foreach ($object->item as $item)
        {
            $items[] = new Item(
                (string) $item->title,
                (string) $item->description,
                (string) $item->link,
                (string) $item->image
            );
        }

        return $items;
    }
}