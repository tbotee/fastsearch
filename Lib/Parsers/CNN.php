<?php

class CNN extends ParserBase implements iParser
{
    public $url = "";

    public function __construct($parser)
    {
        $this->url = $parser->url;
        $this->config = $parser;
    }

    public function getItems(string $term)
    {
        $object = parent::getItemsFromSource($term);
        return $this->getListFromObject($object);
    }

    public function getListFromString(string $html)
    {
        $object = json_decode($html);
        return $this->getListFromObject($object);
    }

    private function getListFromObject($object): array
    {
        $items = array();
        foreach ($object->result as $item)
        {
            $items[] = new Item(
                (string) $item->headline,
                (string) $item->body,
                (string) $item->url,
                (string) $item->thumbnail,
                (string) $item->lastModifiedDate,
                "CNN"
            );
        }
        return $items;
    }

    public function encode(string $url)
    {
        return urlencode(htmlspecialchars($url));
    }
}