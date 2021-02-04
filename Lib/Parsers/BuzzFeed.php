<?php


class BuzzFeed extends ParserBase implements iParser
{

    public function __construct($parser)
    {
        $this->url = $parser->url;
        $this->config = $parser;
    }

    public function getListFromString(string $html)
    {
        $object = json_decode($html);
        return $this->getListFromObject($object);
    }

    public function getItems(string $term)
    {
        $object = parent::getItemsFromSource($term);
        return $this->getListFromObject($object);
    }

    private function getListFromObject($object): array
    {
        $items = array();
        foreach ($object->results as $item)
        {
            $items[] = new Item(
                (string) $item->name,
                (string) $item->description,
                (string) $item->canonical_url,
                (string) $item->image,
                $item->time_since,
                "BuzzFeed"
            );
        }

        return $items;
    }


    public function encode(string $url)
    {
        return urlencode(htmlspecialchars($url));
    }

}